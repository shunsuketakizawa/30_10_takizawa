<?php

try
{

$member_email=$_POST['email'];
$member_pass=$_POST['pass'];

$member_email=htmlspecialchars($member_email,ENT_QUOTES,'UTF-8');
$member_pass=htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');

$member_pass=md5($member_pass);

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//入力されたスタッフコードと暗号化されたパスワードをデータベースから読み出している
$sql='SELECT code,name FROM dat_member WHERE email=? AND password=?'; //andで複数絞り込み条件を書ける
$stmt=$dbh->prepare($sql);
$data[]=$member_email;
$data[]=$member_pass;
$stmt->execute($data);

$dbh=null;

$rec=$stmt->fetch(PDO::FETCH_ASSOC);

if($rec==false)
{
    print 'メールアドレスかパスワードが間違っています。<br />';
    print '<a href="member_login.html">戻る</a>';
}
else{
    //自動で合言葉を決めれる
    session_start();
    //ログインOKという証拠を残す
    $_SESSION['member_login']=1;
    //スタッフコードと名前を入れておく。
    $_SESSION['member_code']=$rec['code'];
    $_SESSION['member_name']=$rec['name'];

    header('location:shop_list.php');
    exit();
}

}
catch(Exception $e)
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>