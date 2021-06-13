<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP課題1</title>
</head>

<body>

<form action="write.php" method="post">
	お名前: <input type="text" name="name"><br>
	EMAIL: <input type="text" name="mail">
    <dd class="form-item">質問1: オリンピック開催をどう思いますか?
        <label class="form-label"><input type="radio" name="q1" id="q1_1" value="賛成">賛成</label>
        <label class="form-label"><input type="radio" name="q1" id="q1_2" value="反対">反対</label>
        <label class="form-label"><input type="radio" name="q1" id="q1_3" value="分からない">分からない</label>
    </dd>
    <dd class="form-item">質問2: 観戦者をどの様に取り扱うべきと考えますか?
        <label class="form-label"><input type="radio" name="q2" id="q2_1" value="通常開催">通常開催制</label>
        <label class="form-label"><input type="radio" name="q2" id="q2_2" value="人数制限">人数制限</label>
        <label class="form-label"><input type="radio" name="q2" id="q2_3" value="無観客">無観客</label>
    </dd>
    <dd class="form-item">質問3: 海外観戦者をどの様に取り扱うべきと考えますか?
        <label class="form-label"><input type="radio" name="q3" id="q3_1" value="無制限で受入">無制限で受入</label>
        <label class="form-label"><input type="radio" name="q3" id="q3_2" value="ワクチン接種者限定">ワクチン接種者限定</label>
        <label class="form-label"><input type="radio" name="q3" id="q3_3" value="原則受入不可">原則受入不可</label>
    </dd>
	<input type="submit" value="送信">
</form>


<ul>
	<li><a href="index.php">戻る</a></li>
</ul>

</body>
</html>