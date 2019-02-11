<div>
  <div class="flex">
    <?php echo $pagination ?>
    <div class="flex">
      <?php echo Form::open(array('url' => 'user/show', 'method' => 'GET')); ?>
        <?php echo Form::label('友達検索'); ?>
        <?php echo Form::input('search'); ?>
        <?php echo Form::submit('name', '検索'); ?>
      <?php echo Form::close(); ?>
    </div>
  </div>
  <?php foreach($users as $user): ?>
    <p>ユーザー名: <?php echo Html::anchor('user/view/'.$user['id'] ,$user['username']); ?> <?php echo Html::anchor('javascript:void(0);','友達追加'); ?></p>
    <p>登録日: <?php echo date('Y-m-d H:m:s', $user['created_at']); ?></p>
    <hr>
  <?php endforeach;?>
  <?php echo $pagination ?>
</div>