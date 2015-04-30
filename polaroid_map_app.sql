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

 Date: 04/30/2015 23:27:52 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `countries_icons`
-- ----------------------------
DROP TABLE IF EXISTS `countries_icons`;
CREATE TABLE `countries_icons` (
  `country_short_name` varchar(10) NOT NULL,
  `country_long_name` varchar(100) NOT NULL,
  `icon_svg_file_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_short_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `countries_icons`
-- ----------------------------
BEGIN;
INSERT INTO `countries_icons` VALUES ('AD', 'Andorra', 'BZ.svg'), ('AE', 'United Arab Emirates', 'BZ.svg'), ('AF', 'Afghanistan', 'BZ.svg'), ('AG', 'Antigua and Barbuda', 'BZ.svg'), ('AI', 'Anguilla', 'BZ.svg'), ('AL', 'Albania', 'BZ.svg'), ('AM', 'Armenia', 'BZ.svg'), ('AO', 'Angola', 'BZ.svg'), ('AQ', 'Antarctica', 'BZ.svg'), ('AR', 'Argentina', 'BZ.svg'), ('AS', 'American Samoa', 'BZ.svg'), ('AT', 'Austria', 'BZ.svg'), ('AU', 'Australia', 'BZ.svg'), ('AW', 'Aruba', 'BZ.svg'), ('AX', 'Åland Islands', 'BZ.svg'), ('AZ', 'Azerbaijan', 'BZ.svg'), ('BA', 'Bosnia and Herzegovina', 'BZ.svg'), ('BB', 'Barbados', 'BZ.svg'), ('BD', 'Bangladesh', 'BZ.svg'), ('BE', 'Belgium', 'BZ.svg'), ('BF', 'Burkina Faso', 'BZ.svg'), ('BG', 'Bulgaria', 'BZ.svg'), ('BH', 'Bahrain', 'BZ.svg'), ('BI', 'Burundi', 'BZ.svg'), ('BJ', 'Benin', 'BZ.svg'), ('BL', 'Saint Barthélemy', 'BZ.svg'), ('BM', 'Bermuda', 'BZ.svg'), ('BN', 'Brunei Darussalam', 'BZ.svg'), ('BO', 'Bolivia, Plurinational State of ', 'BZ.svg'), ('BQ', 'Bonaire, Sint Eustatius and Saba', 'BZ.svg'), ('BR', 'Brazil', 'BZ.svg'), ('BS', 'Bahamas', 'BZ.svg'), ('BT', 'Bhutan', 'BZ.svg'), ('BV', 'Bouvet Island', 'BZ.svg'), ('BW', 'Botswana', 'BZ.svg'), ('BY', 'Belarus', 'BZ.svg'), ('BZ', 'Belize', 'BZ.svg'), ('CA', 'Canada', 'BZ.svg'), ('CC', 'Cocos (Keeling) Islands', 'BZ.svg'), ('CD', 'Congo, the Democratic Republic of the ', 'BZ.svg'), ('CF', 'Central African Republic', 'BZ.svg'), ('CG', 'Congo							', 'BZ.svg'), ('CH', 'Switzerland', 'BZ.svg'), ('CI', 'Côte d\'Ivoire', 'BZ.svg'), ('CK', 'Cook Islands					', 'BZ.svg'), ('CL', 'Chile', 'BZ.svg'), ('CM', 'Cameroon', 'BZ.svg'), ('CN', 'China', 'BZ.svg'), ('CO', 'Colombia', 'BZ.svg'), ('CR', 'Costa Rica', 'BZ.svg'), ('CU', 'Cuba', 'BZ.svg'), ('CV', 'Cabo Verde', 'BZ.svg'), ('CW', 'Curaçao', 'BZ.svg'), ('CX', 'Christmas Island', 'BZ.svg'), ('CY', 'Cyprus', 'BZ.svg'), ('CZ', 'Czech Republic', 'BZ.svg'), ('DE', 'Germany', 'BZ.svg'), ('DJ', 'Djibouti', 'BZ.svg'), ('DK', 'Denmark', 'BZ.svg'), ('DM', 'Dominica', 'BZ.svg'), ('DO', 'Dominican Republic', 'BZ.svg'), ('DZ', 'Algeria', 'BZ.svg'), ('EC', 'Ecuador', 'BZ.svg'), ('EE', 'Estonia', 'BZ.svg'), ('EG', 'Egypt', 'BZ.svg'), ('EH', 'Western Sahara', 'BZ.svg'), ('ER', 'Eritrea', 'BZ.svg'), ('ES', 'Spain', 'BZ.svg'), ('ET', 'Ethiopia', 'BZ.svg'), ('FI', 'Finland', 'BZ.svg'), ('FJ', 'Fiji', 'BZ.svg'), ('FK', 'Falkland Islands (Malvinas)', 'BZ.svg'), ('FM', 'Micronesia, Federated States of', 'BZ.svg'), ('FO', 'Faroe Islands', 'BZ.svg'), ('FR', 'France', 'BZ.svg'), ('GA', 'Gabon', 'BZ.svg'), ('GB', 'United Kingdom', 'BZ.svg'), ('GD', 'Grenada', 'BZ.svg'), ('GE', 'Georgia', 'BZ.svg'), ('GF', 'French Guiana', 'BZ.svg'), ('GG', 'Guernsey							', 'BZ.svg'), ('GH', 'Ghana', 'BZ.svg'), ('GI', 'Gibraltar', 'BZ.svg'), ('GL', 'Greenland', 'BZ.svg'), ('GM', 'Gambia', 'BZ.svg'), ('GN', 'Guinea', 'BZ.svg'), ('GP', 'Guadeloupe', 'BZ.svg'), ('GQ', 'Equatorial Guinea', 'BZ.svg'), ('GR', 'Greece', 'BZ.svg'), ('GS', 'South Georgia and the South Sandwich Islands', 'BZ.svg'), ('GT', 'Guatemala								', 'BZ.svg'), ('GU', 'Guam							', 'BZ.svg'), ('GW', 'Guinea-Bissau', 'BZ.svg'), ('GY', 'Guyana', 'BZ.svg'), ('HK', 'Hong Kong', 'BZ.svg'), ('HM', 'Heard Island and McDonald Islands', 'BZ.svg'), ('HN', 'Honduras', 'BZ.svg'), ('HR', 'Croatia', 'BZ.svg'), ('HT', 'Haiti', 'BZ.svg'), ('HU', 'Hungar', 'BZ.svg'), ('ID', 'Indonesia								', 'BZ.svg'), ('IE', 'Ireland', 'BZ.svg'), ('IL', 'Israel', 'BZ.svg'), ('IM', 'Isle of Man', 'BZ.svg'), ('IN', 'India							', 'BZ.svg'), ('IO', 'British Indian Ocean Territory', 'BZ.svg'), ('IQ', 'Iraq', 'BZ.svg'), ('IR', 'Iran, Islamic Republic of', 'BZ.svg'), ('IS', 'Iceland							', 'BZ.svg'), ('IT', 'Italy', 'BZ.svg'), ('JE', 'Jersey', 'BZ.svg'), ('JM', 'Jamaica', 'BZ.svg'), ('JO', 'Jordan', 'BZ.svg'), ('JP', 'Japan', 'BZ.svg'), ('KE', 'Kenya', 'BZ.svg'), ('KG', 'Kyrgyzstan', 'BZ.svg'), ('KH', 'Cambodia', 'BZ.svg'), ('KI', 'Kiribati', 'BZ.svg'), ('KM', 'Comoros', 'BZ.svg'), ('KN', 'Saint Kitts and Nevis', 'BZ.svg'), ('KP', 'Korea, Democratic People\'s Republic of', 'BZ.svg'), ('KR', 'Korea, Republic of					', 'BZ.svg'), ('KW', 'Kuwait', 'BZ.svg'), ('KY', 'Cayman Islands', 'BZ.svg'), ('KZ', 'Kazakhstan', 'BZ.svg'), ('LA', 'Lao People\'s Democratic Republic', 'BZ.svg'), ('LB', 'Lebanon', 'BZ.svg'), ('LC', 'Saint Lucia', 'BZ.svg'), ('LI', 'Liechtenstein', 'BZ.svg'), ('LK', 'Sri Lanka', 'BZ.svg'), ('LR', 'Liberia', 'BZ.svg'), ('LS', 'Lesotho', 'BZ.svg'), ('LT', 'Lithuania', 'BZ.svg'), ('LU', 'Luxembourg', 'BZ.svg'), ('LV', 'Latvia', 'BZ.svg'), ('LY', 'Libya', 'BZ.svg'), ('MA', 'Morocco', 'BZ.svg'), ('MC', 'Monaco', 'BZ.svg'), ('MD', 'Moldova, Republic of				', 'BZ.svg'), ('ME', 'Montenegro', 'BZ.svg'), ('MF', 'Saint Martin (French part)', 'BZ.svg'), ('MG', 'Madagascar', 'BZ.svg'), ('MH', 'Marshall Islands								', 'BZ.svg'), ('MK', 'Macedonia, the former Yugoslav Republic of', 'BZ.svg'), ('ML', 'Mali									', 'BZ.svg'), ('MM', 'Myanmar', 'BZ.svg'), ('MN', 'Mongolia', 'BZ.svg'), ('MO', 'Macao', 'BZ.svg'), ('MP', 'Northern Mariana Islands', 'BZ.svg'), ('MQ', 'Martinique					', 'BZ.svg'), ('MR', 'Mauritania							', 'BZ.svg'), ('MS', 'Montserrat', 'BZ.svg'), ('MT', 'Malta								', 'BZ.svg'), ('MU', 'Mauritius', 'BZ.svg'), ('MV', 'Maldives', 'BZ.svg'), ('MW', 'Malawi', 'BZ.svg'), ('MX', 'Mexico', 'BZ.svg'), ('MY', 'Malaysia', 'BZ.svg'), ('MZ', 'Mozambique', 'BZ.svg'), ('NA', 'Namibia', 'BZ.svg'), ('NC', 'New Caledonia', 'BZ.svg'), ('NE', 'Niger', 'BZ.svg'), ('NF', 'Norfolk Island', 'BZ.svg'), ('NG', 'Nigeria', 'BZ.svg'), ('NI', 'Nicaragua', 'BZ.svg'), ('NL', 'Netherlands', 'BZ.svg'), ('NO', 'Norway', 'BZ.svg'), ('NP', 'Nepal', 'BZ.svg'), ('NR', 'Nauru', 'BZ.svg'), ('NU', 'Niue', 'BZ.svg'), ('NZ', 'New Zealand', 'BZ.svg'), ('OM', 'Oman', 'BZ.svg'), ('PA', 'Panama', 'BZ.svg'), ('PE', 'Peru', 'BZ.svg'), ('PF', 'French Polynesia', 'BZ.svg'), ('PG', 'Papua New Guinea', 'BZ.svg'), ('PH', 'Philippines', 'BZ.svg'), ('PK', 'Pakistan', 'BZ.svg'), ('PL', 'Poland', 'BZ.svg'), ('PM', 'Saint Pierre and Miquelon', 'BZ.svg'), ('PN', 'Pitcairn', 'BZ.svg'), ('PR', 'Puerto Rico', 'BZ.svg'), ('PS', 'Palestine, State of', 'BZ.svg'), ('PT', 'Portugal', 'BZ.svg'), ('PW', 'Palau', 'BZ.svg'), ('PY', 'Paraguay', 'BZ.svg'), ('QA', 'Qatar', 'BZ.svg'), ('RE', 'Réunion', 'BZ.svg'), ('RO', 'Romania', 'BZ.svg'), ('RS', 'Serbia', 'BZ.svg'), ('RU', 'Russian Federation', 'BZ.svg'), ('RW', 'Rwanda', 'BZ.svg'), ('SA', 'Saudi Arabia', 'BZ.svg'), ('SB', 'Solomon Islands', 'BZ.svg'), ('SC', 'Seychelles', 'BZ.svg'), ('SD', 'Sudan', 'BZ.svg'), ('SE', 'Sweden', 'BZ.svg'), ('SG', 'Singapore', 'BZ.svg'), ('SH', 'Saint Helena, Ascension and Tristan da Cunha', 'BZ.svg'), ('SI', 'Slovenia', 'BZ.svg'), ('SJ', 'Svalbard and Jan Mayen', 'BZ.svg'), ('SK', 'Slovakia', 'BZ.svg'), ('SL', 'Sierra Leone', 'BZ.svg'), ('SM', 'San Marino', 'BZ.svg'), ('SN', 'Senegal', 'BZ.svg'), ('SO', 'Somalia', 'BZ.svg'), ('SR', 'Suriname', 'BZ.svg'), ('SS', 'South Sudan', 'BZ.svg'), ('ST', 'Sao Tome and Principe', 'BZ.svg'), ('SV', 'El Salvador', 'BZ.svg'), ('SX', 'Sint Maarten (Dutch part)', 'BZ.svg'), ('SY', 'Syrian Arab Republic', 'BZ.svg'), ('SZ', 'Swaziland', 'BZ.svg'), ('TC', 'Turks and Caicos Islands', 'BZ.svg'), ('TD', 'Chad', 'BZ.svg'), ('TF', 'French Southern Territories', 'BZ.svg'), ('TG', 'Togo', 'BZ.svg'), ('TH', 'Thailand', 'BZ.svg'), ('TJ', 'Tajikistan', 'BZ.svg'), ('TK', 'Tokelau', 'BZ.svg'), ('TL', 'Timor-Leste', 'BZ.svg'), ('TM', 'Turkmenistan', 'BZ.svg'), ('TN', 'Tunisia', 'BZ.svg'), ('TO', 'Tonga', 'BZ.svg'), ('TR', 'Turkey', 'BZ.svg'), ('TT', 'Trinidad and Tobago', 'BZ.svg'), ('TV', 'Tuvalu', 'BZ.svg'), ('TW', 'Taiwan', 'BZ.svg'), ('TZ', 'Tanzania, United Republic of', 'BZ.svg'), ('UA', 'Ukraine', 'BZ.svg'), ('UG', 'Uganda', 'BZ.svg'), ('UM', 'United States Minor Outlying Islands', 'BZ.svg'), ('US', 'United States', 'BZ.svg'), ('UY', 'Uruguay', 'BZ.svg'), ('UZ', 'Uzbekistan', 'BZ.svg'), ('VA', 'Holy See (Vatican City State)', 'BZ.svg'), ('VC', 'Saint Vincent and the Grenadines', 'BZ.svg'), ('VE', 'Venezuela, Bolivarian Republic of', 'BZ.svg'), ('VG', 'Virgin Islands,                       ', 'BZ.svg'), ('VI', 'British Virgin Islands, U.S.', 'BZ.svg'), ('VN', 'Viet Nam', 'BZ.svg'), ('VU', 'Vanuatu', 'BZ.svg'), ('WF', 'Wallis and Futuna', 'BZ.svg'), ('WS', 'Samoa', 'BZ.svg'), ('YE', 'Yemen', 'BZ.svg'), ('YT', 'Mayotte', 'BZ.svg'), ('ZA', 'South Africa', 'BZ.svg'), ('ZM', 'Zambia', 'BZ.svg'), ('ZW', 'Zimbabwe', 'BZ.svg');
COMMIT;

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
INSERT INTO `polaroids` VALUES ('1', '37.427474|-122.169719', '37.427474', '-122.169719', 'My trip at Standford University', 'look at this place, so awesome!', 'standford-university.jpg', '11', 'USA', '2015-04-03 17:23:47', '2015-04-04 03:08:36', '1'), ('2', '37.7577|-122.4376', '37.7577', '-122.4376', 'Trip in San Francisco', 'I love this city. \"If you\'re going to SF, make sure to wear some flowers in your hair\"', 'san-francisco.jpg', '8', 'USA', '2015-04-03 17:25:26', '2015-04-04 03:08:38', '1'), ('3', '38.693597|-9.205712', '38.693597', '-9.205712', 'Padrão dos Descobrimentos', 'Uau, nunca vi um barquinho em pedra tão lindo caramba!', 'padrao-dos-descobrimentos.jpg', '8', 'Portugal', '2015-04-03 17:26:32', '2015-04-04 03:20:36', '2'), ('4', '38.689633|-9.17711', '38.689633', '-9.17711', 'Museu da Carris', 'Museu Lindo xD', 'museu-da-carris.jpg', '3', 'Portugal', '2015-04-03 18:25:25', '2015-04-04 03:08:40', '2'), ('5', '38.689633|-9.17711', '38.689633', '-9.17711', 'ponte 25 de Abril e o Cristo Rei', 'Uau, que coisa mai linda!', 'ponte-25-abril.jpg', '2', 'Portugal', '2015-04-03 19:53:05', '2015-04-04 03:08:41', '2'), ('6', '38.689633|-9.17711', '38.689633', '-9.17711', 'Cristo Rei', 'Louvado seja Deus xD', 'cristo-rei.jpg', '1', 'Portugal', '2015-04-03 20:07:32', '2015-04-04 03:08:42', '2'), ('7', '38.7127527|-9.1462951', '38.7127527', '-9.1462951', 'Bairro Alto =)', 'Que vista fantástica!', 'bairro-alto.jpg', '42', 'Portugal', '2015-04-12 02:48:37', '2015-04-12 22:38:20', '2'), ('10', '35.77902073064695|-5.798609428527811', '35.779020730647', '-5.7986094285278', 'velhinho com o cão', 'velhote alert(&#34;hello&#34;);', '8ba491ccd6be4e2a9702162cb08ffa80.jpg', '2', 'Morocco', '2015-04-18 07:56:54', '2015-04-18 07:56:54', '2');
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
INSERT INTO `route_has_polaroids` VALUES ('1', '1', '2015-04-03 17:28:36'), ('1', '2', '2015-04-03 17:28:56'), ('2', '3', '2015-04-03 17:29:04'), ('2', '7', '2015-04-20 19:53:12');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'bazinga', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'bazinga@gmail.com', 'bazinga cooper', 'USA', 'bazinga@facebook', 'bazinga@twitter', 'bazinga@g+', '2015-04-03 17:21:26', '2015-04-18 21:22:29', 'Y', 'I\'m Cool dolor sit amet, consectetur adipisicing elit. Nihil perferendis distinctio itaque aut necessitatibus eaque quos minus eum, esse dolorem non, ab pariatur ipsum quis, ipsa aliquid nobis enim voluptate cumque sunt dignissimos.'), ('2', 'nerd', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'jricvalerio@gmail.com', 'nerd sheldon', 'Portugal', 'nerd@facebook', 'nerd@twitter', 'nerd@g+', '2015-04-03 17:21:52', '2015-04-18 21:22:26', 'Y', 'I\'m Awesome...ipsum dolor sit amet, consectetur adipisicing elit. Nihil perferendis distinctio itaque aut necessitatibus eaque quos minus eum, esse dolorem non, ab pariatur ipsum quis, ipsa aliquid nobis enim voluptate cumque sunt dignissimos.'), ('3', 'carlitos123', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'carlitos@gmail.com', 'Carlos Fonseca Pereira da Silva', null, null, null, null, null, '2015-04-18 21:20:48', 'Y', null), ('4', 'ddddd', '$2y$13$FFMvLjuyIdJOBc8hwQd5dO0Nv2L8EyXQdC6ExFs3rO8tYRboFdNT6', 'nerdddd@gmail.com', 'Carlos Fonseca Pereira da Silva', null, null, null, null, null, '2015-04-24 11:08:16', 'Y', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
