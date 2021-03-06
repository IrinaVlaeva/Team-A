drop table if exists tests;
create table tests
(
    id			smallint unsigned not null auto_increment,
    publicationDate	date not null,
    title		varchar(255) not null,
    summary		text not null,
    content		text not null,

    primary key		(id)
);


CREATE TABLE `user`
(
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `login` TEXT(50),
    `e-mail` TEXT,
    `password` TEXT,
    `user_type` TINYINT,
    `is_activated` INT,
    `link` TEXT,
    PRIMARY KEY  (`user_id`)
);

CREATE TABLE `user_info`
(
    `user_id` INT,
    `name` TEXT,
    `country` TEXT,
    `sex` INT
);

ALTER TABLE `user_info` ADD CONSTRAINT `user_info_fk1` FOREIGN KEY (`user_id`) REFERENCES user(`user_id`);
