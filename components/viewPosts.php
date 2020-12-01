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
        $allPosts = Queries::getAllPosts();
        if(gettype($allPosts)==='array')
        {
            echo  "<div class='postsection'>
            <div class='ui feed'>
                ";
            foreach($allPosts as $post){
                if($post['gender']==='male'){
                    $profile_pic_link = '../../images/male.jpg';
                }
                else if($post['gender']==='female'){
                    $profile_pic_link = '../../images/female.png';
                }
                
                echo "
                         <div class='post'>
                          <div class='event'>
                          <div class='label'>
                            <img src='".$profile_pic_link."' class='label-image'>
                          </div>
                          <div class='summary'>
                            <a href='../viewPostByUser/".$this->locale.".php?userID=".$post['user_id']."&user_name=".$post['user_name']."&gender=".$post['gender']."'>".$post['user_name']."</a> added a post
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
                    ";
            }
            echo "</div>
                </div>"  ;      
           }  
         }
        
 }
?>