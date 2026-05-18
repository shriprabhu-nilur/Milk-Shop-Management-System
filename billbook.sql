-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 11:49 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `aud_id` int(10) NOT NULL,
  `aud_debit` varchar(200) NOT NULL,
  `aud_credit` varchar(200) NOT NULL,
  `aud_flag` int(10) NOT NULL,
  `aud_date` varchar(500) NOT NULL,
  `i_code` varchar(200) NOT NULL,
  `v_code` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pmode` int(10) NOT NULL,
  `chno` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`aud_id`, `aud_debit`, `aud_credit`, `aud_flag`, `aud_date`, `i_code`, `v_code`, `user_id`, `pmode`, `chno`) VALUES
(1, '5000', '', 1, '1561397045', '', '1', 1, 0, ''),
(2, '', '200', 1, '1567461600', '2019-Inv-1', '', 1, 1, ''),
(3, '2000', '', 1, '1574922183', '', '2', 1, 1, ''),
(4, '', '700', 1, '1572217200', '2019-Inv-2', '', 1, 1, ''),
(5, '30', '', 1, '1574922612', '', '3', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `cid` int(11) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `caddr` varchar(500) NOT NULL,
  `ccont` bigint(15) NOT NULL,
  `cdairy` varchar(200) NOT NULL,
  `cpass` varchar(255) NOT NULL,
  `ctime` varchar(200) NOT NULL,
  `cflag` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `cotp` varchar(500) NOT NULL,
  `cgno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`cid`, `cname`, `caddr`, `ccont`, `cdairy`, `cpass`, `ctime`, `cflag`, `user_id`, `cotp`, `cgno`) VALUES
