-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2020 pada 13.02
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwpp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `ID` int(255) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`ID`, `nip`, `time`) VALUES
(1, '23542112', '2020-11-18 14:37:56'),
(2, '23895776', '2020-11-18 15:07:10'),
(3, '89087234', '2020-11-19 02:31:59'),
(4, '12353423', '2020-11-19 02:35:04'),
(5, '128932', '2020-11-19 02:41:39'),
(8, '18040210', '2020-11-19 06:54:09'),
(9, '18040210', '2020-11-19 07:00:10'),
(10, '23895776', '2020-11-19 07:41:23'),
(11, '18040210', '2020-11-19 08:41:07'),
(12, '89087234', '2020-11-19 11:52:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `nip` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'nouser.png',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`ID`, `nip`, `name`, `email`, `phone`, `photo`, `created_on`, `active`) VALUES
(10, '1927896', 'Jhonson', 'Jhonson@gmail.com', '085701727153', 'walp11.jpg', '2020-11-17 03:07:05', 1),
(12, '10442995', 'Sintya Marisca', 'Marisca@gmail.com', '085701727153', 'sintya_marisca.jpg', '2020-11-17 03:25:03', 1),
(23, '89087234', 'Sintya Ainun', 'sintyaAinun@gmail.com', '085701727153', '15fdf87f45ca2243af98ff0af534f32e.jpg', '2020-11-17 23:01:23', 1),
(26, '18040210', 'Hilmi Adzin', 'hilmiadzinpratama@gmail.com', '082328139424', 'a67f3717f72b5e9863bda1009dc37126.png', '2020-11-17 23:37:13', 1),
(27, '1237625', 'Anggun Syafitri', 'anggun@gmail.com', '08765423422', '2333b77832f9cf3f721afbad21188734.jpg', '2020-11-17 23:47:30', 1),
(29, '23542112', 'Yammy Sama', 'yammysama407@gmail.com', '+6282328139424', 'd67e56ca3f60c6020a07a9463d17e506.png', '2020-11-18 05:42:53', 1),
(30, '1234563', 'jidol', 'jidol@gmail.com', '09878628362', 'nouser.png', '2020-11-18 10:33:22', 1),
(31, '23895776', 'Zahrul Azhari', 'zahrul@gmail.com', '09878628362', 'lasso1.jpg', '2020-11-18 10:46:58', 1),
(32, '128932', 'Aril Tatum', 'tatum@gmail.com', '089765646232', 'tatum.jpg', '2020-11-18 11:43:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('lo6me7cnsrg5gde124nk1o19bg1ljlg0', '::1', 1605768172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353736383137323b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030303a34343a3532223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('fjf6ln67tgu16cie8cov2cu2ci64b456', '::1', 1605768597, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353736383539373b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030303a34343a3532223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('8hio72975j8sl8ag36ab6ghac5nbp2ij', '::1', 1605768951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353736383935313b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030303a34343a3532223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b6e6f7469667c733a383a22426572686173696c223b5f5f63695f766172737c613a313a7b733a353a226e6f746966223b733a333a226f6c64223b7d),
('v3h5a0q45aqgo1rr9tborrl4aq42v0k8', '::1', 1605769210, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353736383935313b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030303a34343a3532223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b6e6f7469667c733a383a22426572686173696c223b5f5f63695f766172737c613a313a7b733a353a226e6f746966223b733a333a226f6c64223b7d),
('v548htscbvs1q2doppp24r6tqd4l9hiv', '::1', 1605770124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737303132343b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030373a33373a3134223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b6e6f7469667c733a37373a223c64697620636c6173733d22616c65727420616c6572742d737563636573732220726f6c653d22616c657274223e4461746120426572686173696c2044692055706461746520213c2f6469763e223b5f5f63695f766172737c613a313a7b733a353a226e6f746966223b733a333a226f6c64223b7d),
('dfe2pabccvaga8tp72chimqqejjlilfj', '::1', 1605771026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737313032363b),
('3a103l22o74cpuk4d32rtlg43gcp7lmr', '::1', 1605771629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737313632393b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a30323a3437223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('ld721reso3ku9g9p1guks0d7jpes52ii', '::1', 1605772098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737323039383b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a30323a3437223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b6e6f7469667c733a383a22426572686173696c223b5f5f63695f766172737c613a313a7b733a353a226e6f746966223b733a333a226f6c64223b7d),
('ij3gop3tbqi91cuff2u65iamg419f09p', '::1', 1605773302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737333330323b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a30323a3437223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b6e6f7468696e677c733a32343a224e697020416e646120546964616b20546572646166746172223b5f5f63695f766172737c613a313a7b733a373a226e6f7468696e67223b733a333a226f6c64223b7d),
('49ik5m0e31vidl76lahrn5cmqivbc5pj', '::1', 1605773636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737333633363b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a30323a3437223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('i2n5eju56qcfkrr8ugnonbkhsa0h2j8o', '::1', 1605775181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737353138313b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a30323a3437223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('6qlhj3f0a40int3d3qe2jdusp3cluvj3', '::1', 1605775813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737353831333b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a33303a3430223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('bn7joq202r55aabb4hqpjif6d9s1gbpd', '::1', 1605775923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353737353831333b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030383a33303a3430223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('lo1emmnho565aloofh45vsgftv3grr12', '::1', 1605787096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353738373039363b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030393a34313a3237223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b),
('89mmjv14iuke8bv6qrdq0ic5mteg0jot', '::1', 1605787096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630353738373039363b49447c733a323a223230223b757365726e616d657c733a353a2268696c6d69223b66756c6c5f6e616d657c733a31313a2248696c6d692041647a696e223b6c6f676765645f696e7c623a313b6163746976657c733a313a2231223b6c6173745f6c6f67696e7c733a31393a22323032302d31312d31392030393a34313a3237223b67726f75707c733a353a2261646d696e223b656d61696c7c733a32373a2268696c6d6961647a696e70726174616d6140676d61696c2e636f6d223b696d6167657c733a383a22666f746f2e706e67223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(75) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `group` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(64) NOT NULL DEFAULT 'nouser.png',
  `activation_code` varchar(40) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `username`, `full_name`, `group`, `password`, `email`, `phone`, `photo`, `activation_code`, `created_on`, `last_login`, `active`) VALUES
(20, 'hilmi', 'Hilmi Adzin', 'admin', '$2a$12$I4mmszkrb8mNPPsn1OR5NO2KjRIXhx0lgkJba6ynX0cs9r9t3jdNu', 'hilmiadzinpratama@gmail.com', '+6282328139424', 'foto.png', NULL, '2020-11-18 08:41:18', '2020-11-19 05:53:17', 1),
(21, 'niza', 'Niza Fadila', 'admin', '$2a$12$aoEEUEJVXdJ3JkR1II3QHOcNbWieVnVwlb0mQImye3mZOxphWpI9e', 'niza@gmail.com', '+6282328139424', 'marisca.jpg', NULL, '2020-11-18 10:37:58', '2020-11-18 10:38:35', 1),
(24, 'zahrul', 'Zahrul Azhari', 'admin', '$2a$12$Ac0xrJBVjp1eUe7A.RDdwe7aoudikc3xMYhNp8SK6/o.hBct.tJja', 'sahrul@gmail.com', '082328139424', 'lasso.jpg', NULL, '2020-11-18 10:45:16', '2020-11-18 05:40:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
