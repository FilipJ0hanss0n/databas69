<?php
	$dbh = new mysqli("localhost", "dbUser", "hej123", "webbshop");

if(!$dbh)
{
	echo "Ingen kontakt med databasen";
	exit;
}

	$sql = "SELECT * FROM products";
	$res = $dbh->prepare($sql);
	$res->execute();
	$result=$res->get_result();

if(!$result)
{
	echo "Felaktiga SQL fråga";
	exit;
}
//$dbh->close();  //Stänger databasen

//var_dump($result);

while($row = $result->fetch_assoc())
{
	echo "<br>";
	echo $row['name'];
	echo $row['price']. " kronor";
}

	echo "<br><br>";;

	$sql = "SELECT users.username, customers.username, customers.firstname, customers.lastname, users.email FROM users JOIN customers WHERE users.username = customers.username";
	
	$res = $dbh->prepare($sql);
	$res->execute();
	$result=$res->get_result();
	
	echo "<table><tr><th>Anvnamn</th><th>Förnamn</th><th>Efternamn</th><th>Email</th></tr>";
	while($row = $result->fetch_assoc())
{
	echo "<tr><td>";
	echo $row['username'];
	echo "</td><td>";
	echo $row['firstname'];
	echo "</td><td>";
	echo $row['lastname'];
	echo "</td><td>";
	echo $row['email'];
	echo "</td></tr>";
	
	$sql = "SELECT orderID, productsID, antal, customerID FROM order JOIN users WHERE users.username = customer.usersname";
	echo "<tr><td>";
	echo $row['orderID'];
	echo "</td><td>";
	echo $row['ProductsID'];
	echo "</td><td>";
	echo $row['antal'];
	echo "</td><td>";
	echo $row['customerID'];
	echo "</td></tr>";
	
}
?>