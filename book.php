<?php
    include_once('connection.php');
	$TITLE=$_GET['TITLE'];
	$ISBN=$_GET['ISBN'];
	$PUB_YEAR=$_GET['PUB_YEAR'];
	$LANGUAGE=$_GET['LANGUAGE'];
	
	$sql = "SELECT a.FIRST_NAME, a.LAST_NAME, a.DATE_BIRTH, a.PLACE_BIRTH, e.NAME, COUNT(c.COPY_N)
	FROM BOOK as b INNER JOIN WRITTEN_BY AS w ON b.ISBN = w.BOOK_ID
	INNER JOIN AUTHOR AS a ON w.AUTHOR_ID = a.SSN
	INNER JOIN EDITOR AS e ON b.ID_EDITOR = e.EDITOR_ID
	INNER JOIN COPY AS c ON c.ISBN = b.ISBN
	WHERE b.ISBN = '$ISBN'
	GROUP BY a.SSN;";
	
	$query = mysqli_query($link, $sql);
	if(!$query) {
		echo "<p>Query error</p>";
		exit();
	}
	$FIRST_NAME = "";
	$LAST_NAME = "";
	$PLACE_BIRTH = "";
	$DATE_BIRTH = "";
	
	while ($row = mysqli_fetch_array($query)) {
		$FIRST = $row['FIRST_NAME'];
		$FIRST_NAME = $FIRST_NAME . $FIRST . ";" . " ";
		$LAST = $row['LAST_NAME'];
		$LAST_NAME = $LAST_NAME . $LAST . ";" . " ";
		$DATE = $row['DATE_BIRTH'];
		$DATE_BIRTH = $DATE_BIRTH . $DATE . ";" . " ";
		$PLACE = $row['PLACE_BIRTH'];
		$PLACE_BIRTH = $PLACE_BIRTH . $PLACE . ";" . " ";
		$NAME = $row['NAME'];
		$COPY_N = $row[5];
    }
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
  		<br>
  		<h1>
  			<form class="form-inline" action="" method="">
  				<div class="row">
    				<div class="form-group">
    					<label for="TITLE" class="col-sm-4 col-form-label">Title</label>
    					<div class="col">
      						<input type="text" name="TITLE" class="col-sm-10 form-control" value="<?php echo $TITLE;?>" placeholder="..." disabled style="background: grey">
    					</div>
				    </div>
  			 	</div>
  		  <br>
  		  <br>
				<div class="row">
					<div class="form-group">
						<label for="ISBN" class="col-sm-4 col-form-label">ISBN</label>
						<div class="col">
							<input type="text" name="ISBN" class="col-sm-10 form-control" value="<?php echo $ISBN;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="LANGUAGE" class="col-sm-4 col-form-label">Language</label>
						<div class="col">
							<input type="text" name="LANGUAGE" class="col-sm-10 form-control" value="<?php echo $LANGUAGE;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="PUB_YEAR" class="col-sm-4 col-form-label">Year Publ.</label>
						<div class="col">
							<input type="text" name="PUB_YEAR" class="col-sm-10 form-control" value="<?php echo $PUB_YEAR;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="FIRST_NAME" class="col-sm-4 col-form-label">Wr. Fname</label>
						<div class="col">
							<input type="text" name="FIRST_NAME" class="col-sm-10 form-control" value="<?php echo $FIRST_NAME;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="LAST_NAME" class="col-sm-4 col-form-label">Wr. Lname</label>
						<div class="col">
							<input type="text" name="LAST_NAME" class="col-sm-10 form-control" value="<?php echo $LAST_NAME;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="DATE_BIRTH" class="col-sm-4 col-form-label">Wr. DOB</label>
						<div class="col">
							<input type="text" name="DATE_BIRTH" class="col-sm-10 form-control" value="<?php echo $DATE_BIRTH;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="PLACE_BIRTH" class="col-sm-4 col-form-label">Wr. POB</label>
						<div class="col">
							<input type="text" name="PLACE_BIRTH" class="col-sm-10 form-control" value="<?php echo $PLACE_BIRTH;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
  		<br>
  		<br>
				<div class="row">
					<div class="form-group">
						<label for="EDITOR_ID" class="col-sm-4 col-form-label">Editor's name</label>
						<div class="col">
							<input type="text" name="EDITOR_ID" class="col-sm-10 form-control" value="<?php echo $NAME;?>" placeholder="..." disabled style="background: grey">
						</div>
					</div>
				</div>
			  <br>
			  <br>
			  <div class="row">
    			<div class="form-group">
    				<label for="N_COPIES" class="col-sm-4 col-form-label">Copies n.</label>
    					<div class="col">
      					<input type="text" name="N_COPIES" class="col-sm-10 form-control" value="<?php echo $COPY_N;?>" placeholder="..." disabled style="background: grey">
    				</div>
				</div>
			</div>
		</form>
	  </h1>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
