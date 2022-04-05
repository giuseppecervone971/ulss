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
  		<h1 style="text-align:center;">
  			<?php
				include_once('connection.php');
				$STUDENT_N = $_POST['STUDENT_N'];
				$F_NAME = $_POST['F_NAME'];
				$L_NAME = $_POST['L_NAME'];
				$PHONE_N = $_POST['PHONE_N'];
				$STREET = $_POST['STREET'];
				$NUM = $_POST['NUM'];
				$CITY = $_POST['CITY'];
				$PS = $_POST['PS'];
				$sql = "";
				 if (!empty($F_NAME)){
                    $sql.= "UPDATE STUDENT
                    SET F_NAME = '$F_NAME'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
                if (!empty($L_NAME)) {
                    $sql.= "UPDATE STUDENT
                    SET L_NAME = '$L_NAME'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
                if (!empty($PHONE_N)) {
                    $sql.= "UPDATE STUDENT
                    SET PHONE_N = '$PHONE_N'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
				if(!empty($STREET)) {
                    $sql.= "UPDATE STUDENT
                    SET STREET = '$STREET'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
                if(!empty($NUM)) {
                    $sql.= "UPDATE STUDENT
                    SET NUM = '$NUM'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
                if(!empty($CITY)) {
                    $sql.= "UPDATE STUDENT
                    SET CITY = '$CITY'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
                if(!empty($PS)) {
                    $sql.= "UPDATE STUDENT
                    SET PS = '$PS'
                    WHERE STUDENT_N = '$STUDENT_N';";
                }
				$query = mysqli_multi_query($link, $sql);

				if(!$query) {
					echo "<p>Query error</p>";
					exit();
				}
				echo "Modify successfully!";
				echo "<br>";
				if (!empty($F_NAME)){
					echo "<br>";
					echo "New F. name: " . $F_NAME;
					echo "<br>";
				}
				if (!empty($L_NAME)) {
					echo "<br>";
					echo "New L. name: " . $L_NAME;
					echo "<br>";
				}
				if (!empty($PHONE_N)) {
					echo "<br>";
					echo "New Phone N.: " . $PHONE_N;
					echo "<br>";
				}
				if(!empty($STREET)) {
					echo "<br>";
					echo "New Street Address: " . $STREET;
					echo "<br>";
				}
                if(!empty($NUM)) {
                    echo "<br>";
                    echo "New Street Number: " . $NUM;
                    echo "<br>";
                }
                if(!empty($CITY)) {
                    echo "<br>";
                    echo "New City: " . $CITY;
                    echo "<br>";
                }
                if(!empty($PS)) {
                    echo "<br>";
                    echo "New Postal Code: " . $PS;
                    echo "<br>";
                }

				mysqli_close($link);
			?>
		  </h1>
		  <h2>

		  </h2>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
