-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 04:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronicservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_info`
--

CREATE TABLE `acc_info` (
  `uid` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_info`
--

INSERT INTO `acc_info` (`uid`, `email`, `password`, `date`) VALUES
(1, 'arkarkyawthu@gmail.com', 'arkar123', '2024-01-30'),
(2, 'kyawlinnhtet@gmail.com', 'kyaw123', '2024-01-30'),
(3, 'KoKyawGyi123@gmail.com', 'kyaw123', '2024-02-01'),
(4, 'arkargyi@gmail.com', '12345', '2024-02-01'),
(5, 'Khin154154@gmail.com', '154154', '2024-02-25'),
(6, 'Zwe123@gmail.com', 'zwe123', '2024-02-26'),
(7, 'arkarkyawthu23@gmail.com', '12345', '2024-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'ArkarKyawThu', 'arkarkyawthu111@gmail.com', 'arkar232487', 'owner'),
(2, 'Manager', 'manager@gmail.com', 'manager123', 'manager'),
(3, 'Staff', 'staff@gmail.com', 'staff123', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `user_product` varchar(100) NOT NULL,
  `item_brand` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `error` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`eid`, `uid`, `pid`, `user_product`, `item_brand`, `year`, `error`, `date`, `status`) VALUES
(1, 4, 24, 'portable1.jpg', 'Media', 3, 'no', '2024-02-18', 'comfirm'),
(2, 4, 3, 'portable8.jpg', 'Media', 4, 'no', '2024-02-18', 'comfirm'),
(3, 4, 2, 'portable8.jpg', 'LG', 5, 'no', '2024-02-22', 'comfirm'),
(4, 4, 18, 'portable9.jpg', 'LG', 3, 'no', '2024-02-22', 'comfirm'),
(5, 4, 26, 'portable8.jpg', 'sss', 7, 'tttt', '2024-02-22', 'comfirm'),
(6, 5, 37, 'Alpha_55.jpg', 'Alpha', 3, 'no', '2024-02-25', 'comfirm'),
(7, 5, 47, 'Hisense Rgs3.jpg', 'Hisense', 5, 'yes dfadjgjagfjdagdga', '2024-02-25', 'comfirm'),
(8, 2, 63, 'photo_2024-02-25_21-23-46.jpg', 'LG', 3, 'no', '2024-02-26', 'comfirm'),
(9, 6, 70, 'photo_2024-02-25_21-23-35.jpg', 'Samsung', 2, 'no', '2024-02-26', 'uncomfirm'),
(10, 7, 36, 'photo_2024-02-26_09-28-13.jpg', 'samsung', 3, 'no', '2024-03-04', 'uncomfirm'),
(11, 7, 36, 'photo_2024-02-26_09-28-13.jpg', 'samsung', 2003, 'no', '2024-03-04', 'comfirm'),
(12, 7, 24, 'photo_2024-02-26_09-28-13.jpg', 'samsung', 2003, 'noo', '2024-03-04', 'comfirm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `uid`, `pid`, `eid`, `name`, `phno`, `address`, `date`, `status`) VALUES
(1, 4, 24, 0, 'arkarkyaw', '09774284135', 'Aungsan, Pyay, Bago', '2023-11-18', 'comfirm'),
(2, 4, 26, 0, 'arkarkyaw', '09774284135', 'Aungsan, Pyay, Bago', '2023-11-18', 'comfirm'),
(3, 4, 1, 0, 'arkarkyaw', '09774284135', 'Aungsan, Pyay, Bago', '2023-11-18', 'comfirm'),
(5, 4, 24, 1, 'arkar', '09774284135', 'Aungsan, Pyay, bago', '2023-11-22', 'comfirm'),
(6, 4, 26, 5, 'Daw Aye', '09787654321', 'N01, pyay, Bago', '2023-11-22', 'comfirm'),
(8, 4, 2, 3, 'Daw Aye', '09787654321', 'N01, pyay, Bago', '2023-12-22', 'comfirm'),
(9, 4, 50, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2023-12-25', 'comfirm'),
(10, 4, 59, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2023-12-25', 'comfirm'),
(11, 4, 36, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2023-12-25', 'comfirm'),
(12, 4, 37, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(13, 4, 39, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(14, 4, 35, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(15, 4, 46, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(16, 4, 29, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(17, 4, 3, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(18, 4, 8, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(19, 4, 51, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(20, 4, 18, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(21, 4, 47, 0, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(22, 5, 29, 0, 'Khin', '09774284135', 'AungSan, Pyay, Bago', '2024-01-25', 'comfirm'),
(23, 5, 53, 0, 'Khin', '09774284135', 'AungSan, Pyay, Bago', '2024-02-25', 'comfirm'),
(24, 5, 37, 0, 'Khin', '09774284135', 'AungSan, Pyay, Bago', '2024-02-25', 'comfirm'),
(25, 2, 65, 0, 'KyawLinnHtet', '09683969002', 'Aungsan, Pyay, Bago', '2024-02-26', 'comfirm'),
(26, 2, 71, 0, 'KyawLinnHtet', '09683969002', 'Aungsan, Pyay, Bago', '2024-02-26', 'comfirm'),
(27, 6, 47, 0, 'Zwe', '09683969002', 'Aungsan, Pyay, Bago', '2024-02-26', 'comfirm'),
(28, 6, 36, 0, 'Zwe', '09683969002', 'Aungsan, Pyay, Bago', '2024-02-26', 'comfirm'),
(29, 2, 67, 0, 'KyawLinnHtet', '09774284135', 'no1, Pyay, Bago', '2024-02-26', 'comfirm'),
(30, 2, 63, 8, 'KyawLinnHtet', '09774284135', 'no1, Pyay, Bago', '2024-02-26', 'comfirm'),
(31, 4, 28, 0, 'arkar', '09774284135', 'no1, Pyay, Bago', '2024-03-04', 'uncomfirm'),
(32, 7, 32, 0, 'yeyintaung', '09774284135', 'no1, Pyay, Bago', '2024-03-04', 'uncomfirm');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(100) NOT NULL,
  `incoming_msg_id` int(100) NOT NULL,
  `outgoing_msg_id` int(100) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `mimg` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `mimg`, `status`) VALUES
(1, 0, 4, 'hello', '0', 'unread'),
(2, 0, 4, 'buy', '0', 'unread'),
(3, 4, 0, 'hey', '0', 'unread'),
(4, 4, 0, 'what do you want?', '0', 'unread'),
(5, 0, 4, 'star 10 lone', '0', 'unread'),
(7, 0, 2, 'hello', '0', 'unread'),
(8, 2, 0, 'hello', '0', 'unread'),
(9, 0, 4, 'hello', '0', 'unread'),
(10, 0, 4, 'asdasfdf', '0', 'unread'),
(11, 0, 4, 'fgdfaghf', '0', 'unread'),
(12, 4, 0, 'fjdsajfh', '0', 'unread'),
(15, 0, 4, 'hello', '0', 'unread'),
(21, 4, 0, 'fhd', '0', 'unread'),
(22, 0, 4, 'ass', '0', 'unread'),
(23, 0, 4, 'hello', '0', 'unread'),
(24, 0, 4, 'hello', '0', 'unread'),
(30, 4, 0, '0', '7c4f9589b444571381cd0aab498683a5c9a7e54a5b396dcfb7d1ce081fc9de21.jpg', 'unread'),
(31, 0, 4, '0', 'Hisense Rgs2.jpg', 'unread'),
(33, 0, 4, '0', 'Hisense Rgs1.jpg', 'unread'),
(34, 0, 7, 'none', 'portable3.jpg', 'unread'),
(35, 0, 7, 'none', 'portable6.jpg', 'unread'),
(36, 0, 7, 'asddas', '0', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `comfirm_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `comfirm` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `uid`, `eid`, `comfirm_price`, `description`, `comfirm`, `status`) VALUES
(1, 4, 1, 100000, 'You can exchange!', 'success', 'buy'),
(2, 4, 3, 20000, 'You can exchange!', 'success', 'buy'),
(3, 4, 4, 0, 'You can\'t exchange!', 'cancel', 'notbuy'),
(4, 4, 5, 100000, 'You can exchange!', 'success', 'buy'),
(5, 5, 7, 0, 'You can\'t exchange!', 'cancel', 'notbuy'),
(6, 2, 8, 200000, 'You can exchange now!', 'success', 'buy'),
(7, 5, 6, 300000, 'you can exchange', 'success', 'notbuy'),
(8, 4, 2, 50000, 'you can exchange', 'success', 'notbuy'),
(9, 7, 11, 100000, 'you can exchange', 'success', 'notbuy'),
(10, 7, 12, 0, 'h', 'cancel', 'notbuy');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `oid` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  `post_description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`oid`, `post_img`, `post_description`, `date`) VALUES
(3, 'photo_2024-03-02_20-43-03.jpg', 'မဂ်လာပါ\r\n\r\nအဲကွန်းဆေးဖို့ Service ကောင်းတာ ရှာနေတာလား။🙂\r\n\r\nအဲကွန်းတွေမအေးတော့လို့ စိတ်ညစ်နေပြီလား။ 😒\r\n\r\nအဲကွန်းက ရေတွေကျနေလို့ စိတ်ညစ်နေရပြီလား။😞\r\n\r\nအဲကွန်း အသစ်တပ်ဖို့ စဥ်းစားနေပြီလား။🤔\r\n\r\nအဲ့လိုဆိုရင်တော့ ပြည်မြို့က electronic service မာ အကောင်းမွန်ဆုံး ၀န်ဆောင်မှုပေးနေပီးမို့ ဒီ website မာ အမြန်ဆုံး အကောင့်ဖွင့်ပီး ခေါ်ယူလိုက်ပါ။ \r\nလူကြီးမင်းတို့ စိတ်တိုင်းကျဖြစ်အောင် \r\n\r\nအကောင်းမွန်ဆုံး ဝန်ဆောင်မူပေးနေပါပြီ။', '2024-02-25'),
(4, 'Daikin 1.5hpsp.jpg', 'ဤပစ္စည်းကို ကျွန်တောာ်websiteမာ ဈေးနှုန်း 5500000ကျပ်ဖြင့်၀ယ်ယူနိုင်ပါပီး', '2024-02-27'),
(5, 'photo_2024-03-03_18-40-11.jpg', 'ခုလက်ရှိ Samsung ရဲ့ လက်တလောက ထွက်ရှိထားတဲ့ ရေခဲသေတ္တာ ကတော့ ကျွန်တော်websiteမှာ ရောင်းချနေပါပီး။ သူရဲ့ ဈေးနှုန်းကတော့ 2000000ကျပ် ဘဲဖစ်ပါတယ်။ အမြင့်ကတော့ ၆ပေဖြစ်ပြီးတော့ နှစ်ဖက်ဖွင့်လိူ့လည်းရပါတယ်။ လူကြိုက်​များတဲ့​ ရေခဲသေတ္တာမလို့ ပစ္စည်း​ရှိတုန်း မြန်မြန်လာဝယ်ကြပါဗျို့......', '2024-02-28'),
(8, 'photo_2024-03-03_18-52-30.jpg', '၀န်းထမ်းအလိုရှိသည်။\r\nကျား-3\r\nလျှပ်စစ်ပစ္စည်းနဲ့ပက်သက်ပီး ကျွမ်းကျွမ်းကျင်ကျင်ရှိရပါမည်။\r\n\r\nလျှောက်ထားလို့ပါက ကျွန်တော်တို့ရဲ့ Viber ကို CV form ပေးပို့လျှောက်ထားနိုင်ပါပီး \r\nViber number - 09774284135', '2024-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_qty` int(100) NOT NULL,
  `product_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `product_img`, `product_brand`, `product_category`, `product_type`, `product_qty`, `product_price`) VALUES
(1, 'Daikin 1.5hpsp.jpg', 'Daikin (1.5horsepower)', 'Aircon', 'Split', 2, 800000),
(2, 'Daikin 2hpsp.jpg', 'Daikin (2horsepower)', 'Aircon', 'Split', 5, 850000),
(3, 'Daikin 3.jpg', 'Daikin (3horsepower)', 'Aircon', 'Split', 5, 1000000),
(4, 'Panasonic 1.5hpsp R32.jpg', 'Panasonic (1.5horsepower)', 'Aircon', 'Split', 5, 700000),
(5, 'Samsaung 1hpspit.jpg', 'Samsaung (1horsepower)', 'Aircon', 'Split', 5, 500000),
(6, 'Samsaung 1hpspot.jpg', 'Samsaung (1horsepower)', 'Aircon', 'Split', 5, 500000),
(7, 'Samsaung 2hpspit.jpg', 'Samsaung (2horsepower)', 'Aircon', 'Split', 5, 550000),
(8, 'Samsaung 2hpspot.jpg', 'Samsaung (2horsepower)', 'Aircon', 'Split', 4, 550000),
(9, 'Samsaung 3hpspit.jpg', 'Samsaung (3horsepower)', 'Aircon', 'Split', 5, 650000),
(10, 'Samsaung 3hpspot.jpg', 'Samsaung (3horsepower)', 'Aircon', 'Split', 5, 700000),
(11, 'Panasonic 2.5hpsp R32.jpg', 'Panasonic (2.5horsepower)', 'Aircon', 'Split', 5, 700000),
(12, 'Panasonic 3hpsp R32.jpg', 'Panasonic (3horsepower)', 'Aircon', 'Split', 5, 800000),
(13, 'Panasonic 1hpwd.jpg', 'Panasonic (1horsepower)', 'Aircon', 'Window', 5, 450000),
(14, 'Panasonic 1.5hpwd.jpg', 'Panasonic (1.5horsepower)', 'Aircon', 'Window', 5, 500000),
(15, 'Panasonic 2hpwd.jpg', 'Panasonic (2horsepower)', 'Aircon', 'Window', 5, 600000),
(16, 'Panasonic 2.5hpwd1.png', 'Panasonic (2.5horsepower)', 'Aircon', 'Window', 5, 700000),
(17, 'Panasonic 3hpwd.png', 'Panasonic (3horsepower)', 'Aircon', 'Window', 5, 800000),
(18, 'Samsaung 1hpwd.png', 'Samsaung (1horsepower)', 'Aircon', 'Window', 4, 400000),
(19, 'Samsaung 1.5hpwd.png', 'Samsaung (1.5horsepower)', 'Aircon', 'Window', 5, 500000),
(20, 'Samsaung 2hpwd.png', 'Samsaung (2horsepower)', 'Aircon', 'Window', 5, 600000),
(21, 'Samsaung 2.5hpwd.png', 'Samsaung(2.5horsepower)', 'Aircon', 'Window', 5, 700000),
(22, 'portable1.jpg', 'Media', 'Aircon', 'Portable', 5, 400000),
(23, 'portable2.jpg', 'TCL', 'Aircon', 'Portable', 5, 300000),
(24, 'portable3.jpg', 'Danby', 'Aircon', 'Portable', 5, 350000),
(25, 'portable4.jpg', 'LG', 'Aircon', 'Portable', 5, 400000),
(26, 'portable5.jpg', 'Black Decker', 'Aircon', 'Portable', 5, 500000),
(27, 'portable6.jpg', 'Honeywell', 'Aircon', 'Portable', 5, 450000),
(28, 'portable7.jpg', 'Honeywell', 'Aircon', 'Portable', 4, 500000),
(29, 'portable8.jpg', 'LG', 'Aircon', 'Portable', 3, 600000),
(30, 'portable9.jpg', 'Media', 'Aircon', 'Portable', 5, 350000),
(31, 'portable10.jpg', 'Media', 'Aircon', 'Portable', 5, 450000),
(32, 'Alpha_32.jpg', 'Alpha', 'Tv', '32 inches', 2, 400000),
(33, 'Alpha_43.jpg', 'Alpha', 'Tv', '43 inches', 5, 600000),
(34, 'Alpha_48.jpg', 'Alpha', 'Tv', '48 inches', 5, 700000),
(35, 'Alpha_55.jpg', 'Alpha', 'Tv', '55 inches', 4, 1000000),
(36, 'panasonic_32.png', 'Panasonic', 'Tv', '32 inches', 3, 500000),
(37, 'panasonic_43.png', 'Panasonic', 'Tv', '43 inches', 3, 650000),
(38, 'panasonic_48.jpg', 'Panasonic', 'Tv', '48 inches', 3, 800000),
(39, 'panasonic 55.jpg', 'Panasonic', 'Tv', '55 inches', 4, 1100000),
(40, 'samsung_32.webp', 'Samsung', 'Tv', '32 inches', 5, 500000),
(41, 'samsung_43.webp', 'Samsung', 'Tv', '43 inches', 5, 600000),
(42, 'samsung_48.webp', 'Samsung', 'Tv', '48 inches', 5, 700000),
(43, 'samsung_55.jpg', 'Samsung', 'Tv', '55 inches', 5, 900000),
(44, 'photo_2024-02-24_21-51-59.jpg', 'Hisense', 'Refrigerator', 'chest freezer', 5, 400000),
(45, 'photo_2024-02-24_21-52-19.jpg', 'Hisense', 'Refrigerator', 'chest freezer', 5, 500000),
(46, 'photo_2024-02-24_21-52-22.jpg', 'Hisense', 'Refrigerator', 'chest freezer', 4, 450000),
(47, 'photo_2024-02-24_21-52-27.jpg', 'Hisense', 'Refrigerator', 'chest freezer', 3, 600000),
(48, 'photo_2024-02-24_21-52-32.jpg', 'Hisense', 'Refrigerator', 'chest freezer', 5, 500000),
(49, 'photo_2024-02-24_21-54-37.jpg', 'Hisense', 'Refrigerator', 'Beverage cooler', 5, 400000),
(50, 'photo_2024-02-24_21-54-41.jpg', 'Hisense', 'Refrigerator', 'Beverage cooler', 4, 450000),
(51, 'photo_2024-02-24_21-54-45.jpg', 'Hisense', 'Refrigerator', 'Beverage cooler', 4, 500000),
(52, 'photo_2024-02-24_21-54-49.jpg', 'Hisense', 'Refrigerator', 'Beverage cooler', 5, 550000),
(53, 'photo_2024-02-24_21-54-54.jpg', 'Hisense', 'Refrigerator', 'Beverage cooler', 4, 600000),
(54, 'Hisense Rgs1.jpg', 'Hisense', 'Refrigerator', 'bottom freezer', 5, 400000),
(55, 'Hisense Rgs2.jpg', 'Hisense', 'Refrigerator', 'bottom freezer', 5, 500000),
(56, 'Hisense Rgs3.jpg', 'Hisense', 'Refrigerator', 'bottom freezer', 5, 350000),
(57, 'Mitsubishi RgB1.jpg', 'Misubishi', 'Refrigerator', 'bottom freezer', 5, 600000),
(58, 'Mitsubishi RgB5.jpg', 'Misubishi', 'Refrigerator', 'bottom freezer', 5, 700000),
(59, 'Mitsubishi Rgs1.jpg', 'Misubishi', 'Refrigerator', 'bottom freezer', 4, 650000),
(60, 'Panasonic RgB1.jpg', 'Panasonic', 'Refrigerator', 'bottom freezer', 5, 600000),
(61, 'Panasonic Rgs2.jpg', 'Panasonic', 'Refrigerator', 'bottom freezer', 5, 550000),
(63, 'photo_2024-02-25_21-23-15.jpg', 'Samsung(7.5kg)', 'WashingMachine', 'Twin tub(washing & dryer)', 4, 600000),
(64, 'photo_2024-02-25_21-23-30.jpg', 'Samsung(7.5kg)', 'WashingMachine', 'Twin tub(washing & dryer)', 5, 650000),
(65, 'photo_2024-02-25_21-23-35.jpg', 'Samsung(7.5kg)', 'WashingMachine', 'Twin tub(washing & dryer)', 4, 6300000),
(66, 'photo_2024-02-25_21-23-38.jpg', 'LG(8.0kg)', 'WashingMachine', 'Twin tub(washing & dryer)', 5, 550000),
(67, 'photo_2024-02-25_21-23-42.jpg', 'LG(8.0kg)', 'WashingMachine', 'Twin tub(washing & dryer)', 4, 600000),
(68, 'photo_2024-02-25_21-23-46.jpg', 'LG(8.0kg)', 'WashingMachine', 'Twin tub(washing & dryer)', 5, 500000),
(69, 'photo_2024-02-25_21-29-44.jpg', 'Samsung', 'WashingMachine', 'Automatic washing machine', 5, 670000),
(70, 'photo_2024-02-25_21-29-49.jpg', 'LG', 'WashingMachine', 'Automatic washing machine', 5, 600000),
(71, 'photo_2024-02-25_21-29-52.jpg', 'LG', 'WashingMachine', 'Automatic washing machine', 4, 550000),
(72, 'photo_2024-02-25_21-29-57.jpg', 'Samsung', 'WashingMachine', 'Automatic washing machine', 5, 630000),
(75, 'photo_2024-03-03_18-40-11.jpg', 'Samsung', 'Refrigerator', 'bottom freezer', 3, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `service_hisory`
--

CREATE TABLE `service_hisory` (
  `shid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_hisory`
--

INSERT INTO `service_hisory` (`shid`, `uid`, `sid`, `name`, `phno`, `address`, `date`, `price`, `status`) VALUES
(2, 4, 2, 'Daw Aye', '09774284135', 'no1, Pyay, Bago', '2024-02-25', 10000, 'comfirm'),
(3, 4, 3, 'ArkarKyawThu', '09774284135', 'AungSan, Pyay, Bago', '2024-02-25', 20000, 'comfirm'),
(4, 5, 1, 'arkar', '0976753534', '12134, Pyay, Bago', '2024-02-25', 10000, 'comfirm'),
(5, 6, 12, 'Zwe', '09683969002', 'no1, Pyay, Bago', '2024-02-26', 0, 'uncomfirm'),
(6, 2, 3, 'KyawLinnHtet', '09774284135', 'no1, Pyay, Bago', '2024-02-26', 0, 'uncomfirm'),
(7, 4, 1, 'arkar', '09774284135', 'no1, Pyay, Bago', '2024-03-04', 0, 'uncomfirm'),
(8, 7, 2, 'yeyintaung', '09774284135', 'no1, Pyay, Bago', '2024-03-04', 0, 'uncomfirm'),
(9, 7, 6, 'yeyintaung', '09774284135', 'no1, Pyay, Bago', '2024-03-04', 10000, 'comfirm');

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `sid` int(10) NOT NULL,
  `staff_img` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `work_experience` int(11) NOT NULL,
  `team` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`sid`, `staff_img`, `staff_name`, `position`, `work_experience`, `team`, `address`, `phno`, `about`, `salary`, `status`) VALUES
(1, 'photo_2024-02-26_08-32-29.jpg', 'Arkar Kyaw Thu', 'Leader', 10, 'Aircon', 'AungSan, Pyay, Bago', '09774284313', '                                                      B.E(Electronic Engineering)                                                                                ', 700000, 'busy'),
(2, 'photo_2024-02-26_08-33-17.jpg', 'Ye Yint Aung', 'member', 7, 'Aircon', 'AungSan, Pyay, Bago', '09774284315', 'B.E(Electronic Engineering)                                ', 300000, 'busy'),
(3, 'photo_2024-02-26_08-33-26.jpg', 'Kyaw Linn Htet', 'Leader', 11, 'Tv', 'AungSan, Pyay, Bago', '09774284315', 'B.E                        ', 500000, 'busy'),
(4, 'photo_2024-02-26_08-37-51.jpg', 'Zwe Htet Naing', 'member', 9, 'Tv', 'AungSan, Pyay, Bago', '09774284315', 'B.E                            ', 300000, 'free'),
(5, 'photo_2024-02-26_08-33-23.jpg', 'Kyi Zin Ko', 'member', 8, 'Tv', 'AungSan, Pyay, Bago', '09774284315', 'B.E(Electronic Engineering)                                ', 300000, 'free'),
(6, 'photo_2024-02-26_08-37-56.jpg', 'Kyaw Lwin Oo', 'member', 7, 'Aircon', 'AungSan, Pyay, Bago', '09774284315', 'B.E(Electronic Engineering)                                ', 300000, 'free'),
(8, 'photo_2024-02-26_08-33-14.jpg', 'Aye Myint', 'Leader', 9, 'Refrigerator', 'Pyay', '09453725234', 'B.E(Electronic Engineering)                                ', 500000, 'free'),
(9, 'photo_2024-02-26_08-33-06.jpg', 'Naing Zaw Oo', 'Member', 4, 'Refrigerator', 'Pyay', '09876524562', 'B.E(Electronic Engineering)                                ', 300000, 'free'),
(10, 'photo_2024-02-26_08-37-47.jpg', 'Win Thant', 'Member', 5, 'Refrigerator', 'Pyay', '09654367656', 'B.E(Electronic Engineering)                                ', 300000, 'free'),
(12, 'photo_2024-02-26_08-33-10.jpg', 'ZweNaingAung', 'Leader', 18, 'WashingMachine', 'AungSan,Pyay ,Bago', '09683969003', '                                                      B.E(Electronic Engineering)                                                                                ', 500000, 'busy'),
(14, 'photo_2024-03-03_18-52-30.jpg', 'Aung', 'Member', 5, 'WashingMachine', 'Pyay', '09684535476', 'BE', 250000, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uid`, `name`, `img`, `address`, `phno`) VALUES
(1, 'Arkar Kyaw Thu', 'default-avatar.png', 'pyay', '09683969002'),
(2, 'Kyaw Linn Htet', '1170794.jpg', 'pyay', '0966723456'),
(3, 'MgYeYintAung', 'default-avatar.png', 'Pyay', '09698147391'),
(4, 'ArkarKyawThu', 'wp10.webp', 'Bago', '0971234456'),
(5, 'KhinSweKyaw', 'default-avatar.png', 'Pyay,Bago', '09698147391'),
(6, 'Zwe', 'default-avatar.png', 'Pyay', '09774284135'),
(7, 'arkargyi', 'default-avatar.png', ', Yangon', '09774284135');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_info`
--
ALTER TABLE `acc_info`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `service_hisory`
--
ALTER TABLE `service_hisory`
  ADD PRIMARY KEY (`shid`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_info`
--
ALTER TABLE `acc_info`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `service_hisory`
--
ALTER TABLE `service_hisory`
  MODIFY `shid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
