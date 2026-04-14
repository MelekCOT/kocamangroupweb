<?php
/**
 * Kocaman Group tema fonksiyonları
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KOCAMAN_GROUP_VERSION', '1.0.0' );
define( 'KOCAMAN_GROUP_DIR', get_template_directory() );
define( 'KOCAMAN_GROUP_URI', get_template_directory_uri() );

/**
 * Tema kurulumu
 */
function kocaman_group_setup() {
	load_theme_textdomain( 'kocaman-group', KOCAMAN_GROUP_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Ana Menü', 'kocaman-group' ),
			'footer'  => esc_html__( 'Footer Menü', 'kocaman-group' ),
		)
	);

	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );

	// Elementor: tam genişlik ve tema stilleri
	add_theme_support( 'elementor' );
}
add_action( 'after_setup_theme', 'kocaman_group_setup' );

/**
 * İçerik genişliği
 */
function kocaman_group_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kocaman_group_content_width', 1320 );
}
add_action( 'after_setup_theme', 'kocaman_group_content_width', 0 );

/**
 * Script ve stil
 */
function kocaman_group_scripts() {
	wp_enqueue_style(
		'kocaman-group-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'kocaman-group-main',
		KOCAMAN_GROUP_URI . '/assets/css/kocaman-main.css',
		array(),
		KOCAMAN_GROUP_VERSION
	);

	wp_enqueue_style(
		'kocaman-group-style',
		get_stylesheet_uri(),
		array( 'kocaman-group-main' ),
		KOCAMAN_GROUP_VERSION
	);

	wp_enqueue_script(
		'kocaman-group-main',
		KOCAMAN_GROUP_URI . '/assets/js/kocaman-main.js',
		array(),
		KOCAMAN_GROUP_VERSION,
		true
	);

	wp_localize_script(
		'kocaman-group-main',
		'kocamanGroup',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'kocaman_group_nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'kocaman_group_scripts' );

/**
 * Yardımcı dosyalar
 */
require_once KOCAMAN_GROUP_DIR . '/inc/template-helpers.php';
require_once KOCAMAN_GROUP_DIR . '/inc/contact-form-handler.php';
require_once KOCAMAN_GROUP_DIR . '/inc/service-detail-data.php';
require_once KOCAMAN_GROUP_DIR . '/inc/legal-page-content.php';
require_once KOCAMAN_GROUP_DIR . '/inc/legal-urls.php';

if ( file_exists( KOCAMAN_GROUP_DIR . '/inc/acf-fields.php' ) ) {
	require_once KOCAMAN_GROUP_DIR . '/inc/acf-fields.php';
}

/**
 * Yasal sayfalarda wpautop, HTML yapısını bozmasın diye kapatılır.
 */
function kocaman_group_disable_wpautop_on_legal_pages() {
	if ( is_page( array( 'gizlilik-politikasi', 'kvkk-aydinlatma', 'cerez-politikasi', 'acik-riza-metni', 'kullanim-kosullari' ) ) ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}
}
add_action( 'wp', 'kocaman_group_disable_wpautop_on_legal_pages' );

/**
 * Body sınıfları
 */
function kocaman_group_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'kocaman-front-page';
	}
	if ( is_page( array( 'faaliyet-insaat', 'faaliyet-villa', 'faaliyet-chickers', 'faaliyet-gayrimenkul' ) ) ) {
		$classes[] = 'kocaman-service-detail';
	}
	return $classes;
}
add_filter( 'body_class', 'kocaman_group_body_classes' );

/**
 * Hero video CDN için preconnect (ilk kare daha hızlı).
 *
 * @param array  $urls          Kaynak ipuçları.
 * @param string $relation_type İlişki türü.
 * @return array
 */
function kocaman_group_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type && is_front_page() ) {
		$urls[] = 'https://videos.pexels.com';
		$urls[] = 'https://images.unsplash.com';
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'kocaman_group_resource_hints', 10, 2 );
