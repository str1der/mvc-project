# Architecture Decisions

## ADR-0001 - Proje Dizin Standardı

Tüm geliştirme projeleri `~/projects` dizini altında tutulacaktır.

Her proje aşağıdaki temel yapıyı kullanacaktır:

- `docker/`
- `docs/`
- `src/`
- `tests/`
- `README.md`
- `compose.yaml`

## ADR-0002 - PHP Container

PHP container geliştirme amaçlı kullanılacaktır.

İlk sürümdea asağıdaki özellikleri içerecektir.

- PHP 8.4 FPM
- Composer
- PostgreSQL desteği 
- Intl desteği
- ZIP desteği


## ADR-0003 - Docker Layer Yapısı 

Dockerfile içerisinde aynı amaca hizmet eden komutlar mümkün olduğunca aynı `RUN` bloğunda birleştirilecektir. 

Amaç: 

- Gereksiz layer oluşmasını önlemek.
- Image boyurunu kontrol altında tutmak.
- Docker cache mekanizmasından verimli yararlanmak.

## ADR-004 - Docker Compose Servis Yapısı

Uygulama geliştirme ortamı üç container üzerinden çalışacaktır: 

- `nginx`
- `php`
- `postgrees`

Tüm servisler `mvc-net` isimli ortak Docker ağında bağlanacaktır.

Servisler birbirlerine IP adresi ile değil, Docker servis adlarıyla erişecektir:

- Nginx, PHP-FPM servisine `php:9000`üzerinden erişir.
- PHP, PostgreSQL servisine `postgres:5432` üzerinden erişir.

Dış dünyayaya yalnızca Nginx servisi açılacaktır:

- Host portu: `8080`
- Container portu: `80`

PHP-FPM ve PostgreSQL servisleri host üzerinde port yayınlamayacaktır.

PHP kaynak kodu bind mount ile containerlara bağlanacaktır: 

- Host: `./src`
- Container: `/var/www/html`

PostgreSQL verileri Docker tarafından yönetilen named volume içerisinde saklanacaktır: 

- Volume: `postgres-data`
- Container yolu: `/var/lib/postgresql`

Gerçek ortam değişkenleri `.env`dosyasında tutulacak ve Git deposnua eklenmeyecektir.

`.env.example` dosyası gerekli değişkenleri göstermek amacıyla Git deposunda tutulacaktır. 

### ADR-0005 - Request sınıfı oluşturuldu

**Karar**

HTTP isteğiyle ilgili bilgiler `Application` içinde tutulmayacak.

**Gerekçe**

`Application` yalnızca uygulama akışını yönetecek.
HTTP isteğinin detayları `Request` sınıfının sorumluluğunda olacak.

**Sonuç**

- `Application` daha sade hale geldi.
- HTTP katmanı soyutlandı.
- Test edilebilirlik arttı.

## ADR-0006 - Response ve View sorumluluklarının ayrılması

**Karar**

HTTP cevabının gönderilmesi `Response` sınıfının, HTML üretimi ise `View` sınıfının sorumluluğunda olacaktır.

**Gerekçe**

`Application` sınıfının doğrudan HTTP status kodu ve çıktı üretmesi birden fazla sorumluluk taşımasına neden olmaktadır.

Controller HTML üretmeyecek; gerekli View'ı çağırarak render edilmiş içeriği döndürecektir.

**Sonuç**

- HTTP response üretimi `Application` sınıfından ayrıldı.
- HTML üretimi View katmanına taşındı.
- 404 sayfası dahil tüm HTML çıktıları View üzerinden üretilebilir hale geldi.
- Controller ile presentation katmanı arasındaki sorumluluk ayrımı netleşti.
