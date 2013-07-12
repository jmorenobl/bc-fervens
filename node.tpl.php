<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> <?php print "node-$zebra"; ?> clearfix"<?php print $attributes; ?>>
  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2 class="node-title"<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
      <?php //print t('Submitted on !date by !author', array('!date' => format_date($created, 'medium'), '!author' => $name)); ?>
    </div>
  <?php endif; ?>

  <div class="node-content content"<?php print $content_attributes; ?>>
    <?php
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    print render($content);
    ?>
  </div>

  <?php if ($content['field_tags']): ?>
    <div class="node-tags clearfix">
      <?php print render($content['field_tags']); ?>
    </div>
  <?php endif; ?>

  <?php if ($content['links']): ?>
    <div class="node-links skele-reset-list clearfix">
      <?php print render($content['links']); ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>
</div>
