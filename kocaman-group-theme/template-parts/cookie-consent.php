<?php
/**
 * Çerez onay çubuğu (KVKK / ePrivacy uyumu için bilgilendirme + tercih)
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cerez_url = home_url( '/cerez-politikasi/' );
$page      = get_page_by_path( 'cerez-politikasi', OBJECT, 'page' );
if ( $page && 'page' === $page->post_type ) {
	$cerez_url = get_permalink( $page );
}
?>
<div
	id="cookie-consent"
	class="cookie-consent"
	role="dialog"
	aria-modal="false"
	aria-labelledby="cookie-consent-heading"
	aria-describedby="cookie-consent-desc"
	hidden
	data-storage-key="kocaman_cookie_consent"
>
	<div class="cookie-consent__inner">
		<div class="cookie-consent__text">
			<p id="cookie-consent-heading" class="cookie-consent__title"><?php esc_html_e( 'Çerez kullanımı', 'kocaman-group' ); ?></p>
			<p id="cookie-consent-desc" class="cookie-consent__body">
				<?php esc_html_e( 'Deneyimi iyileştirmek ve site trafiğini anlamak için çerezler kullanılabilir. Tercihinizi istediğiniz zaman değiştirebilirsiniz.', 'kocaman-group' ); ?>
				<a class="cookie-consent__link" href="<?php echo esc_url( $cerez_url ); ?>"><?php esc_html_e( 'Çerez Politikası', 'kocaman-group' ); ?></a>
			</p>
		</div>
		<div class="cookie-consent__actions">
			<button type="button" class="btn btn--ghost btn--sm cookie-consent__btn" data-cookie-choice="reject">
				<?php esc_html_e( 'Reddet', 'kocaman-group' ); ?>
			</button>
			<button type="button" class="btn btn--primary btn--sm cookie-consent__btn" data-cookie-choice="accept">
				<?php esc_html_e( 'Kabul et', 'kocaman-group' ); ?>
			</button>
		</div>
	</div>
</div>
