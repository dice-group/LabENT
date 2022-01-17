<?php
  global $post;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-single p-3 mb-4'); ?>>
  <?php if ( has_post_thumbnail() ) { ?>
    <div class="post-thumbnail mb-3">
      <?php the_post_thumbnail(''); ?>
    </div>
  <?php }?>
  <h1 class="post-title"><?php the_title(); ?></h1>
  <div class="post-meta mb-2 border-top border-bottom py-2">
    <i class="far fa-calendar-alt mr-2"></i><?php echo '<span class="date-day">' . get_the_date( 'd' ) . '</span>'; echo ' <span class="date-month">' . get_the_date( 'M' ) . '</span>'; echo ' <span class="date-year">' . get_the_date( 'Y' ) . '</span>'; ?>
    <i class="far fa-user ml-3 mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
    <span class="ml-3"><i class="far fa-comments mr-2"></i> <?php comments_number( esc_attr('0', 'lms-education'), esc_attr('0', 'lms-education'), esc_attr('%', 'lms-education') ); ?> <?php esc_html_e('comments','lms-education'); ?></span>
  </div>
  <div class="post-content">
    <?php
      the_content();
      the_tags('<div class="post-tags"><strong>'.esc_html__('Tags:','lms-education').'</strong> ', ', ', '</div>');
    ?>
  </div>
</div>