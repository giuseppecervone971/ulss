<?php
    include_once('connection.php');
	$sql = "SELECT s.STUDENT_N, s.F_NAME, s.L_NAME, b.TITLE, b.ISBN, d.ID_COPY, d.LIBRARY_ID, d.STARTDATE, d.ENDDATE
	FROM STUDENT AS s INNER JOIN RENTED_BY d
	INNER JOIN BOOK AS b
	WHERE s.STUDENT_N = d.USER_ID AND b.ISBN = d.ISBN;";
	$result = mysqli_query($link, $sql);
	if(!$result) {
		echo "<p>Query error</p>";
		exit();
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
		  <h1 style="text-align:center;">AVAILABLE LOANS</h1>
		  <br>
		  <br>
		<h2>
		<table style="width:100%;font-size:25px">
				<thead>
					<tr>
						<th>ID</th>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
						<th>BOOK'S TITLE</th>
						<th>ISBN</th>
						<th>ID COPY</th>
						<th>ID LIBRARY</th>
						<th>START DATE</th>
						<th>END DATE</th>
						<th>MOD./DEL.</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($result)) { ?>
						<tr>
							<form action="loan.php" method="POST">
								<td>
									<input type="hidden" name="STUDENT_N" value="<?php echo $row['STUDENT_N']; ?>"><?php echo $row['STUDENT_N']; ?>
								</td>
								<td> <?php echo $row['F_NAME']; ?> </td>
								<td> <?php echo $row['L_NAME']; ?> </td>
								<td>
									<input type="hidden" name="TITLE" value="<?php echo $row['TITLE']; ?>"><?php echo $row['TITLE']; ?>
								</td>
								<td>
									<input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>"><?php echo $row['ISBN']; ?>
								</td>
								<td>
									<input type="hidden" name="ID_COPY" value="<?php echo $row['ID_COPY']; ?>"><?php echo $row['ID_COPY']; ?>
								</td>
								<td>
									<input type="hidden" name="LIBRARY_ID" value="<?php echo $row['LIBRARY_ID']; ?>"><?php echo $row['LIBRARY_ID']; ?>
								</td>
								<td> <?php echo $row['STARTDATE']; ?> </td>
								<td>
									<input type="hidden" name="ENDDATE" value="<?php echo $row['ENDDATE']; ?>"><?php echo $row['ENDDATE']; ?>
								</td>
								<td>
									<button class="btn btn-outline-info" style="width:100%;font-size:20px" type="submit" name="users">MOD./DEL.</button>
								</td>
							</form>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</h2>
  		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
