<?php
$file = "datacsv/data.csv";
if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
    echo "<table class='common'>\n";
    while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
        echo "\t<tr class='common'>\n";
        for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t\t<td class='common'>{$data[$i]}</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    fclose ( $handle );
}

$file1 = fopen("datacsv/data.csv","r"); //対象のファイルを読み込み目的で開く

$allstr = file_get_contents("datacsv/data.csv");
$count_q11 = substr_count($allstr, '賛成');
$count_q12 = substr_count($allstr, '反対');
$count_q13 = substr_count($allstr, '分からない');
$count_q21 = substr_count($allstr, '通常開催');
$count_q22 = substr_count($allstr, '人数制限');
$count_q23 = substr_count($allstr, '無観客');
$count_q31 = substr_count($allstr, '無制限で受入');
$count_q32 = substr_count($allstr, 'ワクチン接種者限定');
$count_q33 = substr_count($allstr, '原則受入不可');

$file2 = fopen("datacsv/pie-data.csv","w+"); //内容をまず削除、ファイルがなければ作成
$file3 = fopen("datacsv/pie-data2.csv","w+"); //内容をまず削除、ファイルがなければ作成
$file4 = fopen("datacsv/pie-data3.csv","w+"); //内容をまず削除、ファイルがなければ作成

$data_q11 = array('賛成',$count_q11);
$data_q12 = array('反対',$count_q12);
$data_q13 = array('分からない',$count_q13);
$data_q21 = array('通常開催',$count_q21);
$data_q22 = array('人数制限',$count_q22);
$data_q23 = array('無観客',$count_q23);
$data_q31 = array('無制限で受入',$count_q31);
$data_q32 = array('ワクチン接種者限定',$count_q32);
$data_q33 = array('原則受入不可',$count_q33);

$line_q11 = implode(',' , $data_q11);
$line_q12 = implode(',' , $data_q12);
$line_q13 = implode(',' , $data_q13);
$line_q21 = implode(',' , $data_q21);
$line_q22 = implode(',' , $data_q22);
$line_q23 = implode(',' , $data_q23);
$line_q31 = implode(',' , $data_q31);
$line_q32 = implode(',' , $data_q32);
$line_q33 = implode(',' , $data_q33);

fwrite($file2, $line_q11 . "\n");
fwrite($file2, $line_q12 . "\n");
fwrite($file2, $line_q13 . "\n");
fwrite($file3, $line_q21 . "\n");
fwrite($file3, $line_q22 . "\n");
fwrite($file3, $line_q23 . "\n");
fwrite($file4, $line_q31 . "\n");
fwrite($file4, $line_q32 . "\n");
fwrite($file4, $line_q33 . "\n");

fclose($file1); //ファイルを閉じる
fclose($file2); //ファイルを閉じる
fclose($file3); //ファイルを閉じる
fclose($file4); //ファイルを閉じる
?>


<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <!-- CSVデータ読み込みjs -->
    <script src="js/csvdata-read.js"></script>
</head>
<body>

<a href="csv.php">
    <button class="button" id="csv">CSVファイルダウンロード</button>
</a>

 <!--ここにグラフが挿入されます-->
 <div class="chart" style="width: 30%;">
    <canvas id="myPieChart1"></canvas>
    <canvas id="myPieChart2"></canvas>
    <canvas id="myPieChart3"></canvas>
 </div>

