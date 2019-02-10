<div>
  <h3>登録情報</h3>
  <p><?php echo $user->username; ?></p>
  <p><?php echo $user->email; ?></p>
  <p><?php echo date('Y-m-d h:m:s', $user->created_at); ?></p>
  <p><?php echo Html::anchor('user/edit/'.$user->id, '設定変更') ?></p>
  <p><?php echo Html::anchor('user/destroy/'.$user->id, '削除', array('id' => 'destroy')); ?></p>
</div>