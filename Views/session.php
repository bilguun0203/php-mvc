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

<h1 class="title">Session</h1>
<p>Session. Counter: <?php echo $counter; ?></p>
<p>Flush. Message: <?php echo $flush; ?></p>
<p>Cookie. : <?php echo $cookie; ?></p>
<p><a href="<?php echo \App\System\Helper::url('logout');?>">Logout</a></p>
</body>
</html>