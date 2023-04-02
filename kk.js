var elem = "input[name*='knopka']";
$(elem).click(function() {
    dlina = $(this).attr('id').length;
    id = $(this).attr('id').substr(8, (dlina - 8));
    alert(id);
    val = $(this).val();
    alert(val);

    $.ajax({
        type: "GET",
        headers: { 'Access-Control-Allow-Origin': '' },
        url: "modul_upravl.php",
        dataType: 'html',
        data: { 'id_plus': id, 'val': val },
        success: function(dato) {
            alert(dato);
            // ss = JSON.parse(dato);
            elem = "#coisas_" + id;
            $(elem).text(dato);
        }
    });
});