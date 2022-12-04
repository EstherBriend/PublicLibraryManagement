<?php
include('Autoload.inc.php');
include("./Enums/TableName.enum.class.php");
include("./Enums/AvailabilityStatus.enum.php");
include("./Enums/LiteraryGenre.enum.php");
include("./Enums/LoansStatus.enum.php");

$conn = new Connection();

//--------------- Insert data into Address ---------------
try {
    $sqlInsertAddress1 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
        streetNum, streetName, appNum, city, province, postalCode) VALUES (465,'Avenue du MontRoyal','-','Montreal','QC','H2J 1W3')";

    $sqlInsertAddress2 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
        streetNum, streetName, appNum, city, province, postalCode) VALUES (3131,'Boulevard Rosemont','-','Montreal','QC','H1Y 1M4')";

    $sqlInsertAddress3 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
        streetNum, streetName, appNum, city, province, postalCode) VALUES (278,'Rue Sherbrooke O','Ap 2005','Montreal','QC','H2X 1X9')";

    $sqlInsertAddress4 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
            streetNum, streetName, appNum, city, province, postalCode) VALUES (801,'Rue Sherbrooke O','-','Montreal','QC','H3A 0B8')";

    $sqlInsertAddress5 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
            streetNum, streetName, appNum, city, province, postalCode) VALUES (549,'Rue de la Commune O','Ap 115','Montreal','QC','H3C 5X5')";

    $sqlInsertAddress6 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
            streetNum, streetName, appNum, city, province, postalCode) VALUES (87,'Rue Prince','Ap 12','Montreal','QC','H3C 2M7')";

    $sqlInsertAddress7 = "INSERT INTO " . $conn->get_dbName() . "." . TableName::ADDRESS. "(
            streetNum, streetName, appNum, city, province, postalCode) VALUES (120,'Blvd Robert-Bourassa','-','Montreal','QC','H3C 2L4')";

    $conn->connect()->exec($sqlInsertAddress1);
    $conn->connect()->exec($sqlInsertAddress2);
    $conn->connect()->exec($sqlInsertAddress3);
    $conn->connect()->exec($sqlInsertAddress4);
    $conn->connect()->exec($sqlInsertAddress5);
    $conn->connect()->exec($sqlInsertAddress6);
    $conn->connect()->exec($sqlInsertAddress7);

    echo "Addresses added!";

} catch (PDOException $e) {
    echo $e;
}

//--------------- Insert data into Admin ---------------
try{
    $sqlInsertAdmin1 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::ADMIN. "(adminFirstName, adminLastName, addressId, adminEmail, adminPassword)
    VALUES ( 'Michelle', 'Dupont', 4, 'm.dupont@gmail.com','123');";

    $sqlInsertAdmin2 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::ADMIN. "(adminFirstName, adminLastName, addressId, adminEmail, adminPassword)
    VALUES ( 'Emanuelle', 'Matin', 5, 'e.matin@gmail.com','123');";

    $conn->connect()->exec($sqlInsertAdmin1);
    $conn->connect()->exec($sqlInsertAdmin2);
    
    echo "<br>Admin added!";

} catch (PDOException $e) {
    echo $e;
}

//---------------Insert data into Book ---------------
try{
    $sqlInsertBook1 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::BOOK. "(bookAuthor, bookTitle, bookCategory, bookEditor)
    VALUES ('J.K Rowling','Harry Potter', '".LiteraryGenre::FICTION."', 'Folio Junior');";
    $sqlInsertBook2 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::BOOK. "(bookAuthor, bookTitle, bookCategory, bookEditor)
    VALUES ('Laclos','Les Liaisons dangereuses','".LiteraryGenre::FICTION."', 'Le livre de poche');";
    $sqlInsertBook3 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::BOOK. "(bookAuthor, bookTitle, bookCategory, bookEditor)
    VALUES ('Georges Duby','Seigneurs et paysans', '".LiteraryGenre::HUMANITIES."', 'Flammarion');";
    $sqlInsertBook4 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::BOOK. "(bookAuthor, bookTitle, bookCategory, bookEditor)
    VALUES ('Denis Buican','Mendel dans l''histoire de la génétique', '".LiteraryGenre::SCIENCE."', 'Flammarion');";
    $sqlInsertBook5 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::BOOK. "(bookAuthor, bookTitle, bookCategory, bookEditor)
    VALUES ('Meik Wiking','The Little Book of Hygge: The Danish Way to Live Well', '".LiteraryGenre::WELLBEING."', 'Flammarion');";

    $conn->connect()->exec($sqlInsertBook1);
    $conn->connect()->exec($sqlInsertBook2);
    $conn->connect()->exec($sqlInsertBook3);
    $conn->connect()->exec($sqlInsertBook4);
    $conn->connect()->exec($sqlInsertBook5);
    
    echo "<br>Book added!";

} catch (PDOException $e) {
    echo $e;
}

//--------------- Insert Data into Library ---------------

