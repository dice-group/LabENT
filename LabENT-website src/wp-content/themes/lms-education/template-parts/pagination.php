<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'lms-education' ),
		'next_text' => esc_html__( 'Next page', 'lms-education' ),
	) );