<div id="<?php print $block_html_id; ?>" class="clearfix <?php print $classes; ?> <?php print "block-global-$id"; ?> <?php print "block-$block_id"; ?> <?php print "block-$block_zebra"; ?> <?php print "block-$block->region"; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2 class="block-subject"<?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="block-content content"<?php print $content_attributes; ?>>
    <?php print $content; ?>
  </div>
</div>
