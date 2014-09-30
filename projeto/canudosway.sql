SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `canudosway` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `canudosway` ;

-- -----------------------------------------------------
-- Table `canudosway`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`perfil` (
  `id_perfil` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_perfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `id_perfil` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `perfil_idx` (`id_perfil` ASC),
  CONSTRAINT `perfil`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `canudosway`.`perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`aluno` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(100) NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_aluno`),
  INDEX `usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `usuario_aluno`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `canudosway`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`curso` (
  `id_curso` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_curso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`disciplina` (
  `id_disciplina` INT NOT NULL AUTO_INCREMENT,
  `nome_disciplina` VARCHAR(100) NOT NULL,
  `horas` VARCHAR(45) NOT NULL,
  `semestre` INT NOT NULL,
  `ead` BIT NOT NULL,
  `pre_requisito` VARCHAR(500) NULL,
  `caracterizacao` VARCHAR(1000) NULL,
  `competencia_essencial` VARCHAR(1000) NULL,
  PRIMARY KEY (`id_disciplina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`aluno_curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`aluno_curso` (
  `id_aluno_curso` INT NOT NULL AUTO_INCREMENT,
  `id_aluno` INT NOT NULL,
  `id_curso` INT NOT NULL,
  PRIMARY KEY (`id_aluno_curso`),
  INDEX `aluno_idx` (`id_aluno` ASC),
  INDEX `curso_idx` (`id_curso` ASC),
  CONSTRAINT `aluno`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `canudosway`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `curso`
    FOREIGN KEY (`id_curso`)
    REFERENCES `canudosway`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`curso_disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`curso_disciplina` (
  `id_curso_disciplina` INT NOT NULL AUTO_INCREMENT,
  `id_curso` INT NOT NULL,
  `id_disciplina` INT NOT NULL,
  PRIMARY KEY (`id_curso_disciplina`),
  INDEX `curso_idx` (`id_curso` ASC),
  INDEX `disciplina_idx` (`id_disciplina` ASC),
  CONSTRAINT `curso_disciplina`
    FOREIGN KEY (`id_curso`)
    REFERENCES `canudosway`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `disciplina`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `canudosway`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`professor` (
  `id_professor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `curriculo` TEXT NULL,
  `id_usuario` INT NULL,
  PRIMARY KEY (`id_professor`),
  INDEX `usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `usuario_professor`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `canudosway`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`hashtag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`hashtag` (
  `id_hashtag` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(100) NULL,
  `peso` INT NULL,
  PRIMARY KEY (`id_hashtag`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`disciplina_hashtag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`disciplina_hashtag` (
  `id_disciplina_hashtag` INT NOT NULL AUTO_INCREMENT,
  `id_disciplina` INT NOT NULL,
  `id_hashtag` INT NOT NULL,
  PRIMARY KEY (`id_disciplina_hashtag`),
  INDEX `disciplina_hashtag_idx` (`id_disciplina` ASC),
  INDEX `hashtag_disciplina_idx` (`id_hashtag` ASC),
  CONSTRAINT `disciplina_hashtag`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `canudosway`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `hashtag_disciplina`
    FOREIGN KEY (`id_hashtag`)
    REFERENCES `canudosway`.`hashtag` (`id_hashtag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`cad_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`cad_turma` (
  `id_cad_turma` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(500) NULL,
  PRIMARY KEY (`id_cad_turma`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`turma` (
  `id_turma` INT NOT NULL AUTO_INCREMENT,
  `id_cad_turma` INT NOT NULL,
  `semestre` INT NOT NULL,
  `sala` VARCHAR(45) NULL,
  `turno` VARCHAR(45) NULL,
  PRIMARY KEY (`id_turma`),
  INDEX `cad_turma_idx` (`id_cad_turma` ASC),
  CONSTRAINT `cad_turma`
    FOREIGN KEY (`id_cad_turma`)
    REFERENCES `canudosway`.`cad_turma` (`id_cad_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`aluno_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`aluno_turma` (
  `id_aluno_turma` INT NOT NULL AUTO_INCREMENT,
  `id_aluno` INT NOT NULL,
  `id_turma` INT NOT NULL,
  PRIMARY KEY (`id_aluno_turma`),
  INDEX `aluno_idx` (`id_aluno` ASC),
  INDEX `turma_idx` (`id_turma` ASC),
  CONSTRAINT `aluno_turma`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `canudosway`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `turma_aluno`
    FOREIGN KEY (`id_turma`)
    REFERENCES `canudosway`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `canudosway`.`turma_disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canudosway`.`turma_disciplina` (
  `id_turma_disciplina` INT NOT NULL AUTO_INCREMENT,
  `id_turma` INT NOT NULL,
  `id_professor` INT NOT NULL,
  `id_disciplina` INT NOT NULL,
  `dia_semana` INT NOT NULL,
  PRIMARY KEY (`id_turma_disciplina`),
  INDEX `turma_disciplina_idx` (`id_turma` ASC),
  INDEX `disciplina_professor_idx` (`id_professor` ASC),
  INDEX `disciplina_turma_idx` (`id_disciplina` ASC),
  CONSTRAINT `turma_disciplina`
    FOREIGN KEY (`id_turma`)
    REFERENCES `canudosway`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `disciplina_professor`
    FOREIGN KEY (`id_professor`)
    REFERENCES `canudosway`.`professor` (`id_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `disciplina_turma`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `canudosway`.`disciplina` (`id_disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
