<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
		<!-- font awesome 5 cdn -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
		<!-- slick css -->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group" role="banner">
			<div class="container">
				<!-- header -->
				<div class="header-inner section-inner">
					<div class="header-titles-wrapper">
						<?php
							// Check whether the header search is activated in the customizer.
							$enable_header_search = get_theme_mod( 'enable_header_search', true );
							if ( true === $enable_header_search ) {
						?>
							<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
								<span class="toggle-inner">
									<span class="toggle-icon">
										<?php twentytwenty_the_theme_svg( 'search' ); ?>
									</span>
									<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
								</span>
							</button><!-- .search-toggle -->
						<?php } ?>

						<div class="header-titles">
							
<?php 
							$args = array( 'post_type' => 'logo');
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
 
						?> 	
						
<?php

 $url = get_option( 'siteurl' );
  
        /* link thumbnail to full size image for use with lightbox*/
        echo '<a href="'.esc_url($url).'" rel="lightbox">'; 
 the_post_thumbnail('logo');
          
        echo '</a>';
 ?>
						<?php endwhile; ?>
								
							
						</div><!-- .header-titles -->

						<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
								</span>
							</span>
						</button><!-- .nav-toggle -->
					</div>
					<div class="contactInfo">
						<?php 
							$args = array( 'post_type' => 'contact_details' );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
						?> 	
						<ul>

							<?php 
 
								$call_us = get_post_meta( get_the_ID(), 'Call Us', true);
								$email = get_post_meta( get_the_ID(), 'Email', true);

								echo '<li class="tel"><a href="tel:'. $call_us .'">' . $call_us . '</a></li>';
								echo '<li class="email"><a href="mailto:'. $email .'">' . $email . '</a></li>';
							?>

						</ul>
						<?php endwhile; ?>
					</div>





							
						

							
						
						
					
				</div>
				<!-- main nav -->
				<div id="mainNav">
					<?php if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) { ?>
						<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">
							<ul class="primary-menu reset-list-style">
							<?php
							if ( has_nav_menu( 'primary' ) ) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);
							} elseif ( ! has_nav_menu( 'expanded' ) ) {
								wp_list_pages(
									array(
										'match_menu_classes' => true,
										'show_sub_menu_icons' => true,
										'title_li' => false,
										'walker'   => new TwentyTwenty_Walker_Page(),
									)
								);
							}
							?>
							</ul>
						</nav>
					<?php } ?>
				</div>
			</div>
		</header>

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
