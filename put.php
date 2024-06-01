<?php
require_once 'connect.php';
session_start();


$id = $_SESSION['id'];
$name = $_SESSION['name'];
$depart = $_SESSION['depart'];
$gender = $_SESSION['gender'];
$phone = $_SESSION['phone'];
$password = $_SESSION['password'];
$admin = $_SESSION['admin'];


$query = "INSERT INTO chatlist VALUES(NULL,'" .
$_SESSION['id'] . "','" .
$_SESSION['name'] . "','" .
$_POST['chat'] . "',NULL)";
$result = $mysqli -> query($query);


$stmt = $mysqli->prepare($query);


if($result){
$resultMessage = "データベースに登録しました。";
} else {
$resultMessage = "データベース登録に失敗しました。";
}
echo $resultMessage;


#
// ステートメントを閉じる
$stmt->close();
// データベース接続を閉じる
$mysqli->close();


// セッションに結果メッセージを保存
$_SESSION['resultMessage'] = $resultMessage;


// chatter.phpにリダイレクト
header("Location: chatter.php");
exit();
#


?>
<!DOCTYPE html>
<html>
<head>
<title>Chatter</title>
<style type="text/css">
p,form {
background-color:white;
width:400px;
margin:auto;
padding:2em;
}
</style>
</head>
<body style="background-color:LightBlue;">
<p><?php echo "$resultMessage" ?></p>
<hr>
<p><a href="chatter.php">記事一覧に戻る</a></p>
</body>
</html>


