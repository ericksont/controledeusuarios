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
	
}

var objUser = new User();