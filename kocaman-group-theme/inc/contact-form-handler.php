<?php
/**
 * Yerel iletişim formu — wp_mail ile gönderim (CF7 yokken)
 *
 * Alıcı: ACF “E-posta” (footer_email) veya varsayılan bilgi@kocamangroup.com.tr
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * İletişim formu işleyicisi (giriş yapmamış ziyaretçiler dahil).
 */
function kocaman_group_contact_form_handle() {
	if ( ! isset( $_POST['kocaman_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kocaman_contact_nonce'] ) ), 'kocaman_contact' ) ) {
		kocaman_group_contact_redirect( 'error' );
	}

	$recipient = kocaman_get_option_field( 'footer_email', 'bilgi@kocamangroup.com.tr' );
	$recipient = apply_filters( 'kocaman_contact_recipient', $recipient );

	if ( ! is_email( $recipient ) ) {
		kocaman_group_contact_redirect( 'error' );
	}

	$name    = isset( $_POST['your-name'] ) ? sanitize_text_field( wp_unslash( $_POST['your-name'] ) ) : '';
	$phone   = isset( $_POST['your-phone'] ) ? sanitize_text_field( wp_unslash( $_POST['your-phone'] ) ) : '';
	$email   = isset( $_POST['your-email'] ) ? sanitize_email( wp_unslash( $_POST['your-email'] ) ) : '';
	$subject = isset( $_POST['your-subject'] ) ? sanitize_text_field( wp_unslash( $_POST['your-subject'] ) ) : '';
	$message = isset( $_POST['your-message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['your-message'] ) ) : '';

	if ( '' === $name || '' === $message || ! is_email( $email ) ) {
		kocaman_group_contact_redirect( 'invalid' );
	}

	$subj = sprintf(
		'[ %s ] %s',
		wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ),
		$subject ? $subject : __( 'İletişim formu', 'kocaman-group' )
	);

	$body = sprintf(
		"%s\n\n%s: %s\n%s: %s\n%s: %s\n\n%s\n",
		__( 'Bu mesaj web sitesi iletişim formundan gönderildi.', 'kocaman-group' ),
		__( 'Ad Soyad', 'kocaman-group' ),
		$name,
		__( 'Telefon', 'kocaman-group' ),
		$phone ? $phone : '—',
		__( 'E-posta (yanıt için)', 'kocaman-group' ),
		$email,
		$message
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $email,
	);

	$sent = wp_mail( $recipient, $subj, $body, $headers );

	kocaman_group_contact_redirect( $sent ? 'sent' : 'error' );
}

/**
 * @param string $status sent|error|invalid
 */
function kocaman_group_contact_redirect( $status ) {
	$url = add_query_arg( 'contact', sanitize_key( $status ), home_url( '/' ) ) . '#iletisim';
	wp_safe_redirect( $url );
	exit;
}

add_action( 'admin_post_nopriv_kocaman_contact', 'kocaman_group_contact_form_handle' );
add_action( 'admin_post_kocaman_contact', 'kocaman_group_contact_form_handle' );
