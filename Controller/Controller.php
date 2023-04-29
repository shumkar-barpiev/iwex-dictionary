<?php
/**
 * Controller
 */

class Controller
{
  public function select_page($view)
  {
    if(isset($_GET['page'])){
      switch ($_GET['page']) {
        case 'products':
          global $users;

          foreach($users as $user){
            echo $user. "<br>";
          }

          break;
        case 'about':
          $view->about();
          break;
        case 'services':
          $view->services();
          break;
        case 'portfolio':
          $view->portfolio();
          break;
        case 'login':
          $view->login();
          break;
        case 'registration':
          $view->register();
          break;
        case 'profile':
          $fullname = $_POST['fullname'];
          $gender = $_POST['gender'];
          $softwareEngineer = $_POST['softwareEngineer'];
          $jobTitle = $_POST['jobTitle'];
          $technologies = $_POST['skills'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phonenumber = $_POST['phonenumber'];
          $address = $_POST['address'];

          $user = new User(
            $fullname,
            $gender,
            $softwareEngineer,
            $jobTitle,
            $technologies,
            $email,
            $password,
            $phonenumber,
            $address);

          $view->profile($user);
          break;
        default:
          $view->index();
          break;
      }
    }else{
      $view->index();
    }
  }
}


 ?>
