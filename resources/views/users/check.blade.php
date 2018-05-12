<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
</head>
<body>
	<ul>
		<?php 
           foreach ($categories as $category) {
           	echo "<li>".$category->title . " posted by " .$category->user['name']."</li>"; 
           }

		?>


	</ul>
</body>
</html>