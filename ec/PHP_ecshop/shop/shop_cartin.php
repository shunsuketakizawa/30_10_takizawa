<?php
//合言葉を確認
session_start();
//合言葉を変える(セキュリティー)
session_regenerate_id(true);
//もしログインOKの証拠がなかったら
if(isset($_SESSION['menber_login'])==false)
{
    print 'ようこそゲスト様  ';
    print '<a href="member_login.html">会員ログイン</a><br />';
    print '<br />';
}
else
{
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様  ';
    print '<a href="member_logout.html">ログアウト</a><br />';
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
//選択された商品コードを受け取ってます
$pro_code=$_GET['procode'];
// $_SESSIONにカートが入っている時
if(isset($_SESSION['cart'])==true)
{
//現在のカート内容を$cartにコピーする。
    $cart=$_SESSION['cart'];
    $kazu=$_SESSION['kazu'];
    //もしすでにカート内にデータがあったら探す
    if(in_array($pro_code,$cart)==true)
    {
        print 'その商品はすでにカートに入っています。<br />';
        print '<a href="shop_list.php">商品一覧に戻る</a>';
        exit();
    }
}

//カートに商品を入れる
$cart[]=$pro_code;
$kazu[]=1;
//$_SESSIONにカートを補完する どこの画面でもカートを見られるように
$_SESSION['cart']=$cart;
$_SESSION['kazu']=$kazu;
//カートの中身を全部表示。動作テスト用
// foreach($cart as $key => $val)
// {
//     print $val;
//     print '<br />';
// }
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
}

?>

カートに追加しました。<br />
<br />
<a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>