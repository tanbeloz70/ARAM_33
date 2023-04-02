<?php
class korzina_todo{
  public function __construct (){
   $this->mal='shopping-basket.png';
   $this->kol=0;
  // $this->tovar=array();
   $this->blok="<img src='./PIC/shopping-basket.png'  title='COMPRAR.ARAM.SUPLUMENTUS'   style='float:left;width:20px;height:20px'/>";
   session_start();
  

 }

 public function set_korz_($id,$koisa){
 
  if (!isset($_SESSION['tovar'])){ $_SESSION['tovar']=array(); }

  $_SESSION['tovar'][$id]['kol']=1;

   foreach (vivod_korz as $pola){
  
    $_SESSION['tovar'][$id][$pola]=$koisa[$pola]; 
     }
 
  return  $_SESSION['tovar'];
  }

  public function set_korz_minus_plus($id,$znak){
  
  if ($znak=="+") { $_SESSION['tovar'][$id]['kol']=$_SESSION['tovar'][$id]['kol']+1;}
    
           else {$_SESSION['tovar'][$id]['kol']=$_SESSION['tovar'][$id]['kol']-1;}
              
 return  $_SESSION['tovar'][$id]['kol'];
      }
    




  public function get_korz_(){
    

    $vivod_korzini=$_SESSION['tovar'];

    foreach  ($vivod_korzini as $id=>$val){ 
    $vivod_korzini[$id]['imj_jpg']="<img src='./PARA_LOJA/SUPLUMENTOS/pic/". $_SESSION['tovar'][$id]['imj_jpg'].
    "'  title='Visualização rápida_". $_SESSION['tovar'][$id]['imj_jpg']."' > </img>";

    $vivod_korzini[$id]['kol']="<input type='button' name='knopka' value='-'   id='korzina_".$id."' />"
    ."<b id='coisas_".$id."'>".$_SESSION['tovar'][$id]['kol']."</b> coisas  <input type='button' name='knopka' value='+'   id='korzina_".$id."'   />";
                          //   <input type='submit' name='Pagar' style='width:200px' value='Total a pagar' />";
    }
   

 //   $vivod_korzini['script']['44']= "<script> var elem = " + '"input[name*=' + "'knopka']" + '";' +
//    "$(elem).click(function() { 
//alert($(this).attr('" + "id'));
//}); </script>";
   
    return $vivod_korzini;
  }


}
class para_trab_XML{
public function __construct ($vall,$key){
 

  $this->get_dad_($vall);
  $this->dado=$this->read_xml_document($key);
//print_r($this->dado);
  //echo "<br>";
  $this->$key=$this->get_Shablon_();


}

public function get_dad_($vall){

  foreach ($vall as $key=>$vallos){
    $this->$key=$vallos;
  //echo "key= ".$key." = ";
   //print_r ($vallos);
   // echo "<br>-------";
}
}
public function get_file_($num) {
  $dir2=$this->dod_file.$num.'.txt';
    //  echo  $dir2;
      $res="";   
          if (file_exists($dir2)) {
                     $handle = fopen($dir2, "r");
                     $res = fread($handle, filesize($dir2));
                      fclose($handle);    

}
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
                          {$pagina[$key_id][$reader->name] = $reader->value;}
                 }
                }
              }
           
           
  }                  
    {$this->erro[0] ="file para menu nao exist, proquras diretoriu para menu "; }

return ( $pagina);

}
//=========================================================

// styles - array para styles de elementa
//adisionar --protokol list keys, oredem 
//$dadosh-- array dados todos
public function get_Shablon_() {
    $res1="";
    foreach ($this->dado as $dad)
      { $i=0;
      foreach($this->campos as $value)
         { 
          $s[$i]=$dad[$value];
          $i=$i+1;
        
        
        
        
        }

      if (isset($this->dod_file))
                         {   $s[$i]=  $this->get_file_($dad[$this->key_primeira]);                   
                        
                        
                        }
    $res= vsprintf ($this->sablon,$s);                       
    $res1=$res1.$res;
    $s=array();
  }
  
return $res1;
}
//==============================================================================



