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
$staff_code=$_POST['code'];
$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

// 入力データに安全対策を施している
$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

//もしスタッフ名が入力されていなかったら..
if($staff_name=='')
{
    print'スタッフ名が入力されていません。<br />';
}
else //もしスタッフ名が入力されていたら
{
    print'スタッフ名：';
    print $staff_name;
    print'<br />';
}
// もしパスワードが入力されていなかったら
if($staff_pass=='')
{
    print'パスワードが入力されていません。<br />';
}
// もし、パスワードと、確認のためにもう一度入力してもらったパスワードが同じでなかったら
if($staff_pass!=$staff_pass2)
{
    print'パスワードが一致しません。<br />';
}

// もし、入力に問題があったら「戻る」だけ表示
if($staff_name==''|| $staff_pass==''|| $staff_pass!=$staff_pass2)
{
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
}
else 
// もし、入力に問題がなかったら、「戻る」と「OK」ボタンの両方表示。
//OKがクリックされたら、データを連れて次画面へ飛ぶ。
{
    $staff_pass=md5($staff_pass);
    print'<form method="post" action="staff_edit_done.php">';
    print'<input type ="hidden" name="code" value="'.$staff_code.'">';    
    print'<input type ="hidden" name="name" value="'.$staff_name.'">';
    print'<input type ="hidden" name="pass" value="'.$staff_pass.'">';
    print'<br />';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'<input type="submit" value="OK">';
    print'</form>';
}

?>

</body>
</html>