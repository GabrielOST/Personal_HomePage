<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $infoSite['titulo'];?></title>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/style.css">
		<!--TAG DESIGN RESPONSIVO-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--SEO -> Para buscadores encontrarem melhor o site-->
		<meta name="author" content="Gabriel Ostroski de Souza">
		<meta name="keywords" content="sistemas web, cusros de programação,web dev,desenvolvimento web,portal de noticias,html5,css3,design,aprender programação">
		<meta name="description" content="Site desenvolvido por alunos do curso de dev web da Danki Code.">
		<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />		
		<meta charset="utf-8" />
	</head>
	<body>


		<base base="<?php echo INCLUDE_PATH; ?>" />
		<?php
			$url = isset($_GET['url']) ? $_GET['url'] : 'home'; // Se existir GET URL utiliza GET URL, mas senão vá para o HOME
			switch ($url) {
				case 'sobre':
					echo '<target target="sobre" />';
					break;

				case 'servicos':
					echo '<target target="servicos" />';
					break;
			}

		?>
		<div class="sucesso">Formulario enviado com sucesso!</div>
		<div class="erro">Algo deu errado!</div>
		<div class="overlay-loading">
			<img src="<?php echo INCLUDE_PATH; ?>images/ajax-loader.gif" />
		</div><!--overlay-loading-->
	
		<header>
			<div class="center">
				<div class="logo left">
					<a href="<?php echo INCLUDE_PATH; ?>"><i class="fas fa-address-card"></i><b> Gabriel's Page</b></a>
				</div><!--logo-->
				<nav class="desktop right">
					<ul>
						<li><a title="Home" href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
						<li><a title="Sobre" href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
						<li><a title="Serviços" href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
						<li><a title="Notícias" href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
						<li><a  title="Contato" realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
						
					</ul>
				</nav>
				<nav class="mobile right">
					<div class="botao-menu-mobile">
						<i class="fas fa-bars"></i>
					</div><!--botao-menu-mobile-->
					<ul>
						<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
						<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
						
					</ul>
				</nav>
				<div class="clear"></div><!--clear-->
			</div><!--center-->
		</header>

		<div class="container-principal">
		<?php

			if (file_exists('pages/'.$url.'.php')) { // Se exisitr esse arquivo.php no pages, inclua
				include('pages/'.$url.'.php');
			}else{
				//Podemos fazer o que quiser pois a pagina não existe
				if ($url != 'sobre' && $url != 'servicos') {
					$urlPar = explode('/', $url)[0];
					if ($urlPar != 'noticias') {
						$pagina404 = true;
						include('pages/404.php');
					}else{
						include('pages/noticias.php');
					}					
				}else{					
					include('pages/home.php');
					
				}
				
			}

		?>
	</div><!--container-principal-->

	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
			<div class="center">
				<p>Todos os direitos reservados</p>
			</div><!--center-->
		</footer>

		<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
		<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
		<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

		<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>

		<?php

			if(is_array($url) && strstr($url[0],'noticias') !== false){
		?>
			<script>
				$(function(){
					$('select').change(function(){
						location.href=include_path+"noticias/"+$(this).val();
					})
				})
			</script>
		<?php
			}
		?>

		<?php
			if($url == 'contato'){
		?>
		<?php } ?>
		<!--<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>-->
		<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
	</body>
</html>