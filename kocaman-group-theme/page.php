<?php
/**
 * Sayfa şablonu
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main site-main--page" role="main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'page-entry' ); ?>>
			<header class="page-entry__header">
				<div class="container">
					<h1 class="page-entry__title"><?php the_title(); ?></h1>
				</div>
			</header>
			<div class="container page-entry__content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
