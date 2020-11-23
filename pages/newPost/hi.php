<?php    //<-- Assessment 1: 4 - Coding conventions (must start with <?php or <?=)
require_once "../../components/head.php";  //<---- Assessment 1: 3 - require_once
require_once "../../components/navBar.php";
require_once "../../components/newPost.php";
?>
<?php
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $newPost_ini_array = parse_ini_file('../../ini/newPost.ini',true); //<--- Assessment 1: 18 (il8n)
  $locale="hi";
  $navBar = new NavBar("newPost",$nav_ini_array,$locale);
  $newPost = new NewPost($newPost_ini_array,$locale);
?>
<!DOCTYPE html>
<html>
<?php
 $head = new Head($newPost_ini_array[$locale]['page-title']);
 $head->formHead();
?><!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->

<body class="root"> 
    <div class='container'>
    <?php    
    $navBar->formNavBar();
    $newPost->formNewPost();
    ?>
    </div>
</body>

</html>


