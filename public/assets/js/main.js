 $(document).ready( function() {        

	// sidebar menu click
	$('.wukar-sidebar-menu li.sub a').click(function(){
		if($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
		} else {
			$(this).parent().addClass('open');
		}
	});

	//Prompy warning on form submit
	$('form.form-warning').on('submit',function(e){
		e.preventDefault();

		var form = $(this),
		 	$btn = $(document.activeElement),
		 	btn = $btn[0];

		var modal = '';
			modal +='	<div id="dynamicModalDiv" class="modal fade wukar-form-submit-warning" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
			modal +='	  <div class="modal-dialog modal-lg">';
			modal +='	    <div class="modal-content">';
			modal +='		<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">Confirm Action.</h4></div>';
			modal +='	     <div class="modal-body">Are you sure you want to submit this form?</div>';
			modal +='	    <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button id="save_changes" type="button" class="btn btn-primary">Save changes</button></div>';
			modal +='	    </div>';
			modal +='	  </div>';
			modal +='	</div>';

		$("body").append(modal);

		$('#dynamicModalDiv').modal({
			'show' : true
		});

		$('#save_changes').on('click',function(){

			var data = form.serializeArray();
			data.push({name:btn.name, value: btn.value});

			$.ajax({
				url: form.attr('action'),
				type: 'POST',
				data: data,
			})
			.done(function(e) {
				if(e.status == 'error'){
					 // $.growl({ title: "Growl", message: "The kitten is awake!" });
					  // $.growl.error({ message: "The kitten is attacking!" });
					  // $.growl.notice({ message: "The kitten is cute!" });
					  $.growl.warning({ message: "Unable to save changes" });
				}else{
					$.growl.notice({ message: "Your changes were saved. Refresh the page to show changes" });
				}
				window.location=window.location.href;
			})
			.fail(function(e) {
				console.log("error");
			})
			.always(function(e) {	

			});

			$('#dynamicModalDiv').modal('hide');
			
		});

	});
});
