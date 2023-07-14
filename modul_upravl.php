<?php
/* 
* @author Bilozorova Tetiana tankaportugal@gmail.com 
* класс для работы с товарной корзиной
* @return $this->tovar -- массив товаров
* @return $this->kol -- количество товаров в корзине
* @return $this->sum -- общая денежная сумма корзины
*/

class korzina_todo{
  public function __construct (){  
//--количество единиц в корзине всех товаров
 $this->kol=0;

//--сумма к оплате общаяя за все
  $this->sum=0;

  $this->blok="<img src='./PIC/shopping-basket.png'  title='COMPRAR.ARAM.SUPLUMENTUS'   style='float:left;width:20px;height:20px'/>";
   
   //--идентификатор товара смотри хмл файл
  $this->id='id';
   
   //--массив товаров результат парсинга базы данных товаров
  $this->tovar=array();
 }

 public function set_korz_($id,$koisa){
 /* функция добавить,занести товар в козину входные данные: $id---ключ идентификатор товара,
 *  $koisa-массив данных про товар - получаем метода парсинга из набора данных про товары(файл ХМЛ)
 *  $this->tovar--вся корзина- массив данных с ключами и данными
 *  $this->tovar[$id]['kol'] -количество товара конкретного вида
  */
  $rezult=0;
  if (!(array_key_exists($id, $this->tovar))){
  $this->tovar[$id]['kol']=1;
 
   foreach (vivod_korz as $pola){    $this->tovar[$id][$pola]=$koisa[$pola];      }
   
   //--количество единиц в корзине всех товаров
   $this->kol=$this->kol+1;

   //--сумма к оплате общаяя за все
   $this->sum=$this->sum+$this->tovar[$id]['sena'];
  }
  else {$rezult=1;}
  return $rezult;
  }


  public function set_korz_minus_plus_($id,$znak){
/* функция увеличить количество единиц товара или уменьшить, входные данные: $id---ключ идентификатор товара,
 *  $znak- увеличить(+) , уменьшить (-) 
 *  $this->tovar--вся корзина- массив данных с ключами и данными
  */

  if (isset($this->tovar[$id])){

      if ($znak=="+") { $this->tovar[$id]['kol']=$this->tovar[$id]['kol']+1;
                        $this->sum=$this->sum+$this->tovar[$id]['sena'];
                        $this->kol=$this->kol+1;
      }
    
       if ($znak=="-"){ if  ($this->tovar[$id]['kol']>0) 
                         { $this->tovar[$id]['kol']=$this->tovar[$id]['kol']-1;
                           $this->sum=$this->sum-$this->tovar[$id]['sena'];
                           $this->kol=$this->kol-1;
                        }
                         else {$this->tovar[$id]['kol']=0;
      }
    } 
  }
  //     return  $this->tovar[$id]['kol'];



  
 
      }
 
      
 public function delete_tovar($id,$znak){
  /* функция удалить вид товара из корзины
   *  $this->tovar--вся корзина- массив данных с ключами и данными
   *  @$znak=="delete" кнопка имеет значение делете
  */
       if (isset($this->tovar[$id]['kol'])){
          if (($znak=="delete")){
            $this->sum=$this->sum-($this->tovar[$id]['sena']*$this->tovar[$id]['kol']);
            $this->kol=$this->kol-$this->tovar[$id]['kol'];
            unset($this->tovar[$id]); }

      }
    }

