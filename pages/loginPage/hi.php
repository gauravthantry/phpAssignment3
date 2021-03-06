<?php
  require_once "../../components/head.php";
  require_once "../../components/navBar.php";
  require_once "../../components/login.php";
?>
<?php
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $login_ini_array = parse_ini_file('../../ini/login.ini',true);
  $locale="en";
  $navBar = new NavBar("login",$nav_ini_array,"hi");
  $login = new Login($login_ini_array,"hi");
?> <!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->
<!DOCTYPE html>
  <html>
    <?php
     $head = new Head($login_ini_array[$locale]['page-title']);
     $head->formHead();
    ?>

    <body class="root">    
      <div class='container'>
        <?php    
        $navBar->formNavBar();
        $login->setScriptFiles();
        $login->formLogin();
        ?>
      </div>
  </body>
</html>