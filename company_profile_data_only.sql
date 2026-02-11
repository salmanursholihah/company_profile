-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: company_profile
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abouts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;

--
-- Table structure for table `blogs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (3,'Inovasi untuk Industri Modern','inovasi-untuk-industri-modern','lingkungan, ipal, industri','saaaaa','blogs/nCANnOoAcgB9JovielGW0zFoMSDryPp00eXoyHrz.jpg','Pengolahan air limbah menjadi salah satu aspek penting dalam menjaga keberlanjutan lingkungan hidup. Saat ini, berbagai industri mulai menerapkan teknologi modern seperti Moving Bed Biofilm Reactor (MBBR), Sequencing Batch Reactor (SBR), dan Membrane Bioreactor (MBR).\r\nTeknologi-teknologi tersebut tidak hanya meningkatkan efisiensi, tetapi juga menurunkan biaya operasional dalam jangka panjang.','2025-12-03','2025-12-03 00:47:04','2025-12-03 00:47:04','draft'),(4,'Manfaat IPAL Komunal untuk Kawasan Pemukiman','manfaat-ipal-komunal-untuk-kawasan-pemukiman','ipal, domestik, komunal','silmi','blogs/pLW8rnnPFSHCzFaB3PfbRIQCUZGmcKgLPgIcTBHb.jpg','IPAL Komunal mampu menangani limbah domestik dari puluhan hingga ratusan rumah. Sistem ini dirancang agar mudah dirawat dan mampu mengurangi pencemaran air tanah secara signifikan.\r\nDi banyak daerah di Indonesia, IPAL Komunal mulai menjadi proyek prioritas karena manfaat sosial dan lingkungannya.','2025-12-03','2025-12-03 00:48:02','2025-12-03 00:48:02','draft'),(5,'Cara Merawat IPAL Agar Tetap Optimal','cara-merawat-ipal-agar-tetap-optimal','maintenance, ipal','silmi','blogs/s26J6mK8LnSaFYZ5AGNQARbftGvJ6pJj7dlun4Hc.jpg','Mulailah dari pemeriksaan rutin seperti pengecekan pompa, blower, serta kadar DO (Dissolved Oxygen). Bersihkan screen dan sedimentation tank secara berkala.\r\nDengan perawatan yang tepat, IPAL dapat berfungsi efektif hingga lebih dari 15 tahun.','2025-12-03','2025-12-03 00:48:50','2025-12-03 00:48:50','draft'),(6,'Mengapa Standar Permen LHK Penting dalam Pengolahan Limbah Cair','mengapa-standar-permen-lhk-penting-dalam-pengolahan-limbah-cair','regulasi, ipal','silmi','blogs/YtpNXHuZ6EINlblb9zFmUzM9xmTQBZh84HaSNS1V.jpg','Peraturan Menteri Lingkungan Hidup dan Kehutanan (LHK) mengatur batasan parameter efluen seperti BOD, COD, TSS, pH, dan amonia.\r\nDengan mematuhi standar tersebut, perusahaan dapat menghindari sanksi dan menjaga kualitas lingkungan sekitar.','2025-12-03','2025-12-03 00:49:45','2025-12-03 00:49:45','draft');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

--
-- Table structure for table `cache`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

--
-- Table structure for table `cache_locks`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

--
-- Table structure for table `company`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

--
-- Table structure for table `contacts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Salma ptutamacta','salmaptutamacta@gmail.com','cek','haiii saya sedang testing fitur contact ya','2025-11-29 01:04:32','2025-11-29 01:04:32');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

