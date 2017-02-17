<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Page Test</title>
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

<p><?php if(isset($id)) echo $id; ?></p>
<p><?php if(isset($test)) echo $test; ?></p>

</body>
</html>