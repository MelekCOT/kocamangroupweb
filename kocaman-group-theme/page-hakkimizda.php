<?php
/**
 * Şablon: Hakkımızda (sayfa slug: hakkimizda)
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main site-main--about-page" role="main">
	<header class="about-page__hero">
		<div class="container">
			<p class="about-page__eyebrow"><?php esc_html_e( 'Kurumsal', 'kocaman-group' ); ?></p>
			<h1 class="about-page__title"><?php esc_html_e( 'Tek çatı altında dört güçlü marka', 'kocaman-group' ); ?></h1>
		</div>
	</header>

	<div class="container about-page__body">
		<div class="about-page__intro">
			<p class="about-page__lead">
				<?php esc_html_e( 'Kocaman Group; inşaat, turizm ve konaklama, gıda ve gayrimenkul alanlarında faaliyet gösteren markalarımızı aynı kurumsal çatı altında toplar. Yarım asra yaklaşan deneyimimizle her sektörde güven, şeffaflık ve ölçülebilir kaliteyi ön planda tutar; uzun vadeli ortaklıklar ve sürdürülebilir değer üretimini hedefleriz.', 'kocaman-group' ); ?>
			</p>
		</div>

		<section class="about-page__section" aria-labelledby="about-faaliyet-heading">
			<h2 id="about-faaliyet-heading" class="about-page__section-title"><?php esc_html_e( 'Faaliyet alanlarımız', 'kocaman-group' ); ?></h2>
			<div class="about-page__faaliyet-grid">
				<div class="about-page__faaliyet-card">
					<h3 class="about-page__faaliyet-title"><?php esc_html_e( 'Kocaman Group İnşaat', 'kocaman-group' ); ?></h3>
					<p class="about-page__p"><?php esc_html_e( 'Tasarımdan anahtar teslime entegre proje yönetimi, mühendislik disiplini ve güven odaklı şantiye kültürü.', 'kocaman-group' ); ?></p>
					<p class="about-page__faaliyet-link-wrap">
						<a class="about-page__faaliyet-link" href="<?php echo esc_url( kocaman_get_service_page_url( 'insaat' ) ); ?>"><?php esc_html_e( 'İnşaat sayfası', 'kocaman-group' ); ?></a>
					</p>
				</div>
				<div class="about-page__faaliyet-card">
					<h3 class="about-page__faaliyet-title"><?php esc_html_e( 'Villatatilci', 'kocaman-group' ); ?></h3>
					<p class="about-page__p"><?php esc_html_e( 'Turizm ve seçkin villa konaklama deneyimleri; misafir memnuniyeti ve tutarlı hizmet standardı.', 'kocaman-group' ); ?></p>
					<p class="about-page__faaliyet-link-wrap">
						<a class="about-page__faaliyet-link" href="<?php echo esc_url( kocaman_get_service_page_url( 'villa' ) ); ?>"><?php esc_html_e( 'Villatatilci sayfası', 'kocaman-group' ); ?></a>
					</p>
				</div>
				<div class="about-page__faaliyet-card">
					<h3 class="about-page__faaliyet-title"><?php esc_html_e( 'Chicker\'s Restaurant', 'kocaman-group' ); ?></h3>
					<p class="about-page__p"><?php esc_html_e( 'Modern mutfak anlayışı, hijyen ve operasyonel disiplinle premium restoran deneyimi.', 'kocaman-group' ); ?></p>
					<p class="about-page__faaliyet-link-wrap">
						<a class="about-page__faaliyet-link" href="<?php echo esc_url( kocaman_get_service_page_url( 'chickers' ) ); ?>"><?php esc_html_e( 'Chicker\'s sayfası', 'kocaman-group' ); ?></a>
					</p>
				</div>
				<div class="about-page__faaliyet-card">
					<h3 class="about-page__faaliyet-title"><?php esc_html_e( 'Kocaman Gayrimenkul', 'kocaman-group' ); ?></h3>
					<p class="about-page__p"><?php esc_html_e( 'Yatırım danışmanlığı, portföy ve değer analizi ile doğru zamanda doğru kararlar.', 'kocaman-group' ); ?></p>
					<p class="about-page__faaliyet-link-wrap">
						<a class="about-page__faaliyet-link" href="<?php echo esc_url( kocaman_get_service_page_url( 'gayrimenkul' ) ); ?>"><?php esc_html_e( 'Gayrimenkul sayfası', 'kocaman-group' ); ?></a>
					</p>
				</div>
			</div>
		</section>

		<section class="about-page__vm" aria-labelledby="about-vm-heading">
			<h2 id="about-vm-heading" class="screen-reader-text"><?php esc_html_e( 'Vizyon ve misyon', 'kocaman-group' ); ?></h2>
			<div class="about-page__vm-grid">
				<div class="about-page__vm-block">
					<h3 class="about-page__vm-title"><?php esc_html_e( 'Vizyonumuz', 'kocaman-group' ); ?></h3>
					<p class="about-page__p">
						<?php esc_html_e( 'Türkiye ve faaliyet gösterdiğimiz pazarlarda; inşaat, turizm, gıda ve gayrimenkulde kaliteyi imza haline getiren, sürdürülebilir değer üreten ve güvenilir ortaklıklar kuran öncü bir grup olmak.', 'kocaman-group' ); ?>
					</p>
				</div>
				<div class="about-page__vm-block">
					<h3 class="about-page__vm-title"><?php esc_html_e( 'Misyonumuz', 'kocaman-group' ); ?></h3>
					<p class="about-page__p">
						<?php esc_html_e( 'Her markamızda müşteri memnuniyeti, şeffaflık ve sürekli gelişimi esas alarak projelerimizi disiplinli planlama, güvenli operasyon ve uzun vadeli düşünceyle yürütmek.', 'kocaman-group' ); ?>
					</p>
				</div>
			</div>
		</section>

		<section class="about-page__values" aria-labelledby="about-values-heading">
			<h2 id="about-values-heading" class="about-page__section-title"><?php esc_html_e( 'Değerlerimiz', 'kocaman-group' ); ?></h2>
			<ul class="about-page__values-list" role="list">
				<li>
					<strong><?php esc_html_e( 'Kalite referansımızdır:', 'kocaman-group' ); ?></strong>
					<?php esc_html_e( 'Tüm markalarımızda aynı kalite çizgisini korur; teslimden konaklamaya, mutfaktan danışmanlığa kadar tekrarlanabilir standartlarla güvenilir sonuçlar üretiriz.', 'kocaman-group' ); ?>
				</li>
				<li>
					<strong><?php esc_html_e( 'Stratejik planlama:', 'kocaman-group' ); ?></strong>
					<?php esc_html_e( 'Başarının detaylarda gizli olduğunu bilir, her adımı şeffaf ve disiplinli bir şekilde yönetiriz.', 'kocaman-group' ); ?>
				</li>
				<li>
					<strong><?php esc_html_e( 'Müşteri odaklılık:', 'kocaman-group' ); ?></strong>
					<?php esc_html_e( 'Müşterilerimizin beklentilerini işimizin merkezine koyar, güvene dayalı uzun vadeli ilişkiler kurarız.', 'kocaman-group' ); ?>
				</li>
				<li>
					<strong><?php esc_html_e( 'Teknik disiplin ve güvenlik:', 'kocaman-group' ); ?></strong>
					<?php esc_html_e( 'Yapı ve şantiyede mühendislik ile deprem güvenliği; turizm, gıda ve ofiste iş güvenliği ile hijyen — her alanda yönetmeliklere uyumu ve ölçülebilir kontrolü eksiksiz uygularız.', 'kocaman-group' ); ?>
				</li>
				<li>
					<strong><?php esc_html_e( 'Yenilikçi ruh:', 'kocaman-group' ); ?></strong>
					<?php esc_html_e( 'Değişen dünya düzenine modern teknolojiler ve yaratıcı çözümlerle yanıt veririz.', 'kocaman-group' ); ?>
				</li>
			</ul>
		</section>

		<p class="about-page__back">
			<a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Ana sayfaya dön', 'kocaman-group' ); ?></a>
		</p>
	</div>
</main>

<?php
get_footer();
