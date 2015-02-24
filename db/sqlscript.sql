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

-- Dumping database structure for web_tour
DROP DATABASE IF EXISTS `web_tour`;
CREATE DATABASE IF NOT EXISTS `web_tour` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `web_tour`;


-- Dumping structure for table web_tour.artikel
DROP TABLE IF EXISTS `artikel`;
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `judul` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_konten` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8_unicode_ci,
  `imageurl` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbimg` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb55` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_is_url` enum('true','false') COLLATE utf8_unicode_ci DEFAULT 'false',
  `video_instead_image` enum('true','false') COLLATE utf8_unicode_ci DEFAULT 'false',
  `videourl` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'User yang memposting artikel',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.artikel: ~9 rows (approximately)
DELETE FROM `artikel`;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
INSERT INTO `artikel` (`id`, `created_at`, `updated_at`, `kategori_id`, `judul`, `sub_konten`, `konten`, `imageurl`, `thumbimg`, `thumb55`, `image_is_url`, `video_instead_image`, `videourl`, `publish`, `user_id`) VALUES
	(9, '2014-11-21 06:20:38', '2014-12-26 15:18:22', 1, 'adnvan to borobudur', '<p>sangat senang sekali</p>', '<p>sangat senang sekali</p>', 'http://localhost/thetour/public/images/blog/blog_img_1adnvan_to_borobudur_borobudur.jpg', NULL, NULL, 'false', 'false', NULL, 'Y', NULL),
	(12, '2014-11-27 10:00:37', '2014-11-28 17:13:12', 1, 'Merantau Ke Negeri Orang', '<p>Asyik nmenyenamgkan sekali</p>', '<p>Asyik nmenyenamgkan sekali</p>', 'http://localhost/thetour/images/blog/blog_img_1Merantau_Ke_Negeri_Orang_260440_173499012712309_100001566355056_480531_2809158_n.jpg', NULL, NULL, 'false', 'false', NULL, 'Y', NULL),
	(13, '2014-11-27 10:38:22', '2014-11-27 10:38:22', 1, 'Petualangan bersama Shinchan', '<p>seru lucu dan mangkelno</p>', '<p>seru lucu dan mangkelno</p>', NULL, NULL, NULL, 'false', 'false', NULL, 'N', NULL),
	(14, '2014-12-04 10:47:11', '2014-12-04 10:47:11', 1, 'First Trail Adventure – capek juga yah..', 'Akhir pekan ini saya berkesempatan mencoba kemampuan KLX 150 di medan off-road bersama 4 orang teman penggila motor trail di Malang. Spot yang dituju adalah kawasan Taman Nasional Bromo Tengger Semeru, Malang, Jawa Timur. Sebenarnya secara persiapan saya masih jauh dari memadai, dengan tidak adanya boots maupun safety equipment lainnya yang diperlukan untuk beradventure menggunakan motor trail. Namun terlepas itu semua, pengalaman memang tetap menjadi guru yang baik dalam menentukan sikap selanj', '<p>Akhir pekan ini saya berkesempatan mencoba kemampuan KLX 150 di medan off-road bersama 4 orang teman penggila motor trail di Malang. Spot yang dituju adalah kawasan Taman Nasional Bromo Tengger Semeru, Malang, Jawa Timur. Sebenarnya secara persiapan saya masih jauh dari memadai, dengan tidak adanya boots maupun safety equipment lainnya yang diperlukan untuk beradventure menggunakan motor trail. Namun terlepas itu semua, pengalaman memang tetap menjadi guru yang baik dalam menentukan sikap selanjutnya.</p>\r\n<p><img class="alignnone size-full wp-image-634" style="display: block; margin-left: auto; margin-right: auto;" title="IMG_0682 (Small)" src="http://www.ekowahyu.com/wp-content/uploads/2009/10/IMG_0682-Small.JPG" alt="IMG_0682 (Small)" width="480" height="359" /></p>\r\n<p>Saya berangkat hari sabtu malam sekitar jam 12.30 lewat Tumpang, Malang, namun yang ditempuh adalah bukan jalur umum yang memang diperuntukkan bagi kendaraan pada umumnya, melainkan benar-benar jalur off-road yang hanya dilewati oleh para pencari kayu atau rumput.<span id="more-633"></span></p>\r\n<p>Pengalaman melewati jalur yang licin dan menanjak benar-benar menguras tenaga, apalagi ditambah dinginnya malam yang berkabut. Karena saya benar-benar mempertimbangkan masalah safety, saya tidak mengambil posisi di depan melainkan di tengah pada urutan ketiga atau keempat di antara 5 orang yang menempuh jalur ini.</p>\r\n<p><img class="alignnone size-full wp-image-635" style="display: block; margin-left: auto; margin-right: auto;" title="IMG_0730 (Small)" src="http://www.ekowahyu.com/wp-content/uploads/2009/10/IMG_0730-Small.JPG" alt="IMG_0730 (Small)" width="480" height="360" /></p>\r\n<p>Beberapa kali teman saya ada yang terjungkal karena kondisi jalan yang licin dan juga menanjak ini. Namun bukan adventure namanya kalau tidak ada tantangan.</p>\r\n<p>Sekitar jam 3.30 pagi kami sampai di pos pantau sebelah selatan gunung Bromo, sebelum pertigaan Bromo-Ranupani-Ngadas. Di situ kami sempatkan untuk menyalakan api unggun untuk menghilangkan rasa dingin yang menusuk tulang. Sambil bertukar pengalaman dan cerita ngalor ngidul tentang pengalaman off-road. Tentu ini sangat bermanfaat bagi saya yang masih pemula ini.</p>\r\n<p>Pagi hari sesudah sunrise, sekitar jam 6.30 kami mulai turun ke arah Bromo menempuh jalur ke arah kiri dari pos pantau, yang selanjutnya turun ke arah lautan pasir. Pengalaman sebenarnya benar-benar terasa di situ, yakni kemampuan mengendalikan motor dalam kecepatan sedang (gigi 2) melewati lautan pasir dengan resiko kendali motor yang meliuk-liuk karena ban selip di pasir.</p>\r\n<p><img class="alignnone size-full wp-image-636" style="display: block; margin-left: auto; margin-right: auto;" title="IMG_0769 (Small)" src="http://www.ekowahyu.com/wp-content/uploads/2009/10/IMG_0769-Small.JPG" alt="IMG_0769 (Small)" width="480" height="359" /></p>\r\n<p>Kami mampir sebentar di sumber air suci sebelah selatan gunung batok untuk membuka bekal seadanya dan sarapan pagi di situ, sebelum akhirnya meluncur ke arah Cemoro Lawang untuk isi bahan bakar.</p>\r\n<p>Sengaja kami tidak mendekat ke bromo karena memang bukan itu tujuan kami yang utama, sehingaa dari Cemoro Lawang kami langsung banting stir ke arah kiri di sisi utara Bromo, untuk kemudian mengarah ke timur-selatan, pulang melewati pertigaan Ranupani-Bromo-Ngadas lewat jalur konvensional.</p>\r\n<p>Benar-benar melelahkan tetapi sangat puas dengan pengalaman adventure kali ini. Semoga ga kapok, he he he &hellip;.</p>\r\n<p><img class="alignnone size-full wp-image-670" style="display: block; margin-left: auto; margin-right: auto;" title="IMG_0802 copy" src="http://www.ekowahyu.com/wp-content/uploads/2009/10/IMG_0802-copy.jpg" alt="IMG_0802 copy" width="478" height="358" /></p>\r\n<p>Yang saya sempat sesali, kemaren tidak beran bawa kamera DSLR karena khawatir jalur yang dilewati berbahaya dan resiko jatuh dari sepeda motor sehingga memungkinkan kamera untuk mengalami benturan.</p>\r\n<p>Spot yang saya lewati sebenarnya sangat bagus untuk diabadikan, apalagi menggunakan lensa ultra wide. Mungkin nanti saya akan kembali ke sana melewati jalur konvensional untuk murni tujuan hunting foto.</p>', 'http://www.ekowahyu.com/wp-content/uploads/2009/10/IMG_0682-Small.JPG', NULL, NULL, 'false', 'false', NULL, 'Y', NULL),
	(15, '2014-12-04 10:58:13', '2014-12-04 10:58:13', 1, 'Mountain Biking – ketika nyali aja gak cukup', NULL, '<p>Judul yang seolah-olah sangat provokatif dan underestimate.</p>\r\n<p>Tapi memang benar demikian adanya. Olah raga Mountain Biking atau lebih sering disebut MTB dengan beberapa genre yang mendekati tataran high-risk (AM &ndash; FR &ndash; DH) membutuhkan banyak hal selain hanya NYALI. Ada dua hal penting yang perlu benar-benar diperhatikan saat kita ingin memanjakan diri bermain sepeda gunung. Dua hal tersebut adalah</p>\r\n<p>1. Skill dan Teknik &ndash; sesuatu yang perlu dilatih dan diasah secara rutin sehingga jika dikombinasikan dengan NYALI akan sangat signifikan hasilnya.</p>\r\n<p>2. Safety &ndash; Banyak pilihan untuk melengkapi diri dengan perangkat keselamatan (safety gears) ketika bersepeda gunung. Yang paling minim adalah HELM, disusul dengan Knee Pad / Shin Guard, Elbow Guard, Chest Protector dan yang terakhir Neck Brace.&nbsp;<span id="more-1426"></span></p>\r\n<p>Untuk skill dan teknik, prinsip dasarnya sebenarnya gampang. Latihan dan Latihan. Tidak ada ceritanya kita tiba-tiba langsung bisa melibas belokan dengan teknik cornering yang sempurna, atau tiba-tiba kita melewati drop off walaupun hanya setinggi 50 cm lalu bisa landing dengan sempurna. Semuanya butuh latihan dan penguasaan teknik yang mumpuni. Tidak jarang ketika seseorang hanya bermodal NYALI, yang ditemui pada akhirnya adalah luka-luka, bahkan pada tataran ekstrim adalah PATAH TULANG.</p>\r\n<p>Selanjutnya adalah perangkat keselamatan. HELM memang yang utama. Tanpa helm yang mumpuni, jangan coba-coba mencari perkara dengan bermain sepeda gunung apalagi untuk genre AM-FR maupun DH. Helm adalah komponen VITAL yang melindungi kepala kita ketika terjadi benturan. Tidak jarang meskipun pakai helm yang standar pun, risiko gegar otak masih bisa ditemui ketika teknik jatuhan tidak sempurna dan kepala terbentur terlalu keras.</p>\r\n<p>Knee Pad adalah komponen kedua yang penting dalam menunjang keamanan bersepeda. Lutut adalah komponen penyangga tubuh yang sangat beresiko tinggi apabila terkena benturan keras. Jangankan sampai tempurung lutut retak, hanya berubah tempat saja sudah bisa membuat seseorang tidak bisa berjalan berbulan-bulan.</p>\r\n<p>Shin Guard atau pelindung tulang kering (yang biasanya menjadi satu dengan kneepad) adalah pilihan perangkat keselamatan lainnya. Dia bisa melindungi tulang kering dari benturan terhadap bebatuan, pohon, ata bahkan pedal sepeda pun yang kadang-kadang juga bisa menyebabkan luka serius.</p>\r\n<p>Elbow Guard atau pelindung siku adalah opsi berikutnya. Silakan dicoba sendiri apa yang terjadi jika siku kita terkena benturan. Istilah jawabnya &ldquo;kesetrum&rdquo; adalah sensasi saat siku terkena benturan. Dalam kondisi ekstrim, ini bisa berakibat fatal dan menyebabkan fungsi tangan mejadi tidak maksimal.</p>\r\n<p>Chest Protector atau pelindung dada (dan sekaligus tulang belakang/backbone) adalah perangkat keselamatan berikutnya jika kita sudah mulai bermain sepeda pada tahapan lebih, yaitu dengan resiko yang lebih tinggi&hellip; misalnya high speed trailing sampai ke Downhill (DH). Benturan pada tulang rusuk, dada, dan tulang belakang bisa berakibat fatal. Tidak jarang yang terjadi di lapangan adalah ketika jatuh, posisi handlebar / stem berada di depan dada dan langsung menghujam dada, bisa dibayangkan sendiri apa risikonya. Demikian pula bagian tulang belakang. Yang tidak terbiasa membawa backpack mungkin akan lebih beresiko tinggi apabila tulang belakang mengalami benturan. INGAT !! Tulang belakang adalah PUSAT SYARAF manusia, sedikit terjadi kesalahan bisa berakibat SANGA FATAL.</p>\r\n<p>Neck Brace adalah perangkat terakhir dengan tingkat risiko paling tinggi. Neck Brace melindungi leher Anda dari gerakan yang berlebihan saat kepala (helm) mengalami benturan. Neck brace membatasi gerakan kepala hanya untuk bisa tengok kanan dan kiri, tanpa gerakan berlebih ke atas dan ke bawah, ke samping kanan dan kiri. Dengan Neck Brace, leher bisa terlindungi dan mengurangi risiko cedera serius.</p>\r\n<p>Terlepas dari semua perangkat keselamtan di atas, yang paling utama adalah DOA. Biasakan berdoa sebelum mulai bersepeda, karena kita tidak pernah tahu apa yang akan terjadi di Track.</p>\r\n<p>Tuhan bersama orang-orang yang berseped a&hellip;.</p>\r\n<p>&nbsp;</p>\r\n<p><a href="http://www.ekowahyu.com/wp-content/uploads/2014/04/nyali-gak-cukup.jpg"><img class="aligncenter size-medium wp-image-1428" src="http://www.ekowahyu.com/wp-content/uploads/2014/04/nyali-gak-cukup-180x300.jpg" alt="nyali-gak-cukup" width="180" height="300" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a href="http://www.ekowahyu.com/wp-content/uploads/2014/04/416475_657748204253648_873760032_o.jpg"><img class="aligncenter size-medium wp-image-1433" src="http://www.ekowahyu.com/wp-content/uploads/2014/04/416475_657748204253648_873760032_o-178x300.jpg" alt="416475_657748204253648_873760032_o" width="178" height="300" /></a></p>\r\n<p>&nbsp;</p>\r\n<p><a href="http://www.ekowahyu.com/wp-content/uploads/2014/04/12.jpg"><img class="aligncenter size-medium wp-image-1432" src="http://www.ekowahyu.com/wp-content/uploads/2014/04/12-224x300.jpg" alt="12" width="224" height="300" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a href="http://www.ekowahyu.com/wp-content/uploads/2014/04/1970733_797981233563677_598121009_n.jpg"><img class="aligncenter size-medium wp-image-1429" src="http://www.ekowahyu.com/wp-content/uploads/2014/04/1970733_797981233563677_598121009_n-220x300.jpg" alt="1970733_797981233563677_598121009_n" width="220" height="300" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a href="http://www.ekowahyu.com/wp-content/uploads/2014/04/IMG_4619.jpg"><img class="aligncenter size-medium wp-image-1430" src="http://www.ekowahyu.com/wp-content/uploads/2014/04/IMG_4619-300x225.jpg" alt="IMG_4619" width="300" height="225" /></a></p>\r\n<p>&nbsp;</p>', 'http://www.ekowahyu.com/wp-content/uploads/2014/04/1970733_797981233563677_598121009_n-220x300.jpg', NULL, NULL, 'false', 'false', NULL, 'Y', NULL),
	(16, '2014-12-04 11:02:15', '2014-12-04 11:04:33', 1, 'SOLO TOURING KAWASAKI KLX 150L, SURABAYA-LAMPUNG VIA PANTURA', '<p>Halo bro. Ini saya mau cerita kegiatan solo touring yang sebenarnya sudah terjadi di akhir bulan Juni lalu, tepatnya di hari Sabtu, 28 Juni 2014, dan bertepatan juga dengan hari pertama puasa ramadhan bagi yang mengikuti ajaran Muhammadiyah.&nbsp;</p>', '<p style="text-align: justify;">Halo bro. Ini saya mau cerita kegiatan solo touring yang sebenarnya sudah terjadi di akhir bulan Juni lalu, tepatnya di hari Sabtu, 28 Juni 2014, dan bertepatan juga dengan hari pertama puasa ramadhan bagi yang mengikuti ajaran Muhammadiyah.&nbsp;</p>\r\n<p style="text-align: justify;">Rute solo touring kali ini adalah dari Surabaya ke Lampung dengan melewati jalur Pantai Utara (Pantura) Jawa. Tujuan sebenarnya sih bukan murni untuk touring, tapi pulang ke kampung halaman sampai Lebaran selesai.</p>\r\n<p style="text-align: justify;">Nah, untuk touring kali ini saya nggak melakukan persiapan yang berlebihan. Hanya melakukan istirahat yang cukup di malam hari agar badan tetap fit saat touring yang menempuh jarak cukup lama itu.</p>\r\n<p style="text-align: justify;">Pada touring ini saya membawa satu tas ransel berukuran 45 liter. Tas ini cuma berisi laptop, pakaian, jas hujan, ban dalam serep, kotak P3K, dan beberapa tools yang mungkin diperlukan dalam keadaan darurat. Selain itu saya juga membawa tas lebih kecil yang berisi kamera DSLR dan dompet.</p>\r\n<p style="text-align: justify;">Untuk riding gear, saya menggunakan jaket Respiro Alpha R3, celana jeans, helm SNAIL MX311 Supermoto, sepatu 7Gear SportMax Black, sarung tangan REV&rsquo;IT! Bomber, dan protektor lutut merk FOX. Nah seperti apa rasanya touring jarak jauh dengan motor Kawasaki KLX 150L?</p>', 'http://i1.wp.com/klxadventure.com/wp-content/uploads/2014/08/IMG_20140628_060031.jpg?resize=672%2C372', NULL, NULL, 'false', 'false', NULL, 'Y', NULL),
	(18, '2014-12-26 15:27:25', '2015-01-27 10:06:14', 2, 'Terpikat di Raja Ampat', '<p><strong>Alfred Russel Wallace</strong> menyadari kapal yang ditumpanginya tidak berlayar sesuai yang diharapkan. Gurulampoko yang bertindak sebagai juru mudi dan pemandu dalam perjalanan dari Seram menuju Misool berusaha meyakinkan bahwa kapal bisa menyeberang ke Silinta.&nbsp;</p>', '<p><strong>Alfred Russel Wallace</strong> menyadari kapal yang ditumpanginya tidak berlayar sesuai yang diharapkan. Gurulampoko yang bertindak sebagai juru mudi dan pemandu dalam perjalanan dari Seram menuju Misool berusaha meyakinkan bahwa kapal bisa menyeberang ke Silinta. Namun hembusan angin kencang disertai gelombang laut tinggi mengaduk-aduk lambung kapal. Kapal terbawa arus kembali menuju barat, bukannya bergerak ke arah timur. Para awak kapal berusaha sekeras tenaga untuk menjaga laju kapal, namun sayang angin jua yang menjadi kendala untuk melepas jangkar di Pulau Misool.</p>\r\n<p>&nbsp;<img style="display: block; margin-left: auto; margin-right: auto;" src="../../../../adm/js/fileman/Uploads/Images/blog/Keindahan_gambar_raja_ampat_6.jpg" alt="" width="629" height="370" /></p>\r\n<p>Sirna sudah niat Wallace menemui <strong><strong>Charles Allen</strong></strong>, seorang rekan yang kehabisan bekal makanan di <strong><strong>Pulau Misool</strong></strong>. Kapal yang ditumpangi Wallace sekarang mengarahkan moncong ke arah utara menuju <strong><strong>Waigeo</strong></strong>, hembusan angin kencang, gelombang laut tinggi, serta arus yang tidak bersahabat menjadi teman perjalanan Wallace. Namun setelah menempuh perjalanan laut yang berbahaya, Wallace meraih mujur, kapal yang dikemudikan Gurulampoko berlabuh juga di Waigeo (dalam catatannya Wallace menyebutnya: Waigiou).</p>\r\n<p>&nbsp;Wallace menghabiskan waktu di Waigeo pada Juni &ndash; September 1860. Pulau ini adalah salah satu pulau besar meneliti aneka ragam flora dan fauna di wilayah Kepala Burung. Penelitian Wallace di Kepulauan Nusantara diyakini sebagai dasar teori Evolusi Charles Darwin. Surat yang tersohor dengan sebutan <em><em><strong><strong>Letter from Ternate</strong></strong> </em></em>(surat asli berjudul <strong><strong><em><em>On the Tendency of Varieties to Depart Indefinetely from the Original Type</em></em></strong></strong>) mengemukakan tentang bagaimana sebuah spesies berubah bentuk dari pendahulunya sehingga menjadi lebih kuat dan sempurna.&nbsp;</p>\r\n<p>Wallace mungkin satu dari beberapa orang ilmuwan yang menjadikan Raja Ampat sebagai laboratorium penelitiannya. Penjelajahannya di <strong><strong>Raja Ampat</strong></strong> tertulis dalam buku <strong><strong><em><em>The Malay Archipelago</em></em></strong></strong> yang banyak dijadikan acuan bagi para ilmuwan dan pejalan untuk mengenal Kepulauan Nusantara lebih dekat. Sebelum meninggalkan kawasan Raja Ampat, Wallace merinci bawaannya: 73 spesies burung, 12 diantaranya jenis baru serta 24 spesimen cenderawasih merah.</p>\r\n<p>Beratus tahun setelah penjelajahan Wallace, <strong><strong>Max Ammer </strong></strong>mendatangi kawasan ini. Niatnya, mirip-mirip, dan mungkin lebih &lsquo;gila&rsquo;: mencari jip-jip terlantar dan bangkai pesawat yang tenggelam sisa <strong><strong>Perang Dunia II</strong></strong> di Raja Ampat. Tahun 1998, delapan tahun setelah kedatangannya di Raja Ampat, Max bertindak sebagai pemandu ahli ikan, <strong><strong>Gerry Allen</strong></strong>. Rimba laut Raja Ampat membuat sang ahli berdecak kagum "Inilah surga penyelaman dan laboratorium eksplorasi biota laut."</p>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Kami memilih Desa Arborek sebagai titik penyelaman pertama di hari kedua. Pagi yang cerah berpadu laut jernih serta arus yang tenang.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong><strong>Perjalanan kami dimulai dari Sorong</strong></strong>. Kota di ujung pulau berbentuk kepala burung ini adalah gerbang utama menuju Raja Ampat. Sorong mulai ramai semenjak perusahaan minyak Belanda <strong><strong><strong><em>Nederlandsche Nieuw Guinea Petroleum Maatschappij</em></strong></strong></strong> memulai kegiatannya pada tahun 1935. Belakangan, letaknya yang strategis membuat Sorong menjadi kota utama dalam arus perdagangan di barat Pulau Papua.</p>\r\n<p>Di pelabuhan rakyat tak jauh dari kantor navigasi kelautan Kota Sorong, dua <em><em>speed boat</em></em> bermesin dengan daya 200 PK sudah menunggu kami. Rasanya, dengan perahu ini perjalanan laut tak akan memakan waktu lama. Bagi pejalan solo atau backpacker yang ingin bertulang di rimba laut Raja Ampat sebenarnya tak terlalu sulit karena transportasi umum berupa feri dan <em><em>speed boat</em></em> melayani rute <strong><strong>Sorong - Waisai</strong></strong>, ibu kota Kabupaten Raja Ampat.</p>\r\n<p><em><em>Speed boat</em></em> kami mulai melaju membelah <strong><strong>selat Dampier</strong></strong> yang memisahkan daratan Papua dengan Kepulauan Raja Ampat. Gelombang pagi itu cukup bersahabat untuk menemani perjalanan kami.</p>\r\n<p>"Raja Ampat ya begini-begini saja di atasnya. Tunggu sampai kita turun ke laut nanti" ujar <strong><strong>Nicholas Saputra</strong></strong> diantara deru mesin kapal. Nico yang gemar bertualang ke penjuru Nusantara mengiming-imingi suguhan bawah laut keindahan terumbu karang dan ikan yang beraneka warna. Sontak ucapannya membangkitkan imajinasi saya tentang ikan-ikan yang menari gemulai diantara terumbu nan berkilau bak pelangi.</p>\r\n<p>Kami melewati <strong><strong>Pulau Kri</strong></strong> dan <strong><strong>Pulau Mansuar</strong></strong> yang dipisahkan oleh Tanjung Kri. Hutan lebat nan hijau memayungi seluruh daratan, ditepian pulaunya pasir-pasir berkilau diterpa sinar matahari. Satu dua rumah mengisi bibir pantainya.&nbsp; Beberapa eco lodge tampak kosong, mungkin musim ramai kunjungan wisatawan sudah berlalu. Atau mungkin jarang yang berkunjung karena biaya yang mahal ? Sepertinya begitu. Tapi satu yang saya percaya, bahwa tidak ada biaya yang murah menuju surga bukan ?</p>\r\n<p>"Nah itu, yang ada umbul-umbul" Michael Sjukrie, penyelam kawakan dari Jakarta, menunjuk sebuah dermaga <em><em>ecolodge</em></em> tempat tinggal kami selama sepekan ke depan. Lima belas menit kemudian kapal kami merapat di dermaga. Kami memindahkan seluruh barang bawaan. Teman seperjalanan sudah duluan menuju dermaga tapi saya urung meninggalkan kapal. Saya menundukkan kepala, lalu menyentuh air laut. Mungkin &nbsp;agak sedikit berlebihan, saya memercikkan air laut ke wajah berusaha meyakinkan kalau saya di Raja Ampat.</p>\r\n<p>Mengapa saya masih belum percaya tiba di destinasi impian itu? Inilah sekelumit cerita. Saya tengah merayakan pergantian umur ke-22 di pos III, tak jauh dari puncak Gunung Kerinci. Dalam pendakian menuju pos itu, saya nyaris mati tersambar petir. Jaraknya hanya 15 meter dari tempat saya berteduh. Dini hari menjadi saat mengharukan bagi saya, tak ada lilin ulang tahun, kue, atau ucapan dari kekasih. Hanya ada secangkir kopi untuk bertiga, sahabat pendakian, dan lantunan doa. Sebagai seorang pejalan, memasukkan kata Raja Ampat dalam harapan tempat yang harus dikunjungi sebelum mati adalah sebuah keharusan. Begitu pula doa saya dini hari itu, Azim, sahabat saya, berseloroh, &ldquo;Doanya yang banyak, mumpung kita diketinggian. Jadi, Tuhan dengar doanya lebih cepat.&rdquo;</p>\r\n<p>&ldquo;Zim, kau benar kawan!&rdquo; saya berguman dalam hati kemudian berlalu menuju penginapan kami di Raja Ampat.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><strong>&ldquo;Selamat datang di Pulau Mansuar</strong></strong>. Silakan Mas, ini handuk dan jusnya,&rdquo; staf di penginapan kami menawarkan keramahan. Di pulau ini, aura keramahan dan ketenangan adalah sajian mutlak. Lupakan ingar-bingar perkotaan yang sesak, tak ada polusi udara dan suara yang membisingkan telinga. Di balik pohon mangrove dan kelapa yang menaungi tepian lautnya, hanya ada ketenangan. Di daratan, sumber suara hanya tiga: manusia yang berbicara, deburan ombak yang pecah di pantai, serta gesekan pohon yang digoyangkan angin.</p>\r\n<p>&nbsp;</p>\r\n<p>Kami meregangkan badan sembari bersantai di tepian laut. Beberapa meter dari tempat saya duduk, kegaduhan mulai terlihat. Kawanan ikan berenang ke sana-kemari. Di pulau ini, ingar-bingar baru terasa saat kita berada di bawah laut. Bayangkan saja tempat ini adalah rumah bagi <strong><strong>1.300 spesies ikan dan 75% jenis terumbu karang dunia</strong></strong> terhampar di kedalaman lautnya. Hanya di sini keramaian ikan yang melesat di belantara terumbu tersaji indah, kegaduhan yang berkesan.</p>\r\n<p>&nbsp;</p>\r\n<p>Di kejauhan, Pulau Waigeo, tempat Wallace meneliti keanekaragaman hayati terlihat jelas. Di situlah Wallace menemukan cenderawasih yang menghebohkan dunia barat kala itu. Burung surga itu mampu memikat siapa saja karena rupanya yang menawan.</p>\r\n<p>&nbsp;</p>\r\n<p>Sore ini tim kami akan melakukan penyelaman pertama &ldquo;Kita <em><em>dive check</em></em> dulu ya. Tak jauh-jauh, kita <em><em>nyelam</em></em>-nya di dermaga saja.&rdquo; Ken, <em><em>divemaster</em></em> asal Manado yang akan memandu penyelaman memberikan arahan.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Cahyo Alkantana, seorang petualang, bersiap lepas landas menggunakan paramotor di Pulau Mansuar.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>Saya tidak bergabung dengan penyelaman pertama. Bersama <strong><strong>Cahyo Alkantana</strong></strong>, seorang petualang dan videografer bawah air, kami beranjak ke perkampungan penduduk di dekat penginapan. Tujuannya, mencari pantai yang bentangannya lumayan panjang sehingga paramotor (paralayang yang ditambahkan mesin) dapat mengudara.</p>\r\n<p>&nbsp;</p>\r\n<p>Warga <strong><strong>Desa Kurkapa</strong></strong> berbondong-bondong melihat kami yang bersusah mayah merentangkan parasut. Setelah tali-temali kusut sudah terjalin benar, sekarang saatnya menunggu angin dari arah berlawanan yang akan membantu parasut mengembang di udara.</p>\r\n<p>&nbsp;</p>\r\n<p>&ldquo;Yud, beri kode ya kalau parasutnya sudah sempurna untuk <em><em>take off</em></em>,&rdquo; Cahyo memberi instruksi lewat radio komunikasi.</p>\r\n<p>&nbsp;</p>\r\n<p>&ldquo;Siap, Mas!&rdquo; Saya menimpali sembari mengacungkan jempol.</p>\r\n<p>&nbsp;</p>\r\n<p>Mesin <strong><strong>paramotornya</strong></strong> sudah menderu, tapi angin belum cukup kuat menerbangkan parasut. Saya melihat penanda angin yang kami pasang di tepian pantai. Tak seperti menunggu angin biasanya, kali ini menunggu angin datang berembus terasa membosankan. Seharusnya di pantai angin bertiup kencang, tapi tak berlaku di tepian Pulau Mansuar.</p>\r\n<p>&nbsp;</p>\r\n<p>Angin yang kami tunggu setelah sekian lama akhirnya datang juga, parasut sudah terbentang sempurna.</p>\r\n<p>&nbsp;</p>\r\n<p>&ldquo;<em><em>Ready</em></em>, Pak Cahyo.&rdquo; Saya berteriak melalui radio.</p>\r\n<p>&nbsp;</p>\r\n<p>Cahyo pun menggas paramotornya. Lalu, ia berlari menyisir pantai.</p>\r\n<p>&nbsp;</p>\r\n<p>Sayang, aksi Cahyo harus pupus. Parasut yang sudah terbentang tersangkut di daun kelapa. Niat untuk terbang sore itu gugur sudah. Kami menarik parasut lalu melipatnya. Dengan raut kecewa, kami kembali ke penginapan.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong><strong>Perayaan Natal akan berlangsung</strong></strong> dalam hitungan hari, dermaga di Desa Arborek dipasangi umbul-umbul serta hiasan yang dibuat dari daun kelapa. Laut di sekitar dermaga Arborek sangat tenang. &ldquo;Ini laut atau danau sih?&rdquo; sebut Vitra Widinanda, yang mengurusi urusan pemasaran dan komunikasi majalah ini. Ia yang menjadi rekan perjalanan saya dan sekaligus pengatur acara. Kami memutuskan berkeliling di <strong><strong>Desa Arborek</strong></strong>, sementara rekan lain telah &lsquo;lenyap&rsquo; di kedalaman laut.</p>\r\n<p>Pagi itu, penduduk dari Pulau Waigeo di seberang <strong><strong>Arborek</strong></strong> bersiap pulang menuju ke desa mereka. Semalam ada kebaktian di <strong><strong>Gereja Eben Haezer</strong></strong>, satu-satunya gereja yang ada di Arborek. Perahu kayu sepanjang sepuluh meter itu penuh dengan penumpang. Penduduk desa beramai-ramai melepas kepulangan mereka. &ldquo;Wuuuuu&hellip; wuuu&hellip; wuu!&rdquo; Teriakan itu sontak menarik minat saya untuk ikut berteriak dan melambai-lambaikan tangan. Penduduk desa tertawa, saya balik tertawa, hasilnya kami berteriak sembari tertawa melepas kepulangan mereka.</p>\r\n<p>&nbsp;</p>\r\n<p>Penduduk Arborek sebagian hidup sebagai pengerajin. Hasil kreasi mereka berupa topi dengan motif baw&ndash;sebutan warga untuk manta&ndash;menjadi daya tarik dari kerajinan tangan karya penduduk desa. Arborek pun merupakan satu dari beberapa desa wisata yang ada di Raja Ampat.</p>\r\n<p>&nbsp;</p>\r\n<p>Sebagian besar masyarakat yang hidup di kawasan Raja Ampat masih menjalankan tradisi-tradisi yang erat kaitannya dengan kelestarian alam. Salah satunya adalah sasi, sebuah tradisi yang melarang warganya untuk menangkap ikan dan aneka hewan laut dalam kurun waktu yang sudah ditentukan. Tujuannya, tentu sudah jelas, upaya pelestarian terhadap kekayaan laut mereka. Dan yang terpenting, bahwa tradisi juga bisa diselaraskan dengan upaya konservasi.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Usai dari Arborek kami menuju titik selam: <strong><strong>Manta Point</strong></strong>. Di sini lah tempat favorit bagi para penyelam untuk melihat atraksi ikan-ikan manta dengan sayap hingga tiga meter panjangnya. Kapal kami melepas sauh di perairan dangkal tak jauh dari Manta Point. Setiap orang mulai memasang perlengkapan selam dan memastikan semua bekerja dengan baik.</p>\r\n<p>&nbsp;</p>\r\n<p>Kami mulai turun perlahan-lahan menuju dasar laut, beberapa penyelam sudah lebih dulu tiba di <em><em>cleaning station</em></em>-nya pari manta di kedalaman 15 meter. Namun bagi penyelam, tempat ini menjadi panggung untuk melihat tarian ikan yang dalam penerawangan saya mirip tokoh hantu dalam film horor. Bagaimana tidak, warnanya kelam di bagian atas tapi putih di bagian bawah. Mulutnya menganga lebar dengan sayap panjang, belum lagi ekornya yang tidak sebanding dengan ukuran badannya. &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Pada penyelaman ini, kami berjumpa tiga manta. Masing-masing berputar mengitari batu karang berukuran kurang lebih dua meter yang ada di permukaan laut. Satu manta dengan lebar sekitar tiga meter berhenti tepat di muka saya. &ldquo;Hei Bung, jangan melongo saja!&rdquo; saya seakan mendengar teriakan manta, tubuh saya kaku melihat kepakan sayap manta yang berjarak beberapa sentimeter saja dari wajah. Benar-benar gila bagi saya yang baru pertama kali melihat manta secara langsung.</p>\r\n<p>&nbsp;</p>\r\n<p>Hari ketiga di Raja Ampat, saya seharusnya melakukan pengamatan burung, mengintip aksi si cenderawasih di Pulau Waigeo. Namun kegiatan itu urung saya lakukan, kemudian memilih untuk ikut penyelaman. Titik selam pertama pagi itu adalah <strong><strong>Cape Kri</strong></strong>. Letaknya tak jauh dari penginapan kami. Ken menjadi yang pertama turun, lalu kami menyusulnya. Di sini kami menemui kawanan ikan barakuda, hiu sirip putih, napoleon, dan lainnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Tak jauh dari Cape Kri, kumpulan karang yang tak terlalu luas muncul dari permukaan laut. Inilah titik penyelaman berikutnya, <strong><strong>Mike&rsquo;s Point</strong></strong>. Berbeda dengan Cape Kri yang tenang, tempat selam ini arusnya cukup keras.</p>\r\n<p>&nbsp;</p>\r\n<p>&ldquo;Yud, hati-hati arus laut lumayan kuat. Jangan sampai terseret ke karang,&rdquo; Ken mengingatkan. Saya memberi isyarat dengan telunjuk dan jempol yang dibentuk menyerupai huruf O sebagai pertanda.</p>\r\n<p>&nbsp;</p>\r\n<p>Saya melakukan <em><em>back roll entry</em></em> dan &ldquo;Byuuurrr,&rdquo; Benar saja, arus cukup kuat membawa tubuh saya hanyut ke arah karang, dengan cepat saya berusaha mengendalikan keseimbangan. Saya mengambil jeda, membersihkan lalu memasangkan mask, kemudian mengenakan regulator.</p>\r\n<p>&nbsp;</p>\r\n<p>Saya mengurangi udara di BCD secara perlahan-lahan. Tubuh saya mulai tenggelam ke dalam rimba laut Raja Ampat. Inilah titik penyelaman yang membuat saya terkesima, taman bawah laut yang dipenuhi karang lunak ini semakin sempurna dengan hadirnya aneka rupa ikan.</p>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Warna-warni terumbu karang di titik penyelaman Cape Kri. Ini hanyalah sebagian dari banyak jenis terumbu karang yang dapat ditemukan di perairan ini.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Saya mengikuti penyelam lain, sebelum laju terhenti oleh kehadiran seekor penyu sisik. Di sini pula kami bertemu hiu, ukurannya tidak terlalu besar. Tapi lebih dari cukup untuk menambah pengalaman kami melihat berbagai macam biota yang hidup di perairan ini. Kami mengakhiri penyelaman di <strong><strong>Kuburan Reef</strong></strong>, saat petang sudah datang. Di tempat ini kami menemui kelinci laut dan kuda laut kerdil.</p>\r\n<p>&nbsp;</p>\r\n<p>Suasana makan malam sama hebohnya dengan malam sebelumnya. Namun, kali ini saya adalah pendosa yang harus di sidang atas &lsquo;kejahatan&rsquo; yang tidak saya ketahui. Ceritanya begini. Nicholas Saputra mendapati saya menabrak seekor kuda laut kerdil yang ukurannya sangat kecil &ldquo;Yud, <em><em>lu</em></em> harus tanggung jawab. <em><em>Nyerocos</em></em> ke sana-kemari. <em><em>Lu</em></em> sadar gak, kalau <em><em>lu udah nabrak</em></em> pigmy sea horse lagi menyeberang. Sudah renta pula,&rdquo; Nico menghakimi saya. &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Hujatan demi hujatan dalam suasana bercanda saya terima dengan lapang dada. Rekan perjalanan lainnya, mulai dari Zamroni, Indra, Husni, hingga Ucu rekan turut menimpali. Saya tidak punya kekuatan untuk membela diri. Saya membatin, di perairan dangkal Raja Ampat nan kaya, sulit sekali bagi saya melihat satwa laut sekecil itu.</p>\r\n<p>&nbsp;</p>\r\n<p>Raja Ampat memiliki lebih kurang 2.500 pulau dan gugusan karang. Selama pelawatan di Raja Ampat, saya bahkan tak sampai mengunjungi 1% kawasan ini. Terlalu luas dan beraneka ragam biota yang bisa ditemukan di tanah ini. Daerah ini pun dideklarasikan sebagai kawasan perlindungan hiu dan manta, tak main-main luasnya mencapai 46.000 km persegi. Ini bisa menjadi awal untuk mengurangi pembunuhan hiu secara masal yang ditangkap dari perairan Raja Ampat.</p>\r\n<p>&nbsp;</p>\r\n<p>Penetapan kawasan pelestarian ini setidaknya membawa angin segar bagi saya yang terpukau oleh hiu sirip putih yang bebas berenang di dermaga Wayag. Hari terakhir dalam perjalanan ke Raja Ampat, kami sempatkan menuju puncak Wayag. Dibutuhkan waktu lebih dari tiga jam menggunakan kapal cepat untuk mencapai gugusan karst yang memukau ini. Jika menggunakan kapal kayu, mungkin akan memakan waktu lebih lama.</p>\r\n<p>&nbsp;</p>\r\n<p>Wayag, cenderawasih, serta kekayaan perairan dangkal Raja Ampat telah menjadi daya pikat utama dari tempat ini. Namun upaya pelestarian kawasan yang berkelanjutan adalah hal terpenting dari sekedar menjual keindahan lanskap dan pemandangan bawah laut semata. Dan, saya pun terpikat pada nirwana di timur Indonesia ini. Paling penting, doa saya terkabul!&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Inilah pemandangan ikonik yang mengangkat pamor Raja Ampat di mata dunia selain bawah lautnya yang kaya oleh ikan dan terumbu karang. Wayag nan indah dipenuhi pulau-pulau karst dikelilingi laut jernih.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>- See more at: http://www.ranselkosong.com/2014/09/terpikat-raja-ampat.html#sthash.12Z1j5RX.dpuf</p>', 'http://localhost/thetour/public/images/blog/blog_img_2Terpikat_di_Raja_Ampat_raja-ampat-ku.jpg', NULL, NULL, 'false', 'false', NULL, 'Y', NULL),
	(19, '2014-12-26 15:36:55', '2014-12-31 14:51:38', 1, 'Mengarungi Jeram Kali Baru, Bogor', '<p><strong>Sungai Cicatih dan Citarik</strong> di <strong>Sukabumi</strong> ataupun <strong>Cikandang di Garut</strong> mungkin sudah familiar di telinga para pecinta olahraga arung jeram dan kayak. Namun tak jauh dari ibukota, tepatnya di <strong>Kota Bogor</strong>, jeram di <strong>Kali Baru</strong> tak kalah menantang. Saya memacu dopamin mengarungi jeram-jeram yang menegangkan sepanjang delapan kilometer.</p>', '<p>&nbsp;</p>\r\n<div><strong>Sungai Cicatih dan Citarik</strong> di <strong>Sukabumi</strong> ataupun <strong>Cikandang di Garut</strong> mungkin sudah familiar di telinga para pecinta olahraga arung jeram dan kayak. Namun tak jauh dari ibukota, tepatnya di <strong>Kota Bogor</strong>, jeram di <strong>Kali Baru</strong> tak kalah menantang. Saya memacu dopamin mengarungi jeram-jeram yang menegangkan sepanjang delapan kilometer.</div>\r\n<div><br />\r\n<table class="tr-caption-container" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><a href="http://3.bp.blogspot.com/-eMa0T63iYEs/VDetfybMvkI/AAAAAAAADNI/Jwoaw5B_mQs/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_1.jpg"><img style="display: block; margin-left: auto; margin-right: auto;" title="" src="http://3.bp.blogspot.com/-eMa0T63iYEs/VDetfybMvkI/AAAAAAAADNI/Jwoaw5B_mQs/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_1.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></td>\r\n</tr>\r\n<tr>\r\n<td class="tr-caption">Inilah riverboarding yang menantang dopamin, cara lain untuk bersenang-senang dan menikmati derasnya aliran Kali Baru di Bogor.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div>&nbsp;&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp; Tak ada yang percaya awalnya saya dan Sony mengarungi jeram-jeram di Kali Baru. Sungai kecil yang aliran airnya bersumber dari bendungan Katulampa. Bagaimana mungkin "parit" kecil itu bisa dilalui perahu? Lalu, dari mana pula ada jeram-jeram yang mampu memancing nyali di parit tepian kota?</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Pertanyaaan seperti ini tentu sudah sangat sering menggeluti para pejalan, termasuk saya. Orang-orang kadang memuja terlalu tinggi suatu destinasi meskipun tak jarang juga menyebelah matakan destinasi bahkan yang belum dikunjungi. Kita bisa memberi nilai suatu tempat hanya dari foto yang kita lihat, dari membaca blog perjalanan atau media yang marak menulis tempat-tempat baru tak terjamah belakangan ini, atau mungkin dari cerita seorang kawan yang memamerkan foto di media sosialnya.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Tak mau dirundung pertanyaan ini terus-menerus. Saya menjawab rasa penasaran saya dengan merangkak melewati selatan Jakarta menuju Bogor. Dari seorang kawan yang gemar bersepeda di akhir pekan melewati Kali Baru, saya dapati nomor telepon pemandu arung jeram. Pesan singkat dan sebuah panggilan saya lakukan sebelum kami berkunjung ke sana. Ini penting untuk memastikan tempat tersebut terbuka untuk umum serta mendapat informasi yang mungkin sangat penting untuk kita kumpulkan sebelum datang ke suatu tempat yang akan kita kunjungi.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Iya ini Achmad, Kang. Ini siapa ya?&rdquo; suara berlogat Sunda menjawab di seberang. Achmad memberikan arah yang cukup membantu kami menemukan lokasi arung jeram ini. Saya tidak terlalu paham Bogor, tetapi Sony, kartografer yang bekerja untuk National Geographic Indonesia cukup mahir menebak lorong-lorong sempit kota hujan ini. Tentu saja kegemarannya bersepeda pulang pergi Jakarta-Bogor membuatnya paham akan lika-liku jalan berlapis emas hitam di kota ini.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Kang, kalau naik kereta dari stasiun bisa jalan kaki ke arah Kebun Raya Bogor. Nanti di sana ambil angkot 05 jurusan Cimahpar. Tinggal bilang ke sopirnya, mau turun di Mesjid Gedong,&rdquo; Achmad menjelaskan transportasi umum menuju ke sana. &ldquo;Tetapi kalau naik kendaraan sendiri gimana ya, Kang?&rdquo; saya menimpali. &ldquo;Nah Akang tau Hotel Novotel, nah Kali Baru persis di belakangnya, Kang&rdquo; Achmad menjelaskan secara baik.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Akhir pekan menjadi pilihan bagi saya dan Sony untuk mendatangi tempat ini. Cukup mudah bagi kami menemui tempat ini. Dari tepi jalan kami menuruni anak tangga menuju tepian Kali Baru. Lantunan suara biduan menghibur para pengunjung yang baru saja usai menyisir Kali Baru. Saya menyelinap diantara para pemuda yang masih bergembira sembari menggoyangkan badan seirama dengan lantunan musik.<br /><br />\r\n<table class="tr-caption-container" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><a href="http://4.bp.blogspot.com/-hjHzuoWnv3Q/VDeti8ER6oI/AAAAAAAADNQ/Y4Dzhfafkqc/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_2.jpg"><img title="" src="http://4.bp.blogspot.com/-hjHzuoWnv3Q/VDeti8ER6oI/AAAAAAAADNQ/Y4Dzhfafkqc/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_2.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></td>\r\n</tr>\r\n<tr>\r\n<td class="tr-caption">Bersiap mengarungi Kali Baru, Bogor. Aneka olahraga sungai seperti rafting, kayak, dan riverboarding bisa dilakukan disini.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Kang Yudi ya? Saya Achmad, Kang,&rdquo; pria bertubuh sedang ini akhirnya mengenali kami. &ldquo;Baru selesai ini arung jeramnya, Kang. Ayo naik ke atas dulu,&rdquo; Achmad mengajak kami naik ke pendopo. &ldquo;Kita ngomong santai dulu kang. Sudah makan siang kang?&rdquo; Achmad menanyakan dengan ramah.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Para pemandu masih mengeringkan bajunya yang kuyup saat saya singgah ke pendopo. Beberapa diantara merebahkan tubuh. Mayoritas pemandu disini adalah warga lokal, dan beberapa lagi sudah mendayung kayak serta sudah mengarungi jeram sejak lama. Kemampuan mereka sudah tak diragukan lagi dalam menyusur aliran Kali Baru.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Saya dikenalkan oleh Kang Ahmad dengan pemiliki Kali Baru Adventure. Pria yang gemar berolahraga di luar ruang ini menyambut kami dengan hangat, ialah Kang Dudy. Kami bercerita banyak tentang sungai dan jeram-jeram yang sudah dilalui oleh kawan-kawan pecinta olah raga ini. "Ini saya sama kawan-kawan menyusur aliran Sungai Cisadane. Kita coba river boarding disana, juga rafting dan kayaking. Coba lihat ini saya bikin videonya," sembari Kang Dudy menunjukkan ke kami videonya bermain di derasnya alur Sungai Cisadane.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan geografi yang beragam, tak salah sungai di Indonesia menjadi salah satu tempat paling pas untuk melakukan olahraga sungai. Di Sumatra Utara, Sungai Asahan sering dijadikan arena untuk kompetisi arung jeram internasional. Atlet-atlet dari berbagai negara dari guna mengarungi derasnya aliran sungai ini. Juga di Pulau Jawa, beberapa sungai seperti Citarik, Citatih,&nbsp; dan Sungai Serayu juga dijadikan lintasan pemacu dopamin.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kami bercerita panjang lebar dengan Kang Dudy, termasuk pula tentang pembersihan Tugu Pancoran yang cukup beresiko untuk dilakukan.</div>\r\n<div><br />\r\n<table class="tr-caption-container" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><a href="http://1.bp.blogspot.com/-uJboIBqPB4c/VDetjPT9jKI/AAAAAAAADNY/QxVMZXDstEM/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_3.jpg"><img title="" src="http://1.bp.blogspot.com/-uJboIBqPB4c/VDetjPT9jKI/AAAAAAAADNY/QxVMZXDstEM/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_3.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></td>\r\n</tr>\r\n<tr>\r\n<td class="tr-caption">Menumpangi mobil bak terbuka menuju titik permulaan menyusuri Kali Baru.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Usai makan siang, kami sepakat untuk turun sungai. Dari tempat garis akhir, kami beranjak dengan mobil bak terbuka menuju garis awal arung jeram. Titik permulaan arung jeram ini berada di bawah Tol Jagorawi. Kami membawa perahu yang belum diisi udara menuju garis permulaan arung jeram. Juga beberapa peralatan untuk riverboarding, olahraga air yang sedang naik pamor. Saya bertengger di bak mobil bersama Kang Achmad dan teman-teman dari Kali Baru Adventure. Mari mendayung!</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; "Kang pasang dulu pelampung sama helmnya. Penting bagi kita agar tetap aman saat berolahraga seperti ini," ujar Kang Achmad. Saya memasah peralatan keamanan untuk meminimalkan resiko jika terjadi insiden yang tak terduga.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Dua perahu yang sudah terisi penuh udara siap untuk melaju menuju hilir. Pelampung sudah terpasang, pelindung kepala pun sudah saya kenakan. Saya mempersiapkan peralatan fotografi untuk mengabadikan kegiatan ini. Saya dan Sony, kartografer di Majalah National Geographic Indonesia berpisah perahu.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Mengabadikan kegiatan arung jeram tentu juga beresiko untuk keamanan peralatan foto. Namun hal ini bisa diminimalisir dengan membawa pelindung air untuk kamera. Meskipun saya tidak menggunakan Pelican Case yang jamak digunakan oleh para fotografer olahraga ini, namun pelindung kamera yang saya gunakan mungkin cukup untuk mengamankan kamera.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Sekarang waktunya beraksi. Perahu saya beranjak lebih dulu meninggalkan garis permulaan disusul dengan para atlit river boarding. Kang Achmad bertindak sebagai skipper, nakhoda perahu karet ini. Saya meminta untuk berhenti di posisi terbaik dalam mengambil foto. "Kang boleh berhenti disini?" saya meminta kepada skipper untuk berhenti sejenak menunggu perahu kedua menerjang jeram.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Kami lanjut menuruni Kali Baru yang memiliki grade 3. Lepas dari garis awal tempat saya memotret, tubuh saya diguncang hebat oleh jeram ulak-alik. Mengabadikan olehraga arung jeram ini cukup sulit. Perahu yang kurang stabil ditambah lagi dengan percikkan air sungai yang sudah menjadikan diri saya basah kuyup tentu menjadi tantangan untuk tetap menghasilkan foto terbaik.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Perahu yang saya tumpangi semakin kencang ke hilir. Beberapa kali skipper kami harus berteriak &ldquo;Booooooom,&rdquo; lalu kami semua menundukkan badan. Apa gerangan? Ternyata puluhan pipa air warga menjadi salah satu tantangan saat mengarung jeram di Kali Baru ini.<br /><br />\r\n<table class="tr-caption-container" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><a href="http://1.bp.blogspot.com/-5mXRi6nNwYU/VDetklPRP1I/AAAAAAAADNw/GBXYJrIGKBI/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_7.jpg"><img title="" src="http://1.bp.blogspot.com/-5mXRi6nNwYU/VDetklPRP1I/AAAAAAAADNw/GBXYJrIGKBI/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_7.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></td>\r\n</tr>\r\n<tr>\r\n<td class="tr-caption">Jeram dam mengocok perut.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div>&nbsp;&nbsp;&nbsp; Beberapa kali saya seperti prajurit melewati tantangan merangkak. Bedanya disini, saya harus merebahkan badan kebelakang sejajar dengan perahu agar tak tersangkut di pipa air warga. Namun kadang usaha saya ini tak berhasil mulus, beberapa helm yang gunakan kepentok pipa warga. Kalau sampai pipanya patah, kami bisa dikejar dengan parang oleh warga.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Beberapa jeram berhasil kami lalui dengan baik. Hingga akhirnya kami harus berhenti dan turun dari perahu.&nbsp;&nbsp;&nbsp; &ldquo;Yuk, semua turun dari perahu. Kita angkat dulu perahunya,&rdquo; ajak Kang Achmad. Persis di depan tempat kami berhenti, gemuruh air terdengar semakin deras. Inilah jeram es besar, salah satu jeram paling mendebarkan saat mengarungi Kali Baru. Tingginya sekitar tujuh meter. Cukup menarik untuk dituruni dengan perahu, namun "Terlalu berbahaya bagi kita untuk menuruni ini dengan perahu, Kang," ujar Kang Achmad.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Kami beristirahat sejenak sebelum memulai melakukan manuver di Kali Baru. Saya menyisir jalan setapak menuju pohon yang berada tepat di atas sungai. Ini posisi terbaik untuk mengabadikan derasnya jeram es. Sony menjadi pumbuka jalan saat saya mulai menghitung waktu kapan Sony dan ti di perahunya turun menyusur jeram es ini. "Woaaaaaa," teriakan itu disusur dengan suara blasss dari perahu yang menghantam arus deras ini. Saya menekan tombol shutter berkali-kali untuk mendapat frame terbaik.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Selepas jeram es, saya langsung berpaling ke belakang melihat perahu karet itu membelah sungai yang diapit oleh dukit. Aliran sungai ini hanya bisa memuat satu perahu karet, cukup kecil namun suasananya sangat tenang. Sungai ini memang memiliki ritme laksana film action.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Jeram es mungkin salah satu jeram yang paling menantang dari semua jeram di Kali Baru. Sebenarnya masih banyak lagi jeram-jeram menarik yang di Kali Baru yang airnya bersumber dari Ciliwung ini. Jeram Dam 3 meter, Penganten, dan Jeram Es Kecil mampu mengocok perut saya dan Sony.&nbsp;</div>\r\n<div><br />\r\n<table class="tr-caption-container" cellspacing="0" cellpadding="0" align="center">\r\n<tbody>\r\n<tr>\r\n<td><a href="http://1.bp.blogspot.com/-QNtnvC4AU7o/VDetlY7IhKI/AAAAAAAADN4/ZjRmlT-mYww/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_8.jpg"><img title="" src="http://1.bp.blogspot.com/-QNtnvC4AU7o/VDetlY7IhKI/AAAAAAAADN4/ZjRmlT-mYww/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_8.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></td>\r\n</tr>\r\n<tr>\r\n<td class="tr-caption">Salah satu jeram dengan arus yang cukup keras, yakni jeram dam.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div>&nbsp;&nbsp;&nbsp; Selepas dari jeram dam, kami melewati aliran sungai berpayung pepohonan bambu. Ini sudah tiga jam kami mengarungi sungai ini. Badan saya sudah kuyup sedari tadi. Beberapa kali saya harus turun kedalam sungai untuk mendapatkan posisi terbaik dalam pengambilan foto. Juga kamera yang hampir saja tercelup kedalam sungai saat arus bawah sungai cukup deras untuk menggoyang tumpuan kaki saya. Untung saja, teman dari Kali Baru Adventure sigap menangkap badan saya supaya tak hanyut. &nbsp;&nbsp;&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Arung jeram di Kali Baru ini bisa dikategorikan sebagai arung jeram yang aman. Debit air yang mengalir bisa diatur dari Bendungan Katulampa. Hal ini tidak membuat kakmi terlalu khawatir berarung jeram meskipun musim hujan. "Uniknya kalau di Kali Baru ini, debit air nya bisa kita atur. Jadi aman untuk melakukan olahraga arung jeram disini tanpa khawatir ada bandang," ujar Kang Dudy sesaat sebelum saya turun sungai tadi.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Saya selalu menekankan bahwa keselamatan yang paling utama dari setiap kegiatan alam, terutama arung jeram. Bersama anak-anak kami membersihkan jalur arung jeram. Batu dan ranting yang membahayakan kami bersihkan. Juga tiap minggu kita adakan gotong-royong membersihkan sampah di Kali Baru ini,&rdquo; imbuh Dudy saat ia mencerikan sejarah bagaiman Kali Baru ini aman untuk dilewati bahkan oleh pengarung yang baru sekalipun.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dudi tentu tak main-main dengan ucapannya. Pengalamannya di dunia arung jeram dan aktivitas luar ruang tentu menjadi pegangan bagi saya. &ldquo;Saya ingin semua yang datang menikmati arung jeram di sini tetap dalam kondisi aman. Dan tentu saja, kepuasan para pengunjung menjadi tujuan utama selain keselamatan tadi,&rdquo; Dudi kembali menimpali.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ucapan Dudy ini tentu menjadi nyata saat saya hampir tiba digaris akhir arung jeram ini. Setelah hampir empat jam mengocok perut di atas perahu karet, titim akhirpun sudah jelas terlihat. Ini menjadi akhir dari perjalanan menikmati jeram-jeram.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Saya dan Sony mengamini tentang kepuasaan mengarungi Kali Baru ini. &ldquo;Ini sengaja nih. Lagi asyik-asyiknya malah sampai di garis akhir,&rdquo; Sony dan saya pun sama-sama mengumpat.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;&nbsp;&nbsp; Tapi saya cukup bersenang-senang. Bagaimana tidak? Tak jauh dari ibu kota saya bisa mendapatkan pengalaman aktivitas luar ruang yang mampu memacu dopamin. Mungkin arung jeram di Kali Baru ini bisa menjadi agenda saya berikutnya bersama sahabat dekat. Tak perlu jauh-jauh untuk menikmati olahraga&nbsp; air jika di selatan Jakarta ada? Selamat membasahi tubuh, kawan.<br /><br />\r\n<div class="separator"><a href="http://4.bp.blogspot.com/--GwrQKuxJTE/VDetkmB8M0I/AAAAAAAADNs/tSqbFf5Q60o/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_6.jpg"><img style="display: block; margin-left: auto; margin-right: auto;" title="" src="http://4.bp.blogspot.com/--GwrQKuxJTE/VDetkmB8M0I/AAAAAAAADNs/tSqbFf5Q60o/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_6.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></div>\r\n<div class="separator">&nbsp;</div>\r\n<div class="separator"><a href="http://4.bp.blogspot.com/-9Bn37UQodWU/VDetkQnGkfI/AAAAAAAADNo/ts--DWv0tVE/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_5.jpg"><img style="display: block; margin-left: auto; margin-right: auto;" title="" src="http://4.bp.blogspot.com/-9Bn37UQodWU/VDetkQnGkfI/AAAAAAAADNo/ts--DWv0tVE/s1600/Rafting%2C%2BArung%2BJeram%2C%2BRiverboarding%2C%2BKayak%2C%2BBogor%2C%2BKalibaru%2C%2BKali%2BBaru%2C%2BRafting%2BCitatih%2C%2BRafting%2BCitarik%2C%2BRafting%2BCikandang%2C%2BCisadane%2C%2BSungai%2BUntuk%2BArung%2BJeram%2C%2BSungai%2BAsahan%2C%2BSungai%2BAlas%2C%2BRafting%2BSerayu%2C%2BFoto%2BRafting%2C%2BFoto%2BArung%2BJeram_5.jpg" alt="Rafting, Arung Jeram, Riverboarding, Kayak, Bogor, Kalibaru, Kali Baru, Rafting Citatih, Rafting Citarik, Rafting Cikandang, Cisadane, Sungai Untuk Arung Jeram, Sungai Asahan, Sungai Alas, Rafting Serayu, Foto Rafting, Foto Arung Jeram, Wisata Rafting, Olahraga Sungai, Bogor, Wisata Bogor, Perahu Karet, stock photo, culture stock photo, indonesia stock photo, indonesia photo, foto wisata, daerah wisata indonesia, tourism indonesia, amazing place indonesia, place to visit in indonesia, travel photographer, assignment for photographer, culture photo of indonesia, indonesia travel photographer" width="640" height="426" border="0" /></a></div>\r\n</div>\r\n<p>&nbsp;</p>', 'http://localhost/thetour/public/images/blog/blog_img_1_L2FNHZzkfe.jpg', 'http://localhost/thetour/public/images/blog/thumb_blog_img_1_L2FNHZzkfe.jpg', 'http://localhost/thetour/public/images/blog/thumb55_blog_img_1_L2FNHZzkfe.jpg', 'false', 'false', NULL, 'Y', NULL),
	(20, '2014-12-26 15:47:41', '2014-12-31 14:52:43', 1, 'Kerinci Jambi : National Geographic Traveler Indonesia September 2014', '<p><strong>Inilah Kerinci,</strong> dimana alam dan masyarakatnya masih selaras dalam menjalani kehidupan. Puncak Gunung Kerinci setinggi 3.805 mdpl menjadi penyangga daerah yang sebagian kawasannya menjadi tempat perlindungan aneka satwa dan tanaman. Terletak di Provinsi Jambi, daerah ini menyimpan beragam potensi alam. Saya mendaki Gunung Kerinci, Danau Gunung Tujuh, menyusup ke jantung hutan lalu berendam di beningnya Danau Kaca. Tak ketinggalan saya menuju bukit tempat terbaik untuk hamparan', '<p><strong>Inilah Kerinci, dimana alam dan masyarakatnya masih selaras dalam menjalani kehidupan. Puncak Gunung Kerinci setinggi 3.805 mdpl menjadi penyangga daerah yang sebagian kawasannya menjadi tempat perlindungan aneka satwa dan tanaman. Terletak di Provinsi Jambi, daerah ini menyimpan beragam potensi alam. Saya mendaki Gunung Kerinci, Danau Gunung Tujuh, menyusup ke jantung hutan lalu berendam di beningnya Danau Kaca. Tak ketinggalan saya menuju bukit tempat terbaik untuk hamparan kebun teh di Kayo Aro, juga Danau Kerinci tempat hidup beragam ikan</strong>.<br /><br />Saya mengunjungi daerah ini untuk menyusuri sajian alam nan memukau serta masyarakatnya yang ramah. Berikut liputan saya yang dimuat di Majalah National Geographic Traveler Indonesia edisi September 2014. Selamat menikmati kawan.<br /><br /></p>\r\n<div class="separator"><a href="http://1.bp.blogspot.com/-8uLX84sSQBw/VABaFi7uw-I/AAAAAAAADAM/J1xMb6S8SMo/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_1.jpg"><img src="http://1.bp.blogspot.com/-8uLX84sSQBw/VABaFi7uw-I/AAAAAAAADAM/J1xMb6S8SMo/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_1.jpg" alt="" width="640" height="418" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://3.bp.blogspot.com/-QCdFh3hlCLI/VABaHTsPfKI/AAAAAAAADAc/Kstv4ML67WA/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_2.jpg"><img src="http://3.bp.blogspot.com/-QCdFh3hlCLI/VABaHTsPfKI/AAAAAAAADAc/Kstv4ML67WA/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_2.jpg" alt="" width="640" height="416" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://1.bp.blogspot.com/-1OflOOED4X8/VABaGpYJzhI/AAAAAAAADAU/EX_i5MWE4k4/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_3.jpg"><img src="http://1.bp.blogspot.com/-1OflOOED4X8/VABaGpYJzhI/AAAAAAAADAU/EX_i5MWE4k4/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_3.jpg" alt="" width="640" height="412" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://1.bp.blogspot.com/-FXOe4jzQepU/VABaImjG2AI/AAAAAAAADAk/h5q7uW6YpEc/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_4.jpg"><img src="http://1.bp.blogspot.com/-FXOe4jzQepU/VABaImjG2AI/AAAAAAAADAk/h5q7uW6YpEc/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_4.jpg" alt="" width="640" height="410" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://2.bp.blogspot.com/-tE1aQdz8TjI/VABaJkZ2qII/AAAAAAAADAs/3ulVnzz1_m8/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_5.jpg"><img src="http://2.bp.blogspot.com/-tE1aQdz8TjI/VABaJkZ2qII/AAAAAAAADAs/3ulVnzz1_m8/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_5.jpg" alt="" width="640" height="416" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://1.bp.blogspot.com/-iXdGGjIhh-4/VABaKTSwxaI/AAAAAAAADA0/-Nya2onnr7o/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_6.jpg"><img src="http://1.bp.blogspot.com/-iXdGGjIhh-4/VABaKTSwxaI/AAAAAAAADA0/-Nya2onnr7o/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_6.jpg" alt="" width="640" height="410" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://3.bp.blogspot.com/-1YIMlAHdNZY/VABaLVM6UyI/AAAAAAAADA4/WDC76X2ztkw/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_7.jpg"><img src="http://3.bp.blogspot.com/-1YIMlAHdNZY/VABaLVM6UyI/AAAAAAAADA4/WDC76X2ztkw/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_7.jpg" alt="" width="640" height="418" border="0" /></a></div>\r\n<p>&nbsp;</p>\r\n<div class="separator"><a href="http://2.bp.blogspot.com/-NJpf3c4vbTg/VABaMaCZ-tI/AAAAAAAADBE/pa5kUxNA-qM/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_8.jpg"><img src="http://2.bp.blogspot.com/-NJpf3c4vbTg/VABaMaCZ-tI/AAAAAAAADBE/pa5kUxNA-qM/s1600/Gunung%2BKerinci%2C%2BDanau%2BKerinci%2C%2BDanau%2BGunung%2BTujuh%2C%2BDana%2BKaca%2C%2BDanau%2BKaco%2C%2BKersik%2BTua%2C%2BKayu%2BAro%2C%2BDesa%2BPelompek%2C%2BTea%2BPlantation%2C%2BKebun%2BTeh%2BKayu%2BAro%2C%2BSungai%2BPenuh%2C%2BPuncak%2BIndrapura%2C%2BOrang%2BPendek%2C%2BMount%2BKerinci_8.jpg" alt="" width="640" height="410" border="0" /></a></div>\r\n<p>- See more at: http://www.ranselkosong.com/2014/08/kerinci-jambi-national-geographic.html#sthash.e35GH5Q6.dpuf</p>', 'http://localhost/thetour/public/images/blog/blog_img_1_Wf6cSt0veh.jpg', 'http://localhost/thetour/public/images/blog/thumb_blog_img_1_Wf6cSt0veh.jpg', 'http://localhost/thetour/public/images/blog/thumb55_blog_img_1_Wf6cSt0veh.jpg', 'false', 'false', NULL, 'Y', NULL);
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;


