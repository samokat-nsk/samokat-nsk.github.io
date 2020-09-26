<html>
<head>
	<title> Aspiring The Orbits </title>
	<link href="item.css" rel="stylesheet">	
</head>
<body>
	<a href="index.php">
		<header>
			<div class="theme"> Scooter Spare Parts </div>
			<div class="idea"> aspiring the orbits </div>
			<div class="idea"> type </div>
		</header>
	</a>
	<div class="menu">
		<div class="theme"> title </div>
		<div class="idea"> price </div>
		<div class="span">
<?php

$connection = mysqli_connect('127.0.0.1', 'root', '9556', 'aspiringtheorbits');

$result = mysqli_query($connection, 'SELECT * FROM `items` WHERE `id` = 1');

if (mysqli_num_rows($result) == 0)
	{
	echo '<br>There are found items: 0';
	}
else
	{
	echo '<br>There are found items: ' . mysqli_num_rows($result);
?>
<?php
	echo '<br><br>Scription:';
	}
?>
<ul>
	<?php
		while($cat = mysqli_fetch_assoc($result))
		{
			$articles_count = mysqli_query($connection, 'SELECT * FROM `items` WHERE `id` = ' . $cat['id']);

			echo '<li>
					' . $cat['title'] . '<br>
					Price: ' . $cat['price'] . '<br>
					<img src=' . $cat['photo'] . ' alt="icon" width="70"/><br>
					Rating: ' . $cat['rating'] . '<br>
					Scription: ' . $cat['scription'] . '<br>
					Available: ' . $cat['available'] . '<br>
					Producer: ' . $cat['producer'] . '<br>
					State: ' . $cat['state'] . '<br>
					<br><br>
				</li>';
		}
	?>
</ul>

<?php

$add = mysqli_query($connection, 'INSERT INTO `types` (`id`, `title`, `photo`) VALUES (`Hello`, `Nice to meet You⁪`, `e-scooter-4921573.jpg`)');

echo '<br>items (by producers):<br>';

$art = mysqli_query($connection, 'SELECT * FROM `types`');
$articles_cat = mysqli_query($connection, 'SELECT * FROM `producers`');
?>

<?php
while ($list = mysqli_fetch_assoc($art) and $art_cat = mysqli_fetch_assoc($articles_cat))
	{
	echo '<br> ' . $list['title'] . ' (' . $art_cat['title'] . ')';
	}
?>

		</div>
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
				<li id="li7"> Call us <br> +79133731606 <br> now </li>
			</a>
		</ul>
	</nav>
	<nav>
		<ul>
			<a href="ourteam.html">
				<li> producer: </li>
			</a>
			<a href="services.html">
				<li> state: </li>
			</a>
			<a href="contacts.html">
				<li> available: </li>
			</a>
			<a href="joinpartnership.html">
				<li> views: </li>
			</a>
			<a href="aboutus.html">
				<li> orders: </li>
			</a>
		</ul>
	</nav>
<?php
mysqli_close($connection);
?>

</body>
</html>