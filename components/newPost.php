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
     }

     public function formNewPost(){
        echo  "<div class='formSection'>
        <h3 class='create-post-heading'>".$this->ini_array[$this->locale]['form-title']."</h3>
        <div class='ui form'>
            <div class='field'>
                <label class='form-label'>".$this->ini_array[$this->locale]['post-title']."</label>
                <textarea rows='2'></textarea>
            </div>
            <div class='field'>
                <label class='form-label'>".$this->ini_array[$this->locale]['post-content']."</label>
                <textarea></textarea>
            </div>
            <div id='button-div'>
            <button class='ui teal button' type='submit'>".$this->ini_array[$this->locale]['submit-button']."</button>
            </div>
        </div>
    </div>";
     }
 }
?>