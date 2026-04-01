<?php
/**
 * Sayılar — animasyonlu sayaçlar
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$counters = array(
	array(
		'type'   => 'number',
		'target' => 4,
		'suffix' => '',
		'label'  => __( 'Ana Faaliyet Alanı', 'kocaman-group' ),
	),
	array(
		'type'   => 'number',
		'target' => 100,
		'suffix' => '%',
		'label'  => __( 'Güven Odaklı Yaklaşım', 'kocaman-group' ),
	),
	array(
		'type'    => 'text',
		'display' => __( 'Premium', 'kocaman-group' ),
		'label'   => __( 'Hizmet Anlayışı', 'kocaman-group' ),
	),
	array(
		'type'    => 'text',
		'display' => __( 'Sürdürülebilir', 'kocaman-group' ),
		'label'   => __( 'Büyüme', 'kocaman-group' ),
	),
);
?>
<section class="section stats" id="sayilar" data-stats-section>
	<div class="container">
		<header class="section__header section__header--center">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Rakamlarla', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Sayılarla KOCAMAN GROUP', 'kocaman-group' ); ?></h2>
		</header>
		<div class="stats__grid">
			<?php foreach ( $counters as $c ) : ?>
				<div class="stat-block reveal" data-reveal>
					<?php if ( 'number' === $c['type'] ) : ?>
						<span class="stat-block__value">
							<span class="stat-block__num" data-counter data-target="<?php echo esc_attr( (string) $c['target'] ); ?>" data-suffix="<?php echo esc_attr( $c['suffix'] ); ?>">0</span>
						</span>
					<?php else : ?>
						<span class="stat-block__value stat-block__value--text"><?php echo esc_html( $c['display'] ); ?></span>
					<?php endif; ?>
					<span class="stat-block__label"><?php echo esc_html( $c['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
