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

<h1 class="title">TEST PAGE</h1>
<p><?php echo "Хуудас " . $total_page . " - " . $page; ?></p>
<ul>
	<?php foreach ($test as $item) { ?>
	<li><?php echo $item['id'] . ". " . $item['name'] . " - " . $item['created'] . " - " . $item['modified']; ?></li>
	<?php } ?>
</ul>
<form action="<?php echo \App\System\Helper::url('postTest'); ?>" method="post">
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>

<code>
<!--    --><?php //echo $middleware['args']['test']; ?>
    <?php echo print_r($middleware); ?>
<!--    --><?php //var_dump($data) ?>
</code>
</body>
</html>