<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">
				<div class="container">
					<div class="section-inner">
						<div class="footer-credits">
							<p class="footer-copyright">&copy;
								
								
								
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							</p><!-- .footer-copyright -->
						</div><!-- .footer-credits -->

						<a class="to-the-top" href="#site-header">
							<span class="to-the-top-long">
								 <?php echo of_get_option( 'footer_text' ); ?>
							</span><!-- .to-the-top-long -->
							<span class="to-the-top-short">
								 <span> 
                     </span>
							</span><!-- .to-the-top-short -->
						</a><!-- .to-the-top -->
					</div>
				</div>
			</footer><!-- #site-footer -->
		<?php wp_footer(); ?>
		<!-- jquery 3 cdn	-->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>		
		<!-- slick js cdn	-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<!-- custom js -->
		<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/main.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery.flexslider.js"></script>
  <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>
