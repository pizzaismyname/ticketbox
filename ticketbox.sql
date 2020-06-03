-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2020 at 11:39 
-- Server version: 5.7.28-0ubuntu0.19.04.2
-- PHP Version: 7.2.24-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` char(36) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `username`, `password_hash`) VALUES
('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'pristizahara', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` char(36) NOT NULL,
  `status` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `id_committee` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

-- INSERT INTO `reservations` (`id`, `status`, `customer_name`, `customer_email`, `id_committee`) VALUES
-- ('00359124-d7c7-409e-ad30-8c75f4c7a2b7', 'VERIFIED', 'Pristi Zahara', 'pristizzz@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
-- ('1bc7cc54-49e6-47ab-a736-ee06c474427e', 'PENDING', 'Joko Widodo', 'jokowi@gmail.com', NULL),
-- ('65224c99-83e5-4815-9a01-e3593b848f16', 'PENDING', 'Adi', 'adi@gmail.com', NULL),
-- ('9834b907-2a3c-412b-abd7-119e473d1cba', 'PENDING', 'Adi', 'adi@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `code` char(36) NOT NULL,
  `id_ticket_category` char(36) NOT NULL,
  `id_reservation` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

-- INSERT INTO `tickets` (`code`, `id_ticket_category`, `id_reservation`) VALUES
-- ('afb9b5e8-3fb1-4114-811c-5236e02a012a', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('0c59725c-d1f0-4316-bf8d-8d629f4bd9bc', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('c1e3dc13-0ed8-4ca9-8e57-5f8a03f7fbde', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('c19aafb0-f7a8-49d1-b26b-b8e0a4ce8871', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('17a60978-df4b-4134-9cec-5701bab77d4d', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('45e944d6-209c-43fc-8cd3-0422d7da02ea', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('1465310d-791f-4027-b794-1f2ccad15620', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('1f4afe77-8826-4d81-a913-891407fa6606', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('35fcabb5-425b-403f-b977-ec3fc9edc9ef', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('5c22ef0e-a2c2-4a57-bd61-cbcb0678d3ca', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('afb9b5e8-3fb1-4114-811c-5236e02a012a', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('0c59725c-d1f0-4316-bf8d-8d629f4bd9bc', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('c1e3dc13-0ed8-4ca9-8e57-5f8a03f7fbde', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('c19aafb0-f7a8-49d1-b26b-b8e0a4ce8871', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('17a60978-df4b-4134-9cec-5701bab77d4d', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('45e944d6-209c-43fc-8cd3-0422d7da02ea', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('1465310d-791f-4027-b794-1f2ccad15620', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('1f4afe77-8826-4d81-a913-891407fa6606', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('35fcabb5-425b-403f-b977-ec3fc9edc9ef', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('5c22ef0e-a2c2-4a57-bd61-cbcb0678d3ca', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '00359124-d7c7-409e-ad30-8c75f4c7a2b7'),
-- ('735a41fc-6bb0-46fc-ac64-4fc67371927e', 'ff2ed337-0a7f-40ea-be1b-b6596b86a2be', '1bc7cc54-49e6-47ab-a736-ee06c474427e'),
-- ('6ddfc7fa-9902-4982-abc1-e9e58b818730', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '9834b907-2a3c-412b-abd7-119e473d1cba'),
-- ('32f1369d-c1fa-48ea-9107-0aab15c03686', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '9834b907-2a3c-412b-abd7-119e473d1cba'),
-- ('cca50d23-5546-440e-b841-5be0b9f2203a', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '65224c99-83e5-4815-9a01-e3593b848f16'),
-- ('47cda22c-5cfe-40e4-839f-42f9d7b81e9b', '0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', '65224c99-83e5-4815-9a01-e3593b848f16');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` char(36) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `type`, `price`, `total_amount`) VALUES
('0bb60ad8-ce10-42ad-9a9a-81094c52d5dc', 'Regular', 50000, 500),
('ff2ed337-0a7f-40ea-be1b-b6596b86a2be', 'VIP', 100000, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_committee` (`id_committee`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`code`, `id_ticket_category`),
  ADD KEY `id_ticket_category` (`id_ticket_category`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_committee`) REFERENCES `committees` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_ticket_category`) REFERENCES `ticket_categories` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`id_reservation`) REFERENCES `reservations` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
