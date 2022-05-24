//Creating Database

create database inventory_management_system;

//Creating Tables

create table inventory_management_system.admintable(
Username varchar(5),
Password varchar(8)
);

create table inventory_management_system.product(
product_id int
product_name varchar(50),
product_description varchar(50),
unit_price varchar(10),
unit int(30)
);

create table inventory_management_system.stock_information(
product_id int
product_name varchar(50),
product_description varchar(50),
purchased int(10),
sold int(10)
);

create table inventory_management_system.stockreport(
product_id int
product_name varchar(50),
product_description varchar(50),
unit_price varchar(10),
sold_today int(11),
sold_Month int(11)
);