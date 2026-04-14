<?php
/**
 * Ana sayfa — Vizyon & misyon özet kartları
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section vm-cards" id="vizyon-misyon" aria-labelledby="vm-cards-heading">
	<div class="container">
		<h2 id="vm-cards-heading" class="screen-reader-text"><?php esc_html_e( 'Vizyon ve misyon özeti', 'kocaman-group' ); ?></h2>
		<div class="vm-cards__grid">
			<div class="vm-card reveal" data-reveal>
				<p class="vm-card__label"><?php esc_html_e( 'Vizyon', 'kocaman-group' ); ?></p>
				<p class="vm-card__text"><?php esc_html_e( 'İnşaat, turizm, gıda ve gayrimenkulde kaliteyi imza haline getiren, sürdürülebilir değer üreten öncü bir grup olmak.', 'kocaman-group' ); ?></p>
			</div>
			<div class="vm-card reveal" data-reveal>
				<p class="vm-card__label"><?php esc_html_e( 'Misyon', 'kocaman-group' ); ?></p>
				<p class="vm-card__text"><?php esc_html_e( 'Her markamızda müşteri memnuniyeti, şeffaflık ve sürekli gelişimle güvenilir hizmet sunmak.', 'kocaman-group' ); ?></p>
			</div>
		</div>
	</div>
</section>
