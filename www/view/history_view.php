<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴一覧</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($historys) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>注文金額</th>
            <th>購入明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($historys as $history){ ?>
          <tr>
            <td><?php print(h($history['history_id'])); ?></td>
            <td><?php print($history['created']); ?></td>
            <td><?php print(number_format($history['total'])); ?>円</td>
            <td>
              <form method="post" action="details.php">
                <input type="submit" value="明細表示" class="btn btn-secondary">
                <input type="hidden" name="history_id" value="<?php print($history['history_id']); ?>">
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>購入履歴がありません</p>
    <?php } ?>
  </div>
</body>
</html>