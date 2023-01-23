-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2019 at 10:14 PM
-- Server version: 8.0.13
-- PHP Version: 7.3.0-2+0~20181217092659.24+stretch~1.gbp54e52f

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(4096) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `thread_id`, `user_id`, `text`) VALUES
(1, 1, 4, '<b>Coin Desk</b> is a platform made to enable disscussions around crypto-currency. We hope our forum can be of use to expand the ever growing community regarding crypto-currencies.\r\nThe Coin Desk team consists of me, Ingur, Scipio, and Jason.\r\n<br/><br/>\r\n<b><u>The rules of the forum are simple;</u></b>\r\n<br/><br/>\r\n<b>Respect other users.</b>\r\nNo flaming or abusing fellow forum members. Users who continue to post inflammatory, abusive comments will be deleted from the forum after two warnings are issued by moderators.\r\n<br/><br/>\r\n<b>Harassment.</b> No threats or harassment of other users will be tolerated. Any instance of threatening or harassing behavior is grounds for deletion from the forums.\r\n<br/><br/>\r\n<b>Adult content.</b> No profanity or pornography is allowed. Posts containing adult material will be deleted.'),
(2, 2, 4, 'Contact us by sending an <a class=\"link\" href=\"mailto:email%40mail.e\">email</a> or by making <a class=\"link\" href=\"/create.php?tags=support\">a post with the tag \"support\"</a>.'),
(17, 3, 5, 'I type d that tyitle twice because I knew it was wrong the first time.  Still wrong.  w/e.  GF\'s out at a lesbian bar, BTC crashing WHY AM I HOLDING? I\'LL TELL YOU WHY.  It\'s because I\'m a bad trader and I KNOW I\'M A BAD TRADER.  Yeah you good traders can spot the highs and the lows pit pat piffy wing wong wang just like that and make a millino bucks sure no problem bro.  Likewise the weak hands are like OH NO IT\'S GOING DOWN I\'M GONNA SELL he he he and then they\'re like OH GOD MY ASSHOLE when the SMART traders who KNOW WHAT THE FUCK THEY\'RE DOING buy back in but you know what?  I\'m not part of that group.  When the traders buy back in I\'m already part of the market capital so GUESS WHO YOU\'RE CHEATING day traders NOT ME~!  Those taunt threads saying &quot;OHH YOU SHOULD HAVE SOLD&quot; YEAH NO SHIT.  NO SHIT I SHOULD HAVE SOLD.  I SHOULD HAVE SOLD MOMENTS BEFORE EVERY SELL AND BOUGHT MOMENTS BEFORE EVERY BUY BUT YOU KNOW WHAT NOT EVERYBODY IS AS COOL AS YOU.  You only sell in a bear market if you are a good day trader or an illusioned noob.  The people inbetween hold.  In a zero-sum game such as this, traders can only take your money if you sell.\r\n\r\nso i\'ve had some whiskey\r\nactually on the bottle it\'s spelled whisky\r\nw/e\r\nsue me\r\n(but only if it\'s payable in BTC)'),
(22, 4, 6, 'Lol do you even crypto bro? I betchu don’t, ya soy boy looking little twink. Just so you know, I generate about .84 bitcoin a year from my mining machine. Yeah, you heard me right. .84. That’s nearly a whole bitcoin. Impressed? I thought not. I have over 8 titan x cards going 24/7 baby, you don’t even know. See how those GPU prices are skyhigh right now? Yeah, that’s all me baby. They’re hiding their cards from me .They’re scared. They’re afraid. The future is here and they don’t wanna hop on board. Might I remind you that bitcoins are only going to INCREASE in value. Guaranteed. And by the way that’s all profit baby cause my mom pays the power bill. I am the future, while you, a peasant, are still using paper money. Like a degenerate. You can’t burn a bitcoin faggot, what are you, stupid? Might I remind you that at any moment, your ancient paper currency could lose all value. What if the banks close and you can’t access your paper money? You’d be pretty screwed ya friggin loser. You have to be either an idiot or a democrat to not want to jump on board this train baby. Crypto4life'),
(23, 5, 7, 'Hey hey hey! Hey hey hey! Hey hey hey! Whatsawhatsawhatsawhatsawhatsawhatsawhatsa up Bitconnect! Hey hey hey everybody my name is Carlos Matos and I am coming from New York City, New York and let me tell you guys that I am so excited, I am so happy, I am really so thrilled to be right now sharing this amazing, glorious, super, and exciting moment of my life with all of you guys, and let me tell you that we are really changing the world as we know it, the world is not anymore the way it used to be, mmm mmm, No! No! No! BITCONNECT! Wow! BITCONNECT! We are coming and we are coming in waves! We are starting and we are watching go all over the world! We are pelting the entire world! Let me tell you guys that I started 137 days ago with only $25,610 and right now I am reaching $140,000! Woah woah woah woah woah woah woah Whats up? And let me tell you that I am actually earning around one hun- I mean $1,400 on an every day basis, seven days a week! What‽ I am right now independently, financially independently. I am saying to so many people who say that this was going to be con artist game, that this was gonna be a scammer game, “Hey! You’re gonna lose all your money!” My wife still doesn’t believe in me! I’m telling him “Oh honey, this is real!” “Oh no no no no no, that’s a scam!” And I said “But wait I’m gonna go to the bank and I’m gonna get my bitcoins and I’m actually gonna turn it into dollars, here there right on the table!” “No, that’s money you took from another account!” And I’ll say “What am I gonna do‽” Then I said to myself, “You know what? When I am starting to put $10,000 a day on her, right on her, you know on her table.” Then she’s gonna say “Woah!” Hahaha! Yo yo yo yo yo! “OK that’s real!” Hahahaha! So guys, I’m gonna tell you something. Faith and believe is the one thing that we will need to be able to change the world, and right now I believe that in this room, we have the seed that’s gonna germinate and is going to explode into an amazing opportunity for us to change this entire world. I am so proud, I am so honored, I am so excited to be here right now and let me tell you something, that each and every one of you has the opportunity to become like those amazing people that we know here from Vietnam. Hey hey! My group from Vietnam! Making so much money that it could probably that could probably have a real hard time counting it! Ha ha ha ha ha ha! So guys, let me tell you, I love, BITCONNECT!'),
(24, 6, 4, 'Im lacking <i>RAM</i> to reinforce my <b>WHAM</b>'),
(25, 5, 4, 'Wow thats very cool'),
(26, 7, 7, 'Cryptocurrency is the best and only way to do this. We are on the verge of a global financial crisis and once that happens, everyone is going to flock to crypto. Two things will happen when the global economy collapses a) HODLErs will become absurdly wealthy beyond anyone’s wildest imagination and b) cryptocurrency will start to become the new gold standard. 10 years from now, fiat won’t even be a thing. This is hard for a lot of technically inert people to fathom but either way, it’s happening. A lot of people have difficultly fathoming that knowledge will be swallowed in pill form by 2025 ( see Nicholas Negropante Ted Talk, you will literally be able to swallow a pill to learn calculus a decade from now ) but it doesn’t mean it’s not happening. A lot of people can’t fathom that, even today, you can literally hack your own DNA and code life forms ( like a T-Rex ) to scale using DNA Reprogramming ( Google it ). My buddy Austin Heinz had a company in SV called Cambrian Genomics before he committed suicide ( although everyone knows that’s a load of bs ) where they were literally printing hackable DNA with 3D printers.\r\n\r\nThe future is bright or bleak, depending on how you look at it. It will be very easy to get phased out if you don’t keep up with the times. Ignorance will not be bliss is this particular situation.\r\n\r\nSorry for the rant but it bothers me that people are still wondering how to transfer their money around when you have this beautiful system in play called cryptocurrency that will do everything you’re looking for.'),
(27, 4, 4, 'the framemain has been hacked  @ltcFTW `Lol do you even crypto bro? I betchu don’t, ya soy boy looking little twink. Just so you know, I generate about .84 bitcoin a year from my mining machine. Yeah, you heard me right. .84. That’s nearly a whole bitcoin. Impressed? I thought not. I have over 8 titan x cards going 24/7 baby, you don’t even know. See how those GPU prices are skyhigh right now? Yeah, that’s all me baby. They’re hiding their cards from me .They’re scared. They’re afraid. The future is here and they don’t wanna hop on board. Might I remind you that bitcoins are only going to INCREASE in value. Guaranteed. And by the way that’s all profit baby cause my mom pays the power bill. I am the future, while you, a peasant, are still using paper money. Like a degenerate. You can’t burn a bitcoin faggot, what are you, stupid? Might I remind you that at any moment, your ancient paper currency could lose all value. What if the banks close and you can’t access your paper money? You’d be pretty screwed ya friggin loser. You have to be either an idiot or a democrat to not want to jump on board this train baby. Crypto4life` \r\n'),
(28, 4, 5, 'I wonder if any of you are you aware that there are people in this world that have a severe medical condition which causes them to be that way? My mother for instance is one of those people. She is a crypto currency trader that has bad wrists and a bad back from trading on coinbase all day but you probably do not care about that case either. Oh well I am not one of those people I am 6\'4&quot; 245lbs and I exercise every day. I would love to see you say something like to my mother in front of me. Probably never happen though you are probably just an internet tough guy. I doubt very seriously you would say that to someones face. Just my thought.What do you think. Oh I am sorry you probably do not have a brain. I on the other hand will be happy to buy you a plane ticket to come here and see if you have the nerve to say that to someone I know.'),
(29, 8, 4, 'Im Gloria Borger and this is Pew<b>NEWS</b>'),
(30, 9, 5, 'The fact that bitcoin is a utility token for criminals, money launderers, tax evaders and terrorists is the reason why it will never go to 0. There is A LOT of money in crime, money laundering, tax evasion and terrorism. And there are only 21 million bitcoins. This guy doesn\'t know what he is talking about. The black market is a multi-billion dollar industry worldwide and is enough to keep bitcoin, if not crypto-currency alive.\r\n\r\nOnce bitcoin core is humbled by a 50% drop, I think the core devs will come to their senses and push through a scaling solution. If not, another crypto will take over bitcoin\'s place.\r\n\r\nThis balding cuck gets off on the idea of jackbooted thugs (IRS) going after crypto traders. He can\'t satisfy his wife the way that Tyrone can. So small-dicked impotent statist thugs like him feel the need to feel powerful by bullying captains of industry.\r\n\r\nI can\'t believe the IRS is so petty that they would audit a brothel just based on their laundry bill. Don\'t these statist parasites have a better use for taxpayer dollars? I guarantee you that every person who works for the IRS, DEA, etc. is a cuck who can\'t satisfy his wife. That\'s why he has to take out his rage on successful people in the private sector. Meanwhile the IRS agent is a public sector parasite. A Chad would never work for the IRS. Chad is a self-employed landscape technician who is dodging taxes by getting paid in cash and not declaring it and he is fucking your housewife on his work break. And Tyrone is a successful drug dealer or pimp.'),
(31, 10, 7, 'Bitcoin is the great filter of civilization that could explain the Fermi Paradox.\r\n\r\nCrypto technology will allow us to bring down systems of controls and preserve our individual freedoms. I see this as a necessary step in the evolution of our civilization, that will allow us to continue to invent and innovate until we reach the stars.\r\n\r\nThe alternative is the totalitarian dystopia that we can already see building up: where every thought you have is surveilled and censored, and where every idea that steps out of line is destroyed before even being expressed. If we allow our civilization to fall into this trap we will never get out of this planet.'),
(32, 11, 7, 'I met probably the hottest girl I had seen in my entire existence, I was telling her how I was a crypto entrepreneur and stuff but she seemed impressed. Bitcoin gave me so much belief in myself, I had the courage to speak to this beautiful woman knowing I was financially able to support another person as well as myself. We exchanged contact details during the party then parted ways after a night of meaningful talks, hookups and talks about the future. I woke up the next morning with that smug look on my face. The kind of look you give when you feel at your best in a super cocky way. I felt like the Leo Decaprio, in The Wolf of Wall Street. Here was this cheeky kid meeting beautiful women, partying hard, succeeding and having his friends succeed alongside him.'),
(33, 6, 1, '<span nowrap> @gerson `Im lacking RAM to reinforce my WHAM` \r\n\r\n<a class=\'link\' href=https://downloadmoreram.com/>here u go</a>'),
(36, 14, 8, '<b></b>I HAVE AN ANNOUNCEMENT<b></b>\r\n\r\n(GIVEAWAY) \r\n\r\nLemme tell u about <b></b>KlaasCoin<b></b> alrite? \r\nI started this project on a humble morning when I saw this thing called \'Bitscoin\' (or something, it\'s probably irrelevant now) and it did really well.\r\n\r\nSo I want some of that success too. \r\nKlaasCoin is the new bitscoin super currency, where we have this one great bank where all KlaasCoin is stored.\r\nThis is running on a server in grandpa\'s attic. \r\n\r\nIt\'s also very tradable because\r\nTransactions cost 1 KlaasCoin per 10 KlaasCoin.\r\n\r\nWhats so great is that I basically own all KlaasCoin, so you know it\'s in good hands.\r\n\r\nContact me at klaascoin@hotmail.com for more info and 1 <b></b>FREE KLAASCOIN<b></b>!!! '),
(37, 11, 8, 'Just think off the success you could had if you had klaascoin'),
(38, 11, 8, ' @KlaasDeCoinBaas `Just think off the success you could had if you had klaascoin` have had<b>\r\n'),
(45, 14, 6, 'HODL'),
(58, 29, 6, '^'),
(59, 14, 3, ' @ltcFTW `HODL` \r\nhaha nice'),
(60, 30, 4, 'Hello everyone, I lost my wallet, I logged in at the site I use and they told me they scrapped all accounts due to a hack. I lost 4000$ of bitcoin. What should I do?'),
(62, 30, 6, 'oof'),
(63, 30, 3, 'Give me your creditcard number Ill make you a deposit'),
(64, 30, 6, ' @quertycon `Give me your creditcard number Ill make you a deposit` \r\n\r\nu also need to provide your cvc and expiration date'),
(65, 30, 4, 'Oh man that really sucks, I actually earned the money back though by making a deal with a guy who didnt understand crypto\'s too well, <b>Thanks for the help tho</b>'),
(66, 30, 1, '<i>very nice</i>'),
(67, 30, 5, ' @gerson `Hello everyone, I lost my wallet, I logged in at the site I use and they told me they scrapped all accounts due to a hack. I lost 4000$ of bitcoin. What should I do?` \r\n\r\nF'),
(68, 30, 6, '<i>deleted by admin</i>'),
(69, 31, 10, 'You guys have any good configurations for a budget mining rig? And where to get the specs for a decent price?\r\n\r\nThanks in advance'),
(70, 29, 1, 'Nah man <b>dogecoin</b>'),
(71, 30, 5, 'Lol'),
(72, 30, 5, '<i>deleted by admin</i>'),
(73, 30, 6, 'I can haz coins?'),
(76, 4, 5, 'thank you bt-dude very cool!'),
(79, 30, 2, ' @gerson `Oh man that really sucks, I actually earned the money back though by making a deal with a guy who didnt understand crypto\'s too well, Thanks for the help tho` \r\nhahaha'),
(80, 30, 2, '<span nowrap><a class=\'link\' href=link_here>leuke link </a>'),
(81, 10, 1, ' @hodler `Bitcoin is the great filter of civilization that could explain the Fermi Paradox. Crypto technology will allow us to bring down systems of controls and preserve our individual freedoms. I see this as a necessary step in the evolution of our civilization, that will allow us to continue to invent and innovate until we reach the stars. The alternative is the totalitarian dystopia that we can already see building up: where every thought you have is surveilled and censored, and where every idea that steps out of line is destroyed before even being expressed. If we allow our civilization to fall into this trap we will never get out of this planet.` \r\n<b>Very cool\r\n</b>'),
(82, 30, 12, 'I don\' t have any money because #studentlife\r\n'),
(83, 10, 1, ' @hodler `Bitcoin is the great filter of civilization that could explain the Fermi Paradox. Crypto technology will allow us to bring down systems of controls and preserve our individual freedoms. I see this as a necessary step in the evolution of our civilization, that will allow us to continue to invent and innovate until we reach the stars. The alternative is the totalitarian dystopia that we can already see building up: where every thought you have is surveilled and censored, and where every idea that steps out of line is destroyed before even being expressed. If we allow our civilization to fall into this trap we will never get out of this planet.` \r\n\r\nreply 2\r\n'),
(84, 30, 12, ' @irismerrin `I don\' t have any money because #studentlife` SAME\r\n'),
(85, 30, 12, ' @ltcFTW `I can haz coins?` no\r\n'),
(86, 10, 1, '<span nowrap>hier is een l<a class=\'link\' href=link_here>ink</a>'),
(89, 29, 11, 'Wowzer'),
(90, 29, 11, '<b><i>Bamf</i></b>'),
(91, 29, 11, ' @Bitboii `Bamf` \r\nKek'),
(95, 37, 2, ':(((((('),
(96, 37, 11, ' @jason1 `:((((((` \r\nH'),
(97, 37, 11, ' @Bitboii `H` \r\nH2\r\n'),
(98, 37, 11, ' @Bitboii `H2` \r\nH3'),
(100, 31, 4, '<span nowrap> @Vixxen `You guys have any good configurations for a budget mining rig? And where to get the specs for a decent price? Thanks in advance` \r\n\r\n\r\n<b>text</b> <i>markup</i> <a class=\'link\' href=link_here>Hyperlink</a>\r\n'),
(101, 4, 11, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `resets`
--

CREATE TABLE `resets` (
  `user_id` int(11) NOT NULL,
  `token` char(60) NOT NULL,
  `expire_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resets`
--

INSERT INTO `resets` (`user_id`, `token`, `expire_time`) VALUES
(3, '$2y$10$9BrG//IDnl6g6LCJ6UOQ7OBIT8IcQdnO/NrRn67u2MQSX/8lK4yOu', '2019-02-02 01:41:32'),
(4, '$2y$10$kySZIRe5nJ/PmfV7/8xcX.MoE3cWfzshG1wxRco/NJym8pTClihoy', '2019-02-02 01:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `thread_id` int(11) NOT NULL,
  `value` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`thread_id`, `value`) VALUES
(1, 'about'),
(2, 'contact'),
(3, 'btc'),
(3, 'hold'),
(3, 'sell'),
(3, 'whisky'),
(4, 'btc'),
(4, 'cards'),
(4, 'crypto'),
(4, 'gpu'),
(4, 'titan'),
(4, 'value'),
(5, 'bitconnect'),
(5, 'btc'),
(5, 'crypto'),
(5, 'opportunity'),
(6, 'BAM'),
(6, 'RAM'),
(6, 'WHAM'),
(7, '2025'),
(7, 'crisis'),
(7, 'crypto'),
(7, 'dna'),
(7, 'fiat'),
(7, 'hodl'),
(7, 'hodler'),
(7, 'pill'),
(8, 'Borger'),
(8, 'Gloria'),
(8, 'PewNews'),
(9, 'billion'),
(9, 'bitcoin'),
(9, 'btc'),
(9, 'core'),
(9, 'crypto'),
(9, 'dea'),
(9, 'dollars'),
(9, 'irs'),
(9, 'money'),
(10, 'civilization'),
(10, 'crypto'),
(10, 'fermi'),
(10, 'filter'),
(10, 'freedom'),
(10, 'innovate'),
(10, 'paradox'),
(10, 'stars'),
(10, 'technology'),
(11, 'bitcoin'),
(11, 'crypto'),
(11, 'decraprio'),
(11, 'entrepreneur'),
(11, 'girl'),
(11, 'street'),
(11, 'wall'),
(11, 'wolf'),
(14, 'coin'),
(14, 'cryptocurrency'),
(14, 'everyone'),
(14, 'giveaway'),
(14, 'great'),
(14, 'opportunity'),
(29, 'btc'),
(29, 'coin'),
(30, 'bitcoin'),
(30, 'btc'),
(30, 'wallet'),
(31, 'mining'),
(37, 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `locked` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `post_id`, `title`, `locked`) VALUES
(1, 1, 'About Us', b'1'),
(2, 2, 'Contact', b'1'),
(3, 17, 'I AM HODLING', b'0'),
(4, 22, 'Do you even crypto bro?', b'0'),
(5, 23, 'I LOVE BITCONNECT', b'0'),
(6, 24, 'Technicall issue; not enough ram, please help.', b'0'),
(7, 26, 'Cryptocurrency is the best...', b'0'),
(8, 29, 'PewNews: Bitcoin is hip again; unbelievable', b'0'),
(9, 30, 'lemme tell you about bitcoin', b'0'),
(10, 31, 'Bitcoin is the great filter', b'0'),
(11, 32, 'I was telling her how I was a crypto entrepreneur', b'0'),
(14, 36, 'I got a great opportunity for you all', b'0'),
(29, 58, 'is bitcoin a good one?', b'0'),
(30, 60, 'Technicall issue; I lost my bitcoin wallet', b'1'),
(31, 69, 'Mining rig ideas?', b'0'),
(37, 95, 'Jingens ik al me geld kwijt aan factom!', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE `upvotes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `upvotes`
--

INSERT INTO `upvotes` (`post_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(17, 1),
(22, 1),
(23, 1),
(33, 1),
(60, 1),
(65, 1),
(69, 1),
(1, 2),
(2, 2),
(22, 2),
(58, 2),
(60, 2),
(62, 2),
(64, 2),
(65, 2),
(95, 2),
(23, 3),
(25, 3),
(63, 3),
(64, 3),
(65, 3),
(1, 4),
(23, 4),
(29, 4),
(58, 4),
(60, 4),
(63, 4),
(64, 4),
(65, 4),
(69, 4),
(22, 5),
(27, 5),
(65, 5),
(69, 5),
(22, 6),
(23, 6),
(62, 6),
(65, 6),
(22, 7),
(27, 7),
(1, 8),
(31, 8),
(22, 10),
(28, 10),
(36, 10),
(60, 10),
(69, 10),
(73, 12),
(84, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(60) NOT NULL,
  `icon` int(1) NOT NULL DEFAULT '1',
  `admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `icon`, `admin`) VALUES
(1, 'power4unlimited@gmail.com', 'ingur', '$2y$10$DGakWYEaPmBUs9ytQjnuMOcxGT7O6A.Ffd9irApCmCCdXifms00iW', 5, b'1'),
(2, 'jason.lam1337@gmail.com', 'jason1', '$2y$10$7Q0kdk1kTQUEvwF74K/Sie7M4vdBT1VyopTX6cIBDv.2sKh9oHiEu', 3, b'1'),
(3, 'quertycon@gmail.com', 'quertycon', '$2y$10$J.G8n4sCKvNiTvNQFNJ8M.p07./2aN6vo86VFUVO89z58orXX6ez.', 2, b'1'),
(4, 'gersondekleuver@gmail.com', 'gerson', '$2y$10$EPf3VBkmvF0muwcFIMMMkujEDgMHAdssc5LKgJNpLC42kR1cpiO5G', 6, b'1'),
(5, '1@2', 'btc-dude', '$2y$10$vEwmaVH2d5p2p5vvVlgkreCjUCfjhRabC2ChtV7187iMCLC0oQej.', 5, b'0'),
(6, '2@3', 'ltcFTW', '$2y$10$RvTYRYzdqZKOUcCdDQYCSOFK7pgCVhlEdjUmu7.Iy1KjGWJlCJNkK', 4, b'0'),
(7, '3@4', 'hodler', '$2y$10$3eSceZrPjdDfZ7Qm82JDweebATU5k7oArDjb6ERSFE3rXMiPtoQ96', 2, b'0'),
(8, 'contact@paperboatie.tech', 'KlaasDeCoinBaas', '$2y$10$wqaCFKAvXj0jrhVUjZ9UluljTEqjAUED06xzfkSH4OnKSBZgxU4PG', 5, b'0'),
(9, 'louisen@protonmail.com', 'Bitjecoin', '$2y$10$1IVjbkOoRCq05/nH8ATgjOkPL9pNCvlGy2k.AX1sSwL4VG4Q4NRBe', 1, b'0'),
(10, 'Hacker@paperboatie.tech', 'Vixxen', '$2y$10$HdnWKFxytnR3.tYl7dZBqeDZhmR9s1atgE7seNdVOaj2mEwidnTy2', 1, b'0'),
(11, 'admin@account.com', 'AdminMan', '$2y$10$xzmDDYxWat0ADgXQw3lFG.qTWaKVqZNOQw6DCCI1Q77aUgGijbViy', 0, b'1'),
(12, 'iris.folpmers@hotmail.com', 'irismerrin', '$2y$10$dmP6FI2TWYrkiAPGGY/sRO4n8ului2fYvNQ.C46I24f/O7dlruqmW', 4, b'0'),
(13, 'lex.j.12081@gmail.com', 'LexJ', '$2y$10$kzhCguhOOVVBdpKLTaaMTu/ViMdITaCpxCYfM7yw6.JPeMrERoOxi', 1, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_fk_1` (`thread_id`),
  ADD KEY `posts_fk_2` (`user_id`);

--
-- Indexes for table `resets`
--
ALTER TABLE `resets`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`thread_id`,`value`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threads_fk_1` (`post_id`);

--
-- Indexes for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `upvotes_fk_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_fk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resets`
--
ALTER TABLE `resets`
  ADD CONSTRAINT `resets_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_fk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_fk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upvotes`
--
ALTER TABLE `upvotes`
  ADD CONSTRAINT `upvotes_fk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upvotes_fk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
