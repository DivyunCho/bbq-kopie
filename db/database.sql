@ -0,0 +1,44 @@
/* 
database:

gallery
ID (PK)
image
packages
ID (PK)
price
banner (image)
Description
orders:
ID (PK)
Name
Email
Phone
Date
Count
package (FK)
Comment
*/

CREATE DATABASE IF NOT EXISTS Bbq_kar;
use Bbq_kar;
CREATE TABLE gallery (
    id INT PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(255) NOT NULL
);
CREATE TABLE packages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    price DECIMAL(10, 2) NOT NULL,
    banner VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL
);
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    date DATE NOT NULL,
    count INT NOT NULL,
    package INT,
    comment TEXT,
    FOREIGN KEY (package) REFERENCES packages(id)
);
create table home(
    header varchar (255) not null,
    description varchar (255) not null,
)