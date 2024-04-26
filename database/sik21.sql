-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 07:16 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sik21`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(100) NOT NULL,
  `us_admin` varchar(50) NOT NULL,
  `ps_admin` varchar(225) NOT NULL,
  `rl_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nm_admin`, `us_admin`, `ps_admin`, `rl_admin`) VALUES
(1, 'Kang Mahmud', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Asih', 'admin', '2254f297a57a5a743894a0e4a801fc3', '123'),

-- --------------------------------------------------------

--
-- Table structure for table `tb_formatskl`
--

CREATE TABLE `tb_formatskl` (
  `id_formatskl` int(11) NOT NULL,
  `tp_formatskl` varchar(100) NOT NULL,
  `tg_formatskl` varchar(100) NOT NULL,
  `fr_formatskl` varchar(100) NOT NULL,
  `bl_formatskl` varchar(20) NOT NULL,
  `th_formatskl` varchar(20) NOT NULL,
  `st_formatskl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_formatskl`
--

INSERT INTO `tb_formatskl` (`id_formatskl`, `tp_formatskl`, `tg_formatskl`, `fr_formatskl`, `bl_formatskl`, `th_formatskl`, `st_formatskl`) VALUES
(1, 'Tebo', '2021-04-07', 'MA/RM/PP.0.06/', 'V', '2021', 'Diterbitkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nm_jurusan` varchar(100) NOT NULL,
  `si_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nm_jurusan`, `si_jurusan`) VALUES
(19, 'Ilmu Pengetahuan Alam', 'IPA'),
(20, 'Ilmu Pengetahuan Sosial', 'IPS'),
(21, 'Keagamaan', 'Keagamaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nm_kelas` varchar(50) NOT NULL,
  `jr_kelas` varchar(50) NOT NULL,
  `st_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nm_kelas`, `jr_kelas`, `st_kelas`) VALUES
