<?php    //<-- Assessment 1: 4 - Coding conventions (must start with <?php or <?=)
require_once "../../components/head.php";  //<---- Assessment 1: 3 - require_once
require_once "../../components/navBar.php";
require_once "../../components/editPost.php";
?>
<?php
  $url= $_SERVER['REQUEST_URI']; 
  $post_id = substr($url,strpos($url,'=')+1,strlen($url));   //Assignment 1: 19 - String functions
  $post_id = intval($post_id);
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $edit_ini_array = parse_ini_file('../../ini/editPost.ini',true); //<--- Assessment 1: 18 (il8n)
  $locale="en";
  $navBar = new NavBar("",$nav_ini_array,$locale);
  $editPost= new EditPost($post_id,$edit_ini_array,$locale);
?>
<!DOCTYPE html>
<html>
<?php
 $head = new Head($edit_ini_array[$locale]['page-title']);
 $head->formHead();
?><!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->

<body class="root"> 
    <div class='container'>
    <?php    
    $navBar->formNavBar();
    $editPost->formEditPost();
    ?>
    </div>
</body>

</html>


