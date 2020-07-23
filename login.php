<!DOCTYPE html>
<?php
require_once "config/config_user.php";
/*
session_start();
require_once("class/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$status = "Login Success !";
		$login->redirect('index.php');
		
	}
	else
	{
		$status = "Dados Incorretos !";
	}	
}
*/
// SE FOI ENVIADO O BOTÃO btn-recover QUE SERVE PARA RECUPERAR A SENHA
/*
if(isset($_POST['btn-recover']))
	{	
		// ENVIA TAMBÉM O E-MAIL
		$email = $_POST['txt_email'];
		// CHECA SE O E-MAIL ENVIADO ESTÁ NO FORMATO CORRETO OU É NULO
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false && $email!= "" ) 
		{
			// SE ESTIVER NO FORMATO CORRETO, CHECA SE TEM CADASTRO NO SISTEMA
			if($login->checaCadastroEmail($email))
			{
					// SE ESTIVER TUDO CORRETO, GERA A CHAVE E A DATA DE EXPIRAÇÃO.
					$codigo = base64_encode($email);
					$dt_expirar = date('Y-m-d H:i:s', strtotime('+ 1 day'));
					// CHECA SE O E-MAIL ENVIADO JÁ TEM SOLICITAÇÃO CADASTRADA NA TABELA lc_recover
					if($login->ChecaValidadeCodigo(base64_decode($codigo),$dt_expirar))
					{
						$status = "Já existe codigo enviado. verifique seu e-mail!";
					} else {
							if($login->inserecodigo($codigo,$dt_expirar))
							{
							//$login->redirect('recuperar.php');
							// CASO INCORRETO, MOSTRA O ERRO
							require 'PHPMailer/class.phpmailer.php';
							require 'PHPMailer/class.smtp.php';
							

							$mail = new PHPMailer;
								$mail->CharSet = 'UTF-8'; // Charset da mensagem
								$mail->SMTPDebug = 3; // Debug
								$mail->isSMTP(); // Seta para usar SMTP
								$mail->Host = "http://localhost"; // SMTP Server
								$mail->SMTPAuth = true; // Libera a autenticação
								$mail->Username = 'rubenscouto@gmail.com'; // Usuário SMTP
								$mail->Password = '1n234H1AxbTec'; // Senha do usuário
								$mail->SMTPSecure = "tls"; // Acesso com TLS exigido pelo 
								$mail->Port = 587; 
								$mail->FromName = 'Rubens Admin do Sistema';
								$mail->From = $email;
								$mail->addAddress('rubenscouto@gmail.com', 'Sr. Rubens'); // Email e nome do destino
								$mail->isHTML(true); // Seta o envio em HTML
								$mail->Subject = 'Recuperação de Senha'; // Título da mensagem
								$mail->Body = '<b><a href="http://localhost/Login-Signup-Pdo/recuperar.php?codigo=' . $codigo . '">Redefinir</a></b>'; // Mensagem
								$mail->AltBody = 'Ative o HTML da sua conta.'; // Mensagem alternativa

								if($mail->Send()){
									$status = 'e-mail enviado.';
								}else {
									$status = 'erro ao enviar e-mail.';
									var_dump($mail);
								}
								
							/*	
							$mail->SetLanguage('br'); // Traduzir para pt-BR
							
							$mail->SMTPAutoTLS = false; 

							//$mail->Port = 587; // Porta do SMTP

							$mail->setFrom('rubenscouto@gmail', 'Nome'); // Email e nome de quem enviara o e-mail
							$mail->addReplyTo('rubenscouto@gmail', 'Nome'); // E-mail e nome de quem responderá o e-mail

							
							//$mail->addCC('copia@dominio.com.br'); // Enviar cópiar do e-mail
							//$mail->addBCC('copiaoculta@dominio.com.br'); // Enviar uma cópia oculta

							//$mail->addAttachment('image.jpg', 'imagem.jpg'); // Anexa um arquivo

							
							
							
							
							
							$enviar = $mail->send(); // Envia e-mail

							if($enviar):
								echo 'Mensagem enviada com sucesso!';
							else:
								echo 'Erro ao enviar mensagem!<br>';
								echo 'Erro: '.$mail->ErrorInfo;
							endif;
						}catch(Exception $e){
							echo 'Erro ao enviar mensagem!';
							echo 'Erro: '.$mail->ErrorInfo;
						}
						
					} else {
						$status = "erro na inserção do codigo";
					}
					}
					// COMPARA O CODIGO DA TABELA lc_recover COM O E-MAIL ENVIADO. SE FOR IGUAL, EMITE A MENSAGEM DE PEDIDO CADASTRADO
					// CASO CONTRÁRIO, INSERE O CODIGO NA TABELA "lc_recover"
					
						
					/*
					$headers = "MIME-Version: 1.1 \n";
					$headers .= "Content-type: text/plain; charset=iso-8859-1 \n";
					$headers .= "From: $admin \n";
					$headers .= "Return-Path: $email\n";
					$headers .= "Reply-To: $email\n";
					
					
						// SE O CODIGO FOI GERADO, REDIRECIONA PARA A PAGINA DE RECUPERAÇÃO
						
					
					$mensagem = '<p>Recuperação de senha. Clique no Link abaixo<br />';
					$mensagem .= '<a href="http://localhost/Login-Signup-Pdo/recuperar.php?codigo=' . $codigo . '">Redefinir</a></p>';
					$admin = 'root@localhost';
					
					
				// CASO O E-MAIL NÃO TENHA CADASTRO NO SISTEMA, MOSTRA A MENSAGEM NA TELA	
			} else {
				$status = "Este E-mail Não Consta em nosso Cadastro.";
			}
		// SE O FORMATO DE E-MAIL NÃO ESTIVER CORRETO, MOSTRA A MENSAGEM NA TELA
		} else {
			$status = "Formato de E-mail Inválido!";
		}
	}
if(isset($_POST['btn-alter']))
	{	
		if(isset($_GET['codigo']))
			{
			
			$codigo = $_GET['codigo'];
			echo $codigo;
			
		} else {
			
		}
	}
*/
?>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Cash</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Entre com o Seu Usuario
											</h4>

											<div class="space-6"></div>

											<form method="post" id="login-form" action="">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="txt_uname_email" placeholder="Please enter username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="txt_password" placeholder="enter your password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" name="btn-login" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110"></span>
											</div>

											<div class="space-6"></div>

											
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Entre como seu endereco de email
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label class="block">
														<input type="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="button" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
