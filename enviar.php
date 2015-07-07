<?php

if($_GET["tipo"] == 1)
{
	$destinatario = "contato@golsolidario.com.br";
	$assunto = "Nova inscrição";
	$corpo = '
	<html>
	<head>
	   <title>Nova inscrição</title>
	</head>
	<body>
	
	<table width="100%" border="0" cellpadding="4" cellspacing="4" id="gridCadastro">
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Nome do time:<br>
          '.$_POST["nomeTime"].'
          <br></td>
        </tr>
      <tr>
        <td>Nome responsável:<br>

          '.$_POST["nomeResponsavel"].'
          <br></td>
      </tr>
      <tr>
        <td>Endereço, Numero, Bairro, Cidade:<br>

          '.$_POST["endereco"].'
          <br></td>
      </tr>
      <tr>
        <td>Telefones:<br>

          '.$_POST["fone"].'

          <br></td>
      </tr>
      <tr>
        <td>E-mail:<br>

          '.$_POST["email"].'
          
          <br></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
	
	</body>
	</html>
	'; 
	//para o envio em formato HTML
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html;
	charset=iso-8859-1\r\n";
	
	//endereço do remitente
	$headers .= "From: Gol Solidário <contato@golsolidario.com.br>\r\n";
	
	//endereço de resposta, se queremos que seja diferente a do remitente
	$headers .= "Reply-To: ".$_POST["email"]."\r\n";
	
	//endereços que receberão uma copia $headers .= "Cc: manel@desarrolloweb.com\r\n"; 
	//endereços que receberão uma copia oculta
	$headers .= "Bcc: vinnie@criarweb.com,joao@criarweb.com\r\n";
	mail($destinatario,$assunto,$corpo,$headers);
	header("Location: cadastrook.html");
}



?>