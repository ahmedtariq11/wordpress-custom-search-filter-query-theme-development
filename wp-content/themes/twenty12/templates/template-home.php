<?php
/*
Template Name: Homepage
*/

get_header(); ?>

<!-- hero block -->
<section class="heroBlock">
  <?php 
    $args = array( 'post_type' => 'hero' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
  ?> 	
  <div class="holder">
    <?php the_post_thumbnail('full'); ?>
    <h2><?php the_title(); ?></h2>
  </div>
  <?php endwhile; ?>
</section>
hi

<!-- hero block -->
<section class="owl-carousel">
	
  <div class="holder1">
    <?php the_post_thumbnail('full'); ?>
    <h2><?php the_title(); ?></h2>
  </div>
 
</section>



https://stackoverflow.com/questions/19344696/integrating-bootstrap-carousel-in-wordpress-without-plugin/20500629
<div class="container-fluid">
<div class="row">
  <div class="col-xs-12 col-md-12 col-lg-12">
  <h2>Carousel Example</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>


 <div class="carousel-inner">

  <?php 

    $args = array( 'post_type' => 'flexslider','posts_per_page'=>'-1');
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
  ?> 
    <!-- Wrapper for slides -->
   
         <div class="item <?php if ($i == 1) echo 'active'; ?>">

 
 
 <?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
            <img  class="img-responsive" src="<?php echo $url; ?>" alt="<?php the_title(); ?> " width="1100" height="500">

 <div class="caption">
      <p>   <?php the_field('Title'); ?></p>
        </div>

      </div>
<?php $i++; ?>
     <?php endwhile; ?>
<?php wp_reset_postdata(); ?>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
  </div>
</div>

<!-- about block -->
<section class="block aboutBlock">
   
  <div class="container">

    <?php $the_query = new WP_Query( 'page_id=7' ); ?>
    <?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
      <div class="holder">
        <div class="image">
          <?php the_post_thumbnail('medium_large'); ?>
        </div>
        <div class="content">
          <h3><?php the_title(); ?></h3>
<h2 class="text-left"><?php echo get_theme_mod('Teaser-heading1', 'About Uss'); ?></h2>
          <p><?php echo wp_trim_words( get_the_content(), 50, '' ); ?></p>
          <a href="<?php echo get_page_link(); ?>" class="btn">Read More</a>
        </div>
      </div>
    <?php endwhile;?>
  </div>
</section>

<!-- services block -->
<section class="block grayBg servicesBlock">
  <div class="container">
    <h2>Our Services</h2>
    <div class="cols">
      <?php 
        $args = array( 'post_type' => 'our_services','posts_per_page' =>  6);
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

<!-- contact banner block -->
<section class="block contactBannerBlock">
  <div class="container">
    <?php 
      $args = array( 'post_type' => 'contact_details' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
    ?> 	
    <div class="holder">
      <?php 
        $contact_title = get_post_meta( get_the_ID(), 'Contact Title', true);
        $contact_content = get_post_meta( get_the_ID(), 'Contact Content', true);
        $contact_button_url = get_post_meta( get_the_ID(), 'Contact Button URL', true);

        echo '<div class="content"><h3>' . $contact_title . '</h3>';
        echo '<p>' . $contact_content . '</p></div>';
        echo '<div class="buttonBlock"><a class="btn" href="'. $contact_button_url .'">Contact Us</a></div>';
      ?>
    </div>
    <?php endwhile; ?>
  </div>
</section>

<!-- testimonials block -->
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

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>