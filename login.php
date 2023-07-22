<?php
session_start();
require_once('./database.php'); // データベースアクセスファイル読み込み
require_once('./auth.php'); // ログイン認証ファイル読み込み
$errorMessage = ""; // エラーメッセージ初期化
// ログイン処理
if ($_POST['mode']=="login") {
  if(!empty($_POST['form']['email']) && !empty($_POST['form']['password'])){
    if ($account=login($_POST['form']['email'], $_POST['form']['password'])){
      $_SESSION['account'] = $account;
      header("Location: ./login.php");
    // ログイン失敗時の表示
    } else {
      $errorMessage = "ログインに失敗しました。";
    }
  } else {
    $errorMessage = "メールアドレスとパスワードを入力してください。";
  }
}
?>
<?php if($login){ ?>
  echo "ログインしました。";
<?php } else { ?>
  <?php echo $errorMessage; ?>
  <input type="text" name="form[email]" value="" placeholder="メールアドレスを入力して下さい。">
  <input type="password" name="form[password]" value="" placeholder="パスワードを入力して下さい。">
  <input type="hidden" name="mode" value="login">
  <input type="submit" name="login" value="ログイン">
<?php } ?>