--
-- Table structure for table `failed_jobs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `footers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footers`
--

/*!40000 ALTER TABLE `footers` DISABLE KEYS */;
INSERT INTO `footers` VALUES (1,'PT Utama','Jl. Ahmad Yani Perum PJKA No.4...','0831-1666-8809','ptutamacta@gmail.com','[\"/product\", \"/about\", \"/terms\"]','[\"Web Design\", \"Web Development\", \"Product Management\", \"Marketing\"]','{\"tiktok\": \"https://tiktok.com\", \"youtube\": \"https://www.youtube.com/@ospod-milos\", \"facebook\": \"https://facebook.com\", \"linkedin\": \"https://linkedin.com\", \"instagram\": \"https://instagram.com\"}','Reliable, Ecodable, and Reasonable','© Copyright UCTA by ositech. All Rights Reserved','2025-11-28 21:05:05','2025-12-04 00:12:56');
/*!40000 ALTER TABLE `footers` ENABLE KEYS */;

--
-- Table structure for table `halaman_utamas`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `halaman_utamas`
--

/*!40000 ALTER TABLE `halaman_utamas` DISABLE KEYS */;
INSERT INTO `halaman_utamas` VALUES (2,'PT Utama Cipta Tata Asri','Kami adalah perusahaan manufaktur yang bergerak dalam bidang rekayasa lingkungan pengelolaan limbah, khususnya limbah cair. kami merupakan produsen ipal (instalasi pengolahan air limbah) yang inovatif, efisien, dan ramah lingkungan. menghadirkan solusi yang komprehensif untuk pengelolaan limbah medis, limbah domestik, serta limbah industri yang memenuhi standar regulasi lingkungan nasional, sesuai dengan PerMen LHK.','https://www.youtube.com/@ospod-milos','storage/uploads/halaman_utama/F6Wc8TJORT1RCAjknNm717lzDTCraK0RtMSoEcs8.jpg','2025-11-30 20:06:06','2025-12-06 00:40:09'),(3,'Instalasi & Maintenance IPAL','Menyediakan layanan lengkap mulai dari Pengadaan, konstruksi, instalasi alat, uji kualitas air, hingga perawatan berkala. Setiap sistem dirancang sesuai kebutuhan dan kapabilitas pelanggan yang mengacu kepada standar Permen LHK di Indonesia. sehingga menghasilkan limbah yang aman, biaya yang efisien, dan fasilitas mudah dioperasikan','https://www.youtube.com/@ospod-milos','storage/uploads/halaman_utama/i5JEWMhTLR4OHXYzPEMBI3uvhFBnRSLv7SgqMej6.jpg','2025-11-30 20:06:35','2025-11-30 20:06:35'),(4,'Reliable, Ecolable, and Reasonable','Dengan motto Reliable, Ecolable, and Reasonable, kami menghadirkan solusi pengolahan limbah cair yang bekerja secara otomatis tanpa pendampingan operator yang harus stand by, ramah lingkungan, dan hemat biaya. Produk-produk kami dirancang untuk beroperasi sepanjang waktu, mengurangi dampak pencemaran, serta membantu perusahaan mencapai efisiensi energi dan operasional secara lebih mudah dan berkelanjutan.','https://www.youtube.com/@ospod-milos','storage/uploads/halaman_utama/B088UhlZlf1LIaJqREzg0AkZ0OtRzQmkHV4EcwIk.jpg','2025-11-30 20:07:34','2025-12-07 20:11:27');
/*!40000 ALTER TABLE `halaman_utamas` ENABLE KEYS */;

--
-- Table structure for table `images`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (2,'Screenshot 2025-03-26 113827.png','images/NhYFiZDU8LkHY6QfvCWmmBC0RJYWdfAPOWNOneSZ.png','2025-12-05 23:56:08','2025-12-05 23:59:52'),(3,'Screenshot 2025-03-26 113827.png','images/o01CPVLCwJBFg6zcPusZZT0nPzbHLMnAOfFFeCzF.png','2025-12-06 00:01:02','2025-12-06 00:01:02'),(4,'Screenshot 2025-03-26 114138.png','images/NDHHg6MiVa3APFFlhNBCp37EYbMYLsiCUsfyZlrR.png','2025-12-06 00:02:23','2025-12-06 00:02:23'),(6,'133907364180958881.jpg','images/ZxrFeYbCZ8y8aRbZOkIm4YlWGLIZep3zDSb69cRQ.jpg','2025-12-06 00:35:15','2025-12-06 00:36:41');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

--
-- Table structure for table `job_batches`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

--
-- Table structure for table `jobs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

