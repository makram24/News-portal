-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2024 at 11:09 PM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u437537917_news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `ad_id` int(11) NOT NULL,
  `title` varchar(99) DEFAULT NULL,
  `ad_image` varchar(99) DEFAULT NULL,
  `link` varchar(99) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` enum('homepage','sidebar','article','footer') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`ad_id`, `title`, `ad_image`, `link`, `start_date`, `end_date`, `location`, `created_at`) VALUES
(1, 'Testing', 'assets/imgs/Advertise/f.jpg', 'https://makramalmoghrabi.com', '2024-11-19', '2024-12-18', 'article', '2024-11-21 15:30:16'),
(2, 'Home Page ', 'assets/imgs/Advertise/1.jpg', 'https://google.com', '2024-11-18', '2024-12-25', 'homepage', '2024-11-21 15:45:54'),
(3, 'Sidebar', 'assets/imgs/Advertise/shoz3.jpg', 'https://facebook.com', '2024-11-20', '2024-12-24', 'sidebar', '2024-11-21 16:08:36'),
(4, 'Article', 'assets/imgs/Advertise/8775221.jpg', 'https://facebook.com', '2024-11-20', '2024-12-31', 'footer', '2024-11-21 16:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `slug` varchar(99) NOT NULL,
  `small_des` text NOT NULL,
  `content` text NOT NULL,
  `featured_image` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `slug`, `small_des`, `content`, `featured_image`, `author_id`, `category_id`, `status`, `published_at`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Apple’s Hurry Up and Wait', 'apple-annual-product-launch', 'Apple’s annual product launch event yielded four new iPhones...', 'Apple’s annual product launch event yielded four new iPhones, two new AirPods and a redesigned Apple Watch. The gadgets hit shelves later this week—but you’ll have to wait for the most innovative features.\r\n<br><br>\r\nThe biggest iPhone 16 news was a button. It’s a good ol’ fashioned, clicky button on the side of the phone that can launch the camera and snap a pic. It’s touch-sensitive, so you can swipe across it for more controls, too. That’s the only major new hardware feature on this year\'s base model.\r\n<br><br>\r\nEventually, that button will do some AI-powered stuff, such as quickly pull up the camera to help solve a tricky homework problem. But as my colleague Joanna Stern explains, many of the iPhone’s much-anticipated AI features won’t come until “later this year,” and some won’t be available until 2025. Apple Intelligence, as the suite of AI tools is called, is slated to work on iPhone 15 Pro models, as well as Macs and iPads with newer M chips.\r\n<br><br>\r\nThe waiting game continues with the Apple Watch Series 10’s sleep apnea detector. The thinner, lighter watch might be great for wearing to bed, but the feature—also going into last year’s Series 9 and Ultra 2—still needs regulatory approval.\r\n<br><br>\r\nThe biggest surprise: The two-year-old AirPods Pro 2, Apple’s best selling AirPods, will get a software update that turns them into clinical-grade hearing aids. The Food and Drug Administration gave Apple the green light this past week.\r\n<br><br>\r\nIn this era of gadgetry, a game-changing feature can come via software update, and give a years-old device new life. While I sit tight for Apple’s latest AI and health features, I’ll be reacting to every iMessage with the melting smiley emoji, courtesy of iOS 18, available to download free on Monday.', 'assets/imgs/articles/1.png', 1, 7, 'published', '2024-10-11', '2024-10-11 21:48:42', '2024-11-29 22:42:32', 1),
(2, 'Politics in 2024: What to Expect', 'politics-2024', 'An in-depth analysis of political developments in 2024.', 'An in-depth analysis of political developments in 2024.', 'assets/imgs/articles/1.png', 1, 1, 'published', '2024-10-10', '2024-10-11 22:09:05', '2024-10-13 09:32:34', 0),
(3, 'The Future of Business Technology', 'future-business-tech', 'Exploring the intersection of business and technology in the next decade.', 'Exploring the intersection of business and technology in the next decade.', 'assets/imgs/articles/1.png', 2, 2, 'published', '2024-10-09', '2024-10-11 22:09:05', '2024-11-30 00:00:15', 0),
(4, 'World News Today: Key Events', 'world-news-today', 'A roundup of the latest news from around the world.', 'A roundup of the latest news from around the world.', 'assets/imgs/articles/1.png', 3, 3, 'draft', NULL, '2024-10-11 22:09:05', '2024-10-13 09:32:34', 0),
(5, 'Sports Highlights of the Week', 'sports-highlights-week', 'The top sports moments and stories from the past week.', 'The top sports moments and stories from the past week.', 'assets/imgs/articles/1.png', 1, 4, 'published', '2024-10-08', '2024-10-11 22:09:05', '2024-10-13 09:32:34', 0),
(6, 'Latest in Entertainment: Fall Releases', 'entertainment-fall-releases', 'A look at the most anticipated entertainment releases this fall.', 'A look at the most anticipated entertainment releases this fall.', 'assets/imgs/articles/1.png', 2, 5, 'published', '2024-10-07', '2024-10-11 22:09:05', '2024-10-13 09:32:34', 0),
(7, 'Tech Opinion: Is AI Taking Over?', 'tech-opinion-ai', 'An opinion piece on the rise of AI and its impact on the workforce.', 'An opinion piece on the rise of AI and its impact on the workforce.', 'assets/imgs/articles/1.png', 4, 7, 'published', '2024-10-06', '2024-10-11 22:09:05', '2024-10-13 09:32:34', 0),
(8, 'Global Politics: A Year in Review', 'global-politics-review', 'A review of major global political events.', 'A review of major global political events.', 'assets/imgs/articles/1.png', 1, 1, 'published', '2024-10-01', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(9, 'Breaking Business Trends in 2024', 'breaking-business-trends', 'Emerging trends in the global business landscape.', 'Generative AI is not only transforming creative industries but is now being integrated into sectors like finance, healthcare, education, and customer service. In 2024, businesses are expected to use AI tools more extensively for content creation, data analysis, and customer support. AI-driven automation is enabling small businesses to scale operations and offering larger enterprises personalized insights.<br />\r\n<br />\r\nHow to leverage it: Companies can benefit by using AI for customized marketing campaigns, automated customer service, and in-depth data analysis for customer behavior patterns. Ensuring AI transparency and ethics will be crucial to maintaining customer trust and regulatory compliance.', 'assets/imgs/articles/Untitled design (16).png', 2, 2, 'published', '2024-09-29', '2024-10-13 09:59:20', '2024-11-14 03:12:05', 0),
(10, 'Tech Innovations Shaping the Future', 'tech-innovations-future', 'A look at the most disruptive technologies in development.', 'A look at the most disruptive technologies in development.', 'assets/imgs/articles/Untitled design (16).png', 3, 7, 'published', '2024-10-02', '2024-10-13 09:59:20', '2024-11-14 00:36:09', 0),
(11, 'Top Football Transfers in 2024', 'football-transfers-2024', 'A list of the biggest football transfers this year.', 'A list of the biggest football transfers this year.', 'assets/imgs/articles/1.png', 1, 4, 'published', '2024-10-03', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(12, 'Entertainment Industry 2024: What’s New?', 'entertainment-industry-2024', 'Upcoming trends and innovations in the entertainment industry.', 'Upcoming trends and innovations in the entertainment industry.', 'assets/imgs/articles/1.png', 2, 5, 'published', '2024-10-04', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(13, 'AI and the Future of Healthcare', 'ai-healthcare', 'How AI is transforming healthcare and patient outcomes.', 'How AI is transforming healthcare and patient outcomes.', 'assets/imgs/articles/1.png', 3, 7, 'draft', NULL, '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(14, 'The Rise of E-Commerce in 2024', 'rise-of-ecommerce', 'How e-commerce is evolving and shaping the retail sector.', 'How e-commerce is evolving and shaping the retail sector.', 'assets/imgs/articles/1.png', 2, 2, 'published', '2024-10-05', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(15, 'Climate Change and Global Response', 'climate-change-response', 'The global effort to combat climate change.', 'The global effort to combat climate change.', 'assets/imgs/articles/1.png', 1, 1, 'published', '2024-10-06', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(16, 'The Biggest Sports Rivalries in 2024', 'sports-rivalries-2024', 'A look at the most intense sports rivalries this year.', 'A look at the most intense sports rivalries this year.', 'assets/imgs/articles/1.png', 1, 4, 'published', '2024-10-07', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(17, 'Entertainment Awards: A Year in Review', 'entertainment-awards-review', 'A roundup of the biggest awards in entertainment.', 'A roundup of the biggest awards in entertainment.', 'assets/imgs/articles/1.png', 2, 5, 'published', NULL, '2024-10-13 09:59:20', '2024-11-16 00:58:28', 0),
(18, 'AI in Daily Life: Is It Everywhere?', 'ai-daily-life', 'Exploring how AI has integrated into everyday life.', 'Exploring how AI has integrated into everyday life.', 'assets/imgs/articles/1.png', 3, 7, 'published', '2024-09-30', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(19, 'Global Economy 2024: What to Expect', 'global-economy-2024', 'An economic forecast for the coming year.', 'An economic forecast for the coming year.', 'assets/imgs/articles/1.png', 2, 2, 'published', '2024-09-25', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(20, 'The Olympics 2024: Key Events', 'olympics-2024', 'A look at the upcoming Olympics and the key events to watch.', 'A look at the upcoming Olympics and the key events to watch.', 'assets/imgs/articles/1.png', 1, 4, 'published', '2024-09-24', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(21, 'Hollywood Blockbusters: 2024 Edition', 'hollywood-blockbusters-2024', 'A preview of the biggest movies coming out in 2024.', 'A preview of the biggest movies coming out in 2024.', 'assets/imgs/articles/1.png', 2, 5, 'published', '2024-09-23', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(22, 'Tech Startups to Watch in 2024', 'tech-startups-2024', 'The most exciting startups in the tech world this year.', 'The most exciting startups in the tech world this year.', 'assets/imgs/articles/1.png', 3, 7, 'published', '2024-09-28', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(23, 'Opinion: The Future of Remote Work', 'opinion-remote-work', 'An opinion on the ongoing remote work trend.', 'An opinion on the ongoing remote work trend.', 'assets/imgs/articles/1.png', 3, 6, 'published', '2024-09-27', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(24, 'Business Predictions for 2025', 'business-predictions-2025', 'What to expect in the business world in the coming years.', 'What to expect in the business world in the coming years.', 'assets/imgs/articles/1.png', 2, 2, 'draft', '2024-11-16', '2024-10-13 09:59:20', '2024-11-16 01:47:48', 0),
(25, 'The Impact of Climate Policy on Business', 'climate-policy-business', 'How new climate regulations are affecting global business.', 'How new climate regulations are affecting global business.', 'assets/imgs/articles/1.png', 2, 1, 'published', '2024-09-26', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(26, 'Opinion: The Ethics of AI', 'opinion-ethics-ai', '', 'An opinion piece discussing the ethical implications of AI.', 'assets/imgs/articles/1.png', 3, 6, 'published', '2024-09-22', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(27, 'World News Highlights: September 2024', 'world-news-september-2024', '', 'A roundup of the most important world news events in September 2024.', 'assets/imgs/articles/1.png', 3, 3, 'published', '2024-09-21', '2024-10-13 09:59:20', '2024-10-13 11:00:06', 0),
(28, 'Emerging Trends in Green Energy', 'emerging-trends-green-energy', 'Exploring new green technologies.', 'A comprehensive look at the emerging technologies in renewable energy.', 'assets/imgs/articles/1.png', 1, 1, 'published', '2024-10-12', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(29, 'The Future of Electric Vehicles', 'future-electric-vehicles', 'EV advancements and challenges.', 'An overview of the current state and future of electric vehicles.', 'assets/imgs/articles/1.png', 2, 2, 'published', '2024-10-11', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(30, 'Telecommuting: Benefits and Challenges', 'telecommuting-benefits-challenges', 'The impact of remote work.', 'Examining the pros and cons of telecommuting in modern workplaces.', 'assets/imgs/articles/1.png', 3, 6, 'published', '2024-10-10', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(31, 'Virtual Reality in Education', 'virtual-reality-education', 'Transforming learning through VR.', 'How virtual reality is changing educational experiences.', 'assets/imgs/articles/1.png', 1, 7, 'published', '2024-10-09', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(32, 'The Impact of 5G Technology', 'impact-5g-technology', '5G’s effect on connectivity.', 'Exploring the transformative power of 5G technology.', 'assets/imgs/articles/1.png', 2, 4, 'published', '2024-10-08', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(33, 'Healthcare Innovations to Watch', 'healthcare-innovations-watch', 'The future of healthcare.', 'A look at upcoming innovations in the healthcare sector.', 'assets/imgs/articles/1.png', 3, 1, 'published', '2024-10-07', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(34, 'The Rise of Smart Cities', 'rise-smart-cities', 'Urban development trends.', 'How technology is shaping the future of urban environments.', 'assets/imgs/articles/1.png', 1, 5, 'published', '2024-10-06', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(35, 'Fashion Trends for 2024', 'fashion-trends-2024', 'What’s in style this year.', 'A guide to the latest fashion trends for 2024.', 'assets/imgs/articles/1.png', 2, 4, 'published', '2024-10-05', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(36, 'Digital Currency: The Next Frontier', 'digital-currency-next-frontier', 'Exploring cryptocurrencies.', 'An overview of the rise of digital currencies and their implications.', 'assets/imgs/articles/1.png', 3, 2, 'published', '2024-10-04', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(37, 'Social Media’s Influence on Politics', 'social-media-influence-politics', 'How social media shapes political discourse.', 'Examining the role of social media in modern politics.', 'assets/imgs/articles/1.png', 1, 1, 'published', '2024-10-03', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(38, 'Sustainable Agriculture Practices', 'sustainable-agriculture-practices', 'Farming for the future.', 'Innovative farming practices that promote sustainability.', 'assets/imgs/articles/1.png', 2, 3, 'published', '2024-10-02', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(39, 'Mental Health Awareness Campaigns', 'mental-health-awareness', 'Raising awareness about mental health.', 'How campaigns are helping to raise awareness and combat stigma.', 'assets/imgs/articles/1.png', 3, 6, 'published', '2024-10-01', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(40, 'Exploring Quantum Computing', 'exploring-quantum-computing', 'The next revolution in technology.', 'A deep dive into the world of quantum computing.', 'assets/imgs/articles/1.png', 1, 2, 'published', '2024-09-30', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(41, 'History of Women in Technology', 'history-women-technology', 'Celebrating women in tech.', 'A look at the significant contributions of women in technology.', 'assets/imgs/articles/1.png', 2, 5, 'published', '2024-09-29', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(42, 'The Evolution of Social Media', 'evolution-social-media', 'From MySpace to TikTok.', 'Tracing the development of social media platforms over the years.', 'assets/imgs/articles/1.png', 3, 1, 'published', '2024-09-28', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(43, 'The Benefits of Meditation', 'benefits-meditation', 'Improving mental well-being.', 'Exploring the mental and physical benefits of meditation practices.', 'assets/imgs/articles/1.png', 1, 6, 'published', '2024-09-27', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(44, 'The Role of Art in Activism', 'role-art-activism', 'Using art for social change.', 'How art can be a powerful tool for activism.', 'assets/imgs/articles/1.png', 2, 4, 'published', '2024-09-26', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(45, 'The Science of Sleep', 'science-of-sleep', 'Understanding sleep patterns.', 'A look at the importance of sleep and how it affects health.', 'assets/imgs/articles/1.png', 3, 6, 'published', '2024-09-25', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(46, 'The Importance of Clean Water', 'importance-clean-water', 'Addressing water scarcity.', 'Exploring the global issue of water scarcity and its impacts.', 'assets/imgs/articles/1.png', 1, 1, 'published', '2024-09-24', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(47, 'Gastronomy: The Science of Flavor', 'gastronomy-science-flavor', 'Exploring culinary arts.', 'A look at how science influences gastronomy.', 'assets/imgs/articles/1.png', 2, 5, 'published', '2024-09-23', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(48, 'The Future of Space Exploration', 'future-space-exploration', 'What’s next for space travel?', 'A glimpse into the future of space missions and exploration.', 'assets/imgs/articles/1.png', 3, 4, 'published', '2024-09-22', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(49, 'The Rise of Veganism', 'rise-veganism', 'Exploring dietary choices.', 'How veganism is gaining popularity and its implications.', 'assets/imgs/articles/1.png', 1, 2, 'published', '2024-09-21', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(50, 'Travel Trends Post-Pandemic', 'travel-trends-post-pandemic', 'How travel is changing.', 'A look at how travel has evolved since the pandemic.', 'assets/imgs/articles/1.png', 2, 3, 'published', '2024-09-20', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(51, 'The Impact of Globalization on Culture', 'impact-globalization-culture', 'Cultural shifts in a globalized world.', 'Exploring how globalization is impacting local cultures.', 'assets/imgs/articles/1.png', 3, 1, 'published', '2024-09-19', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(52, 'Artificial Intelligence in Everyday Life', 'ai-everyday-life', 'AI applications we use daily.', 'How artificial intelligence is integrated into our daily routines.', 'assets/imgs/articles/1.png', 1, 7, 'published', '2024-09-18', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(53, 'Youth Activism in 2024', 'youth-activism-2024', 'Young voices shaping the future.', 'The rise of youth activism and its impact on society.', 'assets/imgs/articles/1.png', 2, 5, 'published', '2024-09-17', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(54, 'Blockchain Beyond Cryptocurrency', 'blockchain-beyond-cryptocurrency', 'Exploring blockchain applications.', 'How blockchain technology is being applied beyond cryptocurrencies.', 'assets/imgs/articles/1.png', 3, 2, 'published', '2024-09-16', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(55, 'The Power of Podcasts', 'power-of-podcasts', 'Podcasting in the digital age.', 'How podcasts are shaping modern media consumption.', 'assets/imgs/articles/1.png', 1, 4, 'published', '2024-09-15', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(56, 'Trends in Online Education', 'trends-online-education', 'The future of learning.', 'How online education is evolving and what to expect.', 'assets/imgs/articles/1.png', 2, 3, 'published', '2024-09-14', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(57, 'Impact of Climate Change on Wildlife', 'impact-climate-change-wildlife', 'Wildlife conservation efforts.', 'How climate change is affecting wildlife around the world.', 'assets/imgs/articles/1.png', 3, 1, 'published', '2024-09-13', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(58, 'The Changing Landscape of Retail', 'changing-landscape-retail', 'Retail trends in 2024.', 'An overview of how retail is changing in 2024.', 'assets/imgs/articles/1.png', 1, 2, 'published', '2024-09-12', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(59, 'Understanding Cryptocurrency Regulations', 'understanding-cryptocurrency-regulations', 'Navigating legal landscapes.', 'A guide to cryptocurrency regulations around the globe.', 'assets/imgs/articles/1.png', 2, 6, 'published', '2024-09-11', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(60, 'Exploring the Future of Work', 'exploring-future-of-work', 'Workplace trends in 2024.', 'How the workplace is evolving in response to global changes.', 'assets/imgs/articles/1.png', 3, 5, 'published', '2024-09-10', '2024-10-13 10:51:04', '2024-10-13 11:00:06', 0),
(74, 'The Future of Renewable Energy: Powering Tomorrow', 'the-future-of-renewable-energy', 'Renewable energy is transforming the way we think about power. This article explores its role in creating a sustainable future.', 'The global energy landscape is undergoing a seismic shift. As climate change and depleting fossil fuels challenge traditional power systems, renewable energy has emerged as a beacon of hope. Solar panels, wind turbines, and hydroelectric plants are not just engineering marvels; they symbolize a commitment to a sustainable future.<br />\r\n<br />\r\nIn the past decade, the cost of renewable energy technology has plummeted, making it more accessible to developing nations. Governments are incentivizing green energy projects, and private enterprises are investing heavily in innovative solutions. However, challenges like energy storage and grid integration persist, requiring further advancements in technology and policy.<br />\r\n<br />\r\nAs the world moves towards carbon neutrality, renewable energy is expected to play a pivotal role in reducing greenhouse gas emissions. The question is no longer if we will transition, but how quickly we can achieve it.', 'assets/imgs/articles/img.jpg', 2, 7, 'published', '2024-11-16', '2024-11-15 22:44:30', '2024-11-16 02:10:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_tags`
--

