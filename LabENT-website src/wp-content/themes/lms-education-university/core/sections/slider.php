<?php if ( get_theme_mod('lms_education_blog_box_enable') ) : ?>

<?php $args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('lms_education_blog_slide_category'),
  'posts_per_page' => get_theme_mod('lms_education_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $arr_posts = new WP_Query( $args );
    if ( $arr_posts->have_posts() ) :
      while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <div class="blog_box">
          <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            endif;
          ?>
          <div class="content_inner_box">
            <hr>
            <h3 class="post-title mb-3 mt-0"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>            
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 30, '...' ) ); ?></p>
            <div class="slider-btn">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','lms-education-university'); ?></a>
            </div>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>