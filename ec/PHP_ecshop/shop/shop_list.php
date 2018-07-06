<?php
//合言葉を確認
session_start();
//合言葉を変える(セキュリティー)
session_regenerate_id(true);
//もしログインOKの証拠がなかったら
if(isset($_SESSION['member_login'])==false)
{
    print 'ようこそゲスト様  ';
    print '<a href="member_login.html">会員ログイン</a><br />';
    print '<br />';
}
else
{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様<br />';
    print '<a href="member_logout.php">ログアウト</a><br />';
    print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>filmshare管理画面</title>
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

//名前,コード、値段を全てくださいというsql文
$sql='SELECT code,name,price FROM mst_product WHERE 1';
$stmt = $dbh-> prepare($sql);
$stmt->execute(); //命令が終わった時点で、中に全てのデータが入っている。

$dbh = null;

print'商品一覧 <br /><br />';

//データが無くなるまでループ
while(true)
{
    $rec= $stmt->fetch(PDO::FETCH_ASSOC); //$stmtから１レコード取り出してます。
    //もしデータがなければループから脱出
    if($rec==false)
    {
        break;
    }
    //どの商品を選んだか、飛び先でわかるようにするため、コードを渡している
    print'<a href="shop_product.php?procode='.$rec['code'].'">';
    print $rec['name'].'---';
    print $rec['price'].'円';
    print'</a>';
    print'<br />';
}

print '<br />';
print '<a href="shop_cartlook.php">カートを見る</a><br />';

}
catch (Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

</body>
</html>