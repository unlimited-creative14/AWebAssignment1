create table slider(
	id int PRIMARY KEY AUTO_INCREMENT,
    img longblob,
    b64type text(10),
    des text(1000)
);

create table partner(
    id int PRIMARY KEY AUTO_INCREMENT,
	namep text(50) not null UNIQUE,
    img longblob,
    b64type text(10),
    des text(1000)
);