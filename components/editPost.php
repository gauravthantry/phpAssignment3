<?php
 include  '../../database/dbConnect.php';
 require_once "../../database/queries.php";
 include_once "../../database/dbConnect.php";
 $globalLocale = 'en';
 $post_id_global;
?>
<?php
 class EditPost {
     private $ini_array = array();
     private $locale = "en";
     private $post_id;
     private $post;
     function __construct(
         $post_id,
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale
     ){
       $this->post_id = $post_id;
       $post_id_global = $post_id;
       $this->ini_array = $ini_array;
       $this->locale = $locale;
       $globalLocale = $locale;
       $this->post = Queries::fetchPostContents($this->post_id);
     }

     public function formEditPost(){
         if(isset($_SESSION['loggedIn'])){
             echo  "<div class='formSection'>
        <h3 class='create-post-heading'>".$this->ini_array[$this->locale]['form-title']."</h3>
        <form class='ui form' method='post'>
        <div class='field'>
                <textarea name='post-id' hidden>".$this->post_id."</textarea>
            </div>
            <div class='field'>
                <label class='form-label'>".$this->ini_array[$this->locale]['post-title']."</label>
                <textarea name='post-title' rows='2'>".$this->post['post_title']."</textarea>
            </div>
            <div class='field'>
                <label class='form-label'>".$this->ini_array[$this->locale]['post-content']."</label>
                <textarea name='post-content'>".$this->post['post_content']."</textarea>
            </div>
            <div id='button-div'>
            <button class='ui teal button' name='edit-post' type='submit'>".$this->ini_array[$this->locale]['submit-button']."</button>
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
if(isset($_POST['edit-post'])){
  $post_id = $_POST['post-id'];
  $post_title = $_POST['post-title'];
  $post_content = $_POST['post-content'];
  $editResult = Queries::editPost($post_id,$post_title,$post_content);
  if($editResult)
  {
    header('Location: ../viewUserPosts/'.$globalLocale.'.php');
  }
     
}
?>