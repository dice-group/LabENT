<?php
	
load_template( get_template_directory() . '/core/includes/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function lms_education_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'lms-education' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'LearnPress', 'lms-education' ),
			'slug'             => 'learnpress',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	lms_education_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'lms_education_register_recommended_plugins' );