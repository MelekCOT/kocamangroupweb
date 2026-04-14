<?php
/**
 * Yasal sayfa gövde metinleri (Türkçe şablon — hukuki onay için uzman görüşü alın)
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sayfa slug’una göre HTML içerik (yeni oluşturulan sayfalar için).
 *
 * @param string $slug Sayfa slug’u.
 * @return string
 */
function kocaman_get_legal_page_content( $slug ) {
	$map = array(
		'gizlilik-politikasi' => 'kocaman_legal_html_gizlilik',
		'kvkk-aydinlatma'     => 'kocaman_legal_html_kvkk',
		'cerez-politikasi'    => 'kocaman_legal_html_cerez',
		'acik-riza-metni'     => 'kocaman_legal_html_acik_riza',
		'kullanim-kosullari'  => 'kocaman_legal_html_kullanim',
	);
	if ( ! isset( $map[ $slug ] ) || ! function_exists( $map[ $slug ] ) ) {
		return '';
	}
	return call_user_func( $map[ $slug ] );
}

/**
 * Ortak uyarı (HTML paragrafı).
 */
function kocaman_legal_html_disclaimer() {
	return '<p class="legal-disclaimer"><strong>' . esc_html__( 'Önemli:', 'kocaman-group' ) . '</strong> '
		. esc_html__( 'Aşağıdaki metinler bilgilendirme amaçlı şablondur. Şirketinize ve faaliyet alanlarınıza göre güncellenmesi ve hukuk danışmanlığı ile doğrulanması gerekir.', 'kocaman-group' )
		. '</p>';
}

/**
 * @return string
 */
function kocaman_legal_html_gizlilik() {
	$d = kocaman_legal_html_disclaimer();
	return <<<HTML
<div class="legal-page">
{$d}
<h2>Giriş</h2>
<p>KOCAMAN GROUP olarak kişisel verilerinizin gizliliğine önem veriyoruz. Bu Gizlilik Politikası; web sitemizi ziyaret etmeniz, sitedeki <strong>iletişim formu</strong> veya <strong>WhatsApp</strong> üzerinden tarafımıza ulaşmanız sırasında işlenen kişisel verilerin nasıl toplandığını, kullanıldığını ve korunduğunu açıklar. Bu web sitesinde genel hat telefonu veya doğrudan e-posta iletişimi sunulmamaktadır.</p>

<h2>Veri sorumlusu</h2>
<p>6698 sayılı Kişisel Verilerin Korunması Kanunu (&ldquo;KVKK&rdquo;) uyarınca veri sorumlusu: <strong>KOCAMAN GROUP</strong> (bundan sonra &ldquo;Şirket&rdquo;) olarak faaliyet göstermektedir. Web sitemiz üzerinden bize ulaşmak için yalnızca <strong>WhatsApp</strong> ve <strong>iletişim formu</strong> kullanılmaktadır. İletişim formu ile gönderilen mesajlar teknik olarak <a href="mailto:bilgi@kocamangroup.com.tr">bilgi@kocamangroup.com.tr</a> adresine iletilir; bu adres kamuya açık bir iletişim hattı olarak değil, form altyapısının parçası olarak kullanılır.</p>

<h2>İşlenen veriler ve toplama yöntemleri</h2>
<p>Örneğin ve sınırlama olmaksızın: iletişim formunda veya WhatsApp üzerinden paylaştığınız ad-soyad, telefon, e-posta, mesaj içeriği; çerezler aracılığıyla teknik veriler (tarayıcı türü, cihaz bilgisi, IP adresi — teknik altyapıya bağlı olarak). Veriler; web formu, WhatsApp ve site kullanımı sırasında toplanabilir.</p>

<h2>İşleme amaçları</h2>
<ul>
<li>İletişim taleplerinizi yanıtlamak ve müşteri hizmetleri sunmak,</li>
<li>Hizmetlerimizi geliştirmek ve güvenliği sağlamak,</li>
<li>Mevzuattan doğan yükümlülükleri yerine getirmek,</li>
<li>Açık rızanızın bulunduğu hallerde pazarlama ve bilgilendirme (ayrı metin ve onay kapsamında).</li>
</ul>

<h2>Hukuki sebepler</h2>
<p>KVKK&rsquo;nın 5. ve 6. maddelerinde düzenlenen; sözleşmenin kurulması veya ifası, meşru menfaat, hukuki yükümlülük ve açık rıza gibi hukuki sebeplere dayalı olarak işleme yapılabilir. İşleme şartı her veri kategorisi için ayrıca değerlendirilir.</p>

<h2>Saklama süreleri</h2>
<p>Kişisel veriler, işleme amacının gerektirdiği süre ve ilgili mevzuatta öngörülen zamanaşımı süreleri kadar saklanır; süre sonunda silinir, yok edilir veya anonim hale getirilir.</p>

<h2>Aktarım</h2>
<p>Verileriniz, hizmet alınan barındırma, e-posta veya analitik sağlayıcıları gibi <strong>yurt içi / yurt dışı</strong> iş ortaklarına, KVKK&rsquo;da öngörülen güvenceler ve aydınlatma metnimiz kapsamında aktarılabilir. Yurt dışına aktarımda KVKK&rsquo;nın 9. maddesi ve ilgili düzenlemelere uyulur.</p>

<h2>Haklarınız</h2>
<p>KVKK&rsquo;nın 11. maddesi kapsamında; verilerinizin işlenip işlenmediğini öğrenme, düzeltme, silme, itiraz etme ve şikâyet hakkı gibi haklara sahipsiniz. Başvurularınızı bu web sitesindeki <strong>iletişim formu</strong> veya <strong>WhatsApp</strong> kanalları üzerinden iletebilirsiniz.</p>

<h2>Politika güncellemeleri</h2>
<p>Bu politika gerektiğinde güncellenebilir. Güncel sürüm web sitemizde yayımlandığı tarihte yürürlüğe girer.</p>
</div>
HTML;
}

