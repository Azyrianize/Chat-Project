-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 13, 2023 at 02:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` varchar(30) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`) VALUES
(1, 8, 7, 'Halo', '2021-12-24 04:56:04'),
(2, 8, 7, 'Mam sprawe', '2021-12-24 04:56:08'),
(316, 8, 7, 'FILE_ID:85', '2021-12-31 03:22:34'),
(317, 8, 7, 'FILE_ID:86', '2021-12-31 04:00:16'),
(318, 8, 7, 'FILE_ID:87', '2021-12-31 04:20:15'),
(319, 8, 7, 'FILE_ID:88', '2021-12-31 04:28:38'),
(320, 8, 7, 'FILE_ID:89', '2021-12-31 04:29:13'),
(321, 8, 7, 'FILE_ID:90', '2021-12-31 04:31:44'),
(322, 7, 8, 'FILE_ID:91', '2021-12-31 04:33:43'),
(324, 8, 7, 'FILE_ID:92', '2021-12-31 04:34:05'),
(326, 8, 7, 'haha', '2021-12-31 04:37:37'),
(327, 8, 7, 'Jackieee', '2021-12-31 04:37:58'),
(328, 8, 7, 'FILE_ID:93', '2021-12-31 04:37:58'),
(329, 7, 8, 'zobacz', '2021-12-31 04:38:30'),
(330, 7, 8, 'FILE_ID:94', '2021-12-31 04:38:30'),
(331, 8, 7, 'eyyyy', '2022-01-04 01:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `user_from`, `user_to`, `filename`) VALUES
(85, 7, 8, 'open-grave-movie.jpg'),
(86, 7, 8, 'Baywatch-movie.jpg'),
(87, 7, 8, 'HitmanBodyGuard-movie.jpg'),
(88, 7, 8, 'dummy-640x310-1.jpg'),
(89, 7, 8, 'dummy-640x310-4.jpg'),
(90, 7, 8, 'open-grave-movie.jpg'),
(91, 8, 7, 'skyscraper-movie.jpg'),
(92, 7, 8, 'dummy-640x310-2.jpg'),
(93, 7, 8, 'JackieChan.jpg'),
(94, 8, 7, 'JulieKi-movie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`) VALUES
(38, 7, 8),
(39, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `friends_added`
--

CREATE TABLE `friends_added` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends_added`
--

INSERT INTO `friends_added` (`id`, `user_id`, `friend_id`) VALUES
(4, 7, 8),
(5, 8, 7),
(8, 9, 7),
(9, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `avatar` longblob NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `email`, `avatar`, `description`) VALUES
(7, 'kacper', 'kacper', 'kacper', 0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000030504c5445c1c7d0ffffffbdc3cdd8dce1c3c9d2c8cdd5edeff1cdd2d9f7f8f9eaecefd2d6ddf5f6f7e1e4e8dde0e5fcfcfdebedf0e14c2f2500000a7c49444154789cdd9debb2eb260c8539607cc197fdfe6f5b3b8e133b3120a1854dba663afdd1dd842fdc849084fa975d535b77c3685c636d55556afec7dac69971e8ea76cafff52ae7874ff5606ca567a9332dffa1b266a8b372e6226cbbb159c8ced90e9c0b6963ba36534b7210b69dab3cdd1600d595e97274269a70aa8d65d3bd29ada9c10dc2124e9d53c9781ba4721db24d48c2054f44f7a6747fb866a1086b23ecbc0f48657a50cb3084037f6589435acc6805104e2368747e31aa11b0b88a097b9707ef09e9c483554898970fc22822ec9bdc7c004601619bbdffde8c02932e99703257f13d18cde584c38578ab864b097b7b6507aed2366d3a26115e3a40778c49433581b0be056f55c2c9834f78d90a7aa6846ee412f6d58d7c8b2aee6c64128e7776e02a3d66249c6e5842bfa52dcb1ee710deb9c41cc559701884058cd04d9c914a27bcc4caa64a3770c2c9de0df521f2642412f677039d88b86dd008ff4a1aa19b34cd2147221c4a049c1149c70d0a61a18044440261b180b45d234e58d036f82d026294b068400a628cb0e021ba2a3a172384c503c611c3845df9803362f87e234858ff02e08c183c6a8408fbdf009c1572180708a7bbdbcd50c00c0f1096769a08c9a61036e8563cc24a56e12f1cfde7452f21769f98a11a337475ddb77d5f778369a4210d9f5fe0dd337c84c8657409aff83eccb5b0c886f54b7c0baa8710b8ca68e75fccff90ee65cf6ae32144ad32dac68caa01e6a1f4ac36e78420735b5794708aae027ddbb9117e4a8899849a7ce53760569df3a9784a08b99bd08eee9a9e30f3b1a2123ac4b745ece14f616c7c47234438d674c38df5813864cfdc6f2784886f4ab9ad85dc2c53088dfc6bb817604f21cca8ef9ff68b107064a2f931f320ea2fe3e98b503e1d986b0c18f16bdfff24947f47720f2e929b1a5f5fff4928fd0249f4d222c04e1526942f33f48bbd73c967c9c74f7c246ce5f3401af32a3fd5e8a3d7e648281e23c41baf90e406c7d1b23910ca778a33b3892bb18d7adc310e8472d70c0010304e0f6bc1be4de22e14ec847b8977ac4327ee09c55d18f0e9b1245e4ff79db8239477212ad3457c94da77e28e50bc90a2ba107004dfad786fc2a99059b8483e13df7be29b70147e286621dd9a25d5dbb051393e542ef169587f13629768a9c4debef711e345285ea14f1d5dc992b6e6bdec6d84f2ad02394811c3741b520af689d8dc56b1fdfdfac53742f9d91a9b872ddebb5e6bcd9350ee90c56df7abc49bfe36a89e8472e701e2dcb417ac452b21e0ba30cd45ea97dc0079ba1b5642f920052f34c026ad84f221118eda4910e086cfed08c51ff6e9fe910be014536f42c0ef05de2c10dbc5735c3d0801b73e45129a1721e0ea4e87db9b20c028b51b2162c897d887ebe2b010226e98cb24ec9e84887bfb22d7d2c77eb11022422fa0e7df4590e0d66a2584fc5a05da346a1d590a15e821b9173d13a4a4c1f2bb2b486802fc880f6ad5e21d53a8283df4f910d62a05d95a15fe8c0f69d4628828cc42033f5c802278e7a546c1b227b14760c00178d1fcbb2bd467812722aa74c3301342221115d8aa014d9dc5aa51b8b40ae48e082bf063674258290fe4308535aafaa77051f9c0d514980b312960fa96341cea2d5cbe8eee15f0e7829d2f80bfbaae5507fb305c272253ae3a852c4b069a89d0c4ce414173b531cb29322d508f0a734ad93e0fb12762f3e38d429934ab00860dcc9c59e5143891523e4ec1a9ab8d42e7c24acffad05933cbc209852e29788903abe015e6445b06be02400642896993a102409581301d314735aa4c5510d3066aa66a54591893969b3c7554b28c5295e420ce54f63517a1d29667ddb4b98a4e56f0fdf02d8e8d9aafd20f7ec77f8b5edab8ce5835d4a2edd2836895c6f356766fc0678b0fe978c5f83a735d62873d1f9e48dbc17f6733e16a46f864b067fc5369dd0c673dd90f1794449dcff8d7948fd7aa195f4f742d8f788d4da6673f3e355c44b8e8515c687997ccfb88570e75487f6989d235d2e75da2740fbcb7285313f0eea94855c8fbc322658177c065ca01eff1cbd4088cc52852fa0f174f53a61ef134a098a832a581716d656a8d6bbbe9e59f4b6480f1a545ea195ffa3f5e6a9e31c2ff63bbed19e78db06a740ec99bb5c5eacb26e27caa6d9c337839d7543247c02bdf227d226aed863ee7abda533fb8f4ce7ce5cca44e44d46baf3175a90eb9478980f4dc35dda09348fc4a731aef72d7128c6f6de10f680795e2f85febe524e69026d67e94883fd0d68cc1c43ce06b3b7015fb51b47d1e3073bfa8722e9f7e4dbc15f190cbcd3b41a1d363e8621d839e69ad093515ee03e4f5e2a1a6026798c27329396ae9801f7531e8ab29bcb4004f8c4b888decf96ff25a8ccec2e38a7adff9559f867a7d81ad959422e254fcaa31445ca66e1ea38b88e3f4ab4e1431de039752912e526cc549ad2fd296584017523bf1f5e7bc9a7b376e853b5126d459cd3d4a110374c2769a0817f3a7751309760dbc34449a087d715afb92b06194314809c3d453bf34ba48c173ee5315354f3c3568a39d08af0c91aa9815edad231ceb4478758f54c5bac25b0b3af67f16b2d044979a403defd8727a294648e166066ab2477cc3f75bdd9b82d677b0ae7ef86cf22384c1b711c2fdff23841f7fcb79a3e42708a36f9484ec859f208cbe3313da317e8190f0565060b1f90542c27b4f81c5e61708bfff96f3ee5af984c477d7bc964df984c4b7f3bc1f503c21f9fd439fafa77442c61b969eb206851372de21f5edfb6538a27cc5dc586fc97a3ee386bbed3379eed878ef017ba662119e9af67c8c32df74f699e01a5d5c9eaff39476fff0e2beadaeefbeb9f0c42b24bcadee3d65dc14a6f094c7cd16f0e40608bdf942375ecff8b22503bf7ac8bbe43b48412a0925c913fc15747306fd67be7bac9bd69bdef34479f8ce2fec21f4fa34aa1b9cc3bec6448654c407ea45bc7ca44ebef0c4584b625e5e6f2234ffe56d91fe7cd1c2d19f3aeac7f6e77a5f7851e37f5d3e6e48c63df501c4e6a2f0a8ce1bee4db0940977110117ea25a678eb0f10a6ac0694db961062957dfb0f9444202d77a4fba4d08d64e670ef5054026d21a0dd9805435868154c92d479f6f855b4e143bc130c56e1d29918c37c8a3876a8b79e5338fe21c3581dc27c96ba1dd3ef7523290fba41bd95bb681ac3f9408c632ae3e63a56e74557814a342cd5b10412ce2ec5b99b8f87cce9466ee7f4269ecec5d9a258d107533c71452b2319adfd3cfb62dfa1c953f021667c05a122d1dc42d7250dd7da841797e7e733ed286e04494d0a42d6da8e7f2cca7e20161d621b51fc18196a6d2ead2b37d404ccbe1b2d35c730c1bb901005f4476bcc86d998612b1075d4a35c94b38a914199620527c53971d3c81e49bdb671c68ce3b8e4bf36d656fc54df348f7b5a24579f96d5b912252684d28b142208814f6c9095ea184a8fc6bbb4d884e04a48106fd866ae78b8e3939c5d44119579ab56bef864e71661cc68d446be9b4f4c38f763d6b11aaf0e9a9f709e8f26531944ad0dc07780896ceec86617830f54b10115bb4d39d571f09441b94580d1e95d03eac8e5f8856b1634fe7eea1cc78e3ea5c3e2fd03132eaa4dfa9c9c4f2206ee43cf9143d10e2eee8b38a1735d0eb76bae2c91b61b1beae968febb66cc42b7286b1e4c5b0fce3eea06fbc85465dd7c40ced9880b327d96b3fc30aec7deaa5a6a25dbe5343c0eddf9d91facff0010b781bf064e39cc0000000049454e44ae426082, 'Normalnie elegancki opis od buciora ile'),
(8, 'xd', 'xd', 'xd', 0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000030504c5445c1c7d0ffffffbdc3cdd8dce1c3c9d2c8cdd5edeff1cdd2d9f7f8f9eaecefd2d6ddf5f6f7e1e4e8dde0e5fcfcfdebedf0e14c2f2500000a7c49444154789cdd9debb2eb260c8539607cc197fdfe6f5b3b8e133b3120a1854dba663afdd1dd842fdc849084fa975d535b77c3685c636d55556afec7dac69971e8ea76cafff52ae7874ff5606ca567a9332dffa1b266a8b372e6226cbbb159c8ced90e9c0b6963ba36534b7210b69dab3cdd1600d595e97274269a70aa8d65d3bd29ada9c10dc2124e9d53c9781ba4721db24d48c2054f44f7a6747fb866a1086b23ecbc0f48657a50cb3084037f6589435acc6805104e2368747e31aa11b0b88a097b9707ef09e9c483554898970fc22822ec9bdc7c004601619bbdffde8c02932e99703257f13d18cde584c38578ab864b097b7b6507aed2366d3a26115e3a40778c49433581b0be056f55c2c9834f78d90a7aa6846ee412f6d58d7c8b2aee6c64128e7776e02a3d66249c6e5842bfa52dcb1ee710deb9c41cc559701884058cd04d9c914a27bcc4caa64a3770c2c9de0df521f2642412f677039d88b86dd008ff4a1aa19b34cd2147221c4a049c1149c70d0a61a18044440261b180b45d234e58d036f82d026294b068400a628cb0e021ba2a3a172384c503c611c3845df9803362f87e234858ff02e08c183c6a8408fbdf009c1572180708a7bbdbcd50c00c0f1096769a08c9a61036e8563cc24a56e12f1cfde7452f21769f98a11a337475ddb77d5f778369a4210d9f5fe0dd337c84c8657409aff83eccb5b0c886f54b7c0baa8710b8ca68e75fccff90ee65cf6ae32144ad32dac68caa01e6a1f4ac36e78420735b5794708aae027ddbb9117e4a8899849a7ce53760569df3a9784a08b99bd08eee9a9e30f3b1a2123ac4b745ece14f616c7c47234438d674c38df5813864cfdc6f2784886f4ab9ad85dc2c53088dfc6bb817604f21cca8ef9ff68b107064a2f931f320ea2fe3e98b503e1d986b0c18f16bdfff24947f47720f2e929b1a5f5fff4928fd0249f4d222c04e1526942f33f48bbd73c967c9c74f7c246ce5f3401af32a3fd5e8a3d7e648281e23c41baf90e406c7d1b23910ca778a33b3892bb18d7adc310e8472d70c0010304e0f6bc1be4de22e14ec847b8977ac4327ee09c55d18f0e9b1245e4ff79db8239477212ad3457c94da77e28e50bc90a2ba107004dfad786fc2a99059b8483e13df7be29b70147e286621dd9a25d5dbb051393e542ef169587f13629768a9c4debef711e345285ea14f1d5dc992b6e6bdec6d84f2ad02394811c3741b520af689d8dc56b1fdfdfac53742f9d91a9b872ddebb5e6bcd9350ee90c56df7abc49bfe36a89e8472e701e2dcb417ac452b21e0ba30cd45ea97dc0079ba1b5642f920052f34c026ad84f221118eda4910e086cfed08c51ff6e9fe910be014536f42c0ef05de2c10dbc5735c3d0801b73e45129a1721e0ea4e87db9b20c028b51b2162c897d887ebe2b010226e98cb24ec9e84887bfb22d7d2c77eb11022422fa0e7df4590e0d66a2584fc5a05da346a1d590a15e821b9173d13a4a4c1f2bb2b486802fc880f6ad5e21d53a8283df4f910d62a05d95a15fe8c0f69d4628828cc42033f5c802278e7a546c1b227b14760c00178d1fcbb2bd467812722aa74c3301342221115d8aa014d9dc5aa51b8b40ae48e082bf063674258290fe4308535aafaa77051f9c0d514980b312960fa96341cea2d5cbe8eee15f0e7829d2f80bfbaae5507fb305c272253ae3a852c4b069a89d0c4ce414173b531cb29322d508f0a734ad93e0fb12762f3e38d429934ab00860dcc9c59e5143891523e4ec1a9ab8d42e7c24acffad05933cbc209852e29788903abe015e6445b06be02400642896993a102409581301d314735aa4c5510d3066aa66a54591893969b3c7554b28c5295e420ce54f63517a1d29667ddb4b98a4e56f0fdf02d8e8d9aafd20f7ec77f8b5edab8ce5835d4a2edd2836895c6f356766fc0678b0fe978c5f83a735d62873d1f9e48dbc17f6733e16a46f864b067fc5369dd0c673dd90f1794449dcff8d7948fd7aa195f4f742d8f788d4da6673f3e355c44b8e8515c687997ccfb88570e75487f6989d235d2e75da2740fbcb7285313f0eea94855c8fbc322658177c065ca01eff1cbd4088cc52852fa0f174f53a61ef134a098a832a581716d656a8d6bbbe9e59f4b6480f1a545ea195ffa3f5e6a9e31c2ff63bbed19e78db06a740ec99bb5c5eacb26e27caa6d9c337839d7543247c02bdf227d226aed863ee7abda533fb8f4ce7ce5cca44e44d46baf3175a90eb9478980f4dc35dda09348fc4a731aef72d7128c6f6de10f680795e2f85febe524e69026d67e94883fd0d68cc1c43ce06b3b7015fb51b47d1e3073bfa8722e9f7e4dbc15f190cbcd3b41a1d363e8621d839e69ad093515ee03e4f5e2a1a6026798c27329396ae9801f7531e8ab29bcb4004f8c4b888decf96ff25a8ccec2e38a7adff9559f867a7d81ad959422e254fcaa31445ca66e1ea38b88e3f4ab4e1431de039752912e526cc549ad2fd296584017523bf1f5e7bc9a7b376e853b5126d459cd3d4a110374c2769a0817f3a7751309760dbc34449a087d715afb92b06194314809c3d453bf34ba48c173ee5315354f3c3568a39d08af0c91aa9815edad231ceb4478758f54c5bac25b0b3af67f16b2d044979a403defd8727a294648e166066ab2477cc3f75bdd9b82d677b0ae7ef86cf22384c1b711c2fdff23841f7fcb79a3e42708a36f9484ec859f208cbe3313da317e8190f0565060b1f90542c27b4f81c5e61708bfff96f3ee5af984c477d7bc964df984c4b7f3bc1f503c21f9fd439fafa77442c61b969eb206851372de21f5edfb6538a27cc5dc586fc97a3ee386bbed3379eed878ef017ba662119e9af67c8c32df74f699e01a5d5c9eaff39476fff0e2beadaeefbeb9f0c42b24bcadee3d65dc14a6f094c7cd16f0e40608bdf942375ecff8b22503bf7ac8bbe43b48412a0925c913fc15747306fd67be7bac9bd69bdef34479f8ce2fec21f4fa34aa1b9cc3bec6448654c407ea45bc7ca44ebef0c4584b625e5e6f2234ffe56d91fe7cd1c2d19f3aeac7f6e77a5f7851e37f5d3e6e48c63df501c4e6a2f0a8ce1bee4db0940977110117ea25a678eb0f10a6ac0694db961062957dfb0f9444202d77a4fba4d08d64e670ef5054026d21a0dd9805435868154c92d479f6f855b4e143bc130c56e1d29918c37c8a3876a8b79e5338fe21c3581dc27c96ba1dd3ef7523290fba41bd95bb681ac3f9408c632ae3e63a56e74557814a342cd5b10412ce2ec5b99b8f87cce9466ee7f4269ecec5d9a258d107533c71452b2319adfd3cfb62dfa1c953f021667c05a122d1dc42d7250dd7da841797e7e733ed286e04494d0a42d6da8e7f2cca7e20161d621b51fc18196a6d2ead2b37d404ccbe1b2d35c730c1bb901005f4476bcc86d998612b1075d4a35c94b38a914199620527c53971d3c81e49bdb671c68ce3b8e4bf36d656fc54df348f7b5a24579f96d5b912252684d28b142208814f6c9095ea184a8fc6bbb4d884e04a48106fd866ae78b8e3939c5d44119579ab56bef864e71661cc68d446be9b4f4c38f763d6b11aaf0e9a9f709e8f26531944ad0dc07780896ceec86617830f54b10115bb4d39d571f09441b94580d1e95d03eac8e5f8856b1634fe7eea1cc78e3ea5c3e2fd03132eaa4dfa9c9c4f2206ee43cf9143d10e2eee8b38a1735d0eb76bae2c91b61b1beae968febb66cc42b7286b1e4c5b0fce3eea06fbc85465dd7c40ced9880b327d96b3fc30aec7deaa5a6a25dbe5343c0eddf9d91facff0010b781bf064e39cc0000000049454e44ae426082, 'Twój opis'),
(9, 'ktos', 'ktos', 'ktos', 0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000030504c5445c1c7d0ffffffbdc3cdd8dce1c3c9d2c8cdd5edeff1cdd2d9f7f8f9eaecefd2d6ddf5f6f7e1e4e8dde0e5fcfcfdebedf0e14c2f2500000a7c49444154789cdd9debb2eb260c8539607cc197fdfe6f5b3b8e133b3120a1854dba663afdd1dd842fdc849084fa975d535b77c3685c636d55556afec7dac69971e8ea76cafff52ae7874ff5606ca567a9332dffa1b266a8b372e6226cbbb159c8ced90e9c0b6963ba36534b7210b69dab3cdd1600d595e97274269a70aa8d65d3bd29ada9c10dc2124e9d53c9781ba4721db24d48c2054f44f7a6747fb866a1086b23ecbc0f48657a50cb3084037f6589435acc6805104e2368747e31aa11b0b88a097b9707ef09e9c483554898970fc22822ec9bdc7c004601619bbdffde8c02932e99703257f13d18cde584c38578ab864b097b7b6507aed2366d3a26115e3a40778c49433581b0be056f55c2c9834f78d90a7aa6846ee412f6d58d7c8b2aee6c64128e7776e02a3d66249c6e5842bfa52dcb1ee710deb9c41cc559701884058cd04d9c914a27bcc4caa64a3770c2c9de0df521f2642412f677039d88b86dd008ff4a1aa19b34cd2147221c4a049c1149c70d0a61a18044440261b180b45d234e58d036f82d026294b068400a628cb0e021ba2a3a172384c503c611c3845df9803362f87e234858ff02e08c183c6a8408fbdf009c1572180708a7bbdbcd50c00c0f1096769a08c9a61036e8563cc24a56e12f1cfde7452f21769f98a11a337475ddb77d5f778369a4210d9f5fe0dd337c84c8657409aff83eccb5b0c886f54b7c0baa8710b8ca68e75fccff90ee65cf6ae32144ad32dac68caa01e6a1f4ac36e78420735b5794708aae027ddbb9117e4a8899849a7ce53760569df3a9784a08b99bd08eee9a9e30f3b1a2123ac4b745ece14f616c7c47234438d674c38df5813864cfdc6f2784886f4ab9ad85dc2c53088dfc6bb817604f21cca8ef9ff68b107064a2f931f320ea2fe3e98b503e1d986b0c18f16bdfff24947f47720f2e929b1a5f5fff4928fd0249f4d222c04e1526942f33f48bbd73c967c9c74f7c246ce5f3401af32a3fd5e8a3d7e648281e23c41baf90e406c7d1b23910ca778a33b3892bb18d7adc310e8472d70c0010304e0f6bc1be4de22e14ec847b8977ac4327ee09c55d18f0e9b1245e4ff79db8239477212ad3457c94da77e28e50bc90a2ba107004dfad786fc2a99059b8483e13df7be29b70147e286621dd9a25d5dbb051393e542ef169587f13629768a9c4debef711e345285ea14f1d5dc992b6e6bdec6d84f2ad02394811c3741b520af689d8dc56b1fdfdfac53742f9d91a9b872ddebb5e6bcd9350ee90c56df7abc49bfe36a89e8472e701e2dcb417ac452b21e0ba30cd45ea97dc0079ba1b5642f920052f34c026ad84f221118eda4910e086cfed08c51ff6e9fe910be014536f42c0ef05de2c10dbc5735c3d0801b73e45129a1721e0ea4e87db9b20c028b51b2162c897d887ebe2b010226e98cb24ec9e84887bfb22d7d2c77eb11022422fa0e7df4590e0d66a2584fc5a05da346a1d590a15e821b9173d13a4a4c1f2bb2b486802fc880f6ad5e21d53a8283df4f910d62a05d95a15fe8c0f69d4628828cc42033f5c802278e7a546c1b227b14760c00178d1fcbb2bd467812722aa74c3301342221115d8aa014d9dc5aa51b8b40ae48e082bf063674258290fe4308535aafaa77051f9c0d514980b312960fa96341cea2d5cbe8eee15f0e7829d2f80bfbaae5507fb305c272253ae3a852c4b069a89d0c4ce414173b531cb29322d508f0a734ad93e0fb12762f3e38d429934ab00860dcc9c59e5143891523e4ec1a9ab8d42e7c24acffad05933cbc209852e29788903abe015e6445b06be02400642896993a102409581301d314735aa4c5510d3066aa66a54591893969b3c7554b28c5295e420ce54f63517a1d29667ddb4b98a4e56f0fdf02d8e8d9aafd20f7ec77f8b5edab8ce5835d4a2edd2836895c6f356766fc0678b0fe978c5f83a735d62873d1f9e48dbc17f6733e16a46f864b067fc5369dd0c673dd90f1794449dcff8d7948fd7aa195f4f742d8f788d4da6673f3e355c44b8e8515c687997ccfb88570e75487f6989d235d2e75da2740fbcb7285313f0eea94855c8fbc322658177c065ca01eff1cbd4088cc52852fa0f174f53a61ef134a098a832a581716d656a8d6bbbe9e59f4b6480f1a545ea195ffa3f5e6a9e31c2ff63bbed19e78db06a740ec99bb5c5eacb26e27caa6d9c337839d7543247c02bdf227d226aed863ee7abda533fb8f4ce7ce5cca44e44d46baf3175a90eb9478980f4dc35dda09348fc4a731aef72d7128c6f6de10f680795e2f85febe524e69026d67e94883fd0d68cc1c43ce06b3b7015fb51b47d1e3073bfa8722e9f7e4dbc15f190cbcd3b41a1d363e8621d839e69ad093515ee03e4f5e2a1a6026798c27329396ae9801f7531e8ab29bcb4004f8c4b888decf96ff25a8ccec2e38a7adff9559f867a7d81ad959422e254fcaa31445ca66e1ea38b88e3f4ab4e1431de039752912e526cc549ad2fd296584017523bf1f5e7bc9a7b376e853b5126d459cd3d4a110374c2769a0817f3a7751309760dbc34449a087d715afb92b06194314809c3d453bf34ba48c173ee5315354f3c3568a39d08af0c91aa9815edad231ceb4478758f54c5bac25b0b3af67f16b2d044979a403defd8727a294648e166066ab2477cc3f75bdd9b82d677b0ae7ef86cf22384c1b711c2fdff23841f7fcb79a3e42708a36f9484ec859f208cbe3313da317e8190f0565060b1f90542c27b4f81c5e61708bfff96f3ee5af984c477d7bc964df984c4b7f3bc1f503c21f9fd439fafa77442c61b969eb206851372de21f5edfb6538a27cc5dc586fc97a3ee386bbed3379eed878ef017ba662119e9af67c8c32df74f699e01a5d5c9eaff39476fff0e2beadaeefbeb9f0c42b24bcadee3d65dc14a6f094c7cd16f0e40608bdf942375ecff8b22503bf7ac8bbe43b48412a0925c913fc15747306fd67be7bac9bd69bdef34479f8ce2fec21f4fa34aa1b9cc3bec6448654c407ea45bc7ca44ebef0c4584b625e5e6f2234ffe56d91fe7cd1c2d19f3aeac7f6e77a5f7851e37f5d3e6e48c63df501c4e6a2f0a8ce1bee4db0940977110117ea25a678eb0f10a6ac0694db961062957dfb0f9444202d77a4fba4d08d64e670ef5054026d21a0dd9805435868154c92d479f6f855b4e143bc130c56e1d29918c37c8a3876a8b79e5338fe21c3581dc27c96ba1dd3ef7523290fba41bd95bb681ac3f9408c632ae3e63a56e74557814a342cd5b10412ce2ec5b99b8f87cce9466ee7f4269ecec5d9a258d107533c71452b2319adfd3cfb62dfa1c953f021667c05a122d1dc42d7250dd7da841797e7e733ed286e04494d0a42d6da8e7f2cca7e20161d621b51fc18196a6d2ead2b37d404ccbe1b2d35c730c1bb901005f4476bcc86d998612b1075d4a35c94b38a914199620527c53971d3c81e49bdb671c68ce3b8e4bf36d656fc54df348f7b5a24579f96d5b912252684d28b142208814f6c9095ea184a8fc6bbb4d884e04a48106fd866ae78b8e3939c5d44119579ab56bef864e71661cc68d446be9b4f4c38f763d6b11aaf0e9a9f709e8f26531944ad0dc07780896ceec86617830f54b10115bb4d39d571f09441b94580d1e95d03eac8e5f8856b1634fe7eea1cc78e3ea5c3e2fd03132eaa4dfa9c9c4f2206ee43cf9143d10e2eee8b38a1735d0eb76bae2c91b61b1beae968febb66cc42b7286b1e4c5b0fce3eea06fbc85465dd7c40ced9880b327d96b3fc30aec7deaa5a6a25dbe5343c0eddf9d91facff0010b781bf064e39cc0000000049454e44ae426082, 'Twój opis'),
(16, 'cojest', 'cojest', 'cojest', 0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000030504c5445c1c7d0ffffffbdc3cdd8dce1c3c9d2c8cdd5edeff1cdd2d9f7f8f9eaecefd2d6ddf5f6f7e1e4e8dde0e5fcfcfdebedf0e14c2f2500000a7c49444154789cdd9debb2eb260c8539607cc197fdfe6f5b3b8e133b3120a1854dba663afdd1dd842fdc849084fa975d535b77c3685c636d55556afec7dac69971e8ea76cafff52ae7874ff5606ca567a9332dffa1b266a8b372e6226cbbb159c8ced90e9c0b6963ba36534b7210b69dab3cdd1600d595e97274269a70aa8d65d3bd29ada9c10dc2124e9d53c9781ba4721db24d48c2054f44f7a6747fb866a1086b23ecbc0f48657a50cb3084037f6589435acc6805104e2368747e31aa11b0b88a097b9707ef09e9c483554898970fc22822ec9bdc7c004601619bbdffde8c02932e99703257f13d18cde584c38578ab864b097b7b6507aed2366d3a26115e3a40778c49433581b0be056f55c2c9834f78d90a7aa6846ee412f6d58d7c8b2aee6c64128e7776e02a3d66249c6e5842bfa52dcb1ee710deb9c41cc559701884058cd04d9c914a27bcc4caa64a3770c2c9de0df521f2642412f677039d88b86dd008ff4a1aa19b34cd2147221c4a049c1149c70d0a61a18044440261b180b45d234e58d036f82d026294b068400a628cb0e021ba2a3a172384c503c611c3845df9803362f87e234858ff02e08c183c6a8408fbdf009c1572180708a7bbdbcd50c00c0f1096769a08c9a61036e8563cc24a56e12f1cfde7452f21769f98a11a337475ddb77d5f778369a4210d9f5fe0dd337c84c8657409aff83eccb5b0c886f54b7c0baa8710b8ca68e75fccff90ee65cf6ae32144ad32dac68caa01e6a1f4ac36e78420735b5794708aae027ddbb9117e4a8899849a7ce53760569df3a9784a08b99bd08eee9a9e30f3b1a2123ac4b745ece14f616c7c47234438d674c38df5813864cfdc6f2784886f4ab9ad85dc2c53088dfc6bb817604f21cca8ef9ff68b107064a2f931f320ea2fe3e98b503e1d986b0c18f16bdfff24947f47720f2e929b1a5f5fff4928fd0249f4d222c04e1526942f33f48bbd73c967c9c74f7c246ce5f3401af32a3fd5e8a3d7e648281e23c41baf90e406c7d1b23910ca778a33b3892bb18d7adc310e8472d70c0010304e0f6bc1be4de22e14ec847b8977ac4327ee09c55d18f0e9b1245e4ff79db8239477212ad3457c94da77e28e50bc90a2ba107004dfad786fc2a99059b8483e13df7be29b70147e286621dd9a25d5dbb051393e542ef169587f13629768a9c4debef711e345285ea14f1d5dc992b6e6bdec6d84f2ad02394811c3741b520af689d8dc56b1fdfdfac53742f9d91a9b872ddebb5e6bcd9350ee90c56df7abc49bfe36a89e8472e701e2dcb417ac452b21e0ba30cd45ea97dc0079ba1b5642f920052f34c026ad84f221118eda4910e086cfed08c51ff6e9fe910be014536f42c0ef05de2c10dbc5735c3d0801b73e45129a1721e0ea4e87db9b20c028b51b2162c897d887ebe2b010226e98cb24ec9e84887bfb22d7d2c77eb11022422fa0e7df4590e0d66a2584fc5a05da346a1d590a15e821b9173d13a4a4c1f2bb2b486802fc880f6ad5e21d53a8283df4f910d62a05d95a15fe8c0f69d4628828cc42033f5c802278e7a546c1b227b14760c00178d1fcbb2bd467812722aa74c3301342221115d8aa014d9dc5aa51b8b40ae48e082bf063674258290fe4308535aafaa77051f9c0d514980b312960fa96341cea2d5cbe8eee15f0e7829d2f80bfbaae5507fb305c272253ae3a852c4b069a89d0c4ce414173b531cb29322d508f0a734ad93e0fb12762f3e38d429934ab00860dcc9c59e5143891523e4ec1a9ab8d42e7c24acffad05933cbc209852e29788903abe015e6445b06be02400642896993a102409581301d314735aa4c5510d3066aa66a54591893969b3c7554b28c5295e420ce54f63517a1d29667ddb4b98a4e56f0fdf02d8e8d9aafd20f7ec77f8b5edab8ce5835d4a2edd2836895c6f356766fc0678b0fe978c5f83a735d62873d1f9e48dbc17f6733e16a46f864b067fc5369dd0c673dd90f1794449dcff8d7948fd7aa195f4f742d8f788d4da6673f3e355c44b8e8515c687997ccfb88570e75487f6989d235d2e75da2740fbcb7285313f0eea94855c8fbc322658177c065ca01eff1cbd4088cc52852fa0f174f53a61ef134a098a832a581716d656a8d6bbbe9e59f4b6480f1a545ea195ffa3f5e6a9e31c2ff63bbed19e78db06a740ec99bb5c5eacb26e27caa6d9c337839d7543247c02bdf227d226aed863ee7abda533fb8f4ce7ce5cca44e44d46baf3175a90eb9478980f4dc35dda09348fc4a731aef72d7128c6f6de10f680795e2f85febe524e69026d67e94883fd0d68cc1c43ce06b3b7015fb51b47d1e3073bfa8722e9f7e4dbc15f190cbcd3b41a1d363e8621d839e69ad093515ee03e4f5e2a1a6026798c27329396ae9801f7531e8ab29bcb4004f8c4b888decf96ff25a8ccec2e38a7adff9559f867a7d81ad959422e254fcaa31445ca66e1ea38b88e3f4ab4e1431de039752912e526cc549ad2fd296584017523bf1f5e7bc9a7b376e853b5126d459cd3d4a110374c2769a0817f3a7751309760dbc34449a087d715afb92b06194314809c3d453bf34ba48c173ee5315354f3c3568a39d08af0c91aa9815edad231ceb4478758f54c5bac25b0b3af67f16b2d044979a403defd8727a294648e166066ab2477cc3f75bdd9b82d677b0ae7ef86cf22384c1b711c2fdff23841f7fcb79a3e42708a36f9484ec859f208cbe3313da317e8190f0565060b1f90542c27b4f81c5e61708bfff96f3ee5af984c477d7bc964df984c4b7f3bc1f503c21f9fd439fafa77442c61b969eb206851372de21f5edfb6538a27cc5dc586fc97a3ee386bbed3379eed878ef017ba662119e9af67c8c32df74f699e01a5d5c9eaff39476fff0e2beadaeefbeb9f0c42b24bcadee3d65dc14a6f094c7cd16f0e40608bdf942375ecff8b22503bf7ac8bbe43b48412a0925c913fc15747306fd67be7bac9bd69bdef34479f8ce2fec21f4fa34aa1b9cc3bec6448654c407ea45bc7ca44ebef0c4584b625e5e6f2234ffe56d91fe7cd1c2d19f3aeac7f6e77a5f7851e37f5d3e6e48c63df501c4e6a2f0a8ce1bee4db0940977110117ea25a678eb0f10a6ac0694db961062957dfb0f9444202d77a4fba4d08d64e670ef5054026d21a0dd9805435868154c92d479f6f855b4e143bc130c56e1d29918c37c8a3876a8b79e5338fe21c3581dc27c96ba1dd3ef7523290fba41bd95bb681ac3f9408c632ae3e63a56e74557814a342cd5b10412ce2ec5b99b8f87cce9466ee7f4269ecec5d9a258d107533c71452b2319adfd3cfb62dfa1c953f021667c05a122d1dc42d7250dd7da841797e7e733ed286e04494d0a42d6da8e7f2cca7e20161d621b51fc18196a6d2ead2b37d404ccbe1b2d35c730c1bb901005f4476bcc86d998612b1075d4a35c94b38a914199620527c53971d3c81e49bdb671c68ce3b8e4bf36d656fc54df348f7b5a24579f96d5b912252684d28b142208814f6c9095ea184a8fc6bbb4d884e04a48106fd866ae78b8e3939c5d44119579ab56bef864e71661cc68d446be9b4f4c38f763d6b11aaf0e9a9f709e8f26531944ad0dc07780896ceec86617830f54b10115bb4d39d571f09441b94580d1e95d03eac8e5f8856b1634fe7eea1cc78e3ea5c3e2fd03132eaa4dfa9c9c4f2206ee43cf9143d10e2eee8b38a1735d0eb76bae2c91b61b1beae968febb66cc42b7286b1e4c5b0fce3eea06fbc85465dd7c40ced9880b327d96b3fc30aec7deaa5a6a25dbe5343c0eddf9d91facff0010b781bf064e39cc0000000049454e44ae426082, 'Twój opis'),
(19, 'test2', 'test2', 'test2', '', 'Twój opis'),
(20, 'test3', 'test3', 'test3', '', 'Twój opis');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES
(9, 7, '2022-06-02 03:02:32'),
(10, 8, '2022-01-04 01:15:09'),
(11, 9, '2021-12-31 04:32:08'),
(12, 10, '2021-12-22 01:39:22'),
(13, 10, '2021-12-22 01:39:22'),
(14, 10, '2021-12-22 01:41:03'),
(15, 10, '2021-12-22 01:41:05'),
(16, 14, '2021-12-22 01:41:14'),
(17, 15, '2021-12-22 01:44:50'),
(18, 16, '2021-12-22 01:46:10'),
(19, 17, '2021-12-22 01:52:00'),
(20, 18, '2022-01-04 02:11:19'),
(21, 19, '2022-01-04 02:12:06'),
(22, 0, '2022-01-04 02:27:25'),
(23, 0, '2022-01-04 02:27:33'),
(24, 0, '2022-01-04 02:27:56'),
(25, 0, '2022-01-04 02:30:11'),
(26, 0, '2022-01-04 02:37:48'),
(27, 0, '2022-01-04 02:39:10'),
(28, 20, '2022-01-04 02:39:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends_added`
--
ALTER TABLE `friends_added`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `friends_added`
--
ALTER TABLE `friends_added`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
