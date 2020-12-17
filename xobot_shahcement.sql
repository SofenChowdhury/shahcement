-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2020 at 07:30 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xobot_shahcement`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_forums`
--

CREATE TABLE `blog_forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `type` int(10) NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_forums`
--

INSERT INTO `blog_forums` (`id`, `cover`, `avatar`, `title`, `status`, `type`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'uploads/forum/1804751690mahmud-hossain-opu-mg-1714-1543421898254.jpg', 'uploads/forum/1995089728robinson.png', 'Construction Engineering', '1', 0, 'Test Forum', '2020-09-19 23:17:58', '2020-11-22 06:25:36', NULL),
(2, 'uploads/forum/1866907231work_hard_and_dont_complain.jpg', 'uploads/forum/1783226955complain_management.gif', 'Complain Box', '1', 1, NULL, '2020-09-20 00:09:07', '2020-11-22 06:25:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `post_id`, `title`, `sub_title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'hello', NULL, 'hi', '', '2020-09-10 06:17:03', '2020-09-10 06:17:03', NULL),
(2, 2, 'Man`s Collections', NULL, 'Test', 'uploads/post/5c88cf4a9b291_thumb900.jpg,uploads/post/500_F_176554620_p4OBjxoN2bE3gRZp76is9tLQhjsRvYca.jpg,uploads/post/55300eb728be9_thumb900.jpg', '2020-09-17 16:46:27', '2020-09-17 16:46:27', NULL),
(3, 3, 'shahcement', NULL, 'hello', '', '2020-09-19 07:24:59', '2020-09-19 07:24:59', NULL),
(4, 4, 'Home floor tiles', NULL, 'What types of tiles best for kitchen', '', '2020-09-25 08:22:35', '2020-09-25 08:22:35', NULL),
(5, 6, 'hi', NULL, 'hlw', 'uploads/post/Nirmane Ami (1).png', '2020-10-08 08:46:34', '2020-10-08 08:46:34', NULL),
(6, 7, 'ডিজাইন', NULL, 'nice', 'uploads/post/Nirmane Ami (1).png', '2020-10-08 08:48:31', '2020-10-08 08:48:31', NULL),
(7, 8, 'ডিজাইন', NULL, 'blog post', 'uploads/post/Nirmane Ami (1).png', '2020-10-11 11:52:27', '2020-10-11 11:52:27', NULL),
(8, 9, 'ShahCement', NULL, 'গাঁথুনি ও প্লাস্টারের স্থায়িত্বে লক্ষণীয়। পার্ট ২\r\nপ্লাস্টার ও গাঁথুনির কাজে লক্ষনীয় আর ও কিছু বিষয় শাহ্ সিমেন্ট নিরাপদ নিমার্ণে ১০১ এর এই পর্বে তুলে ধরা হয়েছে।\r\nআপনার নির্মাণ নিরাপদ হোক।\r\n#নিরাপদনির্মাণে১০১\r\n#ShahCement', 'uploads/post/images.jpg', '2020-10-20 07:09:07', '2020-10-20 07:09:07', NULL),
(9, 10, 'ShahCement', NULL, 'গাঁথুনি ও প্লাস্টারের স্থায়িত্বে লক্ষণীয়। পার্ট ২\r\nপ্লাস্টার ও গাঁথুনির কাজে লক্ষনীয় আর ও কিছু বিষয় শাহ্ সিমেন্ট নিরাপদ নিমার্ণে ১০১ এর এই পর্বে তুলে ধরা হয়েছে।\r\nআপনার নির্মাণ নিরাপদ হোক।\r\n#নিরাপদনির্মাণে১০১', 'uploads/post/images.jpg', '2020-10-20 07:10:14', '2020-10-20 07:10:14', NULL),
(10, 11, 'For Sustainable Development RCC Structures Should be Durable', NULL, 'Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:\r\nNormal Strength	20-50 MPa\r\nHigh Strength	50-100 MPa\r\nVery High Strength	100-150 MPa\r\nUltra High Performance Concrete (UHPC)	> 150 MPa (up to 800 MPa or more)\r\n\r\nAny durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.\r\nNow, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.\r\nHigh strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable for poor or developing countries.         \r\nBesides the longer service life of RCC structures made with high strength concrete there are some other advantages also. Because of quick hardening behaviours, the overall construction time decrease drastically. Significantly high compressive strength concrete means more capability to support load. So, for a similar size of building, relatively lower column section will be required leading to expanded and valuable floor expanse. The possibility of longer spans with high strength concrete could decrease the amount of expected piers and pier support remarkably in the case of bridge applications. It also lowers down the overall steel bar consumption making the RCC structures lighter, which is the one of the seven required conditions to be earthquake safe. With increase in the concrete strength the possible decrease in column section and steel bar consumption is shown in Fig.3. The predicted less frequent maintenance could also add further cost advantages. So, it’s time for our policy makers as well as design engineers to think for mandatory use of high strength concrete, especially for making residential apartments, commercial buildings, flyovers, bridges, etc.', 'uploads/post/1.png,uploads/post/2.png,uploads/post/3.jpg', '2020-11-21 15:53:49', '2020-11-21 15:53:49', NULL),
(11, 14, 'Idea', NULL, 'For Sustainable Development RCC Structures Should be Durable \r\n\r\nConcrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:\r\nNormal Strength	20-50 MPa\r\nHigh Strength	50-100 MPa\r\nVery High Strength	100-150 MPa\r\nUltra High Performance Concrete (UHPC)	> 150 MPa (up to 800 MPa or more)\r\n\r\nAny durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nNow, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.\r\nHigh strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable for poor or developing countries.         \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nBesides the longer service life of RCC structures made with high strength concrete there are some other advantages also. Because of quick hardening behaviours, the overall construction time decrease drastically. Significantly high compressive strength concrete means more capability to support load. So, for a similar size of building, relatively lower column section will be required leading to expanded and valuable floor expanse. The possibility of longer spans with high strength concrete could decrease the amount of expected piers and pier support remarkably in the case of bridge applications. It also lowers down the overall steel bar consumption making the RCC structures lighter, which is the one of the seven required conditions to be earthquake safe. With increase in the concrete strength the possible decrease in column section and steel bar consumption is shown in Fig.3. The predicted less frequent maintenance could also add further cost advantages. So, it’s time for our policy makers as well as design engineers to think for mandatory use of high strength concrete, especially for making residential apartments, commercial buildings, flyovers, bridges, etc.', '', '2020-11-22 06:46:23', '2020-11-22 06:46:23', NULL),
(12, 15, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Normal Strength</td>\r\n			<td>20-50 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>High Strength</td>\r\n			<td>50-100 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Very High Strength</td>\r\n			<td>100-150 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ultra High Performance Concrete (UHPC)</td>\r\n			<td>&gt; 150 MPa (up to 800 MPa or more)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.</p>\r\n\r\n<p><img alt=\"\" src=\"blob:http://xobotronix.com/38b1fb72-c750-4f29-8289-f505acf5c569\" style=\"height:189px; width:250px\" /></p>\r\n\r\n<p>Figure 1: Overall consequences of RCC structures of non-durable concrete.</p>\r\n\r\n<p>Now, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.High strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable<img alt=\"\" src=\"blob:http://xobotronix.com/dbb62d5c-1556-4fd5-9ab1-e499574cad68\" style=\"float:right; height:168px; width:300px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"blob:http://xobotronix.com/d711f5b8-0f33-455f-a644-e94264cafff1\" style=\"float:left; height:267px; width:200px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;Figure 3: Effects of concrete strength on column&nbsp; &nbsp; &nbsp; &nbsp;size and steel bar saving.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Figure 2: Seattle high rise building built</p>\r\n\r\n<p>with very high strength concrete.</p>\r\n\r\n<p>Besides the longer service life of RCC structures made with high strength concrete there are some other advantages also. Because of quick hardening behaviours, the overall construction time decrease drastically. Significantly high compressive strength concrete means more capability to support load. So, for a similar size of building, relatively lower column section will be required leading to expanded and valuable floor expanse. The possibility of longer spans with high strength concrete could decrease the amount of expected piers and pier support remarkably in the case of bridge applications. It also lowers down the overall steel bar consumption making the RCC structures lighter, which is the one of the seven required conditions to be earthquake safe. With increase in the concrete strength the possible decrease in column section and steel bar consumption is shown in Fig.3. The predicted less frequent maintenance could also add further cost advantages. So, it&rsquo;s time for our policy makers as well as design engineers to think for mandatory use of high strength concrete, especially for making residential apartments, commercial buildings, flyovers, bridges, etc.</p>\r\n\r\n<p><img alt=\"\" src=\"blob:http://xobotronix.com/97bed728-a21f-4dcd-8134-e8338e47de92\" style=\"height:268px; width:639px\" /></p>', 'uploads/post/asr4.png', '2020-11-27 08:34:50', '2020-11-27 08:34:50', NULL),
(13, 16, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Normal Strength</td>\r\n			<td>20-50 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>High Strength</td>\r\n			<td>50-100 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Very High Strength</td>\r\n			<td>100-150 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ultra High Performance Concrete (UHPC)</td>\r\n			<td>&gt; 150 MPa (up to 800 MPa or more)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.</p>\r\n\r\n<p><img alt=\"\" src=\"blob:http://xobotronix.com/38b1fb72-c750-4f29-8289-f505acf5c569\" /></p>\r\n\r\n<p><img alt=\"\" src=\"blob:http://xobotronix.com/f7caee4b-30f4-4dc3-a136-1c7eb07e3ae3\" style=\"height:265px; width:350px\" /></p>\r\n\r\n<p>Figure 1: Overall consequences of RCC structures of non-durable concrete.</p>\r\n\r\n<p>Now, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.High strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable</p>\r\n\r\n<p><img alt=\"\" src=\"blob:http://xobotronix.com/55820f74-b349-4a71-8fac-28e8e41bd12f\" style=\"float:left; height:300px; width:225px\" />&nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"blob:http://xobotronix.com/3695662e-525f-48fe-aef6-0909335655f9\" style=\"height:140px; width:250px\" /></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Figure 3: Effects of concrete strength on&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;column size and steel bar saving.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Figure 2: Seattle high rise building built</p>\r\n\r\n<p>with very high strength concrete.</p>\r\n\r\n<p>Besides the longer service life of RCC structures made with high strength concrete there are some other advantages also. Because of quick hardening behaviours, the overall construction time decrease drastically. Significantly high compressive strength concrete means more capability to support load. So, for a similar size of building, relatively lower column section will be required leading to expanded and valuable floor expanse. The possibility of longer spans with high strength concrete could decrease the amount of expected piers and pier support remarkably in the case of bridge applications. It also lowers down the overall steel bar consumption making the RCC structures lighter, which is the one of the seven required conditions to be earthquake safe. With increase in the concrete strength the possible decrease in column section and steel bar consumption is shown in Fig.3. The predicted less frequent maintenance could also add further cost advantages. So, it&rsquo;s time for our policy makers as well as design engineers to think for mandatory use of high strength concrete, especially for making residential apartments, commercial buildings, flyovers, bridges, etc.<img alt=\"\" src=\"blob:http://xobotronix.com/f2ae28bc-58db-44ba-9822-7f9e230102ed\" style=\"height:268px; width:639px\" /></p>', 'uploads/post/asr.png,uploads/post/asr2.jpg,uploads/post/asr3.png,uploads/post/asr4.png', '2020-11-27 09:46:15', '2020-11-27 09:46:15', NULL),
(14, 17, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<p><img src=\"blob:http://xobotronix.com/070148c6-1780-4fd1-bc9a-5e29e4cb903a\" style=\"height:189px; width:250px\" /></p>\r\n\r\n<p>Now, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in</p>\r\n\r\n<p><img src=\"blob:http://xobotronix.com/38734fef-af32-4fc1-96c8-43b05ee56991\" style=\"height:320px; width:240px\" /></p>\r\n\r\n<p>any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level</p>', 'uploads/post/asr.png,uploads/post/asr2.jpg', '2020-11-27 09:51:29', '2020-11-27 09:51:29', NULL),
(15, 18, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Normal Strength</td>\r\n			<td>20-50 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>High Strength</td>\r\n			<td>50-100 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Very High Strength</td>\r\n			<td>100-150 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ultra High Performance Concrete (UHPC)</td>\r\n			<td>&gt; 150 MPa (up to 800 MPa or more)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.</p>\r\n\r\n<p><img alt=\"Figure 1: Overall consequences of RCC structures of non-durable concrete.\" src=\"uploads/media/1429977875asr.png\" style=\"height:189px; width:250px\" /></p>\r\n\r\n<p>Figure 1: Overall consequences of RCC structures of non-durable concrete.</p>\r\n\r\n<p>Now, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.</p>\r\n\r\n<p>High strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable for poor or developing countries.</p>\r\n\r\n<p><img alt=\"\" src=\"uploads/media/55026450asr2.jpg\" style=\"height:293px; width:220px\" />&nbsp;&nbsp;<img alt=\"\" src=\"uploads/media/888506784asr3.png\" style=\"height:160px; width:285px\" /></p>\r\n\r\n<p>Figure 2: Seattle high rise building built&nbsp; &nbsp;Figure 3: Effects of concrete strength on column</p>\r\n\r\n<p>with very high strength concrete.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;size and steel bar saving.</p>\r\n\r\n<p>Besides the longer service life of RCC structures made with high strength concrete there are some other advantages also. Because of quick hardening behaviours, the overall construction time decrease drastically. Significantly high compressive strength concrete means more capability to support load. So, for a similar size of building, relatively lower column section will be required leading to expanded and valuable floor expanse. The possibility of longer spans with high strength concrete could decrease the amount of expected piers and pier support remarkably in the case of bridge applications. It also lowers down the overall steel bar consumption making the RCC structures lighter, which is the one of the seven required conditions to be earthquake safe. With increase in the concrete strength the possible decrease in column section and steel bar consumption is shown in Fig.3. The predicted less frequent maintenance could also add further cost advantages. So, it&rsquo;s time for our policy makers as well as design engineers to think for mandatory use of high strength concrete, especially for making residential apartments, commercial buildings, flyovers, bridges, etc.</p>\r\n\r\n<p><img alt=\"\" src=\"uploads/media/228040271asr4.png\" style=\"height:268px; width:639px\" /></p>', '', '2020-11-29 05:47:58', '2020-11-29 05:47:58', NULL),
(16, 19, 'ShahCement', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<p><img alt=\"\" src=\"uploads/media/1429977875asr.png\" style=\"height:410px; width:542px\" /></p>', '', '2020-11-29 05:52:11', '2020-11-29 05:52:11', NULL),
(17, 20, 'ShahCement', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<p><img src=\"blob:http://xobotronix.com/e7e4c6e2-2add-4ade-a896-46269882ace3\" style=\"height:189px; width:250px\" /></p>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and prom<br />\r\n<img src=\"blob:http://xobotronix.com/ab0582b4-21b4-4f37-9556-c1a6857e3e43\" style=\"height:267px; width:200px\" /></p>', 'uploads/post/asr.png,uploads/post/asr2.jpg', '2020-11-29 05:54:05', '2020-11-29 05:54:05', NULL),
(18, 21, 'Test Editor', NULL, '<p>I am testing a blog post</p>\r\n\r\n<p>&nbsp;<img alt=\"\" src=\"uploads/media/892083480complain_management.gif\" style=\"height:191px; width:200px\" /></p>\r\n\r\n<p>This post is for test perpouse...............</p>', '', '2020-11-29 06:01:01', '2020-11-29 06:01:01', NULL);
INSERT INTO `blog_posts` (`id`, `post_id`, `title`, `sub_title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 23, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse; width:471px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; height:13px; width:252px\">\r\n			<p>Normal Strength</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; height:13px; width:219px\">\r\n			<p>20-50 MPa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:16px; width:252px\">\r\n			<p>High Strength</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:16px; width:219px\">\r\n			<p>50-100 MPa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:18px; width:252px\">\r\n			<p>Very High Strength</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:18px; width:219px\">\r\n			<p>100-150 MPa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:17px; width:252px\">\r\n			<p>Ultra High Performance Concrete (UHPC)</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:17px; width:219px\">\r\n			<p>&gt; 150 MPa (up to 800 MPa or more)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.</p>\r\n\r\n<p><img alt=\"\" src=\"uploads/media/1429977875asr.png\" style=\"height:189px; width:250px\" /></p>\r\n\r\n<p>Figure 1: Overall consequences of RCC structures of non-durable concrete.</p>\r\n\r\n<p>Now, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.<br />\r\nHigh strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable for poor or developing countries.<br />\r\n<img alt=\"\" src=\"uploads/media/55026450asr2.jpg\" style=\"height:293px; width:220px\" />&nbsp;<img alt=\"\" src=\"uploads/media/888506784asr3.png\" style=\"height:140px; width:250px\" /></p>\r\n\r\n<p>&nbsp;</p>', '', '2020-11-29 13:36:54', '2020-11-29 13:36:54', NULL),
(20, 24, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<table align=\"center\" cellspacing=\"0\" style=\"border-collapse:collapse; width:471px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; height:13px; width:252px\">\r\n			<p>Normal Strength</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; height:13px; width:219px\">\r\n			<p>20-50 MPa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:16px; width:252px\">\r\n			<p>High Strength</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:16px; width:219px\">\r\n			<p>50-100 MPa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:18px; width:252px\">\r\n			<p>Very High Strength</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:18px; width:219px\">\r\n			<p>100-150 MPa</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:17px; width:252px\">\r\n			<p>Ultra High Performance Concrete (UHPC)</p>\r\n			</td>\r\n			<td style=\"background-color:white; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:17px; width:219px\">\r\n			<p>&gt; 150 MPa (up to 800 MPa or more)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.</p>\r\n\r\n<p><img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/1429977875asr.png\" style=\"height:189px; width:250px\" /></p>\r\n\r\n<p>Figure 1: Overall consequences of RCC structures of non-durable concrete.</p>\r\n\r\n<p>Now, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.<br />\r\nHigh strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable for poor or developing countries.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/55026450asr2.jpg\" style=\"height:293px; width:220px\" />&nbsp;<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/888506784asr3.png\" style=\"height:140px; width:250px\" /></p>\r\n\r\n<p>&nbsp;</p>', '', '2020-11-29 13:36:55', '2020-11-29 13:36:55', NULL),
(21, 25, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:<br />\r\n&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Normal Strength</td>\r\n			<td>20-50 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>High Strength</td>\r\n			<td>50-100 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Very High Strength</td>\r\n			<td>100-150 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ultra High Performance Concrete (UHPC)</td>\r\n			<td>&gt; 150 MPa (up to 800 MPa or more)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media2127112292asr.png\" style=\"height:200px; width:180px\" /></p>', '', '2020-12-09 07:00:23', '2020-12-09 07:00:23', NULL),
(22, 26, 'ShahCement', NULL, '<p><img src=\"blob:http://xobotronix.com/fd25da2d-21db-4ab7-b8f0-08f2f7b04c35\" style=\"height:136px; width:180px\" /></p>', 'uploads/post/asr.png', '2020-12-09 07:01:54', '2020-12-09 07:01:54', NULL),
(23, 27, 'ShahCement', NULL, '<p><img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/382190055asr.png\" style=\"height:189px; width:250px\" /></p>', '', '2020-12-09 09:04:44', '2020-12-09 09:04:44', NULL),
(24, 28, 'For Sustainable Development RCC Structures Should be Durable', NULL, '<p>Concrete is a complex composite material composed of cement, fine aggregates (sand) and coarse aggregates (brick or stone chips) mixed with water that hardens with time. Generally, OPC (ordinary Portland cement) concrete cannot ensure more than 45MPa compressive strength. As a result, various types of other ingredients are added with the OPC to get high strength concrete along with additional functional properties, if necessary. Concrete is a vital material for construction of almost all types of structures, namely residential buildings, industrial structures, dams, roads, tunnels, skyscrapers, bridges, sidewalks, superhighways, etc. After casting, concrete starts to gain its strength with time, which gradually reaches to the maximum level (towards 100% of the targeted strength). Achieving 100% strength is very difficult and that the required curing period for this achievement is really not very certain. However, it is well established that the rate of gain of concrete compressive strength is higher during curing of its first 28 days after the casting and then it slows down. Depending on the compressive strengths, concrete may be categorized as follows:</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Normal Strength</td>\r\n			<td>20-50 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>High Strength</td>\r\n			<td>50-100 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Very High Strength</td>\r\n			<td>100-150 MPa</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ultra High Performance Concrete (UHPC)</td>\r\n			<td>&gt; 150 MPa (up to 800 MPa or more)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Any durable concrete lasts for a long time without significant deterioration in service properties and helps the nature in conserving its resources. It also reduces waste formation related to frequent repair or replacement of old structures. Finally, durable concrete helps ensure reduced pollution, better safety and promising economic growth. The consequences of non-durable concrete structures are presented in Fig.1.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/382190055asr.png\" style=\"height:189px; width:250px\" /><br />\r\nFigure 1: Overall consequences of RCC structures of non-durable concrete.<br />\r\nNow, what are the controlling parameters for the durability of the concrete? Concrete durability is not just strength dependent property. It is the ability of the concrete to challenge various environmental actions, e.g., chemical attack, carbonation, abrasion, freezing/thawing cycles, etc while maintaining its mechanical properties in desired level. Frankly speaking, it is not a luxury feature only for expensive structures or infrastructure projects. For all types of structures, durable concrete have plenty of benefits to the environment, people and the national economy. For example, additional ten years in the service life of various structures in any country may result billions of dollars saving to its national economy. This might also help look forward for other priority projects of the nation. Many factors may affect the durability of concrete structures such as structural design, concrete quality, workmanship, structure usage, nature of environmental exposure, etc. But, durability is greatly influenced by concrete permeability, i.e. the porosity level of the concrete structures. Many mixtures, designed with widely different materials and mix proportions, can produce concretes of equal strength, but with different permeability levels. Concrete that meets only the strength requirement may fail to fulfil the expected durability if the permeability or porosity level is high. So, in a very simple term, it might be quoted that the durability of a concrete is affected by its porosity level, which also affects its compressive strength. So, having the similar level of porosity, high strength concrete is arguably more durable. The importance of strength for durability of a concrete structure has also been mentioned in ACI 318-14 code. As per this code, a minimum compressive strength of 5000 psi (35MPa) is required to make the concrete durable to some extent. For a very long life, concrete must have high strength and minimum porosity.<br />\r\nHigh strength concrete is obviously more expensive than any conventional concrete in a direct volume comparison. However, as the strength level increases the concrete structures having similar level of load bearing capacity demand less volume of materials (concrete as well as steel reinforcement). This ultimately reduces the overall weight of the structures and their construction costs as well. To visualize this, the materials used and cost involvement for the construction of the Two Union Square Skyscraper in Seattle, USA (Fig.2) can be considered. This 58 storied 226m high rise building was built in 1988 with concrete of 131MPa compressive strength and 780MPa yield strength steel reinforcement (ASTM A1035). Compared to a similar size of building built with normal concrete (e.g., strength level 35MPa) and reinforcing steel bar (e.g., ASTM A615 grade, yield strength 400MPA), this skyscraper is around 50% lighter. Not only material saving, the overall construction cost was also 15% lower because materials saving means overall cost saving. So, it is really not true that construction with high strength building materials is an expensive affair and thus not suitable for poor or developing countries.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/289394665asr2.jpg\" style=\"height:300px; width:225px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/2032849584asr3.png\" style=\"height:140px; width:250px\" /><br />\r\nFigure 2: Seattle high rise building built with&nbsp; &nbsp; &nbsp;Figure 3: Effects of concrete strength on</p>\r\n\r\n<p>very high strength concrete.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;column size and steel bar saving.<br />\r\n<br />\r\nBesides the longer service life of RCC structures made with high strength concrete there are some other advantages also. Because of quick hardening behaviours, the overall construction time decrease drastically. Significantly high compressive strength concrete means more capability to support load. So, for a similar size of building, relatively lower column section will be required leading to expanded and valuable floor expanse. The possibility of longer spans with high strength concrete could decrease the amount of expected piers and pier support remarkably in the case of bridge applications. It also lowers down the overall steel bar consumption making the RCC structures lighter, which is the one of the seven required conditions to be earthquake safe. With increase in the concrete strength the possible decrease in column section and steel bar consumption is shown in Fig.3. The predicted less frequent maintenance could also add further cost advantages. So, it&rsquo;s time for our policy makers as well as design engineers to think for mandatory use of high strength concrete, especially for making residential apartments, commercial buildings, flyovers, bridges, etc.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/307246117asr4.png\" style=\"height:210px; width:500px\" /></p>', '', '2020-12-09 09:14:54', '2020-12-09 09:14:54', NULL),
(25, 29, 'UHP Flexible Concrete for Critical Structures', NULL, '<p>Concrete with compressive strength more than 150MPa is called ultra high performance concrete (UHPC). Most specifically its applications are in high rise buildings, bridge, flyover and underground tunnel structures, where more than 70% materials consumption is possible to cut. This would be visually clear from Fig.1. Due to its high compressive strength, UHPC structural components are much smaller in size than their typical concrete counterparts. If the overall material weight (dead load) of girders/beams used in a certain steel structure bridge/flyover is 110kg/m, bridge of similar load bearing capacity constructed with UHPC will be of 141kg/m. Interestingly, for ordinary reinforced concrete bridge, this weight will be 528kg/m, which is about 3.72 times higher whereas. pre-stressing can only save 11.74% materials with the expense of additional arrangements are required for the pre-stressing system.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/1722968833image.png\" style=\"height:184px; width:296px\" /><br />\r\nFigure 1: Relative sizes of beams of bridges constructed with various materials for similar level of load bearing capacity.<br />\r\nBesides, the extremely low dead weight of the structures, another unique behaviour of the fibre reinforced UHPC is its high level of flexibility, Fig.2.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/1798531382w2.jpg\" style=\"height:110px; width:241px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/1245373241w3.jpg\" style=\"height:90px; width:93px\" /><img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/957362594w4.png\" style=\"height:90px; width:111px\" /></p>\r\n\r\n<p>Figure 2: Deformation of conventional and UHPC&nbsp; &nbsp; &nbsp; &nbsp;Figure 3: High strength ductile steel</p>\r\n\r\n<p>under laboratory test condition.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;(left) and polymeric (right) fibres.<br />\r\nIn the case of flexible UHPC, high strength ductile fibres (steel or polymeric, Fig.3) play the main role. The bending strength and deflection behaviours of the cast slab depend on the strength and flexibility of the fibres used. Usually, steel fibres provide better bending strength. For better combination of bending strength and defection, combination of steel and polymeric fibres are also practiced. The bending strength vs. defection behaviours of various UHPC are shown in Fig.4.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/1615120204w5.png\" style=\"height:183px; width:300px\" /><br />\r\nFigure 4: Deflection of various UHPC.<br />\r\nHere it is to be mentioned that for UHPC no coarse aggregates are use. Along with cement, all materials used here will be in powder form and the powder like materials reacts with each other in presence of water. So, this type concrete also termed as reactive powder concrete (RPC). A typical mix proportion of UHPC is given below.<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/1624596696w6.png\" style=\"height:122px; width:200px\" /><br />\r\n<br />\r\n<br />\r\n<img alt=\"\" src=\"http://xobotronix.com/shahcement/uploads/media/307246117asr4.png\" style=\"height:210px; width:500px\" /><br />\r\n&nbsp;</p>', '', '2020-12-09 09:54:07', '2020-12-09 09:54:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `division_id`, `city_name`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bashundhara', NULL, '2020-11-10 10:50:41', '2020-11-10 10:50:41'),
(2, 1, 'Banani', NULL, '2020-11-10 10:50:53', '2020-11-10 10:50:53'),
(3, 2, 'Bandarban', NULL, '2020-11-11 05:54:02', '2020-11-11 05:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'id of comment',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, NULL, 'helloo hihihihih', '2020-09-10 06:17:53', '2020-09-10 06:17:53', NULL),
(2, 1, 3, NULL, 'Hi', '2020-09-19 08:36:04', '2020-09-19 08:36:04', NULL),
(3, 1, 3, NULL, 'Test 🤐', '2020-09-19 08:36:21', '2020-09-19 08:36:21', NULL),
(4, 1, 2, NULL, 'Nice Logos .................', '2020-09-24 06:29:08', '2020-09-24 06:29:08', NULL),
(5, 1, 7, NULL, 'yes', '2020-10-08 11:18:02', '2020-10-08 11:18:02', NULL),
(6, 1, 2, NULL, 'nice post', '2020-11-06 12:42:45', '2020-11-06 12:42:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `constraction_rules`
--

CREATE TABLE `constraction_rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constraction_rules`
--

INSERT INTO `constraction_rules` (`id`, `title`, `description`, `image`, `file`, `author`, `status`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Construction Engineering', 'I am Testing Rules Document', 'uploads/construction/114514173complain_management.gif', 'uploads/construction/files/1979451308E-commerce.docx', 1, '1', 'Rules Document', '2020-09-27 22:19:28', '2020-09-28 05:12:15', '2020-09-28 05:12:15'),
(2, 'ডিজাইন', NULL, 'uploads/construction/252971257design.PNG', 'uploads/construction/files/63131979001.pdf', 1, '1', NULL, '2020-10-02 15:22:58', '2020-10-25 12:05:55', NULL),
(3, 'মাটি পরীক্ষা ও ভূমি জরিপ', NULL, 'uploads/construction/1301431877mati porikha o vhumi jorip.PNG', 'uploads/construction/files/151443285902.pdf', 1, '1', NULL, '2020-10-02 15:49:58', '2020-10-25 12:11:49', NULL),
(4, 'সাইট প্রিপারেশন ও লে-আউট', NULL, 'uploads/construction/629206697সাইট প্রিপারেশন ও লে-আউট.PNG', 'uploads/construction/files/110986194403.pdf', 1, '1', NULL, '2020-10-02 15:50:41', '2020-11-11 06:51:24', NULL),
(5, 'পাইলিং', NULL, 'uploads/construction/1901063014পাইলিং.PNG', 'uploads/construction/files/200534725704.pdf', 1, '1', NULL, '2020-10-02 15:51:05', '2020-11-11 07:03:51', NULL),
(6, 'ফাউন্ডেশন', NULL, 'uploads/construction/1351231808ফাউন্ডেশন.PNG', 'uploads/construction/files/21215760905.pdf', 1, '1', NULL, '2020-10-02 15:51:27', '2020-11-11 07:05:31', NULL),
(7, 'ফর্ম ওয়ার্ক / সাটারিং', NULL, 'uploads/construction/335153916ফর্ম ওয়ার্ক সাটারিং.PNG', 'uploads/construction/files/123360940106.pdf', 1, '1', NULL, '2020-10-02 15:51:54', '2020-11-11 07:06:02', NULL),
(8, 'রড বাইন্ডিং ও প্লেসমেন্ট', NULL, 'uploads/construction/464697858রড বাইন্ডিং ও প্লেসমেন্ট.PNG', 'uploads/construction/files/12562929107.pdf', 1, '1', NULL, '2020-10-02 15:52:14', '2020-11-11 07:07:10', NULL),
(9, 'ইটের গাঁথুনি', NULL, 'uploads/construction/1330792651ইটের গাঁথুনি.PNG', 'uploads/construction/files/112841100008.pdf', 1, '1', NULL, '2020-10-02 15:52:39', '2020-11-11 07:18:52', NULL),
(10, 'কংক্রিট ঢালাই', NULL, 'uploads/construction/344437905কংক্রিট ঢালাই.PNG', 'uploads/construction/files/165757268609.pdf', 1, '1', NULL, '2020-10-02 15:53:23', '2020-11-11 07:19:11', NULL),
(11, 'প্লাস্টার', NULL, 'uploads/construction/1668041420প্লাস্টার.PNG', 'uploads/construction/files/179059892510.pdf', 1, '1', NULL, '2020-10-02 15:53:40', '2020-11-11 07:19:46', NULL),
(12, 'কিউরিং', NULL, 'uploads/construction/409789448কিউরিং.PNG', 'uploads/construction/files/169749647811.pdf', 1, '1', NULL, '2020-10-02 17:13:13', '2020-11-11 07:20:20', NULL),
(13, 'ইট', NULL, 'uploads/construction/1118410644ইট.PNG', 'uploads/construction/files/88644910112.pdf', 1, '1', NULL, '2020-10-02 17:13:35', '2020-11-11 07:20:30', NULL),
(14, 'বালি', NULL, 'uploads/construction/1274018820বালি.PNG', 'uploads/construction/files/205806472313.pdf', 1, '1', NULL, '2020-10-02 17:13:53', '2020-11-11 07:20:41', NULL),
(15, 'খোয়া', NULL, 'uploads/construction/2023785012খোয়া.PNG', 'uploads/construction/files/54834517014.pdf', 1, '1', NULL, '2020-10-02 17:14:11', '2020-11-11 07:20:57', NULL),
(16, 'পাথর', NULL, 'uploads/construction/1454502753পাথর.PNG', 'uploads/construction/files/57123253015.pdf', 1, '1', NULL, '2020-10-02 17:14:27', '2020-11-11 07:21:06', NULL),
(17, 'পানি', NULL, 'uploads/construction/986931917পানি.PNG', 'uploads/construction/files/173354062016.pdf', 1, '1', NULL, '2020-10-02 17:14:52', '2020-11-11 07:21:15', NULL),
(18, 'সিমেন্ট', NULL, 'uploads/construction/126525618সিমেন্ট.PNG', 'uploads/construction/files/92456435317.pdf', 1, '1', NULL, '2020-10-02 17:15:11', '2020-11-11 07:21:33', NULL),
(19, 'রড', NULL, 'uploads/construction/450959586রড.PNG', 'uploads/construction/files/101293829318.pdf', 1, '1', NULL, '2020-10-02 17:15:27', '2020-11-11 07:21:47', NULL),
(20, 'কংক্রিট', NULL, 'uploads/construction/1723294569কংক্রিট.PNG', 'uploads/construction/files/188235729819.pdf', 1, '1', NULL, '2020-10-02 17:15:46', '2020-11-11 07:21:55', NULL),
(21, 'রেডি মিক্স কংক্রিট', NULL, 'uploads/construction/1407676848রেডি মিক্স কংক্রিট.PNG', 'uploads/construction/files/59889658920.pdf', 1, '1', NULL, '2020-10-02 17:16:10', '2020-11-11 07:22:06', NULL),
(22, 'কাঠ', NULL, 'uploads/construction/1149939188কাঠ.PNG', 'uploads/construction/files/72756320621.pdf', 1, '1', NULL, '2020-10-02 17:38:21', '2020-11-11 07:22:19', NULL),
(23, 'টাইলস', NULL, 'uploads/construction/1173080562টাইলস.PNG', 'uploads/construction/files/151591595722.pdf', 1, '1', NULL, '2020-10-02 17:38:49', '2020-11-11 07:22:32', NULL),
(24, 'মার্বেল ও গ্রানাইট', NULL, 'uploads/construction/828211102মার্বেল ও গ্রানাইট.PNG', 'uploads/construction/files/41961683423.pdf', 1, '1', NULL, '2020-10-02 17:39:10', '2020-11-11 07:22:45', NULL),
(25, 'রঙ', NULL, 'uploads/construction/2145333889রঙ.PNG', 'uploads/construction/files/33082014824.pdf', 1, '1', NULL, '2020-10-02 17:39:26', '2020-11-11 07:22:54', NULL),
(26, 'গ্লাস ও অ্যালুমিনিয়াম', NULL, 'uploads/construction/1830825413গ্লাস ও অ্যালুমিনিয়াম.PNG', 'uploads/construction/files/25979889725.pdf', 1, '1', NULL, '2020-10-02 17:39:54', '2020-11-11 07:23:04', NULL),
(27, 'স্যানিটারি সামগ্রি', NULL, 'uploads/construction/1964736523স্যানিটারি সামগ্রি.PNG', 'uploads/construction/files/166235347226.pdf', 1, '1', NULL, '2020-10-02 17:40:27', '2020-11-11 07:23:16', NULL),
(28, 'ইলেট্রিক্যাল ওয়ার্কস', NULL, 'uploads/construction/1649974691ইলেট্রিক্যাল ওয়ার্কস.PNG', 'uploads/construction/files/61953612827.pdf', 1, '1', NULL, '2020-10-02 17:40:49', '2020-11-11 07:23:31', NULL),
(29, 'ফায়ার সেফটি', NULL, 'uploads/construction/1074615867ফায়ার সেফটি.PNG', 'uploads/construction/files/132559572228.pdf', 1, '1', NULL, '2020-10-02 17:41:11', '2020-11-11 07:23:39', NULL),
(30, 'ভূমিকম্প সতর্কতা', NULL, 'uploads/construction/41642104ভূমিকম্প সতর্কতা.PNG', 'uploads/construction/files/188439562929.pdf', 1, '1', NULL, '2020-10-02 17:42:23', '2020-11-11 07:23:48', NULL),
(31, 'ডিজাইন – লক্ষণীয়', NULL, NULL, 'uploads/construction/files/37344111All Lokkhoniyo_h.pdf', 1, '1', NULL, '2020-10-02 17:42:46', '2020-10-02 17:42:46', NULL),
(32, 'সাধারন জিজ্ঞাসা', NULL, NULL, 'uploads/construction/files/788834597All Sadaron Gighasha_h.pdf', 1, '1', NULL, '2020-10-02 17:43:07', '2020-10-02 17:43:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

CREATE TABLE `directories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `devision_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directories`
--

INSERT INTO `directories` (`id`, `devision_id`, `city_id`, `service_id`, `name`, `email`, `phone`, `image`, `status`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 0, 0, 0, '', NULL, NULL, NULL, '1', 'Directory list of this this month', '2020-11-06 05:21:21', '2020-11-10 10:29:24', '2020-11-10 10:29:24'),
(5, 1, 1, 2, 'Meshkat', 'meshkat_cse@yahoo.com', '01685871382', 'uploads/directory/1351575119pexels-photo-220453.jpeg', '1', NULL, '2020-11-10 11:13:49', '2020-11-10 12:59:55', NULL),
(6, 2, 3, 3, 'Emon', 'emon@gmail.com', '01842305125', 'uploads/directory/1904288172images.jfif', '1', NULL, '2020-11-11 06:02:04', '2020-11-11 06:02:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, '2020-11-10 10:50:23', '2020-11-10 10:50:23'),
(2, 'Chittagong', NULL, '2020-11-11 05:24:39', '2020-11-11 05:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `e_libraries`
--

CREATE TABLE `e_libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_libraries`
--

INSERT INTO `e_libraries` (`id`, `title`, `icon`, `file`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Library', 'uploads/library/icon/2083239734296-2965463_shah-cement-logo.png', 'uploads/library/1804699521Meshkat Resume.pdf', 'Test', '1', '2020-09-26 22:43:55', '2020-12-14 06:19:38', NULL),
(2, 'Library', 'uploads/library/icon/389094908complain_management.gif', 'uploads/library/7059730104471847_700670830509719_2597969873855661912_n.png', 'Test', '1', '2020-09-26 22:44:12', '2020-09-27 00:21:49', '2020-09-27 00:21:49'),
(3, 'ShahCement', NULL, 'uploads/library/1391578533cement_i_i_a_shah_cement_initiative_2845755677660810218.mp3', NULL, '1', '2020-10-28 06:28:13', '2020-10-28 06:29:54', '2020-10-28 06:29:54'),
(4, 'ShahCement Audio', 'uploads/library/icon/1121414414images.jpg', 'uploads/library/1144306462..mp3', NULL, '1', '2020-10-28 06:30:17', '2020-11-21 16:13:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `status`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Our Building', 'uploads/gallery/988548443Co-workers-working-in-start-up-office.jpg', '0', 'Test', '2020-09-26 03:45:46', '2020-09-26 10:10:25', '2020-09-26 10:10:25'),
(2, 'Our Building-2', 'uploads/gallery/5823914362213ef56910629da86b3918f98c86220.png', '1', NULL, '2020-09-26 03:46:22', '2020-09-26 10:10:22', '2020-09-26 10:10:22'),
(3, 'shahcement', 'uploads/gallery/1903223332sim1.png', '1', NULL, '2020-10-02 19:16:11', '2020-10-02 19:16:11', NULL),
(4, 'shahcement2', 'uploads/gallery/2121973707shah-cement.jpg', '1', NULL, '2020-10-02 19:17:05', '2020-10-02 19:17:05', NULL),
(5, 'shahcement3', 'uploads/gallery/14944910133-1.jpg', '1', NULL, '2020-10-02 19:17:23', '2020-10-02 19:17:23', NULL),
(6, 'nirmaneami', 'uploads/gallery/1000939666Nirmane-Ami.jpg', '1', NULL, '2020-10-03 08:27:06', '2020-10-03 08:27:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `join_blog_forums`
--

CREATE TABLE `join_blog_forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_blog_forums`
--

INSERT INTO `join_blog_forums` (`id`, `user_id`, `forum_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', 1, '2020-09-20 02:41:21', '2020-12-14 06:24:16', NULL),
(2, '1', '2', 1, '2020-09-20 03:09:04', '2020-11-22 06:30:44', NULL),
(3, '2', '1', 1, '2020-12-10 05:11:49', '2020-12-14 06:24:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender` int(11) NOT NULL,
  `seen` datetime DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `title`, `sub_title`, `phone`, `sender`, `seen`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Message', 'Message For Test', '01685871382', 1, NULL, 'Hi\r\nI am testing a Message !!', '2020-09-28 02:01:52', '2020-09-28 02:01:52', NULL),
(2, 'Test Message 2', 'Message For Test 2', '01685871382', 1, NULL, 'Hi \r\nI am testing A message .', '2020-09-28 02:03:33', '2020-09-28 02:03:33', NULL),
(3, 'ShahCement', 'ryye', '01758981841', 1, NULL, 'eyeb  yre tbdy erh', '2020-11-29 07:15:39', '2020-11-29 07:15:39', NULL);

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
(4, '2020_08_20_052426_create_posts_table', 1),
(5, '2020_08_20_052647_create_blog_posts_table', 1),
(6, '2020_08_20_052946_create_poll_posts_table', 1),
(7, '2020_08_29_073715_create_comments_table', 2),
(8, '2020_08_29_074313_create_reactions_table', 3),
(9, '2020_08_29_074513_create_post_reactions_table', 3),
(10, '2020_11_10_081931_create_divisions_table', 4),
(11, '2020_11_10_082037_create_cities_table', 5),
(12, '2020_11_10_094856_create_services_table', 6);

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
-- Table structure for table `poll_options`
--

CREATE TABLE `poll_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qustion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_posts`
--

CREATE TABLE `poll_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_type_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_type_id`, `forum_id`, `author`, `status`, `accepted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, '1', 1, '2020-09-10 06:17:03', '2020-11-30 10:48:31', '2020-11-30 10:48:31'),
(2, 1, 2, 1, '1', NULL, '2020-09-17 16:46:27', '2020-09-17 16:46:27', NULL),
(3, 1, 1, 2, '1', 1, '2020-09-19 07:24:59', '2020-11-30 10:48:39', '2020-11-30 10:48:39'),
(4, 1, 1, 2, '0', 1, '2020-09-25 08:22:35', '2020-10-01 17:09:46', '2020-10-01 17:09:46'),
(5, 1, 1, 2, '1', 1, '2020-10-03 05:26:04', '2020-12-06 06:04:33', '2020-12-06 06:04:33'),
(6, 1, 1, 1, '1', 1, '2020-10-08 08:46:34', '2020-11-30 10:48:44', '2020-11-30 10:48:44'),
(7, 1, 1, 1, '1', 1, '2020-10-08 08:48:31', '2020-12-09 09:17:36', '2020-12-09 09:17:36'),
(8, 1, 1, 1, '1', 1, '2020-10-11 11:52:27', '2020-11-21 15:31:53', NULL),
(9, 1, 1, 1, '0', NULL, '2020-10-20 07:09:07', '2020-10-20 07:11:11', '2020-10-20 07:11:11'),
(10, 1, 1, 1, '1', 1, '2020-10-20 07:10:14', '2020-10-20 07:11:14', NULL),
(11, 1, 1, 1, '1', 1, '2020-11-21 15:53:49', '2020-12-09 09:16:29', '2020-12-09 09:16:29'),
(12, 1, 1, 2, '1', 1, '2020-11-22 06:12:28', '2020-12-06 06:04:29', '2020-12-06 06:04:29'),
(13, 1, 1, 1, '1', 1, '2020-11-22 06:45:51', '2020-12-06 06:04:25', '2020-12-06 06:04:25'),
(14, 1, 1, 1, '1', 1, '2020-11-22 06:46:23', '2020-11-22 06:46:43', NULL),
(15, 1, 1, 1, '0', 1, '2020-11-27 08:34:50', '2020-11-30 10:48:22', '2020-11-30 10:48:22'),
(16, 1, 1, 1, '1', 1, '2020-11-27 09:46:15', '2020-11-30 11:07:41', '2020-11-30 11:07:41'),
(17, 1, 1, 1, '1', 1, '2020-11-27 09:51:29', '2020-11-27 10:06:50', '2020-11-27 10:06:50'),
(18, 1, 1, 1, '1', 1, '2020-11-29 05:47:58', '2020-12-09 09:16:21', '2020-12-09 09:16:21'),
(19, 1, 1, 1, '1', 1, '2020-11-29 05:52:11', '2020-12-09 09:16:59', '2020-12-09 09:16:59'),
(20, 1, 1, 1, '1', 1, '2020-11-29 05:54:05', '2020-11-30 10:50:53', '2020-11-30 10:50:53'),
(21, 1, 1, 1, '1', 1, '2020-11-29 06:01:01', '2020-11-30 11:16:02', '2020-11-30 11:16:02'),
(22, 1, 1, 1, '0', NULL, '2020-11-29 13:36:24', '2020-11-30 10:48:00', '2020-11-30 10:48:00'),
(23, 1, 1, 1, '0', NULL, '2020-11-29 13:36:54', '2020-11-30 10:47:56', '2020-11-30 10:47:56'),
(24, 1, 1, 1, '1', 1, '2020-11-29 13:36:55', '2020-12-09 09:16:17', '2020-12-09 09:16:17'),
(25, 1, 1, 1, '0', NULL, '2020-12-09 07:00:23', '2020-12-09 07:02:04', '2020-12-09 07:02:04'),
(26, 1, 1, 1, '0', NULL, '2020-12-09 07:01:54', '2020-12-09 07:02:23', '2020-12-09 07:02:23'),
(27, 1, 1, 1, '1', 1, '2020-12-09 09:04:44', '2020-12-09 09:06:27', '2020-12-09 09:06:27'),
(28, 1, 1, 1, '1', 1, '2020-12-09 09:14:54', '2020-12-09 09:15:10', NULL),
(29, 1, 1, 1, '1', 1, '2020-12-09 09:54:07', '2020-12-14 06:18:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_reactions`
--

CREATE TABLE `post_reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `react_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_reactions`
--

INSERT INTO `post_reactions` (`id`, `user_id`, `post_id`, `react_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 1, '2020-09-19 08:35:55', '2020-09-19 08:35:55', NULL),
(2, 1, 7, 1, '2020-10-08 11:17:30', '2020-10-08 11:17:30', NULL),
(3, 1, 10, 1, '2020-10-20 07:11:39', '2020-10-25 08:01:00', NULL),
(4, 1, 2, 1, '2020-11-06 12:42:32', '2020-11-06 12:42:32', NULL),
(5, 1, 1, 1, '2020-11-06 12:42:35', '2020-11-06 12:42:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replied_messages`
--

CREATE TABLE `replied_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `replied_to` int(11) NOT NULL,
  `replied_by` int(11) NOT NULL,
  `replied_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replied_messages`
--

INSERT INTO `replied_messages` (`id`, `message_id`, `replied_to`, `replied_by`, `replied_message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Thank you !!', '2020-09-28 03:28:07', '2020-09-28 03:28:07', NULL),
(2, 1, 1, 1, 'Test Double', '2020-09-28 03:32:03', '2020-09-28 03:32:03', NULL),
(3, 1, 1, 1, 'Try For 3rd Message Reply . !!', '2020-09-28 04:27:01', '2020-09-28 04:27:01', NULL),
(4, 2, 1, 1, 'Ok', '2020-10-01 17:18:44', '2020-10-01 17:18:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `division_id`, `city_id`, `service_name`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Head of HR', NULL, '2020-11-10 10:51:12', '2020-11-10 10:51:12'),
(2, 1, 1, 'CEO', NULL, '2020-11-10 10:51:37', '2020-11-10 10:51:37'),
(3, 2, 3, 'Software Engineer', NULL, '2020-11-11 05:54:38', '2020-11-11 05:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `setup_sites`
--

CREATE TABLE `setup_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_loder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setup_sites`
--

INSERT INTO `setup_sites` (`id`, `bg_image`, `logo`, `pg_loder`, `site_name`, `address`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'uploads/setup/1272510357covershah48.jpg', 'uploads/setup/1382688428Nirmane Ami (1).png', 'uploads/setup/179188252Nirmane Ami (1).png', 'Shahcement', 'Dhaka, Bangladesh', 'shahcement@gmail.com,shahcement1@gmail.com,shahcement2@gmail.com', '01685871382,01685871381,01685871380', '2020-09-23 03:48:21', '2020-11-25 15:10:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `phone`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Meshkat', 'uploads/user/584957896761.jpg', 'meshkat_cse@yahoo.com', '01685871382', 'Admin', '1', NULL, '$2y$10$x9ry6S37oFN9TM67zlhvsutcRJMUvSuE6xt7vqvVJ0lZD/7vQbP/K', 'opYXESDIpwwWzpYCZABZlKFiYeAYyY2aerGMqpXNj2SfMcjCovAfIxQmKzdy', NULL, '2020-10-01 17:26:44'),
(2, 'Admin', 'uploads/user/705080304pexels-photo-220453.jpeg', 'admin@xobotronix.com', '01685871381', 'User', '1', NULL, '$2y$10$ydFnVW5NET83iJHo.Ooq4.cU7E.JMxARG/mpyhXb/LE289H22eFty', 'rqcWoCamz4mFyTO7Yqk23TuWv3X6kERhSJIKkVecBOjV8EPNroNvM1XnddQK', '2020-09-01 11:43:18', '2020-09-01 11:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `cover`, `city`, `country`, `birth_date`, `about_me`, `occupation`, `website`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, NULL, 'Dhaka', 'Bangladesh', '1994-01-01', 'I am Meshkat !!\nA Software Developer.', 'Software Developer', 'www.appslabit.com', '2020-09-28 23:19:20', '2020-09-28 23:50:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `video_link`, `video_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test-1', 'https://www.youtube.com/embed/a3VMQdVvgdw', 'uploads/videos/377301969Video-Thumbnails-sml-1280x995.55555555556-c-default.jpg', '1', '2020-11-16 08:49:30', '2020-11-16 17:33:40', NULL),
(3, 'মাটি পরীক্ষা ও ভূমি জরিপ', 'https://www.youtube.com/embed/ZkWP-J5uh48', NULL, '1', '2020-11-17 05:46:05', '2020-11-17 05:53:38', NULL),
(4, 'সাইট প্রিপারেশন ও লে-আউট', 'https://www.youtube.com/embed/QjcEaOjwF8Q', NULL, '1', '2020-11-17 05:54:41', '2020-11-17 05:55:25', NULL),
(5, 'পাইলিং', 'https://www.youtube.com/embed/kh_odUoKUqE', NULL, '1', '2020-11-17 05:56:50', '2020-11-17 05:58:26', NULL),
(6, 'সাধারণ ফাউন্ডেশন', 'https://www.youtube.com/embed/KpPlRdAzG7k', NULL, '1', '2020-11-17 05:58:48', '2020-11-17 05:58:52', NULL),
(7, 'ফর্মওয়ার্ক /শাটারিং', 'https://www.youtube.com/embed/kt5YJXOtXgc', NULL, '1', '2020-11-17 06:01:08', '2020-11-17 06:01:21', NULL),
(8, 'রড বাঁধাই এবং প্লেসমেন্ট', 'https://www.youtube.com/embed/MRtRsZNaBmU', NULL, '1', '2020-11-17 06:02:13', '2020-11-17 06:02:18', NULL),
(9, 'কংক্রিট ঢালাই', 'https://www.youtube.com/embed/sEBzAcnWncE', NULL, '1', '2020-11-17 06:03:50', '2020-11-17 06:03:57', NULL),
(10, 'প্লাস্টারিং', 'https://www.youtube.com/embed/HDcU-FHcZ3E', NULL, '1', '2020-11-17 06:04:52', '2020-11-17 06:04:57', NULL),
(11, 'কিউরিং', 'https://www.youtube.com/embed/B7CZ0T17Ti8', NULL, '1', '2020-11-17 06:10:59', '2020-11-17 06:11:18', NULL),
(12, 'ইটের ধরণ এবং মান যাচাই', 'https://www.youtube.com/embed/hZPfaFIIcx8', NULL, '1', '2020-11-17 06:12:27', '2020-11-17 06:15:04', NULL),
(13, 'বালির ধরণ এবং মান যাচাই', 'https://www.youtube.com/embed/i0U4G5X860Y', NULL, '1', '2020-11-17 06:13:22', '2020-11-17 06:15:04', NULL),
(14, 'ইটের খোয়ার মান যাচাই', 'https://www.youtube.com/embed/kkfpkAKYwF0', NULL, '1', '2020-11-17 06:14:55', '2020-11-17 06:15:05', NULL),
(15, 'পাথরের মান যাচাই', 'https://www.youtube.com/embed/baiVDBJ2pYM', NULL, '1', '2020-11-17 06:18:58', '2020-11-17 06:21:38', NULL),
(16, 'নির্মাণে পানির গুণগত মান', 'https://www.youtube.com/embed/hUFhpIgGq3E', NULL, '1', '2020-11-17 06:20:09', '2020-11-17 06:21:38', NULL),
(17, 'সিমেন্ট', 'https://www.youtube.com/embed/8Kqvxkgq-M0', NULL, '1', '2020-11-17 06:21:28', '2020-11-17 06:21:39', NULL),
(18, 'কংক্রিট প্রস্তুতি', 'https://www.youtube.com/embed/9bNpcIsgm8I', NULL, '1', '2020-11-17 06:39:03', '2020-11-17 06:46:10', NULL),
(19, 'রড', 'https://www.youtube.com/embed/mVcALz_JWTs', NULL, '1', '2020-11-17 06:40:02', '2020-11-17 06:46:11', NULL),
(20, 'কাঠের ব্যবহার', 'https://www.youtube.com/embed/reUPZAlTPGc', NULL, '1', '2020-11-17 06:40:50', '2020-11-17 06:46:12', NULL),
(21, 'মার্বেল এবং গ্রানাইট', 'https://www.youtube.com/embed/eQxkzvZ3h_Y', NULL, '1', '2020-11-17 06:41:36', '2020-11-17 06:46:13', NULL),
(22, 'রং এর কাজে করণীয়', 'https://www.youtube.com/embed/kyKnnr9W6Xo', NULL, '1', '2020-11-17 06:42:23', '2020-11-17 06:46:19', NULL),
(23, 'গ্লাস ও এলুমিনিয়ামের ব্যবহার', 'https://www.youtube.com/embed/rV1ElQHzsuA', NULL, '1', '2020-11-17 06:43:17', '2020-11-17 06:46:19', NULL),
(24, 'স্যানিটারী সামগ্রী', 'https://www.youtube.com/embed/3m8GbDBkelo', NULL, '1', '2020-11-17 06:43:51', '2020-11-17 06:46:20', NULL),
(25, 'বৈদ্যুতিক কাজে করণীয়', 'https://www.youtube.com/embed/7DeQQCN66V8', NULL, '1', '2020-11-17 06:44:31', '2020-11-17 06:46:21', NULL),
(26, 'ফায়ার সেফটি', 'https://www.youtube.com/embed/2-n_y2RmqjI', NULL, '1', '2020-11-17 06:45:14', '2020-11-17 06:46:23', NULL),
(27, 'ভূমিকম্প সতর্কতা', 'https://www.youtube.com/embed/AGo2TvtxtJo', NULL, '1', '2020-11-17 06:45:51', '2020-11-17 06:46:24', NULL),
(28, 'ইটের গাঁথুনি', 'https://www.youtube.com/embed/_SSdrWL8XTg', NULL, '1', '2020-11-17 06:51:13', '2020-11-17 06:51:22', NULL),
(29, 'টাইলস এর ধরণ এবং ব্যবহার', 'https://www.youtube.com/embed/lN62_bDVaTM', NULL, '1', '2020-11-17 06:53:40', '2020-11-17 06:54:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_forums`
--
ALTER TABLE `blog_forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constraction_rules`
--
ALTER TABLE `constraction_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directories`
--
ALTER TABLE `directories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_libraries`
--
ALTER TABLE `e_libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_blog_forums`
--
ALTER TABLE `join_blog_forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_posts`
--
ALTER TABLE `poll_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replied_messages`
--
ALTER TABLE `replied_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_sites`
--
ALTER TABLE `setup_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_forums`
--
ALTER TABLE `blog_forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `constraction_rules`
--
ALTER TABLE `constraction_rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `directories`
--
ALTER TABLE `directories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_libraries`
--
ALTER TABLE `e_libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `join_blog_forums`
--
ALTER TABLE `join_blog_forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_posts`
--
ALTER TABLE `poll_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replied_messages`
--
ALTER TABLE `replied_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_sites`
--
ALTER TABLE `setup_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
