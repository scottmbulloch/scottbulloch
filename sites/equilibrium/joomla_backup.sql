-- phpMyAdmin SQL Dump
-- version 2.8.2.4
-- http://www.phpmyadmin.net
-- 
-- Host: localhost:3306
-- Generation Time: Oct 13, 2012 at 12:35 PM
-- Server version: 5.0.32
-- PHP Version: 5.2.6
-- 
-- Database: `joomla`
-- 
CREATE DATABASE `joomla` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `joomla`;

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_banner`
-- 

CREATE TABLE `jos_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `jos_banner`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_bannerclient`
-- 

CREATE TABLE `jos_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `jos_bannerclient`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_bannertrack`
-- 

CREATE TABLE `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_bannertrack`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_categories`
-- 

CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `jos_categories`
-- 

INSERT INTO `jos_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES (2, 0, 'Blog', '', 'blog', '', '2', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_components`
-- 

CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- 
-- Dumping data for table `jos_components`
-- 

INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES (1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, '', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_contact_details`
-- 

CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `jos_contact_details`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_content`
-- 

CREATE TABLE `jos_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `jos_content`
-- 

INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES (1, 'Location', 'location', '', '<p>Equilibrium studio is located at <strong>802 W Osborn Rd, Phoenix, AZ 85013</strong></p>\r\n<iframe src="http://maps.google.com/maps?q=802+W+Osborn+Rd+Phoenix,+AZ+85013&amp;ie=UTF8&amp;hq=&amp;hnear=802+W+Osborn+Rd,+Phoenix,+Maricopa,+Arizona+85013&amp;gl=us&amp;ll=33.487964,-112.084175&amp;spn=0.011489,0.019505&amp;z=14&amp;output=embed" width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><p>&nbsp;</p>', '', 1, 0, 0, 0, '2011-03-18 23:58:36', 62, '', '2011-07-09 15:23:36', 62, 0, '0000-00-00 00:00:00', '2011-03-18 23:58:36', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 19, 0, 7, '', '', 0, 6252, 'robots=\nauthor='),
(6, 'Pricing', 'pricing', '', '<p><strong>New students SPECIAL 10 days for $20!</strong></p>\r\n<ul>\r\n<li>Mat Rental: $2</li>\r\n<li>Bottled Water: $1</li>\r\n</ul>\r\n<p><strong>Regular Pricing</strong><br /><small><em>No contract required, no expiration.</em></small></p>\r\n<ul>\r\n<li>Single Class: $13</li>\r\n<li>5 Pass: $55</li>\r\n<li>10 Pass: $90</li>\r\n<li>1 Month Unlimited: $110</li>\r\n</ul>\r\n<p><strong>VIP Membership</strong><br /><small><em>Includes a FREE mat ($25 value), VIP scheduling (1st pick of classes), no membership dues, requires 6 month contract with auto-pay.</em></small></p><ul>\r\n<li>Monthly Unlimited: $79</li>\r\n</ul>', '', 1, 0, 0, 0, '2011-03-26 21:24:00', 62, '', '2012-03-27 01:05:52', 62, 0, '0000-00-00 00:00:00', '2011-03-26 21:24:00', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 33, 0, 2, '', '', 0, 6915, 'robots=\nauthor='),
(2, 'Contact', 'contact', '', '<p>Please feel free to call me at 602-577-7409 or email me at kimbulloch@gmail.com if you have any questions or would like to reserve your spot in class.</p>\r\n<!--<p>Fill out the form below to send me an email.</p>\r\n{chronoforms}Contact{/chronoforms}-->', '', 0, 0, 0, 0, '2011-03-19 01:05:10', 62, '', '2011-06-14 19:06:54', 62, 0, '0000-00-00 00:00:00', '2011-03-19 01:05:10', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 10, 0, 6, '', '', 0, 617, 'robots=\nauthor='),
(3, 'Classes', 'classes', '', '<h3>Equilibrium Yoga/Candlelight Yoga</h3>\r\n<p>Equilibrium Yoga is a perfectly balanced yoga class for everyone. We begin each class with a neck release sequence (perfect for those who sit in front of a computer all day), work into a slow vinyasa flow, and end with a sequence known as "the healing of the hips". The hip sequence promotes proper alignment of the hips, helping to alleviate the hip pain that so many of us suffer with. Prior yoga experience is not required.<br /><em>What you need for this class: mat, hand towel, water</em></p>\r\n\r\n<h3>Vinyasa Flow Yoga</h3>\r\n<p>The word Vinyasa means "breath-synchronized movement"- in other words, you will be instructed to move from one posture to the next on an inhale or an exhale.  This class is a unique and challenging flow of postures linked together through sun salutations. All levels welcome.</p>\r\n\r\n<h3>Vinyasa Pilates</h3>\r\n<p>Vinyasa yoga and pilates in one class! We have combined Vinyasa Flow Yoga with standing and mat pilates for a well rounded, full body workout.<br /><em>What you need for this class: mat, hand towel, water</em></p>\r\n\r\n<h3>Stretch''n''Flow w/ Kim Blaess</h3>\r\n<p>Want to develop a longer, leaner, more powerful body? This class was designed to increase energy, strength, grace, flexibility, and range of movement. Through alignment and breath, we will develop the right muscles to lengthen legs, shape arms, strengthen the back and lift your rear- all while working the core! All levels are welcome to this effective, low impact mat workout.</p>\r\n\r\n<h3>Barre Fitness</h3>\r\n<p>This is a fast paced, full body workout utilizing multiple forms of fitness with an emphasis on the glutes and thighs. We use ballet barre, pilates, resistance training, yoga, stability balls, and a little cardio to help build long lean muscles, burn calories and reduce cellulite.<br /><em>What you need for this class: mat, hand towel, water (no shoes)</em></p>\r\n\r\n<p><strong>Mats are available to rent for $2</strong></p>', '', 1, 0, 0, 0, '2011-03-19 16:57:23', 62, '', '2012-03-20 02:59:15', 62, 0, '0000-00-00 00:00:00', '2011-03-19 16:57:23', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 33, 0, 5, '', '', 0, 8565, 'robots=\nauthor='),
(4, 'Schedule', 'schedule', '', '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=kimbulloch%40gmail.com&amp;color=%23182C57&amp;ctz=America%2FPhoenix" width="100%" height="660" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><p>&nbsp;</p>', '', 1, 0, 0, 0, '2011-03-19 21:18:00', 62, '', '2011-06-14 22:24:32', 62, 0, '0000-00-00 00:00:00', '2011-03-19 21:18:00', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 14, 0, 4, '', '', 0, 17254, 'robots=\nauthor='),
(5, 'Home', 'home', '', '<div style="margin:10px 200px 100px 200px;text-align:center"><p><br /><p><h2>Our studio is now closed.</h2><p><br /></p><p>Please check back for updates on future classes being offered by Kim and Kim at other locations. It has been an honor to have each and every one of you as a student, friend, and workout partner. Much LOVE to you all!</p><p>Cheers and Namaste!!!!</p><p><br /></p></div>', '', 1, 0, 0, 0, '2011-03-23 06:04:05', 62, '', '2012-06-22 22:45:42', 62, 0, '0000-00-00 00:00:00', '2011-03-23 06:04:05', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 96, 0, 3, '', '', 0, 346, 'robots=\nauthor='),
(7, 'About', 'about', '', '<p><strong>How can I reserve a class space?</strong><br /></p><p>Call Kim at 602-577-7409 or email at kimbulloch@gmail.com</p><p><br /></p><p><b>Why do I have to reserve space?</b></p><p>I require you to reserve space in my classes because many of them are equipment based and I don''t like to pack people in the room like sardines!</p><p><br /></p><p><b><br /></b></p>', '', 0, 0, 0, 0, '2011-06-23 18:29:34', 62, '', '2011-06-29 18:43:40', 62, 0, '0000-00-00 00:00:00', '2011-06-23 18:29:34', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=0\nshow_section=0\nlink_section=\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 7, 0, 1, '', '', 0, 523, 'robots=\nauthor=');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_content_frontpage`
-- 

CREATE TABLE `jos_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_content_frontpage`
-- 

INSERT INTO `jos_content_frontpage` (`content_id`, `ordering`) VALUES (5, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_content_rating`
-- 

CREATE TABLE `jos_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_content_rating`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_acl_aro`
-- 

CREATE TABLE `jos_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

-- 
-- Dumping data for table `jos_core_acl_aro`
-- 

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES (10, 'users', '62', 0, 'Administrator', 0),
(11, 'users', '63', 0, 'Keith Jackson', 0),
(12, 'users', '64', 0, 'Kim Bulloch', 0),
(13, 'users', '65', 0, 'Rachel Malloy', 0),
(23, 'users', '75', 0, 'Carolyn Rzeppa', 0),
(17, 'users', '69', 0, 'Valerie Toliver', 0),
(18, 'users', '70', 0, 'Jamie Korus', 0),
(19, 'users', '71', 0, 'karen', 0),
(20, 'users', '72', 0, 'Ronnie', 0),
(21, 'users', '73', 0, 'AYLA CRUZ', 0),
(22, 'users', '74', 0, 'Krystina Cowell', 0),
(24, 'users', '76', 0, 'summer tabor', 0),
(25, 'users', '77', 0, 'Valerie Edwards', 0),
(26, 'users', '78', 0, 'DIANA SOTO CAMACHO', 0),
(27, 'users', '79', 0, 'Stephanie Rice', 0),
(28, 'users', '80', 0, 'Juan Moreno', 0),
(29, 'users', '81', 0, 'Alexandra', 0),
(30, 'users', '82', 0, 'Nannette Mulhall', 0),
(31, 'users', '83', 0, 'Anita Compton', 0),
(32, 'users', '84', 0, 'Gloria Santa Cruz', 0),
(33, 'users', '85', 0, 'TEDDI HALL', 0),
(34, 'users', '86', 0, 'Bojana DJukovic-Barakovic', 0),
(35, 'users', '87', 0, 'Laura Buchanan', 0),
(36, 'users', '88', 0, 'zlmkmooeck', 0),
(37, 'users', '89', 0, 'Jenae', 0),
(38, 'users', '90', 0, 'Harry Katz', 0),
(39, 'users', '91', 0, 'Judy', 0),
(40, 'users', '92', 0, 'Sabrina Drago', 0),
(41, 'users', '93', 0, 'Nicole Mora', 0),
(42, 'users', '94', 0, 'Beth Primeau', 0),
(43, 'users', '95', 0, 'jessica jensen', 0),
(44, 'users', '96', 0, 'Mari', 0),
(45, 'users', '97', 0, 'Victoria Martin', 0),
(46, 'users', '98', 0, 'Dede Priddy', 0),
(47, 'users', '99', 0, 'Natalie', 0),
(48, 'users', '100', 0, 'Mollie Kaye Wieser', 0),
(49, 'users', '101', 0, 'Dianna Scaccia', 0),
(50, 'users', '102', 0, 'Sarah Bunch', 0),
(51, 'users', '103', 0, 'Josette (Josie) Valentine', 0),
(52, 'users', '104', 0, 'Laura Adams', 0),
(53, 'users', '105', 0, 'Joanna Byer', 0),
(54, 'users', '106', 0, 'Stacey Parker', 0),
(55, 'users', '107', 0, 'Heidi', 0),
(56, 'users', '108', 0, 'Aprille Slutsky', 0),
(57, 'users', '109', 0, 'Meredith Ur', 0),
(58, 'users', '110', 0, 'Sue Kiesey', 0),
(59, 'users', '111', 0, 'Karlene Carlson', 0),
(60, 'users', '112', 0, 'Joanie Segall', 0),
(61, 'users', '113', 0, 'Tara M', 0),
(62, 'users', '114', 0, 'shenate', 0),
(63, 'users', '115', 0, 'Joanie', 0),
(64, 'users', '116', 0, 'Shari Guilfoyle', 0),
(65, 'users', '117', 0, 'Jenny Schell', 0),
(66, 'users', '118', 0, 'Elise Frances Welch', 0),
(67, 'users', '119', 0, 'Danny Silvani', 0),
(68, 'users', '120', 0, 'dorbent', 0),
(69, 'users', '121', 0, 'Victoria Martinez', 0),
(70, 'users', '122', 0, 'Amiee Coy', 0),
(71, 'users', '123', 0, 'Katie Rowan Carey', 0),
(72, 'users', '124', 0, 'Elizabeth Studebaker', 0),
(73, 'users', '125', 0, 'Pat Peterson', 0),
(74, 'users', '126', 0, 'Susan Henry', 0),
(75, 'users', '127', 0, 'adrianne', 0),
(76, 'users', '128', 0, 'Morgan Montez', 0),
(77, 'users', '129', 0, 'minami', 0),
(78, 'users', '130', 0, 'angela yack', 0),
(79, 'users', '131', 0, 'Cherylyn Henry', 0),
(80, 'users', '132', 0, 'Sharon Wood', 0),
(81, 'users', '133', 0, 'LatishaThornton', 0),
(82, 'users', '134', 0, 'zandra', 0),
(83, 'users', '135', 0, 'Joanna Marroquin', 0),
(84, 'users', '136', 0, 'Armando', 0),
(85, 'users', '137', 0, 'Dillan', 0),
(86, 'users', '138', 0, 'Cristina Turchiano', 0),
(87, 'users', '139', 0, 'Tami Cilk', 0),
(88, 'users', '140', 0, 'Nicole Chakos', 0),
(89, 'users', '141', 0, 'Caryn Koppes', 0),
(90, 'users', '142', 0, 'Bresha Burns', 0),
(91, 'users', '143', 0, 'Dan Good', 0),
(92, 'users', '144', 0, 'Dan Good', 0),
(93, 'users', '145', 0, 'Christina Castellanos', 0),
(94, 'users', '146', 0, 'Rianna Marie Rhoads', 0),
(95, 'users', '147', 0, 'Nancy', 0),
(96, 'users', '148', 0, 'Juile Unroe', 0),
(97, 'users', '149', 0, 'Annette Petzel', 0),
(98, 'users', '150', 0, 'Sara Libby', 0),
(99, 'users', '151', 0, 'joy somers', 0),
(100, 'users', '152', 0, 'MARGARET OLEK ESLER', 0),
(101, 'users', '153', 0, 'Christine Trusken', 0),
(102, 'users', '154', 0, 'Crystal Eastman', 0),
(103, 'users', '155', 0, 'Marla Ruiz', 0),
(104, 'users', '156', 0, 'Katherine Desmond', 0),
(105, 'users', '157', 0, 'Juliet Nelson', 0),
(106, 'users', '158', 0, 'monica picard', 0),
(107, 'users', '159', 0, 'Suzanne', 0),
(108, 'users', '160', 0, 'Kirstin Havice', 0),
(109, 'users', '161', 0, 'Carolyn Mosher', 0),
(110, 'users', '162', 0, 'Tessa Gonzales', 0),
(111, 'users', '163', 0, 'Mindy Lee', 0),
(112, 'users', '164', 0, 'cindy coplen', 0),
(113, 'users', '165', 0, 'Desiree Curley', 0),
(114, 'users', '166', 0, 'Kim Blaess', 0),
(115, 'users', '167', 0, 'Allison Duquette', 0),
(116, 'users', '168', 0, 'Laura E.', 0),
(117, 'users', '169', 0, 'jackie', 0),
(118, 'users', '170', 0, 'Conny Berry', 0),
(119, 'users', '171', 0, 'Danielle Dancho', 0),
(120, 'users', '172', 0, 'Megan McDonald', 0),
(121, 'users', '173', 0, 'becky ankeny', 0),
(122, 'users', '174', 0, 'watchesonline', 0),
(123, 'users', '175', 0, 'Tatsy94169', 0),
(124, 'users', '176', 0, 'Elizabeth McNeil', 0),
(125, 'users', '177', 0, 'William Khashan', 0),
(126, 'users', '178', 0, 'Tatsy04706', 0),
(127, 'users', '179', 0, 'monclermc10077', 0),
(128, 'users', '180', 0, 'buydresses', 0),
(129, 'users', '181', 0, 'discounttop', 0),
(130, 'users', '182', 0, 'canadadown', 0),
(131, 'users', '183', 0, 'louboutionsale', 0),
(132, 'users', '184', 0, 'Stacey Piluri', 0),
(133, 'users', '185', 0, 'Angela', 0),
(134, 'users', '186', 0, 'Rachel Enzweiler', 0),
(135, 'users', '187', 0, 'Danielle Martinez', 0),
(136, 'users', '188', 0, 'Regina Fisher', 0),
(137, 'users', '189', 0, 'Ann Cinellaro', 0),
(138, 'users', '190', 0, 'Lisa Underhill', 0),
(139, 'users', '191', 0, 'Jane Hutchinson', 0),
(140, 'users', '192', 0, 'Jackie Cupp', 0),
(141, 'users', '193', 0, 'Gini Sater', 0),
(142, 'users', '194', 0, 'Bridget Sharpe', 0),
(143, 'users', '195', 0, 'Karen Sargent', 0),
(144, 'users', '196', 0, 'jade', 0),
(145, 'users', '197', 0, 'Katie', 0),
(146, 'users', '198', 0, 'Kate', 0),
(147, 'users', '199', 0, 'zaboravkk', 0),
(148, 'users', '200', 0, 'zabormaki', 0),
(149, 'users', '201', 0, 'smooja', 0),
(150, 'users', '202', 0, 'llethurnermarce', 0),
(151, 'users', '203', 0, 'rterrobt', 0),
(152, 'users', '204', 0, 'nfflinggrai', 0),
(153, 'users', '205', 0, 'dnsmaydastefa', 0),
(154, 'users', '206', 0, 'pemontpettenn', 0),
(155, 'users', '207', 0, 'mwesmilo', 0),
(156, 'users', '208', 0, 'legollineco', 0),
(157, 'users', '209', 0, 'paseppicata', 0),
(158, 'users', '210', 0, 'louselrenem', 0),
(159, 'users', '211', 0, 'iaspositojess', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_acl_aro_groups`
-- 

CREATE TABLE `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `jos_core_acl_aro_groups`
-- 

INSERT INTO `jos_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES (17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_acl_aro_map`
-- 

CREATE TABLE `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_core_acl_aro_map`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_acl_aro_sections`
-- 

CREATE TABLE `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `jos_core_acl_aro_sections`
-- 

INSERT INTO `jos_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES (10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_acl_groups_aro_map`
-- 

CREATE TABLE `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_core_acl_groups_aro_map`
-- 

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES (18, '', 11),
(18, '', 13),
(18, '', 17),
(18, '', 18),
(18, '', 19),
(18, '', 20),
(18, '', 21),
(18, '', 22),
(18, '', 23),
(18, '', 24),
(18, '', 25),
(18, '', 26),
(18, '', 27),
(18, '', 28),
(18, '', 29),
(18, '', 30),
(18, '', 31),
(18, '', 32),
(18, '', 33),
(18, '', 34),
(18, '', 35),
(18, '', 36),
(18, '', 37),
(18, '', 38),
(18, '', 39),
(18, '', 40),
(18, '', 41),
(18, '', 42),
(18, '', 43),
(18, '', 44),
(18, '', 45),
(18, '', 46),
(18, '', 47),
(18, '', 48),
(18, '', 49),
(18, '', 50),
(18, '', 51),
(18, '', 52),
(18, '', 53),
(18, '', 54),
(18, '', 55),
(18, '', 56),
(18, '', 57),
(18, '', 58),
(18, '', 59),
(18, '', 60),
(18, '', 61),
(18, '', 62),
(18, '', 63),
(18, '', 64),
(18, '', 65),
(18, '', 66),
(18, '', 67),
(18, '', 68),
(18, '', 69),
(18, '', 70),
(18, '', 71),
(18, '', 72),
(18, '', 73),
(18, '', 74),
(18, '', 75),
(18, '', 76),
(18, '', 77),
(18, '', 78),
(18, '', 79),
(18, '', 80),
(18, '', 81),
(18, '', 82),
(18, '', 83),
(18, '', 84),
(18, '', 85),
(18, '', 86),
(18, '', 87),
(18, '', 88),
(18, '', 89),
(18, '', 90),
(18, '', 91),
(18, '', 92),
(18, '', 93),
(18, '', 94),
(18, '', 95),
(18, '', 96),
(18, '', 97),
(18, '', 98),
(18, '', 99),
(18, '', 100),
(18, '', 101),
(18, '', 102),
(18, '', 103),
(18, '', 104),
(18, '', 105),
(18, '', 106),
(18, '', 107),
(18, '', 108),
(18, '', 109),
(18, '', 110),
(18, '', 111),
(18, '', 112),
(18, '', 113),
(18, '', 114),
(18, '', 115),
(18, '', 116),
(18, '', 117),
(18, '', 118),
(18, '', 119),
(18, '', 120),
(18, '', 121),
(18, '', 122),
(18, '', 123),
(18, '', 124),
(18, '', 125),
(18, '', 126),
(18, '', 127),
(18, '', 128),
(18, '', 129),
(18, '', 130),
(18, '', 131),
(18, '', 132),
(18, '', 133),
(18, '', 134),
(18, '', 135),
(18, '', 136),
(18, '', 137),
(18, '', 138),
(18, '', 139),
(18, '', 140),
(18, '', 141),
(18, '', 142),
(18, '', 143),
(18, '', 144),
(18, '', 145),
(18, '', 146),
(18, '', 147),
(18, '', 148),
(18, '', 149),
(18, '', 150),
(18, '', 151),
(18, '', 152),
(18, '', 153),
(18, '', 154),
(18, '', 155),
(18, '', 156),
(18, '', 157),
(18, '', 158),
(18, '', 159),
(23, '', 12),
(25, '', 10);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_log_items`
-- 

CREATE TABLE `jos_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_core_log_items`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_core_log_searches`
-- 

CREATE TABLE `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_core_log_searches`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_groups`
-- 

CREATE TABLE `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_groups`
-- 

INSERT INTO `jos_groups` (`id`, `name`) VALUES (0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_menu`
-- 

CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `jos_menu`
-- 

INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES (1, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'num_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=front\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(2, 'mainmenu', 'Location', 'location', 'index.php?option=com_content&view=article&id=1', 'component', 0, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(3, 'mainmenu', 'Contact', 'contact', 'index.php?option=com_content&view=article&id=2', 'component', 0, 0, 20, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(4, 'mainmenu', 'Classes', 'classes', 'index.php?option=com_content&view=article&id=3', 'component', 0, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(5, 'mainmenu', 'Schedule', 'schedule', 'index.php?option=com_content&view=article&id=4', 'component', 0, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(6, 'mainmenu', 'Pricing', 'pricing', 'index.php?option=com_content&view=article&id=6', 'component', 0, 0, 20, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(7, 'mainmenu', 'About', 'about', 'index.php?option=com_content&view=article&id=7', 'component', 0, 0, 20, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_menu_types`
-- 

CREATE TABLE `jos_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `jos_menu_types`
-- 

INSERT INTO `jos_menu_types` (`id`, `menutype`, `title`, `description`) VALUES (1, 'mainmenu', 'Main Menu', 'The main menu for the site');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_messages`
-- 

CREATE TABLE `jos_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `jos_messages`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_messages_cfg`
-- 

CREATE TABLE `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_messages_cfg`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_migration_backlinks`
-- 

CREATE TABLE `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_migration_backlinks`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_modules`
-- 

CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- 
-- Dumping data for table `jos_modules`
-- 

INSERT INTO `jos_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES (1, 'Main Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(17, 'Login', '', 3, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_login', 0, 0, 1, 'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=\nlogout=1\ngreeting=1\nname=0\nusesecure=0\n\n', 0, 0, ''),
(18, 'Breadcrumbs', '', 3, 'breadcrumb', 0, '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 0, 0, 1, 'showHome=1\nhomeText=Home\nshowLast=1\nseparator=\nmoduleclass_sfx=\ncache=0\n\n', 0, 0, ''),
(19, 'NANO Piecemaker', '', 0, 'slideshow', 0, '0000-00-00 00:00:00', 0, 'mod_nanopiecemaker', 0, 0, 0, 'image1=modules/mod_nanopiecemaker/images/image1.jpg\ntitle1=\nparagraph1=\nimage2=modules/mod_nanopiecemaker/images/image2.jpg\ntitle2=\nparagraph2=\nimage3=modules/mod_nanopiecemaker/images/image3.jpg\ntitle3=\nparagraph3=\nimage4=modules/mod_nanopiecemaker/images/image4.jpg\ntitle4=\nparagraph4=\nimage5=modules/mod_nanopiecemaker/images/image2.jpg\ntitle5=\nparagraph5=\ncacheTime=800\nmoduleclass_sfx=\nwidth=960\nheight=480\nimgwidth=500\nimgheight=250\nsegments=5\ntweenTime=1.2\ntweenDelay=0.1\ntweenType=easeInOutExpo\nzDistance=0\nexpand=20\ninnerColor=111111\ntextBackground=e1e1e1\nshadow=piecemakerShadow\nshadowDarkness=100\ntextDistance=25\nautoplay=5\n\n', 0, 0, ''),
(21, 'Footer', '', 0, 'copyright', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, 'cache=1\n\n', 0, 0, ''),
(22, 'Search', '', 2, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_search', 0, 0, 1, 'moduleclass_sfx=\nwidth=20\ntext=\nbutton=1\nbutton_pos=right\nimagebutton=\nbutton_text=Go\nset_itemid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(23, 'Facebook', '', 0, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_jv_facebook', 0, 0, 1, 'fb_options=fb_like_box\naf_domain=http://www.facebook.com/equilibriumphx\naf_box_width=250\naf_box_height=650\naf_header=1\naf_color_scheme=light\naf_font=arial\naf_border_color=\naf_recomm=1\nfb_page_id=151658298209617\nfb_box_width=190\nfb_box_height=690\nfb_number_fan=18\nfb_stream=1\nfb_header=1\nls_app_id=\nls_width=250\nls_height=650\nls_xid=\nr_domain=\nr_width=250\nr_height=650\nr_header=1\nr_color_scheme=light\nr_font=arial\nr_border_color=\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(28, 'Vote', '', 4, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_poll', 0, 0, 1, 'id=0\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(27, 'Vinaora Cu3er 3D SlideShow', '', 0, 'slideshow', 0, '0000-00-00 00:00:00', 0, 'mod_vinaora_cu3er', 0, 0, 0, 'moduleclass_sfx=\nconfig_code=V27_20110326_150643.xml\nconfig_custom=yoga.xml.php\nslide_panel_width=500\nslide_panel_height=330\nslide_panel_horizontal_align=center\nslide_panel_vertical_align=center\nui_visibility_time=1\nslide_dir=-1\nslide_url=\nslide_link=\nslide_link_target=\nslide_description_heading=\nslide_description_paragraph=\nslide_description_link=\nslide_description_link_target=\ntransition_type=custom\ntransition_num=\ntransition_slicing=\ntransition_direction=\ntransition_duration=\ntransition_delay=\ntransition_shader=\ntransition_light_position=\ntransition_cube_color=\ntransition_z_multiplier=\nenable_description_box=1\nswffont=-1\ndescription_round_corners=0, 0, 0, 0\ndescription_heading_font=Georgia\ndescription_heading_text_size=18\ndescription_heading_text_color=0x000000\ndescription_heading_text_align=left\ndescription_heading_text_margin=10 , 25 , 0 , 25\ndescription_heading_text_leading=0\ndescription_heading_text_letterSpacing=0\ndescription_paragraph_font=Arial\ndescription_paragraph_text_size=12\ndescription_paragraph_text_color=0x000000\ndescription_paragraph_text_align=left\ndescription_paragraph_text_margin=5, 25, 0, 25\ndescription_paragraph_text_leading=0\ndescription_paragraph_text_letterSpacing=0\nenable_auto_play=0\nauto_play_symbol=circular\nauto_play_time_defaults=5\nenable_preloader=1\npreloader_symbol=circular\nenable_prev_button=0\nprev_button_round_corners=0, 0, 0, 0\nenable_prev_symbol=0\nprev_symbol_type=3\nenable_next_button=0\nnext_button_round_corners=0, 0, 0, 0\nenable_next_symbol=0\nnext_symbol_type=3\nenable_debug=0\ndebug_x=5\ndebug_y=5\ncache=1\ncache_time=900\nswfobject=i2.2\ndescription_time=\ndescription_delay=\ndescription_x=\ndescription_y=\ndescription_width=\ndescription_height=\ndescription_rotation=\ndescription_alpha=\ndescription_tint=\ndescription_scaleX=\ndescription_scaleY=\nauto_play_time=\nauto_play_delay=\nauto_play_x=\nauto_play_y=\nauto_play_width=\nauto_play_height=\nauto_play_rotation=\nauto_play_alpha=\nauto_play_tint=\nauto_play_scaleX=\nauto_play_scaleY=\npreloader_time=\npreloader_delay=\npreloader_x=\npreloader_y=\npreloader_width=\npreloader_height=\npreloader_rotation=\npreloader_alpha=\npreloader_tint=\npreloader_scaleX=\npreloader_scaleY=\nprev_button_time=\nprev_button_delay=\nprev_button_x=\nprev_button_y=\nprev_button_width=\nprev_button_height=\nprev_button_rotation=\nprev_button_alpha=\nprev_button_tint=\nprev_button_scaleX=\nprev_button_scaleY=\nprev_symbol_time=\nprev_symbol_delay=\nprev_symbol_x=\nprev_symbol_y=\nprev_symbol_width=\nprev_symbol_height=\nprev_symbol_rotation=\nprev_symbol_alpha=\nprev_symbol_tint=\nprev_symbol_scaleX=\nprev_symbol_scaleY=\nnext_button_time=\nnext_button_delay=\nnext_button_x=\nnext_button_y=\nnext_button_width=\nnext_button_height=\nnext_button_rotation=\nnext_button_alpha=\nnext_button_tint=\nnext_button_scaleX=\nnext_button_scaleY=\nnext_symbol_time=\nnext_symbol_delay=\nnext_symbol_x=\nnext_symbol_y=\nnext_symbol_width=\nnext_symbol_height=\nnext_symbol_rotation=\nnext_symbol_alpha=\nnext_symbol_tint=\nnext_symbol_scaleX=\nnext_symbol_scaleY=\npretext=\nposttext=\n\n', 0, 0, ''),
(29, 'Contact', '', 0, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_rapid_contact', 0, 0, 1, 'email_label=Email\nsubject_label=Name\nmessage_label=Message\nemail_recipient=kimbulloch@gmail.com\nbutton_text=Send Message\npage_text=Thanks, I''ll be in touch with you shortly!\nthank_text_color=#FF0000\nerror_text=Your message could not be sent. Please try again.\nno_email=Please write your email\ninvalid_email=Please write a valid email\nfrom_name=EquilibriumPHX Contact Form\nfrom_email=contact@equilibriumphx.com\nemail_width=22\nsubject_width=22\nmessage_width=18\nbutton_width=100\nexact_url=1\ndisable_https=0\npre_text=\nenable_anti_spam=0\nanti_spam_q=Anti-spam\nanti_spam_a=yoga\nenable_recaptcha=0\nrecaptcha_public_key=6LdAjMYSAAAAAN7Ybtb-y0_OvQIeK_xxOkEO7enR\nrecaptcha_private_key=6LdAjMYSAAAAAFBLkELPIIhZYS5lIOa-VsNj_-Aq\nmoduleclass_sfx=\n\n', 0, 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_modules_menu`
-- 

CREATE TABLE `jos_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_modules_menu`
-- 

INSERT INTO `jos_modules_menu` (`moduleid`, `menuid`) VALUES (1, 0),
(17, 0),
(18, 0),
(19, 0),
(21, 0),
(22, 0),
(23, 1),
(27, 1),
(28, 0),
(29, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_newsfeeds`
-- 

CREATE TABLE `jos_newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `jos_newsfeeds`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_plugins`
-- 

CREATE TABLE `jos_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- 
-- Dumping data for table `jos_plugins`
-- 

INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES (1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'mode=simple\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=0\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\nblockquote=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'mode=wysiwyg\nwrap=8\n\n'),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(34, 'System - Mootools Upgrade', 'mtupgrade', 'system', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(35, 'chronoforms', 'chronoforms', 'content', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(36, 'System - BIGSHOT Google Analytics', 'bigshotgoogleanalytics', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'web_property_id=UA-5872898-3\n\n');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_poll_data`
-- 

CREATE TABLE `jos_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `jos_poll_data`
-- 

INSERT INTO `jos_poll_data` (`id`, `pollid`, `text`, `hits`) VALUES (1, 1, '6 AM', 33),
(2, 1, '7 AM', 17),
(3, 1, '8 AM', 11),
(4, 1, '10 AM', 10),
(5, 1, '12 PM', 6),
(6, 1, '4 PM', 15),
(7, 1, '6 PM', 47),
(8, 1, '7 PM', 18),
(9, 1, '8 PM', 15),
(10, 1, '', 0),
(11, 1, '', 0),
(12, 1, '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_poll_date`
-- 

CREATE TABLE `jos_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=utf8 AUTO_INCREMENT=173 ;

-- 
-- Dumping data for table `jos_poll_date`
-- 

INSERT INTO `jos_poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES (1, '2011-03-25 00:50:19', 8, 1),
(2, '2011-03-25 03:47:54', 7, 1),
(3, '2011-03-25 15:57:17', 4, 1),
(4, '2011-03-28 13:26:23', 6, 1),
(5, '2011-03-28 18:20:23', 8, 1),
(6, '2011-04-02 05:31:29', 3, 1),
(7, '2011-04-07 01:45:20', 6, 1),
(8, '2011-04-07 05:21:32', 2, 1),
(9, '2011-04-13 19:49:51', 3, 1),
(10, '2011-04-14 23:35:12', 7, 1),
(11, '2011-04-15 01:10:09', 7, 1),
(12, '2011-04-25 03:50:57', 7, 1),
(13, '2011-04-25 21:01:36', 1, 1),
(14, '2011-05-12 17:02:33', 3, 1),
(15, '2011-05-31 18:11:03', 4, 1),
(16, '2011-06-08 20:13:29', 7, 1),
(17, '2011-06-11 01:46:25', 2, 1),
(18, '2011-06-13 18:23:52', 1, 1),
(19, '2011-06-14 12:34:33', 4, 1),
(20, '2011-06-14 12:44:07', 9, 1),
(21, '2011-06-14 12:54:01', 1, 1),
(22, '2011-06-14 12:54:17', 3, 1),
(23, '2011-06-14 12:55:36', 2, 1),
(24, '2011-06-14 13:02:49', 6, 1),
(25, '2011-06-14 13:04:53', 5, 1),
(26, '2011-06-14 13:09:39', 1, 1),
(27, '2011-06-14 13:17:10', 7, 1),
(28, '2011-06-14 13:22:44', 1, 1),
(29, '2011-06-14 13:30:12', 7, 1),
(30, '2011-06-14 13:52:21', 1, 1),
(31, '2011-06-14 14:05:34', 2, 1),
(32, '2011-06-14 14:06:01', 7, 1),
(33, '2011-06-14 14:16:44', 9, 1),
(34, '2011-06-14 14:22:26', 9, 1),
(35, '2011-06-14 14:24:57', 8, 1),
(36, '2011-06-14 14:28:02', 7, 1),
(37, '2011-06-14 14:29:49', 8, 1),
(38, '2011-06-14 14:33:45', 2, 1),
(39, '2011-06-14 14:35:10', 5, 1),
(40, '2011-06-14 14:35:17', 1, 1),
(41, '2011-06-14 14:35:21', 6, 1),
(42, '2011-06-14 14:44:06', 8, 1),
(43, '2011-06-14 14:47:08', 2, 1),
(44, '2011-06-14 14:50:47', 1, 1),
(45, '2011-06-14 14:51:25', 1, 1),
(46, '2011-06-14 15:06:31', 7, 1),
(47, '2011-06-14 15:07:09', 9, 1),
(48, '2011-06-14 15:14:14', 3, 1),
(49, '2011-06-14 15:15:19', 7, 1),
(50, '2011-06-14 15:23:42', 8, 1),
(51, '2011-06-14 15:24:58', 7, 1),
(52, '2011-06-14 15:25:12', 7, 1),
(53, '2011-06-14 15:26:29', 7, 1),
(54, '2011-06-14 15:38:43', 7, 1),
(55, '2011-06-14 15:46:09', 7, 1),
(56, '2011-06-14 15:46:41', 7, 1),
(57, '2011-06-14 15:48:08', 7, 1),
(58, '2011-06-14 15:53:01', 7, 1),
(59, '2011-06-14 15:54:20', 1, 1),
(60, '2011-06-14 15:57:27', 8, 1),
(61, '2011-06-14 16:01:52', 7, 1),
(62, '2011-06-14 16:03:50', 1, 1),
(63, '2011-06-14 16:05:45', 1, 1),
(64, '2011-06-14 16:12:09', 7, 1),
(65, '2011-06-14 16:16:12', 1, 1),
(66, '2011-06-14 16:16:51', 7, 1),
(67, '2011-06-14 16:18:13', 8, 1),
(68, '2011-06-14 16:24:09', 7, 1),
(69, '2011-06-14 16:35:06', 6, 1),
(70, '2011-06-14 16:43:07', 1, 1),
(71, '2011-06-14 16:43:43', 8, 1),
(72, '2011-06-14 16:46:14', 7, 1),
(73, '2011-06-14 16:58:42', 2, 1),
(74, '2011-06-14 17:11:31', 4, 1),
(75, '2011-06-14 17:17:33', 6, 1),
(76, '2011-06-14 17:19:42', 2, 1),
(77, '2011-06-14 17:22:11', 9, 1),
(78, '2011-06-14 17:31:17', 4, 1),
(79, '2011-06-14 17:41:34', 8, 1),
(80, '2011-06-14 17:42:39', 4, 1),
(81, '2011-06-14 17:44:07', 3, 1),
(82, '2011-06-14 17:54:42', 2, 1),
(83, '2011-06-14 18:03:48', 6, 1),
(84, '2011-06-14 18:14:15', 4, 1),
(85, '2011-06-14 18:31:48', 7, 1),
(86, '2011-06-14 18:34:45', 7, 1),
(87, '2011-06-14 19:00:28', 9, 1),
(88, '2011-06-14 19:13:11', 7, 1),
(89, '2011-06-14 19:27:35', 8, 1),
(90, '2011-06-14 19:36:54', 6, 1),
(91, '2011-06-14 19:43:51', 8, 1),
(92, '2011-06-14 19:49:43', 1, 1),
(93, '2011-06-14 20:02:26', 3, 1),
(94, '2011-06-14 20:08:31', 1, 1),
(95, '2011-06-14 20:09:20', 1, 1),
(96, '2011-06-14 20:30:34', 6, 1),
(97, '2011-06-14 20:56:45', 5, 1),
(98, '2011-06-14 21:16:39', 5, 1),
(99, '2011-06-14 21:17:37', 1, 1),
(100, '2011-06-14 21:23:02', 7, 1),
(101, '2011-06-14 21:54:22', 7, 1),
(102, '2011-06-14 21:54:33', 9, 1),
(103, '2011-06-14 22:01:56', 4, 1),
(104, '2011-06-14 22:05:05', 2, 1),
(105, '2011-06-14 22:08:45', 1, 1),
(106, '2011-06-14 22:12:54', 6, 1),
(107, '2011-06-14 22:35:15', 1, 1),
(108, '2011-06-14 22:35:46', 1, 1),
(109, '2011-06-14 22:53:54', 3, 1),
(110, '2011-06-14 23:06:56', 1, 1),
(111, '2011-06-14 23:08:27', 1, 1),
(112, '2011-06-14 23:15:04', 2, 1),
(113, '2011-06-14 23:18:30', 7, 1),
(114, '2011-06-14 23:49:36', 7, 1),
(115, '2011-06-15 01:03:18', 7, 1),
(116, '2011-06-15 01:12:27', 9, 1),
(117, '2011-06-15 01:30:34', 9, 1),
(118, '2011-06-15 01:39:27', 2, 1),
(119, '2011-06-15 01:52:40', 9, 1),
(120, '2011-06-15 02:01:49', 9, 1),
(121, '2011-06-15 02:07:08', 8, 1),
(122, '2011-06-15 02:16:50', 3, 1),
(123, '2011-06-15 02:23:39', 9, 1),
(124, '2011-06-15 02:36:26', 1, 1),
(125, '2011-06-15 02:49:56', 3, 1),
(126, '2011-06-15 03:42:39', 7, 1),
(127, '2011-06-15 03:56:43', 1, 1),
(128, '2011-06-15 04:00:03', 7, 1),
(129, '2011-06-15 04:34:48', 2, 1),
(130, '2011-06-15 04:53:36', 4, 1),
(131, '2011-06-15 05:02:42', 2, 1),
(132, '2011-06-15 05:32:17', 9, 1),
(133, '2011-06-15 06:00:29', 8, 1),
(134, '2011-06-15 11:12:22', 5, 1),
(135, '2011-06-15 14:57:20', 7, 1),
(136, '2011-06-15 15:50:58', 6, 1),
(137, '2011-06-15 16:15:58', 7, 1),
(138, '2011-06-15 16:42:04', 7, 1),
(139, '2011-06-15 16:48:05', 6, 1),
(140, '2011-06-15 18:13:03', 6, 1),
(141, '2011-06-15 18:29:22', 2, 1),
(142, '2011-06-15 18:29:22', 7, 1),
(143, '2011-06-15 18:33:52', 7, 1),
(144, '2011-06-15 18:45:26', 8, 1),
(145, '2011-06-15 19:40:14', 6, 1),
(146, '2011-06-15 19:50:31', 9, 1),
(147, '2011-06-15 23:17:06', 1, 1),
(148, '2011-06-16 03:54:33', 7, 1),
(149, '2011-06-16 14:54:53', 9, 1),
(150, '2011-06-16 15:13:38', 2, 1),
(151, '2011-06-16 18:58:07', 7, 1),
(152, '2011-06-16 19:19:57', 1, 1),
(153, '2011-06-16 20:16:27', 7, 1),
(154, '2011-06-16 23:01:42', 1, 1),
(155, '2011-06-18 05:38:58', 3, 1),
(156, '2011-06-18 08:07:47', 7, 1),
(157, '2011-06-18 09:07:29', 8, 1),
(158, '2011-06-18 20:50:55', 8, 1),
(159, '2011-06-18 23:31:39', 2, 1),
(160, '2011-06-18 23:37:36', 1, 1),
(161, '2011-06-19 01:38:07', 5, 1),
(162, '2011-06-19 22:22:09', 7, 1),
(163, '2011-06-20 17:42:37', 7, 1),
(164, '2011-06-20 23:28:56', 6, 1),
(165, '2011-06-21 00:04:15', 1, 1),
(166, '2011-06-21 01:55:37', 4, 1),
(167, '2011-06-21 02:44:11', 1, 1),
(168, '2011-06-21 17:02:17', 7, 1),
(169, '2011-06-23 21:18:55', 1, 1),
(170, '2011-06-24 19:01:01', 8, 1),
(171, '2011-06-24 20:01:35', 1, 1),
(172, '2011-06-26 22:41:12', 7, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_poll_menu`
-- 

CREATE TABLE `jos_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_poll_menu`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_polls`
-- 

CREATE TABLE `jos_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `jos_polls`
-- 

INSERT INTO `jos_polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES (1, 'When is your favorite time to workout?', 'when-is-your-favorite-time-to-workout', 172, 0, '0000-00-00 00:00:00', 0, 0, 86400);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_sections`
-- 

CREATE TABLE `jos_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `jos_sections`
-- 

INSERT INTO `jos_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES (2, 'Blog', '', 'blog', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 1, 0, 1, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_session`
-- 

CREATE TABLE `jos_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_session`
-- 

INSERT INTO `jos_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES ('', '1350152637', 'b2bee0b5b9716cb0e3c62a8b1baad235', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:2;s:19:"session.timer.start";i:1350152633;s:18:"session.timer.last";i:1350152633;s:17:"session.timer.now";i:1350152637;s:22:"session.client.browser";s:99:"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:83:"/var/www/vhosts/equilibriumphx.com/httpdocs/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}'),
('', '1350153153', '2a557ceefa071e24de2b9b23d54ed16d', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:1;s:19:"session.timer.start";i:1350153153;s:18:"session.timer.last";i:1350153153;s:17:"session.timer.now";i:1350153153;s:22:"session.client.browser";s:72:"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:83:"/var/www/vhosts/equilibriumphx.com/httpdocs/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}'),
('', '1350153229', '40a4c124c00dad50333cd769f4b0de98', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:1;s:19:"session.timer.start";i:1350153229;s:18:"session.timer.last";i:1350153229;s:17:"session.timer.now";i:1350153229;s:22:"session.client.browser";s:83:"Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:83:"/var/www/vhosts/equilibriumphx.com/httpdocs/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_stats_agents`
-- 

CREATE TABLE `jos_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_stats_agents`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `jos_templates_menu`
-- 

CREATE TABLE `jos_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jos_templates_menu`
-- 

INSERT INTO `jos_templates_menu` (`template`, `menuid`, `client_id`) VALUES ('natural', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_users`
-- 

CREATE TABLE `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=utf8 AUTO_INCREMENT=212 ;

-- 
-- Dumping data for table `jos_users`
-- 

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES (62, 'Administrator', 'admin', 'drkgry@gmail.com', '3973328afca23f651c864cc63130b985:P3dEyk7b6mhL6KxIQ270yy0e7fBnvI7L', 'Super Administrator', 0, 1, 25, '2005-09-28 00:00:00', '2012-10-13 06:00:39', '', 'admin_language=en-GB\nlanguage=en-GB\neditor=none\nhelpsite=\ntimezone=-7\n\n'),
(63, 'Keith Jackson', 'Jack777son', 'the_ellipsis@hotmail.com', 'fcbcc7e789105239f98c81007bc68208:uSILeGq0MuQtlGhStDI0gELswm1u3ex6', 'Registered', 0, 0, 18, '2011-03-24 16:47:00', '0000-00-00 00:00:00', '', '\n'),
(64, 'Kim Bulloch', 'Kim', 'kimbulloch@gmail.com', 'fc46089329bbd3199683ba11c79dd001:WJt8WBsY1QtycyjoxIkbAOFsyVsWb4CO', 'Manager', 0, 1, 23, '2011-03-24 17:01:54', '2012-03-31 20:46:56', '', 'admin_language=en-GB\nlanguage=en-GB\neditor=tinymce\nhelpsite=\ntimezone=-7\n\n'),
(65, 'Rachel Malloy', 'rachelm', 'bunkyboutique@gmail.com', 'd8217b38f03d5d0a9273112ae1b64a03:C64JFnpYdkkTlhkPUq0RXylpK1cHo9rV', 'Registered', 0, 0, 18, '2011-03-29 21:58:05', '2011-03-29 22:02:40', '', '\n'),
(75, 'Carolyn Rzeppa', 'carolynrzeppa', 'carolynrzeppa@gmail.com', '4ed5a1b2e5ec574164d1924d11f6516c:NoQlHewyE8hJqvmyzrXji2wlIuV80MUv', 'Registered', 0, 0, 18, '2011-06-14 22:35:38', '2011-12-06 14:53:07', '', '\n'),
(69, 'Valerie Toliver', 'valerietoliver', 'vtoliver@earthlink.net', '004711da1f7d168f62822f920c0a5b7c:1zi27OaCjraXEEGPF5kLCziCtRXvfqpl', 'Registered', 0, 0, 18, '2011-05-12 17:05:26', '2011-06-24 14:18:03', '', '\n'),
(70, 'Jamie Korus', 'jamiek', 'jamie@afrhomeloans.com', '28a204c329b430c1b670ac2dc64be85a:PEhtbtx1X77AVL7dYkxYvKCoL7mgw7oD', 'Registered', 0, 0, 18, '2011-05-21 14:37:01', '0000-00-00 00:00:00', '', '\n'),
(71, 'karen', 'koverstake', 'koverstake@yahoo.com', '8db48645afc429d4607aae139388bfa0:svYBt2G1jjckzoZLovmRJwZDx0wNBAEn', 'Registered', 0, 0, 18, '2011-06-14 12:53:10', '2011-06-14 17:04:12', '', '\n'),
(72, 'Ronnie', 'ronkris', 'rkt602@gmail.com', 'ed5b103cfa4d769e77b42b88666d54d1:lUDtdc41O9Yad7hVuViTuVZ3AYRretcX', 'Registered', 0, 0, 18, '2011-06-14 17:15:28', '2011-06-15 22:46:49', '', '\n'),
(73, 'AYLA CRUZ', 'ayla.cruz07', 'ayla.cruz07@gmail.com', '981b44fb9618e9b494402efe825a5297:1PONIeGz91N6f94PRLdDTvzrPfRGm4yC', 'Registered', 0, 0, 18, '2011-06-14 17:23:00', '2012-02-02 17:17:15', '', '\n'),
(74, 'Krystina Cowell', 'Kryssi', 'krysdani@gmail.com', 'b3ba9451a748d9bc21832125794b5e73:Tz2cj5ema1xTc4bVRDB1H1iIGqj74xh6', 'Registered', 0, 0, 18, '2011-06-14 21:48:42', '2011-06-14 21:49:57', '', '\n'),
(112, 'Joanie Segall', 'joanie', 'joanie.segall@gmail.com', '61202a2449fb0a6317de26220aa72cca:KPsRQHSEjs09YyYUgScplTuf1ZzpWwjk', 'Registered', 0, 0, 18, '2011-07-15 01:48:49', '2011-07-15 01:49:24', '', '\n'),
(76, 'summer tabor', 'summeraz', 'summerazrn@yahoo.com', 'ff25a9cc4826f5a3a4e7183fb5efa058:lnfgWzuI3zcXMpzd2mrWW0fIGvskOmQ9', 'Registered', 0, 0, 18, '2011-06-15 01:40:24', '2011-06-22 17:59:11', '', '\n'),
(77, 'Valerie Edwards', 'Valerie Edwards', 'valerie.edwards@knchlaw.com', '9b72b3fdb4ab80b35055facb818148e0:jXfKoC3U9Bd2jh0YJm2IA2ZqJ4y4nJZZ', 'Registered', 0, 0, 18, '2011-06-15 18:30:44', '2012-03-29 21:40:33', '', '\n'),
(78, 'DIANA SOTO CAMACHO', 'DSCAMACHO82', 'DMSOTO82@HOTMAIL.COM', '0d8b9526ecfe3395b65eda6a406c1a5e:8yatS0cKU6bZnR8Vddw4TRDrCUYatLjI', 'Registered', 1, 0, 18, '2011-06-15 19:18:49', '0000-00-00 00:00:00', '1250c2b0691c8cfb6ef448b2099efd83', '\n'),
(79, 'Stephanie Rice', 'ruppstep', 'ruppstep@yahoo.com', 'bdfbae92a84e9f419a8e75f832d08f58:XD0PZxiMH7MAkFtaesVwYk6rvQeNjyZc', 'Registered', 0, 0, 18, '2011-06-16 18:56:26', '2011-11-10 19:55:09', '', '\n'),
(80, 'Juan Moreno', 'jcnphx', 'jcnphx@gmail.com', '0917e8f57acf40ba77ff54b39981357b:Jbpb18jIBsB5nchqV28diZinv9eUcRAC', 'Registered', 0, 0, 18, '2011-06-18 00:07:02', '2011-06-18 00:08:40', '', '\n'),
(81, 'Alexandra', 'alexandra78', 'alexandragutierrez@live.com', 'fc2813477c996208fe8b46498b3f398a:GmXX97pqQtnjo40d0lgHYRBOopIi0YUD', 'Registered', 1, 0, 18, '2011-06-18 20:52:12', '0000-00-00 00:00:00', 'ae3ffd56826abd5dc7db2b83066f3cbf', '\n'),
(82, 'Nannette Mulhall', 'BxGirl', 'bxgirlaz@yahoo.com', '7f216753894c3a768b843aa61797d2b7:1FBkmKl8YJHcpQ8LIoRH9jHwFA7cUTqu', 'Registered', 0, 0, 18, '2011-06-20 20:20:06', '0000-00-00 00:00:00', '', '\n'),
(83, 'Anita Compton', 'garysweetpea', 'anita.compton@sandersparks.com', '54191e6a4988c6679c5f94d3a38ba455:w7jWQs0tKzOTFdJXZZj8ZYj1f3T2pBy4', 'Registered', 1, 0, 18, '2011-06-21 17:00:09', '0000-00-00 00:00:00', 'd27ae0d4c629b136c7032d99f24bbc4d', '\n'),
(84, 'Gloria Santa Cruz', 'gysantacruz', 'gloria.santacruz@gknet.com', '8b0017c42292bfbe3d6e0c3df450d683:pdYZIehHIDmIJBdlSVxCHUleQ8dnrZFg', 'Registered', 0, 0, 18, '2011-06-21 17:00:14', '2011-06-21 17:02:04', '', '\n'),
(85, 'TEDDI HALL', 'TEDDI HALL', 'TEDDIHALL@yahoo.com', 'cdefd77632f91b66cdebdef8d4cdb68e:SIEueYirVYcPaRQd1Y8uRsXqjhmG5F2e', 'Registered', 0, 0, 18, '2011-06-22 01:32:28', '2011-06-23 11:59:56', '', '\n'),
(86, 'Bojana DJukovic-Barakovic', 'Bojana', 'bdjukovic@yahoo.com', '65f7a1b962b4cdf1334edb086deeb51b:CRlhOgItS886wfzXDrhEMunA2Qq9hXUk', 'Registered', 0, 0, 18, '2011-06-22 02:58:11', '2011-06-22 03:01:54', '', '\n'),
(87, 'Laura Buchanan', 'alaura', 'eyepennies@gmail.com', 'ec1253c3c35bb565725e792f6aac6a09:2LSY18leQ7XMNLPe8c35B0YWtJDVd2wN', 'Registered', 0, 0, 18, '2011-06-22 23:22:21', '2011-07-08 19:32:39', '', '\n'),
(88, 'zlmkmooeck', 'zlmkmooeck', 'jakoprigazoda@gmail.com', '3fe65952a7312fc8a898201d428ba8d1:nn2ymW1gVTWflpYwXtO8Nt1bl4vvrNTP', 'Registered', 1, 0, 18, '2011-06-24 06:00:15', '0000-00-00 00:00:00', 'f042c69662610f9446709cdcf3fdf343', '\n'),
(89, 'Jenae', 'Jenae81@hotmail.com', 'Jenae81@hotmail.com', '8a626242bac1ad68be502f75e47effeb:P5E3NJFbm5aAijB40TrkC8JfRBZ4D0Bn', 'Registered', 1, 0, 18, '2011-06-28 03:23:56', '0000-00-00 00:00:00', '7996bfaf7b8477e6c9ef9427bd442b7b', '\n'),
(90, 'Harry Katz', 'azkat1', 'hkatz123@cox.net', '9fec0ac505269d15c2cdcf9463d436fa:vk14LyDrOXF5tuqnHKggTmQwie9pwOcR', 'Registered', 0, 0, 18, '2011-06-28 15:29:57', '2011-08-04 18:52:21', '', '\n'),
(91, 'Judy', 'Wallace', 'jwallace@kpho.com', '04214e15711d909fd220fb0301e30ee7:VfNsYdIjZcBSAP5JfbQCSQZF9ZpEzjl6', 'Registered', 0, 0, 18, '2011-06-28 21:05:44', '2011-06-28 21:08:05', 'fe16913a47bcd68d0674df9b9ec3536d:$1$a9252db1$', '\n'),
(92, 'Sabrina Drago', 'sdrago', 'sabsdrago@gmail.com', '11a5cc98291a79a500d2aea67a67f41e:5aw0mWEExPNLkrdxYPSQ43YSuey27l3P', 'Registered', 0, 0, 18, '2011-06-28 21:58:10', '2011-10-12 20:48:25', '', '\n'),
(93, 'Nicole Mora', 'slaw13', 'bobbyqscatering@yahoo.com', 'cd4d0b58298188b06752244dab3d55a9:Mj5mFE2dsyALCEW4kj7XC7ElTWEKMS4J', 'Registered', 0, 0, 18, '2011-06-29 15:36:09', '2011-08-08 18:55:28', '', '\n'),
(94, 'Beth Primeau', 'bethprimeau', 'bethprimeau@hotmail.com', '0a94eb08bdca043ee6592a50e104a72b:8wR454XlPDUa1LHfzxkYlJqmNnidNWMt', 'Registered', 0, 0, 18, '2011-06-29 18:26:02', '2011-06-30 15:09:03', '', '\n'),
(95, 'jessica jensen', 'jesica2k', 'jessicaajensen77@yahoo.com', '3c732fc602b29c85ddceee0b4bd3ad51:jYUWPpdiMGEdeTmsXxrxMfRLNFlaA3qT', 'Registered', 0, 0, 18, '2011-06-29 19:02:00', '2011-06-29 19:03:02', '', '\n'),
(96, 'Mari', 'mnturk', 'mari.turk@gmail.com', '8813bffe921be96bbd609fd0d5d59793:2czP7M3VquKLdztDWHGYdGk1g7DtiKQk', 'Registered', 0, 0, 18, '2011-06-30 04:00:00', '2011-07-06 20:34:41', '', '\n'),
(97, 'Victoria Martin', 'Bspirited', 'binthespirit@gmail.com', '00d7e669d35f8925a97fa828402b6b16:RmCqyZri6dbcxXV5DXtCR5JIjONeJMPZ', 'Registered', 0, 0, 18, '2011-07-01 11:51:05', '2011-08-03 02:35:10', '', '\n'),
(98, 'Dede Priddy', 'dedepriddy@gmail.com', 'dedepriddy@gmail.com', '43a74871ae9a3b0ddae5fd4e5ab43600:jcaWwxdLsk2WQIjKIdZDZ9L4fsC3Yt0d', 'Registered', 0, 0, 18, '2011-07-02 17:01:15', '2011-07-05 18:15:45', '', '\n'),
(99, 'Natalie', 'Natfish', 'Nfisher.9268@gmail.com', 'ed89664b4345d879825c47bc3044b139:5S8qA6SvfcWCyukxQxiSbFwk55IMc5F0', 'Registered', 0, 0, 18, '2011-07-03 04:46:34', '2011-07-03 04:48:27', '', '\n'),
(100, 'Mollie Kaye Wieser', 'mkwieser', 'molliekaye@gmail.com', 'fc6a529189eb50bfd38d006a085a4b12:6eR7WeFyY1MiCgTc7h5f00OOxliUizSA', 'Registered', 0, 0, 18, '2011-07-04 00:48:27', '2011-07-18 19:15:34', '', '\n'),
(101, 'Dianna Scaccia', 'discaccia', 'discaccia@gmail.com', '8a22d8cce084404463c0310ed57f30c3:YQBV7UC1cVjPnSybZ4xliAskoYXSl5FW', 'Registered', 0, 0, 18, '2011-07-04 21:40:28', '2011-07-12 14:22:34', '', '\n'),
(102, 'Sarah Bunch', 'Sarahb928', 'Sarahb928@yahoo.com', '7f55083d7f7cbe087fd5331f852c2829:DVxHRX85GMSRP2v76d7N61C0bVyBm3Yl', 'Registered', 0, 0, 18, '2011-07-05 21:17:16', '2011-07-07 18:59:54', '', '\n'),
(103, 'Josette (Josie) Valentine', 'jvalentine13', 'jvalentine13@gmail.com', '339841a234bbe5894a6031b72b76b453:tADCBJcf3qWBHz8yRUmYMyScJbadSXhf', 'Registered', 0, 0, 18, '2011-07-06 18:55:22', '2011-11-02 00:35:44', '', '\n'),
(104, 'Laura Adams', 'lbz', 'laurabethadams@gmail.com', '7711f2f06450e209b085be50c473ba35:oiBH68ApjvfWvLdGiZpeUYCMGD8Juyyd', 'Registered', 0, 0, 18, '2011-07-07 15:25:10', '2011-07-08 02:33:40', '', '\n'),
(105, 'Joanna Byer', 'jbyer', 'jmbyer@gmail.com', 'a97b422184faa41136b6f1ed6f62e896:d15HkrdvnshmXfuEz0p0MMcyCFPgX6jH', 'Registered', 0, 0, 18, '2011-07-07 16:11:05', '2011-07-07 16:14:19', '', '\n'),
(106, 'Stacey Parker', 'staceyb13', 'ashlynmom23@yahoo.com', '1407a96b9dd3ea5d27c6ffa38f3e3deb:3FfzTsvRtzX73DA5c7YgWRMqKbhUFNdX', 'Registered', 0, 0, 18, '2011-07-07 16:46:11', '2011-07-07 16:47:37', '', '\n'),
(107, 'Heidi ', 'Yogaxoga', 'Heidi@yogaxoga.com', 'cff595206b8e4872d25cae559f634460:OkI39qQyN1Pm071Q7ufbt08gperB76Jr', 'Registered', 0, 0, 18, '2011-07-07 17:00:29', '2011-07-07 17:14:29', '', '\n'),
(108, 'Aprille Slutsky', 'aprilleh73', 'aprilleh73@yahoo.com', 'f77c59531d6421b9ab9c31c9808114f5:yndNEXrNuSsPTM8QDWDigvsjVgLJUlQU', 'Registered', 0, 0, 18, '2011-07-08 14:48:36', '2011-08-19 20:25:42', '', '\n'),
(109, 'Meredith Ur', 'azmere13', 'mere.ur@hotmail.com', '6ce09118e082457995bbb9f09b0ae9cc:DKPUwvnGz8BCvdDQQiXSPPwYwyxSy5Nu', 'Registered', 1, 0, 18, '2011-07-10 02:55:09', '0000-00-00 00:00:00', 'ae68da412f71a9dd055aa0e51b70e828', '\n'),
(110, 'Sue Kiesey', 'skiesey', 'sekredsue@gmail.com', '1f2a774dae12f7ea7773802686181b97:2CW26HeAMhpxUBvUBBKSlNw0q263scdF', 'Registered', 0, 0, 18, '2011-07-12 20:06:43', '2011-07-12 20:07:59', '', '\n'),
(111, 'Karlene Carlson', 'KarleneCarlson', 'karlene@thewatchpalace.com', 'e106a441ef1c39cee2eb2f3f607df5f6:Y1BiId24nVZL1ENptzlCaIpteEKQKmT4', 'Registered', 0, 0, 18, '2011-07-13 01:59:40', '2011-07-15 16:40:11', '', '\n'),
(113, 'Tara M', 'tara64', 'tara64@gmail.com', 'f112be4d88b141817e6bd6526dcc111b:WC8vRXk8jMjKYmjFVjoi7daSEWJ6stql', 'Registered', 0, 0, 18, '2011-07-15 15:32:44', '2011-07-15 15:35:19', '', '\n'),
(114, 'shenate', 'stabora', 'shonn1974@gmail.com', '1056943c4acb63d34a5c5597dcf1d661:W2zu7nVN1nclUbvQb7QmY4sfASteZi6l', 'Registered', 0, 0, 18, '2011-07-17 01:09:35', '2011-07-17 01:10:44', '', '\n'),
(115, 'Joanie', 'joaniegalas', 'joanie.galas@mihs.org', '9a5e19f367354b877b1b90dbf541de00:2IqraFu5vfMkEC0pzHkl3wLe5vY4Zq2M', 'Registered', 0, 0, 18, '2011-07-18 19:05:47', '2011-07-18 19:09:05', '8daf833acf31b95f252da90f785f8521:$1$5310b34a$', '\n'),
(116, 'Shari Guilfoyle', 'smguilfo', 'sguilfoyle2002@yahoo.com', 'd45104da8af317554d9cc68aa7370f2a:B2ZHZNGYqWq4LNrxsjvIwwpD8demceHk', 'Registered', 0, 0, 18, '2011-07-20 04:48:10', '2011-08-23 18:01:37', '', '\n'),
(117, 'Jenny Schell', 'jlschell', 'jlschell84@gmail.com', 'cc5937c6c804439f89c4e5fe5e033600:ODLpinFiDYXCg9BL7DhA666mjEmdQ1MA', 'Registered', 0, 0, 18, '2011-07-20 16:16:36', '0000-00-00 00:00:00', '', '\n'),
(118, 'Elise Frances Welch', 'elisefrances', 'elisefrances@hotmail.com', '8ca6c2bbd3d5d494da9ad7f69c37e69c:PFTwvk3c8dbDGvBP60TRGjp8Fn7KwSg3', 'Registered', 1, 0, 18, '2011-07-21 01:31:21', '0000-00-00 00:00:00', '1e4bf1c10c6536fd867002166cab9554', '\n'),
(119, 'Danny Silvani', 'wisewitch1', 'wisewitch1@mac.com', 'a895d1846a2da3cd305d0a366b423112:Zy9dDUb9giTfJFLIaatrxGQZ6aVKad8e', 'Registered', 0, 0, 18, '2011-07-21 22:06:20', '0000-00-00 00:00:00', '', '\n'),
(120, 'dorbent', 'dorbent', 'saw.saneykeqos@gmail.com', '29eba697c0856bf70a03b506c6a6a3e3:yy5ozUZzGQGnqNxeCGvwLsNzDiVbPnty', 'Registered', 0, 0, 18, '2011-07-25 05:57:26', '0000-00-00 00:00:00', '', '\n'),
(121, 'Victoria Martinez', 'k3tbs', 'victoria.martinez@asu.edu', 'faca30e84ec9ce6f4400f3b717b55260:DrIc56G2wfjhidhYDrhGnerzWDlwDjx2', 'Registered', 0, 0, 18, '2011-07-26 18:03:48', '2011-07-27 22:15:50', '', '\n'),
(122, 'Amiee Coy', 'amiee', 'amieecoy@hotmail.com', '9f9f8f24d19f2e6e489666a089d2a963:GnLcnDHJyYnUHZaX53DwmTk7XCrZrx3S', 'Registered', 1, 0, 18, '2011-07-26 20:02:30', '0000-00-00 00:00:00', 'f92f1d5b874985a39a8d028767dbc926', '\n'),
(123, 'Katie Rowan Carey', 'katecarey', 'followyourbliss@earthlink.net', 'fc7c48d9925d6135af027d3c908fb39b:0tp4FZYiHaKqSQ3orz7W5PQTReu1cLns', 'Registered', 0, 0, 18, '2011-07-27 21:43:45', '2011-07-27 21:51:06', '', '\n'),
(124, 'Elizabeth Studebaker', 'estudebaker', 'esstudebaker@gmail.com', 'de3ac01c96c916a9f9bbab4d46201f01:5LyOoFrg7kyVpLK4ed2tp0WwpOZXFnBi', 'Registered', 0, 0, 18, '2011-07-28 12:32:44', '2011-12-29 21:23:46', '', '\n'),
(125, 'Pat Peterson', 'patpet', 'patpet44@aol.com', '1d559c615f117c80692d4bd906b3cf99:X3MYIA1g9WUbpJqFoU8Pw5C3hQ4TwQjl', 'Registered', 0, 0, 18, '2011-07-28 22:44:43', '2012-01-14 20:42:44', '', '\n'),
(126, 'Susan Henry', 'sushenry', 'sushenry@hotmail.com', '4342ac30902d02019131758add1ce5dd:RAhdyMzsQovOb7irswaasfnnjaBpsaR8', 'Registered', 1, 0, 18, '2011-07-30 22:54:36', '0000-00-00 00:00:00', '2e48ed226f6242859f4ebd3c4609ddd6', '\n'),
(127, 'adrianne', 'ccmidknight', 'ccmidknight@yahoo.com', '0d5d3315807c291d9741d7aaf2ca641c:3F2y6bJ28YffadZyJbWIkGEaY3ZNVcJI', 'Registered', 0, 0, 18, '2011-07-30 23:47:03', '2011-07-30 23:47:30', '', '\n'),
(128, 'Morgan Montez', 'montezmo', 'montezmo86@gmail.com', 'df8af62c0c74aa20dd1cf5012fd15b86:TFmNgTAUuOP5QMAXOV49ghXZDKZBAcxc', 'Registered', 0, 0, 18, '2011-08-01 21:51:51', '2011-08-01 21:52:27', '', '\n'),
(129, 'minami', 'mtani81', 'mtani81@gmail.com', '07a86ae96f733acf48ae1577fe9163e3:4iiDKXvkfgdUEZ5MWFLVIx553gqIQIcu', 'Registered', 0, 0, 18, '2011-08-03 01:14:29', '2011-08-03 01:16:49', '', '\n'),
(130, 'angela yack', 'angieyack', 'angie.yack@gmail.com', '38d928113dccceaf4e6d6ee96ac09c9c:pQRU0PU6D6m7xpuhGnQffXSLgNLt6R2B', 'Registered', 0, 0, 18, '2011-08-03 21:36:41', '2011-09-22 00:07:33', '', '\n'),
(131, 'Cherylyn Henry', 'Schmee', 'cherylyn.henry@gmail.com', '7117da057801a8aeb36e5a3663fdd74c:StGV8m9ZH181sD42mTSjutp7VjAq0A9N', 'Registered', 0, 0, 18, '2011-08-04 19:49:41', '0000-00-00 00:00:00', '', '\n'),
(132, 'Sharon Wood', 'Sharon Wood', 'sharonawoo@msn.com', 'e54a3bb07928cbd3d8c14fd584119c65:3RfbNT8y7CjML3Tk60Ydh5BoVY5eY1pi', 'Registered', 0, 0, 18, '2011-08-07 23:58:47', '0000-00-00 00:00:00', '', '\n'),
(133, 'LatishaThornton', 'Latishathornton', 'jarrodfatcow@yahoo.com', 'bd4f6bae163821127db671cc3f349582:T8osOrdJQbc3FCEm8U0sz22TtOpQwu0j', 'Registered', 0, 0, 18, '2011-08-09 00:59:42', '2011-08-09 01:02:21', '', '\n'),
(134, 'zandra', 'yogarocks', 'zandra@crazycarlosaz.com', '098ecd9898c136cf7c10554390a78f9a:wLVQwrCXlJX2WnjqdMfCW9B08W4asMaD', 'Registered', 0, 0, 18, '2011-08-10 17:26:49', '2011-08-10 17:30:05', '', '\n'),
(135, 'Joanna Marroquin', 'jmarroquin', 'iheartbetty@gmail.com', 'a74490395c2ced49bf8cf8450dc7a684:3RBuxQ0x59RMgeQ6UFxaA5hyUySju5o3', 'Registered', 0, 0, 18, '2011-08-10 19:44:04', '0000-00-00 00:00:00', '', '\n'),
(136, 'Armando', 'armanvilleg', 'armanvilleg@aol.com', '952033a0a95427b5f12569f0398c4853:F03SgQatAFb2nADuNoZ19za4WrhxglDL', 'Registered', 0, 0, 18, '2011-08-12 00:16:18', '2011-08-18 18:28:20', '', '\n'),
(137, 'Dillan', 'dillanboyd', 'dillanboyd@gmail.com', 'ed5f43394ce7f880b0cdbf37a1c51263:8eBUdcqA4iEega5OUIohSId116nYT6S1', 'Registered', 0, 0, 18, '2011-08-15 05:14:36', '2011-08-15 05:16:27', '', '\n'),
(138, 'Cristina Turchiano', 'tinacaraballo', 'tinacaraballo@hotmail.com', '6ae749ccfa1e264d7cea7a8446bd1e7a:L7nQI6WJwlWZEDqb5IdBrOZoG2c6WNpF', 'Registered', 0, 0, 18, '2011-08-15 15:07:48', '2011-11-23 03:14:15', '', '\n'),
(139, 'Tami Cilk', 'tamicilk', 'tamicilk@gmail.com', 'fc9df2feb04f2cad6f4c75358e76c5b4:cG3PiyBZaLZbGea1RyXYvgzrGEsO5cU9', 'Registered', 0, 0, 18, '2011-08-19 21:09:28', '2011-10-09 04:37:53', '', '\n'),
(140, 'Nicole Chakos', 'NChakos', 'NicoleC0403@gmail.com', '9d4adf8e88c57037cc9098cac922b9ad:8BwgExrMmVILtdmgiogc8kRbrFVHHaJw', 'Registered', 0, 0, 18, '2011-08-23 21:04:38', '2011-09-07 21:17:20', '', '\n'),
(141, 'Caryn Koppes', 'Caryn', 'ckkoppes@gmail.com', 'ad3a6cebff905c1270a899ba22ffb90d:YVHOUZnMCmA00XOkfyzD2LAlQ9IyKZwm', 'Registered', 0, 0, 18, '2011-08-26 03:46:03', '2011-08-26 03:50:20', '', '\n'),
(142, 'Bresha Burns', 'bburns', 'bburns@capital-lumber.com', '40c932313f9b0538a56cabd866fb33d1:1IenJI3w2RxU3sW6JkVRGzyzEa9hS79U', 'Registered', 0, 0, 18, '2011-08-30 18:32:09', '2011-08-30 18:33:16', '', '\n'),
(143, 'Dan Good', 'dgood', 'dgood@capital-lumber.com', '605577c5118e042a5b86edf716472913:buSeNiasFL1EtZTAWyAce8XCCUpst29l', 'Registered', 1, 0, 18, '2011-08-30 18:33:38', '0000-00-00 00:00:00', 'e7d49df87efa896d2cfc6c96ebd5a68a', '\n'),
(144, 'Dan Good', 'dagood', 'dagood@capital-lumber.com', 'ec77ef7bdb27618f15d7f3f7371ef5b4:M60pZvJ5ME1oKsnKzaT7EWQJUcYNEIsz', 'Registered', 0, 0, 18, '2011-08-30 18:39:36', '2011-08-30 18:40:40', '', '\n'),
(145, 'Christina Castellanos', 'Castec26', 'castec26@gmail.com', '5b3f5b1a88575f62df66f36ae4f73333:DaSt9vOqF9ONNVbw0DXCfO3SmEKtD48l', 'Registered', 0, 0, 18, '2011-09-02 20:50:47', '2011-09-02 21:33:18', '', '\n'),
(146, 'Rianna Marie Rhoads', 'Bellacruz3', 'Center_stage3@hotmail.com', '20a7153432a0a3b989fdb65865c3d315:tnkcucmmUT5q5N6JLlgRAtpe3YkJzxxJ', 'Registered', 0, 0, 18, '2011-09-06 17:01:00', '2012-04-07 01:31:27', 'edc69345f60b5fcc4d7148a574efc009:$1$ecb51f88$', '\n'),
(147, 'Nancy', 'nlgerlach', 'nlgerlach@hotmail.com', '400d23f81b6b5e87e0aad2c5c69d6970:h76zwpJGkKxv8JO8rb0MfUJ3FMa0qM0L', 'Registered', 1, 0, 18, '2011-09-07 16:04:40', '0000-00-00 00:00:00', '4e0790b350cce71831e7d88706d54693', '\n'),
(148, 'Juile Unroe', 'JRide883', 'julzeu@gmail.com', '7db05933cc49cb95ab7ff6b3f5096c34:8m5MQC808Sj6X2vNyDa3bOzm9XSS9gzO', 'Registered', 0, 0, 18, '2011-09-09 18:36:19', '2011-09-09 23:13:58', '', '\n'),
(149, 'Annette Petzel', 'Babs194826', 'alpetzel@cox.net', '45a99d89e3211aa819cbe68b1356b68f:5OQmnRfaqTsiqbIZ4O6hPii7kkbjfVFN', 'Registered', 0, 0, 18, '2011-09-10 01:26:00', '2011-09-10 01:26:37', '', '\n'),
(150, 'Sara Libby', 'libbysara', 'libbysara@gmail.com', '44e8a67942c0578af74797f62091d562:lU74T9o0ogAgHNjuCD4ZtmjqvfpXRPMn', 'Registered', 0, 0, 18, '2011-09-13 19:37:01', '2011-12-15 19:22:16', '', '\n'),
(151, 'joy somers', 'joyous05', 'joy.somers@asu.edu', 'aa08e4b521592d034989a37c3efac6ae:kq5le6bRjtzpir0eV98TAbgjCWOtE5c2', 'Registered', 0, 0, 18, '2011-09-13 22:39:51', '0000-00-00 00:00:00', '', '\n'),
(152, 'MARGARET OLEK ESLER', 'molek', 'molek@yahoo.com', '21a6d07f889721c46a07d94446442cc2:yy6IH3aM9Md1rVyxWmessqA6kbmgw4i4', 'Registered', 0, 0, 18, '2011-09-14 18:06:22', '2011-12-05 21:47:54', '', '\n'),
(153, 'Christine Trusken', 'trakstr', 'trakstr316@yahoo.com', '648bdbc0433f4017daa6b64fe82c192a:X30qJ1YBdDvRQVtWNlC6lBX5abHggy9n', 'Registered', 0, 0, 18, '2011-09-14 19:12:58', '2011-09-16 04:25:55', '', '\n'),
(154, 'Crystal Eastman', 'Creastman', 'crystalreastman@gmail.com', 'ef8eccee0285e0c78ef154b43fd7ee70:DUbzgcHf7b7hNyoYNWVXhaplgGlQaakq', 'Registered', 0, 0, 18, '2011-09-21 03:08:07', '2011-10-01 18:16:24', '', '\n'),
(155, 'Marla Ruiz', 'marla', 'marla.ruiz@mihs.org', '8b606fda933984083e8dca3ce7db812d:QfqZ5gq7vYNbEXn3WsErR1Tc3TaJ4SxI', 'Registered', 0, 0, 18, '2011-09-21 15:03:41', '2011-09-21 15:05:02', '', '\n'),
(156, 'Katherine Desmond', 'kbdesmond', 'kbdesmond@gmail.com', '95c923f9b98d8893c1db7a5df50e5606:agtu3G3ANTtEOSE20l051ps7ryGQlR3R', 'Registered', 0, 0, 18, '2011-09-27 17:47:09', '2011-10-03 19:39:18', '', '\n'),
(157, 'Juliet Nelson', 'nelson.juliet', 'nelson.juliet@gmail.com', 'c47d6baca9a1f1f03b45de1b7ed5b43c:7nY56m4KOIxBAlwhRc4s9jzHpytd1Nmc', 'Registered', 1, 0, 18, '2011-10-06 16:07:43', '0000-00-00 00:00:00', '84d37c27809bd1b3617fdc99af7246a9', '\n'),
(158, 'monica picard', 'mpicard', 'picard.monica@gmail.com', '15ae3c01ea1be752231c6c87a0b26bd9:XURhn6AEl6j0yA6e6HmkvUuAJzIwePQt', 'Registered', 0, 0, 18, '2011-10-17 21:25:27', '2011-10-17 21:26:15', '', '\n'),
(159, 'Suzanne', 'suzanne', 'azanalyst@gmail.com', 'b5a455001394ce310033cc7f7e0a2a0a:TgdojHtBHNcuhSCBGzIhrdy1SVTe38ZD', 'Registered', 0, 0, 18, '2011-10-18 18:08:01', '0000-00-00 00:00:00', '', '\n'),
(160, 'Kirstin Havice', 'khavice', 'kirstinhavice@gmail.com', 'd52332b5868ff1740a5f68e1f722107f:KNXvpydYff63BzKHkjYiCKb8mzJ9r88B', 'Registered', 0, 0, 18, '2011-10-18 22:57:45', '2011-10-18 22:59:44', '', '\n'),
(161, 'Carolyn Mosher', 'cjmosher51', 'caolynjeanne51@yahoo.com', '4a596a5aa9371c16a67d3c9a350db1b9:Igv199OFplEaRLH0TTrVxiRXPHJVOzEY', 'Registered', 1, 0, 18, '2011-10-19 02:54:59', '0000-00-00 00:00:00', '539da4f4b053566a07fd604ef5d6027f', '\n'),
(162, 'Tessa Gonzales', 'Tessa', 'tmorrosson@gmail.com', '44a698b3953404b6cdd18c89c484fd04:DOX8O7ndBvBy6IpPELSasUbweQYiDv93', 'Registered', 1, 0, 18, '2011-10-24 04:20:54', '0000-00-00 00:00:00', 'ab72235a2d9fe5db44e06efccc6b5a26', '\n'),
(163, 'Mindy Lee', 'mindyblee', 'mindyblee@gmail.com', '74caabaa87336378e17b6350a290acc7:LyFbCmVVqyhzbEI2tkvPjcQ1X7S1pZIr', 'Registered', 0, 0, 18, '2011-10-24 17:40:33', '2011-10-24 17:44:39', '', '\n'),
(164, 'cindy coplen', 'cindycoplen', 'cindy.coplen@gmail.com', '73f24cbef9d97acbd57de19eef258eb4:a1TvdrGi9rL8ujlZWDrALNDhFF3BGoos', 'Registered', 0, 0, 18, '2011-10-25 20:30:55', '2011-10-25 20:33:17', '', '\n'),
(165, 'Desiree Curley', 'desiza', 'desireecurley@gmail.com', '48dacd1e8e0f80f4319e2e9a7450da9f:K1vPpMX5ZmzXnzRlL23itw6ybXEsOMsM', 'Registered', 0, 0, 18, '2011-10-26 16:46:59', '2011-10-26 17:49:11', '', '\n'),
(166, 'Kim Blaess', 'kimberquirky', 'kimberquirky@gmail.com', '9f486eb3f211e7006696604eba0c30d9:VLVti9SZLYRV5xj19oRpqeSIFPjLSlat', 'Registered', 0, 0, 18, '2011-10-27 18:23:21', '2011-11-07 14:39:03', '', '\n'),
(167, 'Allison Duquette', 'aduquette1', 'allison.duquette@hotmail.com', '4b632e962a40732a911466a430f07369:aD4TiN1nfGMkHOnh8hH8P0VmQLVG77l0', 'Registered', 0, 0, 18, '2011-11-03 00:50:32', '2011-11-09 18:12:15', '', '\n'),
(168, 'Laura E.', 'Rident21', 'ldetter@gmail.com', '230b7dab466fb348f4e7631e6bcff9dc:3J4YcI6tF9BZX5Ac17GEzybL6b72BpKD', 'Registered', 1, 0, 18, '2011-11-15 19:32:19', '0000-00-00 00:00:00', '68c355a8535d977a83b49fc3b3d34521', '\n'),
(169, 'jackie', 'jcupp4@yahoo.com', 'jcupp4@yahoo.com', 'd813c1b832007a4256022d6f12940928:dIcdlcL73kwP7sk4A9zf44ebuozIGoZh', 'Registered', 0, 0, 18, '2011-11-16 16:48:28', '0000-00-00 00:00:00', '', '\n'),
(170, 'Conny Berry', 'connyberry', 'connyberry@rocketmail.com', 'b0c39a060070008d0fb335e75a1019aa:HssCpKKrx7vnxyXPPhD8iocwxk1bWPVI', 'Registered', 0, 0, 18, '2011-11-16 16:59:34', '2011-11-16 17:04:20', '', '\n'),
(171, 'Danielle Dancho', 'ddancho', 'doubleduofa@aol.com', '7a555322d8f83a1cf3eb284f693ec4f5:7NeiBqoa1wNoluDqHfoqWqedQqdVjnkd', 'Registered', 0, 0, 18, '2011-11-21 19:28:40', '2012-01-10 23:28:58', '', '\n'),
(172, 'Megan McDonald', 'mmmcd29@gmail.com', 'mmmcd29@gmail.com', 'f655e58d500f852b9431eeaafcdb424e:3w4QgYXYtwS3GMGPG957csG7FNObfW7v', 'Registered', 0, 0, 18, '2011-12-05 22:09:42', '2011-12-05 22:10:34', '', '\n'),
(173, 'becky ankeny', 'beckyA', 'beckyankeny@mac.com', '76a9bcd4661fce3ced4b695851155858:ZSf0cdQelThsKzxJYk6npgfHMWoolqBD', 'Registered', 0, 0, 18, '2011-12-05 23:59:06', '2011-12-06 23:19:39', '', '\n'),
(174, 'watchesonline', 'watchesonline', 'judann72452@yeah.net', '582d62960284d0cb38f1bcfd4cdeff57:wSMLxHtjN7fiGamtK17LqgW9fWI1Qam4', 'Registered', 0, 0, 18, '2011-12-07 11:02:11', '2012-05-04 06:40:56', '', '\n'),
(175, 'Tatsy94169', 'Tatsy94169', 'Brola@ceoll.com', '6ba4c63874a8791ecbdb75dec7c2d397:8BkgkhOQ8hQfHcSRaVg8k4TuQB6O89gC', 'Registered', 0, 0, 18, '2011-12-12 15:52:38', '2011-12-12 15:53:47', '', '\n'),
(176, 'Elizabeth McNeil', 'mcneil', 'mcneil@asu.edu', 'fbe397b29a98251716808e7bdb046bde:9m1egXyz7KbV46Hd20nkzCfpzQsSZ8MV', 'Registered', 0, 0, 18, '2011-12-13 15:33:32', '2012-03-12 20:03:12', '', '\n'),
(177, 'William Khashan', 'nwkhashan', 'nwkhashan@gmail.com', '1eeeda66a9036da96edf77a9807b875c:o2GCyOHNlz9NB7Zu9Y0Ng9OCR5RLzytC', 'Registered', 0, 0, 18, '2011-12-14 00:10:35', '2012-01-12 23:59:17', '', '\n'),
(178, 'Tatsy04706', 'Tatsy04706', 'Bruer@ceoll.com', '82fc046c76ea026afd1f98cc2220fecf:xwEjHUTE4ag4lgKIpJGLiEdw5u2mH6QH', 'Registered', 0, 0, 18, '2011-12-17 08:30:04', '2011-12-17 08:31:19', '', '\n'),
(179, 'monclermc10077', 'monclermc10077', 'banglal3587@163.com', '2d820e2b15c86c46cf444926c8393540:367WLOmYiLZSD4YOHiIRmEVYMpAJeciz', 'Registered', 0, 0, 18, '2011-12-24 11:53:40', '2012-03-02 20:26:22', '', '\n'),
(180, 'buydresses', 'buydresses', 'weisbe29492@tom.com', '9013f81b1d0e20a034efdc0be957a8a4:Mb5AcneSPrDZNq9IVEkAt599wadgRPeA', 'Registered', 0, 0, 18, '2011-12-24 19:45:47', '2012-03-02 19:59:09', '', '\n'),
(181, 'discounttop', 'discounttop', 'bangzhuo8880@163.com', '46effc10e43c40ac180412b922aca51f:snkdPdEVJNjbPuQOFCilaAO855QVQ9oQ', 'Registered', 1, 0, 18, '2011-12-25 03:08:41', '0000-00-00 00:00:00', 'a3e23ee5f429c7aaaef25fd74f0dd532', '\n'),
(182, 'canadadown', 'canadadown', 'neurohrexton@sohu.com', '376aceb2063e670ccf2e62a8bf99227e:S12hMnB97IZolZJ7C5RdPMOG16LXKo3E', 'Registered', 1, 0, 18, '2011-12-25 19:02:10', '0000-00-00 00:00:00', '16adedda77540b1fcd0765d58cb2f60a', '\n'),
(183, 'louboutionsale', 'louboutionsale', 'doukangh65234@yeah.net', 'b0304b4f96cdbb37a31f50ae9153b01f:ZDUjrybmuwfqIcp8dsLlZ5ltPlY2m4SZ', 'Registered', 0, 0, 18, '2011-12-26 00:09:15', '2012-02-26 21:15:45', '', '\n'),
(184, 'Stacey Piluri', 'riaz183', 'riaz183@aol.com', '87493feb534303d8888667713c9eb0b9:mZYRApLSmrr6C0WDBWdoSzh8OvFdNo5s', 'Registered', 0, 0, 18, '2011-12-28 01:33:03', '2012-01-17 05:53:09', '', '\n'),
(185, 'Angela ', 'angela', 'angela.osborn@gmail.com', 'be40d0a4afbbc41a2712854d0f948396:mXfbVBuqIgpRHeEAfz1VMaABH5rDteS2', 'Registered', 0, 0, 18, '2011-12-29 22:37:08', '2011-12-29 22:39:52', '', '\n'),
(186, 'Rachel Enzweiler', 'renzweiler', 'rachelenzweiler@gmail.com', '1f514cfbbf1d790e730b0021ee229cfa:enzViwVlehvrUbSyAPGV7wYjgmu4lGQ3', 'Registered', 0, 0, 18, '2012-01-02 01:26:59', '2012-01-04 16:30:32', '', '\n'),

(187, 'Danielle Martinez', 'danielle', 'danielle717@gmail.com', 'dbce3ba0c627743924e3eb4f5063c347:rHxMDPJeZdlUJDIqqvwEtlx04z3ndbAI', 'Registered', 0, 0, 18, '2012-01-03 02:12:28', '2012-01-03 02:13:03', '', '\n'),
(188, 'Regina Fisher', 'Regina Fisher', 'regina@reginafisher.com', '12054d1ec0762291001595c4258c954e:kymScSgYg32PPJNAmZwYGeoQlFZaMV6h', 'Registered', 0, 0, 18, '2012-01-03 23:01:32', '2012-01-03 23:14:05', '', '\n'),
(189, 'Ann Cinellaro', 'acimellaro', 'acimellaro@gmail.com', 'da97e22a2b8c4826cf705e277cd178c8:7Ix5xMXKtfvyjH0kmwzBEEhOF0Yx2ucR', 'Registered', 0, 0, 18, '2012-01-04 00:34:46', '2012-01-04 00:35:44', '', '\n'),
(190, 'Lisa Underhill', 'lmunderhill', 'luju72@yahoo.com', '131b3ca0f1456b502a99329a583eaafa:G927ofT98rmRQfk7JuIhVpAxxIEoZACy', 'Registered', 0, 0, 18, '2012-01-05 20:03:12', '0000-00-00 00:00:00', '', '\n'),
(191, 'Jane Hutchinson', 'janehutchinson', 'jinnymiggy@yahoo.com', '64d81166ad1c0669cfbf33d2ce1f027d:3jMd5g1jsdRBmMmnmJhCH57e5vTTPnMy', 'Registered', 0, 0, 18, '2012-01-07 16:57:44', '2012-01-07 16:59:03', '', '\n'),
(192, 'Jackie Cupp', 'jcupp', 'jackie.cupp@mihs.org', '2070e4197c5e918d5bc1554272e13b64:X6wYHET3HMQ1fE6EKl1fPBbxUwVS8xyC', 'Registered', 0, 0, 18, '2012-01-09 23:32:58', '2012-02-03 22:49:00', '', '\n'),
(193, 'Gini Sater', 'gesater', 'gesater@yahoo.com', '0d627700551dfa12d69f7691110f7883:9gI48kFGOzK6xfm42SP8hl0ZltnEtmT6', 'Registered', 0, 0, 18, '2012-01-15 18:39:50', '2012-01-15 18:40:28', '', '\n'),
(194, 'Bridget Sharpe', 'bsharpe86', 'bridget.sharpe@gmail.com', 'e2430fff8266cdba86fe4e55caa858d5:KMMPcfP7FA5PgskjRoB9zlgJuCeuiy56', 'Registered', 0, 0, 18, '2012-01-16 22:08:18', '2012-01-16 22:08:56', '', '\n'),
(195, 'Karen Sargent', 'ksarge1988', 'sackinthetrash@yahoo.com', '927d1f0c6fe8c4dffef2a1b1aa8c0301:wugzB2JHkNEZfKLhOUS77IWM2yKWqhdl', 'Registered', 0, 0, 18, '2012-01-20 17:39:05', '2012-01-20 17:39:38', '', '\n'),
(196, 'jade', 'jaderaeanne', 'plainjade@gmail.com', '3401fdde22b90dd7c8291d729dd10fdc:K9xsyqclpk3auJ9Y4A3WO26Q4GZxjo7E', 'Registered', 0, 0, 18, '2012-02-06 23:00:21', '2012-02-06 23:17:22', '', '\n'),
(197, 'Katie', 'Piper', 'katiemschell@gmail.com', 'd928cda46e7961bcf37469357a1b788c:UOugFNW4Ljjb5yNUzDeYs1Vy164j5BEg', 'Registered', 0, 0, 18, '2012-03-29 04:17:14', '2012-03-29 04:18:01', '', '\n'),
(198, 'Kate', 'kate10251', 'kate1025@msn.com', '5b0a7f89e2ccb09924b71819224c2473:LnUyBEio15J0zEOT8mGVVlvc8zvqdc9P', 'Registered', 0, 0, 18, '2012-04-06 19:16:30', '2012-04-10 17:02:46', '', '\n'),
(199, 'zaboravkk', 'zaboravkk', 'zaboravkk@gmail.com', '9bcc9a19b962e612d35f15856604703f:yF71sJGVVutcPelD2QcXTrUg775P5JHf', 'Registered', 1, 0, 18, '2012-06-14 15:31:19', '0000-00-00 00:00:00', 'b6d862de58e349c4646e3c3047049bbc', '\n'),
(200, 'zabormaki', 'zabormaki', 'zabormaki@gmail.com', '233a89dea217372c5b7b3cc49923cba1:VgaCAqdoEVnNOfjofWZaLImsqUjZJ1ZR', 'Registered', 0, 0, 18, '2012-06-15 01:50:42', '2012-06-16 07:22:48', '', '\n'),
(201, 'smooja', 'smooja', 'smoojakp@gmail.com', '8c8ed5b14aa4d3efaee513aeb7775d60:DcjxQtkKnrChs9ksysxCuq4NBZbylQsl', 'Registered', 1, 0, 18, '2012-06-22 20:50:48', '0000-00-00 00:00:00', 'e3a9f34c117cf6a42995907bcd253119', '\n'),
(202, 'llethurnermarce', 'llethurnermarce', 'aapickadulttoys@loginadulttoys.com', 'db0067a7f4207f9f0cdce0ae4ec1f949:Xut8ba5ieUTltA94MDW8vJuWKIKvLg50', 'Registered', 1, 0, 18, '2012-09-24 12:21:36', '0000-00-00 00:00:00', '21bde29c8ee650b100de26a22d31e9ff', '\n'),
(203, 'rterrobt', 'rterrobt', 'choncesex@oncesex.com', '1f2d8cd9feb822dd21b044625094d7fe:HM5Q2Ju2uidZSMxkhEZzMK6n7vZgI6iu', 'Registered', 1, 0, 18, '2012-09-26 16:34:39', '0000-00-00 00:00:00', '359575c8602abea9289f088059638580', '\n'),
(204, 'nfflinggrai', 'nfflinggrai', 'bikissadulttoys@feeladult.com', 'e2282c27f62a0fc92d62da54ebad308d:JdRWabhOJxYu6WZbHymowc7GwiirEgqz', 'Registered', 1, 0, 18, '2012-09-28 04:01:40', '0000-00-00 00:00:00', 'a795ceb3b70bd40990bc7015be98ae40', '\n'),
(205, 'dnsmaydastefa', 'dnsmaydastefa', 'bylinkadulttoys@brightadult.com', '7bf0e89b5989623408fe88b8f64c514b:4kQ3VVza8tWIVEYS3stTeQqcBXzebiqz', 'Registered', 1, 0, 18, '2012-09-30 00:13:34', '0000-00-00 00:00:00', 'e790c8139e30f4e43118bacfcba4d246', '\n'),
(206, 'pemontpettenn', 'pemontpettenn', 'atoncesex@linkadulttoys.com', '32dda6afdabb131b44469bd8b8b08ae5:7RN4CjaCMRrJ0uUzKHCvZkrpFsLvNJBh', 'Registered', 1, 0, 18, '2012-10-12 12:41:48', '0000-00-00 00:00:00', '617291bd1dd0f628f41f95351f29c1a7', '\n'),
(207, 'mwesmilo', 'mwesmilo', 'beonsaleadult@onsaleadult.com', '40f6467140cfe20886891805996930a9:rOMPKMXE28tqLul0Wlr8dIkwmX3C5dvU', 'Registered', 1, 0, 18, '2012-10-12 18:39:29', '0000-00-00 00:00:00', 'c551ae7f9529d0a453aaf26c1e019318', '\n'),
(208, 'legollineco', 'legollineco', 'zhangmingqihaha@163.com', '6857eef7a5ffa662b6668748f13100bc:3Lb7UPdsbxeEby5YnWjRomxf5uv5P5yA', 'Registered', 1, 0, 18, '2012-10-12 23:51:07', '0000-00-00 00:00:00', 'b95fbf1b711bc8200850e579f63caa8c', '\n'),
(209, 'paseppicata', 'paseppicata', 'cici_zy1987@163.com', '32b799e1510a997b2bf563dfd3d90868:MXFIw7ULqD0xHQJlnIy8Q4yslDrg3U1L', 'Registered', 0, 0, 18, '2012-10-13 03:42:14', '0000-00-00 00:00:00', '', '\n'),
(210, 'louselrenem', 'louselrenem', 'xgirlstudent082@126.com', '271b413a728b13a6d81103c3eb5e1306:rvyEnb0kAAi2fQ06bNonhgCzzcap1p1m', 'Registered', 0, 0, 18, '2012-10-13 08:48:50', '0000-00-00 00:00:00', '', '\n'),
(211, 'iaspositojess', 'iaspositojess', 'coober@eyou.com', '7948f0c7b5c811339eb1a55e6baadaf4:D77xIwH3xicDpi4ti76zEeEvHtotE38L', 'Registered', 1, 0, 18, '2012-10-13 12:26:05', '0000-00-00 00:00:00', '8c8b505d3ab708e9230a1b2c80f3d4dd', '\n');

-- --------------------------------------------------------

-- 
-- Table structure for table `jos_weblinks`
-- 

CREATE TABLE `jos_weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `jos_weblinks`
-- 