  public function get_korz_(){
    /* функция преобразование данных корзины для вывода
   *  
   *  
  */

   $vivod_korzini=array();
  
    if ( (isset($this->tovar))| (!empty($this->tovar)))

   {
    foreach  ($this->tovar as $id=>$val){
       if ($this->tovar[$id]['kol']>0)  {
                                      $vivod_korzini[$id]=$this->tovar[$id];
                                      $vivod_korzini[$id]['kol']=$this->tovar[$id]['kol'];
                                      $vivod_korzini[$id]['sum']=($this->tovar[$id]['kol']*$this->tovar[$id]['sena']);
                                      $vivod_korzini[$id]['imj_jpg']="<img src='./PARA_LOJA/SUPLUMENTOS/pic/".$this->tovar[$id]['imj_jpg'].
                                         "'  title='Visualização rápida_". $this->tovar[$id]['imj_jpg']."' > </img>";

                                       $vivod_korzini[$id]['knopka']="<input type='button' name='knopka' value='-'   />"
                                       ."<b id='coisas_".$id."'>".$this->tovar[$id]['kol']."</b> coisas  <input type='button' name='knopka' value='+'     />";
                          //   <input type='submit' name='Pagar' style='width:200px' value='Total a pagar' />";
                                      $vivod_korzini[$id]['suma']=" total para este produto:<b id='tot_".$id."'>".$vivod_korzini[$id]['sum']." EUR</b>";
                                      $vivod_korzini[$id]['delete']="<input type='button' name='delete_coisa' value='delete' style='width:200px'  />";
                                    
                                    
                                    }
    }
  }

  //$vivod_korzini['summ_total']="<input type='submit' name='Pagar' style='width:200px' value='Total a pagar'  />" .
  //                              "<b id='total'>" . $this->sum."euro </b>";
  //$vivod_korzini['summ_total']=;
    return $vivod_korzini;
  }


  public function get_total_(){
     $sum_total=0;
    if (isset($this->tovar)){
   
   // print_r($this->tovar);
    $kol=count ($this->tovar);
   foreach  ($this->tovar as $id=>$val ){ 
    
      $sum_total=($this->tovar[$id]['sena']*$this->tovar[$id]['kol'])+$sum_total;
  }}
  $this->sum= $sum_total;
  return $sum_total;
  }

  public function get_total_kol(){
    $sum_total=0;
    if (isset($this->tovar)){
    foreach  ($this->tovar as $id=>$var ){ 
         $sum_total=($this->tovar[$id]['kol'])+$sum_total;
  }
    }
  $this->kol= $sum_total;
  return $sum_total;
  }



}

//============class para_trab_XML
/* 
* @author Bilozorova Tetiana tankaportugal@gmail.com 
* @класс создания обьекта которому передаются свойства и их значения
* с данными которые хранятся в хмл файле
 * парсит хмл файл форматирует их для вывода
* @return $this->dado -- массив товаров
* @return $this->$key -- набор форматированных данных хмл файла для вывода
* 
*/
class para_trab_XML{

public function get_dad_($key,$list_param,$sablon){

  foreach ($list_param as $keys=>$vallos){
    $this->$keys=$vallos;
 
}
   //$this->$key=$key;
   $this->sablon=$sablon;


}


public function __construct ($key,$list_param,$sablon){
 
  //--формирую свойства обьекта
   
   $this->get_dad_($key,$list_param,$sablon);
  // $dado =array();
  //--читаю хмл файл с данными обьекта , $key идентификатор (первичный ключ данных)
  $dado=$this->read_xml_document($key);
  if (count($dado)>0) {$this->dado=$dado;}
 
  //-- готовлю данные для вывода в нужном мне формате
  $this->$key=$this->get_Shablon_();


}




public function get_file_($num) {
  if (isset($this->dado[$num][$this->texto_file_name])) {$dir2=$this->onde.$this->dado[$num][$this->texto_file_name];}
  else {$dir2=$this->dod_file.$num.'.txt';}

 //echo  $dir2;
      $res="";   
          if (file_exists($dir2)) {
                     $handle = fopen($dir2, "r");
                     $res = fread($handle, filesize($dir2));
                      fclose($handle);    

}
//print_r($res);
return $res;
}


public function read_xml_document($key){
    $res=0;
    $pagina=array();
 
    if (file_exists($this->nazn)) 
       { 
         $reader = new XMLReader();
         $reader->open($this->nazn); 
        
           while ($reader->read()) {
           
            if ($reader->nodeType>0){
              if($reader->hasAttributes){

                  
                      $key_id=$reader->getAttribute($this->key_primeira);
                   
                      while($reader->moveToNextAttribute())
                          {
                           
                            $pagina[$key_id][$reader->name] = $reader->value;
                          }
                 }
                }
              }
           
           
  }                  
  else   {$this->erro[0] ="file para menu nao exist, proquras diretoriu para menu "; }
   
return ( $pagina);

}
//=========================================================

// styles - array para styles de elementa
//adisionar --protokol list keys, oredem 
//$dadosh-- array dados todos
public function get_Shablon_() {
    $res1="";
    if (isset ($this->campo_val)){
    foreach ($this->dado as $dad)
      {
        
        $i=0;
     if ($dad['tip']==$this->campo_val) {
      foreach($this->campos as $value)
         { 
          $s[$i]=$dad[$value];
          $i=$i+1;
        
          }

      if (isset($this->dod_file))
                         {   $s[$i]=  $this->get_file_($dad[$this->key_primeira]);   }
                          
                   
                  
                  
                  
       $res= vsprintf ($this->sablon,$s);                       
       $res1=$res1.$res;
        $s=array();            
                    }        
                  }          
                }
    else {
      foreach ($this->dado as $dad)
      {        $i=0;
     
         foreach($this->campos as $value)
         { 
          if (isset($dad[$value])){ $s[$i]=@$dad[$value];
          $i=$i+1;
          }}

      if (isset($this->dod_file))
                         {   $s[$i]=  $this->get_file_($dad[$this->key_primeira]);   }
                      
    
    $res= vsprintf ($this->sablon,$s);                       
    $res1=$res1.$res;
    $s=array();
        }
      }
return $res1;
}
//==============================================================================



public function write_php_document($p_menu,$num){

}




//---------------------------------------------
}

