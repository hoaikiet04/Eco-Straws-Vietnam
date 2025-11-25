-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 25, 2025 lúc 01:04 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eco`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`) VALUES
(1, 'noodles', 'Nutritional Noodles'),
(2, 'rice-straws', 'Rice Straws'),
(3, 'stirring-bar', 'Stirring Bar');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `business` varchar(150) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('new','seen','done') NOT NULL DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `leads`
--

INSERT INTO `leads` (`id`, `full_name`, `business`, `phone`, `email`, `message`, `status`, `created_at`) VALUES
(1, 'Nguyen Van A', 'ABC Cafe', '+84 912 345 678', 'a@example.com', 'Quan tâm mì không đường, 10 thùng.', 'new', '2025-11-25 09:10:08'),
(2, 'Le Thi B', 'Green Mart', '+84 987 654 321', 'b@example.com', 'Cần báo giá ống hút gạo số lượng lớn.', 'seen', '2025-11-25 09:10:08'),
(3, 'Kiệt Phạm Hoài', 'TMA Solutions', '0939790320', 'phamhoaikiet04@gmail.com', 'call me', 'new', '2025-11-25 11:01:42'),
(4, 'Kiệt Phạm Hoài', 'TMA Solutions', '+84939790320', 'phamhoaikiet04@gmail.com', 'call me later', 'new', '2025-11-25 11:42:14'),
(5, 'Nguyễn Minh Hạo', 'Motive Vietnam', '0939790320', 'admin@ut.edu.vn', 'send me price your product', 'new', '2025-11-25 11:45:28'),
(6, 'Kiệt Phạm Hoài', 'Endava', '+84939790320', 'admin@ut.edu.vn', 'contact me', 'new', '2025-11-25 11:46:12'),
(7, 'Trần Ngọc Hồng Phúc', 'Asama Company', '+84939790320', 'hongphuc@gmail.com', 'call me later', 'new', '2025-11-25 11:49:42'),
(8, 'Kiệt Phạm Hoài', 'TMA Solutions', '+84939790320', 'phamhoaikiet04@gmail.com', 'call me soon', 'new', '2025-11-25 11:50:43'),
(9, 'Kiệt Phạm Hoài', 'TMA Solutions', '+84939790320', 'phamhoaikiet04@gmail.com', 'hi', 'new', '2025-11-25 11:59:13'),
(10, 'Kiệt Phạm Hoài', 'TMA Solutions', '+84939790320', 'snhkietphamle365.gmail.com', 'hi', 'new', '2025-11-25 11:59:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `old_price` decimal(12,2) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `shopee_url` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `old_price`, `image`, `shopee_url`, `status`, `created_at`) VALUES
(1, 1, 'Rainbow Noodles', 45000.00, 65000.00, 'assets/images/products/mi-cau-vong-Thumbnail-web.png', 'https://shopee.vn/product/123456/11111111/', 1, '2025-11-25 09:10:08'),
(2, 1, 'Corn Noodles', 50000.00, 65000.00, 'assets/images/products/Mi-cau-vong-Thumbnail-web.png', 'https://shopee.vn/product/123456/22222222/', 1, '2025-11-25 09:10:08'),
(3, 1, 'Sugar Free Noodles', 65000.00, 80000.00, 'assets/images/products/Mi-ngo-Thumbnail-web.png', 'https://shopee.vn/product/123456/33333333/', 1, '2025-11-25 09:10:08'),
(4, 2, 'Rice Straws Ø6mm', 38000.00, NULL, 'assets/images/products/rice-straw-6mm.png', 'https://shopee.vn/product/123456/44444444/', 1, '2025-11-25 09:10:08'),
(5, 3, 'Eco Stirring Bar (Coffee)', 29000.00, NULL, 'assets/images/products/stirring-bar.png', 'https://shopee.vn/product/123456/55555555/', 1, '2025-11-25 09:10:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$FbnwW.YaAcDe1.dECHP/VuB.PeNNHYgsrQJ8r3I90Nm1x6hqM38/q', 'admin', '2025-11-25 09:10:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
