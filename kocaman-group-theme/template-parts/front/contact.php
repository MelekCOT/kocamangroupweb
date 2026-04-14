<?php
/**
 * İletişim — Contact Form 7 uyumlu sarmalayıcı
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone   = kocaman_get_option_field( 'footer_phone', '+90 551 233 52 93' );
$email   = kocaman_get_option_field( 'footer_email', 'bilgi@kocamangroup.com.tr' );
$address = kocaman_get_option_field( 'footer_address', 'Ölüdeniz Mah. Atatürk Cad., Fethiye, Türkiye' );
$map_url = kocaman_get_contact_map_url();
$wa_num  = kocaman_get_option_field( 'whatsapp_number', '905512335293' );
$wa_link = 'https://wa.me/' . preg_replace( '/\D/', '', $wa_num );
$cf7     = kocaman_get_option_field( 'contact_form_shortcode', '' );

$contact_status = '';
if ( isset( $_GET['contact'] ) ) {
	$contact_status = sanitize_key( wp_unslash( $_GET['contact'] ) );
}
?>
<section class="section contact" id="iletisim">
	<div class="container contact__grid">
		<div class="contact__info reveal" data-reveal>
			<p class="section__eyebrow"><?php esc_html_e( 'İletişim', 'kocaman-group' ); ?></p>
			<h2 class="section__title"><?php esc_html_e( 'Birlikte değer üretelim', 'kocaman-group' ); ?></h2>
			<p class="contact__lead"><?php esc_html_e( 'Bize yalnızca WhatsApp veya aşağıdaki iletişim formu üzerinden ulaşabilirsiniz.', 'kocaman-group' ); ?></p>
			<ul class="contact__list" role="list">
				<li>
					<span class="contact__list-label"><?php esc_html_e( 'WhatsApp', 'kocaman-group' ); ?></span>
					<a href="<?php echo esc_url( $wa_link ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $phone ); ?></a>
				</li>
				<li class="contact__list-item contact__list-item--address">
					<span class="contact__list-label"><?php esc_html_e( 'Adres', 'kocaman-group' ); ?></span>
					<a
						class="contact__address-link"
						href="<?php echo esc_url( $map_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						aria-label="<?php echo esc_attr( sprintf( __( 'Adres: %s. Konumu haritada aç.', 'kocaman-group' ), $address ) ); ?>"
					>
						<span class="contact__address-text"><?php echo esc_html( $address ); ?></span>
						<span class="contact__address-icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" focusable="false">
								<path
									fill="currentColor"
									fill-rule="evenodd"
									d="M12 2.25a6.75 6.75 0 0 0-6.75 6.75c0 4.61 5.576 10.574 6.384 11.394a.75.75 0 0 0 1.072 0C13.674 19.574 19.25 13.61 19.25 9A6.75 6.75 0 0 0 12 2.25Zm0 9a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z"
									clip-rule="evenodd"
								/>
							</svg>
						</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="contact__form-wrap reveal" data-reveal>
			<?php if ( 'sent' === $contact_status ) : ?>
				<p class="contact__notice contact__notice--success" role="status"><?php esc_html_e( 'Mesajınız alındı. En kısa sürede size dönüş yapacağız.', 'kocaman-group' ); ?></p>
			<?php elseif ( 'error' === $contact_status ) : ?>
				<p class="contact__notice contact__notice--error" role="alert"><?php esc_html_e( 'Gönderim sırasında bir sorun oluştu. Lütfen daha sonra tekrar deneyin veya doğrudan e-posta ile iletişime geçin.', 'kocaman-group' ); ?></p>
			<?php elseif ( 'invalid' === $contact_status ) : ?>
				<p class="contact__notice contact__notice--error" role="alert"><?php esc_html_e( 'Lütfen ad, geçerli e-posta ve mesaj alanlarını doldurun.', 'kocaman-group' ); ?></p>
			<?php endif; ?>
			<?php if ( $cf7 && function_exists( 'do_shortcode' ) ) : ?>
				<div class="contact__form contact__form--cf7">
					<?php echo do_shortcode( $cf7 ); ?>
				</div>
				<p class="contact__form-note contact__form-note--cf7"><?php echo esc_html( sprintf( __( 'Not: Sitede iletişim yalnızca WhatsApp ve bu form ile sağlanır. Contact Form 7 “To” alanını %s olarak ayarlayın.', 'kocaman-group' ), $email ) ); ?></p>
			<?php else : ?>
				<form class="contact__form kocaman-native-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" autocomplete="on">
					<?php wp_nonce_field( 'kocaman_contact', 'kocaman_contact_nonce' ); ?>
					<input type="hidden" name="action" value="kocaman_contact" />
					<p class="contact__form-note"><?php echo esc_html( sprintf( __( 'İletişim formu ile gönderilen mesajlar teknik olarak %s adresine iletilir. Kamuya açık e-posta veya telefon hattı sunulmamaktadır.', 'kocaman-group' ), $email ) ); ?></p>
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
