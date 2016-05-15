function validate() {
    // valida o formulário
    $('#frmSignUp').validate({
    	 submitHandler: function(form) {
        /* SE TUDO ESTIVER OK, ENVIO O FORMULÁRIO */
        	form.submit();
    	},

        // define messages para cada campo
         $.validator.messages.required = 'Esse campo é obrigatório';

    });
}