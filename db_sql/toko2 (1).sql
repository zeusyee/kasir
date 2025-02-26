-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2025 at 02:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int NOT NULL,
  `stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stock`) VALUES
(1, 'indomei aceh', 3000, 69),
(2, 'sabun detol', 4000, 80),
(3, 'surya', 26000, 82),
(4, 'camel', 20000, 96),
(5, 'rinso', 1000, 45),
(9, 'celana', 145000, 36),
(10, 'ice cream', 3000, 91),
(12, 'tisu', 5000, 99),
(13, 'yakult', 2000, 49),
(14, 'teh gelas', 1000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE `detil_penjualan` (
  `id_transaksi_detil` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_barang` int NOT NULL,
  `jml_barang` int NOT NULL,
  `harga_satuan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detil_penjualan`
--

INSERT INTO `detil_penjualan` (`id_transaksi_detil`, `id_transaksi`, `id_barang`, `jml_barang`, `harga_satuan`) VALUES
(1, 1824, 4, 1, 20000),
(2, 1825, 3, 1, 26000),
(3, 1826, 5, 5, 1000),
(4, 1827, 5, 25, 1000),
(5, 1828, 5, 30, 1000),
(6, 1829, 1, 4, 3000),
(7, 1830, 2, 5, 4000),
(8, 1831, 9, 2, 145000),
(9, 1832, 9, 2, 145000),
(10, 1833, 1, 3, 3000),
(11, 1834, 1, 3, 3000),
(12, 1835, 1, 3, 3000),
(13, 1836, 1, 3, 3000),
(14, 1837, 1, 3, 3000),
(15, 1838, 1, 3, 3000),
(16, 1839, 1, 3, 3000),
(17, 1840, 1, 3, 3000),
(18, 1841, 1, 3, 3000),
(19, 1842, 1, 3, 3000),
(20, 1843, 1, 3, 3000),
(21, 1844, 1, 3, 3000),
(22, 1845, 1, 3, 3000),
(23, 1846, 1, 3, 3000),
(24, 1847, 2, 3, 4000),
(25, 1848, 2, 3, 4000),
(26, 1849, 1, 9, 3000),
(27, 1850, 9, 1, 145000),
(28, 1854, 5, 1, 1000),
(29, 1869, 2, 3, 4000),
(30, 1870, 2, 2, 4000),
(31, 1871, 2, 4, 4000),
(32, 1872, 2, 4, 4000),
(33, 1873, 2, 4, 4000),
(34, 1879, 3, 1, 26000),
(35, 1880, 9, 2, 145000),
(36, 1881, 4, 2, 20000),
(37, 1882, 5, 5, 1000),
(38, 1883, 4, 2, 20000),
(39, 1884, 1, 2, 3000),
(40, 1885, 5, 1, 1000),
(41, 1886, 4, 2, 20000),
(42, 1887, 5, 2, 1000),
(43, 1888, 2, 1, 4000),
(44, 1891, 3, 2, 26000),
(45, 1892, 4, 1, 20000),
(46, 1893, 9, 1, 145000),
(47, 1894, 9, 1, 145000),
(48, 1895, 9, 1, 145000),
(49, 1896, 4, 1, 20000),
(50, 1897, 1, 1, 3000),
(51, 1898, 9, 1, 145000),
(52, 1899, 3, 2, 26000),
(53, 1900, 3, 2, 26000),
(54, 1901, 4, 2, 20000),
(55, 1902, 1, 2, 3000),
(56, 1903, 4, 1, 20000),
(57, 1904, 3, 1, 26000),
(58, 1905, 4, 2, 20000),
(59, 1906, 4, 2, 20000),
(60, 1907, 3, 3, 26000),
(61, 1908, 4, 1, 20000),
(62, 1908, 1, 1, 3000),
(63, 1909, 9, 2, 145000),
(64, 1909, 4, 1, 20000),
(65, 1910, 1, 2, 3000),
(66, 1910, 3, 1, 26000),
(67, 1911, 1, 2, 3000),
(68, 1911, 3, 1, 26000),
(69, 1912, 1, 2, 3000),
(70, 1912, 3, 1, 26000),
(71, 1913, 3, 1, 26000),
(72, 1914, 1, 1, 3000),
(73, 1914, 9, 1, 145000),
(74, 1914, 3, 1, 26000),
(75, 1915, 3, 3, 26000),
(76, 1915, 1, 1, 3000),
(77, 1915, 5, 1, 1000),
(78, 1915, 9, 1, 145000),
(79, 1916, 1, 1, 3000),
(80, 1917, 1, 1, 3000),
(81, 1918, 3, 1, 26000),
(82, 1919, 3, 1, 26000),
(83, 1920, 3, 1, 26000),
(84, 1921, 3, 1, 26000),
(85, 1922, 5, 10, 1000),
(86, 1922, 3, 1, 26000),
(87, 1923, 5, 10, 1000),
(88, 1923, 3, 1, 26000),
(89, 1924, 4, 1, 20000),
(90, 1925, 4, 1, 20000),
(91, 1926, 4, 1, 20000),
(92, 1927, 5, 1, 1000),
(93, 1928, 1, 1, 3000),
(94, 1929, 3, 1, 26000),
(95, 1930, 3, 1, 26000),
(96, 1931, 4, 1, 20000),
(97, 1932, 4, 1, 20000),
(98, 1933, 4, 1, 20000),
(99, 1934, 1, 1, 3000),
(100, 1935, 1, 1, 3000),
(101, 1936, 1, 1, 3000),
(102, 1937, 4, 1, 20000),
(103, 1938, 3, 1, 26000),
(104, 1939, 4, 1, 20000),
(105, 1940, 3, 1, 26000),
(106, 1941, 3, 1, 26000),
(107, 1942, 5, 1, 1000),
(108, 1943, 5, 1, 1000),
(109, 1944, 1, 1, 3000),
(110, 1945, 1, 1, 3000),
(111, 1946, 5, 1, 1000),
(112, 1947, 4, 2, 20000),
(113, 1948, 2, 1, 4000),
(114, 1949, 5, 1, 1000),
(115, 1950, 5, 2, 1000),
(116, 1955, 9, 1, 145000),
(117, 1956, 9, 1, 145000),
(118, 1957, 2, 4, 4000),
(119, 1958, 4, 3, 20000),
(120, 1965, 2, 2, 4000),
(121, 1966, 1, 2, 3000),
(122, 1967, 2, 3, 4000),
(123, 1968, 1, 2, 3000),
(124, 1971, 4, 1, 20000),
(125, 1972, 2, 1, 4000),
(126, 1973, 4, 2, 20000),
(127, 1977, 5, 2, 1000),
(128, 1977, 1, 2, 3000),
(129, 1978, 2, 2, 4000),
(130, 1978, 5, 2, 1000),
(131, 1979, 3, 2, 26000),
(132, 1979, 4, 2, 20000),
(133, 1980, 3, 2, 26000),
(134, 1981, 3, 3, 26000),
(135, 1982, 5, 1, 1000),
(136, 1983, 2, 2, 4000),
(137, 1983, 3, 2, 26000),
(138, 1984, 1, 1, 3000),
(139, 1985, 3, 1, 26000),
(140, 1986, 2, 1, 4000),
(141, 1986, 3, 1, 26000),
(142, 1987, 2, 1, 4000),
(143, 1987, 3, 1, 26000),
(144, 1988, 3, 1, 26000),
(145, 1989, 5, 6, 1000),
(146, 1989, 9, 1, 145000),
(147, 1990, 9, 1, 145000),
(148, 1991, 2, 1, 4000),
(149, 1991, 1, 1, 3000),
(150, 1991, 5, 3, 1000),
(151, 1992, 1, 1, 3000),
(152, 1993, 3, 1, 26000),
(153, 1993, 4, 1, 20000),
(154, 1994, 5, 1, 1000),
(155, 1995, 4, 1, 20000),
(156, 1996, 3, 1, 26000),
(157, 1997, 3, 1, 26000),
(158, 1998, 5, 1, 1000),
(159, 1998, 10, 1, 3000),
(160, 1999, 3, 1, 26000),
(161, 2000, 2, 1, 4000),
(162, 2001, 2, 1, 4000),
(163, 2002, 5, 1, 1000),
(164, 2003, 4, 1, 20000),
(165, 2004, 4, 1, 20000),
(166, 2005, 14, 5, 1000),
(167, 2005, 13, 1, 2000),
(168, 2005, 3, 1, 26000),
(169, 2006, 12, 1, 5000),
(170, 2007, 5, 1, 1000),
(171, 2007, 10, 5, 3000),
(172, 2007, 10, 3, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2025_01_08_012510_create_produks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(35) NOT NULL,
  `gender` enum('P','L') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `gender`) VALUES
(1, 'egas', 'P'),
(11, 'aris', 'L'),
(12, 'fariz', 'L'),
(13, 'farah', 'P'),
(14, 'diah', 'P'),
(15, 'bams', 'L'),
(16, 'Yusuf', 'L'),
(17, 'Fai', 'L'),
(18, 'Nabila', 'P'),
(19, 'bams', 'L'),
(128, 'iqbal', 'L'),
(131, 'nabil', 'L'),
(135, 'jeki', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `total_transaksi`) VALUES
(1824, 11, '2025-01-06', 20000),
(1825, 12, '2025-01-07', 26000),
(1826, 13, '2025-01-06', 5000),
(1827, 14, '2025-01-07', 25000),
(1828, 15, '2025-01-03', 30000),
(1829, 15, '2025-02-10', 12000),
(1830, 16, '2025-02-10', 20000),
(1831, 14, '2025-02-10', 290000),
(1832, 18, '2025-02-10', 290000),
(1833, 16, '2025-02-10', 9000),
(1847, 18, '2025-02-10', 12000),
(1848, 18, '2025-02-10', 12000),
(1849, 19, '2025-02-11', 27000),
(1850, 11, '2025-02-11', 145000),
(1851, 14, '2025-02-11', 15000),
(1852, 14, '2025-02-11', 15000),
(1853, 14, '2025-02-11', 15000),
(1854, 14, '2025-02-11', 1000),
(1855, 17, '2025-02-11', 3000),
(1856, 17, '2025-02-11', 3000),
(1857, 1, '2025-02-11', 3000),
(1858, 1, '2025-02-11', 3000),
(1859, 1, '2025-02-11', 3000),
(1860, 1, '2025-02-11', 3000),
(1861, 1, '2025-02-11', 3000),
(1862, 1, '2025-02-11', 3000),
(1863, 1, '2025-02-11', 3000),
(1864, 1, '2025-02-11', 3000),
(1865, 1, '2025-02-11', 3000),
(1866, 1, '2025-02-11', 3000),
(1867, 1, '2025-02-11', 3000),
(1868, 1, '2025-02-11', 3000),
(1869, 12, '2025-02-11', 12000),
(1870, 13, '2025-02-11', 8000),
(1871, 16, '2025-02-11', 16000),
(1872, 16, '2025-02-11', 16000),
(1873, 16, '2025-02-11', 16000),
(1874, 16, '2025-02-11', 16000),
(1875, 16, '2025-02-11', 16000),
(1876, 16, '2025-02-11', 16000),
(1877, 16, '2025-02-11', 16000),
(1878, 16, '2025-02-11', 16000),
(1879, 1, '2025-02-11', 26000),
(1880, 12, '2025-02-11', 290000),
(1881, 18, '2025-02-11', 40000),
(1882, 127, '2025-02-11', 5000),
(1883, 128, '2025-02-11', 40000),
(1884, 127, '2025-02-11', 6000),
(1885, 19, '2025-02-11', 1000),
(1886, 16, '2025-02-11', 40000),
(1887, 14, '2025-02-11', 2000),
(1888, 14, '2025-02-11', 4000),
(1889, 13, '2025-02-11', 4000),
(1890, 13, '2025-02-11', 4000),
(1891, 13, '2025-02-11', 52000),
(1892, 18, '2025-02-11', 20000),
(1893, 11, '2025-02-11', 145000),
(1894, 11, '2025-02-11', 145000),
(1895, 127, '2025-02-11', 145000),
(1896, 15, '2025-02-11', 20000),
(1897, 125, '2025-02-11', 3000),
(1898, 13, '2025-02-11', 145000),
(1899, 17, '2025-02-12', 52000),
(1900, 17, '2025-02-12', 52000),
(1901, 16, '2025-02-12', 40000),
(1902, 17, '2025-02-12', 6000),
(1903, 14, '2025-02-12', 20000),
(1904, 15, '2025-02-12', 26000),
(1905, 15, '2025-02-12', 40000),
(1906, 15, '2025-02-12', 40000),
(1907, 17, '2025-02-12', 78000),
(1908, 15, '2025-02-12', 23000),
(1909, 18, '2025-02-12', 310000),
(1910, 16, '2025-02-12', 32000),
(1911, 16, '2025-02-12', 32000),
(1912, 16, '2025-02-12', 32000),
(1913, 14, '2025-02-12', 26000),
(1914, 19, '2025-02-12', 174000),
(1915, 14, '2025-02-12', 227000),
(1916, 12, '2025-02-12', 3000),
(1917, 12, '2025-02-12', 3000),
(1918, 15, '2025-02-12', 26000),
(1919, 15, '2025-02-12', 26000),
(1920, 15, '2025-02-12', 26000),
(1921, 15, '2025-02-12', 26000),
(1922, 128, '2025-02-12', 36000),
(1923, 128, '2025-02-12', 36000),
(1924, 11, '2025-02-12', 20000),
(1925, 11, '2025-02-12', 20000),
(1926, 11, '2025-02-12', 20000),
(1927, 12, '2025-02-12', 1000),
(1928, 17, '2025-02-12', 3000),
(1929, 15, '2025-02-12', 26000),
(1930, 15, '2025-02-12', 26000),
(1931, 15, '2025-02-12', 20000),
(1932, 19, '2025-02-12', 20000),
(1933, 19, '2025-02-12', 20000),
(1934, 15, '2025-02-14', 3000),
(1935, 11, '2025-02-14', 3000),
(1936, 11, '2025-02-14', 3000),
(1937, 13, '2025-02-14', 20000),
(1938, 15, '2025-02-14', 26000),
(1939, 15, '2025-02-14', 20000),
(1940, 12, '2025-02-15', 26000),
(1941, 12, '2025-02-15', 26000),
(1942, 15, '2025-02-15', 1000),
(1943, 125, '2025-02-18', 1000),
(1944, 19, '2025-02-18', 3000),
(1945, 19, '2025-02-18', 3000),
(1946, 125, '2025-02-20', 1000),
(1947, 14, '2025-02-24', 40000),
(1948, 14, '2025-02-24', 4000),
(1949, 17, '2025-02-24', 1000),
(1950, 19, '2025-02-24', 2000),
(1951, 11, '2025-02-24', 78000),
(1952, 11, '2025-02-24', 78000),
(1953, 18, '2025-02-24', 52000),
(1954, 18, '2025-02-24', 52000),
(1955, 125, '2025-02-24', 145000),
(1956, 125, '2025-02-24', 145000),
(1957, 16, '2025-02-24', 16000),
(1958, 16, '2025-02-24', 60000),
(1959, 17, '2025-02-24', 26000),
(1960, 17, '2025-02-24', 26000),
(1961, 15, '2025-02-24', 26000),
(1962, 15, '2025-02-24', 26000),
(1963, 19, '2025-02-24', 26000),
(1964, 19, '2025-02-24', 26000),
(1965, 18, '2025-02-24', 8000),
(1966, 15, '2025-02-24', 6000),
(1967, 11, '2025-02-24', 12000),
(1968, 15, '2025-02-24', 6000),
(1969, 14, '2025-02-24', 26000),
(1970, 14, '2025-02-24', 26000),
(1971, 128, '2025-02-24', 20000),
(1972, 11, '2025-02-24', 4000),
(1973, 14, '2025-02-24', 40000),
(1974, 11, '2025-02-24', 52000),
(1975, 11, '2025-02-24', 52000),
(1976, 11, '2025-02-24', 52000),
(1977, 11, '2025-02-24', 8000),
(1978, 11, '2025-02-24', 10000),
(1979, 13, '2025-02-24', 92000),
(1980, 11, '2025-02-25', 52000),
(1981, 14, '2025-02-25', 78000),
(1982, 13, '2025-02-25', 1000),
(1983, 13, '2025-02-25', 60000),
(1984, 17, '2025-02-25', 3000),
(1985, 15, '2025-02-25', 26000),
(1986, 17, '2025-02-25', 30000),
(1987, 13, '2025-02-25', 30000),
(1988, 16, '2025-02-25', 26000),
(1989, 11, '2025-02-25', 151000),
(1990, 18, '2025-02-25', 145000),
(1991, 17, '2025-02-25', 10000),
(1992, 12, '2025-02-25', 3000),
(1993, 17, '2025-02-25', 46000),
(1994, 15, '2025-02-25', 1000),
(1995, 125, '2025-02-25', 20000),
(1996, 16, '2025-02-25', 26000),
(1997, 14, '2025-02-25', 26000),
(1998, 17, '2025-02-25', 4000),
(1999, 14, '2025-02-25', 26000),
(2000, 14, '2025-02-25', 4000),
(2001, 15, '2025-02-25', 4000),
(2002, 15, '2025-02-25', 1000),
(2003, 15, '2025-02-26', 20000),
(2004, 15, '2025-02-26', 20000),
(2005, 18, '2025-02-26', 33000),
(2006, 128, '2025-02-26', 5000),
(2007, 15, '2025-02-26', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` enum('admin','karyawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(152, 'admin123#', 'anjayalok', 'admin'),
(153, 'bamskuy', 'nabil1234', 'karyawan'),
(154, 'ubur-ubur', 'ikanlele', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nabil', 'wheugsjd@gmail.com', NULL, '$2y$12$fkfrfY1Ii7CO2JqA1CE/SupkExgX0vRb8df1nDaIXRdBzffFvnzMW', NULL, '2025-01-19 19:36:18', '2025-01-19 19:36:18'),
(2, 'anjay', 'nabil@gmail.com', NULL, '$2y$12$bnvvBiyi8fIDmRcf39bs8OKD4LrzBFRB7HR9tALnq6PBtYHA5vboW', NULL, '2025-01-20 17:49:50', '2025-01-20 17:49:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD PRIMARY KEY (`id_transaksi_detil`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  MODIFY `id_transaksi_detil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
