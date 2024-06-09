-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 12:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magetiart-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `slug`, `link`, `image`, `created_at`) VALUES
(1, 'Nyaris Separonya Dibeli Pemkab Magetan Art Venue, 56 Lukisan Dipamerkan di Gedung Kesenian Tripandita', 'nyaris-separonya-dibeli-pemkab-magetan-art-venue-56-lukisan-dipamerkan-di-gedung-kesenian-tripandita', 'https://beritajatim.com/peristiwa/magetan-art-venue-56-lukisan-dipamerkan-di-gedung-kesenian-tripandita-nyaris-separonya-dibeli-pemkab/', '6552eceb6b7d3.jpg', '2023-11-14 03:43:39'),
(2, 'Pelaksanaan Magetan Art Venue di Hadiri oleh Siswa-siswi SMKN 1 Poncol', 'pelaksanaan-magetan-art-venue-di-hadiri-oleh-siswa-siswi-smkn-1-poncol', '', '6552f009101b4.jpg', '2023-11-14 03:58:54'),
(3, 'Komunitas Seni Magetan Akan Laksanakan Pameran Juni Mendatang', ' komunitas-seni-magetan-akan-laksanakan-pameran-juni-mendatang', '', '6552f018a1285.jpg', '2023-11-14 03:57:12'),
(6, 'Suramnya Vietnam: Suporternya Saling Pukul, Troussier Dilempari', 'suramnya-vietnam-suporternya-saling-pukul-troussier-dilempari', 'https://sport.detik.com/sepakbola/liga-indonesia/d-7264971/suramnya-vietnam-suporternya-saling-pukul-troussier-dilempari?mtype=mpt.ctr-boxccxmpcxmp-modelB', 'timnas-vietnam.jpeg', '2024-03-11 15:52:49'),
(7, 'Warga Sekitar Gudang Peluru TNI Minta Jihandak Sisir Ulang Permukiman', 'warga-sekitar-gudang-peluru-tni-minta-jihandak-sisir-ulang-permukiman', 'https://www.cnnindonesia.com/nasional/20240331221856-20-1081020/warga-sekitar-gudang-peluru-tni-minta-jihandak-sisir-ulang-permukiman', 'pascaledakan-gudang-amunisi-yon-armed-7105-gs-bantar-gebang_169.jpeg', '2024-03-31 16:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `dekorasi`
--

CREATE TABLE `dekorasi` (
  `id` int(11) NOT NULL,
  `type` varchar(64) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `slug` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dekorasi`
--

INSERT INTO `dekorasi` (`id`, `type`, `title`, `slug`, `description`, `image`, `updated_at`) VALUES
(1, 'karya', 'LAVA', 'lava', 'Lelehan batu pijar yang mengalir dari perut bumi pertiwi', '655b37140d7c8.jpg', '2024-03-18 14:50:18'),
(2, 'karya', 'BASUH SURYA NINGRAT WISUDA', 'basuh-surya-ningrat-wisuda', 'Sang Prabu telah menyelesaikan pekerjaanya', '655b382bc16de.png', '2024-03-16 08:50:42'),
(3, 'karya', 'TAWAKAL', 'tawakal', 'Ketika manusia lupa akan caranya berserah diri pada NYA', '655b38354e4ba.png', '2024-03-16 08:50:50'),
(4, 'kategori', 'Dekoratif', 'dekoratif', NULL, 'gaya-seni-1.jpg', '2023-11-14 09:08:35'),
(5, 'kategori', 'Abstrak', 'abstrak', NULL, 'gaya-seni-21.jpg', '2023-11-14 09:08:35'),
(6, 'kategori', 'Surrealis', 'surrealis', NULL, 'gaya-seni-3.jpg', '2023-11-14 09:17:08'),
(7, 'seniman', NULL, 'agus_wicaksono@gmail.com', NULL, NULL, '2024-03-15 22:45:39'),
(8, 'seniman', NULL, 'prast.hendra@gmail.com', NULL, NULL, '2024-03-15 22:45:44'),
(9, 'seniman', NULL, 'agus_suga@gmail.com', NULL, NULL, '2024-03-15 22:45:41'),
(10, 'berita', NULL, 'nyaris-separonya-dibeli-pemkab-magetan-art-venue-56-lukisan-dipamerkan-di-gedung-kesenian-tripandita', NULL, NULL, '2024-03-16 09:30:22'),
(11, 'berita', NULL, 'pelaksanaan-magetan-art-venue-di-hadiri-oleh-siswa-siswi-smkn-1-poncol', NULL, NULL, '2024-03-16 08:44:08'),
(12, 'berita', NULL, ' komunitas-seni-magetan-akan-laksanakan-pameran-juni-mendatang', NULL, NULL, '2024-03-16 08:44:10'),
(13, 'koleksi', 'Kotemporer', 'kotemporer', 'Koleksi karya seni untukmu yang lebih eksklusif', '6555ab32497bb.jpg', '2024-03-16 09:33:10'),
(14, 'koleksi', 'Fine Art', 'fine-art', 'Koleksi karya seni yang cocok untuk kamu pecinta seni', '6555aa071b837.jpg', '2023-11-16 05:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `karya`
--

CREATE TABLE `karya` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `seniman_id` int(11) NOT NULL,
  `year` varchar(64) NOT NULL,
  `material` varchar(64) NOT NULL,
  `width` varchar(64) NOT NULL,
  `height` varchar(64) NOT NULL,
  `price` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(560) NOT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karya`
--

INSERT INTO `karya` (`id`, `title`, `slug`, `seniman_id`, `year`, `material`, `width`, `height`, `price`, `quantity`, `description`, `image`, `created_at`) VALUES
(1, 'METAVOLUSI III PLACEMENT DISPLACEMENT', 'metavolusi-iii-placement-displacement', 2, '2022', 'Acrylic on canvas', '150', '100', 'IDR 10.000.000', 1, 'Di dunia Virtual makhluk bebas diwujudkan menjadi sosok dan karakter tertentu sesuai keinginan. Perubahan bukan hanya fisik, kepribadian dan peran pun dapat dicitraan sedemikian rupa melalui pemograman atau AI (artificial intelligent). Penciptaan brand image dan karakter yang dilakukan bisa saja mempengaruhi karakter asli si pencipta di dunia nyata sehingga terjadi saling tukar posisi,. Kerancuan reposisi ini perupa istilahkan sebagai “Placement-Displacement” .', '655438b915c34.png', '2023-11-08 04:32:09'),
(2, 'MYSTERIOUS RHYTHM', 'mysterious-rhythm', 1, '2023', 'Acrylic on canvas', '60', '80', 'IDR 5.000.000', 0, 'Every human being possesses something hidden within themselves, unseen to others. This intrigues me to \r\nuncover what lies beneath. Hence, this artwork serves as a representation of the elusive discovery I seek.', '655b39b41bbfa.jpg', '2023-11-05 03:02:12'),
(3, 'SURFER', 'surfer', 2, '2023', 'Acrylic on canvas', '60', '80', 'IDR 5.000.000', 1, 'When a child has entered metaverse, he would faced to a world that almost borderless, so he becomes a \r\nsurfer who must be ready to face waves and many of new worlds.', '6545bb567d42c.jpg', '2023-11-08 04:32:13'),
(4, 'TAN HANA DHARMA MANGRWA', 'tan-hana-dharma-mangrwa', 6, '2023', 'Mixed Media on Canvas', '60', '80', 'IDR 5.000.000', 1, 'Diversity in Indonesia comes from the Sutasoma Book written by Mpu Tantular which is symbolized by the \r\nStar above the Shield on the Garuda Pancasila State Emblem. Unity in Diversity Tan Hana Dharma Mangrwa: \r\nEven one difference, no dual devotion.', '655b3a8c0c83d.jpg', '2023-11-20 10:45:01'),
(5, 'EMBRIO', 'embrio', 7, '2023', 'Acrylic on canvas', '60', '80', 'IDR 5.000.000', 1, 'This painting tells the story of the birth of a new world, a world that will continue to develop, smart people \r\nand scientists will continue to seek highest knowledge to create new technologies.', '65531fb0c1a91.jpg', '2023-11-14 07:20:16'),
(6, ' THE GIFTS', 'the-gifts', 1, '2023', 'Acrylic on canvas', '80', '60', 'IDR 5.000.000', 1, 'Preservation of rare animals in Vietnam, and lotus flower. They ride a moon down to earth to Vietnam as a \r\ngift . It\'s a shame if extinction occurs, therefore don\'t let it happen.', '655b3b264f210.jpg', '2023-11-14 07:21:07'),
(7, 'BROKEN WINGS', 'broken-wings', 8, '2023', 'Acrylic on canvas', '80', '120', 'IDR 5.000.000', 1, 'A situation when we try to find our identity by interpreting fragments of many events on the past.', '655b3b997bba7.jpg', '2023-11-20 10:57:29'),
(8, 'A FRAGMENT OF THE PAST', 'a-fragment-of-the-past', 9, '2023', 'Acrylic on canvas', '60', '80', 'IDR 5.000.000', 1, 'A relic of the past about fragments of life depicted through the temple and the ruins of artifacts.', '655b3c0843cde.jpg', '2023-11-20 10:59:20'),
(9, 'SURVIVOR', 'survivor', 1, '2023', 'Acrylic on canvas', '80', '60', 'IDR 5.000.000', 1, 'As a result of the irresponsible actions carried out by poachers which are increasingly apprehensive, there is a longing for the lives of animals or biodiversity to be able to survive naturally and freely carry out their lives. They all called as Survivor.', '655b3e710a758.png', '2024-03-11 08:36:47'),
(10, 'CAPITALSM', 'capitalsm', 1, '2023', 'Acrylic on canvas', '60', '80', 'IDR 2.500.000', 1, 'Lukisan Kapitalis', '656706b8cf967.jpg', '2024-03-11 08:36:43'),
(12, 'One Punch Man II', 'one-punch-man-ii', 15, '2024', 'Paper', '5', '10', 'IDR 15.000', 1, 'Komik One Punch Man', '(_Rich_Dad,_Poor_Dad_).jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `parent_id`, `title`, `slug`, `created_at`) VALUES
(1, NULL, 'Kategori 1', 'kategori-1', '2024-03-12 15:14:20'),
(2, NULL, 'Kategori 2', 'kategori-2', '2023-11-07 10:00:12'),
(3, 1, 'Kotemporer', 'kotemporer', '2023-11-08 09:18:12'),
(4, 2, 'Abstrak', 'abstrak', '2023-11-07 05:22:30'),
(5, 1, 'Fine Art', 'fine-art', '2024-03-15 06:06:32'),
(6, 2, 'Surrealis', 'surrealis', '2023-11-07 07:23:13'),
(7, 2, 'Dekoratif', 'dekoratif', '2023-11-07 07:24:09'),
(8, 2, 'Ilustrasi', 'ilustrasi', '2023-11-07 07:25:25'),
(21, 1, 'Klasik', 'klasik', '2023-11-29 10:32:19'),
(22, NULL, 'Kategori 3', 'kategori-3', '2024-03-13 17:11:03'),
(23, NULL, 'Lukisan', 'lukisan', '2024-03-13 17:11:12'),
(24, 23, 'Van Gogh', 'van-gogh', '2024-03-13 17:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_karya`
--

CREATE TABLE `kategori_karya` (
  `id` int(11) NOT NULL,
  `karya_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_karya`
--

INSERT INTO `kategori_karya` (`id`, `karya_id`, `kategori_id`, `created_at`) VALUES
(12, 4, 3, '2024-03-12 17:14:33'),
(30, 8, 5, '2024-03-13 10:01:31'),
(31, 9, 5, '2024-03-15 06:03:34'),
(32, 10, 5, '2024-03-15 06:03:37'),
(33, 3, 3, '2024-03-18 13:28:49'),
(34, 6, 3, '2024-03-18 13:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `seniman`
--

CREATE TABLE `seniman` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `place` varchar(64) NOT NULL,
  `profile` varchar(480) NOT NULL,
  `image` varchar(64) NOT NULL,
  `ig` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fb` varchar(64) NOT NULL,
  `cover` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seniman`
--

INSERT INTO `seniman` (`id`, `name`, `place`, `profile`, `image`, `ig`, `email`, `fb`, `cover`, `created_at`) VALUES
(1, 'Agus Wicaksono', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', '655b3d3834562.png', 'agus.wicaksono', 'agus_wicaksono@gmail.com', 'Agus Wicaksono', '655490033306a.jpg', '2023-11-05 03:01:55'),
(2, 'Hendra Prast', 'Magetan, Jawa Timur', 'merupakan seorang arsitek sekaligus seniman yang aktif dalam kegiatan melukis sejak muda. Sampai saat ini Hendra Prast masih aktif melukis dan saat ini menjabat sebagai ketua komunitas perupa yang ada di Magetan yaitu Komunitas MagetiArt.', '65548d99077b8.png', 'prasshendra', 'prast.hendra@gmail.com', 'Hendra Prast', '65548ced8aaa0.jpg', '2023-11-05 03:02:00'),
(3, 'Agus Suga', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', '65548e6276cdf.jpg', 'agus.suga', 'agus_suga@gmail.com', 'Agus Suga', '65548da3769fe.jpg', '2023-11-05 03:02:06'),
(4, 'Doni Riant', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', '65548fd60e1c5.jpg', 'doni.riant', 'doni_riant@gmail.com', 'Doni Riant', '65548fdf7fc87.jpg', '2023-11-02 03:38:33'),
(5, 'Abd Mukti', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', 'default.jpg', 'abd_mukti', 'abd_mukti@email.com', 'Abd Mukti', 'default.jpg', '2023-11-20 10:50:28'),
(6, 'Agung WHS', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', 'default.jpg', 'agung.whs', 'agung_whs@email.com', 'Agung WHS', 'default.jpg', '2023-11-20 10:51:17'),
(7, 'Agus Sapudin', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', 'default.jpg', 'agus.sapudin', 'agus_sapudin@email.com', 'Agus Sapudin', 'default.jpg', '2023-11-20 10:53:48'),
(8, 'Mahendra Yudha', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', 'default.jpg', 'mahendra.yudha', 'mahendra_yudhi@email.com', 'Mahendra Yudha', 'default.jpg', '2024-03-18 14:39:58'),
(9, 'Romdon Hamdani', 'Magetan, Jawa Timur', 'Seniman asal Magetan, Jawa Timur', 'default.jpg', 'romdon.hamdani', 'romdon_hamdani@email.com', 'Romdon Hamdani', 'default.jpg', '2023-11-20 10:58:39'),
(10, 'Budi Budiman', 'Magetan, Jawa Timur', 'Seniman Magetan', '65670818154ec.jpg', 'budi.budiman', 'budi_budiman@gmail.com', 'Budi Budiman', '65670818156ad.jpg', '2023-11-29 09:44:56'),
(14, 'James Owen', 'Magetan, Jawa Timur', 'Dari sentuhan kuasnya yang magis, seniman karya lukis asal Magetan mempersembahkan keindahan alam dan kehidupan sehari-hari dalam warna-warna yang memukau. Dengan bakatnya yang luar biasa, ia menggambarkan keajaiban alam dan cerita manusia melalui kanvas, memperkaya dunia seni dengan karya yang memukau dan menginspirasi.', '1675276382016.jpeg', 'james.owen', 'james.owen@gmail.com', 'James Owen', 'analytics-4425550.jpg', '2024-03-06 17:36:56'),
(15, 'Abdul Mukti', 'Magetan, Jawa Timur', 'Dari sentuhan kuasnya yang magis, seniman karya lukis asal Magetan mempersembahkan keindahan alam dan kehidupan sehari-hari dalam warna-warna yang memukau. Dengan bakatnya yang luar biasa, ia menggambarkan keajaiban alam dan cerita manusia melalui kanvas, memperkaya dunia seni dengan karya yang memukau dan menginspirasi.', '16752763820161.jpeg', 'abdul.mukti', 'abd.mukti@gmail.com', 'ABD Mukti', 'featured-image-pack-clothes_jpeg.jpg', '2024-03-06 17:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `title`, `url`, `created_at`) VALUES
(1, 'Seniman', 'Seniman', '2024-03-18 15:15:39'),
(2, 'Karya', 'Karya', '2024-03-18 15:15:42'),
(5, 'Berita', 'Berita', '2024-03-18 15:15:58'),
(6, 'Kategori', 'Kategori', '2024-03-18 15:15:56'),
(7, 'Home', 'Dekorasi', '2024-03-18 15:15:54'),
(8, 'Akun', 'User/account', '2024-03-18 15:15:51'),
(9, 'Role', 'Role', '2024-03-19 19:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `adress` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `image`, `phone`, `adress`, `role_id`, `created_at`) VALUES
(1, 'Administrator', 'admin', 'admin@email.com', '$2y$10$hP21ARejpeVGFkDfLGRvIernVsST1qDX.BeuFWL3bOJ.itTjTgxba', '655b01e95d856.jpg', '085748020293', 'Jl Jend Sudirman Kav 10-11 Midplaza 2, Dki Jakarta', 1, '2023-11-19 02:08:27'),
(2, 'User', 'user1234', 'user@email.com', '$2y$10$tpbEHm3YUqx7WM6Vk4umCu.Ue8Iccmc8Y6YO5/otsty8tDhEdgWtm', '6df7a75f9739c536989bcd200ac082e6.jpg', '081384961867', 'Jl Stasiun Indo Plaza, Jawa Timur', 2, '2023-11-20 05:29:14'),
(3, 'Tester Hanifa', 'tester', 'tester@email.com', '$2y$10$bNBmhwzMSCveCOOmaF.fpeS5nfnDzAWyPq4LSa0ZdoSLsrqYI0cr2', '052.png', '085853316491', 'Jl Rungkut Kidul IV A/32, Jawa Timur', 2, '2024-03-04 12:22:58'),
(4, 'James Owen Owl', 'jamesowen', 'james.owen@gmail.com', '$2y$10$B1eshaRh6T5oQbeqm18V4ObX1GAHREcKMRiSc/mapT0wbn9IMFzTK', 'download.png', '081384954138', 'JL. Tebaununggu No.7, Kendari', 3, '2024-03-04 14:04:53'),
(6, 'Abdul Mukti', 'abdulmukti', 'abd.mukti@gmail.com', '$2y$10$a9Nvgo9oghKDSqvKDa9/6.Pnb9fKeIYBuu0QZcKuKBDUpL.Kyec9i', '1675276382016.jpeg', '065156148547', 'Gg Minyak 36, Dki Jakarta', 3, '2024-03-15 19:55:30'),
(10, 'Rizky Billar', 'rizkybillar', 'rizky.billar@email.com', '$2y$10$S9xJa7A1VMBhKMYizEp0nujMK0C4ceoKeMSsuF9/Cf5bzNr4Clxje', '5def0cbccde81.jpg', '081312194751', 'Jl HR Rasuna Said Setiabudi Bldg I, Dki Jakarta', 3, '2024-03-11 07:59:52'),
(11, 'Faris Wijaya', 'fariswijaya', 'faris.wijaya@email.com', '$2y$10$H7kyuSDZYaWMnPT4uvRRregN3TeZvj7PHbtVRQWPT6iFVU3fpND5u', 'default.jpg', '62838555904', 'Jl Jend Basuki Rachmad 2-12 Plaza Tunjungan I Street 22 Lt 2, Jawa Timur', 3, '2024-03-17 17:48:59'),
(12, 'Choki Choki', 'chokicoklatasli', 'ccheegie@gmail.com', '$2y$10$RgScPiyCBt820snvBLAL2eeguIV.7wTcvnFm.6O05WZz/vg6kAVgG', 'default.jpg', '62838555746', 'Jl Cipaku II 16, Dki Jakarta', 1, '2024-03-18 09:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_submenu`
--

CREATE TABLE `user_access_submenu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_submenu`
--

INSERT INTO `user_access_submenu` (`id`, `role_id`, `submenu_id`) VALUES
(5, 1, 5),
(7, 1, 7),
(8, 1, 8),
(10, 1, 6),
(11, 1, 1),
(12, 1, 2),
(13, 2, 1),
(14, 1, 9),
(15, 2, 2),
(16, 2, 5),
(17, 2, 6),
(18, 2, 7),
(20, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `title`, `slug`, `created_at`) VALUES
(1, 'Administrator', 'administrator', '2024-03-18 15:15:26'),
(2, 'User', 'user', '2024-03-18 15:15:29'),
(3, 'Guest', 'guest', '2024-03-18 15:15:32'),
(4, 'User luar', 'user-luar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'ccheegie@gmail.com', 'MRUZm0wFPjUHsdNfaHOz3UbDzOhRZFG47pVVWpPnr8M=', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dekorasi`
--
ALTER TABLE `dekorasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karya`
--
ALTER TABLE `karya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_karya`
--
ALTER TABLE `kategori_karya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniman`
--
ALTER TABLE `seniman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dekorasi`
--
ALTER TABLE `dekorasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `karya`
--
ALTER TABLE `karya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori_karya`
--
ALTER TABLE `kategori_karya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `seniman`
--
ALTER TABLE `seniman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_submenu`
--
ALTER TABLE `user_access_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
