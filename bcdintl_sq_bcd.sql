-- phpMyAdmin SQL Dump
-- version 
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 04:46 AM
-- Server version: 5.7.21-percona-sure2-log
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcdintl_sq_bcd`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_setting`
--

CREATE TABLE `about_setting` (
  `about_id` int(10) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_setting`
--

INSERT INTO `about_setting` (`about_id`, `title`, `content`, `lang_id`) VALUES
(2, 'COMPANY BIOS', '<p>Over the course of 25 years, BC&amp;D has developed a portfolio comprising luxury residential interiors, master plans for world heritage sites and internationally recognized institutional work. Helmed by Cornell-trained Brian Chan, the Hong Kong-based practice with its complement of 50 professionals approaches each project as a unique opportunity to balance contextual considerations (financial, geographic, historical and environmental) with a commitment to ingenuity and above all &ndash; craftsmanship.</p>\r\n', 1),
(3, '', '<p>The digital era has introduced the use of new tools into every profession. Architecture has been a beneficiary, but the input of human judgement and experience remains essential to the process. BC&amp;D espouse this point of view &ndash; and work with clients and other projects partners to coordinate and produce coherent and crafted designs.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(4, '', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1),
(5, 'BRIAN CHAN, FOUNDER AND MANAGING DIRECTOR', '<p>Mr. Brian Chan studied his M. Arch degree from Cornell University, New York, U.S.A in 1987.&nbsp; Upon graduation, Mr. Chan worked in New York State on large scale institutional projects in Long Island and New England with Fred Thomas &amp; Partners P.E., and in California on various residential developments projects, before returning to Hong Kong and becoming&nbsp;a full partner at LWK &amp; Partners Architects. &ldquo;Brian Chan and Associates&rdquo; was found in 1992.</p>\r\n', 1),
(6, '', '<p>Owing to Cornell&rsquo;s approach towards design thinking, Mr. Chan practices architectural design in a holistic manner: a building should be imagined as an integral whole so that both interior and exterior expressions can be achieved&nbsp;simultaneously&nbsp;in accordance to the clients&rsquo; needs thus streamlining the design and construction processes. Mr. Chan also believes that architectural and interior design is interrelated, so BC&amp;D International Limited was established.</p>\r\n', 1),
(7, '', '<p>Mr. Chan is a participating member of AAP (The Association of Architectural Practices), and also a professional member of HKIDA (Hong Kong Interior Design Association); a guest critic of the accredited academic and vocational institutions such as School of Architecture, Hong Kong Chinese University; Hong Kong Polytechnic University; a member of the panel of Judges of the Asia Pacific Interior Design Awards and a guest speaker at hospitality conventions.</p>\r\n', 1),
(8, '公司簡介', '<p>自25年前成立以來，BC&amp;D一直堅持對設計品質的追求，不斷推陳出新，呈現出一個又一個獨一無二的高品質設計作品。作品類型涵蓋高尚住宅室內設計、高端精品酒店設計、世界遺產地規劃設計及國際化公共建盤設計等不同領域。BC&amp;D位於香港，由畢業于康奈爾大學的陳君毅先生和50名專業設計師組成。在陳先生的帶領下，BC&amp;D的設計團隊將每個項目視作為獨一無二的設計課題，秉持著精益求精的匠人精神，在錯綜複習的專案文脈(包括經濟、地理、歷史和自然環境因素等)中尋找平衡，打造因地制宜的、富於誠意的設計作品。</p>\r\n', 2),
(9, '', '<p>高科技時代將智慧化的新工具引入各行各業，建築行業也不例外。在以高科技手段指導設計的大潮流下，BC&amp;D卻堅信人的智慧無法被任何智慧工具所取代，設計師從個人生活體驗和設計經驗中提煉出細膩的洞察力、藝術的審美品味以及準確的判斷力，這些才是真正賦予設計作品的靈魂，是整個建築設計過程的核心。懷著這種信念，BC&amp;D與客戶及其他專案參與方溝通協調，用經驗和智慧指導設計，不斷推出精雕細琢而又澤然天成的設計作品。</p>\r\n', 2),
(10, '', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2),
(11, '陳君毅先生 , 始創人及董事總經理', '<p>陳君毅先生1987年於美國紐約康納爾大學取得建築系碩士學位。畢業後，陳先生於紐約的大型機構工作，曾參與長島和新格蘭的Fred Thomas &amp; Partners P.E.合作的項目，以及曾負責加利福尼亞州不同的住宅發展項目。陳先生在回港後曾擔任梁黃顧建築師(香港)事務所有限公司之合伙人，之後於1992正式成立&ldquo;陳君毅設計事務所&rdquo;。</p>\r\n', 2),
(12, '', '<p>根據&ldquo;康奈爾&rdquo;對設計的思維想法，陳先生認為要實現建築上的整體方式是： 建築應該被想像為一整體，既可滿足客顧之需求同時，亦能夠內外呼應表達，從而簡化設計和施工的過程。陳先生也認為建築及室內設計是互相關連的，&ldquo;陳君毅設計有限公司&rdquo;就這樣應運而生了。</p>\r\n', 2),
(13, '', '<p>陳先生是APP（建築師事務所商會）的成員，同時亦是HKIDA（香港室內設計協會）的專業會員。他在香港中文大學、香港理工大學、其他設計學院等的學術機構擔任評委，也是亞太區室內設計比賽的評審團之一。同時也經常被邀請為設計行業內的演講嘉賓。</p>\r\n', 2),
(14, '公司简介', '<p>自25年前成立以来，BC&amp;D一直坚持对设计质量的追求，不断推陈出新，呈现出一个又一个独一无二的高质量设计作品。作品类型涵盖高尚住宅室内设计、高端精品酒店设计、世界遗产地规划设计及国际化公共建盘设计等不同领域。BC&amp;D位于香港，由毕业于康奈尔大学的陈君毅先生和50名专业设计师组成。在陈先生的带领下，BC&amp;D的设计团队将每个项目视作为独一无二的设计课题，秉持着精益求精的匠人精神，在错综复习的项目文脉(包括经济、地理、历史和自然环境因素等)中寻找平衡，打造因地制宜的、富于诚意的设计作品。</p>\r\n', 3),
(15, '', '<p>高科技时代将智能化的新工具引入各行各业，建筑行业也不例外。在以高科技手段指导设计的大潮流下，BC&amp;D却坚信人的智慧无法被任何智能工具所取代，设计师从个人生活体验和设计经验中提炼出细腻的洞察力、艺术的审美品味以及准确的判断力，这些才是真正赋予设计作品的灵魂，是整个建筑设计过程的核心。怀着这种信念，BC&amp;D与客户及其他项目参与方沟通协调，用经验和智慧指导设计，不断推出精雕细琢而又泽然天成的设计作品。</p>\r\n', 3),
(16, '', '', 3),
(17, '陈君毅先生 , 始创人及董事总经理', '<p>陈君毅先生1987年于美国纽约康纳尔大学取得建筑系硕士学位。毕业后，陈先生于纽约的大型机构工作，曾参与长岛和新格兰的Fred Thomas &amp; Partners P.E.合作的项目，以及曾负责加利福尼亚州不同的住宅发展项目。陈先生在回港后曾担任梁黄顾建筑师(香港)事务所有限公司之合伙人，之后于1992正式成立&ldquo;陈君毅设计事务所&rdquo;。</p>\r\n', 3),
(18, '', '<p>根据&ldquo;康奈尔&rdquo;对设计的思维想法，陈先生认为要实现建筑上的整体方式是： 建筑应该被想象为一整体，既可满足客顾之需求同时，亦能够内外呼应表达，从而简化设计和施工的过程。陈先生也认为建筑及室内设计是互相关连的，&ldquo;陈君毅设计有限公司&rdquo;就这样应运而生了。</p>\r\n', 3),
(19, '', '<p>陈先生是APP（建筑师事务所商会）的成员，同时亦是HKIDA（香港室内设计协会）的专业会员。他在香港中文大学、香港理工大学、其他设计学院等的学术机构担任评委，也是亚太区室内设计比赛的评审团之一。同时也经常被邀请为设计行业内的演讲嘉宾。</p>\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(2) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address`, `lang_id`) VALUES
(1, '15/F Citicorp Centre,<br>18 Whitfield Road,<br>Hong Kong', 1),
(2, '香港威菲路道18號<br>萬國寶通中心15樓<br><br>', 2),
(3, '香港威菲路道18号<br>万国宝通中心15楼<br><br>', 3),
(4, '', 4),
(5, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lon` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`email`, `phone`, `email2`, `lat`, `lon`) VALUES
('info@bcd-intl.com', '+852 31040791', 'recruitment@bcd-intl.com', '22.286125', '114.190211'),
('info@bcd-intl.com', '+852 31040791', 'recruitment@bcd-intl.com', '22.286125', '114.190211');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `set_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`set_id`, `create_date`) VALUES
(1, '2017-02-07 12:01:02'),
(2, '2017-02-07 12:01:06'),
(3, '2017-02-07 12:01:23'),
(4, '2017-07-02 22:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category_setting`
--

CREATE TABLE `gallery_category_setting` (
  `category_id` int(10) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `set_id` int(10) NOT NULL,
  `lang_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_category_setting`
--

INSERT INTO `gallery_category_setting` (`category_id`, `category`, `set_id`, `lang_id`) VALUES
(1, 'Commercial & Institutional', 1, 1),
(2, '商業', 1, 2),
(3, '商业', 1, 3),
(4, '', 1, 4),
(5, '', 1, 5),
(6, 'Hospitality', 2, 1),
(7, '酒店', 2, 2),
(8, '酒店', 2, 3),
(9, '', 2, 4),
(10, '', 2, 5),
(11, 'Residential', 3, 1),
(12, '住宅', 3, 2),
(13, '住宅', 3, 3),
(14, '', 3, 4),
(15, '', 3, 5),
(16, 'Restaurant', 4, 1),
(17, '餐廳', 4, 2),
(18, '餐厅', 4, 3),
(19, '', 4, 4),
(20, '', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lang_setting`
--

CREATE TABLE `lang_setting` (
  `lang_id` int(2) NOT NULL,
  `lang_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `open` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lang_setting`
--

INSERT INTO `lang_setting` (`lang_id`, `lang_code`, `display_name`, `open`) VALUES
(1, 'EN', 'EN', 1),
(2, 'ZH', '繁', 1),
(3, 'CN', '簡', 1),
(4, 'JP', '日', 0),
(5, 'IT', 'IT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `url` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `url`, `name`, `lang_id`, `status`) VALUES
(1, 'about.php', 'About', 1, 1),
(2, 'gallery.php', 'Gallery', 1, 1),
(4, 'news-article.php', 'News', 1, 1),
(5, 'contact.php', 'Contact', 1, 1),
(6, 'about.php', '關於我們', 2, 1),
(7, 'gallery.php', '項目', 2, 1),
(8, 'news-article.php', '最新資訊', 2, 0),
(9, 'contact.php', '聯絡我們', 2, 1),
(10, 'about.php', '关于我们', 3, 1),
(11, 'gallery.php', '项目', 3, 1),
(12, 'news-article.php', '最新资讯', 3, 0),
(13, 'contact.php', '联络我们', 3, 1),
(14, 'about.php', 'About', 4, 0),
(15, 'gallery.php', 'Gallery', 4, 0),
(16, 'news-article.php', 'News', 4, 0),
(17, 'contact.php', 'Contact', 4, 0),
(18, 'about.php', 'About', 5, 1),
(19, 'gallery.php', 'Gallery', 5, 0),
(20, 'news.php', 'News', 5, 0),
(21, 'contact.php', 'Contact', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meta_tag_setting`
--

CREATE TABLE `meta_tag_setting` (
  `meta_tag_id` int(11) NOT NULL,
  `keyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meta_tag_setting`
--

INSERT INTO `meta_tag_setting` (`meta_tag_id`, `keyword`, `description`, `lang_id`) VALUES
(1, 'BC & D International Limited', 'BC&D International Limited has developed its expertise in architectural and interior designs, corporate branding, and administration of projects since its original founding as Chan and Associates under the directorship of Mr. Brian Chan 25 years ago.  BC&D’s portfolio of works includes five star hotels, premium residential towers, private apartment, Grade A corporate buildings, and institutional works all across Greater China and S.E. Asia. Our clients include private developers, major corporati', 1),
(2, 'BC & D International Limited', 'BC&D International Limited has developed its expertise in architectural and interior designs, corporate branding, and administration of projects since its original founding as Chan and Associates under the directorship of Mr. Brian Chan 25 years ago.  BC&D’s portfolio of works includes five star hotels, premium residential towers, private apartment, Grade A corporate buildings, and institutional works all across Greater China and S.E. Asia. Our clients include private developers, major corporati', 2),
(3, 'BC & D International Limited', 'BC&D International Limited has developed its expertise in architectural and interior designs, corporate branding, and administration of projects since its original founding as Chan and Associates under the directorship of Mr. Brian Chan 25 years ago.  BC&D’s portfolio of works includes five star hotels, premium residential towers, private apartment, Grade A corporate buildings, and institutional works all across Greater China and S.E. Asia. Our clients include private developers, major corporati', 3),
(4, 'BC & D International Limited', 'BC&D International Limited has developed its expertise in architectural and interior designs, corporate branding, and administration of projects since its original founding as Chan and Associates under the directorship of Mr. Brian Chan 25 years ago.  BC&D’s portfolio of works includes five star hotels, premium residential towers, private apartment, Grade A corporate buildings, and institutional works all across Greater China and S.E. Asia. Our clients include private developers, major corporati', 4),
(5, 'BC & D International Limited', 'BC&D International Limited has developed its expertise in architectural and interior designs, corporate branding, and administration of projects since its original founding as Chan and Associates under the directorship of Mr. Brian Chan 25 years ago.  BC&D’s portfolio of works includes five star hotels, premium residential towers, private apartment, Grade A corporate buildings, and institutional works all across Greater China and S.E. Asia. Our clients include private developers, major corporati', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `news_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `image_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `lang_id`, `status`, `image_path`) VALUES
(1, 'Test Title', 1, 0, 'images/news/1/1.jpg'),
(2, '', 1, 0, ''),
(3, '', 1, 0, ''),
(4, '', 1, 0, ''),
(5, '', 1, 0, ''),
(6, 'American Architecture Prize Design of the Year Award', 1, 1, 'images/news/6/6.jpg'),
(7, '', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `news_section`
--

CREATE TABLE `news_section` (
  `section_id` int(10) NOT NULL,
  `news_id` int(10) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_section`
--

INSERT INTO `news_section` (`section_id`, `news_id`, `content`) VALUES
(2, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sit expedita, iusto repellendus cumque, officia architecto consequatur illo fuga eum sed ut autem eos voluptas. Nemo, a, rem! Atque quisquam aperiam eaque tenetur autem, soluta itaque omnis. Minus nesciunt, sint, animi illum quo ab voluptate esse delectus unde maiores iure, quasi a suscipit ipsam aliquid voluptatem. Perspiciatis eveniet, pariatur illum aut cum dolor neque consequatur error aliquid facilis in quasi temporibus assumenda tempore, doloremque autem saepe enim nihil. Voluptates asperiores ullam voluptate quas similique ratione quia hic, eum distinctio laboriosam, consectetur tempora voluptatibus optio natus cumque est necessitatibus dolore alias.</p>\r\n'),
(3, 1, '<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sit expedita, iusto repellendus cumque, officia architecto consequatur illo fuga eum sed ut autem eos voluptas. Nemo, a, rem! Atque quisquam aperiam eaque tenetur autem, soluta itaque omnis.&nbsp;</strong></p>\r\n'),
(4, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sit expedita, iusto repellendus cumque, officia architecto consequatur illo fuga eum sed ut autem eos voluptas. Nemo, a, rem! Atque quisquam aperiam eaque tenetur autem, soluta itaque omnis. Minus nesciunt, sint, animi illum quo ab voluptate esse delectus unde maiores iure, quasi a suscipit ipsam aliquid voluptatem. Perspiciatis eveniet, pariatur illum aut cum dolor neque consequatur error aliquid facilis in quasi temporibus assumenda tempore, doloremque autem saepe enim nihil. Voluptates asperiores ullam voluptate quas similique ratione quia hic, eum distinctio laboriosam, consectetur tempora voluptatibus optio natus cumque est necessitatibus dolore alias.</p>\r\n'),
(5, 6, '<p>BC&amp;D&#39;s design for the St. Paul&#39;s Hospital (Hong Kong) won the Interior Design Award of The American Architecture Prize 2017. Award ceremony will be held on 27th Oct 2017 at the New Museum Sky Room in New York. We express our deep our deep apprecitation for the Client and project team to make this project an iconic one.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `photo_slider`
--

CREATE TABLE `photo_slider` (
  `photo_id` int(11) NOT NULL,
  `photo_path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `dorder` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photo_slider`
--

INSERT INTO `photo_slider` (`photo_id`, `photo_path`, `dorder`) VALUES
(3, 'images/photo_slider/3.jpg', 6),
(4, 'images/photo_slider/4.jpg', 3),
(7, 'images/photo_slider/5.jpg', 7),
(24, 'images/photo_slider/8.jpg', 2),
(25, 'images/photo_slider/25.jpg', 5),
(26, 'images/photo_slider/26.jpg', 4),
(27, 'images/photo_slider/27.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL,
  `set_id` int(10) NOT NULL,
  `seopath` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dorder` int(3) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `set_id`, `seopath`, `dorder`, `status`) VALUES
(1, 1, 'kerry-centre-hong-kong', 2, 1),
(2, 2, 'four-point-lhasa', 3, 1),
(3, 2, 'shangri-la-beijing-ii', 4, 1),
(4, 2, 'shangri-la-beijing-iii', 7, 0),
(5, 2, 'traders-kuala-lumpur', 6, 1),
(6, 3, 'severn-road', 3, 1),
(7, 3, 'south-bay', 1, 1),
(8, 1, 'kerry-centre-shenzhen', 3, 1),
(9, 1, 'tencent-headquarter-qianhai', 7, 0),
(10, 1, 'luxe-lake-headquarter-chengdu', 8, 0),
(11, 1, 'marina-development-pudong-shanghai', 9, 0),
(12, 1, 'bund-water-mixed-use-building-shanghai', 10, 0),
(13, 1, 'union-pay-headquarter-iii-shanghai', 11, 0),
(14, 1, 'dragons-range-club-hong-kong', 4, 1),
(15, 1, 'east-kowloon-police-headquarter-hong-kong', 5, 1),
(16, 1, 'fire-services-training-school-hong-kong', 6, 1),
(17, 1, 'hospital', 1, 1),
(18, 2, 'shangri-la-qingdao', 5, 1),
(19, 2, 'az-hotel-beijing', 1, 1),
(20, 2, 'maison-5-sanlitun-beijing', 2, 1),
(21, 2, 'hilton-hotel-hangzhou', 8, 0),
(22, 3, '56-repluse-bay-hong-kong', 2, 1),
(23, 3, 'the-highcliff-hong-kong', 7, 1),
(24, 3, 'the-argyle-hong-kong', 6, 1),
(25, 3, 't7-mayfair-by-the-sea-i-hong-kong', 4, 1),
(26, 3, 'h9-mayfair-by-the-sea-i-hong-kong', 5, 1),
(27, 1, 'foshan-huaya-financial-center', 12, 0),
(28, 1, 'foshan-huaya-financial-center', 13, 0),
(29, 4, 'nishimura-shangri-la-beijing', 5, 0),
(30, 4, 'azur-shangri-la-beijing', 6, 1),
(31, 4, 'skybar-traders-kuala-lumpur', 3, 1),
(32, 4, 'gobo-chit-chat-traders-kuala-lumpur', 4, 1),
(33, 4, '33', 1, 1),
(34, 4, 'townsquare-cafe-artyzen-habitat-hotel-beijing', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_photo`
--

CREATE TABLE `project_photo` (
  `project_photo_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `dorder` int(3) NOT NULL,
  `photo_path` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_photo`
--

INSERT INTO `project_photo` (`project_photo_id`, `project_id`, `dorder`, `photo_path`) VALUES
(103, 1, 1, 'images/project_photo/1/103.jpg'),
(104, 1, 2, 'images/project_photo/1/104.jpg'),
(105, 1, 3, 'images/project_photo/1/105.jpg'),
(106, 1, 4, 'images/project_photo/1/106.jpg'),
(107, 1, 5, 'images/project_photo/1/107.jpg'),
(108, 8, 2, 'images/project_photo/8/108.jpg'),
(109, 8, 1, 'images/project_photo/8/109.jpg'),
(110, 8, 3, 'images/project_photo/8/110.jpg'),
(111, 8, 4, 'images/project_photo/8/111.jpg'),
(112, 8, 5, 'images/project_photo/8/112.jpg'),
(114, 8, 6, 'images/project_photo/8/113.jpg'),
(115, 9, 2, 'images/project_photo/9/115.jpg'),
(116, 9, 1, 'images/project_photo/9/116.jpg'),
(117, 9, 3, 'images/project_photo/9/117.jpg'),
(118, 9, 4, 'images/project_photo/9/118.jpg'),
(119, 9, 5, 'images/project_photo/9/119.jpg'),
(120, 10, 1, 'images/project_photo/10/120.jpg'),
(121, 10, 2, 'images/project_photo/10/121.jpg'),
(122, 10, 3, 'images/project_photo/10/122.jpg'),
(123, 10, 4, 'images/project_photo/10/123.jpg'),
(124, 10, 5, 'images/project_photo/10/124.jpg'),
(125, 11, 1, 'images/project_photo/11/125.jpg'),
(126, 11, 2, 'images/project_photo/11/126.jpg'),
(127, 11, 3, 'images/project_photo/11/127.jpg'),
(128, 11, 4, 'images/project_photo/11/128.jpg'),
(129, 12, 1, 'images/project_photo/12/129.jpg'),
(130, 12, 2, 'images/project_photo/12/130.jpg'),
(131, 12, 3, 'images/project_photo/12/131.jpg'),
(132, 13, 1, 'images/project_photo/13/132.jpg'),
(133, 13, 2, 'images/project_photo/13/133.jpg'),
(134, 14, 1, 'images/project_photo/14/134.jpg'),
(135, 14, 2, 'images/project_photo/14/135.jpg'),
(136, 14, 3, 'images/project_photo/14/136.jpg'),
(137, 14, 4, 'images/project_photo/14/137.jpg'),
(138, 14, 5, 'images/project_photo/14/138.jpg'),
(139, 15, 1, 'images/project_photo/15/139.jpg'),
(140, 15, 2, 'images/project_photo/15/140.jpg'),
(141, 15, 3, 'images/project_photo/15/141.jpg'),
(142, 15, 4, 'images/project_photo/15/142.jpg'),
(143, 15, 5, 'images/project_photo/15/143.jpg'),
(144, 16, 1, 'images/project_photo/16/144.jpg'),
(145, 16, 2, 'images/project_photo/16/145.jpg'),
(146, 16, 3, 'images/project_photo/16/146.jpg'),
(147, 16, 4, 'images/project_photo/16/147.jpg'),
(148, 16, 5, 'images/project_photo/16/148.jpg'),
(171, 2, 1, 'images/project_photo/2/171.jpg'),
(172, 2, 2, 'images/project_photo/2/172.jpg'),
(173, 2, 3, 'images/project_photo/2/173.jpg'),
(174, 2, 4, 'images/project_photo/2/174.jpg'),
(175, 2, 6, 'images/project_photo/2/175.jpg'),
(176, 2, 5, 'images/project_photo/2/176.jpg'),
(177, 3, 1, 'images/project_photo/3/177.jpg'),
(178, 3, 2, 'images/project_photo/3/178.jpg'),
(179, 3, 3, 'images/project_photo/3/179.jpg'),
(180, 3, 4, 'images/project_photo/3/180.jpg'),
(181, 3, 5, 'images/project_photo/3/181.jpg'),
(182, 3, 6, 'images/project_photo/3/182.jpg'),
(183, 3, 7, 'images/project_photo/3/183.jpg'),
(185, 3, 8, 'images/project_photo/3/185.jpg'),
(186, 3, 9, 'images/project_photo/3/186.jpg'),
(187, 5, 1, 'images/project_photo/5/187.jpg'),
(188, 5, 2, 'images/project_photo/5/188.jpg'),
(189, 5, 3, 'images/project_photo/5/189.jpg'),
(190, 5, 4, 'images/project_photo/5/190.jpg'),
(191, 5, 5, 'images/project_photo/5/191.jpg'),
(192, 5, 6, 'images/project_photo/5/192.jpg'),
(193, 5, 7, 'images/project_photo/5/193.jpg'),
(194, 4, 1, 'images/project_photo/4/194.jpg'),
(195, 4, 2, 'images/project_photo/4/195.jpg'),
(196, 4, 3, 'images/project_photo/4/196.jpg'),
(197, 4, 4, 'images/project_photo/4/197.jpg'),
(198, 4, 5, 'images/project_photo/4/198.jpg'),
(199, 4, 6, 'images/project_photo/4/199.jpg'),
(200, 18, 1, 'images/project_photo/18/200.jpg'),
(201, 18, 2, 'images/project_photo/18/201.jpg'),
(202, 18, 3, 'images/project_photo/18/202.jpg'),
(203, 18, 4, 'images/project_photo/18/203.jpg'),
(204, 18, 5, 'images/project_photo/18/204.jpg'),
(214, 20, 1, 'images/project_photo/20/214.jpg'),
(215, 20, 2, 'images/project_photo/20/215.jpg'),
(216, 20, 3, 'images/project_photo/20/216.jpg'),
(217, 20, 4, 'images/project_photo/20/217.jpg'),
(218, 20, 5, 'images/project_photo/20/218.jpg'),
(219, 21, 1, 'images/project_photo/21/219.jpg'),
(220, 21, 2, 'images/project_photo/21/220.jpg'),
(221, 7, 1, 'images/project_photo/7/221.jpg'),
(222, 7, 2, 'images/project_photo/7/222.jpg'),
(223, 7, 3, 'images/project_photo/7/223.jpg'),
(224, 7, 4, 'images/project_photo/7/224.jpg'),
(225, 7, 5, 'images/project_photo/7/225.jpg'),
(226, 22, 1, 'images/project_photo/22/226.56 Repluse Bay, Hong Kong_01'),
(230, 22, 2, 'images/project_photo/22/227.jpg'),
(231, 22, 3, 'images/project_photo/22/231.jpg'),
(232, 22, 4, 'images/project_photo/22/232.jpg'),
(234, 23, 1, 'images/project_photo/23/234.jpg'),
(235, 23, 2, 'images/project_photo/23/235.jpg'),
(236, 23, 3, 'images/project_photo/23/236.jpg'),
(241, 24, 1, 'images/project_photo/24/241.jpg'),
(242, 24, 2, 'images/project_photo/24/242.jpg'),
(243, 25, 1, 'images/project_photo/25/243.jpg'),
(247, 25, 2, 'images/project_photo/25/244.jpg'),
(248, 25, 3, 'images/project_photo/25/248.jpg'),
(249, 25, 4, 'images/project_photo/25/249.jpg'),
(250, 26, 1, 'images/project_photo/26/250.jpg'),
(251, 26, 2, 'images/project_photo/26/251.jpg'),
(252, 26, 3, 'images/project_photo/26/252.jpg'),
(253, 26, 4, 'images/project_photo/26/253.jpg'),
(262, 27, 1, 'images/project_photo/27/262.jpg'),
(263, 27, 2, 'images/project_photo/27/263.jpg'),
(264, 27, 3, 'images/project_photo/27/264.jpg'),
(268, 28, 1, 'images/project_photo/28/268.Foshan Huaya Financial Center_01'),
(269, 28, 2, 'images/project_photo/28/269.jpg'),
(270, 28, 3, 'images/project_photo/28/270.jpg'),
(271, 28, 4, 'images/project_photo/28/271.jpg'),
(278, 28, 5, 'images/project_photo/28/272.jpg'),
(279, 28, 6, 'images/project_photo/28/279.jpg'),
(280, 28, 7, 'images/project_photo/28/280.jpg'),
(281, 6, 1, 'images/project_photo/6/281.jpg'),
(282, 6, 2, 'images/project_photo/6/282.jpg'),
(283, 6, 3, 'images/project_photo/6/283.jpg'),
(284, 6, 4, 'images/project_photo/6/284.jpg'),
(285, 17, 1, 'images/project_photo/17/285.jpg'),
(286, 17, 2, 'images/project_photo/17/286.jpg'),
(287, 17, 3, 'images/project_photo/17/287.jpg'),
(288, 17, 5, 'images/project_photo/17/288.jpg'),
(289, 17, 4, 'images/project_photo/17/289.jpg'),
(290, 17, 6, 'images/project_photo/17/290.jpg'),
(291, 17, 7, 'images/project_photo/17/291.jpg'),
(292, 17, 8, 'images/project_photo/17/292.jpg'),
(293, 17, 9, 'images/project_photo/17/293.jpg'),
(294, 17, 10, 'images/project_photo/17/294.jpg'),
(295, 24, 3, 'images/project_photo/24/295.jpg'),
(297, 29, 1, 'images/project_photo/29/297.jpg'),
(299, 31, 1, 'images/project_photo/31/299.jpg'),
(300, 31, 2, 'images/project_photo/31/300.jpg'),
(302, 32, 1, 'images/project_photo/32/301.jpg'),
(303, 30, 1, 'images/project_photo/30/303.jpg'),
(317, 19, 1, 'images/project_photo/19/317.jpg'),
(318, 19, 2, 'images/project_photo/19/318.jpg'),
(319, 19, 3, 'images/project_photo/19/319.jpg'),
(320, 19, 4, 'images/project_photo/19/320.jpg'),
(321, 19, 5, 'images/project_photo/19/321.jpg'),
(322, 19, 6, 'images/project_photo/19/322.jpg'),
(323, 19, 7, 'images/project_photo/19/323.jpg'),
(324, 33, 1, 'images/project_photo/33/324.jpg'),
(325, 33, 2, 'images/project_photo/33/325.jpg'),
(326, 33, 3, 'images/project_photo/33/326.jpg'),
(327, 33, 4, 'images/project_photo/33/327.jpg'),
(328, 34, 1, 'images/project_photo/34/328.jpg'),
(329, 34, 2, 'images/project_photo/34/329.jpg'),
(330, 34, 3, 'images/project_photo/34/330.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_section`
--

CREATE TABLE `project_section` (
  `project_section_id` int(10) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) NOT NULL,
  `section_set_id` int(10) NOT NULL,
  `lang_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_section`
--

INSERT INTO `project_section` (`project_section_id`, `content`, `project_id`, `section_set_id`, `lang_id`) VALUES
(1, '', 1, 1, 1),
(2, '', 1, 1, 2),
(3, '', 1, 1, 3),
(4, '', 1, 1, 4),
(5, '', 1, 1, 5),
(6, '', 1, 2, 1),
(7, '', 1, 2, 2),
(8, '', 1, 2, 3),
(9, '', 1, 2, 4),
(10, '', 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `project_section_set`
--

CREATE TABLE `project_section_set` (
  `section_set_id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_section_set`
--

INSERT INTO `project_section_set` (`section_set_id`, `project_id`, `create_date`) VALUES
(1, 1, '2017-02-07 21:24:07'),
(2, 1, '2017-02-07 21:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `project_title`
--

CREATE TABLE `project_title` (
  `project_title_id` int(10) NOT NULL,
  `project_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) NOT NULL,
  `lang_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_title`
--

INSERT INTO `project_title` (`project_title_id`, `project_title`, `project_id`, `lang_id`) VALUES
(1, 'Kerry Centre, Hong Kong', 1, 1),
(2, '香港嘉里中心', 1, 2),
(3, '香港嘉里中心', 1, 3),
(4, '', 1, 4),
(5, '', 1, 5),
(8, 'Four Point by Sheraton, Lhasa', 2, 1),
(9, '拉薩福朋喜來登酒店', 2, 2),
(10, '拉萨福朋喜来登酒店', 2, 3),
(11, '', 2, 4),
(12, '', 2, 5),
(15, 'Shangri-La Beijing', 3, 1),
(16, '北京香格里拉大酒店', 3, 2),
(17, '北京香格里拉大酒店', 3, 3),
(18, '', 3, 4),
(19, '', 3, 5),
(22, 'Shangri-La Tianjin', 4, 1),
(23, '天津香格里拉大酒店', 4, 2),
(24, '天津香格里拉大酒店', 4, 3),
(25, '', 4, 4),
(26, '', 4, 5),
(29, 'Traders Kuala Lumpur', 5, 1),
(30, '吉隆坡盛貿酒店', 5, 2),
(31, '吉隆坡盛贸酒店', 5, 3),
(32, '', 5, 4),
(33, '', 5, 5),
(36, '8 Severn Road, The Peak, Hong Kong', 6, 1),
(37, '施勳道8號，山頂，香港', 6, 2),
(38, '施勋道8号，山顶，香港', 6, 3),
(39, '', 6, 4),
(40, '', 6, 5),
(43, 'South Bay Close, Hong Kong', 7, 1),
(44, '南湾坊，浅水湾，香港', 7, 2),
(45, '南湾坊，浅水湾，香港', 7, 3),
(46, '', 7, 4),
(47, '', 7, 5),
(48, 'Kerry Centre, Shenzhen', 8, 1),
(49, '深圳嘉里中心', 8, 2),
(50, '深圳嘉里中心', 8, 3),
(51, '', 8, 4),
(52, '', 8, 5),
(55, 'Tencent Headquarter Qianhai, Shenzhen', 9, 1),
(56, '騰訊深圳前海總部', 9, 2),
(57, '腾讯深圳前海总部', 9, 3),
(58, '', 9, 4),
(59, '', 9, 5),
(60, 'Luxe Lake Headquarter, Chengdu', 10, 1),
(61, 'Luxe Lake Headquarter, Chengdu', 10, 2),
(62, 'Luxe Lake Headquarter, Chengdu', 10, 3),
(63, '', 10, 4),
(64, '', 10, 5),
(86, 'Marina Development Pudong, Shanghai', 11, 1),
(87, 'Marina Development Pudong, Shanghai', 11, 2),
(88, 'Marina Development Pudong, Shanghai', 11, 3),
(89, '', 11, 4),
(90, '', 11, 5),
(93, 'Bund Water Mixed Use Building, Shanghai', 12, 1),
(94, 'Bund Water Mixed Use Building, Shanghai', 12, 2),
(95, 'Bund Water Mixed Use Building, Shanghai', 12, 3),
(96, '', 12, 4),
(97, '', 12, 5),
(100, 'Union Pay Headquarter III, Shanghai', 13, 1),
(101, 'Union Pay Headquarter III, Shanghai', 13, 2),
(102, 'Union Pay Headquarter III, Shanghai', 13, 3),
(103, '', 13, 4),
(104, '', 13, 5),
(107, 'Dragons Range Club, Hong Kong', 14, 1),
(108, '香港玖瓏山会所', 14, 2),
(109, '香港玖珑山会所', 14, 3),
(110, '', 14, 4),
(111, '', 14, 5),
(114, 'East Kowloon Police Headquarter, Hong Kong', 15, 1),
(115, '香港東九龍警察總部', 15, 2),
(116, '香港东九龙警察总部', 15, 3),
(117, '', 15, 4),
(118, '', 15, 5),
(121, 'Fire Services Training School, Hong Kong', 16, 1),
(122, '香港消防訓練學校', 16, 2),
(123, '香港消防训练学校', 16, 3),
(124, '', 16, 4),
(125, '', 16, 5),
(128, 'St. Paul\'s Hospital, Hong Kong', 17, 1),
(129, '香港聖保祿醫院', 17, 2),
(130, '香港圣保禄医院', 17, 3),
(131, '', 17, 4),
(132, '', 17, 5),
(135, 'Shangri-La Qingdao', 18, 1),
(136, '青島香格里拉大酒店', 18, 2),
(137, '青岛香格里拉大酒店', 18, 3),
(138, '', 18, 4),
(139, '', 18, 5),
(142, 'Artyzen Habitat Hotel, Beijing', 19, 1),
(143, '北京雅辰悦居酒店', 19, 2),
(144, '北京雅辰悦居酒店', 19, 3),
(145, '', 19, 4),
(146, '', 19, 5),
(149, 'Maison 5, Sanlitun, Beijing', 20, 1),
(150, '五居，三里屯，北京', 20, 2),
(151, '五居，三里屯，北京', 20, 3),
(152, '', 20, 4),
(153, '', 20, 5),
(156, 'Hilton Hotel, Hangzhou', 21, 1),
(157, '杭州希爾頓酒店', 21, 2),
(158, '杭州希尔顿酒店', 21, 3),
(159, '', 21, 4),
(160, '', 21, 5),
(163, '56 Repluse Bay, Hong Kong', 22, 1),
(164, '淺水灣道56號，香港', 22, 2),
(165, '浅水湾道56号，香港', 22, 3),
(166, '', 22, 4),
(167, '', 22, 5),
(170, 'The HighCliff, Hong Kong', 23, 1),
(171, '曉廬，山頂，香港', 23, 2),
(172, '晓庐，山顶，香港', 23, 3),
(173, '', 23, 4),
(174, '', 23, 5),
(177, 'The Argyle, Hong Kong', 24, 1),
(178, '香港亞皆老街102號', 24, 2),
(179, '香港亚皆老街102号', 24, 3),
(180, '', 24, 4),
(181, '', 24, 5),
(182, 'T7 Mayfair By the Sea I, Tai Po, Hong Kong', 25, 1),
(183, '逸瓏灣T7，大埔，香港', 25, 2),
(184, '逸珑湾T7，大埔，香港', 25, 3),
(185, '', 25, 4),
(186, '', 25, 5),
(189, 'H9 Mayfair By the Sea I, Tai Po, Hong Kong', 26, 1),
(190, '逸瓏灣9號屋，大埔，香港', 26, 2),
(191, '逸珑湾9号屋，大埔，香港', 26, 3),
(192, '', 26, 4),
(193, '', 26, 5),
(196, 'Foshan Huaya Plaza', 27, 1),
(197, '佛山華亞廣場', 27, 2),
(198, '佛山华亚广场', 27, 3),
(199, '', 27, 4),
(200, '', 27, 5),
(203, 'Foshan Huaya Financial Center', 28, 1),
(204, '佛山華亞金融中心', 28, 2),
(205, '佛山华亚金融中心', 28, 3),
(206, '', 28, 4),
(207, '', 28, 5),
(208, 'Nishimura, Shangri-La Beijing', 29, 1),
(209, '西村日本料理, 北京香格里拉大酒店', 29, 2),
(210, '西村日本料理, 北京香格里拉大酒店', 29, 3),
(211, '', 29, 4),
(212, '', 29, 5),
(215, 'Azur, Shangri-La Beijing', 30, 1),
(216, '聚, 北京香格里拉大酒店', 30, 2),
(217, '聚, 北京香格里拉大酒店', 30, 3),
(218, '', 30, 4),
(219, '', 30, 5),
(222, 'SkyBar, Traders Kuala Lumpur', 31, 1),
(223, 'SkyBar, 吉隆坡盛貿酒店', 31, 2),
(224, 'SkyBar, 吉隆坡盛贸酒店', 31, 3),
(225, '', 31, 4),
(226, '', 31, 5),
(229, 'Gobo Chit Chat, Traders Kuala Lumpur', 32, 1),
(230, 'Gobo Chit Chat, 吉隆坡盛貿酒店', 32, 2),
(231, 'Gobo Chit Chat, 吉隆坡盛贸酒店', 32, 3),
(232, '', 32, 4),
(233, '', 32, 5),
(236, 'San, Artyzen Habitat Hotel, Beijing', 33, 1),
(237, '三合門，北京雅辰悦居酒店', 33, 2),
(238, '三合門，北京雅辰悦居酒店', 33, 3),
(239, '', 33, 4),
(240, '', 33, 5),
(241, 'Townsquare Cafe, Artyzen Habitat Hotel, Beijing', 34, 1),
(242, '思方匯咖啡廳，北京雅辰悦居酒店', 34, 2),
(243, '思方汇咖啡厅，北京雅辰悦居酒店', 34, 3),
(244, '', 34, 4),
(245, '', 34, 5);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icon_class` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `login` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `login`, `password`) VALUES
(1, 'admin', 'Cms@dmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_setting`
--
ALTER TABLE `about_setting`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `gallery_category_setting`
--
ALTER TABLE `gallery_category_setting`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `lang_setting`
--
ALTER TABLE `lang_setting`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tag_setting`
--
ALTER TABLE `meta_tag_setting`
  ADD PRIMARY KEY (`meta_tag_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_section`
--
ALTER TABLE `news_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `photo_slider`
--
ALTER TABLE `photo_slider`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_photo`
--
ALTER TABLE `project_photo`
  ADD PRIMARY KEY (`project_photo_id`);

--
-- Indexes for table `project_section`
--
ALTER TABLE `project_section`
  ADD PRIMARY KEY (`project_section_id`);

--
-- Indexes for table `project_section_set`
--
ALTER TABLE `project_section_set`
  ADD PRIMARY KEY (`section_set_id`);

--
-- Indexes for table `project_title`
--
ALTER TABLE `project_title`
  ADD PRIMARY KEY (`project_title_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_setting`
--
ALTER TABLE `about_setting`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery_category_setting`
--
ALTER TABLE `gallery_category_setting`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lang_setting`
--
ALTER TABLE `lang_setting`
  MODIFY `lang_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `meta_tag_setting`
--
ALTER TABLE `meta_tag_setting`
  MODIFY `meta_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `section_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `photo_slider`
--
ALTER TABLE `photo_slider`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `project_photo`
--
ALTER TABLE `project_photo`
  MODIFY `project_photo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;
--
-- AUTO_INCREMENT for table `project_section`
--
ALTER TABLE `project_section`
  MODIFY `project_section_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `project_section_set`
--
ALTER TABLE `project_section_set`
  MODIFY `section_set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_title`
--
ALTER TABLE `project_title`
  MODIFY `project_title_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
