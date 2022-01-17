<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lms-education-university' ); ?></a>

<div class="header-box">
	<div class="top-header text-center py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-6 align-self-center text-md-right text-center">
					<?php if ( get_theme_mod('lms_education_phone_number') ) : ?>
				    	<span class="mr-3"><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('lms_education_phone_number' ) ); ?></span>
				  	<?php endif; ?>
				  	<?php if ( get_theme_mod('lms_education_email_address') ) : ?>
				    	<span><i class="far fa-envelope mr-2"></i><?php echo esc_html( get_theme_mod('lms_education_email_address' ) ); ?></span>
				  	<?php endif; ?>
				</div>
			    <div class="col-lg-2 col-md-2 align-self-center text-md-right text-center">
			    	<?php $lms_education_settings = get_theme_mod( 'lms_education_social_links_settings' ); ?>
					<div class="social-links text-center text-md-right mb-2 mb-md-0">
						<?php if ( is_array($lms_education_settings) || is_object($lms_education_settings) ){ ?>
				            <?php foreach( $lms_education_settings as $lms_education_setting ) { ?>
						        <a href="<?php echo esc_url( $lms_education_setting['link_url'] ); ?>">
						            <i class="<?php echo esc_attr( $lms_education_setting['link_text'] ); ?> mr-3"></i>
						        </a>
						    <?php } ?>
						<?php } ?>
					</div>
			    </div>
			    <div class="col-lg-3 col-md-4 align-self-center text-md-right text-center">
		    	 	<?php if ( get_theme_mod('lms_education_register_text') || get_theme_mod('lms_education_register_link') ) : ?>
				    	<a href="<?php echo esc_url( get_theme_mod('lms_education_register_link' ) ); ?>" class="mb-0 register-top"><?php echo esc_html( get_theme_mod('lms_education_register_text' ) ); ?></a>
				  	<?php endif; ?>
				  	<?php if ( get_theme_mod('lms_education_login_text') || get_theme_mod('lms_education_login_link') ) : ?>
				    	<a href="<?php echo esc_url( get_theme_mod('lms_education_login_link' ) ); ?>" class="mb-0 login-top"><i class="fas fa-lock mr-2"></i><?php echo esc_html( get_theme_mod('lms_education_login_text' ) ); ?></a>
				  	<?php endif; ?>
		    	</div>
			</div>
		</div>
	</div>

	<header id="site-navigation" class="header text-center text-md-left py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-12 col-sm-12 align-self-center">
			    	<div class="logo text-center text-md-center text-lg-left">
				    	<div class="logo-image mr-3">
					    	<?php echo esc_url( the_custom_logo() ); ?>
					    </div>
					    <div class="logo-content">
					    	<?php
					    		if ( get_theme_mod('lms_education_display_header_title', true) == true ) :
						      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
						      			echo esc_attr(get_bloginfo('name'));
						      		echo '</a>';
						      	endif;
						      	if ( get_theme_mod('lms_education_display_header_text', true) == true ) :
					      			echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
					      		endif;
						    ?>
						</div>
					</div>
			    </div>
				<div class="col-lg-7 col-md-10 col-sm-8 col-12 align-self-center">
					<?php if(has_nav_menu('main-menu')){ ?>
						<button class="menu-toggle my-2 p-2" aria-controls="top-menu" aria-expanded="false" type="button">
							<span aria-hidden="true"><?php esc_html_e( 'Menu', 'lms-education-university' ); ?></span>
						</button>
						<nav id="main-menu" class="close-panal">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'main-menu',
									'container' => 'false'
								));
							?>
							<button class="close-menu my-2 p-2" type="button">
								<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</nav>
					<?php }?>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-6 align-self-center">
					<?php if ( get_theme_mod('lms_education_search_box_enable', true) == true ) : ?>
	                    <div class="header-search text-center"> 
	                        <a class="open-search-form" href="#search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
	                        <div class="search-form"><?php get_search_form();?></div>
	                    </div>
	                <?php endif; ?>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-2 col-6 text-center align-self-center">
					<?php if ( class_exists( 'Woocommerce' ) ) {?>
						<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','lms-education-university' ); ?>"><i class="fas fa-shopping-cart"></i><p class="cart-item-box"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></p></a>
					<?php }?>
				</div>
			</div>
		</div>
	</header>
</div>