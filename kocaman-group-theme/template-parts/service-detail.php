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

$detail_gallery         = isset( $detail['gallery'] ) && is_array( $detail['gallery'] ) ? $detail['gallery'] : array();
$detail_gallery_heading = isset( $detail['gallery_heading'] ) ? $detail['gallery_heading'] : '';
$construction_story     = isset( $detail['construction_story'] ) && is_array( $detail['construction_story'] ) ? $detail['construction_story'] : null;

$detail_hero_image = null;
if ( 'insaat' === $detail_key ) {
	$detail_hero_image = array(
		'file'     => 'kocaman-insaat-proje-ekibi.png',
		'alt'      => __( 'Kocaman Group İnşaat — plan ve üç boyutlu proje modeli ile sahadaki mühendislik yaklaşımı', 'kocaman-group' ),
		'portrait' => true,
		'width'    => 1200,
		'height'   => 1600,
	);
} elseif ( 'gayrimenkul' === $detail_key ) {
	$detail_hero_image = array(
		'file' => 'kocaman-gayrimenkul-villa.png',
		'alt'  => __( 'Modern üç katlı lüks villa, özel havuz ve çağdaş mimari tasarımlı Kocaman Gayrimenkul projesi', 'kocaman-group' ),
	);
}
?>
<main id="main" class="site-main site-main--page service-detail<?php echo 'insaat' === $detail_key ? ' service-detail--insaat' : ''; ?>" role="main">
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
				<?php if ( ! empty( $detail['tagline'] ) ) : ?>
					<p class="service-detail__tagline"><?php echo esc_html( $detail['tagline'] ); ?></p>
				<?php endif; ?>
				<p class="service-detail__intro"><?php echo esc_html( $detail['intro'] ); ?></p>
			</div>
		</header>
		<?php if ( $detail_hero_image ) : ?>
			<?php
			$figure_classes = 'service-detail__figure';
			if ( ! empty( $detail_hero_image['portrait'] ) ) {
				$figure_classes .= ' service-detail__figure--portrait';
			}
			if ( 'insaat' === $detail_key ) {
				$figure_classes .= ' service-detail__figure--insaat-hero';
			}
			$img_w = isset( $detail_hero_image['width'] ) ? (int) $detail_hero_image['width'] : 1600;
			$img_h = isset( $detail_hero_image['height'] ) ? (int) $detail_hero_image['height'] : 900;
			?>
			<figure class="<?php echo esc_attr( $figure_classes ); ?>">
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $detail_hero_image['file'] ); ?>"
					alt="<?php echo esc_attr( $detail_hero_image['alt'] ); ?>"
					width="<?php echo esc_attr( (string) $img_w ); ?>"
					height="<?php echo esc_attr( (string) $img_h ); ?>"
					loading="lazy"
					decoding="async"
				>
			</figure>
		<?php endif; ?>
		<?php if ( ! empty( $detail_gallery ) ) : ?>
			<section class="service-detail__gallery-section" aria-label="<?php echo esc_attr( $detail_gallery_heading ? $detail_gallery_heading : __( 'Fotoğraf galerisi', 'kocaman-group' ) ); ?>">
				<div class="container service-detail__gallery-inner">
					<?php if ( $detail_gallery_heading ) : ?>
						<h2 class="service-detail__gallery-heading"><?php echo esc_html( $detail_gallery_heading ); ?></h2>
					<?php endif; ?>
					<div class="service-detail__gallery" data-service-gallery>
						<div class="service-detail__gallery-row">
							<button type="button" class="service-detail__gallery-btn service-detail__gallery-btn--prev" data-gallery-prev aria-label="<?php esc_attr_e( 'Önceki görsel', 'kocaman-group' ); ?>">
								<span aria-hidden="true">&#8249;</span>
							</button>
							<div
								class="service-detail__gallery-viewport"
								data-gallery-viewport
								tabindex="0"
								role="region"
								aria-roledescription="<?php echo esc_attr( __( 'Slayt galeri', 'kocaman-group' ) ); ?>"
								aria-label="<?php esc_attr_e( 'Proje fotoğrafları', 'kocaman-group' ); ?>"
							>
								<?php foreach ( $detail_gallery as $gidx => $gitem ) : ?>
									<?php
									$gfile = isset( $gitem['file'] ) ? $gitem['file'] : '';
									$galt  = isset( $gitem['alt'] ) ? $gitem['alt'] : '';
									if ( '' === $gfile ) {
										continue;
									}
									?>
									<figure class="service-detail__gallery-slide" data-gallery-slide>
										<img
											src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $gfile ); ?>"
											alt="<?php echo esc_attr( $galt ); ?>"
											loading="lazy"
											decoding="async"
										>
									</figure>
								<?php endforeach; ?>
							</div>
							<button type="button" class="service-detail__gallery-btn service-detail__gallery-btn--next" data-gallery-next aria-label="<?php esc_attr_e( 'Sonraki görsel', 'kocaman-group' ); ?>">
								<span aria-hidden="true">›</span>
							</button>
						</div>
						<div class="service-detail__gallery-dots" data-gallery-dots>
							<?php
							$gallery_slide_total = 0;
							foreach ( $detail_gallery as $gitem ) {
								if ( ! empty( $gitem['file'] ) ) {
									++$gallery_slide_total;
								}
							}
							$dot_i = 0;
							foreach ( $detail_gallery as $gitem ) {
								if ( empty( $gitem['file'] ) ) {
									continue;
								}
								?>
								<button
									type="button"
									class="service-detail__gallery-dot<?php echo 0 === $dot_i ? ' is-active' : ''; ?>"
									data-gallery-dot="<?php echo (int) $dot_i; ?>"
									aria-label="<?php echo esc_attr( sprintf( __( 'Slayt %1$d / %2$d', 'kocaman-group' ), $dot_i + 1, $gallery_slide_total ) ); ?>"
									<?php echo 0 === $dot_i ? ' aria-current="true"' : ''; ?>
								></button>
								<?php
								++$dot_i;
							}
							?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
		<?php if ( $construction_story && ! empty( $construction_story['title'] ) && ! empty( $construction_story['lead'] ) ) : ?>
			<section class="service-detail__story-section" aria-labelledby="service-construction-story-heading">
				<div class="container service-detail__story">
					<h2 id="service-construction-story-heading" class="service-detail__story-title"><?php echo esc_html( $construction_story['title'] ); ?></h2>
					<p class="service-detail__p"><?php echo esc_html( $construction_story['lead'] ); ?></p>
					<?php if ( ! empty( $construction_story['integration_title'] ) && ! empty( $construction_story['integration'] ) ) : ?>
						<h3 class="service-detail__story-subtitle"><?php echo esc_html( $construction_story['integration_title'] ); ?></h3>
						<p class="service-detail__p"><?php echo esc_html( $construction_story['integration'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $construction_story['highlights'] ) && is_array( $construction_story['highlights'] ) ) : ?>
						<ul class="service-detail__list" role="list">
							<?php foreach ( $construction_story['highlights'] as $hi ) : ?>
								<li><?php echo esc_html( $hi ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php
					$building_types = isset( $construction_story['building_types'] ) && is_array( $construction_story['building_types'] ) ? $construction_story['building_types'] : null;
					$bt_title       = $building_types && ! empty( $building_types['title'] ) ? (string) $building_types['title'] : '';
					$bt_items       = $building_types && ! empty( $building_types['items'] ) && is_array( $building_types['items'] ) ? $building_types['items'] : array();
					?>
					<?php if ( '' !== $bt_title && ! empty( $bt_items ) ) : ?>
						<h3 class="service-detail__story-subtitle service-detail__story-subtitle--building"><?php echo esc_html( $bt_title ); ?></h3>
						<?php if ( ! empty( $building_types['lead'] ) ) : ?>
							<p class="service-detail__p"><?php echo esc_html( (string) $building_types['lead'] ); ?></p>
						<?php endif; ?>
						<div class="service-detail__values-grid service-detail__values-grid--building" role="list">
							<?php foreach ( $bt_items as $bt ) : ?>
								<?php
								$bt_item_title = isset( $bt['title'] ) ? (string) $bt['title'] : '';
								$bt_item_text  = isset( $bt['text'] ) ? (string) $bt['text'] : '';
								if ( '' === $bt_item_title && '' === $bt_item_text ) {
									continue;
								}
								?>
								<article class="service-detail__value-card" role="listitem">
									<?php if ( '' !== $bt_item_title ) : ?>
										<h4 class="service-detail__value-title"><?php echo esc_html( $bt_item_title ); ?></h4>
									<?php endif; ?>
									<?php if ( '' !== $bt_item_text ) : ?>
										<p class="service-detail__value-text"><?php echo esc_html( $bt_item_text ); ?></p>
									<?php endif; ?>
								</article>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $construction_story['vision_title'] ) && ! empty( $construction_story['vision'] ) && ! empty( $construction_story['mission_title'] ) && ! empty( $construction_story['mission'] ) ) : ?>
						<div class="service-detail__vm-mini">
							<div class="service-detail__vm-mini-block">
								<h4 class="service-detail__vm-mini-title"><?php echo esc_html( $construction_story['vision_title'] ); ?></h4>
								<?php
								$vision_esc = esc_html( $construction_story['vision'] );
								$vision_marker = '~kg_imza~';
								?>
								<p class="service-detail__p service-detail__p--compact service-detail__vision-p">
									<?php if ( preg_match( '/\bimza\b/u', $vision_esc ) ) : ?>
										<?php
										$vision_split = preg_replace( '/\bimza\b/u', $vision_marker, $vision_esc, 1 );
										$vision_parts  = explode( $vision_marker, $vision_split, 2 );
										$vision_before = $vision_parts[0];
										$vision_after  = isset( $vision_parts[1] ) ? $vision_parts[1] : '';
										?>
										<?php echo esc_html( $vision_before ); ?><span class="service-detail__vision-imza-group"><strong class="service-detail__vision-keyword"><?php echo esc_html( 'imza' ); ?></strong><span class="service-detail__vision-arrow" aria-hidden="true"><svg class="service-detail__vision-arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 14" preserveAspectRatio="none" fill="none" focusable="false"><path vector-effect="non-scaling-stroke" d="M42 7H11" stroke="currentColor" stroke-width="4" stroke-linecap="round"/><path vector-effect="non-scaling-stroke" d="M11 2.5L2 7M11 11.5L2 7" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></span></span><?php echo esc_html( $vision_after ); ?>
									<?php else : ?>
										<?php echo esc_html( $vision_esc ); ?>
									<?php endif; ?>
								</p>
							</div>
							<div class="service-detail__vm-mini-block">
								<h4 class="service-detail__vm-mini-title"><?php echo esc_html( $construction_story['mission_title'] ); ?></h4>
								<p class="service-detail__p service-detail__p--compact"><?php echo esc_html( $construction_story['mission'] ); ?></p>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $construction_story['values_title'] ) && ! empty( $construction_story['values'] ) && is_array( $construction_story['values'] ) ) : ?>
						<h3 class="service-detail__story-subtitle service-detail__story-subtitle--values"><?php echo esc_html( $construction_story['values_title'] ); ?></h3>
						<div class="service-detail__values-grid" role="list">
							<?php foreach ( $construction_story['values'] as $val ) : ?>
								<?php
								$v_icon  = isset( $val['icon'] ) ? (string) $val['icon'] : '';
								$v_title = isset( $val['title'] ) ? (string) $val['title'] : '';
								$v_text  = isset( $val['text'] ) ? (string) $val['text'] : '';
								if ( '' === $v_title && '' === $v_text ) {
									continue;
								}
								?>
								<article class="service-detail__value-card" role="listitem">
									<?php if ( '' !== $v_icon ) : ?>
										<span class="service-detail__value-icon" aria-hidden="true"><?php echo esc_html( $v_icon ); ?></span>
									<?php endif; ?>
									<h4 class="service-detail__value-title"><?php echo esc_html( $v_title ); ?></h4>
									<p class="service-detail__value-text"><?php echo esc_html( $v_text ); ?></p>
								</article>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>
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
