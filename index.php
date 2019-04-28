<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
                <a href="https://github.com/CrossCarrion/Prog07">Github Repo</a>
    			<h3>PHP CRUD for Prog07</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Make</th>
		                  <th>Model</th>
		                  <th>Year</th>
		                  <th>Color</th>
											<th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   require 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM vehicles ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
								echo "
									<tr>
										<td> " . $row['Make'] . "</td>
										<td> " . $row['Model'] . "</td>
										<td> " . $row['Year'] . "</td>
										<td> " . $row['Color'] . "</td>
										<td width=250> 
											<a class='btn' href='read.php?id=" . $row['ID'] . "'>Read</a>
											<a class='btn btn-success' href='update.php?id=" . $row['ID'] . "'>Update</a>
											<a class='btn btn-danger' href='delete.php?id=" . $row['ID'] . "'>Delete</a>
										</td>
									</tr>
								";
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
