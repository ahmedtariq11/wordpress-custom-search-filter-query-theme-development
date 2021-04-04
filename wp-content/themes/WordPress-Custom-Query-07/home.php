 


<?php /* Template Name: result */ ?>
<?php get_header(); ?>
<div class="container">
        <h4 class="lesson-title">WP Custom Query - Filters</h4>

          <?php 
        if($_GET['minprice'] && !empty($_GET['minprice']))
        {
            $minprice = $_GET['minprice'];
        }

        if($_GET['maxprice'] && !empty($_GET['maxprice']))
        {
            $maxprice = $_GET['maxprice'];
        }
        if($_GET['size'] && !empty($_GET['size']))
        {
            $size = $_GET['size'];
        }
        if($_GET['color'] && !empty($_GET['color']))
        {
            $color = $_GET['color'];
        }
    ?>
 <?php
            // Define arguments
            
                $args = array(
                    'post_type' => 'caradd',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => 'price',
                            'type' => 'NUMERIC',
                            'value' => array($minprice, $maxprice),
                            'compare' => 'BETWEEN'
                        ),

                        array(
                            'key' => 'size',
                            'type' => 'CHAR',
                            'value' => $size,
                            'compare' => 'LIKE'
                        ),

                        array(
                            'key' => 'color',
                            'type' => 'CHAR',
                            'value' => $color,
                            'compare' => 'LIKE'
                        )
                    )
                );
            
                


                $query = new WP_Query($args);
                while($query -> have_posts()) : $query -> the_post();
        ?>
            <div class="post clearfix">
                <h5><?php the_title(); ?></h5>
                <div class="taxonomy clearfix">
                    <div class="price categories">
                        <strong>Price:</strong>
                        <?php the_field('price'); ?>
                    </div>
                
                    <div class="tags">
                        <strong>Color:</strong> <?php the_field('color'); ?><br>
                        <strong>Size:</strong> <?php the_field('size'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>