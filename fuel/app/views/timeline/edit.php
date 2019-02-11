<div>
	<?php echo Form::open('timeline/update'); ?>
		<p><?php echo Form::label('タイトル'); ?>：
		<?php echo Form::input('title', $timeline->title) ?></p>

		<p><?php echo Form::label('本文'); ?>：
		<?php echo Form::input('body', $timeline->body) ?></p>

		<?php echo Form::submit('name', '編集'); ?>
	<?php echo Form::close(); ?>
</div>