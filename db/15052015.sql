-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.39 - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.2.0.4947
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.constval: ~32 rows (approximately)
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
	(31, 'hotel_room_img_path', 'images/hotel/room/', NULL),
	(32, 'destinasi_img_path', 'images/destinasi/', NULL);
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


-- Dumping structure for table web_mytour.destinasi
DROP TABLE IF EXISTS `destinasi`;
CREATE TABLE IF NOT EXISTS `destinasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destinasi_kategori_id` int(11) DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` mediumtext COLLATE utf8_unicode_ci,
  `main_img` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_destinasi_destinasi_kategori` (`destinasi_kategori_id`),
  CONSTRAINT `FK_destinasi_destinasi_kategori` FOREIGN KEY (`destinasi_kategori_id`) REFERENCES `destinasi_kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.destinasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `destinasi` DISABLE KEYS */;
INSERT INTO `destinasi` (`id`, `destinasi_kategori_id`, `publish`, `nama`, `desc`, `main_img`) VALUES
	(1, 1, 'Y', 'Sanur', '<p>Pantai sanur adalah pantai yang berada di bali</p>', 'https://pegipegi.files.wordpress.com/2012/10/sanur.jpg'),
	(2, 1, 'Y', 'Kuta Beach', '<p><b style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Pantai Kuta</b><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;adalah sebuah tempat pariwisata yang terletak&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Kuta, Badung" href="http://id.wikipedia.org/wiki/Kuta,_Badung">kecamatan Kuta</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">, sebelah selatan Kota&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Denpasar" href="http://id.wikipedia.org/wiki/Denpasar">Denpasar</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Bali" href="http://id.wikipedia.org/wiki/Bali">Bali</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">,&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Indonesia" href="http://id.wikipedia.org/wiki/Indonesia">Indonesia</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">. Daerah ini merupakan sebuah tujuan wisata turis mancanegara dan telah menjadi objek wisata andalan Pulau Bali sejak awal tahun 1970-an. Pantai Kuta sering pula disebut sebagai pantai&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Matahari terbenam" href="http://id.wikipedia.org/wiki/Matahari_terbenam">matahari terbenam</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;(</span><i style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">sunset beach</i><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">) sebagai lawan dari&nbsp;</span><a style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Pantai Sanur" href="http://id.wikipedia.org/wiki/Pantai_Sanur">pantai Sanur</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">. Selain itu,&nbsp;</span><a class="mw-redirect" style="text-decoration: none; color: #0b0080; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;" title="Lapangan Udara I Gusti Ngurah Rai" href="http://id.wikipedia.org/wiki/Lapangan_Udara_I_Gusti_Ngurah_Rai">Lapangan Udara I Gusti Ngurah Rai</a><span style="color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;terletak tidak jauh dari Kuta.</span></p>\r\n<h2 style="font-weight: normal; margin: 1em 0px 0.25em; overflow: hidden; padding: 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #aaaaaa; font-family: \'Linux Libertine\', Georgia, Times, serif; line-height: 1.3; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span id="Sejarah" class="mw-headline">Sejarah</span><span class="mw-editsection" style="-webkit-user-select: none; font-size: small; margin-left: 1em; vertical-align: baseline; line-height: 1em; display: inline-block; white-space: nowrap; unicode-bidi: -webkit-isolate; font-family: sans-serif;"><span class="mw-editsection-bracket" style="margin-right: 0.25em; color: #555555;">[</span><a class="mw-editsection-visualeditor" style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Sejarah" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;veaction=edit&amp;vesection=1">sunting</a><span class="mw-editsection-divider" style="color: #555555;">&nbsp;|&nbsp;</span><a style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Sejarah" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;action=edit&amp;section=1">sunting sumber</a><span class="mw-editsection-bracket" style="margin-left: 0.25em; color: #555555;">]</span></span></h2>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Sebelum menjadi objek wisata, Kuta merupakan sebuah pelabuhan dagang tempat produk lokal diperdagangkan kepada pembeli dari luar Bali. Pada abad ke-19, Mads Lange, seorang pedagang Denmark, datang ke Bali dan mendirikan basis perdagangan di Kuta. Ia ahli bernegosiasi sehingga dirinya terkenal diantara raja-raja Bali dan Belanda.<sup id="cite_ref-beach_1-0" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-beach-1">[1]</a></sup></p>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Selanjutnya, Hugh Mahbett menerbitkan sebuah buku berjudul &ldquo;<i>Praise to Kuta</i>&rdquo; yang berisi ajakan kepada masyarakat setempat untuk menyiapkan fasilitas akomodasi wisata. Tujuannya untuk mengantisipasi ledakan wisatawan yang berkunjung ke Bali. Buku itu kemudian menginspirasi banyak orang untuk membangun fasilitas wisata seperti penginapan, restoran dan tempat hiburan.<sup id="cite_ref-beach_1-1" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-beach-1">[1]</a></sup></p>\r\n<h2 style="font-weight: normal; margin: 1em 0px 0.25em; overflow: hidden; padding: 0px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #aaaaaa; font-family: \'Linux Libertine\', Georgia, Times, serif; line-height: 1.3; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span id="Pariwisata" class="mw-headline">Pariwisata</span><span class="mw-editsection" style="-webkit-user-select: none; font-size: small; margin-left: 1em; vertical-align: baseline; line-height: 1em; display: inline-block; white-space: nowrap; unicode-bidi: -webkit-isolate; font-family: sans-serif;"><span class="mw-editsection-bracket" style="margin-right: 0.25em; color: #555555;">[</span><a class="mw-editsection-visualeditor" style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Pariwisata" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;veaction=edit&amp;vesection=2">sunting</a><span class="mw-editsection-divider" style="color: #555555;">&nbsp;|&nbsp;</span><a style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Pariwisata" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;action=edit&amp;section=2">sunting sumber</a><span class="mw-editsection-bracket" style="margin-left: 0.25em; color: #555555;">]</span></span></h2>\r\n<div class="thumb tleft" style="float: left; clear: left; margin: 0.5em 1.4em 1.3em 0px; width: auto; color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">\r\n<div class="thumbinner" style="border: 1px solid #cccccc; padding: 3px; font-size: 13.1599998474121px; text-align: center; overflow: hidden; width: 902px; background-color: #f9f9f9;"><a class="image" style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Berkas:Kuta_morning.jpg"><img class="thumbimage" style="border: 1px solid #cccccc; vertical-align: middle; background-color: #ffffff;" src="http://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Kuta_morning.jpg/900px-Kuta_morning.jpg" alt="" width="900" height="141" data-file-width="4096" data-file-height="640" /></a>\r\n<div class="thumbcaption" style="border: none; line-height: 1.4em; padding: 3px; font-size: 12.370400428772px; text-align: left;">\r\n<div class="magnify" style="float: right; margin-left: 3px; margin-right: 0px;">&nbsp;</div>\r\nPanorama Pantai Kuta di pagi hari</div>\r\n</div>\r\n</div>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Pantai Kuta terkenal memiliki ombak yang bagus untuk olahraga&nbsp;<a style="text-decoration: none; color: #0b0080; background: none;" title="Selancar" href="http://id.wikipedia.org/wiki/Selancar">selancar</a>&nbsp;(<i>surfing</i>), terutama bagi peselancar pemula. Selain keindahan pantai, wisata pantai Kuta juga menawarkan berbagai jenis hiburan seperti bar, restoran, pertokoan, restoran, hotel, dan toko-toko kelontong, serta&nbsp;<a style="text-decoration: none; color: #0b0080; background: none;" title="Pedagang kaki lima" href="http://id.wikipedia.org/wiki/Pedagang_kaki_lima">pedagang kaki lima</a>&nbsp;di sepanjang pantai menuju pantai Legian.</p>\r\n<h3 style="margin: 0.3em 0px 0px; overflow: hidden; padding-top: 0.5em; padding-bottom: 0px; border-bottom-style: none; line-height: 1.6; font-family: sans-serif; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span id="Akses" class="mw-headline">Akses</span><span class="mw-editsection" style="-webkit-user-select: none; font-size: small; font-weight: normal; margin-left: 1em; vertical-align: baseline; line-height: 1em; display: inline-block; white-space: nowrap; unicode-bidi: -webkit-isolate;"><span class="mw-editsection-bracket" style="margin-right: 0.25em; color: #555555;">[</span><a class="mw-editsection-visualeditor" style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Akses" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;veaction=edit&amp;vesection=3">sunting</a><span class="mw-editsection-divider" style="color: #555555;">&nbsp;|&nbsp;</span><a style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Akses" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;action=edit&amp;section=3">sunting sumber</a><span class="mw-editsection-bracket" style="margin-left: 0.25em; color: #555555;">]</span></span></h3>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Pantai Kuta dapat ditempuh dengan waktu sekitar 10 menit dari&nbsp;<a class="mw-redirect" style="text-decoration: none; color: #0b0080; background: none;" title="Bandara Internasional Ngurah Rai" href="http://id.wikipedia.org/wiki/Bandara_Internasional_Ngurah_Rai">Bandara Internasional Ngurah Rai</a>&nbsp;dalam kondisi jalanan lancar.<sup id="cite_ref-2" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-2">[2]</a></sup></p>\r\n<h3 style="margin: 0.3em 0px 0px; overflow: hidden; padding-top: 0.5em; padding-bottom: 0px; border-bottom-style: none; line-height: 1.6; font-family: sans-serif; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span id="Fasilitas" class="mw-headline">Fasilitas</span><span class="mw-editsection" style="-webkit-user-select: none; font-size: small; font-weight: normal; margin-left: 1em; vertical-align: baseline; line-height: 1em; display: inline-block; white-space: nowrap; unicode-bidi: -webkit-isolate;"><span class="mw-editsection-bracket" style="margin-right: 0.25em; color: #555555;">[</span><a class="mw-editsection-visualeditor" style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Fasilitas" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;veaction=edit&amp;vesection=4">sunting</a><span class="mw-editsection-divider" style="color: #555555;">&nbsp;|&nbsp;</span><a style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Fasilitas" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;action=edit&amp;section=4">sunting sumber</a><span class="mw-editsection-bracket" style="margin-left: 0.25em; color: #555555;">]</span></span></h3>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Sebagai tempat wisata pantai, pantai Kuta dilengkapi lahan parkir di sepanjang pantai, kamar mandi umum, payung pantai, kios makanan dan minuman, serta tempat penyewaan papan selancar.</p>\r\n<h3 style="margin: 0.3em 0px 0px; overflow: hidden; padding-top: 0.5em; padding-bottom: 0px; border-bottom-style: none; line-height: 1.6; font-family: sans-serif; background-image: none; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span id="Permasalahan_sampah" class="mw-headline">Permasalahan sampah</span><span class="mw-editsection" style="-webkit-user-select: none; font-size: small; font-weight: normal; margin-left: 1em; vertical-align: baseline; line-height: 1em; display: inline-block; white-space: nowrap; unicode-bidi: -webkit-isolate;"><span class="mw-editsection-bracket" style="margin-right: 0.25em; color: #555555;">[</span><a class="mw-editsection-visualeditor" style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Permasalahan sampah" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;veaction=edit&amp;vesection=5">sunting</a><span class="mw-editsection-divider" style="color: #555555;">&nbsp;|&nbsp;</span><a style="text-decoration: none; color: #0b0080; background: none;" title="Sunting bagian: Permasalahan sampah" href="http://id.wikipedia.org/w/index.php?title=Pantai_Kuta&amp;action=edit&amp;section=5">sunting sumber</a><span class="mw-editsection-bracket" style="margin-left: 0.25em; color: #555555;">]</span></span></h3>\r\n<div class="thumb tright" style="clear: right; float: right; margin: 0.5em 0px 1.3em 1.4em; width: auto; color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">\r\n<div class="thumbinner" style="border: 1px solid #cccccc; padding: 3px; font-size: 13.1599998474121px; text-align: center; overflow: hidden; width: 222px; background-color: #f9f9f9;"><a class="image" style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Berkas:Kuta_cleaning.jpg"><img class="thumbimage" style="border: 1px solid #cccccc; vertical-align: middle; background-color: #ffffff;" src="http://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Kuta_cleaning.jpg/220px-Kuta_cleaning.jpg" alt="" width="220" height="124" data-file-width="3264" data-file-height="1836" /></a>\r\n<div class="thumbcaption" style="border: none; line-height: 1.4em; padding: 3px; font-size: 12.370400428772px; text-align: left;">\r\n<div class="magnify" style="float: right; margin-left: 3px; margin-right: 0px;">&nbsp;</div>\r\nPembersihan pantai Kuta di pagi hari</div>\r\n</div>\r\n</div>\r\n<div class="thumb tright" style="clear: right; float: right; margin: 0.5em 0px 1.3em 1.4em; width: auto; color: #252525; font-family: sans-serif; font-size: 14px; line-height: 22.3999996185303px;">\r\n<div class="thumbinner" style="border: 1px solid #cccccc; padding: 3px; font-size: 13.1599998474121px; text-align: center; overflow: hidden; width: 222px; background-color: #f9f9f9;"><a class="image" style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Berkas:Kuta_cleaning_2.jpg"><img class="thumbimage" style="border: 1px solid #cccccc; vertical-align: middle; background-color: #ffffff;" src="http://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Kuta_cleaning_2.jpg/220px-Kuta_cleaning_2.jpg" alt="" width="220" height="145" data-file-width="2795" data-file-height="1836" /></a>\r\n<div class="thumbcaption" style="border: none; line-height: 1.4em; padding: 3px; font-size: 12.370400428772px; text-align: left;">\r\n<div class="magnify" style="float: right; margin-left: 3px; margin-right: 0px;">&nbsp;</div>\r\nMengangkut sampah di Pantai Kuta</div>\r\n</div>\r\n</div>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Setiap tahun, pengunjung pantai Kuta kerap mengeluhkan masalah kebersihan dan tumpukan sampah di pantai Kuta, terutama saat musim liburan. Hal tersebut mempengaruhi penilaian wisatawan domestik maupun manca negara terhadap citra pantai Kuta.<sup id="cite_ref-3" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-3">[3]</a></sup><sup id="cite_ref-4" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-4">[4]</a></sup>&nbsp;Selain disebabkan aktivitas pengunjung dan penjual di sepanjang pantai Kuta, sampah-sampah di pantai Kuta juga diakibatkan hembusan angin barat setiap tahunnya yang membawa sampah dari muara-muara sungai terdekat ke pantai.<sup id="cite_ref-endy_5-0" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-endy-5">[5]</a></sup><sup id="cite_ref-esti_6-0" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-esti-6">[6]</a></sup></p>\r\n<p style="margin: 0.5em 0px; line-height: 22.3999996185303px; color: #252525; font-family: sans-serif; font-size: 14px;">Permasalahan ini berusaha diatasi oleh prajuru Desa Adat Kuta dan anggota Badan Penyelamat Wisata Tirta (Balawista) yang merupakan mitra dari Dinas Kebersihan dan Pertamanan Kabupaten Badung. Setiap pagi, Dinas Kebersihan dan Pertamanan juga aktif mengoperasikan mobil loader untuk memunguti sampah di pagi hari.<sup id="cite_ref-endy_5-1" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-endy-5">[5]</a></sup><sup id="cite_ref-esti_6-1" class="reference" style="line-height: 1em; unicode-bidi: -webkit-isolate;"><a style="text-decoration: none; color: #0b0080; background: none;" href="http://id.wikipedia.org/wiki/Pantai_Kuta#cite_note-esti-6">[6]</a></sup>&nbsp;Permasalahan ini juga memperoleh perhatian utama dari&nbsp;<a class="mw-redirect" style="text-decoration: none; color: #0b0080; background: none;" title="TNI" href="http://id.wikipedia.org/wiki/TNI">TNI</a>, berbagai organisasi masyarakat, dan industri-industri pariwisata yang berada di wilayah Pantai Kuta</p>', 'img_destinasi_pantai-kuta-bali.jpg');
/*!40000 ALTER TABLE `destinasi` ENABLE KEYS */;


-- Dumping structure for table web_mytour.destinasi_image
DROP TABLE IF EXISTS `destinasi_image`;
CREATE TABLE IF NOT EXISTS `destinasi_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destinasi_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('I','V') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'I' COMMENT 'I: Image, V:Video',
  `lislocal` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `islocal` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `FK_destinasi_image_destinasi` (`destinasi_id`),
  CONSTRAINT `FK_destinasi_image_destinasi` FOREIGN KEY (`destinasi_id`) REFERENCES `destinasi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.destinasi_image: ~5 rows (approximately)
/*!40000 ALTER TABLE `destinasi_image` DISABLE KEYS */;
INSERT INTO `destinasi_image` (`id`, `destinasi_id`, `type`, `lislocal`, `filename`, `main_img`, `islocal`) VALUES
	(2, 2, 'I', 'Y', 'img_destinasi_pantai-kuta-bali.jpg', 'Y', 'Y'),
	(3, 1, 'I', 'Y', 'https://pegipegi.files.wordpress.com/2012/10/sanur.jpg', 'Y', 'N'),
	(4, 1, 'I', 'Y', 'http://www.gayahidupku.com/wp-content/uploads/2014/01/Wisata-Keindahan-Pantai-Sanur-Pulau-Bali.jpg', 'N', 'N'),
	(5, 1, 'I', 'Y', 'https://suratniari.files.wordpress.com/2012/10/pantai-sanur.jpg', 'N', 'N'),
	(6, 1, 'I', 'Y', 'https://plazaparadisesanur.files.wordpress.com/2014/10/wpid-pantai-sanur-bali.jpg', 'N', 'N');
/*!40000 ALTER TABLE `destinasi_image` ENABLE KEYS */;


-- Dumping structure for table web_mytour.destinasi_kategori
DROP TABLE IF EXISTS `destinasi_kategori`;
CREATE TABLE IF NOT EXISTS `destinasi_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.destinasi_kategori: ~1 rows (approximately)
/*!40000 ALTER TABLE `destinasi_kategori` DISABLE KEYS */;
INSERT INTO `destinasi_kategori` (`id`, `nama`, `filename`) VALUES
	(1, 'Bali', 'img_kat_dest_Bali_bali_300.png');
