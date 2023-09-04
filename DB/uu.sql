
CREATE TABLE `user_details` (
  `id` int(9) NOT NULL,
  `index` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);



INSERT INTO `user_details` (`id`, `index`, `name`, `email`, `role`, `username`, `password`) VALUES 
(1, 'bscwd223501', 'Isuru Bandara', 'isurubandara@gmail.com', 'super_admin', 'isuru', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'bscwd223502', 'Idunil Bandara', 'idunilbandara@gmail.com', 'admin', 'idunil', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'bscwd223503', 'Amindu Sangeeth', 'amindusangeeth@gmail.com', 'user', 'ami', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'bscwd223504', 'Delete This user if you want', 'delete@gmail.com', 'user', 'delete_me', '81dc9bdb52d04dc20036dbd8313ed055');







CREATE TABLE `st_grades` (
  `g_id` int(9) NOT NULL,
  `g_index` varchar(20) NOT NULL,
  `gpa` float NOT NULL
);

INSERT INTO `st_grades` (`g_id`, `g_index`, `gpa`) VALUES
(01, 'bscwd223501', 1.11),
(02, 'bscwd223502', 1.11),
(03, 'bscwd223503', 1.11);


CREATE TABLE `subjects` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_details` varchar(255),
  `s_credit` int(2) NOT NULL
);



INSERT INTO `subjects` (`s_id`, `s_name`, `s_details`, `s_credit`) VALUES
(01, 'Maths', 'lorem', '2'),
(02, 'DBSM', 'lorem', '2'),
(03, 'Web', 'lorem', '3');


CREATE TABLE `gpa` (
  `id` int(11) NOT NULL,
  `marks` varchar(100) NOT NULL,
  `grade_points` varchar(255) NOT NULL,
  `grade_value` float NOT NULL
);

INSERT INTO `gpa` (`id`, `marks`, `grade_points`, `grade_value`) VALUES
(01, '100-80', 'A', 4.00),
(02, '70-79', 'A-', 3.70),
(03, '69-65', 'B+', 3.30),
(04, '64-60', 'B', 3.00),
(05, '59-55', 'B-', 2.70),
(06, '54-50', 'C+', 2.30),
(07, '49-45', 'C', 2.00),
(08, '44-40', 'C-', 1.70),
(09, '39-35', 'D+', 1.30),
(10, '34-30', 'D', 1.00),
(11, '29-00', 'F', 0.00);


