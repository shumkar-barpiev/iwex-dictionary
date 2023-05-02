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
            $view->adminPanel();
          }else{
            if (isset($e) &&  isset($p)) {

              $admin = $model->getAdminByEmailAndPassword($e, $p);

              if (is_null($admin->getId())) {
                $view->loginPanel(true);
              }else{
                $_SESSION["id"] = $admin->getId();
                $_SESSION["email"] = $admin->getEmail();
                $_SESSION["password"] = $admin->getPassword();

                $view->adminPanel();
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
