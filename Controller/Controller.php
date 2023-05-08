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
          $id = $_POST['id'];

          $view->chapterContentPage();
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
            $warningMessage = "Size of image out of range!";
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

              $warningMessage =  'Chapter created successfully!';
              $view->adminPanel(true, $warningMessage);
            } else {
              $warningMessage = "Invalid file type. Please upload an image file.";
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
                  $warningMessage = "Катачылык 1 кетти!";
                  $view->adminPanel(true, $warningMessage);
                }
              } else {
                $warningMessage = "Файлдын тиби туура эмес. Сүрөт тибиндеги файлдарды киргизиңиз! (jpg, jpeg, png)";
                $view->adminPanel(true, $warningMessage);
              }
            }

          } else {
            $warningMessage = "Катачылык 2 кетти!";
            $view->adminPanel(true, $warningMessage);
          }

          break;
        case "deleteChapter":
          $chapterId = $_POST['chapterID'];
          $imageName = $_POST['imageUrl'];

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
          $view->allChaptersMenu();
          break;
        case "createChapterMenuForm":
          $allChapters = $model->getAllChapters();


          $view->createChapterMenu($allChapters);
          break;
        case "createChapterMenu":

          $chapterId = $_POST['chapterSelect'];
          $chapterMenuName = $_POST['chapterMenuName'];

          echo  $chapterId;
          echo  $chapterMenuName;

          break;
        case "updateChapterMenuForm":
          echo "all chapters menu";

          break;
        case "updateChapterMenu":
          echo "all chapters menu";

          break;
        case "deleteChapterMenu":
          echo "all chapters menu";

          break;




//          CHAPTERS SUB MENU PART
        case "allChaptersSubMenu":
          echo "all chapters";
          break;
        case "createChapterSubMenu":
          echo "all chapters";
          break;


//          WORD PART
        case "allWords":
          $subMenuId = $_POST['subMenu'];
          echo $subMenuId;
          echo "all chapters";
          break;
        case "createWord":
          echo "all chapters";
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
