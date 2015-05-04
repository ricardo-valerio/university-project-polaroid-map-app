/*
Navicat MySQL Data Transfer

Source Server         : bitnami localhost
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : polaroid_map_app

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2015-05-04 01:25:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `countries_icons`
-- ----------------------------
DROP TABLE IF EXISTS `countries_icons`;
CREATE TABLE `countries_icons` (
  `country_short_name` varchar(10) NOT NULL,
  `country_long_name` varchar(100) NOT NULL,
  PRIMARY KEY (`country_short_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of countries_icons
-- ----------------------------
INSERT INTO `countries_icons` VALUES ('AD', 'Andorra');
INSERT INTO `countries_icons` VALUES ('AE', 'United Arab Emirates');
INSERT INTO `countries_icons` VALUES ('AF', 'Afghanistan');
INSERT INTO `countries_icons` VALUES ('AG', 'Antigua and Barbuda');
INSERT INTO `countries_icons` VALUES ('AI', 'Anguilla');
INSERT INTO `countries_icons` VALUES ('AL', 'Albania');
INSERT INTO `countries_icons` VALUES ('AM', 'Armenia');
INSERT INTO `countries_icons` VALUES ('AO', 'Angola');
INSERT INTO `countries_icons` VALUES ('AQ', 'Antarctica');
INSERT INTO `countries_icons` VALUES ('AR', 'Argentina');
INSERT INTO `countries_icons` VALUES ('AS', 'American Samoa');
INSERT INTO `countries_icons` VALUES ('AT', 'Austria');
INSERT INTO `countries_icons` VALUES ('AU', 'Australia');
INSERT INTO `countries_icons` VALUES ('AW', 'Aruba');
INSERT INTO `countries_icons` VALUES ('AX', 'Åland Islands');
INSERT INTO `countries_icons` VALUES ('AZ', 'Azerbaijan');
INSERT INTO `countries_icons` VALUES ('BA', 'Bosnia and Herzegovina');
INSERT INTO `countries_icons` VALUES ('BB', 'Barbados');
INSERT INTO `countries_icons` VALUES ('BD', 'Bangladesh');
INSERT INTO `countries_icons` VALUES ('BE', 'Belgium');
INSERT INTO `countries_icons` VALUES ('BF', 'Burkina Faso');
INSERT INTO `countries_icons` VALUES ('BG', 'Bulgaria');
INSERT INTO `countries_icons` VALUES ('BH', 'Bahrain');
INSERT INTO `countries_icons` VALUES ('BI', 'Burundi');
INSERT INTO `countries_icons` VALUES ('BJ', 'Benin');
INSERT INTO `countries_icons` VALUES ('BL', 'Saint Barthélemy');
INSERT INTO `countries_icons` VALUES ('BM', 'Bermuda');
INSERT INTO `countries_icons` VALUES ('BN', 'Brunei Darussalam');
INSERT INTO `countries_icons` VALUES ('BO', 'Bolivia, Plurinational State of ');
INSERT INTO `countries_icons` VALUES ('BQ', 'Bonaire, Sint Eustatius and Saba');
INSERT INTO `countries_icons` VALUES ('BR', 'Brazil');
INSERT INTO `countries_icons` VALUES ('BS', 'Bahamas');
INSERT INTO `countries_icons` VALUES ('BT', 'Bhutan');
INSERT INTO `countries_icons` VALUES ('BV', 'Bouvet Island');
INSERT INTO `countries_icons` VALUES ('BW', 'Botswana');
INSERT INTO `countries_icons` VALUES ('BY', 'Belarus');
INSERT INTO `countries_icons` VALUES ('BZ', 'Belize');
INSERT INTO `countries_icons` VALUES ('CA', 'Canada');
INSERT INTO `countries_icons` VALUES ('CC', 'Cocos (Keeling) Islands');
INSERT INTO `countries_icons` VALUES ('CD', 'Congo, the Democratic Republic of the ');
INSERT INTO `countries_icons` VALUES ('CF', 'Central African Republic');
INSERT INTO `countries_icons` VALUES ('CG', 'Congo');
INSERT INTO `countries_icons` VALUES ('CH', 'Switzerland');
INSERT INTO `countries_icons` VALUES ('CI', 'Côte d\'Ivoire');
INSERT INTO `countries_icons` VALUES ('CK', 'Cook Islands');
INSERT INTO `countries_icons` VALUES ('CL', 'Chile');
INSERT INTO `countries_icons` VALUES ('CM', 'Cameroon');
INSERT INTO `countries_icons` VALUES ('CN', 'China');
INSERT INTO `countries_icons` VALUES ('CO', 'Colombia');
INSERT INTO `countries_icons` VALUES ('CR', 'Costa Rica');
INSERT INTO `countries_icons` VALUES ('CU', 'Cuba');
INSERT INTO `countries_icons` VALUES ('CV', 'Cabo Verde');
INSERT INTO `countries_icons` VALUES ('CW', 'Curaçao');
INSERT INTO `countries_icons` VALUES ('CX', 'Christmas Island');
INSERT INTO `countries_icons` VALUES ('CY', 'Cyprus');
INSERT INTO `countries_icons` VALUES ('CZ', 'Czech Republic');
INSERT INTO `countries_icons` VALUES ('DE', 'Germany');
INSERT INTO `countries_icons` VALUES ('DJ', 'Djibouti');
INSERT INTO `countries_icons` VALUES ('DK', 'Denmark');
INSERT INTO `countries_icons` VALUES ('DM', 'Dominica');
INSERT INTO `countries_icons` VALUES ('DO', 'Dominican Republic');
INSERT INTO `countries_icons` VALUES ('DZ', 'Algeria');
INSERT INTO `countries_icons` VALUES ('EC', 'Ecuador');
INSERT INTO `countries_icons` VALUES ('EE', 'Estonia');
INSERT INTO `countries_icons` VALUES ('EG', 'Egypt');
INSERT INTO `countries_icons` VALUES ('EH', 'Western Sahara');
INSERT INTO `countries_icons` VALUES ('ER', 'Eritrea');
INSERT INTO `countries_icons` VALUES ('ES', 'Spain');
INSERT INTO `countries_icons` VALUES ('ET', 'Ethiopia');
INSERT INTO `countries_icons` VALUES ('FI', 'Finland');
INSERT INTO `countries_icons` VALUES ('FJ', 'Fiji');
INSERT INTO `countries_icons` VALUES ('FK', 'Falkland Islands (Malvinas)');
INSERT INTO `countries_icons` VALUES ('FM', 'Micronesia, Federated States of');
INSERT INTO `countries_icons` VALUES ('FO', 'Faroe Islands');
INSERT INTO `countries_icons` VALUES ('FR', 'France');
INSERT INTO `countries_icons` VALUES ('GA', 'Gabon');
INSERT INTO `countries_icons` VALUES ('GB', 'United Kingdom');
INSERT INTO `countries_icons` VALUES ('GD', 'Grenada');
INSERT INTO `countries_icons` VALUES ('GE', 'Georgia');
INSERT INTO `countries_icons` VALUES ('GF', 'French Guiana');
INSERT INTO `countries_icons` VALUES ('GG', 'Guernsey');
INSERT INTO `countries_icons` VALUES ('GH', 'Ghana');
INSERT INTO `countries_icons` VALUES ('GI', 'Gibraltar');
INSERT INTO `countries_icons` VALUES ('GL', 'Greenland');
INSERT INTO `countries_icons` VALUES ('GM', 'Gambia');
INSERT INTO `countries_icons` VALUES ('GN', 'Guinea');
INSERT INTO `countries_icons` VALUES ('GP', 'Guadeloupe');
INSERT INTO `countries_icons` VALUES ('GQ', 'Equatorial Guinea');
INSERT INTO `countries_icons` VALUES ('GR', 'Greece');
INSERT INTO `countries_icons` VALUES ('GS', 'South Georgia and the South Sandwich Islands');
INSERT INTO `countries_icons` VALUES ('GT', 'Guatemala');
INSERT INTO `countries_icons` VALUES ('GU', 'Guam');
INSERT INTO `countries_icons` VALUES ('GW', 'Guinea-Bissau');
INSERT INTO `countries_icons` VALUES ('GY', 'Guyana');
INSERT INTO `countries_icons` VALUES ('HK', 'Hong Kong');
INSERT INTO `countries_icons` VALUES ('HM', 'Heard Island and McDonald Islands');
INSERT INTO `countries_icons` VALUES ('HN', 'Honduras');
INSERT INTO `countries_icons` VALUES ('HR', 'Croatia');
INSERT INTO `countries_icons` VALUES ('HT', 'Haiti');
INSERT INTO `countries_icons` VALUES ('HU', 'Hungar');
INSERT INTO `countries_icons` VALUES ('ID', 'Indonesia');
INSERT INTO `countries_icons` VALUES ('IE', 'Ireland');
INSERT INTO `countries_icons` VALUES ('IL', 'Israel');
INSERT INTO `countries_icons` VALUES ('IM', 'Isle of Man');
INSERT INTO `countries_icons` VALUES ('IN', 'India');
INSERT INTO `countries_icons` VALUES ('IO', 'British Indian Ocean Territory');
INSERT INTO `countries_icons` VALUES ('IQ', 'Iraq');
INSERT INTO `countries_icons` VALUES ('IR', 'Iran, Islamic Republic of');
INSERT INTO `countries_icons` VALUES ('IS', 'Iceland');
INSERT INTO `countries_icons` VALUES ('IT', 'Italy');
INSERT INTO `countries_icons` VALUES ('JE', 'Jersey');
INSERT INTO `countries_icons` VALUES ('JM', 'Jamaica');
INSERT INTO `countries_icons` VALUES ('JO', 'Jordan');
INSERT INTO `countries_icons` VALUES ('JP', 'Japan');
INSERT INTO `countries_icons` VALUES ('KE', 'Kenya');
INSERT INTO `countries_icons` VALUES ('KG', 'Kyrgyzstan');
INSERT INTO `countries_icons` VALUES ('KH', 'Cambodia');
INSERT INTO `countries_icons` VALUES ('KI', 'Kiribati');
INSERT INTO `countries_icons` VALUES ('KM', 'Comoros');
INSERT INTO `countries_icons` VALUES ('KN', 'Saint Kitts and Nevis');
INSERT INTO `countries_icons` VALUES ('KP', 'Korea, Democratic People\'s Republic of');
INSERT INTO `countries_icons` VALUES ('KR', 'Korea, Republic of');
INSERT INTO `countries_icons` VALUES ('KW', 'Kuwait');
INSERT INTO `countries_icons` VALUES ('KY', 'Cayman Islands');
INSERT INTO `countries_icons` VALUES ('KZ', 'Kazakhstan');
INSERT INTO `countries_icons` VALUES ('LA', 'Lao People\'s Democratic Republic');
INSERT INTO `countries_icons` VALUES ('LB', 'Lebanon');
INSERT INTO `countries_icons` VALUES ('LC', 'Saint Lucia');
INSERT INTO `countries_icons` VALUES ('LI', 'Liechtenstein');
INSERT INTO `countries_icons` VALUES ('LK', 'Sri Lanka');
INSERT INTO `countries_icons` VALUES ('LR', 'Liberia');
INSERT INTO `countries_icons` VALUES ('LS', 'Lesotho');
INSERT INTO `countries_icons` VALUES ('LT', 'Lithuania');
INSERT INTO `countries_icons` VALUES ('LU', 'Luxembourg');
INSERT INTO `countries_icons` VALUES ('LV', 'Latvia');
INSERT INTO `countries_icons` VALUES ('LY', 'Libya');
INSERT INTO `countries_icons` VALUES ('MA', 'Morocco');
INSERT INTO `countries_icons` VALUES ('MC', 'Monaco');
INSERT INTO `countries_icons` VALUES ('MD', 'Moldova, Republic of');
INSERT INTO `countries_icons` VALUES ('ME', 'Montenegro');
INSERT INTO `countries_icons` VALUES ('MF', 'Saint Martin (French part)');
INSERT INTO `countries_icons` VALUES ('MG', 'Madagascar');
INSERT INTO `countries_icons` VALUES ('MH', 'Marshall Islands');
INSERT INTO `countries_icons` VALUES ('MK', 'Macedonia, the former Yugoslav Republic of');
INSERT INTO `countries_icons` VALUES ('ML', 'Mali');
INSERT INTO `countries_icons` VALUES ('MM', 'Myanmar');
INSERT INTO `countries_icons` VALUES ('MN', 'Mongolia');
INSERT INTO `countries_icons` VALUES ('MO', 'Macao');
INSERT INTO `countries_icons` VALUES ('MP', 'Northern Mariana Islands');
INSERT INTO `countries_icons` VALUES ('MQ', 'Martinique');
INSERT INTO `countries_icons` VALUES ('MR', 'Mauritania');
INSERT INTO `countries_icons` VALUES ('MS', 'Montserrat');
INSERT INTO `countries_icons` VALUES ('MT', 'Malta');
INSERT INTO `countries_icons` VALUES ('MU', 'Mauritius');
INSERT INTO `countries_icons` VALUES ('MV', 'Maldives');
INSERT INTO `countries_icons` VALUES ('MW', 'Malawi');
INSERT INTO `countries_icons` VALUES ('MX', 'Mexico');
INSERT INTO `countries_icons` VALUES ('MY', 'Malaysia');
INSERT INTO `countries_icons` VALUES ('MZ', 'Mozambique');
INSERT INTO `countries_icons` VALUES ('NA', 'Namibia');
INSERT INTO `countries_icons` VALUES ('NC', 'New Caledonia');
INSERT INTO `countries_icons` VALUES ('NE', 'Niger');
INSERT INTO `countries_icons` VALUES ('NF', 'Norfolk Island');
INSERT INTO `countries_icons` VALUES ('NG', 'Nigeria');
INSERT INTO `countries_icons` VALUES ('NI', 'Nicaragua');
INSERT INTO `countries_icons` VALUES ('NL', 'Netherlands');
INSERT INTO `countries_icons` VALUES ('NO', 'Norway');
INSERT INTO `countries_icons` VALUES ('NP', 'Nepal');
INSERT INTO `countries_icons` VALUES ('NR', 'Nauru');
INSERT INTO `countries_icons` VALUES ('NU', 'Niue');
INSERT INTO `countries_icons` VALUES ('NZ', 'New Zealand');
INSERT INTO `countries_icons` VALUES ('OM', 'Oman');
INSERT INTO `countries_icons` VALUES ('PA', 'Panama');
INSERT INTO `countries_icons` VALUES ('PE', 'Peru');
INSERT INTO `countries_icons` VALUES ('PF', 'French Polynesia');
INSERT INTO `countries_icons` VALUES ('PG', 'Papua New Guinea');
INSERT INTO `countries_icons` VALUES ('PH', 'Philippines');
INSERT INTO `countries_icons` VALUES ('PK', 'Pakistan');
INSERT INTO `countries_icons` VALUES ('PL', 'Poland');
INSERT INTO `countries_icons` VALUES ('PM', 'Saint Pierre and Miquelon');
INSERT INTO `countries_icons` VALUES ('PN', 'Pitcairn');
INSERT INTO `countries_icons` VALUES ('PR', 'Puerto Rico');
INSERT INTO `countries_icons` VALUES ('PS', 'Palestine, State of');
INSERT INTO `countries_icons` VALUES ('PT', 'Portugal');
INSERT INTO `countries_icons` VALUES ('PW', 'Palau');
INSERT INTO `countries_icons` VALUES ('PY', 'Paraguay');
INSERT INTO `countries_icons` VALUES ('QA', 'Qatar');
INSERT INTO `countries_icons` VALUES ('RE', 'Réunion');
INSERT INTO `countries_icons` VALUES ('RO', 'Romania');
INSERT INTO `countries_icons` VALUES ('RS', 'Serbia');
INSERT INTO `countries_icons` VALUES ('RU', 'Russian Federation');
INSERT INTO `countries_icons` VALUES ('RW', 'Rwanda');
INSERT INTO `countries_icons` VALUES ('SA', 'Saudi Arabia');
INSERT INTO `countries_icons` VALUES ('SB', 'Solomon Islands');
INSERT INTO `countries_icons` VALUES ('SC', 'Seychelles');
INSERT INTO `countries_icons` VALUES ('SD', 'Sudan');
INSERT INTO `countries_icons` VALUES ('SE', 'Sweden');
INSERT INTO `countries_icons` VALUES ('SG', 'Singapore');
INSERT INTO `countries_icons` VALUES ('SH', 'Saint Helena, Ascension and Tristan da Cunha');
INSERT INTO `countries_icons` VALUES ('SI', 'Slovenia');
INSERT INTO `countries_icons` VALUES ('SJ', 'Svalbard and Jan Mayen');
INSERT INTO `countries_icons` VALUES ('SK', 'Slovakia');
INSERT INTO `countries_icons` VALUES ('SL', 'Sierra Leone');
INSERT INTO `countries_icons` VALUES ('SM', 'San Marino');
INSERT INTO `countries_icons` VALUES ('SN', 'Senegal');
INSERT INTO `countries_icons` VALUES ('SO', 'Somalia');
INSERT INTO `countries_icons` VALUES ('SR', 'Suriname');
INSERT INTO `countries_icons` VALUES ('SS', 'South Sudan');
INSERT INTO `countries_icons` VALUES ('ST', 'Sao Tome and Principe');
INSERT INTO `countries_icons` VALUES ('SV', 'El Salvador');
INSERT INTO `countries_icons` VALUES ('SX', 'Sint Maarten (Dutch part)');
INSERT INTO `countries_icons` VALUES ('SY', 'Syrian Arab Republic');
INSERT INTO `countries_icons` VALUES ('SZ', 'Swaziland');
INSERT INTO `countries_icons` VALUES ('TC', 'Turks and Caicos Islands');
INSERT INTO `countries_icons` VALUES ('TD', 'Chad');
INSERT INTO `countries_icons` VALUES ('TF', 'French Southern Territories');
INSERT INTO `countries_icons` VALUES ('TG', 'Togo');
INSERT INTO `countries_icons` VALUES ('TH', 'Thailand');
INSERT INTO `countries_icons` VALUES ('TJ', 'Tajikistan');
INSERT INTO `countries_icons` VALUES ('TK', 'Tokelau');
INSERT INTO `countries_icons` VALUES ('TL', 'Timor-Leste');
INSERT INTO `countries_icons` VALUES ('TM', 'Turkmenistan');
INSERT INTO `countries_icons` VALUES ('TN', 'Tunisia');
INSERT INTO `countries_icons` VALUES ('TO', 'Tonga');
INSERT INTO `countries_icons` VALUES ('TR', 'Turkey');
INSERT INTO `countries_icons` VALUES ('TT', 'Trinidad and Tobago');
INSERT INTO `countries_icons` VALUES ('TV', 'Tuvalu');
INSERT INTO `countries_icons` VALUES ('TW', 'Taiwan');
INSERT INTO `countries_icons` VALUES ('TZ', 'Tanzania, United Republic of');
INSERT INTO `countries_icons` VALUES ('UA', 'Ukraine');
INSERT INTO `countries_icons` VALUES ('UG', 'Uganda');
INSERT INTO `countries_icons` VALUES ('UM', 'United States Minor Outlying Islands');
INSERT INTO `countries_icons` VALUES ('US', 'United States');
INSERT INTO `countries_icons` VALUES ('UY', 'Uruguay');
INSERT INTO `countries_icons` VALUES ('UZ', 'Uzbekistan');
INSERT INTO `countries_icons` VALUES ('VA', 'Holy See (Vatican City State)');
INSERT INTO `countries_icons` VALUES ('VC', 'Saint Vincent and the Grenadines');
INSERT INTO `countries_icons` VALUES ('VE', 'Venezuela, Bolivarian Republic of');
INSERT INTO `countries_icons` VALUES ('VG', 'Virgin Islands,                       ');
INSERT INTO `countries_icons` VALUES ('VI', 'British Virgin Islands, U.S.');
INSERT INTO `countries_icons` VALUES ('VN', 'Viet Nam');
INSERT INTO `countries_icons` VALUES ('VU', 'Vanuatu');
INSERT INTO `countries_icons` VALUES ('WF', 'Wallis and Futuna');
INSERT INTO `countries_icons` VALUES ('WS', 'Samoa');
INSERT INTO `countries_icons` VALUES ('YE', 'Yemen');
INSERT INTO `countries_icons` VALUES ('YT', 'Mayotte');
INSERT INTO `countries_icons` VALUES ('ZA', 'South Africa');
INSERT INTO `countries_icons` VALUES ('ZM', 'Zambia');
INSERT INTO `countries_icons` VALUES ('ZW', 'Zimbabwe');

-- ----------------------------
-- Table structure for `polaroids`
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of polaroids
-- ----------------------------
INSERT INTO `polaroids` VALUES ('10', '35.77902073064695|-5.798609428527811', '35.779020730647', '-5.7986094285278', 'velhinho com o cão', 'velhote alert(&#34;hello&#34;);', '8ba491ccd6be4e2a9702162cb08ffa80.jpg', '6', 'MA', '2015-04-18 07:56:54', '2015-05-03 18:01:04', '2');
INSERT INTO `polaroids` VALUES ('11', '42.926450121121256|17.71203498437501', '42.926450121121', '17.712034984375', 'Nikola Tesla', 'Electricity Genius Man', 'ca2177cfb8ca4349a21ce388988810b5.jpeg', '1', 'BO', '2015-05-03 15:57:05', '2015-05-03 23:58:23', '2');
INSERT INTO `polaroids` VALUES ('12', '37.7749295|-122.41941550000001', '37.7749295', '-122.4194155', 'Calvin & Hobbes Flying', 'Look at Calvin flying inside a box with Hobbes watching those dinos...', 'ab2436565661b9f0de222c83804d71cb8ee13d90.png', '1', 'US', '2015-05-03 16:04:26', '2015-05-04 00:52:30', '2');
INSERT INTO `polaroids` VALUES ('13', '42.3600825|-71.05888010000001', '42.3600825', '-71.0588801', 'Calvin & Hobbes Studying', 'Studying at home with hobbes', '2e273f78ab854c76977d0ddd1664f0e7.jpg', '1', 'US', '2015-05-03 16:21:06', '2015-05-04 00:52:23', '2');

-- ----------------------------
-- Table structure for `routes`
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
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES ('1', 'California Trip', 'This is my California Awesome Trip last summer 2014', '2015-04-03 17:27:38', '2015-04-03 17:27:38', '1', '0');
INSERT INTO `routes` VALUES ('2', 'Os recantos de Lisboa', 'Rota de museus em Lisboa', '2015-04-03 17:28:15', '2015-04-03 17:28:15', '2', '0');

-- ----------------------------
-- Table structure for `route_has_polaroids`
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
-- Records of route_has_polaroids
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'bazinga', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'bazinga@gmail.com', 'bazinga cooper', 'US', 'bazinga@facebook', 'bazinga@twitter', 'bazinga@g+', '2015-04-03 17:21:26', '2015-05-03 16:10:56', 'Y', 'I\'m Cool dolor sit amet, consectetur adipisicing elit. Nihil perferendis distinctio itaque aut necessitatibus eaque quos minus eum, esse dolorem non, ab pariatur ipsum quis, ipsa aliquid nobis enim voluptate cumque sunt dignissimos.');
INSERT INTO `users` VALUES ('2', 'nerd', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'jricvalerio@gmail.com', 'nerd sheldon', 'US', 'nerd@facebook', 'nerd@twitter', 'nerd@google+', '2015-04-03 17:21:52', '2015-05-03 15:35:19', 'Y', 'I am an Human Being!');
INSERT INTO `users` VALUES ('3', 'carlitos123', '$2y$13$FaGXpHrDZpr3y3VGq4udlu0u0cFR413404h9.OIQsCEejkLhWhsu6', 'carlitos@gmail.com', 'Carlos Fonseca Pereira da Silva', 'AU', null, null, null, null, '2015-05-03 16:09:56', 'Y', null);
INSERT INTO `users` VALUES ('5', 'maegalinha', '$2a$13$qX9kl.kBedbotkVerxp1nuk/gZI6qHTGZh2EaBpXaS9qQDcx.hUga', 'silviavalerio@gmail.com', 'Silvia Valério', 'PT', '', '', '', null, '2015-05-03 10:10:10', 'Y', 'Hi =)');

-- ----------------------------
-- Table structure for `user_is_following`
-- ----------------------------
DROP TABLE IF EXISTS `user_is_following`;
CREATE TABLE `user_is_following` (
  `id_user_who_follows` int(10) unsigned NOT NULL,
  `id_user_who_is_followed` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user_who_follows`,`id_user_who_is_followed`),
  KEY `id_user_who_follows` (`id_user_who_follows`),
  KEY `id_user_who_is_followed` (`id_user_who_is_followed`),
  CONSTRAINT `id_user_who_follows` FOREIGN KEY (`id_user_who_follows`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_user_who_is_followed` FOREIGN KEY (`id_user_who_is_followed`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_is_following
-- ----------------------------
INSERT INTO `user_is_following` VALUES ('1', '2');
INSERT INTO `user_is_following` VALUES ('2', '1');
INSERT INTO `user_is_following` VALUES ('2', '3');

-- ----------------------------
-- Table structure for `user_likes_polaroid`
-- ----------------------------
DROP TABLE IF EXISTS `user_likes_polaroid`;
CREATE TABLE `user_likes_polaroid` (
  `id_user` int(10) unsigned NOT NULL,
  `id_polaroid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user`,`id_polaroid`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_polaroid` (`id_polaroid`),
  CONSTRAINT `id_polaroid_like_fk` FOREIGN KEY (`id_polaroid`) REFERENCES `polaroids` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_user_like_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_likes_polaroid
-- ----------------------------
INSERT INTO `user_likes_polaroid` VALUES ('2', '10');
INSERT INTO `user_likes_polaroid` VALUES ('2', '11');
INSERT INTO `user_likes_polaroid` VALUES ('2', '12');
INSERT INTO `user_likes_polaroid` VALUES ('2', '13');

-- ----------------------------
-- Table structure for `user_likes_route`
-- ----------------------------
DROP TABLE IF EXISTS `user_likes_route`;
CREATE TABLE `user_likes_route` (
  `id_user` int(11) unsigned NOT NULL,
  `id_route` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user`,`id_route`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_user_3` (`id_user`),
  KEY `id_user_4` (`id_user`),
  KEY `id_route` (`id_route`),
  CONSTRAINT `fk_id_route_like_fk` FOREIGN KEY (`id_route`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_user_like_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_likes_route
-- ----------------------------
INSERT INTO `user_likes_route` VALUES ('2', '1');
