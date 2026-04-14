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
			'eyebrow'    => __( 'Güven yükselttiğimiz her santimetre', 'kocaman-group' ),
			'title'      => __( 'Kocaman Group İnşaat', 'kocaman-group' ),
			'intro'      => __( 'Sadece bina değil; nesiller boyu ayakta kalacak güven, net söz ve ölçülebilir kalite inşa ediyoruz. Planı, sahayı ve teslimi aynı çizgide tutan mühendislik disipliniyle projelerinizi hayata geçiriyoruz.', 'kocaman-group' ),
			'paragraphs' => array(
				__( 'Keşiften ruhsata, kaba inşaattan ince işçiliğe kadar her aşamayı şeffaf bütçe, gerçekçi takvim ve anlaşılır raporlama ile yönetiyoruz. “Ne zaman, ne kadar?” sorularına sürpriz bırakmadan, erken uyarı kültürüyle cevap veriyoruz.', 'kocaman-group' ),
				__( 'Depreme dayanıklılık, yapısal bütünlük ve malzeme izlenebilirliği şantiyemizin kırmızı çizgisidir. Denetimlere hazır dokümantasyon, günlük kontrol disiplini ve uzman gözetimiyle standartları yazılı hale getiriyoruz.', 'kocaman-group' ),
				__( 'Enerji verimliliği, atık yönetimi ve yönetmeliklere tam uyum; projeyi yalnızca bugünün değil, yarının kullanım koşullarına da hazırlıyoruz. Tedarik zinciri, iş güvenliği ve çevresel duyarlılık operasyonumuzun ayrılmaz parçasıdır.', 'kocaman-group' ),
			),
			'bullets'    => array(
				__( 'Konut, villa, karma kullanım ve ticari yapılarda anahtar teslim, uçtan uca proje yönetimi', 'kocaman-group' ),
				__( 'Statik, mekanik, elektrik ve saha lojistiği — tek koordinasyon, tek sorumluluk', 'kocaman-group' ),
				__( 'BIM ve dijital modelleme ile çok disiplinli uyum (proje kapsamına göre)', 'kocaman-group' ),
				__( 'İSG kültürü, çevre duyarlı şantiye ve ölçülebilir kalite güvencesi', 'kocaman-group' ),
			),
			'gallery_heading' => __( 'Projelerden Kareler', 'kocaman-group' ),
			'gallery'    => array(
				array( 'file' => 'insaat-gal-01.png', 'alt' => __( 'Kuşbakışı modern villa projesi — özel yüzme havuzlu lüks konutlar', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-02.png', 'alt' => __( 'Havadan görünüm: yan yana villalar, havuzlar ve peyzaj', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-03.png', 'alt' => __( 'Özel havuz ve modern teras döşemesi', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-04.png', 'alt' => __( 'Ahşap kaplama ve taş teraslı çağdaş villa cephesi', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-05.png', 'alt' => __( 'Villa ve havuz — bitmiş konut teslimi', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-06.png', 'alt' => __( 'Modern konut cephesi ve peyzaj', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-07.png', 'alt' => __( '3D birinci kat planı — 87,70 m²', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-08.png', 'alt' => __( '3D zemin kat planı — 84,70 m²', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-09.png', 'alt' => __( '3D çatı katı mimari planı', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-10.png', 'alt' => __( 'Çatı katı suit ve teras planı — 68,55 m²', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-11.png', 'alt' => __( 'Dört villalık proje — 3D kuşbakışı görünüm', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-12.png', 'alt' => __( 'Ofiste proje değerlendirme — ekran ve plan üzerinde ekip', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-13.png', 'alt' => __( 'Plan ve dijital model ile sahadaki mühendislik', 'kocaman-group' ) ),
				array( 'file' => 'insaat-gal-14.png', 'alt' => __( 'Şantiye bilgilendirme ve iş güvenliği tabelası', 'kocaman-group' ) ),
			),
			'construction_story' => array(
				'title'             => __( 'Köklerimiz: mühendislik ve kurumsal güvence', 'kocaman-group' ),
				'lead'              => __( 'Kuruluşumuzdan bu yana inşa ettiğimiz sayısız yapı ile sektöre yön veren Kocaman Group, 2000’li yıllarda ivme kazanan büyüme süreciyle Türk müteahhitlik sektörünün güvenilir markalarından biri haline gelmiştir. İnşaat sektörünün yaşamsal bir sorumluluk olduğu bilinciyle, her projemizi en ince ayrıntısına kadar titizlikle planlıyoruz.', 'kocaman-group' ),
				'integration_title' => __( 'Entegre çözümler, kusursuz uygulama', 'kocaman-group' ),
				'integration'       => __( 'Bünyemizde bulunan mimarlık ve inşaat şirketlerimizin sinerjisi sayesinde, projelerimizi tasarım aşamasından anahtar teslimine kadar bütünleşik bir yapıda yönetiyoruz. Büyük ölçekli kentsel tasarım projelerinden butik mimari uygulamalara kadar her çalışmamızda; uzman kadromuz, yenilikçi bakış açımız ve deprem güvenliğine verdiğimiz üst düzey önemle bölgede güvenilir çözüm ortaklarından biriyiz.', 'kocaman-group' ),
				'highlights'        => array(
					__( 'Tasarımdan anahtar teslime entegre proje yönetimi', 'kocaman-group' ),
					__( 'Deprem güvenliğine verdiğimiz öncelik ve mühendislik disiplini', 'kocaman-group' ),
					__( 'Kentsel dönüşümden butik mimariye uzanan deneyim', 'kocaman-group' ),
				),
				'building_types'    => array(
					'title' => __( 'İnşa ettiğimiz yapı türleri', 'kocaman-group' ),
					'lead'  => __( 'Apartman ve apart dairelerden müstakil villalara, mağaza ve ofis gibi iş yerlerine kadar geniş bir yelpazede yapılar hayata geçiriyoruz; her projede aynı mühendislik disiplini ve kalite standardı geçerlidir.', 'kocaman-group' ),
					'items' => array(
						array(
							'title' => __( 'Apartman ve apart daireler', 'kocaman-group' ),
							'text'  => __( 'Site ve apartman projelerinde daire tipolojileri, çekirdek ve ortak alan koordinasyonu, zemin-çatı mühendisliği ve anahtar teslim konut teslimi.', 'kocaman-group' ),
						),
						array(
							'title' => __( 'Müstakil ve özel villa', 'kocaman-group' ),
							'text'  => __( 'İkiz, tripleks ve müstakil villalarda cephe, peyzaj, teras ve havuz gibi özel detaylarla butik mimari ve uygulama.', 'kocaman-group' ),
						),
						array(
							'title' => __( 'İş yeri ve ticari yapılar', 'kocaman-group' ),
							'text'  => __( 'Mağaza, ofis, showroom ve karma kullanım yapılarında cephe sistemleri, iç mekân düzeni ve mekanik-elektrik altyapısının tek elden koordinasyonu.', 'kocaman-group' ),
						),
					),
				),
				'vision_title'      => __( 'İnşaat vizyonumuz', 'kocaman-group' ),
				'vision'            => __( 'Türkiye ve faaliyet gösterdiğimiz tüm pazarlarda; kaliteyi bir zorunluluk değil bir imza olarak gören, kentsel dönüşüme yön veren ve sürdürülebilir değer üreten öncü bir inşaat markası olmak.', 'kocaman-group' ),
				'mission_title'     => __( 'İnşaat misyonumuz', 'kocaman-group' ),
				'mission'           => __( 'Mimari estetik ile mühendislik disiplinini bir araya getirerek; deprem güvenliği yüksek, erişilebilir maliyetli ve müşteri memnuniyeti odaklı yaşam alanları üretmek. Güçlü ekip ruhumuzla, beklentilerin ötesine geçen nitelikli yapılar inşa etmeyi görev ediniyoruz.', 'kocaman-group' ),
				'values_title'      => __( 'Değerlerimiz', 'kocaman-group' ),
				'values'            => array(
					array(
						'title' => __( 'Kaliteyi Referans Alma', 'kocaman-group' ),
						'text'  => __( 'Her projede kaliteyi bir hedef değil, değişmez bir referans olarak kabul eder; tüm süreçlerimizi en yüksek standartlarda yönetiriz.', 'kocaman-group' ),
					),
					array(
						'title' => __( 'Doğru Planlama ve Disiplin', 'kocaman-group' ),
						'text'  => __( 'Başarının temelinin doğru planlama olduğuna inanır; projelerimizi ilk adımdan teslim aşamasına kadar kontrollü, sistemli ve şeffaf bir yaklaşımla yönetiriz.', 'kocaman-group' ),
					),
					array(
						'title' => __( 'Müşteri Odaklılık', 'kocaman-group' ),
						'text'  => __( 'Müşterilerimizin beklentilerini sürecin merkezine alır; memnuniyeti yalnızca sonuçta değil, tüm iş sürecinde öncelikli bir değer olarak görürüz.', 'kocaman-group' ),
					),
					array(
						'title' => __( 'Güçlü Ekip ve İş Birliği Kültürü', 'kocaman-group' ),
						'text'  => __( 'Mimarlık ve inşaat disiplinlerini entegre eden güçlü ekip yapımızla, ortak akıl ve iş birliği anlayışı sayesinde projelerimize sürdürülebilir değer katarız.', 'kocaman-group' ),
					),
					array(
						'title' => __( 'Güven ve Sorumluluk', 'kocaman-group' ),
						'text'  => __( 'Deprem güvenliğini temel öncelik kabul eder; güvenli, dayanıklı ve uzun ömürlü yapılar üretmeyi kurumsal sorumluluğumuz olarak benimseriz.', 'kocaman-group' ),
					),
					array(
						'title' => __( 'Yenilikçilik ve Sürekli Gelişim', 'kocaman-group' ),
						'text'  => __( 'Değişen ihtiyaçlara ve çağdaş beklentilere uyum sağlayan yenilikçi çözümler geliştirerek, sektördeki konumumuzu sürekli ileri taşırız.', 'kocaman-group' ),
					),
				),
			),
		),
		'villa'       => array(
			'eyebrow'    => __( 'Turizm ve konaklama', 'kocaman-group' ),
			'title'      => __( 'Villatatilci', 'kocaman-group' ),
			'tagline'    => __( 'Çok yakında hizmetinizde', 'kocaman-group' ),
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
