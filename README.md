# CRUD dan REST API Generator dengan template AdminLTE
Untuk yang baru belajar membuat CRUD (Create, Read, Update, Delete), atau yang ingin cepat membuat CRUD, semoga bisa membantu agar prosesnya lebih cepat.

Setup:
1. Buat database dengan nama db_apps kemudian import dari file db yang ada dalam folder saat impor akan ada 3 table default (user, menu, modul).<br/>
2. Kemudian create table sesuai dengan aplikasi yang akan dibuat misal table mahasiswa, isi dengan field2nya.<br/>
3. Buka pada localhost/CRUD_generator_AdminLTE/generator dan buat terlebih dahulu menu yang diinginkan sebagai tempat CRUD nantinya dijalankan, bisa sebagai menu Master, Transaksi, Laporan atau lainnya.<br/>
4. Pilih menu CRUD Generator, pilih table yang akan dibuat CRUD isi title dan deskripsi.<br/>
5. Kemudian atur pada Pengaturan Modul agar CRUD yang dibuat sesuai dengan linknya.<br/>
6. Semua aplikasi yang sudah digenerate ada difolder apps/pages.<br/>
7. Untuk ubah database ada didalam folder apps/lib nama file conn.php dan juga  <br/>
8. Jika ingin mengubah nama aplikasi, ubah saja folder apps sesuai dengan nama aplikasi yang ingin dibuat, kemudian pindahkan folder tersebut diluar dari folder CRUD generator.<br/>
9. Jalakan apps yang sudah dibuat dengan login menggunakan username: admin password: admin<br/>
10. Untuk mencoba REST API gunakan http://address_link_project/CRUD_generator_AdminLTE/apps/pages/nama_modul/api_nama_modul.php contoh -> http://localhost/CRUD_generator_AdminLTE/apps/pages/buku/api_buku.php<br/>

Berikut tutorial menggunakan CRUD Generator:

[![Alt text](https://img.youtube.com/vi/Z4vMk8ARHWU/0.jpg)](https://www.youtube.com/watch?v=Z4vMk8ARHWU)

Thanks to: <br/>
https://adminlte.io/ <br/>
http://harviacode.com/ <br/>
https://github.com/adeavenged <br/>
https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/
