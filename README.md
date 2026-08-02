PHP MVC Öğrenme Projesi

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

Proje Yapısı

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


Durum

Proje başlangıç aşamasındadır.

İlk hedef, Nginx, PHP-FPM ve PostgreSQL containerlarını birbiri ile haberleştiği temel geliştirme ortamını oluşturmaktır. 


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

#### Kararlar

- nginx, PHP-FPM  ve PostgreSQL ayrı containerlarda çalışacaktır.
- Tüm servisler `mvc-net`ağına bağlanacaktır.
- Dış dünyaya yalnızca Nginx açılacaktır. 
- PostgreSQL host üzeride `5432` portu yayınlanmayacaktır. 
- Nginx host üzerinde `8080`portundan erişilebilir olacaktır. 
- PHP ayarları geliştirme ortamı için hosttan `bind mount`edilir.
- İleride production imajında ise `php.ini`dosyası Dockerfile ile COPY etmek daha kontrollü olur.

#### Sonraki Adım

- Nginx ile PHP-FPM arasındaki FastCGI bağlantısı yapılandırılacakktır. 
