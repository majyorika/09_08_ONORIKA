<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
// chk_ssid();

// $menu = menu();

// getで送信されたidを取得
if (!isset($_GET['id'])) {
    exit("Error");
}
$id = $_GET['id'];

//DB接続します
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM staff_list WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    errorMsg($stmt);
} else {
    $rs = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スタッフ更新ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">スタッフ更新</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menu?>
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="select_nologin.php">
            <div class="form-group">
            <label for="id">No.</label>
            <input type="text" class="form-control" id="id" name="id" value="<?=$rs['id']?>" readonly="readonly" disabled="disabled">
        </div>
        <div class="form-group">
            <label for="namae">氏名</label>
            <input type="text" class="form-control" id="namae" name="namae" value="<?=$rs['namae']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="kana">ふりがな</label>
            <input type="text" class="form-control" id="kana" name="kana" value="<?=$rs['kana']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="gender">性別</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?=$rs['gender']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="birth">生年月日</label>
            <input type="date" class="form-control" id="birth" name="birth" value="<?=$rs['birth']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="youfrom">出身地</label>
            <input type="text" class="form-control" id="youfrom" name="youfrom" value="<?=$rs['youfrom']?>" readonly="readonly">
        </div>
        </div>
        <div class="form-group">
            <label for="postcode">郵便番号（7桁）</label>
            <input type="text" class="form-control" id="postcode" name="postcode" size="10" value="<?=$rs['postcode']?>" readonly="readonly" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','add1','add2');">
        </div>
        <div class="form-group">
            <label for="add1">都道府県</label>
            <input type="text" class="form-control" id="add1" name="add1" size="20" value="<?=$rs['add1']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="add2">以降の住所</label>
            <input type="text" class="form-control" id="add2" name="add2" size="60" value="<?=$rs['add2']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="phone">携帯電話番号</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?=$rs['phone']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="tels">固定電話番号</label>
            <input type="tel" class="form-control" id="tels" name="tels" value="<?=$rs['tels']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="mail">メールアドレス</label>
            <input type="email" class="form-control" id="mail" name="mail" value="<?=$rs['mail']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="mail_flg">メール送信</label>
            <input type="checkbox" class="form-control" id="mail_flg" name="mail_flg" value="checked" <?=$rs['mail_flg']?> disabled="disabled">
        </div>
        <div class="form-group">
            <label for="belong">所属</label>
            <input type="text" class="form-control" id="belong" name="belong" value="<?=$rs['belong']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="mynum">マイナンバー</label>
            <input type="number" class="form-control" id="mynum" name="mynum" size="10" maxlength="12" value="<?=$rs['mynum']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="mem_flg">登録解除</label>
            <input type="checkbox" class="form-control" id="mem_flg" name="mem_flg" value="checked" <?=$rs['mem_flg']?> disabled="disabled">
        </div>
        <div class="form-group">
            <label for="grp">区分</label>
            <input type="text" class="form-control" id="grp" name="grp" value="<?=$rs['grp']?>" readonly="readonly">
        </div>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" readonly="readonly"><?=$rs['comment']?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">戻る</button>
        </div>
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>