<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> SGC - Autenticação </title>

	<link rel="icon" href="/images/favicon.ico" type="image/x-icon"/>

	<link href="/css/bootstrap_4.3/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/v4-shims.css">
	<link href="/css/animate.min.css" rel="stylesheet">

	<link href="/css/pnotify/pnotify.css" rel="stylesheet">
  <link href="/css/pnotify/pnotify.buttons.css" rel="stylesheet">
  <link href="/css/pnotify/pnotify.nonblock.css" rel="stylesheet">
	
	<link href="/css/custom.css" rel="stylesheet">
	<link href="/css/complement.css" rel="stylesheet">
	
	<script src="/js/jquery-3.4.0.min.js"></script>
	<script src="/js/bootstrap_4.3/bootstrap.min.js"></script>

	<script src="/js/pnotify/pnotify.js"></script>
	<script src="/js/pnotify/pnotify.buttons.js"></script>
	<script src="/js/pnotify/pnotify.nonblock.js"></script>

	<script src="/js/utils.js"></script>
	<script src="/js/user.js"></script>
	
</head>

<body class="login">
    <div>
	
		<a class="hiddenanchor" id="lostpass"></a>
		<a class="hiddenanchor" id="signin"></a>
	
		<div class="login_wrapper">
		
			<div class="animate form login_form">
				<section class="login_content">
					<form onSubmit="objUser.login(); return false;">
						<h1> Autenticação </h1>
						<div>
							<input class="form-control" type="text" id="user" name="user" placeholder="Usuário" />
						</div>
						<div>
							<input class="form-control" type="password" id="pass" name="pass" placeholder="Senha" />
						</div>
						<div>
							
							<input class="btn btn-outline-secondary btn-sm" type="submit" value="Entrar" />
							<a class="reset_pass" href="#lostpass"> Perdeu sua senha? </a>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="separator">
							<img src="image.php?src=images/logo.png&w=146&h=158">
						</div>
					</form>
					
				</section>
				
				<div class="loading_login_form loading"> </div>
			</div>
			
			<div id="formlostpass" class="animate form lostpass_form">
    		
    			<section class="login_content">
    			
    				<form onSubmit='objUser.recoverPassword(); return false;'>
    					<h1> Recuperar Senha </h1>
							
							<div class="alert" style="display:none;"></div>
    					
    					<div>
    						<input type="text" class="form-control" placeholder="Informe seu E-mail" id="email" name="email" />
    					</div>
    					<div>
    						<input type="submit" class="btn btn-outline-secondary btn-sm" value="Enviar" />
    					</div>
    					
    					<div class="clearfix"></div>
    					
    					<div class="separator">
    						<p class="change_link">Lembrou seus dados?
    							<a href="#signin" class="to_register"> Entrar </a>
    						</p>
    					
    						<div class="clearfix"></div>
    						<br />
    					
    						<div>
    							<h1> <img src="/images/logo.png" /> </h1>
    						</div>
    					</div>
    				</form>
    			</section>
    			
    			<div class="l-lostpass_form loading"> </div>
    			
    		</div>
			
		</div>
	
	</div>
	
</body>

</html>