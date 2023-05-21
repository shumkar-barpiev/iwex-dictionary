<?php
session_start();
/**
 * Controller
 */

class Controller
{
  public function select_page($view, $model)
  {
    if(isset($_GET['page'])){
      switch ($_GET['page']) {
        case 'admin':
          $e = $_POST['email'];
          $p = $_POST['password'];

          if(isset($_SESSION['id']) && isset($_SESSION['email']) && isset ($_SESSION['password'])){
            $view->adminPanel(false, "");
          }else{
            if (isset($e) &&  isset($p)) {

              $admin = $model->getAdminByEmailAndPassword($e, $p);

              if (is_null($admin->getId())) {
                $view->loginPanel(true);
              }else{
                $_SESSION["id"] = $admin->getId();
                $_SESSION["email"] = $admin->getEmail();
                $_SESSION["password"] = $admin->getPassword();

                $view->adminPanel(false, "");
              }
            }else{
              $view->loginPanel(false);
            }
          }
        break;
        case 'logout':
          session_unset();
          $view->loginPanel(false);
        break;
        case 'chapter':
          $chapterId = $_POST['chapterId'];
          $chapterName =  $_POST['chapterName'];
          $menus = $model->getAllChaptersMenuByChapterId($chapterId);
          $navComponents  = array();

          $breadCrambMenu = '<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">'.$chapterName.'</li>
							</ol>
						</nav>';

          foreach ($menus as $menu){
            $subMenu =$model->getAllChaptersSubMenuByMenuId($menu->getId());
            $navComponents[$menu->getChapterMenuName()] = $subMenu;
          }

//          foreach ($navComponents as $key => $subMenus) {
//            echo $key . ': ' ;
//            foreach ($subMenus as $subMenu){
//              echo $subMenu->getId();
//            }
//          }

          $subMenuWords = array();
          $view->chapterContentPage($navComponents, $subMenuWords, $chapterId, $chapterName, $breadCrambMenu);
          break;
        case "wordsBySubMenu":
          $subMenuId = $_POST['subMenuId'];
          $chapterId = $_POST['chapterId'];

          $chapterName =$_POST['chapterName'];
          $breadCrambMenu = '';

          $allChapterSubMenu = $model->getAllChaptersSubMenu();

          foreach($allChapterSubMenu as $subMenu){

            if($subMenu->getId() == $subMenuId){
              $breadCrambMenu = '<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">'.$subMenu->getChapterName().'</li>
                                <li class="breadcrumb-item" aria-current="page">'.$subMenu->getMenuName().'</li>
								<li class="breadcrumb-item active" aria-current="page">'.$subMenu->getSubMenuName().'</li>
							</ol>
						</nav>';
            }
          }

          $subMenuWords = $model->getWordsBySubMenuId($subMenuId);

          $menus = $model->getAllChaptersMenuByChapterId($chapterId);
          $navComponents  = array();

          foreach ($menus as $menu){
            $subMenu =$model->getAllChaptersSubMenuByMenuId($menu->getId());
            $navComponents[$menu->getChapterMenuName()] = $subMenu;
          }


          $view->chapterContentPage($navComponents, $subMenuWords, $chapterId, $chapterName,$breadCrambMenu );

          break;


//          CHAPTERS PART
        case "allChapters":

          $allChapters = $model->getAllChapters();

          $view->allChapters($allChapters);
          break;
        case "createChapterForm":
          $view->createChapterForm();
          break;
        case "createChapter":

//          echo $_POST['chapterName'];
//          echo "<pre>";
//          print_r($_FILES["chapterImage"]);
//          echo "</pre>";
          $chapterTitle = $_POST['chapterName'];
          $imageName = $_FILES['chapterImage']['name'];
          $imageTmp = $_FILES['chapterImage']['tmp_name'];
          $imageType = $_FILES['chapterImage']['type'];
          $imageSize = $_FILES['chapterImage']['size'];

          if ($imageSize > 3000000){ // surot olchomu 3 MB'tan kop bolboshu kerek
            $warningMessage = "Сүрөттүн өлчөмү чоң. Файлдын өлчөмү 3 МБ'тан ашпашы керек!";
            $view->adminPanel(true, $warningMessage);
          }else{
            // Check if the file is an image
            if ($imageType == 'image/jpeg' || $imageType == 'image/png' ||  $imageType == 'image/jpg'){
              $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);

              $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
              $img_upload_path = dirname(__FILE__) . "/chapterUploads/".$new_img_name;
//              echo $img_upload_path;

              $model->createChapter($chapterTitle, $new_img_name);
              move_uploaded_file($imageTmp, $img_upload_path);

              $warningMessage =  'Бөлүм ийгиликтүү түзүлдү!!!';
              $view->adminPanel(true, $warningMessage);
            } else {
              $warningMessage = "Файлдын тиби туура келбейт. Туура типтеги сүрөт киргизиниз!(png, jpeg, jpg).";
              $view->adminPanel(true, $warningMessage);
            }
          }
          break;
        case "updateChapterForm":
          $chapterId = $_POST['chapterID'];
          $chapterName = $_POST['chapterName'];
          $imageName = $_POST['imageName'];

          $view->updateChapter($chapterId, $chapterName, $imageName);
          break;
        case "updateChapter":
          $chapterId = $_POST['chapterID'];
          $chapterName = $_POST['chapterName'];
          $oldImageName = $_POST['imageNameUpdate'];

          $file_path = './Controller/chapterUploads/'.$oldImageName; // Replace with the path to your image file
          
          if (file_exists($file_path)) {

            $imageName = $_FILES['chapterImage']['name'];
            $imageTmp = $_FILES['chapterImage']['tmp_name'];
            $imageType = $_FILES['chapterImage']['type'];
            $imageSize = $_FILES['chapterImage']['size'];

            if ($imageSize > 3000000){ // surot olchomu 3 MB'tan kop bolboshu kerek
              $warningMessage = "Сүрөттүн өлчөмү чоң, 3 МБ'тан ашпашы керек!";
              $view->adminPanel(true, $warningMessage);
            }else {
              // Check if the file is an image
              if ($imageType == 'image/jpeg' || $imageType == 'image/png' || $imageType == 'image/jpg') {

                if (unlink($file_path)) {
                  $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
                  $img_ex_lc = strtolower($img_ex);

                  $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                  $img_upload_path = dirname(__FILE__) . "/chapterUploads/" . $new_img_name;
//              echo $img_upload_path;

                  $model->updateChapter($chapterId, $chapterName, $new_img_name);
                  move_uploaded_file($imageTmp, $img_upload_path);

                  $warningMessage = 'Бөлүм ийгиликтүү жаңыртылды!';
                  $view->adminPanel(true, $warningMessage);
                } else {
                  $warningMessage = "Катачылык кетти!";
                  $view->adminPanel(true, $warningMessage);
                }
              } else {
                $warningMessage = "Файлдын тиби туура эмес. Сүрөт тибиндеги файлдарды киргизиңиз! (jpg, jpeg, png)";
                $view->adminPanel(true, $warningMessage);
              }
            }

          } else {
            $warningMessage = "Катачылык кетти!";
            $view->adminPanel(true, $warningMessage);
          }

          break;
        case "deleteChapter":
          $chapterId = $_POST['chapterID'];
          $imageName = $_POST['imageUrl'];

          $menus =  $model->getAllChaptersMenuByChapterId($chapterId);

          foreach ($menus as $menu ){
            $subMenus = $model->getAllChaptersSubMenuByMenuId($menu->getId());

            foreach ($subMenus as $subMenu){
              $allWords = $model->getWordsBySubMenuId($subMenu->getId());

              foreach ($allWords as $word){
                $wordId = $word->getId();
                $wordImageName = $word->getWordImage();

                $file_path = './Controller/wordUploads/'.$wordImageName; // Replace with the path to your image file

                if (file_exists($file_path)) {
                  if (unlink($file_path)) {
                    $model->deleteWord($wordId);
                  } else {
                    $warningMessage = "Файлды өчүрүү катасы кетти!";
                    $view->adminPanel(true, $warningMessage);
                  }
                } else {
                  $warningMessage = "Катачылык кетти!";
                  $view->adminPanel(true, $warningMessage);
                }
              }
            }
            foreach($subMenus as $subMenu){
              $model->deleteChapterSubMenu($subMenu->getId());
            }
          }

          foreach($menus as $menu){
            $model->deleteChapterMenu($menu->getId());
          }


          $file_path = './Controller/chapterUploads/'.$imageName; // Replace with the path to your image file

          if (file_exists($file_path)) {
            if (unlink($file_path)) {
              $model->deleteChapter($chapterId);
              $allChapters = $model->getAllChapters();

              $view->allChapters($allChapters);
            } else {
              $warningMessage = "Файлды өчүрүү катасы кетти!";
              $view->adminPanel(true, $warningMessage);
            }
          } else {
            $warningMessage = "Катачылык кетти!";
            $view->adminPanel(true, $warningMessage);
          }
          break;

//          CHAPTERS MENU PART
        case "allChaptersMenu":
          $allChaptersMenu = $model->getAllChaptersMenu();
          $view->allChaptersMenu($allChaptersMenu);
          break;
        case "createChapterMenuForm":
          $allChapters = $model->getAllChapters();


          $view->createChapterMenu($allChapters);
          break;
        case "createChapterMenu":
          $allChapters = $model->getAllChapters();
          $chapterId = $_POST['chapterSelect'];
          $chapterMenuName = $_POST['chapterMenuName'];
          $chapterName = "";

          foreach ($allChapters as $chapter) {
            if( $chapter->getId() == $chapterId){
              $chapterName = $chapter->getChapterName();
              break;
            }
          }

          $model->createChapterMenu($chapterMenuName, $chapterId, $chapterName );
          $warningMessage =  'Бөлүм темасы ийгиликтүү түзүлдү!';
          $view->adminPanel(true, $warningMessage);
          break;
        case "updateChapterMenuForm":
          $allChapters = $model->getAllChapters();

          $chapterMenuId = $_POST["chapterMenuId"];
          $chapterMenuName = $_POST["chapterMenuName"];
          $chapterId = $_POST["chapterId"];

          $view->updateChapterMenu($chapterMenuId,$chapterMenuName,  $allChapters, $chapterId);
          break;
        case "updateChapterMenu":
          $allChapters = $model->getAllChapters();
          $chapterId = $_POST['chapterSelect'];
          $chapterMenuName = $_POST['chapterMenuName'];
          $chapterName = "";
          $chapterMenuId = $_POST['chapterMenuId'];

          foreach ($allChapters as $chapter) {
            if( $chapter->getId() == $chapterId){
              $chapterName = $chapter->getChapterName();
              break;
            }
          }


          $model->updateChapterMenu($chapterMenuId,$chapterMenuName, $chapterId, $chapterName );
          $allChaptersMenu = $model->getAllChaptersMenu();
          $view->allChaptersMenu($allChaptersMenu);
          break;
        case "deleteChapterMenu":
          $chapterMenuId = $_POST['chapterMenuId'];

          $subMenus = $model->getAllChaptersSubMenuByMenuId($chapterMenuId);

          foreach ($subMenus as $subMenu){
            $allWords = $model->getWordsBySubMenuId($subMenu->getId());

            foreach ($allWords as $word){
              $wordId = $word->getId();
              $wordImageName = $word->getWordImage();

              $file_path = './Controller/wordUploads/'.$wordImageName; // Replace with the path to your image file

              if (file_exists($file_path)) {
                if (unlink($file_path)) {
                  $model->deleteWord($wordId);
                } else {
                  $warningMessage = "Файлды өчүрүү катасы кетти!";
                  $view->adminPanel(true, $warningMessage);
                }
              } else {
                $warningMessage = "Катачылык кетти!";
                $view->adminPanel(true, $warningMessage);
              }
            }
          }
          foreach($subMenus as $subMenu){
            $model->deleteChapterSubMenu($subMenu->getId());
          }

          $model->deleteChapterMenu($chapterMenuId);
          $allChaptersMenu = $model->getAllChaptersMenu();
          $view->allChaptersMenu($allChaptersMenu);
          break;

//          CHAPTERS SUB MENU PART
        case "allChaptersSubMenu":
          $allChapterSubMenu = $model->getAllChaptersSubMenu();

          $view->allChaptersSubMenu($allChapterSubMenu);
          break;
        case "createChapterSubMenuForm":
          $allChaptersMenu = $model->getAllChaptersMenu();

          $view->createChapterSubMenu($allChaptersMenu);
          break;
        case "createChapterSubMenu":

          $subMenuname = $_POST['chapterSubMenuName'];
          $menuId = $_POST['chapterMenuSelect'];
          $menuName = "";
          $chapterName = "";


          $allChaptersMenu = $model->getAllChaptersMenu();

          foreach ($allChaptersMenu as $chapterMenu) {
            if( $chapterMenu->getId() == $menuId){
              $menuName = $chapterMenu->getChapterMenuName();
              $chapterName = $chapterMenu->getChapterName();
              break;
            }
          }


          $model->createChapterSubMenu($subMenuname, $menuId, $menuName, $chapterName );
          $warningMessage =  'Подтема ийгиликтүү түзүлдү!';
          $view->adminPanel(true, $warningMessage);

          break;
        case "updateChapterSubMenuForm":
          $allChaptersMenu = $model->getAllChaptersMenu();

          $chapterSubMenuId = $_POST["chapterSubMenuId"];
          $chapterSubMenuName = $_POST["chapterSubMenuName"];
          $menuId = $_POST["menuId"];

          $view->updateChapterSubMenu($chapterSubMenuId, $chapterSubMenuName,  $allChaptersMenu, $menuId);
          break;
        case "updateChapterSubMenu":
          $subMenuId = $_POST['subMenuId'];
          $subMenuname = $_POST['chapterSubMenuName'];
          $menuId = $_POST['chapterMenuSelect'];
          $menuName = "";
          $chapterName = "";


          $allChaptersMenu = $model->getAllChaptersMenu();

          foreach ($allChaptersMenu as $chapterMenu) {
            if( $chapterMenu->getId() == $menuId){
              $menuName = $chapterMenu->getChapterMenuName();
              $chapterName = $chapterMenu->getChapterName();
              break;
            }
          }


          $model->updateChapterSubMenu($subMenuId,$subMenuname, $menuId, $menuName, $chapterName );

          $allChapterSubMenu = $model->getAllChaptersSubMenu();
          $view->allChaptersSubMenu($allChapterSubMenu);
          break;
        case "deleteChapterSubMenu":
          $subMenuId = $_POST['chapterSubMenuId'];

          $allWords = $model->getWordsBySubMenuId($subMenuId);

          foreach ($allWords as $word){
            $wordId = $word->getId();
            $wordImageName = $word->getWordImage();

            $file_path = './Controller/wordUploads/'.$wordImageName; // Replace with the path to your image file

            if (file_exists($file_path)) {
              if (unlink($file_path)) {
                $model->deleteWord($wordId);
              } else {
                $warningMessage = "Файлды өчүрүү катасы кетти!";
                $view->adminPanel(true, $warningMessage);
              }
            } else {
              $warningMessage = "Катачылык кетти!";
              $view->adminPanel(true, $warningMessage);
            }
          }

          $model->deleteChapterSubMenu($subMenuId);

          $allChapterSubMenu = $model->getAllChaptersSubMenu();
          $view->allChaptersSubMenu($allChapterSubMenu);
          break;


//          WORD PART
        case "allWordsOfSubMenu":
          $subMenuId = $_POST['subMenu'];
          echo $subMenuId;
          echo "all chapters";
          break;
        case "allWords":
          $allWords = $model->getAllWords();
          $view->allWords($allWords);
          break;
        case "createWordForm":
          $allChapterSubMenu = $model->getAllChaptersSubMenu();
          $view->createWord($allChapterSubMenu);
          break;
        case "createWord":
          $allChapterSubMenu = $model->getAllChaptersSubMenu();
          $germanWord = $_POST["germanWord"];
          $russianWord = $_POST["russianWord"];
          $description = $_POST["description"];
          $subMenuId = $_POST["subMenuSelect"];
          $chapterName = "";
          $menuName = "";
          $subMenuName = "";

          foreach ($allChapterSubMenu as $subMenu) {
            if( $subMenu->getId() == $subMenuId){
              $chapterName = $subMenu->getChapterName();
              $menuName = $subMenu->getMenuName();
              $subMenuName = $subMenu->getSubMenuName();
              break;
            }
          }

          $imageName = $_FILES['wordImage']['name'];
          $imageTmp = $_FILES['wordImage']['tmp_name'];
          $imageType = $_FILES['wordImage']['type'];
          $imageSize = $_FILES['wordImage']['size'];

          if ($imageSize > 3000000){ // surot olchomu 3 MB'tan kop bolboshu kerek
            $warningMessage = "Сүрөттүн өлчөмү чоң. Файлдын өлчөмү 3 МБ'тан ашпашы керек!";
            $view->adminPanel(true, $warningMessage);
          }else{
            // Check if the file is an image
            if ($imageType == 'image/jpeg' || $imageType == 'image/png' ||  $imageType == 'image/jpg'){
              $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);

              $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
              $img_upload_path = dirname(__FILE__) . "/wordUploads/".$new_img_name;
//              echo $img_upload_path;

              $model->createWord($subMenuId , $new_img_name, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName);
              move_uploaded_file($imageTmp, $img_upload_path);

              $warningMessage =  'Сөздүк ийгиликтүү түзүлдү!!!';
              $view->adminPanel(true, $warningMessage);
            } else {
              $warningMessage = "Файлдын тиби туура келбейт. Туура типтеги сүрөт киргизиниз!(png, jpeg, jpg).";
              $view->adminPanel(true, $warningMessage);
            }
          }

          break;
        case "updateWordForm":
          $allChapterSubMenu = $model->getAllChaptersSubMenu();

          $wordId = $_POST["wordId"];
          $subMenuId = $_POST["chapterSubMenuId"];
          $imageName = $_POST["wordImage"];
          $germanWord = $_POST["germanWord"];
          $russianWord = $_POST["russianWord"];
          $description = $_POST["description"];

          $view->updateWord($wordId, $subMenuId , $imageName, $germanWord, $russianWord, $description, $allChapterSubMenu);
          break;
        case "updateWord":
          $allChapterSubMenu = $model->getAllChaptersSubMenu();
          $germanWord = $_POST["germanWord"];
          $russianWord = $_POST["russianWord"];
          $description = $_POST["description"];
          $subMenuId = $_POST["subMenuSelect"];
          $chapterName = "";
          $menuName = "";
          $subMenuName = "";

          foreach ($allChapterSubMenu as $subMenu) {
            if( $subMenu->getId() == $subMenuId){
              $chapterName = $subMenu->getChapterName();
              $menuName = $subMenu->getMenuName();
              $subMenuName = $subMenu->getSubMenuName();
              break;
            }
          }


          $wordId = $_POST['wordId'];
          $oldImageName = $_POST['oldWordImage'];

          $file_path = './Controller/wordUploads/'.$oldImageName; // Replace with the path to your image file

          if (file_exists($file_path)) {

            $imageName = $_FILES['wordImage']['name'];
            $imageTmp = $_FILES['wordImage']['tmp_name'];
            $imageType = $_FILES['wordImage']['type'];
            $imageSize = $_FILES['wordImage']['size'];

            if ($imageSize > 3000000){ // surot olchomu 3 MB'tan kop bolboshu kerek
              $warningMessage = "Сүрөттүн өлчөмү чоң, 3 МБ'тан ашпашы керек!";
              $view->adminPanel(true, $warningMessage);
            }else {
              // Check if the file is an image
              if ($imageType == 'image/jpeg' || $imageType == 'image/png' || $imageType == 'image/jpg') {

                if (unlink($file_path)) {
                  $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
                  $img_ex_lc = strtolower($img_ex);

                  $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                  $img_upload_path = dirname(__FILE__) . "/wordUploads/" . $new_img_name;
//              echo $img_upload_path;

                  $model->updateWord($wordId, $subMenuId , $new_img_name, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName);
                  move_uploaded_file($imageTmp, $img_upload_path);

                  $warningMessage = 'Сөздүк ийгиликтүү жаңыртылды!';
                  $view->adminPanel(true, $warningMessage);
                } else {
                  $warningMessage = "Катачылык кетти!";
                  $view->adminPanel(true, $warningMessage);
                }
              } else {
                $warningMessage = "Файлдын тиби туура эмес. Сүрөт тибиндеги файлдарды киргизиңиз! (jpg, jpeg, png)";
                $view->adminPanel(true, $warningMessage);
              }
            }

          } else {
            $warningMessage = "Катачылык кетти!";
            $view->adminPanel(true, $warningMessage);
          }



          break;
        case "deleteWord":
          $wordId = $_POST['wordId'];
          $imageName = $_POST['imageName'];

          $file_path = './Controller/wordUploads/'.$imageName; // Replace with the path to your image file

          if (file_exists($file_path)) {
            if (unlink($file_path)) {
              $model->deleteWord($wordId);

              $allWords = $model->getAllWords();
              $view->allWords($allWords);
            } else {
              $warningMessage = "Файлды өчүрүү катасы кетти!";
              $view->adminPanel(true, $warningMessage);
            }
          } else {
            $warningMessage = "Катачылык кетти!";
            $view->adminPanel(true, $warningMessage);
          }

          break;

//          DEFAULT
        default:
          $allChapters = $model->getAllChapters();
          $view->index($allChapters);
          break;
      }
    }else{
      $allChapters = $model->getAllChapters();
      $view->index($allChapters);
    }
  }
}


 ?>
