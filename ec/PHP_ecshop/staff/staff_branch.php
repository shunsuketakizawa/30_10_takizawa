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
    if(isset($_POST['staffcode'])==false)
    {
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location:staff_disp.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['add'])==true)
{
    header('Location:staff_add.php');
    exit();
}

if(isset($_POST['edit'])==true)
{
    //もしスタッフコードが選ばれていたら、$staff_codeにスタッフコードをコピー
    if(isset($_POST['staffcode'])==false)
    {
        header('Location:staff_ng.php');
        exit();
    }
    //スタッフ修正画面に飛ぶ
    $staff_code=$_POST['staffcode'];
    header('location:staff_edit.php?staffcode='.$staff_code);
    exit();
    // print'修正ボタンが押された';
}
if(isset($_POST['delete'])==true)
{
    // もしスタッフコードが選ばれていなかったら、新しく作る画面staff_ng.phpに飛ぶ
    if(isset($_POST['staffcode'])==false)
    {
        header('Location:staff_ng.php');
        exit();
    }
    //スタッフ削除画面に飛ぶ
    $staff_code=$_POST['staffcode'];
    header('location:staff_delete.php?staffcode='.$staff_code);
    exit();
    // print'削除ボタンが押された';
}

?>
    
</body>
</html>