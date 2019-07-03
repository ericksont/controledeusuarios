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
		
}

var objUtils = new Utils();
