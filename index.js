var filtro_nome=null;
var filtro_tipo=null;
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
					fotos+="<img src='./imagens/"+a[i]+"' class='m-3' style='width:45%;'/>";
				}
				$("#fotos_home").html(fotos);
			}
		});
	}
	
	$("#filtrar").click(function(){
		$.ajax({
			url:"carrega_foto.php",
			type:"post",
			data: {filtro_nome: $("#filtro_nome").val(), filtro_tipo: $("select[name='filtro_tipo']").val()},
			success:function(matriz){
				if(matriz.length>0){
					var i=0;
					console.log(matriz);
					var fotos="<br/>";
					for(i=0;matriz.length>i;i++){
						fotos+="<img src='./imagens/"+matriz[i]+"' class='m-3' style='width:45%;'/>";
					}
					$("#fotos_home").html(fotos);
				}
				else{
					carrega_fotos();
				}
			}
		});
	});
});