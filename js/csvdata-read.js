//*** csvdata-read.js CSVデータ読み込み ***//

// 3) CSVから２次元配列に変換
function csv2Array(str) {
    var csvData = [];
    var cmt = /^\*/;          //行の先頭文字に*（半角）がある場合コメント行
    str = str.replace(/\r\n/g, '\n');     // 追加 CRを削除 
    str = str.replace(/\n+/g, '\n');      // 追加 空行を削除
    //str = str.replace(/\s+,|,\s+/g, ','); // 追加 不要な空白を削除
    var lines = str.split("\n");
    for (var i = 0; i < lines.length; ++i) { 
      var li = lines[i];
      var cells = lines[i].split(",");
      if(li.match(cmt)){       //コメント行判定
          continue;        //コメント行スキップ
         }    
      csvData.push(cells);
    }
    return csvData;
  }
  
  //メイン関数csvdata
  function csvdata(func,fl) {    // func：Chartクラス関数名 fl：CSVファイルのURL
    // 1) ajaxでCSVファイルをロード
    var req = new XMLHttpRequest();
    var filePath = fl;  // fl CSVファイル名（URL)
    req.open("GET", filePath, true);
    req.onload = function() {
      // 2) CSVデータ変換の呼び出し
      data = csv2Array(req.responseText);
      // 4) chart.js描画のChartクラス関数へリターンし、CSVデータを渡す
      func(data);     
    }
    req.send(null);
  }