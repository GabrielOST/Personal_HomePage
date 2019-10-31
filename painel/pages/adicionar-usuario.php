<?php 
	verificaPermissaoPagina(2); 
?>

<div class="box-content">
	<h2><i class="fas fa-pencil-alt"></i> Adicionar Usuário</h2>
	
	<form method="post" enctype="multipart/form-data"> <!--atributo para upload de imagem-->

		<?php
			if (isset($_POST['acao'])) {
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
				

				if ($login == '') {
					Painel::alert('erro','O login está vazio!'); 
				}elseif ($nome == '') {
					Painel::alert('erro','O nome está vazio!'); 
				}elseif ($senha == '') {
					Painel::alert('erro','A senha está vazia!'); 
				}elseif ($cargo == '') {
					Painel::alert('erro','O Cargo precisa estar selecionado!'); 
				}elseif ($imagem['name'] == '') {
					Painel::alert('erro','A imagem precisa estar selecionada!'); 				
				}else{
					//Podemos cadastrar!
					if ($cargo >= $_SESSION['cargo']) {
						Painel::alert('erro','Você precisa selecionar um cargo menor ou igual ao seu!'); 	
					}elseif (Painel::imagemValida($imagem) == false) {
						Painel::alert('erro','Formato de imagem inválido!'); 	
					}elseif (Usuario::userExists($login)) {
						Painel::alert('erro','Login já cadastrado!'); 	
					}else{
						//Apenas Cadastrar no banco de dados
						$usuario = new Usuario();
						$imagem = Painel::uploadFile($imagem);
						$usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
						Painel::alert('sucesso','Usuário <b>'.$login.' </b>cadastrado com sucesso!'); 
					}
				}
			}	
		?>
		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login"  />
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome"  />
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password"  />
		</div><!--form-group-->
		
		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if ($key < $_SESSION['cargo']) echo '<option value = "'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
		</div><!--form-group-->		

		<div class="form-group">
			<label>Imagem:</label>
			<input type="file" name="imagem"  />			
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!"  />
		</div><!--form-group-->
	</form>
</div><!--box-content-->