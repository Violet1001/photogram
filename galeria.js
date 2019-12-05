p=null;
r=null;
filtro_data_a="";
filtro_data_b="";
filtro_nome="";
filtro_tipo="";
$(function(){
	carrega_fotos(0);
	function carrega_fotos(p){
		$.ajax({
			url:"carrega_foto.php",
			type:"get",
			data:{pg:"galeria",pagina:p},
			success:function(a){
				console.log(a);
				var fotos="<br/>";
				var i=0;
				for(i=0;a.length>i;i++){
					fotos+="<img src='./imagens/"+a[i]+"' valor='"+a[i]+"' style='height:150px;width:100px;' class='m-3 w-25'/>";
					fotos+="<button id='apagar_imagem' class='btn_excluir btn' valor='"+a[i]+"' style='width:50px;'><img src='./imagens/apagar.jpg' class='w-75'/></button>";
				}
				$("#fotos_galeria").html(fotos);
			},
			error:function(){
				console.log("ff");
			}
		});
	}
	//paginacao
	botoes_paginacao();
	function botoes_paginacao(){
		$.ajax({
			url:"paginacao.php",
			type:"get",
			data:
			{
				pg:"galeria",filtro_nome:filtro_nome,filtro_tipo:filtro_tipo,filtro_data_a:filtro_data_a,filtro_data_b:filtro_data_b
			},
			success:function(a){
				$("#btn_paginacao").html(a);
			}
		});
	}
	$(document).on("click",".btn_pagina",function(){
		p=$(this).val()-1;
		pg=p*5;

		carrega_fotos(pg);
	});
	$(document).on("click",".btn_excluir",function(){
		var l=$(this);
		var o=$(this).attr("valor");
		$.ajax({
			url:"remover.php",
			type:"post",
			data:{nome_imagem:o},
			success:function(){
				console.log($(this).attr("src"));
			}
		});
	});
	//filtro
	$(document).on("click","#filtrar",function(){
		filtro_data_a=$("#filtro_data_a").val();
		filtro_data_b= $("#filtro_data_b").val();
		filtro_nome=$("#filtro_nome").val();
		filtro_tipo=$("select[name='filtro_tipo'] option:selected").val();
		$.ajax({
			url:"carrega_foto.php",
			type:"post",
			data:
			{
				filtro_nome:filtro_nome,
				filtro_tipo:filtro_tipo,
				filtro_data_a:filtro_data_a,
				filtro_data_b:filtro_data_b
			},
			success:function(matriz){
				if(matriz.length>0){
					var i=0;
					console.log(matriz);
					var fotos="<br/>";
					for(i=0;matriz.length>i;i++){
						fotos+="<img src='./imagens/"+matriz[i].nome_imagem+"' valor='"+matriz[i].nome_imagem+"' />";
						console.log(i);
					}
					r=$("#opcoes").html();
					$("#fotos_galeria").html(fotos);
					$("#opcoes").remove();
					var remover="<div id='opcoes'><button id='remover_filtro' class='remove_filtro'>Remover filtros</button></div>";
					$("#filtro").append(remover);
				}
				else{
					carrega_fotos(0);
				}
			},
			error:function(lk){
				console.log("erro. "+lk);
			}
		});
	});
	$(document).on("click",".remove_filtro",function(){
		var voltar="<div id='opcoes'>";
		voltar+=r;
		voltar+="</div>";
		$("#filtro").html(voltar);
		carrega_fotos(0);
	});
});