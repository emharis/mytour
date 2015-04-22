-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4941
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for web_mytour
DROP DATABASE IF EXISTS `web_mytour`;
CREATE DATABASE IF NOT EXISTS `web_mytour` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `web_mytour`;


-- Dumping structure for table web_mytour.aboutpage
DROP TABLE IF EXISTS `aboutpage`;
CREATE TABLE IF NOT EXISTS `aboutpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `big_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.aboutpage: ~1 rows (approximately)
/*!40000 ALTER TABLE `aboutpage` DISABLE KEYS */;
INSERT INTO `aboutpage` (`id`, `name`, `value`, `big_value`) VALUES
	(1, 'content', '', '<p class="lead">When you need all the room you can get. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie.</p>\r\n<!-- Carousel\r\n        ================================================== -->\r\n<div class="row">\r\n<div class="span6">\r\n<div class="flexslider"><img src="backend/plugins/fileman/Uploads/Images/setting/new_logo.png" alt="" width="383" height="154" /></div>\r\n</div>\r\n<div class="span6">\r\n<h5>Lorem ipsum dolor sit amet</h5>\r\n<p>Vivamus augue nulla, vestibulum ac ultrices posuere, vehicula ac arcu. Quisque nisi lacus, bibendum quis commodo eget, lobortis eget elit. Cras venenatis mauris eu tortor consequat a convallis nulla molestie. Phasellus malesuada malesuada velit et fermentum. Proin ut leo nec mauris pulvinar volutpat. Sed ac neque nec leo condimentum rhoncus. Nunc dapibus odio et lacus elementum congue. Praesent nulla arcu, condimentum eu lobortis sit amet, pretium vitae metus.</p>\r\n<blockquote>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Praesent nulla arcu, condimentum eu lobortis.</p>\r\n<small>Someone famous <cite title="Source Title">Source Title</cite></small></blockquote>\r\n</div>\r\n</div>');
/*!40000 ALTER TABLE `aboutpage` ENABLE KEYS */;


-- Dumping structure for table web_mytour.banner
DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.banner: ~0 rows (approximately)
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


-- Dumping structure for table web_mytour.blog
DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `tags` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `img_cover` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '570*222',
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.blog: ~0 rows (approximately)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;