(1, 'shinde madam', 'ekta nagar', 98765476543, '', '', '1561371814', 1, 1, 'edbc49a1c1dee6a9ada8e51f0f3e0a0b', ''),
(2, 'szszs', 'ssszs', 6754321111, '', '', '1574923172', 1, 1, 'e142dba4e893a6bc6ce43aebed1d4bc5', '987654321'),
(3, 'rajesh katare', 'solapur', 8007026979, 'rk@gmail.com', '', '1575034180', 1, 1, '8272735305fa204bd37d21fd829e6218', '4323'),
(4, 'Katare informatics', 'Solapur', 9876543211, '', '', '1575037387', 1, 1, '7c799788b5efdf1bae6b05d333d500dc', '27DJVPK0262H1ZW'),
(8, 'pooja', 'pune', 7262898946, 'abc', '$2y$10$586iSoCrjTUDDB5l.K49JOqBwvt9txGm13jx/RLWpoV96VTTNPrbK', '1769620575', 1, 1, 'a5ee6faeeac94ed02704ed6968096de1', 'girls hostel road');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `go_id` int(11) NOT NULL,
  `billno` varchar(100) NOT NULL,
  `go_flag` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `go_desc` varchar(500) NOT NULL,
  `go_cost` varchar(200) NOT NULL,
  `sid` int(10) NOT NULL,
  `go_rdesc` varchar(500) NOT NULL,
  `go_qty` bigint(15) NOT NULL,
  `go_rtot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`go_id`, `billno`, `go_flag`, `user_id`, `go_desc`, `go_cost`, `sid`, `go_rdesc`, `go_qty`, `go_rtot`) VALUES
(1, '2019-slip-1', 1, 1, 'Banarasi Saree', '350', 1, 'No.2150 catlog', 44, '15400'),
(2, '2019-slip-1', 1, 1, 'Sagarika/Anamika', '1400', 1, 'saree', 15, '21000'),
(3, '2019-slip-2', 1, 1, 'Parampara Pattu', '575', 1, 'Saree', 12, '6900'),
(4, '2019-slip-2', 1, 1, 'Sanjivan PAttu', '450', 1, 'Saree', 12, '5400'),
(5, '2019-slip-2', 1, 1, 'Organic Silk', '700', 1, 'Saree', 12, '8400'),
(6, '2019-slip-2', 1, 1, 'Bombay Beauty', '610', 1, 'Saree', 4, '2440'),
(7, '2019-slip-2', 1, 1, 'Delux mini', '525', 1, 'Saree', 2, '1050'),
(8, '2019-slip-2', 1, 1, 'Kerala Cotton', '320', 1, 'Saree', 1, '320'),
(9, '2019-slip-2', 1, 1, 'Kerala Cotton rich pallu', '450', 1, 'Saree', 1, '450'),
(10, '2019-slip-3', 1, 1, 'Saree', '230', 2, 'saree', 4, '920'),
(12, '2019-slip-3', 1, 1, 'Blouse Piece', '38', 2, 'Blouse Piece', 4, '152'),
(13, '2019-slip-3', 1, 1, 'Blouse Piece', '105', 2, 'Blouse Piece', 2, '210'),
(14, '2019-slip-3', 1, 1, 'Blouse Piece', '19', 2, 'Blouse Piece', 6, '114'),
(15, '2019-slip-3', 1, 1, 'Blouse Piece', '38', 2, 'Blouse Piece', 5, '190'),
(16, '2019-slip-4', 1, 1, 'Su. Saree', '201', 1, 'Akashdeep ', 4, '804'),
(19, '2019-slip-4', 1, 1, 'Banarasi Saree', '920', 1, 'No. 4040', 6, '5520'),
(20, '2019-slip-5', 1, 1, 'shirt  3', '120', 3, 'test', 30, '3600');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `i_id` int(11) NOT NULL,
  `i_code` varchar(100) NOT NULL,
  `i_desc` varchar(500) NOT NULL,
  `i_status` varchar(500) NOT NULL,
  `o_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `i_flag` int(5) NOT NULL,
  `i_total` varchar(500) NOT NULL,
  `i_gst` varchar(100) NOT NULL,
  `i_csg` varchar(100) NOT NULL,
  `i_advance` varchar(500) NOT NULL,
  `i_sdate` varchar(500) NOT NULL,
  `i_edate` varchar(500) NOT NULL,
  `i_bal` varchar(200) NOT NULL,
  `cid` int(10) NOT NULL,
  `outh` varchar(500) NOT NULL,
  `pmode` int(10) NOT NULL,
  `chno` varchar(500) NOT NULL,
  `trans` varchar(200) NOT NULL,
  `desti` varchar(200) NOT NULL,
  `lr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`i_id`, `i_code`, `i_desc`, `i_status`, `o_id`, `user_id`, `i_flag`, `i_total`, `i_gst`, `i_csg`, `i_advance`, `i_sdate`, `i_edate`, `i_bal`, `cid`, `outh`, `pmode`, `chno`, `trans`, `desti`, `lr`) VALUES
(1, '2019-Inv-1', '', 'Pending', 0, 1, 1, '6000', '0', 'na', '200', '1567461600', '', '5800', 1, 'fce71a92d7e7b32e566cf7ed82bb2919', 1, '', '323', 'test', '76'),
(2, '2019-Inv-2', '', 'Nill', 0, 1, 2, '700', '0', 'na', '700', '1572217200', '', 'Nill', 1, '7bdefb9050b3961e9d82e52074764be2', 1, '', '', '', ''),
(3, '2019-Inv-3', '', 'Pending', 0, 1, 1, '263', '12.5', 'i25', '0', '1572908400', '', '263', 2, '798bfbd5db9f142a9f560073b2b9836a', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `i_code` varchar(100) NOT NULL,
  `ord_flag` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ord_desc` varchar(500) NOT NULL,
  `ord_cost` varchar(200) NOT NULL,
  `cid` int(10) NOT NULL,
  `rdesc` varchar(500) NOT NULL,
  `qty` bigint(15) NOT NULL,
  `rtot` varchar(100) NOT NULL,
  `st_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `i_code`, `ord_flag`, `user_id`, `ord_desc`, `ord_cost`, `cid`, `rdesc`, `qty`, `rtot`, `st_id`) VALUES
(1, '2019-Inv-1', 1, 1, 'ST0010 Saree', '3000', 1, '2 saree', 2, '6000', 10),
(2, '2019-Inv-2', 1, 1, 'ST0020 shirt  3', '300', 1, '800', 1, '300', 20),
(3, '2019-Inv-2', 1, 1, 'ST001 Banarasi Saree', '200', 1, '500', 2, '400', 1),
(4, '2019-Inv-3', 1, 1, 'ST0012 Blouse Piece', '250', 2, 'geen 500', 1, '250', 12),
(5, '2019-Inv-4', 1, 1, 'ST0020 shirt  3', '200', 1, '800', 10, '2000', 20),
(6, '2026-Inv-4', 1, 1, 'ST002 Sagarika/Anamika', '123', 4, 'tt', 3, '369', 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `cid` int(10) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `cdate` varchar(255) NOT NULL,
  `flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`cid`, `pname`, `quantity`, `amount`, `cdate`, `flag`) VALUES
