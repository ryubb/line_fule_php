<div>
  <?php foreach($users as $user): ?>
    <p>ユーザー名: <?php echo $user->username; ?></p>
    <p>登録日: <?php echo $user->email; ?></p>
    <hr>
  <?php endforeach;?>
</div>