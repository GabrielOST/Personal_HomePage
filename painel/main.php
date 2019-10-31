<?php
	if (isset($_GET['logout'])) {
		Painel::logout();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel de Controle</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" />
	</head>
	<body>
		<div class="menu">
			<div class="menu-wraper"></div>
				<div class="box-usuario">
					<?php
						if ($_SESSION['img'] == '') {					
					?>
						<div class="avatar-usuario">
							<i class="fa fa-user"></i>
						</div><!--avatar-usuario-->
					<?php 
						}else{
					?>
						<div class="imagem-usuario">
							<img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img']; ?>" />
						</div><!--avatar-usuario-->
					<?php
						} 
					?>
					<div class="nome-usuario">
						<p><?php echo $_SESSION['nome']; ?></p>
						<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
					</div><!--nome-usuario-->
				</div><!--box-usuario-->
				<div class="items-menu">
					<h2>Cadastro</h2>
					<a <?php selecionadoMenu('cadastrar-depoimento');?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
					<a <?php selecionadoMenu('cadastrar-servico');?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar Serviço</a>
					<a <?php selecionadoMenu('cadastrar-slides');?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
					<h2>Gestão</h2>
					<a <?php selecionadoMenu('listar-depoimentos');?> href="<?php INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
					<a <?php selecionadoMenu('listar-servicos');?> href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviço</a>
					<a <?php selecionadoMenu('listar-slides');?> href="<?php INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
					<h2>Administração do Painel</h2>
					<a <?php selecionadoMenu('editar-usuario');?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar Usuário</a>
					<a <?php selecionadoMenu('adicionar-usuario');?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario">Adicionar Usuário</a>
					<h2>Configuração Geral</h2>
					<a <?php selecionadoMenu('editar-site');?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-site">Editar Site</a>
					<h2>Gestão de Notícias</h2>
					<a <?php selecionadoMenu('cadastrar-categorias');?> href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar Categorias</a>
					<a <?php selecionadoMenu('gerenciar-categorias');?> href="<?php INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar categorias</a>
					<a <?php selecionadoMenu('cadastrar-noticia');?>    href="<?php INCLUDE_PATH_PAINEL ?>cadastrar-noticia">Cadastrar Notícias</a>
					<a <?php selecionadoMenu('gerenciar-noticias');?>   href="<?php INCLUDE_PATH_PAINEL ?>gerenciar-noticias">Gerenciar Notícias</a>

				</div>
			</div><!--menu-wraper-->
		</div><!--menu-->
		<header>
			<div class="center">
				<div class="menu-btn">
					<i class="fa fa-bars"></i>
				</div><!--menu-btn-->
				<div class="logout">
					<a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px 15px 10px 15px;"<?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-home"></i> <span>Página Inicial</span></a>
					<a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><i class="fa fa-window-close"></i> <span>Sair</span></a>
				</div><!--logout-->

				<div class="clear"></div>
		</div><!--center-->
		</header>
		<div class="content">
			
			<?php Painel::carregarPagina();?>
			
		</div><!--content-->
		<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script><!--Não precisa o ; no final-->
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
		<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>		
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  		<script>tinymce.init({
  				selector:'.tinymce',
  				plugins: "image"
  				});
  		</script>
	</body>
</html>