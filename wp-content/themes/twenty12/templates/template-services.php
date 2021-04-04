<?php
/*
Template Name: Services
*/

get_header(); ?>

<!-- services block -->
<section class="block servicesBlock servicePage">
  <div class="container">
    <h2 class="text-center"><?php echo get_theme_mod('Teaser-heading', 'Our Services'); ?></h2>
    <div class="cols">
      <?php 
        $args = array( 'post_type' => 'our_services','posts_per_page' =>  '20' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
      ?> 	
      <div class="col">
        <?php 
          $service_icon = get_post_meta( get_the_ID(), 'Service Icon', true);

          echo '<div class="icon">' . $service_icon . '</div>';
        ?>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>