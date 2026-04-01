<?php
/**
 * Hakkımızda
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section about" id="hakkimizda">
	<div class="container about__grid">
		<div class="about__text">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Kurumsal kimlik', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Güven ve yenilikle büyüyen yapı', 'kocaman-group' ); ?></h2>
			<p class="about__lead reveal" data-reveal><?php esc_html_e( 'KOCAMAN GROUP; inşaat, turizm, gıda ve gayrimenkul alanlarında entegre bir marka ekosistemi sunar. Her iş kolunda kalite standartlarımızı koruyarak, paydaşlarımıza uzun vadeli değer üretiriz.', 'kocaman-group' ); ?></p>
			<ul class="about__features" role="list">
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Çok sektörlü operasyonel mükemmellik', 'kocaman-group' ); ?></span>
				</li>
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Şeffaf ve güvenilir iş ortaklığı', 'kocaman-group' ); ?></span>
				</li>
				<li class="about__feature reveal" data-reveal>
					<span class="about__feature-icon" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Sürdürülebilir büyüme ve yerel değer', 'kocaman-group' ); ?></span>
				</li>
			</ul>
			<a class="btn btn--secondary reveal" data-reveal href="#markalar"><?php esc_html_e( 'Markalarımızı keşfedin', 'kocaman-group' ); ?></a>
		</div>
		<div class="about__visual reveal" data-reveal>
			<div class="about__visual-frame">
				<div class="about__visual-inner">
					<div class="about__visual-placeholder about__visual-placeholder--insaat" role="img" aria-label="<?php esc_attr_e( 'Modern apartman ve inşaat projeleri', 'kocaman-group' ); ?>"></div>
				</div>
				<div class="about__accent" aria-hidden="true"></div>
			</div>
		</div>
	</div>
</section>
