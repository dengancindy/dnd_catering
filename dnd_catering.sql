-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2024 pada 14.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnd_catering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` char(5) NOT NULL,
  `userName` varchar(10) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `userName`, `password`) VALUES
('01', 'admin', '12312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailpesanan`
--

CREATE TABLE `tbl_detailpesanan` (
  `idDetailPesanan` int(11) NOT NULL,
  `idPesanan` int(11) NOT NULL,
  `idPaketMenu` char(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_detailpesanan`
--

INSERT INTO `tbl_detailpesanan` (`idDetailPesanan`, `idPesanan`, `idPaketMenu`, `quantity`, `subtotal`) VALUES
(1, 1, 'PT002', 20, 400000),
(2, 4, 'P0001', 20, 35000),
(3, 4, 'P0002', 20, 30000),
(4, 5, 'PSK02', 20, 400000),
(5, 6, 'P0001', 100, 9000000),
(6, 7, 'PG003', 20, 40000),
(7, 7, 'PSK02', 20, 20000),
(8, 10, 'PG003', 20, 40000),
(9, 10, 'PSK02', 20, 20000),
(10, 11, 'P0002', 20, 30000),
(11, 12, 'PG001', 20, 400000),
(12, 13, 'P0001', 20, 700000),
(13, 14, 'PNB01', 60, 27000),
(14, 15, 'P0001', 20, 700000),
(15, 16, 'PNB01', 40, 27000),
(16, 16, 'PSK01', 40, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idKat` char(5) NOT NULL,
  `namaKat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gambarKat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idKat`, `namaKat`, `gambarKat`) VALUES
('K0001', 'Prasmanan', 'K0001_32.png'),
('K0002', 'Snack', '46.png'),
('K0003', 'Nasi Box', 'K0003_5.png'),
('K0004', 'Gubugan', '62.png'),
('K0005', 'Tumpengan', '15.png'),
('K0007', 'Sehat', '52.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paketmenu`
--

CREATE TABLE `tbl_paketmenu` (
  `idPaketMenu` char(5) NOT NULL,
  `namaPaketMenu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `deskripsi` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `gambar` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `idKat` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_paketmenu`
--

INSERT INTO `tbl_paketmenu` (`idPaketMenu`, `namaPaketMenu`, `deskripsi`, `harga`, `gambar`, `idKat`) VALUES
('P0001', 'Werkudoro 1', 'Sudah include Nasi, Kerupuk, Sambal, & Soft Drink. Werkudoro 1 berisi lauk: \r\n1. Sate ayam \r\n2. Semur daging \r\n3. Cumi saus tiram \r\n4. Sambal kentang ati\r\n5. Sup kimlo\r\n6. Cah kailan', 35000, '81.png', 'K0001'),
('P0002', 'Werkudoro 2', 'Sudah include Nasi, Kerupuk, Sambal, & Soft Drink. Werkudoro 2 berisi lauk: 1. Ayam fillet 2. Bola daging pedas manis 3. Sambal goreng krecek 4. Oseng bihun 5. Sup jagung', 30000, '10.png', 'K0001'),
('P0003', 'Werkudoro 3', 'Sudah include Nasi, Kerupuk, Sambal, & Soft Drink. Werkudoro 3 berisi lauk: \r\n1. Sate ayam \r\n2. Oseng ampela ati cabe hijau\r\n3. Sup matahari\r\n4. Cah brokoli sosis', 28000, '111.png', 'K0001'),
('PG001', 'Arjuna 1', 'Sudah include alat gubug, dengan 4 macam: \r\n1. Zuppa sup\r\n2. Steak ayam\r\n3. Sop iga\r\n4. Es pudding', 40000, 'z1.png', 'K0004'),
('PG002', 'Arjuna 2', 'Sudah include alat gubug, dengan 4 macam: 1. Steak daging 2. Pempek 3. Bakso 4. Es cream', 40000, 'z2.png', 'K0004'),
('PG003', 'Arjuna 3', 'Sudah include alat gubug, dengan 4 macam: 1. Martabak 2. Sate kambing 3. Sup pangsit 4. Es cream', 40000, 'z3.png', 'K0004'),
('PG004', 'Srikandi 1', 'Sudah include alat gubug, dengan 3 macam: 1. Zuppa sup 2. Steak ayam 3. Es pudding', 30000, 'z4.png', 'K0004'),
('PG005', 'Srikandi 2', 'Sudah include alat gubug, dengan 3 macam: 1. Steak daging 2. Bakso 3. Es cream', 30000, 'z5.png', 'K0004'),
('PG006', 'Srikandi 3', 'Sudah include alat gubug, dengan 3 macam: 1. Dimsum 2. Bakso 3. Es pudding', 30000, 'z6.png', 'K0004'),
('PNB01', 'Sinta 1', 'Sudah include Nasi, Kerupuk, Buah, & Mineral, dengan 4 lauk:\r\n1. Ayam Goreng \r\n2. Semur daging\r\n3. Cah kailan\r\n4. Sambal goreng kentang ', 27000, '19.png', 'K0003'),
('PNB02', 'Sinta 2', 'Sudah include Nasi, Kerupuk, Buah, & Mineral, dengan 4 lauk:\r\n1. Ayam bakar \r\n2. Udang goreng\r\n3. Cah buncis\r\n4. Oseng bihun', 27000, '20.png', 'K0003'),
('PNB03', 'Sinta 3 ', 'Sudah include Nasi, Kerupuk, Buah, & Mineral, dengan 4 lauk:\r\n1. Ayam fillet \r\n2. Bola daging pedas manis\r\n3. Sambal goreng krecek\r\n4. Oseng bihun', 27000, '21.png', 'K0003'),
('PNB04', 'Rama 1', 'Sudah include Nasi, Sambal, Kerupuk, Buah, & Mineral, dengan 3 lauk:\r\n1. Ayam Goreng \r\n2. Orek tempe\r\n3. Sambal goreng krecek ', 25000, '22.png', 'K0003'),
('PNB05', 'Rama 2', 'Sudah include Nasi, Sambal, Kerupuk, Buah, & Mineral, dengan 3 lauk:\r\n1. Ayam bakar\r\n2. Oseng bihun\r\n3. Cah buncis\r\n', 24000, '23.png', 'K0003'),
('PNB06', 'Rama 3', 'Sudah include Nasi, Sambal, Kerupuk, Buah, & Mineral, dengan 3 lauk:\r\n1. Ayam fillet\r\n2. Cah kailan\r\n3. Sambal goreng krecek\r\n', 25000, '24.png', 'K0003'),
('PSK01', 'Jelita 1', 'Isi 4 macam:\r\n1. Pastel goreng\r\n2. Brownies\r\n3. Sus Cocktail\r\n4. Mineral', 20000, '121.png', 'K0002'),
('PSK02', 'Jelita 2', 'Isi 4 macam:\r\n1. Risoles Beef\r\n2. Pie Buah\r\n3. Cheese Cake\r\n4. Mineral', 20000, '131.png', 'K0002'),
('PSK03', 'Jelita 3 ', 'Isi 4 macam:\r\n1. Lemper ayam\r\n2. Muffin\r\n3. Chicken pie\r\n4. Mineral', 20000, '141.png', 'K0002'),
('PSK04', 'Jelita 4', 'Isi 4 macam:\r\n1. Arem-arem\r\n2. Pie Buah\r\n3. Brownies\r\n4. Mineral', 20000, '151.png', 'K0002'),
('PSK05', 'Juwita 1', 'Isi 3 macam:\r\n1. Risoles Beef\r\n2. Sus cocktail\r\n3. Mineral', 13000, '161.png', 'K0002'),
('PSK06', 'Juwita 2', 'Isi 3 macam:\r\n1. Lemper ayam\r\n2. Muffin\r\n3. Mineral', 13000, '17.png', 'K0002'),
('PSK07', 'Juwita 3', 'Isi 3 macam:\r\n1. Arem-arem\r\n2. Brownies\r\n3. Mineral', 13000, '18.png', 'K0002'),
('PT001', 'Sadewa', 'Tumpeng istimewa isi ayam goreng, sambal goreng daging giling, udang goreng, perkedel kentang, telur dadar iris, kering tempe, abon. Untuk 20 porsi (180.000) masukkan keranjang 1 kali.', 9000, '110.png', 'K0005'),
('PT002', 'Nakula', 'Tumpeng istimewa isi ayam panggang oven, sambal goreng daging giling, ikan asin, tahu bacem, tempe bacem, telor rebus, urapan, rempeyek. Untuk 20 porsi (180.000) masukkan keranjang 1 kali.', 90000, '25.png', 'K0005'),
('S0001', '4S5S', 'Sehat sekali menunya', 25000, '211.png', 'K0007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `idPembeli` int(5) NOT NULL,
  `NIK` char(16) NOT NULL,
  `namaPembeli` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(10) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`idPembeli`, `NIK`, `namaPembeli`, `gender`, `alamat`, `no_telp`, `email`, `password`, `role`) VALUES
(4, '099999999', 'Rehan Aditia', 'P', 'Jl. Madukono no.80, Tempel, Sleman', '0897886700', '', '', 0),
(5, '90889897120', 'Zelina Cindy Maharani', 'L', 'Jl. Jodipati no.11, Tempel, Sleman', '0897886711', 'zelinacindy40@gmail.com', 'cindy', 2),
(6, '90889897120', 'Sulistyono', 'L', 'Jl. Madukono no.99', '0897886711', '', '', 0),
(7, '09888888888', 'Hafiza', 'P', 'Jl. Madukono no.70, Tempel, Sleman', '089528776719', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `idPesanan` int(11) NOT NULL,
  `alamatPengiriman` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tglPesan` date NOT NULL,
  `tglPengiriman` date NOT NULL,
  `jam` time NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `idPembeli` int(5) NOT NULL,
  `idPaketMenu` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`idPesanan`, `alamatPengiriman`, `tglPesan`, `tglPengiriman`, `jam`, `totalHarga`, `idPembeli`, `idPaketMenu`) VALUES
(13, 'Gedung Merdeka, Sleman', '2024-07-22', '2024-07-24', '08:25:00', 700000, 4, 'P0001'),
(15, 'Gedung Merdeka, Sleman', '2024-07-22', '2024-07-26', '17:00:00', 700000, 7, 'P0001'),
(16, 'Gedung Melati, Sleman', '2024-07-22', '2024-07-27', '07:00:00', 800000, 5, 'PSK01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `tbl_detailpesanan`
--
ALTER TABLE `tbl_detailpesanan`
  ADD PRIMARY KEY (`idDetailPesanan`),
  ADD UNIQUE KEY `idPesanan` (`idPesanan`,`idPaketMenu`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idKat`);

--
-- Indeks untuk tabel `tbl_paketmenu`
--
ALTER TABLE `tbl_paketmenu`
  ADD PRIMARY KEY (`idPaketMenu`);

--
-- Indeks untuk tabel `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`idPembeli`);

--
-- Indeks untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`idPesanan`),
  ADD UNIQUE KEY `idPembeli` (`idPembeli`,`idPaketMenu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_detailpesanan`
--
ALTER TABLE `tbl_detailpesanan`
  MODIFY `idDetailPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  MODIFY `idPembeli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `idPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
