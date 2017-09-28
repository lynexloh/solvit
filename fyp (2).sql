CREATE TABLE `ipaddress_vote_map` (
  `id` int(8) NOT NULL,
  `link_id` int(8) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `vote_rank` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `links` (
  `id` int(8) NOT NULL,
  `votes` tinyint(2) DEFAULT '0',
  `user_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `reply_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `post` (
  `post_ID` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `modal` varchar(256) NOT NULL,
  `problem` varchar(25) NOT NULL,
  `method` varchar(25) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `user_ID` int(11) NOT NULL,
  `support` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `product` (
  `order_ID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(256) NOT NULL,
  `problem` varchar(256) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `user_ID` int(11) NOT NULL,
  `expert_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `method` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `payment` int(11) NOT NULL,
  `confirm` varchar(11) NOT NULL,
  `checkIn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comments` varchar(256) NOT NULL,
  `votes` int(11) DEFAULT '0',
  `user_ID` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reward` (
  `reward_ID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `points` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `user_Name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `birthdate` varchar(256) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `date` datetime NOT NULL,
  `type` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `points` decimal(11,0) NOT NULL,
  `experience` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `paypal` varchar(256) NOT NULL,
  `chat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`user_ID`, `user_Name`, `password`, `email`, `birthdate`, `occupation`, `mobile`, `date`, `type`, `status`, `address`, `points`, `experience`, `votes`, `paypal`, `chat`) VALUES
(1, 'Yeo Meng Tat', '$2y$10$MXUCAwEgwFMd8Z/4vNw1BuChX9w.XlE4R8/izEve8zMZ1LOZoGE0u', 'thelegacy95@hotmail.com', '', '', NULL, '2017-04-16 23:11:09', 'Admin', '', '', '0', 0, 0, '', '532');

CREATE TABLE `user_reward` (
  `ur_ID` int(11) NOT NULL,
  `reward_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `voting_count` (
  `id` int(11) NOT NULL,
  `unique_content_id` varchar(100) NOT NULL,
  `vote_up` int(11) NOT NULL,
  `vote_down` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `ipaddress_vote_map`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);


ALTER TABLE `post`
  ADD PRIMARY KEY (`post_ID`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `fk_order_user` (`user_ID`),
  ADD KEY `fk_order_expert` (`expert_ID`),
  ADD KEY `fk_order_post` (`post_ID`);

ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reply_user` (`user_ID`),
  ADD KEY `fk_reply_post` (`post_ID`);


ALTER TABLE `reward`
  ADD PRIMARY KEY (`reward_ID`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);


ALTER TABLE `user_reward`
  ADD PRIMARY KEY (`ur_ID`);

ALTER TABLE `voting_count`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `ipaddress_vote_map`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `links`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `post`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reward`
  MODIFY `reward_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `user_reward`
  MODIFY `ur_ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `voting_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
