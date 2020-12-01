<?php
include_once 'MYSQLDB.php';

class Queries{
 

  public static function registerUser($email,$password,$first_name,$last_name,$age, $gender, $profile_pic)
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    
    $db = new MySQL($host, $dbUser, $dbPass, $dbName);
    $sql = 'use gamingforum';
    $db->query($sql);
    $sql = "insert into user_details (first_name,last_name,email, profile_pic, age, gender) values ('$first_name', '$last_name', '$email', '$profile_pic',  $age, '$gender');";
    $db->query($sql);
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $sql = "select * from user_details where email = '".$email."' LIMIT 1;";
    $result = $db->query($sql);
    if($result->num_rows > 0){
     while($row = $result->fetch_assoc())
     {
       $userID = $row['userID'];
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);
       $sql = "insert into user_credentials (userID,current_password) values ('$userID','$passwordHash');";
       $db->query($sql);
     }
    }
  }
  
  public static function authenticateUser($email,$password){
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new MYSQL($host, $dbUser, $dbPass, $dbName);
    $sql = 'use gamingforum';
    $db->query($sql);
    
    $sql = "select userID from user_details where email='".$email."';";
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $result = $db->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc())
      {
        $userID = $row['userID'];
        $db = new mysqli($host, $dbUser, $dbPass, $dbName);
        $sql = "select current_password from user_credentials where userID ='".$userID."';";
        $result = $db->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc())
          {
          $hashed_password = $row['current_password'];
          if(password_verify ($password , $hashed_password)){
            return $userID;
          }
          else {
            return 0;
          }
          
          }
      }
     }
    }
  }

  public static function GetUser($id)
  {
    require '..\database\connectDB.php';
    $sql = "select * from User where UserID = '$id';";
    return $db->query($sql);
  }


  public static function getAllPosts($userID)
  {
   
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $sql = "select user_details.profile_pic, CONCAT(user_details.first_name, ' ' , user_details.last_name) as user_name, post.post_title, post.post_content, post.post_create_date from user_details, post where user_details.userID = post.userID and post.userID=".$userID." order by post_create_date desc;";
    $result = $db->query($sql);
    if($result->num_rows > 0){
      $posts = array();
      while($row = $result->fetch_assoc())
      {
        array_push($posts, array(
          'user_name'=>$row['user_name'],
          'post_title'=>$row['post_title'],
          'post_content'=>$row['post_content'],
          'post_create_date'=>$row['post_create_date']
        ));
      }

      foreach($posts as $post){
        echo $post['post_content']."<br>";
      }
      return $posts;
  
    }
  }

  public static function GetPostsByID($id)
  {
    require '..\database\connectDB.php';
    $sql = "select * from Post where id = '$id';";
    return $db->query($sql);
  }



  public static function createPost($userID, $locale, $post_title, $post_content)
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new MySQL($host, $dbUser, $dbPass, $dbName);
    $db->connectToServer();
    $db->selectDatabase();
    $date = date("Y/m/d");
    $sql = "insert into post (userID, lang, post_title, post_content) values ($userID,'$locale','$post_title', '$post_content') ;";
    return $db->query($sql);
  }

  public static function DeletePost($postID)
  {
    require '..\database\connectDB.php';
    $sql = "delete from Post where id='$postID' ;";
    return $db->query($sql);
  }

}
 ?>
