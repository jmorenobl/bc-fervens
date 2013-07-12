<?php

/**
 * Implements template_preprocess_html().
 */
function kt_fervens_preprocess_html(&$vars) {
  // Add language direction to classes.
  $vars['classes_array'][] = $vars['language']->dir;

  // Theme settings.
  if (theme_get_setting('layout_type') != '') {
    $vars['classes_array'][] = theme_get_setting('layout_type');
  }
  if (theme_get_setting('layout_column_type') != '') {
    $vars['classes_array'][] = theme_get_setting('layout_column_type');
  }
}

/**
 * Implements template_preprocess_page().
 */
function kt_fervens_preprocess_page(&$vars) {
  // Determine the main content column grid.
  if (!$vars['page']['sidebar_first'] && !$vars['page']['sidebar_second']) {
    $vars['main_grid'] = 'grid-16';
  }
  else {
    if ($vars['page']['sidebar_first'] && !$vars['page']['sidebar_second']) {
      $vars['main_grid'] = 'grid-13';
    }
    elseif (!$vars['page']['sidebar_first'] && $vars['page']['sidebar_second']) {
      $vars['main_grid'] = 'grid-11';
    }
    else {
      $vars['main_grid'] = 'grid-8';
    }
  }

  // Theme credits, acknowledge contribution.
  // I would appreciate if you could leave this credits in the footer section.
  $vars['credits'] = t('Fervens was created by !design_disease for WordPress, brought to you by !smashing_magazine.<br />Ported to Drupal by !kahthong - Freelance Drupal Developer.', array('!design_disease' => l('Design Disease', 'http://designdisease.com'), '!smashing_magazine' => l('Smashing Magazine', 'http://smashingmagazine.com'), '!kahthong' => l('Leow Kah Thong', 'http://kahthong.com')));
}

/**
 * Implements template_preprocess_block().
 */
function kt_fervens_preprocess_block(&$vars) {
  // Adds 'first' and 'last' class to blocks for styling.
  $block_count = count(block_list($vars['block']->region));

  if ($vars['block_id'] == 1 || $block_count == 1) {
    $vars['classes_array'][] = 'block-first';
  }
  if ($vars['block_id'] == $block_count) {
    $vars['classes_array'][] = 'block-last';
  }
}

/**
 * Implements theme_feed_icon().
 */
function kt_fervens_feed_icon($variables) {
  // Change feed icon.
  $text = t('Subscribe to @feed-title', array('@feed-title' => $variables['title']));
  if ($image = theme('image', array('path' => path_to_theme() . '/images/feed.png', 'width' => 16, 'height' => 16, 'alt' => $text))) {
    return l($image, $variables['url'], array('html' => TRUE, 'attributes' => array('class' => array('feed-icon'), 'title' => $text)));
  }
}