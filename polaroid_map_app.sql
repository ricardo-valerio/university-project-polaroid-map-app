/*
 Navicat Premium Data Transfer

 Source Server         : localhost Terminal
 Source Server Type    : MySQL
 Source Server Version : 50623
 Source Host           : localhost
 Source Database       : polaroid_map_app

 Target Server Type    : MySQL
 Target Server Version : 50623
 File Encoding         : utf-8

 Date: 04/20/2015 14:43:02 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `countries_icons`
-- ----------------------------
DROP TABLE IF EXISTS `countries_icons`;
CREATE TABLE `countries_icons` (
  `country` varchar(100) NOT NULL,
  `icon_svg_file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `polaroids`
-- ----------------------------
DROP TABLE IF EXISTS `polaroids`;
CREATE TABLE `polaroids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lat_lon_id` varchar(200) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo_hash_file_name` varchar(200) NOT NULL,
  `number_of_likes` int(10) unsigned NOT NULL DEFAULT '0',
  `country` varchar(100) NOT NULL,
  `datetime_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_user_3` (`id_user`),
  CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `polaroids`
-- ----------------------------
BEGIN;
INSERT INTO `polaroids` VALUES ('1', '37.427474|-122.169719', '37.427474', '-122.169719', 'My trip at Standford University', 'look at this place, so awesome!', 'standford-university.jpg', '11', 'USA', '2015-04-03 17:23:47', '2015-04-04 03:08:36', '1'), ('2', '37.7577|-122.4376', '37.7577', '-122.4376', 'Trip in San Francisco', 'I love this city. \"If you\'re going to SF, make sure to wear some flowers in your hair\"', 'san-francisco.jpg', '8', 'USA', '2015-04-03 17:25:26', '2015-04-04 03:08:38', '1'), ('3', '38.693597|-9.205712', '38.693597', '-9.205712', 'Padrão dos Descobrimentos', 'Uau, nunca vi um barquinho em pedra tão lindo caramba!', 'padrao-dos-descobrimentos.jpg', '8', 'Portugal', '2015-04-03 17:26:32', '2015-04-04 03:20:36', '2'), ('4', '38.689633|-9.17711', '38.689633', '-9.17711', 'Museu da Carris', 'Museu Lindo xD', 'museu-da-carris.jpg', '3', 'Portugal', '2015-04-03 18:25:25', '2015-04-04 03:08:40', '2'), ('5', '38.689633|-9.17711', '38.689633', '-9.17711', 'ponte 25 de Abril e o Cristo Rei', 'Uau, que coisa mai linda!', 'ponte-25-abril.jpg', '2', 'Portugal', '2015-04-03 19:53:05', '2015-04-04 03:08:41', '2'), ('6', '38.689633|-9.17711', '38.689633', '-9.17711', 'Cristo Rei', 'Louvado seja Deus xD', 'cristo-rei.jpg', '1', 'Portugal', '2015-04-03 20:07:32', '2015-04-04 03:08:42', '2'), ('7', '38.7127527|-9.1462951', '38.7127527', '-9.1462951', 'Bairro Alto =)', 'Que vista fantástica!', 'bairro-alto.jpg', '41', 'Portugal', '2015-04-12 02:48:37', '2015-04-12 22:38:20', '2'), ('10', '35.77902073064695|-5.798609428527811', '35.779020730647', '-5.7986094285278', 'velhinho com o cão', 'velhote alert(&#34;hello&#34;);', '8ba491ccd6be4e2a9702162cb08ffa80.jpg', '1', 'Morocco', '2015-04-18 07:56:54', '2015-04-18 07:56:54', '2');
COMMIT;

-- ----------------------------
--  Table structure for `route_has_polaroids`
-- ----------------------------
DROP TABLE IF EXISTS `route_has_polaroids`;
CREATE TABLE `route_has_polaroids` (
  `id_route` int(10) unsigned NOT NULL,
  `id_polaroid` int(10) unsigned NOT NULL,
  `datetime_associated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_route`,`id_polaroid`),
  KEY `id_polaroid` (`id_polaroid`),
  KEY `id_polaroid_2` (`id_polaroid`),
  CONSTRAINT `id_route` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `polaroid_id` FOREIGN KEY (`id_polaroid`) REFERENCES `polaroids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `route_has_polaroids`
-- ----------------------------
BEGIN;
INSERT INTO `route_has_polaroids` VALUES ('1', '1', '2015-04-03 17:28:36'), ('1', '2', '2015-04-03 17:28:56'), ('2', '3', '2015-04-03 17:29:04');
COMMIT;

-- ----------------------------
--  Table structure for `routes`
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `datetime_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(10) unsigned NOT NULL,
  `number_of_likes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  CONSTRAINT `user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `routes`
-- ----------------------------
BEGIN;
INSERT INTO `routes` VALUES ('1', 'California Trip', 'This is my California Awesome Trip last summer 2014', '2015-04-03 17:27:38', '2015-04-03 17:27:38', '1', '0'), ('2', 'Os recantos de Lisboa', 'Rota de museus em Lisboa', '2015-04-03 17:28:15', '2015-04-03 17:28:15', '2', '0');
COMMIT;

-- ----------------------------
--  Table structure for `user_is_following`
-- ----------------------------
DROP TABLE IF EXISTS `user_is_following`;
CREATE TABLE `user_is_following` (
  `id_user_who_follows` int(10) unsigned NOT NULL,
  `id_user_who_is_followed` int(10) unsigned NOT NULL,
  KEY `id_user_who_follows` (`id_user_who_follows`),
  KEY `id_user_who_is_followed` (`id_user_who_is_followed`),
  CONSTRAINT `id_user_who_follows` FOREIGN KEY (`id_user_who_follows`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_user_who_is_followed` FOREIGN KEY (`id_user_who_is_followed`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_is_following`
-- ----------------------------
BEGIN;
INSERT INTO `user_is_following` VALUES ('1', '2'), ('2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user_likes_polaroid`
-- ----------------------------
DROP TABLE IF EXISTS `user_likes_polaroid`;
CREATE TABLE `user_likes_polaroid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_polaroid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_polaroid` (`id_polaroid`),
  CONSTRAINT `id_polaroid_like_fk` FOREIGN KEY (`id_polaroid`) REFERENCES `polaroids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_user_like_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_likes_route`
-- ----------------------------
DROP TABLE IF EXISTS `user_likes_route`;
CREATE TABLE `user_likes_route` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) unsigned NOT NULL,
  `id_route` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_user_3` (`id_user`),
  KEY `id_user_4` (`id_user`),
  KEY `id_route` (`id_route`),
  CONSTRAINT `fk_id_route_like_fk` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_user_like_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `facebook_username` varchar(100) DEFAULT NULL,
  `twitter_username` varchar(100) DEFAULT NULL,
  `google_plus_username` varchar(100) DEFAULT NULL,
  `datetime_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `datetime_last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` char(1) NOT NULL DEFAULT 'Y',
  `bio` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country`),
  KEY `id_country` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'bazinga', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'bazinga@gmail.com', 'bazinga cooper', 'USA', 'bazinga@facebook', 'bazinga@twitter', 'bazinga@g+', '2015-04-03 17:21:26', '2015-04-18 21:22:29', 'Y', 'I\'m Cool dolor sit amet, consectetur adipisicing elit. Nihil perferendis distinctio itaque aut necessitatibus eaque quos minus eum, esse dolorem non, ab pariatur ipsum quis, ipsa aliquid nobis enim voluptate cumque sunt dignissimos.'), ('2', 'nerd', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'jricvalerio@gmail.com', 'nerd sheldon', 'Portugal', 'nerd@facebook', 'nerd@twitter', 'nerd@g+', '2015-04-03 17:21:52', '2015-04-18 21:22:26', 'Y', 'I\'m Awesome...ipsum dolor sit amet, consectetur adipisicing elit. Nihil perferendis distinctio itaque aut necessitatibus eaque quos minus eum, esse dolorem non, ab pariatur ipsum quis, ipsa aliquid nobis enim voluptate cumque sunt dignissimos.'), ('3', 'carlitos123', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'carlitos@gmail.com', 'Carlos Fonseca Pereira da Silva', null, null, null, null, null, '2015-04-18 21:20:48', 'Y', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