--
-- Table structure for table `katalogs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `katalogs`
--

/*!40000 ALTER TABLE `katalogs` DISABLE KEYS */;
INSERT INTO `katalogs` VALUES (1,'katalog1','products/uNfRDzIdQG6bOsGzULdOuUYShreaOkn1WGwjE2Ot.png','cek123','maju jaya','2025-11-30 19:41:46',NULL),(12,'katalog2','katalog/LqwKszvq1B7jc0VoNX2x1LrNyAwtIlAkFplrC7xk.jpg','katalog 2','maju mapan','2025-12-03 23:37:48','2025-12-03 23:37:48'),(13,'ssss','katalog/FFESX9gqXGxHBISWMhgaUFkCcF1GLSu44zziOYl8.png','ssss','sssss','2025-12-05 19:59:44','2025-12-05 19:59:44'),(14,'ssss','katalog/0oSEfqsxU1OHDhbGJXB3LLEqJjtemGQe6UuC4u5t.png','ssss','sssss','2025-12-05 19:59:45','2025-12-05 19:59:45'),(15,'product sample','katalog/HfsjvtPqgOXytSLZqP2cdfYPa838zsFHP7yK0r94.png','ini adalah product sample dari pt utama cipta tata asri','PT Utama Cipta Tata Asri','2026-02-10 00:40:30','2026-02-10 00:40:30');
/*!40000 ALTER TABLE `katalogs` ENABLE KEYS */;

--
-- Table structure for table `legalitas`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legalitas`
--

