var User = function() {

	var self = this; 
	
	/*
	 * - Authentication
	 */
	this.login = function(){
		
		$('.loading_login_form').show();
		
		var user = $("#user").val();
		var pass = $("#pass").val();
		
        // Validation
        if(user == '') {
            objUtils.message('Aviso!', 'Informe um usuário válido!', '');
			$('.loading_login_form').hide();
		} else if(pass == '') {
            objUtils.message('Aviso!', 'Informe uma senha válida!', '');
			$('.loading_login_form').hide();
		} else {
			$.post('/request.php?class=UserAjaxController&method=login', {user:user, pass:pass}, function(data){
				if(data == 'SUCCESS'){
					window.location = ROOT;
				} else {
					objUtils.message('Aviso!', data, '');
					$('.loading_login_form').hide();
				}
			});
		}
		
	};

	this.logout = function(){

		$.confirm({
            title: 'Sair',
            content: 'Deseja realmente sair do sistema?',
            icon: 'fa fa-question-circle',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                'confirm': {
                    text: 'Sim',
                    btnClass: 'btn-blue',
                    action: function () {
                        $.post('/request.php?class=UserAjaxController&method=logout', {}, function(data){
                            if(data == 'success'){
                                window.location = ROOT;
                            } else {
                                objUtils.message('Aviso!', 'Falha ao desconectar!', '');
                            }
                        });
                    }
                },
                cancel: function () {
                    text: 'Não' 
                }, 
            }
        });
    }
    
    this.requestPass = function(){
		
		var email = $('#email').val();
		
		$('.loading_lostpass_form').show();
		
		var v = objUtils.emailValidate(email);
		
		if(v == 'error'){
            objUtils.message('Aviso!', 'Informe um e-mail válido!', '');
			$('.loading_lostpass_form').hide();
		} else {
			
			$.post(ROOT+'request.php?class=UserAjaxController&method=requestPass', {mail:email}, function(data){
				
				if(data == 'ok!'){
                    objUtils.message('Verifique sua Caixa de Mensagens no E-mail!', 'Caso o e-mail não apareça na caixa de mensagem, ela pode ser redirecionada para pasta de Spam.', 'success');
				} else {
                    objUtils.message('Aviso!', data, '');
				}
				$('.loading_lostpass_form').hide();
			});
			
		}
		
		return false;
		
	};
	
}

var objUser = new User();