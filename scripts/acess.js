$(document).ready( function(){
    $('#login-user').on('click', function(e){
        e.preventDefault();

        let email = $('#user-email').val();
        let pass = $('#user-pass').val();

        if( email != '' && pass != ''){
            $.ajax({
                url: "http://localhost/0009-Sistema%20de%20estoque-NS/scripts/login.php",
                type: "POST",
                data: {
                    email: email,
                    password: pass
                },
                success: function(response){
                response = JSON.parse(response)
                console.log(response['error'])
                    if(response['error']){
                        alert("Login incorreto!")
                    }else{
                        window.location = "http://localhost/0009-Sistema%20de%20estoque-NS/src/products.php";
                    }
                },
                error: function(xqr, response){
                    console.log(xqr)
                    alert("Ocorreu um erro na conexão, contate o suporte ou tente mais tarde!")
                }
            })
        }else{
            alert("Não deixe campos vazios!!")
        }
    })
})
