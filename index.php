<!DOCTYPE html>
<html>
<head>
	<title>shop</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
</head>
<body>

<div class="container my-5">
				<h2>List of clients</h2>
				<a class="btn btn-primary" href="create.php" role="button">New Client</a>
				<br>	
				<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>created_at</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "myshop"; 

		// create connection
		$connection = new mysqli($servername, $username, $password, $database);

		// check database
		if ($connection->connect_error) {
			die("connection failed: " . $connection->connect_error);
			# code...
		}

		// read all row from database table
		$sql = "SELECT * FROM clients";
		$result = $connection->query($sql);

		if(!$result) {
			die("Invalid query : " . $connection->error);
		}

		// read data of each row
		while ($row = $result->fetch_assoc()) {
			# code...
			echo "
			<tr>
			<td>$row[id]</td>
			<td>$row[name]</td>
			<td>$row[email]</td>
			<td>$row[phone]</td>
			<td>$row[address]</td>
			<td>$row[created_at]</td>
			<td>
				<a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
				<a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
			</td>
		</tr>
		";
		}
		?>
	</tbody>
</table>

</div>
</body>
</html>