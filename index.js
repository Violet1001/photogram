var filtro_nome=null;
var filtro_tipo=null;
$(function(){
	$("#filtrar").click(function(){
		$.ajax({
			url:"carrega_foto.php",
			type:"post",
			//, filtro_tipo: $("#select[name='filtro_tipo']").val()
			data: {filtro_nome: $("#filtro_nome").val()},
			success:function(matriz){
				var i=0;
				console.log(matriz);
				do{
					fotos="<img src='imagens/"+matriz[i]+"' class='w-50'/>";
					i++;
				}
				while(matriz.length<i){
					fotos+="<img src='imagens/"+matriz[i]+"' class='w-50'/>";	
				}
				$("#fotos_home").html(fotos);
			}
		});
	});
});