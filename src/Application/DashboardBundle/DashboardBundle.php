<?php

namespace Application\DashboardBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DashboardBundle extends Bundle
{
}

/* SQL
insert into `rel_user_role` (id_user, id_role) select id_user, 3 from user

alter table cars add COLUMN id_car_color INTEGER(11)
insert into `sp_car_color` (name) select distinct LOWER(color) from `cars`
--update `cars` c set c.id_car_color = (select id_car_color from `sp_car_color` cc where cc.`name` = c.color )
удалить ненужные поля

alter table primeta add COLUMN id_sign_place INTEGER(11)
alter table primeta add COLUMN id_sign_type INTEGER(11)
--insert into `sp_sign_type` (name) select distinct LOWER(vid_primet) from `primeta`
--insert into `sp_sign_place` (name) select distinct LOWER(telo) from `primeta`
update `primeta` c set c.id_sign_place = (select id_sign_place from `sp_sign_place` cc where cc.`name` = c.telo ), c.id_sign_type = (select id_sign_type from `sp_sign_type` cc where cc.`name` = c.vid_primet )
удалить ненужные поля

delete from `pogonyalo` where Pog = '' 
delete from `k_pred` where `DATA` = '' and `Fabula` = '' and `KUS` = '' and `UD` = ''
delete from `cars` where `AVTO` = '' and `GOS_N` = '' and `Vladelec` = '' and `id_car_color` is null
delete from `kategoria` where kat = ''
delete from `primeta` where NAMEPR = '' and Fot = '' and id_sign_type is null and id_sign_place is null  
delete from `svyazy` where Kategoriya = '' and FAMS = '' and NAMES ='' and OTCHS = '' and DateRogS = '' and Prog = ''    
удалить ненужные поля
 
alter table otozdestvlenie add COLUMN id_identification_reason INTEGER(11);
alter table otozdestvlenie add COLUMN id_identification_category INTEGER(11);
alter table otozdestvlenie add COLUMN id_identification_type INTEGER(11);
insert into `sp_identification_reason` (name) select distinct LOWER(prov) from `otozdestvlenie`;
insert into `sp_identification_category` (name) select distinct LOWER(kat) from `otozdestvlenie`;
insert into `sp_identification_type` (name) select distinct LOWER(`type`) from `otozdestvlenie`; 
--update `otozdestvlenie` c set 
--    c.id_identification_reason = (select id_identification_reason from `sp_identification_reason` cc where cc.`name` = c.prov ), 
--    c.id_identification_category = (select id_identification_category from `sp_identification_category` cc where cc.`name` = c.kat ),
--    c.id_identification_type = (select id_identification_type from `sp_identification_type` cc where cc.`name` = c.type )
удалить ненужные поля

удалить поле с адресом фото в татуировках
RENAME TABLE `primeta` TO `sign`;
delete from `sign` where NofFase is null or NofFase = '' or like '%N%';
alter table `sign` MODIFY NofFase integer(11);
alter table `sign` CHANGE `id` `id_sign` integer(11);
alter table `sign` CHANGE `NAMEPR` `name` varchar(128);
alter table `sign` ADD INDEX `NofFase` (`NofFase`);

RENAME TABLE `cars` TO `car`;
delete from `car` where NofFase REGEXP '[^0-9]+'
alter table `car` MODIFY NofFase integer(11);
alter table `car` CHANGE `id` `id_car` integer(11);
alter table `car` CHANGE `AVTO` `model` varchar(128);
alter table `car` CHANGE `GOS_N` `number` varchar(128);
alter table `car` CHANGE `Vladelec` `owner` varchar(256);
update `car` set `model` = null where `model` = '';
update `car` set `number` = null where `number` = '';
update `car` set `owner` = null where `owner` = '';
alter table `car` ADD INDEX `NofFase` (`NofFase`);

RENAME TABLE `pogonyalo` TO `nickname`;
delete from `nickname` where NofFase NofFase REGEXP '[^0-9]+'
alter table `nickname` MODIFY NofFase integer(11);
alter table `nickname` CHANGE `id` `id_nickname` integer(11);
alter table `nickname` CHANGE `Pog` `name` varchar(128);
update `nickname` set `name` = LOWER(name);
alter table `nickname` ADD INDEX `NofFase` (`NofFase`);

RENAME TABLE `k_pred` TO `crime`;
delete from `crime` where NofFase REGEXP '[^0-9]+'
alter table `crime` MODIFY NofFase integer(11);
alter table `crime` CHANGE `id` `id_crime` integer(11);
alter table `crime` CHANGE `DATA` `date` varchar(128);
alter table `crime` CHANGE `Fabula` `fabula` varchar(256);
alter table `crime` CHANGE `KUS` `kusp` varchar(256);
alter table `crime` CHANGE `UD` `criminal_case` varchar(256);
update `crime` set `date` = null where `date` = '';
update `crime` set `fabula` = null where `fabula` = '';
update `crime` set `kusp` = null where `kusp` = '';
update `crime` set `criminal_case` = null where `criminal_case` = '';
alter table `crime` ADD INDEX `NofFase` (`NofFase`);

RENAME TABLE `svyazy` TO `connection`;
delete from `connection` where NofFase = ''
delete from `connection` where Kategoriya = '' and FAMS = '' and NAMES = '' and OTCHS = ''
alter table `connection` MODIFY NofFase integer(11);
insert into `sp_connection_type` (name) select distinct LOWER(Kategoriya) from `connection`;
alter table connection add COLUMN id_connection_type INTEGER(11)
update `connection` c set c.id_connection_type = (select id_connection_type from `sp_connection_type` cc where cc.`name` = LOWER(c.Kategoriya)) ???
alter table `connection` MODIFY NofFase integer(11);
alter table `connection` CHANGE `FAMS` `surname` varchar(128);
alter table `connection` CHANGE `NAMES` `name` varchar(128);
alter table `connection` CHANGE `OTCHS` `patronymic` varchar(128);
alter table `connection` CHANGE `DateRogS` `date_of_birth` varchar(128);
alter table `connection` CHANGE `Prog` `place_of_residence` text;
удалить ненужные поля


RENAME TABLE `osnovn` TO `offender`;
alter table `offender` CHANGE `NofFase` `id_offender` integer(11);
RENAME TABLE `car` TO `offender_car`;
alter table `offender_car` CHANGE `id_car` `id_offender_car` integer(11);
RENAME TABLE `connection` TO `offender_connection`;
alter table `offender_connection` CHANGE `id` `id_offender_connection` integer(11);
RENAME TABLE `crime` TO `offender_crime`;
alter table `offender_crime` CHANGE `id_crime` `id_offender_crime` integer(11);
RENAME TABLE `nickname` TO `offender_nickname`;
alter table `offender_nickname` CHANGE `id_nickname` `id_offender_nickname` integer(11);
RENAME TABLE `sign` TO `offender_sign`;
alter table `offender_sign` CHANGE `id_sign` `id_offender_sign` integer(11);
RENAME TABLE `otozdestvlenie` TO `identification`;
alter table `identification` CHANGE `id` `id_identification` integer(11);

RENAME TABLE `sp_car_color` TO `sp_offender_car_color`;
alter table `sp_offender_car_color` CHANGE `id_car_color` `id_offender_car_color` integer(11);
alter table `offender_car` CHANGE `id_car_color` `id_offender_car_color` integer(11);
RENAME TABLE `sp_department` TO `sp_user_department`;
alter table `sp_user_department` CHANGE `id_department` `id_user_department` integer(11);
alter table `sys_user` CHANGE `id_department` `id_user_department` integer(11);
RENAME TABLE `sp_sign_place` TO `sp_offender_sign_place`;
alter table `sp_offender_sign_place` CHANGE `id_sign_place` `id_offender_sign_place` integer(11);
alter table `offender_sign` CHANGE `id_sign_place` `id_offender_sign_place` integer(11);
RENAME TABLE `sp_sign_type` TO `sp_offender_sign_type`;
alter table `sp_offender_sign_type` CHANGE `id_sign_type` `id_offender_sign_type` integer(11);
alter table `offender_sign` CHANGE `id_sign_type` `id_offender_sign_type` integer(11);
RENAME TABLE `sp_connection_type` TO `sp_offender_connection_type`;
alter table `sp_offender_connection_type` CHANGE `id_connection_type` `id_offender_connection_type` integer(11);
alter table `offender_connection` CHANGE `id_connection_type` `id_offender_connection_type` integer(11);

RENAME TABLE `user` TO `sys_user`;
RENAME TABLE `statistica` TO `sys_statistica`;




Поставить уникальные ключи на справочники!
*/