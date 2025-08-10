-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 04:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dana_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ekonomi', 'ekonomi', '2022-06-07 01:25:21', '2022-06-07 01:25:21'),
(2, 'Edukasi Keuangan', 'edukasi-keuangan', '2022-06-07 01:25:41', '2022-06-07 01:25:41'),
(3, 'Teknologi', 'teknologi', '2022-06-07 01:26:11', '2022-06-07 01:26:11'),
(5, 'Wirausaha', 'wirausaha', '2022-06-07 03:52:55', '2022-06-07 03:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jmlh_deposit` bigint(20) NOT NULL,
  `buktitf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approve','reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `user_id`, `jmlh_deposit`, `buktitf`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 100000, 'deposit/PYwAwvNSnPwVN8wA138I6Ett9PZigptwudYjnoHQ.jpg', 'approve', '2022-06-07 01:06:59', '2022-06-07 01:17:07'),
(2, 8, 500000, 'deposit/w7p1N59bzgR2YmgyxweoQApu4uwNdMr5twqXGftA.jpg', 'pending', '2022-06-07 01:07:13', '2022-06-07 01:07:13'),
(3, 11, 50000, 'deposit/oYqQKuiDrOuq5RNuxZoqxJiuwyIgrwmJGps8MzfM.jpg', 'approve', '2022-06-07 01:12:45', '2022-06-07 01:17:57'),
(4, 11, 150000, 'deposit/uWTzMpOvVeiBxZ8kw8smKKU74K2Pj4xx7y5z3HZj.jpg', 'approve', '2022-06-07 01:13:09', '2022-06-07 01:17:22'),
(5, 11, 40000000, 'deposit/ClBcoZ07FcCPA1ByXD6ee2oOoBNg5IwYK47QvfoD.jpg', 'reject', '2022-06-07 01:13:21', '2022-06-07 01:17:42'),
(6, 12, 50000, 'deposit/9mLOFO9nr8DI6YjxGHfANZhC2KfuEjFD6iTd9Cd3.jpg', 'approve', '2022-06-07 03:43:16', '2022-06-07 03:44:55'),
(7, 12, 9999999, 'deposit/XoEMvyeWu2CUCgBqNXqt6Xkunoe1xUytOc5nF5VN.jpg', 'reject', '2022-06-07 03:46:23', '2022-06-07 03:48:50'),
(21, 8, 3000, 'deposit/JhWKlNuMU5ZnfslbHlkP9pER3u8gnjYNzKtKlWvm.jpg', 'approve', '2022-06-09 07:57:33', '2022-06-09 07:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Apa itu Dana Siswa?', 'Dana Siswa adalah platform keuangan yang dapat melakukan transaksi perbankan melalui internet kapanpun dan dimanapun anda berada.', 'apa-itu-dana-siswa', '2022-06-07 01:30:39', '2022-06-07 01:30:39'),
(2, 'Bagaimana cara mendaftar akun Dana Siswa?', 'Kamu bisa mendaftar melalui website Dana Siswa. Berikut adalah langkah-langkah membuat akun Dana Siswa : \r\n•	Klik tombol Login pada menu home website Dana Siswa\r\n•	Klik Sign Up\r\n•	Silahkan isi data yang diminta, lalu klik Daftar\r\n•	Tunggu  Admin untuk memvalidasi data anda. Data akan tervalidasi dengan jangka waktu paling lama 2x24 jam pada hari kerja', 'bagaimana-cara-mendaftar-akun-dana-siswa', '2022-06-07 01:31:01', '2022-06-07 01:31:01'),
(3, 'Apakah aman untuk bertransaksi di Dana Siswa?', 'Ya, prioritas Dana Siswa adalah menjaga keamanan para pengguna dalam bertransaksi. Dana Siswa menggunakan sistem keamanan yang mutakhir sehingga data pribadi  anda akan aman.', 'apakah-aman-untuk-bertransaksi-di-dana-siswa', '2022-06-07 01:31:35', '2022-06-07 01:31:35'),
(4, 'Bagaimana cara mengganti password akun Dana Siswa?', 'Anda bisa login, kemudian masuk ke halaman dashboard. Lalu klik Akun dan pilih opsi Ganti Password', 'bagaimana-cara-mengganti-password-akun-dana-siswa', '2022-06-07 01:31:56', '2022-06-07 01:31:56'),
(5, 'Transaksi apa saja yang bisa dilakukan di Dana Siswa?', 'Transaksi non finansial : \r\n•	Mengganti Password\r\n•	Melihat History Transaksi\r\n•	Membaca berita melalui blog berita\r\nTransaksi Finansial :\r\n•	Melakukan Deposit\r\n•	Melakukan Penarikan Saldo', 'transaksi-apa-saja-yang-bisa-dilakukan-di-dana-siswa', '2022-06-07 03:53:46', '2022-06-07 03:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_30_111507_create_tabungan_table', 1),
(6, '2022_05_30_111534_create_deposit_table', 1),
(7, '2022_05_30_111552_create_penarikans_table', 1),
(8, '2022_05_30_111610_create_posts_table', 1),
(9, '2022_06_05_150236_create_categories_table', 1),
(10, '2022_06_05_154349_create_faqs_table', 1),
(11, '2022_06_09_125041_create_notifs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `user_id`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'Selamat, Pengajuan penarikan anda berhasil disetujui. Silahkan cek histori transaksi untuk lebih lanjut.', 0, '2022-06-09 06:05:12', '2022-06-09 09:53:50'),
(2, 8, 'Selamat, Pengajuan Deposit anda berhasil disetujui. Silahkan cek histori transaksi untuk lebih lanjut.', 0, '2022-06-09 07:58:03', '2022-06-09 09:55:50'),
(3, 8, 'Selamat, Pengajuan penarikan anda berhasil disetujui. Silahkan cek histori transaksi untuk lebih lanjut.', 0, '2022-06-09 09:55:25', '2022-06-09 19:51:30'),
(4, 8, 'Mohon maaf, Pengajuan Penarikan anda ditolak. Silahkan cek F.A.Q untuk mengetahui cara melakukan penarikan yang benar.', 0, '2022-06-09 09:57:26', '2022-06-09 19:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_bank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akunbank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` bigint(20) NOT NULL,
  `jmlh_penarikan` bigint(20) NOT NULL,
  `status` enum('pending','approve','reject') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id`, `user_id`, `nama_bank`, `nama_akunbank`, `no_rek`, `jmlh_penarikan`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'bca', 'coba', 312312, 50000, 'approve', '2022-06-07 01:21:20', '2022-06-07 01:22:27'),
(2, 12, 'bni', 'test', 1232131, 25000, 'approve', '2022-06-07 03:46:54', '2022-06-07 03:49:59'),
(3, 12, 'bca', 'test', 123214124, 40000, 'reject', '2022-06-07 03:47:21', '2022-06-07 03:50:33'),
(4, 8, 'BCA', 'budiman', 12312312, 1000, 'approve', '2022-06-09 06:00:36', '2022-06-09 06:01:25'),
(5, 8, 'BNI', 'Test', 123123, 2000, 'approve', '2022-06-09 06:04:09', '2022-06-09 06:04:29'),
(6, 8, 'BNI', 'ucup', 23123411, 10000, 'approve', '2022-06-09 09:54:59', '2022-06-09 09:55:25'),
(7, 8, 'ditolak', 'ditolak', 12312, 9999, 'reject', '2022-06-09 09:57:10', '2022-06-09 09:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `image`, `body`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Tips Berhemat di Tengah Kenaikan Harga Pangan dan Energi', 'tips-berhemat-di-tengah-kenaikan-harga-pangan-dan-energi', 'Jakarta, CNN Indonesia -- Harga pangan&nbsp;dan&nbsp;harga energi melonjak di tengah perang Rusia-Ukraina. Bahkan, jauh sebelum serangan militer negar...', 'post-cover-images/H4dfsQXVsxL2rA96y6SapqSDkRJSZSGLLcjTURT7.jpg', '<p>Jakarta, CNN Indonesia -- Harga pangan&nbsp;dan&nbsp;harga energi melonjak di tengah perang Rusia-Ukraina. Bahkan, jauh sebelum serangan militer negara beruang merah itu, harga&nbsp;minyak goreng sudah selangit.<br>Sementara, ramadan dan lebaran di depan mata. Umumnya, harga pangan melonjak saat bulan puasa, dikarenakan tingginya permintaan dan terbatasnya pasokan.<br><br>Nah, semakin penting bagi masyarakat untuk berhemat sedari dini kan agar dapat menyiasati seluruh kebutuhan rumah tangga?<br><br>\"Cari alternatifnya. Khusus untuk harga yang sedang naik, bisa dicari alternatif penggantinya. Sementara, kurangi goreng-gorengan, masak dengan metode lain dulu,\" terang dia.<br><br>Delete alias langkah terakhir dengan mengurangi barang-barang yang biasa dibeli. Toh, budget sedang tidak mencukupi, terpaksa harus dihilangkan dari daftar belanjaan hingga harga lebih bersahabat.<br><br>\"Ini alternatif terakhir dan paling berat. Kalau gagal, minimal jadi banyak berkurang. Bisa nggak sih nggak makan gorengan sama sekali? Coba dulu. Kalau dalam seminggu dicoba ternyata gagal, ya minimal sudah seminggu nggak mengkonsumsi gorengan,\" jelas Ahmad.<br><br>Hal serupa dikatakan Perencana Keuangan Tatadana Consulting Tejasari Assad. Ia menganjurkan masyarakat membuat anggaran terlebih dahulu, yang berisi segala jenis pengeluaran.<br><br>\"Dengan perubahan-perubahan kenaikan harga dari budget yang kita buat, mana saja yang bisa kita kurangi? Karena kan budgetnya sudah ada, misalnya, konsumsi, transportasi, buat orangtua kali, buat anak di rumah, bayar-bayar rutin, seperti bayar listrik, telepon, supaya kita tahu telepon berapa karena kan kita mau berhemat,\" kata Teja.<br><br>Ambil contoh, saat seorang sering makan di luar atau memesan makanan lewat ojek online, ia bisa berhemat secara signifikan dengan masak di rumah. Strategi lain yang bisa diterapkan adalah melunasi utang atau cicilan agar ada sisa uang yang dapat ditambah ke anggaran belanja bahan pokok.<br><br>\"Misal, ternyata komposisi utang kita banyak banget, jadi yuk kita beresin dulu utangnya. Kita lunasi&nbsp;dari tabungan. Sehingga, cicilan bulanan jadi habis, nah jadi ada spare buat makanan untuk menaikkan komposisi di budget pengeluaran. Jadi itu detail,\" ungkap Teja.<br><br>Dalam hal konsumsi makanan, Teja menyarankan agar anggaran konsumsi dibuat detail, sehingga Anda dapat menemukan apa saja bahan pokok yang bisa dicarikan alternatif. Bahkan, kalau perlu dikurangi porsinya.<br><br>\"Kita lihat kita belanja apa aja sih, tiap hari, tiap minggu atau setiap bulan. Nah, dari situ lah yang kita ubah. Ternyata (kita sering) beli daging, beli udang, beli ikan, ya sudah sementara kita switch (ganti) dulu sampai kita ada kenaikan gaji, yang sekarang ya sudah. Mungkin, yang biasanya beli udang 1 kg, belinya jadi setengah kilo,\" jelasnya.<br><br>Selain itu, seharusnya, dengan berkurangnya aktivitas keluar rumah akibat pandemi, anggaran transportasi yang berlebih bisa digunakan untuk menopang keperluan belanja bahan makanan ataupun gas elpiji (LPG).<br><br>\"Sekarang kelihatannya makanan naik, tapi kan transportasi juga jauh berkurang karena banyak di rumah. Berarti, budget transportasi bisa digunakan buat belanja. Terus, cek lagi apa budget lain ada yang bisa kita ganti supaya bisa pindah ke bagian konsumsi,\" pungkas Teja.</p>', '2022-06-07 01:34:24', '2022-06-07 01:34:24'),
(2, 2, 1, '5 Tips Menabung Demi Hemat dan Makin Cuan di 2022', '5-tips-menabung-demi-hemat-dan-makin-cuan-di-2022', 'Jakarta - Menabung harus dilakukan sejak dini utamanya saat masa sekolah. Apabila sejak kecil sudah diajarkan menabung maka akan membiasakan perilaku...', 'post-cover-images/IS2X1uG6T8EpuSO7mxpmLm2vcJqUtMd02l5mNxjB.jpg', '<p>Jakarta - Menabung harus dilakukan sejak dini utamanya saat masa sekolah. Apabila sejak kecil sudah diajarkan menabung maka akan membiasakan perilaku baik hingga dewasa.<br>Anak yang masih bersekolah biasanya mendapatkan uang saku setiap hari dan belajar menyisihkan uang sakunya tersebut. Namun tidak jarang ada yang masih belum bisa menabung dari uang saku tersebut.<br><br>Ada beberapa tips menabung yang harus dilakukan para siswa agar dapat menabung dengan baik. Berikut adalah tipsnya yang dikutip dari laman SMA Dwiwarna:<br><br>Tips menabung bagi pelajar<br>1. Menggunakan celengan yang unik<br>Cara pertama yang dapat dilakukan untuk menggunakan celengan yang unik agar para siswa semangat untuk menabung. Jika mereka memiliki semangat untuk menabung maka mereka akan terus mengisi celengan tersebut.<br><br>Menggunakan celengan unik juga dapat mengasah kreativitas anak yaitu dengan membuat celengan sendiri dari bahan-bahan bekas.<br><br>2. Rutin Menabung dengan Nominal Kecil<br>Menabung tidak harus dengan nominal yang besar. Tidak masalah jika menabung dengan nominal yang kecil asalkan dilakukan rutin setiap hari.<br><br>Jika rutin menabung dengan nominal tersebut lama kelamaan akan menjadi nominal yang besar. Tentu tips menabung ini dapat berjalan efektif apabila dilakukan dengan niat.<br><br>3. Jangan meremehkan uang receh<br>Banyak orang yang meremehkan uang receh seperti 100 atau 200 Rupiah. Walaupun tidak bisa untuk membeli barang, uang receh tersebut juga berharga seperti uang lainnya. Uang receh tersebut juga dapat ditabung dan menjadi nominal yang besar apabila rutin melakukannya.<br><br>Masukkan uang receh langsung ke celengan jika sudah penuh dapat ditukarkan ke warung maupun supermarket. Nantinya uang yang ditukar tersebut dapat digunakan untuk membeli barang yang dibutuhkan dan keperluan lainnya.<br><br>4. Menabung dalam Toples Transparan<br>Menabung dalam toples transparan dinilai cukup efektif untuk mendorong anak-anak agar lebih semangat dalam menabung.<br><br>Hal ini dikarenakan menabung di toples dapat terlihat sehingga mendorong anak-anak untuk melihat jumlah yang ditabung setiap hari.<br><br>Agar lebih semangat, sebaiknya tempelkan tulisan dan foto tujuan untuk menabung. Ingat ya, yang terpenting adalah menabung secara rutin dan setiap hari.<br><br>5. Menabung ala Orang Korea<br>Tahukah detikers jika orang Korea memiliki cara yang unik dalam menabung dan dapat diikuti. Orang Korea melakukannya dengan menggunakan tempat menabung khusus yaitu kalender saku.<br><br>Setiap tanggal pada kalender tersebut memiliki tempat penyimpanan. Nantinya anak-anak dapat menabung dengan memasukkan uang saku di setiap tanggal kalender tersebut. Nantinya anak-anak akan terpaksa menyisihkan uang saku setiap tanggal tersebut.</p>', '2022-06-07 01:36:07', '2022-06-07 01:36:07'),
(3, 1, 2, 'Mahasiswa Rantau, Ini 5 Tips Hidup Hemat Selama Tinggal di Kosan', 'mahasiswa-rantau-ini-5-tips-hidup-hemat-selama-tinggal-di-kosan', 'Jakarta - Mungkin bagi sebagian mahasiswa baru (maba) yang merantau dan harus meninggalkan rumah masih merasa kesulitan beradaptasi. Khususnya dalam m...', 'post-cover-images/6igkcPOsr9XLUsoaygZYCuWFzpd6sgFLl8IK7flj.jpg', '<p>Jakarta - Mungkin bagi sebagian mahasiswa baru (maba) yang merantau dan harus meninggalkan rumah masih merasa kesulitan beradaptasi. Khususnya dalam mengelola keuangan selama di indekos atau kontrakan di tanah rantau.<br>Untuk itu, mahasiswa juga perlu memahami bagaimana cara mengelola hingga menghemat pengeluaran. Berikut tips cara menghemat uang yang mudah dilakukan mahasiswa.<br><br>5 Tips Hidup Hemat di Kosan ala Mahasiswa Rantau<br>1. Catat pengeluaran<br>Pengeluaran yang tidak terkendali menjadi salah satu faktor mengapa pengeluaran terasa lebih besar. Untuk itu, cara pertama menghemat uang saku mahasiswa adalah dengan mencatat segala pengeluaran pokok dan membuat anggaran bulanan.<br><br>\"Coba buat daftar kebutuhan pokok yang tidak pernah absen setiap bulannya. Misalnya biaya sewa kost, biaya makan, biaya transportasi, biaya pulsa, dan lain sebagainya,\" tulis keterangan dari laman BINUS University.<br><br>Melalui catatan pengeluaran selama sebulan tersebut dapat dijadikan acuan untuk memperkirakan biaya kebutuhan pokok bulan berikutnya. Catatan tersebut juga nantinya dapat dijadikan dasar menetapkan pos-pos pengeluaran agar tidak terlalu boros mengeluarkan uang.<br><br>2. Menabung di awal bulan<br>Tips ini masih ada hubungannya dengan tips sebelumnya. Dengan menetapkan pos-pos pengeluaran, siswa juga dapat menetapkan pos jumlah uang yang dapat ditabung selama sebulan.<br><br>Catatan yang perlu digarisbawahi, menabung ini lebih baik dilakukan pada awal bulan usai menetapkan pengeluaran sehari-hari. Bukan sebaliknya dengan menabung uang yang tersisa di akhir bulan.<br><br>Uang tabungan yang terkumpul ini, nantinya dapat dijadikan mahasiswa sebagai dana darurat. Tepatnya dana yang dibutuhkan untuk keperluan mendesak.<br><br>3. Cari diskon<br>Tips yang kedua, kamu bisa menghemat uang saku dengan banyak mencari diskon atau promo tertentu. Promo atau diskon ini ternyata bisa didapat dari kartu mahasiswamu, lho!<br><br>Biasanya, kartu mahasiswa bisa digunakan sebagai persyaratan untuk event atau promo diskon tertentu. Selain itu, tidak sedikit juga platform streaming ataupun software komputer yang menawarkan harga khusus bagi mereka yang memiliki kartu mahasiswa.<br><br>4. Masak sendiri<br>Solusi lain untuk menutup pengeluaran sehari-hari yang besar adalah dengan menyiapkan bekal sendiri atau masak sendiri. Pasalnya, membeli bahan-bahan untuk memasak jauh lebih murah dibandingkan dengan membeli makanan di luar.<br><br>5. Jaga kesehatan<br>Terakhir, cara menghemat pengeluaran ala mahasiswa kos adalah menjaga kesehatan. Bisa dibayangkan berapa uang yang harus dikeluarkan untuk membeli obat-obatan dan semacamnya ketika sakit.<br><br>Sebab itulah, mahasiswa bisa menjaga kesehatan di sela-sela berkuliah dengan berolahraga atau memakan makanan sehat. Seperti buah, sayur, hingga memperbanyak minum air putih.<br><br><br>&nbsp;</p>', '2022-06-07 03:51:50', '2022-06-07 03:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id`, `user_id`, `saldo`, `created_at`, `updated_at`) VALUES
(8, 8, 40000, '2022-06-07 01:04:28', '2022-06-09 09:55:25'),
(11, 11, 200000, '2022-06-07 01:05:13', '2022-06-07 01:17:57'),
(12, 12, 25000, '2022-06-07 03:39:28', '2022-06-07 03:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('in_queue','SuperAdmin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in_queue',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `nis`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kelompok 6', 'kelompok6@gmail.com', NULL, NULL, '$2y$10$iyjSeFCae1vuwIg0wMLYvuZ1VT05ZpnBX0jb863mmWYt0xpUHcGL.', 'SuperAdmin', 'user.png', NULL, '2022-06-06 20:59:12', '2022-06-06 20:59:12'),
(2, 'fahru', 'mhdfahrurozi5@gmail.com', NULL, NULL, '$2y$10$ziVdpmGZ72ffRHLRyAAwu.7DUllbo5RfKMxV3ZFDiPVc8occoihDS', 'admin', 'user.png', NULL, '2022-06-06 21:01:55', '2022-06-06 21:01:55'),
(3, 'hatta', 'muhammad.hatta18@gmail.com', NULL, NULL, '$2y$10$S/S833T2OXPg2lxtVgtMQ.ZaB9ZCv//YjOBR0F.skmPR2k0a96C5m', 'admin', 'user.png', NULL, '2022-06-06 21:02:30', '2022-06-06 21:02:30'),
(4, 'hakim', 'hakimmmmm23@gmail.com', NULL, NULL, '$2y$10$42zmsDJK4HBwx66uuKhHpO474/TTCiqlZsH7PD6gZ/heby1zQM0W6', 'admin', 'user.png', NULL, '2022-06-06 21:02:50', '2022-06-06 21:02:50'),
(5, 'naufal', 'mnaufalhamdy@gmail.com', NULL, NULL, '$2y$10$Ugcc1bJb.axUPnQFZJKpouFGhtdHNVySmzHETPZLEOsk68/RNXgbS', 'admin', 'user.png', NULL, '2022-06-06 21:03:15', '2022-06-06 21:03:15'),
(6, 'putra', 'syahputra4688@gmail.com', NULL, NULL, '$2y$10$Z7O2sbF5VaFfz05w.jFKc.9KWp/DHKNKWLDxeDxkF1ywHm06Gysfi', 'admin', 'user.png', NULL, '2022-06-06 21:03:33', '2022-06-06 21:03:33'),
(7, 'filza', 'filzaramadhan2003@gmail.com', NULL, NULL, '$2y$10$yhtaponYurfe4dA4ARjc0OhHqfGRlRNAjy5YwNC39jhwefwq8InQW', 'admin', 'user.png', NULL, '2022-06-06 21:03:48', '2022-06-06 21:03:48'),
(8, 'siswabaik', 'test01@gmail.com', 12121212121, NULL, '$2y$10$TWLV9/qizx2krXiHoS0T5umFe2Kf1idGtVhOto9.110T8mWjVZiQK', 'user', 'user.png', NULL, '2022-06-06 21:04:53', '2022-06-07 01:04:28'),
(11, 'siswamalas', 'test04@gmail.com', 12341234, NULL, '$2y$10$leubisZoWXThdAeswMv1gudUHwoJUdoufGTtDQxIGG4idmAfrFLAK', 'user', 'user.png', NULL, '2022-06-06 21:06:42', '2022-06-07 01:05:14'),
(12, 'Siswa Baik', 'siswa01@gmail.com', 11223311133, NULL, '$2y$10$gmD5MOan6B76xwo8m6aqsOpEIMdhY72ThfBZGXn4pLwUZbgdCVDiO', 'user', 'user.png', NULL, '2022-06-07 03:37:56', '2022-06-07 03:56:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
