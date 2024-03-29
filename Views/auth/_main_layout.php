<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?php echo $page_title; ?></title>
	
	<!-- Bootstrap -->
	<link href="<?php echo \App\System\Helper::url('Views/bootstrap/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo \App\System\Helper::url('Views/bootstrap/assets/css/simple-flat.css'); ?>" rel="stylesheet">
	<link href="<?php echo \App\System\Helper::url('Views/bootstrap/assets/css/font-awesome.min.css'); ?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <style>
        body {
            background-color: #555555;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<?php include_once $section_body . '.php'; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo \App\System\Helper::url('Views/bootstrap/assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>