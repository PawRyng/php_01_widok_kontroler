<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>
	<?php require_once dirname(__FILE__).'/../../component/menu.php'; ?>
<form action="/app/views/credit/calc.php" method="post">
	<label for="id_x">Kwota: </label>
	<input id="id_x" type="number" name="amount" value="<?= $amount ?? '' ?>" /><br />
	<label for="id_x">Lata: </label>
	<input id="id_x" type="number" name="years" value="<?= $years ?? '' ?>" /><br />

	<label for="id_op">Oprocentowanie: </label>
	<input id="id_op" type="text" name="interest"
		inputmode="decimal"
		pattern="[0-9]+([.,][0-9]+)?"
		title="Użyj przecinka lub kropki jako separatora dziesiętnego"
		value="<?= htmlspecialchars($interest ?? '', ENT_QUOTES) ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php if (isset($result)) : ?>
	<h4>Odsetki: <?= $result ?></h4>

<?php endif; ?>

</body>
</html>