/*--class  Acore-------------------------------------------
* @author Bilozorova Tetiana tankaportugal@gmail.com 
* @ в данном случае наш сайт- ресурс выступает обьектом
* @$this->element[](array) -- это свойства сайта, которые могут меняться( )
* @ $this->element[]['sablon'] - форма отображения для текущего элемента
* @nazn-> хмл файл который содержит данные обьекта 
* @key_primeira -> первичный ключ атрибута файла хмл по котрому будет доступ к данным xml
* @campos -> поля хмл файла (nazn) которые  будем использовать в sablon
* @put -> адрес загружаемой страницы
* 
*-------------------------------------------------------------------
 * @heder - заголовок сайта, который содержит меню (само меню находится в хмл файле)
    * @элементы хедера тоже станут обьектами т е сайт обьект который в свою очередь состоит из обьектов
    * (страниц сайта ) а страницы сайта могут иметь обьекты (слайдеры меню магазины  ит д. эта информация в хмл файле к каждому обьекту)
    * @можно испльзовать в любом сайте , указываешь перечень в хмл файле, переменные в елементе и форму в шаблоне
    * @заголовк обязателен,
 *@-- эти элементы только для моего сайта у вас их может не быть
 *@ slader - слайдер с отзывами ( реестр находится в хмл файле)
 *@'loja_todo','loja_electro','loja_suplum' - данные в хмл файле-- для страницы магазина
* ------------------------------------------------------------------------------
*/
class  Acore {
public  function get_modul($modul){

   $pagina_modul=$modul.".php";
	  
  return       ( $pagina_modul);
}


public function get_analiz_($dadosh,$adisionar)
{
$kol=count($adisionar);

   
}
/*
protected function kol_argum($arg_list,$element_name){
  echo count($arg_list);
 
  for ($i = 1; $i < count($arg_list)-1; $i++) 
  {  $parama[$element_name][$arg_list[$i]]=$arg_list[$i]; }
                    
return $parama;
                  }

*/




