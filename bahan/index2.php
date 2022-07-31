<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120206082-3"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-120206082-3');
	</script>
</head>
<body>

<div class="container-fluid text-white" style="background:#414A57;background-size: contain;background-repeat: no-repeat;background-position: left; height:150px;position:fixed;top:0px;left:0px;right:0px">
	  <div class="row">
		<div class="col pl-5 pt-1">
			<table>
				<tr>
					<td>
						<img style="margin:5px;height:70px" src="image/km2.png">
					</td>
					<td>
						<div><b>KAMPUS MENGAJAR 2</b></div>
						<div><small>SD NEGRI 060817<small></div>
					</td>
				</tr>
			</table>
		</div>
	  </div>
</div>

<div class="wrapper fadeInDown"  style="margin-top:100px;">
  <div id="formContent">
    <div class="fadeIn text-left p-5">
      <div><b>Selamat Datang</b></div>
      <div><small>Silakan login dengan menggunakan username dan password yang anda miliki</small></div>
	  <form class="text-center" action="" method="post" id="formLogin">
		  <div class="input-group mt-4 mb-3">
			<div class="input-group-prepend">
			  <span class="input-group-text" style="border:0px;background:#fff"><i class="fa fa-user-circle"></i></span>
			</div>
			<input type="text" class="form-control" placeholder="Username" name="username" id="username" autocomplete="false" required="true" value="P130100230">
		  </div>
		  <div class="input-group mt-3 mb-3">
			<div class="input-group-prepend">
			  <span class="input-group-text" style="border:0px;background:#fff"><i class="fa fa-lock"></i></span>
			</div>
			<input type="password" class="form-control" placeholder="Password" name="password" id="password"  autocomplete="false" required="true" value="DHND*">
			<div class="input-group-prepend">
			  <span class="input-group-text" style="border:0px;background:#fff;padding-right:0px;padding-left:0px" onCLick="showPassword()" id="btn-eye"><i class="fa fa-eye"></i></span>
			</div>
		  </div>
		  <button type="button" class="btn btn-primary btn-round form-control" style="border-radius:20px" onClick="login()">Login</button>
		</form> 
    </div>
	 
  </div> 
</div>

<div  style="position:absolute;top:0px;left:0px;right:0px;bottom:0px;background:#fff;opacity:0.5;z-index:99999;display:none" id="loader">
</div>

<style>
	/* STRUCTURE */
	.loader {
	  margin: 0;
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  -ms-transform: translate(-50%, -50%);
	  transform: translate(-50%, -50%);
	}

	.wrapper {
	  display: flex;
	  align-items: center;
	  flex-direction: column; 
	  justify-content: center;
	  width: 100%;
	  min-height: 100%;
	  padding: 20px;
	  margin-top:-80px;
	}

	#formContent {
	  -webkit-border-radius: 10px 10px 10px 10px;
	  border-radius: 10px 10px 10px 10px;
	  background: #fff;
	  padding: 30px;
	  width: 90%;
	  max-width: 450px;
	  position: relative;
	  padding: 0px;
	  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
	  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
	  text-align: center;
	}

	


	/* TABS */

	h2.inactive {
	  color: #cccccc;
	}

	h2.active {
	  color: #0d0d0d;
	  border-bottom: 2px solid #5fbae9;
	}
	
	input[type=text] {
	  border: none;
	  color: #0d0d0d;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  border-radius:0px;
	  border-bottom:2px solid #eee;
	}
	input[type=password] {
	  border: none;
	  color: #0d0d0d;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  border-radius:0px;
	  border-bottom:2px solid #eee;
	}

	/* ANIMATIONS */

	/* Simple CSS3 Fade-in-down Animation */
	.fadeInDown {
	  -webkit-animation-name: fadeInDown;
	  animation-name: fadeInDown;
	  -webkit-animation-duration: 1s;
	  animation-duration: 1s;
	  -webkit-animation-fill-mode: both;
	  animation-fill-mode: both;
	}

	@-webkit-keyframes fadeInDown {
	  0% {
		opacity: 0;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
	  }
	  100% {
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	  }
	}

	@keyframes fadeInDown {
	  0% {
		opacity: 0;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
	  }
	  100% {
		opacity: 1;
		-webkit-transform: none;
		transform: none;
	  }
	}

	/* Simple CSS3 Fade-in Animation */
	@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
	@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
	@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

	.fadeIn {
	  opacity:0;
	  -webkit-animation:fadeIn ease-in 1;
	  -moz-animation:fadeIn ease-in 1;
	  animation:fadeIn ease-in 1;

	  -webkit-animation-fill-mode:forwards;
	  -moz-animation-fill-mode:forwards;
	  animation-fill-mode:forwards;

	  -webkit-animation-duration:1s;
	  -moz-animation-duration:1s;
	  animation-duration:1s;
	}

	.fadeIn.first {
	  -webkit-animation-delay: 0.4s;
	  -moz-animation-delay: 0.4s;
	  animation-delay: 0.4s;
	}

	.fadeIn.second {
	  -webkit-animation-delay: 0.6s;
	  -moz-animation-delay: 0.6s;
	  animation-delay: 0.6s;
	}

	.fadeIn.third {
	  -webkit-animation-delay: 0.8s;
	  -moz-animation-delay: 0.8s;
	  animation-delay: 0.8s;
	}

	.fadeIn.fourth {
	  -webkit-animation-delay: 1s;
	  -moz-animation-delay: 1s;
	  animation-delay: 1s;
	}

	/* Simple CSS3 Fade-in Animation */
	.underlineHover:after {
	  display: block;
	  left: 0;
	  bottom: -10px;
	  width: 0;
	  height: 2px;
	  background-color: #56baed;
	  content: "";
	  transition: width 0.2s;
	}

	.underlineHover:hover {
	  color: #0d0d0d;
	}

	.underlineHover:hover:after{
	  width: 100%;
	}
</style>

<script type="text/javascript" src="https://hasilun.puspendik.kemdikbud.go.id/akm/_assets/js/jquery/jquery.min.js"></script>

<script>

	function login() {
		var username = $('#username').val();
		var password = $('#password').val();
		
		if (username=='') {
			$('#username').focus();
		} else if (password=='') {
			$('#password').focus();
		} else {
			$('#loader').fadeIn();
			$('#formLogin').submit();
		}
	}
	
	function showPassword() {
		var type = $('#password').attr('type');
		if (type ==='password') {
			$('#btn-eye').css('color','#00ff00');
			$('#password').attr('type','text');
		}
		else {
			$('#btn-eye').css('color','#636e72');
			$('#password').attr('type','password');
		}
	}
</script>
  

</body>
</html>
