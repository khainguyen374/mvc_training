-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 10:50 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `traning_php_aht`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_table`
--

CREATE TABLE `category_table` (
  `id` int(10) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_table`
--

INSERT INTO `category_table` (`id`, `category_name`) VALUES
(1, 'game1'),
(2, 'da bong'),
(8, 'Phạm Sa'),
(9, 'Tô Sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(10) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts_table`
--

CREATE TABLE `posts_table` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_tag` int(10) DEFAULT NULL,
  `id_category` int(10) DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts_table`
--

INSERT INTO `posts_table` (`id`, `id_user`, `id_tag`, `id_category`, `title`, `description`, `image`, `status`, `author`, `tags`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, NULL, 'Human Division Producer', 'Đâu trời vẽ lầu gió cái mướn tui.', 'anh4.jpg', 1, 'Chìm đá là chìm con độc đâu tôi.', 'Nón ghét được.', '2021-10-19', '2021-10-19'),
(24, NULL, NULL, NULL, 'Regional Factors Administrator', 'Em đồng cửa máy ghế.', 'icon-sun.ico', 1, 'Thuyền là tô khoan á không hai.', 'Chìm nón sáu việc', '2021-10-20', '2021-10-20'),
(31, NULL, NULL, NULL, 'Forward Marketing Liaison', 'Máy thuyền vẽ làm đạp.', 'anh2.jpg', 2, 'Nhà tủ nón mười.', 'dasda', '2021-10-20', '2021-10-20'),
(32, NULL, NULL, NULL, 'Future Metrics Director', 'Kim máy trời khoan trăng.', 'hacker.jpg', 2, 'Chín tám xanh.', 'Tủ vẽ khoảng', '2021-10-20', '2021-10-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags_table`
--

CREATE TABLE `tags_table` (
  `id` int(10) NOT NULL,
  `tagname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags_table`
--

INSERT INTO `tags_table` (`id`, `tagname`) VALUES
(1, 'tagkhai1'),
(7, 'new_tag'),
(8, 'Trần Tâm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_table`
--

CREATE TABLE `users_table` (
  `id` int(10) NOT NULL,
  `permission_id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_table`
--

INSERT INTO `users_table` (`id`, `permission_id`, `username`, `email`, `password`, `phone`) VALUES
(88, 1, 'admin', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500', '0123456789'),
(89, 2, 'user', 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', '09963598555'),
(90, 2, 'tn_khainv', 'dtc18h4802010185@ictu.edu.vn', 'c5d16b4c6910db1e7ebba5d59f8dff96', '0369845622');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_tag` (`id_tag`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tags_table`
--
ALTER TABLE `tags_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tags_table`
--
ALTER TABLE `tags_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts_table`
--
ALTER TABLE `posts_table`
  ADD CONSTRAINT `posts_table_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category_table` (`id`),
  ADD CONSTRAINT `posts_table_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags_table` (`id`),
  ADD CONSTRAINT `posts_table_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users_table` (`id`);

--
-- Các ràng buộc cho bảng `users_table`
--
ALTER TABLE `users_table`
  ADD CONSTRAINT `users_table_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
