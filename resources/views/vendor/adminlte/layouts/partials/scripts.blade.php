<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<!-- <script src="{{ url ('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>-->
<script src="{{ url ('js/jquery-ui.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
	function filePreview(input) { 
	    var url = input.value; 
	    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase(); 
	    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) { 
	    	var reader = new FileReader(); 
	    	reader.onload = function (e) { 
	    		console.log(e);
	    		$('.circular').attr('src', e.target.result); 
	    	}
	    	reader.readAsDataURL(input.files[0]); 
	    }
	} 
	// Esto pertenece al perfil, para que se cambie la imagen cuando selecciono otra sin g uardar
	function filePreview1(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {

	            $('.circular').attr('src', e.target.result);
	           // $('.circular').after('<img src="'+e.target.result+'" width="450" height="300"/>');
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	};

	$("#profile-img").change(function(){
	        filePreview(this);
    });
	$(document).ready(function()
	{
	    
	});



	$(function(){
	    $('.fechas').datepicker({
	          format: '{{ config("app.date_format_js") }}'
	    });
	});

</script>
