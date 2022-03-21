-- Table clientinformation
CREATE TABLE `clientinformation` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(9) NOT NULL
);
-- Indexes for table `clientinformation`
ALTER TABLE `clientinformation`
  ADD PRIMARY KEY (`id`);


-- Table fuelquote
CREATE TABLE `fuelquote` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gallons_requested` int(11) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `suggested_price` double NOT NULL,
  `total_amount` double NOT NULL
);
-- Indexes for table `fuelquote`

ALTER TABLE `fuelquote`
  ADD PRIMARY KEY (`id`); 

-- Table usercredentials
CREATE TABLE `usercredentials` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
);
-- Indexes for table `usercredentials`

ALTER TABLE `usercredentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);