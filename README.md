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
      `sensor` int(10) unsigned NOT NULL,
     PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


Structure de la table `points`

    CREATE TABLE IF NOT EXISTS `points` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `value` float NOT NULL,
      `channel_id` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `channel_id` (`channel_id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


Usage
-------------------------

To add point use this GET request :


    http://www.example.com/points/add/{sensorID}/{sensorValue}

Example :

Add point from sensor '42' with value '23.05'

    http://www.example.com/points/add/42/23.05
