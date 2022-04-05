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
                $id_choice = $_POST['id_choice'];
                echo "Matches for: ";
                echo $id_choice;
                $sql = "SELECT ISBN, TITLE, PUB_YEAR, LANGUAGE FROM BOOK WHERE TITLE LIKE '%$id_choice%';";
                $query = mysqli_query($link, $sql);
                if (!$query) {
                    echo "<p>Query error</p>";
                    exit();
                }
                mysqli_close($link);

            ?>
  		</h1>
        <br>
        <br>
        <h2>
        <table style="width:100%;font-size:28px;">
				<thead>
					<tr>
						<th>ISBN</th>
						<th>BOOK'S TITLE</th>
						<th>PUBL. YEAR</th>
						<th>LANG.</th>
						<th>USERS</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($query)) { ?>
						<tr>
							<form action="bookloans.php" method="POST">
								<td>
									<input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>"><?php echo $row['ISBN']; ?>
								</td>
								<td>
									<a href="book.php?TITLE=<?php echo $row['TITLE'];?>&ISBN=<?php echo $row['ISBN']; ?>&PUB_YEAR=<?php echo $row['PUB_YEAR']; ?>&LANGUAGE=<?php echo $row['LANGUAGE']; ?>">
									<input type="hidden" name="TITLE" value="<?php echo $row['TITLE']; ?>"><?php echo $row['TITLE']; ?>
								</td>
								<td> <?php echo $row['PUB_YEAR']; ?> </td>
								<td> <?php echo $row['LANGUAGE']; ?> </td>
								<td>
									<button class="btn btn-outline-info" style="width:100%;font-size:20px" type="submit" name="users">USERS</button>
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
