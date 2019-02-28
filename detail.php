<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();

$menu = menu();

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

    <form method="post" action="update.php">
            <div class="form-group">
            <label for="id">No.</label>
            <input type="text" class="form-control" id="id" name="id" value="<?=$rs['id']?>" readonly="readonly" disabled="disabled">
        </div>
        <div class="form-group">
            <label for="namae">氏名</label>
            <input type="text" class="form-control" id="namae" name="namae" value="<?=$rs['namae']?>">
        </div>
        <div class="form-group">
            <label for="kana">ふりがな</label>
            <input type="text" class="form-control" id="kana" name="kana" value="<?=$rs['kana']?>">
        </div>
        <div class="form-group">
            <label for="gender">性別</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?=$rs['gender']?>">
        </div>
        <div class="form-group">
            <label for="birth">生年月日</label>
            <input type="date" class="form-control" id="birth" name="birth" value="<?=$rs['birth']?>">
        </div>
        <div class="form-group">
            <p>現在登録されてる出身地：<?=$rs['youfrom']?></p>
        <label for="youfrom">出身地</label>
        <select class="form-control" id="youfrom" name="youfrom">
            <option value="" selected>都道府県</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select>
        </div>
        <div class="form-group">
            <label for="postcode">郵便番号（7桁）</label>
            <input type="text" class="form-control" id="postcode" name="postcode" size="10" value="<?=$rs['postcode']?>" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','add1','add2');">
        </div>
        <div class="form-group">
            <label for="add1">都道府県</label>
            <input type="text" class="form-control" id="add1" name="add1" size="20" value="<?=$rs['add1']?>">
        </div>
        <div class="form-group">
            <label for="add2">以降の住所</label>
            <input type="text" class="form-control" id="add2" name="add2" size="60" value="<?=$rs['add2']?>">
        </div>
        <div class="form-group">
            <label for="phone">携帯電話番号</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?=$rs['phone']?>">
        </div>
        <div class="form-group">
            <label for="tels">固定電話番号</label>
            <input type="tel" class="form-control" id="tels" name="tels" value="<?=$rs['tels']?>">
        </div>
        <div class="form-group">
            <label for="mail">メールアドレス</label>
            <input type="email" class="form-control" id="mail" name="mail" value="<?=$rs['mail']?>">
        </div>
        <div class="form-group">
            <p>メール送信の有無：
            <input type="checkbox" class="form-control" <?=$rs['mail_flg']?> disabled="disabled"></p>
            <label for="mail_flg">メール送信</label>
            <input type="checkbox" class="form-control" id="mail_flg" name="mail_flg" value="checked" checked="checked">必要
        </div>
        <div class="form-group">
            <label for="belong">所属</label>
            <input type="text" class="form-control" id="belong" name="belong" value="<?=$rs['belong']?>">
        </div>
        <div class="form-group">
            <label for="mynum">マイナンバー</label>
            <input type="number" class="form-control" id="mynum" name="mynum" size="10" maxlength="12" value="<?=$rs['mynum']?>">
        </div>
        <div class="form-group">
            <p>現在の登録解除の有無：
            <input type="checkbox" class="form-control" <?=$rs['mem_flg']?> disabled="disabled"></p>
            <label for="mem_flg">登録解除</label>
            <input type="checkbox" class="form-control" id="mem_flg" name="mem_flg" value="<?=$rs['mem_flg']?>">解除する場合はチェックを入れる
        </div>
        <div class="form-group">
            <label for="now_grp">現在の区分</label>
            <input type="text" class="form-control" id="now_grp" name="now_grp" value="<?=$rs['grp']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="grp">区分</label>
            <select class="form-control" id="grp" name="grp">
            <option value="アルバイト">アルバイト</option>
            <option value="正社員">正社員</option>
            <option value="契約社員">契約社員</option>
            <option value="パート">パート</option>
            <option value="経営者">経営者</option>
            <option value="その他">その他</option>
        </select>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"><?=$rs['comment']?></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>