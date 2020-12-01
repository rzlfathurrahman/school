# APlKASI KESISWAAN SMK MAARIF NU 1 AJIBARANG
    Aplikasi ini dibuat dengan tujuan agar siswa mudah dalam memantau dan mencari informasi yang berhubungan dengan Kesiswaan. DIbangun menggunakan Codeigniter 3, Admin LTE, dan Ion Auth.

**Fitur Aplikasi**
- ***Admin***
   - ``` Pengelolaan Landing Page ```
   - ``` Pengelolaan Menu ```
   - ``` Pengelolaan Akun Penguna/user ```
   - ``` Manajemen Kesiswaan ```
        -  ``` Profil Kesiswaan  ```
        -  ``` Struktur Organisasi Kesiswaan  ```
        -  ``` Pengelolaan Esktrakurikuler  ```
        -  ``` Pengelolaan Guru ```
        -  ``` Pengelolaan Siswa ```
   - ``` Manajemen Jurusan ```
        -  ``` Pengelolaan Jurusan  ```
        -  ``` Pengelolaan Mapel  ```
        -  ``` Pengelolaan Kelas ```
- ***Siswa***

**Framework & Library Pendukung**
- [Codeigniter 3](https://codeigniter.com)
- [AdminLTE 3](https://adminlte.io)
- [Ion Auth](https://github.com/benedmunds/Codeigniter-Ion-Auth)

**Server Requirement** :
- ```PHP 7.4 atau diatasnya``` 
- ```APACHE2 atau web server lain yang suppor .htaccess```
- ``` MARIADB 10 atau diatasnya ```

**Browser**
- ``` Google Chrome Versi 86.x.x.x atau diatasnya```
- ``` Firefox Versi 83.x.x.x atau diatasnya ```

 <details open>
  <summary><strong>Instalasi</strong></summary>

   - ```
     Pastikan file sudah di download dan diekstrak.
     ```
   - ```
     Nama folder atau web bisa disesuaikan sesuai kebutuhan
     ```    
   - ```
     Pindah folder berisi web tadi ke directory root pada server (public_html/htdocs/www)
     ```
   - ``` bash
     Masuk ke /application/config/database.php , ubah sesuai data server
        76. $db['default'] = array(
        77.    'dsn'	=> '',
        78.    'hostname' => '{isi host server anda}',
        79.    'username' => '{username database}',
        80.    'password' => '{password database}',
        81.    'database' => '{nama database}',
        82.     dbdriver' => 'mysqli
        .....
        96. );
     ```
- 
    ```
    Buat database memakai phpmyadmin / dbms yang lain. Sesuaikan nama database dengan yang ada di config database diatas
    ```
-
    ```
    Import database yang ada di /application/sql/school.sql
    ```
  </details>
- **Petunjuk Penggunaan Untuk Admin**\
Disini saya akan menjelaskan hanya di bagian tertentu saja yang mungkin agak susah dipahami.
    - ``` Admin menambah data user (siswa) pada menu pengguna > tambah pengguna ```
    - ``` Admin harus mengaktifkan user (siswa) yang baru dibuat tadi dengan cara mengklik tombol 'Tidak Aktif' pada daftar user (siswa)/pengguna (klik langi untuk menonaktifkannya) ```
    - ``` Akun User yang baru terdaftar harus diberi diakses sebagai 'siswa' agar bisa mengakses halaman profil siswa itu sendiri ```
    - ``` Caranya klik edit pada data siswa yang ingin diberi hak akses, lalu ceklis pada pilihan 'siswa' ```
    - ``` Admin harus memberitahu akun tersebut kepada siswa bersangkutan```
    - ``` Untuk bisa menjalankan menu ekstrakurikuler,jurusan,dan guru pada halaman admin, user yang terdaftar harus diberi akses juga seperti cara diatas ```
    - ``` Setelah itu mulai dari menambah jurusan > kelas > mapel > dan yang terakhir data guru ```
    - ``` Menu dashboard dihunakan untuk mengelola informasi yang akan tampil di halaman awal aplikasi / web ```
- **Petunjuk Penggunaan Untuk Siswa**

```
1. Siswa menggunakan akun yang sudah didaftakan tadi
```

```
2. Klik daftar untuk memasukan data diri dan orang tua
```

```
3. Untuk pengisian NIS dan NISN jangan sampai salah karena bersifat permanen (tidak bisa diubah)
```

```
4. Data bisa diubah jika ada kesalahan (kecuali untuk nis dan nisn) dengan klik tombol 'edit profil saya'
```