CREATE TABLE `article_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article_tags`
--

INSERT INTO `article_tags` (`article_id`, `tag_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 7),
(3, 3),
(3, 52),
(3, 53),
(3, 54),
(4, 7),
(5, 4),
(6, 5),
(7, 1),
(7, 3),
(7, 6),
(7, 7),
(7, 8),
(8, 2),
(8, 9),
(9, 3),
(9, 11),
(10, 4),
(11, 5),
(12, 6),
(12, 10),
(13, 7),
(13, 9),
(14, 12),
(15, 4),
(16, 5),
(17, 6),
(18, 2),
(18, 9),
(18, 60),
(19, 13),
(19, 58),
(20, 14),
(21, 11),
(22, 8),
(23, 2),
(23, 8),
(24, 2),
(24, 12),
(25, 6),
(25, 15),
(25, 57),
(25, 59),
(26, 7),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31),
(32, 32),
(33, 33),
(35, 35),
(35, 51),
(36, 36),
(37, 37),
(37, 52),
(38, 38),
(38, 55),
(39, 39),
(40, 40),
(41, 41),
(42, 42),
(42, 54),
(43, 43),
(44, 44),
(45, 45),
(46, 46),
(47, 47),
(47, 56),
(48, 48),
(49, 49),
(49, 53),
(50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `article_views`
--

CREATE TABLE `article_views` (
  `article_id` int(11) NOT NULL,
  `view_date` varchar(99) NOT NULL,
  `view_count` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article_views`
--

INSERT INTO `article_views` (`article_id`, `view_date`, `view_count`) VALUES
(1, 'December 2024', 1),
(9, 'November 2024', 60),
(10, 'November 2024', 4),
(11, 'November 2024', 8),
(12, 'November 2024', 1),
(13, 'November 2024', 1),
(14, 'November 2024', 2),
(15, 'November 2024', 1),
(16, 'November 2024', 1),
(17, 'November 2024', 1),
(18, 'November 2024', 1),
(19, 'November 2024', 1),
(20, 'November 2024', 1),
(21, 'November 2024', 1),
(22, 'November 2024', 1),
(23, 'November 2024', 1),
(24, 'November 2024', 1),
(25, 'November 2024', 2),
(26, 'November 2024', 1),
(27, 'November 2024', 1),
(28, 'November 2024', 1),
(29, 'November 2024', 1),
(30, 'November 2024', 1),
(31, 'November 2024', 1),
(32, 'November 2024', 1),
(33, 'November 2024', 1),
(34, 'November 2024', 1),
(35, 'November 2024', 2),
(36, 'November 2024', 2),
(37, 'November 2024', 1),
(38, 'November 2024', 1),
(39, 'November 2024', 1),
(40, 'November 2024', 1),
(41, 'November 2024', 1),
(42, 'November 2024', 1),
(43, 'November 2024', 1),
(44, 'November 2024', 1),
(45, 'November 2024', 1),
(46, 'November 2024', 1),
(47, 'November 2024', 1),
(48, 'November 2024', 1),
(49, 'November 2024', 1),
(50, 'November 2024', 1),
(51, 'November 2024', 4),
(52, 'November 2024', 1),
(53, 'November 2024', 1),
(54, 'November 2024', 1),
(55, 'November 2024', 1),
(56, 'November 2024', 4),
(57, 'November 2024', 1),
(58, 'November 2024', 1),
(59, 'November 2024', 5),
(60, 'November 2024', 1),
(61, 'November 2024', 1),
(62, 'November 2024', 1),
(63, 'November 2024', 1),
(64, 'November 2024', 1),
(65, 'November 2024', 1),
(66, 'November 2024', 1),
(67, 'November 2024', 1),
(68, 'November 2024', 1),
(69, 'November 2024', 1),
(70, 'November 2024', 1),
(71, 'November 2024', 1),
(72, 'November 2024', 1),
(73, 'November 2024', 1),
(74, 'November 2024', 4),
(75, 'November 2024', 1),
(76, 'November 2024', 1),
(77, 'November 2024', 1),
(78, 'November 2024', 1),
(79, 'November 2024', 1),
(80, 'November 2024', 1),
(81, 'November 2024', 1),
(82, 'November 2024', 1),
(83, 'November 2024', 1),
(84, 'November 2024', 1),
(85, 'November 2024', 1),
(86, 'November 2024', 1),
(87, 'November 2024', 1),
(88, 'November 2024', 1),
(89, 'November 2024', 1),
(90, 'November 2024', 1),
(91, 'November 2024', 1),
(92, 'November 2024', 1),
(93, 'November 2024', 1),
(94, 'November 2024', 1),
(95, 'November 2024', 1),
(96, 'November 2024', 1),
(97, 'November 2024', 1),
(98, 'November 2024', 1),
(99, 'November 2024', 1),
(100, 'November 2024', 1),
(101, 'November 2024', 1),
(102, 'November 2024', 1),
(103, 'November 2024', 1),
(104, 'November 2024', 1),
(105, 'November 2024', 1),
(106, 'November 2024', 1),
(107, 'November 2024', 1),
(108, 'November 2024', 1),
(109, 'November 2024', 1),
(110, 'November 2024', 1),
(111, 'November 2024', 1),
(112, 'November 2024', 1),
(113, 'November 2024', 1),
(114, 'November 2024', 1),
(115, 'November 2024', 1),
(116, 'November 2024', 1),
(117, 'November 2024', 1),
(118, 'November 2024', 1),
(119, 'November 2024', 1),
(120, 'November 2024', 1),
(121, 'November 2024', 1),
(122, 'November 2024', 1),
(123, 'November 2024', 1),
(124, 'November 2024', 1),
(125, 'November 2024', 1),
(126, 'November 2024', 1),
(127, 'November 2024', 1),
(128, 'November 2024', 1),
(129, 'November 2024', 1),
(130, 'November 2024', 1),
(131, 'November 2024', 1),
(132, 'November 2024', 1),
(133, 'November 2024', 1),
(134, 'November 2024', 1),
(135, 'November 2024', 1),
(136, 'November 2024', 1),
(137, 'November 2024', 1),
(138, 'November 2024', 1),
(139, 'November 2024', 1),
(140, 'November 2024', 1),
(141, 'November 2024', 1),
(142, 'November 2024', 1),
(143, 'November 2024', 1),
(144, 'November 2024', 1),
(145, 'November 2024', 1),
(146, 'November 2024', 1),
(147, 'November 2024', 1),
(148, 'November 2024', 1),
(149, 'November 2024', 1),
(150, 'November 2024', 1),
(151, 'November 2024', 1),
(152, 'November 2024', 1),
(153, 'November 2024', 1),
(154, 'November 2024', 1),
(155, 'November 2024', 1),
(156, 'November 2024', 1),
(157, 'November 2024', 1),
(158, 'November 2024', 1),
(159, 'November 2024', 1),
(160, 'November 2024', 1),
(161, 'November 2024', 1),
(162, 'November 2024', 1),
(163, 'November 2024', 1),
(164, 'November 2024', 1),
(165, 'November 2024', 1),
(166, 'November 2024', 1),
(167, 'November 2024', 1),
(168, 'November 2024', 1),
(169, 'November 2024', 1),
(170, 'November 2024', 1),
(171, 'November 2024', 1),
(172, 'November 2024', 1),
(173, 'November 2024', 1),
(174, 'November 2024', 1),
(175, 'November 2024', 1),
(176, 'November 2024', 1),
(177, 'November 2024', 1),
(178, 'November 2024', 1),
(179, 'November 2024', 1),
(180, 'November 2024', 1),
(181, 'November 2024', 1),
(182, 'November 2024', 1),
(183, 'November 2024', 1),
(184, 'November 2024', 1),
(185, 'November 2024', 1),
(186, 'November 2024', 1),
(187, 'November 2024', 1),
(188, 'November 2024', 1),
(189, 'November 2024', 1),
(190, 'November 2024', 1),
(191, 'November 2024', 1),
(192, 'November 2024', 1),
(193, 'November 2024', 1),
(194, 'December 2024', 1),
(195, 'December 2024', 1),
(196, 'December 2024', 1),
(197, 'December 2024', 1),
(198, 'December 2024', 1),
(199, 'December 2024', 1),
(200, 'December 2024', 1),
(201, 'December 2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `bio`, `email`, `profile_image`, `created_at`, `user_id`) VALUES
(2, 'John Doe', 'John is an experienced journalist with a passion for investigative reporting.', 'john.doe@example.com', 'john_profile.jpg', '2024-10-11 22:03:22', 2),
(3, 'Jane Smith', 'Jane is a technology writer who loves exploring new gadgets.', 'jane.smith@example.com', 'jane_profile.jpg', '2024-10-11 22:03:22', 2),
(4, 'Alex Johnson', 'Alex writes about finance and global economics.', 'alex.johnson@example.com', 'alex_profile.jpg', '2024-10-11 22:03:22', 2),
(5, 'Emily Brown', 'Emily is a travel writer with a focus on adventure tourism.', 'emily.brown@example.com', 'emily_profile.jpg', '2024-10-11 22:03:22', 2),
(1, 'Nicole Nguyen', 'Nicole is a personal tech columnist based in San Francisco', 'Demo@example.com', 'Nicole_profile.png', '2024-10-11 21:50:17', 2),
(6, 'Nicole Nguyen', 'Nicole is a personal tech columnist based in San Francisco', 'Demo@example.com', 'Nicole_profile.png', '2024-10-11 21:50:17', 2),
(7, 'SDVSD', '', 'VSDVS@GMAIL.COM', 'assets/imgs/users/1.png', '2024-11-20 13:54:39', 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Politics'),
(2, 'Business'),
(3, 'World News'),
(4, 'Sports'),
(5, 'Entertainment'),
(6, 'Opinion'),
(7, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved') DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `article_id`, `user_id`, `content`, `created_at`, `status`) VALUES
(1, 1, 1, 'This is an insightful article on climate change.', '2024-11-02 11:30:00', 'approved'),
(2, 1, 2, 'I agree with the points mentioned here!', '2024-11-02 11:45:00', 'approved'),
(3, 1, 3, 'Could you provide more data on emissions?', '2024-11-02 12:00:00', 'pending'),
(4, 2, 4, 'Great article on technology advancements!', '2024-11-01 14:20:00', 'approved'),
(5, 2, 5, 'This article misses key security concerns.', '2024-11-01 14:45:00', 'approved'),
(6, 3, 6, 'Is this information verified?', '2024-11-02 07:10:00', ''),
(7, 3, 7, 'Thanks for raising the question!', '2024-11-02 07:30:00', 'approved'),
(8, 3, 8, 'Could you clarify this part?', '2024-11-02 08:15:00', 'pending'),
(9, 9, 2, 'Generative AI is not only transforming creative industries but is now being integrated into sectors like finance, healthcare, education, and customer service. In 2024, businesses are expected to use AI tools more extensively for content creation, data analysis, and customer support. AI-driven automation is enabling small businesses to scale operations and offering larger enterprises personalized insights.\r\n\r\nHow to leverage it: Companies can benefit by using AI for customized marketing campaigns, automated customer service, and in-depth data analysis for customer behavior patterns. Ensuring AI transparency and ethics will be crucial to maintaining customer trust and regulatory compliance.', '2024-11-16 06:09:39', 'approved'),
(10, 9, 2, 'The article does a great job of showcasing the transformative impact of AI across industries, making it highly relevant for businesses in 2024. The emphasis on practical applications and ethical considerations adds significant value. To enhance it further, examples of real-world AI use, a discussion on adoption challenges, and a deeper focus on specific sectors like healthcare or finance would be helpful. Including statistics, cost-effective solutions for small businesses, and insights into AI’s role in driving innovation could make it even more impactful.', '2024-11-16 06:12:17', 'approved'),
(11, 9, 2, 'The article provides a clear and timely overview of AI’s growing influence across industries, with practical advice for businesses in 2024. Highlighting ethics and transparency is a strong point. However, it could be strengthened by including real-world examples, addressing challenges like costs or skills, and offering deeper insights into specific industries. Adding statistics and exploring budget-friendly solutions or AI-driven innovation would make it more comprehensive and engaging.', '2024-11-16 06:13:47', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `media_type` enum('video','image','cover') DEFAULT NULL,
  `media_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `article_id`, `media_type`, `media_url`, `created_at`) VALUES
(1, 1, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(2, 2, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(3, 3, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(4, 4, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(5, 5, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(6, 6, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(7, 7, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(8, 8, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(108, 9, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-11-14 02:58:03'),
(107, 10, 'image', 'assets/imgs/articles/iPhonenewsletter.jpg', '2024-11-14 00:42:06'),
(11, 11, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(12, 12, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(13, 13, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(14, 14, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(15, 15, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(16, 16, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(17, 17, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(18, 18, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(19, 19, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(20, 20, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(21, 21, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(22, 22, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(23, 23, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(24, 24, 'image', 'assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(25, 25, 'video', 'assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(26, 13, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(27, 14, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(28, 14, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(29, 15, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(30, 15, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(31, 16, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(32, 16, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(33, 17, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(34, 17, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(35, 18, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(36, 18, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(37, 19, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(38, 19, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(39, 20, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(40, 20, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(41, 21, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(42, 21, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(43, 22, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(44, 22, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(45, 23, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(46, 23, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(49, 25, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(50, 25, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(51, 26, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(52, 26, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(53, 27, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(54, 27, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(55, 28, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(56, 28, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(57, 29, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(58, 29, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(59, 30, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(60, 30, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(61, 31, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(62, 31, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(63, 32, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(64, 32, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(65, 33, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(66, 33, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(67, 34, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(68, 34, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(69, 35, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(70, 35, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(71, 36, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(72, 36, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(73, 37, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(74, 37, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(75, 38, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(76, 38, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(77, 39, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(78, 39, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(79, 40, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(80, 40, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(81, 41, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(82, 41, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(83, 42, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(84, 42, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(85, 43, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(86, 43, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(87, 44, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(88, 44, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(89, 45, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(90, 45, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(91, 46, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(92, 46, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(93, 47, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(94, 47, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(95, 48, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(96, 48, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(97, 49, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(98, 49, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(99, 50, 'video', '../assets/imgs/articles/SnapSave.io-Top 10 Emerging Technologies of 2024 (According to Science).mp4', '2024-10-25 09:42:31'),
(100, 50, 'image', '../assets/imgs/articles/1.png', '2024-10-25 09:42:31'),
(109, 9, 'cover', 'assets/imgs/articles/iPhonenewsletter.jpg', '2024-11-14 02:58:03'),
(110, 74, 'image', 'assets/imgs/articles/cover.jpg', '2024-11-15 22:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_name` varchar(99) NOT NULL,
  `setting_value` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(99) NOT NULL,
  `phone` varchar(99) NOT NULL,
  `push_token` text NOT NULL,
  `emaildata` varchar(10) NOT NULL,
  `sms` varchar(10) NOT NULL,
  `push` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `phone`, `push_token`, `emaildata`, `sms`, `push`, `created_at`) VALUES
(1, 'sa', 'dsa', '', 'on', 'off', 'off', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'Politics'),
(2, 'Economy'),
(3, 'Technology'),
(4, 'Sports'),
(5, 'Entertainment'),
(6, 'AI'),
(7, 'World News'),
(8, 'Opinion'),
(9, 'Climate Change'),
(10, 'Healthcare'),
(11, 'Startups'),
(12, 'Remote Work'),
(13, 'Olympics'),
(14, 'Blockbusters'),
(15, 'E-Commerce'),
(16, 'Business Forecast'),
(17, 'Global Economy'),
(18, 'Green Energy'),
(19, 'Electric Vehicles'),
(20, 'Telecommuting'),
(21, 'Virtual Reality'),
(22, '5G Technology'),
(23, 'Healthcare Innovations'),
(24, 'Smart Cities'),
(25, 'Fashion Trends'),
(26, 'Digital Currency'),
(27, 'Political Discourse'),
(28, 'Sustainable Agriculture'),
(29, 'Mental Health'),
(30, 'Quantum Computing'),
(31, 'Women in Technology'),
(32, 'Social Media Evolution'),
(33, 'Meditation'),
(34, 'Art and Activism'),
(35, 'Sleep Science'),
(36, 'Clean Water'),
(37, 'Gastronomy'),
(38, 'Space Exploration'),
(39, 'Veganism'),
(40, 'Post-Pandemic Travel'),
(41, 'Globalization Impact'),
(42, 'AI Applications'),
(43, 'Youth Activism'),
(44, 'Blockchain Applications'),
(45, 'Podcasting'),
(46, 'Online Education'),
(47, 'Wildlife Conservation'),
(48, 'Retail Trends'),
(49, 'Cryptocurrency Regulations'),
(50, 'Future of Work'),
(51, ''),
(52, 'Business'),
(53, 'Future'),
(54, 'Dance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(99) DEFAULT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `role` enum('subscriber','editor','admin') DEFAULT 'subscriber',
  `subscription_status` enum('active','inactive','expired') DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `image` varchar(99) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `subscription_status`, `created_at`, `image`) VALUES
(1, 'Makram Al Moghrabi', 'makramalmoghrabi@gmail.com', '159753', 'admin', 'active', '2024-10-10 20:22:52', 'assets/imgs/users/user.png'),
(2, 'hayala', 'ex@gmail.com', '123456', 'editor', 'active', '2024-10-10 20:22:52', 'assets/imgs/user.png'),
(3, 'test', 'exam@gmail.com', '123456', 'subscriber', 'active', '2024-10-10 20:22:52', 'assets/imgs/user.png'),
(4, 'New User', 'example@gmail.com', '123456', 'editor', 'inactive', '2024-11-20 13:45:51', 'assets/imgs/users/1.png'),
(7, 'SDVSD', 'VSDVS@GMAIL.COM', 'QWERTY', 'editor', 'active', '2024-11-20 13:54:39', 'assets/imgs/users/1.png'),
(8, 'Arnold ss', 'EXAMPLE22@gmail.com', '123456', 'subscriber', 'active', '2024-11-29 22:58:42', 'assets/imgs/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `user_id`, `category_id`, `count`) VALUES
(1, 2, 1, 25),
(2, 2, 4, 4),
(3, 2, 2, 59),
(4, 2, 7, 1),
(5, 2, 0, 7),
(6, 1, 7, 8),
(7, 1, 1, 3),
(8, 1, 2, 1),
(9, 8, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `article_views`
--
ALTER TABLE `article_views`
  ADD PRIMARY KEY (`article_id`,`view_date`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_name`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`article_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `article_views`
--
ALTER TABLE `article_views`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
