<?php
//setcookie命令より前に画面表示があってはいけないというルールがあるので、HTMLのヘッダーより前にログアウトします。
session_start();
$_SESSION=array(); //セッション変数(秘密文書)を空っぽにする。
if (isset($_COOKIE[session_name()])==true) //もしクッキー情報があったら
{
    setcookie(session_name(),'',time()-42000,'/'); //パソコン側のセッションID(合言葉)をクッキーから削除する
}
session_destroy(); //セッションを破棄する(サーバーとあなたのパソコンの関係を断ち切る)
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
</head>
<body>
ログアウトしました。<br />
<br />
<a href="../staff_login/staff_login.html">ログイン画面へ</a>
    
</body>
</html>