Installation
------------
1.  Unpack the downloaded file, place the entire theme folder in your Drupal
    installation under any one of the following directory:

      sites/all/themes         - Making it available to the default Drupal site
                                 and to all Drupal sites in a multi-site
                                 configuration.
      sites/default/themes     - Making it available to only the default Drupal
                                 site.
      sites/example.com/themes - Making it available to only the example.com
                                 site if there is a
                                 sites/example.com/settings.php configuration
                                 file.

2.  Log in as administrator on your Drupal site and go to Appearance settings
    (admin/appearance) and set it to the default theme.

Optional
--------
1.  If your theme comes with drop down menu functionality, make sure that every
    menu item is set to Expanded.

      Main menu      - admin/structure/menu/manage/main-menu
      Custom menu    - admin/structure/menu/manage/<menu_name>

    For every menu item, you need to edit and check the option to Expanded.

    Install Superfish Drupal module <http://drupal.org/project/superfish>.

    Enable Superfish block and place it into 'Main menu' block region.

2.  For themes that allow configurable settings, navigate to
    admin/appearance/settings/<theme_name> for more details.

3.  If you're experiencing problems with your theme, kindly visit
    admin/config/development/performance and click on the button
    'Clear cached data' and refresh your web browser.


For theme-related support, enquiries, or other Drupal related services, please
send an email to leow@kahthong.com or visit http://kahthong.com