/*!40000 ALTER TABLE `destinasi_kategori` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.gallery: ~7 rows (approximately)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `created_at`, `type`, `isexternal`, `title`, `filename`) VALUES
	(6, '2015-04-13 13:31:18', 'V', NULL, 'Bali Travel Guide', 'yJyz8v3q25M'),
	(7, '2015-04-13 13:32:17', 'V', NULL, 'Lombok Indonesia Travel Guide', 'd6dW6TuQw-g'),
	(11, '2015-04-13 14:12:36', 'I', 'N', 'Bedugul', 'img_gallery_wallpaper_bedugul.jpg'),
	(12, '2015-04-13 14:13:07', 'I', 'N', 'Tanah Lot', 'img_gallery_Keindahan-Pura-Tanah-Lot.jpg'),
	(13, '2015-04-13 14:13:52', 'V', NULL, 'Jakarta Tour Guide', 'IGRQ18bP41g'),
	(16, '2015-04-13 14:27:48', 'I', 'N', 'Ubud', 'img_gallery_Awesome-Maya-Ubud-River-View-with-Fresh-Water.jpg'),
	(18, '2015-04-19 16:38:00', 'I', 'N', 'bangga jadi petani', 'img_gallery_1236428_10152499705183644_8375535277988825114_n.jpg');
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
  PRIMARY KEY (`id`),
  KEY `FK_homepage_hotel_hotel` (`hotel_id`),
  CONSTRAINT `FK_homepage_hotel_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage_hotel: ~0 rows (approximately)
/*!40000 ALTER TABLE `homepage_hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `homepage_hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.homepage_rental
DROP TABLE IF EXISTS `homepage_rental`;
CREATE TABLE IF NOT EXISTS `homepage_rental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_homepage_rental_rental` (`rental_id`),
  CONSTRAINT `FK_homepage_rental_rental` FOREIGN KEY (`rental_id`) REFERENCES `rental` (`id`)
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
  PRIMARY KEY (`id`),
  KEY `FK_homepage_travelpack_travelpack` (`travelpack_id`),
  CONSTRAINT `FK_homepage_travelpack_travelpack` FOREIGN KEY (`travelpack_id`) REFERENCES `travelpack` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.homepage_travelpack: ~0 rows (approximately)
/*!40000 ALTER TABLE `homepage_travelpack` DISABLE KEYS */;
INSERT INTO `homepage_travelpack` (`id`, `travelpack_id`) VALUES
	(1, 1),
	(2, 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel: ~1 rows (approximately)
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` (`id`, `nama`, `img_cover`, `alamat`, `desc`) VALUES
	(1, 'Favehotel Kuta Bali', 'http://baliwww.com/imagesgallery/kuta/favehotelkutasquare/1.jpg', 'Jl. Khayangan Suci No. 8, Kuta, Indonesia, 80361', '<div id="hotelFacilityInfo" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: medium;">\r\n<h2 style="margin-top: 0px; margin-bottom: 10px; font-weight: 400; padding: 0px;">Fasilitas hotel</h2>\r\n<div class="clearfix hotelFacilityContent" style="margin-bottom: 15px;">\r\n<div class="facilityContentLeft" style="width: 300px; float: left;">\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Resepsionis 24 jam</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Concierge/layanan tamu</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Laundry</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Lift</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Check-in ekspress</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Check-out ekspress</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">WiFi di area umum</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Area parkir</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Penitipan bagasi</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Fasilitas rapat</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Restoran</div>\r\n</div>\r\n</div>\r\n<div class="facilityContentRight" style="width: 300px; float: right;">\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Layanan kamar waktu terbatas</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Kolam renang anak</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Kolam renang indoor</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Jasa tur</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Parkir valet</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Layanan kamar 24 jam</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Layanan kamar</div>\r\n</div>\r\n<div class="clearfix facilityItem">\r\n<div class="icon-check" style="width: 23px; height: 24px; float: left; margin-right: 5px; background: url(\'http://asset.traveloka.com/hashed/assets/stylesheets/images/sprite/traveloka-main-3d95d9780be315515a67df8e598fdf4d.png\') -271px -451px no-repeat scroll;">&nbsp;</div>\r\n<div class="tv-c tv-c-90" style="position: relative; float: left; width: 270px;">Brankas</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id="hotelDataInfo" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: medium;">\r\n<h2 style="margin-top: 0px; margin-bottom: 10px; font-weight: 400; padding: 0px;">Deskripsi hotel</h2>\r\n<div class="hotelDetailContent" style="margin-bottom: 15px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Lokasi</span><br />favehotel Kuta Square terletak di lokasi yang sangat strategis, cukup dengan berjalan kaki untuk menuju tempat-tempat populer di Kuta. Matahari Square Mall, Kuta Square dan Warung Made sudah dapat dicapai hanya dengan berjalan kaki selama 5 menit dari hotel. Jarak dari hotel ke Waterbom dan Discovery Shopping Mall juga dekat, sekitar 10 menit berjalan kaki.<br /><br />Untuk menuju Bandara Internasional Ngurah Rai, hanya dibutuhkan kurang dari 10 menit berkendara dari favehotel Kuta Square.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Kamar</span><br />Berinterior modern dengan warna ungu dominan, semua kamar di favehotel Kuta Square bernuansa elegan dengan dilengkapi AC dan WiFi gratis. Ketika dibuka, jendela kamar menghadirkan udara segar dan menghadirkan panorama kolam renang.&nbsp;<br /><br />Tiap kamar dilengkapi TV kabel LCD, meja kursi, kamar mandi dengan shower, perlengkapan mandi gratis serta pengering rambut.<br /><br /><span style="font-weight: bold;">Fasilitas umum</span><br />favehotel Kuta Square menawarkan kolam renang dalam ruangan beratap terbuka termasuk kolam untuk anak-anak. Selain itu, tersedia juga teras berlantai kayu untuk berjemur.&nbsp;<br /><br />Hotel bintang tiga ini juga menyediakan resepsionis 24 jam, penitipan bagasi, laundry, express check-in/check-out, car rental dan layanan antar-jemput bandara. Fasilitas WiFi gratis tersedia di seluruh area hotel. Area parkir gratis tersedia.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Tempat makan</span><br />Selain restoran, hotel ini juga menyediakan layanan kamar untuk jam tertentu.</p>\r\n</div>\r\n</div>\r\n<div id="hotelPolicyInfo" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: medium;">\r\n<h2 style="margin-top: 0px; margin-bottom: 10px; font-weight: 400; padding: 0px;">Kebijakan hotel</h2>\r\n<div class="generalPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Saat tiba di hotel<br /></span>Anda harus menunjukkan kartu identitas berfoto sewaktu check-in. Kartu kredit atau deposit tunai bisa jadi diperlukan pada saat check-in untuk menutup biaya tak terduga. Jenis ranjang dan pilihan kamar smoking/non-smoking tidak dapat dijamin ketersediaannya.</p>\r\n</div>\r\n<p style="margin-top: 0px; padding: 0px;"><strong>Umum</strong></p>\r\n<div class="checkInPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">Check-in: Dari jam 14:00 Check-out: Sampai jam 12:00</div>\r\n<div class="checkInPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;">Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Pemesanan dibayar di awal dan kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel.<br /><br />Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.</p>\r\n</div>\r\n<p style="margin-top: 0px; padding: 0px;"><strong>Detail Tambahan</strong></p>\r\n<div class="otherPolicy" style="margin-bottom: 20px; font-size: 16px; line-height: 26px;">\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Permintaan khusus</span><br />Pemenuhan permintaan khusus bergantung pada ketersediaan sewaktu check-in dan mungkin menimbulkan biaya tambahan. Permintaan khusus tidak dijamin akan terpenuhi.</p>\r\n<p style="margin-top: 0px; padding: 0px;"><span style="font-weight: bold;">Anak-anak</span></p>\r\n<p style="margin-top: 0px; padding: 0px;">Semua anak berusia 12 tahun atau lebih muda diizinkan menginap gratis jika tinggal di kamar orang tua atau walinya, dengan menggunakan tempat tidur yang ada.<br /><br /><span style="font-weight: bold;">Hewan peliharaan</span><br />Hewan peliharaan, termasuk hewan pemandu tidak diizinkan.</p>\r\n</div>\r\n</div>');
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.hotel_image
DROP TABLE IF EXISTS `hotel_image`;
CREATE TABLE IF NOT EXISTS `hotel_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `islocal` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `FK_hotel_image_hotel` (`hotel_id`),
  CONSTRAINT `FK_hotel_image_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel_image: ~7 rows (approximately)
/*!40000 ALTER TABLE `hotel_image` DISABLE KEYS */;
INSERT INTO `hotel_image` (`id`, `hotel_id`, `filename`, `main_img`, `islocal`) VALUES
	(1, 1, 'http://baliwww.com/imagesgallery/kuta/favehotelkutasquare/1.jpg', 'Y', 'N'),
	(2, 1, 'http://cdn0.favehotels.com/v1/FaveKutaSquare/Gallery/fave-kuta-square-double-room-500x270px.jpg', 'N', 'N'),
	(4, 1, 'http://media-cdn.tripadvisor.com/media/photo-s/03/34/4c/59/favehotel-kuta-square.jpg', 'N', 'N'),
	(5, 1, 'http://www.hematkebali.com/south_bali/kuta/fave_kuta_square_hotel_kuta_rest.jpg', 'N', 'N'),
	(7, 1, 'http://media-cdn.tripadvisor.com/media/photo-s/05/6f/12/a2/view-from-my-room.jpg', 'N', 'N'),
	(8, 1, 'http://1-ps.googleusercontent.com/xk/orsfN5GG3DPQM2SXTE8qwWrn2_/www.favehotels.com/cdn0.favehotels.com/v1/Images/Home/bg-new2.jpg.pagespeed.ce.mphXfenMJRmqx1QekWF1.jpg', 'N', 'N'),
	(9, 1, 'http://www.holidaybaliamertha.com/wp-content/uploads/2014/01/favehotels-bypass-kuta-suite-room.jpg', 'N', 'N');
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
  `img_cover` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hotel_room_hotel` (`hotel_id`),
  KEY `FK_hotel_room_hotel_image` (`hotel_image_id`),
  CONSTRAINT `FK_hotel_room_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`),
  CONSTRAINT `FK_hotel_room_hotel_image` FOREIGN KEY (`hotel_image_id`) REFERENCES `hotel_image` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.hotel_room: ~2 rows (approximately)