/*!40000 ALTER TABLE `legalitas` DISABLE KEYS */;
INSERT INTO `legalitas` VALUES (2,'legalitas & Sertifikasi','Klaim atas kualitas produk IPAL kami didukung oleh berbagai sertifikasi resmi yang memastikan performa, keamanan, dan mutu sesuai standar nasional maupun internasional. Setiap unit IPAL telah melalui serangkaian uji fungsi dan uji kualitas yang ketat, serta memperoleh pengakuan seperti sertifikasi ISO sebagai standar manajemen mutu, sertifikasi BSN yang menjamin kesesuaian terhadap Standar Nasional Indonesia, dan sertifikasi TKDN yang membuktikan besarnya kandungan komponen dalam negeri pada produk kami. Dengan kelengkapan sertifikasi tersebut, produk IPAL kami tidak hanya teruji handal dan efisien, tetapi juga memenuhi persyaratan regulasi, audit teknis, serta kebutuhan proyek pemerintah maupun swasta','1764556203-bsn.jpeg',1,'2025-11-30 19:30:03','2025-11-30 19:30:03'),(3,'certificate iso 9001','sertifikat legalitas','1764830837-iso-9001.jpeg',2,'2025-12-03 23:47:17','2025-12-03 23:47:17'),(4,'sertificate KAN','sertifikate legalitas','1764830879-vkan.png',3,'2025-12-03 23:47:59','2025-12-03 23:47:59'),(5,'sertificate IAPMO','sertifikat legalitas','1764830914-iapmo.png',4,'2025-12-03 23:48:34','2025-12-03 23:48:34');
/*!40000 ALTER TABLE `legalitas` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_08_25_024223_katalog',1),(5,'2025_08_25_024243_product',1),(6,'2025_08_25_090041_company',1),(7,'2025_08_26_044710_vendors',1),(8,'2025_08_26_065708_contact',1),(9,'2025_08_26_074300_add_role_to_users_table',1),(10,'2025_08_27_032552_create_blogs_table',1),(11,'2025_08_27_043520_add_status_to_blogs_table',1),(12,'2025_08_27_062006_product_vendor',1),(13,'2025_08_27_084005_update_foreign_key_product_vendors_table',1),(14,'2025_11_27_082911_about',1),(15,'2025_11_28_075947_halaman_utama',1),(16,'2025_11_28_083246_visi_misi',1),(17,'2025_11_29_032721_services',1),(18,'2025_11_29_034144_footer',1),(19,'2025_11_29_070220_legalitas',2),(20,'2025_11_29_075120_team',3),(21,'2025_12_02_042932_add_link_to_services',4),(22,'2025_12_03_034244_portfolios',5),(23,'2025_12_06_064145_images',6),(24,'2025_12_13_011812_abouts',7),(25,'2025_12_13_012738_coba',8),(26,'2025_12_13_060325_halaman_utamas',9),(27,'2025_12_13_061050_visi_misis',10),(28,'2025_12_13_062548_rename_halaman_utama_to_halaman_utamas',11),(29,'2025_12_15_074512_rename_halaman_utama_to_halaman_utamas',12),(30,'2025_12_15_081756_update_halaman_utama_to_halaman_utamas',13),(31,'2025_12_16_030018_rename_halaman_utama_to_halaman_utamas',14),(38,'2025_12_17_011618_rename_katalog_to_katalogs',15),(39,'2025_12_17_011834_rename_product_to_products',15),(40,'2026_02_10_070137_add_detail_fields_to_katalogs_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `password_reset_tokens`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

--
-- Table structure for table `portfolios`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (2,'product1','product','portfolios/pRovO6chJ3Mj0ZYvqcvXVjaFN1WlHZXLE2PkkyAs.png',NULL,'2025-12-02 20:46:06','2025-12-02 21:30:26'),(3,'dummy','app','portfolios/DVekHRFDADwRAwRQVsMYHtc0dT27AIUMerGQgJKT.jpg',NULL,'2025-12-02 20:46:54','2025-12-02 21:30:13'),(4,'portfolio1','branding','portfolios/vLumyIfnZLkWBUNm2QMbKcZcvgRtRSgqqQGAn0JL.jpg',NULL,'2025-12-02 21:23:29','2025-12-02 21:23:29'),(5,'portfolio2','branding','portfolios/WKCLCZKHZeSII6LHz1lvf46AibRr2sSQ2ORWHKOq.jpg',NULL,'2025-12-02 21:24:32','2025-12-02 21:24:32'),(6,'portfolio 3','branding','portfolios/fOxKCgs0BQ5YQFBNgPWcuOHVlTmQw9VUIX6iQqXr.png',NULL,'2025-12-02 21:25:09','2025-12-02 21:25:09'),(7,'portfolio 4','product','portfolios/9lqeHBcNnW5LsMQ0So2knPT46ojCS5usevTFlYD8.jpg',NULL,'2025-12-02 21:25:50','2025-12-02 21:25:50'),(8,'portfolio 4','product','portfolios/PSMRlLAaljk4F3gkqNocXQg1NlsTZ6HAt31Q5u0C.png',NULL,'2025-12-02 21:26:21','2025-12-02 21:26:21'),(9,'portfolio 5','product','portfolios/yf6NI9HzMBLXTq3CZulqqRluR7rAVhdlIPty3KAL.jpg',NULL,'2025-12-02 21:26:57','2025-12-02 21:26:57'),(10,'portfolio 6','product','portfolios/Gvd0swDSX2a2OJBBoBODbWgBicNeZR6v42gdL4ye.jpg',NULL,'2025-12-02 21:27:16','2025-12-02 21:27:16'),(11,'portfolio 7','product','portfolios/aBGfXJMco63Sb6zaet7tvwuQnh0xwTW55tzc5Giv.png',NULL,'2025-12-02 21:27:45','2025-12-02 21:27:45'),(12,'portfolio 8','app','portfolios/rkh0QkNN6xS6b3KHM4OcTxQkNyDUtA8pSsn9BLbQ.jpg',NULL,'2025-12-02 21:28:37','2025-12-02 21:28:37'),(13,'portfolio 9','app','portfolios/3p0rZLACM144PVhYj20tABcRN3JW7j0iFYRZRTLO.jpg',NULL,'2025-12-02 21:29:12','2025-12-02 21:29:12');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;

--
-- Table structure for table `product_vendors`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_vendors`
--

/*!40000 ALTER TABLE `product_vendors` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_vendors` ENABLE KEYS */;

