<?php
 include  '../../database/dbConnect.php';
 require_once "../../database/queries.php";
 include_once "../../database/dbConnect.php";
?>
<?php
 class NewPost {
     private $ini_array = array();
     private $locale = "en";
     function __construct(
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
     }

     public function formNewPost(){
         session_start();
         if(isset($_SESSION['loggedIn'])){
             echo  "<div class='formSection'>
        <h3 class='create-post-heading'>".$this->ini_array[$this->locale]['form-title']."</h3>
        <form class='ui form' method='post'>
            <div class='field'>
                <label class='form-label'>".$this->ini_array[$this->locale]['post-title']."</label>
                <textarea name='post-title' rows='2'></textarea>
            </div>
            <div class='field'>
                <label class='form-label'>".$this->ini_array[$this->locale]['post-content']."</label>
                <textarea name='post-content'></textarea>
            </div>
            <div id='button-div'>
            <button class='ui teal button' name='new-post' type='submit'>".$this->ini_array[$this->locale]['submit-button']."</button>
            </div>
        </form>
    </div>";
     }
     else {
         header("Location: ../loginPage/".$this->locale.".php");
     }
         }
        
 }
?>

<?php 
session_start();
if(isset($_POST['new-post'])){
  $post_title = $_POST['post-title'];
  $post_content = $_POST['post-content'];
  Queries::createPost($_SESSION['userID'],$post_title,$post_content);
}
?>