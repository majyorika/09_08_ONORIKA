<?php
include('functions.php');

// 入力チェック
if (
    !isset($_POST['namae']) || $_POST['namae']=='' ||
    !isset($_POST['kana']) || $_POST['kana']=='' //||
    // !isset($_POST['gender']) || $_POST['gender']=='' ||
    // !isset($_POST['birth']) || $_POST['birth']=='' ||
    // !isset($_POST['add1']) || $_POST['add1']=='' ||
    // !isset($_POST['phone']) || $_POST['phone']=='' ||
    // !isset($_POST['mail']) || $_POST['mail']=='' ||
    // !isset($_POST['rank']) || $_POST['rank']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$namae = $_POST['namae'];
$kana = $_POST['kana'];
$gender = $_POST['gender'];
$birth = $_POST['birth'];
$youfrom = $_POST['youfrom'];
$postcode = $_POST['postcode'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$phone = $_POST['phone'];
$tels = $_POST['tels'];
$mail = $_POST['mail'];
$mail_flg = $_POST['mail_flg'];
$belong = $_POST['belong'];
$mynum = $_POST['mynum'];
$mem_flg = $_POST['mem_flg'];
$grp = $_POST['grp'];
$comment = $_POST['comment'];

//DB接続
$pdo = db_conn();

//データ登録SQL作成
$sql ='INSERT INTO staff_list (id, namae, kana, gender, birth, youfrom, postcode, add1, add2, phone, tels, mail, mail_flg, belong, mynum, mem_flg, grp, comment)
VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6, :a7, :a8, :a9, :a10, :a11, :a12, :a13, :a14, :a15, :a16, :a17)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $namae, PDO::PARAM_STR);
$stmt->bindValue(':a2', $kana, PDO::PARAM_STR);
$stmt->bindValue(':a3', $gender, PDO::PARAM_STR);
$stmt->bindValue(':a4', $birth, PDO::PARAM_STR);
$stmt->bindValue(':a5', $youfrom, PDO::PARAM_STR);
$stmt->bindValue(':a6', $postcode, PDO::PARAM_INT);
$stmt->bindValue(':a7', $add1, PDO::PARAM_STR);
$stmt->bindValue(':a8', $add2, PDO::PARAM_STR);
$stmt->bindValue(':a9', $phone, PDO::PARAM_STR);
$stmt->bindValue(':a10', $tels, PDO::PARAM_STR);
$stmt->bindValue(':a11', $mail, PDO::PARAM_STR);
$stmt->bindValue(':a12', $mail_flg, PDO::PARAM_STR);
$stmt->bindValue(':a13', $belong, PDO::PARAM_STR);
$stmt->bindValue(':a14', $mynum, PDO::PARAM_STR);
$stmt->bindValue(':a15', $mem_flg, PDO::PARAM_STR);
$stmt->bindValue(':a16', $grp, PDO::PARAM_STR);
$stmt->bindValue(':a17', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //entry.phpへリダイレクト
    header('Location: entry.php');
}
