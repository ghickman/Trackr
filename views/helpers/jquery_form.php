<?php
/**
 *  jQuery Live Form Validation Helper
 *
 *  @author Marc Grabanski <m@marcgrabanski.com>
 *  @author Jeff Loiselle <jeff@newnewmedia.com>
 */
class JqueryFormHelper extends AppHelper {
	
	var $forms = array();
	var $helpers = array('Javascript');
	
	/**
	 * Writes the jQuery code that handles the AJAX
	 */
	function afterRender() {
		
		$forms = array();
		foreach ($this->forms as $id) {
			$forms[] = "#$id :input";
		}
		$forms = implode(', ', $forms);
		
		$js = <<<END
		$(document).ready(function() {
		   	$('$forms').change(function(){
			    $(this).parents('form:first').ajaxSubmit({
					dataType: 'json',
			        success:function(response){
						var ids = [];
						$(response).each(function(i, field){
							ids[i] = field.id;
							if (field.message) {
								input = $("#"+field.id);
								input.parents('div.input:first').addClass('error');
								if (input.siblings('.error-message').length > 0) {
									input.siblings('.error-message').html(field.message);
								} else {
									$('<div class="error-message">' + field.message + '</div>')
										.data('input.id', field.id)
										.insertAfter(input);
								}
							}
						});

						$("div.error-message")
							.each(function(i, errorDiv){
								invalid = $.inArray($(errorDiv).data('input.id'), ids);
								if (invalid < 0) {
									$(errorDiv).parents('div.error:first').removeClass('error');
									$(errorDiv).fadeOut().remove();
								}
							});
			        }
			    });
			});
		 });
END;
		print $this->Javascript->codeBlock($js);
	}
	
	/**
	 * Creates a hidden form element that triggers AJAX validation by the associated component
	 */
	function validate($id) {
		$this->forms[] = $id;
		return $this->output("<input type=\"hidden\" name=\"data[__validate]\" value=\"1\"");
	}
	
}

?>