public function write_xml_document($p_menu,$num){

}




//---------------------------------------------
}

class  Acore {
public  function get_modul($modul){

   $pagina_modul=$modul.".php";;
	
          
       
  return       ( $pagina_modul);
}


public function get_analiz_($dadosh,$adisionar)
{
$kol=count($adisionar);

   
}


//=========================================================================================
public function para_optio_select ($name_var,$options,$selection_key)
  {

   if (isset($this->para_forma)) {$para_form="form='".$this->para_forma."'";}
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
  //========================================================================
public function __construct() 
{

 include 'config.php'; 
//---------------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------------


$element_pagina= array('slader'=>'home','loja'=>'loja_todo');
$this->element['heder']=array ('nazn'=>para_menu,'key_primeira'=>'name','campos'=>array('name','disri'),'put'=>PAGINA_HTML);
$this->element['heder']['sablon'] ="<li><a href='index.php?option=%s' >%s</a></li> ";
  

$this->element['slader']=array ('nazn'=>para_pleer,'key_primeira'=>'num','campos'=>array('num','name_client'),'dod_file'=>para_pleer_txt_file.'client_','put'=>PAGINA_HTML);
$this->element['slader']['sablon'] ="<li><div><div class='pich'><img src ='".para_pleer_foto."%s.webp'  > </img> </div><div class='divav'><h4>%s</h4>%s</div></div></li>";



$this->element['loja_todo']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id',
'campos'=>array('id','tovar','id','tip','name','name',
'id','name',
'tovar','id','tip','imj_jpg','name',
'tovar','id','tip','name','sena'),'put'=>PAGINA_HTML);
$this->element['loja_todo']['sablon'] ="<div id='%s_todo'>
     <a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'><h3>%s</h3></a>
     <a href='#korzina'  id='compra_todo_%s' title='Visualização rápida_%s'>".
     //$korzina_kada->blok.
     "<b> COMPRAR</b></a>
     <a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
	 </img></a><a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a>
   </div>";

   $this->element['loja_electro']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','id','tip','name','name',
 'id','name',
  'tovar','id','tip','imj_jpg','name','tovar','id','tip','name','sena'),'campo_umova'=>'tip','campo_val'=>'electro','put'=>para_suplumentos);
  $this->element['loja_electro']['sablon'] ="<div id='%s_electro'>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'><h3>%s</h3></a>
<a href='#korzina'  id='compra_electro_%s' title='Visualização rápida_%s'><b> COMPRAR</b></a>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
</img></a><a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";

$this->element['loja_suplum']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','id','tip','name','name',
'id','name',
'tovar','id','tip','imj_jpg','name','tovar','id','tip','name','sena'),'campo_umova'=>'tip','campo_val'=>'suplum','put'=>para_suplumentos);
$this->element['loja_suplum']['sablon'] ="<div id='%s_suplum'>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'><h3>%s</h3></a>
<a href='#korzina'  id='compra_suplum_%s' title='Visualização rápida_%s'><b> COMPRAR</b></a>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
</img></a><a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";



//$this->korzina_kada=new korzina_todo();
}









 
} 
//-------korzina----------------------------------------------------------------------------------------------------------------  
//$korzina_kada=new korzina_todo();

//---------------------------------------------------------------------------------------
// menu main incima
$asa=new Acore();
//require_once('main.php');

   $asa->xml_obj['heder']=new para_trab_XML($asa->element['heder'],'heder');
   
   foreach ($asa->xml_obj['heder']->dado as $key => $value){
       if (isset ($value[pagina_object])) { 
        $asa->$key=$value[pagina_object];
       // echo "<br>key=".$key."=".$value[pagina_object];
      
      };
       
   }
   


if (isset ($_GET['tip'])) { $asa->tip=$_GET['tip'];}
$asa->adress=adress;


