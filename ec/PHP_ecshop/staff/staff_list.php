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

//データベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//スタッフの名前,コード全てくださいというsql文
$sql='SELECT code,name FROM mst_staff WHERE 1';
$stmt = $dbh-> prepare($sql);
$stmt->execute(); //命令が終わった時点で、中に全てのデータが入っている。

$dbh = null;

print'スタッフ一覧 <br /><br />';
//修正画面へ
print'<form method="post" action="staff_branch.php">';

//データが無くなるまでループ
while(true)
{
    $rec= $stmt->fetch(PDO::FETCH_ASSOC); //$stmtから１レコード取り出してます。
    //もしデータがなければループから脱出
    if($rec==false)
    {
        break;
    }
    //どのスタッフを選んだか、飛び先でわかるようにするため、スタッフコードを渡している
    print'<input type="radio" name="staffcode" value="' .$rec['code'].'">';
    print $rec['name'];
    print'<br />';
}
print'<input type="submit" name="disp" value="参照">';
print'<input type="submit" name="add" value="追加">';
print'<input type="submit" name="edit" value="修正">';
print'<input type="submit" name="delete" value="削除">';
print'</form>';

}
catch (Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

<br />
<a href="../staff_login/staff_top.php">トップメニューへ</a><br />

</body>
</html>