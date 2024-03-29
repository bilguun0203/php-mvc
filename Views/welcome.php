<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
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

<h1 class="title"><?php echo $title; ?>!</h1>

<?php echo \App\System\Helper::session('user_id'); ?>
<?php echo \App\System\Helper::session('user_remember_token'); ?>

</body>
</html>