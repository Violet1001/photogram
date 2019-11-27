o=0;
g=0;
n_imagem=0;
$(function(){
	carrega_fotos(0);
	botoes_paginacao();
	function carrega_fotos(p){
		$.ajax({
			url:"carrega_foto.php",
			type:"get",
			data:
			{
				pg:"home",
				pagina:p,
				filtro_nome:$("#filtro_nome").val(),
				filtro_tipo:$("select[name='filtro_tipo']").val(),
				filtro_data_a:$("#filtro_data_a").val(),
				filtro_data_b:$("#filtro_data_b").val()
			},
			success:function(a){
				console.log(a);
				var fotos="<br/>";
				var i=0;
				for(i=0;a.length>i;i++){
					fotos+="<div class='col-lg-4'><img src='./imagens/"+a[i]+"' valor='"+a[i]+"' class='m-3 w-50'/></div>";
				}
				$("#fotos_home").html("");
				$("#fotos_home").append(fotos);
				n_imagem=$("#fotos_home div").length;
				console.log("Numero de imagens:"+n_imagem);
			}
		});
	}
	//paginacao
	function botoes_paginacao(){
		$.ajax({
			url:"paginacao.php",
			type:"post",
			data:{pg:"home",n_imagens:n_imagem},
			success:function(a){
				console.log(a);
				$("#btn_paginacao").html(a);
			}
		});
	}
	$(document).on("click",".btn_pagina",function(){
		g=$(this).val()-1;
		pg=g*5;

		carrega_fotos(pg);
		
	});
	//filtrar
	$(document).on("click",".btn_filtrar",function(){
		$.ajax({
			url:"carrega_foto.php",
			type:"POST",
			data:{
				filtro_nome:$("#filtro_nome").val(),
				filtro_tipo:$("select[name='filtro_tipo']").val(),
				filtro_data_a:$("#filtro_data_a").val(),
				filtro_data_b:$("#filtro_data_b").val()
				
			},
			success:function(matriz){
				if(matriz.length>0){
					console.log(matriz);
					var i=0;
					var fotos="<br/>";
					for(i=0;matriz.length>i;i++){
						fotos+="<div class='col-lg-4'><img src='./imagens/"+matriz[i]+"' valor='"+matriz[i]+"' class='m-3 w-50'/></div>";
					}
					o=$("#opcoes").html();
					$("#fotos_home").html(fotos);
					$("#opcoes").remove();
					var remover="<div id='opcoes'><button id='remover_filtro' class='remove_filtro'>Remover filtros</button></div>";
					$("#filtro").append(remover);

					n_imagem=$("#fotos_home div").length;
					console.log("Numero de imagens:"+n_imagem);
					botoes_paginacao();
			 	}
				else{
					carrega_fotos(0);
				}
			},
			error:function(f){
				console.log("Nenhum dado de filtro foi passado");
				carrega_fotos(0);
			}
		});
	});
	$(document).on("click",".remove_filtro",function(){
		console.log(o);
		var voltar="<div id='opcoes'>";
		voltar+=o;
		voltar+="</div>";
		$("#filtro").html(voltar);
		carrega_fotos(0);
	});
});