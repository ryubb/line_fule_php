<div>
  <ul class="footer_list">
    <?php if (Auth::check()): ?>
      <li class="footer_list-item"><?php echo Html::anchor('user/index', 'マイページ'); ?></li>
      <li class="footer_list-item"><?php echo Html::anchor('base/logout', 'ログアウト'); ?></li>
      <!-- <li class="footer_list-item"><#?php echo Html::anchor('', $login_user->name); ?></li> -->
    <?php else: ?>
      <li class="footer_list-item"><?php echo Html::anchor('base/index', 'トップへ'); ?></li>
      <li class="footer_list-item"><?php echo Html::anchor('base/login', 'ログイン'); ?></li>
    <?php endif; ?>
    <li class="footer_list-item"><?php echo Html::anchor('', 'このサイトについて'); ?></li>
    <li class="footer_list-item"><?php echo Html::anchor('', 'お問い合わせ'); ?></li>
  </ul>
</div>