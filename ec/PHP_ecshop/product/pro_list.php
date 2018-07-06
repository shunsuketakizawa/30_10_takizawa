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
    <title>filmshare管理画面</title>
</head>
<body>

<header><img src=img/header.svg></header>
<div class=conteiner1 style=width:150px>
<img src=img/btn1.svg style=width:150px>
<img src=img/btn2.svg style=width:150px>
</div>
<div class=conteiner2>
    <div class=box1>
    <?php                            ?>
    </div>
    <div class=box2></div>
</div>




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
//修正画面へ
print'<form method="post" action="pro_branch.php">';

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
    print'<input type="radio" name="procode" value="' .$rec['code'].'">';
    print $rec['name'].'---';
    print $rec['price'].'円';
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