/*!40000 ALTER TABLE `hotel_room` DISABLE KEYS */;
INSERT INTO `hotel_room` (`id`, `hotel_id`, `nama`, `desc`, `harga`, `currency`, `publish`, `img_cover`, `hotel_image_id`) VALUES
	(1, 1, 'Standard Room', '<h3 class="hotelInfoTitle" style="margin: 0px 0px 15px; color: #434343; font-weight: 400; padding: 0px; font-size: 20px; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; background-color: #f0f0f0;">Tipe kamar</h3>\r\n<div class="hotelInfoContent" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f0f0f0;">17 meter persegi<br /><br /><b>Bersantai</b>&nbsp;- Tersedia layanan pijat dalam kamar<br /><b>Hiburan</b>&nbsp;- Gratis akses Internet nirkabel, televisi LCD 32-inci dengan saluran kabel<br /><b>Kamar Mandi</b>&nbsp;- Kamar mandi pribadi dengan shower</div>\r\n<div class="hotelInfoContent" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f0f0f0;">&nbsp;</div>\r\n<div class="hotelInfoContent" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f0f0f0;">\r\n<h3 class="hotelCancellationPolicyTitle" style="margin: 0px 0px 15px; font-weight: 400; padding: 0px; font-size: 20px;">Informasi Penting</h3>\r\n<p style="margin: 0px; padding: 0px;"><strong>Ketentuan pembatalan</strong></p>\r\n<div class="hotelCancellationPolicyContent" style="margin-bottom: 10px;">Gratis biaya pembatalan sebelum tanggal 16-May-2015 13:00 (GMT+07:00). Mulai dari tanggal 16-May-2015 13:01 (GMT+07:00), biaya pembatalan adalah Rp 731182. Mulai dari tanggal 23-May-2015 12:00 (GMT+07:00), pemesanan menjadi non-refundable. Pemesanan ini tidak dapat diubah.</div>\r\n<div class="hotelCancellationPolicyContent" style="margin-bottom: 10px;">&nbsp;</div>\r\n<h3 style="margin: 0px 0px 15px; font-weight: 400; padding: 0px; font-size: 20px;">Informasi tambahan</h3>\r\n<div class="hotelOtherInfoContent">\r\n<p style="margin: 0px; padding: 0px;">Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Pemesanan dibayar di awal dan kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel.<br /><br />Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.</p>\r\n</div>\r\n</div>', 256654.00, 'IDR', 'Y', 'Y', 8),
	(2, 1, 'SUPERIOR ROOM, BALCONY', '<h3 class="hotelInfoTitle" style="margin: 0px 0px 15px; color: #434343; font-weight: 400; padding: 0px; font-size: 20px; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; background-color: #f0f0f0;">Tipe kamar</h3>\r\n<div class="hotelInfoContent" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f0f0f0;"><b>Bersantai</b>&nbsp;- Tersedia layanan pijat dalam kamar<br /><b>Hiburan</b>&nbsp;- Gratis akses Internet nirkabel, televisi LCD 32-inci dengan saluran kabel<br /><b>Makan Minum</b>&nbsp;- Isi minibar gratis<br /><b>Kamar Mandi</b>&nbsp;- Kamar mandi pribadi dengan shower</div>\r\n<div class="hotelInfoContent" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f0f0f0;">&nbsp;</div>\r\n<div class="hotelInfoContent" style="color: #434343; font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; font-size: 13px; background-color: #f0f0f0;">\r\n<h3 class="hotelCancellationPolicyTitle" style="margin: 0px 0px 15px; font-weight: 400; padding: 0px; font-size: 20px;">Informasi Penting</h3>\r\n<p style="margin: 0px; padding: 0px;"><strong>Ketentuan pembatalan</strong></p>\r\n<div class="hotelCancellationPolicyContent" style="margin-bottom: 10px;">Gratis biaya pembatalan sebelum tanggal 16-May-2015 13:00 (GMT+07:00). Mulai dari tanggal 16-May-2015 13:01 (GMT+07:00), biaya pembatalan adalah Rp 1122012. Mulai dari tanggal 23-May-2015 12:00 (GMT+07:00), pemesanan menjadi non-refundable. Pemesanan ini tidak dapat diubah.</div>\r\n<div class="hotelCancellationPolicyContent" style="margin-bottom: 10px;">\r\n<h3 style="margin: 0px 0px 15px; font-weight: 400; padding: 0px; font-size: 20px;">Informasi tambahan</h3>\r\n<div class="hotelOtherInfoContent">\r\n<p style="margin: 0px; padding: 0px;">Nominal transaksi akan dipotong dari kartu kredit pada saat booking. Pemesanan dibayar di awal dan kesediaan kamar dijamin sekalipun Anda terlambat check-in. Harga total sudah termasuk pajak, biaya akses dan booking. Biaya tambahan seperti parkir, telepon, layanan kamar ditangani langsung antara Anda dan hotel.<br /><br />Biaya penambahan orang dalam kamar dapat berlaku dan berbeda-beda menurut kebijakan hotel.</p>\r\n</div>\r\n</div>\r\n</div>', 561056.00, 'IDR', 'Y', NULL, 9);
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
	(1, 'Izuzu Elf Long Pariwisata 16 Seat', '<table width="835">\r\n<tbody>\r\n<tr>\r\n<td width="32"><strong>No</strong></td>\r\n<td width="311"><strong>Tujuan Wisata</strong></td>\r\n<td width="67"><strong>BBM</strong></td>\r\n<td width="65"><strong>Sopir</strong></td>\r\n<td width="90"><strong>Durasi</strong></td>\r\n<td width="103"><strong>Overtime / Jam</strong></td>\r\n<td width="103"><strong>Weekday</strong></td>\r\n<td width="64"><strong>Weekend</strong></td>\r\n</tr>\r\n<tr>\r\n<td>1</td>\r\n<td>Malang Kota -Kota Wisata Batu</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.100,000</td>\r\n<td>1.150,000</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Malang Kota &acirc;&euro;&ldquo; Malang Selatan &acirc;&euro;&ldquo; Kota Wisata Batu</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.200,000</td>\r\n<td>1.250,000</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Surabaya &acirc;&euro;&ldquo; Malang -Batu &acirc;&euro;&ldquo; Surabaya</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.300,000</td>\r\n<td>1.350,000</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>Malang &acirc;&euro;&ldquo; Bromo Wonokitri -Malang</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.100,000</td>\r\n<td>1.150,000</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>Malang &acirc;&euro;&ldquo; Bromo&nbsp; Probolinggo-Malang</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.300,000</td>\r\n<td>1.350,000</td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td>Surabaya &acirc;&euro;&ldquo; Bromo&nbsp; Probolinggo- Surabaya</td>\r\n<td>Include</td>\r\n<td>Include</td>\r\n<td>12 Jam</td>\r\n<td>35,000</td>\r\n<td>1.400,000</td>\r\n<td>1.500,000</td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td>Luar Kota Custom</td>\r\n<td>No</td>\r\n<td>Include</td>\r\n<td>Per Hari</td>\r\n<td>0</td>\r\n<td>900,000</td>\r\n<td>950,000</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2"><strong>Note : Belum Termasuk Biaya Parkir,Retribusi &amp; Toll&nbsp;</strong></td>\r\n</tr>\r\n<tr>\r\n<td colspan="2"><strong>Makan &amp; Penginapan&nbsp; Sopir ditanggung penyewa</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>', 90.00, 'USD');