-- Dumping structure for table web_tour.car
DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `desc` mediumtext COLLATE utf8_unicode_ci,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `foto_1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto_4` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.car: ~0 rows (approximately)
DELETE FROM `car`;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
/*!40000 ALTER TABLE `car` ENABLE KEYS */;


-- Dumping structure for table web_tour.city
DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.city: ~3 rows (approximately)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `created_at`, `updated_at`, `nama`, `province_id`) VALUES
	(1, '2014-12-18 11:03:59', '2014-12-18 11:07:14', 'Surabaya', 1),
	(2, '2014-12-18 11:07:21', '2014-12-18 11:07:21', 'Malang', 1),
	(3, '2014-12-18 11:07:38', '2014-12-25 17:18:25', 'Magetan', 1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Dumping structure for table web_tour.comment
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `artikel_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `confirmed` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `comment_id` int(11) DEFAULT NULL,
  `isreply` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.comment: ~8 rows (approximately)
DELETE FROM `comment`;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `created_at`, `updated_at`, `artikel_id`, `name`, `email`, `website`, `message`, `status`, `confirmed`, `comment_id`, `isreply`) VALUES
	(10, '2015-01-22 08:01:36', '2015-01-22 08:45:49', 20, 'herman', 'herman@gmail.com', NULL, 'wow its cool', 'Y', 'N', NULL, 'N'),
	(13, '2015-01-22 09:44:15', '2015-01-22 09:44:15', 20, 'joker', 'joker@yahoo.com', '', 'hello...i interest with indonesia..how i can go there??\r\ntanx', 'N', 'N', NULL, 'N'),
	(14, '2015-01-22 09:45:20', '2015-01-22 09:45:20', 20, 'roket', 'roket@roketmail.com', '', 'waaw its cool. I have plon to visit indonesia on February. please guide me..thanx', 'N', 'N', NULL, 'N'),
	(15, '2015-01-22 09:50:47', '2015-01-22 09:50:47', 20, 'tania', 'tania@infotania.com', '', 'I\'m from japan, I am interested about bali. can you guide me..? on february.', 'N', 'N', NULL, 'N'),
	(16, '2015-01-22 09:51:43', '2015-01-22 09:51:43', 20, 'rania', 'rania@successtory.com', '', 'wow i wil visit indonesia..please guide me here..', 'N', 'N', NULL, 'N'),
	(17, '2015-01-22 09:52:25', '2015-01-22 09:52:25', 20, 'kikio', 'kikio@japan.co.jp', '', 'waaaaaaaaaaaaaaaaaaaaaaaaaaaw', 'N', 'N', NULL, 'N'),
	(18, '2015-01-22 09:54:40', '2015-01-24 12:39:37', 20, 'tokai', 'tokai@toket.com', '', 'toket super', 'Y', 'N', NULL, 'N'),
	(19, '2015-01-26 14:31:40', '2015-01-26 14:32:46', 19, 'herman', 'butirpadi@gmail.com', '', 'wah sepertinya asik sekali untuk rafting ini...terima kasih postingannya ..membuka wawasan baru untuk dunia traveling.. :-)', 'Y', 'Y', NULL, 'N');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- Dumping structure for table web_tour.comp_info
DROP TABLE IF EXISTS `comp_info`;
CREATE TABLE IF NOT EXISTS `comp_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `comp_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workphone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tumblr` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flickr` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.comp_info: ~1 rows (approximately)
DELETE FROM `comp_info`;
/*!40000 ALTER TABLE `comp_info` DISABLE KEYS */;
INSERT INTO `comp_info` (`id`, `created_at`, `updated_at`, `comp_name`, `logo`, `email`, `address`, `website`, `phone`, `workphone`, `fax`, `facebook`, `twitter`, `path`, `linkedin`, `youtube`, `tumblr`, `instagram`, `flickr`, `gplus`, `skype`, `web_title`) VALUES
	(1, '2014-11-21 08:28:32', '2015-02-02 15:37:52', 'Telusur Indonesia', NULL, 'info@telusurindonesia.com', 'Jl. Pagesangan Timur, BX-100 Surabaya Jawa Timur Indonesias', 'www.telusurindonesia.com', '0823156431', '+6285-330-114-055', '031653465', 'http://facebook.com/eries.eris', '', '', 'http://linkedin.com/travelkita', '', '', '', NULL, NULL, NULL, 'telusurindonesia.com');
/*!40000 ALTER TABLE `comp_info` ENABLE KEYS */;


-- Dumping structure for table web_tour.config
DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.config: ~13 rows (approximately)
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `created_at`, `updated_at`, `nama`, `show_name`, `value`) VALUES
	(1, '2014-10-28 09:24:14', '2014-10-28 09:24:15', 'blog_img_url', 'Blog Image URL', 'gallery/blog'),
	(2, '2014-12-09 20:15:58', '2014-12-09 20:16:04', 'sidebar_blog_visible', 'Sidebar Blog List Visible', 'true'),
	(3, '2014-12-09 20:16:36', '2014-12-09 20:16:39', 'sidebar_blog_count', 'Sidebar blog list number', '4'),
	(4, '2014-12-09 20:54:34', '2014-12-09 20:54:35', 'footer_blog_count', 'Footer blog number', '2'),
	(5, '2014-12-09 21:24:42', '2014-12-09 21:24:42', 'comp_logo', 'Company Logo', 'frnt/images/complogo.png'),
	(6, '2014-12-09 21:29:58', '2014-12-09 21:29:59', 'comp_slogan', 'Company Slogan', 'Show you the world'),
	(7, '2015-01-14 11:37:30', '2015-01-14 11:37:31', 'email_host', 'Email Host', NULL),
	(8, '2015-01-14 11:37:51', '2015-01-14 11:37:52', 'email_port', 'Email Port', NULL),
	(9, '2015-01-14 11:38:14', '2015-01-14 11:38:15', 'email_from_name', 'Email From Name', NULL),
	(10, '2015-01-14 11:38:44', '2015-01-14 11:38:45', 'email_username', 'Email Username', NULL),
	(11, '2015-01-14 11:38:57', '2015-01-14 11:38:57', 'email_password', 'Email Password', NULL),
	(12, '2015-01-22 09:47:50', '2015-01-22 09:47:51', 'guest_comment_sent_info', 'Guest comment sent info', 'your comments was successfully sent, thanks. It will display after confirmed by administrator'),
	(13, '2015-01-26 17:17:53', '2015-01-26 17:17:54', 'testimonial_list_count', 'Testimonial list number show at home page', '4');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;


-- Dumping structure for table web_tour.contactpage
DROP TABLE IF EXISTS `contactpage`;
CREATE TABLE IF NOT EXISTS `contactpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `customer_support_desc` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_sent_desc` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_reply_content` text COLLATE utf8_unicode_ci,
  `ym` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ym_visible` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sent_message` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.contactpage: ~1 rows (approximately)
DELETE FROM `contactpage`;
/*!40000 ALTER TABLE `contactpage` DISABLE KEYS */;
INSERT INTO `contactpage` (`id`, `created_at`, `updated_at`, `customer_support_desc`, `message_sent_desc`, `message_reply_content`, `ym`, `ym_visible`, `sent_message`) VALUES
	(1, '2015-01-13 08:42:06', '2015-01-14 11:35:08', 'Nunc sit amet pretium purus. Pellet netus et malesuada fames ac turpis egestas.entesque habitant morbi tristique senectus', NULL, '<p>Terima kasih atas kunjungan anda di uktravel.com akan segera kami respon pesan anda.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>uktravel.com team</strong></p>', 'uktravel', 'Y', 'Email sent correctly. Thanks to get in touch us!');
/*!40000 ALTER TABLE `contactpage` ENABLE KEYS */;


-- Dumping structure for table web_tour.contact_im
DROP TABLE IF EXISTS `contact_im`;
CREATE TABLE IF NOT EXISTS `contact_im` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.contact_im: ~0 rows (approximately)
DELETE FROM `contact_im`;
/*!40000 ALTER TABLE `contact_im` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_im` ENABLE KEYS */;


-- Dumping structure for table web_tour.destination
DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `destkat_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `img_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.destination: ~4 rows (approximately)
DELETE FROM `destination`;
/*!40000 ALTER TABLE `destination` DISABLE KEYS */;
INSERT INTO `destination` (`id`, `created_at`, `updated_at`, `destkat_id`, `kategori_id`, `nama`, `subtitle`, `desc`, `img_path`) VALUES
	(1, '2015-01-20 20:17:37', '2015-01-21 09:34:46', 6, 2, 'Bedugul', 'the beauty of bedugul', '<p><strong>Bedugul</strong> is a mountain lake resort area in <a title="Bali" href="http://en.wikipedia.org/wiki/Bali">Bali</a>,<sup id="cite_ref-IGA_1-0" class="reference"><a href="http://en.wikipedia.org/wiki/Bedugul#cite_note-IGA-1">[1]</a></sup> <a title="Indonesia" href="http://en.wikipedia.org/wiki/Indonesia">Indonesia</a>, located in the centre-north region of the island near <a title="Bratan" href="http://en.wikipedia.org/wiki/Bratan">Lake Bratan</a> on the road between <a title="Denpasar" href="http://en.wikipedia.org/wiki/Denpasar">Denpasar</a> and <a title="Singaraja" href="http://en.wikipedia.org/wiki/Singaraja">Singaraja</a>. Bedugul is located in the <a title="Tabanan Regency" href="http://en.wikipedia.org/wiki/Tabanan_Regency">Tabanan Regency</a>,<sup id="cite_ref-2" class="reference"><a href="http://en.wikipedia.org/wiki/Bedugul#cite_note-2">[2]</a></sup> at 48 kilometres (30&nbsp;mi) north of the city of <a title="Denpasar" href="http://en.wikipedia.org/wiki/Denpasar">Denpasar</a>. Other nearby lakes are <a class="new" title="Lake Buyan (page does not exist)" href="http://en.wikipedia.org/w/index.php?title=Lake_Buyan&amp;action=edit&amp;redlink=1">Lake Buyan</a>, and <a title="List of bodies of water in Bali" href="http://en.wikipedia.org/wiki/List_of_bodies_of_water_in_Bali">Lake Tamblingan</a>.</p>\r\n<p>Bedugul enjoys a mild mountain weather due to its location at an altitude of about 1,500 metres (4,900&nbsp;ft) above the sea level.</p>\r\n<p>Major sites in Bedugul are the <a title="Pura Ulun Danu Bratan" href="http://en.wikipedia.org/wiki/Pura_Ulun_Danu_Bratan">Pura Ulun Danu Bratan</a> water temple and the <a title="Eka Karya Botanic Garden" href="http://en.wikipedia.org/wiki/Eka_Karya_Botanic_Garden">Eka Karya Botanic Garden</a>. The Botanic Garden, opened in 1959. With a total area of 157.5 hectares (389 acres) is the largest in Indonesia.</p>\r\n<p>&nbsp;</p>', 'http://localhost/thetour/public/images/destinasi/dest/Bedugul_img_6242.jpg'),
	(2, '2015-01-21 08:32:07', '2015-01-27 10:03:47', 6, 2, 'Tanah Lot', 'wow...its cool', '<p><strong>Tanah Lot</strong> is a <a class="mw-redirect" title="Rock formation" href="http://en.wikipedia.org/wiki/Rock_formation">rock formation</a> off the <a title="Indonesia" href="http://en.wikipedia.org/wiki/Indonesia">Indonesian</a> island of <a title="Bali" href="http://en.wikipedia.org/wiki/Bali">Bali</a>. It is home to the <a title="Pilgrimage" href="http://en.wikipedia.org/wiki/Pilgrimage">pilgrimage</a> <a title="Temple" href="http://en.wikipedia.org/wiki/Temple">temple</a> <em>Pura Tanah Lot</em> (literally "Tanah Lot temple"), a popular tourist and cultural icon for photography and general exoticism.</p>\r\n<p>&nbsp;<img style="display: block; margin-left: auto; margin-right: auto;" src="../../../adm/js/fileman/Uploads/Images/destinasi/Keindahan_Pura_Tanah_Lot.jpg" alt="" width="433" height="271" /></p>\r\n<p>Tanah Lot means "Land [sic: in the] Sea" in the <a title="Balinese language" href="http://en.wikipedia.org/wiki/Balinese_language">Balinese language</a>.<sup id="cite_ref-2" class="reference"><a href="http://en.wikipedia.org/wiki/Tanah_Lot#cite_note-2">[2]</a></sup> Located in <a title="Tabanan Regency" href="http://en.wikipedia.org/wiki/Tabanan_Regency">Tabanan</a>, about 20 kilometres (12&nbsp;mi) from <a title="Denpasar" href="http://en.wikipedia.org/wiki/Denpasar">Denpasar</a>, the temple sits on a large offshore rock which has been shaped continuously over the years by the ocean tide.</p>\r\n<p>Tanah Lot is claimed to be the work of the 16th-century <a title="Dang Hyang Nirartha" href="http://en.wikipedia.org/wiki/Dang_Hyang_Nirartha">Dang Hyang Nirartha</a>. During his travels along the south coast he saw the rock-island\'s beautiful setting and rested there. Some fishermen saw him, and bought him gifts. Nirartha then spent the night on the little island. Later he spoke to the fishermen and told them to build a shrine on the rock, for he felt it to be a holy place to worship the <a title="Balinese people" href="http://en.wikipedia.org/wiki/Balinese_people">Balinese</a> sea gods.<sup id="cite_ref-3" class="reference"><a href="http://en.wikipedia.org/wiki/Tanah_Lot#cite_note-3">[3]</a></sup></p>\r\n<p>The Tanah Lot temple was built and has been a part of <a title="Balinese mythology" href="http://en.wikipedia.org/wiki/Balinese_mythology">Balinese mythology</a> for centuries. The temple is one of <a class="mw-redirect" title="Balinese sea temples" href="http://en.wikipedia.org/wiki/Balinese_sea_temples">seven sea temples</a> around the Balinese coast. Each of the sea temples was established within eyesight of the next to form a chain along the south-western coast. In addition to Balinese mythology, the temple was significantly influenced by <a title="Hinduism" href="http://en.wikipedia.org/wiki/Hinduism">Hinduism</a>.</p>\r\n<p><img style="float: left; margin-right: 10px; margin-left: 10px;" src="http://sewavilladibali.com/officialblog/wp-content/uploads/2013/11/Tanah-Lot-Bali-1.jpg" alt="tanahlot2" width="350" height="222" />At the base of the rocky island, venomous <a class="mw-redirect" title="Sea snake" href="http://en.wikipedia.org/wiki/Sea_snake">sea snakes</a> are believed to guard the temple from evil spirits and intruders. The temple is purportedly protected by a giant snake, which was created from Nirartha\'s selendang (a type of sash) when he established the island.</p>\r\n<p>In 1980, the temple\'s rock face was starting to crumble and the area around and inside the temple started to become dangerous.<sup id="cite_ref-4" class="reference"><a href="http://en.wikipedia.org/wiki/Tanah_Lot#cite_note-4">[4]</a></sup> The<a title="Japan" href="http://en.wikipedia.org/wiki/Japan">Japanese</a> government then provided a loan to the Indonesian government of <a class="mw-redirect" title="Rupiah" href="http://en.wikipedia.org/wiki/Rupiah">Rp</a> 800 <a class="mw-redirect" title="Milliard" href="http://en.wikipedia.org/wiki/Milliard">billion</a> (approximately US$130 million<sup id="cite_ref-5" class="reference"><a href="http://en.wikipedia.org/wiki/Tanah_Lot#cite_note-5">[5]</a></sup>) to conserve the historic temple and other significant locations around Bali. As a result, over one third of Tanah Lot\'s "rock" is actually cleverly disguised artificial rock created during the Japanese-funded and supervised renovation and stabilization program.</p>\r\n<p>&nbsp;The area leading to Tanah Lot is highly commercialized and people are required to pay to enter the area. To reach the temple, visitors must walk through a set of Balinese market-format souvenir shops which cover each side of the path down to the sea. On the mainland clifftops, restaurants have also been provided for tourists.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table style="margin-left: auto; margin-right: auto;">\r\n<tbody>\r\n<tr>\r\n<td><img style="margin: 10px;" src="http://d19lgisewk9l6l.cloudfront.net/wexas/www/images/web/asia/indonesia/bali/tanah-lot/tanah-lot.jpg" alt="" width="150" height="100" /></td>\r\n<td>&nbsp;</td>\r\n<td><img style="margin: 10px;" src="http://balicooltour.com/wp-content/uploads/2013/12/tanah-lot-sunset-temple-2.jpg" alt="" width="150" height="100" />&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td><img style="margin: 10px;" src="http://www.balipurnama.com/toptemples/tanahlot-sunset.jpg" alt="" width="150" height="100" /></td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td style="text-align: center;">&nbsp;</td>\r\n<td style="text-align: center;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p><a href="http://en.wikipedia.org/wiki/Tanah_Lot" target="_blank">Source : wikipedia</a></p>', 'http://localhost/thetour/public/images/destinasi/dest/Tanah_Lot_Keindahan-Pura-Tanah-Lot.jpg'),
	(3, '2015-01-21 11:14:45', '2015-01-21 11:20:16', 6, 2, 'Ulu watu', '..the most famous wave of Bali', '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://nekabalitravel.com/wp-content/uploads/2015/01/L-Uluwatu.jpg" alt="" width="680" height="392" /></p>\r\n<p><strong>Uluwatu</strong> is the most famous wave of Bali. There is always some swell here so it\'s also always crowded. The spot offers several waves which are working with different swells and tides:</p>\r\n<p>The Peak: best at mid and high tide. Closes out at low tide. In front of the cave. it\'s the most consistant. Short and powerful waves, tubes. The take off is moving. It works from 1ft to 8ft. The most crowded. One of the sections closes more than the others.</p>\r\n<p>Racetracks: 100 meters further. fast wave, a lot of sections with easy tubes. Best at low tide and at 6ft. Can hold bigger swell. On the right tide and the right swell, "The Peak" connects with "Racetraks" (you need to be a good tuberider). Over 10ft, Racetracks breaks until "The Corner".</p>\r\n<p><br />Inside Corner: best at mid and low tide with a 6ft swell. At first, it\'s a fun wave and the final bowl is a tube. Don\'t do a cutback just before the bowl! Take plenty of speed, stay high in the face and trim. You will pass the tube.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://www.indonesia.travel/public/media/images/upload/poi/pura%20uluwatu%20(13).jpg" alt="" width="640" height="427" /></p>\r\n<p>Outside Corner: the REAL Uluwatu. Works only with big swells (&gt;8 feet) and at low tide. The lower is the tide, the better is the wave. Take at least a 7\' board. It is a succession of long walls good for carving and, sometimes, a beautifu</p>\r\n<p>l final tube. The length is around 300 meters.</p>\r\n<p>Temple: less surfed. Two waves in fact ("Outside temple" and "The Bombies"). Only for experts because the water is very shallow. For them, it is a incredible tube when it works.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Ulu_Watu_L-Uluwatu.jpg'),
	(4, '2015-01-21 11:32:30', '2015-01-21 11:39:34', 1, 2, 'Teluk ijo (Green Bay)', '..the greenest beach', '<p>Teluk Hijau adalah obyek wisata <a title="Pantai" href="http://id.wikipedia.org/wiki/Pantai">pantai</a> yang berada dalam areal <a title="Taman Nasional Meru Betiri" href="http://id.wikipedia.org/wiki/Taman_Nasional_Meru_Betiri">Taman Nasional Meru Betiri</a>, <a title="Sarongan, Pesanggaran, Banyuwangi" href="http://id.wikipedia.org/wiki/Sarongan,_Pesanggaran,_Banyuwangi">Sarongan, Pesanggaran, Banyuwangi</a>. Lokasinya berjarak sekitar 90 kilometer dari <a title="Kota Banyuwangi" href="http://id.wikipedia.org/wiki/Kota_Banyuwangi">Kota Banyuwangi</a>. Dinamai demikian dikarenakan air lautnya yang cenderung berwarna hijau.<a href="http://id.wikipedia.org/wiki/Teluk_Hijau#cite_note-1">[1]</a></p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://1.bp.blogspot.com/-yKmShLVYQwc/U6sG5Xoz50I/AAAAAAAAIJM/Oey1nmfQcA8/s1600/Teluk+hijau+1a.jpg" alt="" width="819" height="292" /></p>\r\n<p>Dari <a title="Kota Banyuwangi" href="http://id.wikipedia.org/wiki/Kota_Banyuwangi">Kota Banyuwangi</a> menuju ke arah selatan melewati <a title="Kabat, Banyuwangi" href="http://id.wikipedia.org/wiki/Kabat,_Banyuwangi">Kabat</a>, <a title="Rogojampi, Banyuwangi" href="http://id.wikipedia.org/wiki/Rogojampi,_Banyuwangi">Rogojampi</a>, <a title="Srono, Banyuwangi" href="http://id.wikipedia.org/wiki/Srono,_Banyuwangi">Srono</a>, <a title="Cluring, Banyuwangi" href="http://id.wikipedia.org/wiki/Cluring,_Banyuwangi">Cluring</a>, hingga tiba di simpang empat <a title="Jajag, Gambiran, Banyuwangi" href="http://id.wikipedia.org/wiki/Jajag,_Gambiran,_Banyuwangi">Desa Jajag</a>, kemudian belok kiri. Kemudian pengendara tiba di sebuah simpang empat. Pengendara dapat mengambil arah serong kiri melewati <a title="Sambirejo, Bangorejo, Banyuwangi" href="http://id.wikipedia.org/wiki/Sambirejo,_Bangorejo,_Banyuwangi">Desa Sambirejo</a> dan <a title="Seneporejo, Siliragung, Banyuwangi" href="http://id.wikipedia.org/wiki/Seneporejo,_Siliragung,_Banyuwangi">Desa Seneporejo</a> kemudian tembus di Pasar <a title="Kesilir, Siliragung, Banyuwangi" href="http://id.wikipedia.org/wiki/Kesilir,_Siliragung,_Banyuwangi">Kesilir</a>. Atau mengambil arah lurus (melewati <a title="Purwodadi, Gambiran, Banyuwangi" href="http://id.wikipedia.org/wiki/Purwodadi,_Gambiran,_Banyuwangi">Desa Gambiran</a>, Jembatan Gambiran-Bangorejo, lalu belok kiri arah Pedotan melewati Tugu Tani Gunungsari dan Monumen P. Kusno, kemudian tiba di simpang empat dan belok kanan hingga tiba di persimpangan Pedotan. Setelah itu pengendara bisa memilih mengambil arah kiri melewati Buk Putih hingga tiba di simpang empat Siliragung, atau mengambil arah terus melewati <a title="Sukorejo, Bangorejo, Banyuwangi" href="http://id.wikipedia.org/wiki/Sukorejo,_Bangorejo,_Banyuwangi">Desa Sukorejo</a> dan Desa Kesilir dan tiba juga di simpang empat Siliragung.</p>\r\n<p>Dari simpang Siliragung pengendara dapat mengambil arah serong kiri meewati Kantor <a title="Camat" href="http://id.wikipedia.org/wiki/Camat">Camat</a> Siliragung, Polsek Siliragung, lalu tiba di simpang empat dan belok kanan melewati Jembatan Kalibaru dan tiba di simpang empat Pasar <a title="Pesanggaran, Pesanggaran, Banyuwangi" href="http://id.wikipedia.org/wiki/Pesanggaran,_Pesanggaran,_Banyuwangi">Sanggar</a>, atau mengambil arah lurus melewati Jembatan Siliragung-<a title="Sumbermulyo, Pesanggaran, Banyuwangi" href="http://id.wikipedia.org/wiki/Sumbermulyo,_Pesanggaran,_Banyuwangi">Sumbermulyo</a> dan Jalan Ahmad Kusnan dan tiba di simpang empat Pasar Sanggar. Jika pengendara dari simpang empat Siliragung mengambil arah lurus, tiba di Persimpangan Penyu dapat langsung belok kanan tanpa melewati Pasar Sanggar, melewati jalur ini akan bertemu di satu titik (Kantor Desa Sumbermulyo) dengan pengendara dari arah Pasar Sanggar. Dari Kantor Desa Sumbermulyo belok kiri menuju <a title="Sumberagung, Pesanggaran, Banyuwangi" href="http://id.wikipedia.org/wiki/Sumberagung,_Pesanggaran,_Banyuwangi">Desa Sumberagung</a>. Setelah itu pengendara tiba di Persimpangan Pancer, ambil arah lurus melewati jalur Gunung Gamping dan Perkebunan Sungailembu. Dari sini kondisi jalan masih baik hingga tiba di makam Sungailembu dimana sebelumnya pengendara belok kiri di Persimpangan Pabrik. Dari makam jalan lurus hingga tiba di Persimpangan <a title="Kandangan, Pesanggaran, Banyuwangi" href="http://id.wikipedia.org/wiki/Kandangan,_Pesanggaran,_Banyuwangi">Kandangan</a>. Dari sana, pengendara dapat mengambil arah kiri melewati pemukiman warga di Desa Kandangan dan jembatan kayu Kandangan-Sarongan atau mengambil arah lurus melewati Afdeling Sumberbopong Sungailembu dan Perkebunan Sumberjambe. Kedua jalur ini akan mengarah ke Terminal/Pasar <a title="Sarongan, Pesanggaran, Banyuwangi" href="http://id.wikipedia.org/wiki/Sarongan,_Pesanggaran,_Banyuwangi">Sarongan</a>. Dari Pasar pengendara menuju ke arah selatan melewati <a title="GPdI" href="http://id.wikipedia.org/wiki/GPdI">Gereja Pantekosta</a>, Kantor Desa Sarongan, Dusun Besaran, Dusun Bayuran dan Dusun Rajegwesi dan tiba di pos pemeriksaan dan tiket.</p>\r\n<p>Dari pos pengendara dapat mengambil arah serong kiri (melewati <a title="Pantai Rajegwesi" href="http://id.wikipedia.org/wiki/Pantai_Rajegwesi">Pantai Rajegwesi</a> lalu belok kanan) atau mengambil arah lurus (melewati Perumahan <a title="Tsunami Banyuwangi 1994" href="http://id.wikipedia.org/wiki/Tsunami_Banyuwangi_1994">Tsunami</a>) hingga tiba di kawasan parkir kendaraan yang terletak di kawasan Teluk Damai. Dari sini perjalanan dilanjutkan dengan jalan kaki mendaki jalur sepanjang 1 km di bukit kecil di tiba di Pantai Batu. Dari Pantai Batu, Teluk Hijau hanya berjarak sekitar 300 meter. Total perjalanan adalah sekitar 91 km.</p>\r\n<p>&nbsp;</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://2.bp.blogspot.com/-zrcW6rH_44k/U62dA6_ex4I/AAAAAAAAIM0/9zSmRB0RIro/s1600/ijo+6.jpg" alt="" width="640" height="379" /></p>\r\n<p>Dari Kota Jember, ambil arah menuju <a class="mw-redirect" title="Kota Banyuwangi" href="http://id.wikipedia.org/wiki/Kota_Banyuwangi">Banyuwangi</a> melewati Kecamatan <a title="Pakusari, Jember" href="http://id.wikipedia.org/wiki/Pakusari,_Jember">Pakusari</a>, <a title="Mayang, Jember" href="http://id.wikipedia.org/wiki/Mayang,_Jember">Mayang</a> dan <a title="Silo, Jember" href="http://id.wikipedia.org/wiki/Silo,_Jember">Silo</a> hingga tiba di Jalur Mrawan (Gumitir) hingga masuk wilayah <a title="Kabupaten Banyuwangi" href="http://id.wikipedia.org/wiki/Kabupaten_Banyuwangi">Kabupaten Banyuwangi</a>. Perjalanan dilanjutkan melewati Kecamatan <a title="Kalibaru, Banyuwangi" href="http://id.wikipedia.org/wiki/Kalibaru,_Banyuwangi">Kalibaru</a>, <a title="Glenmore, Banyuwangi" href="http://id.wikipedia.org/wiki/Glenmore,_Banyuwangi">Glenmore</a> dan <a title="Genteng, Banyuwangi" href="http://id.wikipedia.org/wiki/Genteng,_Banyuwangi">Genteng</a> hingga tiba di Persimpangan <a title="Gentengkulon, Genteng, Banyuwangi" href="http://id.wikipedia.org/wiki/Gentengkulon,_Genteng,_Banyuwangi">Genteng Kulon</a>. Belok kiri melewati Sun East Mall, <a title="Yosomulyo, Gambiran, Banyuwangi" href="http://id.wikipedia.org/wiki/Yosomulyo,_Gambiran,_Banyuwangi">Desa Yosomulyo</a> dan tiba di simpang empat <a title="Jajag, Gambiran, Banyuwangi" href="http://id.wikipedia.org/wiki/Jajag,_Gambiran,_Banyuwangi">Desa Jajag</a> lalu belok kanan. Dari sini perjalanan sama halnya seperti dari arah Kota Banyuwangi. Total perjalanan adalah sekitar 106 km.</p>\r\n<p>Dari <a title="Pantai Rajegwesi" href="http://id.wikipedia.org/wiki/Pantai_Rajegwesi">Pantai Rajegwesi</a>, perjalanan ke Teluk Hijau dapat dilanjutkan dengan menyewa perahu. Dengan ombak pantai selatan Jawa yang terkenal besar, pengunjung biasanya tiba di Teluk Hijau dengan pakaian yang basah.</p>\r\n<p>&nbsp;</p>', 'http://localhost/thetour/public/images/destinasi/dest/Teluk_ijo_ijo_3.jpg'),
	(5, '2015-01-31 19:40:47', '2015-01-31 19:40:47', 6, 2, 'Padang padang beach', 'hidden paradise', '<p>Pantai Padang Padang mungkin kurang begitu terkenal bila dibandingkan dengan Pantai Kuta, namun Pantai Padang Padang adalah pantai yang sangat indah dan unik. Pada saat saya pertama datang ke Pantai Padang Padang juga saya mengira bahwa pantai ini adalah pantai yang tidak menarik karena kurang terkenal, namun ternyata saya salah. Pantai Padang Padang adalah pantai kecil yang tersembunyi dibalik sebuah tebing di kawasan Pecatu, dekat Uluwatu. Untuk dapat mencapai Pantai Padang Padang, anda harus melewati sebuah tangga yang membelah tebing. Pantai Padang Padang tidak besar dan luas, namun sangat indah dan menarik untuk dikunjungi. Sebagian besar pengunjung Pantai Padang Padang adalah wisatawan asing karena Pantai Padang Padang kurang terkenal dikalangan wisatawan dalam negeri.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Padang_padang_beach_pantai-padang-padang2.jpg'),
	(6, '2015-01-31 19:56:10', '2015-01-31 19:56:10', 6, 3, 'Garuda Wishnu Kencana', 'exotic culture village', '<p>Garuda Wisnu Kencana atau biasa disingkat GWK adalah sebuah taman wisata budaya yang berlokasi di Bali Selatan. Garuda Wisnu Kencana adalah sebuah patung yang sangat besar karya&nbsp;I Nyoman Nuarta. Saat ini, patung Garuda Wisnu Kencana belum sepenuhnya selesai dibuat, hanya sebagian saja yang telah selesai, namun walau begitu anda tetap dapat menikmati kemegahan Garuda Wisnu Kencana. Selain patung, anda juga dapat melihat keindahan bukit kapur yang di potong menjadi balok-balok kapur besar. Balok-balok kapur ini nantinya akan penuh dengan pahatan. Selain itu di kawasan Garuda Wisnu Kencana juga terdapat teater seni, anda dapat menikmati berbagai jenis tari dan kesenian Bali di teater ini setiap harinya.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Garuda_Wishnu_Kencana_gwk.jpg'),
	(7, '2015-01-31 20:06:41', '2015-01-31 20:06:41', 6, 3, 'Pura Besakih', 'The biggest pura', '<p>Pura Besakih adalah sebuah pura yang berlokasi di kaki Gunung Agung, dan merupakan pura terbesar di Bali. Di Pura Besakih sering diadakan acara keagamaan Hindu karena Pura Besakih dipercaya sebagai tempat suci dan merupakan induk dari seluruh pura yang ada di Bali. Pura Besakih dibangun dengan konsep keseimbangan Tuhan, manusia, dan alam atau sering disebut dengan sebutan Tri Hita Karana. Untuk dapat memasuki area Pura Besakih, anda harus menggunakan sarung yang dapat dipinjam di sekitar lokasi Pura Besakih.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Pura_Besakih_purabesakih.jpg'),
	(8, '2015-01-31 20:08:29', '2015-01-31 20:08:29', 6, 2, 'Sangeh', 'monkey village', '<p>Sangeh adalah tempat wisata di Bali yang akan membawa anda menyatu dengan alam. Terletak di Ubud, Bali, Sangeh adalah sebuah hutan yang dihuni oleh banyak kera liar. Kera-kera ini dianggap keramat oleh penduduk setempat sehingga tidak boleh diganggu dan dibiarkan hidup di hutan Sangeh. Kera di Sangeh sangat menyukai makanan, mereka akan berusaha mendapatkan makanan yang anda bawa, walaupun makanan tersebut ada di dalam tas anda. Di tempat ini anda akan menyaksikan kehidupan ratusan kera yang unik dan menarik.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Sangeh_sangeh.jpg'),
	(9, '2015-01-31 20:13:17', '2015-01-31 20:13:17', 6, 2, 'Batur Kintamani Lake', 'beauty lake', '<p>Danau Batur Kintamani merupakan salah satu pesona alam yang dimiliki Bali. Terletak di gunung tertinggi ke 2 di Bali, Danau Batur Kintamani mempunyai hawa yang sejuk dan pemandangan yang sangat mempesona. Danau Batur Kintamani adalah danau terbesar di Bali yang banyak dikunjungi wisatawan karena menawarkan pemandangan yang tiada duanya di Bali.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Batur_Kintamani_Lake_batur.jpg'),
	(10, '2015-01-31 20:15:49', '2015-01-31 20:15:49', 6, 1, 'Rafting', 'the best experience', '<p>Arung Jeram Sungai Ayung mempunyai karakteristik yang berbeda dengan Arung Jeram Sungai Telaga Waja. Apabila&nbsp;Arung Jeram Sungai Telaga Waja menawarkan tantangan, maka Arung Jeram Sungai Ayung menawarkan keindahan. Panorama sepanjang Sungai Ayung sangatlah indah, ditambah dengan pahatan di tebing sungai, dan hijaunya pepohonan di sekitar sungai melengkapi keindahan&nbsp;Arung Jeram Sungai Ayung.</p>', 'http://localhost/thetour/public/images/destinasi/dest/Rafting_ayung-bali-rafting.jpg');
/*!40000 ALTER TABLE `destination` ENABLE KEYS */;


-- Dumping structure for table web_tour.destkat
DROP TABLE IF EXISTS `destkat`;
CREATE TABLE IF NOT EXISTS `destkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Destination Kategori';

-- Dumping data for table web_tour.destkat: ~7 rows (approximately)
DELETE FROM `destkat`;
/*!40000 ALTER TABLE `destkat` DISABLE KEYS */;
INSERT INTO `destkat` (`id`, `created_at`, `updated_at`, `nama`, `subtitle`, `img_path`) VALUES
	(1, '2015-01-20 11:49:02', '2015-01-20 16:00:18', 'Jawa', '..the center of indonesia', 'http://localhost/thetour/public/images/destinasi/kategori/Jawa_jawa_300.png'),
	(2, '2015-01-20 14:56:21', '2015-01-20 16:00:03', 'Sumatera', NULL, 'http://localhost/thetour/public/images/destinasi/kategori/Sumatera_sumatera_300.jpg'),
	(3, '2015-01-20 14:56:35', '2015-01-20 15:59:45', 'Kalimantan', NULL, 'http://localhost/thetour/public/images/destinasi/kategori/Kalimantan_kalimantan_300.jpg'),
	(4, '2015-01-20 14:56:47', '2015-01-20 15:59:34', 'Sulawesi', NULL, 'http://localhost/thetour/public/images/destinasi/kategori/Sulawesi_sulawesi_300.jpg'),
	(5, '2015-01-20 14:57:01', '2015-01-21 07:17:09', 'Kepulauan Maluku', NULL, 'http://localhost/thetour/public/images/destinasi/kategori/Kepulauan_Maluku_maluku_300.jpg'),
	(6, '2015-01-20 14:57:11', '2015-01-21 07:23:19', 'Bali', '..the gods island', 'http://localhost/thetour/public/images/destinasi/kategori/Bali_bali_300.png'),
	(7, '2015-01-20 14:57:23', '2015-01-21 11:18:37', 'Papua', '..the hidden paradise', 'http://localhost/thetour/public/images/destinasi/kategori/Papua_papua_300.jpg');
/*!40000 ALTER TABLE `destkat` ENABLE KEYS */;


-- Dumping structure for table web_tour.gallery
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tipe gallery Y: image N : video',
  `desc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_isurl` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.gallery: ~14 rows (approximately)
DELETE FROM `gallery`;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `created_at`, `updated_at`, `type`, `desc`, `img_path`, `img_isurl`) VALUES
	(5, '2015-01-23 07:31:55', '2015-01-23 07:31:55', 'Y', 'Borobudur Temple', 'http://localhost/thetour/public/gallery/photo/_2336220351_825a1b92d3_b.jpg', 'N'),
	(6, '2015-01-23 07:32:15', '2015-01-23 07:32:15', 'Y', 'Ubud Village', 'http://localhost/thetour/public/gallery/photo/_Awesome-Maya-Ubud-River-View-with-Fresh-Water.jpg', 'N'),
	(7, '2015-01-23 07:32:31', '2015-01-23 07:32:31', 'Y', 'Bromo Mountain', 'http://localhost/thetour/public/gallery/photo/_bromo_and_friends_by_puthanindya-d465mmz.jpg', 'N'),
	(8, '2015-01-23 07:32:47', '2015-01-23 07:32:47', 'Y', 'Bunaken National Park', 'http://localhost/thetour/public/gallery/photo/_Bunaken_National_Park.jpg', 'N'),
	(9, '2015-01-23 07:33:33', '2015-01-23 07:33:33', 'Y', 'Cukang Taneuh - The Green Canyon Indonesia', 'http://localhost/thetour/public/gallery/photo/_Green-Canyon-Cukang-Taneuh.jpg', 'N'),
	(10, '2015-01-23 07:33:53', '2015-01-23 07:33:53', 'Y', 'Bedugul', 'http://localhost/thetour/public/gallery/photo/_SUNRISE-IN-PARADISE.jpg', 'N'),
	(11, '2015-01-23 07:48:37', '2015-01-23 07:48:37', 'Y', 'Tanah Lot Bali', 'http://localhost/thetour/public/gallery/photo/_Keindahan-Pura-Tanah-Lot.jpg', 'N'),
	(12, '2015-01-23 07:48:49', '2015-01-23 07:48:49', 'Y', 'Uluwatu', 'http://localhost/thetour/public/gallery/photo/_L-Uluwatu.jpg', 'N'),
	(13, '2015-01-23 07:49:04', '2015-01-23 07:49:04', 'Y', 'Kuta Beach', 'http://localhost/thetour/public/gallery/photo/_wisata-pantai-kuta-di-bali.jpg', 'N'),
	(14, '2015-01-23 07:49:18', '2015-01-23 07:49:18', 'Y', 'Teluk Ijo - Green Bay', 'http://localhost/thetour/public/gallery/photo/_ijo_3.jpg', 'N'),
	(15, '2015-01-24 11:01:01', '2015-01-24 12:45:47', 'N', 'Suzuki Van Van 125', 'xSlCmqjr4d0', 'N'),
	(16, '2015-01-24 11:03:37', '2015-01-24 11:44:28', 'N', 'Yamaha TW 125 Onboard', 'CRTFFnUTv5w', 'N'),
	(17, '2015-01-24 11:45:44', '2015-01-24 11:46:16', 'N', 'Yamaha TW 125 Svramler', 'Jl8-gwyum2g', 'N'),
	(18, '2015-01-24 14:45:06', '2015-01-24 14:45:06', 'N', 'Perfect Ride', '4U1OoG0QPcw', 'N');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Dumping structure for table web_tour.homepage
DROP TABLE IF EXISTS `homepage`;
CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `welcome_say` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tagline` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_customer_say` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `find_a_dest_head` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `find_a_dest_desc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `find_a_dest_show` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `read_news_head` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read_news_desc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read_news_show` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `buy_travel_guide_head` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buy_travel_guide_desc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buy_travel_guide_show` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `what_they_say_head` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `what_they_say_desc` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `what_they_say_show` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.homepage: ~1 rows (approximately)
DELETE FROM `homepage`;
/*!40000 ALTER TABLE `homepage` DISABLE KEYS */;
INSERT INTO `homepage` (`id`, `created_at`, `updated_at`, `welcome_say`, `tagline`, `show_customer_say`, `find_a_dest_head`, `find_a_dest_desc`, `find_a_dest_show`, `read_news_head`, `read_news_desc`, `read_news_show`, `buy_travel_guide_head`, `buy_travel_guide_desc`, `buy_travel_guide_show`, `what_they_say_head`, `what_they_say_desc`, `what_they_say_show`) VALUES
	(1, '2015-01-05 11:34:58', '2015-01-26 15:52:22', '<h1>Welcome to Pink Rio, a multipurpose theme</h1>\r\n<p>Proin luctus euismod diam et ultricies. Maecenas pharetra pellentesque ipsum nec egestas. Praesent scelerisque leo dui, vel rutrum dolor. Aenean at risus egestas urna accumsan aliquet.<a href="frnt/"> Nullam risus mi,</a> posuere vel lacinia vel, aliquam vel massa. Ut rutrum magna quis leo imperdiet posuere. Nulla ut eros nibh, id viverra orci. Integer mollis rhoncus nibh in consectetur</p>', '<blockquote class="text-quote-quote">&ldquo;The caterpillar does all the work but the butterfly gets all the publicity.&rdquo;</blockquote>\r\n<p><cite class="text-quote-author">George Carlin</cite></p>', 'Y', 'Find a destination', 'Know where you\'re heading? Find out more and get into the detail.', 'Y', 'Read news', 'Browse the latest articles and dispatches from our writers across the globe.', 'Y', 'Buy travel guides', 'Browse our store for the latest Rough Guides travel guides', 'Y', 'What they say', 'Get testimonials from our latest customers', 'Y');
/*!40000 ALTER TABLE `homepage` ENABLE KEYS */;


-- Dumping structure for table web_tour.homepage_car
DROP TABLE IF EXISTS `homepage_car`;
CREATE TABLE IF NOT EXISTS `homepage_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.homepage_car: ~0 rows (approximately)
DELETE FROM `homepage_car`;
/*!40000 ALTER TABLE `homepage_car` DISABLE KEYS */;
/*!40000 ALTER TABLE `homepage_car` ENABLE KEYS */;


-- Dumping structure for table web_tour.homepage_favdest
DROP TABLE IF EXISTS `homepage_favdest`;
CREATE TABLE IF NOT EXISTS `homepage_favdest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `travpack_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.homepage_favdest: ~0 rows (approximately)
DELETE FROM `homepage_favdest`;
/*!40000 ALTER TABLE `homepage_favdest` DISABLE KEYS */;
INSERT INTO `homepage_favdest` (`id`, `created_at`, `updated_at`, `travpack_id`) VALUES
	(1, '2015-02-13 15:02:24', '2015-02-13 15:02:24', 4),
	(2, '2015-02-14 06:52:09', '2015-02-14 06:52:09', 5);
/*!40000 ALTER TABLE `homepage_favdest` ENABLE KEYS */;


-- Dumping structure for table web_tour.homepage_hotel
DROP TABLE IF EXISTS `homepage_hotel`;
CREATE TABLE IF NOT EXISTS `homepage_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.homepage_hotel: ~0 rows (approximately)
DELETE FROM `homepage_hotel`;
/*!40000 ALTER TABLE `homepage_hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `homepage_hotel` ENABLE KEYS */;


-- Dumping structure for table web_tour.homepage_slider
DROP TABLE IF EXISTS `homepage_slider`;
CREATE TABLE IF NOT EXISTS `homepage_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `img_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.homepage_slider: ~3 rows (approximately)
DELETE FROM `homepage_slider`;
/*!40000 ALTER TABLE `homepage_slider` DISABLE KEYS */;
INSERT INTO `homepage_slider` (`id`, `created_at`, `updated_at`, `img_name`, `title`, `subtitle`, `link`, `publish`) VALUES
	(1, '2015-01-10 14:37:13', '2015-01-10 14:37:13', 'slider_1_2336220351_825a1b92d3_b.jpg', 'Borobudur Temple', 'The biggest temple in the world', '', 'Y'),
	(2, '2015-01-10 14:37:47', '2015-01-10 14:37:47', 'slider_2_Keindahan-gambar-raja-ampat-6.jpg', 'Raja Ampat', 'the wow islands', '', 'Y'),
	(6, '2015-01-27 09:09:33', '2015-01-27 09:09:33', 'slider_6_bromo-1903201011.jpg', 'Bromo Mountain', 'the best spot', '', 'Y');
/*!40000 ALTER TABLE `homepage_slider` ENABLE KEYS */;


-- Dumping structure for table web_tour.hotel
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `desc` mediumtext COLLATE utf8_unicode_ci,
  `fasilitas` text COLLATE utf8_unicode_ci,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `foto_1` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `foto_2` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `foto_3` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `foto_4` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.hotel: ~0 rows (approximately)
DELETE FROM `hotel`;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;


-- Dumping structure for table web_tour.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.kategori: ~8 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id`, `created_at`, `updated_at`, `nama`, `publish`) VALUES
	(1, '2014-11-15 19:13:14', '2014-11-27 05:46:59', 'Advantures', 'Y'),
	(2, '2014-11-15 19:13:20', '2014-11-15 23:02:14', 'Natures', 'Y'),
	(3, '2014-11-15 19:13:29', '2014-11-25 18:19:03', 'Cultures', 'N'),
	(4, '2014-11-15 19:13:47', '2014-11-21 12:26:07', 'City Tour', 'Y'),
	(5, '2014-11-15 22:08:12', '2014-11-15 22:08:12', 'Social', 'N'),
	(6, '2014-11-17 09:35:44', '2014-11-17 09:35:44', 'Backpacker', 'Y'),
	(7, '2014-11-17 09:36:39', '2014-11-17 09:36:39', 'Traveling', 'Y'),
	(8, '2014-11-17 09:37:13', '2014-11-17 09:37:13', 'Downhill', 'Y');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;


-- Dumping structure for table web_tour.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('1','2','3','4','5','6','7','8') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1:Home Page, 2:Static Page, 3 : Blog List,4:Contact Page;5:gallery 6:destinatino,7:booking;8:testimoni',
  `position` enum('1','2','3') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1:Top, 2:Bottom,3:both',
  `position_order` int(11) DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `statpage_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.menus: ~9 rows (approximately)
DELETE FROM `menus`;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `created_at`, `updated_at`, `nama`, `type`, `position`, `position_order`, `publish`, `statpage_id`) VALUES
	(1, '2014-12-01 10:36:20', '2014-12-04 06:55:27', 'Home', '1', '3', 1, 'Y', NULL),
	(2, '2014-12-01 10:36:28', '2015-01-12 16:54:42', 'About', '2', '3', 2, 'Y', 11),
	(3, '2014-12-01 10:41:29', '2014-12-04 06:55:23', 'Blog', '3', '3', 3, 'Y', NULL),
	(7, '2014-12-04 06:23:14', '2014-12-15 12:43:56', 'Services', '2', '3', 4, 'N', NULL),
	(9, '2014-12-25 19:33:51', '2014-12-25 19:33:51', 'Gallery', '5', '3', 6, 'Y', NULL),
	(10, '2014-12-26 15:08:45', '2014-12-26 15:08:45', 'Destination', '6', '3', 4, 'Y', NULL),
	(11, '2014-12-26 15:08:57', '2015-01-27 09:03:04', 'Booking', '7', '3', 5, 'Y', NULL),
	(12, '2015-01-26 16:36:39', '2015-01-27 09:01:31', 'Testimonials', '8', '1', 7, 'Y', NULL),
	(13, '2015-01-27 10:58:44', '2015-01-27 10:58:44', 'Contact Us', '4', '3', 8, 'Y', NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;


-- Dumping structure for table web_tour.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `first_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `replied` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `inbox` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.messages: ~3 rows (approximately)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `created_at`, `updated_at`, `first_name`, `last_name`, `email`, `message`, `read`, `replied`, `inbox`, `message_id`) VALUES
	(1, '2015-01-15 09:00:02', '2015-01-15 09:00:02', 'roti', NULL, 'roti@bakeri.com', 'beli roti bakar', 'N', 'N', NULL, NULL),
	(2, '2015-01-15 09:06:27', '2015-01-15 09:06:27', 'roti', NULL, 'roti@bakeri.com', 'beli roti bakar', 'N', 'N', NULL, NULL),
	(3, '2015-01-27 09:55:15', '2015-01-27 09:55:15', 'riko', NULL, 'riko@teko.com', 'hallloo', 'N', 'N', NULL, NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


-- Dumping structure for table web_tour.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2013_03_17_131246_verify_init', 1),
	('2013_05_11_082613_use_soft_delete', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table web_tour.partners
DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.partners: ~0 rows (approximately)
DELETE FROM `partners`;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;


-- Dumping structure for table web_tour.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.permissions: ~13 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'access_dashboard', 'Access dashboard', '2015-01-27 16:02:05', '2015-01-27 16:02:07'),
	(2, 'access_user_manager', 'Access user manager', '2015-01-27 16:02:26', '2015-01-27 16:02:26'),
	(3, 'access_homepage_manager', 'Access homepage manager', '2015-01-27 16:03:18', '2015-01-27 16:03:19'),
	(4, 'access_contactpage_manager', 'Access contactpage manager', '2015-01-27 16:04:03', '2015-01-27 16:04:03'),
	(5, 'access_menu_manager', 'Access menu manager', '2015-01-27 18:07:23', '2015-01-27 18:07:23'),
	(6, 'access_artikel_kategori_manager', 'Access Blogs kategori manager', '2015-01-27 18:07:47', '2014-01-27 18:07:48'),
	(7, 'access_artikel_manager', 'Access artikel manager', '2015-01-27 18:08:04', '2015-01-27 18:08:04'),
	(8, 'access_testimoni_manager', 'Access testimoni manager', '2015-01-27 18:08:18', '2015-01-27 18:08:19'),
	(9, 'access_staticpage_manager', 'Access static page manager', '2015-01-27 18:08:34', '2015-01-27 18:08:34'),
	(10, 'access_destinasi_kategori_manager', 'Access destinasi kategori manager', '2015-01-27 18:08:52', '2015-01-27 18:08:53'),
	(11, 'access_destinasi_manager', 'Access destinasi manager', '2015-01-27 18:09:03', '2015-01-27 18:09:04'),
	(12, 'access_photo_manager', 'Access photo manager', '2015-01-27 18:09:14', '2015-01-27 18:09:14'),
	(13, 'access_video_manager', 'Access video manger', '2015-01-27 18:09:23', '2015-01-27 18:09:23');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table web_tour.permission_role
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

-- Dumping data for table web_tour.permission_role: ~0 rows (approximately)
DELETE FROM `permission_role`;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Dumping structure for table web_tour.place
DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `img_folder` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.place: ~5 rows (approximately)
DELETE FROM `place`;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` (`id`, `created_at`, `updated_at`, `city_id`, `nama`, `desc`, `img_folder`) VALUES
	(1, '2014-12-22 16:51:27', '2014-12-22 16:51:27', 3, 'Telaga Sarangan', NULL, 'images/destinasi/place_1'),
	(3, '2014-12-23 09:45:38', '2014-12-23 09:45:38', 1, 'Pantai Ria Kenjeran', NULL, NULL),
	(4, '2014-12-23 09:46:15', '2014-12-23 09:46:15', 1, 'Pantai Ria Kenjeran', NULL, 'images/destinasi/place_4'),
	(5, '2014-12-23 09:47:37', '2014-12-23 09:47:37', 2, 'Jatim Park I', NULL, 'images/destinasi/place_5'),
	(6, '2014-12-23 09:48:12', '2014-12-23 09:48:13', 2, 'Waduk Karang Kates', NULL, 'images/destinasi/place_6');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;


-- Dumping structure for table web_tour.province
DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.province: ~9 rows (approximately)
DELETE FROM `province`;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `created_at`, `updated_at`, `nama`) VALUES
	(1, '2014-12-18 10:50:32', '2014-12-18 10:50:32', 'Jawa Timur'),
	(2, '2014-12-18 10:50:39', '2014-12-18 10:50:39', 'Jawa Barat'),
	(3, '2014-12-18 10:51:00', '2014-12-18 10:51:00', 'Jawa Tengah'),
	(4, '2014-12-18 10:51:09', '2014-12-18 10:51:09', 'DI Yogyakarta'),
	(5, '2014-12-18 10:51:14', '2014-12-18 10:51:19', 'DKI Jakarta'),
	(6, '2014-12-18 10:51:37', '2014-12-18 10:51:37', 'Banten'),
	(7, '2014-12-18 10:51:40', '2014-12-18 10:51:40', 'Bali'),
	(8, '2014-12-18 10:51:46', '2014-12-18 10:51:55', 'Sumatera Utara'),
	(11, '2014-12-18 10:52:43', '2014-12-18 10:52:43', 'Sumatera Barat');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;