-- Dumping structure for table web_mytour.blog_category
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.blog_category: ~4 rows (approximately)
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` (`id`, `name`) VALUES
	(22, 'Ocean Trip'),
	(23, 'Cullinary Trip'),
	(24, 'Backpacker'),
	(25, 'Off Road');
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;


-- Dumping structure for table web_mytour.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comments_blog` (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table web_mytour.constval
DROP TABLE IF EXISTS `constval`;
CREATE TABLE IF NOT EXISTS `constval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.constval: ~31 rows (approximately)
/*!40000 ALTER TABLE `constval` DISABLE KEYS */;
INSERT INTO `constval` (`id`, `name`, `value`, `desc`) VALUES
	(1, 'tab_title', 'telusurindonesia.com', NULL),
	(2, 'web_title', 'telusurindonesia.com', NULL),
	(3, 'phone', '+62813-5735-9019', NULL),
	(4, 'email', 'info@telusurindonesia.com', NULL),
	(5, 'address', 'Ngaban RT 5 RW 2 No. 15 Tanggulangin, Sidoarjo, Jawa Timur, Indonesia', NULL),
	(6, 'ym', 'yahuuy', NULL),
	(7, 'ym_show', 'Y', NULL),
	(8, 'show_customer_support', 'Y', NULL),
	(9, 'travelpack_img_path', 'images/travelpack/', NULL),
	(10, 'default_currency', 'IDR', 'IDR atau USD'),
	(11, 'to_USD', '0.0000764658', NULL),
	(12, 'to_IDR', '13077.75', NULL),
	(13, 'hotel_img_path', 'images/hotel/', NULL),
	(14, 'rental_img_path', 'images/rental/', NULL),
	(15, 'jml_blog_rotator', '5', NULL),
	(16, 'img_blog_path', 'images/blogs/', NULL),
	(17, 'banner_img_path', 'images/banner/', NULL),
	(18, 'fb', 'eries.eris', NULL),
	(19, 'img_slider_path', 'images/sliders/', NULL),
	(20, 'fb_show', 'Y', NULL),
	(21, 'twitter', NULL, NULL),
	(22, 'twitter_show', 'Y', NULL),
	(23, 'main_logo', 'new_logo.png', NULL),
	(24, 'footer_logo', 'footer_logo.png', NULL),
	(25, 'img_gallery_path', 'gallery/images/', NULL),
	(26, 'video_gallery_path', 'gallery/videos/', NULL),
	(27, 'show_search_input', 'Y', NULL),
	(28, 'show_side_banner', 'Y', NULL),
	(29, 'side_banner_title', 'EASY PAYMENT', NULL),
	(30, 'show_main_banner', 'Y', NULL),
	(31, 'hotel_room_img_path', 'images/hotel/room/', NULL);
/*!40000 ALTER TABLE `constval` ENABLE KEYS */;


-- Dumping structure for table web_mytour.contactpage
DROP TABLE IF EXISTS `contactpage`;
CREATE TABLE IF NOT EXISTS `contactpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.contactpage: ~5 rows (approximately)
/*!40000 ALTER TABLE `contactpage` DISABLE KEYS */;
INSERT INTO `contactpage` (`id`, `name`, `value`, `big_value`) VALUES
	(1, 'contact_text', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna.</p>'),
	(2, 'show_location', 'Y', NULL),
	(3, 'show_map', 'Y', NULL),
	(4, 'success_message', 'Well done! You successfully read this important alert message.', NULL),
	(5, 'error_message', '', NULL);
/*!40000 ALTER TABLE `contactpage` ENABLE KEYS */;


-- Dumping structure for table web_mytour.gallery
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `type` enum('I','V') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'I:Image, V:Video',
  `isexternal` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.gallery: ~9 rows (approximately)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `created_at`, `type`, `isexternal`, `title`, `filename`) VALUES
	(6, '2015-04-13 13:31:18', 'V', NULL, 'Bali Travel Guide', 'yJyz8v3q25M'),
	(7, '2015-04-13 13:32:17', 'V', NULL, 'Lombok Indonesia Travel Guide', 'd6dW6TuQw-g'),
	(11, '2015-04-13 14:12:36', 'I', 'N', 'Bedugul', 'img_gallery_wallpaper_bedugul.jpg'),
	(12, '2015-04-13 14:13:07', 'I', 'N', 'Tanah Lot', 'img_gallery_Keindahan-Pura-Tanah-Lot.jpg'),
	(13, '2015-04-13 14:13:52', 'V', NULL, 'Jakarta Tour Guide', 'IGRQ18bP41g'),
	(14, '2015-04-13 14:18:35', 'I', 'N', 'Teluk Ijo', 'img_gallery_ijo_3.jpg'),
	(15, '2015-04-13 14:26:20', 'I', 'N', 'arung jeram', 'img_gallery_arung_jeram_coy.jpg'),
	(16, '2015-04-13 14:27:48', 'I', 'N', 'Ubud', 'img_gallery_Awesome-Maya-Ubud-River-View-with-Fresh-Water.jpg'),
	(17, '2015-04-13 14:28:21', 'I', 'N', 'Bunaken', 'img_gallery_Bunaken_National_Park.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Dumping structure for table web_mytour.homepage
DROP TABLE IF EXISTS `homepage`;
CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `big_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage: ~21 rows (approximately)
/*!40000 ALTER TABLE `homepage` DISABLE KEYS */;
INSERT INTO `homepage` (`id`, `name`, `value`, `big_value`) VALUES
	(1, 'welcome_title', '', 'Welcome to telusurindonesia.com<br />\n            the best travel guide in Indonesia'),
	(2, 'welcome_subtitle', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pretium vulputate magna sit amet blandit.'),
	(3, 'show_fav_dest', 'Y', ''),
	(4, 'show_hotel', 'Y', ''),
	(5, 'show_car', 'Y', ''),
	(6, 'show_slider', 'Y', ''),
	(7, 'show_sidenav', 'Y', ''),
	(8, 'sidenav_find_destination', 'Find a destination', ''),
	(9, 'sidenav_find_destination_subtitle', 'Know where you\'re heading? Find out more and get into the detail.', ''),
	(10, 'sidenav_read_news', 'Read News', ''),
	(11, 'sidenav_read_news_subtitle', 'Browse the latest articles and dispatches from our writers across the globe.', ''),
	(12, 'sidenav_buy_travel', 'Buy travel guides', ''),
	(13, 'sidenav_buy_travel_subtitle', 'Browse our store for the latest Rough Guides travel guides', ''),
	(14, 'sidenav_wts', 'What they say', ''),
	(15, 'sidenav_wts_subtitle', 'Get testimonials from our latest customers', ''),
	(16, 'show_blog_slider', 'Y', ''),
	(17, 'blog_slider_count', '5', ''),
	(18, 'show_testimony', 'Y', ''),
	(19, 'testimony_count', '7', ''),
	(20, '', '', ''),
	(21, '', '', '');
/*!40000 ALTER TABLE `homepage` ENABLE KEYS */;


-- Dumping structure for table web_mytour.homepage_hotel
DROP TABLE IF EXISTS `homepage_hotel`;
CREATE TABLE IF NOT EXISTS `homepage_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage_hotel: ~4 rows (approximately)
/*!40000 ALTER TABLE `homepage_hotel` DISABLE KEYS */;
INSERT INTO `homepage_hotel` (`id`, `hotel_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4);
/*!40000 ALTER TABLE `homepage_hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.homepage_rental
DROP TABLE IF EXISTS `homepage_rental`;
CREATE TABLE IF NOT EXISTS `homepage_rental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage_rental: ~1 rows (approximately)
/*!40000 ALTER TABLE `homepage_rental` DISABLE KEYS */;
INSERT INTO `homepage_rental` (`id`, `rental_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `homepage_rental` ENABLE KEYS */;


-- Dumping structure for table web_mytour.homepage_slider
DROP TABLE IF EXISTS `homepage_slider`;
CREATE TABLE IF NOT EXISTS `homepage_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage_slider: ~2 rows (approximately)
/*!40000 ALTER TABLE `homepage_slider` DISABLE KEYS */;
INSERT INTO `homepage_slider` (`id`, `filename`) VALUES
	(1, 'img_slider_0_2336220351_825a1b92d3_b.jpg'),
	(2, 'img_slider_1_bromo-1903201011.jpg');
/*!40000 ALTER TABLE `homepage_slider` ENABLE KEYS */;


-- Dumping structure for table web_mytour.homepage_travelpack
DROP TABLE IF EXISTS `homepage_travelpack`;
CREATE TABLE IF NOT EXISTS `homepage_travelpack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage_travelpack: ~4 rows (approximately)
/*!40000 ALTER TABLE `homepage_travelpack` DISABLE KEYS */;
INSERT INTO `homepage_travelpack` (`id`, `travelpack_id`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4);
/*!40000 ALTER TABLE `homepage_travelpack` ENABLE KEYS */;


-- Dumping structure for table web_mytour.hotel
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img_cover` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `desc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel: ~3 rows (approximately)
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` (`id`, `nama`, `img_cover`, `alamat`, `desc`) VALUES
	(3, 'Coco de Heaven', 'img_hotel_cocodeheaven.jpg', 'Jl. Bypass Ngurah Rai no. 17X, Tuban, Indonesia, 80361', ''),
	(4, 'Amaris Hotel Legian', 'img_hotel_amaris.jpg', 'Jalan Padma Utara - Legian, Legian, Indonesia', ''),
	(6, 'Next Tuban Hotel', 'img_hotel_tubanhotel.jpg', 'Jalan Puri Gerenceng (Ayu Nadi) no 9x, Tuban, Indonesia, 80361', ''),
	(7, 'Home@36 Condotel', 'img_hotel_condotel.jpg', 'Jalan Kartika Plaza, Kuta, Indonesia, 80361', '<h2 style="margin-top: 0px; color: #434343; margin-bottom: 10px; font-weight: 400; padding: 0px; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif;">Deskripsi hotel</h2>\r\n<div class="hotelDetailContent" style="margin-bottom: 15px; font-size: medium; line-height: 26px; color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif;">Biaya penambahan orang dalam kamar mungkin berlaku dan berbeda-beda menurut kebijakan hotel.&nbsp;<br />Sewaktu check-in diperlukan tanda pengenal dengan foto yang resmi dikeluarkan oleh pemerintah dan kartu kredit atau deposit tunai untuk menutup biaya tak terduga.&nbsp;<br />Pemenuhan permintaan khusus bergantung pada ketersediaan sewaktu check-in dan mungkin menimbulkan biaya tambahan. Permintaan khusus tidak dijamin akan terpenuhi.&nbsp;</div>'),
	(8, 'Sandat Bali Legian', 'img_hotel_sandat.jpg', 'Jl. Legian no 120, Kuta, Indonesia, 80361', '<div id="hotelDataInfo" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: medium;">\r\n<h2 style="margin-top: 0px; margin-bottom: 10px; font-weight: 400; padding: 0px;">Deskripsi hotel</h2>\r\n<div class="hotelDetailContent" style="margin-bottom: 15px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Lokasi<br /></span>Sandat Bali Legian terletak di kawasan Legian yang hidup dan dikelilingi bermacam jenis toko, restoran dan bar. Dari Pantai Kuta, hotel ini berjarak sekitar 10 menit berjalan kaki. Dari Discovery Shopping Mall, jarak ke hotel kurang dari 10 menit berkendara. Untuk mengunjungi Waterbom Bali dari hotel, dibutuhkan waktu kurang dari 10 menit berkendara.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Dari Monumen Bom Bali, hotel bergaya eksotis ini berjarak sekitar 5 menit berkendara. Beberapa objek wisata sejarah populer seperti Pura Tanah Lot dan Pura Luhur Uluwatu berjarak sekitar 35 menit berkendara dari hotel.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Jarak antara Sandat Bali Legian dan Bandara Internasional Ngurah Rai kurang dari 15 menit berkendara.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Kamar<br /></span>Sandat Bali Legian memiliki tiga jenis kamar: Deluxe, Superior dan Standard. Kamar-kamar di hotel ini adalah kamar bebas asap rokok.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Dengan desain elegan, suasana kamar di Sandat Bali Legian memadukan antara konsep modern dan tradisional serta menawarkan warna cerah (tergantung tipe kamar). Fasilitas kamar mencakup kipas angin/AC (tergantung tipe kamar), TV kabel LCD serta balkon dan meja tulis.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Kamar mandi dilengkapi shower dan perlengkapan mandi.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Fasilitas umum<br /></span>Selain tersedia WiFi gratis di seluruh area hotel, Sandat Bali Legian dilengkapi kolam renang outdoor, resepsionis 24 jam, layanan antar-jemput bandara (biaya tambahan), brankas serta penitipan bagasi.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Hotel ini juga menyediakan layanan tur dan penukaran valuta asing.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Tempat makan<br /></span>Sarapan gratis tergantung tipe kamar, mohon cek ketentuan tiap kamar.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Sandat Bali Legian dilengkapi sebuah restoran outdoor.</p>\r\n</div>\r\n</div>\r\n<div id="hotelPolicyInfo" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: medium;">\r\n<h2 style="margin-top: 0px; margin-bottom: 10px; font-weight: 400; padding: 0px;">Kebijakan hotel</h2>\r\n<div class="generalPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Saat tiba di hotel<br /></span>Anda harus menunjukkan kartu identitas berfoto sewaktu check-in. Kartu kredit atau deposit tunai bisa jadi diperlukan pada saat check-in untuk menutup biaya tak terduga. Jenis ranjang dan pilihan kamar smoking/non-smoking tidak dapat dijamin ketersediaannya.</p>\r\n</div>\r\n<p style="margin-top: 0px; padding: 0px;"><strong>Umum</strong></p>\r\n<div class="checkInPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">Waktu check-in: dari jam 14:00, check-out: sampai jam 12:00</div>\r\n<div class="checkInPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;">Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.</p>\r\n</div>\r\n<p style="margin-top: 0px; padding: 0px;"><strong>Detail Tambahan</strong></p>\r\n<div class="otherPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Permintaan Khusus<br /></span>Pemenuhan permintaan khusus bergantung pada ketersediaan sewaktu check-in dan mungkin menimbulkan biaya tambahan. Permintaan khusus tidak dijamin akan terpenuhi.</p>\r\n<p style="margin-top: 0px; padding: 0px;">Untuk tempat tidur tambahan, dikenakan biaya tambahan. Jumlah tempat tidur yang dapat ditambah maksimal satu.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Anak-anak<br /></span>Satu anak berusia 2 tahun atau lebih muda diizinkan menginap gratis jika tinggal di kamar orang tua atau walinya, dengan menggunakan tempat tidur yang ada (ranjang bayi kemungkinan dikenakan biaya ekstra, mohon cek kebijakan hotel).</p>\r\n<p style="margin-top: 0px; padding: 0px;">Satu anak berusia 3 - 10 tahun diizinkan menginap gratis jika tinggal di kamar orang tua atau walinya. Untuk beberapa kamar, diperlukan tempat tidur tambahan (mohon cek ketentuan tiap kamar).</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Hewan peliharaan<br /></span>Hewan peliharaan, termasuk hewan pemandu tidak diizinkan.</p>\r\n</div>\r\n</div>'),
	(9, 'Kuta Central Park Hotel', 'img_hotel_kuta_central.jpg', 'Jl. Patih Jelantik, , Kuta, Indonesia, 80361', '<h3>Fasilitas Hotel</h3>\r\n<ol>\r\n<li>Layanan kamar</li>\r\n<li>Area parkir</li>\r\n<li>Brankas</li>\r\n<li>WiFi di area umum</li>\r\n<li>Restoran</li>\r\n<li>Lift</li>\r\n<li>Toilet bagi penyandang disabilitas</li>\r\n<li>Aksesibel bagi penyandang disabilitas</li>\r\n<li>Fasilitas bisnis</li>\r\n<li>Fasilitas rapat</li>\r\n<li>Ruang rapat</li>\r\n<li>Proyektor</li>\r\n<li>Teater/auditorium</li>\r\n<li>Internet Kamar berbiaya</li>\r\n<li>Fasilitas komputer/Internet</li>\r\n<li>Ruang keluarga</li>\r\n<li>Area merokok</li>\r\n<li>AC</li>\r\n<li>Area bebas asap rokok</li>\r\n<li>Banquet</li>\r\n<li>Bar</li>\r\n<li>Bar di kolam renang</li>\r\n<li>Makanan ringan</li>\r\n<li>Sarapan</li>\r\n<li>Sarapan berbiaya</li>\r\n<li>Kafe</li>\r\n<li>Makanan ringan</li>\r\n<li>Sarapan makanan hangat</li>\r\n<li>Sarapan prasmanan</li>\r\n<li>Meja</li>\r\n<li>Pengering rambut</li>\r\n<li>Brankas kamar</li>\r\n<li>Pancuran</li>\r\n<li>TV kabel</li>\r\n<li>Toko</li>\r\n<li>ATM/Bank</li>\r\n<li>Salon kecantikan</li>\r\n<li>Toserba</li>\r\n<li>Toserba</li>\r\n<li>Laundry Swadaya</li>\r\n<li>Salon kecantikan</li>\r\n<li>Concierge/layanan tamu</li>\r\n<li>Laundry</li>\r\n<li>Jasa tur</li>\r\n<li>Resepsionis 24 jam</li>\r\n<li>Penitipan bagasi</li>\r\n<li>Layanan kamar waktu terbatas</li>\r\n<li>Surat kabar di lobby</li>\r\n<li>Fasilitas nikah</li>\r\n<li>Minuman sambutan</li>\r\n<li>Valas</li>\r\n<li>Layanan medis</li>\r\n<li>Keamanan 24 jam</li>\r\n<li>Porter</li>\r\n<li>Surat kabar</li>\r\n<li>Bilyar</li>\r\n<li>Pusat kebugaran</li>\r\n<li>Layanan pijat</li>\r\n<li>Spa</li>\r\n<li>Kolam renang outdoor</li>\r\n<li>Sauna</li>\r\n<li>Kolam renang anak</li>\r\n<li>Barbecue</li>\r\n<li>Kursi berjemur tepi kolam</li>\r\n<li>Bar tepi kolam</li>\r\n<li>Ruang TV</li>\r\n<li>Area main anak</li>\r\n<li>Antar-jemput bandara berbiaya</li>\r\n<li>Transportasi ke pusat perbelanjaan</li>\r\n<li>Transportasi ke pantai</li>\r\n<li>Transportasi di area hotel</li>\r\n<li>Penyewaan sepeda</li>\r\n<li>Sewa mobil</li>\r\n<li>Parkir berjaga</li>\r\n<li>Penitipan anak berbiaya</li>\r\n<li>Kursi tinggi untuk bayi</li>\r\n</ol>'),
	(12, 'CT1 Bali Bed & Breakfast ', 'img_hotel_ct1_bali.jpg', 'Jalan Raya Tuban 62, Tuban, Indonesia, 80361', '<h2 style="margin-top: 0px; color: #434343; margin-bottom: 10px; font-weight: 400; padding: 0px; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif;">Fasilitas hotel</h2>\r\n<div class="clearfix hotelFacilityContent" style="margin-bottom: 15px; color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: medium;">\r\n<div class="facilityContentLeft" style="width: 300px; float: left;">\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">WiFi di area umum</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Area parkir</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Jasa tur</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Layanan kamar 24 jam</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Antar-jemput bandara</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">ATM/Bank</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Ruang keluarga</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Laundry</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Fasilitas rapat</div>\r\n</div>\r\n</div>\r\n<div class="facilityContentRight" style="width: 300px; float: right;">\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Layanan kamar</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Ruang TV</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Toko</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Transportasi di area hotel</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Area merokok</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-bb67646053318e2cf23e99d19d782740.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Taman</div>\r\n</div>\r\n</div>\r\n</div>');
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.hotel_image
DROP TABLE IF EXISTS `hotel_image`;
CREATE TABLE IF NOT EXISTS `hotel_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_room_id` int(11) DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel_image: ~0 rows (approximately)
/*!40000 ALTER TABLE `hotel_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel_image` ENABLE KEYS */;


-- Dumping structure for table web_mytour.hotel_room
DROP TABLE IF EXISTS `hotel_room`;
CREATE TABLE IF NOT EXISTS `hotel_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `harga` decimal(10,2) DEFAULT NULL,
  `currency` enum('IDR','USD') COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `img_cover` varchar(250) COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel_room: ~0 rows (approximately)
/*!40000 ALTER TABLE `hotel_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel_room` ENABLE KEYS */;


-- Dumping structure for table web_mytour.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `tipe_id` int(11) DEFAULT NULL,
  `position` enum('T','B','A') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'T;Top, B:Bottom,A:All',
  `order` int(11) DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `link` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_menu_tipe_menu` (`tipe_id`),
  CONSTRAINT `FK_menu_tipe_menu` FOREIGN KEY (`tipe_id`) REFERENCES `tipe_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `nama`, `parent_id`, `tipe_id`, `position`, `order`, `publish`, `link`) VALUES
	(1, 'Home', 0, 2, 'A', 1, 'Y', 'front/home'),
	(2, 'About Us', 0, 3, 'A', 2, 'Y', 'front/about'),
	(4, 'Gallery', 0, 1, 'T', 4, 'Y', ''),
	(5, 'Foto', 4, 10, 'T', NULL, 'Y', 'front/foto'),
	(6, 'Video', 4, 10, 'T', NULL, 'Y', 'front/video'),
	(7, 'Travel Pack', 0, 6, 'T', 5, 'Y', 'front/book'),
	(8, 'Contact', 0, 9, 'A', 6, 'Y', 'front/contact'),
	(9, 'Travel Info', 0, 5, 'T', 3, 'Y', 'front/travinfo');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table web_mytour.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2013_03_17_131246_verify_init', 1),
	('2013_05_11_082613_use_soft_delete', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table web_mytour.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permissions_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table web_mytour.permission_role
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Dumping structure for table web_mytour.rental
DROP TABLE IF EXISTS `rental`;
CREATE TABLE IF NOT EXISTS `rental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `harga` decimal(10,2) DEFAULT NULL,
  `currency` enum('IDR','USD') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.rental: ~1 rows (approximately)
/*!40000 ALTER TABLE `rental` DISABLE KEYS */;
INSERT INTO `rental` (`id`, `nama`, `desc`, `harga`, `currency`) VALUES
	(1, 'Izuzu Elf Long Pariwisata 16 Seat', '<table width="835">\r\n<tbody>\r\n<tr>\r\n<td width="32"><strong>No</strong></td>\r\n<td width="311"><strong>Tujuan Wisata</strong></td>\r\n<td width="67"><strong>BBM</strong></td>\r\n<td width="65"><strong>Sopir</strong></td>\r\n<td width="90"><strong>Durasi</strong></td>\r\n<td width="103"><strong>Overtime / Jam</strong></td>\r\n<td width="103"><strong>Weekday</strong></td>\r\n<td width="64"><strong>Weekend</strong></td>\r\n</tr>\r\n<tr>\r\n<td>1</td>\r\n<td>Malang Kota -Kota Wisata Batu</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.100,000</td>\r\n<td>1.150,000</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Malang Kota – Malang Selatan – Kota Wisata Batu</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.200,000</td>\r\n<td>1.250,000</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Surabaya – Malang -Batu – Surabaya</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.300,000</td>\r\n<td>1.350,000</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>Malang – Bromo Wonokitri -Malang</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.100,000</td>\r\n<td>1.150,000</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>Malang – Bromo&nbsp; Probolinggo-Malang</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.300,000</td>\r\n<td>1.350,000</td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td>Surabaya – Bromo&nbsp; Probolinggo- Surabaya</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.400,000</td>\r\n<td>1.500,000</td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td>Luar Kota Custom</td>\r\n<td>No</td>\r\n<td>Include</td>\r\n<td>Per Hari</td>\r\n<td>0</td>\r\n<td>900,000</td>\r\n<td>950,000</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2"><strong>Note : Belum Termasuk Biaya Parkir,Retribusi &amp; Toll&nbsp;</strong></td>\r\n</tr>\r\n<tr>\r\n<td colspan="2"><strong>Makan &amp; Penginapan&nbsp; Sopir ditanggung penyewa</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>', 89.90, 'USD');
/*!40000 ALTER TABLE `rental` ENABLE KEYS */;


-- Dumping structure for table web_mytour.rental_image
DROP TABLE IF EXISTS `rental_image`;
CREATE TABLE IF NOT EXISTS `rental_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_id` int(11) DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.rental_image: ~1 rows (approximately)
/*!40000 ALTER TABLE `rental_image` DISABLE KEYS */;
INSERT INTO `rental_image` (`id`, `rental_id`, `filename`, `main_img`) VALUES
	(1, 1, 'elflong.jpg', 'Y');
/*!40000 ALTER TABLE `rental_image` ENABLE KEYS */;


-- Dumping structure for table web_mytour.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.roles: ~1 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', NULL, 10, '2015-03-30 22:15:59', '2015-03-30 22:15:59');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table web_mytour.role_user
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `role_user_user_id_index` (`user_id`),
  KEY `role_user_role_id_index` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.role_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2015-03-30 22:15:59', '2015-03-30 22:15:59');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Dumping structure for table web_mytour.testimony
DROP TABLE IF EXISTS `testimony`;
CREATE TABLE IF NOT EXISTS `testimony` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.testimony: ~2 rows (approximately)
/*!40000 ALTER TABLE `testimony` DISABLE KEYS */;
INSERT INTO `testimony` (`id`, `created_at`, `nama`, `company`, `content`, `status`) VALUES
	(1, '2015-03-30 22:58:57', 'client 1', 'Company 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices. Vivamus nec lectus sed orci molestie molestie.', 'Y'),
	(2, '2015-03-30 22:59:22', 'client 2', 'COmpany 2', 'Adipiscing elit. In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices. Vivamus nec lectus sed orci molestie molestie.', 'Y');
/*!40000 ALTER TABLE `testimony` ENABLE KEYS */;


-- Dumping structure for table web_mytour.tipe_menu
DROP TABLE IF EXISTS `tipe_menu`;
CREATE TABLE IF NOT EXISTS `tipe_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.tipe_menu: ~11 rows (approximately)
/*!40000 ALTER TABLE `tipe_menu` DISABLE KEYS */;
INSERT INTO `tipe_menu` (`id`, `nama`) VALUES
	(1, 'Blank'),
	(2, 'Homepage'),
	(3, 'About'),
	(4, 'Blog'),
	(5, 'Info Wisata'),
	(6, 'Booking'),
	(7, 'Hotel'),
	(8, 'Sewa Mobil'),
	(9, 'Contact'),
	(10, 'Foto'),
	(11, 'Video');
/*!40000 ALTER TABLE `tipe_menu` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack
DROP TABLE IF EXISTS `travelpack`;
CREATE TABLE IF NOT EXISTS `travelpack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `currency` enum('IDR','USD') COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` mediumtext COLLATE utf8_unicode_ci,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `include` text COLLATE utf8_unicode_ci,
  `exclude` text COLLATE utf8_unicode_ci,
  `itinerary` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack: ~2 rows (approximately)
/*!40000 ALTER TABLE `travelpack` DISABLE KEYS */;
INSERT INTO `travelpack` (`id`, `nama`, `harga`, `currency`, `desc`, `publish`, `include`, `exclude`, `itinerary`) VALUES
	(1, '3D2N Bali Dolphin', 2312000.00, 'IDR', '<p><span style="color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;">Berbeda dengan Pantai&nbsp;Kuta maupun Pantai Sanur, di&nbsp;Pantai Lovina&nbsp;&nbsp;tidak cocok sebagai tempat&nbsp;berjemur karena banyaknya ada sampan (perahu kecil) yang berjejer di pinggiran pantai. Sampan-sampan ini digunakan untuk aktifitas melihatatraksi lumba-lumba&nbsp;&nbsp;secara langsung di tengah laut. Hal itu merupakan keunikan dimiliki pantai ini.&nbsp;Pantai&nbsp;ini berada di utara Pulau Bali, tepatnya terletak di Desa Kalibukbuk, Kabupaten Buleleng atau dapat ditempuh sekitar 100 km dari kota Denpasar, Ibu Kota Provinsi Bali.</span></p>', 'Y', '<ul>\r\n<li>2 malam akomodasi sesuaipilihan</li>\r\n<li>Makan pagi di Hotel (MP)&nbsp;&nbsp;</li>\r\n<li>Makan siang (MS) /malam (MM) sesuai program</li>\r\n<li>Kendaraan pribadi ber AC</li>\r\n<li>Pemandu Wisata</li>\r\n<li>Tour sesuai program termasuk donasi dan tiket masuk objek</li>\r\n<li>1 Botol Air mineral pada saat tour</li>\r\n<li>Mobil barang terpisah untuk 7 - 9 orang saja &nbsp;</li>\r\n</ul>', '<ul>\r\n<li>Tiket pesawat dan airport tax</li>\r\n<li>Pengeluaran pribadi</li>\r\n<li>Hal hal lain yang tidak disebutkan dalam program</li>\r\n<li>Tips</li>\r\n</ul>', '<ul>\r\n<li><strong>Hari 1:&nbsp;Kedatangan di Bali -&nbsp; Uluwatu &amp; GWK Tour (MM)</strong> <br />Penjemputan di &nbsp;Bandara Ngurah Rai oleh guide kami kemudian transfer ke hotel untuk check in dan tour ke Pura Uluwatu dan mengunjungi Taman Kebudayaan GWK. Disini anda juga dapat menyaksikan Tarian Kecak (18.00) dan makan malam di Branda Restaurant. &nbsp;<br /><br /></li>\r\n<li><strong>Hari 2:&nbsp;Wisata Berburu Lumba &ndash; Lumba (MP/MS/MM)</strong> <br />Penjemputan&nbsp; di&nbsp; hotel&nbsp; jam&nbsp; 03.00&nbsp; dini hari dan&nbsp; transfer&nbsp; ke Lovina untuk berburu pemandangan lumba-lumba di laut dengan perahu tradisional. Makan pagi di restaurant. Beranjak menuju Ulundanu di Bedugul dan makan siang&nbsp; di&nbsp; restaurant&nbsp; lokal.&nbsp; Pura&nbsp; Tanah&nbsp; Lot&nbsp; menjadi tempat terakhir&nbsp; yang dikunjungi sebelum makan malam di Jimbaran. &nbsp;<br /><br /></li>\r\n<li><strong>Hari 3:&nbsp;Sampai Jumpa Bali (MP)</strong> <br />Makan pagi di hotel dan acara bebas sampai tiba waktunya untuk di transfer ke Airport.</li>\r\n</ul>'),
	(2, '3D2N Bali Dolphin', 2312000.00, 'IDR', '<p><span style="color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;">Berbeda dengan Pantai&nbsp;Kuta maupun Pantai Sanur, di&nbsp;Pantai Lovina&nbsp;&nbsp;tidak cocok sebagai tempat&nbsp;berjemur karena banyaknya ada sampan (perahu kecil) yang berjejer di pinggiran pantai. Sampan-sampan ini digunakan untuk aktifitas melihatatraksi lumba-lumba&nbsp;&nbsp;secara langsung di tengah laut. Hal itu merupakan keunikan dimiliki pantai ini.&nbsp;Pantai&nbsp;ini berada di utara Pulau Bali, tepatnya terletak di Desa Kalibukbuk, Kabupaten Buleleng atau dapat ditempuh sekitar 100 km dari kota Denpasar, Ibu Kota Provinsi Bali.</span></p>', 'Y', '<ul>\r\n<li>2 malam akomodasi sesuaipilihan</li>\r\n<li>Makan pagi di Hotel (MP)&nbsp;&nbsp;</li>\r\n<li>Makan siang (MS) /malam (MM) sesuai program</li>\r\n<li>Kendaraan pribadi ber AC</li>\r\n<li>Pemandu Wisata</li>\r\n<li>Tour sesuai program termasuk donasi dan tiket masuk objek</li>\r\n<li>1 Botol Air mineral pada saat tour</li>\r\n<li>Mobil barang terpisah untuk 7 - 9 orang saja &nbsp;</li>\r\n</ul>', '<ul>\r\n<li>Tiket pesawat dan airport tax</li>\r\n<li>Pengeluaran pribadi</li>\r\n<li>Hal hal lain yang tidak disebutkan dalam program</li>\r\n<li>Tips</li>\r\n</ul>', '<ul>\r\n<li><strong>Hari 1:&nbsp;Kedatangan di Bali -&nbsp; Uluwatu &amp; GWK Tour (MM)</strong> <br />Penjemputan di &nbsp;Bandara Ngurah Rai oleh guide kami kemudian transfer ke hotel untuk check in dan tour ke Pura Uluwatu dan mengunjungi Taman Kebudayaan GWK. Disini anda juga dapat menyaksikan Tarian Kecak (18.00) dan makan malam di Branda Restaurant. &nbsp;<br /><br /></li>\r\n<li><strong>Hari 2:&nbsp;Wisata Berburu Lumba &ndash; Lumba (MP/MS/MM)</strong> <br />Penjemputan&nbsp; di&nbsp; hotel&nbsp; jam&nbsp; 03.00&nbsp; dini hari dan&nbsp; transfer&nbsp; ke Lovina untuk berburu pemandangan lumba-lumba di laut dengan perahu tradisional. Makan pagi di restaurant. Beranjak menuju Ulundanu di Bedugul dan makan siang&nbsp; di&nbsp; restaurant&nbsp; lokal.&nbsp; Pura&nbsp; Tanah&nbsp; Lot&nbsp; menjadi tempat terakhir&nbsp; yang dikunjungi sebelum makan malam di Jimbaran. &nbsp;<br /><br /></li>\r\n<li><strong>Hari 3:&nbsp;Sampai Jumpa Bali (MP)</strong> <br />Makan pagi di hotel dan acara bebas sampai tiba waktunya untuk di transfer ke Airport.</li>\r\n</ul>');
/*!40000 ALTER TABLE `travelpack` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_hotel
DROP TABLE IF EXISTS `travelpack_hotel`;
CREATE TABLE IF NOT EXISTS `travelpack_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) NOT NULL DEFAULT '0',
  `hotel_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack_hotel: ~0 rows (approximately)
/*!40000 ALTER TABLE `travelpack_hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `travelpack_hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_image
DROP TABLE IF EXISTS `travelpack_image`;
CREATE TABLE IF NOT EXISTS `travelpack_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) NOT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack_image: ~2 rows (approximately)
/*!40000 ALTER TABLE `travelpack_image` DISABLE KEYS */;
INSERT INTO `travelpack_image` (`id`, `travelpack_id`, `filename`, `main_img`) VALUES
	(1, 1, 'img_travelpack_bromomidnight.jpg', 'Y'),
	(2, 2, 'img_travelpack_dolphin.jpg', 'Y');
/*!40000 ALTER TABLE `travelpack_image` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_include
DROP TABLE IF EXISTS `travelpack_include`;
CREATE TABLE IF NOT EXISTS `travelpack_include` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('I','E','T') COLLATE utf8_unicode_ci NOT NULL COMMENT 'I : Include, E:Exclude,T:Itenerary',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack_include: ~0 rows (approximately)
/*!40000 ALTER TABLE `travelpack_include` DISABLE KEYS */;
/*!40000 ALTER TABLE `travelpack_include` ENABLE KEYS */;


-- Dumping structure for table web_mytour.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_username_index` (`username`),
  KEY `users_password_index` (`password`),
  KEY `users_email_index` (`email`),
  KEY `users_remember_token_index` (`remember_token`),
  KEY `users_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `remember_token`, `verified`, `disabled`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', '$2a$08$rqN6idpy0FwezH72fQcdqunbJp7GJVm8j94atsTOqCeuNvc3PzH3m', 'a227383075861e775d0af6281ea05a49', 'admin@example.com', NULL, 1, 0, '2015-03-30 22:15:59', '2015-03-30 22:15:59', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for view web_mytour.view_blogs
DROP VIEW IF EXISTS `view_blogs`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_blogs` (
	`id` INT(11) NOT NULL,
	`created_at` DATETIME NULL,
	`title` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`content` MEDIUMTEXT NULL COLLATE 'utf8_unicode_ci',
	`tags` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`publish` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`author_id` INT(11) NULL,
	`img_cover` VARCHAR(150) NULL COMMENT '570*222' COLLATE 'utf8_unicode_ci',
	`username` VARCHAR(30) NULL COLLATE 'utf8_unicode_ci',
	`kategori` VARCHAR(100) NULL COLLATE 'utf8_unicode_ci',
	`category_id` INT(11) NULL
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_homepage_hotel
DROP VIEW IF EXISTS `view_homepage_hotel`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_homepage_hotel` (
	`id` INT(11) NOT NULL,
	`hotel_id` INT(11) NOT NULL,
	`nama` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`room` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`harga` DECIMAL(10,2) NULL,
	`currency` ENUM('IDR','USD') NULL COLLATE 'utf8_unicode_ci',
	`filename` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_hotel
DROP VIEW IF EXISTS `view_hotel`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_hotel` (
	`id` INT(11) NOT NULL,
	`nama` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`alamat` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`desc` MEDIUMTEXT NOT NULL COLLATE 'utf8_unicode_ci',
	`imgpath` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`img_cover` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`jumlah_room` BIGINT(21) NULL
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_travel
DROP VIEW IF EXISTS `view_travel`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_travel` (
	`id` INT(11) NOT NULL,
	`nama` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`harga` DECIMAL(10,2) NULL,
	`currency` ENUM('IDR','USD') NULL COLLATE 'utf8_unicode_ci',
	`desc` MEDIUMTEXT NULL COLLATE 'utf8_unicode_ci',
	`publish` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`filename` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`main_img` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`include` TEXT NULL COLLATE 'utf8_unicode_ci',
	`exclude` TEXT NULL COLLATE 'utf8_unicode_ci',
	`itinerary` TEXT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_blogs
DROP VIEW IF EXISTS `view_blogs`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_blogs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_blogs` AS select blog.id, blog.created_at,blog.title,blog.content,blog.tags,blog.`publish`,blog.author_id,blog.img_cover,users.username, blog_category.name as kategori,blog.category_id
from blog
inner join blog_category on blog.category_id = blog_category.id
left join users on blog.author_id = users.id  order by created_at desc ;


-- Dumping structure for view web_mytour.view_homepage_hotel
DROP VIEW IF EXISTS `view_homepage_hotel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_homepage_hotel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_homepage_hotel` AS select homepage_hotel.id,hotel.id as hotel_id,hotel.nama,hotel_room.nama as room,hotel_room.harga,hotel_room.currency,hotel.img_cover as filename
from homepage_hotel
inner join hotel on homepage_hotel.hotel_id = hotel.id
left join hotel_room on hotel_room.hotel_id = hotel.id ;


-- Dumping structure for view web_mytour.view_hotel
DROP VIEW IF EXISTS `view_hotel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_hotel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_hotel` AS SELECT hotel.id, hotel.nama,hotel.alamat, hotel.desc,(select value from constval where name ='hotel_img_path') as imgpath,hotel.img_cover, (select count(hotel_room.id) from hotel_room where hotel_room.hotel_id = hotel.id) as jumlah_room from hotel ;


-- Dumping structure for view web_mytour.view_travel
DROP VIEW IF EXISTS `view_travel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_travel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_travel` AS SELECT tv.id, tv.nama,tv.harga,tv.currency,tv.`desc`,tv.publish, tim.filename,tim.main_img,tv.include,tv.exclude,tv.itinerary
from travelpack as tv left join travelpack_image as tim on tim.travelpack_id = tv.id where tim.main_img ='Y' ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
