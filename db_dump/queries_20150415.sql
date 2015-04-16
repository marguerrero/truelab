ALTER TABLE customer_service ADD COLUMN disc_id INT;
ALTER TABLE customer_service ADD COLUMN is_reprint BOOLEAN DEFAULT FALSE;
CREATE TABLE service_discounts (
	id INT NOT NULL AUTO_INCREMENT,
	service_id INT NOT NULL,
	disc_amount FLOAT NOT NULL,
	created_by VARCHAR(150),
	actionstamp TIMESTAMP default CURRENT_TIMESTAMP,
	active BOOLEAN DEFAULT true,
	PRIMARY KEY(id)
);

INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 10, (1300 - 1100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 11, ( 650 -  600 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 12, (1300 - 1100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 13, ( 650 -  600 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 14, ( 750 -  650 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 16, ( 750 -  650 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 17, ( 750 -  650 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 18, ( 750 -  650 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 19, (  50 -   40 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 20, (  50 -   40 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 22, ( 130 -  100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 23, ( 180 -  150 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES (23, 50, 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 24, ( 100 -   90 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 25, ( 650 -  600 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 26, ( 110 -  100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 27, ( 110 -  100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 28, ( 120 -  110 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 29, ( 550 -  500 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 30, ( 110 -  100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 31, ( 320 -  290 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 32, ( 210 -  190 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 33, ( 485 -  435 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 34, ( 680 -  615 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 35, ( 165 -  150 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 36, ( 165 -  150 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 37, ( 165 -  150 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 38, ( 110 -  100 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 39, ( 320 -  300 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 40, ( 140 -  125 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 41, ( 140 -  125 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 42, ( 150 -  130 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 43, ( 250 -  200 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 50, ( 350 -  300 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 56, ( 145 -  130 ) , 'System Generated');
INSERT INTO service_discounts(service_id, disc_amount, created_by) VALUES ( 59, ( 200 -  150 ) , 'System Generated');

