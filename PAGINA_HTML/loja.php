<div class='loja1'>
<h6>OS NOSSOS PRODUTOS</h6>
<h1>ESCOLHA O SEU PRODUTO SEGUNDO A SUA NECESSIDADE.</h1>
<h2>Produtos selecionados cuidadosamente para complementar a sua terapia.</h2>
</div>
<div><center>
<nav class ='loja1'>

<ul>
<li>
    <figure><a href="index.php?option=./PAGINA_HTML/loja&tip=suplu_electro"><img  src="./PIC/loja_ARAM1.webp"  alt=''/></a>
    <figcaption><a href="index.php?option=./PAGINA_HTML/loja"><h3>TODOS OS PRODUTOS</h3></a></figcaption></figure></li>
<li>
    <figure><a href="index.php?option=./PAGINA_HTML/loja&tip=suplu_electro"><img  src="./PIC/loja_ARAM2.webp" alt=''/></a>
    <figcaption><a href="index.php?option=./PAGINA_HTML/loja"><h3>SAÚDE ARTICULAR</h3></a></figcaption></figure></li>

<li>
    <figure><a href="index.php?option=./PAGINA_HTML/loja&tip=electro"><img  src="./PIC/loja_ARAM3.webp" alt=''/></a>
    <figcaption><a href="index.php?option=./PAGINA_HTML/loja&tip=electro""><h3>ELECTROTERAPIA</h3></a></figcaption></figure></li>
</ul></nav>
</center>
</div>
<div style='clear: both;width: 100%'>
<form name="" id='' action="" method="post" style="margin: 0px; padding: 0px;width: 30%;float: left;" >

<?php $options=array("Selecionar"=>'Selecionar por',"Mais"=>'Mais por',"Preco1"=>'Preço (menor ao maior)',
                      "Preco2"=>'Preço (maior ao menor)',"Nome1"=>'Nome A - Z',"Nome2"=>'Nome Z -A'); 
    echo @$asa->para_optio_select ('select_name',$options,@$asa->param_post['select_name']); ?>
</form>
</div>

<div class='katalog' style='clear: both; background-color: #fff;' >
<h1>Se precisa de ajuda para escolher o seu produto não hesite em nos contatar.</h1>
 <div id='prosmotr'></div>
<div id='prosmotr1'></div>


 <?php 
 //print_r($asa->xml_obj);loja,loja_electro,loja_suplum
 echo ( $asa->xml_obj['loja']->loja);    
//---------------------------------------------
echo ( $asa->xml_obj['loja_electro']->loja_electro);  
//----------------------------------------------------
echo ( $asa->xml_obj['loja_suplum']->loja_suplum);  
?>
</div>