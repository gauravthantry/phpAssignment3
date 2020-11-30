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
    $sql = "insert into user_details (first_name,last_name,email, profile_pic, age, gender) values ('$first_name', '$last_name', '$email', '$profile_pic', $age, '$gender');";
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
          $compare = password_verify ($password , $hashed_password);
          return $compare;
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


  public static function GetAllPosts()
  {
    require '..\database\connectDB.php';
    $sql = "select * from Post order by dateOfPost desc;";
    return $db->query($sql);
  }

  public static function GetPostsByID($id)
  {
    require '..\database\connectDB.php';
    $sql = "select * from Post where id = '$id';";
    return $db->query($sql);
  }



  public static function SubmitPost($title, $body, $authorID, $date)
  {
    require '..\database\connectDB.php';
    $sql = "insert into Post (title, body, authorID, dateOfPost) values ('$title', '$body', '$authorID', '$date') ;";
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