(36, 'XII IPA 1', 'IPA', 'Aktif'),
(37, 'XII IPA 2', 'IPA', 'Aktif'),
(38, 'XII IPS', 'IPS', 'Aktif'),
(39, 'XII MAK', 'Keagamaan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelmapel`
--

CREATE TABLE `tb_kelmapel` (
  `id_kelmapel` int(11) NOT NULL,
  `nm_kelmapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelmapel`
--

INSERT INTO `tb_kelmapel` (`id_kelmapel`, `nm_kelmapel`) VALUES
(7, 'Kelompok A ( Wajib )'),
(3, 'Kelompok B ( Wajib )'),
(4, 'Kelompok C ( Peminatan )'),
(5, 'Kelompok D ( Pendalaman Minat )'),
(6, 'Muatan Lokal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelulusan`
--

CREATE TABLE `tb_kelulusan` (
  `id_kelulusan` int(11) NOT NULL,
  `tg_kelulusan` varchar(50) NOT NULL,
  `tp_kelulusan` varchar(50) NOT NULL,
  `wm_kelulusan` varchar(20) NOT NULL,
  `ws_kelulusan` varchar(20) NOT NULL,
  `zw_kelulusan` varchar(10) NOT NULL,
  `ns_kelulusan` varchar(100) NOT NULL,
  `tb_kelulusan` varchar(20) NOT NULL,
  `st_kelulusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelulusan`
--

INSERT INTO `tb_kelulusan` (`id_kelulusan`, `tg_kelulusan`, `tp_kelulusan`, `wm_kelulusan`, `ws_kelulusan`, `zw_kelulusan`, `ns_kelulusan`, `tb_kelulusan`, `st_kelulusan`) VALUES
(1, '2021-07-05', 'Tebo', '09:02', '12:01', 'WIB', 'MA/RM/PP.0.06/781/VII/2021', '2021-07-05', 'Dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id_log` int(11) NOT NULL,
  `nm_log` varchar(200) NOT NULL,
  `wk_log` varchar(200) NOT NULL,
  `rl_log` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `st_maintenance` varchar(50) NOT NULL,
  `ps_maintenance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`id_maintenance`, `st_maintenance`, `ps_maintenance`) VALUES
(1, 'Tidak Aktif', 'Saat ini aplikasi sedang dalam proses perbaikan, silahkan tunggu beberapa saat..');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `nm_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nm_mapel`) VALUES
('AA', 'Akidah Akhlaq'),
('AQH', 'Al Quran Hadits'),
('FQ', 'Fiqih'),
('PJOK', 'Pendidikan Jasmani Olahraga dan Kesehatan'),
('SJR', 'Sejarah'),
('SKI', 'Sejarah Kebudayaan Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mmapel`
--

CREATE TABLE `tb_mmapel` (
  `id_mmapel` int(11) NOT NULL,
  `jr_mmapel` varchar(50) NOT NULL,
  `mp_mmapel` varchar(100) NOT NULL,
  `kl_mmapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mmapel`
--

INSERT INTO `tb_mmapel` (`id_mmapel`, `jr_mmapel`, `mp_mmapel`, `kl_mmapel`) VALUES
(21, 'IPS', 'Al Quran Hadits', 'Kelompok A ( Wajib )'),
(22, 'IPS', 'Akidah Akhlaq', 'Kelompok A ( Wajib )'),
(23, 'IPS', 'Fiqih', 'Kelompok A ( Wajib )'),
(24, 'IPS', 'Sejarah Kebudayaan Islam', 'Kelompok A ( Wajib )'),
(25, 'IPS', 'Sejarah', 'Kelompok B ( Wajib )'),
(26, 'IPS', 'Pendidikan Jasmani Olahraga dan Kesehatan', 'Kelompok B ( Wajib )');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `jr_nilai` varchar(50) NOT NULL,
  `kl_nilai` varchar(50) NOT NULL,
  `mp_nilai` varchar(100) NOT NULL,
  `km_nilai` varchar(100) NOT NULL,
  `nm_nilai` varchar(100) NOT NULL,
  `nr_nilai` varchar(5) NOT NULL,
  `nu_nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `st_pengumuman` varchar(50) NOT NULL,
  `ps_pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id_pengumuman`, `st_pengumuman`, `ps_pengumuman`) VALUES
(1, 'Tidak Aktif', 'Pengumuman kelulusan akan dilaksanakan pada tanggal 20 Mei 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nm_sekolah` varchar(100) NOT NULL,
  `kp_sekolah` varchar(50) NOT NULL,
  `nk_sekolah` varchar(50) NOT NULL,
  `lg_sekolah` varchar(225) NOT NULL,
  `ks_sekolah` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nm_sekolah`, `kp_sekolah`, `nk_sekolah`, `lg_sekolah`, `ks_sekolah`) VALUES
(1, 'MAS Raudhatul Mujawwidin', 'H. Suyatno, S.Pd.', '-', 'Logo-1617812042.png', 'Kop-1618411977.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `kl_siswa` varchar(50) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `jr_siswa` varchar(50) NOT NULL,
  `tm_siswa` varchar(50) NOT NULL,
  `tg_siswa` varchar(50) NOT NULL,
  `ni_siswa` varchar(10) NOT NULL,
  `ns_siswa` varchar(12) NOT NULL,
  `np_siswa` varchar(50) NOT NULL,
  `ft_siswa` varchar(225) NOT NULL,
  `nu_siswa` varchar(50) NOT NULL,
  `st_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `kl_siswa`, `nm_siswa`, `jr_siswa`, `tm_siswa`, `tg_siswa`, `ni_siswa`, `ns_siswa`, `np_siswa`, `ft_siswa`, `nu_siswa`, `st_siswa`) VALUES
(3, 'XII IPA 1', 'Ahmad Maulana', 'IPA', 'Jambi', '2005-02-01', '888', '3201122311', '03-10-09-027-001-1', 'Foto-1618840484.png', '001', 'Lulus'),
(4, 'XII IPA 1', 'Dewi Mulyani', 'IPA', 'Jambi', '2005-02-02', '889', '3201122312', '03-10-09-027-001-2', 'Foto-1618840473.jpg', '002', 'Lulus'),
(5, 'XII IPA 1', 'Fajar Alamsyah', 'IPA', 'Jambi', '2005-02-03', '890', '3201122313', '03-10-09-027-001-3', 'Foto-1618840464.jpg', '003', 'Lulus'),
(6, 'XII IPA 1', 'Indri Novita', 'IPA', 'Jambi', '2005-02-04', '891', '3201122314', '03-10-09-027-001-4', 'Foto-1618840450.jpg', '004', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` int(11) NOT NULL,
  `nm_tahun` varchar(20) NOT NULL,
  `sm_tahun` varchar(50) NOT NULL,
  `st_tahun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `nm_tahun`, `sm_tahun`, `st_tahun`) VALUES
(2, '2021/2022', 'Genap', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `us_user` varchar(50) NOT NULL,
  `ps_user` varchar(225) NOT NULL,
  `rl_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `us_user`, `ps_user`, `rl_user`) VALUES
(3, 'Ahmad Maulana', '1001', 'b8c37e33defde51cf91e1e03e51657da', 'Siswa'),
(4, 'Dewi Mulyani', '1002', 'fba9d88164f3e2d9109ee770223212a0', 'Siswa'),
(5, 'Fajar Alamsyah', '1003', 'aa68c75c4a77c87f97fb686b2f068676', 'Siswa'),
(6, 'Indri Novita', '1004', 'fed33392d3a48aa149a87a38b875ba4a', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `us_user` (`us_admin`),
  ADD KEY `nm_user` (`nm_admin`);

--
-- Indexes for table `tb_formatskl`
--
ALTER TABLE `tb_formatskl`
  ADD PRIMARY KEY (`id_formatskl`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `nm_jurusan` (`si_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nm_kelas` (`nm_kelas`),
  ADD KEY `jr_kelas` (`jr_kelas`);

--
-- Indexes for table `tb_kelmapel`
--
ALTER TABLE `tb_kelmapel`
  ADD PRIMARY KEY (`id_kelmapel`),
  ADD KEY `nm_jurusan` (`nm_kelmapel`);

--
-- Indexes for table `tb_kelulusan`
--
ALTER TABLE `tb_kelulusan`
  ADD PRIMARY KEY (`id_kelulusan`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD UNIQUE KEY `id_mapel` (`id_mapel`),
  ADD KEY `nm_mapel` (`nm_mapel`);

--
-- Indexes for table `tb_mmapel`
--
ALTER TABLE `tb_mmapel`
  ADD PRIMARY KEY (`id_mmapel`),
  ADD KEY `mp_mmapel` (`mp_mmapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nm_nilai` (`nm_nilai`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `ni_siswa` (`ni_siswa`),
  ADD UNIQUE KEY `ns_siswa` (`ns_siswa`),
  ADD KEY `kl_siswa` (`kl_siswa`),
  ADD KEY `nm_siswa` (`nm_siswa`);

--
-- Indexes for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `us_user` (`us_user`),
  ADD KEY `nm_user` (`nm_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_formatskl`
--
ALTER TABLE `tb_formatskl`
  MODIFY `id_formatskl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_kelmapel`
--
ALTER TABLE `tb_kelmapel`
  MODIFY `id_kelmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kelulusan`
--
ALTER TABLE `tb_kelulusan`
  MODIFY `id_kelulusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mmapel`
--
ALTER TABLE `tb_mmapel`
  MODIFY `id_mmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`jr_kelas`) REFERENCES `tb_jurusan` (`si_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mmapel`
--
ALTER TABLE `tb_mmapel`
  ADD CONSTRAINT `tb_mmapel_ibfk_1` FOREIGN KEY (`mp_mmapel`) REFERENCES `tb_mapel` (`nm_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`nm_nilai`) REFERENCES `tb_siswa` (`nm_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`kl_siswa`) REFERENCES `tb_kelas` (`nm_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`nm_user`) REFERENCES `tb_siswa` (`nm_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
