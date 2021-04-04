<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package sd Hall
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<!--HEADER INFO AREA STARTS-->
<?php 
$header_contactnumber = get_theme_mod('header_contactnumber');
$hidetopbar = get_theme_mod('hide_header_topbar', 1);
?>
<!--HEADER INFO AREA ENDS-->
<div class="header">
  <div class="container">
    <div class="logo">
		<?php sd_hall_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
    </div> 
    <?php if( $hidetopbar == '') { ?>
    <div class="headsearchbox">
        <span class="sintp">
            <a href="tel:<?php echo esc_html($header_contactnumber);?>"><i class="faphone"></i> <?php echo esc_html($header_contactnumber);?></a></span> 
    </div>
    <?php } ?>
    <div id="topmenu">
    	         <div class="toggle"><a class="toggleMenu" href="#" style="display:none;"><?php esc_html_e('Menu','sd-hall'); ?></a></div> 
        <div class="sitenav">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav-->          
    </div>
  </div> <!-- container -->
  <div class="clear"></div>
</div><!--.header -->
<div class="clear"></div>

<section class="block testimonialBlock">
  <div class="container">
    <h2>Testimonials</h2>
    <div class="testimonialHolder">
      <?php 
        $args = array( 'post_type' => 'testmonial' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
      ?>    
      <div class="holder">
        <div class="image">
          <?php the_post_thumbnail('full'); ?>
        </div>
        <h3><?php the_title(); ?></h3>
        <?php 
          $testimonial_designation = get_post_meta( get_the_ID(), 'Testimonial Designation', true);
          echo '<span class="designation">' . $testimonial_designation . '</span>';
        ?>  
        <?php the_content(); ?>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>