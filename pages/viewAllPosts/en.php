<?php    //<-- Assessment 1: 4 - Coding conventions (must start with <?php or <?=)
require_once "../../components/head.php";  //<---- Assessment 1: 3 - require_once
require_once "../../components/navBar.php";
require_once "../../components/viewPosts.php";
?>
<?php
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $viewPosts_ini_array = parse_ini_file('../../ini/viewPosts.ini',true); //<--- Assessment 1: 18 (il8n)
  $locale="en";
  $navBar = new NavBar("viewPosts",$nav_ini_array,"en");
  $newPost = new NewPost($viewPosts_ini_array,"en");
?>
<!DOCTYPE html>
<html>
<?php
 $head = new Head($viewPosts_ini_array[$locale]['page-title']);
 $head->formHead();
?><!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->

<body class="root"> 
    <div class='container'>
    <?php    
    $navBar->formNavBar();
    $newPost->formViewPosts();
    ?>
    </div>
</body>

</html>


