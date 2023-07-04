$(document).ready(function() {

    $("#rozd_product li :has('a')").click(function() {
        alert($(this).children('a').attr("href"));
        s = $(this).children('a').attr("href");
        $('.katalog').children('div').hide();
        $('.katalog').children(s).show(300);
        //$(s).show(300);
    });
   
    // ФУНКЦИЯ ПОКАЗЫВАЕТ КОРЗИНУ КОГДА ПРОВЕДЕНО ДЕЙСТВИЕ - ДОБАВИТЬ ТОВАР, УДАЛИТЬ И ТД 
    function SHOW_KORZINA(){
    $('#korzina').show(300).animate({
        top: 160,
        right: 50,
        width: "400px",
        opacity: 1,
        height: "auto"})
    }
    
     // ФУНКЦИЯ вывода  ОБЩЕЕ КОЛИЧЕСТВО ТОВАРА В КОРЗИНЕ
      //И ОБЩАЯЯ СУММА К ОПЛАТЕ
    function TOTAL_KORZINA(kol_total,sum_total){
        // ВЕРХНЯЯ ЧАСТЬ В ЗАГОЛОВКЕ
        $('#korzina_mal').text(kol_total);
        $('#korzina_mal_sum').text(sum_total+' EUR');
    }
     // ФУНКЦИЯ ПОЛУЧАЕТ КОРЗИНУ ВЫВОДИТ  СОДЕРЖИМОЕ  И СЧИТАЕТ ИТОГ - ОБЩЕЕ КОЛИЧЕСТВО ТОВАРА 
      //И ОБЩАЯЯ СУММА К ОПЛАТЕ
    function OnDe(ss) {
        var stroka1 = "";
        var sum_total = 0;
        var kol_total = 0;
        for (key in ss) {
            var stroka = "";
            id_tovar = 'korzina_id_' + key;
            $.each(ss[key], function(key1, value) { stroka = stroka + "<p>" + value + "</p>";  });

            stroka1 = stroka1 + "<li id='" + id_tovar + "'>" + stroka + "<p><hr></p></li>";
            sum_total = (Math.floor(ss[key]['sena']) * Math.floor(ss[key]['kol']))+sum_total;
            kol_total = ss[key]['kol'] + kol_total;
        }

        //const euro = new Intl.NumberFormat("pt", { style: "currency", currency: "EUR" }).format(sum_total);
        stroka1 = "<a href='#' title='close pagar' style='width:50px;float:right' id ='close_pag'>X</a>"+"<ul>" 
        + stroka1 + "</ul>" + "<input type='submit' name='Pagar' style='width:200px' value='Total a pagar'  />" +
            "<b id='total'>" + sum_total + " EUR</b>" + " <p>peças totais de mercadorias:<b id='total_kol_korz'>" + kol_total + "</b></p>"+
            "<input type='submit' name='Remove' style='width:200px' value='RemoveTotal' ID='REMOV' />" ;
           // +
           // "<script type='text/javascript' src='kk.js'></script>";
        //alert()
       // $('#korzina_mal').text(kol_total);
       // $('#korzina_mal_sum').text(sum_total);
        $('#korzina').html(stroka1);
        TOTAL_KORZINA(kol_total,sum_total);

    };


    $('.katalog div a').click(function() {
        //palavra compra
        var elem1 = $(this).attr('id').substr(0, 6);
        alert(elem1);
        if (elem1 == 'compra') {
            if ($(this).attr('id').substr(7, 4) == 'todo') {
                alert('todo');
                id = $(this).attr('id').substr(12, 5);
                alert('id=' + id);
            }
            if ($(this).attr('id').substr(7, 7) == 'electro') {
                alert('electro');
                id = $(this).attr('id').substr(15, 5);
                alert('id=' + id);
            }
            if ($(this).attr('id').substr(7, 6) == 'suplum') {
                alert('suplum');
                id = $(this).attr('id').substr(14, 5);
                alert('id=' + id);
            }


            $.ajax({
                type: "GET",
                headers: { 'Access-Control-Allow-Origin': '' },
                url: "modul_upravl.php",

                // headers: { 'Access-Control-Allow-Origin': '' },
                //  url: "valid_metod.php",
                dataType: 'html',
                data: {
                    'id': id,
                    'option': 'loja'
                },
                success: function(dato) {
                    alert(dato) ;            
                  ss = JSON.parse(dato);
                    OnDe(ss);
                    
                }

            }).done( SHOW_KORZINA() );
        }

    }); //--end  $('.katalog div a').click(function()

    $('div#korzina_icima a').click(function() {
  alert ('click');
  
        $.ajax({
            type: "GET",
            headers: { 'Access-Control-Allow-Origin': '' },
            url: "modul_upravl.php",

            // headers: { 'Access-Control-Allow-Origin': '' },
            //  url: "valid_metod.php",
            dataType: 'html',
            data: {
                'id_todo': 0,
                'option': 'loja'
            },
            success: function(dato) {

                alert(dato);
                ss = JSON.parse(dato);
                OnDe(ss);
                
            
            }
        }).done(SHOW_KORZINA() );


   
    

    });  //end clik function








var elem = "#korzina input";
$(elem).click(function() {
    alert($(this).attr('" + "id'));
});



var elemen = "input[name*='knopka']";

$(document).on('click',elemen, function() {
 
    parenta = $(this).parent().parent();
  
   //alert($(parenta.attr('id')));
    
   // alert($(parenta).html());
    dlina = $(parenta).attr('id').length;
    id = $(parenta).attr('id').substr(11, (dlina - 11));
    //alert(id);
    val = $(this).val();
    // alert(val);

    $.ajax({
        type: "GET",
        headers: { 'Access-Control-Allow-Origin': '' },
        url: "modul_upravl.php",
        dataType: 'html',
        data: { 'id_plus': id, 'val': val },
        success: function(dato) {
          //  alert('dato=' + dato);
            ss = JSON.parse(dato);
            // меняю значение количества и сумма в самой корзине по этому товару
            elem = "#coisas_" + id;
            $(elem).text(ss['kol']);
            
            elem ="#tot_"+ id;
            $(elem).text(ss['sum']);

            // итоговая сумма по корзине количество и сумма
           // $('#korzina_mal').text(ss['kol_total']);
            //const euro = new Intl.NumberFormat("pt", { style: "currency", currency: "EUR" }).format(ss['total']);
            //
             //$('#korzina_mal_sum').text(ss['total']+'EUR');

             TOTAL_KORZINA(ss['kol_total'],ss['total']);

            $('#total').text(ss['total']+ 'EUR');
            $('#total_kol_korz').text(ss['kol_total']);
            
         

        }
    });
});

var elementa2 = "input[name*='delete_coisa']";
$(document).on('click',elementa2, function() {

//$(elem).click(function() {
  parenta = $(this).parent().parent();
  // parenta = $(elementa2).parent('li');
   alert($(parenta.attr('id')));
   
     alert($(parenta).html());
    dlina = $(parenta).attr('id').length;
    id = $(parenta).attr('id').substr(11, (dlina - 11));
   alert(id);
    val = $(elementa2).val();
    alert(val);

    $.ajax({
        type: "GET",
        headers: { 'Access-Control-Allow-Origin': '' },
        url: "modul_upravl.php",
        dataType: 'html',
        data: { 'delete_coisa': id, 'val': val },
        success: function(dato) {
            //  alert(dato);
            ss = JSON.parse(dato);
            elem = "#korzina_id_" + id;
            $(elem).remove();

           // const euro = new Intl.NumberFormat("pt", { style: "currency", currency: "EUR" }).format(ss['total']);
          //  $('#total').text(euro);
           // $('#korzina_mal').text(ss['kol_total']);

            TOTAL_KORZINA(ss['kol_total'],ss['total']);

            $('#total').text(ss['total']+ 'EUR');
            $('#total_kol_korz').text(ss['kol_total']);
           // $('#korzina_mal').text(kol_total);
          //  $('#korzina_mal_sum').text(euro);
           // $('#korzina').html(stroka1);


        }
    });
});

$(document).on('click','#REMOV', function() {

//$('#REMOV').click(function() {

    $.ajax({
        type: "GET",
        headers: { 'Access-Control-Allow-Origin': '' },
        url: "modul_upravl.php",
        dataType: 'html',
        data: { 'Remove': 'Remove' },
        success: function(dato) {
            // alert(dato);
            // ss = JSON.parse(dato);
            elem = "#korzina";
            $(elem).html("").hide();

            TOTAL_KORZINA(0,0);

            
            stroka1 = "<a href='#' title='close pagar' style='width:50px;float:right' id ='close_pag'>X</a>"+
            "Сarrinho está vazio:" +
             "<b id='total'>" + 0 + " EUR</b>" + " peças totais de mercadorias:<b id='total_kol_korz>" + 0 + "</b>";
            
            $('#korzina').html(stroka1);
         //   $('#korzina_mal').text("0");
          //  $('#korzina_mal_sum').text("0");
        }
    });

});


$(document).on('click','#close_pag', function() {
   // $('#close_pag').click(function() {
           
      //  alert('===');
            $('#korzina').hide();
           

        

    });


// ---- выровнятть  меню на всю ширину страницы


function blok_widtmenu(){
var blok_menu=$('.menu');
var body_blok=$('body');
this.body_bloka=Math.floor(body_blok.outerWidth(true));
this.blok_menu=Math.floor(blok_menu.outerWidth(true));
this.kol_pynkt=blok_menu.children('ul').children('li').length;

var sum=0;
blok_menu.children('ul').children('li').each( function () {
    //  alert ('razn='+razn);

 sum=Math.floor($(this).outerWidth(true))+sum;
 
});
alert('sum='+sum+' '+this.blok_menu+' '+this.body_bloka)


var razn=Math.floor((this.blok_menu-sum)/this.kol_pynkt);
alert (razn);

var zag=0;
blok_menu.children('ul').children('li').each(
    function () {
    

   s=Math.floor($(this).outerWidth(true))+razn;
   $(this).outerWidth(s,true);
   zag=zag+s;

  

});
alert('zag='+zag+'sum='+sum);

    }


//menu_incima.width_pynkt=blok_menu.children('ul').children('li').first().outerWidth(true);



//alert('sirina='+menu_incima.body_bloka+' pynkti='+menu_incima.kol_pynkt+' sirina pynkta='+menu_incima.width_pynkt);

//var dlina=Math.round(menu_incima.body_bloka/menu_incima.kol_pynkt);
//blok_menu.children('ul').children('li').outerWidth(dlina);


//menu_incima=new blok_widtmenu();

function asa (){  
    i=0;  
  $('.slader div').hide();
          $('.slader div').each(function (i){
      
    $('.slader div:eq('+i+')').delay((i++) * 5000).fadeTo(2000, 1);});
     
   }   
   //asa(); 
  setInterval(asa,6000);  


});

$(window).on('resize',function(){      location.reload();  });

/*
$(document).ready(
    function(){
        var width=600;var height=300;
        $('#slaider').width(width);
        $('#slaider').height(height+28);
        $('#slaider div').width(width);
        $('#slaider div').height(height);
        $('#slaider div').css('border','0px');
        $('#slaider div img').width(width);
        $('#slaider div img').height(height);
        dlina=$("#slaider div ").children('img').length;
        i1=dlina-1;$('#slaider div').append('<h1>'+$('#slaider div img:eq('+i1+')').attr('alt')+'</h1>');

$('#slaider div img').css({opacity:1});
function asa(){
    var n1='#slaider div img:eq('+i1+')';
    $(n1).animate({'opacity':0},6000);
    var s=$(n1).attr('alt');
    $('#slaider div h1').attr('tt',s);
    $('#slaider div h1').animate({opacity:0},3000,function(){
        $(this).html($(this).attr('tt'));
    }).animate({opacity:1},3000);
    i1=i1-1;
    if(i1<0){
        i1=dlina;
        $('#slaider div img').animate({'opacity':1},6000);}
    }
    asa();
    setInterval(asa,6000);$("body").css("display","none").fadeIn("slow");});
*/