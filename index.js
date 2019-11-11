var filtro_nome=null;
var filtro_tipo=null;
$(function(){
	$("#filtrar").click(function(){
		$.ajax({
			url:"carrega_foto.php",
			type:"post",
			//, filtro_tipo: $("#select[name='filtro_tipo']").val()
			data: {filtro_nome: $("#filtro_nome").val()},
			success:function(a){
				var i=0;
				var fotos=null;
				for(i=0;i<a;i++){
					fotos+="<img src='"+a.nome_imagem+"'/>";
				}
				$("#fotos_home").html(fotos);
			}
		});
	});
});