<?php

$string = file_get_contents( "lib/data/portfolio.json", true );
$coins = json_decode( $string, true );
ksort($coins['coins']);
?>
<html>
	<head>
		<title>CRYPTOFOLIO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Mono" >
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="lib/css/c3.min.css">
		<link rel="stylesheet" type="text/css" href="lib/css/datepicker.min.css">
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js" charset="utf-8"></script>
		<script src="lib/js/c3.min.js"></script>
		<script src="lib/js/jquery.color.min.js"></script>
		<script src="lib/js/jquery.cookie.js"></script>
		<script src="lib/js/datepicker.min.js"></script>
		<script src="lib/js/script.js"></script>
	</head>
<body>
	<div class='menu'>
		<a href="#" id="switchtheme">
			<i class="fa fa-adjust" aria-hidden="true"></i>
		</a>
		<a href='#' id='addcoin'>
			<i class="fa fa-plus-circle" aria-hidden="true"></i>
		</a>
	
	</div>
	<h1>CRYPTOFOLIO</h1>
	<table class='totals'>
		<tr>
			<th>INVESTMENT</th>
			<th>P/L</th>
			<th>TOTAL</th>
		</tr>
		<tr class='noborder'>
			<td><span id="total"></span></td>
			<td><span id="profit"></span><span id="profitpct"></span></td>
			<td><span id="currentvalue"></span></td>
		</tr>
	</table>

<div class="frame">
	<div id="holder">
		<table>
			<th colspan=2>coin</th>
			<th>price</th>
			<th>24hrs</th>
			<th>P/L</th>
			<?php
			foreach ($coins['coins'] as $symbol => $value) {
				echo "<tr id='". $symbol ."' class='item'>".PHP_EOL;
				echo "<td class='symbol'>".PHP_EOL;
				echo "<a href='portfolio.php?action=remove&symbol=".$symbol."' onclick=\"return confirm('Remove ".$symbol." \\nAre you sure?')\">".PHP_EOL;
				echo "<img class='imgholder' src='#' />".PHP_EOL;
				echo "</a></td>".PHP_EOL;
				echo "<td class='symbolname'><span class='symbolholder'>".$value['name']." (".$symbol .")</span>".PHP_EOL;
				echo "<td class='currentprice'><span class='price'></span><br/>".PHP_EOL;
				echo "<td class='tdchange'><span class='change'></span></td>".PHP_EOL;
				echo "<td class='pl'>".PHP_EOL;
				echo "<span class='updown'></span>".PHP_EOL;
				echo "<span class='owned'>". $value['owned'] . "</span>".PHP_EOL;
				echo "<span class='paid'>". $value['paid'] . "</span>".PHP_EOL;
				echo "</td>".PHP_EOL;
				echo "</tr>".PHP_EOL;
			}
			?>
		</table>
	</div>
</div>
<div id="coinform">
		<form action="portfolio.php" method="get">
			<h1>Add Coin</h1>
			<table>
				<tr>
					<td>Coin:</td>
					<td><input type='text' value='' name='symbol' placeholder='Enter Symbol'/></td>
				</tr>
				<tr>
					<td>Total:</td>
					<td><input type='text' value='' name='total' placeholder='Number of coins' /></td>
				</tr>
				<tr>
					<td>Paid:</td>
					<td><input type='text' value='' name='amount' placeholder='xxx.xx' /><select name='currency'><option value="EUR" selected>EUR</option><option value="BTC">BTC</option><option value="ETH">ETH</option></select></td>
				</tr>
				<tr>
					<td>Acquired on:</td>
					<td>
						<input data-toggle="datepicker" placeholder='Select Date' name='buydate'>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type='submit' value='Add Coin' /><input type='button' value='Cancel' id="cancel" /></td>
				</tr>
			</table>
			<input type="hidden" name='action' value='addcoin'>
		</form>
	</div>
	<script>document.write('<script src="http://10.0.0.17:35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>
