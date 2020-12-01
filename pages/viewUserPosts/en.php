<?php    //<-- Assessment 1: 4 - Coding conventions (must start with <?php or <?=)
require_once "../../components/head.php";  //<---- Assessment 1: 3 - require_once
require_once "../../components/navBar.php";
require_once "../../components/viewUserPosts.php";
?>
<?php
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $viewPosts_ini_array = parse_ini_file('../../ini/viewPosts.ini',true); //<--- Assessment 1: 18 (il8n)
  $locale="en";
  $userID = $_SESSION['userID'];
  $user_name = $_SESSION['user_name'];
  $gender = $_SESSION['gender'];
  $navBar = new NavBar("myPosts",$nav_ini_array,"en");
  $viewUserPosts = new ViewUserPosts($viewPosts_ini_array,"en",$userID,$user_name, $gender);
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
    $viewUserPosts->formViewPosts();
    ?>
    </div>
</body>

</html>


