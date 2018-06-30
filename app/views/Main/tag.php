<?php


	if (empty($_GET['tag'])) {
		foreach ($result as $value) {
			echo $value['tag_name'] . "<br />";
		}
	}
	else
	{
		echo "По тегу <i><b>" . $_GET['tag'] . "</b></i> есть такие статьи: ";
		echo "<br />";
		echo "<br />";
		echo "<br />";

		foreach ($result as$value) {
			echo $value['name'] . "<br />";	
			echo $value['image'] . "<br />";	
			echo $value['hits'] . "<br />";	
			echo "<br />";
			echo "<br />";
		} 		
	}

?>