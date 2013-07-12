<div id="comments" class="<?php print $classes; ?><?php print ($display_mode == COMMENT_MODE_FLAT) ? ' comments-flat' : ''; ?><?php print ($display_mode == COMMENT_MODE_THREADED) ? ' comments-threaded' : ''; ?>"<?php print $attributes; ?>>
  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    <h2 class="comments-title title">
      <?php if ($node->comment == 1 || $node->comment == 2): ?>
        <?php if ($node->comment_count == 0): ?>
          <?php print t('No comments for \'@title\'', array('@title' => $node->title)); ?>
        <?php else: ?>
          <?php print t('@comments for \'@title\'', array('@comments' => format_plural($node->comment_count, '1 comment', '@count comments'), '@title' => $node->title)); ?>
        <?php endif; ?>
      <?php endif; ?>
    </h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <div class="comments-content">
    <?php print render($content['comments']); ?>

    <?php if ($content['comment_form']): ?>
      <h2 class="title comment-form"><?php print t('Add new comment'); ?></h2>
      <?php print render($content['comment_form']); ?>
    <?php endif; ?>
  </div>
</div>
