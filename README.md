# PHP MVC Öğrenme Projesi

Bu proje, modern PHP, nensene yönelimli programlama ve MVC mimarisi temel seviyeden başlayarak öğrenmek amacıyla oluşturulmuştur.

Proje hazır bir framework kullanmadan geliştirilecektir. Amaç yanlızca çalışan bir web uygulaması oluşturmak değil; Router, Controller, Service, Repository, Model ve View gibi bileşenlerin neden gerekli olduğunu uygulamalı olarak öğrenmektir.

Hedefler 
   Modern PHP sözdizimini öğrenmek
   PHP OOP temellerini öğrenmek
   MVC mimarisini adım adım oluşturmak
   PostgresSQL ile güvenli veritabanı işlemleri
   NginX ve PHP-FPM çalışma yapısnı anlamak
   Docker Compose ile geliştirme ortamı oluşturmak
   Composer ve PSR standartlarını kullanmak
   Test edilebilir ve sürdürülebilir kod yazmak

Teknolojiler
   PHP 8.4 FPM
   Nginx
   PostgreSQL
   Docker
   Docker Compose
   Composer

# Proje Yapısı

```text
mvc/
|
|--docker/
|  |
|  |--nginx/
|  |
|  |--php/
|  |
|  |--postgres/
|
|--src/
|
|--tests/
|
|--compose.yaml
|
|--.env.example
|
|--.gitignore
|
|__README.md
```

Docker Dizinleri

docker/php

PHP-FPM imajı, PHP yapılandırması ve gerekli PHP eklentileri burada tutulur.

docker/nginx

Nginx sanal sunucu ve FastCGI yapılandırmaları burada tutulur.

docker/postgres

PostgreSQL ilk kurulumda çalışacak SQL dosyaları burada tutulur.

Çalıştırma 

Geliştirme ortamı aşağıdaki komutla oluşturulacaktır:

docker compose up -d --build 

Contai ner Durumları aşağıdaki komutla kontrol edilecektir: 

docker compose ps 

Loglar aşağıdaki komutla izlenecektir: 

docker compose logs -f 

Çalışma Kuralları

   Projedeki her dosyanın belirli bir sorumluluğu olacak.
   Gizli bilgiler Git deposuna eklenmeyecek. 
   Gerçek şifreler .env dosyasında tutulacak.
   .env.example yalnızca örnek değişkenleri içerecek.
   Her anlamlı değişiklik ayrı bir Git commit'i olacak. 
   Hazır kod doğrudan kopyalanmadan önce ne yaptığı anlaşılacak.
   Proje büytüdükçe klasörler ihtiyaç doğrultusunda oluşturulacak. 
   Kullanılmayan soyutlamalar ve gereksiz sınıflar eklenmeyecek. 


```markdown
## Durum

Docker tabanlı geliştirme ortamı tamamlandı.

Framework çekirdeğinde şu bileşenler çalışır durumdadır:

- Application
- Request
- Response
- Router
- Controller
- View
- Custom class autoloader

Bir sonraki geliştirme hedefi View katmanı üzerine kendi template engine yapısını oluşturmaktır.
```


# PHP MVC Öğrenme Projesi

## Development Journal

### Day 1 

- Proje klasör standardı oluşturuldu.
- Docker klasör yapısı oluşturuldu.
- README hazırlandı.
- Dockerfile oluşturulmaya başlandı.
- Docker image yapısı (repository:tag) öğrenildi.
   - Repository: `php`
   - Tag: `8.4-fpm`
   - Örnek: FROM php:8.4-fpm

### Day 2

#### Tamamlananlar 

- [x] Docker Compose altyapısı oluşturuldu.
- [x] Nginx, PHP-FPM ve PostgreSQL servisleri ayağa kaldırıldı.
- [x] Docker ağı `mvc-net`oluşturuldu.
- [x] Named Volume ve bind mount yapısı oluşturuldu.
- [x] Nginx FASTCGI yapılandırıldı.
- [x] PHP geliştirme ayarları `php.ini` projeye eklendi.
- [x] Ortam değişkenleri `.env` kullanılmaya başlandı.
- [x] PHP ile PostgreSQL arasında PDO bağlantısı doğrulandı.
- [x] İlk SQL sorgusu `SELECT version()` başarı ile çalıştırıldı.

