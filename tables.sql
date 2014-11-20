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