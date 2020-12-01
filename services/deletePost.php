<?php
 include  '../database/dbConnect.php';
 require_once "../database/queries.php";
 include_once "../database/dbConnect.php";
?>

<?php
   $url = $_SERVER['REQUEST_URI'];
   $postDetails = substr($url,strpos($url,'=')+1,strpos($url,'&'));
   $post_id = substr($postDetails,0,strpos($postDetails,'&'));
   $locale = substr($postDetails,strpos($postDetails,'=')+1,strlen($postDetails)-1);
   $post_id = intval($post_id);

?>

<?php
  $deletePost=Queries::deletePost($post_id);
  if($deletePost){
    header('Location: ../pages/viewUserPosts/'.$locale.'.php');
  }
       
?>