try{
    $sqlInsertLibrary1 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LIBRARY. "(libraryName, addressId)
    VALUES ('Bibliothèque du Plateau-Mont-Royal', 1);";
    $sqlInsertLibrary2 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LIBRARY. "(libraryName, addressId)
    VALUES ('Bibliothèque de Rosemont', 2);";

    $conn->connect()->exec($sqlInsertLibrary1);
    $conn->connect()->exec($sqlInsertLibrary2);

    echo "<br>Library added!";

} catch (PDOException $e) {
    echo $e;
}

//--------------- Insert Data into LibraryInventory ---------------
try{
    $sqlInsertInventory1 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (1, 1, '".AvailabilityStatus::UNAVAILABLE."');";
    $sqlInsertInventory2 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (1, 4, '".AvailabilityStatus::UNAVAILABLE."');";
    $sqlInsertInventory3 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (1, 5, '".AvailabilityStatus::UNAVAILABLE."');";
    $sqlInsertInventory4 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (2, 5, '".AvailabilityStatus::UNAVAILABLE."');";
    $sqlInsertInventory5 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (2, 2, '".AvailabilityStatus::UNAVAILABLE."');";
    $sqlInsertInventory6 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (2, 3, '".AvailabilityStatus::UNAVAILABLE."');";
    $sqlInsertInventory7 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (2, 1, '".AvailabilityStatus::AVAILABLE."');";
    $sqlInsertInventory8 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::INVENTORY. "(libraryId, bookId, availabilityStatus)
    VALUES (1, 3, '".AvailabilityStatus::AVAILABLE."');";

    $conn->connect()->exec($sqlInsertInventory1);
    $conn->connect()->exec($sqlInsertInventory2);
    $conn->connect()->exec($sqlInsertInventory3);
    $conn->connect()->exec($sqlInsertInventory4);
    $conn->connect()->exec($sqlInsertInventory5);
    $conn->connect()->exec($sqlInsertInventory6);
    $conn->connect()->exec($sqlInsertInventory7);
    $conn->connect()->exec($sqlInsertInventory8);


    echo "<br>Inventory added!";

} catch (PDOException $e) {
    echo $e;
}

//--------------- Insert Data into Resident ---------------
try{
    $sqlInsertResident1 = "INSERT INTO ". $conn->get_dbName().".". TableName::RESIDENT. "(residentFirstName, residentLastName, addressId, residentEmail, residentPassword)
    VALUES ('Jeanne', 'Smith', 3, 'j.smith@gmail.com', '123');";
    $sqlInsertResident2 = "INSERT INTO ". $conn->get_dbName().".". TableName::RESIDENT. "(residentFirstName, residentLastName, addressId, residentEmail, residentPassword)
    VALUES ('Lucie', 'Garemont', 6, 'l.garemont@gmail.com', '123');";
    $sqlInsertResident3 = "INSERT INTO ". $conn->get_dbName().".". TableName::RESIDENT. "(residentFirstName, residentLastName, addressId, residentEmail, residentPassword)
    VALUES ('Hector', 'Lepuit', 7, 'h.lepuit@gmail.com', '123');";

    $conn->connect()->exec($sqlInsertResident1);
    $conn->connect()->exec($sqlInsertResident2);
    $conn->connect()->exec($sqlInsertResident3);

    echo "<br>Resident added!";

}catch (PDOException $e) {
    echo $e;
}


//--------------- Insert Data into loan ---------------
try{
    $sqlInsertLoan1 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LOAN. "(residentId, inventoryId, loanDate, returnDate, loanStatus)
    VALUES (1, 1, '2022-11-10', '2022-12-10', '".LoanStatus::ONGOING."');";
    $sqlInsertLoan2 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LOAN. "(residentId, inventoryId, loanDate, returnDate, loanStatus)
    VALUES (1, 4, '2022-11-17', '2022-12-17', '".LoanStatus::ONGOING."');";
    $sqlInsertLoan3 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LOAN. "(residentId, inventoryId, loanDate, returnDate, loanStatus)
    VALUES (2, 6, '2022-10-08', '2022-11-08', '".LoanStatus::LATE."');";
    $sqlInsertLoan4 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LOAN. "(residentId, inventoryId, loanDate, returnDate, loanStatus)
    VALUES (3, 2, '2022-11-10', '2022-12-10', '".LoanStatus::ONGOING."');";
    $sqlInsertLoan5 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LOAN. "(residentId, inventoryId, loanDate, returnDate, loanStatus)
    VALUES (3, 5, '2022-12-01', '2023-01-01', '".LoanStatus::ONGOING."');";
    $sqlInsertLoan6 = "INSERT INTO ". $conn->get_dbName() . "." . TableName::LOAN. "(residentId, inventoryId, loanDate, returnDate, loanStatus)
    VALUES (2, 3, '2022-11-29', '2022-12-29', '".LoanStatus::ONGOING."');";

    $conn->connect()->exec($sqlInsertLoan1);
    $conn->connect()->exec($sqlInsertLoan2);
    $conn->connect()->exec($sqlInsertLoan3);
    $conn->connect()->exec($sqlInsertLoan4);
    $conn->connect()->exec($sqlInsertLoan5);
    $conn->connect()->exec($sqlInsertLoan6);

    echo "<br>Loan added!";

}catch (PDOException $e) {
    echo $e;
}

?>

