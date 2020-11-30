<?php
  if((isset($_GET['logout']))&&($_GET['logout']==1)){
      session_start();
      header('Location: ../loginPage/'.$_SESSION['locale'].'.php');
      $_SESSION['loggedIn']=false;
  }
?>
<?php
session_start();
class NavBar {    //<--- Assessment 1: 10 - Classes 4 - Coding convention (class name must start with a capital letter)
    private $home="";     //<--- Assesment 1: 10 - Class properties
    private $newPost="";
    private $viewPosts="";
    private $login="";
    private $register="";
    private $ini_array = array();    //<---- Assessment 1: 5 - Array
    private $locale = "en";
    private $session;
    function __construct(     //<---- Assessment 1: 10 - Class contructor, 8 - Arguments
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
        if(isset($_SESSION['loggedIn'])&&($_SESSION['loggedIn'])){
            $this->session = "Logout";
        }
        else{
            $this->session = "Login";
        }
    }

    public function formNavBar(){  //<-- Assessment 1: 8 - user-define function
        $lang = 'en';  //<--- Assessment 1: 2 - Basic variable type, scope (only accessible in this method)
        if($this->locale === 'hi'){
           $lang = 'hi';
        }
        echo "<div class='ui inverted menu'>
                <a class='".$this->home." item'
                   href='../../pages/landingPage/".$lang.".php'>".
                   $this->ini_array[$this->locale]["Home"].
               "</a>
                <a class='".$this->viewPosts." item' 
                   href='./viewPosts.html'>".
                   $this->ini_array[$this->locale]["View-Posts"].
               "</a>
                <a class='".$this->newPost." item' 
                   href='../../pages/newPost/".$lang.".php'>".
                   $this->ini_array[$this->locale]["New-Post"].
               "</a>
                <div class='right menu'>";


                if($this->session==='Login')
                {
                    echo "<a class='".$this->login." item'
                    href='../../pages/loginPage/".$lang.".php'>".
                    $this->ini_array[$this->locale][$this->session].
                 "</a>";
                }
                else {
                    echo "<a class='".$this->login." item'
                    href='?logout=1'>".
                    $this->ini_array[$this->locale][$this->session].
                 "</a>";
                }


                  if(!(isset($_SESSION['loggedIn'])&&($_SESSION['loggedIn']))){
                   echo "<a class='".$this->register." item' 
                   href='../../pages/registrationPage/".$lang.".php'>".
                   $this->ini_array[$this->locale]["Register"].
                "</a>";
                  }
                echo "</div>
                </div>";
    }
}
?>