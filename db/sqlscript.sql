-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4896
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for web_mytour
DROP DATABASE IF EXISTS `web_mytour`;
CREATE DATABASE IF NOT EXISTS `web_mytour` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `web_mytour`;


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
  `status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `img_cover` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.blog: ~1 rows (approximately)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `created_at`, `title`, `content`, `tags`, `status`, `author_id`, `img_cover`) VALUES
	(1, '2015-03-30 22:21:36', 'Pulau Menjangan: Surga TamanBawah Laut di Bali Barat', 'Dengan hamparan pantai berpasir putih dan taman bawah laut beraneka warna, Pulau Menjangan adalah definisi sempurna dari keindahan alam bawah laut Bali bagian Barat. Terletak sekira 10 km di lepas pantai Barat Laut Bali, pulau kecil Menjangan merupakan bagian dari Taman Nasional Bali Barat (TNBB).Yang Bisa Anda Lakukan di Pulau Menjangan?\r\n\r\nPulau yang dikenal sebagai wall diving terbaik di Bali ini memiliki taman bawah laut yang sangat cerah dan penuh warna sekaligus kaya biota laut. Pulau Menjangan dikelilingi terumbu karang yang ditandai dengan drop off  sedalam 60 meter dan formasi batuan yang kompleks. Formasi batuan tersebut membentuk sejumlah gua-gua besar dan kecil yang menjadi habitat bagi terumbu karang, karang lunak, kerapu besar, dan belut moray.  Di gua-gua kecil, kakap kecil dan batfish banyak terlihat hilir mudik. Dasar lautnya juga kaya akan barrel sponges dan sea fans yang bahkan dapat mencapai ukuran yang sangat besar.  Kedalaman laut dan aliran arus yang tenang menjadikan taman bawah laut sekitar Menjangan adalah tempat hidup bagi tuna, gerombolan jackfish, batfish, angelfish, penyu laut, bahkan hiu.\r\n\r\nPada kedalaman sekira 45 meter, terdapat titik menyelam Anchor Wreck. Sesuai namanya, terdapat bangkai kapal lengkap dengan jangkarnya yang sudah berkarat. Lokasi tersebut dikenal dengan sebutan Anker atau Kapal Budak. Diduga bangkai kapal ini adalah bangkai kapal laut Belanda pada abad ke-19 yang tenggelam pada masa terjadinya Perang Dunia II. Kapal ini dinamakan Kapal Budak karena diduga mengangkut budak dari Bali menuju  ke Batavia (sekarang Jakarta). Di bagian dalam kapal, ditemukan peti-peti berisi keramik dan botol kaca yang sudah ditumbuhi karang lunak. Saat berada di bangkai kapal ini, besar kemungkinan akan ditemui penyu dan ikan hiu.\r\n\r\nEel Gardens adalah titik penyelaman yang terletak di bagian barat Menjangan dan disebut-sebut sebagai tempat menyelam terbaik di Pulau Menjangan. Sesuai namanya, di kawasan ini terdapat sejumlah besar koloni garden eel dan sea fans.  Penyelaman dimulai dari dinding di kedalaman sekira 40 meter yang kaya gorgonia dan jenis biota atau tumbuhan laut lainnya. Kawasan ini juga tenar sebab pesona pasirnya yang putih berkilau di tepi garis pantainya.\r\n\r\n \r\n\r\nSecret Bay adalah titik penyelaman yang merupakan surga bagi para makro-fotografer, video-operator, dan ahli biologi kelautan. Tidak ada terumbu karang di titik penyelaman dangkal ini (tidak lebih dari 9 meter); aktivitas penyelamannya dikenal dengan nama muck diving. Terletak di dekat pelabuhan Gilimanuk, kawasan penyelaman ini memiliki dasar laut berupa pasir vulkanis (berlumpur) berwarna abu-abu dan merupakan habitat bagi biota laut yang langka dan endemik. Bahkan, baru-baru ini sejumlah ahli kelautan menemukan 4 jenis anglerfish yang baru pertama kali ditemukan, termasuk diantaranya adalah Sargassum anglerfish, Spotfin anglerfish, dan terutama Tono anglerfish yang secara khusus menarik perhatian besar para peneliti kelautan. Selain ikan langka tersebut, kawasan ini adalah rumah bagi banyak kuda laut dengan beragam jenis, seperti dragonets, ghostpipefish, nudibranch,lionfish, udang laut, belut pita, dan lain sebagainya. Sumber\r\n\r\nAnda berminat untuk mengunjungi P Menjangan? Klik Disini', NULL, 'Y', 1, '1618657_10201629162316456_81592551_n.jpg');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;


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
  KEY `FK_comments_blog` (`blog_id`),
  CONSTRAINT `FK_comments_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.constval: ~30 rows (approximately)
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
	(30, 'show_main_banner', 'Y', NULL);
