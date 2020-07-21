var Utils = function() {

	var self = this; 
	
	this.message = function(title, text, type){
		
		typeMessage = 'notice';
		if(type != "")
			typeMessage = type;


		new PNotify({
			title: title,
			text: text,
			type: type,
			styling: 'bootstrap3'
		});
		
	};

	this.search = function(session){
		
		var s = $('#txt-search').val();
		$(location).attr('href', ROOT+'/'+session+'/s/'+s);
		
	};
	
	this.emailValidate = function(email){
		
		var r = "";
		var emailFilter=/^.+@.+\..{2,}$/;
		var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
		
		// condition
		if(!(emailFilter.test(email))||email.match(illegalChars)){
			r = 'error';
		}else{
			r = 'ok';
		}
		
		return r;
		
	};
		
}

var objUtils = new Utils();
