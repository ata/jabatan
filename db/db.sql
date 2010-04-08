SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `pegawai`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pegawai` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `pegawai` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nip` VARCHAR(255) NULL ,
  `nama` VARCHAR(255) NULL ,
  `nskp` VARCHAR(255) NULL ,
  `tempat_lahir` VARCHAR(255) NULL ,
  `tanggal_lahir` DATE NULL ,
  `jabatan_peneliti` VARCHAR(255) NULL ,
  `tmt` DATE NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `dupak`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dupak` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `dupak` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nomor` VARCHAR(255) NULL ,
  `mp_mulai` DATE NULL ,
  `mp_selesai` VARCHAR(255) NULL ,
  `ka_subbag_id` BIGINT NOT NULL ,
  `pengusul_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `ka_subbag_id`, `pengusul_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_dupak_pegawai2` ON `dupak` (`ka_subbag_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_dupak_pegawai1` ON `dupak` (`pengusul_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `kenaikan_jabatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kenaikan_jabatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `kenaikan_jabatan` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `dupak_id` BIGINT NOT NULL ,
  `pegawai_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `dupak_id`, `pegawai_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_kenaikan_jabatan_dupak` ON `kenaikan_jabatan` (`dupak_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_kenaikan_jabatan_pegawai1` ON `kenaikan_jabatan` (`pegawai_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `unsur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unsur` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `unsur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `subunsur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `subunsur` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `subunsur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `unsur_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `unsur_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_subunsur_unsur1` ON `subunsur` (`unsur_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `kegiatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kegiatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `kegiatan` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `subunsur_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `subunsur_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_kegiatan_subunsur1` ON `kegiatan` (`subunsur_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `butir_kegiatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `butir_kegiatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `butir_kegiatan` (
  `id` BIGINT NOT NULL ,
  `nama` VARCHAR(255) NULL ,
  `kegiatan_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `kegiatan_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_butir_kegiatan_kegiatan1` ON `butir_kegiatan` (`kegiatan_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `dupak_butir_kegiatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dupak_butir_kegiatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `dupak_butir_kegiatan` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `ip_lama` BIGINT NULL ,
  `ip_baru` BIGINT NULL ,
  `ip_jumlah` BIGINT NULL ,
  `tp_lama` BIGINT NULL ,
  `tp_baru` BIGINT NULL ,
  `tp_jumlah` BIGINT NULL ,
  `butir_kegiatan_id` BIGINT NOT NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `butir_kegiatan_id`, `dupak_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_dupak_butir_kegiatan_butir_kegiatan1` ON `dupak_butir_kegiatan` (`butir_kegiatan_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_dupak_butir_kegiatan_dupak1` ON `dupak_butir_kegiatan` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `lampiran`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lampiran` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `lampiran` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `deskripsi` VARCHAR(255) NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `dupak_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_lampiran_dupak1` ON `lampiran` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `catatan_pengusul`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catatan_pengusul` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `catatan_pengusul` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `deskripsi` VARCHAR(255) NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `dupak_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_catatan_pengusul_dupak1` ON `catatan_pengusul` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `catatan_tim_penilai`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catatan_tim_penilai` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `catatan_tim_penilai` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `deskripsi` VARCHAR(255) NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `dupak_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_catatan_tim_penilai_dupak1` ON `catatan_tim_penilai` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `catatan_ketua_penilai`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catatan_ketua_penilai` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `catatan_ketua_penilai` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `deskripsi` VARCHAR(255) NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `dupak_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_catatan_ketua_penilai_dupak1` ON `catatan_ketua_penilai` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `penilai`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `penilai` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `penilai` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `pegawai_id` BIGINT NOT NULL ,
  `ketua` TINYINT(1) NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`, `dupak_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_penilai_pegawai1` ON `penilai` (`pegawai_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_penilai_dupak1` ON `penilai` (`dupak_id` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
