<?php
/**
 * Ana şablon yedek
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main site-main--simple" role="main">
	<div class="container section" style="padding-top: 8rem; padding-bottom: 4rem;">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'entry' ); ?>>
					<h1 class="entry__title"><?php the_title(); ?></h1>
					<div class="entry__content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<p><?php esc_html_e( 'İçerik bulunamadı.', 'kocaman-group' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
