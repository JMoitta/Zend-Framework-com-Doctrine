create table `post` (
	`id` INTEGER PRIMARY KEY AUTOINCREMENT,
	`title` VARCHAR(255) NOT NULL,
	`content` TEXT NOT NULL
);
insert into `post`(`title`,`content`) values ('Post 1', 'Content 1'),
('Post 2', 'Content 2'),
('Post 3', 'Content 3'),
('Post 4', 'Content 4');

create table `comments` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `content` TEXT NOT NULL,
    `post_id` INTEGER NOT NULL
);

INSERT INTO `comments` (`content`, `post_id`)
values ('Comentário 1', '1'),
       ('Comentário 2', '1'),
       ('Comentário 3', '2'),
       ('Comentário 4', '2');
create table `users` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `username` VARCHAR (100) UNIQUE NOT NULL,
    `password` VARCHAR (60) NOT NULL,
    `full_name` VARCHAR (150) NOT NULL
);
INSERT INTO `users` (`username`, `password`, `full_name`)
VALUES('luiz@schoolofnet.com', '$2y$10$V5Q.muaQgS6QmnKQQZ1a/OEqq4MD1Ac6oE2V6k65hdyRZpDu/0WAu', 'Luiz Carlos');