--
-- Table structure for table `products`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'products/hkPXgSMQbZ2rM18yocAow14mVbJJAaTIPGYP0YC0.webp','housing','sparepart','sparepart ipal 1','1','0','12','gudang1','Aktif','2025-11-30 19:41:46','2025-11-30 19:41:46'),(3,'products/uNfRDzIdQG6bOsGzULdOuUYShreaOkn1WGwjE2Ot.png','balast uv','sparepart','product 2','1','0','1','gudang1','Aktif','2025-11-30 19:42:26','2025-11-30 19:42:26'),(4,'products/clBZ4mxXAgbWPB1YCSUcZAk4MA2YM22RPheBoJb8.png','dor lock','sparepart','sparepart 3','1','0','10','gudang1','Aktif','2025-11-30 19:43:49','2025-11-30 19:43:49'),(5,'products/bmyXAkeyKE3uMZwxn3q7gAlV0TByyR9YzZ0oW1zO.webp','catrige','sparepart','sparepart 4','1','0','22','gudang1','Aktif','2025-11-30 19:44:28','2025-11-30 19:44:28');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

--
-- Table structure for table `services`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (2,'Desain & Konsultasi Teknis','Survey lokasi dan analisis kebutuhan kapasitas IPAL\r\n\r\nPerhitungan beban limbah (influen)',NULL,'http://127.0.0.1:8000/desain_konsultasi','2025-11-30 20:16:57','2025-12-09 23:41:41'),(3,'Pabrikasi unit ipal','Pembuatan rangka IPAL\r\n\r\nPembuatan tank fiberglass / mild steel / HDPE\r\n\r\nPembuatan reactor',NULL,'http://127.0.0.1:8000/produksi_pabrikasi_ipal','2025-11-30 20:17:29','2025-12-07 19:07:53'),(4,'Instalasi pemasangan','Pengiriman unit IPAL ke lokasi\r\n\r\nInstalasi pipa inlet–outlet\r\n\r\nPemasangan blower',NULL,'http://127.0.0.1:8000/instalasi','2025-11-30 20:17:49','2025-12-07 19:11:41'),(5,'Commissining','Uji fungsi seluruh peralatan\r\n\r\nKalibrasi pompa & blower\r\n\r\nInokulasi bakteri / proses seeding',NULL,'http://127.0.0.1:8000/Commissioning','2025-11-30 20:18:14','2025-12-09 23:41:13'),(6,'Perawatan dan Maintenance','Penggantian pompa/BLDC blower\r\n\r\nPembersihan biofilter & media\r\n\r\nSludge management',NULL,'http://127.0.0.1:8000/perawatan','2025-11-30 20:18:40','2025-12-07 19:13:15'),(7,'Monitoring dan Pengujian sample di labolatorium','Sampling & uji laboratorium berkala\r\n\r\nAnalisa kualitas air buangan sesuai baku mutu',NULL,'http://127.0.0.1:8000/monitoring_pengujian','2025-11-30 20:19:25','2025-12-09 23:40:44'),(8,'Upgrade dan Renofit Ipal Lama','Pembesaran kapasitas\r\n\r\nPenggantian sistem lama ke teknologi baru\r\n\r\nEfisiensi energi (blower → turbo blower, dll.)',NULL,NULL,'2025-11-30 20:20:00','2025-12-07 19:03:59'),(9,'Penyediaan bahan dan sparepart','Chemical IPAL (Deo, kaporit, PAC, nutrisi bakteri)\r\n\r\nMedia biofilter (MBBR, bio ball, honeycomb)',NULL,'http://127.0.0.1:8000/penyediaan_bahan','2025-11-30 20:20:21','2025-12-09 23:32:48'),(10,'Operator Training','Cara operasional harian\r\n\r\nPemahaman parameter teknis\r\n\r\nCara menangani masalah umum di IPAL',NULL,'http://127.0.0.1:8000/operator_training','2025-11-30 20:20:40','2025-12-09 23:32:20');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

