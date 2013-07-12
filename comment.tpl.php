<div id="comment-<?php print $comment->cid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print $picture; ?>

  <?php if ($new): ?>
    <span class="new"><?php print $new; ?></span>
  <?php endif; ?>

  <?php print render($title_prefix); ?>
  <h3 class="comment-title"<?php print $title_attributes; ?>><?php print $title; ?></h3>
  <?php print render($title_suffix); ?>

  <?php if ($submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
      <?php //print t('Submitted on !date by !author', array('!date' => format_date($comment->created, 'medium'), '!author' => $author)); ?>
      <?php print $permalink; ?>
    </div>
  <?php endif; ?>

  <div class="comment-content content"<?php print $content_attributes; ?>>
    <?php
    hide($content['links']);
    print render($content);
    ?>
    <?php if ($signature): ?>
      <div class="user-signature clearfix">
        <?php print $signature; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($content['links']): ?>
    <div class="comment-links skele-reset-list clearfix">
      <?php print render($content['links']); ?>
    </div>
  <?php endif; ?>
</div>
