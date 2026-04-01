<?php
/**
 * Neden biz
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array(
		'title' => __( 'Güven', 'kocaman-group' ),
		'desc'  => __( 'Sözümüzü tutar, süreçleri net şekilde yönetiriz.', 'kocaman-group' ),
		'icon'  => 'shield',
	),
	array(
		'title' => __( 'Deneyim', 'kocaman-group' ),
		'desc'  => __( 'Çok sektörlü tecrübemizle riskleri önceden görürüz.', 'kocaman-group' ),
		'icon'  => 'layers',
	),
	array(
		'title' => __( 'Çok sektörlü uzmanlık', 'kocaman-group' ),
		'desc'  => __( 'Her markada uzman ekipler ve standart operasyon.', 'kocaman-group' ),
		'icon'  => 'grid',
	),
	array(
		'title' => __( 'Kalite odaklı yaklaşım', 'kocaman-group' ),
		'desc'  => __( 'Detaylarda mükemmellik, teslimatta tutarlılık.', 'kocaman-group' ),
		'icon'  => 'star',
	),
	array(
		'title' => __( 'Müşteri memnuniyeti', 'kocaman-group' ),
		'desc'  => __( 'Uzun soluklu ilişkiler ve sürekli iletişim.', 'kocaman-group' ),
		'icon'  => 'heart',
	),
);

$icon_svgs = array(
	'shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
	'layers' => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>',
	'grid'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
	'star'   => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
	'heart'  => '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
);

$why_icon_kses = array(
	'svg'      => array(
		'xmlns'           => true,
		'width'           => true,
		'height'          => true,
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'path'     => array( 'd' => true ),
	'polygon'  => array( 'points' => true ),
	'polyline' => array( 'points' => true ),
	'rect'     => array(
		'x'      => true,
		'y'      => true,
		'width'  => true,
		'height' => true,
	),
);
?>
<section class="section why" id="neden-biz">
	<div class="container">
		<header class="section__header section__header--center">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Neden Kocaman Group?', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Güven veren ortaklık', 'kocaman-group' ); ?></h2>
		</header>
		<div class="why__grid">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$icon_key = isset( $item['icon'] ) && isset( $icon_svgs[ $item['icon'] ] ) ? $item['icon'] : 'shield';
				$icon_markup = $icon_svgs[ $icon_key ];
				?>
				<div class="why-card reveal" data-reveal>
					<h3 class="why-card__title">
						<span class="why-card__title-icon"><?php echo wp_kses( $icon_markup, $why_icon_kses ); ?></span>
						<span class="why-card__title-text"><?php echo esc_html( $item['title'] ); ?></span>
					</h3>
					<p class="why-card__desc"><?php echo esc_html( $item['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