/*!40000 ALTER TABLE `rental` ENABLE KEYS */;


-- Dumping structure for table web_mytour.rental_image
DROP TABLE IF EXISTS `rental_image`;
CREATE TABLE IF NOT EXISTS `rental_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rental_id` int(11) DEFAULT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `islocal` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `FK_rental_image_rental` (`rental_id`),
  CONSTRAINT `FK_rental_image_rental` FOREIGN KEY (`rental_id`) REFERENCES `rental` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.rental_image: ~3 rows (approximately)
/*!40000 ALTER TABLE `rental_image` DISABLE KEYS */;
INSERT INTO `rental_image` (`id`, `rental_id`, `filename`, `main_img`, `islocal`) VALUES
	(1, 1, 'elflong.jpg', 'Y', 'Y'),
	(9, 1, 'http://www.balitransports.com/indo/images/elf-17seats.jpg', 'N', 'N'),
	(10, 1, 'http://sewabusbali.com/images-bus/elf_long_17seats.jpg', 'N', 'N');
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
  `day` int(11) DEFAULT NULL,
  `night` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack: ~2 rows (approximately)
/*!40000 ALTER TABLE `travelpack` DISABLE KEYS */;
INSERT INTO `travelpack` (`id`, `nama`, `harga`, `currency`, `desc`, `publish`, `include`, `exclude`, `itinerary`, `day`, `night`) VALUES
	(1, '3D2N Makassar Holiday', 1785000.00, 'IDR', '<p><span style="color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;">Selamat datang di Makassar!</span><br style="box-sizing: border-box; color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;" /><span style="color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;">Anda akan mengikuti city tour mengunjungi Fort Rotterdam, Pantai Losari dan lain-lain.</span></p>', 'Y', '<ul>\r\n<li>\r\n<div>Akomodasi dan sarapan</div>\r\n</li>\r\n<li>\r\n<div>Bus/ mobil ber-AC</div>\r\n</li>\r\n<li>\r\n<div>Tiket masuk wisata sesuai itinerary</div>\r\n</li>\r\n<li>\r\n<div>Tour Guide&nbsp;</div>\r\n</li>\r\n</ul>', '<ul>\r\n<li>Makan siang dan makan malam</li>\r\n<li>Tiket pesawat serta airport tax</li>\r\n<li>Tip guide dan supir</li>\r\n<li>Optional tour &amp; pengeluaran pribadi</li>\r\n</ul>', '<p><strong>HARI 01 ARRIVE MAKASSAR</strong><br /><br />Setelah tiba di bandara langsung menuju hotel. Selanjutnya acara babas. Makan malam di restoran.(--/--/D) &nbsp; <br /><strong><br />HARI 02 BALLA LOMPOA &ndash; PAOTERE &ndash; FORT ROTTERDAM &ndash; LOSARI BEACH</strong><br />Setelah sarapan menuju Paotere Anchorage, pelabuhan tradisional Bugis kemudian menuju Fort Rotterdam. Setelah makan siang menuju Museum Balla Lompoa dan Kerajaan Gowa. Kembali menuju Makassar dan menikmati sunset di Pantai Losari. (B/L/D) &nbsp; <br /><strong><br />HARI 03 DEPART MAKASSAR</strong> <br />Sarapan di hotel, hari ini acara bebas bagi Anda hingga tibanya waktu untuk dibawa menuju Airport untuk penerbangan selanjutnya. (B/--/--)</p>', 3, 2),
	(2, '3D2N Toba Lake & Samosir', 1700000.00, 'IDR', '<p><span style="color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;">Bagai lautan di atas gunung, daratan tinggi Toba memiliki danau terluas dan terdalam se Asia Pasifik. Landscape indah ini diwarnai juga oleh kekayaan budaya Batak yang menarik untuk ditelusuri.&nbsp;</span><br style="box-sizing: border-box; color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;" /><span style="box-sizing: border-box; color: #373737; font-family: Lato, sans-serif; font-size: 15px; line-height: 25.5px; text-align: justify;"><strong style="box-sizing: border-box;"><br style="box-sizing: border-box;" />Destinasi</strong><strong style="box-sizing: border-box;"><span style="box-sizing: border-box;"><br style="box-sizing: border-box;" /></span></strong>Parapat, Tuktuk, Tomok, Desa Ambarita Huta Siallagan, Pangururan Puncak Tele, Tongging dan air terjun Sipiso-piso.&nbsp;</span></p>', 'Y', '<ul>\r\n<li>Rental mobil Innova (private) untuk overland&nbsp;selama 3 hari.</li>\r\n<li>Penginapan selama 2 malam di Pulau Samosir</li>\r\n<li>Retribusi pariwisata.</li>\r\n<li>Pemandu Lokal.</li>\r\n<li>Asuransi perjalanan ACA</li>\r\n</ul>', '<ul>\r\n<li>Pengeluaran pribadi</li>\r\n<li>Biaya makan</li>\r\n<li>Pengeluaran lain yang tidak termasuk klausal include</li>\r\n</ul>', '<p><strong><span style="text-decoration: underline;">Day 1: Medan &ndash; Parapat &ndash; Pulau Samosir</span></strong> <strong><span style="text-decoration: underline;">Parapat</span> </strong><br /><br />Pagi hari tiba di Bandara Kuala Namu Medan, kemudian berangkat menuju Parapat via Pematang Siantar melewati jalan lintas Trans Sumatera selama enam jam perjalanan. Horas! Tiba di Parapat lalu menyeberang ke Pulau Samosir dan mendarat di kawasan Tuktuk.&nbsp;<em>Check-in</em> di hotel (Toledo atau Carolina Hotel), makan malam dan istirahat. <strong>&nbsp;</strong> &nbsp; &nbsp; <strong>&nbsp;</strong> <strong>&nbsp;</strong> <br /><strong><br /><span style="text-decoration: underline;">Day 2: Pulau Samosir</span></strong><strong><br /><br /></strong><strong>Ambarita, Huta Siallagan.</strong> Sarapan pagi di hotel, dilanjutkan kunjungan ke Desa Ambarita untuk melihat rumah adat Batak di Huta Siallagan. Di sana, terdapat meja batu yang dahulu digunakan oleh raja untuk persidangan, tempat pemasungan dan tempat eksekusi mati bagi pelanggar hukum adat atau musuh raja. Tempat ini juga&nbsp; merupakan asal dari legenda kanibalisme orang Batak. &nbsp; <strong><br /></strong><strong>Desa Tomok</strong> Kunjungan dilanjutkan ke dengan wisata sejarah di Desa Tomok. Terdapat makam batu Raja Sidabutar yang konon merupakan orang pertama yang datang ke Pulau Samosir. Di Desa Tomok, peserta dapat melihat Tarian Sigale-Gale, yakni boneka berbentuk manusia yang dapat menari Tortor (tarian khas Batak Toba).&nbsp;Selain itu, di Tomok anda juga bisa berbelanja beraneka ragam souvenir. Sore hari kembali ke Tutuk untuk beristirahat. &nbsp; &nbsp; <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> <br /><br /><strong><span style="text-decoration: underline;">Day 3 : Pangururan &ndash; Tongging &ndash; Medan</span></strong> <strong>&nbsp;</strong> <strong>&nbsp;</strong> &nbsp; <strong><br /><br /></strong><strong>Pangururan</strong> Setelah sarapan dan <em>check-out</em> hotel, peserta berangkat menuju Pangururan. <br />Pangururan adalah lokasi yang menyatukan daratan Pulau Samosir dengan Pulau Sumatera. Disini ada lokasi yang dinamakan puncak Tele, tempat melihat danau Toba dari puncak tertinggi. <strong><br /><br /></strong><strong>Tongging dan Sipiso-Piso</strong> Tongging adalah dataran tinggi tanah Karo, dimana kita juga bisa melihat panorama danau Toba dengan sisi yang berbeda. Selain itu disini juga terdapat air terjun sipiso-piso yang tersohor itu. Dari sini kita kembali ke Bandara Kualanamu dan pulang ke tempat masing-masing.</p>', 3, 2);
