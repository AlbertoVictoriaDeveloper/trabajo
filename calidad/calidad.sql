/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : calidad

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-04 18:58:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agente
-- ----------------------------
DROP TABLE IF EXISTS `agente`;
CREATE TABLE `agente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_agente` varchar(45) DEFAULT NULL,
  `numero_emple` varchar(45) DEFAULT NULL,
  `numero_agente` varchar(45) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_agente_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_agente_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agente
-- ----------------------------
INSERT INTO `agente` VALUES ('1', 'Arturo Hazel', '001', '0001', '1');

-- ----------------------------
-- Table structure for asignacion_campana
-- ----------------------------
DROP TABLE IF EXISTS `asignacion_campana`;
CREATE TABLE `asignacion_campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contador` varchar(45) DEFAULT NULL,
  `agente_id` int(11) NOT NULL,
  `asignacion_motor_id` int(11) NOT NULL,
  `asignacion_motor_cat_camapanas_id` int(11) NOT NULL,
  `asignacion_motor_motores_marcacion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`asignacion_motor_id`,`asignacion_motor_cat_camapanas_id`,`asignacion_motor_motores_marcacion_id`),
  KEY `fk_asignacion_campana_agente_idx` (`agente_id`),
  KEY `fk_asignacion_campana_asignacion_motor1_idx` (`asignacion_motor_id`,`asignacion_motor_cat_camapanas_id`,`asignacion_motor_motores_marcacion_id`),
  CONSTRAINT `fk_asignacion_campana_agente` FOREIGN KEY (`agente_id`) REFERENCES `agente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_campana_asignacion_motor1` FOREIGN KEY (`asignacion_motor_id`, `asignacion_motor_cat_camapanas_id`, `asignacion_motor_motores_marcacion_id`) REFERENCES `asignacion_motor` (`id`, `cat_camapanas_id`, `motores_marcacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asignacion_campana
-- ----------------------------

-- ----------------------------
-- Table structure for asignacion_motor
-- ----------------------------
DROP TABLE IF EXISTS `asignacion_motor`;
CREATE TABLE `asignacion_motor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_camapanas_id` int(11) NOT NULL,
  `motores_marcacion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cat_camapanas_id`,`motores_marcacion_id`),
  KEY `fk_asignacion_campana_cat_camapanas1_idx` (`cat_camapanas_id`),
  KEY `fk_asignacion_campana_motores_marcacion1_idx` (`motores_marcacion_id`),
  CONSTRAINT `fk_asignacion_campana_cat_camapanas1` FOREIGN KEY (`cat_camapanas_id`) REFERENCES `cat_camapanas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_campana_motores_marcacion1` FOREIGN KEY (`motores_marcacion_id`) REFERENCES `cat_motores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asignacion_motor
-- ----------------------------
INSERT INTO `asignacion_motor` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for asignacion_personal
-- ----------------------------
DROP TABLE IF EXISTS `asignacion_personal`;
CREATE TABLE `asignacion_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agente` varchar(250) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_audio` varchar(250) DEFAULT NULL,
  `estatus_llamada` varchar(250) DEFAULT NULL,
  `id_monitorista` varchar(252) DEFAULT NULL,
  `estatus_regla` varchar(250) DEFAULT NULL,
  `campana` varchar(250) DEFAULT NULL,
  `motor_marcacion` varchar(500) DEFAULT NULL,
  `user` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asignacion_personal
