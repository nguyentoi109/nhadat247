-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 28, 2020 lúc 03:48 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Cơ sở dữ liệu: `haphome`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Một người bình luận WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2020-09-08 15:39:47', '2020-09-08 15:39:47', 'Xin chào, đây là một bình luận\nĐể bắt đầu với quản trị bình luận, chỉnh sửa hoặc xóa bình luận, vui lòng truy cập vào khu vực Bình luận trong trang quản trị.\nAvatar của người bình luận sử dụng <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'https://haphome.vn', 'yes'),
(2, 'home', 'https://haphome.vn', 'yes'),
(3, 'blogname', 'HAP Home', 'yes'),
(4, 'blogdescription', '', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'hqh91@yahoo.com.vn', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'd/m/Y', 'yes'),
(24, 'time_format', 'H:i', 'yes'),
(25, 'links_updated_date_format', 'j F, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%', 'yes'),
(29, 'rewrite_rules', 'a:151:{s:8:\"du-an/?$\";s:27:\"index.php?post_type=project\";s:38:\"du-an/feed/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=project&feed=$matches[1]\";s:33:\"du-an/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=project&feed=$matches[1]\";s:25:\"du-an/page/([0-9]{1,})/?$\";s:45:\"index.php?post_type=project&paged=$matches[1]\";s:15:\"bat-dong-san/?$\";s:28:\"index.php?post_type=property\";s:45:\"bat-dong-san/feed/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?post_type=property&feed=$matches[1]\";s:40:\"bat-dong-san/(feed|rdf|rss|rss2|atom)/?$\";s:45:\"index.php?post_type=property&feed=$matches[1]\";s:32:\"bat-dong-san/page/([0-9]{1,})/?$\";s:46:\"index.php?post_type=property&paged=$matches[1]\";s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:31:\"du-an/.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\"du-an/.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:61:\"du-an/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"du-an/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"du-an/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\"du-an/.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:20:\"du-an/(.+?)/embed/?$\";s:40:\"index.php?project=$matches[1]&embed=true\";s:24:\"du-an/(.+?)/trackback/?$\";s:34:\"index.php?project=$matches[1]&tb=1\";s:44:\"du-an/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?project=$matches[1]&feed=$matches[2]\";s:39:\"du-an/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?project=$matches[1]&feed=$matches[2]\";s:32:\"du-an/(.+?)/page/?([0-9]{1,})/?$\";s:47:\"index.php?project=$matches[1]&paged=$matches[2]\";s:39:\"du-an/(.+?)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?project=$matches[1]&cpage=$matches[2]\";s:28:\"du-an/(.+?)(?:/([0-9]+))?/?$\";s:46:\"index.php?project=$matches[1]&page=$matches[2]\";s:53:\"danh-muc-du-an/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?project_cat=$matches[1]&feed=$matches[2]\";s:48:\"danh-muc-du-an/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?project_cat=$matches[1]&feed=$matches[2]\";s:29:\"danh-muc-du-an/(.+?)/embed/?$\";s:44:\"index.php?project_cat=$matches[1]&embed=true\";s:41:\"danh-muc-du-an/(.+?)/page/?([0-9]{1,})/?$\";s:51:\"index.php?project_cat=$matches[1]&paged=$matches[2]\";s:23:\"danh-muc-du-an/(.+?)/?$\";s:33:\"index.php?project_cat=$matches[1]\";s:38:\"bat-dong-san/.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:48:\"bat-dong-san/.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:68:\"bat-dong-san/.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:63:\"bat-dong-san/.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:63:\"bat-dong-san/.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:44:\"bat-dong-san/.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:27:\"bat-dong-san/(.+?)/embed/?$\";s:41:\"index.php?property=$matches[1]&embed=true\";s:31:\"bat-dong-san/(.+?)/trackback/?$\";s:35:\"index.php?property=$matches[1]&tb=1\";s:51:\"bat-dong-san/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?property=$matches[1]&feed=$matches[2]\";s:46:\"bat-dong-san/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?property=$matches[1]&feed=$matches[2]\";s:39:\"bat-dong-san/(.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?property=$matches[1]&paged=$matches[2]\";s:46:\"bat-dong-san/(.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?property=$matches[1]&cpage=$matches[2]\";s:35:\"bat-dong-san/(.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?property=$matches[1]&page=$matches[2]\";s:47:\"loai-tin/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:54:\"index.php?property_status=$matches[1]&feed=$matches[2]\";s:42:\"loai-tin/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:54:\"index.php?property_status=$matches[1]&feed=$matches[2]\";s:23:\"loai-tin/(.+?)/embed/?$\";s:48:\"index.php?property_status=$matches[1]&embed=true\";s:35:\"loai-tin/(.+?)/page/?([0-9]{1,})/?$\";s:55:\"index.php?property_status=$matches[1]&paged=$matches[2]\";s:17:\"loai-tin/(.+?)/?$\";s:37:\"index.php?property_status=$matches[1]\";s:56:\"loai-bat-dong-san/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?property_type=$matches[1]&feed=$matches[2]\";s:51:\"loai-bat-dong-san/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?property_type=$matches[1]&feed=$matches[2]\";s:32:\"loai-bat-dong-san/(.+?)/embed/?$\";s:46:\"index.php?property_type=$matches[1]&embed=true\";s:44:\"loai-bat-dong-san/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?property_type=$matches[1]&paged=$matches[2]\";s:26:\"loai-bat-dong-san/(.+?)/?$\";s:35:\"index.php?property_type=$matches[1]\";s:46:\"khu-vuc/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:56:\"index.php?property_location=$matches[1]&feed=$matches[2]\";s:41:\"khu-vuc/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:56:\"index.php?property_location=$matches[1]&feed=$matches[2]\";s:22:\"khu-vuc/(.+?)/embed/?$\";s:50:\"index.php?property_location=$matches[1]&embed=true\";s:34:\"khu-vuc/(.+?)/page/?([0-9]{1,})/?$\";s:57:\"index.php?property_location=$matches[1]&paged=$matches[2]\";s:16:\"khu-vuc/(.+?)/?$\";s:39:\"index.php?property_location=$matches[1]\";s:57:\"huong-bat-dong-san/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:57:\"index.php?property_direction=$matches[1]&feed=$matches[2]\";s:52:\"huong-bat-dong-san/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:57:\"index.php?property_direction=$matches[1]&feed=$matches[2]\";s:33:\"huong-bat-dong-san/(.+?)/embed/?$\";s:51:\"index.php?property_direction=$matches[1]&embed=true\";s:45:\"huong-bat-dong-san/(.+?)/page/?([0-9]{1,})/?$\";s:58:\"index.php?property_direction=$matches[1]&paged=$matches[2]\";s:27:\"huong-bat-dong-san/(.+?)/?$\";s:40:\"index.php?property_direction=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=2&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:3:{i:0;s:33:\"classic-editor/classic-editor.php\";i:1;s:21:\"meta-box/meta-box.php\";i:2;s:24:\"wordpress-seo/wp-seo.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'haphome', 'yes'),
(41, 'stylesheet', 'haphome', 'yes'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '48748', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', 'Asia/Ho_Chi_Minh', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '2', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'initial_db_version', '44719', 'yes'),
(94, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:15:\"wpseo_bulk_edit\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:35:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'WPLANG', 'vi', 'yes'),
(97, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:7:{s:19:\"wp_inactive_widgets\";a:0:{}s:14:\"widget-sidebar\";a:0:{}s:15:\"widget-bottom-1\";a:0:{}s:15:\"widget-bottom-2\";a:0:{}s:15:\"widget-bottom-3\";a:0:{}s:13:\"widget-adstop\";a:0:{}s:13:\"array_version\";i:3;}', 'yes'),
(103, 'cron', 'a:7:{i:1601311188;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1601350788;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1601393987;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1601393996;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1601394002;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1601481354;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'recovery_keys', 'a:0:{}', 'yes'),
(116, 'theme_mods_twentynineteen', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1599579969;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(148, 'auto_core_update_notified', 'a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:18:\"hqh91@yahoo.com.vn\";s:7:\"version\";s:5:\"5.2.7\";s:9:\"timestamp\";i:1599579701;}', 'no'),
(151, 'recently_activated', 'a:0:{}', 'yes'),
(153, 'current_theme', 'HAP Post', 'yes'),
(154, 'theme_mods_happost', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1599580123;s:4:\"data\";a:6:{s:19:\"wp_inactive_widgets\";a:0:{}s:14:\"widget-sidebar\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:15:\"widget-bottom-1\";a:0:{}s:15:\"widget-bottom-2\";a:0:{}s:15:\"widget-bottom-3\";a:0:{}s:13:\"widget-adstop\";a:0:{}}}}', 'yes'),
(155, 'theme_switched', '', 'yes'),
(158, 'theme_mods_haphome', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:11:\"header-menu\";i:2;}s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(160, 'admin_email_lifespan', '1615210288', 'yes'),
(161, 'disallowed_keys', '', 'no'),
(162, 'comment_previously_approved', '1', 'yes'),
(163, 'auto_plugin_theme_update_emails', 'a:0:{}', 'no'),
(164, 'finished_updating_comment_type', '1', 'yes'),
(165, 'db_upgraded', '', 'yes'),
(170, 'can_compress_scripts', '1', 'no'),
(187, 'new_admin_email', 'hqh91@yahoo.com.vn', 'yes'),
(195, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(207, 'category_children', 'a:0:{}', 'yes'),
(209, 'property_status_children', 'a:0:{}', 'yes'),
(213, 'property_type_children', 'a:0:{}', 'yes'),
(216, 'property_location_children', 'a:0:{}', 'yes'),
(226, 'property_direction_children', 'a:0:{}', 'yes'),
(228, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.5.1.zip\";s:6:\"locale\";s:2:\"vi\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.5.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.5.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.5.1-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"5.5.1\";s:7:\"version\";s:5:\"5.5.1\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1601307723;s:15:\"version_checked\";s:5:\"5.5.1\";s:12:\"translations\";a:0:{}}', 'no'),
(230, '_site_transient_update_themes', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1601305506;s:7:\"checked\";a:2:{s:7:\"haphome\";s:5:\"1.4.3\";s:12:\"twentytwenty\";s:3:\"1.5\";}s:8:\"response\";a:0:{}s:9:\"no_update\";a:1:{s:12:\"twentytwenty\";a:6:{s:5:\"theme\";s:12:\"twentytwenty\";s:11:\"new_version\";s:3:\"1.5\";s:3:\"url\";s:42:\"https://wordpress.org/themes/twentytwenty/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/theme/twentytwenty.1.5.zip\";s:8:\"requires\";s:3:\"4.7\";s:12:\"requires_php\";s:5:\"5.2.4\";}}s:12:\"translations\";a:0:{}}', 'no'),
(252, '_transient_health-check-site-status-result', '{\"good\":10,\"recommended\":9,\"critical\":1}', 'yes'),
(402, 'wpseo', 'a:23:{s:14:\"blocking_files\";a:0:{}s:15:\"ms_defaults_set\";b:0;s:7:\"version\";s:3:\"4.5\";s:12:\"company_logo\";s:0:\"\";s:12:\"company_name\";s:0:\"\";s:17:\"company_or_person\";s:0:\"\";s:20:\"disableadvanced_meta\";b:1;s:19:\"onpage_indexability\";b:1;s:12:\"googleverify\";s:0:\"\";s:8:\"msverify\";s:0:\"\";s:11:\"person_name\";s:0:\"\";s:12:\"website_name\";s:0:\"\";s:22:\"alternate_website_name\";s:0:\"\";s:12:\"yandexverify\";s:0:\"\";s:9:\"site_type\";s:0:\"\";s:20:\"has_multiple_authors\";b:0;s:16:\"environment_type\";s:0:\"\";s:23:\"content_analysis_active\";b:1;s:23:\"keyword_analysis_active\";b:1;s:20:\"enable_setting_pages\";b:1;s:21:\"enable_admin_bar_menu\";b:1;s:22:\"show_onboarding_notice\";b:1;s:18:\"first_activated_on\";b:0;}', 'yes'),
(403, 'wpseo_permalinks', 'a:9:{s:15:\"cleanpermalinks\";b:0;s:24:\"cleanpermalink-extravars\";s:0:\"\";s:29:\"cleanpermalink-googlecampaign\";b:0;s:31:\"cleanpermalink-googlesitesearch\";b:0;s:15:\"cleanreplytocom\";b:0;s:10:\"cleanslugs\";b:1;s:18:\"redirectattachment\";b:0;s:17:\"stripcategorybase\";b:0;s:13:\"trailingslash\";b:0;}', 'yes'),
(404, 'wpseo_titles', 'a:101:{s:10:\"title_test\";i:0;s:17:\"forcerewritetitle\";b:0;s:9:\"separator\";s:7:\"sc-dash\";s:5:\"noodp\";b:0;s:15:\"usemetakeywords\";b:1;s:16:\"title-home-wpseo\";s:42:\"%%sitename%% %%page%% %%sep%% %%sitedesc%%\";s:18:\"title-author-wpseo\";s:41:\"%%name%%, Author at %%sitename%% %%page%%\";s:19:\"title-archive-wpseo\";s:38:\"%%date%% %%page%% %%sep%% %%sitename%%\";s:18:\"title-search-wpseo\";s:63:\"You searched for %%searchphrase%% %%page%% %%sep%% %%sitename%%\";s:15:\"title-404-wpseo\";s:35:\"Page not found %%sep%% %%sitename%%\";s:19:\"metadesc-home-wpseo\";s:0:\"\";s:21:\"metadesc-author-wpseo\";s:0:\"\";s:22:\"metadesc-archive-wpseo\";s:0:\"\";s:18:\"metakey-home-wpseo\";s:0:\"\";s:20:\"metakey-author-wpseo\";s:0:\"\";s:22:\"noindex-subpages-wpseo\";b:0;s:20:\"noindex-author-wpseo\";b:0;s:21:\"noindex-archive-wpseo\";b:1;s:14:\"disable-author\";b:0;s:12:\"disable-date\";b:0;s:19:\"disable-post_format\";b:0;s:10:\"title-post\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:13:\"metadesc-post\";s:0:\"\";s:12:\"metakey-post\";s:0:\"\";s:12:\"noindex-post\";b:0;s:13:\"showdate-post\";b:0;s:16:\"hideeditbox-post\";b:0;s:10:\"title-page\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:13:\"metadesc-page\";s:0:\"\";s:12:\"metakey-page\";s:0:\"\";s:12:\"noindex-page\";b:0;s:13:\"showdate-page\";b:0;s:16:\"hideeditbox-page\";b:0;s:16:\"title-attachment\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:19:\"metadesc-attachment\";s:0:\"\";s:18:\"metakey-attachment\";s:0:\"\";s:18:\"noindex-attachment\";b:0;s:19:\"showdate-attachment\";b:0;s:22:\"hideeditbox-attachment\";b:0;s:18:\"title-tax-category\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:21:\"metadesc-tax-category\";s:0:\"\";s:20:\"metakey-tax-category\";s:0:\"\";s:24:\"hideeditbox-tax-category\";b:0;s:20:\"noindex-tax-category\";b:0;s:18:\"title-tax-post_tag\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:21:\"metadesc-tax-post_tag\";s:0:\"\";s:20:\"metakey-tax-post_tag\";s:0:\"\";s:24:\"hideeditbox-tax-post_tag\";b:0;s:20:\"noindex-tax-post_tag\";b:0;s:21:\"title-tax-post_format\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:24:\"metadesc-tax-post_format\";s:0:\"\";s:23:\"metakey-tax-post_format\";s:0:\"\";s:27:\"hideeditbox-tax-post_format\";b:0;s:23:\"noindex-tax-post_format\";b:1;s:13:\"title-project\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:16:\"metadesc-project\";s:0:\"\";s:15:\"metakey-project\";s:0:\"\";s:15:\"noindex-project\";b:0;s:16:\"showdate-project\";b:0;s:19:\"hideeditbox-project\";b:0;s:14:\"title-property\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:17:\"metadesc-property\";s:0:\"\";s:16:\"metakey-property\";s:0:\"\";s:16:\"noindex-property\";b:0;s:17:\"showdate-property\";b:0;s:20:\"hideeditbox-property\";b:0;s:23:\"title-ptarchive-project\";s:51:\"%%pt_plural%% Archive %%page%% %%sep%% %%sitename%%\";s:26:\"metadesc-ptarchive-project\";s:0:\"\";s:25:\"metakey-ptarchive-project\";s:0:\"\";s:25:\"bctitle-ptarchive-project\";s:0:\"\";s:25:\"noindex-ptarchive-project\";b:0;s:24:\"title-ptarchive-property\";s:51:\"%%pt_plural%% Archive %%page%% %%sep%% %%sitename%%\";s:27:\"metadesc-ptarchive-property\";s:0:\"\";s:26:\"metakey-ptarchive-property\";s:0:\"\";s:26:\"bctitle-ptarchive-property\";s:0:\"\";s:26:\"noindex-ptarchive-property\";b:0;s:21:\"title-tax-project_cat\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:24:\"metadesc-tax-project_cat\";s:0:\"\";s:23:\"metakey-tax-project_cat\";s:0:\"\";s:27:\"hideeditbox-tax-project_cat\";b:0;s:23:\"noindex-tax-project_cat\";b:0;s:25:\"title-tax-property_status\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:28:\"metadesc-tax-property_status\";s:0:\"\";s:27:\"metakey-tax-property_status\";s:0:\"\";s:31:\"hideeditbox-tax-property_status\";b:0;s:27:\"noindex-tax-property_status\";b:0;s:23:\"title-tax-property_type\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:26:\"metadesc-tax-property_type\";s:0:\"\";s:25:\"metakey-tax-property_type\";s:0:\"\";s:29:\"hideeditbox-tax-property_type\";b:0;s:25:\"noindex-tax-property_type\";b:0;s:27:\"title-tax-property_location\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:30:\"metadesc-tax-property_location\";s:0:\"\";s:29:\"metakey-tax-property_location\";s:0:\"\";s:33:\"hideeditbox-tax-property_location\";b:0;s:29:\"noindex-tax-property_location\";b:0;s:28:\"title-tax-property_direction\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:31:\"metadesc-tax-property_direction\";s:0:\"\";s:30:\"metakey-tax-property_direction\";s:0:\"\";s:34:\"hideeditbox-tax-property_direction\";b:0;s:30:\"noindex-tax-property_direction\";b:0;}', 'yes'),
(405, 'wpseo_social', 'a:20:{s:9:\"fb_admins\";a:0:{}s:12:\"fbconnectkey\";s:32:\"f669952d737bb77e89487c4aa1e46a38\";s:13:\"facebook_site\";s:0:\"\";s:13:\"instagram_url\";s:0:\"\";s:12:\"linkedin_url\";s:0:\"\";s:11:\"myspace_url\";s:0:\"\";s:16:\"og_default_image\";s:0:\"\";s:18:\"og_frontpage_title\";s:0:\"\";s:17:\"og_frontpage_desc\";s:0:\"\";s:18:\"og_frontpage_image\";s:0:\"\";s:9:\"opengraph\";b:1;s:13:\"pinterest_url\";s:0:\"\";s:15:\"pinterestverify\";s:0:\"\";s:14:\"plus-publisher\";s:0:\"\";s:7:\"twitter\";b:1;s:12:\"twitter_site\";s:0:\"\";s:17:\"twitter_card_type\";s:7:\"summary\";s:11:\"youtube_url\";s:0:\"\";s:15:\"google_plus_url\";s:0:\"\";s:10:\"fbadminapp\";s:0:\"\";}', 'yes'),
(406, 'wpseo_rss', 'a:2:{s:9:\"rssbefore\";s:0:\"\";s:8:\"rssafter\";s:53:\"The post %%POSTLINK%% appeared first on %%BLOGLINK%%.\";}', 'yes'),
(407, 'wpseo_internallinks', 'a:17:{s:20:\"breadcrumbs-404crumb\";s:29:\"Lỗi 404: Không tìm thấy\";s:23:\"breadcrumbs-blog-remove\";b:0;s:20:\"breadcrumbs-boldlast\";b:0;s:25:\"breadcrumbs-archiveprefix\";s:12:\"Archives for\";s:18:\"breadcrumbs-enable\";b:1;s:16:\"breadcrumbs-home\";s:29:\"<span class=\"ti-home\"></span>\";s:18:\"breadcrumbs-prefix\";s:0:\"\";s:24:\"breadcrumbs-searchprefix\";s:16:\"You searched for\";s:15:\"breadcrumbs-sep\";s:43:\"<span class=\"ti-angle-double-right\"></span>\";s:23:\"post_types-post-maintax\";i:0;s:26:\"post_types-project-maintax\";i:0;s:27:\"post_types-property-maintax\";i:0;s:29:\"taxonomy-project_cat-ptparent\";i:0;s:33:\"taxonomy-property_status-ptparent\";i:0;s:31:\"taxonomy-property_type-ptparent\";i:0;s:35:\"taxonomy-property_location-ptparent\";i:0;s:36:\"taxonomy-property_direction-ptparent\";i:0;}', 'yes'),
(408, 'wpseo_xml', 'a:23:{s:22:\"disable_author_sitemap\";b:1;s:22:\"disable_author_noposts\";b:1;s:16:\"enablexmlsitemap\";b:1;s:16:\"entries-per-page\";i:1000;s:14:\"excluded-posts\";s:0:\"\";s:38:\"user_role-administrator-not_in_sitemap\";b:0;s:31:\"user_role-editor-not_in_sitemap\";b:0;s:31:\"user_role-author-not_in_sitemap\";b:0;s:36:\"user_role-contributor-not_in_sitemap\";b:0;s:35:\"user_role-subscriber-not_in_sitemap\";b:0;s:30:\"post_types-post-not_in_sitemap\";b:0;s:30:\"post_types-page-not_in_sitemap\";b:0;s:36:\"post_types-attachment-not_in_sitemap\";b:1;s:33:\"post_types-project-not_in_sitemap\";b:0;s:34:\"post_types-property-not_in_sitemap\";b:0;s:34:\"taxonomies-category-not_in_sitemap\";b:0;s:34:\"taxonomies-post_tag-not_in_sitemap\";b:0;s:37:\"taxonomies-post_format-not_in_sitemap\";b:0;s:37:\"taxonomies-project_cat-not_in_sitemap\";b:0;s:41:\"taxonomies-property_status-not_in_sitemap\";b:0;s:39:\"taxonomies-property_type-not_in_sitemap\";b:0;s:43:\"taxonomies-property_location-not_in_sitemap\";b:0;s:44:\"taxonomies-property_direction-not_in_sitemap\";b:0;}', 'yes'),
(409, 'wpseo_flush_rewrite', '1', 'yes'),
(414, 'wpseo_sitemap_cache_validator_global', '4slNC', 'no'),
(441, '_site_transient_timeout_php_check_8ba5fc7a62195d1cc4023915210e009f', '1601554914', 'no'),
(442, '_site_transient_php_check_8ba5fc7a62195d1cc4023915210e009f', 'a:5:{s:19:\"recommended_version\";s:3:\"7.4\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:0;s:13:\"is_acceptable\";b:0;}', 'no'),
(450, 'wpseo_sitemap_1_cache_validator', '4qTxf', 'no'),
(451, 'wpseo_sitemap_property_status_cache_validator', '4qTxj', 'no'),
(452, 'wpseo_sitemap_property_type_cache_validator', '4qTxl', 'no'),
(453, 'wpseo_sitemap_property_direction_cache_validator', '4qTxn', 'no'),
(454, 'wpseo_sitemap_property_cache_validator', '4qTxq', 'no'),
(467, '_site_transient_timeout_theme_roots', '1601309524', 'no'),
(468, '_site_transient_theme_roots', 'a:2:{s:7:\"haphome\";s:7:\"/themes\";s:12:\"twentytwenty\";s:7:\"/themes\";}', 'no'),
(469, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1601307726;s:7:\"checked\";a:4:{s:19:\"akismet/akismet.php\";s:5:\"4.1.6\";s:33:\"classic-editor/classic-editor.php\";s:3:\"1.6\";s:21:\"meta-box/meta-box.php\";s:5:\"5.3.3\";s:24:\"wordpress-seo/wp-seo.php\";s:3:\"4.5\";}s:8:\"response\";a:2:{s:21:\"meta-box/meta-box.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:22:\"w.org/plugins/meta-box\";s:4:\"slug\";s:8:\"meta-box\";s:6:\"plugin\";s:21:\"meta-box/meta-box.php\";s:11:\"new_version\";s:5:\"5.3.4\";s:3:\"url\";s:39:\"https://wordpress.org/plugins/meta-box/\";s:7:\"package\";s:57:\"https://downloads.wordpress.org/plugin/meta-box.5.3.4.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/meta-box/assets/icon-128x128.png?rev=1100915\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:63:\"https://ps.w.org/meta-box/assets/banner-772x250.png?rev=1929588\";}s:11:\"banners_rtl\";a:0:{}s:6:\"tested\";s:5:\"5.5.1\";s:12:\"requires_php\";s:3:\"5.3\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}s:24:\"wordpress-seo/wp-seo.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:27:\"w.org/plugins/wordpress-seo\";s:4:\"slug\";s:13:\"wordpress-seo\";s:6:\"plugin\";s:24:\"wordpress-seo/wp-seo.php\";s:11:\"new_version\";s:4:\"14.9\";s:3:\"url\";s:44:\"https://wordpress.org/plugins/wordpress-seo/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/wordpress-seo.14.9.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:66:\"https://ps.w.org/wordpress-seo/assets/icon-256x256.png?rev=2363699\";s:2:\"1x\";s:58:\"https://ps.w.org/wordpress-seo/assets/icon.svg?rev=2363699\";s:3:\"svg\";s:58:\"https://ps.w.org/wordpress-seo/assets/icon.svg?rev=2363699\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:69:\"https://ps.w.org/wordpress-seo/assets/banner-1544x500.png?rev=1843435\";s:2:\"1x\";s:68:\"https://ps.w.org/wordpress-seo/assets/banner-772x250.png?rev=1843435\";}s:11:\"banners_rtl\";a:2:{s:2:\"2x\";s:73:\"https://ps.w.org/wordpress-seo/assets/banner-1544x500-rtl.png?rev=1843435\";s:2:\"1x\";s:72:\"https://ps.w.org/wordpress-seo/assets/banner-772x250-rtl.png?rev=1843435\";}s:6:\"tested\";s:5:\"5.5.1\";s:12:\"requires_php\";s:6:\"5.6.20\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:2:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.1.6\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.1.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/classic-editor.1.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1998671\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1998671\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1998671\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1998676\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'template-home.php'),
(2, 3, '_wp_page_template', 'default'),
(3, 2, '_edit_lock', '1599582304:1'),
(4, 2, '_edit_last', '1'),
(5, 2, '_bds', ''),
(6, 2, '_xaydung', ''),
(7, 2, '_amthuc', ''),
(8, 6, '_bds', ''),
(9, 6, '_xaydung', ''),
(10, 6, '_amthuc', ''),
(11, 6, '_edit_last', '1'),
(12, 6, '_wp_page_template', 'template-user-post.php'),
(13, 6, '_edit_lock', '1600527277:1'),
(25, 9, '_bds', ''),
(26, 9, '_xaydung', ''),
(27, 9, '_amthuc', ''),
(28, 9, '_edit_last', '1'),
(29, 9, '_edit_lock', '1599659458:1'),
(30, 9, '_wp_page_template', 'bds-canban.php'),
(31, 11, '_bds', ''),
(32, 11, '_xaydung', ''),
(33, 11, '_amthuc', ''),
(34, 11, '_edit_last', '1'),
(35, 11, '_edit_lock', '1599659491:1'),
(36, 11, '_wp_page_template', 'bds-chothue.php'),
(37, 13, '_bds', ''),
(38, 13, '_xaydung', ''),
(39, 13, '_amthuc', ''),
(40, 13, '_edit_last', '1'),
(41, 13, '_edit_lock', '1599666444:1'),
(42, 13, '_wp_page_template', 'bds-canban-biethu.php'),
(43, 15, '_bds', ''),
(44, 15, '_xaydung', ''),
(45, 15, '_amthuc', ''),
(46, 15, '_edit_last', '1'),
(47, 15, '_wp_page_template', 'bds-canban-canho.php'),
(48, 15, '_edit_lock', '1599666439:1'),
(49, 17, '_bds', ''),
(50, 17, '_xaydung', ''),
(51, 17, '_amthuc', ''),
(52, 17, '_edit_last', '1'),
(53, 17, '_edit_lock', '1599659562:1'),
(54, 17, '_wp_page_template', 'bds-canban-nhapho.php'),
(55, 19, '_bds', ''),
(56, 19, '_xaydung', ''),
(57, 19, '_amthuc', ''),
(58, 19, '_edit_last', '1'),
(59, 19, '_edit_lock', '1599659609:1'),
(60, 19, '_wp_page_template', 'bds-canban-datnen.php'),
(64, 22, '_bds', ''),
(65, 22, '_xaydung', ''),
(66, 22, '_amthuc', ''),
(67, 22, '_edit_last', '1'),
(68, 22, '_wp_page_template', 'bds-chothue-bietthu.php'),
(69, 22, '_edit_lock', '1599663416:1'),
(70, 24, '_bds', ''),
(71, 24, '_xaydung', ''),
(72, 24, '_amthuc', ''),
(73, 24, '_edit_last', '1'),
(74, 24, '_wp_page_template', 'bds-chothue-canho.php'),
(75, 24, '_edit_lock', '1599663428:1'),
(76, 26, '_bds', ''),
(77, 26, '_xaydung', ''),
(78, 26, '_amthuc', ''),
(79, 26, '_edit_last', '1'),
(80, 26, '_wp_page_template', 'bds-chothue-nhapho.php'),
(81, 26, '_edit_lock', '1599663444:1'),
(82, 28, '_bds', ''),
(83, 28, '_xaydung', ''),
(84, 28, '_amthuc', ''),
(85, 28, '_edit_last', '1'),
(86, 28, '_wp_page_template', 'bds-chothue-datnen.php'),
(87, 28, '_edit_lock', '1599666323:1'),
(88, 30, '_bds', ''),
(89, 30, '_xaydung', ''),
(90, 30, '_amthuc', ''),
(91, 30, '_menu_item_type', 'post_type'),
(92, 30, '_menu_item_menu_item_parent', '0'),
(93, 30, '_menu_item_object_id', '11'),
(94, 30, '_menu_item_object', 'page'),
(95, 30, '_menu_item_target', ''),
(96, 30, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(97, 30, '_menu_item_xfn', ''),
(98, 30, '_menu_item_url', ''),
(99, 30, '_menu_item_orphaned', '1599666496'),
(100, 31, '_bds', ''),
(101, 31, '_xaydung', ''),
(102, 31, '_amthuc', ''),
(103, 31, '_menu_item_type', 'post_type'),
(104, 31, '_menu_item_menu_item_parent', '0'),
(105, 31, '_menu_item_object_id', '9'),
(106, 31, '_menu_item_object', 'page'),
(107, 31, '_menu_item_target', ''),
(108, 31, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(109, 31, '_menu_item_xfn', ''),
(110, 31, '_menu_item_url', ''),
(111, 31, '_menu_item_orphaned', '1599666496'),
(112, 32, '_bds', ''),
(113, 32, '_xaydung', ''),
(114, 32, '_amthuc', ''),
(115, 32, '_menu_item_type', 'post_type'),
(116, 32, '_menu_item_menu_item_parent', '0'),
(117, 32, '_menu_item_object_id', '9'),
(118, 32, '_menu_item_object', 'page'),
(119, 32, '_menu_item_target', ''),
(120, 32, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(121, 32, '_menu_item_xfn', ''),
(122, 32, '_menu_item_url', ''),
(124, 33, '_bds', ''),
(125, 33, '_xaydung', ''),
(126, 33, '_amthuc', ''),
(127, 33, '_menu_item_type', 'post_type'),
(128, 33, '_menu_item_menu_item_parent', '32'),
(129, 33, '_menu_item_object_id', '19'),
(130, 33, '_menu_item_object', 'page'),
(131, 33, '_menu_item_target', ''),
(132, 33, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(133, 33, '_menu_item_xfn', ''),
(134, 33, '_menu_item_url', ''),
(136, 34, '_bds', ''),
(137, 34, '_xaydung', ''),
(138, 34, '_amthuc', ''),
(139, 34, '_menu_item_type', 'post_type'),
(140, 34, '_menu_item_menu_item_parent', '32'),
(141, 34, '_menu_item_object_id', '17'),
(142, 34, '_menu_item_object', 'page'),
(143, 34, '_menu_item_target', ''),
(144, 34, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(145, 34, '_menu_item_xfn', ''),
(146, 34, '_menu_item_url', ''),
(148, 35, '_bds', ''),
(149, 35, '_xaydung', ''),
(150, 35, '_amthuc', ''),
(151, 35, '_menu_item_type', 'post_type'),
(152, 35, '_menu_item_menu_item_parent', '0'),
(153, 35, '_menu_item_object_id', '11'),
(154, 35, '_menu_item_object', 'page'),
(155, 35, '_menu_item_target', ''),
(156, 35, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(157, 35, '_menu_item_xfn', ''),
(158, 35, '_menu_item_url', ''),
(160, 36, '_bds', ''),
(161, 36, '_xaydung', ''),
(162, 36, '_amthuc', ''),
(163, 36, '_menu_item_type', 'post_type'),
(164, 36, '_menu_item_menu_item_parent', '35'),
(165, 36, '_menu_item_object_id', '22'),
(166, 36, '_menu_item_object', 'page'),
(167, 36, '_menu_item_target', ''),
(168, 36, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(169, 36, '_menu_item_xfn', ''),
(170, 36, '_menu_item_url', ''),
(172, 37, '_bds', ''),
(173, 37, '_xaydung', ''),
(174, 37, '_amthuc', ''),
(175, 37, '_menu_item_type', 'post_type'),
(176, 37, '_menu_item_menu_item_parent', '35'),
(177, 37, '_menu_item_object_id', '24'),
(178, 37, '_menu_item_object', 'page'),
(179, 37, '_menu_item_target', ''),
(180, 37, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(181, 37, '_menu_item_xfn', ''),
(182, 37, '_menu_item_url', ''),
(184, 38, '_bds', ''),
(185, 38, '_xaydung', ''),
(186, 38, '_amthuc', ''),
(187, 38, '_menu_item_type', 'post_type'),
(188, 38, '_menu_item_menu_item_parent', '35'),
(189, 38, '_menu_item_object_id', '28'),
(190, 38, '_menu_item_object', 'page'),
(191, 38, '_menu_item_target', ''),
(192, 38, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(193, 38, '_menu_item_xfn', ''),
(194, 38, '_menu_item_url', ''),
(196, 39, '_bds', ''),
(197, 39, '_xaydung', ''),
(198, 39, '_amthuc', ''),
(199, 39, '_menu_item_type', 'post_type'),
(200, 39, '_menu_item_menu_item_parent', '35'),
(201, 39, '_menu_item_object_id', '26'),
(202, 39, '_menu_item_object', 'page'),
(203, 39, '_menu_item_target', ''),
(204, 39, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(205, 39, '_menu_item_xfn', ''),
(206, 39, '_menu_item_url', ''),
(208, 40, '_bds', ''),
(209, 40, '_xaydung', ''),
(210, 40, '_amthuc', ''),
(211, 40, '_menu_item_type', 'post_type'),
(212, 40, '_menu_item_menu_item_parent', '0'),
(213, 40, '_menu_item_object_id', '6'),
(214, 40, '_menu_item_object', 'page'),
(215, 40, '_menu_item_target', ''),
(216, 40, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(217, 40, '_menu_item_xfn', ''),
(218, 40, '_menu_item_url', ''),
(219, 40, '_menu_item_orphaned', '1599666518'),
(220, 41, '_bds', ''),
(221, 41, '_xaydung', ''),
(222, 41, '_amthuc', ''),
(223, 41, '_menu_item_type', 'post_type'),
(224, 41, '_menu_item_menu_item_parent', '32'),
(225, 41, '_menu_item_object_id', '13'),
(226, 41, '_menu_item_object', 'page'),
(227, 41, '_menu_item_target', ''),
(228, 41, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(229, 41, '_menu_item_xfn', ''),
(230, 41, '_menu_item_url', ''),
(232, 42, '_bds', ''),
(233, 42, '_xaydung', ''),
(234, 42, '_amthuc', ''),
(235, 42, '_menu_item_type', 'post_type'),
(236, 42, '_menu_item_menu_item_parent', '32'),
(237, 42, '_menu_item_object_id', '15'),
(238, 42, '_menu_item_object', 'page'),
(239, 42, '_menu_item_target', ''),
(240, 42, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(241, 42, '_menu_item_xfn', ''),
(242, 42, '_menu_item_url', ''),
(244, 43, '_bds', ''),
(245, 43, '_xaydung', ''),
(246, 43, '_amthuc', ''),
(247, 43, '_menu_item_type', 'taxonomy'),
(248, 43, '_menu_item_menu_item_parent', '0'),
(249, 43, '_menu_item_object_id', '12'),
(250, 43, '_menu_item_object', 'property_location'),
(251, 43, '_menu_item_target', ''),
(252, 43, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(253, 43, '_menu_item_xfn', ''),
(254, 43, '_menu_item_url', ''),
(256, 44, '_bds', ''),
(257, 44, '_xaydung', ''),
(258, 44, '_amthuc', ''),
(259, 44, '_menu_item_type', 'taxonomy'),
(260, 44, '_menu_item_menu_item_parent', '0'),
(261, 44, '_menu_item_object_id', '13'),
(262, 44, '_menu_item_object', 'property_location'),
(263, 44, '_menu_item_target', ''),
(264, 44, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(265, 44, '_menu_item_xfn', ''),
(266, 44, '_menu_item_url', ''),
(268, 45, '_bds', ''),
(269, 45, '_xaydung', ''),
(270, 45, '_amthuc', ''),
(271, 45, '_menu_item_type', 'taxonomy'),
(272, 45, '_menu_item_menu_item_parent', '0'),
(273, 45, '_menu_item_object_id', '14'),
(274, 45, '_menu_item_object', 'property_location'),
(275, 45, '_menu_item_target', ''),
(276, 45, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(277, 45, '_menu_item_xfn', ''),
(278, 45, '_menu_item_url', ''),
(280, 46, '_bds', ''),
(281, 46, '_xaydung', ''),
(282, 46, '_amthuc', ''),
(283, 46, 'prefix-price', '212121'),
(284, 46, 'prefix-area', '212'),
(285, 46, 'prefix-address', '433/12 Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7'),
(286, 46, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(287, 47, '_wp_attached_file', '2020/09/bidv.jpg'),
(288, 47, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:200;s:6:\"height\";i:133;s:4:\"file\";s:16:\"2020/09/bidv.jpg\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:16:\"bidv-150x133.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:133;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:15:\"bidv-120x80.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:80;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(289, 46, '_thumbnail_id', '47'),
(290, 46, 'post_views_count', '49'),
(291, 46, '_edit_lock', '1599758651:1'),
(292, 46, '_edit_last', '1'),
(293, 46, 'prefix-vip', '1'),
(294, 46, '_wp_trash_meta_status', 'publish'),
(295, 46, '_wp_trash_meta_time', '1599758432'),
(296, 46, '_wp_desired_post_slug', '2-popopop-popopop-popopop-popopop-popopop-popopop-popopop-popopop'),
(297, 48, '_bds', ''),
(298, 48, '_xaydung', ''),
(299, 48, '_amthuc', ''),
(300, 48, 'prefix-price', '150000'),
(301, 48, 'prefix-area', '100'),
(302, 48, 'prefix-address', '1 Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7'),
(303, 48, 'prefix-video', 'https://www.youtube.com/watch?v=3SMey97P8CI'),
(304, 49, '_wp_attached_file', '2020/09/property-interior-1.jpg'),
(305, 49, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1000;s:6:\"height\";i:706;s:4:\"file\";s:31:\"2020/09/property-interior-1.jpg\";s:5:\"sizes\";a:6:{s:6:\"medium\";a:4:{s:4:\"file\";s:31:\"property-interior-1-300x212.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:212;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:32:\"property-interior-1-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:31:\"property-interior-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:31:\"property-interior-1-768x542.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:542;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:30:\"property-interior-1-120x85.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:31:\"property-interior-1-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(306, 48, '_thumbnail_id', '49'),
(307, 50, '_bds', ''),
(308, 50, '_xaydung', ''),
(309, 50, '_amthuc', ''),
(310, 50, 'prefix-price', '130000000'),
(311, 50, 'prefix-area', '212'),
(312, 50, 'prefix-address', '2 Huỳnh Tấn Phát, Phường Tân Thuận Đông, Quận 7'),
(313, 50, 'prefix-video', 'https://www.youtube.com/watch?v=3SMey97P8CI'),
(317, 50, 'post_views_count', '284'),
(318, 48, 'post_views_count', '168'),
(319, 48, '_edit_lock', '1599758725:1'),
(320, 48, '_edit_last', '1'),
(321, 48, 'prefix-vip', '1'),
(322, 50, '_edit_lock', '1600530459:1'),
(323, 50, '_edit_last', '1'),
(324, 50, 'prefix-vip', '1'),
(325, 52, '_bds', ''),
(326, 52, '_xaydung', ''),
(327, 52, '_amthuc', ''),
(328, 53, '_wp_attached_file', '2020/09/Manhattan-Penthouse_01-1.jpg'),
(329, 53, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:36:\"2020/09/Manhattan-Penthouse_01-1.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:36:\"Manhattan-Penthouse_01-1-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:37:\"Manhattan-Penthouse_01-1-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:36:\"Manhattan-Penthouse_01-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:36:\"Manhattan-Penthouse_01-1-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:37:\"Manhattan-Penthouse_01-1-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:35:\"Manhattan-Penthouse_01-1-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:36:\"Manhattan-Penthouse_01-1-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(330, 52, '_edit_last', '1'),
(331, 52, '_thumbnail_id', '53'),
(332, 52, 'prefix-vip', '1'),
(333, 52, '_edit_lock', '1599759379:1'),
(334, 52, 'prefix-price', '500000000'),
(335, 52, 'prefix-area', '200'),
(336, 52, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(337, 52, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(338, 54, '_bds', ''),
(339, 54, '_xaydung', ''),
(340, 54, '_amthuc', ''),
(341, 52, 'post_views_count', '162'),
(342, 54, '_edit_last', '1'),
(343, 54, '_edit_lock', '1599759126:1'),
(344, 55, '_wp_attached_file', '2020/09/Menlyn-Maine-Indus-Building.jpg'),
(345, 55, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:39:\"2020/09/Menlyn-Maine-Indus-Building.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:39:\"Menlyn-Maine-Indus-Building-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:40:\"Menlyn-Maine-Indus-Building-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:39:\"Menlyn-Maine-Indus-Building-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:39:\"Menlyn-Maine-Indus-Building-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:40:\"Menlyn-Maine-Indus-Building-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:38:\"Menlyn-Maine-Indus-Building-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:39:\"Menlyn-Maine-Indus-Building-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(346, 56, '_wp_attached_file', '2020/09/property-1-1.jpg'),
(347, 56, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1000;s:6:\"height\";i:706;s:4:\"file\";s:24:\"2020/09/property-1-1.jpg\";s:5:\"sizes\";a:6:{s:6:\"medium\";a:4:{s:4:\"file\";s:24:\"property-1-1-300x212.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:212;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:25:\"property-1-1-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"property-1-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:24:\"property-1-1-768x542.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:542;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:23:\"property-1-1-120x85.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:24:\"property-1-1-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(348, 57, '_wp_attached_file', '2020/09/Skytop-Front.jpg'),
(349, 57, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:24:\"2020/09/Skytop-Front.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:24:\"Skytop-Front-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:25:\"Skytop-Front-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"Skytop-Front-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:24:\"Skytop-Front-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:25:\"Skytop-Front-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:23:\"Skytop-Front-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:24:\"Skytop-Front-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(350, 58, '_wp_attached_file', '2020/09/villa-cruz-1.jpg'),
(351, 58, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:24:\"2020/09/villa-cruz-1.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:24:\"villa-cruz-1-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:25:\"villa-cruz-1-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"villa-cruz-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:24:\"villa-cruz-1-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:25:\"villa-cruz-1-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:23:\"villa-cruz-1-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:24:\"villa-cruz-1-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(352, 59, '_wp_attached_file', '2020/09/sub-kemer-villas.jpg'),
(353, 59, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:28:\"2020/09/sub-kemer-villas.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:28:\"sub-kemer-villas-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:29:\"sub-kemer-villas-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:28:\"sub-kemer-villas-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:28:\"sub-kemer-villas-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:29:\"sub-kemer-villas-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:27:\"sub-kemer-villas-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:28:\"sub-kemer-villas-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(354, 54, '_thumbnail_id', '59'),
(355, 54, 'prefix-price', '12000000'),
(356, 54, 'prefix-area', '200'),
(357, 54, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(358, 54, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(359, 54, 'prefix-vip', '0'),
(360, 60, '_bds', ''),
(361, 60, '_xaydung', ''),
(362, 60, '_amthuc', ''),
(363, 60, '_edit_last', '1'),
(364, 60, '_edit_lock', '1599759208:1'),
(365, 54, 'post_views_count', '157'),
(366, 60, '_thumbnail_id', '58'),
(367, 60, 'prefix-price', '250000000'),
(368, 60, 'prefix-area', '300'),
(369, 60, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(370, 60, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(371, 60, 'prefix-vip', '0'),
(372, 60, 'post_views_count', '156'),
(373, 61, '_bds', ''),
(374, 61, '_xaydung', ''),
(375, 61, '_amthuc', ''),
(376, 61, '_edit_last', '1'),
(377, 61, '_edit_lock', '1599759351:1'),
(378, 61, '_thumbnail_id', '55'),
(379, 61, 'prefix-price', '5000000000'),
(380, 61, 'prefix-area', '390'),
(381, 61, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(382, 61, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(383, 61, 'prefix-vip', '0'),
(384, 61, 'post_views_count', '155'),
(388, 63, '_bds', ''),
(389, 63, '_xaydung', ''),
(390, 63, '_amthuc', ''),
(391, 63, '_edit_last', '1'),
(392, 63, '_edit_lock', '1599759630:1'),
(393, 64, '_wp_attached_file', '2020/09/Untitled-1.jpg'),
(394, 64, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:22:\"2020/09/Untitled-1.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"Untitled-1-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:23:\"Untitled-1-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"Untitled-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:22:\"Untitled-1-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:23:\"Untitled-1-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:21:\"Untitled-1-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:22:\"Untitled-1-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(395, 63, '_thumbnail_id', '64'),
(396, 63, 'prefix-price', '30000000'),
(397, 63, 'prefix-area', '123'),
(398, 63, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(399, 63, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(400, 63, 'prefix-vip', '0'),
(401, 63, 'post_views_count', '161'),
(402, 65, '_wp_attached_file', '2020/09/property-9.jpg'),
(403, 65, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1000;s:6:\"height\";i:706;s:4:\"file\";s:22:\"2020/09/property-9.jpg\";s:5:\"sizes\";a:6:{s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"property-9-300x212.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:212;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:23:\"property-9-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"property-9-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:22:\"property-9-768x542.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:542;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:21:\"property-9-120x85.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:85;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:22:\"property-9-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(404, 50, '_thumbnail_id', '65'),
(405, 66, '_bds', ''),
(406, 66, '_xaydung', ''),
(407, 66, '_amthuc', ''),
(408, 66, '_edit_last', '1'),
(409, 66, '_edit_lock', '1599759739:1'),
(410, 67, '_wp_attached_file', '2020/09/billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million.jpg'),
(411, 67, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:110:\"2020/09/billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:110:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:111:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:110:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:110:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:111:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:109:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:110:\"billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(412, 66, '_thumbnail_id', '67'),
(413, 66, 'prefix-price', '4000000'),
(414, 66, 'prefix-area', '230'),
(415, 66, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(416, 66, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(417, 66, 'prefix-vip', '1'),
(418, 68, '_bds', ''),
(419, 68, '_xaydung', ''),
(420, 68, '_amthuc', ''),
(421, 68, '_edit_last', '1'),
(422, 68, '_edit_lock', '1599760061:1'),
(423, 69, '_wp_attached_file', '2020/09/Penthouse-1.jpg'),
(424, 69, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:23:\"2020/09/Penthouse-1.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:23:\"Penthouse-1-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:24:\"Penthouse-1-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:23:\"Penthouse-1-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:23:\"Penthouse-1-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:24:\"Penthouse-1-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:22:\"Penthouse-1-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:23:\"Penthouse-1-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(425, 68, '_thumbnail_id', '69'),
(426, 68, 'prefix-vip', '1'),
(427, 68, 'prefix-price', '2300000'),
(428, 68, 'prefix-area', '450'),
(429, 68, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(430, 68, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(431, 68, 'post_views_count', '182'),
(432, 66, 'post_views_count', '282'),
(433, 70, '_bds', ''),
(434, 70, '_xaydung', ''),
(435, 70, '_amthuc', ''),
(436, 70, '_edit_last', '1'),
(437, 70, '_edit_lock', '1599760144:1'),
(438, 71, '_wp_attached_file', '2020/09/villas.jpg'),
(439, 71, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1920;s:6:\"height\";i:1245;s:4:\"file\";s:18:\"2020/09/villas.jpg\";s:5:\"sizes\";a:7:{s:6:\"medium\";a:4:{s:4:\"file\";s:18:\"villas-300x195.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:195;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:19:\"villas-1000x600.jpg\";s:5:\"width\";i:1000;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"villas-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:18:\"villas-768x498.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:498;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:19:\"villas-1536x996.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:996;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"small\";a:4:{s:4:\"file\";s:17:\"villas-120x78.jpg\";s:5:\"width\";i:120;s:6:\"height\";i:78;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:8:\"thumb5x3\";a:4:{s:4:\"file\";s:18:\"villas-500x300.jpg\";s:5:\"width\";i:500;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(440, 70, '_thumbnail_id', '71'),
(441, 70, 'prefix-price', '450000000'),
(442, 70, 'prefix-area', '400'),
(443, 70, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(444, 70, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(445, 70, 'prefix-vip', '0'),
(446, 72, '_bds', ''),
(447, 72, '_xaydung', ''),
(448, 72, '_amthuc', ''),
(449, 72, '_edit_last', '1'),
(450, 72, '_edit_lock', '1599760185:1'),
(451, 72, '_thumbnail_id', '65'),
(452, 72, 'prefix-price', '450000000'),
(453, 72, 'prefix-area', '670'),
(454, 72, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(455, 72, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(456, 72, 'prefix-vip', '0'),
(457, 73, '_bds', ''),
(458, 73, '_xaydung', ''),
(459, 73, '_amthuc', ''),
(460, 73, '_edit_last', '1'),
(461, 73, '_thumbnail_id', '56'),
(462, 73, 'prefix-price', '450000000'),
(463, 73, 'prefix-area', '340'),
(464, 73, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(465, 73, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(466, 73, 'prefix-vip', '0'),
(467, 73, '_edit_lock', '1599760309:1'),
(468, 73, 'post_views_count', '185'),
(469, 72, 'post_views_count', '149'),
(470, 70, 'post_views_count', '149'),
(471, 74, '_bds', ''),
(472, 74, '_xaydung', ''),
(473, 74, '_amthuc', ''),
(474, 74, '_edit_last', '1'),
(475, 74, '_edit_lock', '1599839277:1'),
(476, 74, '_thumbnail_id', '64'),
(477, 74, 'prefix-price', '23000000'),
(478, 74, 'prefix-area', '232'),
(479, 74, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(480, 74, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(481, 74, 'prefix-vip', '0'),
(482, 75, '_bds', ''),
(483, 75, '_xaydung', ''),
(484, 75, '_amthuc', ''),
(485, 75, '_edit_last', '1'),
(486, 75, '_thumbnail_id', '59'),
(487, 75, 'prefix-price', '54000000'),
(488, 75, 'prefix-area', '323'),
(489, 75, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(490, 75, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(491, 75, 'prefix-vip', '0'),
(492, 75, '_edit_lock', '1599839314:1'),
(493, 76, '_bds', ''),
(494, 76, '_xaydung', ''),
(495, 76, '_amthuc', ''),
(496, 76, '_edit_last', '1'),
(497, 76, '_edit_lock', '1600277927:1'),
(498, 76, '_thumbnail_id', '55'),
(499, 76, 'prefix-price', '323323'),
(500, 76, 'prefix-area', '232'),
(501, 76, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(502, 76, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(503, 76, 'prefix-vip', '1'),
(504, 76, 'post_views_count', '160'),
(505, 75, 'post_views_count', '145'),
(506, 74, 'post_views_count', '145'),
(507, 77, '_bds', ''),
(508, 77, '_xaydung', ''),
(509, 77, '_amthuc', ''),
(510, 77, '_edit_last', '1'),
(511, 77, '_thumbnail_id', '56'),
(512, 77, 'prefix-price', '656565'),
(513, 77, 'prefix-area', '656'),
(514, 77, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(515, 77, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(516, 77, 'prefix-vip', '0'),
(517, 77, '_edit_lock', '1600527743:1'),
(518, 78, '_bds', ''),
(519, 78, '_xaydung', ''),
(520, 78, '_amthuc', ''),
(521, 78, '_edit_last', '1'),
(522, 78, '_edit_lock', '1600865531:1'),
(523, 78, '_thumbnail_id', '57'),
(524, 78, 'prefix-price', '213000000'),
(525, 78, 'prefix-area', '214'),
(526, 78, 'prefix-address', '1 Nam Kỳ Khởi Nghĩa, Q.1'),
(527, 78, 'prefix-video', 'https://www.youtube.com/watch?v=mYzIZKoWGT0'),
(528, 78, 'prefix-vip', '0'),
(529, 78, 'post_views_count', '155'),
(530, 77, 'post_views_count', '228'),
(531, 79, '_bds', ''),
(532, 79, '_xaydung', ''),
(533, 79, '_amthuc', ''),
(534, 79, 'prefix-price', ''),
(535, 79, 'prefix-area', ''),
(536, 79, 'prefix-address', ''),
(537, 79, 'prefix-video', ''),
(538, 79, '_thumbnail_id', 'O:8:\"WP_Error\":2:{s:6:\"errors\";a:1:{s:12:\"upload_error\";a:1:{i:0;s:34:\"Specified file failed upload test.\";}}s:10:\"error_data\";a:0:{}}'),
(539, 79, '_edit_lock', '1599841525:1'),
(543, 79, 'post_views_count', '1'),
(544, 79, '_wp_trash_meta_status', 'publish'),
(545, 79, '_wp_trash_meta_time', '1599842366'),
(546, 79, '_wp_desired_post_slug', '79-2'),
(556, 89, '_edit_last', '1'),
(557, 89, '_edit_lock', '1600529516:1'),
(558, 89, '_wp_page_template', 'template-user-edit-post.php'),
(559, 90, '_edit_last', '1'),
(560, 90, '_edit_lock', '1600534831:1'),
(561, 90, '_wp_page_template', 'template-user-dashboard.php'),
(562, 91, '_edit_last', '1'),
(563, 91, '_edit_lock', '1600706141:1'),
(564, 91, '_wp_page_template', 'bds.php'),
(565, 92, '_wp_trash_meta_status', 'publish'),
(566, 92, '_wp_trash_meta_time', '1600780458');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2020-09-08 15:39:47', '2020-09-08 15:39:47', '<!-- wp:paragraph -->\n<p>Cảm ơn vì đã sử dụng WordPress. Đây là bài viết đầu tiên của bạn. Sửa hoặc xóa nó, và bắt đầu bài viết của bạn nhé!</p>\n<!-- /wp:paragraph -->', 'Chào tất cả mọi người!', '', 'publish', 'open', 'open', '', 'chao-moi-nguoi', '', '', '2020-09-08 15:39:47', '2020-09-08 15:39:47', '', 0, 'https://haphome.vn/?p=1', 0, 'post', '', 1),
(2, 1, '2020-09-08 15:39:47', '2020-09-08 15:39:47', '', 'HAP Home', '', 'publish', 'closed', 'open', '', 'trang-mau', '', '', '2020-09-08 16:27:21', '2020-09-08 16:27:21', '', 0, 'https://haphome.vn/?page_id=2', 0, 'page', '', 0),
(3, 1, '2020-09-08 15:39:47', '2020-09-08 15:39:47', '<!-- wp:heading --><h2>Chúng tôi là ai</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Địa chỉ website là: https://haphome.vn.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Thông tin cá nhân nào bị thu thập và tại sao thu thập</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Bình luận</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Khi khách truy cập để lại bình luận trên trang web, chúng tôi thu thập dữ liệu được hiển thị trong biểu mẫu bình luận và cũng là địa chỉ IP của người truy cập và chuỗi user agent của người dùng trình duyệt để giúp phát hiện spam</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Một chuỗi ẩn danh được tạo từ địa chỉ email của bạn (còn được gọi là hash) có thể được cung cấp cho dịch vụ Gravatar để xem bạn có đang sử dụng nó hay không. Chính sách bảo mật của dịch vụ Gravatar có tại đây: https://automattic.com/privacy/. Sau khi chấp nhận bình luận của bạn, ảnh tiểu sử của bạn được hiển thị công khai trong ngữ cảnh bình luận của bạn.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Thư viện</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Nếu bạn tải hình ảnh lên trang web, bạn nên tránh tải lên hình ảnh có dữ liệu vị trí được nhúng (EXIF GPS) đi kèm. Khách truy cập vào trang web có thể tải xuống và giải nén bất kỳ dữ liệu vị trí nào từ hình ảnh trên trang web.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Thông tin liên hệ</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Nếu bạn viết bình luận trong website, bạn có thể cung cấp cần nhập tên, email địa chỉ website trong cookie. Các thông tin này nhằm giúp bạn không cần nhập thông tin nhiều lần khi viết bình luận khác. Cookie này sẽ được lưu giữ trong một năm.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Nếu bạn vào trang đăng nhập, chúng tôi sẽ thiết lập một cookie tạm thời để xác định nếu trình duyệt cho phép sử dụng cookie. Cookie này không bao gồm thông tin cá nhân và sẽ được gỡ bỏ khi bạn đóng trình duyệt.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Khi bạn đăng nhập, chúng tôi sẽ thiết lập một vài cookie để lưu thông tin đăng nhập và lựa chọn hiển thị. Thông tin đăng nhập gần nhất lưu trong hai ngày, và lựa chọn hiển thị gần nhất lưu trong một năm. Nếu bạn chọn &quot;Nhớ tôi&quot;, thông tin đăng nhập sẽ được lưu trong hai tuần. Nếu bạn thoát tài khoản, thông tin cookie đăng nhập sẽ bị xoá.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Nếu bạn sửa hoặc công bố bài viết, một bản cookie bổ sung sẽ được lưu trong trình duyệt. Cookie này không chứa thông tin cá nhân và chỉ đơn giản bao gồm ID của bài viết bạn đã sửa. Nó tự động hết hạn sau 1 ngày.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Nội dung nhúng từ website khác</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Các bài viết trên trang web này có thể bao gồm nội dung được nhúng (ví dụ: video, hình ảnh, bài viết, v.v.). Nội dung được nhúng từ các trang web khác hoạt động theo cùng một cách chính xác như khi khách truy cập đã truy cập trang web khác.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Những website này có thể thu thập dữ liệu về bạn, sử dụng cookie, nhúng các trình theo dõi của bên thứ ba và giám sát tương tác của bạn với nội dung được nhúng đó, bao gồm theo dõi tương tác của bạn với nội dung được nhúng nếu bạn có tài khoản và đã đăng nhập vào trang web đó.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Phân tích</h3><!-- /wp:heading --><!-- wp:heading --><h2>Chúng tôi chia sẻ dữ liệu của bạn với ai</h2><!-- /wp:heading --><!-- wp:heading --><h2>Dữ liệu của bạn tồn tại bao lâu</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Nếu bạn để lại bình luận, bình luận và siêu dữ liệu của nó sẽ được giữ lại vô thời hạn. Điều này là để chúng tôi có thể tự động nhận ra và chấp nhận bất kỳ bình luận nào thay vì giữ chúng trong khu vực đợi kiểm duyệt.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Đối với người dùng đăng ký trên trang web của chúng tôi (nếu có), chúng tôi cũng lưu trữ thông tin cá nhân mà họ cung cấp trong hồ sơ người dùng của họ. Tất cả người dùng có thể xem, chỉnh sửa hoặc xóa thông tin cá nhân của họ bất kỳ lúc nào (ngoại trừ họ không thể thay đổi tên người dùng của họ). Quản trị viên trang web cũng có thể xem và chỉnh sửa thông tin đó.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Các quyền nào của bạn với dữ liệu của mình</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Nếu bạn có tài khoản trên trang web này hoặc đã để lại nhận xét, bạn có thể yêu cầu nhận tệp xuất dữ liệu cá nhân mà chúng tôi lưu giữ về bạn, bao gồm mọi dữ liệu bạn đã cung cấp cho chúng tôi. Bạn cũng có thể yêu cầu chúng tôi xóa mọi dữ liệu cá nhân mà chúng tôi lưu giữ về bạn. Điều này không bao gồm bất kỳ dữ liệu nào chúng tôi có nghĩa vụ giữ cho các mục đích hành chính, pháp lý hoặc bảo mật.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Các dữ liệu của bạn được gửi tới đâu</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Các bình luận của khách (không phải là thành viên) có thể được kiểm tra thông qua dịch vụ tự động phát hiện spam.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Thông tin liên hệ của bạn</h2><!-- /wp:heading --><!-- wp:heading --><h2>Thông tin bổ sung</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cách chúng tôi bảo vệ dữ liệu của bạn</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Các quá trình tiết lộ dữ liệu mà chúng tôi thực hiện</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Những bên thứ ba chúng tôi nhận dữ liệu từ đó</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Việc quyết định và/hoặc thu thập thông tin tự động mà chúng tôi áp dụng với dữ liệu người dùng</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Các yêu cầu công bố thông tin được quản lý</h3><!-- /wp:heading -->', 'Chính sách bảo mật', '', 'draft', 'closed', 'open', '', 'chinh-sach-bao-mat', '', '', '2020-09-08 15:39:47', '2020-09-08 15:39:47', '', 0, 'https://haphome.vn/?page_id=3', 0, 'page', '', 0),
(5, 1, '2020-09-08 16:27:21', '2020-09-08 16:27:21', '', 'HAP Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2020-09-08 16:27:21', '2020-09-08 16:27:21', '', 2, 'https://haphome.vn/2020/09/08/2-revision-v1/', 0, 'revision', '', 0),
(6, 1, '2020-09-08 23:55:30', '2020-09-08 16:55:30', '', 'Đăng tin HAP Home', '', 'publish', 'closed', 'closed', '', 'dang-tin', '', '', '2020-09-19 21:55:27', '2020-09-19 14:55:27', '', 0, 'https://haphome.vn/?page_id=6', 0, 'page', '', 0),
(7, 1, '2020-09-08 23:55:30', '2020-09-08 16:55:30', '', 'Đăng tin HAP Home', '', 'inherit', 'closed', 'closed', '', '6-revision-v1', '', '', '2020-09-08 23:55:30', '2020-09-08 16:55:30', '', 6, 'https://haphome.vn/6-revision-v1', 0, 'revision', '', 0),
(9, 1, '2020-09-09 20:53:19', '2020-09-09 13:53:19', '', 'Cần bán', '', 'publish', 'closed', 'closed', '', 'can-ban', '', '', '2020-09-09 20:53:19', '2020-09-09 13:53:19', '', 0, 'https://haphome.vn/?page_id=9', 0, 'page', '', 0),
(10, 1, '2020-09-09 20:53:19', '2020-09-09 13:53:19', '', 'Cần bán', '', 'inherit', 'closed', 'closed', '', '9-revision-v1', '', '', '2020-09-09 20:53:19', '2020-09-09 13:53:19', '', 9, 'https://haphome.vn/9-revision-v1', 0, 'revision', '', 0),
(11, 1, '2020-09-09 20:53:37', '2020-09-09 13:53:37', '', 'Cho thuê', '', 'publish', 'closed', 'closed', '', 'cho-thue', '', '', '2020-09-09 20:53:37', '2020-09-09 13:53:37', '', 0, 'https://haphome.vn/?page_id=11', 0, 'page', '', 0),
(12, 1, '2020-09-09 20:53:37', '2020-09-09 13:53:37', '', 'Cho thuê', '', 'inherit', 'closed', 'closed', '', '11-revision-v1', '', '', '2020-09-09 20:53:37', '2020-09-09 13:53:37', '', 11, 'https://haphome.vn/11-revision-v1', 0, 'revision', '', 0),
(13, 1, '2020-09-09 22:49:47', '2020-09-09 15:49:47', '', 'Cần bán biệt thự', '', 'publish', 'closed', 'closed', '', 'can-ban-biet-thu', '', '', '2020-09-09 22:49:47', '2020-09-09 15:49:47', '', 0, 'https://haphome.vn/?page_id=13', 0, 'page', '', 0),
(14, 1, '2020-09-09 20:54:16', '2020-09-09 13:54:16', '', 'Cần bán biệt thự', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2020-09-09 20:54:16', '2020-09-09 13:54:16', '', 13, 'https://haphome.vn/13-revision-v1', 0, 'revision', '', 0),
(15, 1, '2020-09-09 22:49:42', '2020-09-09 15:49:42', '', 'Cần bán căn hộ', '', 'publish', 'closed', 'closed', '', 'can-ban-can-ho', '', '', '2020-09-09 22:49:42', '2020-09-09 15:49:42', '', 0, 'https://haphome.vn/?page_id=15', 0, 'page', '', 0),
(16, 1, '2020-09-09 20:54:31', '2020-09-09 13:54:31', '', 'Cần bán căn hộ', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2020-09-09 20:54:31', '2020-09-09 13:54:31', '', 15, 'https://haphome.vn/15-revision-v1', 0, 'revision', '', 0),
(17, 1, '2020-09-09 20:55:06', '2020-09-09 13:55:06', '', 'Cần bán Nhà phố', '', 'publish', 'closed', 'closed', '', 'can-ban-nha-pho', '', '', '2020-09-09 20:55:06', '2020-09-09 13:55:06', '', 0, 'https://haphome.vn/?page_id=17', 0, 'page', '', 0),
(18, 1, '2020-09-09 20:55:06', '2020-09-09 13:55:06', '', 'Cần bán Nhà phố', '', 'inherit', 'closed', 'closed', '', '17-revision-v1', '', '', '2020-09-09 20:55:06', '2020-09-09 13:55:06', '', 17, 'https://haphome.vn/17-revision-v1', 0, 'revision', '', 0),
(19, 1, '2020-09-09 20:55:29', '2020-09-09 13:55:29', '', 'Cần bán Đất nền', '', 'publish', 'closed', 'closed', '', 'can-ban-dat-nen', '', '', '2020-09-09 20:55:29', '2020-09-09 13:55:29', '', 0, 'https://haphome.vn/?page_id=19', 0, 'page', '', 0),
(20, 1, '2020-09-09 20:55:29', '2020-09-09 13:55:29', '', 'Cần bán Đất nền', '', 'inherit', 'closed', 'closed', '', '19-revision-v1', '', '', '2020-09-09 20:55:29', '2020-09-09 13:55:29', '', 19, 'https://haphome.vn/19-revision-v1', 0, 'revision', '', 0),
(22, 1, '2020-09-09 21:59:18', '2020-09-09 14:59:18', '', 'Cho thuê Biệt thự', '', 'publish', 'closed', 'closed', '', 'cho-thue-biet-thu', '', '', '2020-09-09 21:59:18', '2020-09-09 14:59:18', '', 0, 'https://haphome.vn/?page_id=22', 0, 'page', '', 0),
(23, 1, '2020-09-09 21:59:18', '2020-09-09 14:59:18', '', 'Cho thuê Biệt thự', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2020-09-09 21:59:18', '2020-09-09 14:59:18', '', 22, 'https://haphome.vn/22-revision-v1', 0, 'revision', '', 0),
(24, 1, '2020-09-09 21:59:32', '2020-09-09 14:59:32', '', 'Cho thuê Căn hộ', '', 'publish', 'closed', 'closed', '', 'cho-thue-can-ho', '', '', '2020-09-09 21:59:32', '2020-09-09 14:59:32', '', 0, 'https://haphome.vn/?page_id=24', 0, 'page', '', 0),
(25, 1, '2020-09-09 21:59:32', '2020-09-09 14:59:32', '', 'Cho thuê Căn hộ', '', 'inherit', 'closed', 'closed', '', '24-revision-v1', '', '', '2020-09-09 21:59:32', '2020-09-09 14:59:32', '', 24, 'https://haphome.vn/24-revision-v1', 0, 'revision', '', 0),
(26, 1, '2020-09-09 21:59:47', '2020-09-09 14:59:47', '', 'Cho thuê Nhà phố', '', 'publish', 'closed', 'closed', '', 'cho-thue-nha-pho', '', '', '2020-09-09 21:59:47', '2020-09-09 14:59:47', '', 0, 'https://haphome.vn/?page_id=26', 0, 'page', '', 0),
(27, 1, '2020-09-09 21:59:47', '2020-09-09 14:59:47', '', 'Cho thuê Nhà phố', '', 'inherit', 'closed', 'closed', '', '26-revision-v1', '', '', '2020-09-09 21:59:47', '2020-09-09 14:59:47', '', 26, 'https://haphome.vn/26-revision-v1', 0, 'revision', '', 0),
(28, 1, '2020-09-09 22:00:01', '2020-09-09 15:00:01', '', 'Cho thuê Đất nền', '', 'publish', 'closed', 'closed', '', 'cho-thue-dat-nen', '', '', '2020-09-09 22:00:01', '2020-09-09 15:00:01', '', 0, 'https://haphome.vn/?page_id=28', 0, 'page', '', 0),
(29, 1, '2020-09-09 22:00:01', '2020-09-09 15:00:01', '', 'Cho thuê Đất nền', '', 'inherit', 'closed', 'closed', '', '28-revision-v1', '', '', '2020-09-09 22:00:01', '2020-09-09 15:00:01', '', 28, 'https://haphome.vn/28-revision-v1', 0, 'revision', '', 0),
(30, 1, '2020-09-09 22:48:16', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2020-09-09 22:48:16', '0000-00-00 00:00:00', '', 0, 'https://haphome.vn/?p=30', 1, 'nav_menu_item', '', 0),
(31, 1, '2020-09-09 22:48:16', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2020-09-09 22:48:16', '0000-00-00 00:00:00', '', 0, 'https://haphome.vn/?p=31', 1, 'nav_menu_item', '', 0),
(32, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '32', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=32', 1, 'nav_menu_item', '', 0),
(33, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '33', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=33', 2, 'nav_menu_item', '', 0),
(34, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '34', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=34', 3, 'nav_menu_item', '', 0),
(35, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '35', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=35', 6, 'nav_menu_item', '', 0),
(36, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '36', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=36', 9, 'nav_menu_item', '', 0),
(37, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '37', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=37', 10, 'nav_menu_item', '', 0),
(38, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '38', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=38', 7, 'nav_menu_item', '', 0),
(39, 1, '2020-09-09 22:49:07', '2020-09-09 15:49:07', ' ', '', '', 'publish', 'closed', 'closed', '', '39', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=39', 8, 'nav_menu_item', '', 0),
(40, 1, '2020-09-09 22:48:38', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2020-09-09 22:48:38', '0000-00-00 00:00:00', '', 0, 'https://haphome.vn/?p=40', 1, 'nav_menu_item', '', 0),
(41, 1, '2020-09-09 22:51:01', '2020-09-09 15:51:01', ' ', '', '', 'publish', 'closed', 'closed', '', '41', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=41', 4, 'nav_menu_item', '', 0),
(42, 1, '2020-09-09 22:51:01', '2020-09-09 15:51:01', ' ', '', '', 'publish', 'closed', 'closed', '', '42', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=42', 5, 'nav_menu_item', '', 0),
(43, 1, '2020-09-09 23:24:13', '2020-09-09 16:24:13', ' ', '', '', 'publish', 'closed', 'closed', '', '43', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=43', 11, 'nav_menu_item', '', 0),
(44, 1, '2020-09-09 23:24:13', '2020-09-09 16:24:13', ' ', '', '', 'publish', 'closed', 'closed', '', '44', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=44', 12, 'nav_menu_item', '', 0),
(45, 1, '2020-09-09 23:24:13', '2020-09-09 16:24:13', ' ', '', '', 'publish', 'closed', 'closed', '', '45', '', '', '2020-09-09 23:24:13', '2020-09-09 16:24:13', '', 0, 'https://haphome.vn/?p=45', 13, 'nav_menu_item', '', 0),
(46, 1, '2020-09-10 00:16:34', '2020-09-09 17:16:34', '2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop2 popopop popopop popopop popopop popopop popopop popopop popopop', '2 popopop popopop popopop popopop popopop popopop popopop popopop', '', 'trash', 'closed', 'closed', '', '2-popopop-popopop-popopop-popopop-popopop-popopop-popopop-popopop__trashed', '', '', '2020-09-11 00:20:32', '2020-09-10 17:20:32', '', 0, 'https://haphome.vn/bat-dong-san/2-popopop-popopop-popopop-popopop-popopop-popopop-popopop-popopop', 0, 'property', '', 0),
(47, 1, '2020-09-10 00:16:34', '2020-09-09 17:16:34', '', 'bidv', '', 'inherit', 'open', 'closed', '', 'bidv', '', '', '2020-09-10 00:16:34', '2020-09-09 17:16:34', '', 46, 'https://haphome.vn/wp-content/uploads/2020/09/bidv.jpg', 0, 'attachment', 'image/jpeg', 0),
(48, 1, '2020-09-11 00:23:37', '2020-09-10 17:23:37', 'Enchanting three bedroom, three bath home with spacious one bedroom, one bath cabana, in-laws quarters. Charming living area features fireplace and fabulous art deco details. Formal dining room. Remodeled kitchen with granite countertops, white cabinetry and stainless appliances. Lovely master bedroom has updated bath, beautiful view of the pool. Guest bedrooms have walk-in, cedar closets. Delightful backyard; majestic oaks surround the free form pool and expansive patio, wet bar and grill.', 'Home in Merrick Way', '', 'publish', 'closed', 'closed', '', 'home-in-merrick-way', '', '', '2020-09-11 00:27:48', '2020-09-10 17:27:48', '', 0, 'https://haphome.vn/bat-dong-san/home-in-merrick-way', 0, 'property', '', 0),
(49, 1, '2020-09-11 00:23:37', '2020-09-10 17:23:37', '', 'property-interior-1', '', 'inherit', 'open', 'closed', '', 'property-interior-1', '', '', '2020-09-11 00:23:37', '2020-09-10 17:23:37', '', 48, 'https://haphome.vn/wp-content/uploads/2020/09/property-interior-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(50, 1, '2020-09-19 22:50:32', '2020-09-19 15:50:32', 'Enchanting three bedroom, three bath home with spacious one bedroom, one bath cabana,\r\n\r\nin-laws quarters. Charming living area features fireplace and fabulous art deco details. Formal dining room. Remodeled kitchen with granite countertops, white cabinetry and stainless appliances. Lovely master bedroom has updated bath, beautiful view of the pool. Guest \r\n\r\nbedrooms have walk-in, cedar closets. Delightful backyard; majestic oaks surround the free form pool and expansive patio, wet bar and grill.', 'Home in Merrick Way', '', 'publish', 'closed', 'closed', '', 'home-in-merrick-way-2', '', '', '2020-09-19 22:50:32', '2020-09-19 15:50:32', '', 0, 'https://haphome.vn/bat-dong-san/home-in-merrick-way-2', 0, 'property', '', 0),
(52, 1, '2020-09-11 00:30:56', '2020-09-10 17:30:56', '<div class=\"property-section property-description\">\r\n\r\nVestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'Apricot West Britford Arch', '', 'publish', 'closed', 'closed', '', '52-2', '', '', '2020-09-11 00:38:40', '2020-09-10 17:38:40', '', 0, 'https://haphome.vn/?post_type=property&#038;p=52', 0, 'property', '', 0),
(53, 1, '2020-09-11 00:30:40', '2020-09-10 17:30:40', '', 'Manhattan-Penthouse_01-1', '', 'inherit', 'open', 'closed', '', 'manhattan-penthouse_01-1', '', '', '2020-09-11 00:30:40', '2020-09-10 17:30:40', '', 52, 'https://haphome.vn/wp-content/uploads/2020/09/Manhattan-Penthouse_01-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(54, 1, '2020-09-11 00:34:29', '2020-09-10 17:34:29', '<div class=\"property-section property-description\">\r\n\r\nPraesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed accumsan vestibulum eros at imperdiet. Aliquam eros ligula, fermentum ornare varius at, aliquet id magna.\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'New Quality House For Sale', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale', '', '', '2020-09-11 00:34:29', '2020-09-10 17:34:29', '', 0, 'https://haphome.vn/?post_type=property&#038;p=54', 0, 'property', '', 0),
(55, 1, '2020-09-11 00:33:26', '2020-09-10 17:33:26', '', 'Menlyn-Maine-Indus-Building', '', 'inherit', 'open', 'closed', '', 'menlyn-maine-indus-building', '', '', '2020-09-11 00:33:26', '2020-09-10 17:33:26', '', 54, 'https://haphome.vn/wp-content/uploads/2020/09/Menlyn-Maine-Indus-Building.jpg', 0, 'attachment', 'image/jpeg', 0),
(56, 1, '2020-09-11 00:33:46', '2020-09-10 17:33:46', '', 'property-1', '', 'inherit', 'open', 'closed', '', 'property-1-2', '', '', '2020-09-11 00:33:46', '2020-09-10 17:33:46', '', 54, 'https://haphome.vn/wp-content/uploads/2020/09/property-1-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(57, 1, '2020-09-11 00:33:46', '2020-09-10 17:33:46', '', 'Skytop-Front', '', 'inherit', 'open', 'closed', '', 'skytop-front', '', '', '2020-09-11 00:33:46', '2020-09-10 17:33:46', '', 54, 'https://haphome.vn/wp-content/uploads/2020/09/Skytop-Front.jpg', 0, 'attachment', 'image/jpeg', 0),
(58, 1, '2020-09-11 00:33:47', '2020-09-10 17:33:47', '', 'villa-cruz-1', '', 'inherit', 'open', 'closed', '', 'villa-cruz-1', '', '', '2020-09-11 00:33:47', '2020-09-10 17:33:47', '', 54, 'https://haphome.vn/wp-content/uploads/2020/09/villa-cruz-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(59, 1, '2020-09-11 00:34:15', '2020-09-10 17:34:15', '', 'sub-kemer-villas', '', 'inherit', 'open', 'closed', '', 'sub-kemer-villas', '', '', '2020-09-11 00:34:15', '2020-09-10 17:34:15', '', 54, 'https://haphome.vn/wp-content/uploads/2020/09/sub-kemer-villas.jpg', 0, 'attachment', 'image/jpeg', 0),
(60, 1, '2020-09-11 00:35:35', '2020-09-10 17:35:35', '<div class=\"property-section property-description\">\r\n\r\nPraesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed accumsan vestibulum eros at imperdiet. Aliquam eros ligula, fermentum ornare varius at, aliquet id magna.\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'North Parchmore Street', '', 'publish', 'closed', 'closed', '', 'north-parchmore-street', '', '', '2020-09-11 00:35:35', '2020-09-10 17:35:35', '', 0, 'https://haphome.vn/?post_type=property&#038;p=60', 0, 'property', '', 0),
(61, 1, '2020-09-11 00:36:44', '2020-09-10 17:36:44', '<div class=\"property-section property-description\">\r\n\r\nPraesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed accumsan vestibulum eros at imperdiet. Aliquam eros ligula, fermentum ornare varius at, aliquet id magna.\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'North Parchmore Street', '', 'publish', 'closed', 'closed', '', 'north-parchmore-street-2', '', '', '2020-09-11 00:36:44', '2020-09-10 17:36:44', '', 0, 'https://haphome.vn/?post_type=property&#038;p=61', 0, 'property', '', 0),
(63, 1, '2020-09-11 00:40:17', '2020-09-10 17:40:17', 'Praesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'Apricot West Britford Arch', '', 'publish', 'closed', 'closed', '', 'apricot-west-britford-arch', '', '', '2020-09-11 00:40:17', '2020-09-10 17:40:17', '', 0, 'https://haphome.vn/?post_type=property&#038;p=63', 0, 'property', '', 0),
(64, 1, '2020-09-11 00:40:10', '2020-09-10 17:40:10', '', 'Untitled-1', '', 'inherit', 'open', 'closed', '', 'untitled-1', '', '', '2020-09-11 00:40:10', '2020-09-10 17:40:10', '', 63, 'https://haphome.vn/wp-content/uploads/2020/09/Untitled-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(65, 1, '2020-09-11 00:41:26', '2020-09-10 17:41:26', '', 'property-9', '', 'inherit', 'open', 'closed', '', 'property-9', '', '', '2020-09-11 00:41:26', '2020-09-10 17:41:26', '', 50, 'https://haphome.vn/wp-content/uploads/2020/09/property-9.jpg', 0, 'attachment', 'image/jpeg', 0),
(66, 1, '2020-09-11 00:44:41', '2020-09-10 17:44:41', 'Praesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'Apricot West Britford Arch', '', 'publish', 'closed', 'closed', '', 'apricot-west-britford-arch-2', '', '', '2020-09-11 00:44:41', '2020-09-10 17:44:41', '', 0, 'https://haphome.vn/?post_type=property&#038;p=66', 0, 'property', '', 0),
(67, 1, '2020-09-11 00:44:32', '2020-09-10 17:44:32', '', 'billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million', '', 'inherit', 'open', 'closed', '', 'billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million', '', '', '2020-09-11 00:44:32', '2020-09-10 17:44:32', '', 66, 'https://haphome.vn/wp-content/uploads/2020/09/billionaire-hedge-funder-ken-griffin-is-selling-his-miami-beach-penthouse-and-condo-for-73-million.jpg', 0, 'attachment', 'image/jpeg', 0),
(68, 1, '2020-09-11 00:45:39', '2020-09-10 17:45:39', '<div class=\"property-section property-description\">\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed accumsan vestibulum eros at imperdiet. Aliquam eros ligula, fermentum ornare varius at, aliquet id magna.\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'New Quality House For Sale', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale-2', '', '', '2020-09-11 00:46:05', '2020-09-10 17:46:05', '', 0, 'https://haphome.vn/?post_type=property&#038;p=68', 0, 'property', '', 0),
(69, 1, '2020-09-11 00:45:31', '2020-09-10 17:45:31', '', 'Penthouse-1', '', 'inherit', 'open', 'closed', '', 'penthouse-1', '', '', '2020-09-11 00:45:31', '2020-09-10 17:45:31', '', 68, 'https://haphome.vn/wp-content/uploads/2020/09/Penthouse-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(70, 1, '2020-09-11 00:50:56', '2020-09-10 17:50:56', 'Praesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'Apricot West Britford Arch', '', 'publish', 'closed', 'closed', '', 'apricot-west-britford-arch-3', '', '', '2020-09-11 00:50:56', '2020-09-10 17:50:56', '', 0, 'https://haphome.vn/?post_type=property&#038;p=70', 0, 'property', '', 0),
(71, 1, '2020-09-11 00:50:50', '2020-09-10 17:50:50', '', 'villas', '', 'inherit', 'open', 'closed', '', 'villas', '', '', '2020-09-11 00:50:50', '2020-09-10 17:50:50', '', 70, 'https://haphome.vn/wp-content/uploads/2020/09/villas.jpg', 0, 'attachment', 'image/jpeg', 0),
(72, 1, '2020-09-11 00:52:06', '2020-09-10 17:52:06', 'Praesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'Apricot West Britford Arch', '', 'publish', 'closed', 'closed', '', 'apricot-west-britford-arch-4', '', '', '2020-09-11 00:52:06', '2020-09-10 17:52:06', '', 0, 'https://haphome.vn/?post_type=property&#038;p=72', 0, 'property', '', 0),
(73, 1, '2020-09-25 20:10:14', '2020-09-25 13:10:14', 'Praesent eget lorem in massa accumsan dapibus nec sed erat. Proin bibendum sed mi quis eleifend. Sed in risus non dui pellentesque lobortis. \r\nVestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh.\r\n Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'Apricot West Britford Archvtger Apricot West Britford Archvtger Apricot West Bri', '', 'publish', 'closed', 'closed', '', 'apricot-west-britford-arch-5', '', '', '2020-09-25 20:10:14', '2020-09-25 13:10:14', '', 0, 'https://haphome.vn/?post_type=property&#038;p=73', 0, 'property', '', 0),
(74, 1, '2020-09-11 22:50:13', '2020-09-11 15:50:13', 'Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'New Quality House For Sale', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale-3', '', '', '2020-09-11 22:50:13', '2020-09-11 15:50:13', '', 0, 'https://haphome.vn/?post_type=property&#038;p=74', 0, 'property', '', 0),
(75, 1, '2020-09-11 22:50:57', '2020-09-11 15:50:57', 'Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'New Quality House For Sale', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale-4', '', '', '2020-09-11 22:50:57', '2020-09-11 15:50:57', '', 0, 'https://haphome.vn/?post_type=property&#038;p=75', 0, 'property', '', 0),
(76, 1, '2020-09-11 22:51:30', '2020-09-11 15:51:30', 'Vestibulum sit amet nisl dui. Nunc feugiat ipsum ac massa congue, semper vestibulum est tincidunt. Integer dignissim, enim nec molestie pharetra, nulla tortor suscipit neque, sed sodales arcu nunc id nibh. Maecenas scelerisque, mauris vel vehicula vulputate, ligula nisi efficitur lorem, quis vestibulum urna nisi eu odio. Pellentesque euismod porttitor posuere. Vestibulum libero lorem, sagittis at malesuada vitae, hendrerit nec nulla. Donec aliquet ut tortor vel varius.', 'New Quality House For Sale New Quality House For Sale', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale-5', '', '', '2020-09-17 00:01:16', '2020-09-16 17:01:16', '', 0, 'https://haphome.vn/?post_type=property&#038;p=76', 0, 'property', '', 0),
(77, 1, '2020-09-11 22:52:19', '2020-09-11 15:52:19', '<div class=\"property-section property-description\">\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'New Quality House For Sale New Quality House For Sale', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale-6', '', '', '2020-09-12 23:22:33', '2020-09-12 16:22:33', '', 0, 'https://haphome.vn/?post_type=property&#038;p=77', 0, 'property', '', 0),
(78, 1, '2020-09-11 22:53:00', '2020-09-11 15:53:00', '<div class=\"property-section property-description\">\r\n\r\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed\r\n\r\n</div>\r\n<div class=\"property-section property-overview\"></div>', 'Giá đất nền bình dương tăng liên tục, từ dĩ an, thuận an đến bến cát, tân uyên', '', 'publish', 'closed', 'closed', '', 'new-quality-house-for-sale-7', '', '', '2020-09-12 22:22:41', '2020-09-12 15:22:41', '', 0, 'https://haphome.vn/?post_type=property&#038;p=78', 0, 'property', '', 0),
(79, 1, '2020-09-11 23:18:50', '2020-09-11 16:18:50', '', '', '', 'trash', 'closed', 'closed', '', '79-2__trashed', '', '', '2020-09-11 23:39:26', '2020-09-11 16:39:26', '', 0, 'https://haphome.vn/bat-dong-san/79-2', 0, 'property', '', 0),
(85, 1, '2020-09-12 22:08:49', '2020-09-12 15:08:49', '<div class=\"property-section property-description\">\n\nCras egestas tincidunt nulla et cursus. Ut ac molestie dui. Fusce eu quam ac purus malesuada auctor. Suspendisse tempus aliquet erat, ac elementum justo eleifend eget. Pellentesque sodales aliquam lacus, nec tristique ligula rutrum quis. Vivamus maximus malesuada dignissim. In vitae vulputate odio. Mauris vestibulum magna dui, a vulputate lacus blandit nec. Morbi posuere mi a turpis tempor vulputate. Morbi dapibus volutpat mauris ut tincidunt. Sed\n\n</div>\n<div class=\"property-section property-overview\"></div>', 'New Quality House For Sale New Quality House For Sale New Quality House For Sale', '', 'inherit', 'closed', 'closed', '', '78-autosave-v1', '', '', '2020-09-12 22:08:49', '2020-09-12 15:08:49', '', 78, 'https://haphome.vn/78-autosave-v1', 0, 'revision', '', 0),
(89, 1, '2020-09-19 21:57:13', '2020-09-19 14:57:13', '', 'Sửa tin', '', 'publish', 'closed', 'closed', '', 'sua-tin', '', '', '2020-09-19 22:00:31', '2020-09-19 15:00:31', '', 0, 'https://haphome.vn/?page_id=89', 0, 'page', '', 0),
(90, 1, '2020-09-19 22:34:39', '2020-09-19 15:34:39', '', 'Quản lý tin', '', 'publish', 'closed', 'closed', '', 'quan-ly-tin', '', '', '2020-09-19 22:34:39', '2020-09-19 15:34:39', '', 0, 'https://haphome.vn/?page_id=90', 0, 'page', '', 0),
(91, 1, '2020-09-21 22:51:37', '2020-09-21 15:51:37', '', 'Đất Bình Dương', '', 'publish', 'closed', 'closed', '', 'dat-binh-duong', '', '', '2020-09-21 22:51:37', '2020-09-21 15:51:37', '', 0, 'https://haphome.vn/?page_id=91', 0, 'page', '', 0),
(92, 1, '2020-09-22 20:14:18', '2020-09-22 13:14:18', '{\n    \"blogdescription\": {\n        \"value\": \"\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-09-22 13:14:18\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'a27e8da8-1f60-4955-a952-142d27787291', '', '', '2020-09-22 20:14:18', '2020-09-22 13:14:18', '', 0, 'https://haphome.vn/a27e8da8-1f60-4955-a952-142d27787291', 0, 'customize_changeset', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Tin tức Bất động sản', 'tin-tuc-bat-dong-san', 0),
(2, 'Main menu', 'main-menu', 0),
(3, 'Phong thủy', 'phong-thuy', 0),
(4, 'Tin tức Bình Dương', 'tin-tuc-binh-duong', 0),
(5, 'Kiến thức Bất động sản', 'kien-thuc-bat-dong-san', 0),
(6, 'Cần bán', 'can-ban', 0),
(7, 'Cho thuê', 'cho-thue', 0),
(8, 'Biệ thự', 'bie-thu', 0),
(9, 'Căn hộ', 'can-ho', 0),
(10, 'Đất nền', 'dat-nen', 0),
(11, 'Nhà phố', 'nha-pho', 0),
(12, 'Bình Dương', 'binh-duong', 0),
(13, 'Bình Phước', 'binh-phuoc', 0),
(14, 'Vũng Tàu', 'vung-tau', 0),
(15, 'Đông', 'dong', 0),
(16, 'Tây', 'tay', 0),
(17, 'Nam', 'nam', 0),
(18, 'Bắt', 'bat', 0),
(19, 'Đông Bắc', 'dong-bac', 0),
(20, 'Đông Nam', 'dong-nam', 0),
(21, 'Tây Bắc', 'tay-bac', 0),
(22, 'Tây Nam', 'tay-nam', 0),
(23, 'Không xác định', 'khong-xac-dinh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(32, 2, 0),
(33, 2, 0),
(34, 2, 0),
(35, 2, 0),
(36, 2, 0),
(37, 2, 0),
(38, 2, 0),
(39, 2, 0),
(41, 2, 0),
(42, 2, 0),
(43, 2, 0),
(44, 2, 0),
(45, 2, 0),
(46, 6, 0),
(46, 8, 0),
(46, 23, 0),
(48, 6, 0),
(48, 7, 0),
(48, 8, 0),
(48, 9, 0),
(48, 10, 0),
(48, 11, 0),
(48, 12, 0),
(48, 15, 0),
(50, 7, 0),
(50, 11, 0),
(50, 16, 0),
(52, 6, 0),
(52, 7, 0),
(52, 8, 0),
(52, 9, 0),
(52, 10, 0),
(52, 11, 0),
(52, 13, 0),
(52, 18, 0),
(54, 6, 0),
(54, 7, 0),
(54, 8, 0),
(54, 9, 0),
(54, 10, 0),
(54, 11, 0),
(54, 13, 0),
(54, 15, 0),
(60, 6, 0),
(60, 7, 0),
(60, 8, 0),
(60, 9, 0),
(60, 10, 0),
(60, 11, 0),
(60, 14, 0),
(60, 20, 0),
(61, 6, 0),
(61, 7, 0),
(61, 8, 0),
(61, 9, 0),
(61, 10, 0),
(61, 11, 0),
(61, 13, 0),
(61, 20, 0),
(63, 6, 0),
(63, 7, 0),
(63, 8, 0),
(63, 9, 0),
(63, 10, 0),
(63, 11, 0),
(63, 14, 0),
(63, 23, 0),
(66, 6, 0),
(66, 7, 0),
(66, 8, 0),
(66, 9, 0),
(66, 10, 0),
(66, 11, 0),
(66, 13, 0),
(66, 19, 0),
(68, 6, 0),
(68, 7, 0),
(68, 8, 0),
(68, 9, 0),
(68, 10, 0),
(68, 11, 0),
(68, 12, 0),
(68, 15, 0),
(70, 6, 0),
(70, 7, 0),
(70, 8, 0),
(70, 9, 0),
(70, 10, 0),
(70, 11, 0),
(70, 14, 0),
(70, 20, 0),
(72, 6, 0),
(72, 7, 0),
(72, 8, 0),
(72, 9, 0),
(72, 10, 0),
(72, 11, 0),
(72, 12, 0),
(72, 14, 0),
(72, 19, 0),
(73, 7, 0),
(73, 11, 0),
(73, 20, 0),
(74, 6, 0),
(74, 7, 0),
(74, 8, 0),
(74, 9, 0),
(74, 10, 0),
(74, 11, 0),
(74, 13, 0),
(74, 15, 0),
(75, 6, 0),
(75, 7, 0),
(75, 8, 0),
(75, 9, 0),
(75, 10, 0),
(75, 11, 0),
(75, 13, 0),
(75, 17, 0),
(76, 6, 0),
(76, 7, 0),
(76, 8, 0),
(76, 9, 0),
(76, 10, 0),
(76, 11, 0),
(76, 13, 0),
(76, 15, 0),
(77, 6, 0),
(77, 7, 0),
(77, 8, 0),
(77, 9, 0),
(77, 10, 0),
(77, 11, 0),
(77, 14, 0),
(77, 19, 0),
(78, 6, 0),
(78, 7, 0),
(78, 8, 0),
(78, 9, 0),
(78, 10, 0),
(78, 11, 0),
(78, 13, 0),
(78, 23, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 13),
(3, 3, 'category', '', 0, 0),
(4, 4, 'category', '', 0, 0),
(5, 5, 'category', '', 0, 0),
(6, 6, 'property_status', '', 0, 15),
(7, 7, 'property_status', '', 0, 17),
(8, 8, 'property_type', '', 0, 15),
(9, 9, 'property_type', '', 0, 15),
(10, 10, 'property_type', '', 0, 15),
(11, 11, 'property_type', '', 0, 17),
(12, 12, 'property_location', '', 0, 3),
(13, 13, 'property_location', '', 0, 8),
(14, 14, 'property_location', '', 0, 5),
(15, 15, 'property_direction', '', 0, 5),
(16, 16, 'property_direction', '', 0, 1),
(17, 17, 'property_direction', '', 0, 1),
(18, 18, 'property_direction', '', 0, 1),
(19, 19, 'property_direction', '', 0, 3),
(20, 20, 'property_direction', '', 0, 4),
(21, 21, 'property_direction', '', 0, 0),
(22, 22, 'property_direction', '', 0, 0),
(23, 23, 'property_direction', '', 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'Hầu Hùng'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '0'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '86'),
(18, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(19, 1, 'metaboxhidden_nav-menus', 'a:7:{i:0;s:21:\"add-post-type-project\";i:1;s:22:\"add-post-type-property\";i:2;s:12:\"add-post_tag\";i:3;s:15:\"add-project_cat\";i:4;s:19:\"add-property_status\";i:5;s:17:\"add-property_type\";i:6;s:22:\"add-property_direction\";}'),
(21, 1, 'nav_menu_recently_edited', '2'),
(22, 1, 'closedpostboxes_nav-menus', 'a:0:{}'),
(23, 1, 'wp_user-settings', 'libraryContent=browse'),
(24, 1, 'wp_user-settings-time', '1599759052'),
(27, 1, 'closedpostboxes_page', 'a:0:{}'),
(28, 1, 'metaboxhidden_page', 'a:5:{i:0;s:10:\"postcustom\";i:1;s:16:\"commentstatusdiv\";i:2;s:11:\"commentsdiv\";i:3;s:7:\"slugdiv\";i:4;s:9:\"authordiv\";}'),
(29, 1, 'wp_yoast_notifications', 'a:3:{i:0;a:2:{s:7:\"message\";s:132:\"Since you are new to Yoast SEO you can configure the <a href=\"https://haphome.vn/wp-admin/?page=wpseo_configurator\">plugin</a>\";s:7:\"options\";a:8:{s:4:\"type\";s:7:\"warning\";s:2:\"id\";s:31:\"wpseo-dismiss-onboarding-notice\";s:5:\"nonce\";N;s:8:\"priority\";d:0.80000000000000004;s:9:\"data_json\";a:0:{}s:13:\"dismissal_key\";N;s:12:\"capabilities\";s:14:\"manage_options\";s:16:\"capability_check\";s:3:\"all\";}}i:1;a:2:{s:7:\"message\";s:773:\"We\'ve noticed you\'ve been using Yoast SEO for some time now; we hope you love it! We\'d be thrilled if you could <a href=\"https://yoa.st/rate-yoast-seo?utm_content=4.5\">give us a 5 stars rating on WordPress.org</a>!\n\nIf you are experiencing issues, <a href=\"https://yoa.st/bugreport?utm_content=4.5\">please file a bug report</a> and we\'ll do our best to help you out.\n\nBy the way, did you know we also have a <a href=\'https://yoa.st/premium-notification?utm_content=4.5\'>Premium plugin</a>? It offers advanced features, like a redirect manager and support for multiple keywords. It also comes with 24/7 personal support.\n\n<a class=\"button\" href=\"https://haphome.vn/wp-admin/?page=wpseo_dashboard&yoast_dismiss=upsell\">Please don\'t show me this notification anymore</a>\";s:7:\"options\";a:8:{s:4:\"type\";s:7:\"warning\";s:2:\"id\";s:19:\"wpseo-upsell-notice\";s:5:\"nonce\";N;s:8:\"priority\";d:0.80000000000000004;s:9:\"data_json\";a:0:{}s:13:\"dismissal_key\";N;s:12:\"capabilities\";s:14:\"manage_options\";s:16:\"capability_check\";s:3:\"all\";}}i:2;a:2:{s:7:\"message\";s:167:\"Don\'t miss your crawl errors: <a href=\"https://haphome.vn/wp-admin/admin.php?page=wpseo_search_console&tab=settings\">connect with Google Search Console here</a>.\";s:7:\"options\";a:8:{s:4:\"type\";s:7:\"warning\";s:2:\"id\";s:17:\"wpseo-dismiss-gsc\";s:5:\"nonce\";N;s:8:\"priority\";d:0.5;s:9:\"data_json\";a:0:{}s:13:\"dismissal_key\";N;s:12:\"capabilities\";s:14:\"manage_options\";s:16:\"capability_check\";s:3:\"all\";}}}'),
(30, 1, 'wpseo-dismiss-onboarding-notice', 'seen'),
(31, 1, 'wpseo-dismiss-gsc', 'seen'),
(32, 1, 'address', 'TP.HCM'),
(33, 1, 'phone', '1234569879'),
(38, 1, 'session_tokens', 'a:1:{s:64:\"c77abfc31605efc31dff72bc8efa0683dfe817af8172300b7e004386bd07a4e7\";a:4:{s:10:\"expiration\";i:1601479384;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36\";s:5:\"login\";i:1601306584;}}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'hmdesign', '$P$BEWrMQbcPME2tOanmsfEWYjIiDgu5q.', 'hmdesign', 'hqh91@yahoo.com.vn', '', '2020-09-08 15:39:47', '', 0, 'hmdesign');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Chỉ mục cho bảng `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Chỉ mục cho bảng `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Chỉ mục cho bảng `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Chỉ mục cho bảng `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Chỉ mục cho bảng `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Chỉ mục cho bảng `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Chỉ mục cho bảng `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Chỉ mục cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT cho bảng `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT cho bảng `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
