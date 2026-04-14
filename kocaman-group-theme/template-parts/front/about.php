<?php
/**
 * Hakkımızda
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hakkimizda_url = kocaman_get_hakkimizda_url();
?>
<section class="section about" id="hakkimizda">
	<div class="container about__grid">
		<div class="about__text">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Hakkımızda', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Dört alanda uzmanlık, tek kurumsal duruş', 'kocaman-group' ); ?></h2>
			<p class="about__lead reveal" data-reveal><?php esc_html_e( 'Kocaman Group; inşaat (Kocaman Group İnşaat), turizm ve konaklama (Villatatilci), gıda ve restoran (Chicker\'s) ile gayrimenkul (Kocaman Gayrimenkul) markalarını tek çatı altında bir araya getirir. Yarım asra yaklaşan deneyimimizle her faaliyet alanında güven, şeffaflık ve ölçülebilir kaliteyi ön planda tutuyoruz.', 'kocaman-group' ); ?></p>
			<ul class="about__features" role="list">
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Kocaman Group İnşaat: anahtar teslime kadar mühendislik ve proje yönetimi', 'kocaman-group' ); ?></span>
				</li>
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Villatatilci: turizm ve seçkin villa konaklama deneyimleri', 'kocaman-group' ); ?></span>
				</li>
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Chicker\'s Restaurant: tutarlı lezzet ve hizmet standardı', 'kocaman-group' ); ?></span>
				</li>
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Kocaman Gayrimenkul: yatırım ve portföy danışmanlığı', 'kocaman-group' ); ?></span>
				</li>
			</ul>
			<div class="about__actions reveal" data-reveal>
				<a class="btn btn--secondary" href="<?php echo esc_url( $hakkimizda_url ); ?>"><?php esc_html_e( 'Kurumsal detay', 'kocaman-group' ); ?></a>
				<a class="btn btn--ghost" href="#markalar"><?php esc_html_e( 'Markalarımızı keşfedin', 'kocaman-group' ); ?></a>
			</div>
		</div>
		<div class="about__visual reveal" data-reveal>
			<div class="about__visual-frame">
				<div class="about__visual-inner about__visual-inner--kurumsal">
					<img
						class="about__visual-img"
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/kocaman-kurumsal-fethiye-gorsel.png' ); ?>"
						alt="<?php esc_attr_e( 'Fethiye ve çevresinde konut projeleri — Kocaman Group', 'kocaman-group' ); ?>"
						width="900"
						height="1200"
						loading="lazy"
						decoding="async"
					>
				</div>
				<div class="about__accent" aria-hidden="true"></div>
			</div>
		</div>
	</div>
</section>