  //=====construct($element_name,$nazn,$key_primeira,$campos,$put)===================================================================
public function __construct() 
{
 $this->adress=adress;
 $this->primeira_pagina='home';
 
$this->element['heder']=array ('nazn'=>para_menu,'key_primeira'=>'name','campos'=>array('name','disri'),'put'=>PAGINA_HTML);
$this->element['heder']['sablon'] ="<li><a href='index.php?option=%s' >%s</a></li> ";
  

$this->element['slader']=array ('nazn'=>para_pleer,'key_primeira'=>'num','campos'=>array('num','name_client','texto_file'),
                        'dod_file'=>para_pleer_txt_file.'client_',
                        'put'=>PAGINA_HTML,'texto_file_name'=>'texto_file','onde'=>para_pleer_txt_file);
$this->element['slader']['sablon'] ="<div><figure><img src ='".para_pleer_foto."%s.webp'  ></img> <figcaption>%s %s</figcaption></figure></div>";
                



$this->element['loja_todo']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id',
'campos'=>array('id','tovar','name','name',
'id','name',
'tovar','tip','imj_jpg','name',
'tovar','tip','name','sena'),'put'=>para_suplumentos);
$this->element['loja_todo']['sablon'] ="<div id='%s_todo'>
     <a href='index.php?option=".para_suplumentos."%s' title='Visualização rápida_%s'><h3>%s</h3></a>
     <a href='#korzina'  id='compra_todo_%s' title='Visualização rápida_%s' class='kompa'>".
     //$korzina_kada->blok.
     "<b> COMPRAR</b></a>
     <a href='index.php?option=".para_suplumentos."%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
	 </img></a><a href='index.php?option=".para_suplumentos."%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a>
   </div>";

   $this->element['loja_electro']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','name','name',
 'id','name',
  'tovar','tip','imj_jpg','name','tovar','tip','name','sena'),'campo_umova'=>'tip','campo_val'=>'electro','put'=>para_suplumentos);
  $this->element['loja_electro']['sablon'] ="<div id='%s_electro'>
<a href='index.php?option=".para_suplumentos."%s' title='Visualização rápida_%s'><h3>%s</h3></a>
<a href='#korzina'  id='compra_electro_%s' title='Visualização rápida_%s' class='kompa'><b> COMPRAR</b></a>
<a href='index.php?option=".para_suplumentos."%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
</img></a><a href='index.php?option=".para_suplumentos."%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";

$this->element['loja_suplum']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','name','name',
'id','name',
'tovar','tip','imj_jpg','name','tovar','tip','name','sena'),'campo_umova'=>'tip','campo_val'=>'suplum','put'=>para_suplumentos);
$this->element['loja_suplum']['sablon'] ="<div id='%s_suplum'>
<a href='index.php?option=".para_suplumentos."%s' title='Visualização rápida_%s'><h3>%s</h3></a>
<a href='#korzina'  id='compra_suplum_%s' title='Visualização rápida_%s' class='kompa'><b> COMPRAR</b></a>
<a href='index.php?option=".para_suplumentos."%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
</img></a><a href='index.php?option=".para_suplumentos."%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";


}

 
}  //end Acore

///----------------------------------------------------------------------------------
class out_like extends  Acore{ 
  static public function  para_optio_select ($name_var,$options,$selection_key)
  {

   if (isset($para_forma)) {$para_form="form='".$para_forma."'";}
             else {$para_form="";}
    if ((!(isset($selection_key)))&&($selection_key!=='0')){$selection_key=array_key_first($options);}
    $selecd="<select name='".$name_var."'      ".$para_form." >
    <option value='".@$selection_key."' selected >".@$options[@$selection_key]."</option>";
    foreach($options as $key=>$value)
    { 
      if ($key!==$selection_key) {$selecd.="<option value='".$key."' >".$value."</option>";}
     
    }
    $selecd.="</select>";
    return $selecd;
  }
}




//---------------------------------------------------------------------------------------
// menu main incima



//---------обьект весь ресурс - сайт
$asa=new Acore();


//------------------------создание головного меню
//-------------------------------------------------------------------------
$asa->header=PAGINA_HTML.'header.php';
$asa_xml_obj['heder']=new para_trab_XML('heder',$asa->element['heder'],$asa->element['heder']['sablon']);   




//------------------------upload modul----and create object for  page------------------
$stran="";