-- ----------------------------
INSERT INTO `asignacion_personal` VALUES ('1', 'tmk32', '0000-00-00', null, '491', 'SE AGENDA LLAMADA MANUAL', '1', '1', 'VECI', 'VECI', '001');
INSERT INTO `asignacion_personal` VALUES ('4', null, null, null, '740', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('8', null, null, null, '601', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('11', null, null, null, '605', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('12', null, null, null, '604', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('15', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('16', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('17', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('18', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('19', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('20', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('21', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('22', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('23', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('24', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('25', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('26', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('27', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('28', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('29', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('30', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('31', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('32', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('33', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('34', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('35', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('36', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('37', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('38', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('39', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('40', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('41', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('42', null, null, null, '', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('43', null, null, null, '626', null, null, '1', null, null, '001');
INSERT INTO `asignacion_personal` VALUES ('44', null, null, null, '', null, null, '1', null, null, '001');

-- ----------------------------
-- Table structure for asignacion_random
-- ----------------------------
DROP TABLE IF EXISTS `asignacion_random`;
CREATE TABLE `asignacion_random` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_agente` varchar(45) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estatus_llamada` varchar(250) DEFAULT NULL,
  `id_monitorista` varchar(250) DEFAULT NULL,
  `estatus_regla` varchar(250) DEFAULT NULL,
  `campana` varchar(500) DEFAULT NULL,
  `motor_marcacion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asignacion_random
-- ----------------------------
INSERT INTO `asignacion_random` VALUES ('1', 'Agente895', '2017-08-09', '2017-08-07', 'NO CONTESTA', '001', '1', 'VECI', 'VECI');

-- ----------------------------
-- Table structure for audio
-- ----------------------------
DROP TABLE IF EXISTS `audio`;
CREATE TABLE `audio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_campana` varchar(45) DEFAULT NULL,
  `fecha_gestion` datetime DEFAULT NULL,
  `agente` varchar(45) DEFAULT NULL,
  `clave_audio` varchar(45) DEFAULT NULL,
  `numero_marcado` varchar(45) DEFAULT NULL,
  `status_registro` varchar(45) DEFAULT NULL,
  `status_audio` varchar(45) DEFAULT NULL,
  `ruta_archivo` varchar(500) DEFAULT NULL,
  `fecha_res` datetime DEFAULT NULL,
  `calificacion` varchar(45) DEFAULT NULL,
  `promedio` varchar(45) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `id_moni` varchar(45) DEFAULT NULL,
  `nombre_moni` varchar(45) DEFAULT NULL,
  `duracion_llamada` varchar(45) DEFAULT NULL,
  `nombre_motor` varchar(45) DEFAULT NULL,
  `user_moni` varchar(45) DEFAULT NULL,
  `duracion_total` varchar(45) DEFAULT NULL,
  `segundosTotal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=658 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of audio
-- ----------------------------
INSERT INTO `audio` VALUES ('598', 'VECI', '2017-09-07 09:29:48', 'Agente895', 'VECI0458341132240', '0458341132240', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907092948_Agente895_VECI0458341132240_1833_0458341132240_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '217.97319727891', '867');
INSERT INTO `audio` VALUES ('599', 'VECI', '2017-09-07 09:38:56', 'tmk32', 'VECI0453312700911', '0453312700911', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907093856_tmk32_VECI0453312700911_1965_0453312700911_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '0.3221768707483', '8');
INSERT INTO `audio` VALUES ('600', 'VECI', '2017-09-07 09:48:42', 'Agente895', 'VECI0457441449192', '0457441449192', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907094842_Agente895_VECI0457441449192_1833_0457441449192_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '5');
INSERT INTO `audio` VALUES ('601', 'VECI', '2017-09-07 09:53:21', 'tmk32', 'VECI0459211399427', '0459211399427', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907095321_tmk32_VECI0459211399427_1965_0459211399427_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '3', '6');
INSERT INTO `audio` VALUES ('602', 'VECI', '2017-09-07 10:03:01', 'tmk32', 'VECI0456643389450', '0456643389450', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907100301_tmk32_VECI0456643389450_1965_0456643389450_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '5', '9');
INSERT INTO `audio` VALUES ('603', 'VECI', '2017-09-07 10:05:34', 'tmk32', 'VECI0454531281392', '0454531281392', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907100534_tmk32_VECI0454531281392_1965_0454531281392_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '5', '10');
INSERT INTO `audio` VALUES ('604', 'VECI', '2017-09-07 10:06:38', 'tmk32', 'VECI0445519965800', '0445519965800', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907100638_tmk32_VECI0445519965800_1965_0445519965800_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '13', '26');
INSERT INTO `audio` VALUES ('605', 'VECI', '2017-09-07 10:07:51', 'tmk32', 'VECI0452461232460', '0452461232460', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907100751_tmk32_VECI0452461232460_1965_0452461232460_NO CONTESTA_1_0.mp3', '2017-10-04 18:04:43', '', null, null, '', '', null, null, null, '', '', '28');
INSERT INTO `audio` VALUES ('606', 'VECI', '2017-09-07 10:08:59', 'tmk32', 'VECI0454491424947', '0454491424947', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907100859_tmk32_VECI0454491424947_1965_0454491424947_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '14', '29');
INSERT INTO `audio` VALUES ('607', 'VECI', '2017-09-07 10:10:05', 'tmk32', 'VECI0458311616629', '0458311616629', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907101005_tmk32_VECI0458311616629_1965_0458311616629_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '12', '25');
INSERT INTO `audio` VALUES ('608', 'VECI', '2017-09-07 10:13:22', 'tmk32', 'VECI0445566749558', '0445566749558', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907101322_tmk32_VECI0445566749558_1965_0445566749558_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '62.241088435375', '186');
INSERT INTO `audio` VALUES ('609', 'VECI', '2017-09-07 10:22:47', 'tmk32', 'VECI0452781124502', '0452781124502', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907102247_tmk32_VECI0452781124502_1965_0452781124502_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '3.4568707482993', '65');
INSERT INTO `audio` VALUES ('610', 'VECI', '2017-09-07 10:25:09', 'tmk32', 'VECI0452299850046', '0452299850046', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907102509_tmk32_VECI0452299850046_1965_0452299850046_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4', '9');
INSERT INTO `audio` VALUES ('611', 'VECI', '2017-09-07 10:27:46', 'tmk32', 'VECI0459933611937', '0459933611937', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907102746_tmk32_VECI0459933611937_1965_0459933611937_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '130', '264');
INSERT INTO `audio` VALUES ('612', 'VECI', '2017-09-07 10:31:29', 'Agente895', 'VECI0455563570702', '0455563570702', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907103129_Agente895_VECI0455563570702_1833_0455563570702_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '5', '10');
INSERT INTO `audio` VALUES ('613', 'VECI', '2017-09-07 10:32:43', 'Agente895', 'VECI0445563570702', '0445563570702', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907103243_Agente895_VECI0445563570702_1833_0445563570702_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4', '9');
INSERT INTO `audio` VALUES ('614', 'VECI', '2017-09-07 10:34:44', 'tmk32', 'VECI0456562098174', '0456562098174', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907103444_tmk32_VECI0456562098174_1965_0456562098174_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '48', '96');
INSERT INTO `audio` VALUES ('615', 'VECI', '2017-09-07 10:37:29', 'Agente895', 'VECI0452481827817', '0452481827817', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907103729_Agente895_VECI0452481827817_1833_0452481827817_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '3', '6');
INSERT INTO `audio` VALUES ('616', 'VECI', '2017-09-07 10:42:51', 'Agente895', 'VECI0453311029810', '0453311029810', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907104251_Agente895_VECI0453311029810_1833_0453311029810_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '33', '67');
INSERT INTO `audio` VALUES ('617', 'VECI', '2017-09-07 10:44:09', 'tmk32', 'VECI0452491728193', '0452491728193', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907104409_tmk32_VECI0452491728193_1965_0452491728193_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '138', '279');
INSERT INTO `audio` VALUES ('618', 'VECI', '2017-09-07 11:03:17', 'tmk32', 'VECI0456563143509', '0456563143509', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907110317_tmk32_VECI0456563143509_1965_0456563143509_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '10', '21');
INSERT INTO `audio` VALUES ('619', 'VECI', '2017-09-07 11:05:29', 'tmk32', 'VECI0458661410452', '0458661410452', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907110529_tmk32_VECI0458661410452_1965_0458661410452_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4.0402721088435', '51');
INSERT INTO `audio` VALUES ('620', 'VECI', '2017-09-07 11:07:08', 'tmk32', 'VECI0445518001400', '0445518001400', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907110708_tmk32_VECI0445518001400_1965_0445518001400_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '26', '52');
INSERT INTO `audio` VALUES ('621', 'VECI', '2017-09-07 11:14:40', 'tmk32', 'VECI0459841205073', '0459841205073', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907111440_tmk32_VECI0459841205073_1965_0459841205073_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '5', '10');
INSERT INTO `audio` VALUES ('622', 'VECI', '2017-09-07 11:19:32', 'tmk32', 'VECI0453331509143', '0453331509143', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907111932_tmk32_VECI0453331509143_1965_0453331509143_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '11.824761904762', '105');
INSERT INTO `audio` VALUES ('623', 'VECI', '2017-09-07 11:22:45', 'tmk32', 'VECI0454441400434', '0454441400434', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907112245_tmk32_VECI0454441400434_1965_0454441400434_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '16', '32');
INSERT INTO `audio` VALUES ('624', 'VECI', '2017-09-07 11:27:17', 'tmk32', 'VECI0456383802633', '0456383802633', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907112717_tmk32_VECI0456383802633_1965_0456383802633_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4', '8');
INSERT INTO `audio` VALUES ('625', 'VECI', '2017-09-07 11:42:51', 'tmk32', 'VECI0445549108814', '0445549108814', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907114251_tmk32_VECI0445549108814_1965_0445549108814_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '10', '21');
INSERT INTO `audio` VALUES ('626', 'VECI', '2017-09-07 11:46:58', 'tmk32', 'VECI0459982234610', '0459982234610', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907114658_tmk32_VECI0459982234610_1965_0459982234610_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4.4059863945578', '261');
INSERT INTO `audio` VALUES ('627', 'VECI', '2017-09-07 11:52:10', 'Agente895', 'VECI0459211399427', '0459211399427', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907115210_Agente895_VECI0459211399427_1833_0459211399427_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '140.27044897959', '504');
INSERT INTO `audio` VALUES ('628', 'VECI', '2017-09-07 11:52:49', 'tmk32', 'VECI0445549108814', '0445549108814', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907115249_tmk32_VECI0445549108814_1965_0445549108814_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '119.09692517007', '423');
INSERT INTO `audio` VALUES ('629', 'VECI', '2017-09-07 12:03:08', 'tmk32', 'VECI0445518090706', '0445518090706', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907120308_tmk32_VECI0445518090706_1965_0445518090706_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '1', '3');
INSERT INTO `audio` VALUES ('630', 'VECI', '2017-09-07 12:04:15', 'tmk32', 'VECI0453312700911', '0453312700911', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907120415_tmk32_VECI0453312700911_1965_0453312700911_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '4');
INSERT INTO `audio` VALUES ('631', 'VECI', '2017-09-07 12:11:58', 'tmk32', 'VECI0452741035013', '0452741035013', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907121158_tmk32_VECI0452741035013_1965_0452741035013_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '12', '24');
INSERT INTO `audio` VALUES ('632', 'VECI', '2017-09-07 12:12:50', 'tmk32', 'VECI0454431042554', '0454431042554', 'SE AGENDA LLAMADA MANUAL', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907121250_tmk32_VECI0454431042554_1965_0454431042554_SE AGENDA LLAMADA MANUAL_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '33.713959183674', '96');
INSERT INTO `audio` VALUES ('633', 'VECI', '2017-09-07 12:18:44', 'tmk32', 'VECI0452961008679', '0452961008679', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907121844_tmk32_VECI0452961008679_1965_0452961008679_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '9', '18');
INSERT INTO `audio` VALUES ('634', 'VECI', '2017-09-07 12:20:39', 'tmk32', 'VECI0452221132544', '0452221132544', 'SOLICITUD DE INFORMACION POR CORREO', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907122039_tmk32_VECI0452221132544_1965_0452221132544_SOLICITUD DE INFORMACION POR CORREO_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '5.3899319727891', '474');
INSERT INTO `audio` VALUES ('635', 'VECI', '2017-09-07 12:31:39', 'Agente895', 'VECI0454432315092', '0454432315092', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907123139_Agente895_VECI0454432315092_1833_0454432315092_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '19.60925170068', '104');
INSERT INTO `audio` VALUES ('636', 'VECI', '2017-09-07 12:49:33', 'Agente895', 'VECI0457227685304', '0457227685304', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907124933_Agente895_VECI0457227685304_1833_0457227685304_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '235.0149659864', '842');
INSERT INTO `audio` VALUES ('637', 'VECI', '2017-09-07 13:11:10', 'Agente895', 'VECI0457441449192', '0457441449192', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907131110_Agente895_VECI0457441449192_1833_0457441449192_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '3', '6');
INSERT INTO `audio` VALUES ('638', 'VECI', '2017-09-07 13:13:07', 'Agente895', 'VECI0454641572561', '0454641572561', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907131307_Agente895_VECI0454641572561_1833_0454641572561_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2.3684353741497', '39');
INSERT INTO `audio` VALUES ('639', 'VECI', '2017-09-07 15:19:13', 'tmk32', 'VECI0452281402117', '0452281402117', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907151913_tmk32_VECI0452281402117_1965_0452281402117_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '0.060952380952381', '3');
INSERT INTO `audio` VALUES ('640', 'VECI', '2017-09-07 15:20:06', 'Agente895', 'VECI0457227685304', '0457227685304', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907152006_Agente895_VECI0457227685304_1833_0457227685304_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4', '7');
INSERT INTO `audio` VALUES ('641', 'VECI', '2017-09-07 15:20:19', 'tmk32', 'VECI0452281402117', '0452281402117', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907152019_tmk32_VECI0452281402117_1965_0452281402117_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '1', '3');
INSERT INTO `audio` VALUES ('642', 'VECI', '2017-09-07 15:33:40', 'tmk32', 'VECI0454531384635', '0454531384635', 'COTIZACION ENVIADA A VECI', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907153340_tmk32_VECI0454531384635_1965_0454531384635_COTIZACION ENVIADA A VECI_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '34.659074829932', '191');
INSERT INTO `audio` VALUES ('643', 'VECI', '2017-09-07 15:49:56', 'Agente895', 'VECI0456641950704', '0456641950704', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907154956_Agente895_VECI0456641950704_1833_0456641950704_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '87', '174');
INSERT INTO `audio` VALUES ('644', 'VECI', '2017-09-07 16:03:32', 'Agente895', 'VECI0452281402117', '0452281402117', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907160332_Agente895_VECI0452281402117_1833_0452281402117_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '5');
INSERT INTO `audio` VALUES ('645', 'VECI', '2017-09-07 16:05:03', 'Agente895', 'VECI0458115775980', '0458115775980', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907160503_Agente895_VECI0458115775980_1833_0458115775980_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '16', '33');
INSERT INTO `audio` VALUES ('646', 'VECI', '2017-09-07 16:06:45', 'Agente895', 'VECI0454691034848', '0454691034848', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907160645_Agente895_VECI0454691034848_1833_0454691034848_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '1', '3');
INSERT INTO `audio` VALUES ('647', 'VECI', '2017-09-07 16:14:34', 'Agente895', 'VECI0457227685304', '0457227685304', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907161434_Agente895_VECI0457227685304_1833_0457227685304_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '3');
INSERT INTO `audio` VALUES ('648', 'VECI', '2017-09-07 16:17:17', 'Agente895', 'VECI0456383802633', '0456383802633', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907161717_Agente895_VECI0456383802633_1833_0456383802633_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '4');
INSERT INTO `audio` VALUES ('649', 'VECI', '2017-09-07 16:20:21', 'Agente895', 'VECI0454441400434', '0454441400434', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907162021_Agente895_VECI0454441400434_1833_0454441400434_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '1', '3');
INSERT INTO `audio` VALUES ('650', 'VECI', '2017-09-07 16:22:37', 'Agente895', 'VECI0459841205073', '0459841205073', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907162237_Agente895_VECI0459841205073_1833_0459841205073_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '327', '663');
INSERT INTO `audio` VALUES ('651', 'VECI', '2017-09-07 16:29:04', 'tmk32', 'VECI0452281402117', '0452281402117', 'NO CONTESTA', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907162904_tmk32_VECI0452281402117_1965_0452281402117_NO CONTESTA_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '4');
INSERT INTO `audio` VALUES ('652', 'VECI', '2017-09-07 17:38:33', 'tmk32', 'VECI[52]-[55]-[38683000]-[]', '[52]-[55]-[38683000]-[]', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907173833_tmk32_VECI[52]-[55]-[38683000]-[]_1965_[52]-[55]-[38683000]-[]_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '3');
INSERT INTO `audio` VALUES ('653', 'VECI', '2017-09-07 17:46:13', 'Agente895', 'VECI0456641950704', '0456641950704', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907174613_Agente895_VECI0456641950704_1833_0456641950704_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '29', '58');
INSERT INTO `audio` VALUES ('654', 'VECI', '2017-09-07 18:02:07', 'prueba', '2', '1849', '53259000', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907180207_prueba_2_VECI53259000_1849_53259000_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '38', '79');
INSERT INTO `audio` VALUES ('655', 'VECI', '2017-09-07 18:17:47', 'Agente895', 'VECI0454641572561', '0454641572561', 'SIN TIPIFICACION', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907181747_Agente895_VECI0454641572561_1833_0454641572561_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '4.5278911564626', '201');
INSERT INTO `audio` VALUES ('656', 'VECI', '2017-09-07 18:32:00', 'prueba', '2', '1849', '[52]-[55]-[53688665]-[]', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907183200_prueba_2_VECI[52]-[55]-[53688665]-[]_1849_[52]-[55]-[53688665]-[]_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '3');
INSERT INTO `audio` VALUES ('657', 'VECI', '2017-09-07 18:33:12', 'prueba', '2', '1849', '[52]-[55]-[51411390]-[]', '1', '//10.1.1.245/audiosrespaldo/20170907/VECI/VECI_20170907183312_prueba_2_VECI[52]-[55]-[51411390]-[]_1849_[52]-[55]-[51411390]-[]_CLIENTE OCUPADO_1_0.mp3', null, null, null, null, null, null, null, null, null, null, '2', '4');

-- ----------------------------
-- Table structure for catvariables
-- ----------------------------
DROP TABLE IF EXISTS `catvariables`;
CREATE TABLE `catvariables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable` varchar(500) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `rubro` varchar(250) DEFAULT NULL,
  `tipo_variable` varchar(250) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `tipo_gestion` varchar(11) DEFAULT NULL,
  `asignacion_motor_id` int(11) NOT NULL,
  `asignacion_motor_cat_camapanas_id` int(11) NOT NULL,
  `asignacion_motor_motores_marcacion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`asignacion_motor_id`,`asignacion_motor_cat_camapanas_id`,`asignacion_motor_motores_marcacion_id`),
  KEY `fk_catvariables_asignacion_motor1_idx` (`asignacion_motor_id`,`asignacion_motor_cat_camapanas_id`,`asignacion_motor_motores_marcacion_id`),
  CONSTRAINT `fk_catvariables_asignacion_motor1` FOREIGN KEY (`asignacion_motor_id`, `asignacion_motor_cat_camapanas_id`, `asignacion_motor_motores_marcacion_id`) REFERENCES `asignacion_motor` (`id`, `cat_camapanas_id`, `motores_marcacion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of catvariables
-- ----------------------------
INSERT INTO `catvariables` VALUES ('30', 'Membrete Institucional', '2', 'Protocolo de llamada', 'Vacacional', null, '', '1', '1', '1');
INSERT INTO `catvariables` VALUES ('31', 'Vocabulario', '5', 'Protocolo de llamada', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('33', 'Escucha activa y empatía', '5', 'Protocolo de llamada', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('36', 'Tiempo en espera', '3', 'Protocolo de llamada', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('40', 'Fechas', '5', 'Sondeo', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('41', 'Origen/Destino', '5', 'Sondeo', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('42', 'Número de Personas ', '5', 'Sondeo', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('43', 'Hospedaje y transportación', '5', 'Sondeo', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('44', 'Teléfono y correo electrónico', '5', 'Sondeo', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('45', 'Requerimientos especiales', '5', 'Sondeo', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('46', 'Información incorrecta/incompleta', '15', 'Manejo Informacion', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('48', 'Proceso incorrecto', '10', 'Manejo Informacion', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('49', 'Manejo de Objeciones', '15', 'Cierre', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('50', 'Cierre', '15', 'Cierre', 'Vacacional', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('53', 'Membrete Institucional', '5', 'Protocolo de llamada', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('55', 'Vocabulario', '5', 'Protocolo de llamada', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('56', 'Escucha activa y empatía', '5', 'Protocolo de llamada', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('58', 'Tiempo en espera', '5', 'Protocolo de llamada', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('60', 'Realiza encuesta', '20', 'Encuesta', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('62', 'Información incorrecta/incompleta', '15', 'Manejo Informacion', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('64', 'Proceso incorrecto', '15', 'Manejo Informacion', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('66', 'Manejo de Objeciones', '15', 'Cierre', 'Corporativo', null, null, '1', '1', '1');
INSERT INTO `catvariables` VALUES ('68', 'Cierre', '15', 'Cierre', 'Corporativo', null, null, '1', '1', '1');

-- ----------------------------
-- Table structure for cat_camapanas
-- ----------------------------
DROP TABLE IF EXISTS `cat_camapanas`;
CREATE TABLE `cat_camapanas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_campana` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cat_camapanas
-- ----------------------------
INSERT INTO `cat_camapanas` VALUES ('1', 'VECI');

-- ----------------------------
-- Table structure for cat_motores
-- ----------------------------
DROP TABLE IF EXISTS `cat_motores`;
CREATE TABLE `cat_motores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_motor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cat_motores
-- ----------------------------
INSERT INTO `cat_motores` VALUES ('1', 'VECI');

-- ----------------------------
-- Table structure for detallescalifaciones
-- ----------------------------
DROP TABLE IF EXISTS `detallescalifaciones`;
CREATE TABLE `detallescalifaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(45) DEFAULT NULL,
  `status_respuesta` varchar(45) DEFAULT NULL,
  `fecha_respuesta` datetime DEFAULT NULL,
  `catVariables_id` int(11) NOT NULL,
  `audio_id` int(11) NOT NULL,
  `monitorista_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallesCalifaciones_catVariables1_idx` (`catVariables_id`),
  KEY `fk_detallesCalifaciones_audio1_idx` (`audio_id`),
  KEY `fk_detallescalifaciones_monitorista1_idx` (`monitorista_id`),
  CONSTRAINT `fk_detallesCalifaciones_audio1` FOREIGN KEY (`audio_id`) REFERENCES `audio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallesCalifaciones_catVariables1` FOREIGN KEY (`catVariables_id`) REFERENCES `catvariables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallescalifaciones_monitorista1` FOREIGN KEY (`monitorista_id`) REFERENCES `monitorista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1032 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detallescalifaciones
-- ----------------------------

-- ----------------------------
-- Table structure for monitorista
-- ----------------------------
DROP TABLE IF EXISTS `monitorista`;
CREATE TABLE `monitorista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_validador` varchar(45) DEFAULT NULL,
  `num_empleado` varchar(45) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  `type_session` varchar(45) DEFAULT NULL,
  `monitoreo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_monitorista_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_monitorista_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of monitorista
-- ----------------------------
INSERT INTO `monitorista` VALUES ('1', 'Alberto Victoria', '001', '1', '2', '1');
INSERT INTO `monitorista` VALUES ('2', 'Jorge Lopez', '003', '3', '0', '1');
INSERT INTO `monitorista` VALUES ('3', 'Ezequiel Garcia', '0660', '4', '0', '0');

-- ----------------------------
-- Table structure for tiposperfil
-- ----------------------------
DROP TABLE IF EXISTS `tiposperfil`;
CREATE TABLE `tiposperfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tiposperfil
-- ----------------------------
INSERT INTO `tiposperfil` VALUES ('1', 'Administrador');
INSERT INTO `tiposperfil` VALUES ('2', 'Monitorista');
INSERT INTO `tiposperfil` VALUES ('3', 'Agente');
INSERT INTO `tiposperfil` VALUES ('4', 'supervisor');

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(45) DEFAULT NULL,
  `inicio_sesion` varchar(45) DEFAULT NULL,
  `fin_sesion` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_token_usuarios_idx` (`usuarios_id`),
  CONSTRAINT `fk_token_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES ('28', 'e3750cb9cdccea1945bf8d2d2332a445', '2017-09-28  16:23:17', '2017-09-29  09:07:51', '0', '1');
INSERT INTO `token` VALUES ('29', '4b4b3e0b09948a4db86b53a363066c06', '2017-09-29  09:10:57', '2017-10-03  17:14:48', '0', '1');
INSERT INTO `token` VALUES ('30', '186203da29cc683c9f5e4a6a288c8710', '2017-10-03  17:41:14', '2017-10-04  18:16:25', '0', '4');
INSERT INTO `token` VALUES ('31', '6a3c66fb32f1608288086bac28100094', '2017-10-04  17:17:22', '2017-10-04  17:17:22', '1', '1');
INSERT INTO `token` VALUES ('32', '965e757986057ec263c2105adf813adb', '2017-10-04  18:17:29', '2017-10-04  18:29:47', '0', '1');
INSERT INTO `token` VALUES ('33', '227425b5b2e3035b4131fd315508ac72', '2017-10-04  18:30:07', '2017-10-04  18:30:45', '0', '4');
INSERT INTO `token` VALUES ('34', '16d26fadb0e056b97cb38001da84c965', '2017-10-04  18:32:22', '2017-10-04  18:32:22', '1', '4');
INSERT INTO `token` VALUES ('35', 'f030ff7566f623665c29f7832b119e56', '2017-10-04  18:39:57', '2017-10-04  18:39:57', '1', '1');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tiposPerfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_tiposPerfil1_idx` (`tiposPerfil_id`),
  CONSTRAINT `fk_usuarios_tiposPerfil1` FOREIGN KEY (`tiposPerfil_id`) REFERENCES `tiposperfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', '001', 'temporal', '2');
INSERT INTO `usuarios` VALUES ('2', '002', 'temporal', '3');
INSERT INTO `usuarios` VALUES ('3', '003', 'temporal', '1');
INSERT INTO `usuarios` VALUES ('4', '0660', 'temporal', '4');
