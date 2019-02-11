<div class="flex flex-column alignItems-center form">
  <?php echo Form::open('user/update/'.$user->id); ?>

    <p><?php echo Form::label('登録名'); ?></p>
    <p><?php echo Form::input('username', $user->username); ?></p>

    <p><?php echo Form::label('メールアドレス'); ?></p>
    <p><?php echo Form::input('email', $user->email); ?></p>

    <p><?php echo Form::label('パスワード'); ?></p>
    <p><?php echo Form::password('password'); ?></p>

    <p><?php echo Form::submit('登録') ?></p>
  <?php echo Form::close(); ?>
</div>