/*!40000 ALTER TABLE `constval` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.gallery: ~9 rows (approximately)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `created_at`, `type`, `isexternal`, `title`, `filename`) VALUES
	(1, '2015-04-01 07:53:04', 'I', 'N', 'Teluk Ijo', 'ijo.jpg'),
	(2, '2015-04-01 07:55:19', 'I', 'N', 'Pantai Tanah Lot', 'Keindahan-Pura-Tanah-Lot.jpg'),
	(3, '2015-04-01 07:56:41', 'I', 'N', 'Uluwatu', 'L-Uluwatu.jpg'),
	(4, '2015-04-01 07:56:54', 'I', 'N', 'Bedugul', 'Pura-on-The-Lake-3.jpg'),
	(5, '2015-04-01 07:57:20', 'I', 'N', 'Pantai Kuta', 'wisata-pantai-kuta-di-bali.jpg'),
	(6, '2015-04-01 07:57:30', 'I', 'N', 'Bromo', '225848.jpg'),
	(7, '2015-04-01 07:57:47', 'I', 'N', 'Candi Borobudur', '2336220351_825a1b92d3_b.jpg'),
	(8, '2015-04-01 07:58:00', 'I', 'N', 'Rafting Sukabumi', 'arungjeram.JPG'),
	(9, '2015-04-01 07:58:12', 'I', 'N', 'Ubud, Cultural Village', 'Awesome-Maya-Ubud-River-View-with-Fresh-Water.jpg');
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
	(1, 'welcome_title', '', '<h3>Welcome to telusurindonesia.com<br />\r\n            the best travel guide in Indonesia</h3>'),
	(2, 'welcome_subtitle', '', '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pretium vulputate magna sit amet blandit.</p>'),
	(3, 'show_fav_dest', 'Y', ''),
	(4, 'show_hotel', 'Y', ''),
	(5, 'show_car', 'Y', ''),
	(6, '', '', ''),
	(7, 'show_sidenav', 'Y', ''),
	(8, 'sidenav_find_destination', 'Find a Destination', ''),
	(9, 'sidenav_find_destination_subtitle', 'Know where you\'re heading? Find out more and get into the detail.', ''),
	(10, 'sidenav_read_news', 'Read News', ''),
	(11, 'sidenav_read_news_subtitle', 'Browse the latest articles and dispatches from our writers across the globe.', ''),
	(12, 'sidenav_buy_travel', 'Buy Travel Guides', ''),
	(13, 'sidenav_buy_travel_subtitle', 'Browse our store for the latest Rough Guides travel guides', ''),
	(14, 'sidenav_wts', 'What They Say', ''),
	(15, 'sidenav_wts_subtitle', 'Get testimonials from our latest customers', ''),
	(16, 'show_blog_slider', 'Y', ''),
	(17, 'show_testimony', 'Y', ''),
	(18, '', 'Y', ''),
	(19, '', 'Y', ''),
	(20, 'show_slider', 'Y', ''),
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel: ~6 rows (approximately)
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` (`id`, `nama`) VALUES
	(1, 'The 101 Bali Legian hotel'),
	(2, 'HARRIS Hotel & Residences Riverview Kuta'),
	(3, 'Sandat Hotel Legian'),
	(4, 'Hard Rock Hotel'),
	(5, 'Grand Nikko Bali'),
	(6, 'The Sunset Hotel & Restaurant');
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.hotel_image
DROP TABLE IF EXISTS `hotel_image`;
CREATE TABLE IF NOT EXISTS `hotel_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel_image: ~10 rows (approximately)
/*!40000 ALTER TABLE `hotel_image` DISABLE KEYS */;
INSERT INTO `hotel_image` (`id`, `hotel_id`, `filename`, `main_img`) VALUES
	(1, 1, '12502451.jpg', 'Y'),
	(2, 1, '9103339.jpg', 'N'),
	(3, 1, '14651205.jpg', 'N'),
	(4, 3, '23067464.jpg', 'Y'),
	(5, 3, '13824650.jpg', 'N'),
	(6, 3, '21635949.jpg', 'N'),
	(7, 3, '21635982.jpg', 'N'),
	(8, 2, '18442776.jpg', 'Y'),
	(9, 2, '36831463.jpg', 'N'),
	(10, 2, '5736037.jpg', 'N');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel_room: ~2 rows (approximately)
/*!40000 ALTER TABLE `hotel_room` DISABLE KEYS */;
INSERT INTO `hotel_room` (`id`, `hotel_id`, `nama`, `desc`, `harga`, `currency`) VALUES
	(1, 1, 'Standard', NULL, 35.70, 'USD'),
	(2, 1, 'Premium', NULL, 57.50, 'USD');
/*!40000 ALTER TABLE `hotel_room` ENABLE KEYS */;


