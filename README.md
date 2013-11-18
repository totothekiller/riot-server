riot-server
===========

Rich Internet Of Things : monitoring for multiple sensors



MYSQL Installation
-------------------------

    mysql -u root -p
    CREATE DATABASE riot_db;
    CREATE USER 'cakePhp'@'localhost' IDENTIFIED BY 'cakePhp';
    GRANT ALL PRIVILEGES ON riot_db.* To 'cakePhp'@'localhost' WITH GRANT OPTION;


Structure de la table `channels`


    CREATE TABLE IF NOT EXISTS `channels` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(50) NOT NULL,
      `description` text NOT NULL,
      `unit` varchar(15) NOT NULL,
      `sensorID` int(10) unsigned NOT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

