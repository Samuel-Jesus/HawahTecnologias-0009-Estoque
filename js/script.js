function consultaItem(){
    let produto = $("#buscar_item").val();
        
    let request = $.ajax({
        type: "POST",
        url: "../database/consultas/cons-item.php",
        data: {
            item: produto
        },    
        dataType:"json",
    success: function (response, jqxhr, errorThrown) {
      console.log(response)
      console.log(jqxhr)
      console.log(errorThrown)
        // Passando o resultado para o front via JS.
      $("#produto_item").text('');//Limpas os campos para não duplicar os resultados
      $("#produto_foto").text('');//Limpas os campos para não duplicar os resultados
      $("#produto_item").html('<td class="fw-600" id="item_code">'+response.code+'</td>'
      +'<td id="item_nome">'+response.nome+'</td>'+'<td id="item_descricao">'+response.descricao+'</td>'+'<td id="item_estoque">'+response.quantidade+'</td>'
      +'<td ><span id="item_preco" class="text-success">'+response.valor+'</span></td>'+'<td class="text-center" ><input id="item_quantidade" type="number" value="1" class="form-control" style="max-width: 60px;"></td>'
      +'<td><button type="button" class="btn cur-p btn-outline-info" id="adiciona_item" onclick="adicionaItem()"><i class="ti-plus"></i> Adicionar </button></td>'
        )
      $("#produto_foto").html('<img src="../imgs/fotos/'+response.code+'/'+response.foto+'" alt="Foto do produto" style="max-width: 150px; max-height: 150px;">')
        
    },
    error: function (response) {
      console.log(response)
        console.log(request.data)
        alert("Deu erro")
    }
    })
    
}

// Adicionando Itens a lista de compras
var total = 0;
var i = 0;
function adicionaItem(){
    let code = $("#item_code").html()
    let nome = $("#item_nome").html()
    let descricao = $("#item_descricao").html()
    let quantidade = $("#item_quantidade").val()
    let preco = $("#item_preco").html()
    let sub_total = preco * quantidade;
        i++
        total += sub_total;
    $("#lista_itens").append('<tr>'+ 
     '<td class="fw-600">'+code+'</td>'+
     '<td>'+nome+'</td>'+ 
     '<td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Status</span></td>'+
     '<td>Cor</td>'+
     '<td>'+descricao+'</td>'+
     '<td class="text-center">'+quantidade+'</td>'+
     '<td><span class="text-success">R$ '+preco+'</span></td>'+
     '<td><span class="text-success">R$ '+sub_total+'</span></td>'+
    '</tr>');
    $("#valor_total").html(total);
    $("#valor_total_2").html("R$ "+total);
    $("#total_itens").html(i);
                
}
// Calculando troco do cliente
$("#pago").keyup(function(){
    let total_compra = $("#valor_total").html()
    let pago = $("#pago").val()
    let troco = pago - total_compra;
    console.log(troco)
    if (troco >= 0){
       $("#troco").html(troco); 
    }else{
        console.log("Está faltando pagamento")
    }
});
// Vendo exibindo e retirando calculo de troco de acordo com a forma de pagamento.
$("#inputState").change(function(){ 
    let valor = this.value;
    if(valor == 1){
        $("#pagamento_dinheiro").show();
    }else{
        $("#pagamento_dinheiro").hide();
        $("#troco").html("0,00");
        $("#pago").val("")
    }
})



   
// let teste = $("#inputState").val()
// console.log(teste)