-- Dumping structure for table web_mytour.imageslider
DROP TABLE IF EXISTS `imageslider`;
CREATE TABLE IF NOT EXISTS `imageslider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.imageslider: ~4 rows (approximately)
/*!40000 ALTER TABLE `imageslider` DISABLE KEYS */;
INSERT INTO `imageslider` (`id`, `filename`) VALUES
	(1, 'bali.jpg'),
	(2, 'kelimutu.jpg'),
	(3, 'rajaampat.jpg'),
	(4, 'wpid.jpeg');
/*!40000 ALTER TABLE `imageslider` ENABLE KEYS */;


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
	(7, 'Booking', 0, 6, 'T', 5, 'Y', 'front/book'),
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


-- Dumping structure for table web_mytour.page_about
DROP TABLE IF EXISTS `page_about`;
CREATE TABLE IF NOT EXISTS `page_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `big_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.page_about: ~1 rows (approximately)
/*!40000 ALTER TABLE `page_about` DISABLE KEYS */;
INSERT INTO `page_about` (`id`, `name`, `value`, `big_value`) VALUES
	(1, 'content', '', ' <p class="lead">When you need all the room you can get. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie.</p>\r\n\r\n        <!-- Carousel\r\n        ================================================== -->\r\n        <div class="row">\r\n            <div class="span6">\r\n                <div class="flexslider">\r\n                    <img src="frontend/img/gallery/slider-img-1.jpg" alt="slider" />\r\n                </div>\r\n            </div>\r\n\r\n            <div class="span6">\r\n                <h5>Lorem ipsum dolor sit amet</h5>\r\n                <p>Vivamus augue nulla, vestibulum ac ultrices posuere, vehicula ac arcu. Quisque nisi lacus, bibendum quis commodo eget, lobortis eget elit. Cras venenatis mauris eu tortor consequat a convallis nulla molestie. Phasellus malesuada malesuada velit et fermentum. Proin ut leo nec mauris pulvinar volutpat. Sed ac neque nec leo condimentum rhoncus. Nunc dapibus odio et lacus elementum congue. Praesent nulla arcu, condimentum eu lobortis sit amet, pretium vitae metus. </p>\r\n\r\n                <blockquote>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Praesent nulla arcu, condimentum eu lobortis.</p>\r\n                    <small>Someone famous <cite title="Source Title">Source Title</cite></small>\r\n                </blockquote>\r\n\r\n                <button class="btn btn-small btn-inverse" type="button">Find out more</button>\r\n            </div>\r\n        </div>');
/*!40000 ALTER TABLE `page_about` ENABLE KEYS */;


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
  `judul` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `currency` enum('IDR','USD') COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack: ~4 rows (approximately)
/*!40000 ALTER TABLE `travelpack` DISABLE KEYS */;
INSERT INTO `travelpack` (`id`, `judul`, `harga`, `currency`, `desc`) VALUES
	(1, 'Open Trip Bromo Midnight Adventure 4 Locations', 55.00, 'USD', NULL),
	(2, 'Exotic Tour P.Sempu-Bromo-Ijen Blue Fire 3H2M', 110.00, 'USD', NULL),
	(3, 'Exotisnya Kawah Ijen Bluefire 2 Hari 1Malam 2015', 57.00, 'USD', NULL),
	(4, 'Fun Trip Malang Batu Bromo 4H3M', 190.00, 'USD', NULL);
/*!40000 ALTER TABLE `travelpack` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_image
DROP TABLE IF EXISTS `travelpack_image`;
CREATE TABLE IF NOT EXISTS `travelpack_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) NOT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack_image: ~4 rows (approximately)
/*!40000 ALTER TABLE `travelpack_image` DISABLE KEYS */;
INSERT INTO `travelpack_image` (`id`, `travelpack_id`, `filename`, `main_img`) VALUES
	(1, 1, 'Open-trip-Bromo.jpg', 'Y'),
	(2, 4, 'Fun-Trip-Malang-Batu-Bromo.jpg', 'Y'),
	(3, 3, 'kawah-ijen.jpg', 'Y'),
	(4, 2, 'Exotic-Tour-P.jpg', 'Y');
/*!40000 ALTER TABLE `travelpack_image` ENABLE KEYS */;


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
	`status` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`author_id` INT(11) NULL,
	`img_cover` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`username` VARCHAR(30) NOT NULL COLLATE 'utf8_unicode_ci'
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
	`filename` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_blogs
DROP VIEW IF EXISTS `view_blogs`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_blogs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_blogs` AS select blog.id, blog.created_at,blog.title,blog.content,blog.tags,blog.`status`,blog.author_id,blog.img_cover,users.username
from blog
inner join users on blog.author_id = users.id ;


-- Dumping structure for view web_mytour.view_homepage_hotel
DROP VIEW IF EXISTS `view_homepage_hotel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_homepage_hotel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_homepage_hotel` AS select homepage_hotel.id,hotel.id as hotel_id,hotel.nama,hotel_room.nama as room,hotel_room.harga,hotel_room.currency,hotel_image.filename
from homepage_hotel
inner join hotel on homepage_hotel.hotel_id = hotel.id
left join hotel_room on hotel_room.hotel_id = hotel.id
inner join hotel_image on hotel.id = hotel_image.hotel_id 
where hotel_image.main_img ='Y' ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
