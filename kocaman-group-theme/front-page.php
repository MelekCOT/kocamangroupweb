<?php
/**
 * Ana sayfa şablonu
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main" role="main">
	<?php
	get_template_part( 'template-parts/front/hero' );
	get_template_part( 'template-parts/front/about' );
	get_template_part( 'template-parts/front/vision-mission' );
	get_template_part( 'template-parts/front/services' );
	get_template_part( 'template-parts/front/brands' );
	get_template_part( 'template-parts/front/projects' );
	get_template_part( 'template-parts/front/why' );
	get_template_part( 'template-parts/front/stats' );
	get_template_part( 'template-parts/front/contact' );
	?>
</main>

<?php
get_footer();