-- Dumping structure for table web_tour.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.roles: ~4 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', NULL, 10, '2015-01-27 11:45:18', '2015-01-27 11:45:21'),
	(2, 'Administrator', NULL, 9, '2015-01-27 11:45:23', '2015-01-27 11:45:25'),
	(3, 'Editor', NULL, 8, '2015-01-27 11:45:34', '2015-01-27 11:45:35'),
	(4, 'Member', NULL, 7, '2015-01-27 11:45:44', '2015-01-27 11:45:44');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table web_tour.role_user
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

-- Dumping data for table web_tour.role_user: ~2 rows (approximately)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2014-10-28 01:30:39', '2014-10-28 01:30:39'),
	(2, 3, '2015-01-27 16:04:31', '2015-01-27 16:04:31');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Dumping structure for table web_tour.slider_images
DROP TABLE IF EXISTS `slider_images`;
CREATE TABLE IF NOT EXISTS `slider_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `imageurl` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.slider_images: ~5 rows (approximately)
DELETE FROM `slider_images`;
/*!40000 ALTER TABLE `slider_images` DISABLE KEYS */;
INSERT INTO `slider_images` (`id`, `created_at`, `updated_at`, `imageurl`, `title`, `sub_title`, `publish`) VALUES
	(1, '2014-12-09 21:07:04', '2014-12-09 21:07:04', 'frnt/images/slider/1.jpg', 'BROMO <span style="color: #ff6600;">VIEW</span>', 'the beautiful of bromo, are you amaze??', 'Y'),
	(2, '2014-12-09 21:07:30', '2014-12-09 21:07:30', 'frnt/images/slider/2.jpg', NULL, NULL, 'Y'),
	(3, '2014-12-09 21:07:36', '2014-12-09 21:07:36', 'frnt/images/slider/3.jpg', NULL, NULL, 'Y'),
	(4, '2014-12-09 21:07:46', '2014-12-09 21:07:46', 'frnt/images/slider/4.jpg', 'BROMO <span style="color: #ff6600;">VIEW</span>', 'the beautiful of bromo, are you amaze??', 'Y'),
	(5, '2014-12-09 21:07:52', '2014-12-09 21:07:52', 'frnt/images/slider/5.jpg', NULL, NULL, 'Y');
/*!40000 ALTER TABLE `slider_images` ENABLE KEYS */;


-- Dumping structure for table web_tour.statpages
DROP TABLE IF EXISTS `statpages`;
CREATE TABLE IF NOT EXISTS `statpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8_unicode_ci,
  `default_konten` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.statpages: ~1 rows (approximately)
