<!Doctype html>
<html>
	<head>
		<title>

		</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
	</head>

	<body>
		<div class="container-fluid container-custom" >


			<nav class="navbar navbar-default navbar-custom">
				<div class="col-md-2 navbar-header">
					<h1 class="logo">Socialbook</h1>
				</div>
				<div class="col-md-offset-4 col-md-6">

					<form class="navbar-form navbar-left" role="search">
						<ul class="nav navbar-nav">
							<div class="form-group">
							<input type="text" class="form-control" id="name" placeholder="name">

							<input name="password" class="form-control" id="pass" placeholder="password">
							<button type="submit" class="btn btn-danger">Log In</button>
							</div>

						<div class="row">
						<p class="col-md-4"><input type="checkbox"> Keep me log In</p>
						<p class="col-md-7 col-md-offset-1">
						<a href="#">Forgot your password?</a></p>
						</div>
						</ul>
					</form>


				</div>
			</nav>
			<div class="col-md-12">
			<?php echo $content; ?>
			</div>

		</div>
	</body>

</html>