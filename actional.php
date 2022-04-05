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
  		<h2 style="text-align:center;">
		  <?php
                include_once('connection.php');

				$STARTDATE = $_POST['STARTDATE'];
				$LIBRARY_ID = $_POST['LIBRARY_ID'];
				$STUDENT_N = $_POST['STUDENT_N'];
				$ISBN = $_POST['ISBN'];

				// query: select $isbn nella tabella dove hai il libro
				// se il suo risultato è
				
				$sql = "SELECT MAX(f.ID_COPY) INTO @copy FROM FOUND_IN AS f
				LEFT JOIN RENTED_BY AS r ON f.ID_BOOK = r.ISBN AND
				f.ID_COPY = r.ID_COPY AND f.LIBRARY_ID = r.LIBRARY_ID
				WHERE r.ID_COPY IS NULL AND f.ID_BOOK = '$ISBN' AND f.LIBRARY_ID = '$LIBRARY_ID';";
				$sql.= "SELECT DATE_ADD('$STARTDATE', INTERVAL 30 DAY) INTO @date;";
				$sql.= "INSERT INTO RENTED_BY VALUES ('$STUDENT_N', @copy, '$ISBN', '$LIBRARY_ID', '$STARTDATE', @date);";
				//$sql.= "SELECT * FROM RENTED_BY WHERE USER_ID = '$STUDENT_N' AND ISBN = '$ISBN' AND LIBRARY_ID = '$LIBRARY_ID' AND STARTDATE = '$STARTDATE';";

                $query = mysqli_multi_query($link, $sql);
				if(!$query) {
					echo "<p>Query error</p>";
					exit();
                }
                
                
                $sqlcheck = "SELECT * FROM RENTED_BY WHERE USER_ID = '$STUDENT_N' AND ISBN = '$ISBN' AND LIBRARY_ID = '$LIBRARY_ID' AND STARTDATE = '$STARTDATE';";
                
                $result = mysqli_query($link, $sqlcheck);
                $row = mysqli_fetch_array($result);
                if($row[1] == '') {
                    echo "Add Loan failed!\n";
				} else {
                    echo "Loaned by: " . $F_NAME . " " . $L_NAME;
					echo "</br>";
					echo "</br>";
					echo "Book: " . $TITLE;
					echo "</br>";
					echo "</br>";
					echo "Start date: " . $STARTDATE;
					echo "</br>";
					echo "</br>";
					echo "End date: " . " " . date('Y-m-d',strtotime('+30 days',strtotime($STARTDATE)));
				}

                mysqli_close($link);
    
            ?>
		  </h2>
		  <br>
		  <br>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
