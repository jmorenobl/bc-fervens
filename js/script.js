Drupal.behaviors.kt_fervens = {
  attach: function(context, settings) {
    (function ($) {
      // Add an 'x' close button and handler to status messages.
      $('.messages').each(function() {
        $(this).prepend('<a class="close" href="#">x</a>');
      });
      $('.messages a.close').click(function(e) {
        e.preventDefault();
        $(this).parent().fadeOut('slow');
      });

      // Wrap current page pager item with <a> element for styling.
      $('.pager li.pager-current, .pager li.pager-ellipsis').wrapInner('<a href="#" />');
      $('.pager li.pager-current a, .pager li.pager-ellipsis a').click(function(e) {
        e.preventDefault();
      });
    })(jQuery);
  },
  detach: function(context, settings) {}
}