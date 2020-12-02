
<?php
session_destroy();
 include  '../../database/dbConnect.php';
 require_once "../../database/queries.php";
 include_once "../../database/dbConnect.php";
?>

<?php
 class Login {
     private $ini_array = array();
     private $locale = "en";
     private $pic_src;
     function __construct(
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
       $this->pic_src =  "../../images/default-profile.png";
     }
     public function setScriptFiles(){
        echo "<script src='../../js/app.js'></script>";
     }
     public function formLogin(){
        echo  "<div class='body-content'>
        <form class='ui form' onsubmit='".$this->authenticate()."' method='POST' enctype='multipart/form-data'>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['email-address'].":</label>
             <input type='email' name='email-address' placeholder='".$this->ini_array[$this->locale]['email-address-placeholder']."'>
          </div>
          <div class='field'>
          <label>".$this->ini_array[$this->locale]['password'].":</label>
          <input type='password' id='password' name='password' placeholder='".$this->ini_array[$this->locale]['password']."' onchange='check_pass();'>
       </div>
          <div id='button-div'>
            <button class='ui primary button' id='login' name='login' type='submit'>".$this->ini_array[$this->locale]['login']."</button>
          </div>
        </form>
        <div id='authenticationResponse'><div>
      </div>";
    }
    public function authenticate(){
        if(isset($_POST['login'])){
          $email = $_POST['email-address'];
          $password = $_POST['password'];
          try {   //Assignment 1: 12 - Error handling
            $userData =  Queries::authenticateUser($email,$password);
            if($userData=== 0){
             echo '<script type="text/JavaScript">  
               alert(\'Incorrect credentials provided. Please try again\');
             </script>';
             }
             else{
               echo 'inside else';
               session_start();    //Assignment 1: 14 - Sessions
               if (!isset($_SESSION['loggedIn']))
               {
                $_SESSION['loggedIn'] = 'true';
                $_SESSION['userID'] = $userData['userID'];
                $_SESSION['user_name'] = $userData['user_name'];
                $_SESSION['gender'] = $userData['gender'];
                $_SESSION['locale']= $this->locale;
               } 
               header('Location: ../landingPage/'.$this->locale.'.php');  //Assignment 1: 15 - REST (Header)
             }
             
          }
          catch (Exception $e){  //Assignment 1: 12 - Error handling
            echo "<script>alert($e)</script>";
          }
          
          }
       }
     
 }


 
?>




