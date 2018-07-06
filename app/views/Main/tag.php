<?= $check; ?>
<br />
<br />
<?php foreach ($result as $value): ?>
	<a href="<?= $path ?><?= $value[$val] ?>&page=1"><?= $value[$name] ?></a>
	<?php if(isset($value['hits'])) :?>
		<p>Посещений: <?= $value['hits'] ?></p>
	<?php endif; ?>
	<br />
	<br />
<?php endforeach; ?>