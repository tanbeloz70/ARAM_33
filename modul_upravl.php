<?php
class para_trab_XML{
public function __construct ($vall,$key){
 

  $this->get_dad_($vall);
  $this->dado=$this->read_xml_document();
 // print_r($this->dado);
  //echo "<br>";
  $this->$key=$this->get_Shablon_();


}

public function get_dad_($vall){
  foreach ($vall as $key=>$vallos){
    $this->$key=$vallos;
  // echo "key= ".$key." = ";
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


public function read_xml_document(){
  //  echo "#######=". $this->nazn."<br>";
    $res=0;
    $pagina=array();
    if (file_exists($this->nazn)) 
       {  include ($this->nazn);
       //echo $xmlstr;
          //echo $para_menu;
          $movies = new SimpleXMLElement($xmlstr);
        //print_r($movies);
          foreach ($movies as $responda){

         // if ($responda->attributes($this->campo_umova)==$this->tip)

          foreach( $responda->attributes() as $key=>$value ){ 
                              
                              $pagina[ ((string) $responda[$this->key_primeira])][$key]=(string)$value ;

  //                            echo "parsing  :".  ((string)[$num])." ".$key."=".(string)$value."<br>" ;


          }
        }
    }                     
    {$this->erro[0] ="file para menu nao exist, proquras diretoriu para menu "; }

   // echo "****************=";
 //print_r($pagina);
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
          
          $s[$i]=$dad[$value];$i=$i+1;
        
        
        
        
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
protected  function get_modul($modul){
	//if ($modul=='por_loja')
    {
	//$pagina_modul=para_suplumentos.$_GET['id'].".php";
	
	}
	
//	else
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
//$element_pagina= array('heder','slader'=>'home','loja'=>'loja');
$element['heder']=array ('nazn'=>para_menu,'key_primeira'=>'name','campos'=>array('name','disri'),'put'=>PAGINA_HTML);
$element['heder']['sablon'] ="<li><a href='index.php?option=%s' >%s</a></li> ";
  

$element['slader']=array ('nazn'=>para_pleer,'key_primeira'=>'num','campos'=>array('num','name_client'),'dod_file'=>para_pleer_txt_file.'client_');
$element['slader']['sablon'] ="<li><div><div class='pich'><img src ='".para_pleer_foto."%s.webp'  > </img> </div><div class='divav'><h4>%s</h4>%s</div></div></li>";



$element['loja']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','id','tip','name','name','tovar',
'id','tip','imj_jpg','name','tovar','id','tip','name','sena'),'campo_umova'=>'tip');
$element['loja']['sablon'] ="<div id='%s_'>
     <a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'><h3>%s</h3></a>
     <a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
	 </img></a><a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";

 $element['loja_electro']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','id','tip','name','name','tovar',
'id','tip','imj_jpg','name','tovar','id','tip','name','sena'),'campo_umova'=>'tip');
$element['loja_electro']['sablon'] ="<div id='%s_'>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'><h3>%s</h3></a>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
</img></a><a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";

$element['loja_suplum']=array ('nazn'=>para_loja_suplumentos,'key_primeira'=>'id','campos'=>array('id','tovar','id','tip','name','name','tovar',
'id','tip','imj_jpg','name','tovar','id','tip','name','sena'),'campo_umova'=>'tip');
$element['loja_suplum']['sablon'] ="<div id='%s_'>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'><h3>%s</h3></a>
<a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' ><img src='./PARA_LOJA/SUPLUMENTOS/pic/%s'  title='Visualização rápida_%s' >
</img></a><a href='index.php?option=".para_suplumentos."%s&id=%s&tip=%s' title='Visualização rápida_%s'> <h4>%s</h4></a></div>";





//-----------------------------------------------------------------------------------------------------------------------  
// menu main incima
   $this->xml_obj['heder']=new para_trab_XML($element['heder'],'heder');
   $key_s=$this->xml_obj['heder']->key_primeira;
   echo "<br/>*****";
   foreach ($this->xml_obj['heder']->dado as $key => $value){
       if (isset ($value[pagina_object])) { $this->$key=$value[pagina_object];};
       
   }
//--------------------------------------------------------------------------------------------------------------------


if (isset ($_GET['tip'])) { $this->tip=$_GET['tip'];}
$this->adress=adress;


//------------------------upload modul----and create object for page------------------
if (isset ($_GET['option']))  {
  $mod=$_GET['option'];
  if (isset($this->$mod)) {  $elem_pag=explode(",", $this->$mod);
                            foreach ($elem_pag as $pag_val){
                              if (isset($element[$pag_val])){
                             $this->xml_obj[$pag_val]=new para_trab_XML($element[$pag_val],$pag_val);
                            }}
  
                                                                  }
  $this->bod_seredina =$this->get_modul(PAGINA_HTML.$_GET['option']);
  
}

else  {$this->xml_obj['slader']=new para_trab_XML($element['slader'],'slader');
       $this->bod_seredina=$this->get_modul(PAGINA_HTML.'home');
                               
                      } 
		

$this->futer =PAGINA_HTML.'futer.php';


//-------------------------------------------------------------------------------



 $user_agent = $_SERVER['HTTP_USER_AGENT'];
 $this->browser = 0;
    if ( stristr($user_agent, 'MSIE') ) $this->browser = 1; // IE7
    if ( stristr($user_agent, 'MSIE') ) $this->browser = 1; // IE6
    if ( stristr($user_agent, 'MSIE') ) $this->browser = 1; // IE5




}

 
} 
 
  ?>
