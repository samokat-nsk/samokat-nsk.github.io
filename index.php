<?php
	require "settings/settings.php";
?>
<html>
<head>
	<title> <?php echo $settings['title']; ?> </title>
	<link href="style.css" rel="stylesheet">	
</head>
<body>
	<header>
		<div class="theme"> <?php echo $settings['title']; ?> </div>
		<div class="idea"> scooter spare parts </div>
	</header>
	<div class="menu">

<?php

$connection = mysqli_connect('127.0.0.1', 'root', '9556', 'aspiringtheorbits');

$result = mysqli_query($connection, 'SELECT * FROM `types`');

if (mysqli_num_rows($result) == 0)
	{
	echo '<br>There are found categories: 0';
	}
else
	{
	echo '<br>There are found categories: ' . mysqli_num_rows($result);
?>
<?php
	echo '<br><br>Categories available:';
	}
?>
<ul>
	<?php
		while($cat = mysqli_fetch_assoc($result))
		{
			$articles_count = mysqli_query($connection, 'SELECT * FROM `types` WHERE `id` = ' . $cat['id']);
			$type_quantity = mysqli_query($connection, 'SELECT * FROM `items` WHERE `type` = ' . $cat['id']);
			echo '<a href="type.php">
					<li>'
						 . $cat['title'] . '<br>
						<br>
						<img src=' . $cat['photo'] . ' alt="icon" width="70"/><br>
						<br>
						(Items: ' . mysqli_num_rows($type_quantity) . ')
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