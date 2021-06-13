<?php

// ダウンロードするサーバのファイルパス
$filepath = "datacsv/data.csv";
$date = date("Y年m月d日_");
 
// HTTPヘッダを設定
header('Content-Type: application/octet-stream');
header('Content-Length: '.filesize($filepath));
header('Content-Disposition: attachment; filename=<? =$date ?>download.csv');
 
// ファイル出力
readfile($filepath);
?>