/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ci_sipropos

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-25 15:48:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('3o0lq5v719jpddldfl2aghdddk7nj3bs', '::1', '1537784892', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738343839323B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('67ddqemv5hjjt6e53mjka88rhec0n057', '::1', '1537785712', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738353638373B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('6m6odarh3tldqfvg8litfd29njoiv9da', '::1', '1537846803', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373834363538363B636170746368617C693A2D343B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32352031303A33313A3232223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('8af7upf4huuodbrhkrrbco7pfjfjd3st', '::1', '1537784008', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738343030383B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('9g5784f2e65mt1c95l29udk7p9bdah9j', '::1', '1537785680', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738353439303B636170746368617C693A35363B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34343A3538223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('g5eje2sk7p63hkkn0uri1qt1aodkuobd', '::1', '1537785490', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738353439303B636170746368617C693A35363B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34343A3538223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('gtq6n8u9gdsjur6d44te37k3s1k196od', '::1', '1537783322', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738333332323B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('h0jq77mtu2h7ngi5f2pf9m54ahd3p3q8', '::1', '1537846465', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373834363231303B636170746368617C693A2D343B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32352031303A33313A3232223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('jrdlsm6olvl8dpuglu5s8kuc5c51r6nl', '::1', '1537783635', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738333633353B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('lhkh4e66vaov1ps89q07jf8bapcq6tvl', '::1', '1537785140', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738353134303B636170746368617C693A35363B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34343A3538223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('oq5eclqmpls9gcl9ulajbn2dec4l7tv6', '::1', '1537784363', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738343336333B636170746368617C693A35363B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34343A3538223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('s6bl6d08a1u5cpjau088q8akn5ttqg16', '::1', '1537784062', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738343036323B636170746368617C693A35363B757365725F69647C733A313A2231223B757365725F6E616D657C733A353A2261646D696E223B757365725F66756C6C6E616D657C733A31353A2256455241204649524D414E53594148223B757365725F656D61696C7C733A32343A22766572616669726D616E7379616840676D61696C2E636F6D223B757365725F726F6C657C733A323A222D31223B696E7374616E73697C733A383A224B454D454E444147223B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34343A3538223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342031363A34313A3435223B757365725F646174655F637265617465647C733A31393A22323031362D31302D30342031393A35393A3137223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('svk2tusdd8o3u78lcvh1b3kiemtc4usq', '::1', '1537785687', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738353638373B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);
INSERT INTO `ci_sessions` VALUES ('t82ho9k0ekh9sc8v03kfcp4paefnv1s3', '::1', '1537785203', 0x5F5F63695F6C6173745F726567656E65726174657C693A313533373738353230333B636170746368617C693A32373B757365725F69647C733A323A223132223B757365725F6E616D657C733A343A2275736572223B757365725F66756C6C6E616D657C733A31383A225646204669726D616E737961682055736572223B757365725F656D61696C7C733A32343A22766572616669726D616E73796168407961686F6F2E636F6D223B757365725F726F6C657C733A313A2232223B696E7374616E73697C4E3B757365725F6C6173745F6C6F67696E7C733A31393A22323031382D30392D32342031363A34313A3531223B757365725F6C6173745F61637469766974797C733A31393A22323031382D30392D32342030373A30353A3035223B757365725F646174655F637265617465647C733A31393A22323031372D30312D32352030383A30393A3539223B76616C6964617465647C623A313B);

-- ----------------------------
-- Table structure for `info`
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(254) NOT NULL,
  `isi` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES ('1', 'ab', 'abah', '2018-09-15 15:20:47');
INSERT INTO `info` VALUES ('2', 'c', 'ceker ayam', '2018-09-15 15:25:32');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `cooperation_area` varchar(255) DEFAULT NULL,
  `relevance` int(11) DEFAULT NULL,
  `ra_name` varchar(255) DEFAULT NULL,
  `ra_title` varchar(255) DEFAULT NULL,
  `ra_address` varchar(255) DEFAULT '',
  `ra_phone` varchar(30) DEFAULT NULL,
  `ra_fax` varchar(30) DEFAULT NULL,
  `ra_email` varchar(255) DEFAULT NULL,
  `cp_name` varchar(255) DEFAULT NULL,
  `cp_title` varchar(255) DEFAULT NULL,
  `cp_address` varchar(255) DEFAULT '',
  `cp_phone` varchar(30) DEFAULT '',
  `cp_fax` varchar(30) DEFAULT NULL,
  `cp_email` varchar(255) DEFAULT NULL,
  `duration` int(1) DEFAULT NULL,
  `overall_objective` text,
  `project_purpose` text,
  `target_group` text,
  `contribution` text,
  `ab_jumlah_training` int(1) DEFAULT NULL,
  `ab_jumlah_workshop` int(1) DEFAULT NULL,
  `ab_jumlah_study_visit` int(1) DEFAULT NULL,
  `ab_jumlah_seminar` int(1) DEFAULT NULL,
  `ab_jumlah_meeting` int(1) DEFAULT NULL,
  `ab_jumlah_media` int(1) DEFAULT NULL,
  `ab_jumlah_other_activities` int(1) DEFAULT NULL,
  `file_tor` varchar(255) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `experience` text,
  `publication` text,
  `other_qualification` text,
  `english_skill` int(11) DEFAULT NULL,
  `summary` text,
  `status` int(2) DEFAULT '0',
  `user_created` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `user_aproved` int(11) DEFAULT NULL,
  `date_aproved` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_user_id` (`user_created`),
  CONSTRAINT `project_user_id` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------

-- ----------------------------
-- Table structure for `project_comment`
-- ----------------------------
DROP TABLE IF EXISTS `project_comment`;
CREATE TABLE `project_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_comment_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `project_hr_coordinator`
-- ----------------------------
DROP TABLE IF EXISTS `project_hr_coordinator`;
CREATE TABLE `project_hr_coordinator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `major` text,
  `experience` text,
  `other_qualification` text,
  `english_skill` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_hr_coordinator_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_hr_coordinator
-- ----------------------------

-- ----------------------------
-- Table structure for `project_hr_trainer`
-- ----------------------------
DROP TABLE IF EXISTS `project_hr_trainer`;
CREATE TABLE `project_hr_trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `trainer` varchar(255) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `major` text,
  `experience` text,
  `publication` text,
  `other_qualification` text,
  `english_skill` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_hr_trainer_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_hr_trainer
-- ----------------------------

-- ----------------------------
-- Table structure for `project_media`
-- ----------------------------
DROP TABLE IF EXISTS `project_media`;
CREATE TABLE `project_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `promotional` varchar(255) DEFAULT NULL,
  `potential` varchar(255) DEFAULT NULL,
  `target_group` varchar(255) DEFAULT NULL,
  `ways_mean` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `budget` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_media_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_media
-- ----------------------------

-- ----------------------------
-- Table structure for `project_meeting`
-- ----------------------------
DROP TABLE IF EXISTS `project_meeting`;
CREATE TABLE `project_meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `countries` varchar(255) DEFAULT NULL,
  `participant_profile` varchar(255) DEFAULT NULL,
  `participant` int(11) DEFAULT NULL,
  `participant_total` int(11) DEFAULT NULL,
  `tools_material` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `budget` decimal(14,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_meeting_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_meeting
-- ----------------------------

-- ----------------------------
-- Table structure for `project_other_activities`
-- ----------------------------
DROP TABLE IF EXISTS `project_other_activities`;
CREATE TABLE `project_other_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_other_activities_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_other_activities
-- ----------------------------

-- ----------------------------
-- Table structure for `project_partner`
-- ----------------------------
DROP TABLE IF EXISTS `project_partner`;
CREATE TABLE `project_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`id`),
  KEY `project_partner_id` (`project_id`),
  CONSTRAINT `project_partner_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_partner
-- ----------------------------

-- ----------------------------
-- Table structure for `project_seminar`
-- ----------------------------
DROP TABLE IF EXISTS `project_seminar`;
CREATE TABLE `project_seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `speakers` int(11) DEFAULT NULL,
  `countries` varchar(255) DEFAULT NULL,
  `participant` int(11) DEFAULT NULL,
  `participant_total` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `budget` decimal(14,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_seminar_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_seminar
-- ----------------------------

-- ----------------------------
-- Table structure for `project_study_visit`
-- ----------------------------
DROP TABLE IF EXISTS `project_study_visit`;
CREATE TABLE `project_study_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `related_training` varchar(255) DEFAULT NULL,
  `contribution` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `personel` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `budget` decimal(14,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_study_visit_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_study_visit
-- ----------------------------

-- ----------------------------
-- Table structure for `project_training`
-- ----------------------------
DROP TABLE IF EXISTS `project_training`;
CREATE TABLE `project_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `countries` varchar(255) DEFAULT NULL,
  `participant` int(11) DEFAULT NULL,
  `participant_total` int(11) DEFAULT NULL,
  `trainer` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `budget` decimal(14,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_training_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_training
-- ----------------------------

-- ----------------------------
-- Table structure for `project_workshop`
-- ----------------------------
DROP TABLE IF EXISTS `project_workshop`;
CREATE TABLE `project_workshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `countries` varchar(255) DEFAULT NULL,
  `participant` int(11) DEFAULT NULL,
  `participant_total` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `ticket` int(11) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `budget` decimal(14,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_training_id` (`project_id`),
  CONSTRAINT `project_workshop_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_workshop
-- ----------------------------

-- ----------------------------
-- Table structure for `relevance`
-- ----------------------------
DROP TABLE IF EXISTS `relevance`;
CREATE TABLE `relevance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relevance` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of relevance
-- ----------------------------
INSERT INTO `relevance` VALUES ('1', 'Developing integrated Single Window Strategies');
INSERT INTO `relevance` VALUES ('2', 'Identifying and implementing necessary changes in laws and regulatory framework for improving the effectiveness of Single Window Systems');
INSERT INTO `relevance` VALUES ('3', 'Enhancing flexibility, scalability, safety and interoperability of Single Window Systems');
INSERT INTO `relevance` VALUES ('4', 'Promoting cross-border interconnectivity and interoperability of the national Single Window Systems');
INSERT INTO `relevance` VALUES ('5', 'Developing Special Economic Zones');
INSERT INTO `relevance` VALUES ('6', 'Simplifying trade procedures and documentation');
INSERT INTO `relevance` VALUES ('7', 'Conducting needs assessments to ensure the efficiency of customs procedures');
INSERT INTO `relevance` VALUES ('8', 'Streamlining customs law, regulations and procedures in line with the international standards to facilitate trade');
INSERT INTO `relevance` VALUES ('9', 'Enhancing supportive IT infrastructure for automation of customs and other border agency procedures');
INSERT INTO `relevance` VALUES ('10', 'Improving Customs Risk Management Systems');
INSERT INTO `relevance` VALUES ('11', 'Developing an effective risk management strategy for improving the Customs Risk');
INSERT INTO `relevance` VALUES ('12', 'Management performance and modernization efforts');
INSERT INTO `relevance` VALUES ('13', 'Maintaining adequate IT support for the electronic submission of pre-arrival/pre-departure information for risk assessment');
INSERT INTO `relevance` VALUES ('14', 'Using advanced techniques and tools for risk assessment');
INSERT INTO `relevance` VALUES ('15', 'Enhancing customs audit based controls');
INSERT INTO `relevance` VALUES ('16', 'Promoting authorized economic operators program to facilitate the cross border movement of goods treated by low-risk operators');
INSERT INTO `relevance` VALUES ('17', 'Implementing coordinated controls at border posts in consultation with other customs administrations');
INSERT INTO `relevance` VALUES ('18', 'Supporting the effective implementation of trade facilitation measures');
INSERT INTO `relevance` VALUES ('19', 'Developing a strategic planning framework for customs risk management');
INSERT INTO `relevance` VALUES ('20', 'Establishing well-functioning national trade facilitation bodies');
INSERT INTO `relevance` VALUES ('21', 'Encouraging national trade facilitation monitoring mechanisms');
INSERT INTO `relevance` VALUES ('22', 'Encouraging the governments to access to the relevant international conventions for standardizing the customs-related procedures');
INSERT INTO `relevance` VALUES ('23', 'Enhancing effective publication of trade rules and regulations  through establishing trade portals and websites');
INSERT INTO `relevance` VALUES ('24', 'Supporting customs modernization efforts through improving customs related infrastructure');
INSERT INTO `relevance` VALUES ('25', 'Encouraging Public-Private Partnerships for improving customs');
INSERT INTO `relevance` VALUES ('26', 'Harmonizing national product standards  with international standards');
INSERT INTO `relevance` VALUES ('27', 'Developing/Strengthening National ?Quality Infrastructure? in order to facilitate access to the international markets');
INSERT INTO `relevance` VALUES ('28', 'Improving the usage of risk assessment to facilitate transit trade');
INSERT INTO `relevance` VALUES ('29', 'Encouraging pre-arrival processing for transit facilitation');
INSERT INTO `relevance` VALUES ('30', 'Strengthening inter-agency cooperation in transit trade');
INSERT INTO `relevance` VALUES ('31', 'Enhancing information exchange among the border agencies');
INSERT INTO `relevance` VALUES ('32', 'Promoting mutual recognition agreements for border controls and authorized economic operators');
INSERT INTO `relevance` VALUES ('33', 'Promoting cross-border interconnectivity and interoperability of the national Single Window Systems');
INSERT INTO `relevance` VALUES ('34', 'Conducting experience sharing programs in the field of trade facilitation');
INSERT INTO `relevance` VALUES ('35', 'Improving the infrastructure of land border crossing points to enhance transport connectivity');
INSERT INTO `relevance` VALUES ('36', 'Supporting the efforts aiming to acquire Palestinian?s right to establish their own customs warehouses and clearance centers');
INSERT INTO `relevance` VALUES ('37', 'Enhancing customs-traders partnership to facilitate trade');
INSERT INTO `relevance` VALUES ('38', 'Increasing public availability of customs information in the OIC member states');
INSERT INTO `relevance` VALUES ('39', 'Facilitating transit trade in the OIC Member Countries with an emphasis on WTO TFA');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`role_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('-1', 'Admin', '2016-09-17 12:27:46');
INSERT INTO `roles` VALUES ('1', 'Aproval', '2016-09-23 21:09:40');
INSERT INTO `roles` VALUES ('2', 'User', '2016-09-24 07:13:13');
INSERT INTO `roles` VALUES ('3', 'Viewer', '2016-09-24 07:13:13');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) DEFAULT NULL,
  `user_pass` text,
  `user_fullname` varchar(200) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `id_role` int(2) DEFAULT '4',
  `is_aktif` int(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`) USING BTREE,
  KEY `id_role` (`id_role`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$P$BOWJihRYE9ajuBwRgho.w5nZbEhcbz0', 'VERA FIRMANSYAH', 'verafirmansyah@gmail.com', 'KEMENDAG', '-1', '1', '2018-09-25 10:31:22', '2018-09-24 16:41:45', '::1', '2016-10-04 19:59:17');
INSERT INTO `users` VALUES ('12', 'user', '$P$BPnUqBnoTPhgYUXdvHRfqCXS/NBwy5.', 'VF Firmansyah User', 'verafirmansyah@yahoo.com', null, '2', '1', '2018-09-24 16:41:51', '2018-09-24 16:44:52', '::1', '2017-01-25 08:09:59');
INSERT INTO `users` VALUES ('15', 'aproval', '$P$B1DIN6BZ6MgEXlhvrHr6eUSz40CmJ70', 'A DAN DC', 'ad@yahoo.com', null, '1', '1', '2018-09-15 06:16:36', '2018-09-15 06:23:56', '::1', '2017-01-28 06:22:55');
INSERT INTO `users` VALUES ('17', 'admin2', '$P$B0.6p.O9LyTjzxUed.3zcpfTpG54f5/', 'ADMIN DUA', 'admin2@admin.com', null, '-1', '1', '2018-09-24 07:04:52', null, '::1', '2018-09-15 14:08:14');
INSERT INTO `users` VALUES ('19', 'user2', '$P$BaNhOS/GbYp5XZursvWuCh.gXB2tas/', 'USER DUA', 'user2@user.com', null, '2', '1', '2018-09-24 07:05:13', null, '::1', '2018-09-17 16:50:44');
INSERT INTO `users` VALUES ('20', 'admin1', '$P$BYvGAnofaifTS5pkXNHjo61Pd0OQtJ.', 'VERA FIRMANSYAH', 'admin1@gmail.com', 'kemendag', '2', '0', null, null, '::1', '2018-09-23 10:35:26');
INSERT INTO `users` VALUES ('23', 'admin3', '$P$BioT0QAaBAuT1yK393Ug61GeNP/keO/', 'VERA FIRMANSYAH', 'admin1@admin.com', 'KEMENDAG', '2', '0', null, null, '::1', '2018-09-23 10:44:39');
INSERT INTO `users` VALUES ('24', 'verafirmansyah', '$P$Bw0uyKT7MraCUf0VIsgi0Ub86/c1jM.', 'VERA FIRMANSYAH', 'verafirmansyah@live.com', 'KEMENDAG', '2', '0', '2018-09-23 13:31:11', '2018-09-23 13:31:27', '::1', '2018-09-23 11:51:36');
INSERT INTO `users` VALUES ('25', 'verafirmansyah1', '$P$BoDlBhmOanqM4DQl5DRoKBqiyNykyK/', 'VERA FIRMANSYAH', 'verafirmansyah@email.com', 'KEMENDAGRI', '2', '0', null, null, '::1', '2018-09-23 11:53:50');
