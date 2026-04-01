<?php
/**
 * Faaliyet alanları — 4 kart
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = array(
	array(
		'title'    => 'Kocaman Group İnşaat',
		'desc'     => __( 'Modern yapı, proje geliştirme ve güven odaklı inşaat hizmetleri', 'kocaman-group' ),
		'icon'     => 'build',
		'link_key' => 'insaat',
	),
	array(
		'title'    => 'Villatatilci',
		'desc'     => __( 'Konforlu ve seçkin villa tatili deneyimleri', 'kocaman-group' ),
		'icon'     => 'sun',
		'link_key' => 'villa',
	),
	array(
		'title'    => "Chicker's Restaurant",
		'desc'     => __( 'Lezzet, kalite ve modern restoran hizmeti', 'kocaman-group' ),
		'icon'     => 'food',
		'link_key' => 'chickers',
	),
	array(
		'title'    => 'Kocaman Gayrimenkul',
		'desc'     => __( 'Değer odaklı gayrimenkul danışmanlığı ve yatırım çözümleri', 'kocaman-group' ),
		'icon'     => 'estate',
		'link_key' => 'gayrimenkul',
	),
);
?>
<section class="section services" id="faaliyet">
	<div class="container">
		<header class="section__header">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Faaliyet alanlarımız', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Dört güçlü marka, tek vizyon', 'kocaman-group' ); ?></h2>
			<p class="section__desc reveal" data-reveal><?php esc_html_e( 'Her sektörde aynı kalite anlayışıyla hizmet veriyoruz.', 'kocaman-group' ); ?></p>
		</header>
		<div class="services__grid">
			<?php foreach ( $services as $i => $s ) : ?>
				<a class="service-card reveal" data-reveal href="<?php echo esc_url( kocaman_get_service_page_url( $s['link_key'] ) ); ?>" target="_blank" rel="noopener noreferrer">
					<span class="service-card__icon service-card__icon--<?php echo esc_attr( $s['icon'] ); ?>" aria-hidden="true"></span>
					<h3 class="service-card__title"><?php echo esc_html( $s['title'] ); ?></h3>
					<p class="service-card__desc"><?php echo esc_html( $s['desc'] ); ?></p>
					<span class="service-card__arrow" aria-hidden="true">→</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
