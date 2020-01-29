//VALIDAÇÕES FOMRULÁRIO ADICIONAR USUÁRIO!

$("#addUserForm").validate({
    errorClass: 'error',
    validClass: 'valid',

rules: {
        name : {
            required : true,
            minlength : 3,
        },
        user : {
            required : true,
            minlength : 3
        },
        email : {
            required : true,
        },
        password : {
            required : true,
            minlength : 6,
            maxlength : 30,
            
        },
        confpassword: {
            required : true,
            minlength : 6,
            maxlength : 30,
            equalTo: "#password"
        },
        profile : {
            required : true,
        },
},
  email : {
        required : '<span class="text-danger">Por favor escreva seu email!</span>'
  },
  confpassword : {
      required : '<span class="text-danger">Por favor confirme a senha!</span>',
        equalTo : '<span class="text-danger">Senhas não conferem!</span>'
  }
    
});

// FIM VALIDAÇÕES ADICIONAR USUÁRIO
//---------------------------------------------------------------------------------