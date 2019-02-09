<div class="flex flex-column alignItems-center form">
  <?php echo Form::open('user/create'); ?>

    <p><?php echo Form::label('登録名'); ?></p>
    <p><?php echo Form::input('username'); ?></p>

    <p><?php echo Form::label('名前'); ?></p>
    <p><?php echo Form::input('name'); ?></p>

    <p><?php echo Form::label('メールアドレス'); ?></p>
    <p><?php echo Form::input('email'); ?></p>

    <p><?php echo Form::label('パスワード'); ?></p>
    <p><?php echo Form::password('password'); ?></p>

    <p><?php echo Form::submit('登録') ?></p>
  <?php echo Form::close(); ?>
</div>