//------------------------upload modul----and create object for page------------------
//
if (isset ($_GET['option'])){
      $mod=$_GET['option'];
      if (array_key_exists($mod, $asa->xml_obj['heder']->dado))   { $stran=PAGINA_HTML;      }
                              else $stran="";



                            
      if (isset($asa->$mod))  {
        
       $elem_pag=explode(",", $asa->$mod);
                            foreach ($elem_pag as $pag_val){
                          //    echo($pag_val)."=777<br>";
                              if (isset($asa->element[$pag_val])){
                                $asa->xml_obj[$pag_val]=new para_trab_XML($asa->element[$pag_val],$pag_val);
                            }
                          }
                          //  $stran=$this->xml_obj[$pag_val]->put;
                          }
      else {      }
                                                                                    
      $asa->bod_seredina =$asa->get_modul($stran.$_GET['option']);
  
}

else  {$asa->xml_obj['slader']=new para_trab_XML($asa->element['slader'],'slader');
  $asa->bod_seredina=$asa->get_modul(PAGINA_HTML.'home');
                               
                      } 
		

                      $asa->futer =PAGINA_HTML.'futer.php';


//-------------------------------------------------------------------------------
//require_once('main.php');


 $user_agent = $_SERVER['HTTP_USER_AGENT'];
 $asa->browser = 0;
    if ( stristr($user_agent, 'MSIE') ) $asa->browser = 1; // IE7
    if ( stristr($user_agent, 'MSIE') ) $asa->browser = 1; // IE6
    if ( stristr($user_agent, 'MSIE') )  $asa->browser = 1; // IE5

//unset($_SESSION);
//unset($_SESSION['tovar']); 
   
   // $korzina_kada=new korzina_todo();
 IF (isset ($korzina_kada) ){$korzina_kada=$_SESSION['korzina_kada'];}
              else          {$korzina_kada=new korzina_todo();}
 
if (isset ($_GET['id'])){

  $id=$_GET['id'];
  //session_start();
 



 //foreach (vivod_korz as $pola){
 //$korz_vivod[$pola]=$asa->xml_obj['loja_todo']->dado[$id][$pola];} 
 
 $tovar=$korzina_kada->set_korz_($id,$asa->xml_obj['loja_todo']->dado[$id]);
 $tovar_druk=$korzina_kada->get_korz_();
//print_r($tovar);
/* foreach  ($korzina_kada->tovar as $tovar){ 

 foreach (vivod_korz as $pola){

  
  if ($pola=='imj_jpg')   {
    $korzina_kada->tovar[$tovar['id']][$pola]="<img src='./PARA_LOJA/SUPLUMENTOS/pic/".$korzina_kada->tovar[$tovar['id']][$pola]."'  title='Visualização rápida_".$asa->korzina_kada->tovar[$tovar['id']][$pola]."' > </img>";}
    $korzina_kada->$korz_vivod[$tovar['id']][$pola]=$korzina_kada->tovar[$tovar['id']][$pola];} 
 }

 */



 //$vivod_inf_korzina=$korzina_kada->get_korz_(vivod_korz);
 /*
 $plus="<input type='button' name='knopka' value='+' >";
 $minus="<input type='button' name='knopka' value='-' >";
 if (isset($korzina->kol)){ $kol=$korzina->kol;}
 else $kol=1;
 $korz['quantidade']= $minus."  ".$kol." coisas   ". $plus.
 "<input type='submit' name='Pagar' value='Total a pagar' />";  */


 //print_r(json_encode($korz_vivod, true, 2));
 print_r(json_encode($tovar_druk));
}


if (isset ($_GET['id_plus'])){
    $knop=$_GET['id_plus'];
    $val=$_GET['val'];
    //if ($knop=='+') 
    $kol=$korzina_kada->set_korz_minus_plus($knop,$val);
    print_r(json_encode($kol));
   //session_write_close();
   // session_destroy();
}




  ?>
