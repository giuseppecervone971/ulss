<?php
    include_once('connection.php');
	$STUDENT_N = $_GET['STUDENT_N'];
	$F_NAME=$_GET['F_NAME'];
	$L_NAME=$_GET['L_NAME'];
	$STREET=$_GET['STREET'];
	$NUMBER=$_GET['NUMBER'];
	$CITY=$_GET['CITY'];
	$PS=$_GET['PS'];
	$PHONE_N=$_GET['PHONE_N'];
?>

<!DOCTYPE html>
<html lang="it">

	<head>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 		crossorigin="anonymous"></script>
		<link rel="shortcut icon" type="image/png" href="ulsslogo.png">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<title>HomePage UnifeLibrarySimulationSystem</title>
	</head>

	<body style="background-color:#1A242F;color: white;">
		<header style="text-align:center;background-color:#000116;margin-bottom: 0px;margin-top: 0px">
			<a href="index.php"> <img src="ulss.png" alt="index.php" width="100" height="100"></a>
			<ul class="nav nav-tabs">
				<a class="navbar-brand"><img src="ulsslogo.png" height="40"></a>
		  		<li class="nav-item">
		  		  	<a class="nav-link active" href="branches.php">BRANCHES</a>
			  	</li>
			  	<li class="nav-item dropdown">
			   		<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> ADD... </a>
			   		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		      			<a class="dropdown-item" href="addloan.php">+ LOAN</a>
		      			<a class="dropdown-item" href="adduser.php">+ USER</a>
	  		  		</div>
			  	</li>
			  	<li class="nav-item dropdown">
			   		<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> STATS </a>
			   		<div class="dropdown-menu">
		      			<a class="dropdown-item" href="stats1.php">Stats 5 Lang.</a>
		      			<a class="dropdown-item" href="stats2.php">Stats Editor</a>
				    	<a class="dropdown-item" href="stats3.php">Stats Author</a>
			      		<a class="dropdown-item" href="stats4.php">Stat Library</a>
			      		<a class="dropdown-item" href="stats5.php">Stats Copies</a>
			    	</div>
			  	</li>
		  		<li class="nav-item">
		    		<a class="nav-link active" href="loans.php">Av. Loans</a>
				</li>
			</ul>
  		</header>
  		<br>
		<br>
		<h1 style="text-align: center;"><?php echo "ID: " . $STUDENT_N; ?></h1>
		<br>
  		<h2>
  			<form class="form-inline" action="actionuser.php" method="POST">
					<div class="row">
						<div class="form-group">
							<label for="F_NAME" class="col-sm-4 col-form-label">New First name</label>
							<div class="col">
								<input type="text" name="F_NAME" class="col-sm-10 form-control" value="" placeholder="...">
							</div>
						</div>
						<div class="form-group">
							<label for="F_NAME" class="col-sm-4 col-form-label">Current First name</label>
						<div class="col">
							<input type="text" name="F_NAME" class="col-sm-10 form-control" value="<?php echo $F_NAME;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="form-group">
						<label for="L_NAME" class="col-sm-4 col-form-label">New Last name</label>
						<div class="col">
							<input type="text" name="L_NAME" class=" col-sm-10 form-control" value="" placeholder="...">
						</div>
					</div>
					<div class="form-group">
						<label for="L_NAME" class="col-sm-4 col-form-label">Current Last name</label>
						<div class="col">
							<input type="text" name="L_NAME" class="col-sm-10 form-control" value="<?php echo $L_NAME;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="form-group">
						<label for="PHONE_N" class="col-sm-4 col-form-label">New Telephone</label>
						<div class="col">
							<input type="text" name="PHONE_N" class="col-sm-10 form-control" value="" placeholder="...">
						</div>
					</div>
					<div class="form-group">
						<label for="PHONE_N" class="col-sm-4 col-form-label">Current Telephone</label>
						<div class="col">
							<input type="text" name="PHONE_N" class="col-sm-10 form-control" value="<?php echo $PHONE_N;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="form-group">
						<label for="STREET" class="col-sm-4 col-form-label">New Street</label>
						<div class="col">
							<input type="text" name="STREET" class="col-sm-10 form-control" value="" placeholder="...">
						</div>
					</div>
					<div class="form-group">
						<label for="STREET" class="col-sm-4 col-form-label">Current Street</label>
						<div class="col">
							<input type="text" name="STREET" class="col-sm-10 form-control" value="<?php echo $STREET;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="form-group">
						<label for="NUMBER" class="col-sm-4 col-form-label">New Number</label>
						<div class="col">
							<input type="text" name="NUMBER" class="col-sm-10 form-control" value="" placeholder="...">
						</div>
					</div>
					<div class="form-group">
						<label for="NUMBER" class="col-sm-4 col-form-label">Current Number</label>
						<div class="col">
							<input type="text" name="NUMBER" class="col-sm-10 form-control" value="<?php echo $NUMBER;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="form-group">
						<label for="CITY" class="col-sm-4 col-form-label">New City</label>
						<div class="col">
							<input type="text" name="CITY" class="col-sm-10 form-control" value="" placeholder="...">
						</div>
					</div>
					<div class="form-group">
						<label for="CITY" class="col-sm-4 col-form-label">Current City</label>
						<div class="col">
							<input type="text" name="CITY" class="col-sm-10 form-control" value="<?php echo $CITY;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="form-group">
						<label for="PS" class="col-sm-4 col-form-label">New Postal Code</label>
						<div class="col">
							<input type="text" name="PS" class="col-sm-10 form-control" value="" placeholder="...">
						</div>
					</div>
					<div class="form-group">
						<label for="PS" class="col-sm-4 col-form-label">Current Postal Code</label>
						<div class="col">
							<input type="text" name="PS" class="col-sm-10 form-control" value="<?php echo $PS;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
		</h2>
		<br>
		<br>
		<h3>
				<input type="hidden" name="STUDENT_N" value="<?php echo $STUDENT_N; ?>">
				<button type="submit" class="mx-5 btn btn-primary">Modify</button>
  		</form>
      		<form action="deleteuser.php?" method="POST">
			  	<input type="hidden" name="STUDENT_N" value="<?php echo $STUDENT_N; ?>">
        		<button type="submit" class="mx-5 btn btn-secondary" style="display: inline-block">Delete</button>
      	</form>
		</h3>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
