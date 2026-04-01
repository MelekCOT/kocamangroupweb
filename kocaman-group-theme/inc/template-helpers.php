<?php
/**
 * Şablon yardımcıları — ACF yoksa varsayılan içerik
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACF alanı veya varsayılan
 *
 * @param string $selector Alan adı veya 'group_field'.
 * @param mixed  $default Varsayılan değer.
 * @return mixed
 */
function kocaman_get_field( $selector, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $selector );
		if ( null !== $val && '' !== $val && false !== $val ) {
			return $val;
		}
	}
	return $default;
}

/**
 * İsteğe bağlı: sayfa şablonu için ACF
 */
function kocaman_get_option_field( $selector, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $selector, 'option' );
		if ( null !== $val && '' !== $val && false !== $val ) {
			return $val;
		}
	}
	return $default;
}

/**
 * Menü atanmamışsa varsayılan bağlantılar
 */
function kocaman_group_default_menu() {
	$items = array(
		''             => __( 'Anasayfa', 'kocaman-group' ),
		'#hakkimizda'  => __( 'Hakkımızda', 'kocaman-group' ),
		'#faaliyet'    => __( 'Faaliyet Alanlarımız', 'kocaman-group' ),
		'#markalar'    => __( 'Markalarımız', 'kocaman-group' ),
		'#projeler'    => __( 'Projeler', 'kocaman-group' ),
		'#iletisim'    => __( 'İletişim', 'kocaman-group' ),
	);
	echo '<ul id="primary-menu" class="site-header__menu">';
	$base = home_url( '/' );
	foreach ( $items as $path => $label ) {
		$url = '' === $path ? $base : $base . $path;
		printf(
			'<li class="menu-item"><a href="%s">%s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * Footer menü yoksa
 */
function kocaman_group_footer_fallback() {
	echo '<ul class="site-footer__links">';
	$links = array(
		home_url( '/#hakkimizda' ) => __( 'Hakkımızda', 'kocaman-group' ),
		home_url( '/#faaliyet' )   => __( 'Faaliyet Alanlarımız', 'kocaman-group' ),
		home_url( '/#markalar' )   => __( 'Markalarımız', 'kocaman-group' ),
		home_url( '/#projeler' )   => __( 'Projeler', 'kocaman-group' ),
		home_url( '/#iletisim' )   => __( 'İletişim', 'kocaman-group' ),
	);
	foreach ( $links as $url => $label ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}
