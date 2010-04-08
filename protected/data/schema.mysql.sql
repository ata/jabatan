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
  `bidang_kepakaran` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `kenaikan_jabatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kenaikan_jabatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `kenaikan_jabatan` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `pegawai_id` BIGINT NOT NULL ,
  `jabatan_sebelumnya` VARCHAR(255) NULL ,
  `jabatan_tujuan` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_kenaikan_jabatan_pegawai`
    FOREIGN KEY (`pegawai_id` )
    REFERENCES `pegawai` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_kenaikan_jabatan_pegawai` ON `kenaikan_jabatan` (`pegawai_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `jenis_dupak`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jenis_dupak` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `jenis_dupak` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;

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
  `kenaikan_jabatan_id` BIGINT NOT NULL ,
  `jenis_dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_dupak_kenaikan_jabatan1`
    FOREIGN KEY (`kenaikan_jabatan_id` )
    REFERENCES `kenaikan_jabatan` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dupak_jenis_dupak1`
    FOREIGN KEY (`jenis_dupak_id` )
    REFERENCES `jenis_dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_dupak_kenaikan_jabatan1` ON `dupak` (`kenaikan_jabatan_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_dupak_jenis_dupak1` ON `dupak` (`jenis_dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `unsur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unsur` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `unsur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `jenis_dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_unsur_jenis_dupak1`
    FOREIGN KEY (`jenis_dupak_id` )
    REFERENCES `jenis_dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_unsur_jenis_dupak1` ON `unsur` (`jenis_dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `sub_unsur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sub_unsur` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `sub_unsur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `unsur_id` BIGINT NOT NULL ,
  `jenis_dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_subunsur_unsur1`
    FOREIGN KEY (`unsur_id` )
    REFERENCES `unsur` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_subunsur_jenis_dupak1`
    FOREIGN KEY (`jenis_dupak_id` )
    REFERENCES `jenis_dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_subunsur_unsur1` ON `sub_unsur` (`unsur_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_subunsur_jenis_dupak1` ON `sub_unsur` (`jenis_dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `kegiatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kegiatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `kegiatan` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `sub_unsur_id` BIGINT NOT NULL ,
  `jenis_dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_kegiatan_subunsur1`
    FOREIGN KEY (`sub_unsur_id` )
    REFERENCES `sub_unsur` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_kegiatan_jenis_dupak1`
    FOREIGN KEY (`jenis_dupak_id` )
    REFERENCES `jenis_dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_kegiatan_subunsur1` ON `kegiatan` (`sub_unsur_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_kegiatan_jenis_dupak1` ON `kegiatan` (`jenis_dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `butir_kegiatan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `butir_kegiatan` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `butir_kegiatan` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `jenis_dupak_id` BIGINT NOT NULL ,
  `kegiatan_id` BIGINT NOT NULL ,
  `parent_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_butir_kegiatan_jenis_dupak1`
    FOREIGN KEY (`jenis_dupak_id` )
    REFERENCES `jenis_dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_butir_kegiatan_kegiatan1`
    FOREIGN KEY (`kegiatan_id` )
    REFERENCES `kegiatan` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_butir_kegiatan_butir_kegiatan1`
    FOREIGN KEY (`parent_id` )
    REFERENCES `butir_kegiatan` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_butir_kegiatan_jenis_dupak1` ON `butir_kegiatan` (`jenis_dupak_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_butir_kegiatan_kegiatan1` ON `butir_kegiatan` (`kegiatan_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_butir_kegiatan_butir_kegiatan1` ON `butir_kegiatan` (`parent_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `nilai`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nilai` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `nilai` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `ip_lama` BIGINT NULL ,
  `ip_baru` BIGINT NULL ,
  `ip_jumlah` BIGINT NULL ,
  `tp_lama` BIGINT NULL ,
  `tp_baru` BIGINT NULL ,
  `tp_jumlah` BIGINT NULL ,
  `butir_kegiatan_id` BIGINT NOT NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_nilai_butir_kegiatan1`
    FOREIGN KEY (`butir_kegiatan_id` )
    REFERENCES `butir_kegiatan` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_nilai_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_nilai_butir_kegiatan1` ON `nilai` (`butir_kegiatan_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_nilai_dupak1` ON `nilai` (`dupak_id` ASC) ;

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
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_lampiran_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

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
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_catatan_pengusul_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

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
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_catatan_tim_penilai_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

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
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_catatan_ketua_penilai_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

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
  `ketua` TINYINT(1) NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_penilai_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_penilai_dupak1` ON `penilai` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `kti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kti` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `kti` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(255) NULL ,
  `kenaikan_jabatan_id` BIGINT NOT NULL ,
  `dupak_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_kti_kenaikan_jabatan1`
    FOREIGN KEY (`kenaikan_jabatan_id` )
    REFERENCES `kenaikan_jabatan` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_kti_dupak1`
    FOREIGN KEY (`dupak_id` )
    REFERENCES `dupak` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_kti_kenaikan_jabatan1` ON `kti` (`kenaikan_jabatan_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_kti_dupak1` ON `kti` (`dupak_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `karya_ilmiah`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `karya_ilmiah` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `karya_ilmiah` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `judul` TEXT NULL ,
  `p2jp_instansi` INT(11) NULL ,
  `p2jp_lipi` INT(11) NULL ,
  `keterangan` TEXT NULL ,
  `kti_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_karya_ilmiah_kti1`
    FOREIGN KEY (`kti_id` )
    REFERENCES `kti` (`id` )
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = MyISAM;

SHOW WARNINGS;
CREATE INDEX `fk_karya_ilmiah_kti1` ON `karya_ilmiah` (`kti_id` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
