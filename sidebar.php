<aside id="sidebar">

  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Default Sidebar')) : else : ?>
  
    <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

    <?php get_search_form(); ?>

    <h2><?php _e('Archives','textdomain'); ?></h2>
    <ul>
        <?php wp_get_archives('type=monthly'); ?>
    </ul>
        
    <h2><?php _e('Meta','textdomain'); ?></h2>
    <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.','textdomain'); ?>"><?php _e('WordPress','textdomain'); ?></a></li>
        <?php wp_meta(); ?>
    </ul>
    
    <h2><?php _e('Subscribe','textdomain'); ?></h2>
    <ul>
        <li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)','textdomain'); ?></a></li>
        <li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)','textdomain'); ?></a></li>
    </ul>
  
  <?php endif; ?>

</aside>