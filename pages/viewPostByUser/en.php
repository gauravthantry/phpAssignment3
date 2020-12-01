<?php    //<-- Assessment 1: 4 - Coding conventions (must start with <?php or <?=)
require_once "../../components/head.php";  //<---- Assessment 1: 3 - require_once
require_once "../../components/navBar.php";
require_once "../../components/viewUserPosts.php";
?>
<?php
   $url= $_SERVER['REQUEST_URI']; 
   $userDetails = substr($url,strpos($url,'=')+1,strpos($url,'&'));

   $userID = substr($userDetails,0,strpos($userDetails,'&'));
   $userDetails = substr($userDetails,strpos($userDetails,'&')+11,strlen($userDetails)-1);
   $userName = substr($userDetails,0,strpos($userDetails,'gender')-1);
   $userName = str_replace('%20',' ',$userName);
   $gender = substr($userDetails,strpos($userDetails,'gender')+7,strlen($userDetails)-1);
?>
<?php
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $viewPosts_ini_array = parse_ini_file('../../ini/viewPosts.ini',true); //<--- Assessment 1: 18 (il8n)
  $locale="en";
  $navBar = new NavBar("myPosts",$nav_ini_array,"en");
  $newPost = new ViewUserPosts($viewPosts_ini_array,"en",$userID,$userName, $gender);
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


