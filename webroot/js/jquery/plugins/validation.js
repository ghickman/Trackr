$(document).ready( function() {     
	$('#validation').blur( function () {
        fieldName = $(this).attr('id');  
        fieldValue = $(this).val();  
	
         $.post('/users/ajax_validate', {
         	field: fieldName,  
            value: fieldValue  
    	},  
    
    	function(error) {
    		if(error.length != 0) {
    			$('#validation').after('<div class="error-message" id="'+ fieldName +'-exists">' + error + '</div>');  
    		} else {  
                $('#' + fieldName + '-exists').remove();  
            }  
        });  
    });        
});