DELETE FROM `statpages`;
/*!40000 ALTER TABLE `statpages` DISABLE KEYS */;
INSERT INTO `statpages` (`id`, `created_at`, `updated_at`, `nama`, `konten`, `default_konten`) VALUES
	(11, '2014-12-09 19:57:24', '2015-01-12 16:20:37', 'About Us', '<div id="page-meta">\r\n<div class="inner group">\r\n<h3>Who We are</h3>\r\n<h4>We make amazing things</h4>\r\n</div>\r\n</div>\r\n<div id="primary" class="sidebar-no">\r\n<div class="inner group"><!-- START CONTENT -->\r\n<div id="content-page" class="content group">\r\n<h2>About Us</h2>\r\n<div class="hentry group">\r\n<p>For over 50 years, Let\'s Go has created the world\'s favorite&nbsp;<strong>student travel</strong>&nbsp;content series, written entirely&nbsp;<strong>for students by students</strong>. With pen and notebook in hand and a few changes of underwear stuffed in our backpacks, we spend months roaming the globe in search of travel bargains for savvy travelers just like you.</p>\r\n<p>Every year, researchers hit the road for off-the-beaten-path exploration&mdash;from New York to Naples, Bangkok to Buenos Aires, Melbourne to Mexico. Back at Let\'s Go Headquarters, editors massage copy written on Mediterranean fishing boats into fine, sparkling prose for readers both young and young at heart. The result is content that is as accurate as it is sassy.</p>\r\n<p>Let us be your gateway to adventure. We\'ll help you get to the edge of the world, and when you find yourself emerging from the untamed wilds onto windswept cliffs, we\'ll have your back.</p>\r\n<br />\r\n<blockquote>\r\n<p>Get of the tour bus, lets go!!</p>\r\n</blockquote>\r\n</div>\r\n<!-- START COMMENTS -->\r\n<div id="comments">&nbsp;</div>\r\n<div>\r\n<h2>Our team</h2>\r\n<div class="hentry group">\r\n<p>&nbsp;</p>\r\n<div id="content-page" class="content group">\r\n<div class="hentry group">\r\n<div class="testimonial two-fourth ">\r\n<div class="thumbnail"><img title="Fotolia_20568380_Subscription_XXL" src="frnt/images/avatar/Fotolia_20568380_Subscription_XXL-94x94.jpg" alt="Fotolia_20568380_Subscription_XXL" /></div>\r\n<div class="testimonial-text">\r\n<p>I purchased this theme and I really like it. The theme authors have been very helpful in the support area of their website. Would definitely recommend to anyone needing a corporate wordpress theme. What to say about the[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Erica Evans</a><a class="website" href="http://www.unisoftware.com">unisoftware.com</a></div>\r\n</div>\r\n<div class="testimonial two-fourth last">\r\n<div class="thumbnail"><img title="ricardo" src="frnt/images/avatar/ricardo-94x94.jpg" alt="ricardo" /></div>\r\n<div class="testimonial-text">\r\n<p>Bookmark this theme as one of your &ldquo;Must Haves for 2012&rdquo; This theme is without a doubt one of our Top 5 Purchases. Once you get used to how the content is organised in Admin, the applications are[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Ricardo Mori</a><a class="website" href="http://www.net.ons.com">Netsons Inc</a></div>\r\n</div>\r\n<div class="testimonial two-fourth ">\r\n<div class="thumbnail"><img title="Fotolia_24730952_Subscription_XXL" src="frnt/images/avatar/Fotolia_24730952_Subscription_XXL-94x94.jpg" alt="Fotolia_24730952_Subscription_XXL" /></div>\r\n<div class="testimonial-text">\r\n<p>I am absolutely thrilled with this theme! I have never built a website before but your instructions and design make it both fun and easy to do. &hellip;Thanks a lot for your help! your support is AMAZING. 5 themeforest[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Elisa Meis</a><a class="website" href="http://www.google.com">Two in Love Society</a></div>\r\n</div>\r\n<div class="testimonial two-fourth last">\r\n<div class="thumbnail"><img title="Fotolia_7454857_Subscription_XXL" src="frnt/images/avatar/Fotolia_7454857_Subscription_XXL-94x94.jpg" alt="Fotolia_7454857_Subscription_XXL" /></div>\r\n<div class="testimonial-text">\r\n<p>I already given a 5-star rating, but I also wanted to provide my two cents in case anyone is unsure about purchasing this theme. Not only is the theme itself very versatile and easy to manipulate, but the[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Joy Mergot</a><a class="website" href="http://domingoroses.net">domingoroses.net</a></div>\r\n</div>\r\n</div>\r\n<!-- START COMMENTS -->\r\n<div id="comments">&nbsp;</div>\r\n<!-- END COMMENTS --></div>\r\n<p>&nbsp;</p>\r\n<div class="hentry group">\r\n<div class="clear">&nbsp;</div>\r\n<script type="mce-no/type">// <![CDATA[\r\njQuery(document).ready(function($){\r\n				                    	\r\n				                    	$(\'.accordion-title\').click(function(){\r\n				                    		if( !$(this).hasClass(\'active\') ) {\r\n				                    			$(\'.accordion-title\').removeClass(\'active\').find(\'span\').addClass(\'icon-plus-sign\').removeClass(\'icon-minus-sign\');\r\n				                    			$(\'.accordion-item\').slideUp();\r\n				                    \r\n				                    			$(this).toggleClass(\'active\')\r\n				                    				   .find(\'span\').removeClass(\'icon-plus-sign\').addClass(\'icon-minus-sign\').parent()\r\n				                    				   .next().slideToggle();\r\n				                    		}\r\n				                    	}).filter(\':first\').click();\r\n				                    	\r\n				                    });\r\n// ]]></script>\r\n</div>\r\n<br />\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<!-- END COMMENTS --></div>\r\n<!-- END CONTENT --> <!-- START EXTRA CONTENT --> <!-- END EXTRA CONTENT --></div>\r\n</div>', '<div id="page-meta">\r\n<div class="inner group">\r\n<h3>Who We are</h3>\r\n<h4>We make amazing things</h4>\r\n</div>\r\n</div>\r\n<div id="primary" class="sidebar-no">\r\n<div class="inner group"><!-- START CONTENT -->\r\n<div id="content-page" class="content group">\r\n<h2>About Us</h2>\r\n<div class="hentry group">\r\n<p>For over 50 years, Let\'s Go has created the world\'s favorite&nbsp;<strong>student travel</strong>&nbsp;content series, written entirely&nbsp;<strong>for students by students</strong>. With pen and notebook in hand and a few changes of underwear stuffed in our backpacks, we spend months roaming the globe in search of travel bargains for savvy travelers just like you.</p>\r\n<p>Every year, researchers hit the road for off-the-beaten-path exploration&mdash;from New York to Naples, Bangkok to Buenos Aires, Melbourne to Mexico. Back at Let\'s Go Headquarters, editors massage copy written on Mediterranean fishing boats into fine, sparkling prose for readers both young and young at heart. The result is content that is as accurate as it is sassy.</p>\r\n<p>Let us be your gateway to adventure. We\'ll help you get to the edge of the world, and when you find yourself emerging from the untamed wilds onto windswept cliffs, we\'ll have your back.</p>\r\n<br />\r\n<blockquote>\r\n<p>Get of the tour bus, lets go!!</p>\r\n</blockquote>\r\n</div>\r\n<!-- START COMMENTS -->\r\n<div id="comments">&nbsp;</div>\r\n<div>\r\n<h2>Our team</h2>\r\n<div class="hentry group">\r\n<p>&nbsp;</p>\r\n<div id="content-page" class="content group">\r\n<div class="hentry group">\r\n<div class="testimonial two-fourth ">\r\n<div class="thumbnail"><img title="Fotolia_20568380_Subscription_XXL" src="frnt/images/avatar/Fotolia_20568380_Subscription_XXL-94x94.jpg" alt="Fotolia_20568380_Subscription_XXL" /></div>\r\n<div class="testimonial-text">\r\n<p>I purchased this theme and I really like it. The theme authors have been very helpful in the support area of their website. Would definitely recommend to anyone needing a corporate wordpress theme. What to say about the[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Erica Evans</a><a class="website" href="http://www.unisoftware.com">unisoftware.com</a></div>\r\n</div>\r\n<div class="testimonial two-fourth last">\r\n<div class="thumbnail"><img title="ricardo" src="frnt/images/avatar/ricardo-94x94.jpg" alt="ricardo" /></div>\r\n<div class="testimonial-text">\r\n<p>Bookmark this theme as one of your &ldquo;Must Haves for 2012&rdquo; This theme is without a doubt one of our Top 5 Purchases. Once you get used to how the content is organised in Admin, the applications are[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Ricardo Mori</a><a class="website" href="http://www.net.ons.com">Netsons Inc</a></div>\r\n</div>\r\n<div class="testimonial two-fourth ">\r\n<div class="thumbnail"><img title="Fotolia_24730952_Subscription_XXL" src="frnt/images/avatar/Fotolia_24730952_Subscription_XXL-94x94.jpg" alt="Fotolia_24730952_Subscription_XXL" /></div>\r\n<div class="testimonial-text">\r\n<p>I am absolutely thrilled with this theme! I have never built a website before but your instructions and design make it both fun and easy to do. &hellip;Thanks a lot for your help! your support is AMAZING. 5 themeforest[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Elisa Meis</a><a class="website" href="http://www.google.com">Two in Love Society</a></div>\r\n</div>\r\n<div class="testimonial two-fourth last">\r\n<div class="thumbnail"><img title="Fotolia_7454857_Subscription_XXL" src="frnt/images/avatar/Fotolia_7454857_Subscription_XXL-94x94.jpg" alt="Fotolia_7454857_Subscription_XXL" /></div>\r\n<div class="testimonial-text">\r\n<p>I already given a 5-star rating, but I also wanted to provide my two cents in case anyone is unsure about purchasing this theme. Not only is the theme itself very versatile and easy to manipulate, but the[...]</p>\r\n</div>\r\n<div class="testimonial-name"><a class="name" href="testimonial.html">Joy Mergot</a><a class="website" href="http://domingoroses.net">domingoroses.net</a></div>\r\n</div>\r\n</div>\r\n<!-- START COMMENTS -->\r\n<div id="comments">&nbsp;</div>\r\n<!-- END COMMENTS --></div>\r\n<p>&nbsp;</p>\r\n<div class="hentry group">\r\n<div class="clear">&nbsp;</div>\r\n<script type="mce-no/type">// <![CDATA[\r\njQuery(document).ready(function($){\r\n				                    	\r\n				                    	$(\'.accordion-title\').click(function(){\r\n				                    		if( !$(this).hasClass(\'active\') ) {\r\n				                    			$(\'.accordion-title\').removeClass(\'active\').find(\'span\').addClass(\'icon-plus-sign\').removeClass(\'icon-minus-sign\');\r\n				                    			$(\'.accordion-item\').slideUp();\r\n				                    \r\n				                    			$(this).toggleClass(\'active\')\r\n				                    				   .find(\'span\').removeClass(\'icon-plus-sign\').addClass(\'icon-minus-sign\').parent()\r\n				                    				   .next().slideToggle();\r\n				                    		}\r\n				                    	}).filter(\':first\').click();\r\n				                    	\r\n				                    });\r\n// ]]></script>\r\n</div>\r\n<br />\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<!-- END COMMENTS --></div>\r\n<!-- END CONTENT --> <!-- START EXTRA CONTENT --> <!-- END EXTRA CONTENT --></div>\r\n</div>');
