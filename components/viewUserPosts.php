<?php
 include  '../../database/dbConnect.php';
 require_once "../../database/queries.php";
 include_once "../../database/dbConnect.php";
 $globalLocale = 'en';
?>
<?php
 class ViewUserPosts {
     private $ini_array = array();
     private $locale = "en";
     private $userID;
     private $user_name;
     private $gender;
     function __construct(
         $ini_array,  //<--- Assessment 1: 2 - Global scope variable
         $locale,
         $userID,
         $user_name,
         $gender
     ){
       $this->ini_array = $ini_array;
       $this->locale = $locale;
       $globalLocale = $locale;
       $this->userID = $userID;
       $this->user_name = $user_name;
       $this->gender = $gender;
     }
     
     public function formViewPosts(){
        $userPosts = Queries::getUserPosts($this->userID);
        $userName = '';
        
        if(gettype($userPosts)==='array')
        {
          if($this->userID===$_SESSION['userID'])
        {
          $userName = 'You';
        }
        else {
          $userName = $this->user_name;
        }
            $profile_pic_link='';
            if($this->gender==='female')
            {
                $profile_pic_link = '../../images/female.png';
            }
            else if($this->gender==='male')
            {
                $profile_pic_link = '../../images/male.jpg';
            }
            echo  "<div class='postsection'>
            <div class='ui feed'>
                ";
            foreach($userPosts as $post){
                echo " <div class='ui grid'>
                        <div class='twelve wide column'>
                        
                         <div class='post'>
                          <div class='event'>
                          <div class='label'>
                            <img src='".$profile_pic_link."' class='label-image'>
                          </div>
                          <div class='summary'>
                            <a href='#'>".$userName."</a> added a post
                            <div class='date'>
                            on ".$post['post_create_date']."
                            </div>
                          </div>
                          <br>
                          <div class='text content'><b>".
                            $post['post_title'].
                        " </b></div>
                          <div class='extra text content'>".
                            $post['post_content'].
                        " </div>
                          <div class='meta'>
                            <a class='like' href='#'>
                              <i class='like icon'></i> 5 Likes
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>";
                    if($userName==='You')
                    {
                    echo "
                    <div class='four wide column admin-options'>
                      <div class='admin-option-div'>
                          <a href='../../services/deletePost.php?post_id=".$post['post_id']."' <button class='ui brown button'>Delete Post</button>
                      </div>
                    </div>";
                     }
                   
            }
            echo "</div>
                </div>"  ;      
           }  
         }   
 }
?>