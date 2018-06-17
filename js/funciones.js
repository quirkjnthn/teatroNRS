$( document ).ready(function() {
    console.log( "ready!" );

    var cuentaButacas = 0;

	$(".seleccion").click(function(){
		
		var status = $(this).attr("data-status");
		var id = $(this).attr("data-id");
		var fila = $(this).attr("data-fila");
		var columna = $(this).attr("data-columna");

		console.log("ES "+status);
		if(status==0){
			$(this).css("background-color","yellow");	
			$(this).attr("data-status","2");
			cuentaButacas++;
			if(cuentaButacas==1){
				$("#divInfo").empty();
			}

			$("#divInfo").append('<div id="infoB'+id+'" class="row"><div class="col-xs-12 thumbnail" style="height: auto;"><b>Butaca #:</b> '+id+'<br><b>Fila:</b> '+fila+'<br><b>Columna:</b> '+columna+'</div></div>');
			$("#submitReserva").prop("disabled",false);
			$("#formButacas").append("<input type='hidden' name='butaca"+id+"' id='hidden"+id+"' value='"+id+"'>");

		}
		if(status==2){
			$(this).css("background-color","green");	
			$(this).attr("data-status","0");
			$("#infoB"+id).remove(); 
			$("#hidden"+id).remove(); 
			cuentaButacas--;
			if(cuentaButacas==0){
				$("#submitReserva").prop("disabled",true);
				$("#divInfo").empty();
				$("#divInfo").append("<p>Aún no tienes asientos seleccionados.</p>");
			}
		}
	});

	$("#submitReserva").click(function (){
		console.log($("#formButacas").attr("data-url"));
		 $.ajax({
           type: "POST",
           url: $("#formButacas").attr("data-url"),
           data: $("#formButacas").serialize(), // serializes the form's elements.
           success: function(data)
           {
           		$("#paso2").show();
           		$("#paso1").hide("slow");
               $("#numeroReserva").append(data);
           }
         });
	});

});