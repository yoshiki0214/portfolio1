<?php
 session_start();
 require('dbconnect.php');

 if(isset($_SESSION['id'])){
   $likes=$db->prepare('SELECT COUNT(liked_post_id) AS like_cnt FROM likes WHERE liked_post_id=? AND pressed_member_id=? ');
   $likes->execute(array(
     $_REQUEST['id'],
     $_SESSION['id']
   ));
   $like=$likes->fetch();
 
 if($like['like_cnt'] == 1){
   $like_del=$db->prepare('DELETE FROM likes WHERE liked_post_id=? AND pressed_member_id=?');
   $like_del->execute(array(
     $_REQUEST['id'],
     $_SESSION['id']
   ));
  }
 }

 header('Location: index.php');
 exit();
 