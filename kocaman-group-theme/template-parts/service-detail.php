<?php
/**
 * Faaliyet detay içeriği (get_template_part ile key aktarılır)
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$detail_key = 'insaat';
if ( isset( $key ) ) {
	$detail_key = sanitize_key( $key );
} elseif ( isset( $args ) && is_array( $args ) && isset( $args['key'] ) ) {
	$detail_key = sanitize_key( $args['key'] );
}
$detail = kocaman_get_service_detail( $detail_key );

if ( empty( $detail ) ) {
	return;
}
?>
<main id="main" class="site-main site-main--page service-detail" role="main">
	<article class="service-detail__article">
		<header class="service-detail__hero">
			<div class="container service-detail__hero-inner">
				<nav class="service-detail__breadcrumb" aria-label="<?php esc_attr_e( 'Sayfa içi', 'kocaman-group' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Anasayfa', 'kocaman-group' ); ?></a>
					<span class="service-detail__breadcrumb-sep" aria-hidden="true">/</span>
					<a href="<?php echo esc_url( home_url( '/#faaliyet' ) ); ?>"><?php esc_html_e( 'Faaliyet alanlarımız', 'kocaman-group' ); ?></a>
				</nav>
				<p class="service-detail__eyebrow"><?php echo esc_html( $detail['eyebrow'] ); ?></p>
				<h1 class="service-detail__title"><?php echo esc_html( $detail['title'] ); ?></h1>
				<p class="service-detail__intro"><?php echo esc_html( $detail['intro'] ); ?></p>
			</div>
		</header>
		<div class="container service-detail__body">
			<?php foreach ( $detail['paragraphs'] as $para ) : ?>
				<p class="service-detail__p"><?php echo esc_html( $para ); ?></p>
			<?php endforeach; ?>
			<?php if ( ! empty( $detail['bullets'] ) ) : ?>
				<ul class="service-detail__list" role="list">
					<?php foreach ( $detail['bullets'] as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<p class="service-detail__cta-wrap">
				<a class="btn btn--primary btn--lg" href="<?php echo esc_url( home_url( '/#iletisim' ) ); ?>"><?php esc_html_e( 'İletişime geçin', 'kocaman-group' ); ?></a>
			</p>
		</div>
	</article>
</main>