<script>
function drawPieChart1(data) {
  // 2)chart.jsのdataset用の配列を用意
  var tmpLabels = [], tmpData1 = [];
  for (var row in data) {
    tmpLabels.push(data[row][0]) // 
    tmpData1.push(data[row][1])  //
   };

    //var last = tmpLabels.slice(-1); alert("L" + last);
    //if(last == ","){  alert(last);
    //alert(tmpLabels.tailCut(",")); // と表示される。
 
    //tmpLabels = tmpLabels.slice( 0, -1 ) ;
    //  }
  // 3)chart.jsで描画
  var ctx1 = document.getElementById("myPieChart1");  //.getContext("2d");

  var myPieChart1 = new Chart(ctx1, {

  //グラフの種類
  type: 'pie',
  //データの設定
  data: {
      // 3 データ項目のラベル
      labels: tmpLabels, //["Red", "Green", "Yellow"],
      //データセット
      datasets: [{
          //背景色
          backgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //背景色(ホバーしたとき)
          hoverBackgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //グラフのデータ
          data: tmpData1,  //[300, 50, 100]

      }]
   },
          //オプションの設定
          options: {
	     responsive: true,
             title: {
                 display: true,
                 text: '質問1：オリンピック開催をどう思いますか?'
                }


			},
        // plugins: [dataLabelPlugin], // 
   });

}

function drawPieChart2(data) {
  // 2)chart.jsのdataset用の配列を用意
  var tmpLabels = [], tmpData1 = [];
  for (var row in data) {
    tmpLabels.push(data[row][0]) // 
    tmpData1.push(data[row][1])  //
   };

    //var last = tmpLabels.slice(-1); alert("L" + last);
    //if(last == ","){  alert(last);
    //alert(tmpLabels.tailCut(",")); // と表示される。
 
    //tmpLabels = tmpLabels.slice( 0, -1 ) ;
    //  }
  // 3)chart.jsで描画
  var ctx2 = document.getElementById("myPieChart2");  //.getContext("2d");

  var myPieChart2 = new Chart(ctx2, {

  //グラフの種類
  type: 'pie',
  //データの設定
  data: {
      // 3 データ項目のラベル
      labels: tmpLabels, //["Red", "Green", "Yellow"],
      //データセット
      datasets: [{
          //背景色
          backgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //背景色(ホバーしたとき)
          hoverBackgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //グラフのデータ
          data: tmpData1,  //[300, 50, 100]

      }]
   },
          //オプションの設定
          options: {
	     responsive: true,
             title: {
                 display: true,
                 text: '質問2: 観戦者をどの様に取り扱うべきと考えますか?'
                }


			},
        // plugins: [dataLabelPlugin], // 
   });

}

function drawPieChart3(data) {
  // 2)chart.jsのdataset用の配列を用意
  var tmpLabels = [], tmpData1 = [];
  for (var row in data) {
    tmpLabels.push(data[row][0]) // 
    tmpData1.push(data[row][1])  //
   };

    //var last = tmpLabels.slice(-1); alert("L" + last);
    //if(last == ","){  alert(last);
    //alert(tmpLabels.tailCut(",")); // と表示される。
 
    //tmpLabels = tmpLabels.slice( 0, -1 ) ;
    //  }
  // 3)chart.jsで描画
  var ctx3 = document.getElementById("myPieChart3");  //.getContext("2d");

  var myPieChart3 = new Chart(ctx3, {

  //グラフの種類
  type: 'pie',
  //データの設定
  data: {
      // 3 データ項目のラベル
      labels: tmpLabels, //["Red", "Green", "Yellow"],
      //データセット
      datasets: [{
          //背景色
          backgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //背景色(ホバーしたとき)
          hoverBackgroundColor: [
              "#FF6384",
              "#36A2EB",
              "#FFCE56"
          ],
          //グラフのデータ
          data: tmpData1,  //[300, 50, 100]

      }]
   },
          //オプションの設定
          options: {
	     responsive: true,
             title: {
                 display: true,
                 text: '質問3: 海外観戦者をどの様に取り扱うべきと考えますか?'
                }


			},
        // plugins: [dataLabelPlugin], // 
   });

}

csvdata(drawPieChart1,"datacsv/pie-data.csv"); // 1)CSVデータ読み込み関数csvdata起動
csvdata(drawPieChart2,"datacsv/pie-data2.csv"); // 1)CSVデータ読み込み関数csvdata起動
csvdata(drawPieChart3,"datacsv/pie-data3.csv"); // 1)CSVデータ読み込み関数csvdata起動
</script>
</body>
</html>


