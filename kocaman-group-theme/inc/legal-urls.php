<?php
/**
 * Yasal sayfa bağlantıları (form / KVKK / gizlilik)
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer ve şablonlarda kullanılacak yasal bağlantı listesi.
 * WordPress Gizlilik Politikası sayfası atanmışsa ilk öğe o URL’yi kullanır.
 *
 * @return array<int, array{label: string, url: string}>
 */
function kocaman_get_legal_links() {
	$privacy_url = '';
	if ( function_exists( 'get_privacy_policy_url' ) ) {
		$privacy_url = get_privacy_policy_url();
	}
	if ( ! is_string( $privacy_url ) || '' === $privacy_url ) {
		$privacy_url = home_url( '/gizlilik-politikasi/' );
	}

	$links = array(
		array(
			'label' => __( 'Gizlilik Politikası', 'kocaman-group' ),
			'url'   => $privacy_url,
		),
		array(
			'label' => __( 'KVKK Aydınlatma Metni', 'kocaman-group' ),
			'url'   => home_url( '/kvkk-aydinlatma/' ),
		),
		array(
			'label' => __( 'Çerez Politikası', 'kocaman-group' ),
			'url'   => home_url( '/cerez-politikasi/' ),
		),
		array(
			'label' => __( 'Açık Rıza Metni', 'kocaman-group' ),
			'url'   => home_url( '/acik-riza-metni/' ),
		),
		array(
			'label' => __( 'Kullanım Koşulları', 'kocaman-group' ),
			'url'   => home_url( '/kullanim-kosullari/' ),
		),
	);

	return apply_filters( 'kocaman_legal_links', $links );
}

/**
 * Tema etkinleştirildiğinde yasal sayfalar şablon metinlerle oluşturulur;
 * yalnızca eski yer tutucu metni taşıyan sayfalar otomatik güncellenir.
 */
function kocaman_group_create_legal_pages() {
	$pages = array(
		'gizlilik-politikasi' => __( 'Gizlilik Politikası', 'kocaman-group' ),
		'kvkk-aydinlatma'     => __( 'KVKK Aydınlatma Metni', 'kocaman-group' ),
		'cerez-politikasi'    => __( 'Çerez Politikası', 'kocaman-group' ),
		'acik-riza-metni'     => __( 'Açık Rıza Metni', 'kocaman-group' ),
		'kullanim-kosullari'  => __( 'Kullanım Koşulları', 'kocaman-group' ),
	);

	$placeholder_snippet = 'Bu sayfayı düzenleyerek yasal metninizi ekleyin';

	foreach ( $pages as $slug => $title ) {
		$html = kocaman_get_legal_page_content( $slug );
		if ( '' === $html ) {
			$html = '<p>' . esc_html__( 'Bu sayfa için içerik yüklenemedi.', 'kocaman-group' ) . '</p>';
		}

		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing && 'page' === $existing->post_type ) {
			if ( false !== strpos( $existing->post_content, $placeholder_snippet ) ) {
				wp_update_post(
					array(
						'ID'           => (int) $existing->ID,
						'post_content' => $html,
					)
				);
			}
			continue;
		}

		wp_insert_post(
			array(
				'post_title'   => wp_strip_all_tags( $title ),
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => $html,
			)
		);
	}
}
add_action( 'after_switch_theme', 'kocaman_group_create_legal_pages' );
