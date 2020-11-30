
<?php
 include  '../../database/dbConnect.php';
 require_once "../../database/queries.php";
 include_once "../../database/dbConnect.php";
?>
<?php
 if(isset($_POST['submit'])){
   $email = $_POST['email-address'];
   $password = $_POST['password'];
   Queries::authenticateUser($email,$password);
 }
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
        <form class='ui form'  method='POST' enctype='multipart/form-data'>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['email-address'].":</label>
             <input type='email' name='email-address' placeholder='".$this->ini_array[$this->locale]['email-address-placeholder']."'>
          </div>
          <div class='field'>
          <label>".$this->ini_array[$this->locale]['password'].":</label>
          <input type='password' id='password' name='password' placeholder='".$this->ini_array[$this->locale]['password']."' onchange='check_pass();'>
       </div>
          <div id='button-div'>
            <button class='ui primary button' id='login' name='login' type='submit' disabled>".$this->ini_array[$this->locale]['login']."</button>
          </div>
        </form>
      </div>";
     }
 }
?>

