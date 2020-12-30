CREATE TABLE PRODUCT (
    PID INT,
    PNAME VARCHAR(40),
    IMG LONGBLOB,
    PRICE VARCHAR(40),
    USERID INT,
    OTHER VARCHAR(1000),
    PRIMARY KEY (PID)
);

create table slider(
	id int PRIMARY KEY AUTO_INCREMENT,
    img longblob,
    b64type text(10),
    des text(1000)
);
