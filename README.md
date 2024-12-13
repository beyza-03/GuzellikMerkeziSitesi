# Güzellik Merkezi Yönetim Sistemi

Bu proje, bir güzellik merkezi için tasarlanmış bir web tabanlı yönetim sistemi sağlar. Sistem, müşteriler ve yöneticiler için kolay randevu yönetimi, hizmet düzenleme ve ekip bilgilerini görüntüleme özelliklerini içerir.

## Özellikler

- **Ana Sayfa**: Güzellik merkezinin genel tanıtımı ve hizmet bilgileri.
- **Randevu Yönetimi**: Müşterilerin randevu alabileceği ve yöneticilerin bu randevuları yönetebileceği bir sistem.
- **Hizmetler Sayfası**: Sunulan hizmetlerin listesi ve açıklamaları.
- **Ekip Tanıtımı**: Güzellik merkezi çalışanlarının bilgilerini görüntüleme.
- **Yönetici Paneli**: Yönetim işlemleri için giriş ve kontrol paneli.

## Kurulum

Bu projeyi kendi bilgisayarınızda çalıştırmak için aşağıdaki adımları izleyin:

### Gereksinimler
- PHP 7.4 veya üstü
- MySQL veritabanı
- Bir web sunucusu (örneğin, Apache veya Nginx)

### Adımlar

1. **Projeyi Klonlayın:**

   ```bash
   git clone https://github.com/kullanici_adi/proje_adi.git
   cd proje_adi
   ```

2. **Veritabanını Ayarlayın:**
   - `database.sql` dosyasını MySQL'e içe aktarın.
   - `config.php` dosyasındaki veritabanı ayarlarını kendi sisteminize göre düzenleyin.

3. **Web Sunucusunu Ayarlayın:**
   - Proje dosyalarını web sunucusunun kök dizinine taşıyın.
   - PHP ve MySQL hizmetlerini başlatın.

4. **Tarayıcıda Çalıştırın:**
   - Web tarayıcınızda projeyi açın: `http://localhost/proje_adi`




- **Yönetici Girişi:** `admin-login.php` üzerinden yapılır.
- **Randevu Yönetimi:** Randevular `appts.php` üzerinden kontrol edilir.
- **Hizmetler Düzenleme:** Yönetim panelinde hizmetleri düzenleyebilirsiniz.

## Açıklama (Description)

Güzellik Merkezi Yönetim Sistemi, güzellik salonlarının operasyonlarını dijitalleştirerek randevu, hizmet ve ekip yönetimini kolaylaştıran bir platformdur. Kullanıcı dostu bir arayüz ve güçlü bir yönetici paneli ile salon sahiplerinin iş süreçlerini daha verimli bir şekilde yönetmesine olanak tanır.


![Ekran görüntüsü 2024-12-13 191659](https://github.com/user-attachments/assets/6b08a09c-696e-426c-8e89-2505e60f8a77)
![Ekran görüntüsü 2024-12-13 191707](https://github.com/user-attachments/assets/490a7d72-a54c-47c8-86a7-912deb709d3b)


