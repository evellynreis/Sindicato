-- CRIANDO O BANCO DE DADOS

create database jade;

###################################################################
-- CRIANDO A TABELA E INSERINDO O PRIMEIRO USUARIO

use jade;
create table uso_usuario (uso_nome varchar(100), uso_login varchar(100), uso_senha varchar(40), uso_adm tinyint);
insert into uso_usuario (uso_nome, uso_login, uso_senha, uso_adm) values ('Administrador', 'admin', md5(123456), 1);

####################################################################
-- VERIFICANDO SE OS DADOS FORAM SALVOS CORRETAMENTE

select * from uso_usuario;

####################################################################
-- CRIANDO A TABELA DE FILIADOS

CREATE TABLE flo_filiado
(flo_nome varchar (100),
 flo_cpf varchar (11),
 flo_rg varchar (6),
 flo_dt_nascimento date,
 flo_idade int,
 flo_empresa varchar (45),
 flo_cargo varchar (45),
 flo_situacao varchar(10),
 flo_telefone varchar (8),
 flo_celular varchar (9),
 flo_dt_atualizacao date
);

ALTER TABLE `jade`.`flo_filiado`
    ADD COLUMN `flo_id` INT NOT NULL AUTO_INCREMENT AFTER `flo_dt_atualizacao`,
ADD PRIMARY KEY (`flo_id`);
;

####################################################################
-- CRIANDO A TABELA DE DEPENDENTES

CREATE TABLE `jade`.`dpe_dependente` (
    `dpe_nome` VARCHAR(100) NULL,
    `dpe_dt_nascimento` DATE NULL,
    `dpe_grau_parentesco` INT NULL,
    `dpe_id` INT NOT NULL AUTO_INCREMENT,
     `flo_id` INT NULL,
     PRIMARY KEY (`dpe_id`));

ALTER TABLE dpe_dependente ADD CONSTRAINT flo_id FOREIGN KEY(flo_id) REFERENCES flo_filiado(flo_id);

#########################################################################

CREATE TABLE `jade`.`ems_empresa` (
    `ems_nome` VARCHAR(100) NULL);

ALTER TABLE `jade`.`ems_empresa`
    ADD COLUMN `ems_id` INT NOT NULL AFTER `ems_nome`,
ADD PRIMARY KEY (`ems_id`);
;

ALTER TABLE `jade`.`ems_empresa`
    CHANGE COLUMN `ems_id` `ems_id` INT NOT NULL AUTO_INCREMENT ;

#############################################################################
CREATE TABLE `jade`.`sto_situacao` (
`sto_nome` VARCHAR(100) NULL,
`sto_id` INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`sto_id`));

##############################################################################
ALTER TABLE `jade`.`flo_filiado`
    CHANGE COLUMN `flo_empresa` `ems_id` INT NULL DEFAULT NULL ,
    CHANGE COLUMN `flo_cargo` `cao_id` INT NULL DEFAULT NULL ,
    CHANGE COLUMN `flo_situacao` `sto_id` INT NULL DEFAULT NULL ;

alter table jade.flo_filiado add constraint flo_ems_pk foreign key (ems_id) references ems_empresa (ems_id);

alter table jade.flo_filiado add constraint flo_cao_pk foreign key (cao_id) references cao_cargo (cao_id);

alter table jade.flo_filiado add constraint flo_sto_pk foreign key (sto_id) references sto_situacao (sto_id);