-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 29, 2023 at 11:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursework2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetEmployeesWithBirthday` ()   BEGIN
    SELECT * FROM employees
    WHERE MONTH(STR_TO_DATE(dob, '%d/%m/%Y')) = MONTH(CURDATE());
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `employee_id` varchar(20) NOT NULL,
  `route_name` varchar(20) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `employee_id` varchar(20) NOT NULL,
  `vehicel_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_number` varchar(255) NOT NULL,
  `date_of_complaint` datetime NOT NULL,
  `complaint_name` varchar(20) NOT NULL,
  `hr_emplyoee_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `headoffice_location` varchar(20) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `manager_id` varchar(20) NOT NULL,
  `number_of_employees` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_name_number`
--

CREATE TABLE `department_name_number` (
  `department_name` varchar(20) NOT NULL,
  `department_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `employee_id` varchar(20) NOT NULL,
  `hours_per_week` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `employee_id` varchar(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `nin` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `emergency_name` varchar(20) NOT NULL,
  `emergency_relationship` varchar(20) NOT NULL,
  `emergency_phone` varchar(20) NOT NULL,
  `manager_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `name`, `address`, `salary`, `dob`, `nin`, `department`, `emergency_name`, `emergency_relationship`, `emergency_phone`, `manager_name`) VALUES
('07-4517183', 'Laim Jeong', '38 Hulme High Street', '£33,027.23', '16/05/2002', 'lj123456k', 'Packager', 'Jaeyoung Kim', 'Boy Friend', '07231 462 728', 'Jaeyoung Kim'),
('11-1111111', 'Jaeyoung Kim', '58 Hulme High Street', '£18,424.03', '31/01/2001', 'pk152291r', 'HR', 'Laim', 'Girl Friend', '07442 983 368', 'Jun Han'),
('12-1546789', 'Minsung Kang', '11 Hulme High Street', '£33,397.56', '21/11/1989', 'mk172291d', 'Packager', 'Junho Kim', 'Mother', '07145 326 847', 'Jaeyoung Kim'),
('32-1548971', 'David', '10 Hulme High Street', '£47,424.03', '28/04/1972', 'fd123456k', 'Driver', 'Alex', 'Father', '07423 988 254', 'Jaeyoung Kim'),
('54-2154975', 'Dain Kim', '9 Hulme High Street', '£11,424.03', '11/11/1999', 'ke152291r', 'Driver', 'Taeseung Yoo', 'Father', '07487 254 879', 'Jaeyoung Kim');

--
-- Triggers `employees`
--
DELIMITER $$
CREATE TRIGGER `after_employee_deletion` AFTER DELETE ON `employees` FOR EACH ROW BEGIN
    INSERT INTO log (emp_id, deleted_date, deleted_time)
    VALUES (OLD.emp_id, CURDATE(), CURTIME());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employees`
--

CREATE TABLE `hr_employees` (
  `employee_id` varchar(20) NOT NULL,
  `office_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `emp_id` varchar(20) NOT NULL,
  `deleted_date` date NOT NULL,
  `deleted_time` time NOT NULL,
  `manager_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`emp_id`, `deleted_date`, `deleted_time`, `manager_id`) VALUES
('55-3623151', '2023-11-29', '09:48:27', '11-1111111'),
('71-7374760', '2023-11-29', '09:52:47', '11-1111111');

-- --------------------------------------------------------

--
-- Table structure for table `management_employees`
--

CREATE TABLE `management_employees` (
  `employee_id` varchar(20) NOT NULL,
  `office_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `emp_id` varchar(20) NOT NULL,
  `emp_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`emp_id`, `emp_password`) VALUES
('11-1111111', '$2y$10$8X7lW0kvqMnybV1.eIZ8pezU8H6E2hkrL5WyAKQypbJY6weiZL3zq');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` varchar(20) NOT NULL,
  `area_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `order_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(20) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `customer_fullname` varchar(20) NOT NULL,
  `customer_email` varchar(20) NOT NULL,
  `postal_location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packagers`
--

CREATE TABLE `packagers` (
  `employee_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity_in_warehouse` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reasons for complaints`
--

CREATE TABLE `reasons for complaints` (
  `complaint_number` varchar(255) NOT NULL,
  `reason_for_complaint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reported_drivers`
--

CREATE TABLE `reported_drivers` (
  `employee_id` varchar(20) NOT NULL,
  `warehouse_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reported_packagers`
--

CREATE TABLE `reported_packagers` (
  `employee_id` varchar(20) NOT NULL,
  `warehouse_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_name` varchar(20) NOT NULL,
  `start_location` varchar(20) NOT NULL,
  `end_location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stop_id` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `arrival_time` datetime NOT NULL,
  `route_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_operating_areas`
--

CREATE TABLE `vehicle_operating_areas` (
  `vehicle_id` varchar(20) NOT NULL,
  `operating_area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `purpose` varchar(20) NOT NULL,
  `area_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses_located_area`
--

CREATE TABLE `warehouses_located_area` (
  `warehouse_location` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_products`
--

CREATE TABLE `warehouse_products` (
  `warehouse_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD PRIMARY KEY (`employee_id`,`route_name`),
  ADD KEY `route_name` (`route_name`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_name`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`employee_id`,`vehicel_id`),
  ADD KEY `vehicel_id` (`vehicel_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_number`),
  ADD KEY `hr_emplyoee_number` (`hr_emplyoee_number`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`headoffice_location`,`department_name`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `department_name_number`
--
ALTER TABLE `department_name_number`
  ADD PRIMARY KEY (`department_name`,`department_number`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `hr_employees`
--
ALTER TABLE `hr_employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `office_id` (`office_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `management_employees`
--
ALTER TABLE `management_employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `office_id` (`office_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `area_name` (`area_name`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `packagers`
--
ALTER TABLE `packagers`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reasons for complaints`
--
ALTER TABLE `reasons for complaints`
  ADD PRIMARY KEY (`complaint_number`);

--
-- Indexes for table `reported_drivers`
--
ALTER TABLE `reported_drivers`
  ADD PRIMARY KEY (`employee_id`,`warehouse_id`),
  ADD KEY `warehouse_id` (`warehouse_id`);

--
-- Indexes for table `reported_packagers`
--
ALTER TABLE `reported_packagers`
  ADD PRIMARY KEY (`employee_id`,`warehouse_id`),
  ADD KEY `warehouse_id` (`warehouse_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_name`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`stop_id`),
  ADD KEY `route_name` (`route_name`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_operating_areas`
--
ALTER TABLE `vehicle_operating_areas`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`),
  ADD KEY `area_name` (`area_name`);

--
-- Indexes for table `warehouses_located_area`
--
ALTER TABLE `warehouses_located_area`
  ADD PRIMARY KEY (`warehouse_location`),
  ADD KEY `area` (`area`);

--
-- Indexes for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD PRIMARY KEY (`warehouse_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocate`
--
ALTER TABLE `allocate`
  ADD CONSTRAINT `allocate_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `drivers` (`employee_id`),
  ADD CONSTRAINT `allocate_ibfk_2` FOREIGN KEY (`route_name`) REFERENCES `routes` (`route_name`);

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `drivers` (`employee_id`),
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`vehicel_id`) REFERENCES `vehicles` (`vehicle_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`hr_emplyoee_number`) REFERENCES `hr_employees` (`employee_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`emp_id`);

--
-- Constraints for table `hr_employees`
--
ALTER TABLE `hr_employees`
  ADD CONSTRAINT `hr_employees_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `offices` (`office_id`);

--
-- Constraints for table `management_employees`
--
ALTER TABLE `management_employees`
  ADD CONSTRAINT `management_employees_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `offices` (`office_id`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`area_name`) REFERENCES `areas` (`area_name`);

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `ordered_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `reported_drivers`
--
ALTER TABLE `reported_drivers`
  ADD CONSTRAINT `reported_drivers_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `drivers` (`employee_id`),
  ADD CONSTRAINT `reported_drivers_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`);

--
-- Constraints for table `reported_packagers`
--
ALTER TABLE `reported_packagers`
  ADD CONSTRAINT `reported_packagers_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `packagers` (`employee_id`),
  ADD CONSTRAINT `reported_packagers_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`);

--
-- Constraints for table `stops`
--
ALTER TABLE `stops`
  ADD CONSTRAINT `stops_ibfk_1` FOREIGN KEY (`route_name`) REFERENCES `routes` (`route_name`);

--
-- Constraints for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `warehouses_ibfk_1` FOREIGN KEY (`area_name`) REFERENCES `areas` (`area_name`);

--
-- Constraints for table `warehouses_located_area`
--
ALTER TABLE `warehouses_located_area`
  ADD CONSTRAINT `warehouses_located_area_ibfk_1` FOREIGN KEY (`area`) REFERENCES `warehouses` (`area_name`);

--
-- Constraints for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD CONSTRAINT `warehouse_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `warehouse_products_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
