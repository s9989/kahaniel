-- Doctrine Migration File Generated on 2019-12-09 19:43:55

-- Version 20191130122925
DROP TABLE document_user;
DROP TABLE users_documents;
DELETE FROM migration_versions WHERE version = '20191130122925';

-- Version 20191116160026
ALTER TABLE company ADD main TINYINT(1) NOT NULL;
ALTER TABLE document CHANGE account_number account_number VARCHAR(60) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`;
DELETE FROM migration_versions WHERE version = '20191116160026';

-- Version 20180517155813
DROP TABLE social_insurance_payment;
ALTER TABLE app_users DROP sickness_payer;
DELETE FROM migration_versions WHERE version = '20180517155813';

-- Version 20180517150331
ALTER TABLE app_users CHANGE start_date start_date DATE NOT NULL;
DELETE FROM migration_versions WHERE version = '20180517150331';
