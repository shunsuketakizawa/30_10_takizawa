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

// 前画面の入力データを変数にコピー
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou=$_FILES['gazou'];

// 入力データに安全対策を施している
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

//もし商品名が入力されていなかったら..
if($pro_name=='')
{
    print'商品名が入力されていません。<br />';
}
else //もし商品名が入力されていたら
{
    print '商品名：';
    print $pro_name;
    print '<br />';
}
//preg_match 正しいか間違っているか正規表現でチェックしなさいという命令
if(preg_match('/\A[0-9]+\z/', $pro_price)==0)
{
    print '価格をきちんと入力してください。<br />';
}
else
{
    print '価格：';
    print $pro_price;
    print '円<br />';
}

//もし画像サイズが0より大きければ「画像あり」判定
if($pro_gazou['size']>0)
{
    if($pro_gazou['size']>1000000)
    {
        print'画像が大き過ぎます。';
    }
    else
    {
        //画像を「gazou」フォルダにアップロード
        move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
        print '<img src="./gazou/'.$pro_gazou['name'].'">'; //アップロードした画像を表示
        print '<br />';
        }
}

// もし、入力に問題があったら(正規表現も含む)、「戻る」だけ表示
if($pro_name==''|| preg_match('/\A[0-9]+\z/',$pro_price)==0 ||$pro_gazou['size']>1000000)
{
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
}
else
// もし、入力に問題がなかったら、「戻る」と「OK」ボタンの両方表示。
//OKがクリックされたら、データを連れて次画面へ飛ぶ。
{
    print '上記の商品を追加します。<br />';
    print '<form method="post" action="pro_add_done.php">';
    print '<input type ="hidden" name="name" value="'.$pro_name.'">';
    print '<input type ="hidden" name="price" value="'.$pro_price.'">';
    print '<input type ="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">'; //画像を次の画面に渡す
    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
}

?>

</body>
</html>