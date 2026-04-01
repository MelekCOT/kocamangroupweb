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

// ACF arka plan görseli yoksa: kurumsal şehir/mimari döngü videosu (filtre ile değiştirilebilir veya kapatılabilir).
$default_hero_video = 'https://videos.pexels.com/video-files/3045163/3045163-hd_1920_1080_25fps.mp4';
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
