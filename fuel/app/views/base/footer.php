<div>
  <ul class="footer_list">
    <?php if (Auth::check()): ?>
      <li class="footer_list-item"><?php echo Html::anchor('user/view/', 'マイページ('.Auth::get('username').')'); ?></li>
      <li class="footer_list-item"><?php echo Html::anchor('base/logout', 'ログアウト'); ?></li>
    <?php else: ?>
      <li class="footer_list-item"><?php echo Html::anchor('base/index', 'トップへ'); ?></li>
      <li class="footer_list-item"><?php echo Html::anchor('base/login', 'ログイン'); ?></li>
    <?php endif; ?>
    <li class="footer_list-item"><?php echo Html::anchor('base/about', 'このサイトについて'); ?></li>
    <li class="footer_list-item"><?php echo Html::anchor('base/contact', 'お問い合わせ'); ?></li>
  </ul>
</div>