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
		if(user == '' || pass == ''){
			objUtils.message('Aviso!', 'Preencha corretamente os campos!', '');
			$('.loading_login_form').hide();
		} else {
			$.post('/request.php?class=UserAjaxController&method=login', {user:user, pass:pass}, function(data){
				if(data == 'SUCCESS'){
					window.location = "/";
				} else {
					objUtils.message('Aviso!', 'Verifique se o usuário e senha estão corretos!', '');
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
                                window.location = "/";
                            } else  {
                                new PNotify({
                                    title: 'Aviso!',
                                    text: 'Falha ao desconectar!'
                                });
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
	
}

var objUser = new User();