/**
 * @return string
 */
function kocaman_legal_html_kvkk() {
	$d = kocaman_legal_html_disclaimer();
	return <<<HTML
<div class="legal-page">
{$d}
<h2>Veri sorumlusunun kimliği</h2>
<p><strong>Ünvan:</strong> KOCAMAN GROUP</p>
<p><strong>Adres:</strong> Ölüdeniz Mah. Atatürk Cad., Fethiye, Türkiye</p>
<p><strong>İletişim kanalları (web sitesi):</strong> Bu sitede bize ulaşmak için yalnızca <strong>WhatsApp</strong> ve sitedeki <strong>iletişim formu</strong> kullanılmaktadır. Genel hat telefonu veya doğrudan e-posta ile kamuya açık iletişim sunulmamaktadır. İletişim formu ile gönderilen mesajlar teknik olarak <a href="mailto:bilgi@kocamangroup.com.tr">bilgi@kocamangroup.com.tr</a> adresine yönlendirilir.</p>

<h2>İşlenen kişisel veriler</h2>
<p>İletişim formu ve WhatsApp üzerinden; kimlik (ad-soyad), iletişim (telefon, e-posta), mesaj içeriği ve talebin niteliğine göre diğer veriler işlenebilir.</p>

<h2>Kişisel verilerin işlenme amaçları</h2>
<ul>
<li>Talep ve şikâyetlerin alınması ve sonuçlandırılması,</li>
<li>Hizmet ve süreçlerin yürütülmesi,</li>
<li>Yetkili kurum ve kuruluşlara bilgi verilmesi (yasal zorunluluk hallerinde),</li>
<li>İş sürekliliği ve güvenliğinin sağlanması.</li>
</ul>

<h2>Hukuki sebep ve toplama yöntemi</h2>
<p>Verileriniz; KVKK&rsquo;nın 5. ve 6. maddelerinde belirtilen şartlara dayanılarak, otomatik veya otomatik olmayan yollarla, iletişim formu, WhatsApp ve web sitesi üzerinden toplanabilir.</p>

<h2>Kişisel verilerin aktarılması</h2>
<p>Yasal yükümlülükler ve hizmetin gerektirdiği ölçüde iş ortakları ve hizmet sağlayıcılara aktarım yapılabilir. Aktarım şartları KVKK&rsquo;ya uygun şekilde gerçekleştirilir.</p>

<h2>Kişisel veri toplamanın hukuki sebebi</h2>
<p>Kanunlarda açıkça öngörülmesi, sözleşmenin kurulması veya ifası, veri sorumlusunun hukuki yükümlülüğünü yerine getirmesi, meşru menfaat veya açık rıza (ilgili işlem için) gibi sebeplerden biri veya birkaçı birlikte kullanılabilir.</p>

<h2>İlgili kişinin hakları (KVKK md. 11)</h2>
<ul>
<li>Kişisel verilerinizin işlenip işlenmediğini öğrenme,</li>
<li>İşlenmişse bilgi talep etme,</li>
<li>İşlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme,</li>
<li>Yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri bilme,</li>
<li>Eksik veya yanlış işlenmişse düzeltilmesini isteme,</li>
<li>Silinmesini veya yok edilmesini isteme,</li>
<li>Düzeltme/silme işlemlerinin aktarılan üçüncü kişilere bildirilmesini isteme,</li>
<li>Münhasıran otomatik sistemler ile analiz edilmesi suretiyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme,</li>
<li>Kanuna aykırı işleme sebebiyle zararın giderilmesini talep etme.</li>
</ul>

<h2>Başvuru yolu</h2>
<p>Haklarınızı kullanmak için web sitemizdeki <strong>iletişim formu</strong> veya <strong>WhatsApp</strong> üzerinden tarafımıza başvurabilirsiniz. Başvurularınız, talebin niteliğine göre en kısa sürede ve en geç otuz gün içinde ücretsiz olarak sonuçlandırılır; işlemin ayrıca bir maliyet gerektirmesi halinde Kişisel Verileri Koruma Kurulu tarifesindeki ücret alınabilir.</p>

<h2>Şikâyet</h2>
<p>Kişisel verilerinizin kanuna aykırı işlendiğini düşünüyorsanız Kişisel Verileri Koruma Kurulu&rsquo;na şikâyette bulunabilirsiniz.</p>
</div>
HTML;
}

