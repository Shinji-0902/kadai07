<?php
$name =$_POST["name"];
$mail =$_POST["mail"];
$q1 =$_POST["q1"];
$q2 =$_POST["q2"];
$q3 =$_POST["q3"];

function h ($value) {
    return htmlspecialchars($value,ENT_QUOTES);
    }

//文字列作成
$data = array(h($name),h($mail),h($q1),h($q2),h($q3));

//.csv FILEにデータを保存する処理
$file = fopen("datacsv/data.csv","a"); //対象のファイルを追加書き込み目的で開く

$line = implode(',' , $data);
fwrite($file, $line . "\n");

fclose($file); //ファイルを閉じる
?>


<html>
<head>
    <meta charset="utf-8">
    <title>CSVファイルに書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
    <li><a href="index.php">戻る</a></li>
</ul>

</body>
</html>