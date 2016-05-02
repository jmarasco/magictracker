-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 08:43 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disney_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Attractions', 0),
(2, 'Dining', 0),
(3, 'Entertainment', 0),
(4, 'Character', 0),
(5, 'Resort', 0),
(6, 'Dining Event', 2),
(7, 'Dinner Show', 2),
(8, 'Quick Service', 2),
(9, 'Table Service', 2),
(10, 'Deluxe', 5),
(11, 'Deluxe Villas', 5),
(12, 'Moderate', 5),
(13, 'Value', 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_user`
--

CREATE TABLE `comment_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `seasonal` tinyint(1) NOT NULL DEFAULT '0',
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `parent_id`, `location_id`, `category_id`, `status_id`, `seasonal`, `item_name`, `item_img`) VALUES
(1, 0, 1, 1, 1, 0, 'A Pirate''s Adventure - Treasures of the Seven Seas', 'a-pirates-adventure'),
(2, 0, 9, 1, 1, 0, 'Academy of Television Arts and Sciences Hall of Fame Plaza', ''),
(3, 0, 24, 1, 1, 0, 'Affection Section', 'rafikis-planet-watch'),
(4, 0, 28, 1, 1, 0, 'Agent P''s World Showcase Adventure', 'agent-ps-world-showcase'),
(5, 0, 28, 1, 1, 0, 'American Heritage Gallery', ''),
(6, 0, 27, 1, 1, 0, 'Astro Orbiter', 'astro-orbiter'),
(7, 0, 13, 1, 1, 0, 'Behind the Seeds', 'behind-the-seeds'),
(8, 0, 12, 1, 1, 0, 'Big Thunder Mountain Railroad', 'big-thunder-mountain-railroad'),
(9, 0, 28, 1, 1, 0, 'Bijutsu-kan Gallery', ''),
(10, 0, 27, 1, 1, 0, 'Buzz Lightyear''s Space Ranger Spin', 'buzz-lightyears-space-ranger-spin'),
(11, 0, 13, 1, 1, 0, 'Captain EO', 'captain-eo'),
(12, 0, 11, 1, 1, 0, 'Casey Jr. Splash ''N'' Soak Station', 'casey-jr-splash-n-soak'),
(13, 0, 11, 1, 1, 0, 'Cinderella Castle', 'cinderella-castle'),
(14, 0, 24, 1, 1, 0, 'Conservation Station', 'rafikis-planet-watch'),
(15, 0, 12, 1, 1, 0, 'Country Bear Jamboree', 'country-bear-jamboree'),
(16, 0, 7, 1, 1, 0, 'Dino-Sue', ''),
(17, 0, 7, 1, 1, 0, 'DINOSAUR', 'dinosaur'),
(18, 0, 8, 1, 1, 0, 'Discovery Island Trails', 'discovery-island'),
(19, 0, 11, 1, 1, 0, 'Dumbo the Flying Elephant', 'dumbo-the-flying-elephant'),
(20, 0, 13, 1, 1, 0, 'Ellen''s Energy Adventure', ''),
(21, 0, 11, 1, 1, 0, 'Enchanted Tales with Belle', 'enchanted-tales-with-belle'),
(22, 0, 5, 1, 1, 0, 'Expedition Everest - Legend of the Forbidden Mountain', 'expedition-everest'),
(23, 0, 7, 1, 1, 0, 'Fossil Fun Games', ''),
(24, 0, 12, 1, 1, 0, 'Frontierland Shootin'' Arcade', 'frontierland-shootin-arcade'),
(25, 0, 28, 1, 1, 0, 'Gallery of Arts and History', 'gallery-of-arts-and-history'),
(26, 0, 28, 1, 1, 0, 'Gran Fiesta Tour Starring The Three Caballeros', 'gran-fiesta-tour'),
(27, 0, 24, 1, 1, 0, 'Habitat Habit!', 'rafikis-planet-watch'),
(28, 0, 16, 1, 1, 0, 'Haunted Mansion', 'haunted-mansion'),
(29, 0, 25, 1, 1, 0, 'Honey, I Shrunk the Kids Movie Set Adventure', 'honey-i-shrunk-the-kids'),
(30, 0, 28, 1, 1, 0, 'House of the Whispering Willows', ''),
(31, 0, 13, 1, 1, 0, 'Imageworks - The "What If" Labs', ''),
(32, 0, 28, 1, 1, 0, 'Impressions de France', 'impressions-de-france'),
(33, 0, 13, 1, 1, 0, 'Innoventions East', 'innoventions1'),
(34, 0, 13, 1, 1, 0, 'Innoventions West', 'innoventions3'),
(35, 0, 11, 1, 1, 0, 'it''s a small world', 'its-a-small-world'),
(36, 0, 8, 1, 1, 0, 'It''s Tough to Be a Bug!', 'its-tough-to-be-a-bug'),
(37, 0, 13, 1, 1, 0, 'Journey Into Imagination With Figment', 'journey-into-imagination'),
(38, 0, 1, 1, 1, 0, 'Jungle Cruise', 'jungle-cruise'),
(39, 0, 5, 1, 1, 0, 'Kali River Rapids', 'kali-river-rapids'),
(40, 0, 28, 1, 1, 0, 'Kidcot Fun Stops', 'kidcot-fun-stop'),
(41, 0, 2, 1, 1, 0, 'Kilimanjaro Safaris', 'kilimanjaro-safaris'),
(42, 0, 13, 1, 1, 0, 'Leave a Legacy', ''),
(43, 0, 16, 1, 1, 0, 'Liberty Square Riverboat', 'liberty-square-riverboat'),
(44, 0, 13, 1, 1, 0, 'Living with the Land', 'living-with-the-land'),
(45, 0, 11, 1, 1, 0, 'Mad Tea Party', 'mad-tea-party'),
(46, 0, 5, 1, 1, 0, 'Maharajah Jungle Trek', 'maharajah-jungle-trek'),
(47, 0, 19, 1, 1, 0, 'Main Street Vehicles', 'main-street-trolley-show'),
(48, 0, 28, 1, 1, 0, 'Mexico Folk Art Gallery', ''),
(49, 0, 11, 1, 1, 0, 'Mickey''s PhilharMagic', 'mickeys-philharmagic'),
(50, 0, 13, 1, 1, 0, 'Mission: SPACE Advanced Training Lab', 'mission-space-advanced-training-lab'),
(51, 0, 13, 1, 1, 0, 'Mission: SPACE Green', 'mission-space'),
(52, 0, 13, 1, 1, 0, 'Mission: SPACE Orange', 'mission-space'),
(53, 0, 27, 1, 1, 0, 'Monster''s, Inc. Laugh Floor', 'monsters-inc-laugh-floor'),
(54, 0, 21, 1, 1, 0, 'Muppet*Vision 3D', 'muppetvision-3D'),
(55, 0, 28, 1, 1, 0, 'O Canada!', 'o-canada'),
(56, 0, 2, 1, 1, 0, 'Pangani Forest Exploration Trail', 'pangani-forest-exploration-trail'),
(57, 0, 11, 1, 1, 0, 'Peter Pan''s Flight', 'peter-pans-flight'),
(58, 0, 1, 1, 1, 0, 'Pirates of the Caribbean', ''),
(59, 0, 7, 1, 1, 0, 'Primeval Whirl', 'primeval-whirl'),
(60, 0, 11, 1, 1, 0, 'Prince Charming Regal Carrousel', 'prince-charming-regal-carrousel'),
(61, 0, 13, 1, 1, 0, 'Project Tomorrow: Inventing the Wonders of the Future', ''),
(62, 0, 28, 1, 1, 0, 'Reflections of China', ''),
(63, 0, 26, 1, 1, 0, 'Rock ''n'' Roller Coaster Starring Aerosmith', 'rock-n-roller-coaster'),
(64, 0, 13, 1, 1, 0, 'SeaBase', ''),
(65, 0, 11, 1, 1, 0, 'Seven Dwarfs Mine Train', 'seven-dwarfs-mine-train'),
(66, 0, 13, 1, 1, 0, 'Soarin''', 'soarin'),
(67, 0, 19, 1, 1, 0, 'Sorcerers of the Magic Kingdom', 'sorcerors-of-the-magic-kingdom'),
(68, 0, 27, 1, 1, 0, 'Space Mountain', 'space-mountain'),
(69, 0, 13, 1, 1, 0, 'Spaceship Earth', 'spaceship-earth'),
(70, 0, 12, 1, 1, 0, 'Splash Mountain', 'splash-mountain'),
(71, 0, 9, 1, 1, 0, 'Star Tours: The Adventures Continue', 'star-tours'),
(72, 0, 28, 1, 1, 0, 'Stave Church Gallery', ''),
(73, 0, 27, 1, 1, 0, 'Stitch''s Great Escape!', 'stitchs-great-escape'),
(74, 0, 25, 1, 1, 0, 'Streets of America', 'streets-of-america'),
(75, 0, 1, 1, 1, 0, 'Swiss Family Treehouse', 'swiss-family-treehouse'),
(76, 0, 13, 1, 1, 0, 'Test Track Presented by Chevrolet', 'test-track'),
(77, 0, 28, 1, 1, 0, 'The American Adventure', 'american-adventure'),
(78, 0, 11, 1, 1, 0, 'The Barnstormer', 'barnstormer'),
(79, 0, 7, 1, 1, 0, 'The Boneyard', 'boneyard'),
(80, 0, 13, 1, 1, 0, 'The Circle of Life', 'circle-of-life'),
(81, 0, 14, 1, 1, 0, 'The Great Movie Ride', 'great-movie-ride'),
(82, 0, 16, 1, 1, 0, 'The Hall of Presidents', 'hall-of-presidents'),
(83, 0, 1, 1, 1, 0, 'The Magic Carpets of Aladdin', 'magic-carpets'),
(84, 0, 11, 1, 1, 0, 'The Many Adventures of Winnie the Pooh', 'adventures-of-winnie-the-pooh'),
(85, 0, 22, 1, 1, 0, 'The Oasis Exhibits', ''),
(86, 0, 13, 1, 1, 0, 'The Seas with Nemo & Friends', ''),
(87, 0, 26, 1, 1, 0, 'The Twilight Zone Tower of Terror', 'tower-of-terror'),
(88, 0, 12, 1, 1, 0, 'Tom Sawyer Island', 'tom-sawyer-island'),
(89, 0, 27, 1, 1, 0, 'Tomorrowland Speedway', 'tomorrowland-speedway'),
(90, 0, 27, 1, 1, 0, 'Tomorrowland Transit Authority PeopleMover', 'peoplemover'),
(91, 0, 23, 1, 1, 0, 'Toy Story Midway Mania!', 'toy-story-midway-mania'),
(92, 0, 8, 1, 1, 0, 'Tree of Life', ''),
(93, 0, 7, 1, 1, 0, 'TriceraTop Spin', 'triceratop-spin'),
(94, 0, 13, 1, 1, 0, 'Turtle Talk with Crush', ''),
(95, 0, 11, 1, 1, 0, 'Under the Sea ~ Journey of the Little Mermaid', 'under-the-sea'),
(96, 0, 11, 1, 1, 0, 'Walt Disney World Railroad', 'railroad-main-street'),
(97, 0, 27, 1, 1, 0, 'Walt Disney''s Carousel of Progress', ''),
(98, 0, 1, 1, 1, 0, 'Walt Disney''s Enchanted Tiki Room', 'enchanted-tiki-room'),
(99, 0, 8, 1, 1, 0, 'Wilderness Explorers', 'wilderness-explorers'),
(100, 0, 2, 1, 1, 0, 'Wildlife Express Train', ''),
(101, 0, 26, 6, 1, 0, 'Club Villain', ''),
(102, 0, 14, 6, 1, 0, 'Dining with an Imagineer', ''),
(103, 0, 15, 6, 1, 0, 'Fantasmic! Dinner Package', ''),
(104, 0, 28, 6, 1, 0, 'IllumiNations Sparkling Dessert Party', ''),
(105, 0, 15, 6, 1, 0, 'Symphony in the Stars: A Galactic Spectacular Dessert Party', ''),
(106, 0, 27, 6, 1, 0, 'Wishes Fireworks Dessert Party', ''),
(107, 0, 28, 3, 1, 0, 'American Music Machine', ''),
(108, 0, 28, 3, 1, 0, 'B''net Al Houwariyate', 'bnet-al-houwariyate'),
(109, 0, 26, 3, 1, 0, 'Beauty and the Beast - Live on Stage', 'beauty-and-the-beast-live'),
(110, 0, 28, 3, 1, 0, 'British Revolution', ''),
(111, 0, 2, 3, 1, 0, 'Burudika', ''),
(112, 0, 28, 3, 1, 0, 'Canadian Lumberjacks', 'canadian-lumberjacks'),
(113, 0, 1, 3, 1, 0, 'Captain Jack Sparrow''s Pirate Tutorial', 'pirate-tutorial'),
(114, 0, 19, 3, 1, 0, 'Casey''s Corner Pianist', 'casey-corner-pianist'),
(115, 0, 19, 3, 1, 0, 'Celebrate the Magic', 'celebrate-the-magic'),
(116, 0, 5, 3, 1, 0, 'Chakrandi', ''),
(117, 0, 9, 3, 1, 0, 'Club Disney', ''),
(118, 0, 19, 3, 1, 0, 'Dapper Dans', ''),
(119, 0, 7, 3, 1, 0, 'DinoLand Dance-a-palooza', ''),
(120, 0, 17, 3, 1, 0, 'Disney Festival of Fantasy Parade', 'festival-of-fantasy-parade'),
(121, 0, 4, 3, 1, 0, 'Disney Junior - Live on Stage!', 'disney-junior-live'),
(122, 0, 14, 3, 1, 1, 'Disney''s Hollywood Studios Special July 4th Fireworks Presentation', ''),
(123, 0, 3, 3, 1, 0, 'Divine', 'divine'),
(124, 0, 5, 3, 1, 0, 'DJ Anaan', ''),
(125, 0, 19, 3, 1, 0, 'Dream Along With Mickey', ''),
(126, 0, 28, 3, 1, 0, 'Eat to the Beat Concert Series', ''),
(127, 0, 17, 3, 1, 0, 'Electrical Water Pageant', ''),
(128, 0, 28, 3, 1, 1, 'Epcot Food & Wine Festival', ''),
(129, 0, 10, 3, 1, 1, 'Epcot International Flower & Garden Festival', ''),
(130, 0, 26, 3, 1, 0, 'Fantasmic!', 'fantasmic'),
(131, 0, 2, 3, 1, 0, 'Festival of the Lion King', 'festival-of-the-lion-king'),
(132, 0, 7, 3, 1, 0, 'Finding Nemo - The Musical', 'finding-nemo-the-musical'),
(133, 0, 19, 3, 1, 0, 'Flag Retreat', ''),
(134, 0, 5, 3, 1, 0, 'Flights of Wonder', 'flights-of-wonder'),
(135, 0, 9, 3, 1, 0, 'For the First Time In Forever: A Frozen Sing-Along Celebration', 'frozen-sing-along'),
(136, 0, 14, 3, 1, 1, 'Frozen Fireworks Spectacular', ''),
(137, 0, 28, 3, 1, 1, 'Garden Rocks Concert Series', ''),
(138, 0, 24, 3, 1, 0, 'Gi-Tar Dan at Rafiki''s Planet Watch', ''),
(139, 0, 17, 3, 1, 1, 'Happy Hallowishes Fireworks Show', ''),
(140, 0, 12, 3, 1, 0, 'Hoedown Happening', ''),
(141, 0, 28, 3, 1, 0, 'IllumiNations: Reflections of Earth', 'illuminations'),
(142, 0, 27, 3, 1, 0, 'Incredibles Super Dance Party', ''),
(143, 0, 9, 3, 1, 0, 'Indiana Jones Epic Stunt Spectacular!', 'indiana-jones-epic-stunt-spectacular'),
(144, 0, 13, 3, 1, 0, 'JAMMitors', ''),
(145, 0, 9, 3, 1, 0, 'Jedi Training Academy', 'jedi-traning'),
(146, 0, 28, 3, 1, 0, 'Jeweled Dragon Acrobats', ''),
(147, 0, 25, 3, 1, 0, 'Lights, Motors, Action! Extreme Stunt Show', 'lights-motors-action'),
(148, 0, 15, 3, 1, 1, 'Lights! Camera! Happy New Year! Fireworks', ''),
(149, 0, 19, 3, 1, 0, 'Magic Kingdom Welcome Show', 'magic-kingdom-welcome-show'),
(150, 0, 19, 3, 1, 0, 'Main Street Electrical Parade', 'main-street-electrical-parade'),
(151, 0, 19, 3, 1, 0, 'Main Street Philharmonic', ''),
(152, 0, 19, 3, 1, 0, 'Main Street Trolley Show', 'main-street-trolley-show'),
(153, 0, 28, 3, 1, 0, 'Mariachi Cobre', 'mariachi-cobre'),
(154, 0, 28, 3, 1, 0, 'Matsuriza', 'matsuriza'),
(155, 0, 17, 3, 1, 1, 'Mickey''s "Boo-to-You" Halloween Parade', ''),
(156, 0, 17, 3, 1, 1, 'Mickey''s Not So Scary Halloween Party', ''),
(157, 0, 17, 3, 1, 1, 'Mickey''s Very Merry Christmas Party', ''),
(158, 0, 17, 3, 1, 0, 'Move It! Shake It! Dance & Play It! Street Party', ''),
(159, 0, 25, 3, 1, 1, 'Osborne Family Spectacle of Dancing Lights', 'osborne-family-spectacle-of-lights'),
(160, 0, 28, 3, 1, 0, 'Quickstep', ''),
(161, 0, 28, 3, 1, 0, 'Rose & Crown Pub Musician', 'rose-and-crown'),
(162, 0, 11, 3, 1, 0, 'Royal Majesty Makers', ''),
(163, 0, 28, 3, 1, 0, 'Sbandieratori Di Sansepolcro', ''),
(164, 0, 28, 3, 1, 0, 'Sergio', ''),
(165, 0, 28, 3, 1, 0, 'Serveur Amusant', ''),
(166, 0, 13, 3, 1, 0, 'Sum of All Thrills', 'sum-of-all-thrills'),
(167, 0, 15, 3, 1, 0, 'Symphony in the Stars: A Galactic Spectacular', ''),
(168, 0, 2, 3, 1, 0, 'Tam Tam Drummers of Harambe', ''),
(169, 0, 14, 3, 1, 0, 'The Citizens of Hollywood', ''),
(170, 0, 14, 3, 1, 0, 'The Citizens of Hollywood Cavalcade of Stars', ''),
(171, 0, 19, 3, 1, 0, 'The Citizens of Main Street', ''),
(172, 0, 25, 3, 1, 1, 'The Comedy Warehouse Holiday Special', ''),
(173, 0, 12, 3, 1, 0, 'The Notorious Banjo Brothers and Bob', ''),
(174, 0, 28, 3, 1, 0, 'TradNation', ''),
(175, 0, 19, 3, 1, 1, 'Villain''s Dance Mix & Mingle', ''),
(176, 0, 8, 3, 1, 0, 'Viva Gaia Street Band!', ''),
(177, 0, 28, 3, 1, 0, 'Viva Mexico', ''),
(178, 0, 28, 3, 1, 0, 'Voices of Liberty', 'voices-of-liberty'),
(179, 0, 4, 3, 1, 0, 'Voyage of the Little Mermaid', 'voyage-of-the-little-mermaid'),
(180, 0, 20, 3, 1, 0, 'Walt Disney: One Man''s Dream', 'one-mans-dream'),
(181, 0, 8, 3, 1, 0, 'Winged Encounters - The Kingdom Takes Flight', ''),
(182, 0, 17, 3, 1, 0, 'Wishes Nighttime Spectacular', 'wishes'),
(183, 0, 6, 8, 1, 0, 'ABC Commissary', ''),
(184, 0, 1, 8, 1, 0, 'Aloha Isle', ''),
(185, 0, 26, 8, 1, 0, 'Anaheim Produce', ''),
(186, 0, 5, 8, 1, 0, 'Anandapur Ice Cream Truck', ''),
(187, 0, 27, 8, 1, 0, 'Auntie Gravity''s Galactic Goodies', 'auntie-gravitys'),
(188, 0, 9, 8, 1, 0, 'Backlot Express', ''),
(189, 0, 11, 8, 1, 0, 'Be Our Guest Restaurant', 'be-our-guest'),
(190, 0, 28, 8, 1, 0, 'Block & Hans', ''),
(191, 0, 19, 8, 1, 0, 'Casey''s Corner', 'caseys-corner'),
(192, 0, 26, 8, 1, 0, 'Catalina Eddie''s', ''),
(193, 0, 11, 8, 1, 0, 'Cheshire Cafe', 'cheshire-cafe'),
(194, 0, 16, 8, 1, 0, 'Columbia Harbour House', 'columbia-harbor-house'),
(195, 0, 25, 8, 1, 0, 'Cool Set Refreshments', ''),
(196, 0, 27, 8, 1, 0, 'Cool Ship', 'cool-ship'),
(197, 0, 27, 8, 1, 0, 'Cosmic Ray''s Starlight Cafe', 'cosmic-rays-starlight-cafe'),
(198, 0, 8, 8, 1, 0, 'Creature Comforts', ''),
(199, 0, 28, 8, 1, 0, 'Crepes des Chefs de France', ''),
(200, 0, 2, 8, 1, 0, 'Dawa Bar', ''),
(201, 0, 7, 8, 1, 0, 'Dino Bite Snacks', 'dino-bite-snacks'),
(202, 0, 8, 8, 1, 0, 'Dino Diner', ''),
(203, 0, 9, 8, 1, 0, 'Dinosaur Gertie''s Ice Cream of Extinction', ''),
(204, 0, 8, 8, 1, 0, 'Eight Spoon Cafe', ''),
(205, 0, 13, 8, 1, 0, 'Electric Umbrella Restaurant', 'electric-umbrella'),
(206, 0, 26, 8, 1, 0, 'Fairfax Fare', ''),
(207, 0, 28, 8, 1, 0, 'Fife & Drum Tavern', ''),
(208, 0, 8, 8, 1, 0, 'Flame Tree Barbecue', 'flame-tree-barbeque'),
(209, 0, 13, 8, 1, 0, 'Fountain View', ''),
(210, 0, 28, 8, 1, 0, 'Funnel Cake', ''),
(211, 0, 13, 8, 1, 0, 'Garden Grill', 'garden-grill'),
(212, 0, 11, 8, 1, 0, 'Gaston''s Tavern', 'gastons-tavern'),
(213, 0, 28, 8, 1, 0, 'Gelati', ''),
(214, 0, 12, 8, 1, 0, 'Golden Oak Outpost', ''),
(215, 0, 2, 8, 1, 0, 'Harambe Fruit Market', ''),
(216, 0, 2, 8, 1, 0, 'Harambe Market', ''),
(217, 0, 26, 8, 1, 0, 'Hollywood Scoops', ''),
(218, 0, 8, 8, 1, 0, 'Isle of Java', ''),
(219, 0, 28, 8, 1, 0, 'Joy of Tea', ''),
(220, 0, 1, 8, 1, 0, 'Jungle Navigation Co. Ltd. Skipper Canteen', ''),
(221, 0, 28, 8, 1, 0, 'Kabuki Cafe', ''),
(222, 0, 28, 8, 1, 0, 'Katsura Grill', 'katsura-grill'),
(223, 0, 28, 8, 1, 0, 'Kringla Bakeri Og Kafe', ''),
(224, 0, 26, 8, 1, 0, 'KRNR The Rock Station', ''),
(225, 0, 2, 8, 1, 0, 'Kusafiri Coffee Shop & Bakery', ''),
(226, 0, 28, 8, 1, 0, 'L''Artisan des Glaces', ''),
(227, 0, 28, 8, 1, 0, 'La Cantina de San Angel', ''),
(228, 0, 28, 8, 1, 0, 'La Hacienda de San Angel', ''),
(229, 0, 28, 8, 1, 0, 'Les Halles Boulangerie-Patisserie', ''),
(230, 0, 28, 8, 1, 0, 'Les Vins des Chefs de France', ''),
(231, 0, 28, 8, 1, 0, 'Liberty Inn', ''),
(232, 0, 16, 8, 1, 0, 'Liberty Square Market', ''),
(233, 0, 28, 8, 1, 0, 'Lotus Blossom Cafe', ''),
(234, 0, 2, 8, 1, 0, 'Mahindi', ''),
(235, 0, 28, 8, 1, 0, 'Main Street Bakery', 'main-street-bakery'),
(236, 0, 28, 8, 1, 0, 'Margarita Kiosk', ''),
(237, 0, 9, 8, 1, 0, 'Min and Bill''s Dockside Diner', 'min-and-bills-dockside-diner'),
(238, 0, 9, 8, 1, 0, 'Oasis Canteen', ''),
(239, 0, 12, 8, 1, 0, 'Pecos Bill Tall Tale Inn and Cafe', 'pecos-bill-cafe'),
(240, 0, 9, 8, 1, 0, 'Peevy''s Polar Pipeline', 'peevys-polar-pipeline'),
(241, 0, 11, 8, 1, 0, 'Pinocchio Village Haus', 'pinocchio-village-haus'),
(242, 0, 8, 8, 1, 0, 'Pizzafari', 'pizzafari'),
(243, 0, 19, 8, 1, 0, 'Plaza Ice Cream Parlor', 'plaza-ice-cream-parlor'),
(244, 0, 28, 8, 1, 0, 'Popcorn in Canada', ''),
(245, 0, 11, 8, 1, 0, 'Prince Eric''s Village Market', 'prince-erics-village-market'),
(246, 0, 28, 8, 1, 0, 'Promenade Refreshments', 'promenade-refreshments'),
(247, 0, 28, 8, 1, 0, 'Refreshment Cool Post', 'refreshment-cool-post'),
(248, 0, 28, 8, 1, 0, 'Refreshment Port', 'refreshment-port'),
(249, 0, 7, 8, 1, 0, 'Restaurantosaurus', 'restaurantosaurus'),
(250, 0, 26, 8, 1, 0, 'Rosie''s All American Cafe', ''),
(251, 0, 5, 8, 1, 0, 'Royal Anandapur Tea Company', ''),
(252, 0, 16, 8, 1, 0, 'Sleepy Hollow', 'sleepy-hollow-inn'),
(253, 0, 28, 8, 1, 0, 'Sommerfest', ''),
(254, 0, 26, 8, 1, 0, 'Starring Rolls Cafe', ''),
(255, 0, 11, 8, 1, 0, 'Storybook Treats', 'storybook-treats'),
(256, 0, 13, 8, 1, 0, 'Sunshine Seasons', 'sunshine-seasons'),
(257, 0, 1, 8, 1, 0, 'Sunshine Tree Terrace', ''),
(258, 0, 2, 8, 1, 0, 'Tamu Tamu Refreshments', ''),
(259, 0, 28, 8, 1, 0, 'Tangierine Café', 'tangierine-cafe'),
(260, 0, 13, 8, 1, 0, 'Taste Track', ''),
(261, 0, 13, 8, 1, 0, 'Test Track Cool Wash', ''),
(262, 0, 11, 8, 1, 0, 'The Friar''s Nook', 'friars-nook'),
(263, 0, 13, 8, 1, 0, 'The Land Cart', ''),
(264, 0, 27, 8, 1, 0, 'The Lunching Pad', ''),
(265, 0, 8, 8, 1, 0, 'The Smiling Crocodile', ''),
(266, 0, 14, 8, 1, 0, 'The Trolley Car Cafe', 'trolley-car-cafe'),
(267, 0, 21, 8, 1, 0, 'The Writer''s Stop', ''),
(268, 0, 5, 8, 1, 0, 'Thirsty River Bar & Trek Snacks', ''),
(269, 0, 26, 8, 1, 0, 'Toluca Legs Turkey Co.', ''),
(270, 0, 27, 8, 1, 0, 'Tomorrowland Terrace Restaurant', 'tomorrowland-terrace'),
(271, 0, 1, 8, 1, 0, 'Tortuga Tavern', 'tortuga-tavern'),
(272, 0, 7, 8, 1, 0, 'Trilo-Bites', 'trilo-bites'),
(273, 0, 28, 8, 1, 0, 'UK Beer Cart', ''),
(274, 0, 5, 8, 1, 0, 'Warung Outpost', ''),
(275, 0, 12, 8, 1, 0, 'Westward Ho', ''),
(276, 0, 5, 8, 1, 0, 'Yak & Yeti Local Food Cafes', ''),
(277, 0, 5, 8, 1, 0, 'Yak & Yeti Quality Beverages', ''),
(278, 0, 9, 9, 1, 0, '50''s Prime Time Cafe', '50s-prime-time'),
(279, 0, 28, 9, 1, 0, 'Akershus Royal Banquet Hall', ''),
(280, 0, 28, 9, 1, 0, 'Biergarten Restaurant', 'biergarten'),
(281, 0, 28, 9, 1, 0, 'Chefs de France', 'les-chefs-de-france'),
(282, 0, 11, 9, 1, 0, 'Cinderella''s Royal Table', 'cinderellas-royal-table'),
(283, 0, 13, 9, 1, 0, 'Coral Reef Restaurant', 'coral-reef'),
(284, 0, 9, 9, 1, 0, 'Hollywood and Vine', 'hollywood-and-vine'),
(285, 0, 28, 9, 1, 0, 'La Cava del Tequila', ''),
(286, 0, 28, 9, 1, 0, 'Le Cellier Steakhouse', 'le-cellier'),
(287, 0, 16, 9, 1, 0, 'Liberty Tree Tavern', 'liberty-tree-tavern'),
(288, 0, 21, 9, 1, 0, 'Mama Melrose''s Ristorante Italiano', ''),
(289, 0, 28, 9, 1, 0, 'Monsieur Paul', ''),
(290, 0, 28, 9, 1, 0, 'Nine Dragons Restaurant', ''),
(291, 0, 18, 9, 1, 0, 'Rainforest Cafe at Animal Kingdom', ''),
(292, 0, 28, 9, 1, 0, 'Restaurant Marrakesh', 'marrakesh-restaurant'),
(293, 0, 28, 9, 1, 0, 'Rose and Crown Pub and Dining Room', 'rose-and-crown'),
(294, 0, 28, 9, 1, 0, 'San Angel Inn', ''),
(295, 0, 6, 9, 1, 0, 'Sci-Fi Dine-In Theater Restaurant', 'sci-fi-diner'),
(296, 0, 28, 9, 1, 0, 'Spice Road Table', 'spice-road-table'),
(297, 0, 28, 9, 1, 0, 'Teppan Edo', 'teppan-edo'),
(298, 0, 19, 9, 1, 0, 'The Crystal Palace', 'crystal-palace'),
(299, 0, 16, 9, 1, 0, 'The Diamond Horseshoe', 'diamond-horseshoe'),
(300, 0, 14, 9, 1, 0, 'The Hollywood Brown Derby', 'hollywood-brown-derby'),
(301, 0, 14, 9, 1, 0, 'The Hollywood Brown Derby Lounge', ''),
(302, 0, 19, 9, 1, 0, 'The Plaza Restaurant', 'plaza-restaurant'),
(303, 0, 28, 9, 1, 0, 'Tokyo Dining', ''),
(304, 0, 19, 9, 1, 0, 'Tony''s Town Square Restaurant', 'tonys-town-square'),
(305, 0, 9, 9, 1, 0, 'Tune-In Lounge', ''),
(306, 0, 2, 9, 1, 0, 'Tusker House Restaurant', ''),
(307, 0, 28, 9, 1, 0, 'Tutto Gusto Wine Cellar', ''),
(308, 0, 28, 9, 1, 0, 'Tutto Italia Ristorante', ''),
(309, 0, 28, 9, 1, 0, 'Via Napoli Ristorante e Pizzeria', ''),
(310, 0, 5, 9, 1, 0, 'Yak and Yeti Restaurant', ''),
(311, 0, 28, 9, 1, 0, 'Yorkshire County Fish Shop', 'yorkshire-county-fish-shop'),
(312, 0, 15, 3, 5, 1, 'Star Wars Weekends', ''),
(313, 0, 25, 8, 5, 0, 'High Octane Refreshments', ''),
(314, 0, 21, 8, 5, 0, 'Pizza Planet Arcade', ''),
(315, 0, 25, 8, 5, 0, 'Studio Catering Co.', ''),
(316, 0, 0, 4, 1, 0, 'Aladdin', 'aladdin-street-rat'),
(317, 0, 0, 4, 1, 0, 'Alice', 'alice'),
(318, 0, 0, 4, 1, 0, 'Anastasia', 'anastasia'),
(319, 0, 0, 4, 1, 0, 'Anna', 'anna'),
(320, 0, 0, 4, 1, 0, 'Ariel', 'ariel-mermaid'),
(321, 0, 0, 4, 1, 0, 'Baloo', ''),
(322, 0, 0, 4, 1, 0, 'Baymax', ''),
(323, 0, 0, 4, 1, 0, 'Beast', 'beast'),
(324, 0, 0, 4, 1, 0, 'Belle', 'belle-ballgown'),
(325, 0, 0, 4, 1, 0, 'Big Al', 'big-al'),
(326, 0, 0, 4, 1, 0, 'Brer Bear', ''),
(327, 0, 0, 4, 1, 0, 'Brer Fox', 'brer-fox'),
(328, 0, 0, 4, 1, 0, 'Brer Rabbit', ''),
(329, 0, 0, 4, 1, 0, 'Buzz Lightyear', 'buzz-lightyear'),
(330, 0, 0, 4, 1, 0, 'Chewbacca', ''),
(331, 0, 0, 4, 1, 0, 'Chip', 'chip-swimsuit'),
(332, 0, 0, 4, 1, 0, 'Cinderella', 'cinderella'),
(333, 0, 0, 4, 1, 0, 'Citizens of Hollywood - 1940’s', ''),
(334, 0, 0, 4, 1, 0, 'Citizens of Hollywood – Hollywood Public Works', ''),
(335, 0, 0, 4, 1, 0, 'Citizens of Hollywood – Modern Film Crew', ''),
(336, 0, 0, 4, 1, 0, 'Citizens of Main Street', ''),
(337, 0, 0, 4, 1, 0, 'Clarabelle Cow', ''),
(338, 0, 0, 4, 1, 0, 'Daisy Duck', 'daisy'),
(339, 0, 0, 4, 1, 0, 'Dale', ''),
(340, 0, 0, 4, 1, 0, 'Doc McStuffins', ''),
(341, 0, 0, 4, 1, 0, 'Donald Duck', 'donald-holiday'),
(342, 0, 0, 4, 1, 0, 'Dopey', ''),
(343, 0, 0, 4, 1, 0, 'Drizella', 'drizella'),
(344, 0, 0, 4, 1, 0, 'Dug', ''),
(345, 0, 0, 4, 1, 0, 'Eeyore', ''),
(346, 0, 0, 4, 1, 0, 'Elsa', 'elsa'),
(347, 0, 0, 4, 1, 0, 'Evil Queen', ''),
(348, 0, 0, 4, 1, 0, 'Fairy Godmother', 'fairy-godmother'),
(349, 0, 0, 4, 1, 0, 'Flik', ''),
(350, 0, 0, 4, 1, 0, 'Frozone', 'frozone'),
(351, 0, 0, 4, 1, 0, 'Gaston', ''),
(352, 0, 0, 4, 1, 0, 'Gepetto', 'gepetto'),
(353, 0, 0, 4, 1, 0, 'Gideon', ''),
(354, 0, 0, 4, 1, 0, 'Goofy', 'goofy-chef'),
(355, 0, 0, 4, 1, 0, 'Green Army Man', 'green-army-man'),
(356, 0, 0, 4, 1, 0, 'Handy Manny', 'handy-manny'),
(357, 0, 0, 4, 1, 0, 'Horace Horsecollar', ''),
(358, 0, 0, 4, 1, 0, 'Indiana Jones', ''),
(359, 0, 0, 4, 1, 0, 'J. Worthington Foulfellow', ''),
(360, 0, 0, 4, 1, 0, 'Jake', ''),
(361, 0, 0, 4, 1, 0, 'Jasmine', 'jasmine'),
(362, 0, 0, 4, 1, 0, 'Jawas', ''),
(363, 0, 0, 4, 1, 0, 'Jessie', 'jessie'),
(364, 0, 0, 4, 1, 0, 'King Louie', ''),
(365, 0, 0, 4, 1, 0, 'Kylo Ren', ''),
(366, 0, 0, 4, 1, 0, 'Lady Tremaine', 'lady-tremaine'),
(367, 0, 0, 4, 1, 0, 'Lilo', 'lilo'),
(368, 0, 0, 4, 1, 0, 'Mad Hatter', 'mad-hatter'),
(369, 0, 0, 4, 1, 0, 'Marie', ''),
(370, 0, 0, 4, 1, 0, 'Marion', ''),
(371, 0, 0, 4, 1, 0, 'Mary Poppins', 'mary-poppins-white'),
(372, 0, 0, 4, 1, 0, 'Meeko', ''),
(373, 0, 0, 4, 1, 0, 'Merida', 'merida'),
(374, 0, 0, 4, 1, 0, 'Mickey Mouse', 'mickey-luau'),
(375, 0, 0, 4, 1, 0, 'Mike Wazowski', 'mike-wazowski'),
(376, 0, 0, 4, 1, 0, 'Minnie Mouse', 'minnie'),
(377, 0, 0, 4, 1, 0, 'Mr. Incredible', 'mr-incredible'),
(378, 0, 0, 4, 1, 0, 'Mr. Smee', 'smee'),
(379, 0, 0, 4, 1, 0, 'Mrs. Incredible', 'mrs-incredible'),
(380, 0, 0, 4, 1, 0, 'Mulan', 'mulan'),
(381, 0, 0, 4, 1, 0, 'Perla', ''),
(382, 0, 0, 4, 1, 0, 'Peter Pan', 'peter-pan'),
(383, 0, 0, 4, 1, 0, 'Piglet', ''),
(384, 0, 0, 4, 1, 0, 'Pinocchio', 'pinocchio'),
(385, 0, 0, 4, 1, 0, 'Pluto', ''),
(386, 0, 0, 4, 1, 0, 'Pocahontas', ''),
(387, 0, 0, 4, 1, 0, 'Prince Charming', ''),
(388, 0, 0, 4, 1, 0, 'Prince Naveen', 'prince-naveen'),
(389, 0, 0, 4, 1, 0, 'Princess Aurora/Sleeping Beauty', 'aurora'),
(390, 0, 0, 4, 1, 0, 'Princess Tiana', 'tiana'),
(391, 0, 0, 4, 1, 0, 'Rafiki', 'rafiki'),
(392, 0, 0, 4, 1, 0, 'Rapunzel', 'rapunzel'),
(393, 0, 0, 4, 1, 0, 'Robin Hood', ''),
(394, 0, 0, 4, 1, 0, 'Rosetta', ''),
(395, 0, 0, 4, 1, 0, 'Russell', ''),
(396, 0, 0, 4, 1, 0, 'Shaker', ''),
(397, 0, 0, 4, 1, 0, 'Snow White', 'snow-white'),
(398, 0, 0, 4, 1, 0, 'Sofia the First', ''),
(399, 0, 0, 4, 1, 0, 'Stitch', 'stitch'),
(400, 0, 0, 4, 1, 0, 'Stormtroopers', ''),
(401, 0, 0, 4, 1, 0, 'Sulley', 'sulley'),
(402, 0, 0, 4, 1, 0, 'Suzy', ''),
(403, 0, 0, 4, 1, 0, 'Tarzan', ''),
(404, 0, 0, 4, 1, 0, 'Tigger', 'tigger'),
(405, 0, 0, 4, 1, 0, 'Tinker Bell', 'tinkerbell'),
(406, 0, 0, 4, 1, 0, 'Wendell', ''),
(407, 0, 0, 4, 1, 0, 'Wendy', 'wendy'),
(408, 0, 0, 4, 1, 0, 'Winnie the Pooh', 'winnie-the-pooh'),
(409, 0, 0, 4, 1, 0, 'Woody', 'woody'),
(410, 0, 0, 4, 2, 0, 'Aladdin - Prince Ali', 'aladdin-prince'),
(411, 0, 0, 4, 2, 0, 'Aladdin - Street Rat', ''),
(412, 0, 0, 4, 2, 0, 'Ariel - Dress', 'ariel-dress'),
(413, 0, 0, 4, 2, 0, 'Ariel - Mermaid', 'ariel-mermaid'),
(414, 0, 0, 4, 2, 0, 'Belle – Ballroom Dress', 'belle-ballgown'),
(415, 0, 0, 4, 2, 0, 'Belle – Village Dress', 'belle-village'),
(416, 0, 0, 4, 2, 0, 'Chip - BBQ Chef', ''),
(417, 0, 0, 4, 2, 0, 'Chip - China', ''),
(418, 0, 0, 4, 2, 0, 'Chip - Cowboy', ''),
(419, 0, 0, 4, 2, 0, 'Chip - Swimsuit', 'chip-swimsuit'),
(420, 0, 0, 4, 2, 0, 'Daisy Duck - Classic Pink', ''),
(421, 0, 0, 4, 2, 0, 'Daisy Duck - Cowgirl', ''),
(422, 0, 0, 4, 2, 1, 'Daisy Duck - Holiday', ''),
(423, 0, 0, 4, 2, 0, 'Daisy Duck - Hollywood Green', ''),
(424, 0, 0, 4, 2, 0, 'Daisy Duck - Safari', ''),
(425, 0, 0, 4, 2, 0, 'Daisy Duck - Sideshow', ''),
(426, 0, 0, 4, 2, 0, 'Dale - BBQ Chef', ''),
(427, 0, 0, 4, 2, 0, 'Dale - China', ''),
(428, 0, 0, 4, 2, 0, 'Donald Duck - Beach Club', ''),
(429, 0, 0, 4, 2, 0, 'Donald Duck - Chef', 'donald-chef'),
(430, 0, 0, 4, 2, 0, 'Donald Duck - Cowboy', ''),
(431, 0, 0, 4, 2, 0, 'Donald Duck - Dinoland USA', ''),
(432, 0, 0, 4, 2, 0, 'Donald Duck - Frontier', ''),
(433, 0, 0, 4, 2, 1, 'Donald Duck - Holiday', 'donald-holiday'),
(434, 0, 0, 4, 2, 0, 'Donald Duck - Kingdom Hearts', ''),
(435, 0, 0, 4, 2, 0, 'Donald Duck - Mexican', ''),
(436, 0, 0, 4, 2, 0, 'Donald Duck - Safari', ''),
(437, 0, 0, 4, 2, 0, 'Donald Duck - Sideshow', ''),
(438, 0, 0, 4, 2, 0, 'Goofy - Classic Orange', ''),
(439, 0, 0, 4, 2, 0, 'Goofy - Beach Club', ''),
(440, 0, 0, 4, 2, 0, 'Goofy - Chef', 'goofy-chef'),
(441, 0, 0, 4, 2, 0, 'Goofy - Cowboy', ''),
(442, 0, 0, 4, 2, 0, 'Goofy - Dinoland USA', ''),
(443, 0, 0, 4, 2, 0, 'Goofy - Hollywood', ''),
(444, 0, 0, 4, 2, 0, 'Goofy - Life Vest', 'goofy-lifevest'),
(445, 0, 0, 4, 2, 0, 'Goofy - Pirate', 'goofy-pirate'),
(446, 0, 0, 4, 2, 0, 'Goofy - Safari', ''),
(447, 0, 0, 4, 2, 1, 'Goofy - Santa Claus', 'goofy-santa'),
(448, 0, 0, 4, 2, 0, 'Goofy - Sideshow', ''),
(449, 0, 0, 4, 2, 0, 'Jack Skellington - Classic', ''),
(450, 0, 0, 4, 2, 1, 'Jack Skellington – Sandy Claws', ''),
(451, 0, 0, 4, 2, 0, 'Jasmine - Dress', ''),
(452, 0, 0, 4, 2, 0, 'Jasmine - Two Piece', 'jasmine'),
(453, 0, 0, 4, 2, 0, 'Mary Poppins - Red Dress', ''),
(454, 0, 0, 4, 2, 0, 'Mary Poppins - White Dress', 'mary-poppins-white'),
(455, 0, 0, 4, 2, 0, 'Mickey Mouse - Classic Black & Red', ''),
(456, 0, 0, 4, 2, 0, 'Mickey Mouse - Backyard BBQ', ''),
(457, 0, 0, 4, 2, 0, 'Mickey Mouse - Chef Mickey', 'mickey-chef'),
(458, 0, 0, 4, 2, 0, 'Mickey Mouse - Cowboy', ''),
(459, 0, 0, 4, 2, 0, 'Mickey Mouse - Garden Grill', ''),
(460, 0, 0, 4, 2, 1, 'Mickey Mouse - Halloween', ''),
(461, 0, 0, 4, 2, 1, 'Mickey Mouse - Holiday', 'mickey-holiday'),
(462, 0, 0, 4, 2, 0, 'Mickey Mouse - ''Ohana', 'mickey-luau'),
(463, 0, 0, 4, 2, 0, 'Mickey Mouse - Safari', ''),
(464, 0, 0, 4, 2, 0, 'Mickey Mouse - Sorcerer', 'mickey-sorcerer'),
(465, 0, 0, 4, 2, 0, 'Mickey Mouse - Talking Mickey', 'mickey-talking'),
(466, 0, 0, 4, 2, 0, 'Mickey Mouse - Town Square', ''),
(467, 0, 0, 4, 2, 0, 'Minnie Mouse - Backyard BBQ', ''),
(468, 0, 0, 4, 2, 0, 'Minnie Mouse - Beach Club', ''),
(469, 0, 0, 4, 2, 0, 'Minnie Mouse - Classic Polka Dots', ''),
(470, 0, 0, 4, 2, 0, 'Minnie Mouse - Cowgirl', ''),
(471, 0, 0, 4, 2, 0, 'Minnie Mouse - Dinoland USA', ''),
(472, 0, 0, 4, 2, 0, 'Minnie Mouse - Halloween', ''),
(473, 0, 0, 4, 2, 1, 'Minnie Mouse - Holiday', 'minnie-holiday'),
(474, 0, 0, 4, 2, 0, 'Minnie Mouse - Pink', ''),
(475, 0, 0, 4, 2, 0, 'Minnie Mouse - Pink/Yellow', ''),
(476, 0, 0, 4, 2, 0, 'Minnie Mouse - Safari', ''),
(477, 0, 0, 4, 2, 0, 'Minnie Mouse - Sideshow', ''),
(478, 0, 0, 4, 2, 0, 'Peter Pan - Classic Green', 'peter-pan'),
(479, 0, 0, 4, 2, 0, 'Peter Pan - Holiday', ''),
(480, 0, 0, 4, 2, 0, 'Pluto - Chef', 'pluto-chef'),
(481, 0, 0, 4, 2, 0, 'Pluto - Dinoland USA', ''),
(482, 0, 0, 4, 2, 0, 'Pluto - ''Ohana', 'pluto-luau'),
(483, 0, 0, 4, 2, 0, 'Pluto - Safari', ''),
(484, 0, 0, 4, 2, 0, 'Tigger - Classic', ''),
(485, 0, 0, 4, 2, 0, 'Tigger - Halloween', ''),
(486, 0, 0, 4, 2, 0, 'Wendy - Classic Blue', ''),
(487, 0, 0, 4, 2, 0, 'Wendy - Holiday', ''),
(488, 0, 0, 1, 3, 0, 'Frozen Ever After', ''),
(489, 0, 0, 2, 3, 0, 'Nomad Lounge', ''),
(490, 0, 0, 2, 3, 0, 'Tiffins', ''),
(491, 0, 0, 3, 3, 0, 'Discovery Island Carnivale', ''),
(492, 0, 0, 3, 3, 0, 'Harambe Wildlife Parti', ''),
(493, 0, 0, 3, 3, 0, 'Mickey''s Royal Friendship Faire', ''),
(494, 0, 0, 3, 3, 0, 'Rivers of Light', ''),
(495, 0, 0, 3, 3, 0, 'Star Wars: A Galactic Spectacular', ''),
(496, 0, 0, 3, 3, 0, 'Star Wars: A Galaxy Far, Far Away', ''),
(497, 0, 0, 4, 4, 0, 'Abby Mallard', ''),
(498, 0, 0, 4, 4, 1, 'Abu', ''),
(499, 0, 0, 4, 4, 0, 'Agent Oso', ''),
(500, 0, 0, 4, 4, 0, 'Annie', ''),
(501, 0, 0, 4, 4, 0, 'Bernard', ''),
(502, 0, 0, 4, 4, 0, 'Bert', ''),
(503, 0, 0, 4, 4, 0, 'Bianca', ''),
(504, 0, 0, 4, 4, 0, 'Big Bad Wolf', ''),
(505, 0, 0, 4, 4, 0, 'Bolt', ''),
(506, 0, 0, 4, 4, 1, 'Boo', ''),
(507, 0, 0, 4, 4, 0, 'Bowler Hat Guy', ''),
(508, 0, 0, 4, 4, 0, 'Bullseye', ''),
(509, 0, 0, 4, 4, 0, 'Cantina Band', ''),
(510, 0, 0, 4, 4, 0, 'Captain America', 'captain-america'),
(511, 0, 0, 4, 4, 0, 'Captain Hook', 'captain-hook'),
(512, 0, 0, 4, 4, 0, 'Carl Fredrickson', ''),
(513, 0, 0, 4, 4, 0, 'Chicken Little', ''),
(514, 0, 0, 4, 4, 0, 'Clara Cluck', ''),
(515, 0, 0, 4, 4, 0, 'Clarice Chipmunk', ''),
(516, 0, 0, 4, 4, 0, 'Clopin', ''),
(517, 0, 0, 4, 4, 0, 'Commander Cody', ''),
(518, 0, 0, 4, 4, 0, 'Coral Reef', ''),
(519, 0, 0, 4, 4, 1, 'Cruella De Vil', ''),
(520, 0, 0, 4, 4, 0, 'Darby', ''),
(521, 0, 0, 4, 4, 0, 'Darkwing Duck', ''),
(522, 0, 0, 4, 4, 0, 'Dumbo', ''),
(523, 0, 0, 4, 4, 0, 'Emile', ''),
(524, 0, 0, 4, 4, 0, 'Esmerelda', ''),
(525, 0, 0, 4, 4, 0, 'Fawn', ''),
(526, 0, 0, 4, 4, 0, 'Fiddler Pig', ''),
(527, 0, 0, 4, 4, 0, 'Fifer Pig', ''),
(528, 0, 0, 4, 4, 1, 'Flynn', ''),
(529, 0, 0, 4, 4, 0, 'Friar Tuck', ''),
(530, 0, 0, 4, 4, 1, 'Genie', ''),
(531, 0, 0, 4, 4, 1, 'George Sanderson', ''),
(532, 0, 0, 4, 4, 0, 'Goliath', ''),
(533, 0, 0, 4, 4, 0, 'Governor Ratcliffe', ''),
(534, 0, 0, 4, 4, 0, 'Gus', ''),
(535, 0, 0, 4, 4, 0, 'Gypsy Moth', ''),
(536, 0, 0, 4, 4, 0, 'Hades', ''),
(537, 0, 0, 4, 4, 0, 'Herbie the Lovebug', ''),
(538, 0, 0, 4, 4, 0, 'Hercules', ''),
(539, 0, 0, 4, 4, 0, 'Hiro', ''),
(540, 0, 0, 4, 4, 0, 'Irridessa', ''),
(541, 0, 0, 4, 4, 1, 'Jack Skellington', ''),
(542, 0, 0, 4, 4, 1, 'Jack Sparrow', 'jack-sparrow'),
(543, 0, 0, 4, 4, 1, 'Jafar', 'jafar'),
(544, 0, 0, 4, 4, 1, 'Jane Porter', ''),
(545, 0, 0, 4, 4, 0, 'Jaq', ''),
(546, 0, 0, 4, 4, 0, 'Jiminy Cricket', ''),
(547, 0, 0, 4, 4, 0, 'John Smith', ''),
(548, 0, 0, 4, 4, 0, 'JoJo', 'jojo'),
(549, 0, 0, 4, 4, 0, 'Jose Cariaoca', ''),
(550, 0, 0, 4, 4, 0, 'June', 'june'),
(551, 0, 0, 4, 4, 0, 'Kenai', ''),
(552, 0, 0, 4, 4, 0, 'Kim Possible', ''),
(553, 0, 0, 4, 4, 0, 'Koda', ''),
(554, 0, 0, 4, 4, 0, 'Launchpad McQuack', ''),
(555, 0, 0, 4, 4, 0, 'Leo', 'leo'),
(556, 0, 0, 4, 4, 0, 'Lewis Robinson', ''),
(557, 0, 0, 4, 4, 0, 'Li Shang', ''),
(558, 0, 0, 4, 4, 0, 'Liverlips', ''),
(559, 0, 0, 4, 4, 1, 'Lotso', 'lotso'),
(560, 0, 0, 4, 4, 0, 'Louis the Alligator', ''),
(561, 0, 0, 4, 4, 0, 'Lucky the Dinosaur', ''),
(562, 0, 0, 4, 4, 0, 'Ludwig von Drake', ''),
(563, 0, 0, 4, 4, 0, 'Lumiere', ''),
(564, 0, 0, 4, 4, 1, 'Madame Carlotta', ''),
(565, 0, 0, 4, 4, 1, 'Madame Rinata', ''),
(566, 0, 0, 4, 4, 0, 'Maleficent', ''),
(567, 0, 0, 4, 4, 0, 'Maximillian Goof', ''),
(568, 0, 0, 4, 4, 0, 'Megara', ''),
(569, 0, 0, 4, 4, 0, 'Miss Bunny', ''),
(570, 0, 0, 4, 4, 0, 'Mittens', ''),
(571, 0, 0, 4, 4, 0, 'Mowgli', ''),
(572, 0, 0, 4, 4, 0, 'Mr. Potatohead', ''),
(573, 0, 0, 4, 4, 0, 'Mr. Walrus', ''),
(574, 0, 0, 4, 4, 0, 'Muppet Mobile Lab', ''),
(575, 0, 0, 4, 4, 0, 'Mushu', ''),
(576, 0, 0, 4, 4, 1, 'Needleman', ''),
(577, 0, 0, 4, 4, 0, 'Oogie Boogie', ''),
(578, 0, 0, 4, 4, 0, 'Panchito Pistoles', ''),
(579, 0, 0, 4, 4, 0, 'Penguins', ''),
(580, 0, 0, 4, 4, 0, 'Periwinkle', ''),
(581, 0, 0, 4, 4, 0, 'Ping', ''),
(582, 0, 0, 4, 4, 0, 'Practical Pig', ''),
(583, 0, 0, 4, 4, 0, 'Prince Caspian', ''),
(584, 0, 0, 4, 4, 0, 'Prince Eric', ''),
(585, 0, 0, 4, 4, 0, 'Prince John', ''),
(586, 0, 0, 4, 4, 1, 'Prince Phillip', ''),
(587, 0, 0, 4, 4, 0, 'Princess Atta', ''),
(588, 0, 0, 4, 4, 0, 'Quasimodo', ''),
(589, 0, 0, 4, 4, 0, 'Queen Elinor', ''),
(590, 0, 0, 4, 4, 1, 'Queen of Hearts', 'queen-of-hearts'),
(591, 0, 0, 4, 4, 0, 'Quincy', ''),
(592, 0, 0, 4, 4, 0, 'Rabbit', ''),
(593, 0, 0, 4, 4, 0, 'Remy', ''),
(594, 0, 0, 4, 4, 0, 'Roger Rabbit', ''),
(595, 0, 0, 4, 4, 0, 'Ron Stoppable', ''),
(596, 0, 0, 4, 4, 0, 'Roxie', ''),
(597, 0, 0, 4, 4, 1, 'Sally', ''),
(598, 0, 0, 4, 4, 1, 'Santa Claus', ''),
(599, 0, 0, 4, 4, 1, 'Scrooge McDuck', ''),
(600, 0, 0, 4, 4, 0, 'Sebastian', ''),
(601, 0, 0, 4, 4, 1, 'Seven Dwarfs', 'seven-dwarfs'),
(602, 0, 0, 4, 4, 0, 'Shan Yu', ''),
(603, 0, 0, 4, 4, 0, 'Sheriff of Nottingham', ''),
(604, 0, 0, 4, 4, 0, 'Silvermist', ''),
(605, 0, 0, 4, 4, 0, 'Slim', ''),
(606, 0, 0, 4, 4, 0, 'Smitty', ''),
(607, 0, 0, 4, 4, 0, 'Terence', ''),
(608, 0, 0, 4, 4, 1, 'Terk', ''),
(609, 0, 0, 4, 4, 1, 'The Prince (Snow White)', ''),
(610, 0, 0, 4, 4, 1, 'The Witch (Snow White)', ''),
(611, 0, 0, 4, 4, 0, 'Thumper', ''),
(612, 0, 0, 4, 4, 0, 'Timon', ''),
(613, 0, 0, 4, 4, 0, 'TRex', ''),
(614, 0, 0, 4, 4, 0, 'Tweedles', ''),
(615, 0, 0, 4, 4, 0, 'Vidia', ''),
(616, 0, 0, 4, 4, 1, 'White Rabbit', ''),
(617, 0, 0, 4, 4, 0, 'Wilbur Robinson', ''),
(618, 0, 0, 1, 5, 0, 'Animation Academy', ''),
(619, 0, 0, 1, 5, 0, 'Maelstrom', ''),
(620, 0, 0, 1, 5, 0, 'The Magic of Disney Animation', ''),
(621, 0, 0, 3, 5, 0, 'Mulch, Sweat, & Shears', ''),
(622, 0, 0, 4, 5, 0, 'Ahsoka Tano', ''),
(623, 0, 0, 4, 5, 0, 'Anakin Skywalker', ''),
(624, 0, 0, 4, 5, 0, 'Angelica', ''),
(625, 0, 0, 4, 5, 0, 'Asajj Ventress', ''),
(626, 0, 0, 4, 5, 0, 'Aurra Sing', ''),
(627, 0, 0, 4, 5, 0, 'Blue Jungle Fury Power Ranger', ''),
(628, 0, 0, 4, 5, 0, 'Bo Peep', ''),
(629, 0, 0, 4, 5, 0, 'Boba Fett', ''),
(630, 0, 0, 4, 5, 0, 'C-3PO', ''),
(631, 0, 0, 4, 5, 0, 'Captain Rex', ''),
(632, 0, 0, 4, 5, 0, 'Chip - Ewok', ''),
(633, 0, 0, 4, 5, 0, 'Clone Troopers', ''),
(634, 0, 0, 4, 5, 0, 'Dale - Ewok', ''),
(635, 0, 0, 4, 5, 0, 'Darth Maul', ''),
(636, 0, 0, 4, 5, 0, 'Darth Vader', ''),
(637, 0, 0, 4, 5, 0, 'Donald Duck - Stormtrooper', ''),
(638, 0, 0, 4, 5, 0, 'Dr. Facilier', ''),
(639, 0, 0, 4, 5, 0, 'Duffy', ''),
(640, 0, 0, 4, 5, 0, 'Ewok - Logray', ''),
(641, 0, 0, 4, 5, 0, 'Ewok - Paploo', ''),
(642, 0, 0, 4, 5, 0, 'Ferb', 'ferb'),
(643, 0, 0, 4, 5, 0, 'Frollo', 'frollo'),
(644, 0, 0, 4, 5, 0, 'Gamorrean Guard', ''),
(645, 0, 0, 4, 5, 0, 'Giselle', ''),
(646, 0, 0, 4, 5, 0, 'Goofy - Darth Goofy', ''),
(647, 0, 0, 4, 5, 0, 'Green R.P.M. Power Ranger', ''),
(648, 0, 0, 4, 5, 0, 'Green Samurai Power Ranger', ''),
(649, 0, 0, 4, 5, 0, 'Jango Fett', ''),
(650, 0, 0, 4, 5, 0, 'Kanga', ''),
(651, 0, 0, 4, 5, 0, 'Kermit', ''),
(652, 0, 0, 4, 5, 0, 'Kida', ''),
(653, 0, 0, 4, 5, 0, 'Kit Fisto', ''),
(654, 0, 0, 4, 5, 0, 'Lightning McQueen', ''),
(655, 0, 0, 4, 5, 0, 'Little John', ''),
(656, 0, 0, 4, 5, 0, 'Luke Skywalker', ''),
(657, 0, 0, 4, 5, 0, 'Lunar Wolf Blue Power Ranger', ''),
(658, 0, 0, 4, 5, 0, 'Mace Windu', ''),
(659, 0, 0, 4, 5, 0, 'Mickey Mouse – Jedi', ''),
(660, 0, 0, 4, 5, 0, 'Minnie Mouse – Leia', ''),
(661, 0, 0, 4, 5, 0, 'Miss Piggy', ''),
(662, 0, 0, 4, 5, 0, 'Nemo', ''),
(663, 0, 0, 4, 5, 0, 'Padme', ''),
(664, 0, 0, 4, 5, 0, 'Pain & Panic', ''),
(665, 0, 0, 4, 5, 0, 'Phil', ''),
(666, 0, 0, 4, 5, 0, 'Phineas', 'phineas'),
(667, 0, 0, 4, 5, 0, 'Phoebus', ''),
(668, 0, 0, 4, 5, 0, 'Pink Mystic Force Power Ranger', ''),
(669, 0, 0, 4, 5, 0, 'Princess Leia', ''),
(670, 0, 0, 4, 5, 0, 'Queen Amidala', ''),
(671, 0, 0, 4, 5, 0, 'R2-D2', ''),
(672, 0, 0, 4, 5, 0, 'Rancor', ''),
(673, 0, 0, 4, 5, 0, 'Red S.P.D. Power Ranger', ''),
(674, 0, 0, 4, 5, 0, 'Rhino', ''),
(675, 0, 0, 4, 5, 0, 'Shaak Ti', ''),
(676, 0, 0, 4, 5, 0, 'Stanley', ''),
(677, 0, 0, 4, 5, 0, 'Stromboli', ''),
(678, 0, 0, 4, 5, 0, 'Three Little Pigs', ''),
(679, 0, 0, 4, 5, 0, 'Three Musketeers', ''),
(680, 0, 0, 4, 5, 0, 'Tow Mater', ''),
(681, 0, 0, 4, 5, 0, 'Tusken Raiders', ''),
(682, 0, 0, 4, 5, 0, 'Wall-E', ''),
(683, 0, 0, 4, 5, 0, 'White Dino Thunder Power Ranger', ''),
(684, 0, 0, 4, 5, 0, 'Yellow Operation Overdrive Power Ranger', ''),
(685, 0, 0, 4, 5, 0, 'Zam Wessel', ''),
(686, 0, 0, 11, 1, 0, 'Bay Lake Tower at Disney''s Contemporary Resort', 'bay-lake-tower'),
(687, 0, 0, 13, 1, 0, 'Disney''s All-Star Movies Resort', ''),
(688, 0, 0, 13, 1, 0, 'Disney''s All-Star Music Resort', ''),
(689, 0, 0, 13, 1, 0, 'Disney''s All-Star Sports Resort', ''),
(690, 0, 0, 10, 1, 0, 'Disney''s Animal Kingdom Lodge', 'disneys-animal-kingdom-lodge'),
(691, 0, 0, 11, 1, 0, 'Disney''s Animal Kingdom Villas - Jambo House', ''),
(692, 0, 0, 11, 1, 0, 'Disney''s Animal Kingdom Villas - Kidani Village', ''),
(693, 0, 0, 13, 1, 0, 'Disney''s Art of Animation Resort', 'disneys-art-of-animation'),
(694, 0, 0, 10, 1, 0, 'Disney''s Beach Club Resort', 'disneys-beach-club-resort'),
(695, 0, 0, 11, 1, 0, 'Disney''s Beach Club Villas', 'disneys-beach-club-resort'),
(696, 0, 0, 10, 1, 0, 'Disney''s Boardwalk Inn', ''),
(697, 0, 0, 11, 1, 0, 'Disney''s BoardWalk Villas', ''),
(698, 0, 0, 12, 1, 0, 'Disney''s Caribbean Beach Resort', ''),
(699, 0, 0, 10, 1, 0, 'Disney''s Contemporary Resort', 'disneys-contemporary-resort'),
(700, 0, 0, 12, 1, 0, 'Disney''s Coronado Springs Resort', 'disneys-coronado-springs'),
(701, 0, 0, 10, 1, 0, 'Disney''s Grand Floridian Resort & Spa', 'disneys-grand-floridian'),
(702, 0, 0, 11, 1, 0, 'Disney''s Old Key West Resort', ''),
(703, 0, 0, 10, 1, 0, 'Disney''s Polynesian Village Resort', 'disneys-polynesian-village'),
(704, 0, 0, 11, 1, 0, 'Disney''s Polynesian Villas & Bungalows', 'disneys-polynesian-villas-and-bungalows'),
(705, 0, 0, 13, 1, 0, 'Disney''s Pop Century Resort', ''),
(706, 0, 0, 12, 1, 0, 'Disney''s Port Orleans Resort - French Quarter', ''),
(707, 0, 0, 12, 1, 0, 'Disney''s Port Orleans Resort - Riverside', 'disneys-port-orleans-riverside'),
(708, 0, 0, 11, 1, 0, 'Disney''s Saratoga Springs Resort & Spa', ''),
(709, 0, 0, 10, 1, 0, 'Disney''s Wilderness Lodge', ''),
(710, 0, 0, 10, 1, 0, 'Disney''s Yacht Club Resort', 'disneys-yacht-club'),
(711, 0, 0, 11, 1, 0, 'The Cabins at Disney''s Fort Wilderness Resort', ''),
(712, 0, 0, 12, 1, 0, 'The Campsites at Disney''s Fort Wilderness Resort', ''),
(713, 0, 0, 11, 1, 0, 'The Villas at Disney''s Grand Floridian Resort & Spa', ''),
(714, 0, 0, 11, 1, 0, 'The Villas at Disney''s Wilderness Lodge', ''),
(715, 0, 0, 11, 1, 0, 'Treehouse Villas', ''),
(716, 0, 0, 10, 1, 0, 'Walt Disney World Dolphin Hotel', ''),
(717, 0, 0, 10, 1, 0, 'Walt Disney World Swan Hotel', ''),
(718, 686, 0, 2, 1, 0, 'Cove Bar', ''),
(719, 687, 0, 2, 1, 0, 'Silver Screen Spirits Pool Bar', ''),
(720, 687, 0, 2, 1, 0, 'World Premiere Food Court', ''),
(721, 688, 0, 2, 1, 0, 'Intermission Food Court', ''),
(722, 688, 0, 2, 1, 0, 'Singing Spirits Pool Bar', ''),
(723, 689, 0, 2, 1, 0, 'End Zone Food Court', ''),
(724, 689, 0, 2, 1, 0, 'Grandstand Spirits', ''),
(725, 690, 0, 2, 1, 0, 'Boma - Flavors of Africa', ''),
(726, 690, 0, 2, 1, 0, 'Cape Town Lounge and Wine Bar', ''),
(727, 690, 0, 2, 1, 0, 'Jiko - The Cooking Place', ''),
(728, 690, 0, 6, 1, 0, 'Jiko Wine Tasting', ''),
(729, 690, 0, 2, 1, 0, 'The Mara', ''),
(730, 690, 0, 2, 1, 0, 'Uzima Springs Pool Bar', ''),
(731, 690, 0, 2, 1, 0, 'Victoria Falls Lounge', ''),
(732, 690, 0, 2, 1, 0, 'Wanyama Safari', ''),
(733, 692, 0, 2, 1, 0, 'Maji Pool Bar', ''),
(734, 692, 0, 2, 1, 0, 'Sanaa', ''),
(735, 693, 0, 2, 1, 0, 'The Drop Off Pool Bar', ''),
(736, 693, 0, 2, 1, 0, 'Landscape of Flavors', ''),
(737, 694, 0, 2, 1, 0, 'Beach Club Marketplace', ''),
(738, 694, 0, 2, 1, 0, 'Beaches & Cream Soda Shop', ''),
(739, 694, 0, 2, 1, 0, 'Cape May Cafe', 'cape-may-cafe'),
(740, 694, 0, 2, 1, 0, 'Hurricane Hanna''s Waterside Bar and Grill', ''),
(741, 694, 0, 2, 1, 0, 'Martha''s Vineyard', ''),
(742, 696, 0, 2, 1, 0, 'Belle Vue Lounge', ''),
(743, 697, 0, 2, 1, 0, 'Leaping Horse Libations', ''),
(744, 698, 0, 2, 1, 0, 'Banana Cabana Pool Bar', ''),
(745, 698, 0, 2, 1, 0, 'Old Port Royale Food Court', ''),
(746, 698, 0, 2, 1, 0, 'Shutters at Old Port Royale', ''),
(747, 699, 0, 2, 1, 0, 'California Grill', ''),
(748, 699, 0, 2, 1, 0, 'Chef Mickey''s', ''),
(749, 699, 0, 2, 1, 0, 'Contempo Cafe', ''),
(750, 699, 0, 2, 1, 0, 'Contemporary Grounds', ''),
(751, 699, 0, 2, 1, 0, 'Outer Rim', ''),
(752, 699, 0, 2, 1, 0, 'The Sand Bar', ''),
(753, 699, 0, 2, 1, 0, 'The Wave Lounge', ''),
(754, 699, 0, 2, 1, 0, 'The Wave... of American Flavors', ''),
(755, 700, 0, 2, 1, 0, 'Cafe Rix', ''),
(756, 700, 0, 2, 1, 0, 'Laguna Bar', ''),
(757, 700, 0, 2, 1, 0, 'Las Ventanas', ''),
(758, 700, 0, 2, 1, 0, 'Maya Grill', ''),
(759, 700, 0, 2, 1, 0, 'Pepper Market', ''),
(760, 700, 0, 2, 1, 0, 'Rix Lounge', 'rix-lounge'),
(761, 700, 0, 2, 1, 0, 'Siestas Cantina', ''),
(762, 701, 0, 2, 1, 0, '1900 Park Fare', '1900-park-fare'),
(763, 701, 0, 6, 1, 0, 'Afternoon Tea at Garden View Tea Room', ''),
(764, 701, 0, 2, 1, 0, 'Beaches Pool Bar & Grill', ''),
(765, 701, 0, 2, 1, 0, 'Citricos', ''),
(766, 701, 0, 2, 1, 0, 'Citricos Chef''s Domain', ''),
(767, 701, 0, 2, 1, 0, 'Citricos Lounge', ''),
(768, 701, 0, 2, 1, 0, 'Courtyard Pool Bar', ''),
(769, 701, 0, 6, 1, 0, 'Disney''s Perfectly Princess Tea', ''),
(770, 701, 0, 2, 1, 0, 'Garden View Tea Room', ''),
(771, 701, 0, 2, 1, 0, 'Gasparilla Island Grill', ''),
(772, 701, 0, 2, 1, 0, 'Grand Floridian Cafe', 'grand-floridian-cafe'),
(773, 701, 0, 2, 1, 0, 'Mizner''s Lounge', ''),
(774, 701, 0, 2, 1, 0, 'Narcoosee''s', 'narcoosees'),
(775, 701, 0, 2, 1, 0, 'Victoria & Albert''s', ''),
(776, 701, 0, 6, 1, 0, 'Victoria & Albert''s Chef''s Table Dinner', ''),
(777, 701, 0, 6, 1, 0, 'Victoria & Albert''s Dinner Queen Victoria Room', ''),
(778, 702, 0, 2, 1, 0, 'Good''s Food to Go', ''),
(779, 702, 0, 2, 1, 0, 'Gurgling Suitcase', ''),
(780, 702, 0, 2, 1, 0, 'Olivia''s Cafe', ''),
(781, 702, 0, 2, 1, 0, 'Turtle Shack Poolside Snacks', ''),
(782, 703, 0, 2, 1, 0, 'Barefoot Pool Bar', ''),
(783, 703, 0, 2, 1, 0, 'Capt. Cook''s', ''),
(784, 703, 0, 7, 1, 0, 'Disney Spirit of Aloha Dinner Show', ''),
(785, 703, 0, 2, 1, 0, 'Kona Cafe', ''),
(786, 703, 0, 2, 1, 0, 'Kona Island', ''),
(787, 703, 0, 2, 1, 0, 'Luau Cove', ''),
(788, 703, 0, 2, 1, 0, 'Ohana', ''),
(789, 703, 0, 2, 1, 0, 'Pineapple Lanai', ''),
(790, 703, 0, 2, 1, 0, 'Tambu Lounge', ''),
(791, 703, 0, 2, 1, 0, 'Trader Sam''s Grog Grotto', ''),
(792, 703, 0, 2, 1, 0, 'Trader Sam''s Tiki Terrace', ''),
(793, 705, 0, 2, 1, 0, 'Everything POP Shopping & Dining', ''),
(794, 705, 0, 2, 1, 0, 'Petals Pool Bar', ''),
(795, 706, 0, 2, 1, 0, 'Mardi Grogs', ''),
(796, 706, 0, 2, 1, 0, 'Sassagoula Floatworks and Food Factory', ''),
(797, 706, 0, 2, 1, 0, 'Scat Cat''s Club', ''),
(798, 707, 0, 2, 1, 0, 'Boatwright''s Dining Hall', ''),
(799, 707, 0, 2, 1, 0, 'Muddy Rivers', ''),
(800, 707, 0, 2, 1, 0, 'River Roost', ''),
(801, 707, 0, 2, 1, 0, 'Riverside Mill Food Court', ''),
(802, 708, 0, 2, 1, 0, 'The Artist''s Palette', ''),
(803, 708, 0, 2, 1, 0, 'Backstretch Pool Bar', ''),
(804, 708, 0, 2, 1, 0, 'On the Rocks', ''),
(805, 708, 0, 2, 1, 0, 'The Paddock Grill', ''),
(806, 708, 0, 2, 1, 0, 'The Turf Club Bar and Grill', ''),
(807, 708, 0, 2, 1, 0, 'The Turf Club Lounge', ''),
(808, 709, 0, 2, 1, 0, 'Artist Point', ''),
(809, 709, 0, 2, 1, 0, 'Roaring Fork', ''),
(810, 709, 0, 2, 1, 0, 'Territory Lounge', ''),
(811, 709, 0, 2, 1, 0, 'Trout Pass Pool Bar', ''),
(812, 709, 0, 2, 1, 0, 'Whispering Canyon Cafe', ''),
(813, 710, 0, 2, 1, 0, 'Ale and Compass Lounge', ''),
(814, 710, 0, 2, 1, 0, 'Captain''s Grille', ''),
(815, 710, 0, 2, 1, 0, 'Crew''s Cup Lounge', ''),
(816, 710, 0, 2, 1, 0, 'Yachtsman Steakhouse', ''),
(817, 712, 0, 2, 1, 0, 'Crockett''s Tavern', ''),
(818, 712, 0, 2, 1, 0, 'Fort Wilderness Pavilion', ''),
(819, 712, 0, 7, 1, 0, 'Hoop-Dee-Doo Musical Revue', 'hoop-de-doo-revue'),
(820, 712, 0, 2, 1, 0, 'Meadow Snack Bar', ''),
(821, 712, 0, 7, 1, 0, 'Mickey''s Backyard BBQ', ''),
(822, 712, 0, 2, 1, 0, 'Pioneer Hall', ''),
(823, 712, 0, 2, 1, 0, 'P & J''s Southern Takeout', ''),
(824, 712, 0, 2, 1, 0, 'Trail''s End Restaurant', ''),
(825, 716, 0, 2, 1, 0, 'Cabana Bar and Beach Club', ''),
(826, 716, 0, 2, 1, 0, 'The Fountain', ''),
(827, 716, 0, 2, 1, 0, 'Fresh Mediterranean Market', ''),
(828, 716, 0, 2, 1, 0, 'Lobby Lounge', ''),
(829, 716, 0, 2, 1, 0, 'Picabu', ''),
(830, 716, 0, 2, 1, 0, 'Shula''s Lounge', ''),
(831, 716, 0, 2, 1, 0, 'Shula''s Steak House', ''),
(832, 716, 0, 2, 1, 0, 'Todd English''s bluezoo', ''),
(833, 716, 0, 2, 1, 0, 'Todd English''s bluezoo Lounge', ''),
(834, 717, 0, 2, 1, 0, 'Garden Grove', ''),
(835, 717, 0, 2, 1, 0, 'Il Mulino', ''),
(836, 717, 0, 2, 1, 0, 'Il Mulino Lounge', ''),
(837, 717, 0, 2, 1, 0, 'Java Bar', ''),
(838, 717, 0, 2, 1, 0, 'Kimonos', ''),
(839, 717, 0, 2, 1, 0, 'Kimonos Lounge', ''),
(840, 717, 0, 2, 1, 0, 'Splash', '');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_loc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `parent_loc`) VALUES
(1, 'Adventureland', 17),
(2, 'Africa', 3),
(3, 'Animal Kingdom', 0),
(4, 'Animation Courtyard', 15),
(5, 'Asia', 3),
(6, 'Commissary Lane', 15),
(7, 'DinoLand U.S.A.', 3),
(8, 'Discovery Island', 3),
(9, 'Echo Lake', 15),
(10, 'Epcot', 0),
(11, 'Fantasyland', 17),
(12, 'Frontierland', 17),
(13, 'Future World', 10),
(14, 'Hollywood Boulevard', 15),
(15, 'Hollywood Studios', 0),
(16, 'Liberty Square', 17),
(17, 'Magic Kingdom', 0),
(18, 'Main Entrance', 15),
(19, 'Main Street, U.S.A.', 17),
(20, 'Mickey Avenue', 15),
(21, 'Muppet Courtyard', 15),
(22, 'Oasis', 3),
(23, 'Pixar Place', 15),
(24, 'Rafiki''s Planet Watch', 3),
(25, 'Streets of America', 15),
(26, 'Sunset Boulevard', 15),
(27, 'Tomorrowland', 17),
(28, 'World Showcase', 10);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_15_184552_create_items_table', 1),
('2016_04_19_151312_create_locations_table', 1),
('2016_04_19_151852_create_comments_table', 1),
('2016_04_19_152021_create_comment_user_table', 1),
('2016_04_19_204823_create_categories_table', 1),
('2016_04_19_231727_create_status_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Alternate'),
(3, 'Coming Soon'),
(4, 'Rare'),
(5, 'Retired');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `visible`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'deivoco@gmail.com', '$2y$10$5qOj53WjRQup6dgUofBeA.7cQfKBMOWfixEjQCM1E2ZTSR0XJQdtO', NULL, 1, 0, 'Eud3quabw8MlQXocz3EU21Hpbc0fpHzoMZllMvrAXBbWJsSKnZrzSeuY9qdI', '2016-05-01 21:45:08', '2016-05-01 23:01:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_user`
--
ALTER TABLE `comment_user`
  ADD KEY `comment_user_user_id_foreign` (`user_id`),
  ADD KEY `comment_user_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_item_name_unique` (`item_name`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_name_unique` (`location`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_user`
--
ALTER TABLE `comment_user`
  ADD CONSTRAINT `comment_user_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comment_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
