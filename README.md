Env Manager
======

Kelola file `.env` kamu langsung lewat aplikasimu.

![ss-env](https://raw.githubusercontent.com/novay/imagehost/master/github/nue-extensions-env.png)

## Persyaratan

* nue >= 2.0

## Instalasi

```bash
composer require nue-extensions/env
```

Bila kamu pengen munculin menu di sidebar Nue, eksekusi perintah berikut:
```bash
php artisan nue:import env
```

## Konfigurasi

Tambahin `extensions` berikut kedalam file konfigurasi yang terletak di `config/nue.php`:

```php
'extensions' => [
	...
    'env-manager' => [
        'enable' => true
    ], 
    ...
]
```

## Penggunaan

Kunjungi halaman http://localhost/nue/env melalui peramban.

Langsung kelola aja file `.env` kamu melalui halaman itu.

## Lisensi

Lisensi **Env Manager** ini dikembangin dengan [lisensi MIT](LICENSE.md). Artinya kamu bebas menggunakannya baik untuk pribadi maupun komersil. Enjoy!