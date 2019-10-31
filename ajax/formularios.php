<?php
	include('../config.php');
	$data = [];
	$assunto = 'Nova mensagem do site';
	$corpo = '';
	foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).": ".$value;
		$corpo.="<hr>";
	}
	$info = array('assunto' => $assunto,'corpo'=>$corpo);
	$mail = new Email('smtp.live.com','teste@hotmail.com','teste','Hi');
	$mail->addAdress('teste@gmail.com', 'Teste 2'); 
	$mail->formatarEmail($info);
	if ($mail->enviarEmail()) {
		$data['sucesso'] = true;
	}else{
		$data['erro'] = true;
	}

	/*TESTAR MSG ERRO*/
//	$data['sucesso'] = false;
//	$data['erro'] = true;

	die(json_encode($data)); // json_encode retorna informação no formato que o JS consegue entender.

?>