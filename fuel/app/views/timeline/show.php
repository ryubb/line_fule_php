<div>
	<div class="flex">
		<div>
			<?php echo $pagination; ?>
		</div>
		<div>
			<?php echo Form::open(array('url' =>'timeline/show', 'method' => 'get')); ?>
				<?php echo Form::hidden('only_myself', Arr::get(Auth::get_user_id(), 1)); ?>
				<?php echo Form::submit('name', '自分の投稿を絞り込む'); ?>
			<?php echo Form::close(); ?>
		</div>
	</div>
	<div>
		<?php echo Form::open('timeline/create'); ?>
			<p>
				<?php echo Form::label('タイトル'); ?>
				<?php echo Form::input('title'); ?>
			</p>

			<p>
				<?php echo Form::label('本文'); ?>
				<?php echo Form::input('body'); ?>
			</p>

			<p><?php echo Form::submit('name', '投稿する'); ?></p>
			<?php echo Form::close(); ?>
	</div>
	<?php foreach ($timelines as $timeline): ?>
		<p><?php echo Html::anchor('timeline/index/'.$timeline['id'], $timeline['title']); ?></p>
		<p><?php echo $timeline['body']; ?></p>
		<p><?php echo Model_User::find($timeline['user_id'])->username; ?></p>
		<p><?php echo date('Y-m-d h:m:s', $timeline['created_at']); ?></p>
		<hr>
	<?php endforeach ?>
	<?php echo $pagination; ?>
</div>