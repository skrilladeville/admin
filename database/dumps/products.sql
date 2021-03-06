CREATE TABLE `products` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` INTEGER(11) NOT NULL,
  `strain` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_marijuana` TINYINT(1) NOT NULL,
  `image` VARCHAR(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type_id` INTEGER(11) DEFAULT NULL,
  `is_each` TINYINT(1) NOT NULL,
  `net_weight` DOUBLE DEFAULT NULL,
  `price_measurement` VARCHAR(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_self_distributed` TINYINT(1) NOT NULL,
  `is_lab_results` TINYINT(1) NOT NULL,
  `is_show_on_weedmaps` TINYINT(1) NOT NULL,
  `is_show_on_potify` TINYINT(1) NOT NULL,
  `is_print_label` TINYINT(1) NOT NULL,
  `description` VARCHAR(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_archieve` TINYINT(1) NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB
AUTO_INCREMENT=1 AVG_ROW_LENGTH=163 CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci';
COMMIT;



/* Data for the `products` table  (Records 1 - 100) */

INSERT INTO `products` (`name`, `symbol`, `sku`, `product_category_id`, `strain`, `is_marijuana`, `image`, `product_type_id`, `is_each`, `net_weight`, `price_measurement`, `is_self_distributed`, `is_lab_results`, `is_show_on_weedmaps`, `is_show_on_potify`, `is_print_label`, `description`, `is_archieve`, `created_at`, `updated_at`) VALUES 
  ('amet orci. Ut', 'VXQ021', 'XB1924566785322-SNO', 24, '4', 1, NULL, 6, 1, NULL, '1', 1, 0, 1, 0, 1, NULL, 0, NULL, NULL),
  ('eget, dictum', 'FYA692', 'BT9028464657032-QJJ', 10, '3', 1, NULL, 5, 0, NULL, '1', 1, 0, 1, 0, 0, NULL, 0, NULL, NULL),
  ('per inceptos', 'AGG883', 'FJ2545092675121-CCV', 9, '3', 1, NULL, 6, 0, NULL, '1', 0, 0, 1, 1, 1, NULL, 0, NULL, NULL),
  ('odio tristique', 'KQJ692', 'XO0051387273720-QEG', 23, '1', 0, NULL, 4, 0, NULL, '0', 1, 1, 0, 0, 1, NULL, 1, NULL, NULL),
  ('vitae semper', 'NPM444', 'PC2046675931659-IWN', 18, '2', 0, NULL, 10, 0, NULL, '1', 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
  ('egestas a,', 'YNB963', 'NU2896883256507-KZJ', 8, '3', 1, NULL, 10, 1, NULL, '1', 1, 1, 0, 1, 1, NULL, 1, NULL, NULL),
  ('magna. Ut tincidunt', 'PNC407', 'HN6261610889301-SRZ', 4, '2', 0, NULL, 6, 0, NULL, '0', 1, 1, 0, 1, 1, NULL, 0, NULL, NULL),
  ('elit fermentum risus,', 'RER649', 'OY5971163461649-LGQ', 17, '1', 1, NULL, 10, 0, NULL, '1', 1, 0, 1, 0, 0, NULL, 1, NULL, NULL),
  ('sit amet,', 'JEG092', 'XJ7950017114878-LDO', 6, '4', 1, NULL, 6, 1, NULL, '1', 1, 0, 0, 0, 1, NULL, 0, NULL, NULL),
  ('risus', 'WPF829', 'VD5269660318614-YYC', 13, '3', 0, NULL, 7, 1, NULL, '1', 0, 1, 0, 1, 0, NULL, 0, NULL, NULL),
  ('lacus. Cras interdum.', 'JOV503', 'PR4618016424688-ZLX', 1, '2', 0, NULL, 4, 0, NULL, '1', 0, 0, 0, 0, 1, NULL, 0, NULL, NULL),
  ('pede. Praesent eu', 'HYP825', 'ZP9533600031168-OPO', 2, '3', 0, NULL, 3, 1, NULL, '0', 0, 1, 1, 0, 1, NULL, 0, NULL, NULL),
  ('dapibus rutrum,', 'FQE040', 'YC4564713566080-MPT', 24, '4', 0, NULL, 2, 1, NULL, '0', 1, 0, 1, 1, 1, NULL, 0, NULL, NULL),
  ('senectus et', 'KPG987', 'DJ1739358960396-BVE', 13, '1', 1, NULL, 2, 0, NULL, '1', 0, 1, 0, 1, 0, NULL, 0, NULL, NULL),
  ('facilisis non,', 'BBD218', 'JW9469716679398-EZR', 13, '4', 1, NULL, 7, 0, NULL, '1', 1, 1, 1, 1, 0, NULL, 1, NULL, NULL),
  ('nec, leo.', 'RNG599', 'JK7268553357854-UKW', 14, '1', 0, NULL, 6, 1, NULL, '0', 0, 1, 1, 0, 1, NULL, 0, NULL, NULL),
  ('dis parturient', 'NZI389', 'CI7627393895869-ODS', 13, '1', 0, NULL, 1, 0, NULL, '1', 0, 0, 0, 1, 1, NULL, 1, NULL, NULL),
  ('interdum. Curabitur', 'YJE338', 'LZ4390683565142-GWW', 17, '1', 1, NULL, 5, 1, NULL, '1', 0, 0, 0, 0, 1, NULL, 1, NULL, NULL),
  ('eu, eleifend', 'GJS983', 'TI5021188875312-QRH', 7, '4', 1, NULL, 9, 1, NULL, '0', 0, 0, 1, 1, 0, NULL, 1, NULL, NULL),
  ('arcu.', 'LQW684', 'WL1799773781111-GPR', 20, '2', 1, NULL, 9, 0, NULL, '0', 1, 1, 0, 1, 0, NULL, 0, NULL, NULL),
  ('ornare, elit', 'YML173', 'HH3290923111331-TJM', 21, '4', 0, NULL, 3, 1, NULL, '0', 1, 0, 0, 1, 0, NULL, 0, NULL, NULL),
  ('mauris sapien, cursus', 'GFN708', 'PP9969857829663-NOF', 18, '1', 1, NULL, 6, 1, NULL, '0', 0, 0, 1, 1, 0, NULL, 0, NULL, NULL),
  ('semper', 'DNN860', 'RR1558610865352-UFY', 5, '2', 1, NULL, 3, 0, NULL, '1', 0, 0, 1, 1, 0, NULL, 1, NULL, NULL),
  ('Cras', 'IPI420', 'NG0277741063267-PAU', 8, '4', 1, NULL, 5, 0, NULL, '1', 0, 0, 0, 0, 0, NULL, 1, NULL, NULL),
  ('pede nec ante', 'CAU589', 'NJ7706083885067-LEN', 7, '2', 1, NULL, 5, 0, NULL, '0', 1, 1, 0, 0, 0, NULL, 1, NULL, NULL),
  ('ac nulla. In', 'YUQ325', 'JZ5776804439664-LMK', 19, '4', 0, NULL, 10, 1, NULL, '0', 1, 1, 1, 0, 1, NULL, 1, NULL, NULL),
  ('et, eros.', 'CBM354', 'BT2072410853165-BWW', 2, '1', 0, NULL, 5, 1, NULL, '0', 1, 0, 1, 1, 0, NULL, 1, NULL, NULL),
  ('ante dictum cursus.', 'FWH225', 'AO4602613443915-AWI', 6, '3', 1, NULL, 4, 1, NULL, '1', 0, 0, 0, 1, 0, NULL, 0, NULL, NULL),
  ('Aliquam', 'PJJ461', 'XC2234031479619-EYF', 21, '1', 1, NULL, 5, 1, NULL, '0', 1, 1, 1, 1, 0, NULL, 1, NULL, NULL),
  ('erat.', 'DPA713', 'FA4960797328222-XWM', 16, '2', 0, NULL, 6, 0, NULL, '0', 1, 1, 0, 0, 0, NULL, 0, NULL, NULL),
  ('gravida', 'MSE544', 'KR0927242400797-OEX', 12, '3', 1, NULL, 5, 1, NULL, '0', 1, 0, 1, 1, 1, NULL, 0, NULL, NULL),
  ('Proin non massa', 'ZBH186', 'TZ2291594969026-JXS', 7, '4', 0, NULL, 4, 0, NULL, '1', 1, 1, 1, 0, 1, NULL, 0, NULL, NULL),
  ('dolor. Fusce mi', 'KRP653', 'IV8287355619228-VDX', 10, '2', 1, NULL, 10, 0, NULL, '0', 0, 0, 1, 1, 1, NULL, 0, NULL, NULL),
  ('nibh', 'RBZ362', 'FR9085699058175-ELU', 8, '3', 0, NULL, 3, 0, NULL, '1', 1, 0, 1, 0, 1, NULL, 0, NULL, NULL),
  ('cubilia', 'ZWE788', 'JQ7215199049326-LET', 22, '3', 1, NULL, 9, 1, NULL, '1', 0, 0, 0, 1, 1, NULL, 0, NULL, NULL),
  ('dictum augue malesuada', 'REI890', 'HY6330172563610-UVY', 13, '1', 1, NULL, 7, 0, NULL, '1', 0, 0, 0, 1, 1, NULL, 1, NULL, NULL),
  ('sapien. Aenean massa.', 'NZQ702', 'KZ3135275140306-JSK', 19, '1', 1, NULL, 7, 0, NULL, '1', 0, 1, 1, 1, 0, NULL, 1, NULL, NULL),
  ('eget', 'FZI861', 'AW2581448649673-WSV', 10, '2', 1, NULL, 2, 1, NULL, '0', 1, 1, 1, 1, 1, NULL, 0, NULL, NULL),
  ('ligula', 'BKY592', 'OO8888997361312-HKL', 14, '4', 0, NULL, 9, 1, NULL, '0', 0, 1, 1, 0, 1, NULL, 0, NULL, NULL),
  ('Donec nibh', 'WUV132', 'GE9361911645158-HSY', 23, '2', 0, NULL, 1, 0, NULL, '0', 1, 0, 0, 1, 1, NULL, 0, NULL, NULL),
  ('non', 'WIP458', 'QY1021847257169-BUK', 16, '4', 1, NULL, 2, 1, NULL, '1', 1, 1, 0, 1, 1, NULL, 0, NULL, NULL),
  ('non, sollicitudin', 'WQW251', 'QW9483345350342-YTZ', 16, '2', 1, NULL, 10, 1, NULL, '1', 0, 1, 0, 0, 0, NULL, 0, NULL, NULL),
  ('sem', 'OLM255', 'RN3541657469813-GKL', 21, '1', 0, NULL, 3, 1, NULL, '0', 1, 0, 1, 0, 0, NULL, 0, NULL, NULL),
  ('urna', 'BMP201', 'DL6620995594392-LLM', 13, '1', 0, NULL, 4, 0, NULL, '1', 0, 1, 0, 0, 0, NULL, 0, NULL, NULL),
  ('nunc', 'DKH673', 'OT2645937331198-ETM', 1, '3', 0, NULL, 5, 1, NULL, '0', 0, 1, 0, 1, 1, NULL, 0, NULL, NULL),
  ('Aenean eget metus.', 'DPT410', 'ZF5114155431982-LXH', 19, '4', 1, NULL, 8, 0, NULL, '0', 1, 1, 1, 1, 0, NULL, 0, NULL, NULL),
  ('urna. Nullam lobortis', 'XDH797', 'DL2280301151041-UWR', 10, '3', 0, NULL, 4, 1, NULL, '1', 1, 1, 1, 0, 0, NULL, 1, NULL, NULL),
  ('mauris ut mi.', 'GGV469', 'SP1013172990919-FAF', 17, '1', 0, NULL, 8, 0, NULL, '1', 0, 1, 1, 0, 0, NULL, 1, NULL, NULL),
  ('odio vel', 'UCJ411', 'YL3411590357795-SQL', 16, '1', 1, NULL, 8, 0, NULL, '0', 0, 1, 0, 1, 0, NULL, 1, NULL, NULL),
  ('justo eu arcu.', 'WIW852', 'BC0043575877520-RKL', 24, '1', 0, NULL, 10, 1, NULL, '0', 1, 1, 0, 0, 0, NULL, 0, NULL, NULL),
  ('vestibulum lorem,', 'VAT807', 'LC9049596218377-XDR', 15, '1', 0, NULL, 4, 1, NULL, '1', 1, 1, 0, 0, 0, NULL, 0, NULL, NULL),
  ('ornare. In faucibus.', 'YEZ382', 'LK2207225394492-EYT', 17, '2', 0, NULL, 9, 0, NULL, '0', 0, 1, 1, 1, 1, NULL, 1, NULL, NULL),
  ('Phasellus', 'MQG411', 'FK3654849872234-JON', 18, '2', 1, NULL, 2, 0, NULL, '0', 0, 0, 0, 0, 1, NULL, 1, NULL, NULL),
  ('Sed nec metus', 'PIK438', 'TL2563758826300-YQM', 13, '1', 1, NULL, 6, 0, NULL, '1', 0, 1, 0, 1, 0, NULL, 1, NULL, NULL),
  ('Proin', 'FGB219', 'BH5022905657371-DWR', 1, '4', 0, NULL, 7, 1, NULL, '0', 1, 1, 0, 1, 1, NULL, 0, NULL, NULL),
  ('dui. Cras pellentesque.', 'DHO436', 'RJ7063768833235-WXS', 3, '2', 0, NULL, 9, 1, NULL, '0', 0, 0, 1, 1, 1, NULL, 0, NULL, NULL),
  ('Integer vulputate, risus', 'ZGX458', 'FA8406411902823-PTU', 1, '1', 1, NULL, 5, 1, NULL, '1', 0, 0, 1, 0, 0, NULL, 0, NULL, NULL),
  ('sit amet metus.', 'BZD614', 'OL3833020638566-AWF', 8, '3', 0, NULL, 2, 0, NULL, '0', 0, 0, 1, 0, 1, NULL, 0, NULL, NULL),
  ('sagittis.', 'VNC639', 'KP6574666159254-OLB', 19, '3', 0, NULL, 8, 0, NULL, '1', 0, 1, 1, 0, 0, NULL, 0, NULL, NULL),
  ('sem. Nulla', 'VCT655', 'AG8605743388916-YCG', 15, '3', 0, NULL, 5, 1, NULL, '0', 0, 0, 0, 1, 0, NULL, 1, NULL, NULL),
  ('imperdiet', 'QFJ288', 'MI6133874180393-IIQ', 8, '2', 1, NULL, 5, 0, NULL, '0', 0, 0, 1, 0, 1, NULL, 1, NULL, NULL),
  ('Maecenas malesuada', 'EIU739', 'UR7090833694686-XBO', 18, '4', 0, NULL, 3, 0, NULL, '0', 0, 1, 1, 1, 1, NULL, 0, NULL, NULL),
  ('eu nibh', 'XIH468', 'DS7240133207565-JDY', 19, '1', 1, NULL, 4, 1, NULL, '1', 1, 1, 0, 1, 0, NULL, 0, NULL, NULL),
  ('magna.', 'OZK020', 'IB4113497738399-YVE', 21, '1', 0, NULL, 10, 0, NULL, '0', 1, 1, 0, 1, 0, NULL, 1, NULL, NULL),
  ('ultrices. Duis volutpat', 'GYT715', 'PK8865468082396-UHH', 4, '3', 0, NULL, 2, 0, NULL, '0', 1, 0, 0, 1, 0, NULL, 1, NULL, NULL),
  ('mollis lectus', 'XOC208', 'AA8940880850446-SHG', 14, '4', 0, NULL, 6, 1, NULL, '0', 1, 1, 1, 0, 1, NULL, 0, NULL, NULL),
  ('aliquet', 'OEJ346', 'HY0537151911403-CEK', 6, '2', 1, NULL, 1, 1, NULL, '1', 0, 0, 0, 1, 1, NULL, 0, NULL, NULL),
  ('eget metus.', 'TTZ995', 'XQ6156892062963-SCR', 3, '1', 0, NULL, 6, 0, NULL, '1', 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
  ('primis', 'ZMD828', 'RK9900412512190-KKR', 16, '1', 1, NULL, 5, 1, NULL, '1', 0, 0, 1, 1, 0, NULL, 0, NULL, NULL),
  ('nunc. In at', 'QAH716', 'BA1304927561450-MLO', 24, '4', 1, NULL, 4, 1, NULL, '1', 0, 0, 0, 1, 0, NULL, 1, NULL, NULL),
  ('ipsum. Suspendisse non', 'CSA493', 'RX2150462875386-ITX', 3, '2', 0, NULL, 4, 1, NULL, '0', 1, 0, 0, 1, 1, NULL, 1, NULL, NULL),
  ('torquent per conubia', 'HZD471', 'QF0512982192574-IPX', 12, '4', 1, NULL, 7, 0, NULL, '1', 0, 1, 0, 1, 0, NULL, 1, NULL, NULL),
  ('ornare.', 'KEL951', 'WE9041035124561-WQF', 7, '1', 1, NULL, 7, 1, NULL, '1', 0, 1, 0, 0, 1, NULL, 0, NULL, NULL),
  ('non,', 'TVQ258', 'TP5398141594672-TTZ', 14, '3', 1, NULL, 10, 0, NULL, '0', 0, 1, 0, 0, 1, NULL, 1, NULL, NULL),
  ('adipiscing', 'EAA199', 'HT9673054105954-EBN', 14, '3', 1, NULL, 5, 0, NULL, '1', 1, 1, 1, 0, 0, NULL, 1, NULL, NULL),
  ('ut nisi a', 'KLG028', 'LP7387893108430-CHM', 15, '4', 1, NULL, 2, 1, NULL, '0', 0, 1, 0, 1, 1, NULL, 0, NULL, NULL),
  ('Cum sociis', 'VUT912', 'VX1069367679751-ICW', 10, '4', 1, NULL, 2, 1, NULL, '0', 1, 0, 0, 0, 0, NULL, 1, NULL, NULL),
  ('ut', 'YQG310', 'EI4571874767623-BGT', 13, '2', 1, NULL, 10, 1, NULL, '0', 0, 0, 1, 0, 0, NULL, 1, NULL, NULL),
  ('sagittis felis. Donec', 'THT173', 'CV1819913789453-VWA', 5, '3', 0, NULL, 8, 1, NULL, '1', 1, 0, 0, 1, 1, NULL, 1, NULL, NULL),
  ('risus. In mi', 'KPP375', 'WP9410111134191-LES', 15, '2', 0, NULL, 10, 0, NULL, '0', 0, 1, 1, 0, 1, NULL, 1, NULL, NULL),
  ('dapibus', 'GFG214', 'UP5003449716159-ONP', 3, '3', 0, NULL, 2, 0, NULL, '1', 1, 0, 0, 0, 0, NULL, 1, NULL, NULL),
  ('eu nulla at', 'RJW988', 'SU3993039760913-PLM', 14, '3', 0, NULL, 4, 0, NULL, '0', 0, 0, 0, 1, 1, NULL, 0, NULL, NULL),
  ('Proin velit. Sed', 'LIH938', 'LF3302046427140-CHL', 4, '2', 0, NULL, 7, 0, NULL, '1', 1, 1, 0, 1, 0, NULL, 1, NULL, NULL),
  ('elementum purus,', 'VHA145', 'RR4944294759954-DLO', 1, '3', 1, NULL, 10, 0, NULL, '0', 0, 0, 0, 1, 1, NULL, 0, NULL, NULL),
  ('diam luctus lobortis.', 'PSQ036', 'XL2680620654135-CMF', 4, '4', 0, NULL, 5, 0, NULL, '0', 0, 1, 1, 0, 1, NULL, 0, NULL, NULL),
  ('adipiscing ligula. Aenean', 'DLH023', 'OW0304664351849-YMH', 14, '4', 0, NULL, 5, 1, NULL, '1', 0, 1, 0, 1, 0, NULL, 0, NULL, NULL),
  ('et', 'WPR046', 'CM1043334599716-HKR', 1, '4', 0, NULL, 8, 1, NULL, '1', 0, 1, 1, 0, 0, NULL, 1, NULL, NULL),
  ('neque.', 'GEB970', 'AD2792797155762-PRY', 3, '1', 1, NULL, 10, 1, NULL, '1', 1, 1, 0, 0, 1, NULL, 0, NULL, NULL),
  ('eu', 'JDW845', 'RB6821363836933-ZUS', 24, '4', 1, NULL, 6, 1, NULL, '0', 0, 0, 0, 1, 1, NULL, 1, NULL, NULL),
  ('lacus. Aliquam', 'DZJ839', 'MF6877093372259-EBC', 5, '4', 0, NULL, 3, 0, NULL, '0', 1, 0, 0, 1, 1, NULL, 1, NULL, NULL),
  ('rhoncus.', 'PJB139', 'MD8247393145875-RDN', 17, '3', 0, NULL, 7, 0, NULL, '0', 0, 1, 0, 0, 0, NULL, 0, NULL, NULL),
  ('molestie', 'NHJ929', 'PV9288377028228-DZI', 7, '4', 0, NULL, 8, 0, NULL, '1', 0, 1, 0, 1, 0, NULL, 0, NULL, NULL),
  ('elementum purus, accumsan', 'MWQ913', 'IG3008796727715-FLO', 17, '4', 1, NULL, 3, 1, NULL, '0', 0, 0, 0, 1, 0, NULL, 1, NULL, NULL),
  ('sed, sapien. Nunc', 'EHX379', 'XN5766374054864-UMR', 8, '4', 0, NULL, 1, 1, NULL, '1', 0, 0, 1, 0, 0, NULL, 0, NULL, NULL),
  ('Cras', 'WCM342', 'PB7314234037665-LLY', 10, '4', 0, NULL, 5, 0, NULL, '1', 0, 1, 0, 0, 1, NULL, 1, NULL, NULL),
  ('molestie', 'EPN316', 'VK3743176048917-EYG', 19, '4', 1, NULL, 5, 0, NULL, '1', 1, 0, 1, 1, 0, NULL, 1, NULL, NULL),
  ('non, dapibus rutrum,', 'NGM127', 'EX0386074496180-VDL', 19, '1', 1, NULL, 9, 0, NULL, '1', 0, 0, 0, 1, 0, NULL, 1, NULL, NULL),
  ('sollicitudin a, malesuada', 'YCF778', 'FQ2582326084959-BSV', 17, '1', 1, NULL, 2, 1, NULL, '1', 0, 0, 0, 1, 0, NULL, 1, NULL, NULL),
  ('tempor diam dictum', 'FWQ691', 'KB7320639385338-WCL', 22, '2', 1, NULL, 9, 1, NULL, '1', 0, 1, 1, 0, 0, NULL, 0, NULL, NULL),
  ('tempor lorem, eget', 'GBZ443', 'DZ0873455065547-LCT', 23, '1', 1, NULL, 7, 0, NULL, '0', 0, 0, 0, 1, 1, NULL, 0, NULL, NULL);


