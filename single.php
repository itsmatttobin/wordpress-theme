<?php get_header(); ?>

  <div class="row">

    <div class="col-xs-12 col-md-8">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-content">
            
            <?php the_content(); ?>

            <?php wp_link_pages(array('before' => __('Pages: ','textdomain'), 'next_or_number' => 'number')); ?>
            
            <?php the_tags( __('Tags: ','textdomain'), ', ', ''); ?>
          
            <?php posted_on(); ?>

          </div>
          
          <?php edit_post_link(__('Edit this entry','textdomain'),'','.'); ?>
          
        </article>

        <?php comments_template(); ?>

      <?php endwhile; endif; ?>

    </div>

    <div class="col-xs-12 col-md-4">
    
      <?php get_sidebar(); ?>

    </div>

  </div>

<?php get_footer(); ?>