-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 10 Des 2025 pada 02.45
-- Versi server: 5.7.39
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simontoran_muaraenim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Superadmin Group'),
(5, 'petugas register', ''),
(6, 'verifikator 1', ''),
(7, 'verifikator 2', ''),
(8, 'ppk skpd', ''),
(9, 'bpp bagian', ''),
(10, 'bendahara gaji', ''),
(11, 'petugas administrasi keuangan', ''),
(12, 'pptk', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_login_attempts`
--

INSERT INTO `aauth_login_attempts` (`id`, `ip_address`, `timestamp`, `login_attempts`) VALUES
(222, '182.4.134.11', '2024-07-31 09:24:56', 1),
(242, '182.4.134.11', '2024-07-31 09:33:25', 1),
(944, '103.93.93.146', '2024-11-17 18:21:03', 1),
(1003, '103.139.188.65', '2024-11-28 12:06:13', 2),
(1273, '182.1.105.77', '2025-02-09 18:14:22', 1),
(1279, '103.139.188.65', '2025-02-10 08:13:07', 1),
(2393, '103.139.188.65', '2025-07-16 14:01:39', 1),
(2127, '182.2.69.148', '2025-06-16 10:07:44', 1),
(2705, '180.248.14.245', '2025-08-23 16:08:10', 2),
(2892, '202.58.72.65', '2025-09-13 17:59:28', 3),
(2904, '103.139.188.65', '2025-09-15 09:43:39', 1),
(2978, '182.1.19.150', '2025-09-23 19:48:11', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_perms`
--

INSERT INTO `aauth_perms` (`id`, `name`, `definition`) VALUES
(1, 'menu_dashboard', NULL),
(2, 'menu_crud_builder', NULL),
(3, 'menu_api_builder', NULL),
(4, 'menu_page_builder', NULL),
(5, 'menu_form_builder', NULL),
(6, 'menu_menu', NULL),
(7, 'menu_auth', NULL),
(8, 'menu_user', NULL),
(9, 'menu_group', NULL),
(10, 'menu_access', NULL),
(11, 'menu_permission', NULL),
(12, 'menu_api_documentation', NULL),
(13, 'menu_web_documentation', NULL),
(14, 'menu_settings', NULL),
(15, 'user_list', NULL),
(16, 'user_update_status', NULL),
(17, 'user_export', NULL),
(18, 'user_add', NULL),
(19, 'user_update', NULL),
(20, 'user_update_profile', NULL),
(21, 'user_update_password', NULL),
(22, 'user_profile', NULL),
(23, 'user_view', NULL),
(24, 'user_delete', NULL),
(25, 'blog_list', NULL),
(26, 'blog_export', NULL),
(27, 'blog_add', NULL),
(28, 'blog_update', NULL),
(29, 'blog_view', NULL),
(30, 'blog_delete', NULL),
(31, 'form_list', NULL),
(32, 'form_export', NULL),
(33, 'form_add', NULL),
(34, 'form_update', NULL),
(35, 'form_view', NULL),
(36, 'form_manage', NULL),
(37, 'form_delete', NULL),
(38, 'crud_list', NULL),
(39, 'crud_export', NULL),
(40, 'crud_add', NULL),
(41, 'crud_update', NULL),
(42, 'crud_view', NULL),
(43, 'crud_delete', NULL),
(44, 'rest_list', NULL),
(45, 'rest_export', NULL),
(46, 'rest_add', NULL),
(47, 'rest_update', NULL),
(48, 'rest_view', NULL),
(49, 'rest_delete', NULL),
(50, 'group_list', NULL),
(51, 'group_export', NULL),
(52, 'group_add', NULL),
(53, 'group_update', NULL),
(54, 'group_view', NULL),
(55, 'group_delete', NULL),
(56, 'permission_list', NULL),
(57, 'permission_export', NULL),
(58, 'permission_add', NULL),
(59, 'permission_update', NULL),
(60, 'permission_view', NULL),
(61, 'permission_delete', NULL),
(62, 'access_list', NULL),
(63, 'access_add', NULL),
(64, 'access_update', NULL),
(65, 'menu_list', NULL),
(66, 'menu_add', NULL),
(67, 'menu_update', NULL),
(68, 'menu_delete', NULL),
(69, 'menu_save_ordering', NULL),
(70, 'menu_type_add', NULL),
(71, 'page_list', NULL),
(72, 'page_export', NULL),
(73, 'page_add', NULL),
(74, 'page_update', NULL),
(75, 'page_view', NULL),
(76, 'page_delete', NULL),
(77, 'blog_list', NULL),
(78, 'blog_export', NULL),
(79, 'blog_add', NULL),
(80, 'blog_update', NULL),
(81, 'blog_view', NULL),
(82, 'blog_delete', NULL),
(83, 'setting', NULL),
(84, 'setting_update', NULL),
(85, 'dashboard', NULL),
(86, 'extension_list', NULL),
(87, 'extension_activate', NULL),
(88, 'extension_deactivate', NULL),
(89, 'database_list', ''),
(90, 'database_add', ''),
(91, 'database_view', ''),
(147, 'register_spj_list', ''),
(146, 'register_spj_delete', ''),
(145, 'register_spj_view', ''),
(144, 'register_spj_update', ''),
(143, 'register_spj_add', ''),
(97, 'masterbagian_add', ''),
(98, 'masterbagian_update', ''),
(99, 'masterbagian_view', ''),
(100, 'masterbagian_delete', ''),
(101, 'masterbagian_list', ''),
(102, 'menu_builder', ''),
(103, 'menu_master_data', ''),
(104, 'menu_bagian', ''),
(105, 'menu_berkas', ''),
(106, 'database_update', ''),
(107, 'program_add', ''),
(108, 'program_update', ''),
(109, 'program_view', ''),
(110, 'program_delete', ''),
(111, 'program_list', ''),
(112, 'kegiatan_add', ''),
(113, 'kegiatan_update', ''),
(114, 'kegiatan_view', ''),
(115, 'kegiatan_delete', ''),
(116, 'kegiatan_list', ''),
(117, 'sub_kegiatan_add', ''),
(118, 'sub_kegiatan_update', ''),
(119, 'sub_kegiatan_view', ''),
(120, 'sub_kegiatan_delete', ''),
(121, 'sub_kegiatan_list', ''),
(122, 'tbl_verifikator_add', ''),
(123, 'tbl_verifikator_update', ''),
(124, 'tbl_verifikator_view', ''),
(125, 'tbl_verifikator_delete', ''),
(126, 'tbl_verifikator_list', ''),
(127, 'menu_jenis_verifikator', ''),
(150, 'jenis_pengajuan_view', ''),
(149, 'jenis_pengajuan_update', ''),
(148, 'jenis_pengajuan_add', ''),
(152, 'jenis_pengajuan_list', ''),
(151, 'jenis_pengajuan_delete', ''),
(138, 'menu_register_spj', ''),
(139, 'menu_program_kegiatan', ''),
(140, 'menu_program', ''),
(141, 'menu_kegiatan', ''),
(142, 'menu_sub_kegiatan', ''),
(153, 'verifikasi_add', ''),
(154, 'verifikasi_update', ''),
(155, 'verifikasi_view', ''),
(156, 'verifikasi_delete', ''),
(157, 'verifikasi_list', ''),
(158, 'register_spj_export', ''),
(159, 'register_spj_verifikasi', ''),
(160, 'menu_logout', ''),
(161, 'register_spj_cetak', ''),
(162, 'menu_semua_bagian', ''),
(163, 'menu_perencanaan_dan_keuangan', ''),
(164, 'menu_protokol_dan_komunikasi_pimpinan', ''),
(165, 'menu_umum', ''),
(166, 'menu_bagian_organisasi', ''),
(167, 'menu_bagian_perencanaan_dan_keuangan', ''),
(168, 'menu_bagian_prokopim', ''),
(169, 'menu_bagian_umum', ''),
(170, 'menu_bagian_perkeu', ''),
(171, 'menu_bagian_pbj', ''),
(172, 'menu_bagian_adm_pembangunan', ''),
(173, 'menu_bagian_perekonomian', ''),
(174, 'menu_bagian_kesra', ''),
(175, 'menu_bagian_hukum', ''),
(176, 'menu_bagian_tata_pemerintahan', ''),
(177, 'program_export', ''),
(178, 'menu_all_register', ''),
(179, 'verifikasi_tindaklanjut', ''),
(180, 'laporan_list', ''),
(181, 'menu_laporan', ''),
(182, 'menu_harian', ''),
(183, 'menu_per_bagian', ''),
(184, 'menu_per_sub_kegiatan', ''),
(185, 'menu_bulanan', ''),
(186, 'menu_user_profil', ''),
(187, 'menu_jenis_ajuan', ''),
(188, 'gaji_list', ''),
(189, 'gaji_add', ''),
(190, 'jenis_ajuan_gaji_add', ''),
(191, 'jenis_ajuan_gaji_update', ''),
(192, 'jenis_ajuan_gaji_view', ''),
(193, 'jenis_ajuan_gaji_delete', ''),
(194, 'jenis_ajuan_gaji_list', ''),
(195, 'berkas_pengajuan_add', ''),
(196, 'berkas_pengajuan_update', ''),
(197, 'berkas_pengajuan_view', ''),
(198, 'berkas_pengajuan_delete', ''),
(199, 'berkas_pengajuan_list', ''),
(200, 'menu_gaji', ''),
(201, 'gaji_update', ''),
(202, 'gaji_delete', ''),
(203, 'gaji_view', ''),
(204, 'gaji_export', ''),
(205, 'permission_edit', ''),
(206, 'gaji_cetak', ''),
(207, 'gaji_verifikasi', ''),
(208, 'menu_berkas_ajuan_gaji', ''),
(209, 'menu_jenis_ajuan_gaji', ''),
(210, 'menu_pindah_buku', ''),
(211, 'menu_pemindah_bukuan', ''),
(212, 'setorpb_add', ''),
(213, 'setorpb_update', ''),
(214, 'setorpb_view', ''),
(215, 'setorpb_delete', ''),
(216, 'setorpb_list', ''),
(217, 'menu_pb', ''),
(218, 'menu_sts', ''),
(219, 'setorbalik_add', ''),
(220, 'setorbalik_update', ''),
(221, 'setorbalik_view', ''),
(222, 'setorbalik_delete', ''),
(223, 'setorbalik_list', ''),
(224, 'menu_rekonsiliasi_saldo_bank', ''),
(225, 'setorbalik_bagian', ''),
(226, 'menu_organisasi', ''),
(227, 'menu_pengadaan_barang_dan_jasa', ''),
(228, 'menu_administrasi_pembangunan', ''),
(229, 'menu_perekonomian', ''),
(230, 'menu_kesejahteraan_rakyat', ''),
(231, 'menu_hukum', ''),
(232, 'menu_tata_pemerintahan', ''),
(233, 'setorpb_bagian', ''),
(234, 'menu_rekonsiliasi_saldo', ''),
(235, 'menu_pemindah_bukuan_-', ''),
(236, 'menu_setor_balik', ''),
(237, 'menu_rekonsiliasi_saldo_-', ''),
(238, 'register_spj_ceklist', ''),
(239, 'list_ceklist_add', ''),
(240, 'list_ceklist_update', ''),
(241, 'list_ceklist_view', ''),
(242, 'list_ceklist_delete', ''),
(243, 'list_ceklist_list', ''),
(244, 'berkas_ceklist_add', ''),
(245, 'berkas_ceklist_update', ''),
(246, 'berkas_ceklist_view', ''),
(247, 'berkas_ceklist_delete', ''),
(248, 'berkas_ceklist_list', ''),
(249, 'menu_ceklist', ''),
(250, 'menu_all_pb', ''),
(251, 'menu_all_sts', ''),
(252, 'setorpb_export', ''),
(253, 'masterbagian_export', ''),
(254, 'setorbalik_export', ''),
(264, 'tes_upload_list', ''),
(263, 'tes_upload_delete', ''),
(262, 'tes_upload_view', ''),
(261, 'tes_upload_update', ''),
(260, 'tes_upload_add', ''),
(265, 'menu_gaji_dan_tunjangan', ''),
(266, 'menu_realisasi_final', ''),
(267, 'menu_asn', ''),
(268, 'menu_kdh/wkdh', ''),
(269, 'bantuan_add', ''),
(270, 'bantuan_update', ''),
(271, 'bantuan_view', ''),
(272, 'bantuan_delete', ''),
(273, 'bantuan_list', ''),
(274, 'menu_helpdesk', ''),
(275, 'bantuan_komentar', ''),
(276, 'laporan_rekapspj', ''),
(277, 'menu_rekap_ajuan_spj', ''),
(278, 'berkas_pengajuan_export', ''),
(279, 'menu_bagian_kerjasama', ''),
(280, 'master_ppk_skpd_update', ''),
(281, 'master_ppk_skpd_view', ''),
(282, 'master_ppk_skpd_delete', ''),
(283, 'master_ppk_skpd_list', ''),
(284, 'master_ppk_skpd_add', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(127, 1),
(127, 1),
(138, 1),
(270, 12),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(142, 1),
(142, 1),
(269, 12),
(274, 10),
(272, 9),
(271, 9),
(270, 9),
(269, 9),
(276, 12),
(180, 12),
(254, 9),
(161, 12),
(145, 12),
(273, 8),
(147, 12),
(275, 5),
(268, 1),
(272, 8),
(271, 8),
(225, 8),
(223, 8),
(222, 8),
(221, 8),
(220, 8),
(219, 8),
(233, 8),
(216, 8),
(267, 1),
(215, 8),
(214, 8),
(213, 8),
(275, 7),
(273, 7),
(85, 12),
(277, 12),
(273, 5),
(272, 5),
(271, 5),
(199, 5),
(198, 5),
(197, 5),
(196, 5),
(195, 5),
(207, 5),
(206, 5),
(204, 5),
(203, 5),
(272, 7),
(271, 7),
(212, 8),
(207, 8),
(206, 8),
(160, 1),
(202, 5),
(275, 6),
(225, 7),
(203, 8),
(201, 8),
(103, 1),
(201, 5),
(273, 6),
(223, 7),
(188, 8),
(276, 8),
(103, 1),
(189, 5),
(272, 6),
(222, 7),
(180, 8),
(221, 7),
(103, 1),
(188, 5),
(271, 6),
(220, 7),
(179, 8),
(225, 6),
(103, 1),
(180, 5),
(223, 6),
(219, 7),
(157, 8),
(151, 5),
(103, 1),
(152, 5),
(222, 6),
(252, 7),
(156, 8),
(148, 5),
(149, 5),
(164, 0),
(150, 5),
(121, 5),
(120, 5),
(233, 7),
(216, 7),
(215, 7),
(214, 7),
(213, 7),
(225, 9),
(223, 9),
(222, 9),
(221, 9),
(220, 9),
(219, 9),
(252, 9),
(233, 9),
(216, 9),
(215, 9),
(214, 9),
(213, 9),
(212, 9),
(155, 8),
(154, 8),
(153, 8),
(151, 8),
(152, 8),
(148, 8),
(149, 8),
(150, 8),
(121, 8),
(120, 8),
(119, 8),
(118, 8),
(117, 8),
(116, 8),
(115, 8),
(273, 10),
(114, 8),
(113, 8),
(112, 8),
(111, 8),
(110, 8),
(109, 8),
(212, 7),
(199, 7),
(198, 7),
(197, 7),
(196, 7),
(195, 7),
(276, 7),
(180, 7),
(157, 7),
(156, 7),
(155, 7),
(154, 7),
(153, 7),
(194, 7),
(193, 7),
(192, 7),
(191, 7),
(190, 7),
(151, 7),
(152, 7),
(148, 7),
(149, 7),
(221, 6),
(220, 6),
(219, 6),
(233, 6),
(216, 6),
(215, 6),
(214, 6),
(213, 6),
(212, 6),
(207, 6),
(206, 6),
(204, 6),
(203, 6),
(202, 6),
(201, 6),
(189, 6),
(188, 6),
(276, 6),
(180, 6),
(179, 6),
(157, 6),
(156, 6),
(119, 5),
(118, 5),
(117, 5),
(116, 5),
(115, 5),
(114, 5),
(113, 5),
(112, 5),
(111, 5),
(110, 5),
(109, 5),
(108, 5),
(107, 5),
(101, 5),
(100, 5),
(99, 5),
(98, 5),
(97, 5),
(161, 5),
(159, 5),
(158, 5),
(138, 1),
(163, 1),
(162, 1),
(164, 1),
(169, 1),
(166, 1),
(166, 1),
(166, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(175, 1),
(176, 1),
(276, 9),
(180, 9),
(179, 9),
(157, 9),
(156, 9),
(155, 9),
(154, 9),
(153, 9),
(121, 9),
(116, 9),
(111, 9),
(101, 9),
(161, 9),
(159, 9),
(143, 9),
(108, 8),
(107, 8),
(101, 8),
(100, 8),
(99, 8),
(98, 8),
(97, 8),
(161, 8),
(159, 8),
(145, 8),
(147, 8),
(85, 8),
(23, 8),
(155, 6),
(22, 8),
(150, 7),
(121, 7),
(120, 7),
(119, 7),
(118, 7),
(117, 7),
(116, 7),
(115, 7),
(114, 7),
(113, 7),
(112, 7),
(111, 7),
(110, 7),
(109, 7),
(108, 7),
(154, 6),
(153, 6),
(151, 6),
(152, 6),
(148, 6),
(149, 6),
(150, 6),
(121, 6),
(120, 6),
(119, 6),
(118, 6),
(117, 6),
(116, 6),
(115, 6),
(114, 6),
(143, 5),
(144, 5),
(145, 5),
(21, 8),
(146, 5),
(147, 5),
(85, 5),
(23, 5),
(22, 5),
(21, 5),
(20, 5),
(19, 5),
(274, 5),
(268, 5),
(267, 5),
(20, 8),
(19, 8),
(277, 8),
(107, 7),
(101, 7),
(100, 7),
(99, 7),
(98, 7),
(97, 7),
(161, 7),
(274, 8),
(113, 6),
(112, 6),
(111, 6),
(110, 6),
(159, 7),
(109, 6),
(108, 6),
(107, 6),
(265, 5),
(224, 5),
(209, 5),
(208, 5),
(187, 5),
(186, 5),
(185, 5),
(186, 1),
(184, 5),
(101, 6),
(164, 1),
(268, 8),
(272, 10),
(144, 9),
(100, 6),
(99, 6),
(98, 6),
(97, 6),
(161, 6),
(183, 5),
(182, 11),
(181, 5),
(178, 5),
(176, 5),
(175, 5),
(145, 9),
(147, 9),
(174, 5),
(173, 5),
(172, 5),
(171, 5),
(271, 10),
(270, 10),
(269, 10),
(225, 10),
(223, 10),
(222, 10),
(221, 10),
(220, 10),
(219, 10),
(233, 10),
(216, 10),
(215, 10),
(214, 10),
(213, 10),
(212, 10),
(199, 10),
(198, 10),
(197, 10),
(196, 10),
(195, 10),
(207, 10),
(267, 8),
(266, 8),
(265, 8),
(234, 8),
(232, 8),
(231, 8),
(208, 1),
(170, 5),
(206, 10),
(169, 5),
(168, 5),
(167, 5),
(166, 5),
(165, 5),
(204, 10),
(203, 10),
(202, 10),
(209, 1),
(164, 5),
(201, 10),
(159, 6),
(145, 6),
(147, 6),
(85, 6),
(23, 6),
(22, 6),
(21, 6),
(20, 6),
(19, 6),
(277, 6),
(189, 10),
(188, 10),
(180, 10),
(179, 10),
(157, 10),
(155, 10),
(194, 10),
(193, 10),
(192, 10),
(191, 10),
(190, 10),
(145, 7),
(147, 7),
(85, 7),
(23, 7),
(22, 7),
(21, 7),
(20, 7),
(19, 7),
(277, 7),
(274, 7),
(268, 7),
(267, 7),
(274, 6),
(151, 10),
(85, 9),
(23, 9),
(22, 9),
(21, 9),
(20, 9),
(19, 9),
(16, 9),
(274, 9),
(230, 8),
(266, 9),
(251, 9),
(250, 9),
(237, 9),
(236, 9),
(152, 10),
(148, 10),
(149, 10),
(150, 10),
(85, 10),
(23, 10),
(266, 7),
(249, 7),
(232, 7),
(231, 7),
(230, 7),
(229, 7),
(163, 1),
(164, 1),
(235, 9),
(22, 10),
(182, 10),
(224, 9),
(21, 10),
(20, 10),
(268, 10),
(227, 1),
(267, 10),
(266, 10),
(265, 10),
(250, 10),
(249, 10),
(236, 10),
(163, 1),
(268, 6),
(234, 10),
(232, 10),
(267, 6),
(231, 10),
(230, 10),
(229, 10),
(218, 9),
(217, 9),
(186, 9),
(265, 1),
(228, 10),
(227, 10),
(266, 6),
(226, 10),
(226, 1),
(224, 10),
(227, 0),
(218, 10),
(228, 0),
(217, 10),
(265, 6),
(163, 5),
(230, 0),
(210, 10),
(251, 6),
(209, 10),
(232, 0),
(208, 10),
(186, 10),
(228, 7),
(249, 1),
(65, 1),
(227, 7),
(105, 1),
(226, 7),
(185, 9),
(274, 12),
(275, 11),
(273, 11),
(272, 11),
(271, 11),
(270, 11),
(269, 11),
(243, 11),
(242, 11),
(241, 11),
(248, 11),
(247, 11),
(246, 11),
(245, 11),
(244, 11),
(180, 11),
(238, 11),
(145, 11),
(147, 11),
(85, 11),
(22, 11),
(21, 11),
(20, 11),
(274, 11),
(249, 11),
(224, 11),
(186, 11),
(185, 11),
(184, 11),
(183, 11),
(182, 9),
(181, 11),
(178, 11),
(176, 11),
(175, 11),
(174, 11),
(173, 11),
(172, 11),
(171, 11),
(170, 11),
(169, 11),
(168, 11),
(250, 6),
(232, 6),
(162, 5),
(165, 1),
(231, 6),
(230, 6),
(229, 6),
(182, 8),
(228, 6),
(227, 6),
(226, 6),
(224, 6),
(218, 6),
(217, 6),
(210, 6),
(208, 6),
(229, 8),
(228, 8),
(227, 8),
(226, 8),
(224, 8),
(218, 8),
(217, 8),
(187, 8),
(186, 8),
(185, 8),
(184, 8),
(183, 8),
(224, 7),
(181, 8),
(178, 8),
(187, 6),
(186, 6),
(185, 6),
(184, 6),
(183, 6),
(182, 6),
(184, 9),
(183, 9),
(181, 6),
(181, 9),
(178, 6),
(218, 7),
(176, 8),
(178, 9),
(185, 10),
(224, 1),
(160, 5),
(165, 6),
(217, 7),
(175, 8),
(160, 9),
(184, 10),
(167, 11),
(224, 1),
(142, 5),
(164, 6),
(209, 7),
(174, 8),
(142, 9),
(183, 10),
(166, 11),
(224, 1),
(141, 5),
(163, 6),
(208, 7),
(173, 8),
(141, 9),
(182, 5),
(160, 11),
(224, 1),
(140, 5),
(162, 6),
(187, 7),
(172, 8),
(140, 9),
(181, 10),
(138, 11),
(224, 1),
(139, 5),
(160, 6),
(186, 7),
(171, 8),
(139, 9),
(165, 10),
(105, 11),
(224, 1),
(138, 5),
(142, 6),
(185, 7),
(170, 8),
(138, 9),
(164, 10),
(103, 11),
(224, 1),
(104, 5),
(141, 6),
(184, 7),
(169, 8),
(104, 9),
(163, 10),
(65, 11),
(103, 9),
(160, 10),
(250, 1),
(140, 6),
(183, 7),
(168, 8),
(1, 9),
(1, 10),
(164, 1),
(139, 6),
(182, 7),
(167, 8),
(181, 7),
(166, 8),
(178, 7),
(165, 7),
(164, 7),
(163, 7),
(162, 7),
(160, 7),
(142, 7),
(165, 8),
(164, 8),
(163, 8),
(162, 8),
(160, 8),
(142, 8),
(141, 8),
(140, 8),
(139, 8),
(138, 8),
(104, 8),
(141, 7),
(140, 7),
(139, 7),
(138, 7),
(105, 7),
(103, 5),
(274, 1),
(1, 11),
(103, 8),
(104, 7),
(138, 6),
(1, 5),
(185, 12),
(184, 12),
(183, 12),
(277, 1),
(104, 6),
(103, 7),
(1, 8),
(182, 12),
(65, 7),
(103, 6),
(275, 8),
(273, 9),
(181, 12),
(178, 12),
(160, 12),
(142, 12),
(141, 12),
(140, 12),
(139, 12),
(138, 12),
(104, 12),
(1, 12),
(271, 12),
(272, 12),
(273, 12),
(279, 1),
(279, 5),
(1, 6),
(1, 7),
(279, 8),
(279, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'anas.algalilei@gmail.com', NULL, NULL, '5711aa2253ac62088bf34f79f8ccd82e41bdbcf32e7670772d2a1e1746a9be9b', 'anasfaishol', 'Anas Faishol', '', 0, '2025-12-10 07:46:44', '2025-12-10 07:46:44', '2024-06-02 06:49:30', NULL, NULL, NULL, NULL, NULL, '::1'),
(2, 'verifikator1@gmail.com', NULL, NULL, '85331630fca2b67c234b6b57e7affc9403d62cf186989c71675956e3ccc2a20d', 'iva', 'IVA YUNITASARI, A.Md', 'default.png', 0, '2025-12-10 08:07:06', '2025-12-10 08:07:06', '2024-06-07 23:02:58', NULL, NULL, NULL, NULL, NULL, '::1'),
(3, 'verifikator2@gmail.com', NULL, NULL, '4e4cdff9436d4b9797eeb35d6965e73bd0bd9d5dc939ab2c190a179cf8df960d', 'nurul', 'NÜRUL NUR\'AINI, ST.MT', 'default.png', 0, '2025-12-10 07:44:56', '2025-12-10 07:44:56', '2024-06-07 23:03:50', NULL, NULL, NULL, NULL, NULL, '::1'),
(4, 'ppk-skpd@gmail.com', NULL, NULL, '26099512199546597858cebb4cc8d90e21f48e9be747c98d45d8a57a0f0a6e44', 'ppkskpd', 'WELLY APRIANTO, SE', 'default.png', 0, '2025-12-10 08:05:28', '2025-12-10 08:05:28', '2024-06-07 23:04:58', NULL, NULL, NULL, NULL, NULL, '::1'),
(5, 'humasprotokolkabblitar@gmail.com', NULL, NULL, '34a521c0444e42ecde050fe21275f20ad090b7f074ead4ab90e047bc9fe5014d', 'bppprokopim', 'Dwi Maidar Jayanti', 'default.png', 0, '2025-12-03 13:48:33', '2025-12-03 13:48:33', '2024-06-07 23:06:38', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(6, 'petugas.register@gmail.com', NULL, NULL, '3913228818759cd846b475d3106a4ecc9bf9bd91746cab4e88a8750c11d15914', 'petugas', 'Petugas Register', 'default.png', 0, '2025-12-10 08:01:20', '2025-12-10 08:01:20', '2024-06-14 09:22:08', NULL, NULL, NULL, NULL, NULL, '::1'),
(7, 'bagian.hukum@blitarkab.go.id', NULL, NULL, '3e1340c771fff1153aa60137dc8c0265d5914e5de769b59183085b78d950b31b', 'bpphukum', 'Fenny Dwi Novianti', 'default.png', 0, '2025-12-03 13:28:13', '2025-12-03 13:28:13', '2024-07-01 12:30:25', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(8, 'bagian.perkeu@blitarkab.go.id', NULL, NULL, '8e7d10c7c802e6cc70ddc57bcb1477eb8f3083b0f088f9427e4d56600b065bbe', 'heriko', 'Heriko Saputra, A.Md.AK', 'default.png', 0, '2025-12-10 07:48:47', '2025-12-10 07:48:47', '2024-07-01 12:36:41', NULL, NULL, NULL, NULL, NULL, '::1'),
(9, 'bagian.umum@blitarkab.go.id', NULL, NULL, '5ea379e79219f971019cf6f7ee7b5edc7c1e8d65aee2370cc6249f1302d3f3ca', 'bppumum', 'Heni Nofrianah, Sh', 'default.png', 0, '2025-12-03 14:22:55', '2025-12-03 14:22:55', '2024-07-01 12:37:25', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(10, 'bagian.organisasi@blitarkab.go.id', NULL, NULL, '0d8b9bd8217c0ed0f04757d937414c9689408ee2431c2ba8ba5ebad18502184c', 'bpporganisasi', 'Herlina, S.E', 'default.png', 0, '2025-12-02 08:20:00', '2025-12-02 08:20:00', '2024-07-01 12:38:16', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(11, 'bagian.pbj@blitarkab.go.id', NULL, NULL, '391ed40ef01e7c09b0c27d97adba46d9aa04e52e1a3c9c7561185393b84d223c', 'bppulp', 'Hendra Jefriadi', 'default.png', 0, '2025-12-01 15:10:20', '2025-12-01 15:10:20', '2024-07-01 12:39:21', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(12, 'bap.kab.blitar@gmail.com', NULL, NULL, '9a90741a24c29a3511cad6568e6a7d1fa2ea09b8c86a50d09d1fef74f4bf840f', 'bppadpem', 'Arni Yunita, S.E', 'default.png', 0, '2025-12-03 14:36:05', '2025-12-03 14:36:05', '2024-07-01 12:40:57', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(13, 'bagian.perekonomian@blitarkab.go.id', NULL, NULL, '0d9f89182b7572de5694a769bc9073d204754bad5bc043c69acafcaf484922fe', 'bppperekonomian', 'Lena Fitriani, S.Akun', 'default.png', 0, '2025-12-02 08:19:47', '2025-12-02 08:19:47', '2024-07-01 12:41:47', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(14, 'bagian.kesra@blitarkab.go.id', NULL, NULL, 'e268a0c65f403fcaa9a2d3f2399a185c5ff06242e546883d54d38fe6b9ecf033', 'bppkesra', 'Ersoni', 'default.png', 0, '2025-12-03 13:52:29', '2025-12-03 13:52:29', '2024-07-01 12:42:22', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(15, 'bagian.tapem@blitarkab.go.id', NULL, NULL, '196075d3b960128ae4a5cf79596d3d06ed482c5535c813ec0c7dbc2e6be032be', 'bpptapem', 'Hendriansyah, A.Md', 'default.png', 0, '2025-12-02 15:19:03', '2025-12-02 15:19:03', '2024-07-01 12:43:37', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(16, 'bendahara.setda@gmail.com', NULL, NULL, '94014f8aab10d529168647d91714a91af51a5ef670225ffe3835e0460dd61a46', 'bendahara', 'Bendahara Gaji', 'default.png', 0, '2024-09-19 14:01:02', '2024-09-19 14:01:02', '2024-07-13 11:37:56', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(17, 'yoes@blitarkab.go.id', NULL, NULL, '1cb4df1f9cc3eff69f9fa98a554c0cac43000c0fa999e7e51bd80fc23ab644a1', 'yoes', 'Yoes', 'default.png', 0, '2024-10-04 14:33:20', '2024-10-04 14:33:20', '2024-09-30 10:03:46', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(19, 'pptk_tapem@blitarkab.go.id', NULL, NULL, '4062ecb3e2d42062e29a07ee8b94fa9d10478109ff6dd8fb592a75260cdebbe7', 'pptktapem', 'PPTK Bagian Tata Pemerintahan', 'default.png', 0, '2025-11-11 09:54:47', '2025-11-11 09:54:47', '2025-10-09 22:19:01', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(20, 'pptkhukum@blitarkab.go.id', NULL, NULL, '0d1986dd7d9af78bfe6bf0f448169da961ee1ec5ecbf7ef8100f627995fbf123', 'pptkhukum', 'PPTK Bagian Hukum', 'default.png', 0, NULL, NULL, '2025-10-09 22:20:07', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'pptkkesra@blitarkab.go.id', NULL, NULL, '3c86e3d7f437719460656e1ca503d8f0eff8edff7cc69b8ce3799738842b1d7a', 'pptkkesra', 'PPTK Bagian Kesejahteraan Rakyat', 'default.png', 0, NULL, NULL, '2025-10-09 22:20:46', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'pptkperekonomian@blitarkab.go.id', NULL, NULL, 'b7a80a9d740b53f754a91071d7e8a7ce0f9c40d2b0155680694c8ba4c79ea325', 'pptkperekonomian', 'PPTK Bagian Perekonomian', 'default.png', 0, NULL, NULL, '2025-10-09 22:21:15', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'pptkadpem@blitarkab.go.id', NULL, NULL, '7f577fbc084191e91005de79ac92f0a955173465d342a4af79ede680b51b82e5', 'pptkadpem', 'PPTK Bagian Administrasi Pembangunan', 'default.png', 0, '2025-11-25 08:25:46', '2025-11-25 08:25:46', '2025-10-09 22:21:55', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(24, 'pptkpbj@blitarkab.go.id', NULL, NULL, '4bec7ccc8191a0c15488c59b8234684fcd1578ef6616ba1feea453d3249a9359', 'pptkpbj', 'PPTK Bagian Pengadaan Barang dan Jasa', 'default.png', 0, '2025-10-14 10:49:36', '2025-10-14 10:49:36', '2025-10-09 22:22:26', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(25, 'pptkorganisasi@blitarkab.go.id', NULL, NULL, '40d8b3c4c27d65db333c294eeb7cd04254a70bdd9be890b6cd10fb8941850d34', 'pptkorganisasi', 'PPTK Bagian Organisasi', 'default.png', 0, NULL, NULL, '2025-10-09 22:22:56', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'pptkumum@blitarkab.go.id', NULL, NULL, '00dce6f83a02d7039647e6f0ac90270cbc8da005436a8079749645e37041aa50', 'pptkumum', 'PPTK Bagian Umum', 'default.png', 0, '2025-11-25 11:25:20', '2025-11-25 11:25:20', '2025-10-09 22:23:27', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(27, 'pptkprokopim@blitarkab.go.id', NULL, NULL, 'ae1f83a6cf7ef34c2a8a09e0dcdc9db6f1c969ab5521af5edd765ac38424e4f4', 'pptkprokopim', 'PPTK Bagian Protokol dan Komunikasi Pimpinan', 'default.png', 0, '2025-11-18 08:12:21', '2025-11-18 08:12:21', '2025-10-09 22:24:01', NULL, NULL, NULL, NULL, NULL, '114.10.154.141'),
(28, 'pptkbaperkeu@blitarkab.go.id', NULL, NULL, '28bebace395144899015fcccf5e68a1bd6dcc094cfe746f5d9c5b0e072b5f98e', 'pptkbaperkeu', 'PPTK Bagian Perencanaan dan Keuangan', 'default.png', 0, '2025-11-11 09:43:16', '2025-11-11 09:43:16', '2025-10-09 22:24:30', NULL, NULL, NULL, NULL, NULL, '103.139.188.65'),
(29, 'kerjasama@gmail.com', NULL, NULL, '9062845ecc4f511be576b88d8be16f68d59b83efb359f51ccf404b7d5a061177', 'bppkerjasama', 'Saryanti', 'default.png', 0, NULL, NULL, '2025-12-09 17:37:28', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'mita@gmail.com', NULL, NULL, '7c41cd1c5ab502e5693185bc777a2c4a627569b2a9bbb429218ae3240a8e2e3e', 'mita', 'MITA HARTATI, AM. d', 'default.png', 0, NULL, NULL, '2025-12-10 08:11:18', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'dessy.novianty@gmail.com', NULL, NULL, '431dd9375701b357352320af3e8abcaa55136565ead7fad3c47d46c4b6811e7b', 'dessy', 'DESSY NOVIANTY, SE', 'default.png', 0, NULL, NULL, '2025-12-10 08:12:01', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'ritriana@gmail.com', NULL, NULL, '9303833982d500ef350a3ef4aeea2418c3c43cb4ddda3761dc0be91613eb3519', 'ritriana', 'RITRIANA PUTRISARI, AM. d.', 'default.png', 0, NULL, NULL, '2025-12-10 08:13:08', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'heni@gmail.com', NULL, NULL, '6cb91e6bbe8b85093d8b7b05426c0f262e805ccad38108d3926e3f23e01f0a89', 'heni', 'HENI SUSANTI, SH', 'default.png', 0, NULL, NULL, '2025-12-10 08:14:52', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'mei@gmail.com', NULL, NULL, '8d5917d040aa140ee042d878d45a16d3e3533db8ca3e873f50338d0108989ae5', 'mei', 'MEI YANTI WAHYU SARI, SE', 'default.png', 0, NULL, NULL, '2025-12-10 08:15:37', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'muhammad.nur@gmail.com', NULL, NULL, '24b0ccbf0fb36c52910cac652b7dded139647bf61741e9da968245cef33bd5d2', 'nur', 'MUHAMMAD NUR, SE,M.Si', 'default.png', 0, NULL, NULL, '2025-12-10 08:17:10', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'rika@gmail.com', NULL, NULL, '3f3950ad5c3011c213e69fbe872682324c7c87942bc95a5f68c5f35e878b8799', 'rika', 'RIKA KRISNAWATI, SE', 'default.png', 0, NULL, NULL, '2025-12-10 08:24:14', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 6),
(3, 7),
(4, 8),
(5, 9),
(6, 5),
(7, 9),
(8, 6),
(8, 9),
(9, 9),
(10, 9),
(11, 9),
(12, 9),
(13, 9),
(14, 9),
(15, 9),
(16, 10),
(17, 11),
(18, 9),
(19, 12),
(20, 12),
(21, 12),
(22, 12),
(23, 12),
(24, 12),
(25, 12),
(26, 12),
(27, 12),
(28, 12),
(29, 9),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 7),
(36, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan`
--

CREATE TABLE `bantuan` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`id`, `user`, `judul`, `konten`, `waktu`) VALUES
(3, 19, 'TANYA SPJ', 'Bagaimana cara pengajuan SPJ?', '2025-11-11 02:38:21'),
(4, 19, 'Tanya SPJ (2)', 'Apa kelengkapan SPJ Mamin?', '2025-11-11 02:55:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_ceklist`
--

CREATE TABLE `berkas_ceklist` (
  `id` int(11) NOT NULL,
  `nama_berkas` varchar(255) DEFAULT NULL,
  `jenis_ceklist` varchar(255) NOT NULL,
  `bendel` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas_ceklist`
--

INSERT INTO `berkas_ceklist` (`id`, `nama_berkas`, `jenis_ceklist`, `bendel`) VALUES
(26, 'Rekapitulasi SPM Rangkap 2', '1', 'BENDEL PERTAMA'),
(27, 'SPM Rangkap 5', '1', 'BENDEL PERTAMA'),
(28, 'Faktur Asli', '1', 'BENDEL PERTAMA'),
(29, 'E-billing Pajak PPh dan PPN Rangkap 3', '1', 'BENDEL PERTAMA'),
(30, 'Foto copy Buku Tabungan/Referensi Bank An. Rekanan', '1', 'BENDEL PERTAMA'),
(31, 'Foto copy Buku NPWP', '1', 'BENDEL PERTAMA'),
(32, 'Surat Keterangan Pencairan Dana Transfer', '1', 'BENDEL PERTAMA'),
(33, 'Rekapitulasi Penyerapan Anggaran Dana Transfer', '1', 'BENDEL PERTAMA'),
(34, 'SPP 1, 2, 3', '1', 'BENDEL KEDUA'),
(35, 'SPD ( Mengetahui KPA )', '1', 'BENDEL KEDUA'),
(36, 'Surat Keterangan Pengajuan Pencairan Dana', '1', 'BENDEL KEDUA'),
(37, 'SPTJM SPP dan SPM', '1', 'BENDEL KEDUA'),
(38, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '1', 'BENDEL KEDUA'),
(39, 'Kwitansi (Lembar Kedua)', '1', 'BENDEL KEDUA'),
(40, 'Foto copy Rekening Bank an. Rekanan', '1', 'BENDEL KEDUA'),
(41, 'Kontrak Swakelola', '1', 'BENDEL KEDUA'),
(42, 'Permohonan Pembayaran', '1', 'BENDEL KEDUA'),
(43, 'BA Penyerahan Hasil Pekerjaan (Dari PPK ke PA/KPA) / Berita Acara Serah Terima Hasil Pekerjaan (BAST) dari Penyedia  jika PA bertindak sekaligus PPK', '1', 'BENDEL KEDUA'),
(44, 'Foto Hasil Pekerjaan / Dokumentasi', '1', 'BENDEL KEDUA'),
(45, 'Surat Pernyataan Pencatatan Barang Milik Daerah (Belanja Modal)', '1', 'BENDEL KEDUA'),
(46, 'Melampirkan bukti upload Kontrak Swakelola pada aplikasi LPSE', '1', 'BENDEL KEDUA'),
(47, 'Rekapitulasi SPM Rangkap 2', '2', 'BENDEL PERTAMA'),
(48, 'SPM Rangkap 5', '2', 'BENDEL PERTAMA'),
(49, 'Faktur Asli ( Kalau memiliki NPKP )', '2', 'BENDEL PERTAMA'),
(50, 'E-billing Pajak PPh dan PPN Rangkap 3', '2', 'BENDEL PERTAMA'),
(51, 'Foto copy Rekening Giro / Buku Tabungan Bank', '2', 'BENDEL PERTAMA'),
(52, 'Foto copy NPWP', '2', 'BENDEL PERTAMA'),
(53, 'Surat Keterangan Pencairan Dana Transfer', '2', 'BENDEL PERTAMA'),
(54, 'Rekapitulasi Penyerapan Anggaran Dana Transfer', '2', 'BENDEL PERTAMA'),
(55, 'SPP', '2', 'BENDEL KEDUA'),
(56, 'SPD', '2', 'BENDEL KEDUA'),
(57, 'Surat Keterangan Pengajuan Pencairan Dana', '2', 'BENDEL KEDUA'),
(58, 'SPTJM SPP dan SPM', '2', 'BENDEL KEDUA'),
(59, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '2', 'BENDEL KEDUA'),
(60, 'Permohonan Pembayaran (100%)', '2', 'BENDEL KEDUA'),
(61, 'Kwitansi Asli (Lembar Kedua)', '2', 'BENDEL KEDUA'),
(62, 'Surat Perjanjian', '2', 'BENDEL KEDUA'),
(63, 'BA Penyerahan Hasil Pekerjaan (Dari PPK ke PA) / Berita Acara Serah Terima Hasil Pekerjaan (BAST) jika PA bertindak sekaligus PPK', '2', 'BENDEL KEDUA'),
(64, 'Berita Acara Pembayaran', '2', 'BENDEL KEDUA'),
(65, 'SPJ  Rincian Penggunaan Dana', '2', 'BENDEL KEDUA'),
(66, 'Kuitansi Pembayaran BPJS Ketenagakerjaan', '2', 'BENDEL KEDUA'),
(67, 'Bukti Pembayaran Denda', '2', 'BENDEL KEDUA'),
(68, 'Upload Kontrak pada aplikasi SPSE', '2', 'BENDEL KEDUA'),
(69, 'Lembar Kontrol', '2', 'BENDEL KEDUA'),
(70, 'Rekapitulasi SPM Rangkap 2', '6', 'BENDEL PERTAMA'),
(71, 'SPM Rangkap 5', '6', 'BENDEL PERTAMA'),
(72, 'e-Billing Pajak rangkap 3', '6', 'BENDEL PERTAMA'),
(77, 'SPD', '6', 'BENDEL KEDUA'),
(76, 'SPP', '6', 'BENDEL KEDUA'),
(75, 'Pemindahbukuan Gaji', '6', 'BENDEL PERTAMA'),
(78, 'Surat Keterangan Pengajuan Pencairan Dana', '6', 'BENDEL KEDUA'),
(79, 'SPTJM SPP dan SPM', '6', 'BENDEL KEDUA'),
(80, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '6', 'BENDEL KEDUA'),
(81, 'Rekap Gaji Besar dan Kulit Gaji', '6', 'BENDEL KEDUA'),
(82, 'Perubahan SK dalam Daftar Gaji', '6', 'BENDEL KEDUA'),
(83, 'Lembar Kontrol', '6', 'BENDEL KEDUA'),
(84, 'Rekapitulasi SPM Rangkap 2', '7', 'BENDEL PERTAMA'),
(85, 'SPM Rangkap 5', '7', 'BENDEL PERTAMA'),
(86, 'e-Billing Pajak rangkap 3', '7', 'BENDEL PERTAMA'),
(87, 'Pemindahbukuan Gaji', '7', 'BENDEL PERTAMA'),
(88, 'SPP', '7', 'BENDEL KEDUA'),
(89, 'SPD', '7', 'BENDEL KEDUA'),
(90, 'Surat Keterangan Pengajuan Pencairan Dana', '7', 'BENDEL KEDUA'),
(91, 'SPTJM SPP dan SPM', '7', 'BENDEL KEDUA'),
(92, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '7', 'BENDEL KEDUA'),
(93, 'Rekap Gaji Besar dan Kulit Gaji', '7', 'BENDEL KEDUA'),
(94, 'Surat Keterangan Pemberhentian Pembayaran (SKPP)', '7', 'BENDEL KEDUA'),
(95, 'Perubahan SK dalam Daftar Gaji', '7', 'BENDEL KEDUA'),
(96, 'SK CPNS', '7', 'BENDEL KEDUA'),
(97, 'Surat Pernyataan Melaksanakan Tugas', '7', 'BENDEL KEDUA'),
(98, 'Lembar Kontrol', '7', 'BENDEL KEDUA'),
(99, 'Rekapitulasi SPM Rangkap 2', '8', 'BENDEL PERTAMA'),
(100, 'SPM Rangkap 5', '8', 'BENDEL PERTAMA'),
(101, 'Pemindahbukuan TPP', '8', 'BENDEL PERTAMA'),
(102, 'SPP', '8', 'BENDEL KEDUA'),
(103, 'SPD', '8', 'BENDEL KEDUA'),
(104, 'Surat Keterangan Pengajuan Pencairan Dana', '8', 'BENDEL KEDUA'),
(105, 'SPTJM SPP dan SPM', '8', 'BENDEL KEDUA'),
(106, 'Surat Pernyataan Tanggung Jawab Mutlak TPP Bermaterai', '8', 'BENDEL KEDUA'),
(107, 'Daftar Penerima TPP', '8', 'BENDEL KEDUA'),
(108, 'Rekapitulasi yang sudah divalidasi dari BPKSDM', '8', 'BENDEL KEDUA'),
(109, 'Lembar Kontrol', '8', 'BENDEL KEDUA'),
(110, 'Rekapitulasi SPM Rangkap 2', '9', 'BENDEL PERTAMA'),
(111, 'SPM Rangkap 5', '9', 'BENDEL PERTAMA'),
(112, 'SPP', '9', 'BENDEL KEDUA'),
(113, 'SK Penunjukan PA dan Bendahara Pengeluaran', '9', 'BENDEL KEDUA'),
(115, 'SK Keputusan Bupati tentang  UP', '9', 'BENDEL KEDUA'),
(116, 'Surat Keterangan Pengajuan Pencairan Dana', '9', 'BENDEL KEDUA'),
(117, 'SPTJM SPP dan SPM', '9', 'BENDEL KEDUA'),
(118, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '9', 'BENDEL KEDUA'),
(119, 'Rekapitulasi SPM Rangkap 2', '10', 'BENDEL PERTAMA'),
(120, 'SPM Rangkap 5', '10', 'BENDEL PERTAMA'),
(121, 'SPP', '10', 'BENDEL KEDUA'),
(122, 'Surat Pernyataan Pengajuan TU', '10', 'BENDEL KEDUA'),
(123, 'SPD', '10', 'BENDEL KEDUA'),
(124, 'Surat Keterangan Pengajuan Pencairan Dana', '10', 'BENDEL KEDUA'),
(125, 'SPTJM SPP dan SPM', '10', 'BENDEL KEDUA'),
(126, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '10', 'BENDEL KEDUA'),
(127, 'Surat Persetujuan Permohonan Tambahan Uang', '10', 'BENDEL KEDUA'),
(128, 'Rincian Rencana Penggunaan TU', '10', 'BENDEL KEDUA'),
(129, 'Nota Dinas', '10', 'BENDEL KEDUA'),
(130, 'Lembar Kontrol', '10', 'BENDEL KEDUA'),
(131, 'Rekapitulasi SPM Rangkap 2', '11', 'BENDEL PERTAMA'),
(132, 'SPM Rangkap 5', '11', 'BENDEL PERTAMA'),
(133, 'SPP', '11', 'BENDEL KEDUA'),
(134, 'SPD', '11', 'BENDEL KEDUA'),
(135, 'Surat Keterangan Pengajuan Pencairan Dana', '11', 'BENDEL KEDUA'),
(136, 'SPTJM SPP dan SPM', '11', 'BENDEL KEDUA'),
(137, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '11', 'BENDEL KEDUA'),
(138, 'Pengesahan SPJ per SPM (yang dinihilkan)', '11', 'BENDEL KEDUA'),
(139, 'Foto copy SPM yang dinihilkan (SPM-TU)', '11', 'BENDEL KEDUA'),
(140, 'Foto copy SP2D yang dinihilkan (SP2D-TU)', '11', 'BENDEL KEDUA'),
(141, 'STS Setor Kembali ( kalau ada )', '11', 'BENDEL KEDUA'),
(142, 'Lembar Kontrol', '11', 'BENDEL KEDUA'),
(143, 'Rekapitulasi SPM Rangkap 2', '12', 'BENDEL PERTAMA'),
(144, 'SPM Rangkap 5', '12', 'BENDEL PERTAMA'),
(145, 'SPP', '12', 'BENDEL KEDUA'),
(146, 'Surat Pernyataan Pengajuan SPP GU', '12', 'BENDEL KEDUA'),
(147, 'SPD', '12', 'BENDEL KEDUA'),
(148, 'Surat Keterangan Pengajuan Pencairan Dana', '12', 'BENDEL KEDUA'),
(149, 'SPTJM SPP dan SPM', '12', 'BENDEL KEDUA'),
(150, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '12', 'BENDEL KEDUA'),
(151, 'Pengesahan SPJ per SPM', '12', 'BENDEL KEDUA'),
(152, 'Bukti upload pembelian / pembayaran (faktur/ nota/invoice struk/ dokumen lain yang disetarakan) kwitansi, honorarium, biaya perjalanan dinas pada aplikasi SPSE', '12', 'BENDEL KEDUA'),
(153, 'Lembar Kontrol', '12', 'BENDEL KEDUA'),
(154, 'Rekapitulasi SPM Rangkap 2', '13', 'BENDEL PERTAMA'),
(155, 'SPM Rangkap 5', '13', 'BENDEL PERTAMA'),
(156, 'SPP', '13', 'BENDEL KEDUA'),
(157, 'SPD', '13', 'BENDEL KEDUA'),
(158, 'Surat Keterangan Pengajuan Pencairan Dana', '13', 'BENDEL KEDUA'),
(159, 'SPTJM SPP dan SPM', '13', 'BENDEL KEDUA'),
(160, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', '13', 'BENDEL KEDUA'),
(161, 'Pengesahan SPJ per SPM', '13', 'BENDEL KEDUA'),
(162, 'Foto copy SPM UP', '13', 'BENDEL KEDUA'),
(163, 'Foto copy SP2D UP', '13', 'BENDEL KEDUA'),
(164, 'STS Setor Kembali ( kalau ada )', '13', 'BENDEL KEDUA'),
(165, 'Lembar Kontrol', '13', 'BENDEL KEDUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_pengajuan`
--

CREATE TABLE `berkas_pengajuan` (
  `id` int(11) NOT NULL,
  `nama_berkas` varchar(255) DEFAULT NULL,
  `jenis_pengajuan` varchar(255) NOT NULL,
  `bendel` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berkas_pengajuan`
--

INSERT INTO `berkas_pengajuan` (`id`, `nama_berkas`, `jenis_pengajuan`, `bendel`) VALUES
(1, 'Rekapitulasi SPM Rangkap 2', 'Ls - Gaji Induk', 'BENDEL PERTAMA'),
(2, 'SPM Rangkap 5', 'Ls - Gaji Induk', 'BENDEL PERTAMA'),
(3, 'e-Billing Pajak rangkap 3', 'Ls - Gaji Induk', 'BENDEL PERTAMA'),
(4, 'SPP 1,2,3', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(5, 'SPD (Mengetahui PA/KPA)', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(6, 'Surat Keterangan Pengajuan Pencairan Dana', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(7, 'SPTJM SPP dan SPM', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(8, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(9, 'Rekap Gaji Besar dan Kulit Gaji', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(10, 'Perubahan SK dalam Daftar Gaji', 'Ls - Gaji Induk', 'BENDEL KEDUA'),
(11, 'Rekapitulasi SPM Rangkap 2', 'Ls - Gaji Susulan', 'BENDEL PERTAMA'),
(12, 'SPM Rangkap 5', 'Ls - Gaji Susulan', 'BENDEL PERTAMA'),
(13, 'e-Billing Pajak rangkap 3', 'Ls - Gaji Susulan', 'BENDEL PERTAMA'),
(15, 'Lembar kontrol', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(16, 'SPP 1,2,3', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(17, 'SPD (Mengetahui PA/KPA)', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(18, 'Surat Keterangan Pengajuan Pencairan Dana', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(19, 'Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(20, 'Rekap Gaji Besar dan Kulit Gaji', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(21, 'SK Perubahan', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(22, 'SKPP', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(23, 'SK CPNS', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(24, 'SPMT', 'Ls - Gaji Susulan', 'BENDEL KEDUA'),
(25, 'Pemindahbukuan Gaji', 'Ls - Gaji Susulan', 'BENDEL KEDUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `content`, `image`, `tags`, `category`, `status`, `author`, `viewers`, `created_at`, `updated_at`) VALUES
(1, 'Hello Wellcome To Cicool Builder', 'Hello-Wellcome-To-Ciool-Builder', 'greetings from our team I hope to be happy! ', 'wellcome.jpg', 'greetings', '1', 'publish', 'admin', 0, '2024-06-02 06:49:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Technology', ''),
(2, 'Lifestyle', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) UNSIGNED NOT NULL,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cc_options`
--

INSERT INTO `cc_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'enable_crud_builder', NULL),
(2, 'enable_form_builder', NULL),
(3, 'enable_page_builder', NULL),
(4, 'enable_disqus', NULL),
(5, 'disqus_id', ''),
(6, 'site_name', 'SIMONTORAN | Sistem Monitoring Ajuan Keuangan'),
(7, 'email', 'anas.algalilei@gmail.com'),
(8, 'author', ''),
(9, 'site_description', ''),
(10, 'keywords', ''),
(11, 'landing_page_id', 'login'),
(12, 'timezone', 'Asia/Jakarta'),
(13, 'active_theme', 'cicool'),
(14, 'limit_pagination', '50'),
(15, 'google_id', ''),
(16, 'google_secret', ''),
(17, 'enable_api_builder', NULL),
(18, 'logo', '20251208075855-2025-12-08setting075840.png'),
(19, 'ecommerce_thausand_separator', '.'),
(20, 'ecommerce_decimal_separator', ','),
(21, 'ecommerce_decimal_length', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`id`, `title`, `subject`, `table_name`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(9, 'Register SPJ', 'Register SPJ', 'register_spj', 'id', 'yes', 'yes', 'yes'),
(2, 'Bagian', 'Bagian', 'masterbagian', 'id', 'yes', 'yes', 'yes'),
(3, 'Program', 'Program', 'program', 'id', 'yes', 'yes', 'yes'),
(4, 'Kegiatan', 'Kegiatan', 'kegiatan', 'id', 'yes', 'yes', 'yes'),
(5, 'Sub Kegiatan', 'Sub Kegiatan', 'sub_kegiatan', 'id', 'yes', 'yes', 'yes'),
(10, 'Jenis Pengajuan', 'Jenis Pengajuan', 'jenis_pengajuan', 'id', 'yes', 'yes', 'yes'),
(11, 'Verifikasi SPJ', 'Verifikasi SPJ', 'verifikasi', 'id', 'yes', 'yes', 'yes'),
(12, 'Jenis Ajuan Gaji', 'Jenis Ajuan Gaji', 'jenis_ajuan_gaji', 'id', 'yes', 'yes', 'yes'),
(13, 'Berkas Pengajuan', 'Berkas Pengajuan', 'berkas_pengajuan', 'id', 'yes', 'yes', 'yes'),
(14, 'Pemindahbukuan (PB)', 'Pemindahbukuan (PB)', 'setorpb', 'id', 'yes', 'yes', 'yes'),
(15, 'Surat Tanda Setoran (STS)', 'Surat Tanda Setoran (STS)', 'setorbalik', 'id', 'yes', 'yes', 'yes'),
(16, 'List Ceklist', 'List Ceklist', 'list_ceklist', 'id', 'yes', 'yes', 'yes'),
(17, 'Berkas Ceklist', 'Berkas Ceklist', 'berkas_ceklist', 'id', 'yes', 'yes', 'yes'),
(19, 'Tes Upload', 'Tes Upload', 'tes_upload', 'id', 'yes', 'yes', 'yes'),
(20, 'Bantuan', 'Bantuan', 'bantuan', 'id', 'yes', 'yes', 'yes'),
(21, 'Master PPK SKPD', 'Master PPK SKPD', 'master_ppk_skpd', 'id', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(48, 148, 7, 'LS', 'Ls'),
(47, 148, 7, 'GU', 'GU'),
(56, 168, 8, 'Tidak', 'Tidak'),
(55, 168, 8, 'Ya', 'Ya'),
(54, 165, 8, 'Tidak', 'Tidak'),
(53, 165, 8, 'Ya', 'Ya'),
(66, 265, 11, 'Belum', 'Belum'),
(65, 265, 11, 'Ya', 'Ya'),
(69, 288, 13, 'BENDEL PERTAMA', 'BENDEL PERTAMA'),
(70, 288, 13, 'BENDEL KEDUA', 'BENDEL KEDUA'),
(71, 321, 17, 'BENDEL PERTAMA', 'BENDEL PERTAMA'),
(72, 321, 17, 'BENDEL KEDUA', 'BENDEL KEDUA'),
(73, 336, 12, 'asn', 'asn'),
(74, 336, 12, 'kdh', 'kdh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(6, 1, 'created_at', 'created_at', 'timestamp', 'yes', '', '', 'yes', 3, '', '', ''),
(5, 1, 'nama_berkas', 'nama_berkas', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4, 1, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(377, 2, 'verifikator2', 'verifikator2', 'select', 'yes', 'yes', 'yes', 'yes', 6, 'v_verifikator2', 'id', 'full_name'),
(11, 3, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(12, 3, 'nama_program', 'nama_program', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(13, 4, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(14, 4, 'program', 'program', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'program', 'id', 'nama_program'),
(15, 4, 'nama_kegiatan', 'nama_kegiatan', 'input', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(277, 5, 'bagian', 'bagian', 'select', 'yes', 'yes', 'yes', 'yes', 4, 'masterbagian', 'id', 'nama_bagian'),
(276, 5, 'sub_kegiatan', 'sub_kegiatan', 'input', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(275, 5, 'kegiatan', 'kegiatan', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'kegiatan', 'id', 'nama_kegiatan'),
(23, 6, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(24, 6, 'jenis_verifikator', 'jenis_verifikator', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(161, 8, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(151, 7, 'tanggal_sp2d', 'tanggal_sp2d', 'date', 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(148, 7, 'jenis_pengajuan', 'jenis_pengajuan', 'custom_option', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(149, 7, 'tanggal_pengembalian_berkas', 'tanggal_pengembalian_berkas', 'date', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(150, 7, 'no_sp2d', 'no_sp2d', 'input', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(144, 7, 'sub_kegiatan', 'sub_kegiatan', 'select', 'yes', 'yes', 'yes', 'yes', 3, 'sub_kegiatan', 'id', 'sub_kegiatan'),
(145, 7, 'bagian', 'bagian', 'select', 'yes', 'yes', 'yes', 'yes', 4, 'masterbagian', 'id', 'nama_bagian'),
(147, 7, 'nilai_ajuan', 'nilai_ajuan', 'number', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(169, 8, 'keterangan_tindaklanjut', 'Keterangan tindak lanjut', 'textarea', 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(168, 8, 'tindak_lanjut', 'tindak_lanjut', 'custom_option', 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(166, 8, 'catatan', 'catatan', 'textarea', 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(167, 8, 'verifikator', 'verifikator', 'select', 'yes', 'yes', 'yes', 'yes', 7, 'v_group', 'id', 'name'),
(165, 8, 'terima_bukti_dari_bpp', 'terima_bukti_dari_bpp', 'custom_option', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(164, 8, 'upload_bukti', 'upload_bukti', 'file_multiple', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(146, 7, 'tanggal_terima_berkas', 'tanggal_terima_berkas', 'date', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(142, 7, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(143, 7, 'uraian', 'uraian', 'textarea', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(163, 8, 'hasil_koreksi', 'hasil_koreksi', 'textarea', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(162, 8, 'spj', 'Pangajuan SPJ', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'registerspj', 'id', 'uraian'),
(152, 7, 'posisi_berkas', 'posisi_berkas', 'select', 'yes', 'yes', 'yes', 'yes', 11, 'v_group', 'id', 'name'),
(250, 9, 'tanggal_spm', 'tanggal_spm', 'date', '', 'yes', 'yes', 'yes', 13, '', '', ''),
(247, 9, 'no_spp', 'no_spp', 'input', '', 'yes', 'yes', 'yes', 10, '', '', ''),
(249, 9, 'no_spm', 'no_spm', 'input', '', 'yes', 'yes', 'yes', 12, '', '', ''),
(248, 9, 'tanggal_spp', 'tanggal_spp', 'date', '', 'yes', 'yes', 'yes', 11, '', '', ''),
(246, 9, 'tanggal_bku', 'tanggal_bku', 'date', '', 'yes', 'yes', 'yes', 9, '', '', ''),
(245, 9, 'no_pengantar', 'no_pengantar', 'input', '', 'yes', 'yes', 'yes', 8, '', '', ''),
(244, 9, 'nominal', 'nominal', 'number', 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(241, 9, 'no_spj', 'no_spj', 'input', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(242, 9, 'tanggal_pengajuan', 'tanggal_pengajuan', 'date', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(243, 9, 'jenis_pengajuan', 'jenis_pengajuan', 'select', 'yes', 'yes', 'yes', 'yes', 6, 'jenis_pengajuan', 'jenis_pengajuan', 'jenis_pengajuan'),
(240, 9, 'sub_kegiatan', 'sub_kegiatan', 'select', 'yes', 'yes', 'yes', 'yes', 3, 'sub_kegiatan', 'id', 'sub_kegiatan'),
(239, 9, 'bagian', 'bagian', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'masterbagian', 'id', 'nama_bagian'),
(238, 9, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(212, 10, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(213, 10, 'jenis_pengajuan', 'jenis_pengajuan', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(251, 9, 'tanggal_pengembalian', 'tanggal_pengembalian', 'date', '', 'yes', 'yes', 'yes', 14, '', '', ''),
(264, 11, 'uraian', 'uraian', 'textarea', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(265, 11, 'dicukupi', 'dicukupi', 'custom_select', 'yes', '', 'yes', 'yes', 4, '', '', ''),
(266, 11, 'verifikator', 'verifikator', 'input', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(376, 2, 'verifikator', 'verifikator', 'select', 'yes', 'yes', 'yes', 'yes', 5, 'v_verifikator', 'id', 'full_name'),
(263, 11, 'spj', 'spj', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'register_spj', 'id', 'no_spj'),
(262, 11, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(274, 5, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(278, 5, 'pagu_anggaran', 'pagu_anggaran', 'number', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(334, 12, 'jenis_ajuan_gaji', 'jenis_ajuan_gaji', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(286, 13, 'nama_berkas', 'nama_berkas', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(287, 13, 'jenis_pengajuan', 'jenis_pengajuan', 'select', 'yes', 'yes', 'yes', 'yes', 3, 'jenis_ajuan_gaji', 'jenis_ajuan_gaji', 'jenis_ajuan_gaji'),
(285, 13, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(288, 13, 'bendel', 'bendel', 'custom_select', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(333, 12, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(315, 14, 'sub_kegiatan', 'sub_kegiatan', 'select', 'yes', 'yes', 'yes', 'yes', 4, 'sub_kegiatan', 'id', 'sub_kegiatan'),
(314, 14, 'nominal', 'nominal', 'number', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(312, 14, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(313, 14, 'tanggal_pb', 'tanggal_pb', 'date', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(311, 15, 'sub_kegiatan', 'sub_kegiatan', 'select', 'yes', 'yes', 'yes', 'yes', 4, 'sub_kegiatan', 'id', 'sub_kegiatan'),
(310, 15, 'nominal', 'nominal', 'input', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(308, 15, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(309, 15, 'tanggal_setor', 'tanggal_setor', 'date', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(316, 16, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(317, 16, 'nama_ceklist', 'nama_ceklist', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(318, 17, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(319, 17, 'nama_berkas', 'nama_berkas', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(320, 17, 'jenis_ceklist', 'jenis_ceklist', 'select', 'yes', 'yes', 'yes', 'yes', 3, 'list_ceklist', 'id', 'nama_ceklist'),
(321, 17, 'bendel', 'bendel', 'custom_select', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(325, 18, 'nama', 'nama', 'file_multiple', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(324, 18, 'id', 'id', 'number', 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(330, 19, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(331, 19, 'nama', 'nama', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(332, 19, 'lampiran', 'lampiran', 'file_multiple', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(335, 12, 'uraian', 'uraian', 'textarea', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(336, 12, 'jenis_gaji', 'jenis_gaji', 'custom_option', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(337, 20, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(338, 20, 'user', 'user', 'current_user_id', 'yes', 'yes', '', 'yes', 2, '', '', ''),
(339, 20, 'judul', 'judul', 'input', 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(340, 20, 'konten', 'konten', 'editor_wysiwyg', 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(341, 20, 'waktu', 'waktu', 'timestamp', 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(374, 2, 'bpp', 'bpp', 'select', 'yes', 'yes', 'yes', 'yes', 3, 'user_bpp', 'id', 'full_name'),
(375, 2, 'pptk', 'pptk', 'select_multiple', 'yes', 'yes', 'yes', 'yes', 4, 'user_pptk', 'id', 'full_name'),
(372, 2, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(373, 2, 'nama_bagian', 'nama_bagian', 'input', 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(382, 21, 'id', 'id', 'number', '', '', '', 'yes', 1, '', '', ''),
(383, 21, 'ppk_skpd', 'ppk_skpd', 'select', 'yes', 'yes', 'yes', 'yes', 2, 'v_ppk', 'id', 'full_name');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_configuration`
--

CREATE TABLE `crud_field_configuration` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `group_config` varchar(200) NOT NULL,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(2, 5, 1, 'required', ''),
(173, 373, 2, 'required', ''),
(5, 12, 3, 'required', ''),
(6, 14, 4, 'required', ''),
(7, 15, 4, 'required', ''),
(127, 276, 5, 'required', ''),
(126, 275, 5, 'required', ''),
(12, 24, 6, 'required', ''),
(51, 148, 7, 'required', ''),
(50, 147, 7, 'required', ''),
(49, 146, 7, 'required', ''),
(48, 145, 7, 'required', ''),
(47, 144, 7, 'required', ''),
(53, 162, 8, 'required', ''),
(134, 288, 13, 'required', ''),
(133, 287, 13, 'required', ''),
(132, 286, 13, 'required', ''),
(162, 334, 12, 'required', ''),
(116, 244, 9, 'required', ''),
(122, 264, 11, 'required', ''),
(121, 263, 11, 'required', ''),
(99, 213, 10, 'required', ''),
(115, 243, 9, 'required', ''),
(114, 242, 9, 'required', ''),
(113, 241, 9, 'required', ''),
(112, 240, 9, 'required', ''),
(111, 239, 9, 'required', ''),
(153, 315, 14, 'required', ''),
(152, 314, 14, 'required', ''),
(151, 313, 14, 'required', ''),
(150, 311, 15, 'required', ''),
(149, 310, 15, 'required', ''),
(148, 309, 15, 'required', ''),
(154, 317, 16, 'required', ''),
(155, 319, 17, 'required', ''),
(156, 320, 17, 'required', ''),
(157, 321, 17, 'required', ''),
(159, 324, 18, 'required', ''),
(160, 325, 18, 'required', ''),
(163, 338, 20, 'required', ''),
(164, 339, 20, 'required', ''),
(165, 340, 20, 'required', ''),
(166, 341, 20, 'required', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_chained`
--

CREATE TABLE `crud_input_chained` (
  `id` int(11) UNSIGNED NOT NULL,
  `chain_field` varchar(250) DEFAULT NULL,
  `chain_field_eq` varchar(250) DEFAULT NULL,
  `crud_field_id` int(11) DEFAULT NULL,
  `crud_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_input_type`
--

INSERT INTO `crud_input_type` (`id`, `type`, `relation`, `custom_value`, `validation_group`) VALUES
(1, 'input', '0', 0, 'input'),
(2, 'textarea', '0', 0, 'text'),
(3, 'select', '1', 0, 'select'),
(4, 'editor_wysiwyg', '0', 0, 'editor'),
(5, 'password', '0', 0, 'password'),
(6, 'email', '0', 0, 'email'),
(7, 'address_map', '0', 0, 'address_map'),
(8, 'file', '0', 0, 'file'),
(9, 'file_multiple', '0', 0, 'file_multiple'),
(10, 'datetime', '0', 0, 'datetime'),
(11, 'date', '0', 0, 'date'),
(12, 'timestamp', '0', 0, 'timestamp'),
(13, 'number', '0', 0, 'number'),
(14, 'yes_no', '0', 0, 'yes_no'),
(15, 'time', '0', 0, 'time'),
(16, 'year', '0', 0, 'year'),
(17, 'select_multiple', '1', 0, 'select_multiple'),
(18, 'checkboxes', '1', 0, 'checkboxes'),
(19, 'options', '1', 0, 'options'),
(20, 'true_false', '0', 0, 'true_false'),
(21, 'current_user_username', '0', 0, 'user_username'),
(22, 'current_user_id', '0', 0, 'current_user_id'),
(23, 'custom_option', '0', 1, 'custom_option'),
(24, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(25, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(26, 'custom_select', '0', 1, 'custom_select'),
(27, 'chained', '1', 0, 'chained');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_validation`
--

CREATE TABLE `crud_input_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crud_input_validation`
--

INSERT INTO `crud_input_validation` (`id`, `validation`, `input_able`, `group_input`, `input_placeholder`, `call_back`, `input_validation`) VALUES
(1, 'required', 'no', 'input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple, chained', '', '', ''),
(2, 'max_length', 'yes', 'input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map', '', '', 'numeric'),
(3, 'min_length', 'yes', 'input, number, text, select, password, email, editor, time, year, select_multiple, address_map', '', '', 'numeric'),
(4, 'valid_email', 'no', 'input, email', '', '', ''),
(5, 'valid_emails', 'no', 'input, email', '', '', ''),
(6, 'regex', 'yes', 'input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes', '', 'yes', 'callback_valid_regex'),
(7, 'decimal', 'no', 'input, number, text, select', '', '', ''),
(8, 'allowed_extension', 'yes', 'file, file_multiple', 'ex : jpg,png,..', '', 'callback_valid_extension_list'),
(9, 'max_width', 'yes', 'file, file_multiple', '', '', 'numeric'),
(10, 'max_height', 'yes', 'file, file_multiple', '', '', 'numeric'),
(11, 'max_size', 'yes', 'file, file_multiple', '... kb', '', 'numeric'),
(12, 'max_item', 'yes', 'file_multiple', '', '', 'numeric'),
(13, 'valid_url', 'no', 'input, text', '', '', ''),
(14, 'alpha', 'no', 'input, text, select, password, editor, yes_no', '', '', ''),
(15, 'alpha_numeric', 'no', 'input, number, text, select, password, editor', '', '', ''),
(16, 'alpha_numeric_spaces', 'no', 'input, number, text,select, password, editor', '', '', ''),
(17, 'valid_number', 'no', 'input, number, text, password, editor, true_false', '', 'yes', ''),
(18, 'valid_datetime', 'no', 'input, datetime, text', '', 'yes', ''),
(19, 'valid_date', 'no', 'input, datetime, date, text', '', 'yes', ''),
(20, 'valid_max_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(21, 'valid_min_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(22, 'valid_alpha_numeric_spaces_underscores', 'no', 'input, text,select, password, editor', '', 'yes', ''),
(23, 'matches', 'yes', 'input, number, text, password, email', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(24, 'valid_json', 'no', 'input, text, editor', '', 'yes', ' '),
(25, 'valid_url', 'no', 'input, text, editor', '', 'no', ' '),
(26, 'exact_length', 'yes', 'input, text, number', '0 - 99999*', 'no', 'numeric'),
(27, 'alpha_dash', 'no', 'input, text', '', 'no', ''),
(28, 'integer', 'no', 'input, text, number', '', 'no', ''),
(29, 'differs', 'yes', 'input, text, number, email, password, editor, options, select', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(30, 'is_natural', 'no', 'input, text, number', '', 'no', ''),
(31, 'is_natural_no_zero', 'no', 'input, text, number', '', 'no', ''),
(32, 'less_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(33, 'less_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(34, 'greater_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(35, 'greater_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(36, 'in_list', 'yes', 'input, text, number, select, options', '', 'no', 'callback_valid_multiple_value'),
(37, 'valid_ip', 'no', 'input, text', '', 'no', '');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `dashboard`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `dashboard` (
`nama_bagian` varchar(255)
,`jumlah_gu` bigint(21)
,`jumlah_ls` bigint(21)
,`nominal_gu` double
,`nominal_ls` double
,`pagu_anggaran` double
,`penyerapan_anggaran` double(19,2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_attribute`
--

CREATE TABLE `form_custom_attribute` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_option`
--

CREATE TABLE `form_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field`
--

CREATE TABLE `form_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field_validation`
--

CREATE TABLE `form_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ajuan_gaji`
--

CREATE TABLE `jenis_ajuan_gaji` (
  `id` int(11) NOT NULL,
  `jenis_ajuan_gaji` varchar(255) NOT NULL,
  `uraian` text NOT NULL,
  `jenis_gaji` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis_ajuan_gaji`
--

INSERT INTO `jenis_ajuan_gaji` (`id`, `jenis_ajuan_gaji`, `uraian`, `jenis_gaji`) VALUES
(3, 'LS - Gaji Induk', 'Gaji Induk', 'asn'),
(2, 'LS - Gaji Susulan', 'Gaji Susulan', 'asn'),
(11, 'LS - Gaji TPP P3K', 'Tambahan Penghasilan Pegawai Pemerintah dengan Perjanjian Kerja', 'asn'),
(6, 'LS - Gaji Terusan', 'Gaji Terusan', 'asn'),
(7, 'LS - Gaji Kekurangan Gaji', ' Kekurangan Gaji', 'asn'),
(8, 'LS - Gaji KDH/WKDH', 'Gaji KDH/WKDH', 'kdh'),
(9, 'LS - Gaji TPP PNS', 'Tambahan Penghasilan PNS', 'asn'),
(12, 'LS - Gaji BPO KDH/WKDH', 'Biaya Penunjang Operasional KDH/WKDH', 'kdh'),
(13, 'LS - Gaji Insentif KDH/WKDH', 'Insentif  atas pemungutan pajak dan retribusi daerah bagi KDH/WKDH', 'kdh'),
(14, 'LS - Gaji dan Tunjangan Bupati dan Wakil Bupati', 'Gaji dan Tunjangan Bupati dan Wakil Bupati', 'kdh'),
(15, 'LS - Gaji Biaya Penunjang Operasional Bupati dan Wakil Bupati', 'Biaya Penunjang Operasional Bupati dan Wakil Bupati', 'kdh'),
(16, 'LS - Gaji Insentif Pajak dan Retribusi Daerah Bupati dan Wakil Bupati', 'LS-Insentif Pajak dan Retribusi Daerah bagi Bupati dan Wakil Bupati', 'kdh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengajuan`
--

CREATE TABLE `jenis_pengajuan` (
  `id` int(11) NOT NULL,
  `jenis_pengajuan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis_pengajuan`
--

INSERT INTO `jenis_pengajuan` (`id`, `jenis_pengajuan`) VALUES
(1, 'GU'),
(2, 'LS'),
(3, 'TU');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jumlah_verifikasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jumlah_verifikasi` (
`spj` int(11)
,`jumlah_catatan` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `program`, `nama_kegiatan`) VALUES
(1, 1, 'Kegiatan Perencanaan, Anggaran, dan Evaluasi Kinerja Perangkat Daerah'),
(2, 1, 'Kegiatan Administrasi Keuangan Perangkat Daerah'),
(3, 1, 'Kegiatan Administrasi Barang Milik Daerah Pada Perangkat Daerah'),
(4, 1, 'Kegiatan Administrasi Kepegawaian Perangkat Daerah'),
(5, 1, 'Kegiatan Administrasi Umum Perangkat Daerah'),
(6, 1, 'Kegiatan Pengadaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah'),
(7, 1, 'Kegiatan Penyediaan Jasa Penunjang Urusan Pemerintah Daerah'),
(8, 1, 'Kegiatan Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah'),
(9, 1, 'Kegiatan Fasilitasi Kerumahtanggaan Sekretariat Daerah'),
(10, 1, 'Kegiatan Penataan Organisasi'),
(11, 1, 'Kegiatan Pelaksanaan Protokol dan Komunikasi Pimpinan'),
(12, 2, 'Kegiatan Administrasi Tata Pemerintahan'),
(13, 2, 'Kegiatan Pelaksanaan Kebijakan kesejahteraan Rakyat'),
(14, 2, 'Kegiatan Fasilitas dan Koordinasi Hukum'),
(15, 2, 'Kegiatan Pelaksanaan Kebijakan Perekonomian'),
(16, 3, 'Kegiatan Pelaksanaan Kebijakan Perekonomian'),
(17, 3, 'Kegiatan Pemantauan Kebijakan terkait Sumber Daya Alam'),
(18, 3, 'Kegiatan Pelaksanaan Administrasi Pembangunan'),
(19, 3, 'Kegiatan Pengelolaan Pengadaan Barang dan Jasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '4990647380BF66ACBBF3726C34CC05F6', 0, 0, 0, NULL, '2024-06-01 23:49:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komen_bantuan`
--

CREATE TABLE `komen_bantuan` (
  `id` int(11) NOT NULL,
  `id_bantuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komen_bantuan`
--

INSERT INTO `komen_bantuan` (`id`, `id_bantuan`, `id_user`, `komentar`, `waktu`) VALUES
(1, 3, 3, 'Tanya ke bu iva', '2025-11-11 02:39:23'),
(2, 3, 19, 'Baik terima kasih', '2025-11-11 02:55:04');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporanbulanan_bagian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporanbulanan_bagian` (
`bulan` varchar(14)
,`tahun` int(4)
,`nama_bagian` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporanbulanan_bagian_sub`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporanbulanan_bagian_sub` (
`bulan` varchar(14)
,`tahun` int(4)
,`nama_bagian` varchar(255)
,`sub_kegiatan` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporanharian_bagian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporanharian_bagian` (
`tanggal_pengajuan` date
,`nama_bagian` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporanharian_bagian_sub`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporanharian_bagian_sub` (
`tanggal_pengajuan` date
,`nama_bagian` varchar(255)
,`sub_kegiatan` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_bagian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_bagian` (
`nama_bagian` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_kegiatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_kegiatan` (
`nama_program` varchar(255)
,`nama_kegiatan` varchar(255)
,`pagu_anggaran` double
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
,`penyerapan_anggaran` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_program`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_program` (
`nama_program` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`jumlah_nominal` double
,`pagu_anggaran` double
,`penyerapan_anggaran` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_rekap_subkegiatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_rekap_subkegiatan` (
`bulan` varchar(7)
,`nama_bagian` varchar(255)
,`nama_sub_kegiatan` varchar(255)
,`jumlah_gu` bigint(21)
,`jumlah_ls` bigint(21)
,`nominal_gu` double
,`nominal_ls` double
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_subkegiatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_subkegiatan` (
`nama_program` varchar(255)
,`nama_kegiatan` varchar(255)
,`sub_kegiatan` varchar(255)
,`jumlah_pengajuan` bigint(21)
,`pagu_anggaran` double
,`jumlah_nominal` double
,`penyerapan_anggaran` double(19,2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_ceklist`
--

CREATE TABLE `list_ceklist` (
  `id` int(11) NOT NULL,
  `nama_ceklist` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_ceklist`
--

INSERT INTO `list_ceklist` (`id`, `nama_ceklist`) VALUES
(1, 'Swakelola II, III, IV (100%)'),
(2, 'LS DIATAS 100 JT JS KONSULTASI (100%)'),
(3, 'LS s/d 200 Jt (Pekerjaan Konstruksi)'),
(4, 'LS TERMIN I,II,III s/d 200 JT (JASA KONSTRUKSI)'),
(5, 'LS s/d 10 JT BARANG & JASA'),
(6, 'GAJI'),
(7, 'GAJI SUSULAN PINDAHAN/CPNS/KEKURANGAN GAJI'),
(8, 'LS ATAS NAMA BENDAHARA (TPP)'),
(9, 'UP'),
(10, 'TU'),
(11, 'NIHIL - TU'),
(12, 'GU'),
(13, 'NIHIL - GU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterbagian`
--

CREATE TABLE `masterbagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL,
  `bpp` varchar(255) NOT NULL,
  `pptk` varchar(255) DEFAULT NULL,
  `verifikator` varchar(255) DEFAULT NULL,
  `verifikator2` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `masterbagian`
--

INSERT INTO `masterbagian` (`id`, `nama_bagian`, `bpp`, `pptk`, `verifikator`, `verifikator2`) VALUES
(1, 'Tata Pemerintahan', '15', '19', '33', ''),
(2, 'Hukum', '7', '20', '34', ''),
(3, 'Kesejahteraan Rakyat', '14', '21', '8', ''),
(4, 'Perekonomian dan Sumber Daya Alam', '13', '22', '31', ''),
(5, 'Administrasi Pembangunan', '12', '23', '33', ''),
(6, 'Pengadaan Barang dan Jasa', '11', '24', '8', ''),
(7, 'Organisasi', '10', '25', '8', ''),
(9, 'Umum', '9', '26', '36', ''),
(10, 'Protokol dan Komunikasi Pimpinan', '5', '27', '30', ''),
(11, 'Perencanaan dan Keuangan', '8', '28', '8', ''),
(12, 'Kerjasama', '29', '', '34', '35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterberkas`
--

CREATE TABLE `masterberkas` (
  `id` int(11) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `masterberkas`
--

INSERT INTO `masterberkas` (`id`, `nama_berkas`, `created_at`) VALUES
(1, 'NPD', '2024-06-02 07:27:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_ppk_skpd`
--

CREATE TABLE `master_ppk_skpd` (
  `id` int(11) NOT NULL,
  `ppk_skpd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_ppk_skpd`
--

INSERT INTO `master_ppk_skpd` (`id`, `ppk_skpd`) VALUES
(1, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', '', '{admin_url}/dashboard', 1, 0, '', 1, 1),
(2, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 2, 0, 'fa-dashboard', 1, 1),
(3, 'CRUD Builder', 'menu', '', '{admin_url}/crud', 82, 24, 'fa-table', 1, 1),
(4, 'API Builder', 'menu', '', '{admin_url}/rest', 84, 24, 'fa-code', 1, 1),
(5, 'Page Builder', 'menu', '', '{admin_url}/page', 85, 24, 'fa-file-o', 1, 1),
(6, 'Form Builder', 'menu', '', '{admin_url}/form', 86, 24, 'fa-newspaper-o', 1, 1),
(7, 'Blog', 'menu', '', '{admin_url}/blog', 87, 24, 'fa-file-text-o', 1, 1),
(8, 'Menu', 'menu', '', '{admin_url}/menu', 83, 24, 'fa-bars', 1, 1),
(9, 'Auth', 'menu', '', '', 75, 0, 'fa-shield', 1, 1),
(10, 'User', 'menu', '', '{admin_url}/user', 76, 9, '', 1, 1),
(11, 'Groups', 'menu', '', '{admin_url}/group', 77, 9, '', 1, 1),
(12, 'Access', 'menu', '', '{admin_url}/access', 78, 9, '', 1, 1),
(13, 'Permission', 'menu', '', '{admin_url}/permission', 79, 9, '', 1, 1),
(14, 'API Keys', 'menu', '', '{admin_url}/keys', 80, 9, '', 1, 1),
(15, 'Extension', 'menu', '', '{admin_url}/extension', 88, 24, 'fa-puzzle-piece', 1, 1),
(16, 'Database', 'menu', '', '{admin_url}/database', 89, 24, 'fa-database', 1, 1),
(17, 'OTHER', 'label', '', '', 91, 24, '', 1, 1),
(18, 'Settings', 'menu', 'text-red', '{admin_url}/setting', 90, 24, 'fa-circle-o', 1, 1),
(19, 'Web Documentation', 'menu', 'text-blue', '{admin_url}/doc/web', 92, 24, 'fa-circle-o', 1, 1),
(20, 'API Documentation', 'menu', 'text-yellow', '{admin_url}/doc/api', 93, 24, 'fa-circle-o', 1, 1),
(21, 'Home', 'menu', '', '/', 1, 0, '', 2, 1),
(22, 'Blog', 'menu', '', 'blog', 4, 0, '', 2, 1),
(23, 'Dashboard', 'menu', '', 'administrator/dashboard', 5, 0, '', 2, 1),
(24, 'Builder', 'menu', 'text-blue', '#', 81, 0, 'fa-gear', 1, 1),
(25, 'Master Data', 'menu', 'text-red', '#', 20, 0, 'fa-tv', 1, 1),
(27, 'Bagian', 'menu', 'text-red', 'administrator/masterbagian', 21, 25, '', 1, 1),
(28, 'Berkas', 'menu', 'text-red', 'administrator/masterberkas', 22, 25, '', 1, 0),
(32, 'Program Kegiatan', 'menu', 'text-red', '#', 23, 25, '', 1, 1),
(33, 'Program', 'menu', 'text-yellow', 'administrator/program', 24, 32, '', 1, 1),
(34, 'Kegiatan', 'menu', 'text-yellow', 'administrator/kegiatan', 25, 32, '', 1, 1),
(35, 'Sub Kegiatan', 'menu', 'text-yellow', 'administrator/sub_kegiatan', 26, 32, '', 1, 1),
(36, 'Logout', 'menu', 'default', 'administrator/auth/logout', 95, 0, 'fa-sign-out', 1, 1),
(57, 'Laporan', 'menu', 'default', '#', 33, 0, 'fa-rocket', 1, 1),
(38, 'Register SPJ', 'menu', 'text-aqua', '#', 3, 0, 'fa-database', 1, 1),
(47, 'Bagian Organisasi', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=7&f=bagian&sbtn=Apply', 8, 38, '', 1, 1),
(50, 'Bagian PBJ', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=6&f=bagian&sbtn=Apply', 9, 38, '', 1, 1),
(46, 'Bagian Umum', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=9&f=bagian&sbtn=Apply', 7, 38, '', 1, 1),
(44, 'All Register', 'menu', 'default', 'administrator/register_spj', 4, 38, '', 1, 1),
(45, 'Bagian Prokopim', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=10&f=bagian&sbtn=Apply', 6, 38, '', 1, 1),
(43, 'Bagian Perkeu', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=11&f=bagian&sbtn=Apply', 5, 38, '', 1, 1),
(51, 'Bagian Adm Pembangunan', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=5&f=bagian&sbtn=Apply', 10, 38, '', 1, 1),
(52, 'Bagian Perekonomian', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=4&f=bagian&sbtn=Apply', 11, 38, '', 1, 1),
(53, 'Bagian Kesra', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=3&f=bagian&sbtn=Apply', 12, 38, '', 1, 1),
(54, 'Bagian Hukum', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=2&f=bagian&sbtn=Apply', 13, 38, '', 1, 1),
(56, 'Bagian Tata Pemerintahan', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=1&f=bagian&sbtn=Apply', 14, 38, '', 1, 1),
(58, 'Harian', 'menu', 'default', '#', 34, 57, '', 1, 1),
(59, 'Per Bagian', 'menu', 'default', 'administrator/laporan/harian', 35, 58, '', 1, 1),
(60, 'Per Sub Kegiatan', 'menu', 'default', 'administrator/laporan/hariansub', 36, 58, '', 1, 1),
(61, 'Bulanan', 'menu', 'default', '#', 37, 57, '', 1, 1),
(63, 'Per Bagian', 'menu', 'default', 'administrator/laporan/bulanan', 38, 61, '', 1, 1),
(64, 'Per Sub Kegiatan', 'menu', 'default', 'administrator/laporan/bulanansub', 39, 61, '', 1, 1),
(65, 'Sub Kegiatan', 'menu', 'default', 'administrator/laporan/subkegiatan', 44, 67, '', 1, 1),
(66, 'Bagian', 'menu', 'default', 'administrator/laporan/bagian', 40, 57, '', 1, 1),
(67, 'Program Kegiatan', 'menu', 'default', '#', 41, 57, '', 1, 1),
(68, 'Program', 'menu', 'default', 'administrator/laporan/program', 42, 67, '', 1, 1),
(69, 'Kegiatan', 'menu', 'default', 'administrator/laporan/kegiatan', 43, 67, '', 1, 1),
(70, 'User Profil', 'menu', 'default', 'administrator/user/profile', 94, 0, 'fa-user', 1, 1),
(71, 'Jenis Ajuan', 'menu', 'default', 'administrator/jenis_pengajuan', 27, 25, '', 1, 1),
(72, 'Gaji dan Tunjangan', 'menu', 'default', '#', 17, 0, 'fa-money', 1, 1),
(73, 'Berkas Ajuan Gaji', 'menu', 'default', 'administrator/berkas_pengajuan', 28, 25, '', 1, 1),
(74, 'Jenis Ajuan Gaji', 'menu', 'default', 'administrator/jenis_ajuan_gaji', 29, 25, '', 1, 1),
(75, 'Rekonsiliasi Saldo Bank', 'menu', 'default', '#', 45, 0, 'fa-gg-circle', 1, 1),
(76, 'PB', 'menu', 'default', 'administrator/setorpb', 46, 75, '', 1, 1),
(77, 'STS', 'menu', 'default', 'administrator/setorbalik', 58, 75, '', 1, 1),
(78, 'Perencanaan dan Keuangan', 'menu', 'default', 'administrator/setorbalik/bagian/11', 60, 77, '', 1, 1),
(79, 'Protokol dan Komunikasi Pimpinan', 'menu', 'default', 'administrator/setorbalik/bagian/10', 61, 77, '', 1, 1),
(80, 'Umum', 'menu', 'default', 'administrator/setorbalik/bagian/9', 62, 77, '', 1, 1),
(81, 'Organisasi', 'menu', 'default', 'administrator/setorbalik/bagian/7', 63, 77, '', 1, 1),
(88, 'Rekonsiliasi Saldo -', 'menu', 'default', '#', 71, 0, 'fa-opera', 1, 0),
(82, 'Pengadaan Barang dan Jasa', 'menu', 'default', 'administrator/setorbalik/bagian/6', 64, 77, '', 1, 1),
(83, 'Administrasi Pembangunan', 'menu', 'default', 'administrator/setorbalik/bagian/5', 65, 77, '', 1, 1),
(84, 'Perekonomian', 'menu', 'default', 'administrator/setorbalik/bagian/4', 66, 77, '', 1, 1),
(85, 'Kesejahteraan Rakyat', 'menu', 'default', 'administrator/setorbalik/bagian/3', 67, 77, '', 1, 1),
(86, 'Hukum', 'menu', 'default', 'administrator/setorbalik/bagian/2', 68, 77, '', 1, 1),
(87, 'Tata Pemerintahan', 'menu', 'default', 'administrator/setorbalik/bagian/1', 69, 77, '', 1, 1),
(89, 'Pemindah Bukuan -', 'menu', 'default', 'administrator/setorpb', 72, 88, '', 1, 1),
(90, 'Setor Balik', 'menu', 'default', 'administrator/setorbalik', 73, 88, '', 1, 1),
(91, 'Perencanaan dan Keuangan', 'menu', 'default', 'administrator/setorpb/bagian/11', 48, 76, '', 1, 1),
(92, 'Protokol dan Komunikasi Pimpinan', NULL, 'default', 'administrator/setorpb/bagian/10', 49, 76, '', 1, 1),
(93, 'Umum', NULL, 'default', 'administrator/setorpb/bagian/9', 50, 76, '', 1, 1),
(94, 'Organisasi', NULL, 'default', 'administrator/setorpb/bagian/7', 51, 76, '', 1, 1),
(95, 'Pengadaan Barang dan Jasa', NULL, 'default', 'administrator/setorpb/bagian/6', 52, 76, '', 1, 1),
(96, 'Administrasi Pembangunan', NULL, 'default', 'administrator/setorpb/bagian/5', 53, 76, '', 1, 1),
(97, 'Perekonomian', NULL, 'default', 'administrator/setorpb/bagian/4', 54, 76, '', 1, 1),
(98, 'Kesejahteraan Rakyat', NULL, 'default', 'administrator/setorpb/bagian/3', 55, 76, '', 1, 1),
(99, 'Hukum', NULL, 'default', 'administrator/setorpb/bagian/2', 56, 76, '', 1, 1),
(100, 'Tata Pemerintahan', NULL, 'default', 'administrator/setorpb/bagian/1', 57, 76, '', 1, 1),
(101, 'Ceklist', 'menu', 'default', '#', 30, 25, '', 1, 1),
(102, 'List', 'menu', 'default', 'administrator/list_ceklist', 31, 101, '', 1, 1),
(103, 'Berkas', 'menu', 'default', 'administrator/berkas_ceklist', 32, 101, '', 1, 1),
(104, 'All PB', 'menu', 'default', 'administrator/setorpb', 47, 76, '', 1, 1),
(105, 'All STS', 'menu', 'default', 'administrator/setorbalik', 59, 77, '', 1, 1),
(107, 'ASN', 'menu', 'default', 'administrator/gaji/asn', 18, 72, '', 1, 1),
(106, 'Realisasi Final', 'menu', 'default', 'administrator/laporan/realisasifinal', 70, 75, '', 1, 1),
(108, 'KDH/WKDH', 'menu', 'default', 'administrator/gaji/kdh', 19, 72, '', 1, 1),
(109, 'Helpdesk', 'menu', 'default', 'administrator/bantuan', 74, 0, 'fa-question-circle', 1, 1),
(110, 'Rekap Ajuan SPJ', 'menu', 'default', 'administrator/laporan/rekapspj', 16, 38, '', 1, 1),
(111, 'Bagian Kerjasama', 'menu', 'default', 'administrator/register_spj/index?bulk=&q=12&f=bagian&sbtn=Apply', 15, 38, '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `definition`) VALUES
(1, 'side menu', NULL),
(2, 'top menu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text,
  `description` text,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_block_element`
--

CREATE TABLE `page_block_element` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `nama_program`) VALUES
(1, 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA'),
(2, 'PROGRAM PEMERINTAHAN DAN KESEJAHTERAAN'),
(3, 'PROGRAM PEREKONOMIAN DAN PEMBANGUNAN');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `realisasi_final`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `realisasi_final` (
`tanggal` date
,`nama_bagian` varchar(255)
,`nama_sub_kegiatan` varchar(255)
,`nominal_pb` decimal(41,0)
,`nominal_sts` double
,`total` double
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `register_spj`
--

CREATE TABLE `register_spj` (
  `id` int(11) NOT NULL,
  `bagian` int(11) NOT NULL,
  `sub_kegiatan` int(11) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jenis_pengajuan` varchar(255) NOT NULL,
  `nominal` double NOT NULL,
  `no_pengantar` varchar(255) NOT NULL,
  `no_spj` int(11) NOT NULL,
  `tanggal_bku` date NOT NULL,
  `no_spp` varchar(255) NOT NULL,
  `tanggal_spp` date NOT NULL,
  `no_spm` varchar(255) NOT NULL,
  `tanggal_spm` date NOT NULL,
  `tanggal_sp2d` date DEFAULT NULL,
  `no_sp2d` varchar(255) DEFAULT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `no_bku` varchar(255) DEFAULT NULL,
  `ceklist` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rekap_verifikasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rekap_verifikasi` (
`spj` int(11)
,`total_verifikator` bigint(21)
,`jumlah_verifikator_sudah_tercukupi` decimal(23,0)
,`status_verifikasi` varchar(19)
,`warna_status` varchar(7)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest`
--

CREATE TABLE `rest` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field`
--

CREATE TABLE `rest_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_api` varchar(10) DEFAULT NULL,
  `show_update_api` varchar(10) DEFAULT NULL,
  `show_detail_api` varchar(10) DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rest_input_type`
--

INSERT INTO `rest_input_type` (`id`, `type`, `relation`, `validation_group`) VALUES
(1, 'input', '0', 'input'),
(2, 'timestamp', '0', 'timestamp'),
(3, 'file', '0', 'file'),
(4, 'select', '1', 'select');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setorbalik`
--

CREATE TABLE `setorbalik` (
  `id` int(11) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `nominal` double NOT NULL,
  `sub_kegiatan` int(11) NOT NULL,
  `lampiran` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setorpb`
--

CREATE TABLE `setorpb` (
  `id` int(11) NOT NULL,
  `tanggal_pb` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `sub_kegiatan` int(11) NOT NULL,
  `lampiran` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `sub_kegiatan` varchar(255) NOT NULL,
  `bagian` int(11) DEFAULT NULL,
  `pagu_anggaran` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sub_kegiatan`
--

INSERT INTO `sub_kegiatan` (`id`, `kegiatan`, `sub_kegiatan`, `bagian`, `pagu_anggaran`) VALUES
(1, 1, 'Penyusunan Dokumen Perencanaan Perangkat Daerah', 11, 99904700),
(2, 1, 'Koordinasi dan Penyusunan Dokumen RKA SKPD', 11, 82958100),
(3, 1, 'Koordinasi dan Penyusunan Dokumen Perubahan RKA SKPD', 11, 67426200),
(4, 1, 'Koordinasi dan Penyusunan DPA SKPD', 11, 36326900),
(5, 1, 'Koordinasi dan Penyusunan Perubahan DPA SKPD', 11, 36382400),
(6, 2, 'Penyediaan Gaji dan Tunjangan ASN', 11, 25961791384),
(7, 2, 'Pelaksanaan Penatausahaan dan Pengujian/Verifikasi Keuangan SKPD', 11, 126457600),
(8, 2, 'Koordinasi dan Penyusunan Laporan Keuangan Akhir Tahun SKPD', 11, 49080300),
(9, 2, 'Koordinasi dan Penyusunan Laporan Keuangan Bulanan/triwulan/semesteran SKPD', 11, 183862800),
(10, 3, 'Pengamanan Barang Milik Daerah SKPD', 9, 356736000),
(11, 4, 'Pengadaan Pakaian Dinas Beserta Atribut Kelengkapannya', 9, 357943100),
(12, 4, 'Sosialisasi Peraturan Perundang-Undangan', 2, 109839100),
(13, 5, 'Penyediaan komponen instalasi listrik / penerangan bangunan kantor', 9, 332532700),
(14, 5, 'Penyediaan Peralatan dan Perlengkapan Kantor', 9, 783154495),
(15, 5, 'Penyediaan Peralatan Rumah Tangga', 9, 431697045),
(16, 5, 'Penyediaan bahan logistik kantor', 9, 232452200),
(17, 5, 'Penyediaan barang cetakan dan penggandaan', 9, 365305000),
(18, 5, 'Penyediaan Bahan Bacaan dan Peraturan Perundang-Undangan', 10, 0),
(19, 5, 'Fasilitas Kunjungan Tamu', 9, 2854000000),
(20, 5, 'Penyelenggaraan Rapat Koordinasi dan Konsultasi SKPD', 9, 1530510200),
(21, 6, 'Pengadaan Kendaraan Dinas Operasional atau Lapangan (Sekretariat Daerah)', 9, 2745000000),
(22, 6, 'Pengadaan Mebel', 9, 40000000),
(23, 7, 'Penyediaan Jasa Surat Menyurat', 9, 67439700),
(24, 7, 'Penyediaan Jasa Komunikasi, Sumber Daya Air dan Listrik', 9, 1599999730),
(25, 7, 'Penyediaan Jasa Peralatan dan Perlengkapan Kantor', 9, 458500000),
(26, 7, 'Penyediaan Jasa Pelayanan Umum Kantor', 9, 795000000),
(27, 8, 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan Pajak Kendaraan Perorangan Dinas atau Kendaraan Dinas Jabatan', 9, 262870400),
(28, 8, 'Penyediaan Jasa Pemeliharaan, Biaya Pemeliharaan Pajak dan Perizinan Kendaraan Dinas Operasional atau Lapangan', 9, 802023000),
(29, 8, 'Pemeliharaan/Rehabilitasi Gedung Kantor dan Bangunan Lainnya', 9, 654000000),
(30, 8, 'Pemeliharaan/Rehabilitasi Sarana dan Prasarana Gedung Kantor atau Bangunan Lainnya', 9, 50860000),
(31, 8, 'Pemeliharaan/Rehabilitasi Sarana dan Prasarana Pendukung gedung Kantor atau Bangunan Lainnya', 9, 175200000),
(32, 8, 'Penyediaan Gaji dan Tunjangan Kepala Daerah dan Wakil Kepala daerah', 11, 781230872),
(33, 9, 'Penyediaan Kebutuhan Rumah Tangga Kepala Daerah', 9, 1770000000),
(34, 9, 'Penyediaan Kebutuhan Rumah Tangga Wakil Kepala Daerah', 9, 1190000000),
(35, 10, 'Pengelolaan Kelembagaan dan Analisis Jabatan', 7, 475939100),
(36, 10, 'Fasilitasi Pelayanan Publik dan Tata Laksana', 7, 613362400),
(37, 10, 'Peningkatan Kinerja dan Reformasi Birokrasi', 7, 467641700),
(38, 10, 'Monitoring, Evaluasi dan Pengendalian Kualitas Pelayanan Publik dan Tata Laksana', 7, 212447800),
(39, 10, 'Koordinasi dan Penyusunan Laporan Kinerja Pemerintah Daerah', 7, 32002500),
(40, 11, 'Fasilitasi Keprotokolan', 10, 6556984600),
(41, 11, 'Fasilitasi Komunikasi Pimpinan', 10, 449666400),
(42, 11, 'Pendokumentasian Tugas Pimpinan', 10, 374900900),
(43, 12, 'Penataan Administrasi Pemerintahan', 1, 98067700),
(44, 12, 'Pengelolaan Administrasi Kewilayahan', 1, 458887400),
(45, 12, 'Fasilitasi Pelaksanaan Otonomi Daerah', 1, 575327600),
(46, 13, 'Fasilitas  Pengelolaan Bina Mental Spiritual', 3, 2102549700),
(47, 13, 'Pelaksanaan Kebijakan, Evaluasi dan Capaian Kinerja Terkait Kesejahteraan Sosial', 3, 623481000),
(48, 13, 'Pelaksanaan Kebijakan, Evaluasi dan Capaian Kinerja Terkait Kesejahteraan Masyarakat', 3, 2292843000),
(49, 14, 'Fasilitasi Penyusunan Produk Hukum Daerah', 2, 243563200),
(50, 14, 'Fasilitasi Bantuan Hukum', 2, 287415800),
(51, 14, 'Pendokumentasian Produk Hukum dan Pengelolaan Informasi Hukum', 2, 264975400),
(52, 15, 'Fasilitasi Kerja Sama Dalam Negeri', 12, 180565600),
(53, 15, 'Fasilitas Kerja Sama Luar Negeri', 12, 22177500),
(54, 15, 'Evaluasi Pelaksanaan Kerja Sama', 12, 111390200),
(55, 16, 'Koordinasi, Sinkronisasi, Monitoring dan Evaluasi Kebijakan BUMD dan BLUD', 4, 224815600),
(56, 16, 'Pengendalian dan Distribusi Perekonomian', 4, 242750400),
(57, 16, 'Perencanaan dan Pengawasan Ekonomi Mikro Kecil', 4, 143632900),
(58, 17, 'Koordinasi, Sinkronisasi, dan Evaluasi Kebijakan Pertanian, Kehutanan, Kelautan dan Perikanan', 4, 67447900),
(59, 17, 'Koordinasi, Sinkronisasi, dan Evaluasi Kebijakan Pertambangan dan Lingkungan Hidup', 4, 63379500),
(60, 18, 'Fasilitas Penyusun Program Pembangunan', 5, 135083100),
(61, 18, 'Pengendalian dan Evaluasi Program Pembangunan', 5, 145472000),
(62, 18, 'Pengelolaan Evaluasi dan Pelaporan Pelaksanaan Pembangunan', 5, 177309998),
(63, 19, 'Pengelolaan Pengadaan Barang dan Jasa', 6, 652495600),
(64, 19, 'Pengelolaan Layanan Pengadaan Secara Elektronik Sumber', 6, 243602400),
(65, 19, 'Pembinaan dan Advokasi Pengadaan Barang dan Jasa', 6, 80000776);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes_upload`
--

CREATE TABLE `tes_upload` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tes_upload`
--

INSERT INTO `tes_upload` (`id`, `nama`, `lampiran`) VALUES
(1, NULL, '20250521093317-2025-05-21tes_upload093316.pdf,20250521093811-2025-05-21tes_upload093810.pdf');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `user_bpp`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `user_bpp` (
`id` int(11) unsigned
,`email` varchar(100)
,`oauth_uid` text
,`oauth_provider` varchar(100)
,`pass` varchar(64)
,`username` varchar(100)
,`full_name` varchar(200)
,`avatar` text
,`banned` tinyint(1)
,`last_login` datetime
,`last_activity` datetime
,`date_created` datetime
,`forgot_exp` text
,`remember_time` datetime
,`remember_exp` text
,`verification_code` text
,`top_secret` varchar(16)
,`ip_address` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `user_pptk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `user_pptk` (
`id` int(11) unsigned
,`email` varchar(100)
,`oauth_uid` text
,`oauth_provider` varchar(100)
,`pass` varchar(64)
,`username` varchar(100)
,`full_name` varchar(200)
,`avatar` text
,`banned` tinyint(1)
,`last_login` datetime
,`last_activity` datetime
,`date_created` datetime
,`forgot_exp` text
,`remember_time` datetime
,`remember_exp` text
,`verification_code` text
,`top_secret` varchar(16)
,`ip_address` text
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `spj` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `dicukupi` enum('Ya','Belum') DEFAULT 'Belum',
  `tindak_lanjut` varchar(255) DEFAULT NULL,
  `verifikator` int(11) DEFAULT NULL,
  `tanggal_tindaklanjut` datetime DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_group`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_group` (
`id` int(11) unsigned
,`name` varchar(100)
,`definition` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_ppk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_ppk` (
`id` int(11) unsigned
,`email` varchar(100)
,`oauth_uid` text
,`oauth_provider` varchar(100)
,`pass` varchar(64)
,`username` varchar(100)
,`full_name` varchar(200)
,`avatar` text
,`banned` tinyint(1)
,`last_login` datetime
,`last_activity` datetime
,`date_created` datetime
,`forgot_exp` text
,`remember_time` datetime
,`remember_exp` text
,`verification_code` text
,`top_secret` varchar(16)
,`ip_address` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_user` (
`id` int(11) unsigned
,`email` varchar(100)
,`oauth_uid` text
,`oauth_provider` varchar(100)
,`pass` varchar(64)
,`username` varchar(100)
,`full_name` varchar(200)
,`avatar` text
,`banned` tinyint(1)
,`last_login` datetime
,`last_activity` datetime
,`date_created` datetime
,`forgot_exp` text
,`remember_time` datetime
,`remember_exp` text
,`verification_code` text
,`top_secret` varchar(16)
,`ip_address` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_verifikator`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_verifikator` (
`id` int(11) unsigned
,`email` varchar(100)
,`oauth_uid` text
,`oauth_provider` varchar(100)
,`pass` varchar(64)
,`username` varchar(100)
,`full_name` varchar(200)
,`avatar` text
,`banned` tinyint(1)
,`last_login` datetime
,`last_activity` datetime
,`date_created` datetime
,`forgot_exp` text
,`remember_time` datetime
,`remember_exp` text
,`verification_code` text
,`top_secret` varchar(16)
,`ip_address` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_verifikator2`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_verifikator2` (
`id` int(11) unsigned
,`email` varchar(100)
,`oauth_uid` text
,`oauth_provider` varchar(100)
,`pass` varchar(64)
,`username` varchar(100)
,`full_name` varchar(200)
,`avatar` text
,`banned` tinyint(1)
,`last_login` datetime
,`last_activity` datetime
,`date_created` datetime
,`forgot_exp` text
,`remember_time` datetime
,`remember_exp` text
,`verification_code` text
,`top_secret` varchar(16)
,`ip_address` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `dashboard`
--
DROP TABLE IF EXISTS `dashboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dashboard`  AS   (select `mb`.`nama_bagian` AS `nama_bagian`,coalesce(`spj`.`jumlah_gu`,0) AS `jumlah_gu`,coalesce(`spj`.`jumlah_ls`,0) AS `jumlah_ls`,coalesce(`spj`.`nominal_gu`,0) AS `nominal_gu`,coalesce(`spj`.`nominal_ls`,0) AS `nominal_ls`,coalesce(`sk`.`total_pagu`,0) AS `pagu_anggaran`,round((((coalesce(`spj`.`nominal_gu`,0) + coalesce(`spj`.`nominal_ls`,0)) / nullif(coalesce(`sk`.`total_pagu`,0),0)) * 100),2) AS `penyerapan_anggaran` from ((`masterbagian` `mb` left join (select `register_spj`.`bagian` AS `bagian`,count((case when (`register_spj`.`jenis_pengajuan` = 'GU') then 1 end)) AS `jumlah_gu`,count((case when (`register_spj`.`jenis_pengajuan` like 'LS%') then 1 end)) AS `jumlah_ls`,sum((case when (`register_spj`.`jenis_pengajuan` = 'GU') then `register_spj`.`nominal` else 0 end)) AS `nominal_gu`,sum((case when (`register_spj`.`jenis_pengajuan` like 'LS%') then `register_spj`.`nominal` else 0 end)) AS `nominal_ls` from `register_spj` group by `register_spj`.`bagian`) `spj` on((`mb`.`id` = `spj`.`bagian`))) left join (select `sub_kegiatan`.`bagian` AS `bagian`,sum(`sub_kegiatan`.`pagu_anggaran`) AS `total_pagu` from `sub_kegiatan` group by `sub_kegiatan`.`bagian`) `sk` on((`mb`.`id` = `sk`.`bagian`))) order by `mb`.`id`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `jumlah_verifikasi`
--
DROP TABLE IF EXISTS `jumlah_verifikasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_verifikasi`  AS   (select `verifikasi`.`spj` AS `spj`,count(`verifikasi`.`id`) AS `jumlah_catatan` from `verifikasi` group by `verifikasi`.`spj`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporanbulanan_bagian`
--
DROP TABLE IF EXISTS `laporanbulanan_bagian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporanbulanan_bagian`  AS   (select concat(month(`a`.`tanggal_pengajuan`),' - ',monthname(`a`.`tanggal_pengajuan`)) AS `bulan`,year(`a`.`tanggal_pengajuan`) AS `tahun`,`b`.`nama_bagian` AS `nama_bagian`,count(`a`.`id`) AS `jumlah_pengajuan`,sum(`a`.`nominal`) AS `jumlah_nominal` from ((`register_spj` `a` left join `masterbagian` `b` on((`a`.`bagian` = `b`.`id`))) left join `sub_kegiatan` `c` on((`a`.`sub_kegiatan` = `c`.`id`))) group by `b`.`nama_bagian`,year(`a`.`tanggal_pengajuan`),month(`a`.`tanggal_pengajuan`) order by year(`a`.`tanggal_pengajuan`),month(`a`.`tanggal_pengajuan`) desc)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporanbulanan_bagian_sub`
--
DROP TABLE IF EXISTS `laporanbulanan_bagian_sub`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporanbulanan_bagian_sub`  AS   (select concat(month(`a`.`tanggal_pengajuan`),' - ',monthname(`a`.`tanggal_pengajuan`)) AS `bulan`,year(`a`.`tanggal_pengajuan`) AS `tahun`,`b`.`nama_bagian` AS `nama_bagian`,`c`.`sub_kegiatan` AS `sub_kegiatan`,count(`a`.`id`) AS `jumlah_pengajuan`,sum(`a`.`nominal`) AS `jumlah_nominal` from ((`register_spj` `a` left join `masterbagian` `b` on((`a`.`bagian` = `b`.`id`))) left join `sub_kegiatan` `c` on((`a`.`sub_kegiatan` = `c`.`id`))) group by `b`.`nama_bagian`,`c`.`sub_kegiatan`,year(`a`.`tanggal_pengajuan`),month(`a`.`tanggal_pengajuan`) order by year(`a`.`tanggal_pengajuan`),month(`a`.`tanggal_pengajuan`) desc)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporanharian_bagian`
--
DROP TABLE IF EXISTS `laporanharian_bagian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporanharian_bagian`  AS   (select `a`.`tanggal_pengajuan` AS `tanggal_pengajuan`,`b`.`nama_bagian` AS `nama_bagian`,count(`a`.`id`) AS `jumlah_pengajuan`,sum(`a`.`nominal`) AS `jumlah_nominal` from (`register_spj` `a` left join `masterbagian` `b` on((`a`.`bagian` = `b`.`id`))) group by `a`.`tanggal_pengajuan`,`b`.`nama_bagian` order by `a`.`tanggal_pengajuan` desc)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporanharian_bagian_sub`
--
DROP TABLE IF EXISTS `laporanharian_bagian_sub`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporanharian_bagian_sub`  AS   (select `a`.`tanggal_pengajuan` AS `tanggal_pengajuan`,`b`.`nama_bagian` AS `nama_bagian`,`c`.`sub_kegiatan` AS `sub_kegiatan`,count(`a`.`id`) AS `jumlah_pengajuan`,sum(`a`.`nominal`) AS `jumlah_nominal` from ((`register_spj` `a` left join `masterbagian` `b` on((`a`.`bagian` = `b`.`id`))) left join `sub_kegiatan` `c` on((`a`.`sub_kegiatan` = `c`.`id`))) group by `a`.`tanggal_pengajuan`,`b`.`nama_bagian`,`a`.`sub_kegiatan` order by `a`.`tanggal_pengajuan` desc)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_bagian`
--
DROP TABLE IF EXISTS `laporan_bagian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_bagian`  AS   (select `b`.`nama_bagian` AS `nama_bagian`,count(`a`.`id`) AS `jumlah_pengajuan`,sum(`a`.`nominal`) AS `jumlah_nominal` from (`masterbagian` `b` left join `register_spj` `a` on((`a`.`bagian` = `b`.`id`))) group by `b`.`nama_bagian` order by `b`.`nama_bagian`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_kegiatan`
--
DROP TABLE IF EXISTS `laporan_kegiatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_kegiatan`  AS SELECT `e`.`nama_program` AS `nama_program`, `d`.`nama_kegiatan` AS `nama_kegiatan`, coalesce((select sum(`sc`.`pagu_anggaran`) from `sub_kegiatan` `sc` where (`sc`.`kegiatan` = `d`.`id`)),0) AS `pagu_anggaran`, count(`a`.`id`) AS `jumlah_pengajuan`, sum(`a`.`nominal`) AS `jumlah_nominal`, round((case when ((select sum(`sc`.`pagu_anggaran`) from `sub_kegiatan` `sc` where (`sc`.`kegiatan` = `d`.`id`)) > 0) then ((sum(`a`.`nominal`) / (select sum(`sc`.`pagu_anggaran`) from `sub_kegiatan` `sc` where (`sc`.`kegiatan` = `d`.`id`))) * 100) else 0 end),2) AS `penyerapan_anggaran` FROM (((`kegiatan` `d` left join `program` `e` on((`d`.`program` = `e`.`id`))) left join `sub_kegiatan` `c` on((`c`.`kegiatan` = `d`.`id`))) left join `register_spj` `a` on((`a`.`sub_kegiatan` = `c`.`id`))) GROUP BY `e`.`nama_program`, `d`.`id`, `d`.`nama_kegiatan` ORDER BY `d`.`nama_kegiatan` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_program`
--
DROP TABLE IF EXISTS `laporan_program`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_program`  AS SELECT `e`.`nama_program` AS `nama_program`, count(`a`.`id`) AS `jumlah_pengajuan`, sum(`a`.`nominal`) AS `jumlah_nominal`, (select sum(`sc`.`pagu_anggaran`) from (`sub_kegiatan` `sc` join `kegiatan` `kd` on((`sc`.`kegiatan` = `kd`.`id`))) where (`kd`.`program` = `e`.`id`)) AS `pagu_anggaran`, round((case when ((select sum(`sc`.`pagu_anggaran`) from (`sub_kegiatan` `sc` join `kegiatan` `kd` on((`sc`.`kegiatan` = `kd`.`id`))) where (`kd`.`program` = `e`.`id`)) > 0) then ((sum(`a`.`nominal`) / (select sum(`sc`.`pagu_anggaran`) from (`sub_kegiatan` `sc` join `kegiatan` `kd` on((`sc`.`kegiatan` = `kd`.`id`))) where (`kd`.`program` = `e`.`id`))) * 100) else 0 end),2) AS `penyerapan_anggaran` FROM (((`program` `e` join `kegiatan` `d` on((`d`.`program` = `e`.`id`))) join `sub_kegiatan` `c` on((`c`.`kegiatan` = `d`.`id`))) left join `register_spj` `a` on((`a`.`sub_kegiatan` = `c`.`id`))) GROUP BY `e`.`id`, `e`.`nama_program` ORDER BY `e`.`nama_program` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_rekap_subkegiatan`
--
DROP TABLE IF EXISTS `laporan_rekap_subkegiatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_rekap_subkegiatan`  AS SELECT date_format(`r`.`tanggal_pengajuan`,'%Y-%m') AS `bulan`, `mb`.`nama_bagian` AS `nama_bagian`, `sk`.`sub_kegiatan` AS `nama_sub_kegiatan`, count((case when (`r`.`jenis_pengajuan` = 'GU') then 1 end)) AS `jumlah_gu`, count((case when (`r`.`jenis_pengajuan` like 'LS%') then 1 end)) AS `jumlah_ls`, sum((case when (`r`.`jenis_pengajuan` = 'GU') then `r`.`nominal` else 0 end)) AS `nominal_gu`, sum((case when (`r`.`jenis_pengajuan` like 'LS%') then `r`.`nominal` else 0 end)) AS `nominal_ls` FROM ((`register_spj` `r` left join `sub_kegiatan` `sk` on((`r`.`sub_kegiatan` = `sk`.`id`))) left join `masterbagian` `mb` on((`r`.`bagian` = `mb`.`id`))) GROUP BY date_format(`r`.`tanggal_pengajuan`,'%Y-%m'), `mb`.`nama_bagian`, `sk`.`sub_kegiatan` ORDER BY date_format(`r`.`tanggal_pengajuan`,'%Y-%m') ASC, `mb`.`nama_bagian` ASC, `sk`.`sub_kegiatan` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_subkegiatan`
--
DROP TABLE IF EXISTS `laporan_subkegiatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_subkegiatan`  AS   (select `e`.`nama_program` AS `nama_program`,`d`.`nama_kegiatan` AS `nama_kegiatan`,`c`.`sub_kegiatan` AS `sub_kegiatan`,count(`a`.`id`) AS `jumlah_pengajuan`,`c`.`pagu_anggaran` AS `pagu_anggaran`,sum(`a`.`nominal`) AS `jumlah_nominal`,round(((sum(`a`.`nominal`) / `c`.`pagu_anggaran`) * 100),2) AS `penyerapan_anggaran` from (((`sub_kegiatan` `c` left join `kegiatan` `d` on((`c`.`kegiatan` = `d`.`id`))) left join `program` `e` on((`d`.`program` = `e`.`id`))) left join `register_spj` `a` on((`a`.`sub_kegiatan` = `c`.`id`))) group by `e`.`nama_program`,`d`.`nama_kegiatan`,`c`.`sub_kegiatan`,`c`.`pagu_anggaran` order by `c`.`sub_kegiatan`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `realisasi_final`
--
DROP TABLE IF EXISTS `realisasi_final`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `realisasi_final`  AS   (select `gabungan`.`tanggal` AS `tanggal`,`mb`.`nama_bagian` AS `nama_bagian`,`sk`.`sub_kegiatan` AS `nama_sub_kegiatan`,sum(`gabungan`.`nominal_pb`) AS `nominal_pb`,sum(`gabungan`.`nominal_sts`) AS `nominal_sts`,sum((`gabungan`.`nominal_pb` + `gabungan`.`nominal_sts`)) AS `total` from ((((select `setorpb`.`tanggal_pb` AS `tanggal`,`setorpb`.`sub_kegiatan` AS `sub_kegiatan`,`setorpb`.`nominal` AS `nominal_pb`,0 AS `nominal_sts` from `setorpb`) union all select `setorbalik`.`tanggal_setor` AS `tanggal`,`setorbalik`.`sub_kegiatan` AS `sub_kegiatan`,0 AS `nominal_pb`,`setorbalik`.`nominal` AS `nominal_sts` from `setorbalik`) `gabungan` left join `sub_kegiatan` `sk` on((`gabungan`.`sub_kegiatan` = `sk`.`id`))) left join `masterbagian` `mb` on((`sk`.`bagian` = `mb`.`id`))) group by `gabungan`.`tanggal`,`gabungan`.`sub_kegiatan`,`sk`.`sub_kegiatan`,`mb`.`nama_bagian` order by `gabungan`.`tanggal` desc,`sk`.`sub_kegiatan`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `rekap_verifikasi`
--
DROP TABLE IF EXISTS `rekap_verifikasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap_verifikasi`  AS SELECT `v`.`spj` AS `spj`, count(distinct `v`.`verifikator`) AS `total_verifikator`, sum((case when (`v`.`dicukupi` = 'Ya') then 1 else 0 end)) AS `jumlah_verifikator_sudah_tercukupi`, (case when (count(distinct `v`.`verifikator`) = 0) then 'Belum Terverifikasi' when (count(0) = sum((case when (`v`.`dicukupi` = 'Ya') then 1 else 0 end))) then 'Sudah Terverifikasi' else 'Belum Terverifikasi' end) AS `status_verifikasi`, (case when (count(distinct `v`.`verifikator`) = 0) then 'danger' when (count(0) = sum((case when (`v`.`dicukupi` = 'Ya') then 1 else 0 end))) then 'success' else 'danger' end) AS `warna_status` FROM `verifikasi` AS `v` GROUP BY `v`.`spj` ORDER BY `v`.`spj` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `user_bpp`
--
DROP TABLE IF EXISTS `user_bpp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_bpp`  AS SELECT `a`.`id` AS `id`, `a`.`email` AS `email`, `a`.`oauth_uid` AS `oauth_uid`, `a`.`oauth_provider` AS `oauth_provider`, `a`.`pass` AS `pass`, `a`.`username` AS `username`, `a`.`full_name` AS `full_name`, `a`.`avatar` AS `avatar`, `a`.`banned` AS `banned`, `a`.`last_login` AS `last_login`, `a`.`last_activity` AS `last_activity`, `a`.`date_created` AS `date_created`, `a`.`forgot_exp` AS `forgot_exp`, `a`.`remember_time` AS `remember_time`, `a`.`remember_exp` AS `remember_exp`, `a`.`verification_code` AS `verification_code`, `a`.`top_secret` AS `top_secret`, `a`.`ip_address` AS `ip_address` FROM (`aauth_users` `a` left join `aauth_user_to_group` `b` on((`a`.`id` = `b`.`user_id`))) WHERE (`b`.`group_id` = '9')  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `user_pptk`
--
DROP TABLE IF EXISTS `user_pptk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_pptk`  AS SELECT `a`.`id` AS `id`, `a`.`email` AS `email`, `a`.`oauth_uid` AS `oauth_uid`, `a`.`oauth_provider` AS `oauth_provider`, `a`.`pass` AS `pass`, `a`.`username` AS `username`, `a`.`full_name` AS `full_name`, `a`.`avatar` AS `avatar`, `a`.`banned` AS `banned`, `a`.`last_login` AS `last_login`, `a`.`last_activity` AS `last_activity`, `a`.`date_created` AS `date_created`, `a`.`forgot_exp` AS `forgot_exp`, `a`.`remember_time` AS `remember_time`, `a`.`remember_exp` AS `remember_exp`, `a`.`verification_code` AS `verification_code`, `a`.`top_secret` AS `top_secret`, `a`.`ip_address` AS `ip_address` FROM (`aauth_users` `a` left join `aauth_user_to_group` `b` on((`a`.`id` = `b`.`user_id`))) WHERE (`b`.`group_id` = '12')  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_group`
--
DROP TABLE IF EXISTS `v_group`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_group`  AS   (select `aauth_groups`.`id` AS `id`,`aauth_groups`.`name` AS `name`,`aauth_groups`.`definition` AS `definition` from `aauth_groups`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_ppk`
--
DROP TABLE IF EXISTS `v_ppk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ppk`  AS SELECT `a`.`id` AS `id`, `a`.`email` AS `email`, `a`.`oauth_uid` AS `oauth_uid`, `a`.`oauth_provider` AS `oauth_provider`, `a`.`pass` AS `pass`, `a`.`username` AS `username`, `a`.`full_name` AS `full_name`, `a`.`avatar` AS `avatar`, `a`.`banned` AS `banned`, `a`.`last_login` AS `last_login`, `a`.`last_activity` AS `last_activity`, `a`.`date_created` AS `date_created`, `a`.`forgot_exp` AS `forgot_exp`, `a`.`remember_time` AS `remember_time`, `a`.`remember_exp` AS `remember_exp`, `a`.`verification_code` AS `verification_code`, `a`.`top_secret` AS `top_secret`, `a`.`ip_address` AS `ip_address` FROM (`aauth_users` `a` left join `aauth_user_to_group` `b` on((`a`.`id` = `b`.`user_id`))) WHERE (`b`.`group_id` = '8')  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS   (select `aauth_users`.`id` AS `id`,`aauth_users`.`email` AS `email`,`aauth_users`.`oauth_uid` AS `oauth_uid`,`aauth_users`.`oauth_provider` AS `oauth_provider`,`aauth_users`.`pass` AS `pass`,`aauth_users`.`username` AS `username`,`aauth_users`.`full_name` AS `full_name`,`aauth_users`.`avatar` AS `avatar`,`aauth_users`.`banned` AS `banned`,`aauth_users`.`last_login` AS `last_login`,`aauth_users`.`last_activity` AS `last_activity`,`aauth_users`.`date_created` AS `date_created`,`aauth_users`.`forgot_exp` AS `forgot_exp`,`aauth_users`.`remember_time` AS `remember_time`,`aauth_users`.`remember_exp` AS `remember_exp`,`aauth_users`.`verification_code` AS `verification_code`,`aauth_users`.`top_secret` AS `top_secret`,`aauth_users`.`ip_address` AS `ip_address` from `aauth_users`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_verifikator`
--
DROP TABLE IF EXISTS `v_verifikator`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_verifikator`  AS SELECT `a`.`id` AS `id`, `a`.`email` AS `email`, `a`.`oauth_uid` AS `oauth_uid`, `a`.`oauth_provider` AS `oauth_provider`, `a`.`pass` AS `pass`, `a`.`username` AS `username`, `a`.`full_name` AS `full_name`, `a`.`avatar` AS `avatar`, `a`.`banned` AS `banned`, `a`.`last_login` AS `last_login`, `a`.`last_activity` AS `last_activity`, `a`.`date_created` AS `date_created`, `a`.`forgot_exp` AS `forgot_exp`, `a`.`remember_time` AS `remember_time`, `a`.`remember_exp` AS `remember_exp`, `a`.`verification_code` AS `verification_code`, `a`.`top_secret` AS `top_secret`, `a`.`ip_address` AS `ip_address` FROM (`aauth_users` `a` left join `aauth_user_to_group` `b` on((`a`.`id` = `b`.`user_id`))) WHERE ((`b`.`group_id` = '6') OR (`b`.`group_id` = '7'))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_verifikator2`
--
DROP TABLE IF EXISTS `v_verifikator2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_verifikator2`  AS SELECT `a`.`id` AS `id`, `a`.`email` AS `email`, `a`.`oauth_uid` AS `oauth_uid`, `a`.`oauth_provider` AS `oauth_provider`, `a`.`pass` AS `pass`, `a`.`username` AS `username`, `a`.`full_name` AS `full_name`, `a`.`avatar` AS `avatar`, `a`.`banned` AS `banned`, `a`.`last_login` AS `last_login`, `a`.`last_activity` AS `last_activity`, `a`.`date_created` AS `date_created`, `a`.`forgot_exp` AS `forgot_exp`, `a`.`remember_time` AS `remember_time`, `a`.`remember_exp` AS `remember_exp`, `a`.`verification_code` AS `verification_code`, `a`.`top_secret` AS `top_secret`, `a`.`ip_address` AS `ip_address` FROM (`aauth_users` `a` left join `aauth_user_to_group` `b` on((`a`.`id` = `b`.`user_id`))) WHERE ((`b`.`group_id` = '7') OR (`b`.`group_id` = '6'))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indeks untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`user_id`,`perm_id`);

--
-- Indeks untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indeks untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_ceklist`
--
ALTER TABLE `berkas_ceklist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_pengajuan`
--
ALTER TABLE `berkas_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indeks untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_ajuan_gaji`
--
ALTER TABLE `jenis_ajuan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pengajuan`
--
ALTER TABLE `jenis_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komen_bantuan`
--
ALTER TABLE `komen_bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_ceklist`
--
ALTER TABLE `list_ceklist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masterbagian`
--
ALTER TABLE `masterbagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masterberkas`
--
ALTER TABLE `masterberkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_ppk_skpd`
--
ALTER TABLE `master_ppk_skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `register_spj`
--
ALTER TABLE `register_spj`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setorbalik`
--
ALTER TABLE `setorbalik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setorpb`
--
ALTER TABLE `setorpb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tes_upload`
--
ALTER TABLE `tes_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3733;

--
-- AUTO_INCREMENT untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `berkas_ceklist`
--
ALTER TABLE `berkas_ceklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT untuk tabel `berkas_pengajuan`
--
ALTER TABLE `berkas_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_ajuan_gaji`
--
ALTER TABLE `jenis_ajuan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengajuan`
--
ALTER TABLE `jenis_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komen_bantuan`
--
ALTER TABLE `komen_bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `list_ceklist`
--
ALTER TABLE `list_ceklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `masterbagian`
--
ALTER TABLE `masterbagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `masterberkas`
--
ALTER TABLE `masterberkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_ppk_skpd`
--
ALTER TABLE `master_ppk_skpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `register_spj`
--
ALTER TABLE `register_spj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `setorbalik`
--
ALTER TABLE `setorbalik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setorpb`
--
ALTER TABLE `setorpb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `tes_upload`
--
ALTER TABLE `tes_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
