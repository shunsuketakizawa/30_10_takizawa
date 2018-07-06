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

try
{

$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];


//データベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//スタッフの名前,コード全てくださいというsql文

$sql='
SELECT
	dat_sales.code,
	dat_sales.date,
	dat_sales.code_member,
	dat_sales.name AS dat_sales_name,
	dat_sales.email,
	dat_sales.postal1,
	dat_sales.postal2,
	dat_sales.address,
	dat_sales.tel,
	dat_sales_product.code_product,
	mst_product.name AS mst_product_name,
	dat_sales_product.price,
	dat_sales_product.quantity
FROM
	dat_sales,dat_sales_product,mst_product
WHERE
	dat_sales.code=dat_sales_product.code_sales
	AND dat_sales_product.code_product=mst_product.code
	AND substr(dat_sales.date,1,4)=?
	AND substr(dat_sales.date,6,2)=?
	AND substr(dat_sales.date,9,2)=?
';
$stmt=$dbh->prepare($sql);
$data[]=$year;
$data[]=$month;
$data[]=$day;
$stmt->execute($data); //命令が終わった時点で、中に全てのデータが入っている。

$dbh = null;

$csv='注文コード,注文日時,会員番号,お名前,メール,郵便番号,住所,TEL,商品コード,商品名,価格,数量';
$csv.="\n";
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	$csv.=$rec['code'];
	$csv.=',';
	$csv.=$rec['date'];
	$csv.=',';
	$csv.=$rec['code_member'];
	$csv.=',';
	$csv.=$rec['dat_sales_name'];
	$csv.=',';
	$csv.=$rec['email'];
	$csv.=',';
	$csv.=$rec['postal1'].'-'.$rec['postal2'];
	$csv.=',';
	$csv.=$rec['address'];
	$csv.=',';
	$csv.=$rec['tel'];
	$csv.=',';
	$csv.=$rec['code_product'];
	$csv.=',';
	$csv.=$rec['mst_product_name'];
	$csv.=',';
	$csv.=$rec['price'];
	$csv.=',';
	$csv.=$rec['quantity'];
	$csv.="\n";
}

//print nl2br($csv);

$file=fopen('./chumon.csv','w'); //同じフォルダ内に書き込みモードで開く。
// $csv=mb_convert_encoding($csv,'SJIS','UTF-8'); //文字コードをShift-JISに変換
fputs($file,$csv);//ファイル書き込み
fclose($file); //ファイルを閉じる

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

<a href="chumon.csv">注文データのダウンロード</a><br />
<br />
<a href="order_download.php">日付選択へ</a><br />
<br />
<a href="../staff_login/staff_top.php">トップメニューへ</a><br />

</body>
</html>