if (isset ($_GET['option']))
   { $mod=$_GET['option'];}
else{$mod=$asa->primeira_pagina;}

if (isset($asa->element[$mod]))
   {  $asa_xml_obj[$mod]=new para_trab_XML($mod,$asa->element[$mod],$asa->element[$mod]['sablon']);
      $stran= $asa_xml_obj[$mod]->put; 
     }

  else{

  if (isset($asa_xml_obj['heder']->dado[$mod]))   {
                                         $stran=PAGINA_HTML;
                                         if (isset($asa_xml_obj['heder']->dado[$mod][pagina_object]))
                                         { 
                                          $elem_pag=explode(",", $asa_xml_obj['heder']->dado[$mod][pagina_object]);
                                          foreach ($elem_pag as $pag_val){   
                                                  $asa_xml_obj[$pag_val]=new para_trab_XML($pag_val,$asa->element[$pag_val],$asa->element[$pag_val]['sablon']);
                                          }
                                          
                                          } 

    }
     }
 
                                            
  $asa->bod_seredina =$asa->get_modul($stran.$mod);
   
$asa->futer =PAGINA_HTML.'futer.php';		




if (isset ($_GET['tip'])) { $asa->tip=$_GET['tip'];}







//-------------------------------------------------------------------------------


/*


//--- создание или данные сессии----
  session_start();
 IF (!isset ($_SESSION['korzina_kada']) )
                { $_SESSION['korzina_kada']=new korzina_todo();  } 

  $korzina_kada=($_SESSION['korzina_kada']); 

  //------ вывести содержимое корзины
  if (isset ($_GET['id_todo'])){
    $tovar_druk=$korzina_kada->get_korz_();
    //$tovar_druk['kol_total']=$korzina_kada->get_total_kol();
    print_r(json_encode($tovar_druk));
  }       




//------ добавить элемент в корзину
if (isset ($_GET['id'])){

  $id=$_GET['id'];
  //print_r($asa->xml_obj['loja_todo']->dado[$id]);
  $tovarr=$korzina_kada->set_korz_($id,$asa->xml_obj['loja_todo']->dado[$id]);
 // if ($tovarr==0)
 {

  //$dato['total']=$korzina_kada->get_total_();
  //$dato['kol_total']=$korzina_kada->get_total_kol();
  $tovar_druk=$korzina_kada->get_korz_();
  //$tovar_druk['kol_total']=$korzina_kada->get_total_kol();
 print_r(json_encode($tovar_druk));
 // print_r($tovarr);
}
//else { $mensage="o produto já está no carrinho, adicione a quantidade no carrinho.товар уже в корзине, добавьте количество в корзину";
//echo "<script> alert('o produto já está no carrinho, adicione a quantidade no carrinho.товар уже в корзине, добавьте количество в корзину');</script>";}
}

//------ добавить или уменьшить количество единиц товара одного вида в корзине
if (isset ($_GET['id_plus'])){
    $id=$_GET['id_plus'];
    $znak=$_GET['val'];
    $d=$korzina_kada->set_korz_minus_plus_($id,$znak);
    $dato=array();
    $dato['kol']=$korzina_kada->tovar[$id]['kol'];
    $dato['sum']=$korzina_kada->tovar[$id]['kol']*$korzina_kada->tovar[$id]['sena'];
    $dato['total']=$korzina_kada->sum;
    $dato['kol_total']=$korzina_kada->kol;

    print_r(json_encode($dato));
   
}

//------ удалить весь товар одного вида в корзине
if (isset ($_GET['delete_coisa'])){
  $id=$_GET['delete_coisa'];
  $val=$_GET['val'];
  $d=$korzina_kada->delete_tovar($id,$val);
  $dato=array();
  $dato['total']=$korzina_kada->sum;
  $dato['kol_total']=$korzina_kada->kol;
  print_r(json_encode($dato));
}

//------ почистить корзину
if (isset ($_GET['Remove'])){
         unset($_SESSION['korzina_kada']);
        // unset($_SESSION['tovar']);
}
*/
  ?>
