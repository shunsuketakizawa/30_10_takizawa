<?php
    session_start();

    session_regenerate_id(true);
    //共通関数を読み込む(インクルード)
    require_once('../common/common.php');

    //sanitizeだとエラーになった。htmlspecialchars
	$post=$_POST;
    //商品の種類の数を$postから$maxにコピー
    $max=$post['max'];
    //商品の数だけ回るforループ
    for($i=0;$i<$max;$i++)
    {
        //もし半角数字じゃなかったら preg_match 0は正しくない場合
        if(preg_match("/\A[0-9]+\z/", $post['kazu'.$i])==0)
        {
            print '数量に誤りがあります。';
            print '<a href="shop_cartlook.php">カートに戻る</a>';
            exit();
        }
        //数量が1個以上、10個までに当てはまらない場合
        if($post['kazu'.$i]<1 || 10<$post['kazu'.$i])
        {
            print '数量は必ず１個以上、１０個までです。';
            print '<a href="shop_cartlook.php">カートに戻る</a>';
            exit();
        }
        $kazu[]=$post['kazu'.$i];  //kazu0,kazu1,,,
    }

    // 削除機能
    $cart=$_SESSION['cart'];
    //逆順ループ
    for($i=$max;0<=$i;$i--)
    {
        if(isset($_POST['sakujo'.$i])==true)
        {
            //配列の要素を削除する命令
            array_splice($cart,$i,1);
            array_splice($kazu,$i,1);
        }
    }
    //$_SESSIONに保管
    $_SESSION['cart']=$cart;
    $_SESSION['kazu']=$kazu;

    header('Location:shop_cartlook.php');
    exit();
?>