/**
 * @return string
 */
function kocaman_legal_html_cerez() {
	$d = kocaman_legal_html_disclaimer();
	return <<<HTML
<div class="legal-page">
{$d}
<h2>Çerez nedir?</h2>
<p>Çerezler; ziyaret ettiğiniz web sitesi tarafından tarayıcınıza veya cihazınıza kaydedilen küçük metin dosyalarıdır. Oturumun sürdürülmesi, tercihlerin hatırlanması ve site performansının ölçülmesi gibi amaçlarla kullanılabilir.</p>

<h2>Kullandığımız çerez türleri (örnek)</h2>
<ul>
<li><strong>Zorunlu çerezler:</strong> Sitenin temel işlevleri için gereklidir.</li>
<li><strong>İşlevsel çerezler:</strong> Dil veya bölge tercihi gibi ayarları hatırlar.</li>
<li><strong>Performans / analitik çerezler:</strong> Anonim veya kimliksiz istatistik üretmeye yardımcı olur (kullanılan altyapıya göre).</li>
</ul>

<h2>Çerezleri yönetme</h2>
<p>Tarayıcı ayarlarından çerezleri silebilir veya engelleyebilirsiniz. Çerezleri devre dışı bırakmanız halinde sitenin bazı bölümleri beklenen şekilde çalışmayabilir.</p>

<h2>Üçüncü taraf çerezleri</h2>
<p>Harita, video veya analitik gibi gömülü hizmetler üçüncü tarafların çerezlerini tetikleyebilir. Bu hizmetlerin gizlilik politikalarını incelemeniz önerilir.</p>

<h2>Güncellemeler</h2>
<p>Bu metin gerektiğinde güncellenebilir. Son güncelleme tarihi sayfa üzerinde veya bu bölümde belirtilebilir.</p>
</div>
HTML;
}

/**
 * @return string
 */
