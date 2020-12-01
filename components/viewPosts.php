<?php
 include  '../../database/dbConnect.php';
 require_once "../../database/queries.php";
 include_once "../../database/dbConnect.php";
 $globalLocale = 'en';
?>
<?php
 class NewPost {
     private $ini_array = array();
     private $locale = "en";
     function __construct(
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
       $globalLocale = $locale;
     }

     public function formViewPosts(){
             echo  "<div class='postsection'>
             <div class='ui feed'>
                 <div class='post'>
                     <div class='event'>";
             $allPosts = Queries::getAllPosts($_SESSION['userID']);
         }
        
 }
?>