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
	}

	// die(debug($result));
?>

<?php foreach ($result as $value): ?>
	<a href="/news/index?id=<?= $value['id'] ?>&page=1"><?= $value['name'] ?></a>
	<p>Посещений: <?= $value['hits'] ?></p>
	<br />
	<br />
<?php endforeach; ?>