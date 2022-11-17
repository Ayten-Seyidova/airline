-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 02:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_az`, `name_en`, `name_ru`, `created_at`, `updated_at`) VALUES
(1, 'İSTİRAHƏT MƏRKƏZLƏRİ', 'RECREATION CENTERS', 'ЦЕНТРЫ ОТДЫХА', NULL, NULL),
(2, 'MUZEYLƏR', 'MUSEUMS', 'МУЗЕИ', NULL, NULL),
(3, 'TURİSTİK YERLƏR', 'TOURIST PLACES', 'ТУРИСТИЧЕСКИЕ МЕСТА', NULL, NULL),
(4, 'OTELLƏR', 'HOTELS', 'ОТЕЛИ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'az', 'Azərbaycan dili', 'az', '2022-09-09 07:45:52', '2022-09-09 07:45:52'),
(2, 'en', 'English', 'uk', '2022-09-09 07:45:52', '2022-09-09 07:45:52'),
(3, 'ru', 'Pусский', 'russia', '2022-09-09 07:45:52', '2022-09-09 07:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `type`, `parent_id`, `order_number`, `slug`, `name_az`, `name_en`, `name_ru`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, 1, 'umumi-melumat', 'Ümumi məlumat', 'General Information', 'Gobuklu', 1, '2022-10-13 06:03:47', '2022-10-13 06:05:00'),
(3, 'static', 1, 2, 'tarix', 'Tarix', 'History', 'История', 1, '2022-10-13 06:14:06', '2022-10-13 06:14:06'),
(4, 'static', 1, 3, 'inkisaf-perspektivleri', 'İnkişaf perspektivləri', 'Development prospects', 'Перспективы развития', 1, '2022-10-13 06:15:22', '2022-10-13 06:15:22'),
(5, 'static', 1, 4, 'texniki-melumatlar', 'Texniki məlumatlar', 'Technical data', 'Технические данные', 1, '2022-10-13 06:16:05', '2022-10-13 06:16:05'),
(6, 'static', 1, 5, 'ucuslarin-tehlukesizliyi', 'Uçuşların təhlükəsizliyi', 'Flight safety', 'Безопасность полетов', 1, '2022-10-13 06:17:03', '2022-10-13 06:17:03'),
(7, 'static', 1, 6, 'sertifikatlar', 'Sertifikatlar', 'Certificates', 'Сертификаты', 1, '2022-10-13 06:18:30', '2022-10-13 06:18:30'),
(8, 'static', 1, 7, 'hava-limani-sxemi', 'Hava limanı sxemi', 'Airport scheme', 'Схема аэропорта', 1, '2022-10-13 06:20:16', '2022-10-13 06:20:16'),
(9, NULL, 1, 8, 'fotoqalereya', 'Fotoqalereya', 'Photo Gallery', 'Фотогалерея', 1, '2022-10-13 06:21:17', '2022-10-13 06:21:28'),
(10, 'static', 2, 1, 'umumi-melumat', 'Ümumi məlumat', 'General Information', 'Главная Информация', 1, '2022-10-13 06:25:15', '2022-10-13 06:25:15'),
(11, 'static', 2, 2, 'ucus-cedveli', 'Uçuş cədvəli', 'Flight schedule', 'Расписание полетов', 1, '2022-10-13 06:26:19', '2022-10-13 06:26:19'),
(12, 'static', 2, 3, 'bilet-satis-noqteleri', 'Bilet satış nöqtələri', 'Ticket sales points', 'Пункты продажи билетов', 1, '2022-10-13 06:48:24', '2022-10-13 06:48:24'),
(13, 'static', 2, 4, 'qaydalar', 'Qaydalar', 'Rules', 'Правила', 1, '2022-10-13 06:49:11', '2022-10-13 06:49:11'),
(14, 'static', 2, 5, 'dasinma-qaydalari', 'Daşınmanın xüsusi yolları', 'Special ways of transportation', 'Специальные способы транспортировки', 1, '2022-10-13 06:50:01', '2022-10-13 06:50:01'),
(15, 'static', 2, 6, 'xidmetler', 'Xidmətlər', 'Services', 'Услуги', 1, '2022-10-13 06:51:36', '2022-10-13 06:51:36'),
(16, 'static', 2, 7, 'vip-xidmetler', 'VİP xidmətlər', 'VİP Services', 'VIP-услуги', 1, '2022-10-13 06:52:30', '2022-10-13 06:52:30'),
(17, 'static', 3, 1, 'yuk-umumi-melumat', 'Ümumi məlumat', 'General Information', 'Главная Информация', 1, '2022-10-13 06:53:38', '2022-10-13 06:53:38'),
(18, 'static', 3, 2, 'elaqe-melumati', 'Əlaqə məlumatı', 'Contact information', 'Контакты', 1, '2022-10-13 06:54:18', '2022-10-13 06:54:18'),
(19, 'static', 4, 1, 'mehmanxanalar', 'Mehmanxanalar', 'Hotels', 'Отели', 1, '2022-10-13 07:00:08', '2022-10-13 07:00:08'),
(20, 'static', 4, 2, 'dayanacaq-xidmeti', 'Dayanacaq xidməti', 'Parking service', 'Парковка', 1, '2022-10-13 07:01:14', '2022-10-13 08:15:12'),
(21, 'static', 4, 3, 'taksi-xidmeti', 'Taksi xidməti', 'taxi service', 'служба такси', 1, '2022-10-13 07:02:14', '2022-10-13 08:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_09_09_113829_create_menus_table', 2),
(5, '2022_09_09_114421_create_languages_table', 3),
(6, '2022_10_18_093521_create_static_pages_table', 4),
(7, '2022_10_25_115410_create_photo_galleries_table', 5),
(8, '2022_10_25_120530_create_posts_table', 6),
(9, '2022_10_25_142709_create_usefuls_table', 7),
(10, '2022_10_25_144034_create_settings_table', 8),
(12, '2022_10_25_151331_create_categories_table', 9),
(13, '2022_10_25_152036_create_tourisms_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_galleries`
--

