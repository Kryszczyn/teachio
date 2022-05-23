-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Maj 2022, 10:50
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
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `lname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
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
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lesson_number` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `date_attendance` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 - NB, 2 - U, 3 - SP, 4 - ZW',
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `teacher_id`, `lesson_number`, `date_added`, `date_attendance`, `type`, `semester`) VALUES
(1, 1, 1, 1, '2022-05-18', '2022-05-18', 1, 1),
(2, 1, 1, 1, '2022-05-16', '2022-05-16', 1, 1),
(3, 1, 1, 2, '2022-05-16', '2022-05-16', 2, 1),
(4, 1, 1, 1, '2022-05-20', '2022-05-20', 1, 1),
(5, 1, 1, 3, '2022-05-16', '2022-05-16', 1, 1);

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
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `value` varchar(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `name`, `date`, `value`, `description`, `teacher_id`, `student_id`, `status`) VALUES
(2, 'Nagana', '2022-05-11', '-10', 'Uczeń po przegranym zakładzie z kolegami zjadł krede po czym oznajmił krzycząc “JAK JEBANY GOŁOMB BĘDĘ SRAŁ NA WAS Z GÓRY”', 1, 1, 1),
(3, 'Testowa uwaga', '2022-05-11', '-20', 'Jakiś testowy opis', 1, 1, 1),
(7, 'test', '2022-05-11', '-20', 'asd', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `date`, `date_added`) VALUES
(1, 'apel', 'siemano kolano', '2022-04-26', '2022-04-25'),
(2, 'testowy wydarzenie', 'asdasdasd', '2022-04-22', '2022-04-25'),
(3, 'jakieś wydarzenie', 'jakiś opis', '2022-04-30', '2022-04-27'),
(4, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(5, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(6, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(7, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(8, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(9, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(10, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(11, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(12, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(13, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(14, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(15, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(16, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(17, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(18, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(19, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(20, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(21, 'no elo', 'huehue', '2022-05-05', '2022-05-04'),
(22, 'asd', 'asd', '2022-05-06', '2022-05-04');

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
  `name` varchar(2) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 - Aktywność, 2 - Kartkówka, 3 - Praca Domowa, 4 - Odpowiedź ustna, 5 - Klasówka',
  `semester` int(1) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `grade`
--

INSERT INTO `grade` (`id_grade`, `name`, `type`, `semester`, `subject_id`) VALUES
(1, '4-', 3, 2, 5),
(2, '2', 4, 1, 5);

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
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`) VALUES
(1, 'Biologia', 'To jest Biologia'),
(2, 'Chemia', 'To nie jest Biologia'),
(3, 'Fizyka', '-'),
(4, 'Geografia', '-'),
(5, 'Historia', '-'),
(6, 'Informatyka', ''),
(7, 'Język angielski', ''),
(8, 'Język polski', ''),
(9, 'Matematyka', ''),
(10, 'Wychowanie fizyczne', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subject_grade`
--

CREATE TABLE `subject_grade` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `subject_grade`
--

INSERT INTO `subject_grade` (`id`, `subject_id`, `grade_id`) VALUES
(1, 3, 2),
(2, 2, 13),
(3, 1, 14),
(4, 1, 15),
(5, 1, 1),
(6, 3, 2),
(7, 1, 3),
(8, 2, 4),
(9, 6, 5),
(10, 1, 6),
(11, 1, 7),
(12, 4, 8),
(13, 4, 9),
(14, 6, 10),
(15, 9, 11),
(16, 0, 12),
(17, 0, 13),
(18, 0, 14),
(19, 0, 15),
(20, 0, 16),
(21, 0, 17),
(22, 0, 18),
(23, 0, 19),
(24, 0, 20),
(25, 0, 21),
(26, 0, 22),
(27, 0, 23),
(28, 0, 24),
(29, 0, 25),
(30, 0, 26),
(31, 0, 27),
(32, 0, 28),
(33, 0, 29),
(34, 0, 30),
(35, 0, 31),
(36, 0, 32),
(37, 0, 33),
(38, 0, 34),
(39, 3, 35),
(40, 8, 36),
(41, 6, 37),
(42, 10, 38),
(43, 1, 39),
(44, 10, 40),
(45, 4, 41),
(46, 3, 42),
(47, 5, 1),
(48, 5, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subject_student`
--

CREATE TABLE `subject_student` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `subject_teacher`
--

INSERT INTO `subject_teacher` (`id`, `subject_id`, `teacher_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 3, 1),
(6, 1, 1),
(7, 2, 1),
(8, 6, 1),
(9, 1, 1),
(10, 1, 1),
(11, 4, 1),
(12, 4, 1),
(13, 6, 1),
(14, 9, 1),
(15, 0, 1),
(16, 0, 1),
(17, 0, 1),
(18, 0, 1),
(19, 0, 1),
(20, 0, 1),
(21, 0, 1),
(22, 0, 1),
(23, 0, 1),
(24, 0, 1),
(25, 0, 1),
(26, 0, 1),
(27, 0, 1),
(28, 0, 1),
(29, 0, 1),
(30, 0, 1),
(31, 0, 1),
(32, 0, 1),
(33, 0, 1),
(34, 0, 1),
(35, 0, 1),
(36, 0, 1),
(37, 0, 1),
(38, 3, 1),
(39, 8, 1),
(40, 6, 1),
(41, 10, 1),
(42, 1, 1),
(43, 10, 1),
(44, 4, 1),
(45, 3, 1),
(46, 5, 1),
(47, 5, 1);

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
-- Indeksy dla tabeli `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `subject_grade`
--
ALTER TABLE `subject_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `subject_student`
--
ALTER TABLE `subject_student`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT dla tabeli `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `subject_grade`
--
ALTER TABLE `subject_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `subject_student`
--
ALTER TABLE `subject_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