/*!40000 ALTER TABLE `travelpack` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_hotel
DROP TABLE IF EXISTS `travelpack_hotel`;
CREATE TABLE IF NOT EXISTS `travelpack_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) NOT NULL DEFAULT '0',
  `hotel_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_travelpack_hotel_travelpack` (`travelpack_id`),
  KEY `FK_travelpack_hotel_hotel` (`hotel_id`),
  CONSTRAINT `FK_travelpack_hotel_travelpack` FOREIGN KEY (`travelpack_id`) REFERENCES `travelpack` (`id`),
  CONSTRAINT `FK_travelpack_hotel_hotel` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack_hotel: ~1 rows (approximately)
/*!40000 ALTER TABLE `travelpack_hotel` DISABLE KEYS */;
INSERT INTO `travelpack_hotel` (`id`, `travelpack_id`, `hotel_id`) VALUES
	(1, 1, 1);
/*!40000 ALTER TABLE `travelpack_hotel` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_image
DROP TABLE IF EXISTS `travelpack_image`;
CREATE TABLE IF NOT EXISTS `travelpack_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) NOT NULL,
  `filename` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `main_img` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `is_local` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `FK_travelpack_image_travelpack` (`travelpack_id`),
  CONSTRAINT `FK_travelpack_image_travelpack` FOREIGN KEY (`travelpack_id`) REFERENCES `travelpack` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_mytour.travelpack_image: ~8 rows (approximately)
/*!40000 ALTER TABLE `travelpack_image` DISABLE KEYS */;
INSERT INTO `travelpack_image` (`id`, `travelpack_id`, `filename`, `main_img`, `is_local`) VALUES
	(1, 1, 'img_travelpack_makasar.jpg', 'Y', 'Y'),
	(20, 2, 'img_travelpack_danau_toba.jpg', 'Y', 'Y'),
	(21, 2, 'img_travelpack_Danau-Toba.jpg', 'N', 'Y'),
	(22, 2, 'img_travelpack_IMG_4553.jpg', 'N', 'Y'),
	(23, 2, 'img_travelpack_Lake_Toba,_North_Sumatera_(13).JPG', 'N', 'Y'),
	(24, 1, 'img_travelpack_pulau_souna_9.jpg', 'N', 'Y'),
	(25, 1, 'img_travelpack_pulau-samalona.jpg', 'N', 'Y'),
	(26, 1, 'img_travelpack_wisata-pulau-kodingareng-keke-makassar.jpg', 'N', 'Y');