(8, 'Milk', 1, 67, '2026-02-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qc`
--

CREATE TABLE `qc` (
  `qc_id` int(10) NOT NULL,
  `qc_code` varchar(200) NOT NULL,
  `qc_name` varchar(200) NOT NULL,
  `e_mail` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` int(10) NOT NULL,
  `ad_id` int(10) NOT NULL,
  `qc_flag` smallint(10) NOT NULL,
  `qc_pass` text NOT NULL,
  `qc_dt` varchar(200) NOT NULL,
  `qc_salt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`qc_id`, `qc_code`, `qc_name`, `e_mail`, `address`, `contact`, `ad_id`, `qc_flag`, `qc_pass`, `qc_dt`, `qc_salt`) VALUES
(1, '6789', 'qc', 'qc@gmail.com', 'solapur', 123987654, 1, 1, '$2y$10$zGRowqnCHMhAVq6OrFoRo.0Ln69jluBgtL0QYgDgiteVmYvJN51eq', '1520118000', '04fe58fcc6a448eda0aaf3590c584252c5768a38b8a1b691909ef86cf3815cfa675ba128a1b52e373cd1880fb8f2772d11b9f61ca047ff5e9f8936d4fcba17d4');

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE `slip` (
  `sl_id` int(11) NOT NULL,
  `sl_code` varchar(100) NOT NULL,
  `inno` varchar(100) NOT NULL,
  `iondate` varchar(200) NOT NULL,
  `lrno` varchar(100) NOT NULL,
  `gtotal` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `sl_flag` int(10) NOT NULL,
  `outh` varchar(500) NOT NULL,
  `sl_bal` varchar(100) NOT NULL,
  `gst` int(10) NOT NULL,
  `dis` varchar(100) NOT NULL,
  `taxamt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slip`
--

INSERT INTO `slip` (`sl_id`, `sl_code`, `inno`, `iondate`, `lrno`, `gtotal`, `user_id`, `sid`, `sl_flag`, `outh`, `sl_bal`, `gst`, `dis`, `taxamt`) VALUES
(1, '2019-slip-1', '450', '1560902400', '', '38220', 1, 1, 1, '340512e929a50f49f7e616eb390fdc9e', '38220', 25, '', '36400'),
(2, '2019-slip-2', '451', '1560902400', '', '26208', 1, 1, 1, 'dd12ee03bbca18e245af69e2f23a3262', '26208', 25, '', '24960'),
(3, '2019-slip-3', '156', '1561334400', '', '1586', 1, 2, 1, '3bc0aae9dee6b4810285b68fa6205d27', '1586', 0, '', '1586'),
(4, '2019-slip-4', '348', '1556496000', '', '6640', 1, 1, 1, 'cd69dffad770de2ce8de39934550245a', '6640', 25, '', '6324'),
(5, '2019-slip-5', '432221', '1574290800', '', '3780', 1, 3, 1, '597ea31caffca944e5a59601f14c7ed7', '1780', 5, '', '3600');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `st_id` int(11) NOT NULL,
  `billno` varchar(100) NOT NULL,
  `st_flag` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `st_desc` varchar(500) NOT NULL,
  `st_cost` varchar(200) NOT NULL,
  `st_profitcost` varchar(100) NOT NULL,
  `sid` int(10) NOT NULL,
  `st_rdesc` varchar(500) NOT NULL,
  `st_qty` bigint(15) NOT NULL,
  `st_rtot` varchar(100) NOT NULL,
  `st_sell` int(11) NOT NULL,
  `dam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`st_id`, `billno`, `st_flag`, `user_id`, `st_desc`, `st_cost`, `st_profitcost`, `sid`, `st_rdesc`, `st_qty`, `st_rtot`, `st_sell`, `dam`) VALUES
(1, '2019-slip-1', 1, 1, 'Banarasi Saree', '350', '360.5', 1, 'No.2150 catlog', 44, '15400', 42, 0),
(2, '2019-slip-1', 1, 1, 'Sagarika/Anamika', '1400', '1442', 1, 'saree', 15, '21000', 12, 0),
(3, '2019-slip-2', 1, 1, 'Parampara Pattu', '575', '592.25', 1, 'Saree', 12, '6900', 12, 0),
(4, '2019-slip-2', 1, 1, 'Sanjivan PAttu', '450', '463.5', 1, 'Saree', 12, '5400', 12, 0),
(5, '2019-slip-2', 1, 1, 'Organic Silk', '700', '721', 1, 'Saree', 12, '8400', 12, 0),
(6, '2019-slip-2', 1, 1, 'Bombay Beauty', '610', '628.3', 1, 'Saree', 4, '2440', 4, 0),
(7, '2019-slip-2', 1, 1, 'Delux mini', '525', '540.75', 1, 'Saree', 2, '1050', 2, 0),
(8, '2019-slip-2', 1, 1, 'Kerala Cotton', '320', '329.6', 1, 'Saree', 1, '320', 1, 0),
(9, '2019-slip-2', 1, 1, 'Kerala Cotton rich pallu', '450', '463.5', 1, 'Saree', 1, '450', 1, 0),
(10, '2019-slip-3', 1, 1, 'Saree', '230', '236.9', 2, 'saree', 4, '920', 2, 0),
(12, '2019-slip-3', 1, 1, 'Blouse Piece', '38', '39.14', 2, 'Blouse Piece', 4, '152', 3, 0),
(13, '2019-slip-3', 1, 1, 'Blouse Piece', '105', '108.15', 2, 'Blouse Piece', 2, '210', 2, 0),
(14, '2019-slip-3', 1, 1, 'Blouse Piece', '19', '19.57', 2, 'Blouse Piece', 6, '114', 6, 0),
(15, '2019-slip-3', 1, 1, 'Blouse Piece', '38', '39.14', 2, 'Blouse Piece', 5, '190', 5, 0),
(16, '2019-slip-4', 1, 1, 'Su. Saree', '201', '207.03', 1, 'Akashdeep ', 4, '804', 4, 0),
(19, '2019-slip-4', 1, 1, 'Banarasi Saree', '920', '947.6', 1, 'No. 4040', 6, '5520', 6, 0),
(20, '2019-slip-5', 1, 1, 'shirt  3', '120', '123.6', 3, 'test', 30, '3600', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supp`
--

CREATE TABLE `supp` (
  `sid` int(11) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `saddr` varchar(500) NOT NULL,
  `scont` bigint(15) NOT NULL,
  `sgno` varchar(500) NOT NULL,
  `stime` varchar(200) NOT NULL,
  `sflag` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sotp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supp`
--

INSERT INTO `supp` (`sid`, `sname`, `saddr`, `scont`, `sgno`, `stime`, `sflag`, `user_id`, `sotp`) VALUES
(1, 'Rachana Sarees', '''Padmashri 480'',West mangarvar peth,chati galli,solapur', 2172623685, '27CBXPM1638N1ZR', '1561370989', 1, 1, '46d6ed3bc7e9ed98498d4a3c2fa43600'),
(2, 'Raychand Bhikamchand', 'Bihani Market,Phaltan galli,Solapur', 2172324460, '27ABHPG2156R1Z8', '1561396310', 1, 1, '88b96a46c98a9b4e79c5df98e9d74a40'),
(3, 'bal mukund', 'solapur', 9876543211, '987654323345', '1574922001', 1, 1, 'a9136f73169717a40f2eb0e312f60b6a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`, `salt`) VALUES
(1, 'admin', 'it@rekhasarees.com', '$2y$10$KVMrz0AjkXECkuPS3IsRqenmoO.IYyU2.A0947rfrJfX9u.nQam8e', '2017-09-06 10:59:50', '2a8b9ce76a5204f68d914285ba3e38d7bde5a5caa35af015b0e2becf1a4bd8f4b0906fedf8943d1aaf82f4a916a4b2f51ceeef1e081cf026d39da4471bc519f1');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(250) NOT NULL,
  `v_desc` varchar(500) NOT NULL,
  `v_date` varchar(50) NOT NULL,
  `v_amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `v_flag` int(5) NOT NULL,
  `vby` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`v_id`, `v_name`, `v_desc`, `v_date`, `v_amount`, `user_id`, `v_flag`, `vby`) VALUES
(1, 'K.Khanchand', 'Bill Pay', '1561397045', 5000, 1, 1, 'Rekha Katare'),
(2, '2019-slip-5', '2019-slip-5', '1574922183', 2000, 1, 1, 'Rchana sarees'),
(3, 'cha', 'tet', '1574922612', 30, 1, 1, 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`aud_id`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`go_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `qc`
--
ALTER TABLE `qc`
  ADD PRIMARY KEY (`qc_id`);

--
-- Indexes for table `slip`
--
ALTER TABLE `slip`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `supp`
--
ALTER TABLE `supp`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `aud_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `go_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `qc`
--
ALTER TABLE `qc`
  MODIFY `qc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slip`
--
ALTER TABLE `slip`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `supp`
--
ALTER TABLE `supp`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
