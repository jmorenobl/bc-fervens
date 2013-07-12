<div id="main" class="<?php print $main_grid; ?>">
  <div id="main-content">
    <div class="inner">
      <a id="main-content"></a>
      <?php if ($breadcrumb): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
      <?php if ($page['help']): ?>
        <div id="help">
          <?php print render($page['help']); ?>
        </div>
      <?php endif; ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <div id="content">
        <?php print render($page['content']); ?>
      </div>
      <?php print $feed_icons; ?>
    </div>
  </div>

  <?php if ($page['content_bottom']): ?>
    <div id="content-bottom">
      <div class="inner">
        <?php print render($page['content_bottom']); ?>
      </div>
    </div>
  <?php endif; ?>
</div>