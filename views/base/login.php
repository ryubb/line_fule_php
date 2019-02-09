<div class="flex flex-column alignItems-center">

  <?php if (isset($error)): ?>
    <p>エラーです</p>
  <?php endif; ?>

  <?php echo Form::open('base/login'); ?>

    <p><?php echo Form::label('登録名'); ?></p>
    <p><?php echo Form::input('username'); ?></p>

    <p><?php echo Form::label('パスワード'); ?></p>
    <p><?php echo Form::password('password'); ?></p>

    <?php echo Form::submit('ログイン'); ?>
  <?php echo Form::close(); ?>
</div>