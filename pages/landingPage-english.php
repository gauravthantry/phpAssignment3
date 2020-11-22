<?php
require_once "../components/head.php";  //<---- Assessment 1: 3 - require_once
require_once "../components/navBar.php";
?>
<!DOCTYPE html>
<html>
<?php
 $head = new Head('Gaming Community');
 $head->formHead();
?>

<body class="root">
    <?php
    
    ?>        <!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->
    <div class='container'>
    <?php    
    $ini_array = parse_ini_file( '../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
    $locale="en";
    $navBar = new NavBar("home",$ini_array,"en");
    $navBar->formNavBar();
       echo "<div class='body-content'>";
           echo "<h2 class='welcome-message'>".$ini_array[$locale]["Welcome-Message"]."</h2>";
       echo "</div>";
        ?>
    </div>
</body>

</html>


