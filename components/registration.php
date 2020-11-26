<?php
 class Registration {
     private $ini_array = array();
     private $locale = "en";
     function __construct(
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
     }
     public function setScriptFiles(){
        echo "<script src='../../js/app.js'></script>";
     }
     public function formRegistration(){
        echo  "<div class='body-content'>
        <form class='ui form'>
          
              <div class='ui grid'>
                <div class='three wide column preview-holder'>
                  <img class='sizedimg' id='pic-preview' style='width: 100%;' src='../../images/default-profile.png'>
                  <button type='button'  class='imgRemove' onclick='myImgRemoveFunctionOne()'>Clear</button>
                </div>
                <div class='eight wide column'>
                <div class='field'>
                <label for='img'>".$this->ini_array[$this->locale]['profile-image'].":</label>
                   <input type='file' id='choose-profile-img' name='img' accept='image/*' onchange='showPreviewOne(event);'>
                </div>
              </div>
             
          </div>
          <div class='field'>
             <label>" .$this->ini_array[$this->locale]['first-name'].":</label>
             <input type='text' name='first-name' placeholder='".$this->ini_array[$this->locale]['first-name']."'>
          </div>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['last-name'].":</label>
             <input type='text' name='last-name' placeholder='".$this->ini_array[$this->locale]['last-name']."'>
          </div>
          <div class='ui grid'>
           <div class='five wide column '>
            <div class='field'>
              <label>".$this->ini_array[$this->locale]['age'].":</label>
              <input type='number' name='email-address' placeholder='".$this->ini_array[$this->locale]['age-placeholder']."'>
            </div>
           </div>
          <div class='eleven wide column'>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['email-address'].":</label>
             <input type='email' name='email-address' placeholder='".$this->ini_array[$this->locale]['email-address-placeholder']."'>
          </div>
          </div>
          </div>
          <div class='ui grid'>
           <div class='eight wide column '>
            <div class='field'>
               <label>".$this->ini_array[$this->locale]['password'].":</label>
               <input type='password' id='new-password' name='password' placeholder='".$this->ini_array[$this->locale]['password']."'>
            </div>
           </div>
           <div class='eight wide column '>
            <div class='field'>
               <label>".$this->ini_array[$this->locale]['confirm-password'].":</label>
               <input type='password' id='confirm-password' name='confirm-password' placeholder='".$this->ini_array[$this->locale]['confirm-password']."'>
            </div>
           </div>
          </div>
          <div class='field'>
             <div class='ui checkbox'>
                <input type='checkbox' tabindex='0'>
                <label>".$this->ini_array[$this->locale]['terms']."</label>
             </div>
          </div>
          <div id='button-div'>
            <button class='ui primary button' type='submit'>".$this->ini_array[$this->locale]['submit']."</button>
          </div>
        </form>
      </div>";
     }
 }
?>