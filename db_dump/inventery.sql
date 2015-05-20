INSERT INTO subcat(sub_test_id, main_test_id, subcateg, reg_price, disc_price,template_code) VALUES(60, 5, 'ANTI-HAV', 550, 0, 'MX');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 5, 'SYSTEM GENERATED');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 10, 'SYSTEM GENERATED');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 15, 'SYSTEM GENERATED');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 20, 'SYSTEM GENERATED');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 30, 'SYSTEM GENERATED');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 40, 'SYSTEM GENERATED');
INSERT INTO service_discounts(service_id,disc_amount,created_by) VALUES(60, 50, 'SYSTEM GENERATED');


CREATE TABLE inventory(
	id INT AUTO_INCREMENT NOT NULL,
	description VARCHAR(155),
	count INT(10) DEFAULT 0,
	last_modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	last_modified_by VARCHAR(155) DEFAULT 'SYSTEM GENERATED',
	recent_status VARCHAR(155) DEFAULT 'SYSTEM GENERATED',
	PRIMARY KEY(id)
);

CREATE TABLE inventory_services_ref(
	id INT AUTO_INCREMENT NOT NULL,
	i_id INT(10),
	s_id INT(10),
	count INT(10),
	PRIMARY KEY(id)
);

CREATE TABLE inventory_logs(
	id INT AUTO_INCREMENT NOT NULL,
	i_id INT(10),
	description VARCHAR(155),
	user VARCHAR(100),
	actionstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
);


-- List of inventory items definition
INSERT INTO inventory(description) VALUES ('HBsAg Kit');
INSERT INTO inventory(description) VALUES ('VDRL Kit');
INSERT INTO inventory(description) VALUES ('ANTI-HAV Kit');
INSERT INTO inventory(description) VALUES ('HIV Kit');
INSERT INTO inventory(description) VALUES ('PREGNANCY TEST Kit');
INSERT INTO inventory(description) VALUES ('CUPS');
INSERT INTO inventory(description) VALUES ('URINE STRIPS');
INSERT INTO inventory(description) VALUES ('EDTA TUBES');
INSERT INTO inventory(description) VALUES ('CC SYRINGE');
INSERT INTO inventory(description) VALUES ('Plain Tubes');

-- Referencing of item for services
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (1, 42, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (2, 42, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (3, 60, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (4, 44, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (5, 22, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (6, 19, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (6, 20, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (7, 19, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (8, 1, 1);
INSERT INTO inventory_services_ref(i_id,s_id, count) VALUES (9, 1, 3 );


