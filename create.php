<?php 
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$makeError = null;
		$modelError = null;
		$yearError = null;
		$colorError = null;
		
		// keep track post values
		$make = $_POST['make'];
		$model = $_POST['model'];
		$year = $_POST['year'];
		$color = $_POST['color'];
		
		// validate input
		$valid = true;
		if (empty($make)) {
			$makeError = 'Please enter a Make';
			$valid = false;
		}
		
		if (empty($model)) {
			$modelError = 'Please enter a Model';
			$valid = false;
		}

		if (empty($year)) {
			$yearError = 'Please enter a Year';
			$valid = false;
		}

		if (empty($color)) {
			$colorError = 'Please enter a Color';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO vehicles (Make,Model,Year,Color) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($make,$model,$year,$color));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Create a Vehicle</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Make</label>
					    <div class="controls">
					      	<input name="make" type="text"  placeholder="Make" value="<?php echo !empty($make)?$make:'';?>">
					      	<?php if (!empty($makeError)): ?>
					      		<span class="help-inline"><?php echo $makeError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($modelError)?'error':'';?>">
					    <label class="control-label">Model</label>
					    <div class="controls">
					      	<input name="model" type="text" placeholder="Model" value="<?php echo !empty($model)?$model:'';?>">
					      	<?php if (!empty($modelError)): ?>
					      		<span class="help-inline"><?php echo $modelError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
						<div class="control-group <?php echo !empty($yearError)?'error':'';?>">
					    <label class="control-label">Year</label>
					    <div class="controls">
					      	<input name="year" type="text" placeholder="Year" value="<?php echo !empty($year)?$year:'';?>">
					      	<?php if (!empty($yearError)): ?>
					      		<span class="help-inline"><?php echo $yearError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
						<div class="control-group <?php echo !empty($colorError)?'error':'';?>">
					    <label class="control-label">Color</label>
					    <div class="controls">
					      	<input name="color" type="text" placeholder="Color" value="<?php echo !empty($color)?$color:'';?>">
					      	<?php if (!empty($colorError)): ?>
					      		<span class="help-inline"><?php echo $colorError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>