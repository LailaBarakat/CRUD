DROP TABLE IF EXISTS `Student`;
DROP TABLE IF EXISTS `Class`;
DROP TABLE IF EXISTS `Teacher`;


CREATE TABLE IF NOT EXISTS `Teacher` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `Class` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `location` varchar(100) NOT NULL,
    `name` varchar(100) NOT NULL,
    `teacherID` int(11),
    CONSTRAINT FK_teacherID FOREIGN KEY (`teacherID`) REFERENCES `Teacher` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `Student` (
     `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `first_name` varchar(100) NOT NULL,
     `last_name` varchar(100) NOT NULL,
     `email` varchar(100) NOT NULL,
     `classID` int(11),
     CONSTRAINT FK_classID FOREIGN KEY (`classID`) REFERENCES `Class` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;