# Kocaman Group WordPress Teması

## Kurulum

1. Klasörü `wp-content/themes/kocaman-group-theme` olarak kopyalayın.
2. WordPress yönetim panelinde **Görünüm → Temalar** üzerinden etkinleştirin.
3. **Ayarlar → Okuma**: “Ana sayfa görüntülenmesi” için statik sayfa seçin ve bu temanın ana sayfasını atayın (veya mevcut bir sayfayı ana sayfa yapın — `front-page.php` otomatik kullanılır).

## Önerilen eklentiler

- **Advanced Custom Fields (ACF)** — Tema ayarları ve hero alanı için yerel alan grupları tanımlıdır.
- **Elementor** — İç sayfalar veya bölüm bazlı düzenleme için (tema `elementor` desteği bildirir).
- **Contact Form 7** — İletişim formu: ACF seçeneklerine CF7 kısa kodunu girin.

## Yönetim panelinden düzenlenebilen alanlar (ACF ile)

| Alan | Konum |
|------|--------|
| Telefon, e-posta, adres, footer açıklama | **Kocaman Ayarları** (ACF seçenek sayfası) |
| WhatsApp numarası | Aynı |
| Sosyal medya linkleri (Facebook, Instagram, TikTok) | Aynı |
| İletişim formu kısa kodu (CF7) | Aynı |
| Hero başlık, alt başlık, arka plan görseli | **Statik ana sayfa** düzenleme ekranı |

ACF yüklü değilse tema varsayılan metin ve yer tutucularla çalışır.

## Menüler

**Görünüm → Menüler** üzerinden **Ana Menü** ve **Footer Menü** atayın. Menü yoksa tema varsayılan bağlantıları gösterir.

## Elementor notu

Ana sayfa tamamen tema şablonu (`front-page.php`) ile gelir. Elementor ile tek sayfa oluşturmak isterseniz boş bir sayfa açıp Elementor ile tasarlayabilir ve bunu ana sayfa olarak atayabilirsiniz; bu durumda `front-page.php` yerine o sayfa öncelikli olur (WordPress okuma ayarına bağlı).

## Header arka plan görseli

Üst menüde modern mimari fotoğrafı (Unsplash) kullanılır. Kendi görseliniz için **Görünüm → Özelleştir → Ek CSS** veya child theme içinde `--kg-header-bg-photo` değişkenini güncelleyin:

```css
:root {
  --kg-header-bg-photo: url("https://siteniz.com/wp-content/uploads/header-bg.jpg");
}
```

---

Tasarım tokenları ve renk kodları için proje sahibine verilen özet dokümana bakın.
