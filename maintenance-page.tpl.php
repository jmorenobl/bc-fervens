<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="fixed <?php print $classes; ?>">
  <div id="bg">
    <div id="bg-t">
      <div class="container-16">
        <div id="site-title" class="grid-7">
          <?php if ($logo): ?>
            <div id="logo">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            </div>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <div id="site-name-slogan">
              <?php if ($site_name): ?>
                <h1 id="site-name">
                  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
                </h1>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <div id="site-slogan">
                  <?php print $site_slogan; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <div class="clear"></div>
        </div>

        <div class="clear"></div>


        <div class="grid-16"><div class="separator"></div></div>
        <div class="clear"></div>


        <div id="main-wrapper">
          <div id="main" class="grid-16">
            <div id="main-content">
              <div class="inner">
                <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                <?php if (!empty($messages)): print $messages; endif; ?>
                <div id="content" class="clearfix">
                  <?php print $content; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>