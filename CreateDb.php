<?php

include ('Autoload.php');
include ("./Enums/TableName.enum.class.php");

$conn = new Connection();

//--------------- Create database  -------------------

try{

    $sqlCreateDb = "CREATE DATABASE IF NOT EXISTS ".$conn->get_dbName();
    $conn ->first_connection()->exec($sqlCreateDb);
    echo "Database created successfully<br>";

}catch(PDOException $e){
    echo "Connection Failed : ".$e->getMessage();
}

//--------------- Create table Address  -------------------
try{
    $sqlCreateTableAddress = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::ADDRESS."(
        addressId INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
        streetNum INT UNSIGNED NOT NULL,
        streetName VARCHAR(50) NOT NULL,
        appNum VARCHAR(10),
        city VARCHAR(50) NOT NULL,
        province VARCHAR(50) NOT NULL,
        postalCode VARCHAR (25) NOT NULL)";
    $conn ->connect()->exec($sqlCreateTableAddress);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}

//--------------- Create table Admin  -------------------
try{
    $sqlCreateTableAdmin = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::ADMIN."(
        adminId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        adminFirstName VARCHAR(50) NOT NULL,
        adminLastName VARCHAR(50) NOT NULL,
        addressId INT UNSIGNED,
        adminEmail VARCHAR(50) NOT NULL,
        adminPassword VARCHAR(50) NOT NULL,
        FOREIGN KEY(addressId) REFERENCES ".$conn->get_dbName().".".TableName::ADDRESS."(addressId));";
    $conn->connect()->exec($sqlCreateTableAdmin);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}

//--------------- Create table Resident  -------------------
try{
    $sqlCreateTableResident = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::RESIDENT."(
        residentId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        residentFirstName VARCHAR(50) NOT NULL,
        residentLastName VARCHAR(50) NOT NULL,
        addressId INT UNSIGNED,
        residentEmail VARCHAR(50) NOT NULL,
        residentPassword VARCHAR(50) NOT NULL,
        FOREIGN KEY(addressId) REFERENCES ".$conn->get_dbName().".".TableName::ADDRESS."(addressId));";
    $conn->connect()->exec($sqlCreateTableResident);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}

//--------------- Create table Book  -------------------
try{
    $sqlCreateTableBook = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::BOOK."(
        bookId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        bookAuthor VARCHAR(50) NOT NULL,
        bookTitle VARCHAR(50) NOT NULL,
        bookCategory VARCHAR(50) NOT NULL,
        bookEditor VARCHAR(50) NOT NULL,
        bookAvailabilityStatus VARCHAR(50) NOT NULL);";
    $conn->connect()->exec($sqlCreateTableBook);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}

//--------------- Create table Library  -------------------
try{
    $sqlCreateTableLibrary = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::LIBRARY."(
        libraryId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        libraryName VARCHAR(50) NOT NULL,
        addressId INT UNSIGNED NOT NULL,
        FOREIGN KEY(addressId) REFERENCES ".$conn->get_dbName().".".TableName::ADDRESS."(addressId));";

    $conn->connect()->exec($sqlCreateTableLibrary);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}

//--------------- Create table Inventory -------------------
try{
    $sqlCreateTableLibrairyInventory = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::INVENTORY."(
        inventoryId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        libraryId INT UNSIGNED,
        bookId INT UNSIGNED,
        availabilityStatus VARCHAR(50),
        FOREIGN KEY(libraryId) REFERENCES ".$conn->get_dbName().".".TableName::LIBRARY."(libraryId),
        FOREIGN KEY(bookId) REFERENCES ".$conn->get_dbName().".".TableName::BOOK."(bookId));";

    $conn->connect()->exec($sqlCreateTableLibrairyInventory);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}

//--------------- Create table Loan  -------------------
try{
    $sqlCreateTableBookLoan = "CREATE TABLE IF NOT EXISTS ".$conn->get_dbName().".".TableName::LOAN."(
        loanId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        residentId INT UNSIGNED,
        inventoryId INT UNSIGNED,
        loanDate DATE,
        returnDate DATE,
        loanStatus VARCHAR(50),
        FOREIGN KEY(residentId) REFERENCES ".$conn->get_dbName().".".TableName::RESIDENT."(residentId),
        FOREIGN KEY(inventoryId) REFERENCES ".$conn->get_dbName().".".TableName::INVENTORY."(inventoryId));";

    $conn->connect()->exec($sqlCreateTableBookLoan);
    echo "<br>Table created successfully<br>";

}catch(PDOException $e){
    echo "<br>Connection Failed : ".$e->getMessage();
}







?>