#### Öğrendiklerim 

- Docker Compose ile birden fazla servis birlikte tanımlanabilir.
- Aynı Docker ağına bağlı servisler birbirlerine servis adlarıyla ulaşabilir.
- Yalnızca dışarıdan erişilmesi gereken servisler host üzerinde port yayınkamalıdır.
- PHP kaynak kodu için mount kullanılır.
- PostgreSQL verileri için named volume kullanılır.
- Gizli bilgiler `.env`dosyasında tutulur.
- `docker-compose config`ile Compos dosyasının geçerliliği kontol edilebilir.
- Nginx web kökü yalnızca `public/`dizini olmalıdır.
- Nginx `location` blokları ilgili `server`blogunun içinde bulunmalıdır. 
- PDO ile PostgreSQL bağlantısı. ENV kullanımı.
- FastCGI'nin çalışma mantığı


#### Kararlar

- nginx, PHP-FPM  ve PostgreSQL ayrı containerlarda çalışacaktır.
- Tüm servisler `mvc-net`ağına bağlanacaktır.
- Dış dünyaya yalnızca Nginx açılacaktır. 
- PostgreSQL host üzeride `5432` portu yayınlanmayacaktır. 
- Nginx host üzerinde `8080`portundan erişilebilir olacaktır. 
- PHP ayarları geliştirme ortamı için hosttan `bind mount`edilir.
- İleride production imajında ise `php.ini`dosyası Dockerfile ile COPY etmek daha kontrollü olur.

#### Sonraki Adım

- [x] Nginx ile PHP-FPM arasındaki FastCGI bağlantısı yapılandırılacakktır. 

### Day 3 

#### Öğrendiklerim
- `namespace Core` diyerek `class Router`ile class oluşturursak `Core\Router`olur yani gruplayarak aynı isimde kullanım çakışmalarının önüne geçeriz.

- `public function match(string $path): ?string ` buradaki `?string` bu metot ya string döndürür yada null demek için kullanılıyor. 

- MMVC yapısında Router'ın görevi, gelen URL yolunu tanımlı route tablosuyla eşleştirmektir Router doğrudan yönlendirme yapmaz, çıktı üretmez ve HTTP 404 cevabı göndermez.


#### Tamamlananlar
- [x] İlk Front Contreller yapısını oluşturmak. 
- [x] Router tasarımına başlamak.
- [x] Namespace, property, constructor ve nullable dönüş tipi kullanıldı.
- [x] Route eşleştirme mantığı oluşturuldu.

### Day 4

### Öğrendiklerim 
Mimari yapıda önemli kararları öğrendik,  Application, Request Router görev ayrımı ve işleyişi öğrendik.

```text
Application
    ↓
Request'e sor:
"İstenen path ne?"
    ↓
Request: "/about"
    ↓
Router'a sor:
"/about neye eşleşiyor?"
    ↓
Router: "AboutController@index"
    ↓
Application controller'ı çalıştırır
```

```text
**Bugün öğrendiğim en önemli şey:**

Bir sınıfın görevi, her şeyi yapmak değil; kendi sorumluluğunu en iyi şekilde yerine getirmektir.

```

#### Tamamlananlar
- [x] src/routes/web.php dosyasında route tablosu oluşturulacak.
- [x] public/index.php içinde Router nesnesi başlatılacak.
- [x] Eşleşen route sonucu veya 404 cevabı üretilecek.
- [x] El ile require kaldırıldı.
- [x] Dinamik autoload yazıldı.
- [x] Namespace -> Dosya yolu dönüşümü kuruldu.
- [x] is_file() ile güvenlik kontrolü ekklendi.

### Day 5

#### Öğrendiklerim

