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
