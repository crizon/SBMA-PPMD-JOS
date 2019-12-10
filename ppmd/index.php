<!DOCTYPE html>
<html>
<head>
	<title>PPMD JO</title>

		<script src="vendor/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="vendor/sweetalert2.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate.css">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="vendor/elusive-icons.css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <style type="text/css">
        	html,body {
			  height: 100%;
			}

			body {
			  display: -ms-flexbox;
			  display: -webkit-box;
			  display: flex;
			  -ms-flex-align: center;
			  -ms-flex-pack: center;
			  -webkit-box-align: center;
			  align-items: center;
			  -webkit-box-pack: center;
			  justify-content: center;
			  padding-top: 40px;
			  padding-bottom: 40px;
			  background-color: #f5f5f5;
			}

			.form-signin {
			  width: 100%;
			  max-width: 330px;
			  padding: 15px;
			  margin: 0 auto;
			}
			.form-signin .checkbox {
			  font-weight: 400;
			}
			.form-signin .form-control {
			  position: relative;
			  box-sizing: border-box;
			  height: auto;
			  padding: 10px;
			  font-size: 16px;
			}
			.form-signin .form-control:focus {
			  z-index: 2;
			}
			.fade{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
        </style>
</head>
<body class="text-center" style="background-image: url(img/bg.png); background-position: top; background-color: #343a40; background-size: 100%">

    <form action="login_process.php" method="POST" id="trupa" class="form-signin" style="background-color: white; border: 5px outset #ffc107; border-radius: 15px; box-shadow: 1px 17px 40px 0px rgba(0,0,0,0.7);">

      <img class="mb-4" src="img/logo.png" alt="" width="120" style="margin-top: -80px;" draggable="false">

      <h1 class="h3 mb-3 font-weight-normal">SBMA-PPMD <br> JOB ORDER SYSTEM</h1>

      <br>

	    <div class="input-group mb-3">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input type="text" name="xUsername" class="form-control input_user" value="" required placeholder="username">
		</div>

		<div class="input-group mb-2">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-key"></i></span>
			</div>
			<input type="password" name="xPassword" class="form-control input_pass" value="" required placeholder="password">
		</div>

      <br>
      <button class="btn btn-lg btn-warning btn-block" name="submit" type="submit"> <i class="fas fa-sign-in-alt"></i> Sign in</button>

     	<br>

    	<i style="font-size: .6em">Powered By:</i> 
    	<a href="http://www.crizon.online" rel="external" target="_blank"><img src="img/crzn.png" width="20%" draggable="false" class="fade"></a>
    </form>
    <br>

	<script crossorigin type="text/javascript" src="vendor/sweetalert2.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>