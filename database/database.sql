CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contactNumber` varchar(25) DEFAULT NULL,
  `dateOfBirth` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `userType` varchar(256) NOT NULL,
  `userStatus` varchar(256) NOT NULL,
  `paypalId` varchar(256) DEFAULT NULL,
  `pointsCollected` decimal(11,0) DEFAULT '0',
  `dateCreated` datetime NOT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  PRIMARY KEY (userId)
);

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `postTitle` varchar(256) NOT NULL,
  `itemType` varchar(256) NOT NULL,
  `itemModal` varchar(256) NOT NULL,
  `problemType` varchar(25) NOT NULL,
  `repairMethodRequested` varchar(25) NOT NULL,
  `problemDescription` varchar(256) NOT NULL,
  `datePublished` date NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `userId` int(11),
  PRIMARY KEY (postId)
);

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `datePublished` date NOT NULL,
  `description` varchar(256) NOT NULL,
  `upVote` int(11) DEFAULT '0',
  `downVote` int(11) DEFAULT '0',
  `userId` int(11),
  `postId` int(11),
  PRIMARY KEY (commentId)
);

CREATE TABLE `offers` (
  `offerId` int(11) NOT NULL,
  `dateOffered` datetime NOT NULL,
  `dateCompleted` datetime,
  `priceOffered` decimal(10,2) NOT NULL,
  `postTitle` varchar(256) NOT NULL,
  `clientName` varchar(256) NOT NULL,
  `offerStatus` varchar(256) NOT NULL,
  `repairStatus` varchar(256) NOT NULL,
  `paymentStatus` varchar(256) NOT NULL,
  `clientId` int(11),
  `technicianId` int(11),
  `postId` int(11),
  PRIMARY KEY (offerId)
);

CREATE TABLE `transactions` (
  `transactionId` int(11) NOT NULL,
  `transactionDate` datetime,
  `amountPaid` decimal(10,2) NOT NULL,
  `userId` int(11),
  `offerId` int(11),
  PRIMARY KEY (transactionId)
);

ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `offers`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `transactions`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
ALTER TABLE posts
ADD CONSTRAINT FK_generalUserIdPost
FOREIGN KEY (userID) REFERENCES users(userId);

ALTER TABLE comments
ADD CONSTRAINT FK_userIdComment
FOREIGN KEY (userID) REFERENCES users(userId);

ALTER TABLE comments
ADD CONSTRAINT FK_postIdComment
FOREIGN KEY (postID) REFERENCES posts(postId);

ALTER TABLE offers
ADD CONSTRAINT FK_expertUserIdOffer
FOREIGN KEY (userID) REFERENCES users(userId);

ALTER TABLE offers
ADD CONSTRAINT FK_postIdOffer
FOREIGN KEY (postID) REFERENCES posts(postId);

ALTER TABLE transactions
ADD CONSTRAINT FK_generalUserIdTransaction
FOREIGN KEY (userID) REFERENCES users(userId);

ALTER TABLE transactions
ADD CONSTRAINT FK_offerIdTransaction
FOREIGN KEY (offerID) REFERENCES offers(offerId);