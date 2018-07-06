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

//データベースサーバーの障害対策:エラートラップ try〜catch
try
{
//前画面から受け取った入力データを、変数にコピー
$pro_code= $_POST['code'];
$pro_name= $_POST['name'];
$pro_price= $_POST['price'];
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou_name=$_POST['gazou_name'];

//入力データに安全対策
$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');
//データベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//sql文でレコードを追加
$sql='UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
$stmt = $dbh-> prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_gazou_name;
$data[]=$pro_code;
$stmt->execute($data);

//データベースから切断
$dbh= null;
//もし同じ画像だったら何もしない
if($pro_gazou_name_old != $pro_gazou_name)
{
    // もし古い画像があれば削除
    if($pro_gazou_name_old !='')
    {
        unlink('./gazou/'.$pro_gazou_name_old);
    }
}
//画面に表示
print '修正しました。<br />';

}
catch(Exception $e)
{
    //障害が発生したらこのプログラムが動く
    print'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();//強制終了の命令
}
?>

<!-- スタッフ一覧画面へ戻るリンク -->
<a href="pro_list.php">戻る</a>

</body>
</html>