function kocaman_legal_html_acik_riza() {
	$d = kocaman_legal_html_disclaimer();
	return <<<HTML
<div class="legal-page">
{$d}
<h2>Kapsam</h2>
<p>Bu Açık Rıza Metni; KOCAMAN GROUP tarafından, aşağıda belirtilen amaçlar doğrultusunda kişisel verilerinizin işlenmesine ve gerektiğinde elektronik ileti gönderilmesine ilişkin özgür iradenizle verdiğiniz rızayı düzenler. Rıza, ilgili kutucukları işaretlemeniz veya açıkça onay vermeniz ile verilir.</p>

<h2>Rıza kapsamındaki işlemler (örnek)</h2>
<ul>
<li>Ticari elektronik ileti (e-posta / SMS vb.) ile kampanya, duyuru ve bilgilendirme gönderilmesi (mevzuata uygun şekilde),</li>
<li>Pazarlama ve profilleme amaçlı veri işleme (yalnızca açık rıza veya mevzuatın izin verdiği diğer şartlarla sınırlı olarak).</li>
</ul>

<h2>Rızanın geri alınması</h2>
<p>Verdiğiniz rızayı dilediğiniz zaman, iletişim formu, WhatsApp veya iletilerde sunulan &ldquo;üyelikten çık / ret&rdquo; kanalları üzerinden geri çekebilirsiniz. Geri çekme, geri çekme öncesine ilişkin işlemlerin hukuka uygunluğunu etkilemez.</p>

<h2>Başvuru</h2>
<p>KVKK kapsamındaki haklarınız için KVKK Aydınlatma Metni&rsquo;ni inceleyebilir; başvurunuzu web sitemizdeki <strong>iletişim formu</strong> veya <strong>WhatsApp</strong> üzerinden iletebilirsiniz.</p>
</div>
HTML;
}

/**
 * @return string
 */
function kocaman_legal_html_kullanim() {
	$d = kocaman_legal_html_disclaimer();
	return <<<HTML
<div class="legal-page">
{$d}
<h2>Genel</h2>
<p>Bu web sitesine erişerek ve kullanarak aşağıdaki koşulları kabul etmiş sayılırsınız. Koşulları kabul etmiyorsanız lütfen siteyi kullanmayın. Bu sitede Şirket ile iletişim için yalnızca <strong>WhatsApp</strong> ve <strong>iletişim formu</strong> sunulmaktadır; genel hat telefonu veya doğrudan e-posta ile kamuya açık iletişim kanalı sunulmamaktadır.</p>

<h2>Site içeriği ve fikri mülkiyet</h2>
<p>Site üzerindeki metin, görsel, logo ve yazılım unsurları KOCAMAN GROUP veya lisans verenlerinin mülkiyetindedir. İzinsiz kopyalama, çoğaltma veya dağıtım yasaktır.</p>

<h2>Kullanım kuralları</h2>
<ul>
<li>Siteyi yasadışı amaçlarla veya üçüncü kişilerin haklarını ihlal edecek şekilde kullanamazsınız,</li>
<li>Zararlı yazılım yaymak, sisteme yetkisiz erişim denemelerinde bulunmak yasaktır.</li>
</ul>

<h2>Sorumluluk sınırlaması</h2>
<p>Site &ldquo;olduğu gibi&rdquo; sunulur. Mümkün olan ölçüde doğru bilgi sağlamaya çalışıyoruz; ancak içeriklerin güncelliği veya eksiksizliği konusunda garanti verilmez. Doğrudan veya dolaylı zararlardan Şirket, yasal çerçevede müsnet olduğu ölçüde sorumlu tutulamaz.</p>

<h2>Bağlantılar</h2>
<p>Sitede üçüncü taraf sitelere bağlantılar bulunabilir. Bu sitelerin içeriği ve gizlilik uygulamalarından Şirket sorumlu değildir.</p>

<h2>Uygulanacak hukuk</h2>
<p>Uyuşmazlıklarda Türkiye Cumhuriyeti kanunları uygulanır; yetkili mahkemeler ve icra daireleri Türkiye&rsquo;deki yasal düzenlemelere tabidir.</p>

<h2>Değişiklikler</h2>
<p>Kullanım koşulları önceden haber verilmeksizin güncellenebilir. Güncel metin sitede yayımlandığında geçerlidir.</p>
</div>
HTML;
}
