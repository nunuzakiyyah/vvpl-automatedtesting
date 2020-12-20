-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2019 pada 15.01
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarseeker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` varchar(64) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `poster` varchar(100) NOT NULL DEFAULT 'default_beasiswa.jpg',
  `username_pendonor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `judul`, `deskripsi`, `tgl_mulai`, `tgl_selesai`, `jenis`, `poster`, `username_pendonor`) VALUES
('5cb6b30a79072', 'Jalur Prestasi Unggulan (JPU)', 'Jalur Prestasi Unggulan (JPU) merupakan Jalur Tes Tulis Beasiswa penerimaan calon mahasiswa baru Telkom University. Jalur ini terbuka untuk umum, khususnya bagi peserta yang masih berusia maksimal 24 tahun per Agustus 2019. Biaya Pendaftarannya adalah Rp. 200.000.', '2019-04-17', '2019-04-24', 'Jalur Prestasi Unggulan (JPU)', '5cb6b30a79072.jpeg', 'telkom'),
('5cb6b3a2bd67d', 'Beasiswa Pascasarjana', 'Calon mahasiswa yang mendapatkan beasiswa unggulan, akan di bebaskan dari seluruh biaya pendidikan jika memenuhi syarat-syarat akademik tertentu yang di berikan oleh Telkom University.', '2019-04-17', '2019-04-24', 'Beasiswa Pascasarjana', '5cb6b3a2bd67d.jpeg', 'telkom'),
('5cb6b41ca82d5', 'Beasiswa Online Scholarship Competition', 'Calon mahasiswa yang mendapatkan beasiswa ini, akan di bebaskan dari seluruh biaya pendidikan jika memenuhi syarat-syarat akademik tertentu yang di berikan oleh Telkom University.', '2019-04-17', '2019-04-24', 'OSC', '5cb6b41ca82d5.jpeg', 'telkom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `view` int(10) NOT NULL DEFAULT 0,
  `gambar` varchar(100) NOT NULL DEFAULT 'default_news.jpg',
  `penulis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `tanggal`, `view`, `gambar`, `penulis`) VALUES
(5, 'Siapa Minat, Kominfo Buka Beasiswa Talenta Digital untuk 25 Ribu Orang', 'Dilansir dari Setkab.go.id, peserta program akan dilatih secara intensif untuk menguasai hardskill dan softskill sesuai dengan peminatan di bidang teknis Artifical Intelligence, Big Data, Cloud Computing, Cyber Security, Internet of Things, dan Machine Learning serta beberapa tema pelatihan lainnya.', '2019-04-22', 0, '5.jpg', 'admin'),
(6, 'Buruan Cek di Sini! Pemerintah Buka Beasiswa S3 untuk 1.000 Dosen', 'Pemerintah melalui Direktorat Jenderal Pendidikan Tinggi, Kementerian Riset, Teknologi, dan Pendidikan Tinggi (Ristekdikti) terus berupaya mendorong dan meningkatkan kuantitas dosen yang memiliki kualifikasi akademik minimal magister melalui beragam pendekatan. Salah satunya membuka beasiswa pascasarjana.', '2019-04-22', 0, '6.jpg', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL,
  `status` enum('Accepted','Pending','Rejected','') NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_beasiswa` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `status`, `tanggal`, `username`, `id_beasiswa`) VALUES
(1, 'Pending', '2019-04-17', 'mahasiswa', '5cb6b3a2bd67d'),
(2, 'Rejected', '2019-04-23', 'mahasiswa', '5cb6b30a79072'),
(3, 'Accepted', '2019-04-23', 'mahasiswa', '5cb6b41ca82d5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profil` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(20) NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `avatar` varchar(64) NOT NULL DEFAULT 'user.png',
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profil`, `nama`, `jk`, `tgl_lahir`, `no_tlp`, `jalan`, `kota`, `provinsi`, `negara`, `institusi`, `avatar`, `username`) VALUES
(1, 'Maha Siswa', 'L', '1990-01-01', '082115986554', 'Jl Kenangan', 'Kembang', 'Jawa Barat', 'Indonesia', 'Telkom University', 'user.png', 'mahasiswa'),
(2, 'Iriyanto', 'L', '1998-10-26', '027845784578', ' Jl. Telekomunikasi, Jl. Terusan Buah Batu No.01, Sukapura, Dayeuhkolot', 'Bandung', 'Jawa Barat', 'Indonesia', 'Telkom University', '2.png', 'telkom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `level`) VALUES
('admin', 'admin@gmail.com', '9bacfdb6b041faf8612df1ca0e5a3ede', 3),
('mahasiswa', 'mahasiswa@gmail.com', '9bacfdb6b041faf8612df1ca0e5a3ede', 1),
('telkom', 'pendonor@gmail.com', '9bacfdb6b041faf8612df1ca0e5a3ede', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`),
  ADD KEY `fk_pendonor` (`username_pendonor`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_berita` (`penulis`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_pendaftaran1` (`username`),
  ADD KEY `fk_pendaftaran2` (`id_beasiswa`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `fk_profile` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `fk_pendonor` FOREIGN KEY (`username_pendonor`) REFERENCES `users` (`username`);

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita` FOREIGN KEY (`penulis`) REFERENCES `users` (`username`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `fk_pendaftaran2` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`);

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
