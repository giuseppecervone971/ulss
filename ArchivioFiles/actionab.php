

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
			      <a class="dropdown-item" href="addbook.php">+ BOOK</a>
			  	</div>
			  </li>
			  <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> STATS </a>
			    <div class="dropdown-menu">
			      <a class="dropdown-item" href="stats.php">5 Langs</a>
			      <a class="dropdown-item" href="stats.php">Most Editor</a>
			      <a class="dropdown-item" href="stats.php">Most Author</a>
			      <a class="dropdown-item" href="stats.php">Stat 4</a>
			      <a class="dropdown-item" href="stats.php">Stat 5</a>
			    </div>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" href="loan.php">Example Loan</a>
			  </li>
			</ul>
  		</header>
  		<br>
  		<br>
  		<h1 style="text-align:center;">
		  <?php
                $link = mysqli_connect("127.0.0.1", "ada10", "Juventus.1992", "Biblioteca");

                if (!$link) {
                    echo "Failed connection with DB...";
                    echo "codice di errore...", mysqli_connect_errno(), PHP_EOL;
                    echo "messagio di errore...", mysqli_connect_error(), PHP_EOL;
                    exit(-1);
				}

				$TITLE = $_POST['TITLE'];
				$ISBN = $_POST['ISBN'];
				$LANGUAGE = $_POST['LANGUAGE'];
				$PUB_YEAR = $_POST['PUB_YEAR'];
				$FIRST_NAME = $_POST['FIRST_NAME'];
				$LAST_NAME = $_POST['LAST_NAME'];
				$PLACE_BIRTH = $_POST['PLACE_BIRTH'];
				$DATE_BIRTH = $_POST['DATE_BIRTH'];
				$EDITOR_ID = $_POST['EDITOR_ID'];
				$sql = "IF NOT EXISTS (SELECT ISBN FROM BOOK WHERE ISBN = $ISBN)
				BEGIN
				INSERT INTO BOOK VALUES ('$ISBN', '$PUB_YEAR', '$LANGUAGE', '$TITLE', 'SELECT EDITOR_ID from EDITOR where NAME = $EDITOR_NAME')
				INSERT INTO COPY VALUES ('1' , '$ISBN')
				INSERT INTO FOUND_IN VALUES ('1', '$ISBN', '$library');
						foreach($rows as $i=>$row) {
							$sql .=IF NOT EXISTS (SELECT FIRST_NAME, LAST_NAME FROM AUTHOR WHERE FIRST_NAME = $F_NAME AND LAST_NAME = $L_NAME)
								BEGIN
								INSERT AUTOHR(FIRST_NAME, LAST_NAME, PLACE_BIRTH, DATE_BIRTH) VALUES ($FIRST_NAME, $LAST_NAME, $PLACE_BIRTH, $DATE_BIRTH);
								INSERT INTO WRITTEN_BY('SELECT SSN FROM AUTHOR WHERE FIRST_NAME=$FIRST_NAME', '$ISBN');
								END
							}
				END
				ELSE
				BEGIN
				SELECT MAX(COPY_N) INTO @id FROM COPY WHERE ISBN = $ISBN;
				SET @id = @id+1;
				INSERT INTO COPY VALUES ('@id' , '$ISBN');
				INSERT INTO FOUND_IN VALUES ('@id', '$ISBN', '$library');
				END";
				$query = mysqli_query($link, $sql);
				if(!$query) {
					echo "<p>Si è verificato un errore</p>";
					exit();
				}
				echo "ADD BOOK successfully!", PHP_EOL;
                mysqli_close($link);
            ?>
  		</h1>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
