<?php

class NavBar {    //<--- Assessment 1: 10 - Classes
    private $home="";     //<--- Assesment 1: 10 - Class properties
    private $newPost="";
    private $viewPosts="";
    private $login="";
    private $register="";
    private $ini_array = array();    //<---- Assessment 1: 5 - Array
    private $locale = "en";
    function __construct(     //<---- Assessment 1: 10 - Class contructor
        $activeItem,
        $ini_array,
        $locale
        
    ) {
        if($activeItem === "home"){    //<--- Assessment 1: 6 - if condition
        $this->home = "active";
        }
        else if($activeItem === "newPost")  //<---- Assessment 1: 6 - else if condition
        {
        $this->newPost= "active";
        }
        else if($activeItem === "viewPosts"){
            $this->viewPost = "active";
        }
        else if($activeItem === "login"){
            $this->login = "active";
        }
        else {                         //<---- Assessment 1: 6 - else condition
            $this->register = "active";
        }
        $this->ini_array = $ini_array;
        $this->locale = $locale;
    }

    public function formNavBar(){
        $lang = 'english';
        if($this->locale === 'hi'){
           $lang = 'hindi';
        }
        echo "<div class='ui inverted menu'>
                <a class='".$this->home." item'>".
                   $this->ini_array[$this->locale]["Home"].
               "</a>
                <a class='".$this->viewPosts." item' 
                   href='./viewPosts.html'>".
                   $this->ini_array[$this->locale]["View-Posts"].
               "</a>
                <a class='".$this->newPost." item' 
                   href='./postForm.html'>".
                   $this->ini_array[$this->locale]["New-Post"].
               "</a>
                <div class='right menu'>
                   <a class='".$this->login." item'>".
                     $this->ini_array[$this->locale]["Login"].
                  "</a>
                   <a class='".$this->register." item'
                     href='../pages/registrationPage-".$lang.".php'>".
                     $this->ini_array[$this->locale]["Register"].
                  "</a>
                </div>
               </div>";
    
    }
}
?>