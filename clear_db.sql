-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2012 at 05:01 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dell`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `preview` varchar(255) NOT NULL,
  `position` int(5) NOT NULL DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `html` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `enable` int(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_brands`
--

CREATE TABLE IF NOT EXISTS `catalog_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(255) NOT NULL DEFAULT '',
  `picture` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `enable` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_comments`
--

CREATE TABLE IF NOT EXISTS `catalog_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` int(10) NOT NULL DEFAULT '0',
  `confirmed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_gallery`
--

CREATE TABLE IF NOT EXISTS `catalog_gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `picture` varchar(255) NOT NULL DEFAULT '',
  `sort` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_items`
--

CREATE TABLE IF NOT EXISTS `catalog_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL,
  `depth` int(5) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  `name_ru` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_en` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content_ru` text NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `uri` varchar(255) NOT NULL DEFAULT '',
  `main` tinyint(1) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_pt` varchar(255) NOT NULL,
  `content_en` varchar(255) NOT NULL,
  `content_fr` varchar(255) NOT NULL,
  `content_de` varchar(255) NOT NULL,
  `content_pt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_orders`
--

CREATE TABLE IF NOT EXISTS `catalog_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_orders_products`
--

CREATE TABLE IF NOT EXISTS `catalog_orders_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL DEFAULT '0',
  `product_id` int(10) NOT NULL DEFAULT '0',
  `count` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_products`
--

CREATE TABLE IF NOT EXISTS `catalog_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(10) NOT NULL,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `articul` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(1) NOT NULL,
  `gallery` text COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(4) NOT NULL DEFAULT '0',
  `action` int(1) NOT NULL DEFAULT '0',
  `popular` int(1) NOT NULL DEFAULT '0',
  `new` int(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `exist` tinyint(4) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_similar`
--

CREATE TABLE IF NOT EXISTS `catalog_similar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_ka` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_ka` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ka` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ka` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ka` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `useremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `filial`
--

CREATE TABLE IF NOT EXISTS `filial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gall`
--

CREATE TABLE IF NOT EXISTS `gall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_pictures`
--

CREATE TABLE IF NOT EXISTS `gallery_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mailer`
--

CREATE TABLE IF NOT EXISTS `mailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `mid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mailer_message`
--

CREATE TABLE IF NOT EXISTS `mailer_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `greeting` text CHARACTER SET utf8 NOT NULL,
  `confirmation` text CHARACTER SET utf8 NOT NULL,
  `refused` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `protected` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_id` int(5) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `depth` int(5) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  `name_ru` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_en` varchar(1024) NOT NULL DEFAULT '',
  `name_uk` varchar(255) NOT NULL,
  `name_de` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_pt` varchar(255) NOT NULL,
  `href` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `module` varchar(255) NOT NULL DEFAULT '',
  `controller` varchar(255) NOT NULL DEFAULT '',
  `route` varchar(255) NOT NULL DEFAULT '',
  `params` varchar(1024) NOT NULL DEFAULT '',
  `model` varchar(255) NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `route_params` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `city_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city_uk` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `production_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `production_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `production_uk` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shedules`
--

CREATE TABLE IF NOT EXISTS `shedules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prev_week` text COLLATE utf8_unicode_ci NOT NULL,
  `curr_week` text COLLATE utf8_unicode_ci NOT NULL,
  `next_week` text COLLATE utf8_unicode_ci NOT NULL,
  `filial_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lang` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role` varchar(32) NOT NULL,
  `table_rows` int(10) NOT NULL DEFAULT '20',
  `table_lang` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name_uk` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `title_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci NOT NULL,
  `description_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_en` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_uk` text COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `user_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `enable` tinyint(1) NOT NULL DEFAULT '0',
  `protected` int(1) NOT NULL DEFAULT '0',
  `name_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `smallcontent_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords_pt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
