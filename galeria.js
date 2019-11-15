p=null;
$(function(){
	carrega_fotos();
	function carrega_fotos(){
		$.ajax({
			url:"carrega_foto.php",
			type:"get",
			data:{pg:"galeria"},
			success:function(a){
				var fotos="<br/>";
				console.log(a);
				var i=0;
				for(i=0;a.length>i;i++){
					fotos+="<img src='./imagens/"+a[i]+"' class='m-3' style='width:15%;'/>";
					fotos+="<button id='apagar_imagem' class='btn_excluir btn rounded' valor='"+a[i]+"' style='width:50px;'><img src='./imagens/apagar.jpg' class='w-100'/></button>";
				}
				$("#fotos_galeria").html(fotos);
			}
		});
	}
	/*$(document).on("click",".btn_excluir",function(){
		$.ajax({
			url:"remover.php",
			data:{nome_imagem:}
		});*/
		
	});
	$(document).on("click","#filtrar",function(){
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
					p=$("#opcoes").html();
					$("#fotos_home").html(fotos);
					$("#opcoes").remove();
					var remover="<div id='opcoes'><button id='remover_filtro' class='remove_filtro'>Remover filtros</button></div>";
					$("#filtro").append(remover);
				}
				else{
					carrega_fotos();
				}
			}
		});
	});
	$(document).on("click",".remove_filtro",function(){
		var voltar="<div id='opcoes'>";
		voltar+=p;
		voltar+="</div>";
		$("#filtro").html(voltar);
		carrega_fotos();
	});
});