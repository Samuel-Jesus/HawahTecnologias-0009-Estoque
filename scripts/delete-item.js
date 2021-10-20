$(document).ready( function(){
let id // Variável que recebe o valor do id 
let tabela // Variável que recebe o valor de qual tabela do BD
    $('.delete-item').on('click', function(){
        id = $(this).closest('td[data-id_element]').data('id_element')
        tabela = $(this).closest('td[data-name_table]').data('name_table')
    })
    $('#confirme-delete').on('click', function(){
        
            $.ajax({
                url: "http://localhost/0009-Sistema%20de%20estoque-NS/database/delete/del-provider.php",
                type: "POST",
                data: {
                    elemento: id,
                    table: tabela
                },
                success: function(response){
               
                console.log(response)
                    
                },
                error: function(xqr, response){
                    console.log(xqr)
                    alert("Ocorreu um erro na conexão, contate o suporte ou tente mais tarde!")
                }
            })
    })
    //categorias fornecedores marcas produtos status usuarios

    // $('#login-user').on('click', function(e){
    //     e.preventDefault();

    //     let email = $('#user-email').val();
    //     let pass = $('#user-pass').val();

    //     if( email != '' && pass != ''){
    //         
    //     }else{
    //         alert("Não deixe campos vazios!!")
    //     }
    // })
})