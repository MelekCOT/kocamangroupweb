<?php
/**
 * Faaliyet detay sayfaları — içerik ve URL’ler
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Faaliyet anahtarı → WordPress sayfa slug’u
 *
 * @param string $key insaat|villa|chickers|gayrimenkul.
 * @return string
 */
function kocaman_service_page_slug( $key ) {
	$map = array(
		'insaat'      => 'faaliyet-insaat',
		'villa'       => 'faaliyet-villa',
		'chickers'    => 'faaliyet-chickers',
		'gayrimenkul' => 'faaliyet-gayrimenkul',
	);
	return isset( $map[ $key ] ) ? $map[ $key ] : '';
}

/**
 * Faaliyet detay sayfası URL’si (sayfa yoksa kalıcı bağlantı yapısına göre).
 *
 * @param string $key insaat|villa|chickers|gayrimenkul.
 * @return string
 */
function kocaman_get_service_page_url( $key ) {
	$slug = kocaman_service_page_slug( $key );
	if ( '' === $slug ) {
		return home_url( '/' );
	}
	$page = get_page_by_path( $slug, OBJECT, 'page' );
	if ( $page && 'page' === $page->post_type ) {
		return get_permalink( $page );
	}
	return home_url( '/' . $slug . '/' );
}

/**
 * Faaliyet detay içeriği
 *
 * @param string $key insaat|villa|chickers|gayrimenkul.
 * @return array<string,mixed>|null
 */
function kocaman_get_service_detail( $key ) {
	$data = array(
		'insaat'      => array(
			'eyebrow'    => __( 'İnşaat ve proje geliştirme', 'kocaman-group' ),
			'title'      => __( 'Kocaman Group İnşaat', 'kocaman-group' ),
			'intro'      => __( 'Konut ve ticari yapılarda mühendislik disiplini, zamanında teslim ve güvenli şantiye yönetimi ile projelerinizi hayata geçiriyoruz.', 'kocaman-group' ),
			'paragraphs' => array(
				__( 'Planlama aşamasından anahtar teslime kadar şeffaf iletişim ve kalite kontrol süreçleri uygularız.', 'kocaman-group' ),
				__( 'Tedarik zinciri, iş güvenliği ve çevresel duyarlılık standartlarımızın merkezindedir.', 'kocaman-group' ),
			),
			'bullets'    => array(
				__( 'Konut ve karma kullanım projeleri', 'kocaman-group' ),
				__( 'Ticari ve endüstriyel yapılar', 'kocaman-group' ),
				__( 'Proje yönetimi ve danışmanlık', 'kocaman-group' ),
			),
		),
		'villa'       => array(
			'eyebrow'    => __( 'Turizm ve konaklama', 'kocaman-group' ),
			'title'      => __( 'Villatatilci', 'kocaman-group' ),
			'intro'      => __( 'Seçkin villa konaklamaları ve kişiselleştirilmiş tatil deneyimleri ile misafir memnuniyetini ön planda tutuyoruz.', 'kocaman-group' ),
			'paragraphs' => array(
				__( 'Konfor, gizlilik ve yerel destinasyon bilgisi ile unutulmaz konaklama sunarız.', 'kocaman-group' ),
				__( 'Rezervasyon ve misafir ilişkilerinde tutarlı, premium hizmet anlayışıyla çalışırız.', 'kocaman-group' ),
			),
			'bullets'    => array(
				__( 'Villa ve özel konaklama seçenekleri', 'kocaman-group' ),
				__( 'Tatil planlama ve deneyim tasarımı', 'kocaman-group' ),
				__( 'Misafir memnuniyeti odaklı operasyon', 'kocaman-group' ),
			),
		),
		'chickers'    => array(
			'eyebrow'    => __( 'Gıda ve restoran', 'kocaman-group' ),
			'title'      => __( "Chicker's Restaurant", 'kocaman-group' ),
			'intro'      => __( 'Modern mutfak anlayışı, tutarlı lezzet ve hijyen standartlarıyla premium restoran deneyimi sunuyoruz.', 'kocaman-group' ),
			'paragraphs' => array(
				__( 'Menü çeşitliliği ve sunum kalitesi ile marka değerini güçlendiririz.', 'kocaman-group' ),
				__( 'Eğitimli ekip ve operasyonel disiplin ile her şubede aynı standardı hedefleriz.', 'kocaman-group' ),
			),
			'bullets'    => array(
				__( 'Restoran işletmesi ve konsept geliştirme', 'kocaman-group' ),
				__( 'Kalite ve hijyen süreçleri', 'kocaman-group' ),
				__( 'Misafir deneyimi ve marka tutarlılığı', 'kocaman-group' ),
			),
		),
		'gayrimenkul' => array(
			'eyebrow'    => __( 'Gayrimenkul danışmanlığı', 'kocaman-group' ),
			'title'      => __( 'Kocaman Gayrimenkul', 'kocaman-group' ),
			'intro'      => __( 'Yatırım danışmanlığı, portföy yönetimi ve değer analizi ile doğru zamanda doğru kararları destekliyoruz.', 'kocaman-group' ),
			'paragraphs' => array(
				__( 'Piyasa verilerini ve riskleri şeffaf biçimde paylaşır, uzun vadeli değer üretimine odaklanırız.', 'kocaman-group' ),
				__( 'Konut, ticari ve yatırım amaçlı portföylerde profesyonel eşlik sağlarız.', 'kocaman-group' ),
			),
			'bullets'    => array(
				__( 'Satın alma ve satış danışmanlığı', 'kocaman-group' ),
				__( 'Yatırım analizi ve portföy stratejisi', 'kocaman-group' ),
				__( 'Pazar değerlendirmesi ve süreç takibi', 'kocaman-group' ),
			),
		),
	);

	return isset( $data[ $key ] ) ? $data[ $key ] : null;
}

/**
 * Tema etkinleştirildiğinde faaliyet sayfalarını oluştur (slug ile şablon eşlemesi).
 */
function kocaman_group_create_service_pages() {
	$pages = array(
		'faaliyet-insaat'      => 'Kocaman Group İnşaat',
		'faaliyet-villa'       => 'Villatatilci',
		'faaliyet-chickers'    => "Chicker's Restaurant",
		'faaliyet-gayrimenkul' => 'Kocaman Gayrimenkul',
	);
	foreach ( $pages as $slug => $title ) {
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing && 'page' === $existing->post_type ) {
			continue;
		}
		wp_insert_post(
			array(
				'post_title'   => wp_strip_all_tags( $title ),
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
	}
	flush_rewrite_rules( false );
}
add_action( 'after_switch_theme', 'kocaman_group_create_service_pages' );