INSERT INTO `photo_galleries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'postImage/4_25-10-2022_12-03-04.jpg', '2022-10-25 08:03:04', '2022-10-25 08:03:04'),
(3, 'postImage/8_25-10-2022_12-03-05.jpg', '2022-10-25 08:03:05', '2022-10-25 08:03:05'),
(5, 'postImage/news2_17-11-2022_11-42-45.png', '2022-11-17 07:42:45', '2022-11-17 07:42:45'),
(6, 'postImage/news1_17-11-2022_11-42-45.png', '2022-11-17 07:42:45', '2022-11-17 07:42:45'),
(7, 'postImage/news3_17-11-2022_11-42-46.png', '2022-11-17 07:42:46', '2022-11-17 07:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `title_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `status`, `title_az`, `title_en`, `title_ru`, `content_az`, `content_en`, `content_ru`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'postImage/havalimani1_16-11-2022_12-12-17.png', 1, 'Why do we use it?', 'Why do we use it? en', 'Why do we use it? ru', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'why-do-we-use-it', '2022-11-16 08:12:17', '2022-11-16 08:12:17'),
(3, 'postImage/news1_17-11-2022_11-36-26.png', 1, '17 noyabr Azərbaycanda Milli Dirçəliş Günüdür', '17 noyabr Azərbaycanda Milli Dirçəliş Günüdür en', '17 noyabr Azərbaycanda Milli Dirçəliş Günüdür ru', '<p>Xalqımızın azadlıq m&uuml;barizəsinin əsas mərhələlərindən birini təşkil edən 17 Noyabr &ndash; Milli Dir&ccedil;əliş G&uuml;n&uuml; Azərbaycanın m&uuml;stəqilliyinin bərpa edilməsində tarixi rol oynayıb.</p>\r\n\r\n<p>Mənəvi əsaslarını və başlanğıcını 1960-cı illərindən g&ouml;t&uuml;rən bu tarix sonralar ulu &ouml;ndər Heydər Əliyevin siyasi uzaqg&ouml;rənliyi və m&uuml;drikliyi ilə d&ouml;nməz xarakter aldı, m&uuml;stəqil Azərbaycan m&uuml;asir inkişaf yoluna qədəm qoydu.</p>\r\n\r\n<p>&Ouml;tən əsrin axırlarında d&uuml;nyanın altıda birini əhatə edən Sovet İttifaqının iqtisadi, siyasi, mənəvi və ideoloji dayaqları sarsılmışdı. İmperiyanın siyasi &ldquo;beyin mərkəzi&rdquo;nin xalqlara, x&uuml;susilə Azərbaycan xalqına qarşı y&uuml;r&uuml;td&uuml;y&uuml; ayrı-se&ccedil;kilik siyasəti kəskin xarakter aldı. M.Qorba&ccedil;ov hakimiyyətinin dəstəyi ilə ermənilər Dağlıq Qarabağda azərbaycanlılara qarşı haqsız ərazi iddialarına başladı. Ermənilərin Topxanada t&ouml;rətdikləri vəhşiliklər, Ağdamda isə iki azərbaycanlını qətlə yetirmələri Bakıda milli hissləri alovlandırdı. XX əsrin əvvəllərində istiqlalın ləzzətini dadan xalq bu dəfə m&uuml;stəqillik arzularını reallaşdırmaq &uuml;&ccedil;&uuml;n tarixi bir f&uuml;rsətin yarandığını hiss etdi. 1988-ci ildən başlayaraq Azərbaycanda milli istiqlal hərəkatı geniş v&uuml;sət aldı. Milyonlarla insanın toplaşdığı Azadlıq meydanında səslənən tələblərin mahiyyəti getdikcə dəyişərək m&uuml;stəqil d&ouml;vlət qurmaq ideyası milli d&uuml;ş&uuml;ncəyə hakim kəsildi.</p>\r\n\r\n<p>Hakimiyyətə gəlişi ilə xalqa sağlam ruh və &ouml;z&uuml;n&uuml;dərk gətirən &uuml;mummilli lider Heydər Əliyev sovet ideologiyasının sərt qadağalarına baxmayaraq, milli- mənəvi dəyərlərə, Azərbaycan elminin və mədəniyyətinin dir&ccedil;əlişinə x&uuml;susi &ouml;nəm verdi. B&uuml;t&uuml;n sahələrdə inkişaf və oyanış m&uuml;şahidə olunmağa başladı. Azərbaycan əsl intibah və dir&ccedil;əliş d&ouml;vr&uuml;nə qədəm qoydu. Məhz ulu &ouml;ndər Heydər Əliyevin təşəbb&uuml;s&uuml; ilə d&uuml;nyanın m&uuml;xtəlif &ouml;lkələrində təhsil alan milli ruhlu alimlər və ziyalılar ordusu yetişdi. Dahi şəxsiyyət Heydər Əliyevin respublikada yaratdığı bu mənəvi-psixoloji və iqtisadi baza təxminən 20 il sonra Sovet İttifaqı dağılmağa başlayanda xalqın dayağı oldu.</p>', '<p>English Xalqımızın azadlıq m&uuml;barizəsinin əsas mərhələlərindən birini təşkil edən 17 Noyabr &ndash; Milli Dir&ccedil;əliş G&uuml;n&uuml; Azərbaycanın m&uuml;stəqilliyinin bərpa edilməsində tarixi rol oynayıb.</p>\r\n\r\n<p>Mənəvi əsaslarını və başlanğıcını 1960-cı illərindən g&ouml;t&uuml;rən bu tarix sonralar ulu &ouml;ndər Heydər Əliyevin siyasi uzaqg&ouml;rənliyi və m&uuml;drikliyi ilə d&ouml;nməz xarakter aldı, m&uuml;stəqil Azərbaycan m&uuml;asir inkişaf yoluna qədəm qoydu.</p>\r\n\r\n<p>&Ouml;tən əsrin axırlarında d&uuml;nyanın altıda birini əhatə edən Sovet İttifaqının iqtisadi, siyasi, mənəvi və ideoloji dayaqları sarsılmışdı. İmperiyanın siyasi &ldquo;beyin mərkəzi&rdquo;nin xalqlara, x&uuml;susilə Azərbaycan xalqına qarşı y&uuml;r&uuml;td&uuml;y&uuml; ayrı-se&ccedil;kilik siyasəti kəskin xarakter aldı. M.Qorba&ccedil;ov hakimiyyətinin dəstəyi ilə ermənilər Dağlıq Qarabağda azərbaycanlılara qarşı haqsız ərazi iddialarına başladı. Ermənilərin Topxanada t&ouml;rətdikləri vəhşiliklər, Ağdamda isə iki azərbaycanlını qətlə yetirmələri Bakıda milli hissləri alovlandırdı. XX əsrin əvvəllərində istiqlalın ləzzətini dadan xalq bu dəfə m&uuml;stəqillik arzularını reallaşdırmaq &uuml;&ccedil;&uuml;n tarixi bir f&uuml;rsətin yarandığını hiss etdi. 1988-ci ildən başlayaraq Azərbaycanda milli istiqlal hərəkatı geniş v&uuml;sət aldı. Milyonlarla insanın toplaşdığı Azadlıq meydanında səslənən tələblərin mahiyyəti getdikcə dəyişərək m&uuml;stəqil d&ouml;vlət qurmaq ideyası milli d&uuml;ş&uuml;ncəyə hakim kəsildi.</p>\r\n\r\n<p>Hakimiyyətə gəlişi ilə xalqa sağlam ruh və &ouml;z&uuml;n&uuml;dərk gətirən &uuml;mummilli lider Heydər Əliyev sovet ideologiyasının sərt qadağalarına baxmayaraq, milli- mənəvi dəyərlərə, Azərbaycan elminin və mədəniyyətinin dir&ccedil;əlişinə x&uuml;susi &ouml;nəm verdi. B&uuml;t&uuml;n sahələrdə inkişaf və oyanış m&uuml;şahidə olunmağa başladı. Azərbaycan əsl intibah və dir&ccedil;əliş d&ouml;vr&uuml;nə qədəm qoydu. Məhz ulu &ouml;ndər Heydər Əliyevin təşəbb&uuml;s&uuml; ilə d&uuml;nyanın m&uuml;xtəlif &ouml;lkələrində təhsil alan milli ruhlu alimlər və ziyalılar ordusu yetişdi. Dahi şəxsiyyət Heydər Əliyevin respublikada yaratdığı bu mənəvi-psixoloji və iqtisadi baza təxminən 20 il sonra Sovet İttifaqı dağılmağa başlayanda xalqın dayağı oldu.</p>', '<p>Russian Xalqımızın azadlıq m&uuml;barizəsinin əsas mərhələlərindən birini təşkil edən 17 Noyabr &ndash; Milli Dir&ccedil;əliş G&uuml;n&uuml; Azərbaycanın m&uuml;stəqilliyinin bərpa edilməsində tarixi rol oynayıb.</p>\r\n\r\n<p>Mənəvi əsaslarını və başlanğıcını 1960-cı illərindən g&ouml;t&uuml;rən bu tarix sonralar ulu &ouml;ndər Heydər Əliyevin siyasi uzaqg&ouml;rənliyi və m&uuml;drikliyi ilə d&ouml;nməz xarakter aldı, m&uuml;stəqil Azərbaycan m&uuml;asir inkişaf yoluna qədəm qoydu.</p>\r\n\r\n<p>&Ouml;tən əsrin axırlarında d&uuml;nyanın altıda birini əhatə edən Sovet İttifaqının iqtisadi, siyasi, mənəvi və ideoloji dayaqları sarsılmışdı. İmperiyanın siyasi &ldquo;beyin mərkəzi&rdquo;nin xalqlara, x&uuml;susilə Azərbaycan xalqına qarşı y&uuml;r&uuml;td&uuml;y&uuml; ayrı-se&ccedil;kilik siyasəti kəskin xarakter aldı. M.Qorba&ccedil;ov hakimiyyətinin dəstəyi ilə ermənilər Dağlıq Qarabağda azərbaycanlılara qarşı haqsız ərazi iddialarına başladı. Ermənilərin Topxanada t&ouml;rətdikləri vəhşiliklər, Ağdamda isə iki azərbaycanlını qətlə yetirmələri Bakıda milli hissləri alovlandırdı. XX əsrin əvvəllərində istiqlalın ləzzətini dadan xalq bu dəfə m&uuml;stəqillik arzularını reallaşdırmaq &uuml;&ccedil;&uuml;n tarixi bir f&uuml;rsətin yarandığını hiss etdi. 1988-ci ildən başlayaraq Azərbaycanda milli istiqlal hərəkatı geniş v&uuml;sət aldı. Milyonlarla insanın toplaşdığı Azadlıq meydanında səslənən tələblərin mahiyyəti getdikcə dəyişərək m&uuml;stəqil d&ouml;vlət qurmaq ideyası milli d&uuml;ş&uuml;ncəyə hakim kəsildi.</p>\r\n\r\n<p>Hakimiyyətə gəlişi ilə xalqa sağlam ruh və &ouml;z&uuml;n&uuml;dərk gətirən &uuml;mummilli lider Heydər Əliyev sovet ideologiyasının sərt qadağalarına baxmayaraq, milli- mənəvi dəyərlərə, Azərbaycan elminin və mədəniyyətinin dir&ccedil;əlişinə x&uuml;susi &ouml;nəm verdi. B&uuml;t&uuml;n sahələrdə inkişaf və oyanış m&uuml;şahidə olunmağa başladı. Azərbaycan əsl intibah və dir&ccedil;əliş d&ouml;vr&uuml;nə qədəm qoydu. Məhz ulu &ouml;ndər Heydər Əliyevin təşəbb&uuml;s&uuml; ilə d&uuml;nyanın m&uuml;xtəlif &ouml;lkələrində təhsil alan milli ruhlu alimlər və ziyalılar ordusu yetişdi. Dahi şəxsiyyət Heydər Əliyevin respublikada yaratdığı bu mənəvi-psixoloji və iqtisadi baza təxminən 20 il sonra Sovet İttifaqı dağılmağa başlayanda xalqın dayağı oldu.</p>', '17-noyabr-azerbaycanda-milli-dircelis-gunudur', '2022-11-17 07:36:26', '2022-11-17 07:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `fax`, `mail`, `address_az`, `address_en`, `address_ru`, `title_az`, `title_en`, `title_ru`, `keywords_az`, `keywords_en`, `keywords_ru`, `description_az`, `description_en`, `description_ru`, `created_at`, `updated_at`) VALUES
(1, '544-47-27', '544-47-27', 'nakhchivan@airport.az', 'Naxçıvan Beynəlxalq Hava Limanı', 'dfgf', 'dfgdfg', 'Naxçıvan Beynəlxalq Hava Limanı', 'gdfg', 'dfg', 'Naxçıvan Beynəlxalq Hava Limanı', 'tert', 'ertert', 'Naxçıvan Beynəlxalq Hava Limanı', 'ertert', 'ertert', NULL, '2022-11-16 08:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `content_az` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ru` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `category_id`, `content_az`, `content_en`, `content_ru`, `created_at`, `updated_at`) VALUES
(1, 4, '<p>azaz<img alt=\"\" src=\"http://127.0.0.1:8000/ckImage/gerb_1666072789.png\" style=\"height:109px; width:100px\" /></p>', '<p>enen</p>', '<p>rururu</p>', '2022-10-18 05:58:52', '2022-10-18 06:00:03'),
(2, 3, '<p><img alt=\"\" src=\"http://127.0.0.1:8000/ckImage/gerb_1666072836.png\" style=\"height:109px; width:100px\" /></p>', '<p>6GT7T6G7</p>', '<p>FT57F7FR</p>', '2022-10-18 06:00:49', '2022-10-18 06:00:49'),
(3, 5, '<p><a href=\"javascript:void(0)\">Texniki məlumatlar</a></p>', '', '', '2022-10-25 07:24:27', '2022-10-25 07:24:27'),
(4, 6, '<p><a href=\"javascript:void(0)\">U&ccedil;uşların təhl&uuml;kəsizliyi</a></p>', '', '', '2022-10-25 07:24:37', '2022-10-25 07:24:37'),
(5, 7, '<p><a href=\"javascript:void(0)\">Sertifikatlar</a></p>', '', '', '2022-10-25 07:24:47', '2022-10-25 07:24:47'),
(6, 8, '<p><a href=\"javascript:void(0)\">Hava limanı sxemi</a></p>', '', '', '2022-10-25 07:24:57', '2022-10-25 07:24:57'),
(7, 10, '<p>&Uuml;mumi məlumat</p>', '', '', '2022-10-25 07:25:15', '2022-11-17 13:01:16'),
(8, 11, '<h2><span style=\"font-size:14px\">Nax&ccedil;ıvan Beynəlxalq Hava Limanında təyyarə reyslərinin u&ccedil;uş</span></h2>\r\n\r\n<h2><span style=\"font-size:14px\">CƏDVƏLİ&nbsp;(yerli vaxtla)</span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:14px\">27.03.2020-cu ildən 28.10.2020-cu ilədək</span></h2>', '', '', '2022-11-17 13:03:08', '2022-11-17 13:03:27'),
(9, 12, '<h2>Bilet</h2>', '', '', '2022-11-17 13:04:06', '2022-11-17 13:04:06'),
(10, 13, '<p>Qayda&nbsp;</p>', '', '', '2022-11-17 13:04:20', '2022-11-17 13:04:20'),
(11, 14, '<p>Daşınma</p>', '', '', '2022-11-17 13:04:34', '2022-11-17 13:04:34'),
(12, 15, '<p>Xidmət</p>', '', '', '2022-11-17 13:04:51', '2022-11-17 13:04:51'),
(13, 16, '<p>Vip xidmət</p>', '', '', '2022-11-17 13:05:09', '2022-11-17 13:05:09'),
(14, 17, '<p>hh</p>', '', '', '2022-11-17 13:05:31', '2022-11-17 13:05:31'),
(15, 18, '<p>yty</p>', '', '', '2022-11-17 13:05:44', '2022-11-17 13:05:44'),
(16, 19, '<p>tytyy</p>', '', '', '2022-11-17 13:05:53', '2022-11-17 13:05:53'),
(17, 20, '<p>tytytyty</p>', '', '', '2022-11-17 13:06:03', '2022-11-17 13:06:03'),
(18, 21, '<p>tyyttyty</p>', '', '', '2022-11-17 13:06:12', '2022-11-17 13:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `tourisms`
--

CREATE TABLE `tourisms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `title_az` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourisms`
--

INSERT INTO `tourisms` (`id`, `category_id`, `status`, `title_az`, `title_en`, `title_ru`, `image`, `link`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Why do we use it?uu', 'Why do we use it? enuu', 'Why do we use it? ruuu', 'postImage/havalimani4_16-11-2022_15-06-03.png', 'https://wwwuuu', '2022-11-16 10:52:39', '2022-11-16 11:06:13'),
(3, 1, 1, 'Why do we use it?', 'Why do we use it? en', 'Why do we use it? ru', 'postImage/news1_17-11-2022_12-20-13.png', 'https://www.google.com/', '2022-11-17 08:20:13', '2022-11-17 08:20:13'),
(4, 1, 1, 'Why it?', 'Why do we use it? en', 'Why do we use it? ru', 'postImage/news2_17-11-2022_12-20-43.png', 'https://www.google.com/', '2022-11-17 08:20:43', '2022-11-17 08:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `usefuls`
--

CREATE TABLE `usefuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usefuls`
--

INSERT INTO `usefuls` (`id`, `image`, `status`, `link`, `created_at`, `updated_at`) VALUES
(2, 'postImage/news1_17-11-2022_12-24-31.png', 1, 'https://www.google.com/', '2022-11-17 08:24:31', '2022-11-17 08:24:31'),
(3, 'postImage/news2_17-11-2022_12-24-39.png', 1, 'https://www.google.com/', '2022-11-17 08:24:39', '2022-11-17 08:24:39'),
(4, 'postImage/news3_17-11-2022_12-24-48.png', 1, 'https://www.google.com/', '2022-11-17 08:24:48', '2022-11-17 08:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'airlines@nmr.az', NULL, '$2y$10$hooIHChl7isUKEfQLXT.HusuQVtDn/fGY0HffTHWIC5Ip4FsIbi.q', NULL, '2022-09-09 07:13:07', '2022-09-09 07:13:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `static_pages_category_id_foreign` (`category_id`);

--
-- Indexes for table `tourisms`
--
ALTER TABLE `tourisms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourisms_category_id_foreign` (`category_id`);

--
-- Indexes for table `usefuls`
--
ALTER TABLE `usefuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tourisms`
--
ALTER TABLE `tourisms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usefuls`
--
ALTER TABLE `usefuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD CONSTRAINT `static_pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tourisms`
--
ALTER TABLE `tourisms`
  ADD CONSTRAINT `tourisms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
