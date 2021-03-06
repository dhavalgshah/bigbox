<?php
/**
 * Template Name: Narrow (10 columns)
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 * @package BigBox
 * @category Theme
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

bigbox_view( 'global/header' );

while ( have_posts() ) :
	the_post();
	?>

<div id="main" class="site-primary site-primary--10" role="main">
	<h1 class="page-title"><?php the_title(); ?></h1>

	<article class="hentry">
		<?php the_content(); ?>
	</article>
</div>

	<?php
endwhile;

bigbox_view( 'global/footer' );
