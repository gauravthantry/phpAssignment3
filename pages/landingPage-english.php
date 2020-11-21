<!DOCTYPE html>
<html>

<head>
    <Title>Gaming Community</Title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resource/app.css">
    <link rel="stylesheet" href="../resource/semantic_ui/semantic.min.css">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</head>

<body class="root">
    <?php
    $ini_array = parse_ini_file( '../ini/landing.ini',true);
    $locale="en";
    echo "<div class='container'>";
       echo "<div class='ui inverted menu'>";
           echo "<a class='active item'>";
                echo $ini_array[$locale]["Home"];
            echo "</a>";
            echo "<a class='item' href='./viewPosts.html'>";
               echo $ini_array[$locale]["View-Posts"];
            echo "</a>";
            echo "<a class='item' href='./postForm.html'>";
               echo $ini_array[$locale]["New-Post"];
           echo "</a>";
           echo "<div class='right menu'>";
               echo "<a class='item'>";
                   echo $ini_array[$locale]["Login"];
               echo "</a>";
               echo "<a class='item'>";
                   echo $ini_array[$locale]["Register"];
               echo "</a>";
           echo "</div>";
       echo "</div>";
       echo "<div class='body-content'>";
           echo "<h2 class='welcome-message'>".$ini_array[$locale]["Welcome-Message"]."</h2>";
       echo "</div>";
        ?>
    </div>
</body>

</html>