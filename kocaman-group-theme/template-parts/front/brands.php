<?php
/**
 * Markalar — sekmeli / interaktif panel
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$brands = array(
	array(
		'id'    => 'insaat',
		'label' => 'Kocaman Group İnşaat',
		'short' => __( 'İnşaat', 'kocaman-group' ),
		'desc'  => __( 'Konut ve ticari projelerde mühendislik disiplini, zamanında teslim ve güvenli şantiye yönetimi ile öne çıkarız.', 'kocaman-group' ),
		'tag'   => __( 'İnşaat · Proje', 'kocaman-group' ),
	),
	array(
		'id'    => 'villa',
		'label' => 'Villatatilci',
		'short' => __( 'Turizm', 'kocaman-group' ),
		'desc'  => __( 'Seçkin villa konaklamaları ve kişiselleştirilmiş tatil deneyimleri sunarak misafir memnuniyetini merkeze alırız.', 'kocaman-group' ),
		'tag'   => __( 'Turizm · Villa', 'kocaman-group' ),
	),
	array(
		'id'    => 'chickers',
		'label' => "Chicker's Restaurant",
		'short' => __( 'Gıda', 'kocaman-group' ),
		'desc'  => __( 'Modern mutfak anlayışı, tutarlı lezzet ve hijyen standartlarıyla buluşan premium restoran deneyimi.', 'kocaman-group' ),
		'tag'   => __( 'Gıda · Restoran', 'kocaman-group' ),
	),
	array(
		'id'    => 'gayrimenkul',
		'label' => 'Kocaman Gayrimenkul',
		'short' => __( 'Gayrimenkul', 'kocaman-group' ),
		'desc'  => __( 'Yatırım danışmanlığı, portföy yönetimi ve değer analizi ile doğru zamanda doğru kararları destekleriz.', 'kocaman-group' ),
		'tag'   => __( 'Gayrimenkul · Danışmanlık', 'kocaman-group' ),
	),
);
?>
<section class="section brands" id="markalar">
	<div class="container">
		<header class="section__header section__header--center">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Markalarımız', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Alt şirketlerimiz', 'kocaman-group' ); ?></h2>
			<p class="section__desc reveal" data-reveal><?php esc_html_e( 'Marka üzerine gelerek detayları keşfedin.', 'kocaman-group' ); ?></p>
		</header>

		<div class="brands__shell reveal" data-reveal>
			<div class="brands__tabs" role="tablist" aria-label="<?php esc_attr_e( 'Marka sekmeleri', 'kocaman-group' ); ?>">
				<?php foreach ( $brands as $index => $b ) : ?>
					<button type="button" class="brands__tab<?php echo 0 === $index ? ' is-active' : ''; ?>" role="tab" id="tab-<?php echo esc_attr( $b['id'] ); ?>" aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>" aria-controls="panel-<?php echo esc_attr( $b['id'] ); ?>" data-brand-tab="<?php echo esc_attr( $b['id'] ); ?>">
						<span class="brands__tab-short"><?php echo esc_html( $b['short'] ); ?></span>
						<span class="brands__tab-full"><?php echo esc_html( $b['label'] ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $brands as $index => $b ) : ?>
				<div class="brands__panel<?php echo 0 === $index ? ' is-active' : ''; ?>" role="tabpanel" id="panel-<?php echo esc_attr( $b['id'] ); ?>" aria-labelledby="tab-<?php echo esc_attr( $b['id'] ); ?>" <?php echo 0 !== $index ? ' hidden' : ''; ?>>
					<div class="brands__panel-inner">
						<div class="brands__panel-content">
							<span class="brands__tag"><?php echo esc_html( $b['tag'] ); ?></span>
							<h3 class="brands__panel-title"><?php echo esc_html( $b['label'] ); ?></h3>
							<p class="brands__panel-desc"><?php echo esc_html( $b['desc'] ); ?></p>
							<a class="btn btn--primary" href="#iletisim"><?php esc_html_e( 'İletişime geçin', 'kocaman-group' ); ?></a>
						</div>
						<div class="brands__panel-visual brands__panel-visual--<?php echo esc_attr( $b['id'] ); ?>" aria-hidden="true"></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
