<?php

	$link = mysqli_connect("127.0.0.1", "ada10", "Juventus.1992", "Biblioteca");

	if(!$link) {

		echo "codice di errore...", mysqli_connect_errno(), PHP_EOL;
		echo "messagio di errore...", mysqli_connect_error(), PHP_EOL;
		exit(-1);

	}

	echo "ok", PHP_EOL;

	mysqli_close($link);

?>