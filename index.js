p=null;
$(function(){
	carrega_fotos();
	function carrega_fotos(){
		$.ajax({
			url:"carrega_foto.php",
			type:"get",
			data:{f:"s"},
			success:function(a){
				var fotos="<br/>";
				console.log(a);
				var i=0;
				for(i=0;a.length>i;i++){
					fotos+="<img src='./imagens/"+a[i]+"' class='m-3' style='width:15%;'/>";
				}
				$("#fotos_home").html(fotos);
			}
		});
	}
	
	$("#filtrar").click(function(){
		$.ajax({
			url:"carrega_foto.php",
			type:"post",
			data: {filtro_nome: $("#filtro_nome").val(), filtro_tipo: $("select[name='filtro_tipo']").val(),filtro_data_a: $("#filtro_data_a").val(),filtro_data_b: $("#filtro_data_b").val()},
			success:function(matriz){
				if(matriz.length>0){
					var i=0;
					console.log(matriz);
					var fotos="<br/>";
					for(i=0;matriz.length>i;i++){
						fotos+="<img src='./imagens/"+matriz[i]+"' class='m-3' style='width:15%;'/>";
					}
					$("#fotos_home").html(fotos);
					$("#opcoes").remove();
					var remover="<div id='opcoes'><button id='remover_filtro'>Remover filtros</button></div>";
					$("#filtro").append(remover);
				}
				else{
					carrega_fotos();
				}
			}
		});
	});
	$(document).on("click","#remover_filtro",function(){
		var voltar="<div id='opcoes'>";
		voltar+=p;
		voltar+="</div>";
	});
	/*function remove_filtro(){
		$.ajax({
			url:"carrega_foto.php",
			type:"get",
			data:{f:"remover"},
			success:function(d){
				var i=0;
				var fotos="<br/>";
				for(i=0;d.length>i;i++){
					fotos+="<img src='./imagens/"+d[i]+"' class='m-3' style='width:15%;'/>";
				}
				$("fotos_home").html(fotos);
			}
		});
	}*/
});