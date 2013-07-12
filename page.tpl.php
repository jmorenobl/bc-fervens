<div id="bg">
  <div id="bg-t">
    <div class="container-16">
      <div id="site-title" class="grid-8">
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

      <?php if ($page['header']): ?>
        <div id="header" class="grid-8">
          <?php print render($page['header']); ?>
        </div>
      <?php endif; ?>

      <div class="clear"></div>


      <div class="grid-16"><div class="separator"></div></div>
      <div class="clear"></div>


      <?php if ($page['main_menu']): ?>
        <div id="main-menu" class="grid-16">
          <?php print render($page['main_menu']); ?>
        </div>
        <div class="clear"></div>
      <?php endif; ?>


      <div id="main-wrapper">
        <?php if (theme_get_setting('layout_column_type') == 'fervens-b'): ?>
          <?php include_once '_sidebar-first.tpl.php'; ?>
          <?php include_once '_sidebar-second.tpl.php'; ?>
          <?php include_once '_main.tpl.php'; ?>
        <?php elseif (theme_get_setting('layout_column_type') == 'fervens-c'): ?>
          <?php include_once '_main.tpl.php'; ?>
          <?php include_once '_sidebar-first.tpl.php'; ?>
          <?php include_once '_sidebar-second.tpl.php'; ?>
        <?php else: ?>
          <?php include_once '_sidebar-first.tpl.php'; ?>
          <?php include_once '_main.tpl.php'; ?>
          <?php include_once '_sidebar-second.tpl.php'; ?>
        <?php endif; ?>

        <div class="clear"></div>
      </div>


      <div class="grid-16"><div class="separator"></div></div>
      <div class="clear"></div>


      <?php if ($page['footer']): ?>
        <div id="footer" class="grid-16">
          <?php print render($page['footer']); ?>
        </div>
        <div class="clear"></div>
      <?php endif; ?>

      <?php if ($credits): ?>
        <div id="credits" class="grid-16">
          <?php print $credits; ?>
        </div>
        <div class="clear"></div>
      <?php endif; ?>
    </div>
  </div>
</div>
