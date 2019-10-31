
<div class="box-content">
	<h2><i class="fas fa-pencil-alt"></i> Cadastrar Categoria</h2>
	
	<form method="post" enctype="multipart/form-data"> <!--atributo para upload de imagem-->

		<?php
		
			if (isset($_POST['acao'])) {
				$nome = $_POST['nome'];
				if ($nome == '') {
					Painel::alert('erro','O campo nome não pode estar vazio!'); 							
				}else{
					//Apenas Cadastrar no banco de dados
					$verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ?");
					$verifica->execute(array($nome));
					if ($verifica->rowCount() == 0) {
						$slug = Painel::generateSlug($nome);
					
					$slug = Painel::generateSlug($nome);
					$arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
					Painel::insert($arr);
					Painel::alert('sucesso','Categoria cadastrada com sucesso!'); 			
					}else{
						Painel::alert('erro','Já existe uma categoria com este nome!'); 		
					}		
				}
			}	
		?>
		<div class="form-group">
			<label>Nome da Categoria:</label>
			<input type="text" name="nome"  />
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!"  />
		</div><!--form-group-->
	</form>
</div><!--box-content-->