--
-- Table structure for table `sessions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('FysQsGLiEbnWSzmlxjXNAjGPQwo20jlspxTvXXFf',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicjdKYllzdmE0WVhjTGN0RjdzandxSElkTTduV2VTMjN2T1doaWtUNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1770710127),('YzcF5HdWHJvbGsfKk25wZbp31e4CfAiprLBQQZgd',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZktZU1VvTE1QbWJWZ1NMQWo2YXh6MUFHYnhSMkdLWlBPcjc2bml0biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9rYXRhbG9ncy8xNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1770709564);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

--
-- Table structure for table `teams`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (2,'Rudi Hartono','BM','teams/I27Dhvebvc1sI3nz5CESQfT6CJxUOCMjziRxQ9Qt.jpg','2025-11-30 19:46:46','2025-11-30 19:46:46'),(3,'Dwi Dora Nurul Arifah','Accountant','teams/YwnaCyfJsZxNMdjIPlrvs2B2rQLWECOUYiPsZxyg.jpg','2025-11-30 19:47:14','2025-11-30 19:47:14'),(4,'Abi Damar Jati','Sistem Administrasi','teams/gzcSKNak9TlX31YT1CU18Rs6uWNnstmJkyQRyUJw.jpg','2025-11-30 19:47:44','2025-11-30 19:47:44'),(5,'Matsania Aulan Nati Jati','auditor','teams/oX3FATqwjzuH96eXmqnFrp4LdHoHmliObjmOanCb.jpg','2025-11-30 19:48:10','2025-11-30 19:48:10'),(6,'Dicky Zidane maulana','Operation','teams/27qWAUZBc91qLDTGE3ZWkYPWENqWTLMzQJVAiYCP.jpg','2025-11-30 19:49:02','2025-11-30 19:49:02'),(7,'Diesta Ayu Lia Maharani','Radiografer','teams/dj8DcXlv2CRYHbics2W6LO0BKIntLUnyO55tkJz6.jpg','2025-11-30 19:49:58','2025-11-30 19:49:58'),(8,'Atsna Fathanu Nizar','Arsitek','teams/VopH6LYfgowaGrnuYVFlX9YKGVTK0n5ygF1jx7tR.jpg','2025-11-30 19:50:33','2025-11-30 19:50:33'),(9,'Nasirudin','HOD','teams/bGQdjBjq3O7tp75HWeqrOGAAZN3vyL7BzUU550Py.jpg','2025-11-30 19:50:57','2025-12-05 20:03:17'),(10,'Salma NurSholihah','Web Dev','teams/VB1x2UIDwZceYJsi1dLSCOBJi74zUwXHHU4Ku8BR.jpg','2025-11-30 19:51:26','2025-11-30 19:51:26');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','2025-11-28 21:05:05','$2y$12$BoC4N3vSvA1mlKHlUWclcugxo/yYDYjgXLYioNL0vZNHZ4WyGeRV2','RwDi7rhZS9PrpXYNVwSSVQX5l0DVUMjszQhIG55wfVVHmYxYSpFKaqmOAkym','2025-11-28 21:05:05','2025-11-28 21:05:05','super_admin'),(2,'adminnnnn','iniadmin@gmail.com',NULL,'$2y$12$IKgHMTq.TQlgXvKFI4cnW.cPbdNbj8GDWomdkL944USBDspfx0hc2',NULL,'2025-12-16 20:55:28','2025-12-16 20:55:28','vendor');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Table structure for table `vendors`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'salma jaya','salmajaya@gmail.com','1234562234','indonesia','10','aktif','2025-11-29 01:03:48','2025-11-29 01:03:48');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;

--
-- Table structure for table `visi_misis`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visi_misis`
--

