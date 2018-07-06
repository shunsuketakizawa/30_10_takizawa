<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

if(isset($_POST['disp'])==true)
{
    if(isset($_POST['procode'])==false)
    {
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code=$_POST['procode'];
    header('Location:pro_disp.php?procode='.$pro_code);
    exit();
}

if(isset($_POST['add'])==true)
{
    header('Location:pro_add.php');
    exit();
}

if(isset($_POST['edit'])==true)
{
    //もしスタッフコードが選ばれていたら、$pro_codeにスタッフコードをコピー
    if(isset($_POST['procode'])==false)
    {
        header('Location:pro_ng.php');
        exit();
    }
    //スタッフ修正画面に飛ぶ
    $pro_code=$_POST['procode'];
    header('location:pro_edit.php?procode='.$pro_code);
    exit();
    // print'修正ボタンが押された';
}
if(isset($_POST['delete'])==true)
{
    // もしスタッフコードが選ばれていなかったら、新しく作る画面pro_ng.phpに飛ぶ
    if(isset($_POST['procode'])==false)
    {
        header('Location:pro_ng.php');
        exit();
    }
    //スタッフ削除画面に飛ぶ
    $pro_code=$_POST['procode'];
    header('location:pro_delete.php?procode='.$pro_code);
    exit();
    // print'削除ボタンが押された';
}

?>
    
</body>
</html>