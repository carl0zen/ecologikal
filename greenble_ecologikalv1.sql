-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2012 at 10:02 AM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `greenble_ecologikalv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_actividades_id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `actividades`
--


-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `timestamp` int(11) NOT NULL,
  `featured` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` VALUES(1, 'asdadasd', '<p>asdasdasd</p>', 73, 0, 0, 0, 0, '0');
INSERT INTO `article` VALUES(2, 'Test Article', '<h1>Test Article</h1>\n<p>Lorem ipsum</p>\n<p>&nbsp;</p>\n<p><img src="http://www.facebook.com/ajax/messaging/attachment.php?attach_id=385022c111d36246ae331079afd45ebc&amp;mid=id.200917350033849&amp;ext=1341456368&amp;hash=AQCItcAkPlnAZmjq" alt="" /></p>', 73, 5, 0, 0, 0, '0');
INSERT INTO `article` VALUES(3, 'Tech', '<p>This is a tech test.</p>', 73, 6, 25.6513138, -100.38015089999999, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `cat_activities`
--

CREATE TABLE `cat_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(128) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `cat_activities`
--

INSERT INTO `cat_activities` VALUES(1, 'Hiking');
INSERT INTO `cat_activities` VALUES(2, 'Fishing');
INSERT INTO `cat_activities` VALUES(3, 'Surfing');
INSERT INTO `cat_activities` VALUES(4, 'Kayaking');
INSERT INTO `cat_activities` VALUES(5, 'Scuba Diving');
INSERT INTO `cat_activities` VALUES(6, 'Adventure');
INSERT INTO `cat_activities` VALUES(7, 'Horse Riding');
INSERT INTO `cat_activities` VALUES(8, 'Boat Tour');
INSERT INTO `cat_activities` VALUES(9, 'Rafting');
INSERT INTO `cat_activities` VALUES(10, 'Diving');
INSERT INTO `cat_activities` VALUES(11, 'Arts & Crafts');
INSERT INTO `cat_activities` VALUES(12, 'Snorkelling');
INSERT INTO `cat_activities` VALUES(13, 'Yoga');
INSERT INTO `cat_activities` VALUES(14, 'Culinary Tour');
INSERT INTO `cat_activities` VALUES(15, 'Mountain Biking');
INSERT INTO `cat_activities` VALUES(16, 'Dance');
INSERT INTO `cat_activities` VALUES(17, 'Tai Chi');
INSERT INTO `cat_activities` VALUES(18, 'Kung Fu');
INSERT INTO `cat_activities` VALUES(19, 'Qi Gong');
INSERT INTO `cat_activities` VALUES(20, 'Reiki');
INSERT INTO `cat_activities` VALUES(21, 'Spa');
INSERT INTO `cat_activities` VALUES(22, 'Swimming');
INSERT INTO `cat_activities` VALUES(23, 'Extreme sports');
INSERT INTO `cat_activities` VALUES(24, 'Indigenous');
INSERT INTO `cat_activities` VALUES(25, 'Meditation');
INSERT INTO `cat_activities` VALUES(26, 'Wild life');
INSERT INTO `cat_activities` VALUES(27, 'Live Music');
INSERT INTO `cat_activities` VALUES(28, 'Fire Dancing');
INSERT INTO `cat_activities` VALUES(29, 'Sculpture');
INSERT INTO `cat_activities` VALUES(30, 'Photography');
INSERT INTO `cat_activities` VALUES(31, 'Painting');
INSERT INTO `cat_activities` VALUES(32, 'Film');
INSERT INTO `cat_activities` VALUES(33, 'Drums');
INSERT INTO `cat_activities` VALUES(34, 'Circus');

-- --------------------------------------------------------

--
-- Table structure for table `cat_currencies`
--

CREATE TABLE `cat_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cat_currencies`
--

INSERT INTO `cat_currencies` VALUES(1, 'MXP', 'Mexican Peso');
INSERT INTO `cat_currencies` VALUES(2, 'EUR', 'Euro');
INSERT INTO `cat_currencies` VALUES(3, 'USD', 'US Dollar');
INSERT INTO `cat_currencies` VALUES(4, 'AUD', 'Australian Dollar');
INSERT INTO `cat_currencies` VALUES(5, 'CAD', 'Canadian Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `cat_dietary_practice`
--

CREATE TABLE `cat_dietary_practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dietary_practice` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cat_dietary_practice`
--

INSERT INTO `cat_dietary_practice` VALUES(1, 'Raw Vegan');
INSERT INTO `cat_dietary_practice` VALUES(2, 'Vegan');
INSERT INTO `cat_dietary_practice` VALUES(3, 'Vegetarian');
INSERT INTO `cat_dietary_practice` VALUES(4, 'Dairy Vegetarian');
INSERT INTO `cat_dietary_practice` VALUES(5, 'Fish Vegetarian');
INSERT INTO `cat_dietary_practice` VALUES(6, 'Balanced Omnivorous');
INSERT INTO `cat_dietary_practice` VALUES(7, 'Omnivorous');
INSERT INTO `cat_dietary_practice` VALUES(8, 'Meat Eater');

-- --------------------------------------------------------

--
-- Table structure for table `cat_directions`
--

CREATE TABLE `cat_directions` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_directions`
--

INSERT INTO `cat_directions` VALUES(1, 'By Car');
INSERT INTO `cat_directions` VALUES(2, 'By Plane');
INSERT INTO `cat_directions` VALUES(3, 'By Bus');

-- --------------------------------------------------------

--
-- Table structure for table `cat_ecocenter_roles`
--

CREATE TABLE `cat_ecocenter_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cat_ecocenter_roles`
--

INSERT INTO `cat_ecocenter_roles` VALUES(1, 'Administrator');
INSERT INTO `cat_ecocenter_roles` VALUES(2, 'Settler');
INSERT INTO `cat_ecocenter_roles` VALUES(3, 'Follower');
INSERT INTO `cat_ecocenter_roles` VALUES(4, 'Visitor');
INSERT INTO `cat_ecocenter_roles` VALUES(5, 'Ecotraveler');
INSERT INTO `cat_ecocenter_roles` VALUES(6, 'Volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `cat_interests`
--

CREATE TABLE `cat_interests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interest` varchar(150) NOT NULL,
  `interest_spa` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `interest` (`interest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `cat_interests`
--

INSERT INTO `cat_interests` VALUES(1, 'Musician/band', '');
INSERT INTO `cat_interests` VALUES(2, 'Movie', '');
INSERT INTO `cat_interests` VALUES(3, 'Tv show', '');
INSERT INTO `cat_interests` VALUES(4, 'Product/service', '');
INSERT INTO `cat_interests` VALUES(5, 'Company', '');
INSERT INTO `cat_interests` VALUES(6, 'Local business', '');
INSERT INTO `cat_interests` VALUES(7, 'Food/beverages', '');
INSERT INTO `cat_interests` VALUES(8, 'Website', '');
INSERT INTO `cat_interests` VALUES(9, 'Public figure', '');
INSERT INTO `cat_interests` VALUES(10, 'Clothing', '');
INSERT INTO `cat_interests` VALUES(11, 'Media/news/publishing', '');
INSERT INTO `cat_interests` VALUES(12, 'Book', '');
INSERT INTO `cat_interests` VALUES(13, 'Concert venue', '');
INSERT INTO `cat_interests` VALUES(14, 'Retail and consumer merchandise', '');
INSERT INTO `cat_interests` VALUES(15, 'Travel/leisure', '');
INSERT INTO `cat_interests` VALUES(16, 'Society/culture', '');
INSERT INTO `cat_interests` VALUES(17, 'Education', '');
INSERT INTO `cat_interests` VALUES(18, 'Movie theater', '');
INSERT INTO `cat_interests` VALUES(19, 'Community', '');
INSERT INTO `cat_interests` VALUES(20, 'Consulting/business services', '');
INSERT INTO `cat_interests` VALUES(21, 'Album', '');
INSERT INTO `cat_interests` VALUES(22, 'Restaurant/cafe', '');
INSERT INTO `cat_interests` VALUES(23, 'Music chart', '');
INSERT INTO `cat_interests` VALUES(24, 'News/media', '');
INSERT INTO `cat_interests` VALUES(25, 'Tv', '');
INSERT INTO `cat_interests` VALUES(26, 'Arts/entertainment/nightlife', '');
INSERT INTO `cat_interests` VALUES(27, 'Entertainment', '');
INSERT INTO `cat_interests` VALUES(28, 'Tours/sightseeing', '');
INSERT INTO `cat_interests` VALUES(29, 'App page', '');
INSERT INTO `cat_interests` VALUES(30, 'University', '');
INSERT INTO `cat_interests` VALUES(31, 'Actor/director', '');
INSERT INTO `cat_interests` VALUES(32, 'Automobiles and parts', '');
INSERT INTO `cat_interests` VALUES(33, 'Politician', '');
INSERT INTO `cat_interests` VALUES(34, 'Professional services', '');
INSERT INTO `cat_interests` VALUES(35, 'Magazine', '');
INSERT INTO `cat_interests` VALUES(36, 'Real estate', '');
INSERT INTO `cat_interests` VALUES(37, 'Organization', '');
INSERT INTO `cat_interests` VALUES(38, 'Cars', '');
INSERT INTO `cat_interests` VALUES(39, 'Kitchen/cooking', '');
INSERT INTO `cat_interests` VALUES(40, 'Fictional character', '');
INSERT INTO `cat_interests` VALUES(41, 'Jewelry/watches', '');
INSERT INTO `cat_interests` VALUES(42, 'Monarch', '');
INSERT INTO `cat_interests` VALUES(43, 'Movie general', '');
INSERT INTO `cat_interests` VALUES(44, 'Studio', '');
INSERT INTO `cat_interests` VALUES(45, 'Government organization', '');
INSERT INTO `cat_interests` VALUES(46, 'Sports venue', '');
INSERT INTO `cat_interests` VALUES(47, 'School sports team', '');
INSERT INTO `cat_interests` VALUES(48, 'City', '');
INSERT INTO `cat_interests` VALUES(49, 'Energy/utility', '');
INSERT INTO `cat_interests` VALUES(50, 'Tv/movie award', '');
INSERT INTO `cat_interests` VALUES(51, 'Bar', '');
INSERT INTO `cat_interests` VALUES(52, 'Telecommunication', '');
INSERT INTO `cat_interests` VALUES(53, 'Household supplies', '');
INSERT INTO `cat_interests` VALUES(54, 'Computers/internet', '');
INSERT INTO `cat_interests` VALUES(55, 'Tv channel', '');
INSERT INTO `cat_interests` VALUES(56, 'Internet/software', '');
INSERT INTO `cat_interests` VALUES(57, 'Concert tour', '');
INSERT INTO `cat_interests` VALUES(58, 'Movies/music', '');
INSERT INTO `cat_interests` VALUES(59, 'Church/religious organization', '');
INSERT INTO `cat_interests` VALUES(60, 'Hotel', '');
INSERT INTO `cat_interests` VALUES(61, 'Professional sports team', '');
INSERT INTO `cat_interests` VALUES(62, 'Sports league', '');

-- --------------------------------------------------------

--
-- Table structure for table `cat_languages`
--

CREATE TABLE `cat_languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_languages`
--

INSERT INTO `cat_languages` VALUES(1, 'Espanol');
INSERT INTO `cat_languages` VALUES(2, 'Ingles');

-- --------------------------------------------------------

--
-- Table structure for table `cat_map_types`
--

CREATE TABLE `cat_map_types` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type_es` varchar(40) DEFAULT NULL,
  `type_en` varchar(40) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_map_types`
--

INSERT INTO `cat_map_types` VALUES(0, 'Cascada', 'Waterfall', 'gmap/waterfall.png');
INSERT INTO `cat_map_types` VALUES(1, 'Río', 'River', 'gmap/river.png');
INSERT INTO `cat_map_types` VALUES(2, 'Playa', 'Beach', 'gmap/beach.png');
INSERT INTO `cat_map_types` VALUES(3, 'Ruina', 'Ruin', 'gmap/ruin.png');
INSERT INTO `cat_map_types` VALUES(4, 'Templo', 'Temple', 'gmap/temple.png');
INSERT INTO `cat_map_types` VALUES(5, 'Museo', 'Museum', 'gmap/museum.png');
INSERT INTO `cat_map_types` VALUES(6, 'Bosque', 'Forest', 'gmap/forest.png');
INSERT INTO `cat_map_types` VALUES(7, 'Volcán', 'Volcano', 'gmap/volcano.png');
INSERT INTO `cat_map_types` VALUES(8, 'Mercado', 'Market', 'gmap/market.png');
INSERT INTO `cat_map_types` VALUES(9, 'Manantial, Geyser', 'Spring, Geyser', 'gmap/geiser.png');
INSERT INTO `cat_map_types` VALUES(10, 'Lago', 'Lake', 'gmap/lake.png');
INSERT INTO `cat_map_types` VALUES(11, 'Bahía', 'Bay', 'gmap/bay.png');
INSERT INTO `cat_map_types` VALUES(12, 'Cueva', 'Cave', 'gmap/cave.png');
INSERT INTO `cat_map_types` VALUES(13, 'Cañón', 'Canyon', 'gmap/canyon.png');
INSERT INTO `cat_map_types` VALUES(14, 'Fuente', 'Fountain', 'gmap/fountain.png');
INSERT INTO `cat_map_types` VALUES(15, 'Montaña', 'Mountain', 'gmap/mountain.png');
INSERT INTO `cat_map_types` VALUES(16, 'Reserva Natural', 'Nature Reserve', 'gmap/naturereserve.png');
INSERT INTO `cat_map_types` VALUES(17, 'Colina', 'Hill', 'gmap/hill.png');
INSERT INTO `cat_map_types` VALUES(18, 'Sitio Histórico', 'Historic Site', 'gmap/historicsite.png');
INSERT INTO `cat_map_types` VALUES(19, 'Música en Vivo', 'Live Music', 'gmap/livemusic.png');
INSERT INTO `cat_map_types` VALUES(20, 'Café', 'Cafe', 'gmap/cafe.png');
INSERT INTO `cat_map_types` VALUES(21, 'Bar', 'Bar', 'gmap/bar.png');
INSERT INTO `cat_map_types` VALUES(22, 'Pub', 'Pub', 'gmap/pub.png');
INSERT INTO `cat_map_types` VALUES(23, 'Arte', 'Art', 'gmap/art.png');
INSERT INTO `cat_map_types` VALUES(24, 'Cine', 'Cinema', 'gmap/cinema.png');
INSERT INTO `cat_map_types` VALUES(25, 'Hospital', 'Hospital', 'gmap/hospital.png');

-- --------------------------------------------------------

--
-- Table structure for table `cat_needs`
--

CREATE TABLE `cat_needs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cat_needs`
--

INSERT INTO `cat_needs` VALUES(1, 'Social');
INSERT INTO `cat_needs` VALUES(3, 'Ecológico');

-- --------------------------------------------------------

--
-- Table structure for table `cat_orientations`
--

CREATE TABLE `cat_orientations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orientation` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cat_orientations`
--

INSERT INTO `cat_orientations` VALUES(1, 'Teenagers ');
INSERT INTO `cat_orientations` VALUES(2, 'Youth ');
INSERT INTO `cat_orientations` VALUES(3, 'Young Adults ');
INSERT INTO `cat_orientations` VALUES(4, 'Adults ');
INSERT INTO `cat_orientations` VALUES(5, 'Mature Adults ');
INSERT INTO `cat_orientations` VALUES(6, 'Elders ');
INSERT INTO `cat_orientations` VALUES(7, 'Couples');
INSERT INTO `cat_orientations` VALUES(8, 'Families');
INSERT INTO `cat_orientations` VALUES(9, 'Families with Pets');

-- --------------------------------------------------------

--
-- Table structure for table `cat_places`
--

CREATE TABLE `cat_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cat_places`
--

INSERT INTO `cat_places` VALUES(1, 'waterfall');
INSERT INTO `cat_places` VALUES(2, 'mountain');

-- --------------------------------------------------------

--
-- Table structure for table `cat_services_available`
--

CREATE TABLE `cat_services_available` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cat_services_available`
--

INSERT INTO `cat_services_available` VALUES(1, 'Internet');
INSERT INTO `cat_services_available` VALUES(2, '24 hour reception');
INSERT INTO `cat_services_available` VALUES(3, 'Cable TV');
INSERT INTO `cat_services_available` VALUES(4, 'Lounge Area');
INSERT INTO `cat_services_available` VALUES(5, 'Guest Kitchen');
INSERT INTO `cat_services_available` VALUES(6, 'Library');
INSERT INTO `cat_services_available` VALUES(7, 'Towels Hire');
INSERT INTO `cat_services_available` VALUES(8, 'Bar');
INSERT INTO `cat_services_available` VALUES(9, 'CafÃ©');
INSERT INTO `cat_services_available` VALUES(10, 'DVD''s');
INSERT INTO `cat_services_available` VALUES(11, 'Linen Included');
INSERT INTO `cat_services_available` VALUES(12, 'Security Lockers');
INSERT INTO `cat_services_available` VALUES(13, 'Washing Machine/Dryer');
INSERT INTO `cat_services_available` VALUES(14, 'Breakfast');
INSERT INTO `cat_services_available` VALUES(15, 'Air Conditioning');
INSERT INTO `cat_services_available` VALUES(16, 'Hot Water');
INSERT INTO `cat_services_available` VALUES(17, '3 meals included');

-- --------------------------------------------------------

--
-- Table structure for table `cat_spiritual_practice`
--

CREATE TABLE `cat_spiritual_practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spiritual_practice` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cat_spiritual_practice`
--

INSERT INTO `cat_spiritual_practice` VALUES(1, 'Judaism');
INSERT INTO `cat_spiritual_practice` VALUES(2, 'Christianism');
INSERT INTO `cat_spiritual_practice` VALUES(3, 'Islamism');
INSERT INTO `cat_spiritual_practice` VALUES(4, 'Hinduism');
INSERT INTO `cat_spiritual_practice` VALUES(5, 'Buddishm');
INSERT INTO `cat_spiritual_practice` VALUES(6, 'Sikhism');
INSERT INTO `cat_spiritual_practice` VALUES(7, 'Kurdish');
INSERT INTO `cat_spiritual_practice` VALUES(8, 'Adrican');
INSERT INTO `cat_spiritual_practice` VALUES(9, 'Aztec');
INSERT INTO `cat_spiritual_practice` VALUES(10, 'Inca');
INSERT INTO `cat_spiritual_practice` VALUES(11, 'Mayan');
INSERT INTO `cat_spiritual_practice` VALUES(12, 'Aboriginal');
INSERT INTO `cat_spiritual_practice` VALUES(13, 'Confucianism');
INSERT INTO `cat_spiritual_practice` VALUES(14, 'Taoism');
INSERT INTO `cat_spiritual_practice` VALUES(15, 'Shintoism');
INSERT INTO `cat_spiritual_practice` VALUES(16, 'Universalism');
INSERT INTO `cat_spiritual_practice` VALUES(17, 'Spiritualism');
INSERT INTO `cat_spiritual_practice` VALUES(18, 'Atheism');
INSERT INTO `cat_spiritual_practice` VALUES(19, 'Paganism');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET latin2 NOT NULL DEFAULT '',
  `code` varchar(255) CHARACTER SET latin2 NOT NULL DEFAULT '',
  `seq` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=220 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` VALUES(1, 'United States', 'US', 0);
INSERT INTO `countries` VALUES(2, 'United Kingdom', 'UK', 0);
INSERT INTO `countries` VALUES(3, 'Norway', 'NO', 0);
INSERT INTO `countries` VALUES(4, 'Greece', 'GR', 0);
INSERT INTO `countries` VALUES(5, 'Afghanistan', 'AF', 0);
INSERT INTO `countries` VALUES(6, 'Albania', 'AL', 0);
INSERT INTO `countries` VALUES(7, 'Algeria', 'DZ', 0);
INSERT INTO `countries` VALUES(8, 'American Samoa', 'AS', 0);
INSERT INTO `countries` VALUES(9, 'Andorra', 'AD', 0);
INSERT INTO `countries` VALUES(10, 'Angola', 'AO', 0);
INSERT INTO `countries` VALUES(11, 'Anguilla', 'AI', 0);
INSERT INTO `countries` VALUES(12, 'Antigua & Barbuda', 'AG', 0);
INSERT INTO `countries` VALUES(13, 'Antilles, Netherlands', 'AN', 0);
INSERT INTO `countries` VALUES(15, 'Argentina', 'AR', 0);
INSERT INTO `countries` VALUES(16, 'Armenia', 'AM', 0);
INSERT INTO `countries` VALUES(17, 'Aruba', 'AW', 0);
INSERT INTO `countries` VALUES(18, 'Australia', 'AU', 0);
INSERT INTO `countries` VALUES(19, 'Austria', 'AT', 0);
INSERT INTO `countries` VALUES(20, 'Azerbaijan', 'AZ', 0);
INSERT INTO `countries` VALUES(21, 'Bahamas, The', 'BS', 0);
INSERT INTO `countries` VALUES(22, 'Bahrain', 'BH', 0);
INSERT INTO `countries` VALUES(23, 'Bangladesh', 'BD', 0);
INSERT INTO `countries` VALUES(24, 'Barbados', 'BB', 0);
INSERT INTO `countries` VALUES(25, 'Belarus', 'BY', 0);
INSERT INTO `countries` VALUES(26, 'Belgium', 'BE', 0);
INSERT INTO `countries` VALUES(27, 'Belize', 'BZ', 0);
INSERT INTO `countries` VALUES(28, 'Benin', 'BJ', 0);
INSERT INTO `countries` VALUES(29, 'Bermuda', 'BM', 0);
INSERT INTO `countries` VALUES(30, 'Bhutan', 'BT', 0);
INSERT INTO `countries` VALUES(31, 'Bolivia', 'BO', 0);
INSERT INTO `countries` VALUES(32, 'Bosnia and Herzegovina', 'BA', 0);
INSERT INTO `countries` VALUES(33, 'Botswana', 'BW', 0);
INSERT INTO `countries` VALUES(34, 'Brazil', 'BR', 0);
INSERT INTO `countries` VALUES(35, 'British Virgin Islands', 'VG', 0);
INSERT INTO `countries` VALUES(36, 'Brunei Darussalam', 'BN', 0);
INSERT INTO `countries` VALUES(37, 'Bulgaria', 'BG', 0);
INSERT INTO `countries` VALUES(38, 'Burkina Faso', 'BF', 0);
INSERT INTO `countries` VALUES(39, 'Burundi', 'BI', 0);
INSERT INTO `countries` VALUES(40, 'Cambodia', 'KH', 0);
INSERT INTO `countries` VALUES(41, 'Cameroon', 'CM', 0);
INSERT INTO `countries` VALUES(42, 'Canada', 'CA', 0);
INSERT INTO `countries` VALUES(43, 'Cape Verde', 'CV', 0);
INSERT INTO `countries` VALUES(44, 'Cayman Islands', 'KY', 0);
INSERT INTO `countries` VALUES(45, 'Central African Republic', 'CF', 0);
INSERT INTO `countries` VALUES(46, 'Chad', 'TD', 0);
INSERT INTO `countries` VALUES(47, 'Chile', 'CL', 0);
INSERT INTO `countries` VALUES(48, 'China', 'CN', 0);
INSERT INTO `countries` VALUES(49, 'Colombia', 'CO', 0);
INSERT INTO `countries` VALUES(50, 'Comoros', 'KM', 0);
INSERT INTO `countries` VALUES(51, 'Congo', 'CG', 0);
INSERT INTO `countries` VALUES(52, 'Congo', 'CD', 0);
INSERT INTO `countries` VALUES(53, 'Cook Islands', 'CK', 0);
INSERT INTO `countries` VALUES(54, 'Costa Rica', 'CR', 0);
INSERT INTO `countries` VALUES(55, 'Cote D''Ivoire', 'CI', 0);
INSERT INTO `countries` VALUES(56, 'Croatia', 'HR', 0);
INSERT INTO `countries` VALUES(57, 'Cuba', 'CU', 0);
INSERT INTO `countries` VALUES(58, 'Cyprus', 'CY', 0);
INSERT INTO `countries` VALUES(59, 'Czech Republic', 'CZ', 0);
INSERT INTO `countries` VALUES(60, 'Denmark', 'DK', 0);
INSERT INTO `countries` VALUES(61, 'Djibouti', 'DJ', 0);
INSERT INTO `countries` VALUES(62, 'Dominica', 'DM', 0);
INSERT INTO `countries` VALUES(63, 'Dominican Republic', 'DO', 0);
INSERT INTO `countries` VALUES(64, 'East Timor (Timor-Leste)', 'TP', 0);
INSERT INTO `countries` VALUES(65, 'Ecuador', 'EC', 0);
INSERT INTO `countries` VALUES(66, 'Egypt', 'EG', 0);
INSERT INTO `countries` VALUES(67, 'El Salvador', 'SV', 0);
INSERT INTO `countries` VALUES(68, 'Equatorial Guinea', 'GQ', 0);
INSERT INTO `countries` VALUES(69, 'Eritrea', 'ER', 0);
INSERT INTO `countries` VALUES(70, 'Estonia', 'EE', 0);
INSERT INTO `countries` VALUES(71, 'Ethiopia', 'ET', 0);
INSERT INTO `countries` VALUES(72, 'Falkland Islands', 'FK', 0);
INSERT INTO `countries` VALUES(73, 'Faroe Islands', 'FO', 0);
INSERT INTO `countries` VALUES(74, 'Fiji', 'FJ', 0);
INSERT INTO `countries` VALUES(75, 'Finland', 'FI', 0);
INSERT INTO `countries` VALUES(76, 'France', 'FR', 0);
INSERT INTO `countries` VALUES(77, 'French Guiana', 'GF', 0);
INSERT INTO `countries` VALUES(78, 'French Polynesia', 'PF', 0);
INSERT INTO `countries` VALUES(79, 'Gabon', 'GA', 0);
INSERT INTO `countries` VALUES(80, 'Gambia, the', 'GM', 0);
INSERT INTO `countries` VALUES(81, 'Georgia', 'GE', 0);
INSERT INTO `countries` VALUES(82, 'Germany', 'DE', 0);
INSERT INTO `countries` VALUES(83, 'Ghana', 'GH', 0);
INSERT INTO `countries` VALUES(84, 'Gibraltar', 'GI', 0);
INSERT INTO `countries` VALUES(86, 'Greenland', 'GL', 0);
INSERT INTO `countries` VALUES(87, 'Grenada', 'GD', 0);
INSERT INTO `countries` VALUES(88, 'Guadeloupe', 'GP', 0);
INSERT INTO `countries` VALUES(89, 'Guam', 'GU', 0);
INSERT INTO `countries` VALUES(90, 'Guatemala', 'GT', 0);
INSERT INTO `countries` VALUES(91, 'Guernsey and Alderney', 'GG', 0);
INSERT INTO `countries` VALUES(92, 'Guinea', 'GN', 0);
INSERT INTO `countries` VALUES(93, 'Guinea-Bissau', 'GW', 0);
INSERT INTO `countries` VALUES(94, 'Guinea, Equatorial', 'GP', 0);
INSERT INTO `countries` VALUES(95, 'Guiana, French', 'GF', 0);
INSERT INTO `countries` VALUES(96, 'Guyana', 'GY', 0);
INSERT INTO `countries` VALUES(97, 'Haiti', 'HT', 0);
INSERT INTO `countries` VALUES(99, 'Honduras', 'HN', 0);
INSERT INTO `countries` VALUES(100, 'Hong Kong, (China)', 'HK', 0);
INSERT INTO `countries` VALUES(101, 'Hungary', 'HU', 0);
INSERT INTO `countries` VALUES(102, 'Iceland', 'IS', 0);
INSERT INTO `countries` VALUES(103, 'India', 'IN', 0);
INSERT INTO `countries` VALUES(104, 'Indonesia', 'ID', 0);
INSERT INTO `countries` VALUES(105, 'Iran, Islamic Republic of', 'IR', 0);
INSERT INTO `countries` VALUES(106, 'Iraq', 'IQ', 0);
INSERT INTO `countries` VALUES(107, 'Ireland', 'IE', 0);
INSERT INTO `countries` VALUES(108, 'Israel', 'IL', 0);
INSERT INTO `countries` VALUES(109, 'Ivory Coast (Cote d''Ivoire)', 'CI', 0);
INSERT INTO `countries` VALUES(110, 'Italy', 'IT', 0);
INSERT INTO `countries` VALUES(111, 'Jamaica', 'JM', 0);
INSERT INTO `countries` VALUES(112, 'Japan', 'JP', 0);
INSERT INTO `countries` VALUES(113, 'Jersey', 'JE', 0);
INSERT INTO `countries` VALUES(114, 'Jordan', 'JO', 0);
INSERT INTO `countries` VALUES(115, 'Kazakhstan', 'KZ', 0);
INSERT INTO `countries` VALUES(116, 'Kenya', 'KE', 0);
INSERT INTO `countries` VALUES(117, 'Kiribati', 'KI', 0);
INSERT INTO `countries` VALUES(118, 'Korea, (South) Rep. of', 'KR', 0);
INSERT INTO `countries` VALUES(119, 'Kuwait', 'KW', 0);
INSERT INTO `countries` VALUES(120, 'Kyrgyzstan', 'KG', 0);
INSERT INTO `countries` VALUES(121, 'Lao People''s Dem. Rep.', 'LA', 0);
INSERT INTO `countries` VALUES(122, 'Latvia', 'LV', 0);
INSERT INTO `countries` VALUES(123, 'Lebanon', 'LB', 0);
INSERT INTO `countries` VALUES(124, 'Lesotho', 'LS', 0);
INSERT INTO `countries` VALUES(125, 'Libyan Arab Jamahiriya', 'LY', 0);
INSERT INTO `countries` VALUES(126, 'Liechtenstein', 'LI', 0);
INSERT INTO `countries` VALUES(127, 'Lithuania', 'LT', 0);
INSERT INTO `countries` VALUES(128, 'Luxembourg', 'LU', 0);
INSERT INTO `countries` VALUES(129, 'Macao, (China)', 'MO', 0);
INSERT INTO `countries` VALUES(130, 'Macedonia, TFYR', 'MK', 0);
INSERT INTO `countries` VALUES(131, 'Madagascar', 'MG', 0);
INSERT INTO `countries` VALUES(132, 'Malawi', 'MW', 0);
INSERT INTO `countries` VALUES(133, 'Malaysia', 'MY', 0);
INSERT INTO `countries` VALUES(134, 'Maldives', 'MV', 0);
INSERT INTO `countries` VALUES(135, 'Mali', 'ML', 0);
INSERT INTO `countries` VALUES(136, 'Malta', 'MT', 0);
INSERT INTO `countries` VALUES(137, 'Martinique', 'MQ', 0);
INSERT INTO `countries` VALUES(138, 'Mauritania', 'MR', 0);
INSERT INTO `countries` VALUES(139, 'Mauritius', 'MU', 0);
INSERT INTO `countries` VALUES(140, 'Mexico', 'MX', 0);
INSERT INTO `countries` VALUES(141, 'Micronesia', 'FM', 0);
INSERT INTO `countries` VALUES(142, 'Moldova, Republic of', 'MD', 0);
INSERT INTO `countries` VALUES(143, 'Monaco', 'MC', 0);
INSERT INTO `countries` VALUES(144, 'Mongolia', 'MN', 0);
INSERT INTO `countries` VALUES(145, 'Montenegro', 'CS', 0);
INSERT INTO `countries` VALUES(146, 'Morocco', 'MA', 0);
INSERT INTO `countries` VALUES(147, 'Mozambique', 'MZ', 0);
INSERT INTO `countries` VALUES(148, 'Myanmar (ex-Burma)', 'MM', 0);
INSERT INTO `countries` VALUES(149, 'Namibia', 'NA', 0);
INSERT INTO `countries` VALUES(150, 'Nepal', 'NP', 0);
INSERT INTO `countries` VALUES(151, 'Netherlands', 'NL', 0);
INSERT INTO `countries` VALUES(152, 'New Caledonia', 'NC', 0);
INSERT INTO `countries` VALUES(153, 'New Zealand', 'NZ', 0);
INSERT INTO `countries` VALUES(154, 'Nicaragua', 'NI', 0);
INSERT INTO `countries` VALUES(155, 'Niger', 'NE', 0);
INSERT INTO `countries` VALUES(156, 'Nigeria', 'NG', 0);
INSERT INTO `countries` VALUES(157, 'Northern Mariana Islands', 'MP', 0);
INSERT INTO `countries` VALUES(159, 'Oman', 'OM', 0);
INSERT INTO `countries` VALUES(160, 'Pakistan', 'PK', 0);
INSERT INTO `countries` VALUES(161, 'Palestinian Territory', 'PS', 0);
INSERT INTO `countries` VALUES(162, 'Panama', 'PA', 0);
INSERT INTO `countries` VALUES(163, 'Papua New Guinea', 'PG', 0);
INSERT INTO `countries` VALUES(164, 'Paraguay', 'PY', 0);
INSERT INTO `countries` VALUES(165, 'Peru', 'PE', 0);
INSERT INTO `countries` VALUES(166, 'Philippines', 'PH', 0);
INSERT INTO `countries` VALUES(167, 'Poland', 'PL', 0);
INSERT INTO `countries` VALUES(168, 'Portugal', 'PT', 0);
INSERT INTO `countries` VALUES(170, 'Qatar', 'QA', 0);
INSERT INTO `countries` VALUES(171, 'Reunion', 'RE', 0);
INSERT INTO `countries` VALUES(172, 'Romania', 'RO', 0);
INSERT INTO `countries` VALUES(173, 'Russian Federation', 'RU', 0);
INSERT INTO `countries` VALUES(174, 'Rwanda', 'RW', 0);
INSERT INTO `countries` VALUES(175, 'Saint Kitts and Nevis', 'KN', 0);
INSERT INTO `countries` VALUES(176, 'Saint Lucia', 'LC', 0);
INSERT INTO `countries` VALUES(177, 'St. Vincent & the Grenad.', 'VC', 0);
INSERT INTO `countries` VALUES(178, 'Samoa', 'WS', 0);
INSERT INTO `countries` VALUES(179, 'San Marino', 'SM', 0);
INSERT INTO `countries` VALUES(180, 'Sao Tome and Principe', 'ST', 0);
INSERT INTO `countries` VALUES(181, 'Saudi Arabia', 'SA', 0);
INSERT INTO `countries` VALUES(182, 'Senegal', 'SN', 0);
INSERT INTO `countries` VALUES(183, 'Serbia', 'RS', 0);
INSERT INTO `countries` VALUES(184, 'Seychelles', 'SC', 0);
INSERT INTO `countries` VALUES(185, 'Singapore', 'SG', 0);
INSERT INTO `countries` VALUES(186, 'Slovakia', 'SK', 0);
INSERT INTO `countries` VALUES(187, 'Slovenia', 'SI', 0);
INSERT INTO `countries` VALUES(188, 'Solomon Islands', 'SB', 0);
INSERT INTO `countries` VALUES(189, 'Somalia', 'SO', 0);
INSERT INTO `countries` VALUES(190, 'Spain', 'ES', 0);
INSERT INTO `countries` VALUES(191, 'Sri Lanka (ex-Ceilan)', 'LK', 0);
INSERT INTO `countries` VALUES(192, 'Sudan', 'SD', 0);
INSERT INTO `countries` VALUES(193, 'Suriname', 'SR', 0);
INSERT INTO `countries` VALUES(194, 'Swaziland', 'SZ', 0);
INSERT INTO `countries` VALUES(195, 'Sweden', 'SE', 0);
INSERT INTO `countries` VALUES(196, 'Switzerland', 'CH', 0);
INSERT INTO `countries` VALUES(197, 'Syrian Arab Republic', 'SY', 0);
INSERT INTO `countries` VALUES(198, 'Taiwan', 'TW', 0);
INSERT INTO `countries` VALUES(199, 'Tajikistan', 'TJ', 0);
INSERT INTO `countries` VALUES(200, 'Tanzania, United Rep. of', 'TZ', 0);
INSERT INTO `countries` VALUES(201, 'Thailand', 'TH', 0);
INSERT INTO `countries` VALUES(202, 'Togo', 'TG', 0);
INSERT INTO `countries` VALUES(203, 'Tonga', 'TO', 0);
INSERT INTO `countries` VALUES(204, 'Trinidad & Tobago', 'TT', 0);
INSERT INTO `countries` VALUES(205, 'Tunisia', 'TN', 0);
INSERT INTO `countries` VALUES(206, 'Turkey', 'TR', 0);
INSERT INTO `countries` VALUES(207, 'Turkmenistan', 'TM', 0);
INSERT INTO `countries` VALUES(208, 'Uganda', 'UG', 0);
INSERT INTO `countries` VALUES(209, 'Ukraine', 'UA', 0);
INSERT INTO `countries` VALUES(210, 'United Arab Emirates', 'AE', 0);
INSERT INTO `countries` VALUES(211, 'Uruguay', 'UY', 0);
INSERT INTO `countries` VALUES(212, 'Uzbekistan', 'UZ', 0);
INSERT INTO `countries` VALUES(213, 'Vanuatu', 'VU', 0);
INSERT INTO `countries` VALUES(214, 'Venezuela', 'VE', 0);
INSERT INTO `countries` VALUES(215, 'Viet Nam', 'VN', 0);
INSERT INTO `countries` VALUES(216, 'Virgin Islands, U.S.', 'VI', 0);
INSERT INTO `countries` VALUES(217, 'Yemen', 'YE', 0);
INSERT INTO `countries` VALUES(218, 'Zambia', 'ZM', 0);
INSERT INTO `countries` VALUES(219, 'Zimbabwe', 'ZW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenters`
--

CREATE TABLE `ecocenters` (
  `id_centro` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `latitude` varchar(128) DEFAULT NULL,
  `longitude` varchar(128) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `year` int(11) DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `land_size` int(11) DEFAULT NULL,
  `units` varchar(4) DEFAULT NULL,
  `food_grown` text CHARACTER SET latin1,
  `shared_meals` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  `alcohol` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `tobacco` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `restrictions` text CHARACTER SET latin1,
  `website` varchar(200) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `approved` varchar(128) DEFAULT NULL,
  `membersince` timestamp NULL DEFAULT NULL,
  `membtype` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_centro`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `ecocenters`
--

INSERT INTO `ecocenters` VALUES(87, 1, '47.256110489701705', ' 18.028257714294455', 'Test', 1900, '19203910293019203', '8109 TÃ©s, PetÅ‘fi St 2-22, Hungary', 'planning', 'urban', '(19) 230 12 93 091', 190, 'Ha', '20', 'yes', 'notallowed', 'allowed', 'wqerqwerqwerqwer', '1923091203901', 'Pending', '2011-12-12 02:32:31', NULL);
INSERT INTO `ecocenters` VALUES(88, 1, '47.256110489701705', ' 18.028257714294455', 'Test', 1900, '19203910293019203', '8109 TÃ©s, PetÅ‘fi St 2-22, Hungary', 'planning', 'urban', '(19) 230 12 93 091', 190, 'Ha', '20', 'yes', 'notallowed', 'allowed', 'wqerqwerqwerqwer', '1923091203901', 'Pending', '2011-12-12 02:36:03', NULL);
INSERT INTO `ecocenters` VALUES(89, 1, '38.91196786913472', ' -75.52569579416502', 'Nueva Ecoaldea', 1900, 'asdfasdfasdf', '4362-4798 Road 434, Houston, DE 19954, USA', 'planning', 'urban', '(23) 141 23 41 234', 1909, 'Ha', 'qwe', 'yes', 'notallowed', 'allowed', 'Not much', 'adfasdf', 'Pending', '2011-12-12 02:47:30', NULL);
INSERT INTO `ecocenters` VALUES(90, 1, '38.91069892596662', ' -75.52655410104978', 'Nueva Ecoaldea', 1900, 'asdfasdfasdf', '4362 Road 434, Houston, DE 19954, USA', 'forming', 'rural', '(23) 141 23 41 234', 1909, 'sq', 'qwe', 'yes', 'notallowed', 'allowed', 'Not much', 'adfasdf', 'Pending', '2011-12-12 02:48:59', NULL);
INSERT INTO `ecocenters` VALUES(91, 1, '38.91079910651523', ' -75.52543830209959', 'Nueva Ecoaldea', 1900, 'asdfasdfasdf', '4362 Road 434, Houston, DE 19954, USA', 'formed', 'suburban', '(23) 141 23 41 234', 1909, 'Ha', 'qwe', 'yes', 'notallowed', 'allowed', 'Not much', 'adfasdf', 'Pending', '2011-12-12 02:49:45', 'free');
INSERT INTO `ecocenters` VALUES(92, 1, '16.184898159926725', ' -96.46194097088625', 'Ecovillananda', 2000, 'Esta en medio de las montaÃ±as, es precioso', 'Miahuatlan De Porfirio Diaz - San Pedro Pochutla, ', 'forming', 'rural', '(12) 431 23 41 234', 10, 'Ha', '20', 'yes', 'allowed', 'allowed', 'No muchas, todo es muy orgÃ¡nico aquÃ­', 'www.ecovillananda.com', 'Pending', '2011-12-12 12:43:09', 'free');
INSERT INTO `ecocenters` VALUES(94, 63, '16.18259013508112', ' -96.46404382275392', 'Ecovilla Ananda', 1900, 'Es otra pagina de prueba', 'Miahuatlan De Porfirio Diaz - San Pedro Pochutla, ', 'forming', 'rural', '(12) 312 31 23 123', 190, 'sq', '50', 'yes', 'allowed', 'allowed', 'Mucho compromiso a ayudar', 'www.ecologikal.net', 'Pending', '2011-12-13 10:27:00', NULL);
INSERT INTO `ecocenters` VALUES(95, 51, '40.41874930371314', ' -3.6963113576416617', 'CASA SEMILLA', 1987, 'bonito y barato', 'Calle de AlcalÃ¡, 44, 28014 Madrid, EspaÃ±a', 'formed', 'urban', '', 1235, 'Ha', '34', 'nul', 'null', 'null', '', 'www.casasemilla.org', 'Pending', '2011-12-13 13:47:04', NULL);
INSERT INTO `ecocenters` VALUES(96, 69, '11.187078959791345', ' 78.65843915239259', 'Auroville', 1990, 'Auroville wants to be a universal town where men and women of all countries are able to live in peace and progressive harmony above all creeds, all politics and all nationalities. The purpose of Auroville is to realise human unity', 'Road to PeriyaPazhamalai, Tamil Nadu, India', 'forming', 'rural', '(12) 341 23 41 234', 190, 'Ha', '90', 'no', 'allowed', 'allowed', '', 'auroville.org', 'Pending', '2012-01-04 16:46:39', 'free');
INSERT INTO `ecocenters` VALUES(97, 69, '18.987029033218803', ' -99.10875473022463', 'Huehuecoyotl', 1970, 'Esta es una descripcion de prueba', 'Parque Nacional El Tepozteco, 22 de Febrero 40, Lo', 'formed', 'urban', '(92) 891 28 39 182', 190, 'Ha', '90', 'nul', 'null', 'null', '', 'www.huehuecoyotl.net', 'Pending', '2012-01-04 16:51:56', 'free');
INSERT INTO `ecocenters` VALUES(98, 1, '28.26072342381029', ' -16.647669828710946', 'Ecocentro de Prueba', 1986, 'TEst', 'Parque Nacional del Teide, Lugar las CaÃ±adas del ', 'planning', 'urban', '(19) 283 91 28 938', 1900, 'Ha', '90', 'yes', 'allowed', 'allowed', 'No hay restricciones especiales', 'www.eco.net', 'Pending', '2012-01-08 16:28:52', 'free');
INSERT INTO `ecocenters` VALUES(99, 1, '-32.29658626787422', ' 26.42621253973391', 'Probando el Crop', 1986, 'Esta descripciÃ³n es solo para probar', 'R344, South Africa', 'planning', 'urban', '(10) 238 01 23 091', 1990, 'Ha', '90', 'nul', 'null', 'null', '', 'www.eco.net', 'Pending', '2012-01-08 16:42:10', 'free');
INSERT INTO `ecocenters` VALUES(100, 1, '25.67127694791734', ' -100.30705523278812', 'Â´tesyc', 1999, 'test', 'Corredor al MUNE, Centro, Monterrey, Nuevo LeÃ³n, ', 'formed', 'urban', '', 100, 'Ha', '', 'yes', 'allowed', 'allowed', '', 'www', 'Pending', '2012-03-03 17:21:22', 'free');
INSERT INTO `ecocenters` VALUES(101, 73, '-18.900568343155566', ' 178.4875407735717', 'test', 11999, 'This is the new description', 'Kadavu Province, Fiji', 'Forming', 'Rural', '', 1, 'sq', '20', 'no', 'notallowed', 'allowed', '', '', 'Pending', '2012-03-08 18:14:09', 'free');

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_activities`
--

CREATE TABLE `ecocenter_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) DEFAULT '0' COMMENT '	',
  `id_centro` int(11) DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `activity_id` (`activity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `ecocenter_activities`
--

INSERT INTO `ecocenter_activities` VALUES(9, 1, 89, NULL);
INSERT INTO `ecocenter_activities` VALUES(10, 2, 89, NULL);
INSERT INTO `ecocenter_activities` VALUES(11, 3, 89, NULL);
INSERT INTO `ecocenter_activities` VALUES(12, 1, 90, NULL);
INSERT INTO `ecocenter_activities` VALUES(13, 2, 90, NULL);
INSERT INTO `ecocenter_activities` VALUES(14, 3, 90, NULL);
INSERT INTO `ecocenter_activities` VALUES(15, 1, 91, NULL);
INSERT INTO `ecocenter_activities` VALUES(16, 2, 91, NULL);
INSERT INTO `ecocenter_activities` VALUES(17, 3, 91, NULL);
INSERT INTO `ecocenter_activities` VALUES(18, 1, 92, NULL);
INSERT INTO `ecocenter_activities` VALUES(19, 2, 92, NULL);
INSERT INTO `ecocenter_activities` VALUES(20, 3, 92, NULL);
INSERT INTO `ecocenter_activities` VALUES(33, 1, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(34, 6, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(35, 7, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(36, 11, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(37, 13, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(38, 14, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(39, 24, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(40, 25, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(41, 28, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(42, 30, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(43, 31, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(44, 32, 94, NULL);
INSERT INTO `ecocenter_activities` VALUES(45, 11, 95, NULL);
INSERT INTO `ecocenter_activities` VALUES(46, 23, 95, NULL);
INSERT INTO `ecocenter_activities` VALUES(47, 25, 95, NULL);
INSERT INTO `ecocenter_activities` VALUES(48, 31, 95, NULL);
INSERT INTO `ecocenter_activities` VALUES(49, 4, 96, NULL);
INSERT INTO `ecocenter_activities` VALUES(50, 19, 96, NULL);
INSERT INTO `ecocenter_activities` VALUES(51, 27, 96, NULL);
INSERT INTO `ecocenter_activities` VALUES(52, 5, 97, NULL);
INSERT INTO `ecocenter_activities` VALUES(53, 6, 97, NULL);
INSERT INTO `ecocenter_activities` VALUES(54, 11, 98, NULL);
INSERT INTO `ecocenter_activities` VALUES(55, 2, 100, NULL);
INSERT INTO `ecocenter_activities` VALUES(56, 31, 100, NULL);
INSERT INTO `ecocenter_activities` VALUES(57, 17, 101, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_albums`
--

CREATE TABLE `ecocenter_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_id` int(11) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sc_id` (`sc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `ecocenter_albums`
--

INSERT INTO `ecocenter_albums` VALUES(61, 101, 'fotos', 'pruebas', '2012-03-11 15:59:58');
INSERT INTO `ecocenter_albums` VALUES(68, 101, 'otro', 'prueba', '2012-03-11 16:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_bookings`
--

CREATE TABLE `ecocenter_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `room_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `datebegin` date DEFAULT NULL,
  `nodays` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `room_id` (`room_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecocenter_bookings`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_bookings_rooms`
--

CREATE TABLE `ecocenter_bookings_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `type` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `currency_id` int(11) DEFAULT '0',
  `capacity` int(11) DEFAULT '0',
  `min_stay` int(11) DEFAULT '0',
  `is_available` varchar(6) DEFAULT '0',
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ecocenter_bookings_rooms`
--

INSERT INTO `ecocenter_bookings_rooms` VALUES(20, 91, 'private', 'Cuarto Con fecha', 'Test rooom', 10000, 1, 2, 2, 'false', '2011-12-15 00:00:00');
INSERT INTO `ecocenter_bookings_rooms` VALUES(24, 91, 'shared', 'Otro de Prueba', 'Bueno', 100, 1, 3, 10, 'false', '2011-12-15 14:47:38');
INSERT INTO `ecocenter_bookings_rooms` VALUES(25, 91, 'private', 'CabaÃ±a', 'Es una cabaÃ±a bonita', 200, 1, 10, 1, 'true', '2012-01-02 12:40:53');
INSERT INTO `ecocenter_bookings_rooms` VALUES(26, 91, 'private', 'PequeÃ±a CabaÃ±a', 'Esta cabaÃ±ita esta situada cerca del rÃ­o, es un lugar mÃ¡gico', 400, 1, 4, 2, 'true', '2012-01-06 02:25:27');
INSERT INTO `ecocenter_bookings_rooms` VALUES(27, 91, 'private', 'Cuarto Grande', 'Esta es de prueba', 100, 1, 2, 10, 'true', '2012-02-21 17:50:50');
INSERT INTO `ecocenter_bookings_rooms` VALUES(28, 95, 'shared', 'Cuarto Bonito', 'desc', 100, 2, 8, 2, 'true', '2012-02-28 18:19:21');
INSERT INTO `ecocenter_bookings_rooms` VALUES(29, 101, 'private', 'doble', 'zsdas', 99, 2, 2, 2, '0', '2012-06-20 20:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_bookings_rooms_capacity`
--

CREATE TABLE `ecocenter_bookings_rooms_capacity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `capacity` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecocenter_bookings_rooms_capacity`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_dietary_practice`
--

CREATE TABLE `ecocenter_dietary_practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dietary_practice_id` int(11) DEFAULT '0',
  `id_centro` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `dietary_practice_id` (`dietary_practice_id`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ecocenter_dietary_practice`
--

INSERT INTO `ecocenter_dietary_practice` VALUES(1, 1, 87);
INSERT INTO `ecocenter_dietary_practice` VALUES(2, 2, 87);
INSERT INTO `ecocenter_dietary_practice` VALUES(3, 3, 87);
INSERT INTO `ecocenter_dietary_practice` VALUES(4, 4, 87);
INSERT INTO `ecocenter_dietary_practice` VALUES(5, 1, 88);
INSERT INTO `ecocenter_dietary_practice` VALUES(6, 2, 88);
INSERT INTO `ecocenter_dietary_practice` VALUES(7, 3, 88);
INSERT INTO `ecocenter_dietary_practice` VALUES(8, 4, 88);
INSERT INTO `ecocenter_dietary_practice` VALUES(9, 1, 89);
INSERT INTO `ecocenter_dietary_practice` VALUES(10, 2, 89);
INSERT INTO `ecocenter_dietary_practice` VALUES(11, 3, 89);
INSERT INTO `ecocenter_dietary_practice` VALUES(15, 1, 91);
INSERT INTO `ecocenter_dietary_practice` VALUES(16, 2, 91);
INSERT INTO `ecocenter_dietary_practice` VALUES(17, 3, 91);
INSERT INTO `ecocenter_dietary_practice` VALUES(18, 1, 92);
INSERT INTO `ecocenter_dietary_practice` VALUES(19, 2, 92);
INSERT INTO `ecocenter_dietary_practice` VALUES(20, 3, 92);
INSERT INTO `ecocenter_dietary_practice` VALUES(22, 7, 94);
INSERT INTO `ecocenter_dietary_practice` VALUES(23, 3, 96);
INSERT INTO `ecocenter_dietary_practice` VALUES(24, 8, 96);
INSERT INTO `ecocenter_dietary_practice` VALUES(25, 7, 101);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_directions`
--

CREATE TABLE `ecocenter_directions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `direction_id` int(11) NOT NULL DEFAULT '0',
  `directions` text,
  PRIMARY KEY (`id`),
  KEY `direction_id` (`direction_id`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ecocenter_directions`
--

INSERT INTO `ecocenter_directions` VALUES(1, 94, 2, 'Si llegas a la ciudad de Oaxaca en AviÃ³n, debes de tomar el bus que lleva a san jose del pacÃ­fico, bajarte allÃ­ y tomar otro camiÃ³n que lleva directo a San SebastiÃ¡n RÃ­o Hondo. Al llegar al puedo, pregunta por Summer o por Osvaldo y entra');
INSERT INTO `ecocenter_directions` VALUES(2, 94, 1, 'Just Testing');
INSERT INTO `ecocenter_directions` VALUES(3, 94, 3, 'Its working now');
INSERT INTO `ecocenter_directions` VALUES(4, 91, 2, 'Estas son las instrucciones para llegar');
INSERT INTO `ecocenter_directions` VALUES(5, 91, 1, 'Esto es una prueba nadamas y nada menos');
INSERT INTO `ecocenter_directions` VALUES(6, 91, 3, 'Esta bien Facil llegar en Camion');
INSERT INTO `ecocenter_directions` VALUES(7, 95, 2, 'sdjkfajlsdfkjasdkfNo directions Found');

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_follows`
--

CREATE TABLE `ecocenter_follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `id_centro` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ecocenter_follows`
--

INSERT INTO `ecocenter_follows` VALUES(1, 1, 91);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_orientations`
--

CREATE TABLE `ecocenter_orientations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orientation_id` int(11) DEFAULT '0',
  `id_centro` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `orientation_id` (`orientation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `ecocenter_orientations`
--

INSERT INTO `ecocenter_orientations` VALUES(1, 1, 88);
INSERT INTO `ecocenter_orientations` VALUES(2, 2, 88);
INSERT INTO `ecocenter_orientations` VALUES(3, 3, 88);
INSERT INTO `ecocenter_orientations` VALUES(4, 4, 88);
INSERT INTO `ecocenter_orientations` VALUES(5, 1, 89);
INSERT INTO `ecocenter_orientations` VALUES(6, 2, 89);
INSERT INTO `ecocenter_orientations` VALUES(7, 3, 89);
INSERT INTO `ecocenter_orientations` VALUES(11, 1, 91);
INSERT INTO `ecocenter_orientations` VALUES(12, 2, 91);
INSERT INTO `ecocenter_orientations` VALUES(13, 3, 91);
INSERT INTO `ecocenter_orientations` VALUES(14, 1, 92);
INSERT INTO `ecocenter_orientations` VALUES(15, 2, 92);
INSERT INTO `ecocenter_orientations` VALUES(16, 3, 92);
INSERT INTO `ecocenter_orientations` VALUES(22, 2, 94);
INSERT INTO `ecocenter_orientations` VALUES(23, 3, 94);
INSERT INTO `ecocenter_orientations` VALUES(24, 4, 94);
INSERT INTO `ecocenter_orientations` VALUES(25, 5, 94);
INSERT INTO `ecocenter_orientations` VALUES(26, 7, 94);
INSERT INTO `ecocenter_orientations` VALUES(27, 1, 96);
INSERT INTO `ecocenter_orientations` VALUES(28, 2, 96);
INSERT INTO `ecocenter_orientations` VALUES(29, 3, 96);
INSERT INTO `ecocenter_orientations` VALUES(30, 4, 96);
INSERT INTO `ecocenter_orientations` VALUES(31, 1, 98);
INSERT INTO `ecocenter_orientations` VALUES(32, 5, 98);
INSERT INTO `ecocenter_orientations` VALUES(33, 9, 98);
INSERT INTO `ecocenter_orientations` VALUES(34, 1, 100);
INSERT INTO `ecocenter_orientations` VALUES(35, 3, 101);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_people_roles`
--

CREATE TABLE `ecocenter_people_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `role_id` int(11) DEFAULT '0',
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `ecocenter_people_roles`
--

INSERT INTO `ecocenter_people_roles` VALUES(1, 91, 1, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(2, 94, 63, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(3, 95, 51, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(12, 91, 51, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(13, 91, 53, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(14, 91, 51, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(15, 91, 53, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(16, 91, 63, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(44, 88, 53, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(45, 87, 53, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(46, 91, 53, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(47, 92, 53, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(48, 94, 53, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(50, 95, 53, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(51, 91, 65, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(83, 95, 1, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(91, 90, 1, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(92, 92, 1, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(101, 87, 1, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(104, 91, 61, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(105, 91, 58, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(106, 91, 55, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(107, 91, 50, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(108, 91, 56, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(111, 94, 1, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(112, 91, 1, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(113, 96, 69, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(114, 97, 69, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(115, 91, 70, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(116, 90, 1, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(117, 98, 1, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(118, 99, 1, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(119, 95, 72, 3, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(120, 95, 55, 2, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(121, 100, 1, 1, NULL);
INSERT INTO `ecocenter_people_roles` VALUES(122, 101, 73, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_pictures`
--

CREATE TABLE `ecocenter_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_id` int(11) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(240) DEFAULT NULL,
  `album_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `sc_id` (`sc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ecocenter_pictures`
--

INSERT INTO `ecocenter_pictures` VALUES(9, 101, 'p16o1sgdldn5g193c195n1rub18t94.jpg', 'sa', 61);
INSERT INTO `ecocenter_pictures` VALUES(10, 101, 'p16o1sh2tglb1am919ap14gr1p5g4.jpg', 'ffffff', 61);
INSERT INTO `ecocenter_pictures` VALUES(13, 101, 'p16o1u1vhdll1sb0u3q1mm71m665.jpg', '', 68);
INSERT INTO `ecocenter_pictures` VALUES(14, 101, 'p16o1u1vhdvlpsdt1b8aie1j514.jpg', '', 68);
INSERT INTO `ecocenter_pictures` VALUES(15, 101, 'p16o1ucur87nm1q2782s4jlng04.jpg', '', 68);
INSERT INTO `ecocenter_pictures` VALUES(16, 101, 'p16o1ucur8a261p4kos1nn1njr5.jpg', '', 68);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_pictures_comments`
--

CREATE TABLE `ecocenter_pictures_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_id` int(11) DEFAULT '0',
  `album_id` int(11) DEFAULT '0',
  `user_from` int(11) DEFAULT '0',
  `time` timestamp NULL DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `pic_id` (`pic_id`),
  KEY `user_from` (`user_from`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecocenter_pictures_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_pictures_people_tags`
--

CREATE TABLE `ecocenter_pictures_people_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT '0',
  `pic_id` int(11) DEFAULT '0',
  `sc_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `pic_id` (`pic_id`),
  KEY `sc_id` (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecocenter_pictures_people_tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_places`
--

CREATE TABLE `ecocenter_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` double DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `id_centro` int(25) NOT NULL DEFAULT '0',
  `type_id` int(25) DEFAULT '0',
  `title` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`) USING BTREE,
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `ecocenter_places`
--

INSERT INTO `ecocenter_places` VALUES(3, 16.166103458881572, -96.51279565380862, 94, 3, 'Ruinas Zapotecas', 'Estas ruinas son muy interesantes');
INSERT INTO `ecocenter_places` VALUES(4, 16.205669168829616, -96.49494287060548, 94, 25, 'Hospital MAs Cercano', 'El hospital mas cercano');
INSERT INTO `ecocenter_places` VALUES(5, 16.230064066944525, -96.43245812939455, 94, 23, 'Art Place', 'Lot of fun in this place');
INSERT INTO `ecocenter_places` VALUES(6, 16.193140885499446, -96.41185876416017, 94, 20, 'Cafe', 'sadfasdf');
INSERT INTO `ecocenter_places` VALUES(7, 16.193140885499446, -96.41185876416017, 94, 20, 'Cafe', 'sadfasdf');
INSERT INTO `ecocenter_places` VALUES(8, 16.147636748808424, -96.47022363232422, 94, 24, 'Cinema Paradiso', 'Great Cinema');
INSERT INTO `ecocenter_places` VALUES(9, 16.203031701638274, -96.45992394970705, 94, 1, 'Beautiful River', 'This river is ancient');
INSERT INTO `ecocenter_places` VALUES(10, 15.672852642770186, -96.49425622509766, 94, 2, 'Beautiful Beach', 'BEathchchchkdlfalksdnf');
INSERT INTO `ecocenter_places` VALUES(11, 40.406201865095525, -3.717597368383849, 95, 15, 'Cerro Precioso', 'Esta montaÃ±a esta bien chida');
INSERT INTO `ecocenter_places` VALUES(12, 40.33243842127944, -3.5315164357666617, 95, 0, 'Casacada', 'Hay una cascada bien chida por aca');
INSERT INTO `ecocenter_places` VALUES(13, 40.42084031601749, -3.8336404592041617, 95, 22, 'Irish Pub', 'Este pub es muy famoso por su cerveza');
INSERT INTO `ecocenter_places` VALUES(14, 40.460557200427964, -3.6860116750244742, 95, 4, 'Christian Church', 'This Church is worth seeing');
INSERT INTO `ecocenter_places` VALUES(16, 38.91026480862215, -75.5707569056152, 91, 12, 'Cueva Bonita', 'Esta cueva esta preciosa');
INSERT INTO `ecocenter_places` VALUES(17, 38.90278421583278, -75.48561286264646, 91, 1, 'asdf', 'asdf');
INSERT INTO `ecocenter_places` VALUES(18, 38.87338854212822, -75.54397773081051, 91, 1, 'asdf', 'asdf');
INSERT INTO `ecocenter_places` VALUES(19, 38.93537246169949, -75.53024482065426, 91, 3, 'asdf', 'asdfasdfadsf');
INSERT INTO `ecocenter_places` VALUES(20, 38.926826173067816, -75.4986591272949, 91, 1, 'asdfasdf', 'asdfasdf');
INSERT INTO `ecocenter_places` VALUES(21, 38.961539064351506, -75.59478949838865, 91, 3, 'asfasdf', 'asdfasdfasdf');
INSERT INTO `ecocenter_places` VALUES(22, 38.96100514860752, -75.46501349741209, 91, 1, 'asdfasd', 'asdfasdf');
INSERT INTO `ecocenter_places` VALUES(23, 38.8808722313089, -75.51239203745115, 91, 3, 'asdfasdf', 'asdfasdf');
INSERT INTO `ecocenter_places` VALUES(24, 39.011175640139925, -75.53505133920896, 91, 1, 'asdf', 'asdfasdf');
INSERT INTO `ecocenter_places` VALUES(25, 38.96794573944996, -75.50689887338865, 91, 0, 'asdfas', 'asdfasdfs');
INSERT INTO `ecocenter_places` VALUES(26, 39.0255797391802, -75.35927008920895, 91, 1, 'asdf', 'asdfasdf');
INSERT INTO `ecocenter_places` VALUES(27, 38.931099446102934, -75.62294196420896, 91, 5, 'Museo de la ciudad', 'Esta bien bonito este lugar');
INSERT INTO `ecocenter_places` VALUES(28, 38.91240197606316, -75.41900824838865, 91, 21, 'Este Bar esta bueno', 'Siii, muy bueno');
INSERT INTO `ecocenter_places` VALUES(29, 38.93270185712066, -75.61264228159176, 91, 3, 'Ruinas Zapotecas', 'Muy bonitas de verdad');
INSERT INTO `ecocenter_places` VALUES(30, 38.89530283480586, -75.69641303354489, 91, 18, 'This place is awesomee', 'Me encanta este lugar mucho mucho');
INSERT INTO `ecocenter_places` VALUES(31, 40.288979643347126, -3.7608560353760367, 95, 2, 'Playa Bonita', 'Esta playa es preciosa');
INSERT INTO `ecocenter_places` VALUES(32, 38.94027943544297, -75.68637084299313, 89, 0, 'Cascada Bonita', 'Esta cascada es preciosa');
INSERT INTO `ecocenter_places` VALUES(33, 38.995267705614, -75.57170104318845, 89, 3, 'Ruina Maya', 'Ruina Maya');
INSERT INTO `ecocenter_places` VALUES(34, 38.96847960288858, -75.62019538217771, 91, 15, 'MontaÃ±a', 'esta es una description');
INSERT INTO `ecocenter_places` VALUES(35, 38.897707650381086, -75.55256079965818, 91, 16, 'Parque Selbyville', 'Este parque es muy bonito, hay que visitarlo definitivamente');
INSERT INTO `ecocenter_places` VALUES(36, 19.009103316377768, -99.15819320678713, 97, 15, 'Cerro del Tepozteco', 'Este lugar vale la pena visitar');
INSERT INTO `ecocenter_places` VALUES(37, 40.436520836623544, -3.8041147023682242, 95, 6, 'Chipinque', 'test');
INSERT INTO `ecocenter_places` VALUES(38, 25.671895815997658, -100.2850825765381, 100, 5, 'bonito museo', 'gfhkjghgj');
INSERT INTO `ecocenter_places` VALUES(39, 47.256110489701705, 17.952040062927267, 87, 1, 'hjg', 'mnhjkh');
INSERT INTO `ecocenter_places` VALUES(40, 21.874986419694924, -102.26341804158938, 101, 15, 'test', 'rffu');
INSERT INTO `ecocenter_places` VALUES(41, -18.928499802114516, 178.48067431849358, 101, 13, 'aha', 'caÃ±on');
INSERT INTO `ecocenter_places` VALUES(42, -18.908363638225914, 178.47174792689202, 101, 0, 'cascada', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_services_available`
--

CREATE TABLE `ecocenter_services_available` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT '0',
  `id_centro` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `ecocenter_services_available`
--

INSERT INTO `ecocenter_services_available` VALUES(8, 1, 87);
INSERT INTO `ecocenter_services_available` VALUES(9, 2, 87);
INSERT INTO `ecocenter_services_available` VALUES(10, 3, 87);
INSERT INTO `ecocenter_services_available` VALUES(11, 4, 87);
INSERT INTO `ecocenter_services_available` VALUES(12, 1, 88);
INSERT INTO `ecocenter_services_available` VALUES(13, 2, 88);
INSERT INTO `ecocenter_services_available` VALUES(14, 3, 88);
INSERT INTO `ecocenter_services_available` VALUES(15, 4, 88);
INSERT INTO `ecocenter_services_available` VALUES(16, 1, 89);
INSERT INTO `ecocenter_services_available` VALUES(17, 2, 89);
INSERT INTO `ecocenter_services_available` VALUES(18, 3, 89);
INSERT INTO `ecocenter_services_available` VALUES(19, 4, 89);
INSERT INTO `ecocenter_services_available` VALUES(20, 1, 90);
INSERT INTO `ecocenter_services_available` VALUES(21, 2, 90);
INSERT INTO `ecocenter_services_available` VALUES(22, 3, 90);
INSERT INTO `ecocenter_services_available` VALUES(23, 4, 90);
INSERT INTO `ecocenter_services_available` VALUES(24, 1, 91);
INSERT INTO `ecocenter_services_available` VALUES(25, 2, 91);
INSERT INTO `ecocenter_services_available` VALUES(26, 3, 91);
INSERT INTO `ecocenter_services_available` VALUES(27, 4, 91);
INSERT INTO `ecocenter_services_available` VALUES(28, 1, 92);
INSERT INTO `ecocenter_services_available` VALUES(29, 2, 92);
INSERT INTO `ecocenter_services_available` VALUES(30, 3, 92);
INSERT INTO `ecocenter_services_available` VALUES(35, 5, 94);
INSERT INTO `ecocenter_services_available` VALUES(36, 9, 94);
INSERT INTO `ecocenter_services_available` VALUES(37, 14, 94);
INSERT INTO `ecocenter_services_available` VALUES(38, 16, 94);
INSERT INTO `ecocenter_services_available` VALUES(39, 8, 95);
INSERT INTO `ecocenter_services_available` VALUES(40, 14, 95);
INSERT INTO `ecocenter_services_available` VALUES(41, 15, 95);
INSERT INTO `ecocenter_services_available` VALUES(42, 1, 96);
INSERT INTO `ecocenter_services_available` VALUES(43, 2, 96);
INSERT INTO `ecocenter_services_available` VALUES(44, 6, 96);
INSERT INTO `ecocenter_services_available` VALUES(45, 9, 96);
INSERT INTO `ecocenter_services_available` VALUES(46, 15, 96);
INSERT INTO `ecocenter_services_available` VALUES(47, 16, 96);
INSERT INTO `ecocenter_services_available` VALUES(48, 1, 98);
INSERT INTO `ecocenter_services_available` VALUES(49, 7, 100);
INSERT INTO `ecocenter_services_available` VALUES(50, 10, 101);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_spiritual_practice`
--

CREATE TABLE `ecocenter_spiritual_practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spiritual_pr_id` int(11) DEFAULT '0',
  `id_centro` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `spiritual_pr_id` (`spiritual_pr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `ecocenter_spiritual_practice`
--

INSERT INTO `ecocenter_spiritual_practice` VALUES(1, 1, 87);
INSERT INTO `ecocenter_spiritual_practice` VALUES(2, 2, 87);
INSERT INTO `ecocenter_spiritual_practice` VALUES(3, 3, 87);
INSERT INTO `ecocenter_spiritual_practice` VALUES(4, 4, 87);
INSERT INTO `ecocenter_spiritual_practice` VALUES(5, 1, 88);
INSERT INTO `ecocenter_spiritual_practice` VALUES(6, 2, 88);
INSERT INTO `ecocenter_spiritual_practice` VALUES(7, 3, 88);
INSERT INTO `ecocenter_spiritual_practice` VALUES(8, 4, 88);
INSERT INTO `ecocenter_spiritual_practice` VALUES(9, 1, 89);
INSERT INTO `ecocenter_spiritual_practice` VALUES(10, 2, 89);
INSERT INTO `ecocenter_spiritual_practice` VALUES(11, 3, 89);
INSERT INTO `ecocenter_spiritual_practice` VALUES(12, 1, 90);
INSERT INTO `ecocenter_spiritual_practice` VALUES(13, 2, 90);
INSERT INTO `ecocenter_spiritual_practice` VALUES(14, 3, 90);
INSERT INTO `ecocenter_spiritual_practice` VALUES(15, 1, 91);
INSERT INTO `ecocenter_spiritual_practice` VALUES(16, 2, 91);
INSERT INTO `ecocenter_spiritual_practice` VALUES(17, 3, 91);
INSERT INTO `ecocenter_spiritual_practice` VALUES(18, 1, 92);
INSERT INTO `ecocenter_spiritual_practice` VALUES(19, 2, 92);
INSERT INTO `ecocenter_spiritual_practice` VALUES(20, 3, 92);
INSERT INTO `ecocenter_spiritual_practice` VALUES(23, 16, 94);
INSERT INTO `ecocenter_spiritual_practice` VALUES(24, 17, 94);
INSERT INTO `ecocenter_spiritual_practice` VALUES(25, 13, 95);
INSERT INTO `ecocenter_spiritual_practice` VALUES(26, 16, 96);
INSERT INTO `ecocenter_spiritual_practice` VALUES(27, 2, 101);

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_vacancies`
--

CREATE TABLE `ecocenter_vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `petal_id` int(11) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `spots` int(4) DEFAULT '0',
  `description` text,
  `datefrom` date DEFAULT NULL,
  `duration` int(6) DEFAULT '0',
  `tasks` varchar(128) DEFAULT NULL,
  `recompenses` varchar(128) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `is_available` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `petal_id` (`petal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ecocenter_vacancies`
--

INSERT INTO `ecocenter_vacancies` VALUES(1, 91, 7, 'Yoga Teacher', 2, 'Necesitamos un maestro de yoga para nuestro ecocentro', '2011-12-30', 30, 'Dar clases de yoga de 6-9 am todos los dias', 'Alojamiento y comida incluidos', '2011-12-19 00:38:08', 'false');
INSERT INTO `ecocenter_vacancies` VALUES(2, 91, 2, 'Cook Assistant', 2, 'We need a volunteer as a cook assistant for our ecocenter', '2012-01-20', 20, 'Volunteer should definitely be interested in helping us to cook delicious food', 'We offer free accomodation and food plus other expenses', '2011-12-19 00:43:34', 'true');
INSERT INTO `ecocenter_vacancies` VALUES(3, 95, 3, 'Test 2', 12, 'Cuidando de los rios y lagos', '2011-12-13', 20, 'Deberas de limpiar todos los dias las areas comunes', 'Ofrecemos alojamiento y comida', '2011-12-24 04:26:27', 'true');
INSERT INTO `ecocenter_vacancies` VALUES(4, 101, 6, 'Desarrollo Web', 2, 'asdasdasd', '2012-05-17', 4, 'asd', 'asdasdas', '2012-05-12 14:55:32', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_vacancies_skills`
--

CREATE TABLE `ecocenter_vacancies_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `skill_id` int(11) DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecocenter_vacancies_skills`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_volunteers`
--

CREATE TABLE `ecocenter_volunteers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `vacancy_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `vacancy_id` (`vacancy_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecocenter_volunteers`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecocenter_workshops`
--

CREATE TABLE `ecocenter_workshops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_centro` int(11) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `max_capacity` int(11) DEFAULT '0',
  `min_allowance` int(11) DEFAULT '0',
  `description` text,
  `datefrom` date DEFAULT NULL,
  `duration` int(11) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `currency_id` int(11) DEFAULT '0',
  `petal_id` int(11) DEFAULT '0',
  `time` timestamp NULL DEFAULT NULL,
  `is_available` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro` (`id_centro`),
  KEY `currency_id` (`currency_id`),
  KEY `petal_id` (`petal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ecocenter_workshops`
--

INSERT INTO `ecocenter_workshops` VALUES(11, 91, 'Taller de Kefir', 10, 1, 'Esta es una descripcion de prueba solamente', '2011-12-22', 19, 10, 1, 1, '2011-12-17 22:46:53', 'true');
INSERT INTO `ecocenter_workshops` VALUES(12, 91, 'Taller de Kefir', 10, 1, 'Este taller nos mostrarÃ¡ las bases para producir nuestro propio Kefir en Casa.<div>El kefir tiene muchas propiedades</div>', '1969-12-31', 19, 300, 1, 5, '2011-12-17 22:47:56', 'true');
INSERT INTO `ecocenter_workshops` VALUES(15, 95, 'Taller de IntroducciÃ³n a la Permacultura', 24, 10, 'Este taller de permacultura, nos servirÃ¡ para entender las bases y la teorÃ­a detrÃ¡s de esta gran ciencia<div><br /></div><div><strong>No te lo pierdas!</strong></div>', '1969-12-31', 2, 800, 1, 4, '2012-01-05 16:59:43', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idea` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `video` varchar(200) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `timestamp` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `featured` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` VALUES(1, 'teeeeeest', 73, '', '', 25.6513138, -100.38015089999999, 21, 7, '0');
INSERT INTO `idea` VALUES(2, 'CHeck this out', 73, 'f5b36cfb091735bc7845f7860612b994.jpg', '', 25.6513138, -100.38015089999999, 21, 5, '0');
INSERT INTO `idea` VALUES(5, 'Opinion', 73, '', '', 25.6513138, -100.38015089999999, 1341886802, 0, '0');
INSERT INTO `idea` VALUES(6, 'Todos estamos conectados', 73, '2d41facbe53c8eba955ab5d99a0bfab0.jpg', '', 25.6602806, -100.28104730000001, 1342053188, 0, '0');
INSERT INTO `idea` VALUES(7, 'Chequen esta frase', 73, '1314ecaaca09f224f27dc7988524eff9.jpg', '', 25.6602806, -100.28104730000001, 1342053234, 0, '0');
INSERT INTO `idea` VALUES(8, 'Idea', 73, '099b151560995fd3ec34d748f0adf1b6.jpg', '', 25.6602806, -100.28104730000001, 1342054099, 4, '0');
INSERT INTO `idea` VALUES(9, 'aaa', 73, 'a4078794d0aed99c1569d93c7450b928.jpg', '', 25.6602806, -100.28104730000001, 1342061520, 1, '0');
INSERT INTO `idea` VALUES(10, 'asdas', 73, '16a72b733b6e622e0c0fb89c3bc3d0c7.jpg', '', 25.6602806, -100.28104730000001, 1342061533, 5, '0');
INSERT INTO `idea` VALUES(11, 'werqwe', 73, '2acbe3bb889c63857b56c08ef662fd5f.jpg', '', 25.6602806, -100.28104730000001, 1342061542, 4, '0');
INSERT INTO `idea` VALUES(12, 'asdqweqw', 73, '223abf18e10faa0b75cd903f5ad1cf3d.jpg', '', 25.6602806, -100.28104730000001, 1342061552, 5, '0');
INSERT INTO `idea` VALUES(13, 'qweqweqwe', 73, 'a3c07e17c7bc0828c53170f09d789c07.jpg', '', 25.6602806, -100.28104730000001, 1342061565, 6, '0');
INSERT INTO `idea` VALUES(14, 'aqweqw', 73, '9236aa575b63bfff2f6e31937883b1d1.jpg', '', 25.6602806, -100.28104730000001, 1342061595, 7, '0');
INSERT INTO `idea` VALUES(15, 'asdqweqw', 73, '0d83a9f27dc4165aa2639e0be459649e.jpg', '', 25.6602806, -100.28104730000001, 1342061608, 1, '1');
INSERT INTO `idea` VALUES(16, 'qweqweqw', 73, 'a5dc42603d0ecca9efdf63052791c8a1.jpg', '', 25.6602806, -100.28104730000001, 1342061619, 0, '1');
INSERT INTO `idea` VALUES(17, 'qwwewe', 73, '2154c7e12ac20e17a43f04a5e6914ec9.jpg', '', 25.6602806, -100.28104730000001, 1342061900, 3, '0');
INSERT INTO `idea` VALUES(18, 'asdasd', 73, '07be7c4693ccf436fd7cbc09495ee804.jpg', '', 25.6602806, -100.28104730000001, 1342061911, 1, '1');
INSERT INTO `idea` VALUES(19, 'asdqweqwe', 73, 'c2397c58e50153b7700532422fc50f6d.jpg', '', 25.6602806, -100.28104730000001, 1342062030, 2, '0');
INSERT INTO `idea` VALUES(20, 'wqweqwe', 73, 'edcf4191d098070508ebe5a1f374b255.jpg', '', 25.6602806, -100.28104730000001, 1342062920, 2, '1');
INSERT INTO `idea` VALUES(21, 'Mensaje de protesta http://www.youtube.com/watch?v=YsGKsaf8WGs', 73, '', 'YsGKsaf8WGs', 25.6602806, -100.28104730000001, 1342076295, 0, '0');
INSERT INTO `idea` VALUES(22, 'videoooo ', 73, '', 'YsGKsaf8WGs', 25.6602806, -100.28104730000001, 1342077097, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `landing_reg`
--

CREATE TABLE `landing_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ip` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `referrer` varchar(50) NOT NULL,
  `md5` varchar(32) NOT NULL,
  `origin` char(2) NOT NULL COMMENT 'fb,tw,qr',
  `redeemed` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `landing_reg`
--

INSERT INTO `landing_reg` VALUES(1, '2012-05-27', '192.168.15.86', 'a@bc.c', '', '', '', '');
INSERT INTO `landing_reg` VALUES(2, '2012-05-27', '192.168.15.86', 'a@d.c', '', '', '', '');
INSERT INTO `landing_reg` VALUES(3, '2012-05-27', '192.168.15.86', '', '', '', '', '');
INSERT INTO `landing_reg` VALUES(5, '2012-05-27', '192.168.15.86', 'undefined', '', '', '', '');
INSERT INTO `landing_reg` VALUES(7, '2012-05-29', '127.0.0.1', 'ads@d.c', '', '', '', '');
INSERT INTO `landing_reg` VALUES(9, '2012-05-29', '127.0.0.1', 'a@c.s', '', '', '', '');
INSERT INTO `landing_reg` VALUES(10, '2012-05-29', '127.0.0.1', 'a@s.c', '', '', '', '');
INSERT INTO `landing_reg` VALUES(11, '2012-05-29', '127.0.0.1', 'a@c.c', '', '', '', '');
INSERT INTO `landing_reg` VALUES(14, '2012-05-29', '127.0.0.1', 'a@b.c', '', '', '', '');
INSERT INTO `landing_reg` VALUES(17, '2012-05-29', '127.0.0.1', 'prueba@normal.com', '', '', '', '');
INSERT INTO `landing_reg` VALUES(21, '2012-05-29', '127.0.0.1', 'prueba@normal.referido', 'prueba@normal.com', '', '', '');
INSERT INTO `landing_reg` VALUES(25, '2012-05-29', '127.0.0.1', 'adsgm@hotmail.com', 'prueba@normal.com', '', '', '');
INSERT INTO `landing_reg` VALUES(26, '2012-05-30', '192.168.15.175', 'Ads@g.g', '', '3d616fd359fbdbb3cabde626b7250c72', '', '');
INSERT INTO `landing_reg` VALUES(33, '2012-06-07', '127.0.0.1', 'a@bc.ss', '', 'c9eb32d18e59c19b4f7561c5dc22fc33', '', '');
INSERT INTO `landing_reg` VALUES(53, '2012-06-07', '127.0.0.1', 'a@b.ccc', '', '77c712cac55ccd968d263d8438ccea7c', '', '');
INSERT INTO `landing_reg` VALUES(65, '2012-06-07', '127.0.0.1', 'adsad@dasd.c', '', '6395387930dbdb7b5d72e5a0d3ada481', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `landing_reg_cat`
--

CREATE TABLE `landing_reg_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `landing_reg_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `landing_reg_cat_rank`
--

CREATE TABLE `landing_reg_cat_rank` (
  `mail` varchar(50) NOT NULL,
  `cat` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landing_reg_cat_rank`
--


-- --------------------------------------------------------

--
-- Table structure for table `landing_reg_dest`
--

CREATE TABLE `landing_reg_dest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `landing_reg_dest`
--


-- --------------------------------------------------------

--
-- Table structure for table `landing_reg_dest_rank`
--

CREATE TABLE `landing_reg_dest_rank` (
  `mail` varchar(50) NOT NULL,
  `place` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landing_reg_dest_rank`
--


-- --------------------------------------------------------

--
-- Table structure for table `list_languages`
--

CREATE TABLE `list_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(128) DEFAULT NULL,
  `level` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2286 ;

--
-- Dumping data for table `list_languages`
--

INSERT INTO `list_languages` VALUES(1, 'Maltese', 'Beginner');
INSERT INTO `list_languages` VALUES(2, 'Senufo and Minianka', 'Beginner');
INSERT INTO `list_languages` VALUES(3, 'Teke', 'Beginner');
INSERT INTO `list_languages` VALUES(4, 'GuaranÃ­', 'Beginner');
INSERT INTO `list_languages` VALUES(5, 'Kayah', 'Beginner');
INSERT INTO `list_languages` VALUES(6, 'Rundi', 'Beginner');
INSERT INTO `list_languages` VALUES(7, 'German', 'Beginner');
INSERT INTO `list_languages` VALUES(8, 'Hindi', 'Beginner');
INSERT INTO `list_languages` VALUES(9, 'Lomwe', 'Beginner');
INSERT INTO `list_languages` VALUES(10, 'Telugu', 'Beginner');
INSERT INTO `list_languages` VALUES(11, 'Miskito', 'Beginner');
INSERT INTO `list_languages` VALUES(12, 'Chamorro', 'Beginner');
INSERT INTO `list_languages` VALUES(13, 'Kosrean', 'Beginner');
INSERT INTO `list_languages` VALUES(14, 'Comorian-French', 'Beginner');
INSERT INTO `list_languages` VALUES(15, 'Punu', 'Beginner');
INSERT INTO `list_languages` VALUES(16, 'Singali', 'Beginner');
INSERT INTO `list_languages` VALUES(17, 'Mam', 'Beginner');
INSERT INTO `list_languages` VALUES(18, 'Yucatec', 'Beginner');
INSERT INTO `list_languages` VALUES(19, 'Maka', 'Beginner');
INSERT INTO `list_languages` VALUES(20, 'Tadzhik', 'Beginner');
INSERT INTO `list_languages` VALUES(21, 'Kalenjin', 'Beginner');
INSERT INTO `list_languages` VALUES(22, 'Gusii', 'Beginner');
INSERT INTO `list_languages` VALUES(23, 'MahorÃ©', 'Beginner');
INSERT INTO `list_languages` VALUES(24, 'Miao', 'Beginner');
INSERT INTO `list_languages` VALUES(25, 'Russian', 'Beginner');
INSERT INTO `list_languages` VALUES(26, 'Kirundi', 'Beginner');
INSERT INTO `list_languages` VALUES(27, 'Eskimo Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(28, 'Portuguese', 'Beginner');
INSERT INTO `list_languages` VALUES(29, 'Nyika', 'Beginner');
INSERT INTO `list_languages` VALUES(30, 'Masana', 'Beginner');
INSERT INTO `list_languages` VALUES(31, 'Zhuang', 'Beginner');
INSERT INTO `list_languages` VALUES(32, 'Khoekhoe', 'Beginner');
INSERT INTO `list_languages` VALUES(33, 'Serbo-Croatian', 'Beginner');
INSERT INTO `list_languages` VALUES(34, 'Tibetan', 'Beginner');
INSERT INTO `list_languages` VALUES(35, 'Garifuna', 'Beginner');
INSERT INTO `list_languages` VALUES(36, 'Herero', 'Beginner');
INSERT INTO `list_languages` VALUES(37, 'Iban', 'Beginner');
INSERT INTO `list_languages` VALUES(38, 'Zapotec', 'Beginner');
INSERT INTO `list_languages` VALUES(39, 'NÃ¡huatl', 'Beginner');
INSERT INTO `list_languages` VALUES(40, 'Kazakh', 'Beginner');
INSERT INTO `list_languages` VALUES(41, 'Asami', 'Beginner');
INSERT INTO `list_languages` VALUES(42, 'Mon', 'Beginner');
INSERT INTO `list_languages` VALUES(43, 'Tamashek', 'Beginner');
INSERT INTO `list_languages` VALUES(44, 'Thai', 'Beginner');
INSERT INTO `list_languages` VALUES(45, 'Sinaberberi', 'Beginner');
INSERT INTO `list_languages` VALUES(46, 'Hassaniya', 'Beginner');
INSERT INTO `list_languages` VALUES(47, 'Gilaki', 'Beginner');
INSERT INTO `list_languages` VALUES(48, 'Punu-sira-nzebi', 'Beginner');
INSERT INTO `list_languages` VALUES(49, 'Rapa nui', 'Beginner');
INSERT INTO `list_languages` VALUES(50, 'Lezgian', 'Beginner');
INSERT INTO `list_languages` VALUES(51, 'Akan', 'Beginner');
INSERT INTO `list_languages` VALUES(52, 'Gur', 'Beginner');
INSERT INTO `list_languages` VALUES(53, 'Tongan', 'Beginner');
INSERT INTO `list_languages` VALUES(54, 'Wolea', 'Beginner');
INSERT INTO `list_languages` VALUES(55, 'Mano', 'Beginner');
INSERT INTO `list_languages` VALUES(56, 'Kurdish', 'Beginner');
INSERT INTO `list_languages` VALUES(57, 'Makua', 'Beginner');
INSERT INTO `list_languages` VALUES(58, 'Diola', 'Beginner');
INSERT INTO `list_languages` VALUES(59, 'Yalunka', 'Beginner');
INSERT INTO `list_languages` VALUES(60, 'Songhai', 'Beginner');
INSERT INTO `list_languages` VALUES(61, 'Afar', 'Beginner');
INSERT INTO `list_languages` VALUES(62, 'Somali', 'Beginner');
INSERT INTO `list_languages` VALUES(63, 'MantÅ¡u', 'Beginner');
INSERT INTO `list_languages` VALUES(64, 'Mandjia', 'Beginner');
INSERT INTO `list_languages` VALUES(65, 'Polish', 'Beginner');
INSERT INTO `list_languages` VALUES(66, 'Mandarin Chinese', 'Beginner');
INSERT INTO `list_languages` VALUES(67, 'Ga-adangme', 'Beginner');
INSERT INTO `list_languages` VALUES(68, 'Mortlock', 'Beginner');
INSERT INTO `list_languages` VALUES(69, 'Southern Slavic Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(70, 'Araucan', 'Beginner');
INSERT INTO `list_languages` VALUES(71, 'Fang', 'Beginner');
INSERT INTO `list_languages` VALUES(72, 'Yi', 'Beginner');
INSERT INTO `list_languages` VALUES(73, 'Kru', 'Beginner');
INSERT INTO `list_languages` VALUES(74, 'Turkana', 'Beginner');
INSERT INTO `list_languages` VALUES(75, 'Georgiana', 'Beginner');
INSERT INTO `list_languages` VALUES(76, 'Saame', 'Beginner');
INSERT INTO `list_languages` VALUES(77, 'Saho', 'Beginner');
INSERT INTO `list_languages` VALUES(78, 'Bamileke-bamum', 'Beginner');
INSERT INTO `list_languages` VALUES(79, 'Busansi', 'Beginner');
INSERT INTO `list_languages` VALUES(80, 'Hungarian', 'Beginner');
INSERT INTO `list_languages` VALUES(82, 'Ambo', 'Beginner');
INSERT INTO `list_languages` VALUES(83, 'Papiamento', 'Beginner');
INSERT INTO `list_languages` VALUES(84, 'Gio', 'Beginner');
INSERT INTO `list_languages` VALUES(85, 'Kannada', 'Beginner');
INSERT INTO `list_languages` VALUES(86, 'Susu', 'Beginner');
INSERT INTO `list_languages` VALUES(87, 'Dutch', 'Beginner');
INSERT INTO `list_languages` VALUES(88, 'Burmese', 'Beginner');
INSERT INTO `list_languages` VALUES(89, 'Bambara', 'Beginner');
INSERT INTO `list_languages` VALUES(90, 'Bubi', 'Beginner');
INSERT INTO `list_languages` VALUES(91, 'Kpelle', 'Beginner');
INSERT INTO `list_languages` VALUES(92, 'Yap', 'Beginner');
INSERT INTO `list_languages` VALUES(93, 'Ful', 'Beginner');
INSERT INTO `list_languages` VALUES(94, 'Haiti Creole', 'Beginner');
INSERT INTO `list_languages` VALUES(95, 'Tigre', 'Beginner');
INSERT INTO `list_languages` VALUES(96, 'Tujia', 'Beginner');
INSERT INTO `list_languages` VALUES(97, 'Puyi', 'Beginner');
INSERT INTO `list_languages` VALUES(98, 'Khasi', 'Beginner');
INSERT INTO `list_languages` VALUES(99, 'Turkmenian', 'Beginner');
INSERT INTO `list_languages` VALUES(100, 'Pohnpei', 'Beginner');
INSERT INTO `list_languages` VALUES(101, 'Duala', 'Beginner');
INSERT INTO `list_languages` VALUES(102, 'Dong', 'Beginner');
INSERT INTO `list_languages` VALUES(103, 'Hui', 'Beginner');
INSERT INTO `list_languages` VALUES(104, 'Sena', 'Beginner');
INSERT INTO `list_languages` VALUES(105, 'Dorbet', 'Beginner');
INSERT INTO `list_languages` VALUES(106, 'Dariganga', 'Beginner');
INSERT INTO `list_languages` VALUES(107, 'Buryat', 'Beginner');
INSERT INTO `list_languages` VALUES(108, 'Bajad', 'Beginner');
INSERT INTO `list_languages` VALUES(109, 'Shan', 'Beginner');
INSERT INTO `list_languages` VALUES(110, 'Rakhine', 'Beginner');
INSERT INTO `list_languages` VALUES(111, 'Hadareb', 'Beginner');
INSERT INTO `list_languages` VALUES(112, 'Banda', 'Beginner');
INSERT INTO `list_languages` VALUES(113, 'Ndebele', 'Beginner');
INSERT INTO `list_languages` VALUES(114, 'Japanese', 'Beginner');
INSERT INTO `list_languages` VALUES(115, 'Dzongkha', 'Beginner');
INSERT INTO `list_languages` VALUES(116, 'Moravian', 'Beginner');
INSERT INTO `list_languages` VALUES(117, 'Ukrainian', 'Beginner');
INSERT INTO `list_languages` VALUES(118, 'Tswana', 'Beginner');
INSERT INTO `list_languages` VALUES(119, 'Lao-Soung', 'Beginner');
INSERT INTO `list_languages` VALUES(120, 'Mongolian', 'Beginner');
INSERT INTO `list_languages` VALUES(121, 'Somba', 'Beginner');
INSERT INTO `list_languages` VALUES(122, 'Joruba', 'Beginner');
INSERT INTO `list_languages` VALUES(123, 'Gagauzi', 'Beginner');
INSERT INTO `list_languages` VALUES(124, 'Marshallese', 'Beginner');
INSERT INTO `list_languages` VALUES(125, 'Bassa', 'Beginner');
INSERT INTO `list_languages` VALUES(126, 'Chibcha', 'Beginner');
INSERT INTO `list_languages` VALUES(127, 'Gbaya', 'Beginner');
INSERT INTO `list_languages` VALUES(128, 'Macedonian', 'Beginner');
INSERT INTO `list_languages` VALUES(129, 'Catalan', 'Beginner');
INSERT INTO `list_languages` VALUES(130, 'French', 'Beginner');
INSERT INTO `list_languages` VALUES(131, 'Tikar', 'Beginner');
INSERT INTO `list_languages` VALUES(132, 'Turkish', 'Beginner');
INSERT INTO `list_languages` VALUES(133, 'Mbundu', 'Beginner');
INSERT INTO `list_languages` VALUES(134, 'Chokwe', 'Beginner');
INSERT INTO `list_languages` VALUES(135, 'Minangkabau', 'Beginner');
INSERT INTO `list_languages` VALUES(136, 'Latvian', 'Beginner');
INSERT INTO `list_languages` VALUES(137, 'Caribbean', 'Beginner');
INSERT INTO `list_languages` VALUES(138, 'Malagasy', 'Beginner');
INSERT INTO `list_languages` VALUES(139, 'Urdu', 'Beginner');
INSERT INTO `list_languages` VALUES(140, 'Malajalam', 'Beginner');
INSERT INTO `list_languages` VALUES(141, 'Batakki', 'Beginner');
INSERT INTO `list_languages` VALUES(142, 'Maya Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(143, 'Luchazi', 'Beginner');
INSERT INTO `list_languages` VALUES(144, 'Malay', 'Beginner');
INSERT INTO `list_languages` VALUES(145, 'Luvale', 'Beginner');
INSERT INTO `list_languages` VALUES(146, 'Ewe', 'Beginner');
INSERT INTO `list_languages` VALUES(147, 'Mixed Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(148, 'Luri', 'Beginner');
INSERT INTO `list_languages` VALUES(149, 'Loma', 'Beginner');
INSERT INTO `list_languages` VALUES(150, '[South]Mande', 'Beginner');
INSERT INTO `list_languages` VALUES(151, 'Orija', 'Beginner');
INSERT INTO `list_languages` VALUES(152, 'Mongo', 'Beginner');
INSERT INTO `list_languages` VALUES(153, 'OtomÃ­', 'Beginner');
INSERT INTO `list_languages` VALUES(154, 'Lao', 'Beginner');
INSERT INTO `list_languages` VALUES(155, 'Gurage', 'Beginner');
INSERT INTO `list_languages` VALUES(156, 'Oromo', 'Beginner');
INSERT INTO `list_languages` VALUES(157, 'Yao', 'Beginner');
INSERT INTO `list_languages` VALUES(158, 'Chichewa', 'Beginner');
INSERT INTO `list_languages` VALUES(159, 'Tatar', 'Beginner');
INSERT INTO `list_languages` VALUES(160, 'KekchÃ­', 'Beginner');
INSERT INTO `list_languages` VALUES(161, 'Sidamo', 'Beginner');
INSERT INTO `list_languages` VALUES(162, 'Hebrew', 'Beginner');
INSERT INTO `list_languages` VALUES(163, 'Soninke', 'Beginner');
INSERT INTO `list_languages` VALUES(164, 'Kymri', 'Beginner');
INSERT INTO `list_languages` VALUES(165, 'Comorian', 'Beginner');
INSERT INTO `list_languages` VALUES(166, 'Bulgariana', 'Beginner');
INSERT INTO `list_languages` VALUES(167, 'Garo', 'Beginner');
INSERT INTO `list_languages` VALUES(168, 'Indian Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(169, 'Sunda', 'Beginner');
INSERT INTO `list_languages` VALUES(170, 'Korean', 'Beginner');
INSERT INTO `list_languages` VALUES(171, 'Trukese', 'Beginner');
INSERT INTO `list_languages` VALUES(172, 'Ngala and Bangi', 'Beginner');
INSERT INTO `list_languages` VALUES(173, 'Luhya', 'Beginner');
INSERT INTO `list_languages` VALUES(174, 'Punjabi', 'Beginner');
INSERT INTO `list_languages` VALUES(175, 'Mazandarani', 'Beginner');
INSERT INTO `list_languages` VALUES(176, 'Santhali', 'Beginner');
INSERT INTO `list_languages` VALUES(177, 'Sardinian', 'Beginner');
INSERT INTO `list_languages` VALUES(178, 'Friuli', 'Beginner');
INSERT INTO `list_languages` VALUES(179, 'Irish', 'Beginner');
INSERT INTO `list_languages` VALUES(180, 'Chiu chau', 'Beginner');
INSERT INTO `list_languages` VALUES(181, 'Philippene Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(182, 'Mpongwe', 'Beginner');
INSERT INTO `list_languages` VALUES(183, 'Fijian', 'Beginner');
INSERT INTO `list_languages` VALUES(184, 'Comorian-Arabic', 'Beginner');
INSERT INTO `list_languages` VALUES(185, 'Vietnamese', 'Beginner');
INSERT INTO `list_languages` VALUES(186, 'Belorussian', 'Beginner');
INSERT INTO `list_languages` VALUES(187, 'Marma', 'Beginner');
INSERT INTO `list_languages` VALUES(188, 'Canton Chinese', 'Beginner');
INSERT INTO `list_languages` VALUES(189, 'Javanese', 'Beginner');
INSERT INTO `list_languages` VALUES(190, 'Basque', 'Beginner');
INSERT INTO `list_languages` VALUES(191, 'Gurma', 'Beginner');
INSERT INTO `list_languages` VALUES(192, 'Luxembourgish', 'Beginner');
INSERT INTO `list_languages` VALUES(193, 'Sotho', 'Beginner');
INSERT INTO `list_languages` VALUES(194, 'Osseetti', 'Beginner');
INSERT INTO `list_languages` VALUES(195, 'Amhara', 'Beginner');
INSERT INTO `list_languages` VALUES(196, 'San', 'Beginner');
INSERT INTO `list_languages` VALUES(197, 'Bajan', 'Beginner');
INSERT INTO `list_languages` VALUES(198, 'English', 'Beginner');
INSERT INTO `list_languages` VALUES(199, 'QuichÃ©', 'Beginner');
INSERT INTO `list_languages` VALUES(200, 'Kissi', 'Beginner');
INSERT INTO `list_languages` VALUES(201, 'Tigrinja', 'Beginner');
INSERT INTO `list_languages` VALUES(202, 'Wolof', 'Beginner');
INSERT INTO `list_languages` VALUES(203, 'Finnish', 'Beginner');
INSERT INTO `list_languages` VALUES(204, 'Danish', 'Beginner');
INSERT INTO `list_languages` VALUES(205, 'Arawakan', 'Beginner');
INSERT INTO `list_languages` VALUES(206, 'Uzbek', 'Beginner');
INSERT INTO `list_languages` VALUES(207, 'Balochi', 'Beginner');
INSERT INTO `list_languages` VALUES(208, 'Dari', 'Beginner');
INSERT INTO `list_languages` VALUES(209, 'Pashto', 'Beginner');
INSERT INTO `list_languages` VALUES(210, 'Romani', 'Beginner');
INSERT INTO `list_languages` VALUES(211, 'Marendje', 'Beginner');
INSERT INTO `list_languages` VALUES(212, 'Circassian', 'Beginner');
INSERT INTO `list_languages` VALUES(213, 'Assyrian', 'Beginner');
INSERT INTO `list_languages` VALUES(214, 'Galecian', 'Beginner');
INSERT INTO `list_languages` VALUES(215, 'Malinke', 'Beginner');
INSERT INTO `list_languages` VALUES(216, 'Mbum', 'Beginner');
INSERT INTO `list_languages` VALUES(217, 'Bhojpuri', 'Beginner');
INSERT INTO `list_languages` VALUES(218, 'Karen', 'Beginner');
INSERT INTO `list_languages` VALUES(219, 'Chin', 'Beginner');
INSERT INTO `list_languages` VALUES(220, 'Chuabo', 'Beginner');
INSERT INTO `list_languages` VALUES(221, 'Banja', 'Beginner');
INSERT INTO `list_languages` VALUES(222, 'Balante', 'Beginner');
INSERT INTO `list_languages` VALUES(223, 'Gaeli', 'Beginner');
INSERT INTO `list_languages` VALUES(224, 'Uighur', 'Beginner');
INSERT INTO `list_languages` VALUES(225, 'Slovene', 'Beginner');
INSERT INTO `list_languages` VALUES(226, 'Romanian', 'Beginner');
INSERT INTO `list_languages` VALUES(227, 'Czech', 'Beginner');
INSERT INTO `list_languages` VALUES(228, 'Spanish', 'Beginner');
INSERT INTO `list_languages` VALUES(229, 'Ronga', 'Beginner');
INSERT INTO `list_languages` VALUES(230, 'Slovak', 'Beginner');
INSERT INTO `list_languages` VALUES(231, 'Kongo', 'Beginner');
INSERT INTO `list_languages` VALUES(232, 'Meru', 'Beginner');
INSERT INTO `list_languages` VALUES(233, 'Greenlandic', 'Beginner');
INSERT INTO `list_languages` VALUES(234, 'Zenaga', 'Beginner');
INSERT INTO `list_languages` VALUES(235, 'TÅ¡am', 'Beginner');
INSERT INTO `list_languages` VALUES(236, 'Persian', 'Beginner');
INSERT INTO `list_languages` VALUES(237, 'Swedish', 'Beginner');
INSERT INTO `list_languages` VALUES(238, 'Sango', 'Beginner');
INSERT INTO `list_languages` VALUES(239, 'Mandara', 'Beginner');
INSERT INTO `list_languages` VALUES(240, 'Icelandic', 'Beginner');
INSERT INTO `list_languages` VALUES(242, 'Masai', 'Beginner');
INSERT INTO `list_languages` VALUES(243, 'Luo', 'Beginner');
INSERT INTO `list_languages` VALUES(244, 'Kikuyu', 'Beginner');
INSERT INTO `list_languages` VALUES(245, 'Adja', 'Beginner');
INSERT INTO `list_languages` VALUES(246, 'Aizo', 'Beginner');
INSERT INTO `list_languages` VALUES(247, 'Bariba', 'Beginner');
INSERT INTO `list_languages` VALUES(248, 'Fon', 'Beginner');
INSERT INTO `list_languages` VALUES(249, 'Dyula', 'Beginner');
INSERT INTO `list_languages` VALUES(250, 'Kirgiz', 'Beginner');
INSERT INTO `list_languages` VALUES(251, 'Romansh', 'Beginner');
INSERT INTO `list_languages` VALUES(252, 'Shona', 'Beginner');
INSERT INTO `list_languages` VALUES(253, 'Grebo', 'Beginner');
INSERT INTO `list_languages` VALUES(254, 'Boa', 'Beginner');
INSERT INTO `list_languages` VALUES(255, 'Tukulor', 'Beginner');
INSERT INTO `list_languages` VALUES(256, 'Khmer', 'Beginner');
INSERT INTO `list_languages` VALUES(257, 'Kamba', 'Beginner');
INSERT INTO `list_languages` VALUES(258, 'Cakchiquel', 'Beginner');
INSERT INTO `list_languages` VALUES(259, 'Abhyasi', 'Beginner');
INSERT INTO `list_languages` VALUES(260, 'Mbete', 'Beginner');
INSERT INTO `list_languages` VALUES(261, 'Zande', 'Beginner');
INSERT INTO `list_languages` VALUES(262, 'Luba', 'Beginner');
INSERT INTO `list_languages` VALUES(263, 'Albaniana', 'Beginner');
INSERT INTO `list_languages` VALUES(264, 'Rwanda', 'Beginner');
INSERT INTO `list_languages` VALUES(265, 'Creole French', 'Beginner');
INSERT INTO `list_languages` VALUES(266, 'Dusun', 'Beginner');
INSERT INTO `list_languages` VALUES(267, 'Tswa', 'Beginner');
INSERT INTO `list_languages` VALUES(268, 'Carolinian', 'Beginner');
INSERT INTO `list_languages` VALUES(269, 'Bilin', 'Beginner');
INSERT INTO `list_languages` VALUES(270, 'Ngoni', 'Beginner');
INSERT INTO `list_languages` VALUES(271, 'Nyanja', 'Beginner');
INSERT INTO `list_languages` VALUES(272, 'Kachin', 'Beginner');
INSERT INTO `list_languages` VALUES(273, 'Mixtec', 'Beginner');
INSERT INTO `list_languages` VALUES(274, 'Bali', 'Beginner');
INSERT INTO `list_languages` VALUES(275, 'Comorian-Swahili', 'Beginner');
INSERT INTO `list_languages` VALUES(276, 'Sara', 'Beginner');
INSERT INTO `list_languages` VALUES(277, 'Tamil', 'Beginner');
INSERT INTO `list_languages` VALUES(278, 'Gujarati', 'Beginner');
INSERT INTO `list_languages` VALUES(279, 'Bugi', 'Beginner');
INSERT INTO `list_languages` VALUES(280, 'Faroese', 'Beginner');
INSERT INTO `list_languages` VALUES(281, 'Chakma', 'Beginner');
INSERT INTO `list_languages` VALUES(282, 'AimarÃ¡', 'Beginner');
INSERT INTO `list_languages` VALUES(283, 'Italian', 'Beginner');
INSERT INTO `list_languages` VALUES(284, 'Armenian', 'Beginner');
INSERT INTO `list_languages` VALUES(285, 'Azerbaijani', 'Beginner');
INSERT INTO `list_languages` VALUES(286, 'Samoan', 'Beginner');
INSERT INTO `list_languages` VALUES(287, 'Maori', 'Beginner');
INSERT INTO `list_languages` VALUES(288, 'Tripuri', 'Beginner');
INSERT INTO `list_languages` VALUES(289, 'Ainu', 'Beginner');
INSERT INTO `list_languages` VALUES(290, 'Marathi', 'Beginner');
INSERT INTO `list_languages` VALUES(291, 'Estonian', 'Beginner');
INSERT INTO `list_languages` VALUES(292, 'Norwegian', 'Beginner');
INSERT INTO `list_languages` VALUES(293, 'Nyaneka-nkhumbi', 'Beginner');
INSERT INTO `list_languages` VALUES(294, 'Swahili', 'Beginner');
INSERT INTO `list_languages` VALUES(295, 'Caprivi', 'Beginner');
INSERT INTO `list_languages` VALUES(296, 'Afrikaans', 'Beginner');
INSERT INTO `list_languages` VALUES(297, 'Walaita', 'Beginner');
INSERT INTO `list_languages` VALUES(298, 'Mboshi', 'Beginner');
INSERT INTO `list_languages` VALUES(299, 'Zulu', 'Beginner');
INSERT INTO `list_languages` VALUES(300, 'Mon-khmer', 'Beginner');
INSERT INTO `list_languages` VALUES(301, 'Tuvalu', 'Beginner');
INSERT INTO `list_languages` VALUES(302, 'Kiribati', 'Beginner');
INSERT INTO `list_languages` VALUES(303, 'Fukien', 'Beginner');
INSERT INTO `list_languages` VALUES(304, 'Mandyako', 'Beginner');
INSERT INTO `list_languages` VALUES(305, 'Comorian-madagassi', 'Beginner');
INSERT INTO `list_languages` VALUES(306, 'Ngbaka', 'Beginner');
INSERT INTO `list_languages` VALUES(307, 'Monegasque', 'Beginner');
INSERT INTO `list_languages` VALUES(308, 'Lithuanian', 'Beginner');
INSERT INTO `list_languages` VALUES(309, 'Bakhtyari', 'Beginner');
INSERT INTO `list_languages` VALUES(310, 'Madura', 'Beginner');
INSERT INTO `list_languages` VALUES(311, 'Hakka', 'Beginner');
INSERT INTO `list_languages` VALUES(312, 'Silesiana', 'Beginner');
INSERT INTO `list_languages` VALUES(313, 'Nepali', 'Beginner');
INSERT INTO `list_languages` VALUES(314, 'Mossi', 'Beginner');
INSERT INTO `list_languages` VALUES(315, 'Bengali', 'Beginner');
INSERT INTO `list_languages` VALUES(316, 'Ovimbundu', 'Beginner');
INSERT INTO `list_languages` VALUES(317, 'Berberi', 'Beginner');
INSERT INTO `list_languages` VALUES(318, 'Dagara', 'Beginner');
INSERT INTO `list_languages` VALUES(319, 'Dhivehi', 'Beginner');
INSERT INTO `list_languages` VALUES(320, 'Greek', 'Beginner');
INSERT INTO `list_languages` VALUES(321, 'Chinese', 'Beginner');
INSERT INTO `list_languages` VALUES(322, 'KetÅ¡ua', 'Beginner');
INSERT INTO `list_languages` VALUES(323, 'Arabic', 'Beginner');
INSERT INTO `list_languages` VALUES(324, 'Luimbe-nganguela', 'Beginner');
INSERT INTO `list_languages` VALUES(325, 'Tsonga', 'Beginner');
INSERT INTO `list_languages` VALUES(326, 'Crioulo', 'Beginner');
INSERT INTO `list_languages` VALUES(327, 'Kavango', 'Beginner');
INSERT INTO `list_languages` VALUES(328, 'Nama', 'Beginner');
INSERT INTO `list_languages` VALUES(329, 'Ovambo', 'Beginner');
INSERT INTO `list_languages` VALUES(330, 'Malenasian Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(331, 'Polynesian Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(332, 'Hausa', 'Beginner');
INSERT INTO `list_languages` VALUES(333, 'Kanuri', 'Beginner');
INSERT INTO `list_languages` VALUES(334, 'Songhai-zerma', 'Beginner');
INSERT INTO `list_languages` VALUES(335, 'Bura', 'Beginner');
INSERT INTO `list_languages` VALUES(336, 'Edo', 'Beginner');
INSERT INTO `list_languages` VALUES(337, 'Ibibio', 'Beginner');
INSERT INTO `list_languages` VALUES(338, 'Ibo', 'Beginner');
INSERT INTO `list_languages` VALUES(339, 'Ijo', 'Beginner');
INSERT INTO `list_languages` VALUES(340, 'Tiv', 'Beginner');
INSERT INTO `list_languages` VALUES(341, 'Sumo', 'Beginner');
INSERT INTO `list_languages` VALUES(342, 'Niue', 'Beginner');
INSERT INTO `list_languages` VALUES(343, 'Fries', 'Beginner');
INSERT INTO `list_languages` VALUES(344, 'Maithili', 'Beginner');
INSERT INTO `list_languages` VALUES(345, 'Newari', 'Beginner');
INSERT INTO `list_languages` VALUES(346, 'Tamang', 'Beginner');
INSERT INTO `list_languages` VALUES(347, 'Tharu', 'Beginner');
INSERT INTO `list_languages` VALUES(348, 'Nauru', 'Beginner');
INSERT INTO `list_languages` VALUES(349, 'Brahui', 'Beginner');
INSERT INTO `list_languages` VALUES(350, 'Hindko', 'Beginner');
INSERT INTO `list_languages` VALUES(351, 'Saraiki', 'Beginner');
INSERT INTO `list_languages` VALUES(352, 'Sindhi', 'Beginner');
INSERT INTO `list_languages` VALUES(353, 'Cuna', 'Beginner');
INSERT INTO `list_languages` VALUES(354, 'Embera', 'Beginner');
INSERT INTO `list_languages` VALUES(355, 'GuaymÃ­', 'Beginner');
INSERT INTO `list_languages` VALUES(356, 'Pitcairnese', 'Beginner');
INSERT INTO `list_languages` VALUES(357, 'Bicol', 'Beginner');
INSERT INTO `list_languages` VALUES(358, 'Cebuano', 'Beginner');
INSERT INTO `list_languages` VALUES(359, 'Hiligaynon', 'Beginner');
INSERT INTO `list_languages` VALUES(360, 'Ilocano', 'Beginner');
INSERT INTO `list_languages` VALUES(361, 'Maguindanao', 'Beginner');
INSERT INTO `list_languages` VALUES(362, 'Maranao', 'Beginner');
INSERT INTO `list_languages` VALUES(363, 'Pampango', 'Beginner');
INSERT INTO `list_languages` VALUES(364, 'Pangasinan', 'Beginner');
INSERT INTO `list_languages` VALUES(365, 'Pilipino', 'Beginner');
INSERT INTO `list_languages` VALUES(366, 'Waray-waray', 'Beginner');
INSERT INTO `list_languages` VALUES(367, 'Palau', 'Beginner');
INSERT INTO `list_languages` VALUES(368, 'Papuan Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(369, 'Tahitian', 'Beginner');
INSERT INTO `list_languages` VALUES(370, 'Avarian', 'Beginner');
INSERT INTO `list_languages` VALUES(371, 'Bashkir', 'Beginner');
INSERT INTO `list_languages` VALUES(372, 'Chechen', 'Beginner');
INSERT INTO `list_languages` VALUES(373, 'Chuvash', 'Beginner');
INSERT INTO `list_languages` VALUES(374, 'Mari', 'Beginner');
INSERT INTO `list_languages` VALUES(375, 'Mordva', 'Beginner');
INSERT INTO `list_languages` VALUES(376, 'Udmur', 'Beginner');
INSERT INTO `list_languages` VALUES(377, 'Bari', 'Beginner');
INSERT INTO `list_languages` VALUES(378, 'Beja', 'Beginner');
INSERT INTO `list_languages` VALUES(379, 'Chilluk', 'Beginner');
INSERT INTO `list_languages` VALUES(380, 'Dinka', 'Beginner');
INSERT INTO `list_languages` VALUES(381, 'Fur', 'Beginner');
INSERT INTO `list_languages` VALUES(382, 'Lotuko', 'Beginner');
INSERT INTO `list_languages` VALUES(383, 'Nubian Languages', 'Beginner');
INSERT INTO `list_languages` VALUES(384, 'Nuer', 'Beginner');
INSERT INTO `list_languages` VALUES(385, 'Serer', 'Beginner');
INSERT INTO `list_languages` VALUES(386, 'Bullom-sherbro', 'Beginner');
INSERT INTO `list_languages` VALUES(387, 'Kono-vai', 'Beginner');
INSERT INTO `list_languages` VALUES(388, 'Kuranko', 'Beginner');
INSERT INTO `list_languages` VALUES(389, 'Limba', 'Beginner');
INSERT INTO `list_languages` VALUES(390, 'Mende', 'Beginner');
INSERT INTO `list_languages` VALUES(391, 'Temne', 'Beginner');
INSERT INTO `list_languages` VALUES(392, 'Nahua', 'Beginner');
INSERT INTO `list_languages` VALUES(393, 'Sranantonga', 'Beginner');
INSERT INTO `list_languages` VALUES(394, 'Czech and Moravian', 'Beginner');
INSERT INTO `list_languages` VALUES(395, 'Ukrainian and Russian', 'Beginner');
INSERT INTO `list_languages` VALUES(396, 'Swazi', 'Beginner');
INSERT INTO `list_languages` VALUES(397, 'Seselwa', 'Beginner');
INSERT INTO `list_languages` VALUES(398, 'Gorane', 'Beginner');
INSERT INTO `list_languages` VALUES(399, 'Hadjarai', 'Beginner');
INSERT INTO `list_languages` VALUES(400, 'Kanem-bornu', 'Beginner');
INSERT INTO `list_languages` VALUES(401, 'Mayo-kebbi', 'Beginner');
INSERT INTO `list_languages` VALUES(402, 'Ouaddai', 'Beginner');
INSERT INTO `list_languages` VALUES(403, 'Tandjile', 'Beginner');
INSERT INTO `list_languages` VALUES(404, 'Ane', 'Beginner');
INSERT INTO `list_languages` VALUES(405, 'KabyÃ©', 'Beginner');
INSERT INTO `list_languages` VALUES(406, 'Kotokoli', 'Beginner');
INSERT INTO `list_languages` VALUES(407, 'Moba', 'Beginner');
INSERT INTO `list_languages` VALUES(408, 'Naudemba', 'Beginner');
INSERT INTO `list_languages` VALUES(409, 'Watyi', 'Beginner');
INSERT INTO `list_languages` VALUES(410, 'Kuy', 'Beginner');
INSERT INTO `list_languages` VALUES(411, 'Tokelau', 'Beginner');
INSERT INTO `list_languages` VALUES(412, 'Arabic-French', 'Beginner');
INSERT INTO `list_languages` VALUES(414, 'Ami', 'Beginner');
INSERT INTO `list_languages` VALUES(415, 'Atayal', 'Beginner');
INSERT INTO `list_languages` VALUES(416, 'Min', 'Beginner');
INSERT INTO `list_languages` VALUES(417, 'Paiwan', 'Beginner');
INSERT INTO `list_languages` VALUES(418, 'Chaga and Pare', 'Beginner');
INSERT INTO `list_languages` VALUES(419, 'Gogo', 'Beginner');
INSERT INTO `list_languages` VALUES(420, 'Ha', 'Beginner');
INSERT INTO `list_languages` VALUES(421, 'Haya', 'Beginner');
INSERT INTO `list_languages` VALUES(422, 'Hehet', 'Beginner');
INSERT INTO `list_languages` VALUES(423, 'Luguru', 'Beginner');
INSERT INTO `list_languages` VALUES(424, 'Makonde', 'Beginner');
INSERT INTO `list_languages` VALUES(425, 'Nyakusa', 'Beginner');
INSERT INTO `list_languages` VALUES(426, 'Nyamwesi', 'Beginner');
INSERT INTO `list_languages` VALUES(427, 'Shambala', 'Beginner');
INSERT INTO `list_languages` VALUES(428, 'Acholi', 'Beginner');
INSERT INTO `list_languages` VALUES(429, 'Ganda', 'Beginner');
INSERT INTO `list_languages` VALUES(430, 'Gisu', 'Beginner');
INSERT INTO `list_languages` VALUES(431, 'Kiga', 'Beginner');
INSERT INTO `list_languages` VALUES(432, 'Lango', 'Beginner');
INSERT INTO `list_languages` VALUES(433, 'Lugbara', 'Beginner');
INSERT INTO `list_languages` VALUES(434, 'Nkole', 'Beginner');
INSERT INTO `list_languages` VALUES(435, 'Soga', 'Beginner');
INSERT INTO `list_languages` VALUES(436, 'Teso', 'Beginner');
INSERT INTO `list_languages` VALUES(437, 'Tagalog', 'Beginner');
INSERT INTO `list_languages` VALUES(438, 'Karakalpak', 'Beginner');
INSERT INTO `list_languages` VALUES(439, 'Goajiro', 'Beginner');
INSERT INTO `list_languages` VALUES(440, 'Warrau', 'Beginner');
INSERT INTO `list_languages` VALUES(441, 'Man', 'Beginner');
INSERT INTO `list_languages` VALUES(442, 'Muong', 'Beginner');
INSERT INTO `list_languages` VALUES(443, 'Nung', 'Beginner');
INSERT INTO `list_languages` VALUES(444, 'Tho', 'Beginner');
INSERT INTO `list_languages` VALUES(445, 'Bislama', 'Beginner');
INSERT INTO `list_languages` VALUES(446, 'Futuna', 'Beginner');
INSERT INTO `list_languages` VALUES(447, 'Wallis', 'Beginner');
INSERT INTO `list_languages` VALUES(449, 'Soqutri', 'Beginner');
INSERT INTO `list_languages` VALUES(450, 'Northsotho', 'Beginner');
INSERT INTO `list_languages` VALUES(451, 'Southsotho', 'Beginner');
INSERT INTO `list_languages` VALUES(452, 'Venda', 'Beginner');
INSERT INTO `list_languages` VALUES(453, 'Xhosa', 'Beginner');
INSERT INTO `list_languages` VALUES(454, 'Bemba', 'Beginner');
INSERT INTO `list_languages` VALUES(455, 'Chewa', 'Beginner');
INSERT INTO `list_languages` VALUES(456, 'Lozi', 'Beginner');
INSERT INTO `list_languages` VALUES(457, 'Nsenga', 'Beginner');
INSERT INTO `list_languages` VALUES(458, 'Dutch', 'Intermediate');
INSERT INTO `list_languages` VALUES(459, 'English', 'Intermediate');
INSERT INTO `list_languages` VALUES(460, 'Papiamento', 'Intermediate');
INSERT INTO `list_languages` VALUES(461, 'Spanish', 'Intermediate');
INSERT INTO `list_languages` VALUES(462, 'Balochi', 'Intermediate');
INSERT INTO `list_languages` VALUES(463, 'Dari', 'Intermediate');
INSERT INTO `list_languages` VALUES(464, 'Pashto', 'Intermediate');
INSERT INTO `list_languages` VALUES(465, 'Turkmenian', 'Intermediate');
INSERT INTO `list_languages` VALUES(466, 'Uzbek', 'Intermediate');
INSERT INTO `list_languages` VALUES(467, 'Ambo', 'Intermediate');
INSERT INTO `list_languages` VALUES(468, 'Chokwe', 'Intermediate');
INSERT INTO `list_languages` VALUES(469, 'Kongo', 'Intermediate');
INSERT INTO `list_languages` VALUES(470, 'Luchazi', 'Intermediate');
INSERT INTO `list_languages` VALUES(471, 'Luimbe-nganguela', 'Intermediate');
INSERT INTO `list_languages` VALUES(472, 'Luvale', 'Intermediate');
INSERT INTO `list_languages` VALUES(473, 'Mbundu', 'Intermediate');
INSERT INTO `list_languages` VALUES(474, 'Nyaneka-nkhumbi', 'Intermediate');
INSERT INTO `list_languages` VALUES(475, 'Ovimbundu', 'Intermediate');
INSERT INTO `list_languages` VALUES(476, 'Albaniana', 'Intermediate');
INSERT INTO `list_languages` VALUES(477, 'Greek', 'Intermediate');
INSERT INTO `list_languages` VALUES(478, 'Macedonian', 'Intermediate');
INSERT INTO `list_languages` VALUES(479, 'Catalan', 'Intermediate');
INSERT INTO `list_languages` VALUES(480, 'French', 'Intermediate');
INSERT INTO `list_languages` VALUES(481, 'Portuguese', 'Intermediate');
INSERT INTO `list_languages` VALUES(482, 'Arabic', 'Intermediate');
INSERT INTO `list_languages` VALUES(483, 'Hindi', 'Intermediate');
INSERT INTO `list_languages` VALUES(484, 'Indian Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(485, 'Italian', 'Intermediate');
INSERT INTO `list_languages` VALUES(486, 'Armenian', 'Intermediate');
INSERT INTO `list_languages` VALUES(487, 'Azerbaijani', 'Intermediate');
INSERT INTO `list_languages` VALUES(488, 'Samoan', 'Intermediate');
INSERT INTO `list_languages` VALUES(489, 'Tongan', 'Intermediate');
INSERT INTO `list_languages` VALUES(491, 'Canton Chinese', 'Intermediate');
INSERT INTO `list_languages` VALUES(492, 'German', 'Intermediate');
INSERT INTO `list_languages` VALUES(493, 'Serbo-Croatian', 'Intermediate');
INSERT INTO `list_languages` VALUES(494, 'Vietnamese', 'Intermediate');
INSERT INTO `list_languages` VALUES(495, 'Czech', 'Intermediate');
INSERT INTO `list_languages` VALUES(496, 'Hungarian', 'Intermediate');
INSERT INTO `list_languages` VALUES(497, 'Polish', 'Intermediate');
INSERT INTO `list_languages` VALUES(498, 'Romanian', 'Intermediate');
INSERT INTO `list_languages` VALUES(499, 'Slovene', 'Intermediate');
INSERT INTO `list_languages` VALUES(500, 'Turkish', 'Intermediate');
INSERT INTO `list_languages` VALUES(501, 'Lezgian', 'Intermediate');
INSERT INTO `list_languages` VALUES(502, 'Russian', 'Intermediate');
INSERT INTO `list_languages` VALUES(503, 'Kirundi', 'Intermediate');
INSERT INTO `list_languages` VALUES(504, 'Swahili', 'Intermediate');
INSERT INTO `list_languages` VALUES(505, 'Adja', 'Intermediate');
INSERT INTO `list_languages` VALUES(506, 'Aizo', 'Intermediate');
INSERT INTO `list_languages` VALUES(507, 'Bariba', 'Intermediate');
INSERT INTO `list_languages` VALUES(508, 'Fon', 'Intermediate');
INSERT INTO `list_languages` VALUES(509, 'Ful', 'Intermediate');
INSERT INTO `list_languages` VALUES(510, 'Joruba', 'Intermediate');
INSERT INTO `list_languages` VALUES(511, 'Somba', 'Intermediate');
INSERT INTO `list_languages` VALUES(512, 'Busansi', 'Intermediate');
INSERT INTO `list_languages` VALUES(513, 'Dagara', 'Intermediate');
INSERT INTO `list_languages` VALUES(514, 'Dyula', 'Intermediate');
INSERT INTO `list_languages` VALUES(515, 'Gurma', 'Intermediate');
INSERT INTO `list_languages` VALUES(516, 'Mossi', 'Intermediate');
INSERT INTO `list_languages` VALUES(517, 'Bengali', 'Intermediate');
INSERT INTO `list_languages` VALUES(518, 'Chakma', 'Intermediate');
INSERT INTO `list_languages` VALUES(519, 'Garo', 'Intermediate');
INSERT INTO `list_languages` VALUES(520, 'Khasi', 'Intermediate');
INSERT INTO `list_languages` VALUES(521, 'Marma', 'Intermediate');
INSERT INTO `list_languages` VALUES(522, 'Santhali', 'Intermediate');
INSERT INTO `list_languages` VALUES(523, 'Tripuri', 'Intermediate');
INSERT INTO `list_languages` VALUES(524, 'Bulgariana', 'Intermediate');
INSERT INTO `list_languages` VALUES(525, 'Romani', 'Intermediate');
INSERT INTO `list_languages` VALUES(526, 'Creole French', 'Intermediate');
INSERT INTO `list_languages` VALUES(527, 'Belorussian', 'Intermediate');
INSERT INTO `list_languages` VALUES(528, 'Ukrainian', 'Intermediate');
INSERT INTO `list_languages` VALUES(529, 'Garifuna', 'Intermediate');
INSERT INTO `list_languages` VALUES(530, 'Maya Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(531, 'AimarÃ¡', 'Intermediate');
INSERT INTO `list_languages` VALUES(532, 'GuaranÃ­', 'Intermediate');
INSERT INTO `list_languages` VALUES(533, 'KetÅ¡ua', 'Intermediate');
INSERT INTO `list_languages` VALUES(534, 'Japanese', 'Intermediate');
INSERT INTO `list_languages` VALUES(535, 'Bajan', 'Intermediate');
INSERT INTO `list_languages` VALUES(536, 'Chinese', 'Intermediate');
INSERT INTO `list_languages` VALUES(537, 'Malay', 'Intermediate');
INSERT INTO `list_languages` VALUES(539, 'Asami', 'Intermediate');
INSERT INTO `list_languages` VALUES(540, 'Dzongkha', 'Intermediate');
INSERT INTO `list_languages` VALUES(541, 'Nepali', 'Intermediate');
INSERT INTO `list_languages` VALUES(542, 'Khoekhoe', 'Intermediate');
INSERT INTO `list_languages` VALUES(543, 'Ndebele', 'Intermediate');
INSERT INTO `list_languages` VALUES(544, 'San', 'Intermediate');
INSERT INTO `list_languages` VALUES(545, 'Shona', 'Intermediate');
INSERT INTO `list_languages` VALUES(546, 'Tswana', 'Intermediate');
INSERT INTO `list_languages` VALUES(547, 'Banda', 'Intermediate');
INSERT INTO `list_languages` VALUES(548, 'Gbaya', 'Intermediate');
INSERT INTO `list_languages` VALUES(549, 'Mandjia', 'Intermediate');
INSERT INTO `list_languages` VALUES(550, 'Mbum', 'Intermediate');
INSERT INTO `list_languages` VALUES(551, 'Ngbaka', 'Intermediate');
INSERT INTO `list_languages` VALUES(552, 'Sara', 'Intermediate');
INSERT INTO `list_languages` VALUES(553, 'Eskimo Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(554, 'Punjabi', 'Intermediate');
INSERT INTO `list_languages` VALUES(555, 'Romansh', 'Intermediate');
INSERT INTO `list_languages` VALUES(556, 'Araucan', 'Intermediate');
INSERT INTO `list_languages` VALUES(557, 'Rapa nui', 'Intermediate');
INSERT INTO `list_languages` VALUES(558, 'Dong', 'Intermediate');
INSERT INTO `list_languages` VALUES(559, 'Hui', 'Intermediate');
INSERT INTO `list_languages` VALUES(560, 'MantÅ¡u', 'Intermediate');
INSERT INTO `list_languages` VALUES(561, 'Miao', 'Intermediate');
INSERT INTO `list_languages` VALUES(562, 'Mongolian', 'Intermediate');
INSERT INTO `list_languages` VALUES(563, 'Puyi', 'Intermediate');
INSERT INTO `list_languages` VALUES(564, 'Tibetan', 'Intermediate');
INSERT INTO `list_languages` VALUES(565, 'Tujia', 'Intermediate');
INSERT INTO `list_languages` VALUES(566, 'Uighur', 'Intermediate');
INSERT INTO `list_languages` VALUES(567, 'Yi', 'Intermediate');
INSERT INTO `list_languages` VALUES(568, 'Zhuang', 'Intermediate');
INSERT INTO `list_languages` VALUES(569, 'Akan', 'Intermediate');
INSERT INTO `list_languages` VALUES(570, 'Gur', 'Intermediate');
INSERT INTO `list_languages` VALUES(571, 'Kru', 'Intermediate');
INSERT INTO `list_languages` VALUES(572, 'Malinke', 'Intermediate');
INSERT INTO `list_languages` VALUES(573, '[South]Mande', 'Intermediate');
INSERT INTO `list_languages` VALUES(574, 'Bamileke-bamum', 'Intermediate');
INSERT INTO `list_languages` VALUES(575, 'Duala', 'Intermediate');
INSERT INTO `list_languages` VALUES(576, 'Fang', 'Intermediate');
INSERT INTO `list_languages` VALUES(577, 'Maka', 'Intermediate');
INSERT INTO `list_languages` VALUES(578, 'Mandara', 'Intermediate');
INSERT INTO `list_languages` VALUES(579, 'Masana', 'Intermediate');
INSERT INTO `list_languages` VALUES(580, 'Tikar', 'Intermediate');
INSERT INTO `list_languages` VALUES(581, 'Boa', 'Intermediate');
INSERT INTO `list_languages` VALUES(582, 'Luba', 'Intermediate');
INSERT INTO `list_languages` VALUES(583, 'Mongo', 'Intermediate');
INSERT INTO `list_languages` VALUES(584, 'Ngala and Bangi', 'Intermediate');
INSERT INTO `list_languages` VALUES(585, 'Rundi', 'Intermediate');
INSERT INTO `list_languages` VALUES(586, 'Rwanda', 'Intermediate');
INSERT INTO `list_languages` VALUES(587, 'Teke', 'Intermediate');
INSERT INTO `list_languages` VALUES(588, 'Zande', 'Intermediate');
INSERT INTO `list_languages` VALUES(589, 'Mbete', 'Intermediate');
INSERT INTO `list_languages` VALUES(590, 'Mboshi', 'Intermediate');
INSERT INTO `list_languages` VALUES(591, 'Punu', 'Intermediate');
INSERT INTO `list_languages` VALUES(592, 'Sango', 'Intermediate');
INSERT INTO `list_languages` VALUES(593, 'Maori', 'Intermediate');
INSERT INTO `list_languages` VALUES(594, 'Arawakan', 'Intermediate');
INSERT INTO `list_languages` VALUES(595, 'Caribbean', 'Intermediate');
INSERT INTO `list_languages` VALUES(596, 'Chibcha', 'Intermediate');
INSERT INTO `list_languages` VALUES(597, 'Comorian', 'Intermediate');
INSERT INTO `list_languages` VALUES(598, 'Comorian-Arabic', 'Intermediate');
INSERT INTO `list_languages` VALUES(599, 'Comorian-French', 'Intermediate');
INSERT INTO `list_languages` VALUES(600, 'Comorian-madagassi', 'Intermediate');
INSERT INTO `list_languages` VALUES(601, 'Comorian-Swahili', 'Intermediate');
INSERT INTO `list_languages` VALUES(602, 'Crioulo', 'Intermediate');
INSERT INTO `list_languages` VALUES(603, 'Moravian', 'Intermediate');
INSERT INTO `list_languages` VALUES(604, 'Silesiana', 'Intermediate');
INSERT INTO `list_languages` VALUES(605, 'Slovak', 'Intermediate');
INSERT INTO `list_languages` VALUES(606, 'Southern Slavic Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(607, 'Afar', 'Intermediate');
INSERT INTO `list_languages` VALUES(608, 'Somali', 'Intermediate');
INSERT INTO `list_languages` VALUES(609, 'Danish', 'Intermediate');
INSERT INTO `list_languages` VALUES(610, 'Norwegian', 'Intermediate');
INSERT INTO `list_languages` VALUES(611, 'Swedish', 'Intermediate');
INSERT INTO `list_languages` VALUES(612, 'Berberi', 'Intermediate');
INSERT INTO `list_languages` VALUES(613, 'Sinaberberi', 'Intermediate');
INSERT INTO `list_languages` VALUES(614, 'Bilin', 'Intermediate');
INSERT INTO `list_languages` VALUES(615, 'Hadareb', 'Intermediate');
INSERT INTO `list_languages` VALUES(616, 'Saho', 'Intermediate');
INSERT INTO `list_languages` VALUES(617, 'Tigre', 'Intermediate');
INSERT INTO `list_languages` VALUES(618, 'Tigrinja', 'Intermediate');
INSERT INTO `list_languages` VALUES(619, 'Basque', 'Intermediate');
INSERT INTO `list_languages` VALUES(620, 'Galecian', 'Intermediate');
INSERT INTO `list_languages` VALUES(621, 'Estonian', 'Intermediate');
INSERT INTO `list_languages` VALUES(622, 'Finnish', 'Intermediate');
INSERT INTO `list_languages` VALUES(623, 'Amhara', 'Intermediate');
INSERT INTO `list_languages` VALUES(624, 'Gurage', 'Intermediate');
INSERT INTO `list_languages` VALUES(625, 'Oromo', 'Intermediate');
INSERT INTO `list_languages` VALUES(626, 'Sidamo', 'Intermediate');
INSERT INTO `list_languages` VALUES(627, 'Walaita', 'Intermediate');
INSERT INTO `list_languages` VALUES(628, 'Saame', 'Intermediate');
INSERT INTO `list_languages` VALUES(629, 'Fijian', 'Intermediate');
INSERT INTO `list_languages` VALUES(630, 'Faroese', 'Intermediate');
INSERT INTO `list_languages` VALUES(631, 'Kosrean', 'Intermediate');
INSERT INTO `list_languages` VALUES(632, 'Mortlock', 'Intermediate');
INSERT INTO `list_languages` VALUES(633, 'Pohnpei', 'Intermediate');
INSERT INTO `list_languages` VALUES(634, 'Trukese', 'Intermediate');
INSERT INTO `list_languages` VALUES(635, 'Wolea', 'Intermediate');
INSERT INTO `list_languages` VALUES(636, 'Yap', 'Intermediate');
INSERT INTO `list_languages` VALUES(637, 'Mpongwe', 'Intermediate');
INSERT INTO `list_languages` VALUES(638, 'Punu-sira-nzebi', 'Intermediate');
INSERT INTO `list_languages` VALUES(639, 'Gaeli', 'Intermediate');
INSERT INTO `list_languages` VALUES(640, 'Kymri', 'Intermediate');
INSERT INTO `list_languages` VALUES(641, 'Abhyasi', 'Intermediate');
INSERT INTO `list_languages` VALUES(642, 'Georgiana', 'Intermediate');
INSERT INTO `list_languages` VALUES(643, 'Osseetti', 'Intermediate');
INSERT INTO `list_languages` VALUES(644, 'Ewe', 'Intermediate');
INSERT INTO `list_languages` VALUES(645, 'Ga-adangme', 'Intermediate');
INSERT INTO `list_languages` VALUES(646, 'Kissi', 'Intermediate');
INSERT INTO `list_languages` VALUES(647, 'Kpelle', 'Intermediate');
INSERT INTO `list_languages` VALUES(648, 'Loma', 'Intermediate');
INSERT INTO `list_languages` VALUES(649, 'Susu', 'Intermediate');
INSERT INTO `list_languages` VALUES(650, 'Yalunka', 'Intermediate');
INSERT INTO `list_languages` VALUES(651, 'Diola', 'Intermediate');
INSERT INTO `list_languages` VALUES(652, 'Soninke', 'Intermediate');
INSERT INTO `list_languages` VALUES(653, 'Wolof', 'Intermediate');
INSERT INTO `list_languages` VALUES(654, 'Balante', 'Intermediate');
INSERT INTO `list_languages` VALUES(655, 'Mandyako', 'Intermediate');
INSERT INTO `list_languages` VALUES(656, 'Bubi', 'Intermediate');
INSERT INTO `list_languages` VALUES(657, 'Greenlandic', 'Intermediate');
INSERT INTO `list_languages` VALUES(658, 'Cakchiquel', 'Intermediate');
INSERT INTO `list_languages` VALUES(659, 'KekchÃ­', 'Intermediate');
INSERT INTO `list_languages` VALUES(660, 'Mam', 'Intermediate');
INSERT INTO `list_languages` VALUES(661, 'QuichÃ©', 'Intermediate');
INSERT INTO `list_languages` VALUES(662, 'Chamorro', 'Intermediate');
INSERT INTO `list_languages` VALUES(663, 'Korean', 'Intermediate');
INSERT INTO `list_languages` VALUES(664, 'Philippene Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(665, 'Chiu chau', 'Intermediate');
INSERT INTO `list_languages` VALUES(666, 'Fukien', 'Intermediate');
INSERT INTO `list_languages` VALUES(667, 'Hakka', 'Intermediate');
INSERT INTO `list_languages` VALUES(668, 'Miskito', 'Intermediate');
INSERT INTO `list_languages` VALUES(669, 'Haiti Creole', 'Intermediate');
INSERT INTO `list_languages` VALUES(670, 'Bali', 'Intermediate');
INSERT INTO `list_languages` VALUES(671, 'Banja', 'Intermediate');
INSERT INTO `list_languages` VALUES(672, 'Batakki', 'Intermediate');
INSERT INTO `list_languages` VALUES(673, 'Bugi', 'Intermediate');
INSERT INTO `list_languages` VALUES(674, 'Javanese', 'Intermediate');
INSERT INTO `list_languages` VALUES(675, 'Madura', 'Intermediate');
INSERT INTO `list_languages` VALUES(676, 'Minangkabau', 'Intermediate');
INSERT INTO `list_languages` VALUES(677, 'Sunda', 'Intermediate');
INSERT INTO `list_languages` VALUES(678, 'Gujarati', 'Intermediate');
INSERT INTO `list_languages` VALUES(679, 'Kannada', 'Intermediate');
INSERT INTO `list_languages` VALUES(680, 'Malajalam', 'Intermediate');
INSERT INTO `list_languages` VALUES(681, 'Marathi', 'Intermediate');
INSERT INTO `list_languages` VALUES(682, 'Orija', 'Intermediate');
INSERT INTO `list_languages` VALUES(683, 'Tamil', 'Intermediate');
INSERT INTO `list_languages` VALUES(684, 'Telugu', 'Intermediate');
INSERT INTO `list_languages` VALUES(685, 'Urdu', 'Intermediate');
INSERT INTO `list_languages` VALUES(686, 'Irish', 'Intermediate');
INSERT INTO `list_languages` VALUES(687, 'Bakhtyari', 'Intermediate');
INSERT INTO `list_languages` VALUES(688, 'Gilaki', 'Intermediate');
INSERT INTO `list_languages` VALUES(689, 'Kurdish', 'Intermediate');
INSERT INTO `list_languages` VALUES(690, 'Luri', 'Intermediate');
INSERT INTO `list_languages` VALUES(691, 'Mazandarani', 'Intermediate');
INSERT INTO `list_languages` VALUES(692, 'Persian', 'Intermediate');
INSERT INTO `list_languages` VALUES(693, 'Assyrian', 'Intermediate');
INSERT INTO `list_languages` VALUES(694, 'Icelandic', 'Intermediate');
INSERT INTO `list_languages` VALUES(695, 'Hebrew', 'Intermediate');
INSERT INTO `list_languages` VALUES(696, 'Friuli', 'Intermediate');
INSERT INTO `list_languages` VALUES(697, 'Sardinian', 'Intermediate');
INSERT INTO `list_languages` VALUES(698, 'Circassian', 'Intermediate');
INSERT INTO `list_languages` VALUES(699, 'Ainu', 'Intermediate');
INSERT INTO `list_languages` VALUES(700, 'Kazakh', 'Intermediate');
INSERT INTO `list_languages` VALUES(701, 'Tatar', 'Intermediate');
INSERT INTO `list_languages` VALUES(702, 'Gusii', 'Intermediate');
INSERT INTO `list_languages` VALUES(703, 'Kalenjin', 'Intermediate');
INSERT INTO `list_languages` VALUES(704, 'Kamba', 'Intermediate');
INSERT INTO `list_languages` VALUES(705, 'Kikuyu', 'Intermediate');
INSERT INTO `list_languages` VALUES(706, 'Luhya', 'Intermediate');
INSERT INTO `list_languages` VALUES(707, 'Luo', 'Intermediate');
INSERT INTO `list_languages` VALUES(708, 'Masai', 'Intermediate');
INSERT INTO `list_languages` VALUES(709, 'Meru', 'Intermediate');
INSERT INTO `list_languages` VALUES(710, 'Nyika', 'Intermediate');
INSERT INTO `list_languages` VALUES(711, 'Turkana', 'Intermediate');
INSERT INTO `list_languages` VALUES(712, 'Kirgiz', 'Intermediate');
INSERT INTO `list_languages` VALUES(713, 'Tadzhik', 'Intermediate');
INSERT INTO `list_languages` VALUES(714, 'Khmer', 'Intermediate');
INSERT INTO `list_languages` VALUES(715, 'TÅ¡am', 'Intermediate');
INSERT INTO `list_languages` VALUES(716, 'Kiribati', 'Intermediate');
INSERT INTO `list_languages` VALUES(717, 'Tuvalu', 'Intermediate');
INSERT INTO `list_languages` VALUES(718, 'Lao', 'Intermediate');
INSERT INTO `list_languages` VALUES(719, 'Lao-Soung', 'Intermediate');
INSERT INTO `list_languages` VALUES(720, 'Mon-khmer', 'Intermediate');
INSERT INTO `list_languages` VALUES(721, 'Thai', 'Intermediate');
INSERT INTO `list_languages` VALUES(722, 'Bassa', 'Intermediate');
INSERT INTO `list_languages` VALUES(723, 'Gio', 'Intermediate');
INSERT INTO `list_languages` VALUES(724, 'Grebo', 'Intermediate');
INSERT INTO `list_languages` VALUES(725, 'Mano', 'Intermediate');
INSERT INTO `list_languages` VALUES(726, 'Mixed Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(727, 'Singali', 'Intermediate');
INSERT INTO `list_languages` VALUES(728, 'Sotho', 'Intermediate');
INSERT INTO `list_languages` VALUES(729, 'Zulu', 'Intermediate');
INSERT INTO `list_languages` VALUES(730, 'Lithuanian', 'Intermediate');
INSERT INTO `list_languages` VALUES(731, 'Luxembourgish', 'Intermediate');
INSERT INTO `list_languages` VALUES(732, 'Latvian', 'Intermediate');
INSERT INTO `list_languages` VALUES(733, 'Mandarin Chinese', 'Intermediate');
INSERT INTO `list_languages` VALUES(734, 'Monegasque', 'Intermediate');
INSERT INTO `list_languages` VALUES(735, 'Gagauzi', 'Intermediate');
INSERT INTO `list_languages` VALUES(736, 'Malagasy', 'Intermediate');
INSERT INTO `list_languages` VALUES(737, 'Dhivehi', 'Intermediate');
INSERT INTO `list_languages` VALUES(738, 'Mixtec', 'Intermediate');
INSERT INTO `list_languages` VALUES(739, 'NÃ¡huatl', 'Intermediate');
INSERT INTO `list_languages` VALUES(740, 'OtomÃ­', 'Intermediate');
INSERT INTO `list_languages` VALUES(741, 'Yucatec', 'Intermediate');
INSERT INTO `list_languages` VALUES(742, 'Zapotec', 'Intermediate');
INSERT INTO `list_languages` VALUES(743, 'Marshallese', 'Intermediate');
INSERT INTO `list_languages` VALUES(744, 'Bambara', 'Intermediate');
INSERT INTO `list_languages` VALUES(745, 'Senufo and Minianka', 'Intermediate');
INSERT INTO `list_languages` VALUES(746, 'Songhai', 'Intermediate');
INSERT INTO `list_languages` VALUES(747, 'Tamashek', 'Intermediate');
INSERT INTO `list_languages` VALUES(748, 'Maltese', 'Intermediate');
INSERT INTO `list_languages` VALUES(749, 'Burmese', 'Intermediate');
INSERT INTO `list_languages` VALUES(750, 'Chin', 'Intermediate');
INSERT INTO `list_languages` VALUES(751, 'Kachin', 'Intermediate');
INSERT INTO `list_languages` VALUES(752, 'Karen', 'Intermediate');
INSERT INTO `list_languages` VALUES(753, 'Kayah', 'Intermediate');
INSERT INTO `list_languages` VALUES(754, 'Mon', 'Intermediate');
INSERT INTO `list_languages` VALUES(755, 'Rakhine', 'Intermediate');
INSERT INTO `list_languages` VALUES(756, 'Shan', 'Intermediate');
INSERT INTO `list_languages` VALUES(757, 'Bajad', 'Intermediate');
INSERT INTO `list_languages` VALUES(758, 'Buryat', 'Intermediate');
INSERT INTO `list_languages` VALUES(759, 'Dariganga', 'Intermediate');
INSERT INTO `list_languages` VALUES(760, 'Dorbet', 'Intermediate');
INSERT INTO `list_languages` VALUES(761, 'Carolinian', 'Intermediate');
INSERT INTO `list_languages` VALUES(762, 'Chuabo', 'Intermediate');
INSERT INTO `list_languages` VALUES(763, 'Lomwe', 'Intermediate');
INSERT INTO `list_languages` VALUES(764, 'Makua', 'Intermediate');
INSERT INTO `list_languages` VALUES(765, 'Marendje', 'Intermediate');
INSERT INTO `list_languages` VALUES(766, 'Nyanja', 'Intermediate');
INSERT INTO `list_languages` VALUES(767, 'Ronga', 'Intermediate');
INSERT INTO `list_languages` VALUES(768, 'Sena', 'Intermediate');
INSERT INTO `list_languages` VALUES(769, 'Tsonga', 'Intermediate');
INSERT INTO `list_languages` VALUES(770, 'Tswa', 'Intermediate');
INSERT INTO `list_languages` VALUES(771, 'Hassaniya', 'Intermediate');
INSERT INTO `list_languages` VALUES(772, 'Tukulor', 'Intermediate');
INSERT INTO `list_languages` VALUES(773, 'Zenaga', 'Intermediate');
INSERT INTO `list_languages` VALUES(774, 'Bhojpuri', 'Intermediate');
INSERT INTO `list_languages` VALUES(775, 'Chichewa', 'Intermediate');
INSERT INTO `list_languages` VALUES(776, 'Ngoni', 'Intermediate');
INSERT INTO `list_languages` VALUES(777, 'Yao', 'Intermediate');
INSERT INTO `list_languages` VALUES(778, 'Dusun', 'Intermediate');
INSERT INTO `list_languages` VALUES(779, 'Iban', 'Intermediate');
INSERT INTO `list_languages` VALUES(780, 'MahorÃ©', 'Intermediate');
INSERT INTO `list_languages` VALUES(781, 'Afrikaans', 'Intermediate');
INSERT INTO `list_languages` VALUES(782, 'Caprivi', 'Intermediate');
INSERT INTO `list_languages` VALUES(783, 'Herero', 'Intermediate');
INSERT INTO `list_languages` VALUES(784, 'Kavango', 'Intermediate');
INSERT INTO `list_languages` VALUES(785, 'Nama', 'Intermediate');
INSERT INTO `list_languages` VALUES(786, 'Ovambo', 'Intermediate');
INSERT INTO `list_languages` VALUES(787, 'Malenasian Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(788, 'Polynesian Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(789, 'Hausa', 'Intermediate');
INSERT INTO `list_languages` VALUES(790, 'Kanuri', 'Intermediate');
INSERT INTO `list_languages` VALUES(791, 'Songhai-zerma', 'Intermediate');
INSERT INTO `list_languages` VALUES(792, 'Bura', 'Intermediate');
INSERT INTO `list_languages` VALUES(793, 'Edo', 'Intermediate');
INSERT INTO `list_languages` VALUES(794, 'Ibibio', 'Intermediate');
INSERT INTO `list_languages` VALUES(795, 'Ibo', 'Intermediate');
INSERT INTO `list_languages` VALUES(796, 'Ijo', 'Intermediate');
INSERT INTO `list_languages` VALUES(797, 'Tiv', 'Intermediate');
INSERT INTO `list_languages` VALUES(798, 'Sumo', 'Intermediate');
INSERT INTO `list_languages` VALUES(799, 'Niue', 'Intermediate');
INSERT INTO `list_languages` VALUES(800, 'Fries', 'Intermediate');
INSERT INTO `list_languages` VALUES(801, 'Maithili', 'Intermediate');
INSERT INTO `list_languages` VALUES(802, 'Newari', 'Intermediate');
INSERT INTO `list_languages` VALUES(803, 'Tamang', 'Intermediate');
INSERT INTO `list_languages` VALUES(804, 'Tharu', 'Intermediate');
INSERT INTO `list_languages` VALUES(805, 'Nauru', 'Intermediate');
INSERT INTO `list_languages` VALUES(806, 'Brahui', 'Intermediate');
INSERT INTO `list_languages` VALUES(807, 'Hindko', 'Intermediate');
INSERT INTO `list_languages` VALUES(808, 'Saraiki', 'Intermediate');
INSERT INTO `list_languages` VALUES(809, 'Sindhi', 'Intermediate');
INSERT INTO `list_languages` VALUES(810, 'Cuna', 'Intermediate');
INSERT INTO `list_languages` VALUES(811, 'Embera', 'Intermediate');
INSERT INTO `list_languages` VALUES(812, 'GuaymÃ­', 'Intermediate');
INSERT INTO `list_languages` VALUES(813, 'Pitcairnese', 'Intermediate');
INSERT INTO `list_languages` VALUES(814, 'Bicol', 'Intermediate');
INSERT INTO `list_languages` VALUES(815, 'Cebuano', 'Intermediate');
INSERT INTO `list_languages` VALUES(816, 'Hiligaynon', 'Intermediate');
INSERT INTO `list_languages` VALUES(817, 'Ilocano', 'Intermediate');
INSERT INTO `list_languages` VALUES(818, 'Maguindanao', 'Intermediate');
INSERT INTO `list_languages` VALUES(819, 'Maranao', 'Intermediate');
INSERT INTO `list_languages` VALUES(820, 'Pampango', 'Intermediate');
INSERT INTO `list_languages` VALUES(821, 'Pangasinan', 'Intermediate');
INSERT INTO `list_languages` VALUES(822, 'Pilipino', 'Intermediate');
INSERT INTO `list_languages` VALUES(823, 'Waray-waray', 'Intermediate');
INSERT INTO `list_languages` VALUES(824, 'Palau', 'Intermediate');
INSERT INTO `list_languages` VALUES(825, 'Papuan Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(826, 'Tahitian', 'Intermediate');
INSERT INTO `list_languages` VALUES(827, 'Avarian', 'Intermediate');
INSERT INTO `list_languages` VALUES(828, 'Bashkir', 'Intermediate');
INSERT INTO `list_languages` VALUES(829, 'Chechen', 'Intermediate');
INSERT INTO `list_languages` VALUES(830, 'Chuvash', 'Intermediate');
INSERT INTO `list_languages` VALUES(831, 'Mari', 'Intermediate');
INSERT INTO `list_languages` VALUES(832, 'Mordva', 'Intermediate');
INSERT INTO `list_languages` VALUES(833, 'Udmur', 'Intermediate');
INSERT INTO `list_languages` VALUES(834, 'Bari', 'Intermediate');
INSERT INTO `list_languages` VALUES(835, 'Beja', 'Intermediate');
INSERT INTO `list_languages` VALUES(836, 'Chilluk', 'Intermediate');
INSERT INTO `list_languages` VALUES(837, 'Dinka', 'Intermediate');
INSERT INTO `list_languages` VALUES(838, 'Fur', 'Intermediate');
INSERT INTO `list_languages` VALUES(839, 'Lotuko', 'Intermediate');
INSERT INTO `list_languages` VALUES(840, 'Nubian Languages', 'Intermediate');
INSERT INTO `list_languages` VALUES(841, 'Nuer', 'Intermediate');
INSERT INTO `list_languages` VALUES(842, 'Serer', 'Intermediate');
INSERT INTO `list_languages` VALUES(843, 'Bullom-sherbro', 'Intermediate');
INSERT INTO `list_languages` VALUES(844, 'Kono-vai', 'Intermediate');
INSERT INTO `list_languages` VALUES(845, 'Kuranko', 'Intermediate');
INSERT INTO `list_languages` VALUES(846, 'Limba', 'Intermediate');
INSERT INTO `list_languages` VALUES(847, 'Mende', 'Intermediate');
INSERT INTO `list_languages` VALUES(848, 'Temne', 'Intermediate');
INSERT INTO `list_languages` VALUES(849, 'Nahua', 'Intermediate');
INSERT INTO `list_languages` VALUES(850, 'Sranantonga', 'Intermediate');
INSERT INTO `list_languages` VALUES(851, 'Czech and Moravian', 'Intermediate');
INSERT INTO `list_languages` VALUES(852, 'Ukrainian and Russian', 'Intermediate');
INSERT INTO `list_languages` VALUES(853, 'Swazi', 'Intermediate');
INSERT INTO `list_languages` VALUES(854, 'Seselwa', 'Intermediate');
INSERT INTO `list_languages` VALUES(855, 'Gorane', 'Intermediate');
INSERT INTO `list_languages` VALUES(856, 'Hadjarai', 'Intermediate');
INSERT INTO `list_languages` VALUES(857, 'Kanem-bornu', 'Intermediate');
INSERT INTO `list_languages` VALUES(858, 'Mayo-kebbi', 'Intermediate');
INSERT INTO `list_languages` VALUES(859, 'Ouaddai', 'Intermediate');
INSERT INTO `list_languages` VALUES(860, 'Tandjile', 'Intermediate');
INSERT INTO `list_languages` VALUES(861, 'Ane', 'Intermediate');
INSERT INTO `list_languages` VALUES(862, 'KabyÃ©', 'Intermediate');
INSERT INTO `list_languages` VALUES(863, 'Kotokoli', 'Intermediate');
INSERT INTO `list_languages` VALUES(864, 'Moba', 'Intermediate');
INSERT INTO `list_languages` VALUES(865, 'Naudemba', 'Intermediate');
INSERT INTO `list_languages` VALUES(866, 'Watyi', 'Intermediate');
INSERT INTO `list_languages` VALUES(867, 'Kuy', 'Intermediate');
INSERT INTO `list_languages` VALUES(868, 'Tokelau', 'Intermediate');
INSERT INTO `list_languages` VALUES(869, 'Arabic-French', 'Intermediate');
INSERT INTO `list_languages` VALUES(871, 'Ami', 'Intermediate');
INSERT INTO `list_languages` VALUES(872, 'Atayal', 'Intermediate');
INSERT INTO `list_languages` VALUES(873, 'Min', 'Intermediate');
INSERT INTO `list_languages` VALUES(874, 'Paiwan', 'Intermediate');
INSERT INTO `list_languages` VALUES(875, 'Chaga and Pare', 'Intermediate');
INSERT INTO `list_languages` VALUES(876, 'Gogo', 'Intermediate');
INSERT INTO `list_languages` VALUES(877, 'Ha', 'Intermediate');
INSERT INTO `list_languages` VALUES(878, 'Haya', 'Intermediate');
INSERT INTO `list_languages` VALUES(879, 'Hehet', 'Intermediate');
INSERT INTO `list_languages` VALUES(880, 'Luguru', 'Intermediate');
INSERT INTO `list_languages` VALUES(881, 'Makonde', 'Intermediate');
INSERT INTO `list_languages` VALUES(882, 'Nyakusa', 'Intermediate');
INSERT INTO `list_languages` VALUES(883, 'Nyamwesi', 'Intermediate');
INSERT INTO `list_languages` VALUES(884, 'Shambala', 'Intermediate');
INSERT INTO `list_languages` VALUES(885, 'Acholi', 'Intermediate');
INSERT INTO `list_languages` VALUES(886, 'Ganda', 'Intermediate');
INSERT INTO `list_languages` VALUES(887, 'Gisu', 'Intermediate');
INSERT INTO `list_languages` VALUES(888, 'Kiga', 'Intermediate');
INSERT INTO `list_languages` VALUES(889, 'Lango', 'Intermediate');
INSERT INTO `list_languages` VALUES(890, 'Lugbara', 'Intermediate');
INSERT INTO `list_languages` VALUES(891, 'Nkole', 'Intermediate');
INSERT INTO `list_languages` VALUES(892, 'Soga', 'Intermediate');
INSERT INTO `list_languages` VALUES(893, 'Teso', 'Intermediate');
INSERT INTO `list_languages` VALUES(894, 'Tagalog', 'Intermediate');
INSERT INTO `list_languages` VALUES(895, 'Karakalpak', 'Intermediate');
INSERT INTO `list_languages` VALUES(896, 'Goajiro', 'Intermediate');
INSERT INTO `list_languages` VALUES(897, 'Warrau', 'Intermediate');
INSERT INTO `list_languages` VALUES(898, 'Man', 'Intermediate');
INSERT INTO `list_languages` VALUES(899, 'Muong', 'Intermediate');
INSERT INTO `list_languages` VALUES(900, 'Nung', 'Intermediate');
INSERT INTO `list_languages` VALUES(901, 'Tho', 'Intermediate');
INSERT INTO `list_languages` VALUES(902, 'Bislama', 'Intermediate');
INSERT INTO `list_languages` VALUES(903, 'Futuna', 'Intermediate');
INSERT INTO `list_languages` VALUES(904, 'Wallis', 'Intermediate');
INSERT INTO `list_languages` VALUES(906, 'Soqutri', 'Intermediate');
INSERT INTO `list_languages` VALUES(907, 'Northsotho', 'Intermediate');
INSERT INTO `list_languages` VALUES(908, 'Southsotho', 'Intermediate');
INSERT INTO `list_languages` VALUES(909, 'Venda', 'Intermediate');
INSERT INTO `list_languages` VALUES(910, 'Xhosa', 'Intermediate');
INSERT INTO `list_languages` VALUES(911, 'Bemba', 'Intermediate');
INSERT INTO `list_languages` VALUES(912, 'Chewa', 'Intermediate');
INSERT INTO `list_languages` VALUES(913, 'Lozi', 'Intermediate');
INSERT INTO `list_languages` VALUES(914, 'Nsenga', 'Intermediate');
INSERT INTO `list_languages` VALUES(915, 'Dutch', 'Advanced');
INSERT INTO `list_languages` VALUES(916, 'English', 'Advanced');
INSERT INTO `list_languages` VALUES(917, 'Papiamento', 'Advanced');
INSERT INTO `list_languages` VALUES(918, 'Spanish', 'Advanced');
INSERT INTO `list_languages` VALUES(919, 'Balochi', 'Advanced');
INSERT INTO `list_languages` VALUES(920, 'Dari', 'Advanced');
INSERT INTO `list_languages` VALUES(921, 'Pashto', 'Advanced');
INSERT INTO `list_languages` VALUES(922, 'Turkmenian', 'Advanced');
INSERT INTO `list_languages` VALUES(923, 'Uzbek', 'Advanced');
INSERT INTO `list_languages` VALUES(924, 'Ambo', 'Advanced');
INSERT INTO `list_languages` VALUES(925, 'Chokwe', 'Advanced');
INSERT INTO `list_languages` VALUES(926, 'Kongo', 'Advanced');
INSERT INTO `list_languages` VALUES(927, 'Luchazi', 'Advanced');
INSERT INTO `list_languages` VALUES(928, 'Luimbe-nganguela', 'Advanced');
INSERT INTO `list_languages` VALUES(929, 'Luvale', 'Advanced');
INSERT INTO `list_languages` VALUES(930, 'Mbundu', 'Advanced');
INSERT INTO `list_languages` VALUES(931, 'Nyaneka-nkhumbi', 'Advanced');
INSERT INTO `list_languages` VALUES(932, 'Ovimbundu', 'Advanced');
INSERT INTO `list_languages` VALUES(933, 'Albaniana', 'Advanced');
INSERT INTO `list_languages` VALUES(934, 'Greek', 'Advanced');
INSERT INTO `list_languages` VALUES(935, 'Macedonian', 'Advanced');
INSERT INTO `list_languages` VALUES(936, 'Catalan', 'Advanced');
INSERT INTO `list_languages` VALUES(937, 'French', 'Advanced');
INSERT INTO `list_languages` VALUES(938, 'Portuguese', 'Advanced');
INSERT INTO `list_languages` VALUES(939, 'Arabic', 'Advanced');
INSERT INTO `list_languages` VALUES(940, 'Hindi', 'Advanced');
INSERT INTO `list_languages` VALUES(941, 'Indian Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(942, 'Italian', 'Advanced');
INSERT INTO `list_languages` VALUES(943, 'Armenian', 'Advanced');
INSERT INTO `list_languages` VALUES(944, 'Azerbaijani', 'Advanced');
INSERT INTO `list_languages` VALUES(945, 'Samoan', 'Advanced');
INSERT INTO `list_languages` VALUES(946, 'Tongan', 'Advanced');
INSERT INTO `list_languages` VALUES(948, 'Canton Chinese', 'Advanced');
INSERT INTO `list_languages` VALUES(949, 'German', 'Advanced');
INSERT INTO `list_languages` VALUES(950, 'Serbo-Croatian', 'Advanced');
INSERT INTO `list_languages` VALUES(951, 'Vietnamese', 'Advanced');
INSERT INTO `list_languages` VALUES(952, 'Czech', 'Advanced');
INSERT INTO `list_languages` VALUES(953, 'Hungarian', 'Advanced');
INSERT INTO `list_languages` VALUES(954, 'Polish', 'Advanced');
INSERT INTO `list_languages` VALUES(955, 'Romanian', 'Advanced');
INSERT INTO `list_languages` VALUES(956, 'Slovene', 'Advanced');
INSERT INTO `list_languages` VALUES(957, 'Turkish', 'Advanced');
INSERT INTO `list_languages` VALUES(958, 'Lezgian', 'Advanced');
INSERT INTO `list_languages` VALUES(959, 'Russian', 'Advanced');
INSERT INTO `list_languages` VALUES(960, 'Kirundi', 'Advanced');
INSERT INTO `list_languages` VALUES(961, 'Swahili', 'Advanced');
INSERT INTO `list_languages` VALUES(962, 'Adja', 'Advanced');
INSERT INTO `list_languages` VALUES(963, 'Aizo', 'Advanced');
INSERT INTO `list_languages` VALUES(964, 'Bariba', 'Advanced');
INSERT INTO `list_languages` VALUES(965, 'Fon', 'Advanced');
INSERT INTO `list_languages` VALUES(966, 'Ful', 'Advanced');
INSERT INTO `list_languages` VALUES(967, 'Joruba', 'Advanced');
INSERT INTO `list_languages` VALUES(968, 'Somba', 'Advanced');
INSERT INTO `list_languages` VALUES(969, 'Busansi', 'Advanced');
INSERT INTO `list_languages` VALUES(970, 'Dagara', 'Advanced');
INSERT INTO `list_languages` VALUES(971, 'Dyula', 'Advanced');
INSERT INTO `list_languages` VALUES(972, 'Gurma', 'Advanced');
INSERT INTO `list_languages` VALUES(973, 'Mossi', 'Advanced');
INSERT INTO `list_languages` VALUES(974, 'Bengali', 'Advanced');
INSERT INTO `list_languages` VALUES(975, 'Chakma', 'Advanced');
INSERT INTO `list_languages` VALUES(976, 'Garo', 'Advanced');
INSERT INTO `list_languages` VALUES(977, 'Khasi', 'Advanced');
INSERT INTO `list_languages` VALUES(978, 'Marma', 'Advanced');
INSERT INTO `list_languages` VALUES(979, 'Santhali', 'Advanced');
INSERT INTO `list_languages` VALUES(980, 'Tripuri', 'Advanced');
INSERT INTO `list_languages` VALUES(981, 'Bulgariana', 'Advanced');
INSERT INTO `list_languages` VALUES(982, 'Romani', 'Advanced');
INSERT INTO `list_languages` VALUES(983, 'Creole French', 'Advanced');
INSERT INTO `list_languages` VALUES(984, 'Belorussian', 'Advanced');
INSERT INTO `list_languages` VALUES(985, 'Ukrainian', 'Advanced');
INSERT INTO `list_languages` VALUES(986, 'Garifuna', 'Advanced');
INSERT INTO `list_languages` VALUES(987, 'Maya Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(988, 'AimarÃ¡', 'Advanced');
INSERT INTO `list_languages` VALUES(989, 'GuaranÃ­', 'Advanced');
INSERT INTO `list_languages` VALUES(990, 'KetÅ¡ua', 'Advanced');
INSERT INTO `list_languages` VALUES(991, 'Japanese', 'Advanced');
INSERT INTO `list_languages` VALUES(992, 'Bajan', 'Advanced');
INSERT INTO `list_languages` VALUES(993, 'Chinese', 'Advanced');
INSERT INTO `list_languages` VALUES(994, 'Malay', 'Advanced');
INSERT INTO `list_languages` VALUES(996, 'Asami', 'Advanced');
INSERT INTO `list_languages` VALUES(997, 'Dzongkha', 'Advanced');
INSERT INTO `list_languages` VALUES(998, 'Nepali', 'Advanced');
INSERT INTO `list_languages` VALUES(999, 'Khoekhoe', 'Advanced');
INSERT INTO `list_languages` VALUES(1000, 'Ndebele', 'Advanced');
INSERT INTO `list_languages` VALUES(1001, 'San', 'Advanced');
INSERT INTO `list_languages` VALUES(1002, 'Shona', 'Advanced');
INSERT INTO `list_languages` VALUES(1003, 'Tswana', 'Advanced');
INSERT INTO `list_languages` VALUES(1004, 'Banda', 'Advanced');
INSERT INTO `list_languages` VALUES(1005, 'Gbaya', 'Advanced');
INSERT INTO `list_languages` VALUES(1006, 'Mandjia', 'Advanced');
INSERT INTO `list_languages` VALUES(1007, 'Mbum', 'Advanced');
INSERT INTO `list_languages` VALUES(1008, 'Ngbaka', 'Advanced');
INSERT INTO `list_languages` VALUES(1009, 'Sara', 'Advanced');
INSERT INTO `list_languages` VALUES(1010, 'Eskimo Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1011, 'Punjabi', 'Advanced');
INSERT INTO `list_languages` VALUES(1012, 'Romansh', 'Advanced');
INSERT INTO `list_languages` VALUES(1013, 'Araucan', 'Advanced');
INSERT INTO `list_languages` VALUES(1014, 'Rapa nui', 'Advanced');
INSERT INTO `list_languages` VALUES(1015, 'Dong', 'Advanced');
INSERT INTO `list_languages` VALUES(1016, 'Hui', 'Advanced');
INSERT INTO `list_languages` VALUES(1017, 'MantÅ¡u', 'Advanced');
INSERT INTO `list_languages` VALUES(1018, 'Miao', 'Advanced');
INSERT INTO `list_languages` VALUES(1019, 'Mongolian', 'Advanced');
INSERT INTO `list_languages` VALUES(1020, 'Puyi', 'Advanced');
INSERT INTO `list_languages` VALUES(1021, 'Tibetan', 'Advanced');
INSERT INTO `list_languages` VALUES(1022, 'Tujia', 'Advanced');
INSERT INTO `list_languages` VALUES(1023, 'Uighur', 'Advanced');
INSERT INTO `list_languages` VALUES(1024, 'Yi', 'Advanced');
INSERT INTO `list_languages` VALUES(1025, 'Zhuang', 'Advanced');
INSERT INTO `list_languages` VALUES(1026, 'Akan', 'Advanced');
INSERT INTO `list_languages` VALUES(1027, 'Gur', 'Advanced');
INSERT INTO `list_languages` VALUES(1028, 'Kru', 'Advanced');
INSERT INTO `list_languages` VALUES(1029, 'Malinke', 'Advanced');
INSERT INTO `list_languages` VALUES(1030, '[South]Mande', 'Advanced');
INSERT INTO `list_languages` VALUES(1031, 'Bamileke-bamum', 'Advanced');
INSERT INTO `list_languages` VALUES(1032, 'Duala', 'Advanced');
INSERT INTO `list_languages` VALUES(1033, 'Fang', 'Advanced');
INSERT INTO `list_languages` VALUES(1034, 'Maka', 'Advanced');
INSERT INTO `list_languages` VALUES(1035, 'Mandara', 'Advanced');
INSERT INTO `list_languages` VALUES(1036, 'Masana', 'Advanced');
INSERT INTO `list_languages` VALUES(1037, 'Tikar', 'Advanced');
INSERT INTO `list_languages` VALUES(1038, 'Boa', 'Advanced');
INSERT INTO `list_languages` VALUES(1039, 'Luba', 'Advanced');
INSERT INTO `list_languages` VALUES(1040, 'Mongo', 'Advanced');
INSERT INTO `list_languages` VALUES(1041, 'Ngala and Bangi', 'Advanced');
INSERT INTO `list_languages` VALUES(1042, 'Rundi', 'Advanced');
INSERT INTO `list_languages` VALUES(1043, 'Rwanda', 'Advanced');
INSERT INTO `list_languages` VALUES(1044, 'Teke', 'Advanced');
INSERT INTO `list_languages` VALUES(1045, 'Zande', 'Advanced');
INSERT INTO `list_languages` VALUES(1046, 'Mbete', 'Advanced');
INSERT INTO `list_languages` VALUES(1047, 'Mboshi', 'Advanced');
INSERT INTO `list_languages` VALUES(1048, 'Punu', 'Advanced');
INSERT INTO `list_languages` VALUES(1049, 'Sango', 'Advanced');
INSERT INTO `list_languages` VALUES(1050, 'Maori', 'Advanced');
INSERT INTO `list_languages` VALUES(1051, 'Arawakan', 'Advanced');
INSERT INTO `list_languages` VALUES(1052, 'Caribbean', 'Advanced');
INSERT INTO `list_languages` VALUES(1053, 'Chibcha', 'Advanced');
INSERT INTO `list_languages` VALUES(1054, 'Comorian', 'Advanced');
INSERT INTO `list_languages` VALUES(1055, 'Comorian-Arabic', 'Advanced');
INSERT INTO `list_languages` VALUES(1056, 'Comorian-French', 'Advanced');
INSERT INTO `list_languages` VALUES(1057, 'Comorian-madagassi', 'Advanced');
INSERT INTO `list_languages` VALUES(1058, 'Comorian-Swahili', 'Advanced');
INSERT INTO `list_languages` VALUES(1059, 'Crioulo', 'Advanced');
INSERT INTO `list_languages` VALUES(1060, 'Moravian', 'Advanced');
INSERT INTO `list_languages` VALUES(1061, 'Silesiana', 'Advanced');
INSERT INTO `list_languages` VALUES(1062, 'Slovak', 'Advanced');
INSERT INTO `list_languages` VALUES(1063, 'Southern Slavic Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1064, 'Afar', 'Advanced');
INSERT INTO `list_languages` VALUES(1065, 'Somali', 'Advanced');
INSERT INTO `list_languages` VALUES(1066, 'Danish', 'Advanced');
INSERT INTO `list_languages` VALUES(1067, 'Norwegian', 'Advanced');
INSERT INTO `list_languages` VALUES(1068, 'Swedish', 'Advanced');
INSERT INTO `list_languages` VALUES(1069, 'Berberi', 'Advanced');
INSERT INTO `list_languages` VALUES(1070, 'Sinaberberi', 'Advanced');
INSERT INTO `list_languages` VALUES(1071, 'Bilin', 'Advanced');
INSERT INTO `list_languages` VALUES(1072, 'Hadareb', 'Advanced');
INSERT INTO `list_languages` VALUES(1073, 'Saho', 'Advanced');
INSERT INTO `list_languages` VALUES(1074, 'Tigre', 'Advanced');
INSERT INTO `list_languages` VALUES(1075, 'Tigrinja', 'Advanced');
INSERT INTO `list_languages` VALUES(1076, 'Basque', 'Advanced');
INSERT INTO `list_languages` VALUES(1077, 'Galecian', 'Advanced');
INSERT INTO `list_languages` VALUES(1078, 'Estonian', 'Advanced');
INSERT INTO `list_languages` VALUES(1079, 'Finnish', 'Advanced');
INSERT INTO `list_languages` VALUES(1080, 'Amhara', 'Advanced');
INSERT INTO `list_languages` VALUES(1081, 'Gurage', 'Advanced');
INSERT INTO `list_languages` VALUES(1082, 'Oromo', 'Advanced');
INSERT INTO `list_languages` VALUES(1083, 'Sidamo', 'Advanced');
INSERT INTO `list_languages` VALUES(1084, 'Walaita', 'Advanced');
INSERT INTO `list_languages` VALUES(1085, 'Saame', 'Advanced');
INSERT INTO `list_languages` VALUES(1086, 'Fijian', 'Advanced');
INSERT INTO `list_languages` VALUES(1087, 'Faroese', 'Advanced');
INSERT INTO `list_languages` VALUES(1088, 'Kosrean', 'Advanced');
INSERT INTO `list_languages` VALUES(1089, 'Mortlock', 'Advanced');
INSERT INTO `list_languages` VALUES(1090, 'Pohnpei', 'Advanced');
INSERT INTO `list_languages` VALUES(1091, 'Trukese', 'Advanced');
INSERT INTO `list_languages` VALUES(1092, 'Wolea', 'Advanced');
INSERT INTO `list_languages` VALUES(1093, 'Yap', 'Advanced');
INSERT INTO `list_languages` VALUES(1094, 'Mpongwe', 'Advanced');
INSERT INTO `list_languages` VALUES(1095, 'Punu-sira-nzebi', 'Advanced');
INSERT INTO `list_languages` VALUES(1096, 'Gaeli', 'Advanced');
INSERT INTO `list_languages` VALUES(1097, 'Kymri', 'Advanced');
INSERT INTO `list_languages` VALUES(1098, 'Abhyasi', 'Advanced');
INSERT INTO `list_languages` VALUES(1099, 'Georgiana', 'Advanced');
INSERT INTO `list_languages` VALUES(1100, 'Osseetti', 'Advanced');
INSERT INTO `list_languages` VALUES(1101, 'Ewe', 'Advanced');
INSERT INTO `list_languages` VALUES(1102, 'Ga-adangme', 'Advanced');
INSERT INTO `list_languages` VALUES(1103, 'Kissi', 'Advanced');
INSERT INTO `list_languages` VALUES(1104, 'Kpelle', 'Advanced');
INSERT INTO `list_languages` VALUES(1105, 'Loma', 'Advanced');
INSERT INTO `list_languages` VALUES(1106, 'Susu', 'Advanced');
INSERT INTO `list_languages` VALUES(1107, 'Yalunka', 'Advanced');
INSERT INTO `list_languages` VALUES(1108, 'Diola', 'Advanced');
INSERT INTO `list_languages` VALUES(1109, 'Soninke', 'Advanced');
INSERT INTO `list_languages` VALUES(1110, 'Wolof', 'Advanced');
INSERT INTO `list_languages` VALUES(1111, 'Balante', 'Advanced');
INSERT INTO `list_languages` VALUES(1112, 'Mandyako', 'Advanced');
INSERT INTO `list_languages` VALUES(1113, 'Bubi', 'Advanced');
INSERT INTO `list_languages` VALUES(1114, 'Greenlandic', 'Advanced');
INSERT INTO `list_languages` VALUES(1115, 'Cakchiquel', 'Advanced');
INSERT INTO `list_languages` VALUES(1116, 'KekchÃ­', 'Advanced');
INSERT INTO `list_languages` VALUES(1117, 'Mam', 'Advanced');
INSERT INTO `list_languages` VALUES(1118, 'QuichÃ©', 'Advanced');
INSERT INTO `list_languages` VALUES(1119, 'Chamorro', 'Advanced');
INSERT INTO `list_languages` VALUES(1120, 'Korean', 'Advanced');
INSERT INTO `list_languages` VALUES(1121, 'Philippene Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1122, 'Chiu chau', 'Advanced');
INSERT INTO `list_languages` VALUES(1123, 'Fukien', 'Advanced');
INSERT INTO `list_languages` VALUES(1124, 'Hakka', 'Advanced');
INSERT INTO `list_languages` VALUES(1125, 'Miskito', 'Advanced');
INSERT INTO `list_languages` VALUES(1126, 'Haiti Creole', 'Advanced');
INSERT INTO `list_languages` VALUES(1127, 'Bali', 'Advanced');
INSERT INTO `list_languages` VALUES(1128, 'Banja', 'Advanced');
INSERT INTO `list_languages` VALUES(1129, 'Batakki', 'Advanced');
INSERT INTO `list_languages` VALUES(1130, 'Bugi', 'Advanced');
INSERT INTO `list_languages` VALUES(1131, 'Javanese', 'Advanced');
INSERT INTO `list_languages` VALUES(1132, 'Madura', 'Advanced');
INSERT INTO `list_languages` VALUES(1133, 'Minangkabau', 'Advanced');
INSERT INTO `list_languages` VALUES(1134, 'Sunda', 'Advanced');
INSERT INTO `list_languages` VALUES(1135, 'Gujarati', 'Advanced');
INSERT INTO `list_languages` VALUES(1136, 'Kannada', 'Advanced');
INSERT INTO `list_languages` VALUES(1137, 'Malajalam', 'Advanced');
INSERT INTO `list_languages` VALUES(1138, 'Marathi', 'Advanced');
INSERT INTO `list_languages` VALUES(1139, 'Orija', 'Advanced');
INSERT INTO `list_languages` VALUES(1140, 'Tamil', 'Advanced');
INSERT INTO `list_languages` VALUES(1141, 'Telugu', 'Advanced');
INSERT INTO `list_languages` VALUES(1142, 'Urdu', 'Advanced');
INSERT INTO `list_languages` VALUES(1143, 'Irish', 'Advanced');
INSERT INTO `list_languages` VALUES(1144, 'Bakhtyari', 'Advanced');
INSERT INTO `list_languages` VALUES(1145, 'Gilaki', 'Advanced');
INSERT INTO `list_languages` VALUES(1146, 'Kurdish', 'Advanced');
INSERT INTO `list_languages` VALUES(1147, 'Luri', 'Advanced');
INSERT INTO `list_languages` VALUES(1148, 'Mazandarani', 'Advanced');
INSERT INTO `list_languages` VALUES(1149, 'Persian', 'Advanced');
INSERT INTO `list_languages` VALUES(1150, 'Assyrian', 'Advanced');
INSERT INTO `list_languages` VALUES(1151, 'Icelandic', 'Advanced');
INSERT INTO `list_languages` VALUES(1152, 'Hebrew', 'Advanced');
INSERT INTO `list_languages` VALUES(1153, 'Friuli', 'Advanced');
INSERT INTO `list_languages` VALUES(1154, 'Sardinian', 'Advanced');
INSERT INTO `list_languages` VALUES(1155, 'Circassian', 'Advanced');
INSERT INTO `list_languages` VALUES(1156, 'Ainu', 'Advanced');
INSERT INTO `list_languages` VALUES(1157, 'Kazakh', 'Advanced');
INSERT INTO `list_languages` VALUES(1158, 'Tatar', 'Advanced');
INSERT INTO `list_languages` VALUES(1159, 'Gusii', 'Advanced');
INSERT INTO `list_languages` VALUES(1160, 'Kalenjin', 'Advanced');
INSERT INTO `list_languages` VALUES(1161, 'Kamba', 'Advanced');
INSERT INTO `list_languages` VALUES(1162, 'Kikuyu', 'Advanced');
INSERT INTO `list_languages` VALUES(1163, 'Luhya', 'Advanced');
INSERT INTO `list_languages` VALUES(1164, 'Luo', 'Advanced');
INSERT INTO `list_languages` VALUES(1165, 'Masai', 'Advanced');
INSERT INTO `list_languages` VALUES(1166, 'Meru', 'Advanced');
INSERT INTO `list_languages` VALUES(1167, 'Nyika', 'Advanced');
INSERT INTO `list_languages` VALUES(1168, 'Turkana', 'Advanced');
INSERT INTO `list_languages` VALUES(1169, 'Kirgiz', 'Advanced');
INSERT INTO `list_languages` VALUES(1170, 'Tadzhik', 'Advanced');
INSERT INTO `list_languages` VALUES(1171, 'Khmer', 'Advanced');
INSERT INTO `list_languages` VALUES(1172, 'TÅ¡am', 'Advanced');
INSERT INTO `list_languages` VALUES(1173, 'Kiribati', 'Advanced');
INSERT INTO `list_languages` VALUES(1174, 'Tuvalu', 'Advanced');
INSERT INTO `list_languages` VALUES(1175, 'Lao', 'Advanced');
INSERT INTO `list_languages` VALUES(1176, 'Lao-Soung', 'Advanced');
INSERT INTO `list_languages` VALUES(1177, 'Mon-khmer', 'Advanced');
INSERT INTO `list_languages` VALUES(1178, 'Thai', 'Advanced');
INSERT INTO `list_languages` VALUES(1179, 'Bassa', 'Advanced');
INSERT INTO `list_languages` VALUES(1180, 'Gio', 'Advanced');
INSERT INTO `list_languages` VALUES(1181, 'Grebo', 'Advanced');
INSERT INTO `list_languages` VALUES(1182, 'Mano', 'Advanced');
INSERT INTO `list_languages` VALUES(1183, 'Mixed Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1184, 'Singali', 'Advanced');
INSERT INTO `list_languages` VALUES(1185, 'Sotho', 'Advanced');
INSERT INTO `list_languages` VALUES(1186, 'Zulu', 'Advanced');
INSERT INTO `list_languages` VALUES(1187, 'Lithuanian', 'Advanced');
INSERT INTO `list_languages` VALUES(1188, 'Luxembourgish', 'Advanced');
INSERT INTO `list_languages` VALUES(1189, 'Latvian', 'Advanced');
INSERT INTO `list_languages` VALUES(1190, 'Mandarin Chinese', 'Advanced');
INSERT INTO `list_languages` VALUES(1191, 'Monegasque', 'Advanced');
INSERT INTO `list_languages` VALUES(1192, 'Gagauzi', 'Advanced');
INSERT INTO `list_languages` VALUES(1193, 'Malagasy', 'Advanced');
INSERT INTO `list_languages` VALUES(1194, 'Dhivehi', 'Advanced');
INSERT INTO `list_languages` VALUES(1195, 'Mixtec', 'Advanced');
INSERT INTO `list_languages` VALUES(1196, 'NÃ¡huatl', 'Advanced');
INSERT INTO `list_languages` VALUES(1197, 'OtomÃ­', 'Advanced');
INSERT INTO `list_languages` VALUES(1198, 'Yucatec', 'Advanced');
INSERT INTO `list_languages` VALUES(1199, 'Zapotec', 'Advanced');
INSERT INTO `list_languages` VALUES(1200, 'Marshallese', 'Advanced');
INSERT INTO `list_languages` VALUES(1201, 'Bambara', 'Advanced');
INSERT INTO `list_languages` VALUES(1202, 'Senufo and Minianka', 'Advanced');
INSERT INTO `list_languages` VALUES(1203, 'Songhai', 'Advanced');
INSERT INTO `list_languages` VALUES(1204, 'Tamashek', 'Advanced');
INSERT INTO `list_languages` VALUES(1205, 'Maltese', 'Advanced');
INSERT INTO `list_languages` VALUES(1206, 'Burmese', 'Advanced');
INSERT INTO `list_languages` VALUES(1207, 'Chin', 'Advanced');
INSERT INTO `list_languages` VALUES(1208, 'Kachin', 'Advanced');
INSERT INTO `list_languages` VALUES(1209, 'Karen', 'Advanced');
INSERT INTO `list_languages` VALUES(1210, 'Kayah', 'Advanced');
INSERT INTO `list_languages` VALUES(1211, 'Mon', 'Advanced');
INSERT INTO `list_languages` VALUES(1212, 'Rakhine', 'Advanced');
INSERT INTO `list_languages` VALUES(1213, 'Shan', 'Advanced');
INSERT INTO `list_languages` VALUES(1214, 'Bajad', 'Advanced');
INSERT INTO `list_languages` VALUES(1215, 'Buryat', 'Advanced');
INSERT INTO `list_languages` VALUES(1216, 'Dariganga', 'Advanced');
INSERT INTO `list_languages` VALUES(1217, 'Dorbet', 'Advanced');
INSERT INTO `list_languages` VALUES(1218, 'Carolinian', 'Advanced');
INSERT INTO `list_languages` VALUES(1219, 'Chuabo', 'Advanced');
INSERT INTO `list_languages` VALUES(1220, 'Lomwe', 'Advanced');
INSERT INTO `list_languages` VALUES(1221, 'Makua', 'Advanced');
INSERT INTO `list_languages` VALUES(1222, 'Marendje', 'Advanced');
INSERT INTO `list_languages` VALUES(1223, 'Nyanja', 'Advanced');
INSERT INTO `list_languages` VALUES(1224, 'Ronga', 'Advanced');
INSERT INTO `list_languages` VALUES(1225, 'Sena', 'Advanced');
INSERT INTO `list_languages` VALUES(1226, 'Tsonga', 'Advanced');
INSERT INTO `list_languages` VALUES(1227, 'Tswa', 'Advanced');
INSERT INTO `list_languages` VALUES(1228, 'Hassaniya', 'Advanced');
INSERT INTO `list_languages` VALUES(1229, 'Tukulor', 'Advanced');
INSERT INTO `list_languages` VALUES(1230, 'Zenaga', 'Advanced');
INSERT INTO `list_languages` VALUES(1231, 'Bhojpuri', 'Advanced');
INSERT INTO `list_languages` VALUES(1232, 'Chichewa', 'Advanced');
INSERT INTO `list_languages` VALUES(1233, 'Ngoni', 'Advanced');
INSERT INTO `list_languages` VALUES(1234, 'Yao', 'Advanced');
INSERT INTO `list_languages` VALUES(1235, 'Dusun', 'Advanced');
INSERT INTO `list_languages` VALUES(1236, 'Iban', 'Advanced');
INSERT INTO `list_languages` VALUES(1237, 'MahorÃ©', 'Advanced');
INSERT INTO `list_languages` VALUES(1238, 'Afrikaans', 'Advanced');
INSERT INTO `list_languages` VALUES(1239, 'Caprivi', 'Advanced');
INSERT INTO `list_languages` VALUES(1240, 'Herero', 'Advanced');
INSERT INTO `list_languages` VALUES(1241, 'Kavango', 'Advanced');
INSERT INTO `list_languages` VALUES(1242, 'Nama', 'Advanced');
INSERT INTO `list_languages` VALUES(1243, 'Ovambo', 'Advanced');
INSERT INTO `list_languages` VALUES(1244, 'Malenasian Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1245, 'Polynesian Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1246, 'Hausa', 'Advanced');
INSERT INTO `list_languages` VALUES(1247, 'Kanuri', 'Advanced');
INSERT INTO `list_languages` VALUES(1248, 'Songhai-zerma', 'Advanced');
INSERT INTO `list_languages` VALUES(1249, 'Bura', 'Advanced');
INSERT INTO `list_languages` VALUES(1250, 'Edo', 'Advanced');
INSERT INTO `list_languages` VALUES(1251, 'Ibibio', 'Advanced');
INSERT INTO `list_languages` VALUES(1252, 'Ibo', 'Advanced');
INSERT INTO `list_languages` VALUES(1253, 'Ijo', 'Advanced');
INSERT INTO `list_languages` VALUES(1254, 'Tiv', 'Advanced');
INSERT INTO `list_languages` VALUES(1255, 'Sumo', 'Advanced');
INSERT INTO `list_languages` VALUES(1256, 'Niue', 'Advanced');
INSERT INTO `list_languages` VALUES(1257, 'Fries', 'Advanced');
INSERT INTO `list_languages` VALUES(1258, 'Maithili', 'Advanced');
INSERT INTO `list_languages` VALUES(1259, 'Newari', 'Advanced');
INSERT INTO `list_languages` VALUES(1260, 'Tamang', 'Advanced');
INSERT INTO `list_languages` VALUES(1261, 'Tharu', 'Advanced');
INSERT INTO `list_languages` VALUES(1262, 'Nauru', 'Advanced');
INSERT INTO `list_languages` VALUES(1263, 'Brahui', 'Advanced');
INSERT INTO `list_languages` VALUES(1264, 'Hindko', 'Advanced');
INSERT INTO `list_languages` VALUES(1265, 'Saraiki', 'Advanced');
INSERT INTO `list_languages` VALUES(1266, 'Sindhi', 'Advanced');
INSERT INTO `list_languages` VALUES(1267, 'Cuna', 'Advanced');
INSERT INTO `list_languages` VALUES(1268, 'Embera', 'Advanced');
INSERT INTO `list_languages` VALUES(1269, 'GuaymÃ­', 'Advanced');
INSERT INTO `list_languages` VALUES(1270, 'Pitcairnese', 'Advanced');
INSERT INTO `list_languages` VALUES(1271, 'Bicol', 'Advanced');
INSERT INTO `list_languages` VALUES(1272, 'Cebuano', 'Advanced');
INSERT INTO `list_languages` VALUES(1273, 'Hiligaynon', 'Advanced');
INSERT INTO `list_languages` VALUES(1274, 'Ilocano', 'Advanced');
INSERT INTO `list_languages` VALUES(1275, 'Maguindanao', 'Advanced');
INSERT INTO `list_languages` VALUES(1276, 'Maranao', 'Advanced');
INSERT INTO `list_languages` VALUES(1277, 'Pampango', 'Advanced');
INSERT INTO `list_languages` VALUES(1278, 'Pangasinan', 'Advanced');
INSERT INTO `list_languages` VALUES(1279, 'Pilipino', 'Advanced');
INSERT INTO `list_languages` VALUES(1280, 'Waray-waray', 'Advanced');
INSERT INTO `list_languages` VALUES(1281, 'Palau', 'Advanced');
INSERT INTO `list_languages` VALUES(1282, 'Papuan Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1283, 'Tahitian', 'Advanced');
INSERT INTO `list_languages` VALUES(1284, 'Avarian', 'Advanced');
INSERT INTO `list_languages` VALUES(1285, 'Bashkir', 'Advanced');
INSERT INTO `list_languages` VALUES(1286, 'Chechen', 'Advanced');
INSERT INTO `list_languages` VALUES(1287, 'Chuvash', 'Advanced');
INSERT INTO `list_languages` VALUES(1288, 'Mari', 'Advanced');
INSERT INTO `list_languages` VALUES(1289, 'Mordva', 'Advanced');
INSERT INTO `list_languages` VALUES(1290, 'Udmur', 'Advanced');
INSERT INTO `list_languages` VALUES(1291, 'Bari', 'Advanced');
INSERT INTO `list_languages` VALUES(1292, 'Beja', 'Advanced');
INSERT INTO `list_languages` VALUES(1293, 'Chilluk', 'Advanced');
INSERT INTO `list_languages` VALUES(1294, 'Dinka', 'Advanced');
INSERT INTO `list_languages` VALUES(1295, 'Fur', 'Advanced');
INSERT INTO `list_languages` VALUES(1296, 'Lotuko', 'Advanced');
INSERT INTO `list_languages` VALUES(1297, 'Nubian Languages', 'Advanced');
INSERT INTO `list_languages` VALUES(1298, 'Nuer', 'Advanced');
INSERT INTO `list_languages` VALUES(1299, 'Serer', 'Advanced');
INSERT INTO `list_languages` VALUES(1300, 'Bullom-sherbro', 'Advanced');
INSERT INTO `list_languages` VALUES(1301, 'Kono-vai', 'Advanced');
INSERT INTO `list_languages` VALUES(1302, 'Kuranko', 'Advanced');
INSERT INTO `list_languages` VALUES(1303, 'Limba', 'Advanced');
INSERT INTO `list_languages` VALUES(1304, 'Mende', 'Advanced');
INSERT INTO `list_languages` VALUES(1305, 'Temne', 'Advanced');
INSERT INTO `list_languages` VALUES(1306, 'Nahua', 'Advanced');
INSERT INTO `list_languages` VALUES(1307, 'Sranantonga', 'Advanced');
INSERT INTO `list_languages` VALUES(1308, 'Czech and Moravian', 'Advanced');
INSERT INTO `list_languages` VALUES(1309, 'Ukrainian and Russian', 'Advanced');
INSERT INTO `list_languages` VALUES(1310, 'Swazi', 'Advanced');
INSERT INTO `list_languages` VALUES(1311, 'Seselwa', 'Advanced');
INSERT INTO `list_languages` VALUES(1312, 'Gorane', 'Advanced');
INSERT INTO `list_languages` VALUES(1313, 'Hadjarai', 'Advanced');
INSERT INTO `list_languages` VALUES(1314, 'Kanem-bornu', 'Advanced');
INSERT INTO `list_languages` VALUES(1315, 'Mayo-kebbi', 'Advanced');
INSERT INTO `list_languages` VALUES(1316, 'Ouaddai', 'Advanced');
INSERT INTO `list_languages` VALUES(1317, 'Tandjile', 'Advanced');
INSERT INTO `list_languages` VALUES(1318, 'Ane', 'Advanced');
INSERT INTO `list_languages` VALUES(1319, 'KabyÃ©', 'Advanced');
INSERT INTO `list_languages` VALUES(1320, 'Kotokoli', 'Advanced');
INSERT INTO `list_languages` VALUES(1321, 'Moba', 'Advanced');
INSERT INTO `list_languages` VALUES(1322, 'Naudemba', 'Advanced');
INSERT INTO `list_languages` VALUES(1323, 'Watyi', 'Advanced');
INSERT INTO `list_languages` VALUES(1324, 'Kuy', 'Advanced');
INSERT INTO `list_languages` VALUES(1325, 'Tokelau', 'Advanced');
INSERT INTO `list_languages` VALUES(1326, 'Arabic-French', 'Advanced');
INSERT INTO `list_languages` VALUES(1328, 'Ami', 'Advanced');
INSERT INTO `list_languages` VALUES(1329, 'Atayal', 'Advanced');
INSERT INTO `list_languages` VALUES(1330, 'Min', 'Advanced');
INSERT INTO `list_languages` VALUES(1331, 'Paiwan', 'Advanced');
INSERT INTO `list_languages` VALUES(1332, 'Chaga and Pare', 'Advanced');
INSERT INTO `list_languages` VALUES(1333, 'Gogo', 'Advanced');
INSERT INTO `list_languages` VALUES(1334, 'Ha', 'Advanced');
INSERT INTO `list_languages` VALUES(1335, 'Haya', 'Advanced');
INSERT INTO `list_languages` VALUES(1336, 'Hehet', 'Advanced');
INSERT INTO `list_languages` VALUES(1337, 'Luguru', 'Advanced');
INSERT INTO `list_languages` VALUES(1338, 'Makonde', 'Advanced');
INSERT INTO `list_languages` VALUES(1339, 'Nyakusa', 'Advanced');
INSERT INTO `list_languages` VALUES(1340, 'Nyamwesi', 'Advanced');
INSERT INTO `list_languages` VALUES(1341, 'Shambala', 'Advanced');
INSERT INTO `list_languages` VALUES(1342, 'Acholi', 'Advanced');
INSERT INTO `list_languages` VALUES(1343, 'Ganda', 'Advanced');
INSERT INTO `list_languages` VALUES(1344, 'Gisu', 'Advanced');
INSERT INTO `list_languages` VALUES(1345, 'Kiga', 'Advanced');
INSERT INTO `list_languages` VALUES(1346, 'Lango', 'Advanced');
INSERT INTO `list_languages` VALUES(1347, 'Lugbara', 'Advanced');
INSERT INTO `list_languages` VALUES(1348, 'Nkole', 'Advanced');
INSERT INTO `list_languages` VALUES(1349, 'Soga', 'Advanced');
INSERT INTO `list_languages` VALUES(1350, 'Teso', 'Advanced');
INSERT INTO `list_languages` VALUES(1351, 'Tagalog', 'Advanced');
INSERT INTO `list_languages` VALUES(1352, 'Karakalpak', 'Advanced');
INSERT INTO `list_languages` VALUES(1353, 'Goajiro', 'Advanced');
INSERT INTO `list_languages` VALUES(1354, 'Warrau', 'Advanced');
INSERT INTO `list_languages` VALUES(1355, 'Man', 'Advanced');
INSERT INTO `list_languages` VALUES(1356, 'Muong', 'Advanced');
INSERT INTO `list_languages` VALUES(1357, 'Nung', 'Advanced');
INSERT INTO `list_languages` VALUES(1358, 'Tho', 'Advanced');
INSERT INTO `list_languages` VALUES(1359, 'Bislama', 'Advanced');
INSERT INTO `list_languages` VALUES(1360, 'Futuna', 'Advanced');
INSERT INTO `list_languages` VALUES(1361, 'Wallis', 'Advanced');
INSERT INTO `list_languages` VALUES(1363, 'Soqutri', 'Advanced');
INSERT INTO `list_languages` VALUES(1364, 'Northsotho', 'Advanced');
INSERT INTO `list_languages` VALUES(1365, 'Southsotho', 'Advanced');
INSERT INTO `list_languages` VALUES(1366, 'Venda', 'Advanced');
INSERT INTO `list_languages` VALUES(1367, 'Xhosa', 'Advanced');
INSERT INTO `list_languages` VALUES(1368, 'Bemba', 'Advanced');
INSERT INTO `list_languages` VALUES(1369, 'Chewa', 'Advanced');
INSERT INTO `list_languages` VALUES(1370, 'Lozi', 'Advanced');
INSERT INTO `list_languages` VALUES(1371, 'Nsenga', 'Advanced');
INSERT INTO `list_languages` VALUES(1372, 'Dutch', 'Expert');
INSERT INTO `list_languages` VALUES(1373, 'English', 'Expert');
INSERT INTO `list_languages` VALUES(1374, 'Papiamento', 'Expert');
INSERT INTO `list_languages` VALUES(1375, 'Spanish', 'Expert');
INSERT INTO `list_languages` VALUES(1376, 'Balochi', 'Expert');
INSERT INTO `list_languages` VALUES(1377, 'Dari', 'Expert');
INSERT INTO `list_languages` VALUES(1378, 'Pashto', 'Expert');
INSERT INTO `list_languages` VALUES(1379, 'Turkmenian', 'Expert');
INSERT INTO `list_languages` VALUES(1380, 'Uzbek', 'Expert');
INSERT INTO `list_languages` VALUES(1381, 'Ambo', 'Expert');
INSERT INTO `list_languages` VALUES(1382, 'Chokwe', 'Expert');
INSERT INTO `list_languages` VALUES(1383, 'Kongo', 'Expert');
INSERT INTO `list_languages` VALUES(1384, 'Luchazi', 'Expert');
INSERT INTO `list_languages` VALUES(1385, 'Luimbe-nganguela', 'Expert');
INSERT INTO `list_languages` VALUES(1386, 'Luvale', 'Expert');
INSERT INTO `list_languages` VALUES(1387, 'Mbundu', 'Expert');
INSERT INTO `list_languages` VALUES(1388, 'Nyaneka-nkhumbi', 'Expert');
INSERT INTO `list_languages` VALUES(1389, 'Ovimbundu', 'Expert');
INSERT INTO `list_languages` VALUES(1390, 'Albaniana', 'Expert');
INSERT INTO `list_languages` VALUES(1391, 'Greek', 'Expert');
INSERT INTO `list_languages` VALUES(1392, 'Macedonian', 'Expert');
INSERT INTO `list_languages` VALUES(1393, 'Catalan', 'Expert');
INSERT INTO `list_languages` VALUES(1394, 'French', 'Expert');
INSERT INTO `list_languages` VALUES(1395, 'Portuguese', 'Expert');
INSERT INTO `list_languages` VALUES(1396, 'Arabic', 'Expert');
INSERT INTO `list_languages` VALUES(1397, 'Hindi', 'Expert');
INSERT INTO `list_languages` VALUES(1398, 'Indian Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1399, 'Italian', 'Expert');
INSERT INTO `list_languages` VALUES(1400, 'Armenian', 'Expert');
INSERT INTO `list_languages` VALUES(1401, 'Azerbaijani', 'Expert');
INSERT INTO `list_languages` VALUES(1402, 'Samoan', 'Expert');
INSERT INTO `list_languages` VALUES(1403, 'Tongan', 'Expert');
INSERT INTO `list_languages` VALUES(1405, 'Canton Chinese', 'Expert');
INSERT INTO `list_languages` VALUES(1406, 'German', 'Expert');
INSERT INTO `list_languages` VALUES(1407, 'Serbo-Croatian', 'Expert');
INSERT INTO `list_languages` VALUES(1408, 'Vietnamese', 'Expert');
INSERT INTO `list_languages` VALUES(1409, 'Czech', 'Expert');
INSERT INTO `list_languages` VALUES(1410, 'Hungarian', 'Expert');
INSERT INTO `list_languages` VALUES(1411, 'Polish', 'Expert');
INSERT INTO `list_languages` VALUES(1412, 'Romanian', 'Expert');
INSERT INTO `list_languages` VALUES(1413, 'Slovene', 'Expert');
INSERT INTO `list_languages` VALUES(1414, 'Turkish', 'Expert');
INSERT INTO `list_languages` VALUES(1415, 'Lezgian', 'Expert');
INSERT INTO `list_languages` VALUES(1416, 'Russian', 'Expert');
INSERT INTO `list_languages` VALUES(1417, 'Kirundi', 'Expert');
INSERT INTO `list_languages` VALUES(1418, 'Swahili', 'Expert');
INSERT INTO `list_languages` VALUES(1419, 'Adja', 'Expert');
INSERT INTO `list_languages` VALUES(1420, 'Aizo', 'Expert');
INSERT INTO `list_languages` VALUES(1421, 'Bariba', 'Expert');
INSERT INTO `list_languages` VALUES(1422, 'Fon', 'Expert');
INSERT INTO `list_languages` VALUES(1423, 'Ful', 'Expert');
INSERT INTO `list_languages` VALUES(1424, 'Joruba', 'Expert');
INSERT INTO `list_languages` VALUES(1425, 'Somba', 'Expert');
INSERT INTO `list_languages` VALUES(1426, 'Busansi', 'Expert');
INSERT INTO `list_languages` VALUES(1427, 'Dagara', 'Expert');
INSERT INTO `list_languages` VALUES(1428, 'Dyula', 'Expert');
INSERT INTO `list_languages` VALUES(1429, 'Gurma', 'Expert');
INSERT INTO `list_languages` VALUES(1430, 'Mossi', 'Expert');
INSERT INTO `list_languages` VALUES(1431, 'Bengali', 'Expert');
INSERT INTO `list_languages` VALUES(1432, 'Chakma', 'Expert');
INSERT INTO `list_languages` VALUES(1433, 'Garo', 'Expert');
INSERT INTO `list_languages` VALUES(1434, 'Khasi', 'Expert');
INSERT INTO `list_languages` VALUES(1435, 'Marma', 'Expert');
INSERT INTO `list_languages` VALUES(1436, 'Santhali', 'Expert');
INSERT INTO `list_languages` VALUES(1437, 'Tripuri', 'Expert');
INSERT INTO `list_languages` VALUES(1438, 'Bulgariana', 'Expert');
INSERT INTO `list_languages` VALUES(1439, 'Romani', 'Expert');
INSERT INTO `list_languages` VALUES(1440, 'Creole French', 'Expert');
INSERT INTO `list_languages` VALUES(1441, 'Belorussian', 'Expert');
INSERT INTO `list_languages` VALUES(1442, 'Ukrainian', 'Expert');
INSERT INTO `list_languages` VALUES(1443, 'Garifuna', 'Expert');
INSERT INTO `list_languages` VALUES(1444, 'Maya Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1445, 'AimarÃ¡', 'Expert');
INSERT INTO `list_languages` VALUES(1446, 'GuaranÃ­', 'Expert');
INSERT INTO `list_languages` VALUES(1447, 'KetÅ¡ua', 'Expert');
INSERT INTO `list_languages` VALUES(1448, 'Japanese', 'Expert');
INSERT INTO `list_languages` VALUES(1449, 'Bajan', 'Expert');
INSERT INTO `list_languages` VALUES(1450, 'Chinese', 'Expert');
INSERT INTO `list_languages` VALUES(1451, 'Malay', 'Expert');
INSERT INTO `list_languages` VALUES(1453, 'Asami', 'Expert');
INSERT INTO `list_languages` VALUES(1454, 'Dzongkha', 'Expert');
INSERT INTO `list_languages` VALUES(1455, 'Nepali', 'Expert');
INSERT INTO `list_languages` VALUES(1456, 'Khoekhoe', 'Expert');
INSERT INTO `list_languages` VALUES(1457, 'Ndebele', 'Expert');
INSERT INTO `list_languages` VALUES(1458, 'San', 'Expert');
INSERT INTO `list_languages` VALUES(1459, 'Shona', 'Expert');
INSERT INTO `list_languages` VALUES(1460, 'Tswana', 'Expert');
INSERT INTO `list_languages` VALUES(1461, 'Banda', 'Expert');
INSERT INTO `list_languages` VALUES(1462, 'Gbaya', 'Expert');
INSERT INTO `list_languages` VALUES(1463, 'Mandjia', 'Expert');
INSERT INTO `list_languages` VALUES(1464, 'Mbum', 'Expert');
INSERT INTO `list_languages` VALUES(1465, 'Ngbaka', 'Expert');
INSERT INTO `list_languages` VALUES(1466, 'Sara', 'Expert');
INSERT INTO `list_languages` VALUES(1467, 'Eskimo Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1468, 'Punjabi', 'Expert');
INSERT INTO `list_languages` VALUES(1469, 'Romansh', 'Expert');
INSERT INTO `list_languages` VALUES(1470, 'Araucan', 'Expert');
INSERT INTO `list_languages` VALUES(1471, 'Rapa nui', 'Expert');
INSERT INTO `list_languages` VALUES(1472, 'Dong', 'Expert');
INSERT INTO `list_languages` VALUES(1473, 'Hui', 'Expert');
INSERT INTO `list_languages` VALUES(1474, 'MantÅ¡u', 'Expert');
INSERT INTO `list_languages` VALUES(1475, 'Miao', 'Expert');
INSERT INTO `list_languages` VALUES(1476, 'Mongolian', 'Expert');
INSERT INTO `list_languages` VALUES(1477, 'Puyi', 'Expert');
INSERT INTO `list_languages` VALUES(1478, 'Tibetan', 'Expert');
INSERT INTO `list_languages` VALUES(1479, 'Tujia', 'Expert');
INSERT INTO `list_languages` VALUES(1480, 'Uighur', 'Expert');
INSERT INTO `list_languages` VALUES(1481, 'Yi', 'Expert');
INSERT INTO `list_languages` VALUES(1482, 'Zhuang', 'Expert');
INSERT INTO `list_languages` VALUES(1483, 'Akan', 'Expert');
INSERT INTO `list_languages` VALUES(1484, 'Gur', 'Expert');
INSERT INTO `list_languages` VALUES(1485, 'Kru', 'Expert');
INSERT INTO `list_languages` VALUES(1486, 'Malinke', 'Expert');
INSERT INTO `list_languages` VALUES(1487, '[South]Mande', 'Expert');
INSERT INTO `list_languages` VALUES(1488, 'Bamileke-bamum', 'Expert');
INSERT INTO `list_languages` VALUES(1489, 'Duala', 'Expert');
INSERT INTO `list_languages` VALUES(1490, 'Fang', 'Expert');
INSERT INTO `list_languages` VALUES(1491, 'Maka', 'Expert');
INSERT INTO `list_languages` VALUES(1492, 'Mandara', 'Expert');
INSERT INTO `list_languages` VALUES(1493, 'Masana', 'Expert');
INSERT INTO `list_languages` VALUES(1494, 'Tikar', 'Expert');
INSERT INTO `list_languages` VALUES(1495, 'Boa', 'Expert');
INSERT INTO `list_languages` VALUES(1496, 'Luba', 'Expert');
INSERT INTO `list_languages` VALUES(1497, 'Mongo', 'Expert');
INSERT INTO `list_languages` VALUES(1498, 'Ngala and Bangi', 'Expert');
INSERT INTO `list_languages` VALUES(1499, 'Rundi', 'Expert');
INSERT INTO `list_languages` VALUES(1500, 'Rwanda', 'Expert');
INSERT INTO `list_languages` VALUES(1501, 'Teke', 'Expert');
INSERT INTO `list_languages` VALUES(1502, 'Zande', 'Expert');
INSERT INTO `list_languages` VALUES(1503, 'Mbete', 'Expert');
INSERT INTO `list_languages` VALUES(1504, 'Mboshi', 'Expert');
INSERT INTO `list_languages` VALUES(1505, 'Punu', 'Expert');
INSERT INTO `list_languages` VALUES(1506, 'Sango', 'Expert');
INSERT INTO `list_languages` VALUES(1507, 'Maori', 'Expert');
INSERT INTO `list_languages` VALUES(1508, 'Arawakan', 'Expert');
INSERT INTO `list_languages` VALUES(1509, 'Caribbean', 'Expert');
INSERT INTO `list_languages` VALUES(1510, 'Chibcha', 'Expert');
INSERT INTO `list_languages` VALUES(1511, 'Comorian', 'Expert');
INSERT INTO `list_languages` VALUES(1512, 'Comorian-Arabic', 'Expert');
INSERT INTO `list_languages` VALUES(1513, 'Comorian-French', 'Expert');
INSERT INTO `list_languages` VALUES(1514, 'Comorian-madagassi', 'Expert');
INSERT INTO `list_languages` VALUES(1515, 'Comorian-Swahili', 'Expert');
INSERT INTO `list_languages` VALUES(1516, 'Crioulo', 'Expert');
INSERT INTO `list_languages` VALUES(1517, 'Moravian', 'Expert');
INSERT INTO `list_languages` VALUES(1518, 'Silesiana', 'Expert');
INSERT INTO `list_languages` VALUES(1519, 'Slovak', 'Expert');
INSERT INTO `list_languages` VALUES(1520, 'Southern Slavic Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1521, 'Afar', 'Expert');
INSERT INTO `list_languages` VALUES(1522, 'Somali', 'Expert');
INSERT INTO `list_languages` VALUES(1523, 'Danish', 'Expert');
INSERT INTO `list_languages` VALUES(1524, 'Norwegian', 'Expert');
INSERT INTO `list_languages` VALUES(1525, 'Swedish', 'Expert');
INSERT INTO `list_languages` VALUES(1526, 'Berberi', 'Expert');
INSERT INTO `list_languages` VALUES(1527, 'Sinaberberi', 'Expert');
INSERT INTO `list_languages` VALUES(1528, 'Bilin', 'Expert');
INSERT INTO `list_languages` VALUES(1529, 'Hadareb', 'Expert');
INSERT INTO `list_languages` VALUES(1530, 'Saho', 'Expert');
INSERT INTO `list_languages` VALUES(1531, 'Tigre', 'Expert');
INSERT INTO `list_languages` VALUES(1532, 'Tigrinja', 'Expert');
INSERT INTO `list_languages` VALUES(1533, 'Basque', 'Expert');
INSERT INTO `list_languages` VALUES(1534, 'Galecian', 'Expert');
INSERT INTO `list_languages` VALUES(1535, 'Estonian', 'Expert');
INSERT INTO `list_languages` VALUES(1536, 'Finnish', 'Expert');
INSERT INTO `list_languages` VALUES(1537, 'Amhara', 'Expert');
INSERT INTO `list_languages` VALUES(1538, 'Gurage', 'Expert');
INSERT INTO `list_languages` VALUES(1539, 'Oromo', 'Expert');
INSERT INTO `list_languages` VALUES(1540, 'Sidamo', 'Expert');
INSERT INTO `list_languages` VALUES(1541, 'Walaita', 'Expert');
INSERT INTO `list_languages` VALUES(1542, 'Saame', 'Expert');
INSERT INTO `list_languages` VALUES(1543, 'Fijian', 'Expert');
INSERT INTO `list_languages` VALUES(1544, 'Faroese', 'Expert');
INSERT INTO `list_languages` VALUES(1545, 'Kosrean', 'Expert');
INSERT INTO `list_languages` VALUES(1546, 'Mortlock', 'Expert');
INSERT INTO `list_languages` VALUES(1547, 'Pohnpei', 'Expert');
INSERT INTO `list_languages` VALUES(1548, 'Trukese', 'Expert');
INSERT INTO `list_languages` VALUES(1549, 'Wolea', 'Expert');
INSERT INTO `list_languages` VALUES(1550, 'Yap', 'Expert');
INSERT INTO `list_languages` VALUES(1551, 'Mpongwe', 'Expert');
INSERT INTO `list_languages` VALUES(1552, 'Punu-sira-nzebi', 'Expert');
INSERT INTO `list_languages` VALUES(1553, 'Gaeli', 'Expert');
INSERT INTO `list_languages` VALUES(1554, 'Kymri', 'Expert');
INSERT INTO `list_languages` VALUES(1555, 'Abhyasi', 'Expert');
INSERT INTO `list_languages` VALUES(1556, 'Georgiana', 'Expert');
INSERT INTO `list_languages` VALUES(1557, 'Osseetti', 'Expert');
INSERT INTO `list_languages` VALUES(1558, 'Ewe', 'Expert');
INSERT INTO `list_languages` VALUES(1559, 'Ga-adangme', 'Expert');
INSERT INTO `list_languages` VALUES(1560, 'Kissi', 'Expert');
INSERT INTO `list_languages` VALUES(1561, 'Kpelle', 'Expert');
INSERT INTO `list_languages` VALUES(1562, 'Loma', 'Expert');
INSERT INTO `list_languages` VALUES(1563, 'Susu', 'Expert');
INSERT INTO `list_languages` VALUES(1564, 'Yalunka', 'Expert');
INSERT INTO `list_languages` VALUES(1565, 'Diola', 'Expert');
INSERT INTO `list_languages` VALUES(1566, 'Soninke', 'Expert');
INSERT INTO `list_languages` VALUES(1567, 'Wolof', 'Expert');
INSERT INTO `list_languages` VALUES(1568, 'Balante', 'Expert');
INSERT INTO `list_languages` VALUES(1569, 'Mandyako', 'Expert');
INSERT INTO `list_languages` VALUES(1570, 'Bubi', 'Expert');
INSERT INTO `list_languages` VALUES(1571, 'Greenlandic', 'Expert');
INSERT INTO `list_languages` VALUES(1572, 'Cakchiquel', 'Expert');
INSERT INTO `list_languages` VALUES(1573, 'KekchÃ­', 'Expert');
INSERT INTO `list_languages` VALUES(1574, 'Mam', 'Expert');
INSERT INTO `list_languages` VALUES(1575, 'QuichÃ©', 'Expert');
INSERT INTO `list_languages` VALUES(1576, 'Chamorro', 'Expert');
INSERT INTO `list_languages` VALUES(1577, 'Korean', 'Expert');
INSERT INTO `list_languages` VALUES(1578, 'Philippene Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1579, 'Chiu chau', 'Expert');
INSERT INTO `list_languages` VALUES(1580, 'Fukien', 'Expert');
INSERT INTO `list_languages` VALUES(1581, 'Hakka', 'Expert');
INSERT INTO `list_languages` VALUES(1582, 'Miskito', 'Expert');
INSERT INTO `list_languages` VALUES(1583, 'Haiti Creole', 'Expert');
INSERT INTO `list_languages` VALUES(1584, 'Bali', 'Expert');
INSERT INTO `list_languages` VALUES(1585, 'Banja', 'Expert');
INSERT INTO `list_languages` VALUES(1586, 'Batakki', 'Expert');
INSERT INTO `list_languages` VALUES(1587, 'Bugi', 'Expert');
INSERT INTO `list_languages` VALUES(1588, 'Javanese', 'Expert');
INSERT INTO `list_languages` VALUES(1589, 'Madura', 'Expert');
INSERT INTO `list_languages` VALUES(1590, 'Minangkabau', 'Expert');
INSERT INTO `list_languages` VALUES(1591, 'Sunda', 'Expert');
INSERT INTO `list_languages` VALUES(1592, 'Gujarati', 'Expert');
INSERT INTO `list_languages` VALUES(1593, 'Kannada', 'Expert');
INSERT INTO `list_languages` VALUES(1594, 'Malajalam', 'Expert');
INSERT INTO `list_languages` VALUES(1595, 'Marathi', 'Expert');
INSERT INTO `list_languages` VALUES(1596, 'Orija', 'Expert');
INSERT INTO `list_languages` VALUES(1597, 'Tamil', 'Expert');
INSERT INTO `list_languages` VALUES(1598, 'Telugu', 'Expert');
INSERT INTO `list_languages` VALUES(1599, 'Urdu', 'Expert');
INSERT INTO `list_languages` VALUES(1600, 'Irish', 'Expert');
INSERT INTO `list_languages` VALUES(1601, 'Bakhtyari', 'Expert');
INSERT INTO `list_languages` VALUES(1602, 'Gilaki', 'Expert');
INSERT INTO `list_languages` VALUES(1603, 'Kurdish', 'Expert');
INSERT INTO `list_languages` VALUES(1604, 'Luri', 'Expert');
INSERT INTO `list_languages` VALUES(1605, 'Mazandarani', 'Expert');
INSERT INTO `list_languages` VALUES(1606, 'Persian', 'Expert');
INSERT INTO `list_languages` VALUES(1607, 'Assyrian', 'Expert');
INSERT INTO `list_languages` VALUES(1608, 'Icelandic', 'Expert');
INSERT INTO `list_languages` VALUES(1609, 'Hebrew', 'Expert');
INSERT INTO `list_languages` VALUES(1610, 'Friuli', 'Expert');
INSERT INTO `list_languages` VALUES(1611, 'Sardinian', 'Expert');
INSERT INTO `list_languages` VALUES(1612, 'Circassian', 'Expert');
INSERT INTO `list_languages` VALUES(1613, 'Ainu', 'Expert');
INSERT INTO `list_languages` VALUES(1614, 'Kazakh', 'Expert');
INSERT INTO `list_languages` VALUES(1615, 'Tatar', 'Expert');
INSERT INTO `list_languages` VALUES(1616, 'Gusii', 'Expert');
INSERT INTO `list_languages` VALUES(1617, 'Kalenjin', 'Expert');
INSERT INTO `list_languages` VALUES(1618, 'Kamba', 'Expert');
INSERT INTO `list_languages` VALUES(1619, 'Kikuyu', 'Expert');
INSERT INTO `list_languages` VALUES(1620, 'Luhya', 'Expert');
INSERT INTO `list_languages` VALUES(1621, 'Luo', 'Expert');
INSERT INTO `list_languages` VALUES(1622, 'Masai', 'Expert');
INSERT INTO `list_languages` VALUES(1623, 'Meru', 'Expert');
INSERT INTO `list_languages` VALUES(1624, 'Nyika', 'Expert');
INSERT INTO `list_languages` VALUES(1625, 'Turkana', 'Expert');
INSERT INTO `list_languages` VALUES(1626, 'Kirgiz', 'Expert');
INSERT INTO `list_languages` VALUES(1627, 'Tadzhik', 'Expert');
INSERT INTO `list_languages` VALUES(1628, 'Khmer', 'Expert');
INSERT INTO `list_languages` VALUES(1629, 'TÅ¡am', 'Expert');
INSERT INTO `list_languages` VALUES(1630, 'Kiribati', 'Expert');
INSERT INTO `list_languages` VALUES(1631, 'Tuvalu', 'Expert');
INSERT INTO `list_languages` VALUES(1632, 'Lao', 'Expert');
INSERT INTO `list_languages` VALUES(1633, 'Lao-Soung', 'Expert');
INSERT INTO `list_languages` VALUES(1634, 'Mon-khmer', 'Expert');
INSERT INTO `list_languages` VALUES(1635, 'Thai', 'Expert');
INSERT INTO `list_languages` VALUES(1636, 'Bassa', 'Expert');
INSERT INTO `list_languages` VALUES(1637, 'Gio', 'Expert');
INSERT INTO `list_languages` VALUES(1638, 'Grebo', 'Expert');
INSERT INTO `list_languages` VALUES(1639, 'Mano', 'Expert');
INSERT INTO `list_languages` VALUES(1640, 'Mixed Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1641, 'Singali', 'Expert');
INSERT INTO `list_languages` VALUES(1642, 'Sotho', 'Expert');
INSERT INTO `list_languages` VALUES(1643, 'Zulu', 'Expert');
INSERT INTO `list_languages` VALUES(1644, 'Lithuanian', 'Expert');
INSERT INTO `list_languages` VALUES(1645, 'Luxembourgish', 'Expert');
INSERT INTO `list_languages` VALUES(1646, 'Latvian', 'Expert');
INSERT INTO `list_languages` VALUES(1647, 'Mandarin Chinese', 'Expert');
INSERT INTO `list_languages` VALUES(1648, 'Monegasque', 'Expert');
INSERT INTO `list_languages` VALUES(1649, 'Gagauzi', 'Expert');
INSERT INTO `list_languages` VALUES(1650, 'Malagasy', 'Expert');
INSERT INTO `list_languages` VALUES(1651, 'Dhivehi', 'Expert');
INSERT INTO `list_languages` VALUES(1652, 'Mixtec', 'Expert');
INSERT INTO `list_languages` VALUES(1653, 'NÃ¡huatl', 'Expert');
INSERT INTO `list_languages` VALUES(1654, 'OtomÃ­', 'Expert');
INSERT INTO `list_languages` VALUES(1655, 'Yucatec', 'Expert');
INSERT INTO `list_languages` VALUES(1656, 'Zapotec', 'Expert');
INSERT INTO `list_languages` VALUES(1657, 'Marshallese', 'Expert');
INSERT INTO `list_languages` VALUES(1658, 'Bambara', 'Expert');
INSERT INTO `list_languages` VALUES(1659, 'Senufo and Minianka', 'Expert');
INSERT INTO `list_languages` VALUES(1660, 'Songhai', 'Expert');
INSERT INTO `list_languages` VALUES(1661, 'Tamashek', 'Expert');
INSERT INTO `list_languages` VALUES(1662, 'Maltese', 'Expert');
INSERT INTO `list_languages` VALUES(1663, 'Burmese', 'Expert');
INSERT INTO `list_languages` VALUES(1664, 'Chin', 'Expert');
INSERT INTO `list_languages` VALUES(1665, 'Kachin', 'Expert');
INSERT INTO `list_languages` VALUES(1666, 'Karen', 'Expert');
INSERT INTO `list_languages` VALUES(1667, 'Kayah', 'Expert');
INSERT INTO `list_languages` VALUES(1668, 'Mon', 'Expert');
INSERT INTO `list_languages` VALUES(1669, 'Rakhine', 'Expert');
INSERT INTO `list_languages` VALUES(1670, 'Shan', 'Expert');
INSERT INTO `list_languages` VALUES(1671, 'Bajad', 'Expert');
INSERT INTO `list_languages` VALUES(1672, 'Buryat', 'Expert');
INSERT INTO `list_languages` VALUES(1673, 'Dariganga', 'Expert');
INSERT INTO `list_languages` VALUES(1674, 'Dorbet', 'Expert');
INSERT INTO `list_languages` VALUES(1675, 'Carolinian', 'Expert');
INSERT INTO `list_languages` VALUES(1676, 'Chuabo', 'Expert');
INSERT INTO `list_languages` VALUES(1677, 'Lomwe', 'Expert');
INSERT INTO `list_languages` VALUES(1678, 'Makua', 'Expert');
INSERT INTO `list_languages` VALUES(1679, 'Marendje', 'Expert');
INSERT INTO `list_languages` VALUES(1680, 'Nyanja', 'Expert');
INSERT INTO `list_languages` VALUES(1681, 'Ronga', 'Expert');
INSERT INTO `list_languages` VALUES(1682, 'Sena', 'Expert');
INSERT INTO `list_languages` VALUES(1683, 'Tsonga', 'Expert');
INSERT INTO `list_languages` VALUES(1684, 'Tswa', 'Expert');
INSERT INTO `list_languages` VALUES(1685, 'Hassaniya', 'Expert');
INSERT INTO `list_languages` VALUES(1686, 'Tukulor', 'Expert');
INSERT INTO `list_languages` VALUES(1687, 'Zenaga', 'Expert');
INSERT INTO `list_languages` VALUES(1688, 'Bhojpuri', 'Expert');
INSERT INTO `list_languages` VALUES(1689, 'Chichewa', 'Expert');
INSERT INTO `list_languages` VALUES(1690, 'Ngoni', 'Expert');
INSERT INTO `list_languages` VALUES(1691, 'Yao', 'Expert');
INSERT INTO `list_languages` VALUES(1692, 'Dusun', 'Expert');
INSERT INTO `list_languages` VALUES(1693, 'Iban', 'Expert');
INSERT INTO `list_languages` VALUES(1694, 'MahorÃ©', 'Expert');
INSERT INTO `list_languages` VALUES(1695, 'Afrikaans', 'Expert');
INSERT INTO `list_languages` VALUES(1696, 'Caprivi', 'Expert');
INSERT INTO `list_languages` VALUES(1697, 'Herero', 'Expert');
INSERT INTO `list_languages` VALUES(1698, 'Kavango', 'Expert');
INSERT INTO `list_languages` VALUES(1699, 'Nama', 'Expert');
INSERT INTO `list_languages` VALUES(1700, 'Ovambo', 'Expert');
INSERT INTO `list_languages` VALUES(1701, 'Malenasian Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1702, 'Polynesian Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1703, 'Hausa', 'Expert');
INSERT INTO `list_languages` VALUES(1704, 'Kanuri', 'Expert');
INSERT INTO `list_languages` VALUES(1705, 'Songhai-zerma', 'Expert');
INSERT INTO `list_languages` VALUES(1706, 'Bura', 'Expert');
INSERT INTO `list_languages` VALUES(1707, 'Edo', 'Expert');
INSERT INTO `list_languages` VALUES(1708, 'Ibibio', 'Expert');
INSERT INTO `list_languages` VALUES(1709, 'Ibo', 'Expert');
INSERT INTO `list_languages` VALUES(1710, 'Ijo', 'Expert');
INSERT INTO `list_languages` VALUES(1711, 'Tiv', 'Expert');
INSERT INTO `list_languages` VALUES(1712, 'Sumo', 'Expert');
INSERT INTO `list_languages` VALUES(1713, 'Niue', 'Expert');
INSERT INTO `list_languages` VALUES(1714, 'Fries', 'Expert');
INSERT INTO `list_languages` VALUES(1715, 'Maithili', 'Expert');
INSERT INTO `list_languages` VALUES(1716, 'Newari', 'Expert');
INSERT INTO `list_languages` VALUES(1717, 'Tamang', 'Expert');
INSERT INTO `list_languages` VALUES(1718, 'Tharu', 'Expert');
INSERT INTO `list_languages` VALUES(1719, 'Nauru', 'Expert');
INSERT INTO `list_languages` VALUES(1720, 'Brahui', 'Expert');
INSERT INTO `list_languages` VALUES(1721, 'Hindko', 'Expert');
INSERT INTO `list_languages` VALUES(1722, 'Saraiki', 'Expert');
INSERT INTO `list_languages` VALUES(1723, 'Sindhi', 'Expert');
INSERT INTO `list_languages` VALUES(1724, 'Cuna', 'Expert');
INSERT INTO `list_languages` VALUES(1725, 'Embera', 'Expert');
INSERT INTO `list_languages` VALUES(1726, 'GuaymÃ­', 'Expert');
INSERT INTO `list_languages` VALUES(1727, 'Pitcairnese', 'Expert');
INSERT INTO `list_languages` VALUES(1728, 'Bicol', 'Expert');
INSERT INTO `list_languages` VALUES(1729, 'Cebuano', 'Expert');
INSERT INTO `list_languages` VALUES(1730, 'Hiligaynon', 'Expert');
INSERT INTO `list_languages` VALUES(1731, 'Ilocano', 'Expert');
INSERT INTO `list_languages` VALUES(1732, 'Maguindanao', 'Expert');
INSERT INTO `list_languages` VALUES(1733, 'Maranao', 'Expert');
INSERT INTO `list_languages` VALUES(1734, 'Pampango', 'Expert');
INSERT INTO `list_languages` VALUES(1735, 'Pangasinan', 'Expert');
INSERT INTO `list_languages` VALUES(1736, 'Pilipino', 'Expert');
INSERT INTO `list_languages` VALUES(1737, 'Waray-waray', 'Expert');
INSERT INTO `list_languages` VALUES(1738, 'Palau', 'Expert');
INSERT INTO `list_languages` VALUES(1739, 'Papuan Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1740, 'Tahitian', 'Expert');
INSERT INTO `list_languages` VALUES(1741, 'Avarian', 'Expert');
INSERT INTO `list_languages` VALUES(1742, 'Bashkir', 'Expert');
INSERT INTO `list_languages` VALUES(1743, 'Chechen', 'Expert');
INSERT INTO `list_languages` VALUES(1744, 'Chuvash', 'Expert');
INSERT INTO `list_languages` VALUES(1745, 'Mari', 'Expert');
INSERT INTO `list_languages` VALUES(1746, 'Mordva', 'Expert');
INSERT INTO `list_languages` VALUES(1747, 'Udmur', 'Expert');
INSERT INTO `list_languages` VALUES(1748, 'Bari', 'Expert');
INSERT INTO `list_languages` VALUES(1749, 'Beja', 'Expert');
INSERT INTO `list_languages` VALUES(1750, 'Chilluk', 'Expert');
INSERT INTO `list_languages` VALUES(1751, 'Dinka', 'Expert');
INSERT INTO `list_languages` VALUES(1752, 'Fur', 'Expert');
INSERT INTO `list_languages` VALUES(1753, 'Lotuko', 'Expert');
INSERT INTO `list_languages` VALUES(1754, 'Nubian Languages', 'Expert');
INSERT INTO `list_languages` VALUES(1755, 'Nuer', 'Expert');
INSERT INTO `list_languages` VALUES(1756, 'Serer', 'Expert');
INSERT INTO `list_languages` VALUES(1757, 'Bullom-sherbro', 'Expert');
INSERT INTO `list_languages` VALUES(1758, 'Kono-vai', 'Expert');
INSERT INTO `list_languages` VALUES(1759, 'Kuranko', 'Expert');
INSERT INTO `list_languages` VALUES(1760, 'Limba', 'Expert');
INSERT INTO `list_languages` VALUES(1761, 'Mende', 'Expert');
INSERT INTO `list_languages` VALUES(1762, 'Temne', 'Expert');
INSERT INTO `list_languages` VALUES(1763, 'Nahua', 'Expert');
INSERT INTO `list_languages` VALUES(1764, 'Sranantonga', 'Expert');
INSERT INTO `list_languages` VALUES(1765, 'Czech and Moravian', 'Expert');
INSERT INTO `list_languages` VALUES(1766, 'Ukrainian and Russian', 'Expert');
INSERT INTO `list_languages` VALUES(1767, 'Swazi', 'Expert');
INSERT INTO `list_languages` VALUES(1768, 'Seselwa', 'Expert');
INSERT INTO `list_languages` VALUES(1769, 'Gorane', 'Expert');
INSERT INTO `list_languages` VALUES(1770, 'Hadjarai', 'Expert');
INSERT INTO `list_languages` VALUES(1771, 'Kanem-bornu', 'Expert');
INSERT INTO `list_languages` VALUES(1772, 'Mayo-kebbi', 'Expert');
INSERT INTO `list_languages` VALUES(1773, 'Ouaddai', 'Expert');
INSERT INTO `list_languages` VALUES(1774, 'Tandjile', 'Expert');
INSERT INTO `list_languages` VALUES(1775, 'Ane', 'Expert');
INSERT INTO `list_languages` VALUES(1776, 'KabyÃ©', 'Expert');
INSERT INTO `list_languages` VALUES(1777, 'Kotokoli', 'Expert');
INSERT INTO `list_languages` VALUES(1778, 'Moba', 'Expert');
INSERT INTO `list_languages` VALUES(1779, 'Naudemba', 'Expert');
INSERT INTO `list_languages` VALUES(1780, 'Watyi', 'Expert');
INSERT INTO `list_languages` VALUES(1781, 'Kuy', 'Expert');
INSERT INTO `list_languages` VALUES(1782, 'Tokelau', 'Expert');
INSERT INTO `list_languages` VALUES(1783, 'Arabic-French', 'Expert');
INSERT INTO `list_languages` VALUES(1785, 'Ami', 'Expert');
INSERT INTO `list_languages` VALUES(1786, 'Atayal', 'Expert');
INSERT INTO `list_languages` VALUES(1787, 'Min', 'Expert');
INSERT INTO `list_languages` VALUES(1788, 'Paiwan', 'Expert');
INSERT INTO `list_languages` VALUES(1789, 'Chaga and Pare', 'Expert');
INSERT INTO `list_languages` VALUES(1790, 'Gogo', 'Expert');
INSERT INTO `list_languages` VALUES(1791, 'Ha', 'Expert');
INSERT INTO `list_languages` VALUES(1792, 'Haya', 'Expert');
INSERT INTO `list_languages` VALUES(1793, 'Hehet', 'Expert');
INSERT INTO `list_languages` VALUES(1794, 'Luguru', 'Expert');
INSERT INTO `list_languages` VALUES(1795, 'Makonde', 'Expert');
INSERT INTO `list_languages` VALUES(1796, 'Nyakusa', 'Expert');
INSERT INTO `list_languages` VALUES(1797, 'Nyamwesi', 'Expert');
INSERT INTO `list_languages` VALUES(1798, 'Shambala', 'Expert');
INSERT INTO `list_languages` VALUES(1799, 'Acholi', 'Expert');
INSERT INTO `list_languages` VALUES(1800, 'Ganda', 'Expert');
INSERT INTO `list_languages` VALUES(1801, 'Gisu', 'Expert');
INSERT INTO `list_languages` VALUES(1802, 'Kiga', 'Expert');
INSERT INTO `list_languages` VALUES(1803, 'Lango', 'Expert');
INSERT INTO `list_languages` VALUES(1804, 'Lugbara', 'Expert');
INSERT INTO `list_languages` VALUES(1805, 'Nkole', 'Expert');
INSERT INTO `list_languages` VALUES(1806, 'Soga', 'Expert');
INSERT INTO `list_languages` VALUES(1807, 'Teso', 'Expert');
INSERT INTO `list_languages` VALUES(1808, 'Tagalog', 'Expert');
INSERT INTO `list_languages` VALUES(1809, 'Karakalpak', 'Expert');
INSERT INTO `list_languages` VALUES(1810, 'Goajiro', 'Expert');
INSERT INTO `list_languages` VALUES(1811, 'Warrau', 'Expert');
INSERT INTO `list_languages` VALUES(1812, 'Man', 'Expert');
INSERT INTO `list_languages` VALUES(1813, 'Muong', 'Expert');
INSERT INTO `list_languages` VALUES(1814, 'Nung', 'Expert');
INSERT INTO `list_languages` VALUES(1815, 'Tho', 'Expert');
INSERT INTO `list_languages` VALUES(1816, 'Bislama', 'Expert');
INSERT INTO `list_languages` VALUES(1817, 'Futuna', 'Expert');
INSERT INTO `list_languages` VALUES(1818, 'Wallis', 'Expert');
INSERT INTO `list_languages` VALUES(1820, 'Soqutri', 'Expert');
INSERT INTO `list_languages` VALUES(1821, 'Northsotho', 'Expert');
INSERT INTO `list_languages` VALUES(1822, 'Southsotho', 'Expert');
INSERT INTO `list_languages` VALUES(1823, 'Venda', 'Expert');
INSERT INTO `list_languages` VALUES(1824, 'Xhosa', 'Expert');
INSERT INTO `list_languages` VALUES(1825, 'Bemba', 'Expert');
INSERT INTO `list_languages` VALUES(1826, 'Chewa', 'Expert');
INSERT INTO `list_languages` VALUES(1827, 'Lozi', 'Expert');
INSERT INTO `list_languages` VALUES(1828, 'Nsenga', 'Expert');
INSERT INTO `list_languages` VALUES(1829, 'Dutch', 'Native');
INSERT INTO `list_languages` VALUES(1830, 'English', 'Native');
INSERT INTO `list_languages` VALUES(1831, 'Papiamento', 'Native');
INSERT INTO `list_languages` VALUES(1832, 'Spanish', 'Native');
INSERT INTO `list_languages` VALUES(1833, 'Balochi', 'Native');
INSERT INTO `list_languages` VALUES(1834, 'Dari', 'Native');
INSERT INTO `list_languages` VALUES(1835, 'Pashto', 'Native');
INSERT INTO `list_languages` VALUES(1836, 'Turkmenian', 'Native');
INSERT INTO `list_languages` VALUES(1837, 'Uzbek', 'Native');
INSERT INTO `list_languages` VALUES(1838, 'Ambo', 'Native');
INSERT INTO `list_languages` VALUES(1839, 'Chokwe', 'Native');
INSERT INTO `list_languages` VALUES(1840, 'Kongo', 'Native');
INSERT INTO `list_languages` VALUES(1841, 'Luchazi', 'Native');
INSERT INTO `list_languages` VALUES(1842, 'Luimbe-nganguela', 'Native');
INSERT INTO `list_languages` VALUES(1843, 'Luvale', 'Native');
INSERT INTO `list_languages` VALUES(1844, 'Mbundu', 'Native');
INSERT INTO `list_languages` VALUES(1845, 'Nyaneka-nkhumbi', 'Native');
INSERT INTO `list_languages` VALUES(1846, 'Ovimbundu', 'Native');
INSERT INTO `list_languages` VALUES(1847, 'Albaniana', 'Native');
INSERT INTO `list_languages` VALUES(1848, 'Greek', 'Native');
INSERT INTO `list_languages` VALUES(1849, 'Macedonian', 'Native');
INSERT INTO `list_languages` VALUES(1850, 'Catalan', 'Native');
INSERT INTO `list_languages` VALUES(1851, 'French', 'Native');
INSERT INTO `list_languages` VALUES(1852, 'Portuguese', 'Native');
INSERT INTO `list_languages` VALUES(1853, 'Arabic', 'Native');
INSERT INTO `list_languages` VALUES(1854, 'Hindi', 'Native');
INSERT INTO `list_languages` VALUES(1855, 'Indian Languages', 'Native');
INSERT INTO `list_languages` VALUES(1856, 'Italian', 'Native');
INSERT INTO `list_languages` VALUES(1857, 'Armenian', 'Native');
INSERT INTO `list_languages` VALUES(1858, 'Azerbaijani', 'Native');
INSERT INTO `list_languages` VALUES(1859, 'Samoan', 'Native');
INSERT INTO `list_languages` VALUES(1860, 'Tongan', 'Native');
INSERT INTO `list_languages` VALUES(1862, 'Canton Chinese', 'Native');
INSERT INTO `list_languages` VALUES(1863, 'German', 'Native');
INSERT INTO `list_languages` VALUES(1864, 'Serbo-Croatian', 'Native');
INSERT INTO `list_languages` VALUES(1865, 'Vietnamese', 'Native');
INSERT INTO `list_languages` VALUES(1866, 'Czech', 'Native');
INSERT INTO `list_languages` VALUES(1867, 'Hungarian', 'Native');
INSERT INTO `list_languages` VALUES(1868, 'Polish', 'Native');
INSERT INTO `list_languages` VALUES(1869, 'Romanian', 'Native');
INSERT INTO `list_languages` VALUES(1870, 'Slovene', 'Native');
INSERT INTO `list_languages` VALUES(1871, 'Turkish', 'Native');
INSERT INTO `list_languages` VALUES(1872, 'Lezgian', 'Native');
INSERT INTO `list_languages` VALUES(1873, 'Russian', 'Native');
INSERT INTO `list_languages` VALUES(1874, 'Kirundi', 'Native');
INSERT INTO `list_languages` VALUES(1875, 'Swahili', 'Native');
INSERT INTO `list_languages` VALUES(1876, 'Adja', 'Native');
INSERT INTO `list_languages` VALUES(1877, 'Aizo', 'Native');
INSERT INTO `list_languages` VALUES(1878, 'Bariba', 'Native');
INSERT INTO `list_languages` VALUES(1879, 'Fon', 'Native');
INSERT INTO `list_languages` VALUES(1880, 'Ful', 'Native');
INSERT INTO `list_languages` VALUES(1881, 'Joruba', 'Native');
INSERT INTO `list_languages` VALUES(1882, 'Somba', 'Native');
INSERT INTO `list_languages` VALUES(1883, 'Busansi', 'Native');
INSERT INTO `list_languages` VALUES(1884, 'Dagara', 'Native');
INSERT INTO `list_languages` VALUES(1885, 'Dyula', 'Native');
INSERT INTO `list_languages` VALUES(1886, 'Gurma', 'Native');
INSERT INTO `list_languages` VALUES(1887, 'Mossi', 'Native');
INSERT INTO `list_languages` VALUES(1888, 'Bengali', 'Native');
INSERT INTO `list_languages` VALUES(1889, 'Chakma', 'Native');
INSERT INTO `list_languages` VALUES(1890, 'Garo', 'Native');
INSERT INTO `list_languages` VALUES(1891, 'Khasi', 'Native');
INSERT INTO `list_languages` VALUES(1892, 'Marma', 'Native');
INSERT INTO `list_languages` VALUES(1893, 'Santhali', 'Native');
INSERT INTO `list_languages` VALUES(1894, 'Tripuri', 'Native');
INSERT INTO `list_languages` VALUES(1895, 'Bulgariana', 'Native');
INSERT INTO `list_languages` VALUES(1896, 'Romani', 'Native');
INSERT INTO `list_languages` VALUES(1897, 'Creole French', 'Native');
INSERT INTO `list_languages` VALUES(1898, 'Belorussian', 'Native');
INSERT INTO `list_languages` VALUES(1899, 'Ukrainian', 'Native');
INSERT INTO `list_languages` VALUES(1900, 'Garifuna', 'Native');
INSERT INTO `list_languages` VALUES(1901, 'Maya Languages', 'Native');
INSERT INTO `list_languages` VALUES(1902, 'AimarÃ¡', 'Native');
INSERT INTO `list_languages` VALUES(1903, 'GuaranÃ­', 'Native');
INSERT INTO `list_languages` VALUES(1904, 'KetÅ¡ua', 'Native');
INSERT INTO `list_languages` VALUES(1905, 'Japanese', 'Native');
INSERT INTO `list_languages` VALUES(1906, 'Bajan', 'Native');
INSERT INTO `list_languages` VALUES(1907, 'Chinese', 'Native');
INSERT INTO `list_languages` VALUES(1908, 'Malay', 'Native');
INSERT INTO `list_languages` VALUES(1910, 'Asami', 'Native');
INSERT INTO `list_languages` VALUES(1911, 'Dzongkha', 'Native');
INSERT INTO `list_languages` VALUES(1912, 'Nepali', 'Native');
INSERT INTO `list_languages` VALUES(1913, 'Khoekhoe', 'Native');
INSERT INTO `list_languages` VALUES(1914, 'Ndebele', 'Native');
INSERT INTO `list_languages` VALUES(1915, 'San', 'Native');
INSERT INTO `list_languages` VALUES(1916, 'Shona', 'Native');
INSERT INTO `list_languages` VALUES(1917, 'Tswana', 'Native');
INSERT INTO `list_languages` VALUES(1918, 'Banda', 'Native');
INSERT INTO `list_languages` VALUES(1919, 'Gbaya', 'Native');
INSERT INTO `list_languages` VALUES(1920, 'Mandjia', 'Native');
INSERT INTO `list_languages` VALUES(1921, 'Mbum', 'Native');
INSERT INTO `list_languages` VALUES(1922, 'Ngbaka', 'Native');
INSERT INTO `list_languages` VALUES(1923, 'Sara', 'Native');
INSERT INTO `list_languages` VALUES(1924, 'Eskimo Languages', 'Native');
INSERT INTO `list_languages` VALUES(1925, 'Punjabi', 'Native');
INSERT INTO `list_languages` VALUES(1926, 'Romansh', 'Native');
INSERT INTO `list_languages` VALUES(1927, 'Araucan', 'Native');
INSERT INTO `list_languages` VALUES(1928, 'Rapa nui', 'Native');
INSERT INTO `list_languages` VALUES(1929, 'Dong', 'Native');
INSERT INTO `list_languages` VALUES(1930, 'Hui', 'Native');
INSERT INTO `list_languages` VALUES(1931, 'MantÅ¡u', 'Native');
INSERT INTO `list_languages` VALUES(1932, 'Miao', 'Native');
INSERT INTO `list_languages` VALUES(1933, 'Mongolian', 'Native');
INSERT INTO `list_languages` VALUES(1934, 'Puyi', 'Native');
INSERT INTO `list_languages` VALUES(1935, 'Tibetan', 'Native');
INSERT INTO `list_languages` VALUES(1936, 'Tujia', 'Native');
INSERT INTO `list_languages` VALUES(1937, 'Uighur', 'Native');
INSERT INTO `list_languages` VALUES(1938, 'Yi', 'Native');
INSERT INTO `list_languages` VALUES(1939, 'Zhuang', 'Native');
INSERT INTO `list_languages` VALUES(1940, 'Akan', 'Native');
INSERT INTO `list_languages` VALUES(1941, 'Gur', 'Native');
INSERT INTO `list_languages` VALUES(1942, 'Kru', 'Native');
INSERT INTO `list_languages` VALUES(1943, 'Malinke', 'Native');
INSERT INTO `list_languages` VALUES(1944, '[South]Mande', 'Native');
INSERT INTO `list_languages` VALUES(1945, 'Bamileke-bamum', 'Native');
INSERT INTO `list_languages` VALUES(1946, 'Duala', 'Native');
INSERT INTO `list_languages` VALUES(1947, 'Fang', 'Native');
INSERT INTO `list_languages` VALUES(1948, 'Maka', 'Native');
INSERT INTO `list_languages` VALUES(1949, 'Mandara', 'Native');
INSERT INTO `list_languages` VALUES(1950, 'Masana', 'Native');
INSERT INTO `list_languages` VALUES(1951, 'Tikar', 'Native');
INSERT INTO `list_languages` VALUES(1952, 'Boa', 'Native');
INSERT INTO `list_languages` VALUES(1953, 'Luba', 'Native');
INSERT INTO `list_languages` VALUES(1954, 'Mongo', 'Native');
INSERT INTO `list_languages` VALUES(1955, 'Ngala and Bangi', 'Native');
INSERT INTO `list_languages` VALUES(1956, 'Rundi', 'Native');
INSERT INTO `list_languages` VALUES(1957, 'Rwanda', 'Native');
INSERT INTO `list_languages` VALUES(1958, 'Teke', 'Native');
INSERT INTO `list_languages` VALUES(1959, 'Zande', 'Native');
INSERT INTO `list_languages` VALUES(1960, 'Mbete', 'Native');
INSERT INTO `list_languages` VALUES(1961, 'Mboshi', 'Native');
INSERT INTO `list_languages` VALUES(1962, 'Punu', 'Native');
INSERT INTO `list_languages` VALUES(1963, 'Sango', 'Native');
INSERT INTO `list_languages` VALUES(1964, 'Maori', 'Native');
INSERT INTO `list_languages` VALUES(1965, 'Arawakan', 'Native');
INSERT INTO `list_languages` VALUES(1966, 'Caribbean', 'Native');
INSERT INTO `list_languages` VALUES(1967, 'Chibcha', 'Native');
INSERT INTO `list_languages` VALUES(1968, 'Comorian', 'Native');
INSERT INTO `list_languages` VALUES(1969, 'Comorian-Arabic', 'Native');
INSERT INTO `list_languages` VALUES(1970, 'Comorian-French', 'Native');
INSERT INTO `list_languages` VALUES(1971, 'Comorian-madagassi', 'Native');
INSERT INTO `list_languages` VALUES(1972, 'Comorian-Swahili', 'Native');
INSERT INTO `list_languages` VALUES(1973, 'Crioulo', 'Native');
INSERT INTO `list_languages` VALUES(1974, 'Moravian', 'Native');
INSERT INTO `list_languages` VALUES(1975, 'Silesiana', 'Native');
INSERT INTO `list_languages` VALUES(1976, 'Slovak', 'Native');
INSERT INTO `list_languages` VALUES(1977, 'Southern Slavic Languages', 'Native');
INSERT INTO `list_languages` VALUES(1978, 'Afar', 'Native');
INSERT INTO `list_languages` VALUES(1979, 'Somali', 'Native');
INSERT INTO `list_languages` VALUES(1980, 'Danish', 'Native');
INSERT INTO `list_languages` VALUES(1981, 'Norwegian', 'Native');
INSERT INTO `list_languages` VALUES(1982, 'Swedish', 'Native');
INSERT INTO `list_languages` VALUES(1983, 'Berberi', 'Native');
INSERT INTO `list_languages` VALUES(1984, 'Sinaberberi', 'Native');
INSERT INTO `list_languages` VALUES(1985, 'Bilin', 'Native');
INSERT INTO `list_languages` VALUES(1986, 'Hadareb', 'Native');
INSERT INTO `list_languages` VALUES(1987, 'Saho', 'Native');
INSERT INTO `list_languages` VALUES(1988, 'Tigre', 'Native');
INSERT INTO `list_languages` VALUES(1989, 'Tigrinja', 'Native');
INSERT INTO `list_languages` VALUES(1990, 'Basque', 'Native');
INSERT INTO `list_languages` VALUES(1991, 'Galecian', 'Native');
INSERT INTO `list_languages` VALUES(1992, 'Estonian', 'Native');
INSERT INTO `list_languages` VALUES(1993, 'Finnish', 'Native');
INSERT INTO `list_languages` VALUES(1994, 'Amhara', 'Native');
INSERT INTO `list_languages` VALUES(1995, 'Gurage', 'Native');
INSERT INTO `list_languages` VALUES(1996, 'Oromo', 'Native');
INSERT INTO `list_languages` VALUES(1997, 'Sidamo', 'Native');
INSERT INTO `list_languages` VALUES(1998, 'Walaita', 'Native');
INSERT INTO `list_languages` VALUES(1999, 'Saame', 'Native');
INSERT INTO `list_languages` VALUES(2000, 'Fijian', 'Native');
INSERT INTO `list_languages` VALUES(2001, 'Faroese', 'Native');
INSERT INTO `list_languages` VALUES(2002, 'Kosrean', 'Native');
INSERT INTO `list_languages` VALUES(2003, 'Mortlock', 'Native');
INSERT INTO `list_languages` VALUES(2004, 'Pohnpei', 'Native');
INSERT INTO `list_languages` VALUES(2005, 'Trukese', 'Native');
INSERT INTO `list_languages` VALUES(2006, 'Wolea', 'Native');
INSERT INTO `list_languages` VALUES(2007, 'Yap', 'Native');
INSERT INTO `list_languages` VALUES(2008, 'Mpongwe', 'Native');
INSERT INTO `list_languages` VALUES(2009, 'Punu-sira-nzebi', 'Native');
INSERT INTO `list_languages` VALUES(2010, 'Gaeli', 'Native');
INSERT INTO `list_languages` VALUES(2011, 'Kymri', 'Native');
INSERT INTO `list_languages` VALUES(2012, 'Abhyasi', 'Native');
INSERT INTO `list_languages` VALUES(2013, 'Georgiana', 'Native');
INSERT INTO `list_languages` VALUES(2014, 'Osseetti', 'Native');
INSERT INTO `list_languages` VALUES(2015, 'Ewe', 'Native');
INSERT INTO `list_languages` VALUES(2016, 'Ga-adangme', 'Native');
INSERT INTO `list_languages` VALUES(2017, 'Kissi', 'Native');
INSERT INTO `list_languages` VALUES(2018, 'Kpelle', 'Native');
INSERT INTO `list_languages` VALUES(2019, 'Loma', 'Native');
INSERT INTO `list_languages` VALUES(2020, 'Susu', 'Native');
INSERT INTO `list_languages` VALUES(2021, 'Yalunka', 'Native');
INSERT INTO `list_languages` VALUES(2022, 'Diola', 'Native');
INSERT INTO `list_languages` VALUES(2023, 'Soninke', 'Native');
INSERT INTO `list_languages` VALUES(2024, 'Wolof', 'Native');
INSERT INTO `list_languages` VALUES(2025, 'Balante', 'Native');
INSERT INTO `list_languages` VALUES(2026, 'Mandyako', 'Native');
INSERT INTO `list_languages` VALUES(2027, 'Bubi', 'Native');
INSERT INTO `list_languages` VALUES(2028, 'Greenlandic', 'Native');
INSERT INTO `list_languages` VALUES(2029, 'Cakchiquel', 'Native');
INSERT INTO `list_languages` VALUES(2030, 'KekchÃ­', 'Native');
INSERT INTO `list_languages` VALUES(2031, 'Mam', 'Native');
INSERT INTO `list_languages` VALUES(2032, 'QuichÃ©', 'Native');
INSERT INTO `list_languages` VALUES(2033, 'Chamorro', 'Native');
INSERT INTO `list_languages` VALUES(2034, 'Korean', 'Native');
INSERT INTO `list_languages` VALUES(2035, 'Philippene Languages', 'Native');
INSERT INTO `list_languages` VALUES(2036, 'Chiu chau', 'Native');
INSERT INTO `list_languages` VALUES(2037, 'Fukien', 'Native');
INSERT INTO `list_languages` VALUES(2038, 'Hakka', 'Native');
INSERT INTO `list_languages` VALUES(2039, 'Miskito', 'Native');
INSERT INTO `list_languages` VALUES(2040, 'Haiti Creole', 'Native');
INSERT INTO `list_languages` VALUES(2041, 'Bali', 'Native');
INSERT INTO `list_languages` VALUES(2042, 'Banja', 'Native');
INSERT INTO `list_languages` VALUES(2043, 'Batakki', 'Native');
INSERT INTO `list_languages` VALUES(2044, 'Bugi', 'Native');
INSERT INTO `list_languages` VALUES(2045, 'Javanese', 'Native');
INSERT INTO `list_languages` VALUES(2046, 'Madura', 'Native');
INSERT INTO `list_languages` VALUES(2047, 'Minangkabau', 'Native');
INSERT INTO `list_languages` VALUES(2048, 'Sunda', 'Native');
INSERT INTO `list_languages` VALUES(2049, 'Gujarati', 'Native');
INSERT INTO `list_languages` VALUES(2050, 'Kannada', 'Native');
INSERT INTO `list_languages` VALUES(2051, 'Malajalam', 'Native');
INSERT INTO `list_languages` VALUES(2052, 'Marathi', 'Native');
INSERT INTO `list_languages` VALUES(2053, 'Orija', 'Native');
INSERT INTO `list_languages` VALUES(2054, 'Tamil', 'Native');
INSERT INTO `list_languages` VALUES(2055, 'Telugu', 'Native');
INSERT INTO `list_languages` VALUES(2056, 'Urdu', 'Native');
INSERT INTO `list_languages` VALUES(2057, 'Irish', 'Native');
INSERT INTO `list_languages` VALUES(2058, 'Bakhtyari', 'Native');
INSERT INTO `list_languages` VALUES(2059, 'Gilaki', 'Native');
INSERT INTO `list_languages` VALUES(2060, 'Kurdish', 'Native');
INSERT INTO `list_languages` VALUES(2061, 'Luri', 'Native');
INSERT INTO `list_languages` VALUES(2062, 'Mazandarani', 'Native');
INSERT INTO `list_languages` VALUES(2063, 'Persian', 'Native');
INSERT INTO `list_languages` VALUES(2064, 'Assyrian', 'Native');
INSERT INTO `list_languages` VALUES(2065, 'Icelandic', 'Native');
INSERT INTO `list_languages` VALUES(2066, 'Hebrew', 'Native');
INSERT INTO `list_languages` VALUES(2067, 'Friuli', 'Native');
INSERT INTO `list_languages` VALUES(2068, 'Sardinian', 'Native');
INSERT INTO `list_languages` VALUES(2069, 'Circassian', 'Native');
INSERT INTO `list_languages` VALUES(2070, 'Ainu', 'Native');
INSERT INTO `list_languages` VALUES(2071, 'Kazakh', 'Native');
INSERT INTO `list_languages` VALUES(2072, 'Tatar', 'Native');
INSERT INTO `list_languages` VALUES(2073, 'Gusii', 'Native');
INSERT INTO `list_languages` VALUES(2074, 'Kalenjin', 'Native');
INSERT INTO `list_languages` VALUES(2075, 'Kamba', 'Native');
INSERT INTO `list_languages` VALUES(2076, 'Kikuyu', 'Native');
INSERT INTO `list_languages` VALUES(2077, 'Luhya', 'Native');
INSERT INTO `list_languages` VALUES(2078, 'Luo', 'Native');
INSERT INTO `list_languages` VALUES(2079, 'Masai', 'Native');
INSERT INTO `list_languages` VALUES(2080, 'Meru', 'Native');
INSERT INTO `list_languages` VALUES(2081, 'Nyika', 'Native');
INSERT INTO `list_languages` VALUES(2082, 'Turkana', 'Native');
INSERT INTO `list_languages` VALUES(2083, 'Kirgiz', 'Native');
INSERT INTO `list_languages` VALUES(2084, 'Tadzhik', 'Native');
INSERT INTO `list_languages` VALUES(2085, 'Khmer', 'Native');
INSERT INTO `list_languages` VALUES(2086, 'TÅ¡am', 'Native');
INSERT INTO `list_languages` VALUES(2087, 'Kiribati', 'Native');
INSERT INTO `list_languages` VALUES(2088, 'Tuvalu', 'Native');
INSERT INTO `list_languages` VALUES(2089, 'Lao', 'Native');
INSERT INTO `list_languages` VALUES(2090, 'Lao-Soung', 'Native');
INSERT INTO `list_languages` VALUES(2091, 'Mon-khmer', 'Native');
INSERT INTO `list_languages` VALUES(2092, 'Thai', 'Native');
INSERT INTO `list_languages` VALUES(2093, 'Bassa', 'Native');
INSERT INTO `list_languages` VALUES(2094, 'Gio', 'Native');
INSERT INTO `list_languages` VALUES(2095, 'Grebo', 'Native');
INSERT INTO `list_languages` VALUES(2096, 'Mano', 'Native');
INSERT INTO `list_languages` VALUES(2097, 'Mixed Languages', 'Native');
INSERT INTO `list_languages` VALUES(2098, 'Singali', 'Native');
INSERT INTO `list_languages` VALUES(2099, 'Sotho', 'Native');
INSERT INTO `list_languages` VALUES(2100, 'Zulu', 'Native');
INSERT INTO `list_languages` VALUES(2101, 'Lithuanian', 'Native');
INSERT INTO `list_languages` VALUES(2102, 'Luxembourgish', 'Native');
INSERT INTO `list_languages` VALUES(2103, 'Latvian', 'Native');
INSERT INTO `list_languages` VALUES(2104, 'Mandarin Chinese', 'Native');
INSERT INTO `list_languages` VALUES(2105, 'Monegasque', 'Native');
INSERT INTO `list_languages` VALUES(2106, 'Gagauzi', 'Native');
INSERT INTO `list_languages` VALUES(2107, 'Malagasy', 'Native');
INSERT INTO `list_languages` VALUES(2108, 'Dhivehi', 'Native');
INSERT INTO `list_languages` VALUES(2109, 'Mixtec', 'Native');
INSERT INTO `list_languages` VALUES(2110, 'NÃ¡huatl', 'Native');
INSERT INTO `list_languages` VALUES(2111, 'OtomÃ­', 'Native');
INSERT INTO `list_languages` VALUES(2112, 'Yucatec', 'Native');
INSERT INTO `list_languages` VALUES(2113, 'Zapotec', 'Native');
INSERT INTO `list_languages` VALUES(2114, 'Marshallese', 'Native');
INSERT INTO `list_languages` VALUES(2115, 'Bambara', 'Native');
INSERT INTO `list_languages` VALUES(2116, 'Senufo and Minianka', 'Native');
INSERT INTO `list_languages` VALUES(2117, 'Songhai', 'Native');
INSERT INTO `list_languages` VALUES(2118, 'Tamashek', 'Native');
INSERT INTO `list_languages` VALUES(2119, 'Maltese', 'Native');
INSERT INTO `list_languages` VALUES(2120, 'Burmese', 'Native');
INSERT INTO `list_languages` VALUES(2121, 'Chin', 'Native');
INSERT INTO `list_languages` VALUES(2122, 'Kachin', 'Native');
INSERT INTO `list_languages` VALUES(2123, 'Karen', 'Native');
INSERT INTO `list_languages` VALUES(2124, 'Kayah', 'Native');
INSERT INTO `list_languages` VALUES(2125, 'Mon', 'Native');
INSERT INTO `list_languages` VALUES(2126, 'Rakhine', 'Native');
INSERT INTO `list_languages` VALUES(2127, 'Shan', 'Native');
INSERT INTO `list_languages` VALUES(2128, 'Bajad', 'Native');
INSERT INTO `list_languages` VALUES(2129, 'Buryat', 'Native');
INSERT INTO `list_languages` VALUES(2130, 'Dariganga', 'Native');
INSERT INTO `list_languages` VALUES(2131, 'Dorbet', 'Native');
INSERT INTO `list_languages` VALUES(2132, 'Carolinian', 'Native');
INSERT INTO `list_languages` VALUES(2133, 'Chuabo', 'Native');
INSERT INTO `list_languages` VALUES(2134, 'Lomwe', 'Native');
INSERT INTO `list_languages` VALUES(2135, 'Makua', 'Native');
INSERT INTO `list_languages` VALUES(2136, 'Marendje', 'Native');
INSERT INTO `list_languages` VALUES(2137, 'Nyanja', 'Native');
INSERT INTO `list_languages` VALUES(2138, 'Ronga', 'Native');
INSERT INTO `list_languages` VALUES(2139, 'Sena', 'Native');
INSERT INTO `list_languages` VALUES(2140, 'Tsonga', 'Native');
INSERT INTO `list_languages` VALUES(2141, 'Tswa', 'Native');
INSERT INTO `list_languages` VALUES(2142, 'Hassaniya', 'Native');
INSERT INTO `list_languages` VALUES(2143, 'Tukulor', 'Native');
INSERT INTO `list_languages` VALUES(2144, 'Zenaga', 'Native');
INSERT INTO `list_languages` VALUES(2145, 'Bhojpuri', 'Native');
INSERT INTO `list_languages` VALUES(2146, 'Chichewa', 'Native');
INSERT INTO `list_languages` VALUES(2147, 'Ngoni', 'Native');
INSERT INTO `list_languages` VALUES(2148, 'Yao', 'Native');
INSERT INTO `list_languages` VALUES(2149, 'Dusun', 'Native');
INSERT INTO `list_languages` VALUES(2150, 'Iban', 'Native');
INSERT INTO `list_languages` VALUES(2151, 'MahorÃ©', 'Native');
INSERT INTO `list_languages` VALUES(2152, 'Afrikaans', 'Native');
INSERT INTO `list_languages` VALUES(2153, 'Caprivi', 'Native');
INSERT INTO `list_languages` VALUES(2154, 'Herero', 'Native');
INSERT INTO `list_languages` VALUES(2155, 'Kavango', 'Native');
INSERT INTO `list_languages` VALUES(2156, 'Nama', 'Native');
INSERT INTO `list_languages` VALUES(2157, 'Ovambo', 'Native');
INSERT INTO `list_languages` VALUES(2158, 'Malenasian Languages', 'Native');
INSERT INTO `list_languages` VALUES(2159, 'Polynesian Languages', 'Native');
INSERT INTO `list_languages` VALUES(2160, 'Hausa', 'Native');
INSERT INTO `list_languages` VALUES(2161, 'Kanuri', 'Native');
INSERT INTO `list_languages` VALUES(2162, 'Songhai-zerma', 'Native');
INSERT INTO `list_languages` VALUES(2163, 'Bura', 'Native');
INSERT INTO `list_languages` VALUES(2164, 'Edo', 'Native');
INSERT INTO `list_languages` VALUES(2165, 'Ibibio', 'Native');
INSERT INTO `list_languages` VALUES(2166, 'Ibo', 'Native');
INSERT INTO `list_languages` VALUES(2167, 'Ijo', 'Native');
INSERT INTO `list_languages` VALUES(2168, 'Tiv', 'Native');
INSERT INTO `list_languages` VALUES(2169, 'Sumo', 'Native');
INSERT INTO `list_languages` VALUES(2170, 'Niue', 'Native');
INSERT INTO `list_languages` VALUES(2171, 'Fries', 'Native');
INSERT INTO `list_languages` VALUES(2172, 'Maithili', 'Native');
INSERT INTO `list_languages` VALUES(2173, 'Newari', 'Native');
INSERT INTO `list_languages` VALUES(2174, 'Tamang', 'Native');
INSERT INTO `list_languages` VALUES(2175, 'Tharu', 'Native');
INSERT INTO `list_languages` VALUES(2176, 'Nauru', 'Native');
INSERT INTO `list_languages` VALUES(2177, 'Brahui', 'Native');
INSERT INTO `list_languages` VALUES(2178, 'Hindko', 'Native');
INSERT INTO `list_languages` VALUES(2179, 'Saraiki', 'Native');
INSERT INTO `list_languages` VALUES(2180, 'Sindhi', 'Native');
INSERT INTO `list_languages` VALUES(2181, 'Cuna', 'Native');
INSERT INTO `list_languages` VALUES(2182, 'Embera', 'Native');
INSERT INTO `list_languages` VALUES(2183, 'GuaymÃ­', 'Native');
INSERT INTO `list_languages` VALUES(2184, 'Pitcairnese', 'Native');
INSERT INTO `list_languages` VALUES(2185, 'Bicol', 'Native');
INSERT INTO `list_languages` VALUES(2186, 'Cebuano', 'Native');
INSERT INTO `list_languages` VALUES(2187, 'Hiligaynon', 'Native');
INSERT INTO `list_languages` VALUES(2188, 'Ilocano', 'Native');
INSERT INTO `list_languages` VALUES(2189, 'Maguindanao', 'Native');
INSERT INTO `list_languages` VALUES(2190, 'Maranao', 'Native');
INSERT INTO `list_languages` VALUES(2191, 'Pampango', 'Native');
INSERT INTO `list_languages` VALUES(2192, 'Pangasinan', 'Native');
INSERT INTO `list_languages` VALUES(2193, 'Pilipino', 'Native');
INSERT INTO `list_languages` VALUES(2194, 'Waray-waray', 'Native');
INSERT INTO `list_languages` VALUES(2195, 'Palau', 'Native');
INSERT INTO `list_languages` VALUES(2196, 'Papuan Languages', 'Native');
INSERT INTO `list_languages` VALUES(2197, 'Tahitian', 'Native');
INSERT INTO `list_languages` VALUES(2198, 'Avarian', 'Native');
INSERT INTO `list_languages` VALUES(2199, 'Bashkir', 'Native');
INSERT INTO `list_languages` VALUES(2200, 'Chechen', 'Native');
INSERT INTO `list_languages` VALUES(2201, 'Chuvash', 'Native');
INSERT INTO `list_languages` VALUES(2202, 'Mari', 'Native');
INSERT INTO `list_languages` VALUES(2203, 'Mordva', 'Native');
INSERT INTO `list_languages` VALUES(2204, 'Udmur', 'Native');
INSERT INTO `list_languages` VALUES(2205, 'Bari', 'Native');
INSERT INTO `list_languages` VALUES(2206, 'Beja', 'Native');
INSERT INTO `list_languages` VALUES(2207, 'Chilluk', 'Native');
INSERT INTO `list_languages` VALUES(2208, 'Dinka', 'Native');
INSERT INTO `list_languages` VALUES(2209, 'Fur', 'Native');
INSERT INTO `list_languages` VALUES(2210, 'Lotuko', 'Native');
INSERT INTO `list_languages` VALUES(2211, 'Nubian Languages', 'Native');
INSERT INTO `list_languages` VALUES(2212, 'Nuer', 'Native');
INSERT INTO `list_languages` VALUES(2213, 'Serer', 'Native');
INSERT INTO `list_languages` VALUES(2214, 'Bullom-sherbro', 'Native');
INSERT INTO `list_languages` VALUES(2215, 'Kono-vai', 'Native');
INSERT INTO `list_languages` VALUES(2216, 'Kuranko', 'Native');
INSERT INTO `list_languages` VALUES(2217, 'Limba', 'Native');
INSERT INTO `list_languages` VALUES(2218, 'Mende', 'Native');
INSERT INTO `list_languages` VALUES(2219, 'Temne', 'Native');
INSERT INTO `list_languages` VALUES(2220, 'Nahua', 'Native');
INSERT INTO `list_languages` VALUES(2221, 'Sranantonga', 'Native');
INSERT INTO `list_languages` VALUES(2222, 'Czech and Moravian', 'Native');
INSERT INTO `list_languages` VALUES(2223, 'Ukrainian and Russian', 'Native');
INSERT INTO `list_languages` VALUES(2224, 'Swazi', 'Native');
INSERT INTO `list_languages` VALUES(2225, 'Seselwa', 'Native');
INSERT INTO `list_languages` VALUES(2226, 'Gorane', 'Native');
INSERT INTO `list_languages` VALUES(2227, 'Hadjarai', 'Native');
INSERT INTO `list_languages` VALUES(2228, 'Kanem-bornu', 'Native');
INSERT INTO `list_languages` VALUES(2229, 'Mayo-kebbi', 'Native');
INSERT INTO `list_languages` VALUES(2230, 'Ouaddai', 'Native');
INSERT INTO `list_languages` VALUES(2231, 'Tandjile', 'Native');
INSERT INTO `list_languages` VALUES(2232, 'Ane', 'Native');
INSERT INTO `list_languages` VALUES(2233, 'KabyÃ©', 'Native');
INSERT INTO `list_languages` VALUES(2234, 'Kotokoli', 'Native');
INSERT INTO `list_languages` VALUES(2235, 'Moba', 'Native');
INSERT INTO `list_languages` VALUES(2236, 'Naudemba', 'Native');
INSERT INTO `list_languages` VALUES(2237, 'Watyi', 'Native');
INSERT INTO `list_languages` VALUES(2238, 'Kuy', 'Native');
INSERT INTO `list_languages` VALUES(2239, 'Tokelau', 'Native');
INSERT INTO `list_languages` VALUES(2240, 'Arabic-French', 'Native');
INSERT INTO `list_languages` VALUES(2242, 'Ami', 'Native');
INSERT INTO `list_languages` VALUES(2243, 'Atayal', 'Native');
INSERT INTO `list_languages` VALUES(2244, 'Min', 'Native');
INSERT INTO `list_languages` VALUES(2245, 'Paiwan', 'Native');
INSERT INTO `list_languages` VALUES(2246, 'Chaga and Pare', 'Native');
INSERT INTO `list_languages` VALUES(2247, 'Gogo', 'Native');
INSERT INTO `list_languages` VALUES(2248, 'Ha', 'Native');
INSERT INTO `list_languages` VALUES(2249, 'Haya', 'Native');
INSERT INTO `list_languages` VALUES(2250, 'Hehet', 'Native');
INSERT INTO `list_languages` VALUES(2251, 'Luguru', 'Native');
INSERT INTO `list_languages` VALUES(2252, 'Makonde', 'Native');
INSERT INTO `list_languages` VALUES(2253, 'Nyakusa', 'Native');
INSERT INTO `list_languages` VALUES(2254, 'Nyamwesi', 'Native');
INSERT INTO `list_languages` VALUES(2255, 'Shambala', 'Native');
INSERT INTO `list_languages` VALUES(2256, 'Acholi', 'Native');
INSERT INTO `list_languages` VALUES(2257, 'Ganda', 'Native');
INSERT INTO `list_languages` VALUES(2258, 'Gisu', 'Native');
INSERT INTO `list_languages` VALUES(2259, 'Kiga', 'Native');
INSERT INTO `list_languages` VALUES(2260, 'Lango', 'Native');
INSERT INTO `list_languages` VALUES(2261, 'Lugbara', 'Native');
INSERT INTO `list_languages` VALUES(2262, 'Nkole', 'Native');
INSERT INTO `list_languages` VALUES(2263, 'Soga', 'Native');
INSERT INTO `list_languages` VALUES(2264, 'Teso', 'Native');
INSERT INTO `list_languages` VALUES(2265, 'Tagalog', 'Native');
INSERT INTO `list_languages` VALUES(2266, 'Karakalpak', 'Native');
INSERT INTO `list_languages` VALUES(2267, 'Goajiro', 'Native');
INSERT INTO `list_languages` VALUES(2268, 'Warrau', 'Native');
INSERT INTO `list_languages` VALUES(2269, 'Man', 'Native');
INSERT INTO `list_languages` VALUES(2270, 'Muong', 'Native');
INSERT INTO `list_languages` VALUES(2271, 'Nung', 'Native');
INSERT INTO `list_languages` VALUES(2272, 'Tho', 'Native');
INSERT INTO `list_languages` VALUES(2273, 'Bislama', 'Native');
INSERT INTO `list_languages` VALUES(2274, 'Futuna', 'Native');
INSERT INTO `list_languages` VALUES(2275, 'Wallis', 'Native');
INSERT INTO `list_languages` VALUES(2277, 'Soqutri', 'Native');
INSERT INTO `list_languages` VALUES(2278, 'Northsotho', 'Native');
INSERT INTO `list_languages` VALUES(2279, 'Southsotho', 'Native');
INSERT INTO `list_languages` VALUES(2280, 'Venda', 'Native');
INSERT INTO `list_languages` VALUES(2281, 'Xhosa', 'Native');
INSERT INTO `list_languages` VALUES(2282, 'Bemba', 'Native');
INSERT INTO `list_languages` VALUES(2283, 'Chewa', 'Native');
INSERT INTO `list_languages` VALUES(2284, 'Lozi', 'Native');
INSERT INTO `list_languages` VALUES(2285, 'Nsenga', 'Native');

-- --------------------------------------------------------

--
-- Table structure for table `members_languages`
--

CREATE TABLE `members_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `lang_id` (`lang_id`) USING BTREE,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=455 ;

--
-- Dumping data for table `members_languages`
--

INSERT INTO `members_languages` VALUES(407, 54, 1832);
INSERT INTO `members_languages` VALUES(408, 54, 1373);
INSERT INTO `members_languages` VALUES(409, 55, 1373);
INSERT INTO `members_languages` VALUES(410, 55, 1832);
INSERT INTO `members_languages` VALUES(412, 61, 1832);
INSERT INTO `members_languages` VALUES(413, 61, 1373);
INSERT INTO `members_languages` VALUES(414, 63, 1832);
INSERT INTO `members_languages` VALUES(417, 52, 228);
INSERT INTO `members_languages` VALUES(418, 56, 198);
INSERT INTO `members_languages` VALUES(419, 57, 198);
INSERT INTO `members_languages` VALUES(420, 64, 1832);
INSERT INTO `members_languages` VALUES(421, 64, 1373);
INSERT INTO `members_languages` VALUES(430, 53, 38);
INSERT INTO `members_languages` VALUES(431, 53, 1373);
INSERT INTO `members_languages` VALUES(432, 53, 1832);
INSERT INTO `members_languages` VALUES(433, 65, 1832);
INSERT INTO `members_languages` VALUES(434, 51, 1832);
INSERT INTO `members_languages` VALUES(442, 1, 1);
INSERT INTO `members_languages` VALUES(443, 1, 27);
INSERT INTO `members_languages` VALUES(444, 1, 228);
INSERT INTO `members_languages` VALUES(445, 1, 1832);
INSERT INTO `members_languages` VALUES(452, 73, 918);
INSERT INTO `members_languages` VALUES(453, 73, 937);
INSERT INTO `members_languages` VALUES(454, 73, 283);

-- --------------------------------------------------------

--
-- Table structure for table `members_stream`
--

CREATE TABLE `members_stream` (
  `members_stream_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `message` text CHARACTER SET latin1,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `skill_category_id` int(11) NOT NULL,
  `members_stream_parent_id` int(11) NOT NULL DEFAULT '0',
  `hash` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date2` date NOT NULL,
  PRIMARY KEY (`members_stream_id`),
  UNIQUE KEY `members_stream_hash` (`hash`),
  UNIQUE KEY `members_stream_hash_index` (`date2`,`hash`),
  KEY `from_user_id` (`from_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `members_stream`
--


-- --------------------------------------------------------

--
-- Table structure for table `members_tracking`
--

CREATE TABLE `members_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `latitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `longitude` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `country` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `members_tracking`
--

INSERT INTO `members_tracking` VALUES(69, 1, '187.162.141.202', NULL, NULL, '2011-12-07 13:17:20', 'mexico', 'nuevo leon', 'garza garcia');
INSERT INTO `members_tracking` VALUES(70, 51, '187.162.141.202', NULL, NULL, '2011-12-08 10:13:22', 'mexico', 'nuevo leon', 'garza garcia');
INSERT INTO `members_tracking` VALUES(71, 52, '187.162.141.202', NULL, NULL, '2011-12-08 10:46:43', 'mexico', 'nuevo leon', 'garza garcia');
INSERT INTO `members_tracking` VALUES(72, 1, '192.168.1.149', NULL, NULL, '2011-12-08 22:04:30', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(73, 1, '192.168.0.110', NULL, NULL, '2011-12-09 16:25:17', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(74, 1, '::1', NULL, NULL, '2011-12-09 23:31:21', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(75, 51, '::1', NULL, NULL, '2011-12-10 00:28:21', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(76, 1, '192.168.1.149', NULL, NULL, '2011-12-13 10:04:24', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(77, 51, '192.168.1.91', NULL, NULL, '2011-12-13 10:11:21', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(78, 1, '::1', NULL, NULL, '2011-12-16 07:41:28', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(79, 55, '::1', NULL, NULL, '2011-12-19 19:37:54', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(80, 2, '::1', NULL, NULL, '2011-12-19 19:38:37', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(81, 50, '::1', NULL, NULL, '2011-12-19 19:39:13', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(82, 51, '::1', NULL, NULL, '2011-12-19 19:39:57', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(83, 52, '::1', NULL, NULL, '2011-12-19 19:40:42', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(84, 53, '::1', NULL, NULL, '2011-12-19 19:42:01', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(85, 54, '::1', NULL, NULL, '2011-12-19 19:42:51', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(86, 56, '::1', NULL, NULL, '2011-12-19 19:43:41', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(87, 57, '::1', NULL, NULL, '2011-12-19 19:44:59', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(88, 58, '::1', NULL, NULL, '2011-12-19 19:46:12', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(89, 59, '::1', NULL, NULL, '2011-12-19 19:47:36', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(90, 60, '::1', NULL, NULL, '2011-12-19 19:48:20', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(91, 61, '::1', NULL, NULL, '2011-12-19 19:48:52', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(92, 63, '::1', NULL, NULL, '2011-12-19 19:49:42', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(93, 1, '127.0.0.1', NULL, NULL, '2012-01-01 20:58:55', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(94, 1, '192.168.1.104', NULL, NULL, '2012-01-02 11:59:17', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(95, 67, '192.168.1.104', NULL, NULL, '2012-01-02 12:17:05', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(96, 1, '127.0.0.1', NULL, NULL, '2012-01-02 17:31:52', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(97, 51, '127.0.0.1', NULL, NULL, '2012-01-05 01:34:28', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(98, 53, '127.0.0.1', NULL, NULL, '2012-01-05 01:34:39', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(99, 50, '127.0.0.1', NULL, NULL, '2012-01-06 14:14:14', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(100, 61, '127.0.0.1', NULL, NULL, '2012-01-16 23:43:27', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(101, 58, '127.0.0.1', NULL, NULL, '2012-01-17 01:00:20', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(102, 56, '127.0.0.1', NULL, NULL, '2012-01-17 01:14:40', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(103, 55, '127.0.0.1', NULL, NULL, '2012-01-17 01:26:24', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(104, 52, '127.0.0.1', NULL, NULL, '2012-01-19 13:15:25', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(105, 1, '10.10.14.185', NULL, NULL, '2012-02-28 16:58:07', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(106, 51, '10.10.14.185', NULL, NULL, '2012-02-28 18:15:29', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(107, 72, '10.10.14.155', NULL, NULL, '2012-02-28 18:26:28', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(108, 1, '127.0.0.1', NULL, NULL, '2012-03-03 16:36:56', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(109, 1, '192.168.15.146', NULL, NULL, '2012-03-03 16:39:30', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(110, 1, '192.168.15.14', NULL, NULL, '2012-03-03 17:17:11', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(111, 73, '::1', NULL, NULL, '2012-03-08 17:44:08', NULL, NULL, NULL);
INSERT INTO `members_tracking` VALUES(112, 73, '127.0.0.1', NULL, NULL, '2012-05-05 20:46:26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_albums`
--

CREATE TABLE `member_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `member_albums`
--

INSERT INTO `member_albums` VALUES(36, 61, 'Nuevo Album', 'jhzdfljkahsdflkhja', '2011-12-09 16:35:49');
INSERT INTO `member_albums` VALUES(37, 64, 'Tampacan', 'Nos gusta mucho ir a tampacan', '2011-12-21 07:34:10');
INSERT INTO `member_albums` VALUES(38, 53, 'New Album 1', 'Test Album', '2011-12-23 00:49:00');
INSERT INTO `member_albums` VALUES(40, 53, 'Album 3', 'Test Album', '2011-12-23 00:52:56');
INSERT INTO `member_albums` VALUES(42, 1, 'Segundo Album', 'This is just a tes', '2011-12-23 18:20:07');
INSERT INTO `member_albums` VALUES(43, 65, 'Galeria 1', 'ffjlkdjfk', '2011-12-23 19:16:49');
INSERT INTO `member_albums` VALUES(45, 51, 'New', 'New\n', '2011-12-23 22:22:25');
INSERT INTO `member_albums` VALUES(46, 51, 'Otro', 'otro', '2011-12-23 22:23:47');
INSERT INTO `member_albums` VALUES(48, 1, 'Nuevo', 'Nuevo', '2011-12-25 13:32:16');
INSERT INTO `member_albums` VALUES(53, 55, 'Nuevo Album de Prueba', 'Test', '2012-01-17 12:46:06');
INSERT INTO `member_albums` VALUES(54, 1, 'Test Album', 'New Album', '2012-02-21 18:11:25');
INSERT INTO `member_albums` VALUES(55, 72, 'Test', 'khflkjasd\n', '2012-02-28 17:09:43');
INSERT INTO `member_albums` VALUES(56, 1, 'cuarto', 'test description', '2012-03-03 17:51:44');
INSERT INTO `member_albums` VALUES(58, 73, 'Mis fotos', 'Varias', '2012-05-13 15:46:12');
INSERT INTO `member_albums` VALUES(59, 73, 'test', '', '2012-06-20 19:32:10');
INSERT INTO `member_albums` VALUES(60, 73, 'test', '', '2012-07-10 13:46:36');
INSERT INTO `member_albums` VALUES(61, 73, 'nuevo', '', '2012-07-10 13:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `member_bonds`
--

CREATE TABLE `member_bonds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` int(128) DEFAULT '0',
  `user_to` int(128) DEFAULT '0',
  `type` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_from` (`user_from`),
  KEY `user_to` (`user_to`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=417 ;

--
-- Dumping data for table `member_bonds`
--

INSERT INTO `member_bonds` VALUES(235, 55, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(236, 2, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(239, 2, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(240, 50, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(241, 55, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(242, 50, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(245, 50, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(246, 52, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(247, 2, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(248, 52, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(249, 55, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(250, 52, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(253, 52, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(254, 53, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(255, 50, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(256, 53, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(257, 2, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(258, 53, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(259, 55, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(260, 53, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(263, 53, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(264, 54, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(265, 52, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(266, 54, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(267, 50, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(268, 54, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(269, 2, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(270, 54, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(271, 55, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(272, 54, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(273, 51, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(274, 54, 51, 'friendship');
INSERT INTO `member_bonds` VALUES(275, 51, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(276, 55, 51, 'friendship');
INSERT INTO `member_bonds` VALUES(277, 53, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(278, 56, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(279, 52, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(280, 56, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(281, 50, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(282, 56, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(283, 2, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(284, 56, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(285, 55, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(286, 56, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(287, 51, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(288, 56, 51, 'friendship');
INSERT INTO `member_bonds` VALUES(289, 56, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(290, 57, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(291, 53, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(292, 57, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(293, 52, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(294, 57, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(295, 50, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(296, 57, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(297, 2, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(298, 57, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(299, 55, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(300, 57, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(301, 51, 57, 'friendship');
INSERT INTO `member_bonds` VALUES(302, 57, 51, 'friendship');
INSERT INTO `member_bonds` VALUES(303, 56, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(304, 58, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(305, 53, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(306, 58, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(307, 52, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(308, 58, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(309, 50, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(310, 58, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(311, 2, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(312, 58, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(313, 55, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(314, 58, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(317, 58, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(318, 59, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(319, 56, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(320, 59, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(321, 53, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(322, 59, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(323, 52, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(324, 59, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(325, 50, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(326, 59, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(327, 2, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(328, 59, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(329, 55, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(330, 59, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(331, 51, 59, 'friendship');
INSERT INTO `member_bonds` VALUES(332, 59, 51, 'friendship');
INSERT INTO `member_bonds` VALUES(333, 58, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(334, 60, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(335, 56, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(336, 60, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(337, 53, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(338, 60, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(339, 52, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(340, 60, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(341, 50, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(342, 60, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(343, 2, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(344, 60, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(345, 55, 60, 'friendship');
INSERT INTO `member_bonds` VALUES(346, 60, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(349, 58, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(350, 61, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(351, 56, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(352, 61, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(353, 53, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(354, 61, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(355, 52, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(356, 61, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(357, 50, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(358, 61, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(359, 2, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(360, 61, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(361, 55, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(362, 61, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(365, 61, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(366, 63, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(367, 58, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(368, 63, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(369, 56, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(370, 63, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(371, 53, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(372, 63, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(373, 52, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(374, 63, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(377, 50, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(378, 63, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(379, 2, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(380, 63, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(381, 55, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(382, 63, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(383, 63, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(384, 1, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(385, 61, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(386, 1, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(387, 58, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(388, 1, 58, 'friendship');
INSERT INTO `member_bonds` VALUES(389, 56, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(390, 1, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(391, 53, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(392, 1, 53, 'friendship');
INSERT INTO `member_bonds` VALUES(393, 52, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(394, 1, 52, 'friendship');
INSERT INTO `member_bonds` VALUES(395, 50, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(396, 1, 50, 'friendship');
INSERT INTO `member_bonds` VALUES(397, 2, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(398, 1, 2, 'friendship');
INSERT INTO `member_bonds` VALUES(399, 55, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(400, 1, 55, 'friendship');
INSERT INTO `member_bonds` VALUES(401, 1, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(402, 54, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(403, 63, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(404, 54, 63, 'friendship');
INSERT INTO `member_bonds` VALUES(405, 61, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(406, 54, 61, 'friendship');
INSERT INTO `member_bonds` VALUES(407, 56, 54, 'friendship');
INSERT INTO `member_bonds` VALUES(408, 54, 56, 'friendship');
INSERT INTO `member_bonds` VALUES(413, 51, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(414, 1, 51, 'friendship');
INSERT INTO `member_bonds` VALUES(415, 69, 1, 'friendship');
INSERT INTO `member_bonds` VALUES(416, 1, 69, 'friendship');

-- --------------------------------------------------------

--
-- Table structure for table `member_interests`
--

CREATE TABLE `member_interests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `int_id` (`int_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `member_interests`
--


-- --------------------------------------------------------

--
-- Table structure for table `member_kins`
--

CREATE TABLE `member_kins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_mail` varchar(100) NOT NULL,
  `kins` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `member_kins`
--

INSERT INTO `member_kins` VALUES(1, 'sdelrio0@gmail.com', 47);
INSERT INTO `member_kins` VALUES(2, 'dearplanet@gmail.com', 50);
INSERT INTO `member_kins` VALUES(3, 'flxclld@gmail.com', 30);
INSERT INTO `member_kins` VALUES(4, 'xxdarkarschxx@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(5, 'carlosepp@gmail.com', 57);
INSERT INTO `member_kins` VALUES(6, 'bloody_ice_cream@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(7, 'feluchin25@hotmail.com', 10);
INSERT INTO `member_kins` VALUES(8, 'mjtorrero@gmail.com', 7);
INSERT INTO `member_kins` VALUES(9, 'alejandro_rch@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(10, 'adsguz@gmail.com', 7);
INSERT INTO `member_kins` VALUES(11, 'aldovillarreal89@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(12, 'miguel.m862@gmail.com', 7);
INSERT INTO `member_kins` VALUES(13, 'anabel.alarcon@gmail.com', 7);
INSERT INTO `member_kins` VALUES(14, 'julieta_201100@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(15, 'collado.galan@gmail.com', 4);
INSERT INTO `member_kins` VALUES(16, 'rfernandez123@gmail.com', 10);
INSERT INTO `member_kins` VALUES(17, 'arhiex1@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(18, 'edoheadxx@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(19, 'mariana_carranca@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(20, 'luis.benavides.vila@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(21, 'ecolo20@live.fr', 10);
INSERT INTO `member_kins` VALUES(22, 'guerra.rodrigo@gmail.com', 24);
INSERT INTO `member_kins` VALUES(23, 'gerardocat1@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(24, 'hector_lujan_zarzar@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(25, 'angal.mv@gmail.com', 70);
INSERT INTO `member_kins` VALUES(26, 'diana.ghr@gmail.com', 4);
INSERT INTO `member_kins` VALUES(27, 'karu_punk182@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(28, 'lady_in_radiator@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(29, 'emiliovt.89@gmail.com', 14);
INSERT INTO `member_kins` VALUES(30, 'the_epic70@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(31, 'higar_106@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(32, 'delriomendozasergio@gmail.com', 4);
INSERT INTO `member_kins` VALUES(33, 'gislealp@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(34, 'sadorick@gmail.com', 10);
INSERT INTO `member_kins` VALUES(35, 'usako31@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(36, 'moroso20@gmail.com', 10);
INSERT INTO `member_kins` VALUES(37, 'olvera99@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(38, 'aquiles7389@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(39, 'olivia_ale_@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(40, 'anubis.castillo@gmail.com', 17);
INSERT INTO `member_kins` VALUES(41, 'verito.alanis@gmail.com', 30);
INSERT INTO `member_kins` VALUES(42, 'tejada1984@gmail.com', 10);
INSERT INTO `member_kins` VALUES(43, 'diana_21_11@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(44, 'carolina.lemarroy@gmail.com', 7);
INSERT INTO `member_kins` VALUES(45, 'chemespa@gmail.com', 90);
INSERT INTO `member_kins` VALUES(46, 'luxieinthesky@hotmail.com', 14);
INSERT INTO `member_kins` VALUES(47, 'edd.montalvo@gmail.com', 30);
INSERT INTO `member_kins` VALUES(48, 'nicolas.schiaffino@gmail.com', 7);
INSERT INTO `member_kins` VALUES(49, 'carlamariaherleal@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(50, 'fergl85@gmail.com', 17);
INSERT INTO `member_kins` VALUES(51, 'cristinapalaciosg@yahoo.com.mx', 20);
INSERT INTO `member_kins` VALUES(52, 'juangarcianoriega@gmail.com', 17);
INSERT INTO `member_kins` VALUES(53, 'weelsha@gmail.com', 10);
INSERT INTO `member_kins` VALUES(54, 'pedrines_rifa@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(55, 'moemi.hayakawa@gmail.com', 17);
INSERT INTO `member_kins` VALUES(56, 'fstuht@gmail.com', 37);
INSERT INTO `member_kins` VALUES(57, 'jose.christen@gmail.com', 4);
INSERT INTO `member_kins` VALUES(58, 'paulinabarreto@gmail.com', 7);
INSERT INTO `member_kins` VALUES(59, 'vizcaino.mg@gmail.com', 37);
INSERT INTO `member_kins` VALUES(60, 'gutierrez.marco@gmail.com', 17);
INSERT INTO `member_kins` VALUES(61, 'cvillalpando@gmail.com', 7);
INSERT INTO `member_kins` VALUES(62, 'lourdesgr29@gmail.com', 10);
INSERT INTO `member_kins` VALUES(63, 'megapercy@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(64, 'balmaro@gmail.com', 4);
INSERT INTO `member_kins` VALUES(65, 'juanpabloberrueta@gmail.com', 14);
INSERT INTO `member_kins` VALUES(66, 'vacanaqui@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(67, 'prix.alatriste@gmail.com', 4);
INSERT INTO `member_kins` VALUES(68, 'gonzo.alonso@gmail.com', 27);
INSERT INTO `member_kins` VALUES(69, 'brendagrs@gmail.com', 14);
INSERT INTO `member_kins` VALUES(70, 'j.martinez.49@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(71, 'jorcervan@gmail.com', 27);
INSERT INTO `member_kins` VALUES(72, 'piniurs@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(73, 'daniel.grajales@gmail.com', 20);
INSERT INTO `member_kins` VALUES(74, 'danyvalle15@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(75, 'diego.alarcon.117@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(76, 'mcaldg@gmail.com', 4);
INSERT INTO `member_kins` VALUES(77, 'cepeda00@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(78, 'engelfonseca@gmail.com', 34);
INSERT INTO `member_kins` VALUES(79, 'grisfrancis@gmail.com', 10);
INSERT INTO `member_kins` VALUES(80, 'ebenitezjove@gmail.com', 4);
INSERT INTO `member_kins` VALUES(81, 'fedex96@gmail.com', 7);
INSERT INTO `member_kins` VALUES(82, 'sdelrio0@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(83, 'cordero7_17@hotmail.com', 10);
INSERT INTO `member_kins` VALUES(84, 'froga_f@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(85, 'luisafer88@gmail.com', 4);
INSERT INTO `member_kins` VALUES(86, 'lindaydulcegatita@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(87, 'sweetpili_91@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(88, 'adrian_espinos@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(89, 'camaron_86@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(90, 'camacho_fernanda@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(91, 'esaaclee@hotmail.com', 10);
INSERT INTO `member_kins` VALUES(92, 'primor.rab@gmail.com', 10);
INSERT INTO `member_kins` VALUES(93, 'mau_mog@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(94, 'jesus.vaguilera@gmail.com', 4);
INSERT INTO `member_kins` VALUES(95, 'anacantu1@gmail.com', 7);
INSERT INTO `member_kins` VALUES(96, 'uhurum26@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(97, 'michael.roberts85@gmail.com', 14);
INSERT INTO `member_kins` VALUES(98, 'dponcetaylor@gmail.com', 24);
INSERT INTO `member_kins` VALUES(99, 'angela.dolmetsch@gmail.com', 37);
INSERT INTO `member_kins` VALUES(100, 'danielagottlieb@gmail.com', 17);
INSERT INTO `member_kins` VALUES(101, 'letygo@gmail.com', 14);
INSERT INTO `member_kins` VALUES(102, 'aegri.somnia.vana@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(103, 'jaime.valdes.berrueta@gmail.com', 4);
INSERT INTO `member_kins` VALUES(104, 'abraham.esparza.eb@gmail.com', 4);
INSERT INTO `member_kins` VALUES(105, 'gilda_yumana@hotmail.com ', 4);
INSERT INTO `member_kins` VALUES(106, 'permatto@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(107, 'felpepulido@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(108, 'la_ginalatina@hotmail.com', 10);
INSERT INTO `member_kins` VALUES(109, 'mariaebonilla.1@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(110, 'fosta616@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(111, 'lexis_segj007@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(112, 'pattycas@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(113, 'carloshto@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(114, 'locuv@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(115, 'ha.fabiola@gmail.com', 4);
INSERT INTO `member_kins` VALUES(116, 'jdjguerra@gmail.com', 7);
INSERT INTO `member_kins` VALUES(117, 'tatissanudo@gmail.com', 4);
INSERT INTO `member_kins` VALUES(118, 'epifania@gmail.com', 57);
INSERT INTO `member_kins` VALUES(119, 'nightlady_86@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(120, 'moeb_54@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(121, 'zerolopez11@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(122, 'andreaisabel12@gmail.com', 4);
INSERT INTO `member_kins` VALUES(123, 'iramoss@gmail.com', 24);
INSERT INTO `member_kins` VALUES(124, 'jazmin.rdz@gmail.com', 4);
INSERT INTO `member_kins` VALUES(125, 'violetta.ruiz@gmail.com', 4);
INSERT INTO `member_kins` VALUES(126, 'karla.padilla@gmail.com', 4);
INSERT INTO `member_kins` VALUES(127, 'yussen@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(128, 'a.biee@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(129, 'acereceda80@gmail.com', 4);
INSERT INTO `member_kins` VALUES(130, 'juan.diosdado@gmail.com', 10);
INSERT INTO `member_kins` VALUES(131, 'rufflesconchamoy@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(132, 'astroboy_112@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(133, 'mdelrio5@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(134, 'cali_cuesy@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(135, 'aguilasolarazul@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(136, 'elias_tri@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(137, 'gabbi_rdz@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(138, 'candymoon09@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(139, 'vargas_almaaa@hotmail.com', 10);
INSERT INTO `member_kins` VALUES(140, 'alejandrap.tapia@gmail.com', 10);
INSERT INTO `member_kins` VALUES(141, 'aurea.betancourt@gmail.com', 4);
INSERT INTO `member_kins` VALUES(142, 'astrid.gutierrezg@gmail.com', 7);
INSERT INTO `member_kins` VALUES(143, 'hector.bjerk@gmail.com', 7);
INSERT INTO `member_kins` VALUES(144, 'paolaa.x@gmail.com', 4);
INSERT INTO `member_kins` VALUES(145, 'ecotechsolutions@gmail.com', 7);
INSERT INTO `member_kins` VALUES(146, 'juan_roman87@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(147, 'bitranarizpe@gmail.com', 7);
INSERT INTO `member_kins` VALUES(148, 'omargracia@gmail.com', 7);
INSERT INTO `member_kins` VALUES(149, 'thundertron@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(150, 'lucia_luna8@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(151, 'omar.cuervo@live.com.mx', 4);
INSERT INTO `member_kins` VALUES(152, 'alex.trev@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(153, 'lorena.lm90@gmail.com', 4);
INSERT INTO `member_kins` VALUES(154, 'denissz@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(155, 'ivanzuniga@gmail.com', 17);
INSERT INTO `member_kins` VALUES(156, 'rociodgzz9@gmail.com', 4);
INSERT INTO `member_kins` VALUES(157, 'mario.pashangas@gmail.com', 4);
INSERT INTO `member_kins` VALUES(158, 'lionheart995@hotmail.com', 10);
INSERT INTO `member_kins` VALUES(159, 'fabyrux@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(160, 'villarrealdaniela@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(161, 'dasha.lavrennikov@gmail.com', 7);
INSERT INTO `member_kins` VALUES(162, 'mirey_luni@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(163, 'rafael_oli@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(164, 'paguilera535@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(165, 'melinavaladez.gmz@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(166, 'galvan_pamel@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(167, 'kalevaman@hotmail.com', 7);
INSERT INTO `member_kins` VALUES(168, 'felvalren@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(169, 'olivier_ejb@hotmail.com', 4);
INSERT INTO `member_kins` VALUES(170, 'adsgm@hotmail.com', 0);
INSERT INTO `member_kins` VALUES(176, 'a@bc.ss', 0);
INSERT INTO `member_kins` VALUES(193, '', 0);
INSERT INTO `member_kins` VALUES(196, 'a@b.ccc', 0);
INSERT INTO `member_kins` VALUES(208, 'adsad@dasd.c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_pictures`
--

CREATE TABLE `member_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(240) DEFAULT NULL,
  `album_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `member_pictures`
--

INSERT INTO `member_pictures` VALUES(20, 61, 'p16giffspq1bm4g6a10q61p71gr45.jpg', 'Esta mi casa', 36);
INSERT INTO `member_pictures` VALUES(21, 61, 'p16giffspr90pcrl1m5lui056q8.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(22, 61, 'p16giffspt1pmv1g8133k3gqifhe.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(23, 61, 'p16giffspre9u171b9k12k4rom9.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(24, 61, 'p16giffspqo0r1a1f1jmq1i4ksvb6.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(25, 61, 'p16giffspr5p61smeh6h1qhkhqu7.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(26, 61, 'p16giffspq1nid9g159r6dticc4.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(27, 61, 'p16giffsps1qr1plt110s5g9rk0b.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(28, 61, 'p16giffspsamkaqfj08uf317vtc.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(29, 61, 'p16giffsps93o44c1iftbg38pud.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(30, 61, 'p16giffspt17pup3vt9t14k715mmf.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(31, 61, 'p16giffspr1oje30e8tf1e3l1uada.jpg', '', 36);
INSERT INTO `member_pictures` VALUES(32, 64, 'p16hgd8q5g1fa5t5pi2p4ab1num4.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(33, 64, 'p16hgd8q5i1m7k1ie71i5b1iiv1el8b.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(34, 64, 'p16hgd8q5h1on35kv1s5e1j0mb976.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(35, 64, 'p16hgd8q5h1sfvr0u1bm1m031rt75.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(36, 64, 'p16hgd8q5i1evd194g8l7m6a294a.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(37, 64, 'p16hgd8q5h1nie1k7c1ghh1avv7eq7.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(38, 64, 'p16hgd8q5i1bhd9gj1q7i7cdhnu8.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(39, 64, 'p16hgd8q5ilg5tbpmojsjb1f9v9.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(40, 64, 'p16hgd8q5j1glm1j8516g61frfckac.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(41, 64, 'p16hgd8q5jr118p110me10prsrld.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(42, 64, 'p16hgd8q5lp3s108a4a51bjhpf2e.jpg', '', 37);
INSERT INTO `member_pictures` VALUES(43, 53, 'p16hkqs8bg17011s7h13ej2qe1n4i4.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(44, 53, 'p16hkqs8bi1q6a1i58ijdl37f8pc.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(45, 53, 'p16hkqs8bh1cf61q3j47k8tsqsm7.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(46, 53, 'p16hkqs8bh1cuup65180q1gqk11fi5.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(47, 53, 'p16hkqs8bh1o3b4sc1dik1pq6viu8.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(48, 53, 'p16hkqs8bh1b9c16lmejv1muelt6.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(49, 53, 'p16hkqs8bif311dkp13pnju613oca.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(50, 53, 'p16hkqs8bigd99is1d0r19ajji9.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(51, 53, 'p16hkqs8bk1u081de01unc7ec1m1e.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(52, 53, 'p16hkqs8bj1337l8iimn8du1rq3d.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(53, 53, 'p16hkqs8blvems5uepu1rea10f8f.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(54, 53, 'p16hkqs8biv9inth629d11614b.jpg', '', 38);
INSERT INTO `member_pictures` VALUES(55, 53, 'p16hlsa4sg1mdb6dbkd43ks1g1g4.jpg', 'Test', 40);
INSERT INTO `member_pictures` VALUES(56, 53, 'p16hlsa4sg38c14p91slo133h1gls5.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(57, 53, 'p16hlsa4sh127h1qtn7if16nt9fg7.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(58, 53, 'p16hlsa4shgkd1iuh1t7ugha1pgn6.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(59, 53, 'p16hlsa4sh133417181hks1s56134n8.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(60, 53, 'p16hlsa4si1r5q1o5q13081k175mia.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(61, 53, 'p16hlsa4shr38gup17m4tkk1pip9.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(62, 53, 'p16hlsa4si1ufcdq31fr7nog152ab.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(63, 53, 'p16hlsa4sjt1tfmu1g1t1a4h1rpqc.jpg', '', 40);
INSERT INTO `member_pictures` VALUES(76, 1, 'p16hmn0v2p16qj1f311fc91ouk19g74.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(77, 1, 'p16hmn0v2p1c9h134dvokblicn15.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(78, 1, 'p16hmn0v2q11dv1dt71i251bf44nj6.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(79, 1, 'p16hmn0v2s1duvrrrpf6107i1ot8c.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(80, 1, 'p16hmn0v2r15rf1ku31nuf1mqp1ac7b.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(81, 1, 'p16hmn0v2r1sklluj16gc14jblcna.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(82, 1, 'p16hmn0v2qju11sht2is1a5rjlt8.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(83, 1, 'p16hmn0v2rbtc1o2e14svrcge8b9.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(84, 1, 'p16hmn0v2q1rbb2s41k16tgj1hli7.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(85, 1, 'p16hmn0v2sb6556n1f6iua01ju1d.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(86, 1, 'p16hmn0v2t1h52an1nvnq3d159oe.jpg', '', 42);
INSERT INTO `member_pictures` VALUES(87, 65, 'p16hmq8u5337ispp1ofq12r21f954.jpg', 'fdjhfajkhdf', 43);
INSERT INTO `member_pictures` VALUES(88, 65, 'p16hmq8u53etbu9v16f91sbrjn75.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(89, 65, 'p16hmq8u53hrc5d21i9s129c1vee6.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(90, 65, 'p16hmq8u541uel1n7eoc7b9p1hbb9.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(91, 65, 'p16hmq8u54ihu1jcvlnj1ks0r7sa.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(92, 65, 'p16hmq8u546p1hvu822pce1sqq7.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(93, 65, 'p16hmq8u54ott2griaqali13gc8.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(94, 65, 'p16hmq8u551t7cm3h1kjg1ndn23sb.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(95, 65, 'p16hmq8u55h161tcsscl1bk0uf2d.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(96, 65, 'p16hmq8u55igc4ok1spv18eed70c.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(97, 65, 'p16hmq8u561rrci6u39f1pkp19snf.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(98, 65, 'p16hmq8u566mm19oh17e81otj1dpoe.jpg', '', 43);
INSERT INTO `member_pictures` VALUES(112, 51, 'p16hn4si2o1ob2apmb9t17i23an4.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(113, 51, 'p16hn4tunv18b5kv71o4b2n9jbl5.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(114, 51, 'p16hn4tunv1n0f1bsa6slujt1ihl4.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(115, 51, 'p16hn4tuo01005189nvcvhfrfum7.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(116, 51, 'p16hn4tuo01gab1esuhcba4a9nd8.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(117, 51, 'p16hn4tuo01iol1pg5163icpe1ghd6.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(118, 51, 'p16hn4tuo029g1pv41noc14vc88r9.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(119, 51, 'p16hn4tuo11g65fdvs3f1dqt1bofd.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(120, 51, 'p16hn4tuo11naj1qo2125m1bq2vugb.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(121, 51, 'p16hn4tuo13lg1kf37s2161f1298c.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(122, 51, 'p16hn4tuo1ibtnjftr51tnav5sa.jpg', '', 45);
INSERT INTO `member_pictures` VALUES(123, 51, 'p16hn4v2341gh9mt5u6ovtqsgq5.jpg', '', 46);
INSERT INTO `member_pictures` VALUES(131, 1, 'p16hrbbb17b01veitbc1uu91u154.jpg', 'Primer Ecuentro de Paz', 48);
INSERT INTO `member_pictures` VALUES(132, 1, 'p16hrbbb17pv71v5d9qv1m00d6j7.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(133, 1, 'p16hrbbb17kif1llul8p1ofo1b6q5.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(134, 1, 'p16hrbbb17r1s1til1ijpo3o2d26.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(135, 1, 'p16hrbbb181lv11jnm1qv0qmj19ru9.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(136, 1, 'p16hrbbb181omm1afi1h8720c17d9a.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(137, 1, 'p16hrbbb18i221h8u3p4slh2798.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(138, 1, 'p16hrbbb191q6063b1l9pbfot4nb.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(139, 1, 'p16hrbbb191r6u2uq1ikj8prsffc.jpg', '', 48);
INSERT INTO `member_pictures` VALUES(162, 55, 'p16jmfrab21l69dvscgv1e1k14164.jpg', '', 53);
INSERT INTO `member_pictures` VALUES(163, 55, 'p16jmfrab31ajm9q41i4qqf12ts7.jpg', '', 53);
INSERT INTO `member_pictures` VALUES(164, 55, 'p16jmfrab32pnvacq7hqr782b6.jpg', '', 53);
INSERT INTO `member_pictures` VALUES(165, 55, 'p16jmfrab3nmp1bhi1v3q1j8sspv5.jpg', '', 53);
INSERT INTO `member_pictures` VALUES(166, 55, 'p16jmfrab41l1a12ok1h1i16ts1oou9.jpg', '', 53);
INSERT INTO `member_pictures` VALUES(167, 1, 'p16mh6c3uj1n96sso11pg1sv2m535.png', 'Topps 1', 54);
INSERT INTO `member_pictures` VALUES(168, 1, 'p16mh6c3ujgq7fhhng3ct211m24.png', 'Topps 2', 54);
INSERT INTO `member_pictures` VALUES(169, 1, 'p16ndfk44b1q7men41tpn175anqt5.png', 'tets', 56);
INSERT INTO `member_pictures` VALUES(170, 1, 'p16ndfk44bnac11041pb67cb19b64.png', '', 56);
INSERT INTO `member_pictures` VALUES(171, 1, 'p16ndfk44breq1a6i3v9qibi8p6.png', '', 56);
INSERT INTO `member_pictures` VALUES(175, 73, 'p16t3vk8jf9d31t3v1qq51diufbr4.jpg', 'Mona con zapatos', 58);
INSERT INTO `member_pictures` VALUES(176, 73, 'p16t3vkdeg1j1i5hj17qhnaa5156.jpg', 'XX by Kaus', 58);
INSERT INTO `member_pictures` VALUES(177, 73, 'p170678t0ai4rabaprt1n3r28q4.jpg', '', 59);
INSERT INTO `member_pictures` VALUES(178, 73, 'p171p3cpipdc5g7713lpisq1n404.jpg', '', 59);
INSERT INTO `member_pictures` VALUES(179, 73, 'p171p3dvn810vfqh815gj8rspru4.jpg', '', 59);
INSERT INTO `member_pictures` VALUES(180, 73, 'p171p3enfgn191ifl1ah51abp1kub4.jpg', '', 61);

-- --------------------------------------------------------

--
-- Table structure for table `member_pictures_comments`
--

CREATE TABLE `member_pictures_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_id` int(11) DEFAULT '0',
  `album_id` int(11) DEFAULT '0',
  `user_from` int(11) DEFAULT '0',
  `time` timestamp NULL DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `pic_id` (`pic_id`),
  KEY `user_from` (`user_from`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `member_pictures_comments`
--

INSERT INTO `member_pictures_comments` VALUES(4, 112, 45, 51, '2011-12-24 16:23:43', 'Si me gusta mucho esta foto');
INSERT INTO `member_pictures_comments` VALUES(5, 139, 48, 1, '2011-12-25 13:33:45', 'Me gusto haber particiado en este encuentro');
INSERT INTO `member_pictures_comments` VALUES(6, 131, 48, 1, '2011-12-25 13:34:39', 'Que buena cadenita se armo');
INSERT INTO `member_pictures_comments` VALUES(7, 131, 48, 1, '2012-01-05 01:08:37', 'Me gusto mucho esta foto');
INSERT INTO `member_pictures_comments` VALUES(10, 165, 53, 55, '2012-01-17 12:48:09', 'esta foto vaya que no me gusta');
INSERT INTO `member_pictures_comments` VALUES(11, 165, 53, 55, '2012-01-17 12:59:28', 'tienes toda la razon');
INSERT INTO `member_pictures_comments` VALUES(12, 165, 53, 55, '2012-01-17 12:59:37', 'si que si');
INSERT INTO `member_pictures_comments` VALUES(13, 165, 53, 55, '2012-01-17 12:59:39', 'si que si');
INSERT INTO `member_pictures_comments` VALUES(14, 165, 53, 55, '2012-01-17 12:59:48', 'vamos a poner muchos muchos comentarios');
INSERT INTO `member_pictures_comments` VALUES(15, 165, 53, 55, '2012-01-17 12:59:59', 'aver que pasa, aver si podemos hacer que no se carguen');
INSERT INTO `member_pictures_comments` VALUES(16, 171, 56, 1, '2012-03-03 17:52:18', 'atdf');
INSERT INTO `member_pictures_comments` VALUES(17, 171, 56, 1, '2012-03-03 17:52:18', 'as');
INSERT INTO `member_pictures_comments` VALUES(18, 171, 56, 1, '2012-03-03 17:52:19', 'adfa');
INSERT INTO `member_pictures_comments` VALUES(19, 171, 56, 1, '2012-03-03 17:52:19', 'sdf');
INSERT INTO `member_pictures_comments` VALUES(20, 171, 56, 1, '2012-03-03 17:52:19', 'asdf');
INSERT INTO `member_pictures_comments` VALUES(21, 171, 56, 1, '2012-03-03 17:52:20', 'asdf');
INSERT INTO `member_pictures_comments` VALUES(22, 171, 56, 1, '2012-03-03 17:52:20', 'asdf');
INSERT INTO `member_pictures_comments` VALUES(23, 171, 56, 1, '2012-03-03 17:52:20', 'asd');
INSERT INTO `member_pictures_comments` VALUES(24, 171, 56, 1, '2012-03-03 17:52:20', 'fsad');
INSERT INTO `member_pictures_comments` VALUES(25, 176, 58, 73, '2012-06-20 19:33:30', 'adasdas');

-- --------------------------------------------------------

--
-- Table structure for table `member_pictures_people_tags`
--

CREATE TABLE `member_pictures_people_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT '0',
  `pic_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `pic_id` (`pic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `member_pictures_people_tags`
--

INSERT INTO `member_pictures_people_tags` VALUES(4, 48, 139, 51);
INSERT INTO `member_pictures_people_tags` VALUES(5, 48, 139, 63);
INSERT INTO `member_pictures_people_tags` VALUES(6, 48, 131, 51);
INSERT INTO `member_pictures_people_tags` VALUES(9, 56, 169, 53);
INSERT INTO `member_pictures_people_tags` VALUES(10, 56, 169, 51);
INSERT INTO `member_pictures_people_tags` VALUES(11, 56, 169, 63);

-- --------------------------------------------------------

--
-- Table structure for table `member_references`
--

CREATE TABLE `member_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` int(11) NOT NULL DEFAULT '0',
  `user_to` int(11) NOT NULL DEFAULT '0',
  `skill_id` int(128) NOT NULL DEFAULT '0',
  `grade` int(3) NOT NULL DEFAULT '0',
  `description` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `skill_id` (`skill_id`),
  KEY `user_from` (`user_from`),
  KEY `user_to` (`user_to`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `member_references`
--

INSERT INTO `member_references` VALUES(59, 55, 54, 134, 100, 'this guy is pure bullshit');
INSERT INTO `member_references` VALUES(60, 1, 51, 61, 83, 'ALGO ASI ');
INSERT INTO `member_references` VALUES(61, 61, 55, 49, 92, 'Me gusta lo que haces');
INSERT INTO `member_references` VALUES(62, 65, 64, 156, 100, 'Me gusta como das la clase');
INSERT INTO `member_references` VALUES(63, 1, 51, 61, 78, 'Se me hace que eres bueno en esto');
INSERT INTO `member_references` VALUES(64, 51, 55, 49, 100, 'Eres muu bueno');

-- --------------------------------------------------------

--
-- Table structure for table `member_skills`
--

CREATE TABLE `member_skills` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `skill_id` int(10) NOT NULL,
  `grade` double DEFAULT NULL,
  `description` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_skills_index2055` (`user_id`,`skill_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `member_skills`
--

INSERT INTO `member_skills` VALUES(187, 52, 75, 76, 'Soy amateur aun en esto');
INSERT INTO `member_skills` VALUES(188, 51, 61, 74, 'SOY BIEN CHINGON');
INSERT INTO `member_skills` VALUES(189, 54, 134, 89, 'Soy bueno');
INSERT INTO `member_skills` VALUES(190, 54, 155, 57, 'sgsdfgsdf');
INSERT INTO `member_skills` VALUES(191, 55, 49, 33, 'Beginner in urban gardening');
INSERT INTO `member_skills` VALUES(192, 61, 38, 92, 'Se hacer muy bien las cosas');
INSERT INTO `member_skills` VALUES(193, 61, 75, 80, 'sadfasdfasdf');
INSERT INTO `member_skills` VALUES(194, 51, 28, 82, 'ME graduÃ© en Harvard ');
INSERT INTO `member_skills` VALUES(197, 64, 1, 89, 'Soy mu buena');
INSERT INTO `member_skills` VALUES(198, 64, 119, 91, 'gahsjdhasgdf');
INSERT INTO `member_skills` VALUES(199, 64, 37, 99, 'asfsdf');
INSERT INTO `member_skills` VALUES(200, 64, 156, 45, 'adhfkjasdf');
INSERT INTO `member_skills` VALUES(201, 1, 143, 77, 'Nueva Skill');
INSERT INTO `member_skills` VALUES(202, 1, 45, 86, 'Se hacer muchas cosas !');
INSERT INTO `member_skills` VALUES(203, 1, 75, 85, 'description');
INSERT INTO `member_skills` VALUES(205, 71, 1, 85, 'Esto lo aprendi en mi casa haciendo proyectos relacionados con la permacultura');
INSERT INTO `member_skills` VALUES(206, 51, 45, 77, 'AprendÃ­ esta habilidad viajando a diferentes centros permaculturales del mundo');
INSERT INTO `member_skills` VALUES(207, 72, 61, 74, 'desc');
INSERT INTO `member_skills` VALUES(208, 72, 7, 79, 'ffgfg');
INSERT INTO `member_skills` VALUES(209, 51, 1, 77, 'Me gusta construir');
INSERT INTO `member_skills` VALUES(210, 73, 135, 100, 'Bueno');
INSERT INTO `member_skills` VALUES(211, 73, 79, 100, 'Bien');
INSERT INTO `member_skills` VALUES(212, 73, 67, 77, 'French');
INSERT INTO `member_skills` VALUES(213, 73, 113, 69, 'Test');
INSERT INTO `member_skills` VALUES(214, 73, 155, 12, 'Test');
INSERT INTO `member_skills` VALUES(215, 73, 36, 47, 'Test');
INSERT INTO `member_skills` VALUES(216, 73, 18, 29, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `member_trips`
--

CREATE TABLE `member_trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `address` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `days` int(10) DEFAULT '0',
  `description` varchar(240) DEFAULT NULL,
  `latitude` varchar(128) DEFAULT NULL,
  `longitude` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `member_trips`
--

INSERT INTO `member_trips` VALUES(59, 54, 'Palenque, Chiapas, Mexico', 'Oaxaca', '2011-12-20', 19, 'ajskdhfjkashdfkjhas', '17.5100299', ' -91.98149639999997');
INSERT INTO `member_trips` VALUES(60, 55, 'TepoztlÃ¡n, Morelos, Mexico', 'Ometeotl', '2011-11-18', 3, 'Road trip to festival', '18.985', ' -99.10000000000002');
INSERT INTO `member_trips` VALUES(62, 61, 'Colombia', 'Cumbre Ecoaldeas', '2011-01-01', 10, 'asdfkjaklsdflkjasdklfj', '4.570868', ' -74.29733299999998');
INSERT INTO `member_trips` VALUES(64, 1, 'Malaysia', 'My first trip', '2011-12-22', 10, 'Va a ser muy relajante', '4.210484', ' 101.97576600000002');
INSERT INTO `member_trips` VALUES(65, 51, 'Chiapas, Mexico', 'Primer Trip', '2011-12-21', 5, 'Testyjgfjghfgfjfjhgfghgfj', '16.1400945', ' -92.77798129999996');
INSERT INTO `member_trips` VALUES(66, 1, 'Tlacotalpan, VER, MÃ©xico', 'Viaje del Sol', '2012-01-20', 3, 'Quiero conocer este lugar', '18.6134239', ' -95.66135109999999');
INSERT INTO `member_trips` VALUES(67, 71, 'Tlacotalpan, VER, Mexico', 'Viaje de la candelaria', '2012-01-26', 10, 'Voy a esta fiesta que se ve que va a estar muy muy buena', '18.6134239', ' -95.66135109999999');
INSERT INTO `member_trips` VALUES(68, 1, 'Uganda', 'Viaje a Africa', '2012-01-28', 10, 'Este viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos am', '1.373333', ' 32.290275000000065');
INSERT INTO `member_trips` VALUES(69, 1, 'Estonia', 'European Tour', '2012-01-24', 20, 'Este viaje va a ser muy recreativo, en el podremos visitar a mucha gente que conocimos a lo largo de nuestros viajes. Me gustarÃ­a mucho poder volver a ver a esos amigos de hace algÃºn tiempo, antiguos conocidos que representaron ', '58.595272', ' 25.01360699999998');
INSERT INTO `member_trips` VALUES(70, 72, 'Thailand', 'viaje a asia', '2012-04-19', 20, 'ghghfgfmfmgfgh', '15.870032', ' 100.99254100000007');
INSERT INTO `member_trips` VALUES(71, 51, 'Thailand', 'Asian Tour', '2012-04-12', 20, 'Va estar chido', '15.870032', ' 100.99254100000007');
INSERT INTO `member_trips` VALUES(72, 73, 'H, WI 54435, USA', 'test', '2012-03-22', 9, 'jkhklhjlhk', '45.3662588', ' -89.3828135');
INSERT INTO `member_trips` VALUES(73, 73, 'Monterrey, Nuevo LeÃ³n, Mexico', 'Roadtrip', '2012-05-14', 5, 'Roadtrip por el norte', '25.6732109', ' -100.30920100000003');

-- --------------------------------------------------------

--
-- Table structure for table `member_trips_comments`
--

CREATE TABLE `member_trips_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `trip_id` int(11) DEFAULT '0',
  `stop_id` int(11) DEFAULT '0',
  `comment` text,
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `member_trips_comments`
--

INSERT INTO `member_trips_comments` VALUES(1, 61, 62, 49, 'Aqui te recomiendo ir a jklahsdfjh', '2011-12-09 16:38:00');
INSERT INTO `member_trips_comments` VALUES(2, 51, 65, 57, 'test', '2011-12-24 14:02:43');
INSERT INTO `member_trips_comments` VALUES(3, 51, 65, 57, 'jgjgkj', '2011-12-24 14:02:48');
INSERT INTO `member_trips_comments` VALUES(4, 51, 65, 57, 'me gusta este lugar', '2011-12-24 18:17:02');
INSERT INTO `member_trips_comments` VALUES(5, 1, 66, 59, 'no me gusta esta parada, mejor vamos a tal lugar', '2012-01-02 12:48:23');
INSERT INTO `member_trips_comments` VALUES(6, 1, 66, 59, 'no seas aguafiestas', '2012-01-05 14:18:10');
INSERT INTO `member_trips_comments` VALUES(7, 1, 65, 62, 'Me gustÃ³ mucho visitar la zona, aquÃ­ subÃ­ unas fotos del lugar y de la gente que conocimos', '2012-01-06 02:08:13');
INSERT INTO `member_trips_comments` VALUES(8, 72, 70, 65, 'tgkjkk', '2012-02-28 17:07:39');
INSERT INTO `member_trips_comments` VALUES(9, 51, 71, 67, 'jh,kdhjkxc', '2012-02-28 18:24:50');
INSERT INTO `member_trips_comments` VALUES(10, 51, 71, 67, 'ad', '2012-02-28 18:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `member_trips_friends`
--

CREATE TABLE `member_trips_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trip_id` (`trip_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `member_trips_friends`
--

INSERT INTO `member_trips_friends` VALUES(3, 64, 51, 'confirmed');
INSERT INTO `member_trips_friends` VALUES(4, 65, 53, NULL);
INSERT INTO `member_trips_friends` VALUES(5, 65, 1, 'confirmed');
INSERT INTO `member_trips_friends` VALUES(6, 66, 53, NULL);
INSERT INTO `member_trips_friends` VALUES(7, 66, 51, NULL);
INSERT INTO `member_trips_friends` VALUES(8, 66, 56, NULL);
INSERT INTO `member_trips_friends` VALUES(9, 66, 2, NULL);
INSERT INTO `member_trips_friends` VALUES(10, 65, 56, NULL);
INSERT INTO `member_trips_friends` VALUES(11, 65, 55, NULL);
INSERT INTO `member_trips_friends` VALUES(12, 65, 59, NULL);
INSERT INTO `member_trips_friends` VALUES(13, 68, 63, NULL);
INSERT INTO `member_trips_friends` VALUES(14, 68, 58, NULL);
INSERT INTO `member_trips_friends` VALUES(15, 68, 53, NULL);
INSERT INTO `member_trips_friends` VALUES(16, 68, 51, NULL);
INSERT INTO `member_trips_friends` VALUES(17, 69, 63, NULL);
INSERT INTO `member_trips_friends` VALUES(18, 71, 55, NULL);
INSERT INTO `member_trips_friends` VALUES(19, 71, 59, NULL);
INSERT INTO `member_trips_friends` VALUES(20, 71, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_trips_skills`
--

CREATE TABLE `member_trips_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT '0',
  `skill_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `skill_id` (`skill_id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `member_trips_skills`
--

INSERT INTO `member_trips_skills` VALUES(56, 59, 1);
INSERT INTO `member_trips_skills` VALUES(57, 60, 142);
INSERT INTO `member_trips_skills` VALUES(59, 62, 1);
INSERT INTO `member_trips_skills` VALUES(62, 64, 1);
INSERT INTO `member_trips_skills` VALUES(63, 65, 24);
INSERT INTO `member_trips_skills` VALUES(64, 66, 51);
INSERT INTO `member_trips_skills` VALUES(65, 67, 25);
INSERT INTO `member_trips_skills` VALUES(66, 70, 9);
INSERT INTO `member_trips_skills` VALUES(67, 71, 1);
INSERT INTO `member_trips_skills` VALUES(68, 72, 1);
INSERT INTO `member_trips_skills` VALUES(69, 73, 34);

-- --------------------------------------------------------

--
-- Table structure for table `member_trips_stops`
--

CREATE TABLE `member_trips_stops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `trip_id` int(11) DEFAULT '0',
  `title` varchar(128) DEFAULT NULL,
  `description` text,
  `datefrom` date DEFAULT NULL,
  `days` varchar(128) DEFAULT NULL,
  `latitude` varchar(128) DEFAULT NULL,
  `longitude` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `member_trips_stops`
--

INSERT INTO `member_trips_stops` VALUES(45, 54, 59, 'Oaxaca', 'ajskdhfjkashdfkjhas', '2011-12-20', '19', '17.5100299', ' -91.98149639999997', 'Palenque, Chiapas, Mexico');
INSERT INTO `member_trips_stops` VALUES(46, 54, 59, 'Playita', 'sadfasdf', '2011-12-22', '10', '15.6662219', ' -96.55225039999999', 'Mazunte, Oaxaca, Mexico');
INSERT INTO `member_trips_stops` VALUES(47, 55, 60, 'Ometeotl', 'Road trip to festival', '2011-11-18', '3', '18.985', ' -99.10000000000002', 'TepoztlÃ¡n, Morelos, Mexico');
INSERT INTO `member_trips_stops` VALUES(49, 61, 62, 'Cumbre Ecoaldeas', 'asdfkjaklsdflkjasdklfj', '2011-01-01', '10', '4.570868', ' -74.29733299999998', 'Colombia');
INSERT INTO `member_trips_stops` VALUES(50, 61, 62, 'Segunda Parada', 'Vjahfjklasdfhjklasdhf', '2011-01-03', '8', '5.026002999999999', ' -74.03001219999999', 'Cundinamarca, Colombia');
INSERT INTO `member_trips_stops` VALUES(55, 1, 64, 'Asian Tour', 'Va a ser divertida', '2011-12-20', '10', '4.210484', ' 101.97576600000002', 'Malaysia');
INSERT INTO `member_trips_stops` VALUES(56, 1, 64, 'Asian Tour 2', 'Solo una paradita por aqui', '2011-12-30', '10', '7.9843109', ' 98.33074680000004', 'Phuket, Thailand');
INSERT INTO `member_trips_stops` VALUES(57, 51, 65, 'Primer Trip', 'Testyjgfjghfgfjfjhgfghgfj', '2011-12-21', '5', '16.1400945', ' -92.77798129999996', 'Chiapas, Mexico');
INSERT INTO `member_trips_stops` VALUES(58, 51, 65, 'Segunda Parada', 'Va a estar bien chida', '2011-12-29', '4', '16.2436147', ' -92.12354240000002', 'Comitan, Chiapas, Mexico');
INSERT INTO `member_trips_stops` VALUES(59, 1, 66, 'Viaje del Sol', 'Quiero conocer este lugar', '2012-01-20', '3', '18.6134239', ' -95.66135109999999', 'Tlacotalpan, VER, MÃ©xico');
INSERT INTO `member_trips_stops` VALUES(60, 1, 66, 'Parada Chamanica', 'Para ir con los changos', '2012-01-27', '3', '18.4217237', ' -95.11121609999998', 'Catemaco, VER, MÃ©xico');
INSERT INTO `member_trips_stops` VALUES(61, 71, 67, 'Viaje de la candelaria', 'Voy a esta fiesta que se ve que va a estar muy muy buena', '2012-01-26', '10', '18.6134239', ' -95.66135109999999', 'Tlacotalpan, VER, Mexico');
INSERT INTO `member_trips_stops` VALUES(62, 51, 65, 'Una visita a las pirÃ¡mides', 'Esta parada serÃ¡ para apreciar la belleza de chiapas y las pirÃ¡mides de la zona', '2012-01-27', '8', '16.7060897', ' -91.06413309999999', 'Bonampak, Chiapas, Mexico');
INSERT INTO `member_trips_stops` VALUES(63, 1, 68, 'Viaje a Africa', 'Este viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigosEste viaje estara buenisimo, qiuero ir con todos mis buenos amigos', '2012-01-28', '10', '1.373333', ' 32.290275000000065', 'Uganda');
INSERT INTO `member_trips_stops` VALUES(64, 1, 69, 'European Tour', 'Este viaje va a ser muy recreativo, en el podremos visitar a mucha gente que conocimos a lo largo de nuestros viajes. Me gustarÃ­a mucho poder volver a ver a esos amigos de hace algÃºn tiempo, antiguos conocidos que representaron ', '2012-01-24', '20', '58.595272', ' 25.01360699999998', 'Estonia');
INSERT INTO `member_trips_stops` VALUES(65, 72, 70, 'viaje a asia', 'ghghfgfmfmgfgh', '2012-04-19', '20', '15.870032', ' 100.99254100000007', 'Thailand');
INSERT INTO `member_trips_stops` VALUES(66, 72, 70, 'Test', 'dfgsdfgsdf', '2012-02-15', '122', '46.1365907', ' -91.71538069999997', 'G, Minong, WI 54859, USA');
INSERT INTO `member_trips_stops` VALUES(67, 51, 71, 'Asian Tour', 'Va estar chido', '2012-04-12', '20', '15.870032', ' 100.99254100000007', 'Thailand');
INSERT INTO `member_trips_stops` VALUES(68, 51, 71, 'Malasya', 'jhjksa', '2012-02-25', '23', '4.210484', ' 101.97576600000002', 'Malaysia');
INSERT INTO `member_trips_stops` VALUES(69, 73, 72, 'test', 'jkhklhjlhk', '2012-03-22', '9', '45.3662588', ' -89.3828135', 'H, WI 54435, USA');
INSERT INTO `member_trips_stops` VALUES(70, 73, 73, 'Roadtrip', 'Roadtrip por el norte', '2012-05-14', '5', '25.6732109', ' -100.30920100000003', 'Monterrey, Nuevo LeÃ³n, Mexico');
INSERT INTO `member_trips_stops` VALUES(71, 73, 73, 'Saltiranch', 'Museo del desierto', '2012-05-16', '2', '25.4267244', ' -100.99542539999999', 'Saltillo, Coahuila, Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `user_from` int(11) DEFAULT '0',
  `message` text,
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thread_id` (`thread_id`),
  KEY `user_id` (`user_id`),
  KEY `user_from` (`user_from`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=191 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` VALUES(145, 40, 1, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(146, 40, 59, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(147, 40, 63, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(148, 40, 58, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(149, 40, 50, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(150, 40, 55, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(151, 40, 51, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(152, 40, 69, 1, 'First Multithread', '2012-01-21 02:53:33');
INSERT INTO `messages` VALUES(161, 43, 1, 1, 'Singlethread message 1', '2012-01-21 02:56:07');
INSERT INTO `messages` VALUES(162, 43, 59, 1, 'Singlethread message 1', '2012-01-21 02:56:07');
INSERT INTO `messages` VALUES(163, 43, 1, 1, 'Singlethread message 2', '2012-01-21 02:56:44');
INSERT INTO `messages` VALUES(164, 43, 59, 1, 'Singlethread message 2', '2012-01-21 02:56:44');
INSERT INTO `messages` VALUES(165, 43, 1, 1, 'Single thread 3', '2012-01-21 02:57:25');
INSERT INTO `messages` VALUES(166, 43, 59, 1, 'Single thread 3', '2012-01-21 02:57:25');
INSERT INTO `messages` VALUES(169, 46, 51, 51, 'My last message', '2012-01-21 03:08:22');
INSERT INTO `messages` VALUES(170, 46, 57, 51, 'My last message', '2012-01-21 03:08:22');
INSERT INTO `messages` VALUES(171, 47, 1, 1, 'Te quiero enviar un mensaje de prueba', '2012-01-28 16:00:45');
INSERT INTO `messages` VALUES(172, 47, 51, 1, 'Te quiero enviar un mensaje de prueba', '2012-01-28 16:00:45');
INSERT INTO `messages` VALUES(173, 47, 1, 1, 'Probando funcionalidad dos', '2012-01-28 16:01:12');
INSERT INTO `messages` VALUES(174, 47, 51, 1, 'Probando funcionalidad dos', '2012-01-28 16:01:12');
INSERT INTO `messages` VALUES(175, 47, 1, 1, 'Esta es la tres', '2012-01-28 16:01:40');
INSERT INTO `messages` VALUES(176, 47, 51, 1, 'Esta es la tres', '2012-01-28 16:01:40');
INSERT INTO `messages` VALUES(177, 48, 1, 1, 'Creo que lo unico que no funciona es el last message', '2012-01-28 16:02:44');
INSERT INTO `messages` VALUES(178, 48, 50, 1, 'Creo que lo unico que no funciona es el last message', '2012-01-28 16:02:44');
INSERT INTO `messages` VALUES(179, 49, 1, 1, 'Un multi mas', '2012-01-28 16:03:09');
INSERT INTO `messages` VALUES(180, 49, 69, 1, 'Un multi mas', '2012-01-28 16:03:09');
INSERT INTO `messages` VALUES(181, 49, 63, 1, 'Un multi mas', '2012-01-28 16:03:09');
INSERT INTO `messages` VALUES(182, 49, 61, 1, 'Un multi mas', '2012-01-28 16:03:09');
INSERT INTO `messages` VALUES(183, 49, 58, 1, 'Un multi mas', '2012-01-28 16:03:09');
INSERT INTO `messages` VALUES(184, 49, 50, 1, 'Un multi mas', '2012-01-28 16:03:09');
INSERT INTO `messages` VALUES(185, 62, 1, 1, 'test', '2012-02-28 18:15:14');
INSERT INTO `messages` VALUES(186, 62, 69, 1, 'test', '2012-02-28 18:15:14');
INSERT INTO `messages` VALUES(187, 62, 51, 1, 'test', '2012-02-28 18:15:14');
INSERT INTO `messages` VALUES(188, 62, 53, 1, 'test', '2012-02-28 18:15:14');
INSERT INTO `messages` VALUES(189, 62, 63, 1, 'test', '2012-02-28 18:15:14');
INSERT INTO `messages` VALUES(190, 62, 50, 1, 'test', '2012-02-28 18:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `message_read_state`
--

CREATE TABLE `message_read_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `time` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message_read_state`
--


-- --------------------------------------------------------

--
-- Table structure for table `message_threads`
--

CREATE TABLE `message_threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT '0',
  `type` varchar(128) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `message_threads`
--

INSERT INTO `message_threads` VALUES(40, 1, 'multi', '2012-01-21 02:53:33');
INSERT INTO `message_threads` VALUES(43, 1, 'single', '2012-01-21 02:56:07');
INSERT INTO `message_threads` VALUES(44, 51, 'multi', '2012-01-21 03:07:42');
INSERT INTO `message_threads` VALUES(45, 51, 'multi', '2012-01-21 03:08:04');
INSERT INTO `message_threads` VALUES(46, 51, 'single', '2012-01-21 03:08:22');
INSERT INTO `message_threads` VALUES(47, 1, 'single', '2012-01-28 16:00:45');
INSERT INTO `message_threads` VALUES(48, 1, 'single', '2012-01-28 16:02:44');
INSERT INTO `message_threads` VALUES(49, 1, 'multi', '2012-01-28 16:03:09');
INSERT INTO `message_threads` VALUES(50, 1, 'single', '2012-01-30 10:16:26');
INSERT INTO `message_threads` VALUES(51, 1, 'single', '2012-01-30 10:18:25');
INSERT INTO `message_threads` VALUES(52, 1, 'single', '2012-01-30 10:18:34');
INSERT INTO `message_threads` VALUES(53, 1, 'single', '2012-01-30 10:20:30');
INSERT INTO `message_threads` VALUES(54, 1, 'single', '2012-01-30 10:49:12');
INSERT INTO `message_threads` VALUES(55, 1, 'single', '2012-01-30 21:09:28');
INSERT INTO `message_threads` VALUES(56, 1, 'single', '2012-01-30 21:09:39');
INSERT INTO `message_threads` VALUES(57, 1, 'single', '2012-01-30 21:11:28');
INSERT INTO `message_threads` VALUES(58, 1, 'single', '2012-01-30 21:12:23');
INSERT INTO `message_threads` VALUES(59, 1, 'single', '2012-01-30 21:19:35');
INSERT INTO `message_threads` VALUES(60, 1, 'single', '2012-01-30 21:20:13');
INSERT INTO `message_threads` VALUES(61, 1, 'single', '2012-02-21 17:47:09');
INSERT INTO `message_threads` VALUES(62, 1, 'multi', '2012-02-28 18:15:14');
INSERT INTO `message_threads` VALUES(63, 51, 'single', '2012-02-28 18:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `message_thread_members`
--

CREATE TABLE `message_thread_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `thread_id` (`thread_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `message_thread_members`
--

INSERT INTO `message_thread_members` VALUES(66, 40, 1);
INSERT INTO `message_thread_members` VALUES(67, 40, 59);
INSERT INTO `message_thread_members` VALUES(68, 40, 63);
INSERT INTO `message_thread_members` VALUES(69, 40, 58);
INSERT INTO `message_thread_members` VALUES(70, 40, 50);
INSERT INTO `message_thread_members` VALUES(71, 40, 55);
INSERT INTO `message_thread_members` VALUES(72, 40, 51);
INSERT INTO `message_thread_members` VALUES(73, 40, 69);
INSERT INTO `message_thread_members` VALUES(82, 43, 1);
INSERT INTO `message_thread_members` VALUES(83, 43, 59);
INSERT INTO `message_thread_members` VALUES(84, 43, 1);
INSERT INTO `message_thread_members` VALUES(85, 43, 59);
INSERT INTO `message_thread_members` VALUES(86, 43, 1);
INSERT INTO `message_thread_members` VALUES(87, 43, 59);
INSERT INTO `message_thread_members` VALUES(88, 44, 51);
INSERT INTO `message_thread_members` VALUES(89, 45, 51);
INSERT INTO `message_thread_members` VALUES(90, 46, 51);
INSERT INTO `message_thread_members` VALUES(91, 46, 57);
INSERT INTO `message_thread_members` VALUES(92, 47, 1);
INSERT INTO `message_thread_members` VALUES(93, 47, 51);
INSERT INTO `message_thread_members` VALUES(94, 47, 1);
INSERT INTO `message_thread_members` VALUES(95, 47, 51);
INSERT INTO `message_thread_members` VALUES(96, 47, 1);
INSERT INTO `message_thread_members` VALUES(97, 47, 51);
INSERT INTO `message_thread_members` VALUES(98, 48, 1);
INSERT INTO `message_thread_members` VALUES(99, 48, 50);
INSERT INTO `message_thread_members` VALUES(100, 49, 1);
INSERT INTO `message_thread_members` VALUES(101, 49, 69);
INSERT INTO `message_thread_members` VALUES(102, 49, 63);
INSERT INTO `message_thread_members` VALUES(103, 49, 61);
INSERT INTO `message_thread_members` VALUES(104, 49, 58);
INSERT INTO `message_thread_members` VALUES(105, 49, 50);
INSERT INTO `message_thread_members` VALUES(106, 50, 1);
INSERT INTO `message_thread_members` VALUES(108, 51, 1);
INSERT INTO `message_thread_members` VALUES(110, 52, 1);
INSERT INTO `message_thread_members` VALUES(112, 53, 1);
INSERT INTO `message_thread_members` VALUES(114, 54, 1);
INSERT INTO `message_thread_members` VALUES(115, 55, 1);
INSERT INTO `message_thread_members` VALUES(117, 56, 1);
INSERT INTO `message_thread_members` VALUES(119, 57, 1);
INSERT INTO `message_thread_members` VALUES(120, 62, 1);
INSERT INTO `message_thread_members` VALUES(121, 62, 69);
INSERT INTO `message_thread_members` VALUES(122, 62, 51);
INSERT INTO `message_thread_members` VALUES(123, 62, 53);
INSERT INTO `message_thread_members` VALUES(124, 62, 63);
INSERT INTO `message_thread_members` VALUES(125, 62, 50);

-- --------------------------------------------------------

--
-- Table structure for table `miembros`
--

CREATE TABLE `miembros` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_idioma` varchar(5) CHARACTER SET latin1 NOT NULL,
  `usuario` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nombre` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `apellido` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ciudad` varchar(50) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(50) CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(50) CHARACTER SET latin1 NOT NULL,
  `contrasena` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sexo` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `settings_tracking` int(11) NOT NULL,
  `hash` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `text_display` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `about` text CHARACTER SET latin1,
  `gender` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `aboutme` varchar(240) CHARACTER SET latin1 DEFAULT NULL,
  `user_kins` int(50) DEFAULT '0',
  `latitude` varchar(128) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT '0',
  `longitude` varchar(128) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `miembros`
--

INSERT INTO `miembros` VALUES(1, 'es', 'carlosepp', 'Carlos Eduardo', 'PÃ©rez Priego', 'carlos.perez@ecologikal.net', 'TESTEST', 'Nuevo Leon', '8117999477', '0eef4117af7c5ce9b9107c5ea562e746', '', '2011-04-01', '2011-08-03', 0, '4e39d0ac405fa', 'Testing\n', 'Mexicanos', 'Im just another Human Being', 'Male', '1986-08-01', '(52) 811 79 994 77', 'Mexico', 'La vida es Bella', 129, '25.6609353', ' -100.41594759999998');
INSERT INTO `miembros` VALUES(2, 'es', 'alex', 'Alex', 'Mass', 'alex@eco.net', 'Monterrey', 'Nuevo Leon', '811 285 7388', '827ccb0eea8a706c4c34a16891f84e7b', '', '1980-01-13', '2011-08-03', 0, '4e39d14f0baee', 'My display', 'Mexicano', 'Acerca de mi\n', 'Male', '1997-01-01', '(00) 000 00 000 00', 'Mexico', NULL, 3, '25.6609389', ' -100.4159995');
INSERT INTO `miembros` VALUES(50, 'es', 'carlos', 'carlos', NULL, 'carlos@carlos.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-07', 0, '4ee0178f0ff0f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '25.6684156', ' -100.36927689999999');
INSERT INTO `miembros` VALUES(51, 'es', 'felix', 'felixcollado', NULL, 'flxclld@gmail.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee0eff5a2e68', NULL, NULL, NULL, 'Male', NULL, '(22) 222 22 222 22', 'Mexico', 'Nada que decir', 15, '25.669976', ' -100.37441990000002');
INSERT INTO `miembros` VALUES(52, 'es', 'piolo', 'piolo', '', 'carlosepp@gmail.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee0f7d97b9b9', NULL, NULL, NULL, 'Not Disclosed', NULL, '(81) 239 81 290 38', 'Mexico', 'What the fuck', 3, '25.6684156', ' -100.36927689999999');
INSERT INTO `miembros` VALUES(53, 'es', 'firefox', 'firefox', NULL, 'firefox@fire.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee0f82fad46d', NULL, NULL, NULL, 'Male', NULL, '(23) 423 41 234 12', 'United States', 'Me gustaria compartir que es navidad', 0, '19.1515354', ' -96.09777120000001');
INSERT INTO `miembros` VALUES(54, 'es', 'john', 'john', NULL, 'john@cam.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee152b7d4099', NULL, NULL, NULL, 'Male', NULL, '(52) 811 79 994 77', 'Mexico', 'Texto de prueba', 6, '25.6609212', ' -100.41599889999998');
INSERT INTO `miembros` VALUES(55, 'es', 'Isaac', 'Don', 'Isaac', 'isaac@casasemilla.org', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee15d4196da4', NULL, NULL, NULL, 'Male', '1982-08-11', NULL, 'Mexico', NULL, 6, '25.6606805', ' -100.28156490000003');
INSERT INTO `miembros` VALUES(56, 'es', 'new', 'new', NULL, 'new@new.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee18e3585c75', NULL, NULL, NULL, 'Not Disclosed', NULL, '(12) 423 41 234 12', 'Mexico', 'Not Much About me', 0, '25.6605516', ' -100.28146459999999');
INSERT INTO `miembros` VALUES(57, 'es', 'newnew', 'newnew', NULL, 'new@uhuhu.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-08', 0, '4ee18f827b27c', NULL, NULL, NULL, 'Female', NULL, '(12) 341 23 412 34', 'Mexico', 'This is just another test', 0, '25.6609032', ' -100.41601049999997');
INSERT INTO `miembros` VALUES(58, 'es', 'caca', 'caca', NULL, 'caca@caca.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-09', 0, '4ee27f80cd361', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '25.6605516', ' -100.28146459999999');
INSERT INTO `miembros` VALUES(59, 'es', 'carloscarlos', 'carloscarlos', NULL, 'carlos@caca.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-09', 0, '4ee2805eaaa94', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '0');
INSERT INTO `miembros` VALUES(60, 'es', 'karla', 'karla', NULL, 'carla@carla.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-09', 0, '4ee280886fd86', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '25.6609906', ' -100.4157429');
INSERT INTO `miembros` VALUES(61, 'es', 'andrea', 'andrea', NULL, 'andrea@ecologikal.net', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-09', 0, '4ee28cb77a721', NULL, NULL, NULL, NULL, NULL, '(52) 811 79 994 77', NULL, 'Andrea', 9, '25.6609546', ' -100.41592550000001');
INSERT INTO `miembros` VALUES(63, 'es', 'newuser', 'Carlos', 'Eduardo', 'new@nesfskf.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-13', 0, '4ee77877b2740', NULL, NULL, NULL, 'Male', NULL, '(52) 811 79 994 77', 'Mexico', 'Soy un hombre como todos los demas', 0, '25.6609282', ' -100.41597339999998');
INSERT INTO `miembros` VALUES(64, 'es', 'ana', 'Ana', 'Luisa Perez', 'ana@gmail.com', '', '', '', '3c57280038eb8391623c076be9a0fd61', '', '0000-00-00', '2011-12-20', 0, '4ef163ff7173c', NULL, NULL, NULL, 'Female', NULL, '(12) 374 87 283 94', 'Mexico', 'Me gusta mucho dormir', 12, '0', '0');
INSERT INTO `miembros` VALUES(65, 'es', 'marialuisa', 'Maria Luisa', 'PÃ©rez', 'marialuisa@gmail.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2011-12-23', 0, '4ef5274989840', NULL, NULL, NULL, 'Female', '1960-12-25', '(22) 925 05 999 99', 'Mexico', 'Soy una madre muy buena\n', 3, '19.151502', ' -96.09748059999998');
INSERT INTO `miembros` VALUES(67, 'es', 'fortunato', 'fortunato', NULL, 'fortuna@gmail.com', '', '', '', 'b564181fd4f10b1fd87889e33342ca71', '', '0000-00-00', '2012-01-02', 0, '4f01ef0309e9f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '0');
INSERT INTO `miembros` VALUES(69, 'es', 'ecoadmin', 'ecoadmin', NULL, 'ecoadmin@eco.net', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2012-01-04', 0, '4f04cdef68481', NULL, NULL, NULL, NULL, NULL, NULL, 'Mexico', NULL, 0, '19.1515425', ' -96.0974478');
INSERT INTO `miembros` VALUES(70, 'es', 'ecologikal', 'ecologikal', NULL, 'eco@eco.net', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2012-01-04', 0, '4f04dcc37cb4f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '19.151889', ' -96.098412');
INSERT INTO `miembros` VALUES(71, 'es', 'nuevousuario', 'nuevousuario', NULL, 'nuevo@nuevo.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2012-01-04', 0, '4f04ddd468ecf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '19.1518351', ' -96.0970355');
INSERT INTO `miembros` VALUES(72, 'es', 'nohemi', 'nohemi', NULL, 'nohemi.olvera@gmail.com', '', '', '', 'd423c1a3ea02b5ad0cc4f2d3ac92c4e4', '', '0000-00-00', '2012-02-28', 0, '4f4d5d76ac8d7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '25.75', ' -100.28333299999997');
INSERT INTO `miembros` VALUES(73, 'es', 'adsgm', 'adsgm', NULL, 'adsguz@gmail.com', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00', '2012-03-03', 0, '4f52c232cd54f', NULL, NULL, NULL, 'Male', '1986-09-20', '(11) 111 11 111 11', 'Mexico', 'This is my profile', 21, '25.6602806', ' -100.28104730000001');
INSERT INTO `miembros` VALUES(89, 'en_GB', 'ads.gm', 'Andres', 'Guz M', 'adsgm@hotmail.com', 'Monterrey', ' Nuevo Leon', '', '', 'male', '1986-09-20', '2012-05-05', 0, '4fa5c0aa6883e', NULL, NULL, NULL, NULL, NULL, NULL, ' Mexico', NULL, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `miembros_actividades`
--

CREATE TABLE `miembros_actividades` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_termino` datetime NOT NULL,
  `estatus` varchar(10) CHARACTER SET latin1 NOT NULL,
  `comentario` varchar(255) CHARACTER SET latin1 NOT NULL,
  `calificacion` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `id_actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `miembros_actividades`
--


-- --------------------------------------------------------

--
-- Table structure for table `need`
--

CREATE TABLE `need` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `need`
--

INSERT INTO `need` VALUES(1, 73, '25.66516545311248', ' -100.25066447045901', 'ReforestaciÃ³n', 'Hace falta oxÃ­geno', 3);

-- --------------------------------------------------------

--
-- Table structure for table `need_comments`
--

CREATE TABLE `need_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `need_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `need_comments`
--

INSERT INTO `need_comments` VALUES(1, 73, 1, 'test', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `need_experiences`
--

CREATE TABLE `need_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `need_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `experience` text NOT NULL,
  `image_before` varchar(40) NOT NULL,
  `image_after` varchar(40) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `need_experiences`
--

INSERT INTO `need_experiences` VALUES(1, 1, 73, 'Plantar arbol.', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `need_people_roles`
--

CREATE TABLE `need_people_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `need_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `role_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `need_id` (`need_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `need_people_roles`
--

INSERT INTO `need_people_roles` VALUES(1, 1, 73, 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(128) DEFAULT '0',
  `user_from` int(10) DEFAULT '0',
  `user_to` int(10) DEFAULT '0',
  `message` varchar(128) DEFAULT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `item_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_to` (`user_to`),
  KEY `user_from` (`user_from`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=788 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` VALUES(635, 'ec_admin', 1, 51, 'Carlos Eduardo made you admin of Nueva Ecoaldea', 'read', '2011-12-19 23:40:48', 91);
INSERT INTO `notifications` VALUES(636, 'ec_admin', 1, 53, 'Carlos Eduardo made you admin of Nueva Ecoaldea', 'read', '2011-12-19 23:40:48', 91);
INSERT INTO `notifications` VALUES(637, 'media_pictag', 1, 53, 'tagged you in a pic', 'read', '2011-12-23 17:06:52', 64);
INSERT INTO `notifications` VALUES(638, 'media_pictag', 1, 51, 'tagged you in a pic', 'read', '2011-12-23 17:06:52', 64);
INSERT INTO `notifications` VALUES(639, 'media_pictag', 1, 56, 'tagged you in a pic', '', '2011-12-23 17:06:52', 64);
INSERT INTO `notifications` VALUES(640, 'media_pictag', 1, 53, 'tagged you in a pic', 'read', '2011-12-23 17:09:09', 64);
INSERT INTO `notifications` VALUES(641, 'media_pictag', 1, 51, 'tagged you in a pic', 'read', '2011-12-23 17:09:09', 64);
INSERT INTO `notifications` VALUES(642, 'media_pictag', 1, 56, 'tagged you in a pic', '', '2011-12-23 17:09:09', 64);
INSERT INTO `notifications` VALUES(643, 'media_pictag', 1, 61, 'tagged you in a pic', '', '2011-12-23 17:09:09', 64);
INSERT INTO `notifications` VALUES(644, 'media_pictag', 1, 2, 'tagged you in a pic', '', '2011-12-23 17:09:09', 64);
INSERT INTO `notifications` VALUES(654, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following CASA SEMILLA', 'read', '2011-12-23 21:41:11', 95);
INSERT INTO `notifications` VALUES(655, 'ec_follow', 51, 1, 'felixcollado  is now following Nueva Ecoaldea', 'read', '2011-12-23 21:41:59', 91);
INSERT INTO `notifications` VALUES(656, 'ec_follow', 51, 51, 'felixcollado  is now following Nueva Ecoaldea', 'read', '2011-12-23 21:41:59', 91);
INSERT INTO `notifications` VALUES(657, 'ec_follow', 51, 53, 'felixcollado  is now following Nueva Ecoaldea', 'read', '2011-12-23 21:41:59', 91);
INSERT INTO `notifications` VALUES(658, 'pictag', 51, 1, 'tagged you in a pic', 'read', '2011-12-23 22:18:03', 111);
INSERT INTO `notifications` VALUES(659, 'pictag', 51, 1, 'tagged you in a pic', 'read', '2011-12-23 22:19:06', 111);
INSERT INTO `notifications` VALUES(660, 'pictag', 51, 53, 'tagged you in a pic', 'read', '2011-12-23 22:19:06', 111);
INSERT INTO `notifications` VALUES(661, 'trip', 51, 53, 'has invited you to Primer Trip in Chiapas, Mexico', '', '2011-12-24 14:02:16', 65);
INSERT INTO `notifications` VALUES(662, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:50:30', 91);
INSERT INTO `notifications` VALUES(663, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:50:30', 91);
INSERT INTO `notifications` VALUES(664, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:50:30', 91);
INSERT INTO `notifications` VALUES(665, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:51:45', 91);
INSERT INTO `notifications` VALUES(666, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:51:45', 91);
INSERT INTO `notifications` VALUES(667, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:51:45', 91);
INSERT INTO `notifications` VALUES(668, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:52:52', 91);
INSERT INTO `notifications` VALUES(669, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:52:52', 91);
INSERT INTO `notifications` VALUES(670, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:52:52', 91);
INSERT INTO `notifications` VALUES(671, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:53:33', 91);
INSERT INTO `notifications` VALUES(672, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:53:33', 91);
INSERT INTO `notifications` VALUES(673, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:53:33', 91);
INSERT INTO `notifications` VALUES(674, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:58:15', 91);
INSERT INTO `notifications` VALUES(675, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:58:15', 91);
INSERT INTO `notifications` VALUES(676, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 17:58:15', 91);
INSERT INTO `notifications` VALUES(677, 'ec_follow', 1, 63, 'Carlos Eduardo PÃ©rez Priego is now following Ecovilla Ananda', '', '2011-12-24 18:03:01', 94);
INSERT INTO `notifications` VALUES(678, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 18:03:16', 91);
INSERT INTO `notifications` VALUES(679, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 18:03:16', 91);
INSERT INTO `notifications` VALUES(680, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-24 18:03:16', 91);
INSERT INTO `notifications` VALUES(681, 'message', 1, 51, 'has sent you a message', 'read', '2011-12-24 18:04:51', 0);
INSERT INTO `notifications` VALUES(682, 'trip_invite', 51, 1, 'has invited you to Primer Trip in Chiapas, Mexico', 'read', '2011-12-24 18:17:11', 65);
INSERT INTO `notifications` VALUES(683, 'media_pictag', 1, 51, 'tagged you in a pic', 'read', '2011-12-25 13:33:58', 139);
INSERT INTO `notifications` VALUES(684, 'media_pictag', 1, 63, 'tagged you in a pic', '', '2011-12-25 13:33:58', 139);
INSERT INTO `notifications` VALUES(685, 'ec_follow', 1, 1, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-26 09:27:11', 91);
INSERT INTO `notifications` VALUES(686, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-26 09:27:11', 91);
INSERT INTO `notifications` VALUES(687, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-26 09:27:11', 91);
INSERT INTO `notifications` VALUES(699, 'friendship', 1, 60, 'wants to add you as a friend', '', '2011-12-26 16:42:01', 0);
INSERT INTO `notifications` VALUES(701, 'friendship_accept', 51, 1, 'felixcollado has accepted you as a friend', 'read', '2011-12-26 18:40:49', 0);
INSERT INTO `notifications` VALUES(702, 'friendship', 51, 2, 'wants to add you as a friend', '', '2011-12-26 18:46:55', 0);
INSERT INTO `notifications` VALUES(703, 'friendship', 51, 1, 'wants to add you as a friend', 'read', '2011-12-26 18:47:48', 0);
INSERT INTO `notifications` VALUES(704, 'friendship', 51, 52, 'wants to add you as a friend', '', '2011-12-26 18:48:28', 0);
INSERT INTO `notifications` VALUES(705, 'friendship', 51, 60, 'wants to add you as a friend', '', '2011-12-26 18:49:42', 0);
INSERT INTO `notifications` VALUES(706, 'friendship', 51, 58, 'wants to add you as a friend', '', '2011-12-26 18:49:57', 0);
INSERT INTO `notifications` VALUES(708, 'friendship_accept', 53, 51, 'firefox has accepted you as a friend', 'read', '2011-12-26 18:54:52', 0);
INSERT INTO `notifications` VALUES(709, 'friendship_accept', 1, 51, 'Carlos Eduardo has accepted you as a friend', 'read', '2011-12-26 18:57:02', 0);
INSERT INTO `notifications` VALUES(710, 'ec_settler', 1, 63, 'Carlos Eduardo made you settler of Nueva Ecoaldea', '', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(711, 'ec_settler', 1, 61, 'Carlos Eduardo made you settler of Nueva Ecoaldea', '', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(712, 'ec_settler', 1, 58, 'Carlos Eduardo made you settler of Nueva Ecoaldea', '', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(713, 'ec_settler', 1, 55, 'Carlos Eduardo made you settler of Nueva Ecoaldea', '', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(714, 'ec_settler', 1, 51, 'Carlos Eduardo made you settler of Nueva Ecoaldea', 'read', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(715, 'ec_settler', 1, 53, 'Carlos Eduardo made you settler of Nueva Ecoaldea', 'read', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(716, 'ec_settler', 1, 50, 'Carlos Eduardo made you settler of Nueva Ecoaldea', '', '2011-12-27 14:16:43', 91);
INSERT INTO `notifications` VALUES(717, 'ec_admin', 1, 56, 'Carlos Eduardo made you admin of Nueva Ecoaldea', '', '2011-12-27 14:17:16', 91);
INSERT INTO `notifications` VALUES(718, 'message', 1, 51, 'has sent you a message', 'read', '2011-12-27 19:17:48', 0);
INSERT INTO `notifications` VALUES(719, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-29 18:39:24', 91);
INSERT INTO `notifications` VALUES(720, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2011-12-29 18:39:24', 91);
INSERT INTO `notifications` VALUES(721, 'ec_follow', 1, 56, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', NULL, '2011-12-29 18:39:24', 91);
INSERT INTO `notifications` VALUES(722, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2012-01-01 22:19:47', 91);
INSERT INTO `notifications` VALUES(723, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2012-01-01 22:19:47', 91);
INSERT INTO `notifications` VALUES(724, 'ec_follow', 1, 56, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', NULL, '2012-01-01 22:19:47', 91);
INSERT INTO `notifications` VALUES(725, 'trip_invite', 1, 53, 'has invited you to Viaje del Sol in Tlacotalpan, VER, MÃ©xico', 'read', '2012-01-02 12:47:07', 66);
INSERT INTO `notifications` VALUES(726, 'ec_follow', 1, 63, 'Carlos Eduardo PÃ©rez Priego is now following Ecovilla Ananda', NULL, '2012-01-04 00:19:06', 94);
INSERT INTO `notifications` VALUES(727, 'ec_follow', 1, 63, 'Carlos Eduardo PÃ©rez Priego is now following Ecovilla Ananda', NULL, '2012-01-04 00:19:12', 94);
INSERT INTO `notifications` VALUES(728, 'ec_follow', 1, 63, 'Carlos Eduardo PÃ©rez Priego is now following Ecovilla Ananda', NULL, '2012-01-04 00:19:15', 94);
INSERT INTO `notifications` VALUES(729, 'ec_follow', 1, 51, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2012-01-04 00:31:21', 91);
INSERT INTO `notifications` VALUES(730, 'ec_follow', 1, 53, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', 'read', '2012-01-04 00:31:21', 91);
INSERT INTO `notifications` VALUES(731, 'ec_follow', 1, 56, 'Carlos Eduardo PÃ©rez Priego is now following Nueva Ecoaldea', NULL, '2012-01-04 00:31:21', 91);
INSERT INTO `notifications` VALUES(732, 'friendship', 69, 1, 'wants to add you as a friend', 'read', '2012-01-04 17:11:34', 0);
INSERT INTO `notifications` VALUES(733, 'ec_follow', 70, 1, 'ecologikal  is now following Nueva Ecoaldea', 'read', '2012-01-04 17:35:53', 91);
INSERT INTO `notifications` VALUES(734, 'ec_follow', 70, 51, 'ecologikal  is now following Nueva Ecoaldea', 'read', '2012-01-04 17:35:53', 91);
INSERT INTO `notifications` VALUES(735, 'ec_follow', 70, 53, 'ecologikal  is now following Nueva Ecoaldea', 'read', '2012-01-04 17:35:53', 91);
INSERT INTO `notifications` VALUES(736, 'ec_follow', 70, 56, 'ecologikal  is now following Nueva Ecoaldea', NULL, '2012-01-04 17:35:53', 91);
INSERT INTO `notifications` VALUES(737, 'friendship_accept', 1, 69, 'Carlos Eduardo has accepted you as a friend', NULL, '2012-01-04 17:41:13', 0);
INSERT INTO `notifications` VALUES(738, 'media_pictag', 1, 51, 'tagged you in a pic', 'read', '2012-01-05 01:08:46', 131);
INSERT INTO `notifications` VALUES(739, 'trip_invite', 1, 51, 'has invited you to Viaje del Sol in Tlacotalpan, VER, MÃ©xico', 'read', '2012-01-05 13:13:27', 66);
INSERT INTO `notifications` VALUES(740, 'trip_invite', 1, 56, 'has invited you to Viaje del Sol in Tlacotalpan, VER, MÃ©xico', NULL, '2012-01-05 15:36:33', 66);
INSERT INTO `notifications` VALUES(741, 'trip_invite', 1, 2, 'has invited you to Viaje del Sol in Tlacotalpan, VER, MÃ©xico', NULL, '2012-01-05 15:36:33', 66);
INSERT INTO `notifications` VALUES(742, 'message', 51, 1, 'has sent you a message', 'read', '2012-01-05 16:19:13', 0);
INSERT INTO `notifications` VALUES(743, 'trip_invite', 51, 56, 'has invited you to Primer Trip in Chiapas, Mexico', NULL, '2012-01-06 01:46:12', 65);
INSERT INTO `notifications` VALUES(744, 'trip_invite', 51, 55, 'has invited you to Primer Trip in Chiapas, Mexico', NULL, '2012-01-06 01:46:12', 65);
INSERT INTO `notifications` VALUES(745, 'trip_invite', 51, 59, 'has invited you to Primer Trip in Chiapas, Mexico', NULL, '2012-01-06 01:46:12', 65);
INSERT INTO `notifications` VALUES(746, 'trip_invite', 1, 63, 'has invited you to Viaje a Africa in Uganda', NULL, '2012-01-08 14:38:11', 68);
INSERT INTO `notifications` VALUES(747, 'trip_invite', 1, 58, 'has invited you to Viaje a Africa in Uganda', NULL, '2012-01-08 14:38:11', 68);
INSERT INTO `notifications` VALUES(748, 'trip_invite', 1, 53, 'has invited you to Viaje a Africa in Uganda', NULL, '2012-01-08 14:38:11', 68);
INSERT INTO `notifications` VALUES(749, 'trip_invite', 1, 51, 'has invited you to Viaje a Africa in Uganda', NULL, '2012-01-08 14:38:11', 68);
INSERT INTO `notifications` VALUES(750, 'trip_invite', 1, 63, 'has invited you to European Tour in Estonia', NULL, '2012-01-08 17:12:16', 69);
INSERT INTO `notifications` VALUES(751, 'message', 1, 51, 'has sent you a message', 'read', '2012-01-16 21:41:51', 0);
INSERT INTO `notifications` VALUES(752, 'message', 51, 1, 'has sent you a message', 'read', '2012-01-16 23:14:32', 0);
INSERT INTO `notifications` VALUES(753, 'message', 1, 51, 'has sent you a message', 'read', '2012-01-16 23:44:34', 0);
INSERT INTO `notifications` VALUES(754, 'message', 1, 63, 'has sent you a message', NULL, '2012-01-16 23:44:59', 0);
INSERT INTO `notifications` VALUES(755, 'message', 50, 58, 'has sent you a message', 'read', '2012-01-17 01:00:01', 0);
INSERT INTO `notifications` VALUES(756, 'message', 58, 50, 'has sent you a message', 'read', '2012-01-17 01:00:52', 0);
INSERT INTO `notifications` VALUES(757, 'message', 58, 56, 'has sent you a message', 'read', '2012-01-17 01:09:47', 0);
INSERT INTO `notifications` VALUES(758, 'message', 56, 58, 'has sent you a message', 'read', '2012-01-17 01:15:04', 0);
INSERT INTO `notifications` VALUES(759, 'message', 58, 56, 'has sent you a message', NULL, '2012-01-17 01:21:02', 0);
INSERT INTO `notifications` VALUES(760, 'message', 58, 55, 'has sent you a message', 'read', '2012-01-17 01:26:15', 0);
INSERT INTO `notifications` VALUES(761, 'message', 55, 58, 'has sent you a message', NULL, '2012-01-17 01:28:12', 0);
INSERT INTO `notifications` VALUES(762, 'message', 1, 50, 'has sent you a message', 'read', '2012-01-17 13:18:53', 0);
INSERT INTO `notifications` VALUES(763, 'message', 50, 1, 'has sent you a message', 'read', '2012-01-17 13:20:08', 0);
INSERT INTO `notifications` VALUES(764, 'message', 50, 58, 'has sent you a message', NULL, '2012-01-17 13:20:48', 0);
INSERT INTO `notifications` VALUES(765, 'message', 1, 50, 'has sent you a message', 'read', '2012-01-17 13:24:22', 0);
INSERT INTO `notifications` VALUES(766, 'message', 1, 52, 'has sent you a message', 'read', '2012-01-17 13:46:00', 0);
INSERT INTO `notifications` VALUES(767, 'message', 1, 58, 'has sent you a message', NULL, '2012-01-17 13:53:18', 0);
INSERT INTO `notifications` VALUES(768, 'message', 1, 51, 'has sent you a message', 'read', '2012-01-17 15:48:17', 0);
INSERT INTO `notifications` VALUES(769, 'message', 51, 1, 'has sent you a message', 'read', '2012-01-17 16:00:18', 0);
INSERT INTO `notifications` VALUES(770, 'message', 51, 55, 'has sent you a message', 'read', '2012-01-17 17:19:35', 0);
INSERT INTO `notifications` VALUES(771, 'message', 55, 51, 'has sent you a message', 'read', '2012-01-17 17:20:19', 0);
INSERT INTO `notifications` VALUES(772, 'message', 1, 51, 'has sent you a message', NULL, '2012-01-19 12:34:26', 0);
INSERT INTO `notifications` VALUES(773, 'message', 50, 1, 'has sent you a message', 'read', '2012-01-19 13:13:52', 0);
INSERT INTO `notifications` VALUES(774, 'message', 50, 52, 'has sent you a message', 'read', '2012-01-19 13:14:05', 0);
INSERT INTO `notifications` VALUES(775, 'message', 52, 50, 'has sent you a message', NULL, '2012-01-19 13:15:44', 0);
INSERT INTO `notifications` VALUES(776, 'ec_follow', 72, 51, 'nohemi  is now following CASA SEMILLA', NULL, '2012-02-28 17:11:06', 95);
INSERT INTO `notifications` VALUES(777, 'ec_settler', 51, 55, 'felixcollado made you settler of CASA SEMILLA', NULL, '2012-02-28 18:18:39', 95);
INSERT INTO `notifications` VALUES(778, 'trip_invite', 51, 55, 'has invited you to Asian Tour in Thailand', NULL, '2012-02-28 18:23:37', 71);
INSERT INTO `notifications` VALUES(779, 'trip_invite', 51, 59, 'has invited you to Asian Tour in Thailand', NULL, '2012-02-28 18:23:37', 71);
INSERT INTO `notifications` VALUES(780, 'trip_invite', 51, 1, 'has invited you to Asian Tour in Thailand', NULL, '2012-02-28 18:23:37', 71);
INSERT INTO `notifications` VALUES(781, 'media_pictag', 1, 53, 'tagged you in a pic', NULL, '2012-03-03 18:16:13', 169);
INSERT INTO `notifications` VALUES(782, 'media_pictag', 1, 51, 'tagged you in a pic', NULL, '2012-03-03 18:16:13', 169);
INSERT INTO `notifications` VALUES(783, 'media_pictag', 1, 53, 'tagged you in a pic', NULL, '2012-03-03 18:16:20', 169);
INSERT INTO `notifications` VALUES(784, 'media_pictag', 1, 51, 'tagged you in a pic', NULL, '2012-03-03 18:16:20', 169);
INSERT INTO `notifications` VALUES(785, 'media_pictag', 1, 63, 'tagged you in a pic', NULL, '2012-03-03 18:16:20', 169);
INSERT INTO `notifications` VALUES(786, 'friendship', 73, 1, 'wants to add you as a friend', NULL, '2012-06-20 19:30:15', 0);
INSERT INTO `notifications` VALUES(787, 'friendship', 73, 2, 'wants to add you as a friend', NULL, '2012-06-20 19:30:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perfiles`
--


-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` VALUES(2, 73, '45.2387554', ' -89.11324479999996', 'asdas', 'dasdasd', 1);
INSERT INTO `place` VALUES(3, 72, '36.6002378', ' -121.89467609999997', 'Monterey', 'Prueba', 2);
INSERT INTO `place` VALUES(4, 73, '55.286715', ' 86.01501499999995', 'Tom River', 'Test', 1);
INSERT INTO `place` VALUES(5, 73, '48.10807699999999', ' 15.804955800000016', 'Sonnleiten', 'Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `place_comments`
--

CREATE TABLE `place_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `place_comments`
--

INSERT INTO `place_comments` VALUES(3, 73, 3, 'Â¿CÃ³mo llego?', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `place_experiences`
--

CREATE TABLE `place_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `experience` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `place_experiences`
--

INSERT INTO `place_experiences` VALUES(3, 3, 73, 'It was delightful!', 0, 0);
INSERT INTO `place_experiences` VALUES(4, 3, 73, 'asdad', 0, 0);
INSERT INTO `place_experiences` VALUES(5, 3, 73, 'asdd', 0, 0);
INSERT INTO `place_experiences` VALUES(6, 3, 73, 'Great!', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `place_people_roles`
--

CREATE TABLE `place_people_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `role_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `place_id` (`place_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `place_people_roles`
--

INSERT INTO `place_people_roles` VALUES(3, 5, 73, 2);
INSERT INTO `place_people_roles` VALUES(22, 3, 73, 3);
INSERT INTO `place_people_roles` VALUES(23, 3, 73, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_amplifications`
--

CREATE TABLE `post_amplifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `post_amplifications`
--

INSERT INTO `post_amplifications` VALUES(31, 73, 2, 'article', 5);
INSERT INTO `post_amplifications` VALUES(33, 73, 22, 'video', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_broadcast`
--

CREATE TABLE `post_broadcast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `post_broadcast`
--

INSERT INTO `post_broadcast` VALUES(1, 73, 2, 'image', 5);
INSERT INTO `post_broadcast` VALUES(2, 73, 2, 'article', 5);
INSERT INTO `post_broadcast` VALUES(3, 73, 5, 'idea', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` VALUES(1, 2, 'image', 73, 'Wow!', 25.6513138, -100.38015089999999);
INSERT INTO `post_comments` VALUES(2, 2, 'image', 73, 'Great one', 25.6602806, -100.28104730000001);
INSERT INTO `post_comments` VALUES(3, 2, 'article', 73, 'jajajajajjaja', 25.6602806, -100.28104730000001);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_category_id` int(11) NOT NULL,
  `skill_area_id` int(11) NOT NULL,
  `skill` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  KEY `skill_category_id` (`skill_category_id`),
  KEY `skill_area_id` (`skill_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` VALUES(1, 1, 0, 'Biotechture');
INSERT INTO `skills` VALUES(2, 1, 0, 'Earth sheltered construction');
INSERT INTO `skills` VALUES(3, 1, 20, 'House Painter');
INSERT INTO `skills` VALUES(4, 1, 20, 'Locksmitsh');
INSERT INTO `skills` VALUES(5, 1, 0, 'Natural construction materials');
INSERT INTO `skills` VALUES(6, 1, 0, 'Natural disaster resistant construction');
INSERT INTO `skills` VALUES(7, 1, 0, 'Owner building');
INSERT INTO `skills` VALUES(8, 1, 0, 'Passive solar design');
INSERT INTO `skills` VALUES(9, 1, 0, 'Pattern Language');
INSERT INTO `skills` VALUES(10, 1, 0, 'Water harvesting & Waste reuse');
INSERT INTO `skills` VALUES(11, 2, 18, 'Creating Partnerships');
INSERT INTO `skills` VALUES(12, 2, 18, 'Easy Word');
INSERT INTO `skills` VALUES(13, 2, 14, 'Event Organizer');
INSERT INTO `skills` VALUES(14, 2, 18, 'Fundraising');
INSERT INTO `skills` VALUES(15, 2, 18, 'Government Relations');
INSERT INTO `skills` VALUES(16, 2, 14, 'Hotel Manager');
INSERT INTO `skills` VALUES(17, 2, 14, 'Human Resources');
INSERT INTO `skills` VALUES(18, 2, 13, 'Lobbying');
INSERT INTO `skills` VALUES(19, 2, 14, 'Logistics');
INSERT INTO `skills` VALUES(20, 2, 8, 'Manage');
INSERT INTO `skills` VALUES(21, 2, 18, 'Master of Ceremonies');
INSERT INTO `skills` VALUES(22, 2, 8, 'Motivate');
INSERT INTO `skills` VALUES(23, 2, 14, 'Planning');
INSERT INTO `skills` VALUES(24, 2, 14, 'Project Manager');
INSERT INTO `skills` VALUES(25, 2, 18, 'Public Speaking');
INSERT INTO `skills` VALUES(26, 2, 10, 'Recruiting');
INSERT INTO `skills` VALUES(27, 2, 14, 'Scheduling events');
INSERT INTO `skills` VALUES(28, 3, 7, 'Economist');
INSERT INTO `skills` VALUES(29, 3, 15, 'Market Research');
INSERT INTO `skills` VALUES(30, 3, 15, 'Market Strategy');
INSERT INTO `skills` VALUES(31, 3, 18, 'Sell');
INSERT INTO `skills` VALUES(32, 3, 7, 'Stockbroker');
INSERT INTO `skills` VALUES(33, 4, 0, 'Agroforestry');
INSERT INTO `skills` VALUES(34, 4, 0, 'Biodynamics');
INSERT INTO `skills` VALUES(35, 4, 0, 'Bio-intensive gardening');
INSERT INTO `skills` VALUES(36, 4, 6, 'Environment Protection');
INSERT INTO `skills` VALUES(37, 4, 0, 'Forest gardening');
INSERT INTO `skills` VALUES(38, 4, 1, 'Gardening');
INSERT INTO `skills` VALUES(39, 4, 5, 'Geophysicist');
INSERT INTO `skills` VALUES(40, 4, 0, 'Gleaning');
INSERT INTO `skills` VALUES(41, 4, 1, 'Greenkeeper');
INSERT INTO `skills` VALUES(42, 4, 0, 'Holistic rangeland management');
INSERT INTO `skills` VALUES(43, 4, 0, 'Integrated aquaculture');
INSERT INTO `skills` VALUES(44, 4, 0, 'Keyline water harvesting');
INSERT INTO `skills` VALUES(45, 4, 0, 'Natural farming');
INSERT INTO `skills` VALUES(46, 4, 0, 'Natural sequence farming');
INSERT INTO `skills` VALUES(47, 4, 0, 'Nature-based forestry');
INSERT INTO `skills` VALUES(48, 4, 0, 'Organic agriculture');
INSERT INTO `skills` VALUES(49, 4, 1, 'Permaculture');
INSERT INTO `skills` VALUES(50, 4, 0, 'Seed saving');
INSERT INTO `skills` VALUES(51, 4, 1, 'Sowing and Growing');
INSERT INTO `skills` VALUES(52, 4, 0, 'Wild harvesting & hunting');
INSERT INTO `skills` VALUES(53, 5, 0, 'Action learning');
INSERT INTO `skills` VALUES(54, 5, 2, 'Dance');
INSERT INTO `skills` VALUES(55, 5, 8, 'Dealing with Pets');
INSERT INTO `skills` VALUES(56, 5, 4, 'Design Flyers');
INSERT INTO `skills` VALUES(57, 5, 8, 'Documentary research');
INSERT INTO `skills` VALUES(58, 5, 8, 'Drafting');
INSERT INTO `skills` VALUES(59, 5, 4, 'Fashion Design');
INSERT INTO `skills` VALUES(60, 5, 2, 'Filmmaker');
INSERT INTO `skills` VALUES(61, 5, 4, 'Graphic Design');
INSERT INTO `skills` VALUES(62, 5, 2, 'Guitarrist');
INSERT INTO `skills` VALUES(63, 5, 8, 'Humor');
INSERT INTO `skills` VALUES(64, 5, 4, 'Illustration');
INSERT INTO `skills` VALUES(65, 5, 0, 'Independent Teacher');
INSERT INTO `skills` VALUES(66, 5, 12, 'Journalist');
INSERT INTO `skills` VALUES(67, 5, 18, 'Languages');
INSERT INTO `skills` VALUES(68, 5, 17, 'Mentor');
INSERT INTO `skills` VALUES(69, 5, 2, 'Music DJ');
INSERT INTO `skills` VALUES(70, 5, 2, 'Music Producer');
INSERT INTO `skills` VALUES(71, 5, 2, 'Musician');
INSERT INTO `skills` VALUES(72, 5, 12, 'News Writer');
INSERT INTO `skills` VALUES(73, 5, 2, 'Painter');
INSERT INTO `skills` VALUES(74, 5, 0, 'Participatory arts & music');
INSERT INTO `skills` VALUES(75, 5, 2, 'Photography');
INSERT INTO `skills` VALUES(76, 5, 2, 'Plastic Artist');
INSERT INTO `skills` VALUES(77, 5, 12, 'Radio');
INSERT INTO `skills` VALUES(78, 5, 2, 'Sing');
INSERT INTO `skills` VALUES(79, 5, 0, 'Social ecology');
INSERT INTO `skills` VALUES(80, 5, 8, 'Taking Notes');
INSERT INTO `skills` VALUES(81, 5, 17, 'Teach');
INSERT INTO `skills` VALUES(82, 5, 12, 'Television');
INSERT INTO `skills` VALUES(83, 5, 0, 'Transition culture');
INSERT INTO `skills` VALUES(84, 5, 20, 'Translator');
INSERT INTO `skills` VALUES(85, 5, 17, 'Tutors');
INSERT INTO `skills` VALUES(86, 5, 4, 'Video Editing');
INSERT INTO `skills` VALUES(87, 5, 2, 'Video Production');
INSERT INTO `skills` VALUES(88, 5, 0, 'Waldorf education teacher');
INSERT INTO `skills` VALUES(89, 5, 2, 'Writer');
INSERT INTO `skills` VALUES(90, 5, 8, 'Writing Letters');
INSERT INTO `skills` VALUES(91, 5, 18, 'Writing Speeches');
INSERT INTO `skills` VALUES(92, 6, 0, 'Bicycles & Electric bikes');
INSERT INTO `skills` VALUES(93, 6, 0, 'Bio-char from forest wastes');
INSERT INTO `skills` VALUES(94, 6, 0, 'Co-generation');
INSERT INTO `skills` VALUES(95, 6, 11, 'Databases');
INSERT INTO `skills` VALUES(96, 6, 0, 'Efficient & low pollution wood stoves');
INSERT INTO `skills` VALUES(97, 6, 5, 'Electric Engineer');
INSERT INTO `skills` VALUES(98, 6, 20, 'Electrical Installations');
INSERT INTO `skills` VALUES(99, 6, 5, 'Electronics');
INSERT INTO `skills` VALUES(100, 6, 5, 'Electronics Engineer');
INSERT INTO `skills` VALUES(101, 6, 0, 'Energy Storage');
INSERT INTO `skills` VALUES(102, 6, 11, 'Evaluate Software');
INSERT INTO `skills` VALUES(103, 6, 20, 'Fix things');
INSERT INTO `skills` VALUES(104, 6, 0, 'Fuels from organic wastes');
INSERT INTO `skills` VALUES(105, 6, 20, 'Furniture Restoration');
INSERT INTO `skills` VALUES(106, 6, 0, 'Grid-tied renewable power generation');
INSERT INTO `skills` VALUES(107, 6, 0, 'Hand tools');
INSERT INTO `skills` VALUES(108, 6, 4, 'Industrial Design');
INSERT INTO `skills` VALUES(109, 6, 5, 'Industrial Engineer');
INSERT INTO `skills` VALUES(110, 6, 8, 'Information sharing');
INSERT INTO `skills` VALUES(111, 6, 11, 'Interface Design');
INSERT INTO `skills` VALUES(112, 6, 4, 'Interior Design');
INSERT INTO `skills` VALUES(113, 6, 8, 'Internet research');
INSERT INTO `skills` VALUES(114, 6, 11, 'IT Project Manager');
INSERT INTO `skills` VALUES(115, 6, 19, 'Marine Biologist');
INSERT INTO `skills` VALUES(116, 6, 5, 'Mechanical Engineer');
INSERT INTO `skills` VALUES(117, 6, 20, 'Mechanics');
INSERT INTO `skills` VALUES(118, 6, 0, 'Micro-hydro & small scale wind');
INSERT INTO `skills` VALUES(119, 6, 5, 'Nanotech');
INSERT INTO `skills` VALUES(120, 6, 5, 'Physics Engineer');
INSERT INTO `skills` VALUES(121, 6, 20, 'Plumbery');
INSERT INTO `skills` VALUES(122, 6, 11, 'Programming');
INSERT INTO `skills` VALUES(123, 6, 0, 'Reuse & creative recycling');
INSERT INTO `skills` VALUES(124, 6, 1, 'Scientist');
INSERT INTO `skills` VALUES(125, 6, 15, 'SEO');
INSERT INTO `skills` VALUES(126, 6, 8, 'Sew');
INSERT INTO `skills` VALUES(127, 6, 11, 'Software Engineering');
INSERT INTO `skills` VALUES(128, 6, 11, 'Software Testing');
INSERT INTO `skills` VALUES(129, 6, 8, 'Surfing the Internet');
INSERT INTO `skills` VALUES(130, 6, 11, 'Technical Support');
INSERT INTO `skills` VALUES(131, 6, 11, 'Telecommunications');
INSERT INTO `skills` VALUES(132, 6, 0, 'Transition engineering');
INSERT INTO `skills` VALUES(133, 6, 20, 'Vehicle Painter');
INSERT INTO `skills` VALUES(134, 6, 4, 'Web Design');
INSERT INTO `skills` VALUES(135, 6, 11, 'Web development');
INSERT INTO `skills` VALUES(136, 6, 0, 'Wood gasification');
INSERT INTO `skills` VALUES(137, 7, 9, 'Dentist');
INSERT INTO `skills` VALUES(138, 7, 16, 'Dermatologist');
INSERT INTO `skills` VALUES(139, 7, 16, 'Emergency Medicine');
INSERT INTO `skills` VALUES(140, 7, 16, 'Gynaecologist');
INSERT INTO `skills` VALUES(141, 7, 3, 'Martial Arts');
INSERT INTO `skills` VALUES(142, 7, 3, 'Meditation');
INSERT INTO `skills` VALUES(143, 7, 9, 'Nursery');
INSERT INTO `skills` VALUES(144, 7, 9, 'Nutriology');
INSERT INTO `skills` VALUES(145, 7, 16, 'Ophtalmologist');
INSERT INTO `skills` VALUES(146, 7, 16, 'Pathologist');
INSERT INTO `skills` VALUES(147, 7, 16, 'Pediatritian');
INSERT INTO `skills` VALUES(148, 7, 9, 'Physical Rehabilitation');
INSERT INTO `skills` VALUES(149, 7, 16, 'Psychiatrist');
INSERT INTO `skills` VALUES(150, 7, 9, 'Psychology');
INSERT INTO `skills` VALUES(151, 7, 9, 'Special Care');
INSERT INTO `skills` VALUES(152, 7, 16, 'Surgeon');
INSERT INTO `skills` VALUES(153, 7, 16, 'Urologist');
INSERT INTO `skills` VALUES(154, 7, 16, 'Veterinarian');
INSERT INTO `skills` VALUES(155, 7, 3, 'Yoga');
INSERT INTO `skills` VALUES(156, 7, 3, 'Yoga Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `skill_areas`
--

CREATE TABLE `skill_areas` (
  `skill_area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`skill_area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `skill_areas`
--

INSERT INTO `skill_areas` VALUES(1, 'Agriculture');
INSERT INTO `skill_areas` VALUES(2, 'Arts');
INSERT INTO `skill_areas` VALUES(3, 'Body & Mind');
INSERT INTO `skill_areas` VALUES(4, 'Design');
INSERT INTO `skill_areas` VALUES(5, 'Engineering');
INSERT INTO `skill_areas` VALUES(6, 'Environment');
INSERT INTO `skill_areas` VALUES(7, 'Finance');
INSERT INTO `skill_areas` VALUES(8, 'General');
INSERT INTO `skill_areas` VALUES(9, 'Health Care');
INSERT INTO `skill_areas` VALUES(10, 'Human Resources');
INSERT INTO `skill_areas` VALUES(11, 'IT');
INSERT INTO `skill_areas` VALUES(12, 'Journalism');
INSERT INTO `skill_areas` VALUES(13, 'Law');
INSERT INTO `skill_areas` VALUES(14, 'Management');
INSERT INTO `skill_areas` VALUES(15, 'Marketing');
INSERT INTO `skill_areas` VALUES(16, 'Medical Practitioner');
INSERT INTO `skill_areas` VALUES(17, 'Pedagogy');
INSERT INTO `skill_areas` VALUES(18, 'Public Relations');
INSERT INTO `skill_areas` VALUES(19, 'Science');
INSERT INTO `skill_areas` VALUES(20, 'Technical Skills');
INSERT INTO `skill_areas` VALUES(21, 'Not Defined');
INSERT INTO `skill_areas` VALUES(22, 'Not Defined');

-- --------------------------------------------------------

--
-- Table structure for table `skill_categories`
--

CREATE TABLE `skill_categories` (
  `skill_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `class` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `hexcolor` varchar(7) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`skill_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `skill_categories`
--

INSERT INTO `skill_categories` VALUES(1, 'Building & Construction', 'building', '#ff3333');
INSERT INTO `skill_categories` VALUES(2, 'Community Governance', 'communitygov', '#ff9933');
INSERT INTO `skill_categories` VALUES(3, 'Finance & Economics', 'finance', '#FFE91D');
INSERT INTO `skill_categories` VALUES(4, 'Land & Nature Stewardship', 'land', '#A4DE00');
INSERT INTO `skill_categories` VALUES(5, 'Culture & Education', 'culture', '#33cccc');
INSERT INTO `skill_categories` VALUES(6, 'Tools & Technology', 'tools', '#403BDC');
INSERT INTO `skill_categories` VALUES(7, 'Health & Spirituality', 'health', '#cc3399');

-- --------------------------------------------------------

--
-- Table structure for table `stream_rate`
--

CREATE TABLE `stream_rate` (
  `stream_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `members_stream_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL,
  PRIMARY KEY (`stream_rate_id`),
  UNIQUE KEY `user_id_2` (`user_id`,`members_stream_id`),
  KEY `user_id` (`user_id`),
  KEY `stream_rate_ibfk_1` (`members_stream_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stream_rate`
--


-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

CREATE TABLE `translation` (
  `field` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `value` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lang` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `translation` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `translation`
--

INSERT INTO `translation` VALUES('MEMBER_GENDER', 'f', 'es', 'Femenino');
INSERT INTO `translation` VALUES('MEMBER_GENDER', 'm', 'es', 'Masculino');
INSERT INTO `translation` VALUES('MEMBER_GENDER', 'n', 'es', 'No Definido');
INSERT INTO `translation` VALUES('GEN_LANG', 'es', 'es', 'Espanol');
INSERT INTO `translation` VALUES('GEN_LANG', 'en', 'es', 'Ingles');
INSERT INTO `translation` VALUES('SC_STATUS', 'planning', 'es', 'Planeacion');
INSERT INTO `translation` VALUES('SC_STATUS', 'forming', 'es', 'Formacion');
INSERT INTO `translation` VALUES('SC_STATUS', 'established', 'es', 'Establecido');
INSERT INTO `translation` VALUES('SC_STATUS', 'not_available', 'es', 'No Disponible');
INSERT INTO `translation` VALUES('SC_TYPE', 'rural', 'es', 'Rural');
INSERT INTO `translation` VALUES('SC_TYPE', 'urban', 'es', 'Urbano');
INSERT INTO `translation` VALUES('SC_TYPE', 'sub_urban', 'es', 'Sub Urbano');
INSERT INTO `translation` VALUES('SC_SELECT', 'yes', 'es', 'Si');
INSERT INTO `translation` VALUES('SC_SELECT', 'no', 'es', 'No');
INSERT INTO `translation` VALUES('SC_OPTIONS', 'allowed', 'es', 'Permitido');
INSERT INTO `translation` VALUES('SC_OPTIONS', 'ocasionally', 'es', 'Algunas veces');
INSERT INTO `translation` VALUES('SC_OPTIONS', 'forbidden', 'es', 'Prohibido');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '1', 'es', 'Internet');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '1', 'es', 'Construcción');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '2', 'es', 'Gobierno Comunitario');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '3', 'es', 'Finanzas & Economía');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '4', 'es', 'Naturaleza & Cuidado de la Tierra');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '5', 'es', 'Cultura & Educación');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '6', 'es', 'Herramientas & Tecnología');
INSERT INTO `translation` VALUES('SKILL_CATEGORY', '7', 'es', 'Salud & Espiritualidad');
INSERT INTO `translation` VALUES('SKILL_AREA', '1', 'es', 'Agriculture');
INSERT INTO `translation` VALUES('SKILL_AREA', '2', 'es', 'Arts');
INSERT INTO `translation` VALUES('SKILL_AREA', '3', 'es', 'Body & Mind');
INSERT INTO `translation` VALUES('SKILL_AREA', '4', 'es', 'Design');
INSERT INTO `translation` VALUES('SKILL_AREA', '5', 'es', 'Engineering');
INSERT INTO `translation` VALUES('SKILL_AREA', '6', 'es', 'Environment');
INSERT INTO `translation` VALUES('SKILL_AREA', '7', 'es', 'Finance');
INSERT INTO `translation` VALUES('SKILL_AREA', '8', 'es', 'General');
INSERT INTO `translation` VALUES('SKILL_AREA', '9', 'es', 'Health Care');
INSERT INTO `translation` VALUES('SKILL_AREA', '10', 'es', 'Human Resources');
INSERT INTO `translation` VALUES('SKILL_AREA', '11', 'es', 'IT');
INSERT INTO `translation` VALUES('SKILL_AREA', '12', 'es', 'Journalism');
INSERT INTO `translation` VALUES('SKILL_AREA', '13', 'es', 'Law');
INSERT INTO `translation` VALUES('SKILL_AREA', '14', 'es', 'Management');
INSERT INTO `translation` VALUES('SKILL_AREA', '15', 'es', 'Marketing');
INSERT INTO `translation` VALUES('SKILL_AREA', '16', 'es', 'Medical Practitioner');
INSERT INTO `translation` VALUES('SKILL_AREA', '17', 'es', 'Pedagogy');
INSERT INTO `translation` VALUES('SKILL_AREA', '18', 'es', 'Public Relations');
INSERT INTO `translation` VALUES('SKILL_AREA', '19', 'es', 'Science');
INSERT INTO `translation` VALUES('SKILL_AREA', '20', 'es', 'Technical Skills');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '1', 'es', 'Internet');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '2', 'es', 'Recepcion 24 horas');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '3', 'es', 'Television por cable');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '4', 'es', 'Sala de espera');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '5', 'es', 'Cocina para huespedes');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '6', 'es', 'Libreria');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '7', 'es', 'Toallas');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '8', 'es', 'Bar');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '9', 'es', 'Cafe');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '10', 'es', 'DVDs');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '11', 'es', 'Linen Included');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '12', 'es', 'Seguridad');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '13', 'es', 'Lavadora/Secadora');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '14', 'es', 'Desayuno');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '15', 'es', 'Aire Acondicionado');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '16', 'es', 'Agua Caliente');
INSERT INTO `translation` VALUES('SC_SERVICES_AVAILABLE', '17', 'es', 'Incluye 3 Comidas');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '1', 'es', 'Judaismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '2', 'es', 'Cristianismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '3', 'es', 'Islamismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '4', 'es', 'Hinduismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '5', 'es', 'Budismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '6', 'es', 'Sikhism');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '7', 'es', 'Kurdish');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '8', 'es', 'Adrican');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '9', 'es', 'Azteca');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '10', 'es', 'Inca');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '11', 'es', 'Maya');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '12', 'es', 'Aborigen');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '13', 'es', 'Confucianism');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '14', 'es', 'Taoism');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '15', 'es', 'Shintoism');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '16', 'es', 'Universalismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '17', 'es', 'Espiritismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '18', 'es', 'Ateismo');
INSERT INTO `translation` VALUES('SC_SPIRITUALITY', '19', 'es', 'Paganismo');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '1', 'es', 'Excursionismo');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '2', 'es', 'Pesca');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '3', 'es', 'Surfing');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '4', 'es', 'Kayak');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '5', 'es', 'Buceo');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '6', 'es', 'Aventura');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '7', 'es', 'Horse Riding');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '8', 'es', 'Boat Tour');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '9', 'es', 'Rafting');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '10', 'es', 'Diving');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '11', 'es', 'Arte y Artesania');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '12', 'es', 'Snorkelling');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '13', 'es', 'Yoga');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '14', 'es', 'Artes Culinarias');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '15', 'es', 'Ciclismo de MontaÃ±a');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '16', 'es', 'Danza');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '17', 'es', 'Tai Chi');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '18', 'es', 'Kung Fu');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '19', 'es', 'Qi Gong');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '20', 'es', 'Reiki');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '21', 'es', 'Spa');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '22', 'es', 'Natacion');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '23', 'es', 'Deportes Extremos');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '24', 'es', 'Indigenous');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '25', 'es', 'Meditacion');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '26', 'es', 'Vida Silvestre');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '27', 'es', 'Musica en vivo');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '28', 'es', 'Danza de Fuego');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '29', 'es', 'Escultura');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '30', 'es', 'Fotografia');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '31', 'es', 'Pintura');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '32', 'es', 'Film');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '33', 'es', 'Bateria');
INSERT INTO `translation` VALUES('SC_ACTIVITIES', '34', 'es', 'Circus');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '1', 'es', 'Adolecentes (+16)');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '2', 'es', 'Jovenes (+18)');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '3', 'es', 'Adultos Jovenes (+22)');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '4', 'es', 'Adultos (+26)');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '5', 'es', 'Adultos Mayores (+40)');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '6', 'es', 'Ancianos (+52)');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '7', 'es', 'Parejas');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '8', 'es', 'Familias');
INSERT INTO `translation` VALUES('SC_ORIENTATION', '9', 'es', 'Familias con mascotas');
INSERT INTO `translation` VALUES('SC_DIETARY', '1', 'es', 'Raw Vegan');
INSERT INTO `translation` VALUES('SC_DIETARY', '2', 'es', 'Vegan');
INSERT INTO `translation` VALUES('SC_DIETARY', '3', 'es', 'Vegetariano');
INSERT INTO `translation` VALUES('SC_DIETARY', '4', 'es', 'Lacteos Vegetarianos');
INSERT INTO `translation` VALUES('SC_DIETARY', '5', 'es', 'Pescado Vegetariano');
INSERT INTO `translation` VALUES('SC_DIETARY', '6', 'es', 'Balanced Omnivorous\r\n');
INSERT INTO `translation` VALUES('SC_DIETARY', '7', 'es', 'Omnivorous');
INSERT INTO `translation` VALUES('SC_DIETARY', '8', 'en', 'Meat Eater');
INSERT INTO `translation` VALUES('GEN_SLIDER', '25', 'en', 'Good');
INSERT INTO `translation` VALUES('GEN_SLIDER', '50', 'en', 'Regular');
INSERT INTO `translation` VALUES('GEN_SLIDER', '75', 'en', 'Excellent');
INSERT INTO `translation` VALUES('GEN_SLIDER', '100', 'en', 'Expert');
INSERT INTO `translation` VALUES('CAT_LANGUAGES', '1', 'en', 'Spanish');
INSERT INTO `translation` VALUES('CAT_LANGUAGES', '2', 'en', 'English');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '25', 'en', 'Basic');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '50', 'en', 'Middle');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '75', 'en', 'Experiencia');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '100', 'en', 'Expert');
INSERT INTO `translation` VALUES('GEN_SLIDER', '25', 'es', 'Bueno');
INSERT INTO `translation` VALUES('GEN_SLIDER', '50', 'es', 'Regular');
INSERT INTO `translation` VALUES('GEN_SLIDER', '75', 'es', 'Excelente');
INSERT INTO `translation` VALUES('GEN_SLIDER', '100', 'es', 'Experto');
INSERT INTO `translation` VALUES('CAT_LANGUAGES', '1', 'es', 'Español');
INSERT INTO `translation` VALUES('CAT_LANGUAGES', '2', 'es', 'Ingles');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '25', 'es', 'Conocimientos Basicos');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '50', 'es', 'Conocimiento Medio');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '75', 'es', 'Experiecia');
INSERT INTO `translation` VALUES('SLIDER_SKILLS', '100', 'es', 'Experto');
INSERT INTO `translation` VALUES('SKILL', '1', 'es', 'Biotechture');
INSERT INTO `translation` VALUES('SKILL', '2', 'es', 'Earth sheltered construction');
INSERT INTO `translation` VALUES('SKILL', '3', 'es', 'House Painter');
INSERT INTO `translation` VALUES('SKILL', '4', 'es', 'Locksmitsh');
INSERT INTO `translation` VALUES('SKILL', '5', 'es', 'Natural construction materials');
INSERT INTO `translation` VALUES('SKILL', '6', 'es', 'Natural disaster resistant construction');
INSERT INTO `translation` VALUES('SKILL', '7', 'es', 'Owner building');
INSERT INTO `translation` VALUES('SKILL', '8', 'es', 'Passive solar design');
INSERT INTO `translation` VALUES('SKILL', '9', 'es', 'Pattern Language');
INSERT INTO `translation` VALUES('SKILL', '10', 'es', 'Water harvesting & Waste reuse');
INSERT INTO `translation` VALUES('SKILL', '11', 'es', 'Creating Partnerships');
INSERT INTO `translation` VALUES('SKILL', '12', 'es', 'Easy Word');
INSERT INTO `translation` VALUES('SKILL', '13', 'es', 'Event Organizer');
INSERT INTO `translation` VALUES('SKILL', '14', 'es', 'Fundraising');
INSERT INTO `translation` VALUES('SKILL', '15', 'es', 'Government Relations');
INSERT INTO `translation` VALUES('SKILL', '16', 'es', 'Hotel Manager');
INSERT INTO `translation` VALUES('SKILL', '17', 'es', 'Human Resources');
INSERT INTO `translation` VALUES('SKILL', '18', 'es', 'Lobbying');
INSERT INTO `translation` VALUES('SKILL', '19', 'es', 'Logistics');
INSERT INTO `translation` VALUES('SKILL', '20', 'es', 'Manage');
INSERT INTO `translation` VALUES('SKILL', '21', 'es', 'Master of Ceremonies');
INSERT INTO `translation` VALUES('SKILL', '22', 'es', 'Motivate');
INSERT INTO `translation` VALUES('SKILL', '23', 'es', 'Planning');
INSERT INTO `translation` VALUES('SKILL', '24', 'es', 'Project Manager');
INSERT INTO `translation` VALUES('SKILL', '25', 'es', 'Public Speaking');
INSERT INTO `translation` VALUES('SKILL', '26', 'es', 'Recruiting');
INSERT INTO `translation` VALUES('SKILL', '27', 'es', 'Scheduling events');
INSERT INTO `translation` VALUES('SKILL', '28', 'es', 'Economist');
INSERT INTO `translation` VALUES('SKILL', '29', 'es', 'Market Research');
INSERT INTO `translation` VALUES('SKILL', '30', 'es', 'Market Strategy');
INSERT INTO `translation` VALUES('SKILL', '31', 'es', 'Sell');
INSERT INTO `translation` VALUES('SKILL', '32', 'es', 'Stockbroker');
INSERT INTO `translation` VALUES('SKILL', '33', 'es', 'Agroforestry');
INSERT INTO `translation` VALUES('SKILL', '34', 'es', 'Biodynamics');
INSERT INTO `translation` VALUES('SKILL', '35', 'es', 'Bio-intensive gardening');
INSERT INTO `translation` VALUES('SKILL', '36', 'es', 'Environment Protection');
INSERT INTO `translation` VALUES('SKILL', '37', 'es', 'Forest gardening');
INSERT INTO `translation` VALUES('SKILL', '38', 'es', 'Gardening');
INSERT INTO `translation` VALUES('SKILL', '39', 'es', 'Geophysicist');
INSERT INTO `translation` VALUES('SKILL', '40', 'es', 'Gleaning');
INSERT INTO `translation` VALUES('SKILL', '41', 'es', 'Greenkeeper');
INSERT INTO `translation` VALUES('SKILL', '42', 'es', 'Holistic rangeland management');
INSERT INTO `translation` VALUES('SKILL', '43', 'es', 'Integrated aquaculture');
INSERT INTO `translation` VALUES('SKILL', '44', 'es', 'Keyline water harvesting');
INSERT INTO `translation` VALUES('SKILL', '45', 'es', 'Natural farming');
INSERT INTO `translation` VALUES('SKILL', '46', 'es', 'Natural sequence farming');
INSERT INTO `translation` VALUES('SKILL', '47', 'es', 'Nature-based forestry');
INSERT INTO `translation` VALUES('SKILL', '48', 'es', 'Organic agriculture');
INSERT INTO `translation` VALUES('SKILL', '49', 'es', 'Permaculture');
INSERT INTO `translation` VALUES('SKILL', '50', 'es', 'Seed saving');
INSERT INTO `translation` VALUES('SKILL', '51', 'es', 'Sowing and Growing');
INSERT INTO `translation` VALUES('SKILL', '52', 'es', 'Wild harvesting & hunting');
INSERT INTO `translation` VALUES('SKILL', '53', 'es', 'Action learning');
INSERT INTO `translation` VALUES('SKILL', '54', 'es', 'Dance');
INSERT INTO `translation` VALUES('SKILL', '55', 'es', 'Dealing with Pets');
INSERT INTO `translation` VALUES('SKILL', '56', 'es', 'Design Flyers');
INSERT INTO `translation` VALUES('SKILL', '57', 'es', 'Documentary research');
INSERT INTO `translation` VALUES('SKILL', '58', 'es', 'Drafting');
INSERT INTO `translation` VALUES('SKILL', '59', 'es', 'Fashion Design');
INSERT INTO `translation` VALUES('SKILL', '60', 'es', 'Filmmaker');
INSERT INTO `translation` VALUES('SKILL', '61', 'es', 'Graphic Design');
INSERT INTO `translation` VALUES('SKILL', '62', 'es', 'Guitarrist');
INSERT INTO `translation` VALUES('SKILL', '63', 'es', 'Humor');
INSERT INTO `translation` VALUES('SKILL', '64', 'es', 'Illustration');
INSERT INTO `translation` VALUES('SKILL', '65', 'es', 'Independent Teacher');
INSERT INTO `translation` VALUES('SKILL', '66', 'es', 'Journalist');
INSERT INTO `translation` VALUES('SKILL', '67', 'es', 'Languages');
INSERT INTO `translation` VALUES('SKILL', '68', 'es', 'Mentor');
INSERT INTO `translation` VALUES('SKILL', '69', 'es', 'Music DJ');
INSERT INTO `translation` VALUES('SKILL', '70', 'es', 'Music Producer');
INSERT INTO `translation` VALUES('SKILL', '71', 'es', 'Musician');
INSERT INTO `translation` VALUES('SKILL', '72', 'es', 'News Writer');
INSERT INTO `translation` VALUES('SKILL', '73', 'es', 'Painter');
INSERT INTO `translation` VALUES('SKILL', '74', 'es', 'Participatory arts & music');
INSERT INTO `translation` VALUES('SKILL', '75', 'es', 'Photography');
INSERT INTO `translation` VALUES('SKILL', '76', 'es', 'Plastic Artist');
INSERT INTO `translation` VALUES('SKILL', '77', 'es', 'Radio');
INSERT INTO `translation` VALUES('SKILL', '78', 'es', 'Sing');
INSERT INTO `translation` VALUES('SKILL', '79', 'es', 'Social ecology');
INSERT INTO `translation` VALUES('SKILL', '80', 'es', 'Taking Notes');
INSERT INTO `translation` VALUES('SKILL', '81', 'es', 'Teach');
INSERT INTO `translation` VALUES('SKILL', '82', 'es', 'Television');
INSERT INTO `translation` VALUES('SKILL', '83', 'es', 'Transition culture');
INSERT INTO `translation` VALUES('SKILL', '84', 'es', 'Translator');
INSERT INTO `translation` VALUES('SKILL', '85', 'es', 'Tutors');
INSERT INTO `translation` VALUES('SKILL', '86', 'es', 'Video Editing');
INSERT INTO `translation` VALUES('SKILL', '87', 'es', 'Video Production');
INSERT INTO `translation` VALUES('SKILL', '88', 'es', 'Waldorf education teacher');
INSERT INTO `translation` VALUES('SKILL', '89', 'es', 'Writer');
INSERT INTO `translation` VALUES('SKILL', '90', 'es', 'Writing Letters');
INSERT INTO `translation` VALUES('SKILL', '91', 'es', 'Writing Speeches');
INSERT INTO `translation` VALUES('SKILL', '92', 'es', 'Bicycles & Electric bikes');
INSERT INTO `translation` VALUES('SKILL', '93', 'es', 'Bio-char from forest wastes');
INSERT INTO `translation` VALUES('SKILL', '94', 'es', 'Co-generation');
INSERT INTO `translation` VALUES('SKILL', '95', 'es', 'Databases');
INSERT INTO `translation` VALUES('SKILL', '96', 'es', 'Efficient & low pollution wood stoves');
INSERT INTO `translation` VALUES('SKILL', '97', 'es', 'Electric Engineer');
INSERT INTO `translation` VALUES('SKILL', '98', 'es', 'Electrical Installations');
INSERT INTO `translation` VALUES('SKILL', '99', 'es', 'Electronics');
INSERT INTO `translation` VALUES('SKILL', '100', 'es', 'Electronics Engineer');
INSERT INTO `translation` VALUES('SKILL', '101', 'es', 'Energy Storage');
INSERT INTO `translation` VALUES('SKILL', '102', 'es', 'Evaluate Software');
INSERT INTO `translation` VALUES('SKILL', '103', 'es', 'Fix things');
INSERT INTO `translation` VALUES('SKILL', '104', 'es', 'Fuels from organic wastes');
INSERT INTO `translation` VALUES('SKILL', '105', 'es', 'Furniture Restoration');
INSERT INTO `translation` VALUES('SKILL', '106', 'es', 'Grid-tied renewable power generation');
INSERT INTO `translation` VALUES('SKILL', '107', 'es', 'Hand tools');
INSERT INTO `translation` VALUES('SKILL', '108', 'es', 'Industrial Design');
INSERT INTO `translation` VALUES('SKILL', '109', 'es', 'Industrial Engineer');
INSERT INTO `translation` VALUES('SKILL', '110', 'es', 'Information sharing');
INSERT INTO `translation` VALUES('SKILL', '111', 'es', 'Interface Design');
INSERT INTO `translation` VALUES('SKILL', '112', 'es', 'Interior Design');
INSERT INTO `translation` VALUES('SKILL', '113', 'es', 'Internet research');
INSERT INTO `translation` VALUES('SKILL', '114', 'es', 'IT Project Manager');
INSERT INTO `translation` VALUES('SKILL', '115', 'es', 'Marine Biologist');
INSERT INTO `translation` VALUES('SKILL', '116', 'es', 'Mechanical Engineer');
INSERT INTO `translation` VALUES('SKILL', '117', 'es', 'Mechanics');
INSERT INTO `translation` VALUES('SKILL', '118', 'es', 'Micro-hydro & small scale wind');
INSERT INTO `translation` VALUES('SKILL', '119', 'es', 'Nanotech');
INSERT INTO `translation` VALUES('SKILL', '120', 'es', 'Physics Engineer');
INSERT INTO `translation` VALUES('SKILL', '121', 'es', 'Plumbery');
INSERT INTO `translation` VALUES('SKILL', '122', 'es', 'Programming');
INSERT INTO `translation` VALUES('SKILL', '123', 'es', 'Reuse & creative recycling');
INSERT INTO `translation` VALUES('SKILL', '124', 'es', 'Scientist');
INSERT INTO `translation` VALUES('SKILL', '125', 'es', 'SEO');
INSERT INTO `translation` VALUES('SKILL', '126', 'es', 'Sew');
INSERT INTO `translation` VALUES('SKILL', '127', 'es', 'Software Engineering');
INSERT INTO `translation` VALUES('SKILL', '128', 'es', 'Software Testing');
INSERT INTO `translation` VALUES('SKILL', '129', 'es', 'Surfing the Internet');
INSERT INTO `translation` VALUES('SKILL', '130', 'es', 'Technical Support');
INSERT INTO `translation` VALUES('SKILL', '131', 'es', 'Telecommunications');
INSERT INTO `translation` VALUES('SKILL', '132', 'es', 'Transition engineering');
INSERT INTO `translation` VALUES('SKILL', '133', 'es', 'Vehicle Painter');
INSERT INTO `translation` VALUES('SKILL', '134', 'es', 'Web Design');
INSERT INTO `translation` VALUES('SKILL', '135', 'es', 'Web development');
INSERT INTO `translation` VALUES('SKILL', '136', 'es', 'Wood gasification');
INSERT INTO `translation` VALUES('SKILL', '137', 'es', 'Dentist');
INSERT INTO `translation` VALUES('SKILL', '138', 'es', 'Dermatologist');
INSERT INTO `translation` VALUES('SKILL', '139', 'es', 'Emergency Medicine');
INSERT INTO `translation` VALUES('SKILL', '140', 'es', 'Gynaecologist');
INSERT INTO `translation` VALUES('SKILL', '141', 'es', 'Martial Arts');
INSERT INTO `translation` VALUES('SKILL', '142', 'es', 'Meditation');
INSERT INTO `translation` VALUES('SKILL', '143', 'es', 'Nursery');
INSERT INTO `translation` VALUES('SKILL', '144', 'es', 'Nutriology');
INSERT INTO `translation` VALUES('SKILL', '145', 'es', 'Ophtalmologist');
INSERT INTO `translation` VALUES('SKILL', '146', 'es', 'Pathologist');
INSERT INTO `translation` VALUES('SKILL', '147', 'es', 'Pediatritian');
INSERT INTO `translation` VALUES('SKILL', '148', 'es', 'Physical Rehabilitation');
INSERT INTO `translation` VALUES('SKILL', '149', 'es', 'Psychiatrist');
INSERT INTO `translation` VALUES('SKILL', '150', 'es', 'Psychology');
INSERT INTO `translation` VALUES('SKILL', '151', 'es', 'Special Care');
INSERT INTO `translation` VALUES('SKILL', '152', 'es', 'Surgeon');
INSERT INTO `translation` VALUES('SKILL', '153', 'es', 'Urologist');
INSERT INTO `translation` VALUES('SKILL', '154', 'es', 'Veterinarian');
INSERT INTO `translation` VALUES('SKILL', '155', 'es', 'Yoga');
INSERT INTO `translation` VALUES('SKILL', '156', 'es', 'Yoga Teacher');
INSERT INTO `translation` VALUES('SKILL', '1', 'en', 'Biotechture');
INSERT INTO `translation` VALUES('SKILL', '2', 'en', 'Earth sheltered construction');
INSERT INTO `translation` VALUES('SKILL', '3', 'en', 'House Painter');
INSERT INTO `translation` VALUES('SKILL', '4', 'en', 'Locksmitsh');
INSERT INTO `translation` VALUES('SKILL', '5', 'en', 'Natural construction materials');
INSERT INTO `translation` VALUES('SKILL', '6', 'en', 'Natural disaster resistant construction');
INSERT INTO `translation` VALUES('SKILL', '7', 'en', 'Owner building');
INSERT INTO `translation` VALUES('SKILL', '8', 'en', 'Passive solar design');
INSERT INTO `translation` VALUES('SKILL', '9', 'en', 'Pattern Language');
INSERT INTO `translation` VALUES('SKILL', '10', 'en', 'Water harvesting & Waste reuse');
INSERT INTO `translation` VALUES('SKILL', '11', 'en', 'Creating Partnerships');
INSERT INTO `translation` VALUES('SKILL', '12', 'en', 'Easy Word');
INSERT INTO `translation` VALUES('SKILL', '13', 'en', 'Event Organizer');
INSERT INTO `translation` VALUES('SKILL', '14', 'en', 'Fundraising');
INSERT INTO `translation` VALUES('SKILL', '15', 'en', 'Government Relations');
INSERT INTO `translation` VALUES('SKILL', '16', 'en', 'Hotel Manager');
INSERT INTO `translation` VALUES('SKILL', '17', 'en', 'Human Resources');
INSERT INTO `translation` VALUES('SKILL', '18', 'en', 'Lobbying');
INSERT INTO `translation` VALUES('SKILL', '19', 'en', 'Logistics');
INSERT INTO `translation` VALUES('SKILL', '20', 'en', 'Manage');
INSERT INTO `translation` VALUES('SKILL', '21', 'en', 'Master of Ceremonies');
INSERT INTO `translation` VALUES('SKILL', '22', 'en', 'Motivate');
INSERT INTO `translation` VALUES('SKILL', '23', 'en', 'Planning');
INSERT INTO `translation` VALUES('SKILL', '24', 'en', 'Project Manager');
INSERT INTO `translation` VALUES('SKILL', '25', 'en', 'Public Speaking');
INSERT INTO `translation` VALUES('SKILL', '26', 'en', 'Recruiting');
INSERT INTO `translation` VALUES('SKILL', '27', 'en', 'Scheduling events');
INSERT INTO `translation` VALUES('SKILL', '28', 'en', 'Economist');
INSERT INTO `translation` VALUES('SKILL', '29', 'en', 'Market Research');
INSERT INTO `translation` VALUES('SKILL', '30', 'en', 'Market Strategy');
INSERT INTO `translation` VALUES('SKILL', '31', 'en', 'Sell');
INSERT INTO `translation` VALUES('SKILL', '32', 'en', 'Stockbroker');
INSERT INTO `translation` VALUES('SKILL', '33', 'en', 'Agroforestry');
INSERT INTO `translation` VALUES('SKILL', '34', 'en', 'Biodynamics');
INSERT INTO `translation` VALUES('SKILL', '35', 'en', 'Bio-intensive gardening');
INSERT INTO `translation` VALUES('SKILL', '36', 'en', 'Environment Protection');
INSERT INTO `translation` VALUES('SKILL', '37', 'en', 'Forest gardening');
INSERT INTO `translation` VALUES('SKILL', '38', 'en', 'Gardening');
INSERT INTO `translation` VALUES('SKILL', '39', 'en', 'Geophysicist');
INSERT INTO `translation` VALUES('SKILL', '40', 'en', 'Gleaning');
INSERT INTO `translation` VALUES('SKILL', '41', 'en', 'Greenkeeper');
INSERT INTO `translation` VALUES('SKILL', '42', 'en', 'Holistic rangeland management');
INSERT INTO `translation` VALUES('SKILL', '43', 'en', 'Integrated aquaculture');
INSERT INTO `translation` VALUES('SKILL', '44', 'en', 'Keyline water harvesting');
INSERT INTO `translation` VALUES('SKILL', '45', 'en', 'Natural farming');
INSERT INTO `translation` VALUES('SKILL', '46', 'en', 'Natural sequence farming');
INSERT INTO `translation` VALUES('SKILL', '47', 'en', 'Nature-based forestry');
INSERT INTO `translation` VALUES('SKILL', '48', 'en', 'Organic agriculture');
INSERT INTO `translation` VALUES('SKILL', '49', 'en', 'Permaculture');
INSERT INTO `translation` VALUES('SKILL', '50', 'en', 'Seed saving');
INSERT INTO `translation` VALUES('SKILL', '51', 'en', 'Sowing and Growing');
INSERT INTO `translation` VALUES('SKILL', '52', 'en', 'Wild harvesting & hunting');
INSERT INTO `translation` VALUES('SKILL', '53', 'en', 'Action learning');
INSERT INTO `translation` VALUES('SKILL', '54', 'en', 'Dance');
INSERT INTO `translation` VALUES('SKILL', '55', 'en', 'Dealing with Pets');
INSERT INTO `translation` VALUES('SKILL', '56', 'en', 'Design Flyers');
INSERT INTO `translation` VALUES('SKILL', '57', 'en', 'Documentary research');
INSERT INTO `translation` VALUES('SKILL', '58', 'en', 'Drafting');
INSERT INTO `translation` VALUES('SKILL', '59', 'en', 'Fashion Design');
INSERT INTO `translation` VALUES('SKILL', '60', 'en', 'Filmmaker');
INSERT INTO `translation` VALUES('SKILL', '61', 'en', 'Graphic Design');
INSERT INTO `translation` VALUES('SKILL', '62', 'en', 'Guitarrist');
INSERT INTO `translation` VALUES('SKILL', '63', 'en', 'Humor');
INSERT INTO `translation` VALUES('SKILL', '64', 'en', 'Illustration');
INSERT INTO `translation` VALUES('SKILL', '65', 'en', 'Independent Teacher');
INSERT INTO `translation` VALUES('SKILL', '66', 'en', 'Journalist');
INSERT INTO `translation` VALUES('SKILL', '67', 'en', 'Languages');
INSERT INTO `translation` VALUES('SKILL', '68', 'en', 'Mentor');
INSERT INTO `translation` VALUES('SKILL', '69', 'en', 'Music DJ');
INSERT INTO `translation` VALUES('SKILL', '70', 'en', 'Music Producer');
INSERT INTO `translation` VALUES('SKILL', '71', 'en', 'Musician');
INSERT INTO `translation` VALUES('SKILL', '72', 'en', 'News Writer');
INSERT INTO `translation` VALUES('SKILL', '73', 'en', 'Painter');
INSERT INTO `translation` VALUES('SKILL', '74', 'en', 'Participatory arts & music');
INSERT INTO `translation` VALUES('SKILL', '75', 'en', 'Photography');
INSERT INTO `translation` VALUES('SKILL', '76', 'en', 'Plastic Artist');
INSERT INTO `translation` VALUES('SKILL', '77', 'en', 'Radio');
INSERT INTO `translation` VALUES('SKILL', '78', 'en', 'Sing');
INSERT INTO `translation` VALUES('SKILL', '79', 'en', 'Social ecology');
INSERT INTO `translation` VALUES('SKILL', '80', 'en', 'Taking Notes');
INSERT INTO `translation` VALUES('SKILL', '81', 'en', 'Teach');
INSERT INTO `translation` VALUES('SKILL', '82', 'en', 'Television');
INSERT INTO `translation` VALUES('SKILL', '83', 'en', 'Transition culture');
INSERT INTO `translation` VALUES('SKILL', '84', 'en', 'Translator');
INSERT INTO `translation` VALUES('SKILL', '85', 'en', 'Tutors');
INSERT INTO `translation` VALUES('SKILL', '86', 'en', 'Video Editing');
INSERT INTO `translation` VALUES('SKILL', '87', 'en', 'Video Production');
INSERT INTO `translation` VALUES('SKILL', '88', 'en', 'Waldorf education teacher');
INSERT INTO `translation` VALUES('SKILL', '89', 'en', 'Writer');
INSERT INTO `translation` VALUES('SKILL', '90', 'en', 'Writing Letters');
INSERT INTO `translation` VALUES('SKILL', '91', 'en', 'Writing Speeches');
INSERT INTO `translation` VALUES('SKILL', '92', 'en', 'Bicycles & Electric bikes');
INSERT INTO `translation` VALUES('SKILL', '93', 'en', 'Bio-char from forest wastes');
INSERT INTO `translation` VALUES('SKILL', '94', 'en', 'Co-generation');
INSERT INTO `translation` VALUES('SKILL', '95', 'en', 'Databases');
INSERT INTO `translation` VALUES('SKILL', '96', 'en', 'Efficient & low pollution wood stoves');
INSERT INTO `translation` VALUES('SKILL', '97', 'en', 'Electric Engineer');
INSERT INTO `translation` VALUES('SKILL', '98', 'en', 'Electrical Installations');
INSERT INTO `translation` VALUES('SKILL', '99', 'en', 'Electronics');
INSERT INTO `translation` VALUES('SKILL', '100', 'en', 'Electronics Engineer');
INSERT INTO `translation` VALUES('SKILL', '101', 'en', 'Energy Storage');
INSERT INTO `translation` VALUES('SKILL', '102', 'en', 'Evaluate Software');
INSERT INTO `translation` VALUES('SKILL', '103', 'en', 'Fix things');
INSERT INTO `translation` VALUES('SKILL', '104', 'en', 'Fuels from organic wastes');
INSERT INTO `translation` VALUES('SKILL', '105', 'en', 'Furniture Restoration');
INSERT INTO `translation` VALUES('SKILL', '106', 'en', 'Grid-tied renewable power generation');
INSERT INTO `translation` VALUES('SKILL', '107', 'en', 'Hand tools');
INSERT INTO `translation` VALUES('SKILL', '108', 'en', 'Industrial Design');
INSERT INTO `translation` VALUES('SKILL', '109', 'en', 'Industrial Engineer');
INSERT INTO `translation` VALUES('SKILL', '110', 'en', 'Information sharing');
INSERT INTO `translation` VALUES('SKILL', '111', 'en', 'Interface Design');
INSERT INTO `translation` VALUES('SKILL', '112', 'en', 'Interior Design');
INSERT INTO `translation` VALUES('SKILL', '113', 'en', 'Internet research');
INSERT INTO `translation` VALUES('SKILL', '114', 'en', 'IT Project Manager');
INSERT INTO `translation` VALUES('SKILL', '115', 'en', 'Marine Biologist');
INSERT INTO `translation` VALUES('SKILL', '116', 'en', 'Mechanical Engineer');
INSERT INTO `translation` VALUES('SKILL', '117', 'en', 'Mechanics');
INSERT INTO `translation` VALUES('SKILL', '118', 'en', 'Micro-hydro & small scale wind');
INSERT INTO `translation` VALUES('SKILL', '119', 'en', 'Nanotech');
INSERT INTO `translation` VALUES('SKILL', '120', 'en', 'Physics Engineer');
INSERT INTO `translation` VALUES('SKILL', '121', 'en', 'Plumbery');
INSERT INTO `translation` VALUES('SKILL', '122', 'en', 'Programming');
INSERT INTO `translation` VALUES('SKILL', '123', 'en', 'Reuse & creative recycling');
INSERT INTO `translation` VALUES('SKILL', '124', 'en', 'Scientist');
INSERT INTO `translation` VALUES('SKILL', '125', 'en', 'SEO');
INSERT INTO `translation` VALUES('SKILL', '126', 'en', 'Sew');
INSERT INTO `translation` VALUES('SKILL', '127', 'en', 'Software Engineering');
INSERT INTO `translation` VALUES('SKILL', '128', 'en', 'Software Testing');
INSERT INTO `translation` VALUES('SKILL', '129', 'en', 'Surfing the Internet');
INSERT INTO `translation` VALUES('SKILL', '130', 'en', 'Technical Support');
INSERT INTO `translation` VALUES('SKILL', '131', 'en', 'Telecommunications');
INSERT INTO `translation` VALUES('SKILL', '132', 'en', 'Transition engineering');
INSERT INTO `translation` VALUES('SKILL', '133', 'en', 'Vehicle Painter');
INSERT INTO `translation` VALUES('SKILL', '134', 'en', 'Web Design');
INSERT INTO `translation` VALUES('SKILL', '135', 'en', 'Web development');
INSERT INTO `translation` VALUES('SKILL', '136', 'en', 'Wood gasification');
INSERT INTO `translation` VALUES('SKILL', '137', 'en', 'Dentist');
INSERT INTO `translation` VALUES('SKILL', '138', 'en', 'Dermatologist');
INSERT INTO `translation` VALUES('SKILL', '139', 'en', 'Emergency Medicine');
INSERT INTO `translation` VALUES('SKILL', '140', 'en', 'Gynaecologist');
INSERT INTO `translation` VALUES('SKILL', '141', 'en', 'Martial Arts');
INSERT INTO `translation` VALUES('SKILL', '142', 'en', 'Meditation');
INSERT INTO `translation` VALUES('SKILL', '143', 'en', 'Nursery');
INSERT INTO `translation` VALUES('SKILL', '144', 'en', 'Nutriology');
INSERT INTO `translation` VALUES('SKILL', '145', 'en', 'Ophtalmologist');
INSERT INTO `translation` VALUES('SKILL', '146', 'en', 'Pathologist');
INSERT INTO `translation` VALUES('SKILL', '147', 'en', 'Pediatritian');
INSERT INTO `translation` VALUES('SKILL', '148', 'en', 'Physical Rehabilitation');
INSERT INTO `translation` VALUES('SKILL', '149', 'en', 'Psychiatrist');
INSERT INTO `translation` VALUES('SKILL', '150', 'en', 'Psychology');
INSERT INTO `translation` VALUES('SKILL', '151', 'en', 'Special Care');
INSERT INTO `translation` VALUES('SKILL', '152', 'en', 'Surgeon');
INSERT INTO `translation` VALUES('SKILL', '153', 'en', 'Urologist');
INSERT INTO `translation` VALUES('SKILL', '154', 'en', 'Veterinarian');
INSERT INTO `translation` VALUES('SKILL', '155', 'en', 'Yoga');
INSERT INTO `translation` VALUES('SKILL', '156', 'en', 'Yoga Teacher');
INSERT INTO `translation` VALUES('GEN_LANG', 'es', 'en', 'Spanish');
INSERT INTO `translation` VALUES('GEN_LANG', 'en', 'en', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `tree_comments`
--

CREATE TABLE `tree_comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) DEFAULT NULL,
  `uid_fk` int(11) DEFAULT '0',
  `msg_id_fk` int(11) DEFAULT '0',
  `ip` varchar(30) DEFAULT NULL,
  `created` int(11) DEFAULT '0',
  PRIMARY KEY (`com_id`),
  KEY `uid_fk` (`uid_fk`),
  KEY `msg_id_fk` (`msg_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tree_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `tree_messages`
--

CREATE TABLE `tree_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) DEFAULT NULL,
  `uid_fk` int(11) DEFAULT '0',
  `ip` varchar(30) DEFAULT NULL,
  `created` int(11) DEFAULT '0',
  `uploads` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `uid_fk` (`uid_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tree_messages`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `ecocenters`
--
ALTER TABLE `ecocenters`
  ADD CONSTRAINT `ecocenters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ecocenter_activities`
--
ALTER TABLE `ecocenter_activities`
  ADD CONSTRAINT `ecocenter_activities_ibfk_2` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_activities_ibfk_3` FOREIGN KEY (`activity_id`) REFERENCES `cat_activities` (`id`);

--
-- Constraints for table `ecocenter_albums`
--
ALTER TABLE `ecocenter_albums`
  ADD CONSTRAINT `ecocenter_albums_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `ecocenters` (`id_centro`);

--
-- Constraints for table `ecocenter_bookings`
--
ALTER TABLE `ecocenter_bookings`
  ADD CONSTRAINT `ecocenter_bookings_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_bookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `ecocenter_bookings_rooms` (`id`),
  ADD CONSTRAINT `ecocenter_bookings_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `ecocenter_bookings_rooms`
--
ALTER TABLE `ecocenter_bookings_rooms`
  ADD CONSTRAINT `ecocenter_bookings_rooms_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_bookings_rooms_ibfk_2` FOREIGN KEY (`currency_id`) REFERENCES `cat_currencies` (`id`);

--
-- Constraints for table `ecocenter_dietary_practice`
--
ALTER TABLE `ecocenter_dietary_practice`
  ADD CONSTRAINT `ecocenter_dietary_practice_ibfk_1` FOREIGN KEY (`dietary_practice_id`) REFERENCES `cat_dietary_practice` (`id`),
  ADD CONSTRAINT `ecocenter_dietary_practice_ibfk_2` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`);

--
-- Constraints for table `ecocenter_directions`
--
ALTER TABLE `ecocenter_directions`
  ADD CONSTRAINT `ecocenter_directions_ibfk_1` FOREIGN KEY (`direction_id`) REFERENCES `cat_directions` (`id`),
  ADD CONSTRAINT `ecocenter_directions_ibfk_2` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`);

--
-- Constraints for table `ecocenter_follows`
--
ALTER TABLE `ecocenter_follows`
  ADD CONSTRAINT `ecocenter_follows_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `ecocenter_follows_ibfk_2` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`);

--
-- Constraints for table `ecocenter_orientations`
--
ALTER TABLE `ecocenter_orientations`
  ADD CONSTRAINT `ecocenter_orientations_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_orientations_ibfk_2` FOREIGN KEY (`orientation_id`) REFERENCES `cat_orientations` (`id`);

--
-- Constraints for table `ecocenter_people_roles`
--
ALTER TABLE `ecocenter_people_roles`
  ADD CONSTRAINT `ecocenter_people_roles_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_people_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `ecocenter_people_roles_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `cat_ecocenter_roles` (`id`);

--
-- Constraints for table `ecocenter_places`
--
ALTER TABLE `ecocenter_places`
  ADD CONSTRAINT `ecocenter_places_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `cat_map_types` (`id`);

--
-- Constraints for table `ecocenter_services_available`
--
ALTER TABLE `ecocenter_services_available`
  ADD CONSTRAINT `ecocenter_services_available_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_services_available_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `cat_services_available` (`id`);

--
-- Constraints for table `ecocenter_spiritual_practice`
--
ALTER TABLE `ecocenter_spiritual_practice`
  ADD CONSTRAINT `ecocenter_spiritual_practice_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_spiritual_practice_ibfk_2` FOREIGN KEY (`spiritual_pr_id`) REFERENCES `cat_spiritual_practice` (`id`);

--
-- Constraints for table `ecocenter_vacancies`
--
ALTER TABLE `ecocenter_vacancies`
  ADD CONSTRAINT `ecocenter_vacancies_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_vacancies_ibfk_2` FOREIGN KEY (`petal_id`) REFERENCES `skill_categories` (`skill_category_id`);

--
-- Constraints for table `ecocenter_vacancies_skills`
--
ALTER TABLE `ecocenter_vacancies_skills`
  ADD CONSTRAINT `ecocenter_vacancies_skills_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_vacancies_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`);

--
-- Constraints for table `ecocenter_volunteers`
--
ALTER TABLE `ecocenter_volunteers`
  ADD CONSTRAINT `ecocenter_volunteers_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_volunteers_ibfk_2` FOREIGN KEY (`vacancy_id`) REFERENCES `ecocenter_vacancies` (`id`),
  ADD CONSTRAINT `ecocenter_volunteers_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `ecocenter_workshops`
--
ALTER TABLE `ecocenter_workshops`
  ADD CONSTRAINT `ecocenter_workshops_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `ecocenters` (`id_centro`),
  ADD CONSTRAINT `ecocenter_workshops_ibfk_2` FOREIGN KEY (`currency_id`) REFERENCES `cat_currencies` (`id`),
  ADD CONSTRAINT `ecocenter_workshops_ibfk_3` FOREIGN KEY (`petal_id`) REFERENCES `skill_categories` (`skill_category_id`);

--
-- Constraints for table `members_languages`
--
ALTER TABLE `members_languages`
  ADD CONSTRAINT `members_languages_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `list_languages` (`id`),
  ADD CONSTRAINT `members_languages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `members_stream`
--
ALTER TABLE `members_stream`
  ADD CONSTRAINT `members_stream_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `members_stream_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `members_tracking`
--
ALTER TABLE `members_tracking`
  ADD CONSTRAINT `members_tracking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_albums`
--
ALTER TABLE `member_albums`
  ADD CONSTRAINT `member_albums_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_bonds`
--
ALTER TABLE `member_bonds`
  ADD CONSTRAINT `member_bonds_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `member_bonds_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_interests`
--
ALTER TABLE `member_interests`
  ADD CONSTRAINT `member_interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `member_interests_ibfk_2` FOREIGN KEY (`int_id`) REFERENCES `cat_interests` (`id`);

--
-- Constraints for table `member_pictures`
--
ALTER TABLE `member_pictures`
  ADD CONSTRAINT `member_pictures_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `member_albums` (`id`),
  ADD CONSTRAINT `member_pictures_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_pictures_comments`
--
ALTER TABLE `member_pictures_comments`
  ADD CONSTRAINT `member_pictures_comments_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `member_albums` (`id`),
  ADD CONSTRAINT `member_pictures_comments_ibfk_2` FOREIGN KEY (`pic_id`) REFERENCES `member_pictures` (`id`),
  ADD CONSTRAINT `member_pictures_comments_ibfk_3` FOREIGN KEY (`user_from`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_pictures_people_tags`
--
ALTER TABLE `member_pictures_people_tags`
  ADD CONSTRAINT `member_pictures_people_tags_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `member_albums` (`id`),
  ADD CONSTRAINT `member_pictures_people_tags_ibfk_2` FOREIGN KEY (`pic_id`) REFERENCES `member_pictures` (`id`),
  ADD CONSTRAINT `member_pictures_people_tags_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_references`
--
ALTER TABLE `member_references`
  ADD CONSTRAINT `member_references_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  ADD CONSTRAINT `member_references_ibfk_2` FOREIGN KEY (`user_from`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `member_references_ibfk_3` FOREIGN KEY (`user_to`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_skills`
--
ALTER TABLE `member_skills`
  ADD CONSTRAINT `member_skills_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `member_skills_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_trips`
--
ALTER TABLE `member_trips`
  ADD CONSTRAINT `member_trips_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_trips_comments`
--
ALTER TABLE `member_trips_comments`
  ADD CONSTRAINT `member_trips_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `member_trips_comments_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `member_trips` (`id`);

--
-- Constraints for table `member_trips_friends`
--
ALTER TABLE `member_trips_friends`
  ADD CONSTRAINT `member_trips_friends_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `member_trips` (`id`),
  ADD CONSTRAINT `member_trips_friends_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `member_trips_skills`
--
ALTER TABLE `member_trips_skills`
  ADD CONSTRAINT `member_trips_skills_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`skill_id`),
  ADD CONSTRAINT `member_trips_skills_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `member_trips` (`id`);

--
-- Constraints for table `member_trips_stops`
--
ALTER TABLE `member_trips_stops`
  ADD CONSTRAINT `member_trips_stops_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `member_trips_stops_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `member_trips` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `message_threads` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`user_from`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `message_read_state`
--
ALTER TABLE `message_read_state`
  ADD CONSTRAINT `message_read_state_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `message_read_state_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`);

--
-- Constraints for table `message_threads`
--
ALTER TABLE `message_threads`
  ADD CONSTRAINT `message_threads_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `message_thread_members`
--
ALTER TABLE `message_thread_members`
  ADD CONSTRAINT `message_thread_members_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `message_threads` (`id`),
  ADD CONSTRAINT `message_thread_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `miembros_actividades`
--
ALTER TABLE `miembros_actividades`
  ADD CONSTRAINT `miembros_actividades_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `miembros_actividades_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_to`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_from`) REFERENCES `miembros` (`user_id`);

--
-- Constraints for table `stream_rate`
--
ALTER TABLE `stream_rate`
  ADD CONSTRAINT `stream_rate_ibfk_1` FOREIGN KEY (`members_stream_id`) REFERENCES `members_stream` (`members_stream_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stream_rate_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `miembros` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tree_comments`
--
ALTER TABLE `tree_comments`
  ADD CONSTRAINT `tree_comments_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `miembros` (`user_id`),
  ADD CONSTRAINT `tree_comments_ibfk_2` FOREIGN KEY (`msg_id_fk`) REFERENCES `tree_messages` (`msg_id`);

--
-- Constraints for table `tree_messages`
--
ALTER TABLE `tree_messages`
  ADD CONSTRAINT `tree_messages_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `miembros` (`user_id`);
