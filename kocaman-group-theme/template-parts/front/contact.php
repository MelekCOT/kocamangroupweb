<?php
/**
 * İletişim — Contact Form 7 uyumlu sarmalayıcı
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone   = kocaman_get_option_field( 'footer_phone', '+90 (___) ___ __ __' );
$email   = kocaman_get_option_field( 'footer_email', 'info@kocamangroup.com' );
$address = kocaman_get_option_field( 'footer_address', 'Türkiye' );
$cf7     = kocaman_get_option_field( 'contact_form_shortcode', '' );
?>
<section class="section contact" id="iletisim">
	<div class="container contact__grid">
		<div class="contact__info reveal" data-reveal>
			<p class="section__eyebrow"><?php esc_html_e( 'İletişim', 'kocaman-group' ); ?></p>
			<h2 class="section__title"><?php esc_html_e( 'Birlikte değer üretelim', 'kocaman-group' ); ?></h2>
			<p class="contact__lead"><?php esc_html_e( 'Projeleriniz ve iş birlikleri için ekibimizle görüşün.', 'kocaman-group' ); ?></p>
			<ul class="contact__list" role="list">
				<li>
					<span class="contact__list-label"><?php esc_html_e( 'Telefon', 'kocaman-group' ); ?></span>
					<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
				</li>
				<li>
					<span class="contact__list-label"><?php esc_html_e( 'E-posta', 'kocaman-group' ); ?></span>
					<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
				</li>
				<li>
					<span class="contact__list-label"><?php esc_html_e( 'Adres', 'kocaman-group' ); ?></span>
					<?php echo esc_html( $address ); ?>
				</li>
			</ul>
		</div>
		<div class="contact__form-wrap reveal" data-reveal>
			<?php if ( $cf7 && function_exists( 'do_shortcode' ) ) : ?>
				<div class="contact__form contact__form--cf7">
					<?php echo do_shortcode( $cf7 ); ?>
				</div>
			<?php else : ?>
				<form class="contact__form kocaman-native-form" method="post" action="#" autocomplete="on">
					<p class="contact__form-note"><?php esc_html_e( 'Contact Form 7 kısa kodunu ACF seçeneklerinden ekleyebilirsiniz.', 'kocaman-group' ); ?></p>
					<div class="contact__form-row">
						<label class="contact__label" for="kg-name"><?php esc_html_e( 'Ad Soyad', 'kocaman-group' ); ?></label>
						<input class="contact__input" type="text" id="kg-name" name="your-name" required>
					</div>
					<div class="contact__form-row contact__form-row--half">
						<div>
							<label class="contact__label" for="kg-phone"><?php esc_html_e( 'Telefon', 'kocaman-group' ); ?></label>
							<input class="contact__input" type="tel" id="kg-phone" name="your-phone">
						</div>
						<div>
							<label class="contact__label" for="kg-email"><?php esc_html_e( 'E-posta', 'kocaman-group' ); ?></label>
							<input class="contact__input" type="email" id="kg-email" name="your-email" required>
						</div>
					</div>
					<div class="contact__form-row">
						<label class="contact__label" for="kg-subject"><?php esc_html_e( 'Konu', 'kocaman-group' ); ?></label>
						<input class="contact__input" type="text" id="kg-subject" name="your-subject">
					</div>
					<div class="contact__form-row">
						<label class="contact__label" for="kg-message"><?php esc_html_e( 'Mesaj', 'kocaman-group' ); ?></label>
						<textarea class="contact__input contact__textarea" id="kg-message" name="your-message" rows="5" required></textarea>
					</div>
					<button type="submit" class="btn btn--primary btn--block"><?php esc_html_e( 'Gönder', 'kocaman-group' ); ?></button>
				</form>
			<?php endif; ?>
		</div>
	</div>
</section>
