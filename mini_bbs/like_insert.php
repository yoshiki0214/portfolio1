<?php
session_start();
require('dbconnect.php');

if (isset($_SESSION['id'])) {
  $likes = $db->prepare('SELECT COUNT(liked_post_id) AS like_cnt FROM likes WHERE liked_post_id=? AND pressed_member_id=?');
  $likes->execute(array(
    $_REQUEST['id'],
    $_SESSION['id']
  ));
  $like = $likes->fetch();

  if ($like['like_cnt'] == 0) {
    $like_ins = $db->prepare('INSERT INTO likes SET liked_post_id=?, pressed_member_id=?, created=NOW()');
    $like_ins->execute(array(
      $_REQUEST['id'],
      $_SESSION['id']
    ));
  }
}
header('Location:index.php');
exit();
