## **Petunjuk Pengunaan**
Proyek ini menggunakan framework [Laravel 10](https://laravel.com/docs/10.x/releases)

### **Software pendukung yang perlu disiapkan**

- PHP minimal versi 8.1 atau versi terbaru
- Composer
- Akun midtrans dan ServerKey dari Midtrans
- Git minimal versi 2 atau versi terbaru (Optional)
- [Ngrok](https://ngrok.com/) (Optional), berfungsi sebagai Virtual Hosting. Nantinya url dari ngrok digunakan sebagai Notification URL pada Midtrans

### **Panduan Instalasi**

- Buka terminal atau command line, kemudian arahkan ke folder ***ecommerce***
- Jalankan perintah:
  ```
  composer install
  ```
- Langkah selanjutnya, jalankan perintah:
  ```
  php -r "copy('.env.example', '.env');";
  ```
- Kemudian, jalankan perintah:
  ```
  php artisan key:generate
  ```
- Buat database dengan nama ***ecommerce***
- Sesuaikan parameter pada file **.env**, seperti berikut:
  ```
  APP_URL=http://localhost

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=ecommerce
  DB_USERNAME=root
  DB_PASSWORD=
  
  MIDTRANS_SERVER_KEY=SB-Mid-server-FAg9QuhveL7spM6ByKHgR9Yb
  ```
- Selanjutnya, jalankan perintah:
  ```
  php artisan migrate:fresh --seed
  ```
- Buka command line yang baru, jalankan perintah:
  ```
  php artisan serve
  ```
- Buka browser dengan url [http://localhost:8000](http://localhost:8000)

- Informasi User
  ```
  Email : trihadi17@gmail.com
  Password : password123
  ```
