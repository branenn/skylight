<?php
/**
 * Template Name: Front Skylight page 
 *
 * @package Clipper\Templates
 * @author  AppThemes
 * @since   Clipper 1.1
 */
?>


<div id="content">

	<div class="content-box">

		<div class="box-holder">

			<div class="blog">

				<h1><?php _e( 'Pocetna stranica', APP_TD ); ?></h1>

				<div class="text-box">

					<?php echo b_clpr_stores_list(); ?>

				</div>

			</div> <!-- #blog -->

		</div> <!-- #box-holder -->

	</div> <!-- #content-box -->

</div>

<?php get_sidebar( 'store' ); ?>
