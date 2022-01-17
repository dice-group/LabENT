<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('lms-education-footer-sidebar')) {
        echo '<div class="row sidebar-area">';
          dynamic_sidebar('lms-education-footer-sidebar');
        echo '</div>';
      }
    ?>

    <div class="row">
      <div class="col-md-12">
        <p class="mb-0 py-3 text-center">
          <?php
            if (!get_theme_mod('lms_education_footer_text') ) { ?>
              <a href="<?php echo esc_url(__('https://www.misbahwp.com/themes/free-education-wordpress-theme/', 'lms-education' )); ?>" target="_blank">
              <?php esc_html_e('Education WordPress ','lms-education'); ?></a>
            <?php } else {
              echo esc_html(get_theme_mod('lms_education_footer_text'));
            }
          ?>
          <?php if ( get_theme_mod('lms_education_copyright_enable', true) == true ) : ?>
            <?php 
            /* translators: %s: Misbah WP */ 
            printf( esc_html__( ' Theme by %s', 'lms-education' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url(__('https://wordpress.org', 'lms-education' )); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'lms-education' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
