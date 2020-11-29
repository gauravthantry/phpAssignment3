<?php
 class Registration {
     private $ini_array = array();
     private $locale = "en";
     private $pic_src;
     function __construct(
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
       $this->pic_src =  "../../images/default-profile.png";
     }
     public function setScriptFiles(){
        echo "<script src='../../js/app.js'></script>";
     }
     public function formRegistration(){
        echo  "<div class='body-content'>
        <form action='../../actions/register.php' class='ui form' method='POST'>
              <div class='ui grid'>
                <div class='three wide column preview-holder'>
                  <img class='sizedimg' id='pic-preview' style='width: 100%;' src=".$this->pic_src.">
                  <button type='button'  class='imgRemove' onclick='myImgRemoveFunctionOne()'>Clear</button>
                </div>
                <div class='eight wide column'>
                <div class='field'>
                <label for='img'>".$this->ini_array[$this->locale]['profile-image'].":</label>
                   <input type='file' id='choose-profile-img' name='img' accept='image/*' onchange='showPreviewOne(event);'>
                   <input type='text' id='img-src' name='img-src' hidden>
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
           <div class='four wide column '>
            <div class='field'>
              <label>".$this->ini_array[$this->locale]['age'].":</label>
              <input type='number' name='age' placeholder='".$this->ini_array[$this->locale]['age-placeholder']."'>
            </div>
           </div>
           <div class='four wide column '>
            <div class='field'>
              <label>".$this->ini_array[$this->locale]['gender'].":</label>
              <select name='gender' id='gender'>
                 <option value='select'>".$this->ini_array[$this->locale]['genders'][0]."</option>
                 <option value='male'>".$this->ini_array[$this->locale]['genders'][1]."</option>
                 <option value='female'>".$this->ini_array[$this->locale]['genders'][2]."</option>
                 <option value='other'>".$this->ini_array[$this->locale]['genders'][3]."</option>
              </select>
            </div>
           </div>
          <div class='eight wide column'>
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
               <input type='password' id='password' name='password' placeholder='".$this->ini_array[$this->locale]['password']."' onchange='check_pass();'>
            </div>
           </div>
           <div class='eight wide column '>
            <div class='field'>
               <label>".$this->ini_array[$this->locale]['confirm-password'].":</label>
               <input type='password' id='confirm-password' name='confirm-password' placeholder='".$this->ini_array[$this->locale]['confirm-password']."'>
            </div>
           </div>
          </div>
          <span id='message'></span>
          <div id='button-div'>
            <button class='ui primary button' id='submit' type='submit' disabled>".$this->ini_array[$this->locale]['submit']."</button>
          </div>
        </form>
      </div>";
     }
 }
?>

