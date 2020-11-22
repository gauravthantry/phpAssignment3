<?php

class Head {   //<--- Assessment 1: 10 - Classes
    private $pageTitle;   //<--- Assesment 1: 10 - Class properties
    function __construct($pageTitle){  //<---- Assessment 1: 10 - Class contructor
       $this->pageTitle = $pageTitle;
    }

    public function formHead(){
        echo "<head>
                 <Title>".$this->pageTitle."</Title>
                 <link href='https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap' rel='stylesheet'>
                 <link rel='stylesheet' href='../resource/app.css'>
                 <link rel='stylesheet' href='../resource/semantic_ui/semantic.min.css'>
                 <script src='https://code.jquery.com/jquery-3.1.1.min.js'
                         integrity='sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=' crossorigin='anonymous'></script>
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js'></script>
              </head>";
    }
}
?>