## reGuard
**Web sitenizi reGuard ile koruyun.**

reGuard web sitenizi Layer 7 katmanında koruyabilir.

reGuard özellikleri:
- Oran Sınırlama
- reCaptcha kontrollü engelleme
- Anahtar-Değer veritabanı sistemi ile tek bir dosyaya veri kaydetme
- reCaptcha JavaScript'le veya JavaScript'siz çalışabilir


reGuard'ı kullanmak için istediğiniz sayfalarınızın php kodunun en üstüne:
```php
<?php
include_once __DIR__ . "/reGuard.php";
?>
```
eklemeniz yeterlidir.

## Ekran Görüntüleri ##

Sıradan bir örnek sayfa
![Ekran görüntüsü 1](https://static.aponkral.com/ornekler/ekran-goruntuleri/reguard/reguard-ornek-1.jpg "Ekran görüntüsü 1")

Oran sınırını aştığı için ziyaretçiye engellendiğini bildiren bir sayfa
![Ekran görüntüsü 2](https://static.aponkral.com/ornekler/ekran-goruntuleri/reguard/reguard-ornek-2.jpg "Ekran görüntüsü 2")

reCaptcha ile doğrulama sayfası (Tarayıcıda JavaScript etkin)
![Ekran görüntüsü 3](https://static.aponkral.com/ornekler/ekran-goruntuleri/reguard/reguard-ornek-3.jpg "Ekran görüntüsü 3")

reCaptcha ile doğrulama sayfası (Tarayıcıda JavaScript etkin değil)
![Ekran görüntüsü 4](https://static.aponkral.com/ornekler/ekran-goruntuleri/reguard/reguard-ornek-4.jpg "Ekran görüntüsü 4")


### reGuard konfigürasyonu ###

reGuard'ı ayarlamak için reGuard-config.php dosyasını düzenlemeniz gerekir.

| Ayar | Tip | Varsayılan Değer | Açıklama |
| --- | --- | --- | --- |
| $reGuard['rate']['active'] | string | "minute" | Oran Hesapama için zaman dilimidir. Sadece "second", "minute" veya "hour" olabilir. |
| $reGuard['rate']['per_hour'] | integer | 18000 | Oran sınırlama için 1 saatte maksimum gönderilebilecek istek süresidir. Saniye cinsindendir. Sadece $reGuard['rate']['active'] değeri "hour" ise kullanılabilir. |
| $reGuard['rate']['per_minute'] | integer | 300 | Oran sınırlama için 1 dakikada maksimum gönderilebilecek istek süresidir. Saniye cinsindendir. Sadece $reGuard['rate']['active'] değeri "minute" ise kullanılabilir. |
| $reGuard['rate']['per_second'] | integer | 5 | Oran sınırlama için 1 saniyede maksimum gönderilebilecek istek süresidir. Saniye cinsindendir. Sadece $reGuard['rate']['active'] değeri "second" ise kullanılabilir. |
| $reGuard['block']['time'] | integer | 300 | IP adresinin Oran Sınırlaması tarafından engellenecek süresidir. Saniye cinsindendir. |
| $reGuard['site_url'] | string | "https://aponkral.net/" | Website adresidir. reCaptcha hatalı girilirse ya da reCaptcha sayfasında tarayıcı tarafından REFERER bilgisi gönderilmediyse yönlendirme için kullanılır. |
| $reGuard['reGuard_url'] | string | "https://aponkral.net/reGuard/" | reCaptcha'nın bulunduğu dizine ait web sitesi adresidir. reCaptcha sayfasında bu adres kullanılarak *form action* adresi oluşturulur. |
| $reGuard['reCaptcha']['sitekey'] | string | boş | reCaptcha site anahtarıdır. reCaptcha doğrulama sayfasında kullanılır. |
| $reGuard['reCaptcha']['secretkey'] | string | boş | reCaptcha gizli anahtarıdır. reCaptcha verisini doğrulama işleminde kullanılır. |