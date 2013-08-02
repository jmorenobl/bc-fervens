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

/**
 *  implementation of theme_shoutbox_post()
 */
function kt_fervens_shoutbox_post($variables) {
  /*global $user;

//  print theme('user_picture', array('account' =>$user));

 //convert timestamp to time ago
  $post_time_ago = time_ago($shout->created);
  
  //load user image and format
   
   $author_picture ='';
   $shout_author =  $user;

      if(($shout_author->picture == '' ) && (variable_get('user_picture_default', '') != '')){
      $shout_author->picture =  variable_get('user_picture_default', '');
      }
      $author_picture ='';
      if($shout_author->picture != ''){
     $author_picture = theme('user_picture', array('account' =>$user));
     }
   
  return "<div class=\" $shout_classes \" title=\"$title\">
		<div class=\"shoutbox-admin-links\">$img_links</div>
		<div class=\"shoutbox-post-info\">"
			.$author_picture.
			"<span class=\"shoutbox-user-name $user_class\">$user_name</span>
			<span class=\"shoutbox-msg-time\">" . $post_time_ago . " ".t('ago')."</span>
		</div>
		<div class=\"shout-message\"> $shout->shout</div>
	</div>\n";*/

  $shout = $variables['shout'];
  $links = $variables['links'];

  global $user;
  $img_links = '';
  // Gather moderation links
  if ($links) {
    foreach ($links as $link) {
      $link_html = '<img src="' . $link['img'] . '"  width="' . $link['img_width'] . '" height="' . $link['img_height'] . '" alt="' . $link['title'] . '" class="shoutbox-imglink"/>';
      $link_url = 'shout/' . $shout->shout_id . '/' . $link['action'];
      $img_links = l($link_html, $link_url, array('html' => TRUE, 'query' => array('destination' => drupal_get_path_alias($_GET['q'])))) . $img_links;
    }
  }

  // Generate user name with link
  $user_name = shoutbox_get_user_link($shout);

  // Generate the user picture
  $author_picture = theme('user_picture', array('account' =>$user));

  // Generate title attribute
  $title = t('Posted !date at !time by !name', array('!date' => format_date($shout->created, 'custom', 'm/d/y'), '!time' => format_date($shout->created, 'custom', 'h:ia'), '!name' => $shout->nick));

  // Add to the shout classes
  $shout_classes = array();
  $shout_classes[] = 'shoutbox-msg';

  // Check for moderation
  $approval_message = NULL;
  if ($shout->moderate == 1) {
    $shout_classes[] = 'shoutbox-unpublished';
    $approval_message = '&nbsp;(' . t('This shout is waiting for approval by a moderator.') . ')';
  }

  // Check for specific user class
  $user_classes = array();
  $user_classes[] = 'shoutbox-user-name';
  if ($shout->uid == $user->uid) {
    $user_classes[] = 'shoutbox-current-user-name';
  }
  else if ($shout->uid == 0) {
    $user_classes[] = 'shoutbox-anonymous-user';
  }

  // Build the post
  $post = '';
  $post .= '<div class="' . implode(' ', $shout_classes) . '" title="' . $title . '">';
  $post .= '<div class="shoutbox-admin-links">' . $img_links . '</div>';
  $post .= $author_picture;
  $post .= '<div class="' . implode(' ', $user_classes) . '">' . $user_name . ' says:&nbsp;</div>';
  $post .= '<div class="shoutbox-shout">' . $shout->shout . $approval_message . '</div>';
  $post .= '<div class="shoutbox-msg-time">';
  $format = variable_get('shoutbox_time_format', 'ago');
  switch ($format) {
    case 'ago':
      $post .=  t('!interval ago', array('!interval' => format_interval(REQUEST_TIME - $shout->created)));
      break;
    case 'small':
    case 'medium':
    case 'large':
      $post .= format_date($shout->created, $format);
      break;
  }
  $post .= '</div>';
  $post .= '</div>' . "\n";

  return $post;
}

function kt_fervens_gmap($element) {
  if (isset($element['element']['#gmap_settings'])) {
    $offset = 0.0001;
    $markers =& $element['element']['#gmap_settings']['markers'];

    for ($outer=0; $outer < count($markers); $outer++) {
      $cc=0;
      $outer_place =& $markers[$outer];
      for ($inner = $outer+1; $inner < count($markers); $inner++) {
        $inner_place =& $markers[$inner];
        if ($outer_place['latitude'] == $inner_place['latitude'] &&
            $outer_place['longitude'] == $inner_place['longitude']) {
          $cc++;
          // nudge the location of the inner place
          $inner_place['latitude'] += -$offset*sqrt($cc)*sin($cc*45);
          $inner_place['longitude'] += -$offset*sqrt($cc)*cos($cc*45);
        }
      }
    }
  }
  return theme_gmap($element);
}
