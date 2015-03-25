var Formulario = {
	init : function() {
	
		$('#preco').keypress(function(e){
			if((/[!|\^?=,\<"\>'+\/;\(\)@*%$#&:\\\{}\[\]~´`¨]/g).test(String.fromCharCode(e.which)) || (/[a-zA-z]/).test(String.fromCharCode(e.which))){
				e.preventDefault();	
			}
		});
						
		$('#quantidade').keypress(function(e){
			if((/[!|\^?=,.\<"\>'+\/;\(\)@*%$#&:\\\{}\[\]~´`¨]/g).test(String.fromCharCode(e.which)) || (/[a-zA-z]/).test(String.fromCharCode(e.which))){
				e.preventDefault();	
			}
		});
		
		$('.form-horizontal').validate({
			errorPlacement: function(error,element) {
				return true;
			 }
		});
	}
};

$(document).ready(function(){
	Formulario.init();
});