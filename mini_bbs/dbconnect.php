<?php
try {
  $db = new PDO('mysql:dbname=heroku_7a5ea123b249485; host=us-cdbr-east-02.cleardb.com; port=8889; charset=utf8', 'bb0918e066e306', '136f9901');
} catch (PDOException $e) {
  print('DB接続エラー：' . $e->getMessage());
}
