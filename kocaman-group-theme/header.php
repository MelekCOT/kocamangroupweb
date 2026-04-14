<?php
/**
 * Üst şablon
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'İçeriğe geç', 'kocaman-group' ); ?></a>

<header class="site-header" id="site-header" role="banner">
	<div class="site-header__sheen" aria-hidden="true"></div>
	<div class="site-header__inner">
		<div class="site-header__brand">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				$kg_logo = get_template_directory_uri() . '/assets/images/kocaman-logo.png';
				?>
				<a class="site-header__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img
						class="site-header__logo-img"
						src="<?php echo esc_url( $kg_logo ); ?>"
						alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
						width="200"
						height="49"
						decoding="async"
					/>
				</a>
				<?php
			}
			?>
		</div>

		<button type="button" class="site-header__toggle" id="nav-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menüyü aç / kapat', 'kocaman-group' ); ?>">
			<span class="site-header__toggle-bar"></span>
			<span class="site-header__toggle-bar"></span>
			<span class="site-header__toggle-bar"></span>
		</button>

		<nav class="site-header__nav" id="primary-menu-wrap" aria-label="<?php esc_attr_e( 'Ana navigasyon', 'kocaman-group' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'menu_class'     => 'site-header__menu',
					'fallback_cb'    => 'kocaman_group_default_menu',
				)
			);
			?>
			<a class="site-header__cta btn btn--primary" href="<?php echo esc_url( home_url( '/#iletisim' ) ); ?>"><?php esc_html_e( 'Bize Ulaşın', 'kocaman-group' ); ?></a>
		</nav>
	</div>
</header>
<div class="site-header__progress" role="progressbar" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" aria-label="<?php esc_attr_e( 'Sayfa kaydırma ilerlemesi', 'kocaman-group' ); ?>" id="scroll-progress-wrap">
	<span class="site-header__progress-fill" id="scroll-progress"></span>
</div>
