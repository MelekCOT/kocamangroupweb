<?php
/**
 * Hero bölümü
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title    = kocaman_get_field( 'hero_title', 'KOCAMAN GROUP' );
$subtitle = kocaman_get_field( 'hero_subtitle', __( 'İnşaat, turizm, gıda ve gayrimenkul alanlarında güçlü, yenilikçi ve güven veren çözümler.', 'kocaman-group' ) );
$bg       = kocaman_get_field( 'hero_background' );
$bg_url   = is_array( $bg ) && ! empty( $bg['url'] ) ? $bg['url'] : '';

// ACF arka plan görseli yoksa: tema içi villa tanıtım videosu (flu efekt CSS ile). Dosya: assets/video/villa-tanitim-trim.mp4
$default_hero_video = get_template_directory_uri() . '/assets/video/villa-tanitim-trim.mp4';
$hero_video_url     = apply_filters( 'kocaman_hero_video_url', $default_hero_video );
$show_hero_video    = ! $bg_url && is_string( $hero_video_url ) && '' !== trim( $hero_video_url );
?>
<section class="hero" id="hero" aria-label="<?php esc_attr_e( 'Giriş', 'kocaman-group' ); ?>">
	<div class="hero__media<?php echo $show_hero_video ? ' hero__media--video' : ''; ?>"<?php echo $bg_url ? ' style="--hero-bg: url(' . esc_url( $bg_url ) . ')"' : ''; ?>>
		<?php if ( $show_hero_video ) : ?>
			<video class="hero__video" autoplay muted loop playsinline preload="metadata" aria-hidden="true">
				<source src="<?php echo esc_url( $hero_video_url ); ?>" type="video/mp4" />
			</video>
		<?php endif; ?>
	</div>
	<div class="hero__network" aria-hidden="true">
		<svg class="hero__network-svg" viewBox="0 0 1200 800" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" focusable="false">
			<defs>
				<linearGradient id="hero-network-line" x1="0%" y1="0%" x2="100%" y2="100%">
					<stop offset="0%" stop-color="rgba(255, 200, 140, 0.35)" />
					<stop offset="50%" stop-color="rgba(255, 255, 255, 0.14)" />
					<stop offset="100%" stop-color="rgba(120, 180, 220, 0.2)" />
				</linearGradient>
			</defs>
			<g class="hero__network-lines" fill="none" stroke="url(#hero-network-line)" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round">
				<path d="M80 420 L220 280 L380 200 L520 240 L680 160 L880 200 L1080 260" />
				<path d="M220 280 L340 380 L500 460 L720 520 L960 480" />
				<path d="M380 200 L420 360 L580 420 L760 380 L920 420" />
				<path d="M520 240 L620 320 L780 280 L1000 340" />
				<path d="M180 560 L320 480 L480 540 L640 600 L820 560" />
				<path d="M280 120 L440 100 L600 140 L780 100 L980 140" />
				<path d="M340 380 L520 240" />
				<path d="M680 160 L620 320" />
				<path d="M500 460 L580 420" />
				<path d="M80 420 L180 560" />
				<path d="M1080 260 L1000 340" />
			</g>
			<g class="hero__network-nodes" fill="rgba(255, 255, 255, 0.42)" stroke="rgba(255, 184, 94, 0.35)" stroke-width="0.9">
				<circle cx="220" cy="280" r="4.5" />
				<circle cx="520" cy="240" r="4" />
				<circle cx="680" cy="160" r="5" />
				<circle cx="380" cy="200" r="3.5" />
				<circle cx="620" cy="320" r="3.5" />
				<circle cx="500" cy="460" r="4" />
				<circle cx="880" cy="200" r="3.5" />
				<circle cx="340" cy="380" r="3" />
				<circle cx="780" cy="280" r="3" />
				<circle cx="440" cy="100" r="3" />
				<circle cx="180" cy="560" r="3" />
			</g>
		</svg>
	</div>
	<div class="hero__overlay" aria-hidden="true"><span class="hero__overlay-orb hero__overlay-orb--1"></span><span class="hero__overlay-orb hero__overlay-orb--2"></span></div>
	<div class="container hero__content">
		<p class="hero__eyebrow reveal" data-reveal data-reveal-delay="0"><?php esc_html_e( 'Çok sektörlü güç', 'kocaman-group' ); ?></p>
		<h1 class="hero__title hero__title--impact reveal" data-reveal data-reveal-delay="80"><?php echo esc_html( $title ); ?></h1>
		<p class="hero__subtitle reveal" data-reveal data-reveal-delay="160"><?php echo esc_html( $subtitle ); ?></p>
		<div class="hero__actions reveal" data-reveal data-reveal-delay="240">
			<a class="btn btn--primary btn--lg" href="#faaliyet"><?php esc_html_e( 'Hizmetlerimizi İnceleyin', 'kocaman-group' ); ?></a>
			<a class="btn btn--ghost btn--lg" href="#iletisim"><?php esc_html_e( 'İletişime Geçin', 'kocaman-group' ); ?></a>
		</div>
		<ul class="hero__stats" role="list">
			<li class="hero__stat reveal" data-reveal data-reveal-delay="320">
				<span class="hero__stat-value">4</span>
				<span class="hero__stat-label"><?php esc_html_e( 'Sektör', 'kocaman-group' ); ?></span>
			</li>
			<li class="hero__stat reveal" data-reveal data-reveal-delay="400">
				<span class="hero__stat-value"><?php esc_html_e( 'Güçlü', 'kocaman-group' ); ?></span>
				<span class="hero__stat-label"><?php esc_html_e( 'Marka yapısı', 'kocaman-group' ); ?></span>
			</li>
			<li class="hero__stat reveal" data-reveal data-reveal-delay="480">
				<span class="hero__stat-value"><?php esc_html_e( 'Güven', 'kocaman-group' ); ?></span>
				<span class="hero__stat-label"><?php esc_html_e( 'Odaklı hizmet', 'kocaman-group' ); ?></span>
			</li>
			<li class="hero__stat reveal" data-reveal data-reveal-delay="560">
				<span class="hero__stat-value"><?php esc_html_e( 'Sürdürülebilir', 'kocaman-group' ); ?></span>
				<span class="hero__stat-label"><?php esc_html_e( 'Büyüme', 'kocaman-group' ); ?></span>
			</li>
		</ul>
	</div>
	<a class="hero__scroll" href="#hakkimizda" aria-label="<?php esc_attr_e( 'Sayfanın devamına geç: Hakkımızda', 'kocaman-group' ); ?>">
		<span class="hero__scroll-label"><?php esc_html_e( 'Keşfet', 'kocaman-group' ); ?></span>
		<span class="hero__scroll-line-wrap" aria-hidden="true"><span class="hero__scroll-line"></span></span>
		<span class="hero__scroll-next"><?php esc_html_e( 'Hakkımızda', 'kocaman-group' ); ?></span>
	</a>
</section>