/*!40000 ALTER TABLE `statpages` ENABLE KEYS */;


-- Dumping structure for table web_tour.testimoni
DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `img` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.testimoni: ~4 rows (approximately)
DELETE FROM `testimoni`;
/*!40000 ALTER TABLE `testimoni` DISABLE KEYS */;
INSERT INTO `testimoni` (`id`, `created_at`, `updated_at`, `nama`, `company`, `website`, `message`, `publish`, `img`) VALUES
	(1, '2015-01-26 16:06:22', '2015-01-26 17:34:14', 'Joy Mergot', 'domingoroses.net', 'http://domingoroses.net', '<p>I already given a <strong>5-star rating</strong>, but I also wanted to provide my two cents in case anyone is unsure about purchasing this theme. Not only is the theme itself very versatile and easy to manipulate, but the support we get in the forum is amazing &ndash; the developers are very, very quick to respond to issues. It&rsquo;s a great theme and I would strongly recommend it.&nbsp;</p>\r\n<p>What to say about the Maya theme? THANK YOU !! THANK YOU !! I recently purchased the wonderful Maya theme and although I&rsquo;m still learning it, I am already beyond thrilled with it! I&rsquo;m not a developer, I don&rsquo;t know any code, yet, I&rsquo;m positive I can build a gorgeous website!</p>\r\n<p>I&rsquo;ve previously used another wp-theme for my business site that is attractive on the &ldquo;outside&rdquo;, but the instructions have been a nightmare from day 1. As I&rsquo;m unable to do some of the work myself, I&rsquo;ve hired multiple designers to work on my site. Once they saw the admin. area and the instructions, they didn&rsquo;t want to waste their time trying to plod through the confusing directions, so wouldn&rsquo;t work on my site. Not so with the Maya theme! The instructions and even the coding is clean, efficient, organized and very easy to understand! A HUGE difference from my other mess.</p>\r\n<p>The support has been prompt and efficient (could I expect anything less from this wonderful team?) Yesterday I saw a notification in my wp-admin that the theme had an update. What a pleasure! My old theme developer requires that you, as the subscriber, constantly check to see if there are any updates! As if a small business owner has nothing else to do! The only &ldquo;negative&rdquo; comment I have (joking) is that I could only give 5 Stars!!</p>\r\n<p>This team deserves much more than 5! I wish this wonderful design team MUCH success! Thank you, Mimi</p>', 'Y', 'http://localhost/thetour/public/images/testimoni/testimoni_Joy_Mergot_Fotolia_7454857_Subscription_XXL-94x94.jpg'),
	(2, '2015-01-26 16:07:41', '2015-01-26 17:06:11', 'Ricardo Mori', 'Netsons Inc', 'http://netsoninc.com', 'Bookmark this theme as one of your “Must Haves for 2012” This theme is without a doubt one of our Top 5', 'Y', 'http://localhost/thetour/public/images/testimoni/testimoni_Ricardo_Mori_ricardo-94x94.jpg'),
	(3, '2015-01-26 16:12:15', '2015-01-26 17:05:46', 'Elisa Meis', 'Two in Love Society', 'http://lovesociety.com', 'I am absolutely thrilled with this theme! I have never built a website before but your instructions and design make it both', 'Y', 'http://localhost/thetour/public/images/testimoni/testimoni_Elisa_Meis_Fotolia_24730952_Subscription_XXL-94x94.jpg'),
	(4, '2015-01-26 16:13:06', '2015-01-26 17:05:29', 'Erica Evans', 'unisoftware.com', 'http://unisoftware.com', 'I purchased this theme and I really like it. The theme authors have been very helpful in the support area of their', 'Y', 'http://localhost/thetour/public/images/testimoni/testimoni_Erica_Evans_Fotolia_20568380_Subscription_XXL-94x94.jpg');
