<?php
//合言葉を確認
session_start();
//合言葉を変える(セキュリティー)
session_regenerate_id(true);
//もしログインOKの証拠がなかったら
if(isset($_SESSION['login'])==false)
{
    //ログイン画面へ戻ってもらう。exit()で強制終了してこれ以上の画面は見せない。
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();//プログラムを強制終了
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br />';
    print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ろくまる農園</title>
</head>
<body>
<?php

try
{
//選択されたスタッフコードを受け取ってます
$staff_code=$_GET['staffcode'];

//データベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//スタッフコードで絞り込んでいる。1件のレコードに絞り込まれるのでループしない。
$sql='SELECT name FROM mst_staff WHERE code=?';
$stmt = $dbh-> prepare($sql);
$data[]=$staff_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name']; //スタッフ名を変数にコピー

$dbh=null;

}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
}

?>

スタッフ削除<br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
スタッフ名<br />
<?php print $staff_name; ?>
<br />
このスタッフを削除してよろしいですか？<br />
<br />
<form method="post" action="staff_delete_done.php">
<input type="hidden" name="code" value="<?php print $staff_code; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>


</body>
</html>