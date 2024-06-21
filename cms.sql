-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table artikel.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `isi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama_file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_artikel`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_artikel_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel artikel.artikel: ~4 rows (lebih kurang)
INSERT INTO `artikel` (`id_artikel`, `id_user`, `judul`, `isi`, `nama_file`, `tanggal`) VALUES
	(2, 1, 'Padang Savana yang Tak Berujung', 'Padang savana yang luas dan tak berujung menyajikan pemandangan yang memikat dengan hamparan rumput yang hijau dan pohon-pohon akasia yang tersebar. Di bawah langit yang biru dan cerah, savana menjadi tempat hidup bagi berbagai jenis satwa liar seperti singa, gajah, dan zebra yang berkeliaran dengan bebas. Pemandangan ini memberikan gambaran tentang kebebasan dan keseimbangan alam yang sempurna. Saat matahari terbenam, savana berubah menjadi kanvas alami dengan warna-warna hangat yang memanjakan mata. Padang savana adalah bukti nyata dari luasnya alam yang penuh kehidupan dan keindahan yang tiada tara.', 'everglow-yiren-reminiscence-uhdpaper.com-4K-6.264.jpg', '2024-06-21 17:21:06'),
	(3, 1, 'Keindahan Tak Terhingga Lautan Biru', 'Lautan biru yang luas terbentang memberikan kesan keindahan yang tak terhingga. Dengan ombak yang bergulung-gulung dan cakrawala yang seolah tak berujung, laut menjadi simbol dari kebebasan dan kedamaian. Di bawah permukaan air yang berkilauan, terdapat dunia yang penuh warna dengan terumbu karang yang memikat serta berbagai spesies ikan yang menari dengan anggun. Kehidupan bawah laut yang beraneka ragam menambah pesona laut, menjadikannya tempat yang penuh misteri dan keajaiban. Laut adalah cermin dari kebesaran alam, tempat di mana manusia bisa merasakan kedamaian dan inspirasi yang mendalam.', 'everglow-all-members-reminiscence-album-uhdpaper.com-8K-6.259.jpg', '2024-06-21 17:48:11'),
	(4, 3, 'Pegunungan Megah yang Membentang', 'Pegunungan yang menjulang tinggi dengan puncak-puncaknya yang tertutup salju merupakan salah satu bentuk keagungan alam yang paling mengesankan. Dari kejauhan, pegunungan tampak seperti lukisan alam yang mempesona dengan lekukan dan lembah yang berliku-liku. Ketika berada di ketinggian, kita dapat merasakan udara yang sejuk dan segar, serta menikmati pemandangan luas yang membentang sejauh mata memandang. Hutan-hutan yang lebat dan padang rumput yang hijau menambah keindahan pegunungan, menciptakan suasana yang tenang dan damai. Pegunungan adalah tempat di mana kita dapat merasakan kekuatan dan ketenangan alam yang begitu mendalam.', 'itzy pics on Twitter.jpeg', '2024-06-21 17:56:24'),
	(6, 3, 'Hutan Hujan Tropis yang Rimbun', 'Hutan hujan tropis adalah salah satu ekosistem paling kaya dan beragam di bumi, yang tersebar luas di sepanjang garis khatulistiwa. Dengan kanopi pohon-pohon tinggi yang saling bertautan, hutan ini menciptakan suasana yang lembap dan penuh kehidupan. Di dalamnya, suara-suara alam seperti nyanyian burung, derik serangga, dan gemerisik dedaunan membentuk simfoni alam yang harmonis. Tanaman merambat, bunga-bunga eksotis, dan berbagai spesies hewan yang unik, mulai dari monyet hingga jaguar, membuat hutan hujan tropis menjadi tempat yang penuh dengan misteri dan keajaiban. Hutan ini adalah paru-paru dunia, yang memproduksi oksigen dan menyerap karbon dioksida, memberikan kontribusi penting bagi keseimbangan ekosistem global.', 'uhdpaper.com-2231e-pc-4k.jpg', '2024-06-21 18:21:55');

-- membuang struktur untuk table artikel.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel artikel.user: ~3 rows (lebih kurang)
INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
	(1, 'sunko', '111', 'sunko@gmail.com'),
	(2, 'qwe', '123', 'qwerty'),
	(3, 'Rian', '999', 'rianjennie13@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