- `Request`, uygulamaya gelen HTTP isteğini temsil eder.
- `Response`, uygulamadan istemciye gönderilecek HTTP cevabını temsil eder.
- HTTP Response temel olarak status code, headers ve body bileşenlerinden oluşur.
- Controller doğrudan `echo` yapmak yerine bir body üretir.
- `Application`, Controller'dan gelen body ile uygun `Response` nesnesini oluşturur.
- `View::render()` static kullanılarak View nesnesi oluşturmadan HTML üretilebilir.
- `ob_start()` ve `ob_get_clean()` ile view dosyasının çıktısı string olarak alınabilir.
- `include` edilen dosya, include edildiği scope içindeki değişkenlere erişebilir.
- `extract($data)` ile associative array içindeki değerler view içerisinde değişken olarak kullanılabilir.
- Kendi template engine tarafımı geliştirirken `{title}` ın `$title` dönüşümünü ve Cache kullanımını öğrendim.

#### Tamamlananlar

- [x] `Request` sınıfı Application akışına dahil edildi.
- [x] `Response` sınıfı oluşturuldu.
- [x] HTTP 200 ve 404 cevapları `Response` üzerinden gönderilmeye başlandı.
- [x] `View` sınıfı oluşturuldu.
- [x] `Home`, `About` ve `Contact` view dosyaları oluşturuldu.
- [x] Özel 404 view sayfası oluşturuldu.
- [x] Controller'dan View'a veri aktarımı eklendi.
- [x] `extract()` ile View verilerine erişim sağlandı.
- [x] `{title}` benzeri template ifadeleri compile ediliyor.
- [x] Derlenmiş PHP `storage/cache/views` altında cache’leniyor.
- [x] Template değişirse `filemtime()` ile yeniden compile ediliyor.

#### Güncel Request Yaşam Döngüsü

```text
Browser
    ↓
public/index.php
    ↓
Application::run()
    ↓
Request::path()
    ↓
Router::match()
    ↓
Controller
    ↓
View::render()
    ↓
HTML string
    ↓
Response
    ↓
Browser


### Day 5

#### Öğrendiklerim

* View katmanının HTML çıktısı üretmekten sorumlu olduğunu öğrendim.
* Template dosyalarının PHP koduna derlenerek cache üzerinden çalıştırılabileceğini öğrendim.
* Layout, section ve yield yapılarının template kalıtımı için nasıl kullanılabileceğini öğrendim.
* Partial view yapısı için `@include` mantığını oluşturdum.
* Composer'ın PSR-4 standardı ile namespace ve dizin eşlemesini nasıl yaptığını öğrendim.
* Kendi yazdığım autoload mekanizması ile Composer PSR-4 autoload arasındaki ilişkiyi öğrendim.
* PHP Session'ın HTTP requestleri arasında veri saklamasını ve session lifecycle mantığını öğrendim.

#### Tamamlananlar

* [x] `View` sınıfı oluşturuldu.
* [x] `TemplateCompiler` oluşturuldu.
* [x] `{ variable }` ifadeleri güvenli PHP çıktısına dönüştürüldü.
* [x] `@if`, `@elseif`, `@else`, `@endif` desteği eklendi.
* [x] `@foreach`, `@for` ve `@while` desteği eklendi.
* [x] `@extends`, `@section` ve `@yield` desteği eklendi.
* [x] `@include` desteği eklendi.
* [x] Derlenmiş view cache sistemi oluşturuldu.
* [x] Composer projeye eklendi.
* [x] `Core\` ve `App\` namespace'leri PSR-4 ile yapılandırıldı.
* [x] Elle yazılmış autoloader kaldırılarak Composer autoloader kullanılmaya başlandı.
* [x] `Session` sınıfı oluşturuldu.
* [x] Session `start`, `set`, `get`, `has`, `remove` ve `destroy` işlemleri eklendi.
* [x] Session başlangıcı Application lifecycle'a bağlandı.

#### Sonraki Adım

* Flash session yapısının oluşturulması.
* Middleware pipeline tasarımına başlanması.
 