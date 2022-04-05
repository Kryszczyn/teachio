-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Kwi 2022, 13:32
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `teachio`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(9) NOT NULL,
  `status` int(11) NOT NULL,
  `last_login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `fname`, `lname`, `date_birth`, `phone`, `status`, `last_login_date`) VALUES
(1, 'admin@teachio.pl', '123', 'Czesław', 'Michniewicz', '2022-03-08', '123123123', 1, '2022-03-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `attendance`
--

CREATE TABLE `attendance` (
  `date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `attendance`
--

INSERT INTO `attendance` (`date`, `student_id`, `status`) VALUES
('2022-03-30', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classroom`
--

CREATE TABLE `classroom` (
  `id_classroom` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `classroom`
--

INSERT INTO `classroom` (`id_classroom`, `name`, `grade_id`, `status`, `teacher_id`) VALUES
(1, 'klasa 1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classroom_student`
--

CREATE TABLE `classroom_student` (
  `classroom_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `classroom_student`
--

INSERT INTO `classroom_student` (`classroom_id`, `student_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exam`
--

CREATE TABLE `exam` (
  `id_exam` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `exam`
--

INSERT INTO `exam` (`id_exam`, `exam_type_id`, `name`, `start_date`) VALUES
(1, 1, 'jakiś teścik', '2022-03-31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exam_result`
--

CREATE TABLE `exam_result` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `exam_result`
--

INSERT INTO `exam_result` (`exam_id`, `student_id`, `subject_id`) VALUES
(0, 2, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `exam_type`
--

CREATE TABLE `exam_type` (
  `id_exam_type` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `exam_type`
--

INSERT INTO `exam_type` (`id_exam_type`, `name`, `description`) VALUES
(1, 'kartkówka', 'kartkówka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `name` varchar(1) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `grade`
--

INSERT INTO `grade` (`id_grade`, `name`, `description`) VALUES
(1, '4', 'jakiś opis');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `parent`
--

INSERT INTO `parent` (`id`, `email`, `password`, `fname`, `lname`, `date_birth`, `phone`, `status`, `last_login_date`) VALUES
(1, 'flozanowic.mozenkow@teachio.pl', '123123', 'Nikodem', 'Karlikowski', '2022-03-15', '123123123', 1, '2022-03-16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(9) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date_of_join` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `student`
--

INSERT INTO `student` (`id`, `email`, `password`, `fname`, `lname`, `date_birth`, `phone`, `parent_id`, `date_of_join`, `status`, `last_login_date`) VALUES
(1, 'krystian.maj@teachio.pl', '123', 'Krystian', 'Maj', '1999-06-28', '536099948', 1, '2022-03-16', 1, '2022-03-16'),
(2, 'wiktoria.kupis@teachio.pl', '123', 'Wiktoria', 'Kupis', '2000-06-23', '123123123', 2, '2022-03-16', 1, '2022-03-16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `subject`
--

INSERT INTO `subject` (`id_subject`, `name`, `grade_id`) VALUES
(1, 'przyrka', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `teacher`
--

INSERT INTO `teacher` (`id`, `email`, `password`, `fname`, `lname`, `date_birth`, `phone`, `status`, `last_login_date`) VALUES
(1, 'andrzej.ziewiec@teachio.pl', '123', 'Andrzej', 'Ziewiec', '1980-03-04', '123123123', 1, '2022-03-16');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Indeksy dla tabeli `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id_exam`);

--
-- Indeksy dla tabeli `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id_exam_type`);

--
-- Indeksy dla tabeli `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indeksy dla tabeli `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indeksy dla tabeli `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `exam`
--
ALTER TABLE `exam`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id_exam_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
