<?php
include_once 'MYSQLDB.php';

class Queries{
 

  public static function registerUser($email,$password,$first_name,$last_name,$age, $gender, $profile_pic)    //Assignment 1: 11 - Static, 9 - Function arguments
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    
    $db = new MySQL($host, $dbUser, $dbPass, $dbName);  //Assignment 1: 20 - db
    $sql = 'use gamingforum';
    $db->query($sql);
    $sql = "insert into user_details (first_name,last_name,email, profile_pic, age, gender) values ('$first_name', '$last_name', '$email', '$profile_pic',  $age, '$gender');";
    $db->query($sql);
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);  //Assignment 1: 20 - db
    $sql = "select * from user_details where email = '".$email."' LIMIT 1;";
    $result = $db->query($sql);
    if($result->num_rows > 0){
     while($row = $result->fetch_assoc())   //Assignment 1: 7 - Iteration (While)
     {
       $userID = $row['userID'];
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);   //Assignment 1: 16 - Password_Hash
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
    
    $sql = "select userID, first_name, last_name, gender from user_details where email='".$email."';";
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $result = $db->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc())
      {
        $userDetails = array(
          "userID"=>$row['userID'],
          "user_name"=>$row['first_name'].' '.$row['last_name'],
          "gender"=>$row['gender']
        );
        $db = new mysqli($host, $dbUser, $dbPass, $dbName);
        $sql = "select current_password from user_credentials where userID ='".$userDetails['userID']."';";
        $result = $db->query($sql);
        if($result->num_rows > 0){
          
          while($row = $result->fetch_assoc())
          {
          $hashed_password = $row['current_password'];
          if(password_verify ($password , $hashed_password)){
           
            return $userDetails;
          }
          else {
            return 0;
          }
          
          }
      }
     }
    }
  }

  public static function getAllPosts()
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $sql = "select user_details.userID,CONCAT(user_details.first_name, ' ' , user_details.last_name) as user_name, user_details.gender, post.post_id, post.post_title, post.post_content, post.post_create_date from user_details, post where user_details.userID = post.userID order by post_create_date desc;";
    $result = $db->query($sql);
    if($result->num_rows > 0){
      $posts = array();
      while($row = $result->fetch_assoc())
      {
        array_push($posts, array(
          'post_id'=>$row['post_id'],
          'user_id'=>$row['userID'],
          'user_name'=>$row['user_name'],
          'gender'=>$row['gender'],
          'post_title'=>$row['post_title'],
          'post_content'=>$row['post_content'],
          'post_create_date'=>$row['post_create_date']
        ));
      }
      return $posts;
    }
  }

  public static function getUserPosts($userID)
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $sql = "select user_details.profile_pic, CONCAT(user_details.first_name, ' ' , user_details.last_name) as user_name, post.post_id, post.post_title, post.post_content, post.post_create_date from user_details, post where user_details.userID = post.userID and post.userID=".$userID." order by post_create_date desc;";
    $result = $db->query($sql);
    if($result->num_rows > 0){
      $posts = array();
      while($row = $result->fetch_assoc())
      {
        array_push($posts, array(
          'post_id'=>$row['post_id'],
          'user_name'=>$row['user_name'],
          'post_title'=>$row['post_title'],
          'post_content'=>$row['post_content'],
          'post_create_date'=>$row['post_create_date']
        ));
      }
      return $posts;
  
    }
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

  public static function fetchPostContents($post_id)
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $sql = "select post_title, post_content from post where post_id=$post_id;";
    $result = $db->query($sql);
    if($result->num_rows > 0){
      
      while($row = $result->fetch_assoc())
      {
        $post_content = array(
          'post_title'=>$row['post_title'],
          'post_content'=>$row['post_content']
        );
        return $post_content;
      }
    }
  }

  public static function editPost($post_id, $post_title, $post_content)
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new mysqli($host, $dbUser, $dbPass, $dbName);
    $sql = "update post set post_title='$post_title', post_content='$post_content' where post_id=$post_id;";
    $result = $db->query($sql);
    return $result;
  }

  public static function deletePost($post_id)
  {
    $host = 'localhost';
    $dbUser ='root';
    $dbPass ='#Unsouled2018';
    $dbName ='gamingforum';
    $db = new MySQL($host, $dbUser, $dbPass, $dbName);
    $db->connectToServer();
    $db->selectDatabase();
    $sql = "delete from post where post_id=$post_id ;";
   return $db->query($sql);
  }

}
 ?>
