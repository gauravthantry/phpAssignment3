<?php
  require_once "../../components/head.php";
  require_once "../../components/navBar.php";
  require_once "../../components/registration.php";
?>
<?php
  $nav_ini_array = parse_ini_file( '../../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
  $registration_ini_array = parse_ini_file('../../ini/registration.ini',true);
  $locale="en";
  $navBar = new NavBar("register",$nav_ini_array,"en");
  $registration = new Registration($registration_ini_array,"en");
?> <!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->
<!DOCTYPE html>
  <html>
    <?php
     $head = new Head($registration_ini_array[$locale]['page-title']);
     $head->formHead();
    ?>

    <body class="root">    
      <div class='container'>
        <?php    
        $navBar->formNavBar();
        $registration->setScriptFiles();
        $registration->formRegistration();
        ?>
      </div>
  </body>
</html>