/*!40000 ALTER TABLE `testimoni` ENABLE KEYS */;


-- Dumping structure for table web_tour.travpack
DROP TABLE IF EXISTS `travpack`;
CREATE TABLE IF NOT EXISTS `travpack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `travpackcategory_id` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `price` double DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `img_1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_4` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fasilitas` text COLLATE utf8_unicode_ci,
  `paket_include` text COLLATE utf8_unicode_ci,
  `paket_exclude` text COLLATE utf8_unicode_ci,
  `itinerary` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.travpack: ~1 rows (approximately)
DELETE FROM `travpack`;
/*!40000 ALTER TABLE `travpack` DISABLE KEYS */;
INSERT INTO `travpack` (`id`, `created_at`, `updated_at`, `nama`, `travpackcategory_id`, `desc`, `price`, `publish`, `img_1`, `img_2`, `img_3`, `img_4`, `fasilitas`, `paket_include`, `paket_exclude`, `itinerary`) VALUES
	(4, '2015-02-11 18:02:25', '2015-02-11 18:02:25', 'Open Trip Hemat ! Paket Wisata Batu Bromo 2H1M, 2015', 2, '<p><strong>Hanya dengan Rp. 775.000/orang anda sudah bisa Menikmati Pesona Kota Batu dengan wisata Modernnya Jawa Timur Park 2 ( Museum satwa &amp; Batu Secreet Zoo ) , Museum Angkut dan Exotisnya Gunung Bromo, Paket sudah termasuk TIket Masuk dan Penginapan,&nbsp;</strong>&nbsp;Saat orang menyebut buah apel, udara sejuk, hulu sungai brantas dan pesona alam nan indah pasti ingatannya akan tertuju pada Kota Wisata Batu. Ikon itu pula yang membedakan Kota Wisata Batu dengan kota lain di Indonesia. Secara geografis, kota di Provinsi Jawa Timur ini berada pada ketinggian antara 680-1700 meter di atas permukaan air laut dengan suhu udara berkisar antara 15-19 derajat celcius. Tepatnya di sebelah barat Kota Malang dengan jarak kurang lebih 19 km. Jika bertolak dari Kota Surabaya, perjalanan ke Kota Wisata Batu butuh waktu kurang lebih 2 jam.</p>\r\n<p><strong>Open Trip Paket wisata batu bromo/ Sharing Tour adalah,</strong>&nbsp;Tour yang digabungkan dengan peserta lain untuk menghemat biaya Tour Private, dengan mengikuti Open trip anda akan menghemat biaya Tour Sekaligus menambah kenalan/Teman Baru</p>', 775, 'Y', 'paket_4_img1_225848.jpg', 'paket_4_img2_arung_jeram_rafting_sukabumi1.JPG', 'paket_4_img3_bromo-1903201011.jpg', NULL, '<p><strong>Minimal Keberangkatan 6&nbsp;Orang<br />Minimal Pendaftaran 1 Orang<br />Jam Keberangkatan : 08.00-09.00<br />Lokasi Wisata Batu : </strong>Malang City Tour, Wisata Kuliner &amp; Oleh Oleh<strong> ,</strong>Jatimpark 2 ( Museum Satwa &amp; Batu Secreet Zoo ), Museum Angkut<br /><strong>Lokasi Wisata Bromo : </strong>Penanjakan 1 Sunrise, Padang Savana, Pasir Berbisik, Kawah Bromo<br /><strong>Meeting Poin/Penjemputan &nbsp;:</strong>&nbsp;Malang ( Stasiun/Bandara/Terminal)<br /><strong>Rute Tour :</strong>&nbsp;Malang-Batu-Bromo-Malang<br /><strong>Durasi Tour :</strong>&nbsp; 2&nbsp;hari 1&nbsp;Malam<br /><strong>Meeting Poin :</strong>&nbsp;Malang&nbsp;Kota<br /><strong>Perlengkapan :</strong>&nbsp;Jaket Tebal, Sarung Tangan, Syal, Penutup Kepala, Masker, Makanan Kecil<br /><strong>Pembayaran :</strong>&nbsp;Full Payment by Transfer Atau DP Minim 20% dari total Biaya<br /><strong>Turis MancaNegara/Asing :&nbsp;</strong>Extra Charge Rp. 300.000/org</p>', '<ol>\r\n<li>Transport Ac ( Avanza,Xenia All New, Luxio, Elf Pariwista,Hiace )</li>\r\n<li>Jeep Bromo</li>\r\n<li>Tiket Masuk&nbsp;Wisata Sesuai Itinerary</li>\r\n<li>Akomodasi&nbsp;Penginapan Homestay/Hotel Melati ( 1 Rumah 3-6 Kamar Share )&nbsp;1 Kamar 2 Orang</li>\r\n<li>Air Mineral 600ml</li>\r\n<li>Service Makan&nbsp;Pagi 1 x diBromo</li>\r\n<li>Sopir/Guide Lokal</li>\r\n</ol>', '<ol>\r\n<li>Biaya Transportasi dari dan ke Tempat asal peserta</li>\r\n<li>Airport Tax</li>\r\n<li>Pengeluaran pribadi selama tour (laundry, mini bar, dll)</li>\r\n<li>Tipping guide dan driver</li>\r\n<li>Surcharge hotel/Tiket periode high season</li>\r\n<li>Biaya naik kuda/kegiatan lain diluar itinerary</li>\r\n</ol>', '<table>\r\n<tbody>\r\n<tr>\r\n<td colspan="4"><strong>Day 1</strong><br /><br /></td>\r\n</tr>\r\n<tr>\r\n<td><strong>07:00-08:00</strong></td>\r\n<td>&nbsp; &nbsp; &nbsp;</td>\r\n<td colspan="2">Peserta di Jemput di Lokasi meeting Poin ( Penjemputan Peserta &ndash; Hotel-Rumah-Stasiun-Terminal )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>08.00-09.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">City Tour &nbsp;( Alun-Alun Malang &amp; Balaikota Malang )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>09.00-10.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Perjalanan Menuju Batu Check In Penginapan, &amp; Mandi</td>\r\n</tr>\r\n<tr>\r\n<td><strong>10.00-11.00&nbsp;</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Makan Siang ( Biaya Sendiri ) &amp; Mengunjungi Jawa Timur Park 2 ( Museum Satwa, Batu Secreet Zoo )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>11.00-15.00 </strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Kegiatan di Jawa Timur Park</td>\r\n</tr>\r\n<tr>\r\n<td><strong>11.00-15.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Kegiatan di Jawa Timur Park</td>\r\n</tr>\r\n<tr>\r\n<td><strong>15.00-18.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Mengunjungi Museum&nbsp;Angkut</td>\r\n</tr>\r\n<tr>\r\n<td><strong>18.00-19.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Makan Malam di RM Lokal ( Biaya Sendiri )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>19.00-20.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Kembali ke Penginapan</td>\r\n</tr>\r\n<tr>\r\n<td><strong>20.00-00.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Istirahat &amp; Acara Bebas</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
	(5, '2015-02-14 06:05:13', '2015-02-14 06:05:13', 'Exotic Tour P.Sempu-Bromo-Ijen Blue Fire 3H2M', 3, '<p>Sempu memiliki daya tarik tersendiri bagi touris domestik maupun mancanegara karena Pulau Sempu masih sangat alami dengan keindahan alamnya yang sangat angggun dan menawan.<br />Gunung Bromo merupakan bagian dari Taman Nasional Bromo Tengger Semeru. Terkenal dengan kaldera atau lautan pasir dan kawah yang eksotis, serta pemandangan matahari terbit (Bromo Sunrise Tour) yang sangat indah Kawasan Wisata Bromo terletak pada ketinggian 2.392 meter di atas permukaan laut.<br />&ldquo;Blue Fire&rdquo; atau api biru ini dapat dilihat di kawah Ijen, di puncak Gunung Ijen yang memiliki tinggi 2368 mdpl. Blue Fire merupakan penampakan api berwarna biru yang hanya dapat dilihat pada saat dini hari di kawah tersebut. Fenomena api biru ini hanya ada dua di dunia.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Harga di bawah ini adalah Harga untuk Penjemputan di Area Malang Kota</strong></p>\r\n<ol>\r\n<li>Untuk&nbsp;<strong>Penjemputan Surabaya</strong>&nbsp;dikenakan biaya tambahan<strong>&nbsp;Rp. 35.000/pax</strong></li>\r\n<li>Untuk&nbsp;<strong>Pengantaran Surabaya</strong>&nbsp;dikenakan biaya tambahan&nbsp;<strong>Rp. 35.000/pax</strong></li>\r\n<li>untuk Turis Asing Tambah&nbsp;<strong>300.000/pax</strong></li>\r\n<li>sopir/Guide Bahasa Inggris Tambah<strong>&nbsp;Rp. 150.000</strong></li>\r\n<li>tidak termasuk tiket naik kuda ,Pengeluaran pribadi &amp; Tips</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<table style="height: 116px;" width="938">\r\n<tbody>\r\n<tr>\r\n<td><strong>PESERTA</strong></td>\r\n<td><strong>HARGA/ORANG</strong></td>\r\n<td><strong>TOTAL</strong></td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td>1,100,000</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>1,225,000</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>1,400,000</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>1,745,000</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>2,383,000</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><br />*Harga tidak berlaku untuk periode High Season ( Idul Fitri, Natal &amp; Tahun Baru )</p>', 110, 'Y', 'paket_5_img1_Awesome-Maya-Ubud-River-View-with-Fresh-Water.jpg', 'paket_5_img2_bali_enjoy.jpg', 'paket_5_img3_batur.jpg', 'paket_5_img4_bromo_and_friends_by_puthanindya-d465mmz.jpg', '', '<ol>\r\n<li>Transport AC &nbsp;Selama Tour ( Avanza All New, Xenia All New, Luxio, Elf Pariwisata, Toyota Hiace )</li>\r\n<li>Jeep Wisata Bromo ( 1 Unit Max 6 Orang )</li>\r\n<li>Tiket Taman Nasional Bromo Tengger</li>\r\n<li>Tiket &amp; Perijinan P Sempu</li>\r\n<li>Tiket &amp; Retribusi Kawasan Kawah Ijen</li>\r\n<li>Boat/Perahu untuk Ke Pulau Sempu</li>\r\n<li>Guide Lokal P Sempu</li>\r\n<li>Guide Lokal Kawah Ijen</li>\r\n<li>Air Mineral 600ml/hari</li>\r\n<li>Breakfast Box 1 X di Bromo</li>\r\n<li>Villa 1 Rumah 2-5 Kamar di Bromo 1 Malam ( Twin Share, KM Air Panas, TV )</li>\r\n<li>Hotel Cattimor Homestay Kawah Ijen 1 Malam ( Breakfast , Twin Share, KM Air Panas, TV )</li>\r\n</ol>', '<ol>\r\n<li>Tiket pesawat</li>\r\n<li>Airport Tax</li>\r\n<li>Pengeluaran pribadi selama tour (laundry, mini bar, dll)</li>\r\n<li>Tipping guide dan driver</li>\r\n<li>Surcharge hotel/Tiket periode high season</li>\r\n<li>Biaya naik kuda/kegiatan lain diluar itinerary &amp; Insurance</li>\r\n</ol>', '<table>\r\n<tbody>\r\n<tr>\r\n<td colspan="4"><strong>DAY 1</strong><br /><br /></td>\r\n</tr>\r\n<tr>\r\n<td><strong>07:00-08:00</strong></td>\r\n<td>&nbsp; &nbsp; &nbsp;</td>\r\n<td colspan="2">Peserta di Jemput di Lokasi meeting Poin ( Penjemputan Peserta &ndash; Hotel-Rumah-Stasiun-Terminal )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>08.00-09.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">City Tour &nbsp;( Alun-Alun Malang &amp; Balaikota Malang )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>09.00-10.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Perjalanan Menuju Batu Check In Penginapan, &amp; Mandi</td>\r\n</tr>\r\n<tr>\r\n<td><strong>10.00-11.00&nbsp;</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Makan Siang ( Biaya Sendiri ) &amp; Mengunjungi Jawa Timur Park 2 ( Museum Satwa, Batu Secreet Zoo )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>11.00-15.00 </strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Kegiatan di Jawa Timur Park</td>\r\n</tr>\r\n<tr>\r\n<td><strong>11.00-15.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Kegiatan di Jawa Timur Park</td>\r\n</tr>\r\n<tr>\r\n<td><strong>15.00-18.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Mengunjungi Museum&nbsp;Angkut</td>\r\n</tr>\r\n<tr>\r\n<td><strong>18.00-19.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Makan Malam di RM Lokal ( Biaya Sendiri )</td>\r\n</tr>\r\n<tr>\r\n<td><strong>19.00-20.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Kembali ke Penginapan</td>\r\n</tr>\r\n<tr>\r\n<td><strong>20.00-00.00</strong></td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">Istirahat &amp; Acara Bebas</td>\r\n</tr>\r\n<tr>\r\n<td colspan="4"><strong>DAY 2<br /><br /></strong></td>\r\n</tr>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td colspan="2">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>');
/*!40000 ALTER TABLE `travpack` ENABLE KEYS */;


-- Dumping structure for table web_tour.travpack_category
DROP TABLE IF EXISTS `travpack_category`;
CREATE TABLE IF NOT EXISTS `travpack_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.travpack_category: ~2 rows (approximately)
DELETE FROM `travpack_category`;
/*!40000 ALTER TABLE `travpack_category` DISABLE KEYS */;
INSERT INTO `travpack_category` (`id`, `created_at`, `updated_at`, `nama`, `publish`) VALUES
	(1, '2015-02-05 11:03:34', '2015-02-05 11:03:34', 'Honey Moon', 'Y'),
	(2, '2015-02-05 11:04:27', '2015-02-05 11:04:27', '2D1N (2 Day 1 Night)', 'Y'),
	(3, '2015-02-14 05:54:50', '2015-02-14 05:54:50', '3D2N (3 Days 2 Nights)', 'Y');
/*!40000 ALTER TABLE `travpack_category` ENABLE KEYS */;


-- Dumping structure for table web_tour.users
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table web_tour.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `remember_token`, `verified`, `disabled`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', '$2a$08$rqN6idpy0FwezH72fQcdqunbJp7GJVm8j94atsTOqCeuNvc3PzH3m', 'a227383075861e775d0af6281ea05a49', 'admin@example.com', '14tWSApt2178G66TTIBbQVaQ8sUUjrmK1JmTMGnuMDd4YhkfOPP1UlDEnY7h', 1, 0, '2014-10-28 01:30:38', '2015-02-07 07:57:57', NULL),
	(2, 'eries', '$2y$10$Js6W/pk1qQgRUQyrRjrTu.9G6EAnEtMUiEO/lRuWsufTA3qfYKkTK', 'd05f0971e1bfce23575571462df90e2e', '', NULL, 1, 0, '2015-01-27 16:04:31', '2015-01-27 16:04:31', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
