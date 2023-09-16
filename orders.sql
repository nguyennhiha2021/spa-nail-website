-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 20, 2023 lúc 11:53 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nailspa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `order_cost` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(50) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `full_name`, `email`, `product_name`, `payment_amount`, `order_cost`, `order_time`, `order_status`) VALUES
(1, 'Nguyen Ha', 'nguyennhiha2011@gmail.com', 'Manicure', 2, 50, '2023-08-19 10:02:03', 'ARCHIVED'),
(3, 'Truong Le', 'truong1998hp@gmail.com', 'Manicure', 3, 75, '2023-08-20 06:03:43', 'FULFILLED'),
(6, 'John Nguyen', 'john123@gmail.com', 'Pedicure', 2, 70, '2023-08-20 08:22:06', 'ARCHIVED'),
(7, 'John Nguyen', 'john123@gmail.com', 'Pedicure', 2, 70, '2023-08-20 08:25:06', 'PENDING'),
(8, 'dfgdfgdf nguyen', 'dgdgdfgd11@gmail.com', 'Pedicure', 3, 105, '2023-08-20 08:50:00', 'FULFILLED'),
(9, 'Hannah Smith', 'abc@fdsds.com', 'Pedicure', 2, 70, '2023-08-20 08:59:54', 'PENDING'),
(10, 'kori Nguyen', 'korile1@gmail.com', 'Manicure', 6, 150, '2023-08-20 09:26:58', 'PAID'),
(11, 'Nguyen Ha', 'nguyennhiha2011@gmail.com', 'Manicure', 2, 50, '2023-08-20 09:30:58', 'PENDING'),
(12, 'kjhnaslkdas asdasda', 'asdasasdasd@dascfas.com', 'Manicure', 2, 50, '2023-08-20 09:32:28', 'PENDING');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
