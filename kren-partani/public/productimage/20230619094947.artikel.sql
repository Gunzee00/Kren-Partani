-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 17.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caldera-sibisa-db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `tanggal_rilis` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `judul_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tanggal_rilis`, `gambar`, `deskripsi`, `judul_artikel`) VALUES
(9, '2023-06-16 04:13:45', 'WhatsApp Image 2023-06-16 at 10.56.13.jpeg', 'Berdasarkan informasi di laman resmi Kementerian Luar Negeri, keputusan ini ditetapkan pada Sidang ke-209 Dewan Eksekutif UNESCO, Selasa (7/7/2020) di Paris, Perancis. Duta Besar Indonesia untuk Perancis Arrmanatha Nasir menyebutkan, ada manfaat yang bisa diperoleh Indonesia, khususnya bagi wilayah dan masyarakat di sekitar Caldera Toba. \"Melalui penetapan ini, Indonesia dapat mengembangkan geopark Caldera Toba melalui jaringan Global Geoparks Network dan Asia Pacific Geoparks Network, khususnya dalam kaitan pemberdayaan masyarakat lokal,\" kata Arrmanatha. Selain itu, penetapan ini dapat mendorong terjadinya pengembangan perekonomian dan pembangunan berkelanjutan di daerah tersebut.\r\n\r\n     Indonesia telah berhasil meyakinkan UNESCO bahwa Caldera Toba memiliki kaitan geologis dan warisan tradisi dengan masyarakat lokal, khususnya dalam hal budaya dan keanekaragaman hayati. Oleh karena itu, negara-negara anggota UNESCO mendukung Caldera Toba dilestarikan dan dilindungi dengan dijadikan sebagai bagian dari UNESCO Global Geopark. Proses penilaian ini sebenarnya sudah dilakukan pada Konferensi Internasional UNESCO Global Geoparks ke-IV di Lombok, 31 Agustus-2 September 2019.', 'Caldera Toba Ditetapkan Jadi UNESCO Global Geopark'),
(10, '2023-06-16 04:13:35', 'WhatsApp Image 2023-06-16 at 10.55.56.jpeg', 'Presiden Jokowi didampingi Ibu Iriana Jokowi, Menko Kemaritiman Luhut Binsar Panjaitan,   Menteri Pariwisata Arief Yahya, Menteri Perhubungan Budi Karya Sumadi, Menteri PUPR Basuki Hadimuljono, Kepala Staf Kepresidenan Moeldoko, Gubsu Edy Rahmayadi beserta ibu,  sangat terkesan dalam kunjungannya pada Caldera Sigapiton Kabupaten Tobasa, selasa (30/7/2019).\r\nPresiden beserta rombongan tiba di Kaldera pukul 12.10 WIB. Setibanya disana, Jokowi langsung duduk menikmati hamparan indahnya Danau Toba dan perbukitan. Mantan Wali Kota Solo ini duduk di kursi besi dilengkapi dengan mejanya.“Alhamdulillah Bapak Presiden dan Ibu Iriana sangat terkesan dalam kunjungannya di Caldera Nomadic Escape. Diluar dugaan hingga 1 jam Bapak Presiden beserta Rombongan berada di destinasi ini,” kata Direktur Utama BPODT Arie Prasetyo,”', 'Presiden Jokowi Kunjungi Caldera Sigapiton Tobasa'),
(11, '2023-06-16 04:15:05', 'WhatsApp Image 2023-06-16 at 10.56.13.jpeg', 'Status Danau Toba sebagai Destinasi Super Prioritas semakin dipertegas dengan hadirnya destinasi kelas dunia. Namanya The Caldera Toba Nomadic Escape. The Caldera merupakan amenitas wisata kembara (nomadic tourism) yang dikembangkan oleh Badan Pelaksana Otorita Danau Toba. Lokasinya ada di Lahan Zona Otorita Pariwisata Danau Toba, di Sibisa, Kecamatan Ajibata, Kabupaten Toba Samosir.\"Destinasi ini sangat lengkap. Fasilitas lain yang ada di The Caldera adalah Caldera Ampiteathre, dengan kapasitas 250 orang, Caldera Plaza, Caldera Stage, Caldera Hill, juga dua Toilet,\" katanya.\r\n\r\n\r\nPembangunan Toba Nomadic Escape di lahan zona otorita, telah dilakukan Badan Pelaksana Otorita Danau Toba (BPODT) sejak awal tahun 2019. Atau setelah proses penyerahan sertifikat hak pengelolaan (HPL) Tahap I seluas 279 Ha dari 386,72 Ha di Desa Pardamean Sibisa, Kecamatan Ajibata,  Kabupaten Toba Samosir. HPL  diserahkan pada Desember 2018 yang lalu. Nantinya, kawasan ini akan terintegrasi dengan Toba Caldera Reserve, Sibisa Airport dan Desa Wisata Sigapiton untuk pengembangan pariwisata berkelanjutan.', 'The Caldera-Toba Nomadic Escape, destinasi kelas dunia di Danau Toba'),
(12, '2023-06-16 04:14:06', 'WhatsApp Image 2023-06-16 at 10.57.05 (1).jpeg', 'Badan Pelaksana Otorita Danau Toba (BPODT) menggelar kegiatan Pengembangan Atraksi Seni Budaya di Caldera Toba Nomadic Escape. Acara yang dibuka oleh Menteri Pariwisata dan Ekonomi Kreatif, Sandiaga Salahuddin Uno, ini hadir sebagai upaya meningkatkan kreativitas dan inovasi pelaku ekonomi kreatif terhadap atraksi seni budaya. Saat membuka kegiatan tersebut, Sandiaga, mengaku bangga karena kawasan Danau Toba memiliki banyak warisan budaya seperti musik tradisional Batak. Ia juga menilai, banyak seniman Batak yang berhasil mengangkat musik tradisional Batak hingga ke tingkat nasional maupun internasional, termasuk trainer pada kegiatan ini seperti Martogi Sitohang dan Martahan Sitohang. Melalui kegiatan ini, Sandiaga berharap agar warisan budaya musik tradisional Batak dapat menjadi atraksi yang potensial dan dikenal masyarakat luas. Kegiatan ini diharapkan dapat meningkatkan kunjungan wisata ke The Caldera Nomadic Escape maupun Kawasan Danau Toba.', 'Atraksi Seni Budaya di Caldera Toba Nomadic Escape Bantu Tingkatkan Pariwisata Daerah'),
(13, '2023-06-16 04:14:26', 'WhatsApp Image 2023-06-16 at 10.57.05 (2).jpeg', 'Untuk menyambut penyelenggaraan event olahraga tingkat dunia itu, sejumlah titik sudah dipersiapkan untuk lokasi side event dalam rangkai meramaikan event internasional tersebut sekaligus upaya mencegah penumpukan di Balige. Dalam rangka mendukung pelaksanaan event F1 Power Boat di Danau Toba, Badan Pelaksana Otorita Danau Toba (BPODT) menyelenggarakan side event Caldera Sunset Party di area Toba Caldera Resort, Sibisa Danau Toba.\r\nSelain menggelar nonton bareng di Caldera Toba, BPODT juga menyiapkan berbagai atraksi pendukung di dalamnya serta akomodasi tambahan bertemakan alam dengan konsep camping. \"Kami menyiapkan layar proyektor dengan ukuran 3x5 meter bagi sekitar 2.000 penonton yang ingin menyaksikan F1PowerBoat tanpa harus berkunjung ke Balige\" ujar Jimmy.', 'BPODT Gelar Nonton Bareng F1H20 di Toba Caldera Resort'),
(14, '2023-06-16 04:14:35', 'WhatsApp Image 2023-06-16 at 10.57.08.jpeg', 'Kendati dikawasan The Kaldera Nomadic Escape Danau Toba, Deasa Pardamean Sibisa Kabupaten Toba Samosir, Provinsi Sumatera Utara itu masih tergolong area perawan dan mengandalkan keindahan pemandangan ke hamparan Danau Toba, namun sejumlah kelompok wisatawan kian hari tak terbendung singgahi kawasan puncak Sibisa tersebut dan kali ini adalah grup Suryanation Ridescape yang pertama kali diadakan dihutan pinus tersebut. Salah seorang peserta Jul Brama dengan modivikasi sepedamotornya menyampaikan, dirinya dan 50an timnya senang selama berasa dikawasan Kaldera Danau Toba, panitianyapun meramu acara sengan hiburan malam yang memukau, dengan desain panggung bertingkat-tingkat pula, Ujarnya.\r\n\r\nMenyambut ribuan pengunjung yang datang sejak Sabtu, dan kepada mereka (Suryanation Ridescape) disediakan tenda campig mini dan besar, dan semua tenda itu dipasang dengan baik, mereka menikmati hiburan malam dengan pemandangan Danau Toba, tiupan angin sepoi-sepoi, berhiaskan lampu hias diantara pepohonan pinus yang masih alamai.\r\nSelain itu mereka nyaman disana, dan diisi dengan beragam kegitan diantaranya Komunitas Games, Hiburan Tari Tradisional, Talkshow, pemberian sertipikat dan beragam hadiah yang telah disediakan panitianya.\r\n\r\n“Pada Intinya, tim kita menyambut mereka sebagai wisatawan dan menyampaikan kepada mereka untuk membantu promosikan Danau Toba kita serta mengajak team lainnya untuk singgah di Kaldera Toba, Puncak Sibisa ini”.\r\n\r\nDemikian disampaikan Direktur BPODT Arie Prasetyo didampingi Simon Sitorus dengan pesan lintas kegiatan Surya Nation Motor Land Rides ini kiranya kita semua mampu bersama menginspirasi dengan ide kreatif lainnya dikawasan The Kaldera Nomadic Escape Danau Toba, Desa Pardamean Sibisa,Kabupaten Tobasa ini. tandasnya.', 'Ribuan Pengunjung Gelar Acara Surya Nation Motor Land Ridescape ‘Ride To Inspire’ di Kaldera Toba Sibisa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
