<?php
/**
 * ACF yerel alan grupları (ACF eklentisi aktifken)
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ACF seçenek sayfası ve alan grupları
 */
function kocaman_group_acf_init() {
	if ( ! function_exists( 'acf_add_options_page' ) || ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_options_page(
		array(
			'page_title' => __( 'Kocaman Tema Ayarları', 'kocaman-group' ),
			'menu_title' => __( 'Kocaman Ayarları', 'kocaman-group' ),
			'menu_slug'  => 'kocaman-group-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_kg_theme_options',
			'title'                 => __( 'Kocaman — Tema Ayarları', 'kocaman-group' ),
			'fields'                => array(
				array(
					'key'   => 'field_kg_footer_phone',
					'label' => __( 'Telefon', 'kocaman-group' ),
					'name'  => 'footer_phone',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_kg_footer_email',
					'label' => __( 'E-posta', 'kocaman-group' ),
					'name'  => 'footer_email',
					'type'  => 'email',
				),
				array(
					'key'   => 'field_kg_footer_address',
					'label' => __( 'Adres', 'kocaman-group' ),
					'name'  => 'footer_address',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'           => 'field_kg_contact_map_url',
					'label'         => __( 'Adres harita bağlantısı', 'kocaman-group' ),
					'name'          => 'contact_map_url',
					'type'          => 'url',
					'default_value' => 'https://share.google/gWuYzB63KmKaYfNR0',
					'instructions'  => __( 'İletişim ve footer’daki adres satırı bu bağlantıya gider (Google Maps paylaşım vb.).', 'kocaman-group' ),
				),
				array(
					'key'   => 'field_kg_footer_tagline',
					'label' => __( 'Footer kısa açıklama', 'kocaman-group' ),
					'name'  => 'footer_tagline',
					'type'  => 'textarea',
					'rows'  => 3,
				),
				array(
					'key'   => 'field_kg_whatsapp',
					'label' => __( 'WhatsApp (ülke kodu ile, örn: 905512335293)', 'kocaman-group' ),
					'name'  => 'whatsapp_number',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_kg_social_facebook',
					'label' => 'Facebook URL',
					'name'  => 'social_facebook',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_kg_social_instagram',
					'label' => 'Instagram URL',
					'name'  => 'social_instagram',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_kg_social_tiktok',
					'label' => 'TikTok URL',
					'name'  => 'social_tiktok',
					'type'  => 'url',
				),
				array(
					'key'          => 'field_kg_cf7',
					'label'        => __( 'İletişim formu (CF7 kısa kod)', 'kocaman-group' ),
					'name'         => 'contact_form_shortcode',
					'type'         => 'text',
					'instructions' => __( 'Örn: [contact-form-7 id="123" title="İletişim"]. Mail sekmesinde alıcı: bilgi@kocamangroup.com.tr', 'kocaman-group' ),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'kocaman-group-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_kg_front_hero',
			'title'                 => __( 'Kocaman — Ana Sayfa Hero', 'kocaman-group' ),
			'fields'                => array(
				array(
					'key'           => 'field_kg_hero_title',
					'label'         => __( 'Başlık', 'kocaman-group' ),
					'name'          => 'hero_title',
					'type'          => 'text',
					'default_value' => 'KOCAMAN GROUP',
				),
				array(
					'key'   => 'field_kg_hero_subtitle',
					'label' => __( 'Alt başlık', 'kocaman-group' ),
					'name'  => 'hero_subtitle',
					'type'  => 'textarea',
					'rows'  => 2,
				),
				array(
					'key'           => 'field_kg_hero_bg',
					'label'         => __( 'Hero arka plan görseli', 'kocaman-group' ),
					'name'          => 'hero_background',
					'type'          => 'image',
					'return_format' => 'array',
					'preview_size'  => 'large',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'page_type',
						'operator' => '==',
						'value'    => 'front_page',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'kocaman_group_acf_init' );
