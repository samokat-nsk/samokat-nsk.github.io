<html>
<head>
	<title> Aspiring The Orbits </title>
	<link href="type.css" rel="stylesheet">	
</head>
<body>

<?php

$connection = mysqli_connect('127.0.0.1', 'root', '9556', 'aspiringtheorbits');
$chosen = 1;
$result = mysqli_query($connection, 'SELECT * FROM `types` WHERE `id` = 1');
$query = mysqli_query($connection, 'SELECT * FROM `items` WHERE `type` = 1');
$producers = mysqli_query($connection, 'SELECT * FROM `producers`');
$states = mysqli_query($connection, 'SELECT * FROM `states`');

?>

	<a href="index.php">
		<header>
			<div class="theme"> Aspiring The Orbits </div>
			<div class="idea"> scooter spare parts </div>
		</header>
	</a>
	<div class="menu">
		<div class="idea">
			<?php
				while($type = mysqli_fetch_assoc($result))
				{
					echo 'Categorie: ' . $type['title'] . '<br>';
				}
			?>
		</div>
<?php

if (mysqli_num_rows($result) == 0)
	{
	echo '<br>There are found items: 0';
	}
else
	{
	echo '<br>There are found items: ' . mysqli_num_rows($result);
?>
<?php
	echo '<br><br>Items available:';
	}
?>
<ul>
	<?php
		while($cat = mysqli_fetch_assoc($query))
		{
			echo '<a href="item.php">
					<li>
						<br>
						' . $cat['title'] . '<br>
						<br>
						<img src=' . $cat['photo'] . ' alt="icon" width="70"/><br>
						Price: ' . $cat['price'] . '<br>
						<br>
						Rating: ' . $cat['rating'] . '<br>
						Scription: ' . $cat['scription'] . '<br>
						Available: ' . $cat['available'] . '<br>
						Producer: ' . $trade['title'] . '
					</li>
				</a>';
			$local = mysqli_query($connection, 'SELECT * FROM `producers` WHERE `id` = ' . $cat['producer']);

		}
		while($trade = mysqli_fetch_assoc($producers))
		{
			echo '<a href="item.php">
					<li>
						<br>
						Producer: ' . $trade['title'] . '
					</li>
				</a>';
		}
		while($type = mysqli_fetch_assoc($states))
		{
			echo '<a href="item.php">
					<li>
						<br>
						State: ' . $type['title'] . '
					</li>
				</a>';
		}
	?>
</ul>

	</div>
	<nav>
		<ul>
			<a href="ourteam.html">
				<li> About the team </li>
			</a>
			<a href="services.html">
				<li> Services </li>
			</a>
			<a href="contacts.html">
				<li> Contacts </li>
			</a>
			<a href="joinpartnership.html">
				<li> Join the partnership </li>
			</a>
			<a href="aboutus.html">
				<li id="li7">	Call us <br>
						+79133731606 <br>
						now
				</li>
			</a>
		</ul>
	</nav>
<?php
mysqli_close($connection);
?>
</body>
</html>