/*!40000 ALTER TABLE `visi_misis` DISABLE KEYS */;
INSERT INTO `visi_misis` VALUES (4,'fa-aye','Menjadi perusahaan penyedia layanan pengelolaan air limbah yang inovatif, tepercaya, dan berkelanjutan dengan kualitas terbaik.','visi','2025-11-30 19:25:55','2025-11-30 19:25:55'),(6,NULL,'Melakukan pemeliharaan preventif dan korektif terhadap peralatan IPAL untuk menjaga kendala operasional','misi','2025-12-01 23:33:21','2025-12-01 23:33:21'),(7,NULL,'Mengembangkan dan memproduksi unit instalasi pengolahan air limbah (IPAL) yang efektif dan berkualitas','misi','2025-12-01 23:33:57','2025-12-01 23:33:57'),(8,NULL,'Menerapkan teknologi pengolahan limbah cair yang efisien dan ramah lingkungan.','misi','2025-12-01 23:34:53','2025-12-01 23:34:53'),(9,NULL,'Mendukung pengendalian pencemaran air melalui pengolahan limbah yang sesuai baku mutu lingkungan.','misi','2025-12-01 23:35:05','2025-12-01 23:35:05'),(10,NULL,'Memberikan layanan instalasi, pengujian (commissioning), dan pelatihan operasional IPAL.','misi','2025-12-01 23:35:19','2025-12-01 23:35:19'),(11,NULL,'Menyediakan layanan perawatan dan perbaikan (maintenance) untuk menjamin keandalan sistem IPAL.','misi','2025-12-01 23:35:33','2025-12-01 23:35:33'),(12,NULL,'Mengoptimalkan pengelolaan lumpur hasil olahan (sludge) agar aman dan sesuai standar teknis.','misi','2025-12-01 23:35:45','2025-12-01 23:35:45'),(13,NULL,'Mendorong pemanfaatan kembali air hasil olahan (reuse) untuk mendukung efisiensi sumber daya air.','misi','2025-12-01 23:35:54','2025-12-01 23:35:54'),(14,NULL,'Mengurangi dampak pencemaran lingkungan melalui penerapan sistem manajemen lingkungan yang berkelanjutan','misi','2025-12-01 23:36:04','2025-12-01 23:36:04'),(15,NULL,'Melakukan pemeliharaan preventif dan korektif terhadap peralatan IPAL untuk menjaga kendala operasional','misi','2025-12-01 23:36:16','2025-12-01 23:36:16'),(16,NULL,'Mengembangkan dan memproduksi unit instalasi pengolahan air limbah (IPAL) yang efektif dan berkualitas.','misi','2025-12-01 23:36:31','2025-12-01 23:36:31'),(17,NULL,'Menerapkan teknologi pengolahan limbah cair yang efisien dan ramah lingkungan.','misi','2025-12-01 23:36:41','2025-12-01 23:36:41'),(18,NULL,'Mendukung pengendalian pencemaran air melalui pengolahan limbah yang sesuai baku mutu lingkungan.','misi','2025-12-01 23:36:54','2025-12-01 23:36:54'),(19,NULL,'Memberikan layanan instalasi, pengujian (commissioning), dan pelatihan operasional IPAL.','misi','2025-12-01 23:37:16','2025-12-01 23:37:16'),(20,NULL,'Menyediakan layanan perawatan dan perbaikan (maintenance) untuk menjamin keandalan sistem IPAL.','misi','2025-12-01 23:37:27','2025-12-01 23:37:27'),(21,NULL,'Mengoptimalkan pengelolaan lumpur hasil olahan (sludge) agar aman dan sesuai standar teknis.','misi','2025-12-01 23:37:38','2025-12-01 23:37:38'),(22,NULL,'Mendorong pemanfaatan kembali air hasil olahan (reuse) untuk mendukung efisiensi sumber daya air.','misi','2025-12-01 23:37:49','2025-12-01 23:37:49');
/*!40000 ALTER TABLE `visi_misis` ENABLE KEYS */;

--
-- Dumping routines for database 'company_profile'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-10 15:12:17
