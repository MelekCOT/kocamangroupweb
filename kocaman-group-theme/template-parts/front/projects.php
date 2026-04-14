<?php
/**
 * Projeler vitrin
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$projects = array(
	array(
		'title' => __( 'Yapı', 'kocaman-group' ),
		'cat'   => __( 'İnşaat', 'kocaman-group' ),
		'slug'  => 'insaat',
		'media' => 'vitrin-yapi',
	),
	array(
		'title' => __( 'Yapı', 'kocaman-group' ),
		'cat'   => __( 'İnşaat', 'kocaman-group' ),
		'slug'  => 'insaat',
		'media' => 'vitrin-santiye',
	),
	array(
		'title' => __( 'Villa Kompleksi', 'kocaman-group' ),
		'cat'   => __( 'Turizm', 'kocaman-group' ),
		'slug'  => 'turizm',
	),
	array(
		'title' => __( 'Şube Konsepti', 'kocaman-group' ),
		'cat'   => __( 'Gıda', 'kocaman-group' ),
		'slug'  => 'gida',
	),
	array(
		'title' => __( 'Yatırım Portföyü', 'kocaman-group' ),
		'cat'   => __( 'Gayrimenkul', 'kocaman-group' ),
		'slug'  => 'gayrimenkul',
	),
	array(
		'title' => __( 'Ticari Yapı', 'kocaman-group' ),
		'cat'   => __( 'İnşaat', 'kocaman-group' ),
		'slug'  => 'insaat',
		'insaat_visual' => 'alt',
	),
	array(
		'title' => __( 'Butik Villa', 'kocaman-group' ),
		'cat'   => __( 'Turizm', 'kocaman-group' ),
		'slug'  => 'turizm',
		'turizm_visual' => 'alt',
	),
);
?>
<section class="section projects" id="projeler">
	<div class="container">
		<header class="section__header">
			<p class="section__eyebrow reveal" data-reveal><?php esc_html_e( 'Projeler', 'kocaman-group' ); ?></p>
			<h2 class="section__title reveal" data-reveal><?php esc_html_e( 'Seçilmiş vitrin', 'kocaman-group' ); ?></h2>
			<p class="section__desc reveal" data-reveal><?php esc_html_e( 'Farklı sektörlerden örnek çalışmalarımız.', 'kocaman-group' ); ?></p>
		</header>
		<div class="projects__grid">
			<?php foreach ( $projects as $p ) : ?>
				<article class="project-card reveal" data-reveal>
					<?php
					if ( ! empty( $p['media'] ) ) {
						$media_class = 'project-card__media project-card__media--' . esc_attr( $p['media'] );
					} else {
						$media_class = 'project-card__media project-card__media--' . esc_attr( $p['slug'] );
						if ( 'insaat' === $p['slug'] && isset( $p['insaat_visual'] ) && 'alt' === $p['insaat_visual'] ) {
							$media_class .= ' project-card__media--insaat-alt';
						}
						if ( 'turizm' === $p['slug'] && isset( $p['turizm_visual'] ) && 'alt' === $p['turizm_visual'] ) {
							$media_class .= ' project-card__media--turizm-alt';
						}
					}
					?>
					<div class="<?php echo esc_attr( $media_class ); ?>">
						<div class="project-card__overlay">
							<span class="project-card__cat"><?php echo esc_html( $p['cat'] ); ?></span>
							<h3 class="project-card__title"><?php echo esc_html( $p['title'] ); ?></h3>
							<a class="btn btn--sm btn--light" href="#iletisim"><?php esc_html_e( 'İletişime geç', 'kocaman-group' ); ?></a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
