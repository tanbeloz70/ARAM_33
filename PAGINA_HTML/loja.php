<div class='loja1'>
<h6>OS NOSSOS PRODUTOS</h6>
<h1>ESCOLHA O SEU PRODUTO SEGUNDO A SUA NECESSIDADE.</h1>
<h2>Produtos selecionados cuidadosamente para complementar a sua terapia.</h2>
</div>
<div>
<nav class ='loja1'>

<ul id='rozd_product'>
<li >
    <figure><a href="#loja_todo"><img  src="./PIC/loja_ARAM1.webp"  alt=''/></a>
    <figcaption><a href="#loja_todo"><h3>TODOS OS PRODUTOS</h3></a></figcaption></figure></li>
<li>
    <figure><a href="#loja_electro"><img  src="./PIC/loja_ARAM3.webp" alt=''/></a>
    <figcaption><a href="#loja_electro"><h3>ELECTROTERAPIA        </h3></a></figcaption></figure></li>

<li>
    <figure><a href="#loja_suplum"><img  src="./PIC/loja_ARAM2.webp" alt=''/></a>
    <figcaption><a href="#loja_suplum"><h3>SAÚDE ARTICULAR</h3></a></figcaption></figure></li>
</ul></nav>

</div>
<div style='clear: both;width: 100%'>
<!---
<form name="" id='' action="" method="post" style="margin: 0px; padding: 0px;width: 30%;float: left;" >

<?php $options=array("Selecionar"=>'Selecionar por',"Mais"=>'Mais por',"Preco1"=>'Preço (menor ao maior)',
                      "Preco2"=>'Preço (maior ao menor)',"Nome1"=>'Nome A - Z',"Nome2"=>'Nome Z -A'); 
                      
    echo out_like::para_optio_select ('select_name',$options,$xml_obj['loja']->param_post['select_name'],); ?>
</form>--->
</div>

<div class='katalog' style='clear: both; background-color: #fff;' >
<h1>Se precisa de ajuda para escolher o seu produto não hesite em nos contatar.</h1>
 

<div id='loja_todo'> <?php echo ( @$xml_obj['loja_todo']->loja_todo);  ?> </div>

<div id='loja_electro'  style="display: none;"><?php echo (@$xml_obj['loja_electro']->loja_electro);  ?></div>

<div id='loja_suplum'  style="display: none;"><?php echo ( @$xml_obj['loja_suplum']->loja_suplum);  ?></div>

</div>