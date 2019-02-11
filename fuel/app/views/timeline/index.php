<div>
	<p><?php echo $timeline->title; ?></p>
	<p><?php echo $timeline->body; ?></p>
	<p><?php echo $timeline->user->username; ?></p>
	<p><?php echo date('Y-m-d h:m:s', $timeline->created_at); ?></p>
	<?php if (Arr::get(Auth::get_user_id(), 1) == $timeline->user->id): ?>
		<p><?php echo Html::anchor('timeline/edit/'.$timeline->id, '編集'); ?></p>
		<p><?php echo Html::anchor('timeline/destroy/'.$timeline->id, '投稿を削除する'); ?></p>
	<?php endif; ?>
</div>