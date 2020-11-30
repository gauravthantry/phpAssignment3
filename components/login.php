
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
          $userID =  Queries::authenticateUser($email,$password);
          if($userID=== 0){
           echo '<script type="text/JavaScript">  
             alert(\'Incorrect credentials provided. Please try again\');
           </script>';
           }
           else{
             echo 'inside else';
             session_start();
             if (!isset($_SESSION['loggedIn']))
             {
              echo 'inside set';
              $_SESSION['loggedIn'] = 'true';
              $_SESSION['userID'] = $userID;
              $_SESSION['locale']= $this->locale;
             } 
             header('Location: ../newPost/'.$this->locale.'.php');
           }
          }
       }
     
 }


 
?>




