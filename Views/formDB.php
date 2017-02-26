<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DB test</title>
	<style>
		body {
			font-family: "Noto Sans", sans-serif;
			background-color: #EEEEEE;
			color: #212121;
		}
		.title {
			text-align: center;
		}
		p {
			text-align: center;
		}
	</style>
</head>
<body>

<h1 class="title">TEST FORM</h1>
<ul>
	<?php foreach ($data as $item) { ?>
		<li><?php echo $item['id'] . ". " . $item['name'] . " - " . $item['created'] . " - " . $item['modified']; ?> -- <a href="<?php echo \App\System\Helper::url('formdb/delete/'.$item['id']); ?>">Delete</a></li>
	<?php } ?>
</ul>
<form action="<?php echo \App\System\Helper::url('formdb/submit'); ?>" method="post">
	<input type="text" name="name">
	<input type="submit" value="Submit">
</form>
</body>
</html>