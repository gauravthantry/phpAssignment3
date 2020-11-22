<?php
 class Registration {
     private $ini_array = array();
     private $locale = "en";
     function __construct(
         $ini_array,
         $locale
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
     }

     public function formRegistration(){
        echo  "<div class='body-content'>
        <form class='ui form'>
          <div class='field'>
             <label>" .$this->ini_array[$this->locale]['first-name']."</label>
             <input type='text' name='first-name' placeholder='".$this->ini_array[$this->locale]['first-name']."'>
          </div>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['last-name']."</label>
             <input type='text' name='last-name' placeholder='".$this->ini_array[$this->locale]['last-name']."'>
          </div>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['age']."</label>
             <input type='number' name='email-address' placeholder='".$this->ini_array[$this->locale]['age-placeholder']."'>
          </div>
          <div class='field'>
             <label>".$this->ini_array[$this->locale]['email-address']."</label>
             <input type='email' name='email-address' placeholder='".$this->ini_array[$this->locale]['email-address-placeholder']."'>
          </div>
          <div class='field'>
             <div class='ui checkbox'>
                <input type='checkbox' tabindex='0'>
                <label>".$this->ini_array[$this->locale]['terms']."</label>
             </div>
          </div>
          <button class='ui button' type='submit'>".$this->ini_array[$this->locale]['submit']."</button>
        </form>
      </div>";
     }
 }
?>