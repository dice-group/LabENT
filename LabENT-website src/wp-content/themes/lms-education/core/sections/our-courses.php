<?php if ( get_theme_mod('lms_education_our_courses_enable') ) : ?>
  
  <section id="courses" class="py-5 text-center">
    <div class="container">
      <?php if ( get_theme_mod('lms_education_our_courses_section_title') ) : ?>
        <h2 class="mb-3"><?php echo esc_html(get_theme_mod('lms_education_our_courses_section_title')); ?></h2>
        <hr>
      <?php endif; ?>
      <?php if ( get_theme_mod('lms_education_our_courses_section_para') ) : ?>
        <p class="sec-text mb-5"><?php echo esc_html(get_theme_mod('lms_education_our_courses_section_para')); ?></p>
      <?php endif; ?>
      <?php if ( class_exists( 'LearnPress' ) ) {?>
        <div class="owl-carousel">
          <?php
            $args = array( 
              'post_type' => 'lp_course',
              'posts_per_page' => get_theme_mod('lms_education_our_courses_perpage'),
              'course_category' => get_theme_mod('lms_education_our_courses_category'), 
              'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $post;
            $course = LP_Global::course();
            $price = $course->get_price_html();
            $lessons = $course->get_items( LP_LESSON_CPT );
            $lessons  = count( $lessons ); ?>
            <div class="courses-box">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
              <div class="courses-box-content">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo esc_html( wp_trim_words( get_the_content(), 8, '...' ) ); ?></p>
                <div class="courses-info">
                  <span><i class="far fa-clock mr-1"></i> <?php echo esc_attr($lessons);?> <span class="mr-1"><?php esc_html_e('Lessons','lms-education'); ?></span></span>
                  <span><i class="far fa-user mr-1"></i> <?php the_author(); ?></span>
                  <strong class="ml-2"><?php echo esc_html($course->get_origin_price_html()); ?></strong>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      <?php }?>
    </div>
  </section>

<?php endif; ?>