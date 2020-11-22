<?php
require_once "../components/head.php";
require_once "../components/navBar.php";
?>
<!DOCTYPE html>
<html>
<?php
 $head = new Head('गेमिंग समुदाय');
 $head->formHead();
?>

<body class="root">
    <?php
    
    ?>        <!-- <--- Assessment 1: 1 php tag, escaping html, instruction separation -->
    <div class='container'>
    <?php    
    $ini_array = parse_ini_file( '../ini/navbar.ini',true);  //<---- Assessment 1: 18 (il8n)
    $locale="hi";
    $navBar = new NavBar("home",$ini_array,"hi");
    $navBar->formNavBar();
       echo "<div class='body-content'>";
           echo "<h2 class='welcome-message'>".$ini_array[$locale]["Welcome-Message"]."</h2>";
       echo "</div>";
        ?>
    </div>
</body>

</html>


