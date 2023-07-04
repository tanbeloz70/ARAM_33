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
            $('#korzina_mal').text(ss['kol_total']);
            const euro = new Intl.NumberFormat("pt", { style: "currency", currency: "EUR" }).format(ss['total']);
            // 
            $('#total').text(euro+ 'EUR');

            $('#korzina_mal_sum').text(ss['total']+'EUR');
         

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
            const euro = new Intl.NumberFormat("pt", { style: "currency", currency: "EUR" }).format(ss['total']);
            $('#total').text(euro);
            $('#korzina_mal').text(ss['kol']);
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
            $('#korzina_mal').text("0");
            $('#korzina_mal_sum').text("0");
        }
    });

});


$(document).on('click','#close_pag', function() {
   // $('#close_pag').click(function() {
           
        alert('===');
            $('#korzina').hide();
           

        

    });