/*!40000 ALTER TABLE `travelpack_image` ENABLE KEYS */;


-- Dumping structure for table web_mytour.travelpack_include
DROP TABLE IF EXISTS `travelpack_include`;
CREATE TABLE IF NOT EXISTS `travelpack_include` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travelpack_id` int(11) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('I','E','T') COLLATE utf8_unicode_ci NOT NULL COMMENT 'I : Include, E:Exclude,T:Itenerary',
  PRIMARY KEY (`id`),
  KEY `FK_travelpack_include_travelpack` (`travelpack_id`),
  CONSTRAINT `FK_travelpack_include_travelpack` FOREIGN KEY (`travelpack_id`) REFERENCES `travelpack` (`id`)
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


-- Dumping structure for view web_mytour.view_destinasi
DROP VIEW IF EXISTS `view_destinasi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_destinasi` (
	`id` INT(11) NOT NULL,
	`destinasi_kategori_id` INT(11) NULL,
	`kategori` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`deskat_img` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`publish` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`nama` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`desc` MEDIUMTEXT NULL COLLATE 'utf8_unicode_ci',
	`main_img` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.VIEW_DESTINASI_KATEGORI
DROP VIEW IF EXISTS `VIEW_DESTINASI_KATEGORI`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `VIEW_DESTINASI_KATEGORI` (
	`id` INT(11) NOT NULL,
	`nama` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`filename` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`destinasi_sum` DECIMAL(32,0) NULL
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


-- Dumping structure for view web_mytour.VIEW_HOMEPAGE_TRAVEL
DROP VIEW IF EXISTS `VIEW_HOMEPAGE_TRAVEL`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `VIEW_HOMEPAGE_TRAVEL` (
	`id` INT(11) NOT NULL,
	`travelpack_id` INT(11) NULL,
	`nama` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`harga` DECIMAL(10,2) NULL,
	`currency` ENUM('IDR','USD') NULL COLLATE 'utf8_unicode_ci',
	`desc` MEDIUMTEXT NULL COLLATE 'utf8_unicode_ci',
	`publish` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`include` TEXT NULL COLLATE 'utf8_unicode_ci',
	`exclude` TEXT NULL COLLATE 'utf8_unicode_ci',
	`itinerary` TEXT NULL COLLATE 'utf8_unicode_ci',
	`day` INT(11) NULL,
	`night` INT(11) NULL
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


-- Dumping structure for view web_mytour.view_rental
DROP VIEW IF EXISTS `view_rental`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_rental` (
	`id` INT(11) NOT NULL,
	`nama` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`desc` TEXT NULL COLLATE 'utf8_unicode_ci',
	`currency` ENUM('IDR','USD') NULL COLLATE 'utf8_unicode_ci',
	`harga` DECIMAL(10,2) NULL,
	`filename` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_travel
DROP VIEW IF EXISTS `view_travel`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_travel` (
	`id` INT(11) NOT NULL,
	`nama` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`harga` DECIMAL(10,2) NULL,
	`currency` ENUM('IDR','USD') NULL COLLATE 'utf8_unicode_ci',
	`day` INT(11) NULL,
	`night` INT(11) NULL,
	`desc` MEDIUMTEXT NULL COLLATE 'utf8_unicode_ci',
	`publish` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`filename` VARCHAR(250) NULL COLLATE 'utf8_unicode_ci',
	`main_img` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`include` TEXT NULL COLLATE 'utf8_unicode_ci',
	`exclude` TEXT NULL COLLATE 'utf8_unicode_ci',
	`itinerary` TEXT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_travelpack_hotel
DROP VIEW IF EXISTS `view_travelpack_hotel`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_travelpack_hotel` (
	`id` INT(11) NOT NULL,
	`travelpack_id` INT(11) NOT NULL,
	`nama` VARCHAR(150) NULL COLLATE 'utf8_unicode_ci',
	`harga` DECIMAL(10,2) NULL,
	`currency` ENUM('IDR','USD') NULL COLLATE 'utf8_unicode_ci',
	`desc` MEDIUMTEXT NULL COLLATE 'utf8_unicode_ci',
	`publish` ENUM('Y','N') NULL COLLATE 'utf8_unicode_ci',
	`include` TEXT NULL COLLATE 'utf8_unicode_ci',
	`exclude` TEXT NULL COLLATE 'utf8_unicode_ci',
	`itinerary` TEXT NULL COLLATE 'utf8_unicode_ci',
	`hotel_id` INT(11) NOT NULL,
	`hotel` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`img_cover` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`alamat` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`desc_hotel` MEDIUMTEXT NOT NULL COLLATE 'utf8_unicode_ci'
) ENGINE=MyISAM;


-- Dumping structure for view web_mytour.view_blogs
DROP VIEW IF EXISTS `view_blogs`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_blogs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_blogs` AS select `blog`.`id` AS `id`,`blog`.`created_at` AS `created_at`,`blog`.`title` AS `title`,`blog`.`content` AS `content`,`blog`.`tags` AS `tags`,`blog`.`publish` AS `publish`,`blog`.`author_id` AS `author_id`,`blog`.`img_cover` AS `img_cover`,`users`.`username` AS `username`,`blog_category`.`name` AS `kategori`,`blog`.`category_id` AS `category_id` from ((`blog` join `blog_category` on((`blog`.`category_id` = `blog_category`.`id`))) left join `users` on((`blog`.`author_id` = `users`.`id`))) order by `blog`.`created_at` desc;


-- Dumping structure for view web_mytour.view_destinasi
DROP VIEW IF EXISTS `view_destinasi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_destinasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_destinasi` AS select `dest`.`id` AS `id`,`dest`.`destinasi_kategori_id` AS `destinasi_kategori_id`,`deskat`.`nama` AS `kategori`,`deskat`.`filename` AS `deskat_img`,`dest`.`publish` AS `publish`,`dest`.`nama` AS `nama`,`dest`.`desc` AS `desc`,`dest`.`main_img` AS `main_img` from (`destinasi` `dest` join `destinasi_kategori` `deskat` on((`dest`.`destinasi_kategori_id` = `deskat`.`id`)));


-- Dumping structure for view web_mytour.VIEW_DESTINASI_KATEGORI
DROP VIEW IF EXISTS `VIEW_DESTINASI_KATEGORI`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `VIEW_DESTINASI_KATEGORI`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `VIEW_DESTINASI_KATEGORI` AS select `dk`.`id` AS `id`,`dk`.`nama` AS `nama`,`dk`.`filename` AS `filename`,(select sum(`destinasi`.`id`) from `destinasi` where (`destinasi`.`destinasi_kategori_id` = `dk`.`id`)) AS `destinasi_sum` from `destinasi_kategori` `dk`;


-- Dumping structure for view web_mytour.view_homepage_hotel
DROP VIEW IF EXISTS `view_homepage_hotel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_homepage_hotel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_homepage_hotel` AS select `homepage_hotel`.`id` AS `id`,`hotel`.`id` AS `hotel_id`,`hotel`.`nama` AS `nama`,`hotel_room`.`nama` AS `room`,`hotel_room`.`harga` AS `harga`,`hotel_room`.`currency` AS `currency`,`hotel`.`img_cover` AS `filename` from ((`homepage_hotel` join `hotel` on((`homepage_hotel`.`hotel_id` = `hotel`.`id`))) left join `hotel_room` on((`hotel_room`.`hotel_id` = `hotel`.`id`)));


-- Dumping structure for view web_mytour.VIEW_HOMEPAGE_TRAVEL
DROP VIEW IF EXISTS `VIEW_HOMEPAGE_TRAVEL`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `VIEW_HOMEPAGE_TRAVEL`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `VIEW_HOMEPAGE_TRAVEL` AS select `ht`.`id` AS `id`,`ht`.`travelpack_id` AS `travelpack_id`,`tp`.`nama` AS `nama`,`tp`.`harga` AS `harga`,`tp`.`currency` AS `currency`,`tp`.`desc` AS `desc`,`tp`.`publish` AS `publish`,`tp`.`include` AS `include`,`tp`.`exclude` AS `exclude`,`tp`.`itinerary` AS `itinerary`,`tp`.`day` AS `day`,`tp`.`night` AS `night` from (`homepage_travelpack` `ht` join `travelpack` `tp` on((`ht`.`travelpack_id` = `tp`.`id`)));


-- Dumping structure for view web_mytour.view_hotel
DROP VIEW IF EXISTS `view_hotel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_hotel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hotel` AS select `hotel`.`id` AS `id`,`hotel`.`nama` AS `nama`,`hotel`.`alamat` AS `alamat`,`hotel`.`desc` AS `desc`,(select `constval`.`value` from `constval` where (`constval`.`name` = 'hotel_img_path')) AS `imgpath`,`hotel`.`img_cover` AS `img_cover`,(select count(`hotel_room`.`id`) from `hotel_room` where (`hotel_room`.`hotel_id` = `hotel`.`id`)) AS `jumlah_room` from `hotel`;


-- Dumping structure for view web_mytour.view_rental
DROP VIEW IF EXISTS `view_rental`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_rental`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rental` AS select `rt`.`id` AS `id`,`rt`.`nama` AS `nama`,`rt`.`desc` AS `desc`,`rt`.`currency` AS `currency`,`rt`.`harga` AS `harga`,`ri`.`filename` AS `filename` from (`rental` `rt` join `rental_image` `ri` on((`rt`.`id` = `ri`.`rental_id`))) where (`ri`.`main_img` = 'Y');


-- Dumping structure for view web_mytour.view_travel
DROP VIEW IF EXISTS `view_travel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_travel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_travel` AS select `tv`.`id` AS `id`,`tv`.`nama` AS `nama`,`tv`.`harga` AS `harga`,`tv`.`currency` AS `currency`,`tv`.`day` AS `day`,`tv`.`night` AS `night`,`tv`.`desc` AS `desc`,`tv`.`publish` AS `publish`,`tim`.`filename` AS `filename`,`tim`.`main_img` AS `main_img`,`tv`.`include` AS `include`,`tv`.`exclude` AS `exclude`,`tv`.`itinerary` AS `itinerary` from (`travelpack` `tv` left join `travelpack_image` `tim` on((`tim`.`travelpack_id` = `tv`.`id`))) where (`tim`.`main_img` = 'Y');


-- Dumping structure for view web_mytour.view_travelpack_hotel
DROP VIEW IF EXISTS `view_travelpack_hotel`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_travelpack_hotel`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_travelpack_hotel` AS select `th`.`id` AS `id`,`th`.`travelpack_id` AS `travelpack_id`,`tp`.`nama` AS `nama`,`tp`.`harga` AS `harga`,`tp`.`currency` AS `currency`,`tp`.`desc` AS `desc`,`tp`.`publish` AS `publish`,`tp`.`include` AS `include`,`tp`.`exclude` AS `exclude`,`tp`.`itinerary` AS `itinerary`,`ht`.`id` AS `hotel_id`,`ht`.`nama` AS `hotel`,`ht`.`img_cover` AS `img_cover`,`ht`.`alamat` AS `alamat`,`ht`.`desc` AS `desc_hotel` from ((`travelpack_hotel` `th` join `travelpack` `tp` on((`th`.`travelpack_id` = `tp`.`id`))) join `hotel` `ht` on((`th`.`hotel_id` = `ht`.`id`)));
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
