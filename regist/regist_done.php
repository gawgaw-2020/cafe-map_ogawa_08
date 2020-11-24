<?php

require_once (dirname(__FILE__) . '/../assets/functions/common.php');

// ページ情報
$pagerole = 'regist';
define("title", "ユーザー登録完了");

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$hashpass = password_hash($user_password, PASSWORD_DEFAULT);


try {

  require_once (dirname(__FILE__) . '/../assets/functions/dbconnect.php');

  $stmt = $dbh->prepare("INSERT INTO users ( user_name, user_email, user_password, user_date ) VALUES( :a1, :a2, :a3, sysdate() )");
  $stmt->bindValue(':a1', $user_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a2', $user_email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':a3', $hashpass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  
  $dbh = null;

} catch(PDOException $e) {
  echo $e->getMessage();
  print 'データベースの接続に失敗しました。';
  exit();
}

?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_head.php'); ?>
<?php include(dirname(__FILE__) . '/../assets/_inc/_header.php'); ?>

<main class="main">
  <div class="section-container">
    <section class="regist-done">
      <div class="section-inner">
        <h1 class="level1-heading">朝活ユーザー登録</h1>
        <div class="registration-steps">
          <div class="registration-steps_step">
            <div class="num">1</div>
            <div class="text">ユーザー情報入力</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step">
            <div class="num">2</div>
            <div class="text">ユーザー情報確認</div>
          </div>
          <div class="registration-steps_line"></div>
          <div class="registration-steps_step -active">
            <div class="num">3</div>
            <div class="text">ユーザー登録完了</div>
          </div>
        </div>
        <p class="regist__text">完了しました。</p>
      </div>
    </section>
  </div>
</main>

<?php include(dirname(__FILE__) . '/../assets/_inc/_footer.php'); ?>

</body>

</html>