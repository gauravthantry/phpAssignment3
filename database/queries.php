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
    // if($result->num_rows > 0)
    // {
    //   while ($row = $result->fetch_assoc()) {
    //   $userID = $row['userID'];
    //   echo 'User ID: '.$userID;
    // // $createUserCredential = "insert into user_credentials (userID,current_password) values ('$userID','$password');";
    // }
    // }
   
  }
  public static function GetPasswordHash($email)
  {
    require '..\database\connectDB.php';
    $sql = "select * from User where email = '$email';";
    return $db->query($sql);
  }

  public static function GetUser($id)
  {
    require '..\database\connectDB.php';
    $sql = "select * from User where UserID = '$id';";
    return $db->query($sql);
  }

  public static function GetUserByEmail($email)
  {
    require '..\database\connectDB.php';
    $sql = "select * from User where email = '$email';";
    return $db->query($sql);
  }


  public static function GetUsersName($email)
  {
    require '..\database\connectDB.php';
    $sql = "select F_name, L_name from User where email = '$email';";
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

  public static function UpdateAccountDetails($email, $fName,$lName,$PNumber,$Email,$Dob,$Gender,$aboutMe)
  {
    require '..\database\connectDB.php';
    $sql = "update User set F_name = '$fName', L_name = '$lName', phoneNumber = $PNumber, DOB = '$Dob', gender = '$Gender', aboutMe='$aboutMe' where email = '$email';";
    return $db->query($sql);
  }

  public static function UpdatePassword($ID, $oldPassword, $newPassword)
  {
    require '..\database\connectDB.php';
    $sql = "update User set password = '$newPassword' where email = '$ID';";
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

  public static function LikePost($UserID, $PostID)
  {
    require '..\database\connectDB.php';
    $sql = "call LikePost($UserID,$PostID);";
    return $db->query($sql);
  }
  public static function UnLikePost($UserID, $PostID)
  {
    require '..\database\connectDB.php';
    $sql = "call UnlikePost($UserID,$PostID);";
    return $db->query($sql);
  }

  public static function findLike($UserID, $PostID)
  {
    require '..\database\connectDB.php';
    $sql = "select * from likes where liker ='$UserID' AND PostID='$PostID'";
    return $db->query($sql);
  }

  public static function CountPostLikes($PostID)
  {
    require '..\database\connectDB.php';
    $sql = "select count(postId) from likes where postid='$PostID';";
    return $db->query($sql);
  }

  public static function GetAllLikers($PostID)
  {
    require '..\database\connectDB.php';
    $sql = "call GetLikersForPost($PostID)";
    return $db->query($sql);
  }

}
 ?>
