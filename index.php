
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <style>
 	html, body {
		top: 0;
		width:100%;
		left: 0;
		margin: 0;
		padding: 0;
		font-family: Helvetica, Arial, sans-serif;
	}
	.container{
		position:relative;
		margin:100px auto;
		width:300px;
		min-height: 230px;
		border:solid 1px #ccc;
		border-radius:5px;
		background:#ee8;
	}
	.mensagem{
		position:relative;
		width:100%;
		padding:5px 0;
		text-align:center;
		top:25px;
		border-radius:0 0 5px 5px;
	}
 </style>

</head>
<body>
	<div class="container">
		<center><h4>ENVIAR DATA A SER COMPARADA</h4>
		<form action="index.php"  method="post" />  
			<input type="date" name="dataMarcada" />
			<input type="submit" value="Comparar" />
		</form>
		<br>
		<?php
		//Exemplos de formato data atual
		//$dataAtual = date("Y-m-d H:i:s");
		//$dataAtual = date("d-m-Y");
		$dataHoje = date("d/m/Y");
		$dataAtual = date("Y-m-d");

		$time_atual = strtotime($dataAtual);

		//$time_expira = strtotime($date_crl);
		if((isset($_POST['dataMarcada']))AND($_POST['dataMarcada']<>"")){
			$time_expira =  strtotime($_POST['dataMarcada']);
			//echo $time_expira.'<br>'; echo $time_atual; exit;
			$dif_tempo = $time_expira - $time_atual;
			$dias = (int)floor( $dif_tempo / (60 * 60 * 24));

			echo'<table  border="1" style="border-collapse:collapse;background:#fff;" cellpadding="2" cellspacing="0"><tr>';
		   	echo'<td style="padding:5px">'."Data Atual".'</td>';
		 	echo'<td style="padding:5px">'.$dataHoje.'</td></tr>'; 
			echo'<tr><td style="padding:5px">'." Data Enviada".'</td>';
			echo'<td style="padding:5px">'.date('d/m/Y',strtotime($_POST['dataMarcada'])).'</td></tr></table><br>';
		  
			if ($time_expira == $time_atual){
				echo '<div class="mensagem" style="background:orange;">'."A data vence hoje".'</div>';
			}else if ($dias <= 30 && $dias > 0){
			    echo '<div class="mensagem" style="background:lightblue;">'."A data está em alerta".'</div>';
			}else if($dias<0){
			    echo '<div class="mensagem" style="background:pink;">'."A data está vencida".'</div>';
			}else{
			    echo '<div class="mensagem" style="background:lightgreen;">'."A data está em vigência".'</div>';
			};
		};
		?>
		</center>
	</div>
</body>
</html>