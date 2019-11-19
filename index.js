p=null;
$(function(){
	carrega_fotos(0);
	paginacao();
	function carrega_fotos(p){
		$.ajax({
			url:"carrega_foto.php",
			type:"get",
			data:{pg:"home",pagina:p},
			success:function(a){
				console.log(a);
				var fotos="<br/>";
				var i=0;
				for(i=0;a.length>i;i++){
					fotos+="<img src='./imagens/"+a[i]+"' class='m-3' style='width:15%;'/>";
				}
				$("#fotos_home").html(fotos);
			}
		});
	}
	//paginacao
	function paginacao(){
		$.ajax({
			url:"paginacao.php",
			type:"post",
			data:{pg:"home"},
			success:function(a){
				console.log(a);
				$("#paginacao").html(a);
			}
		});
	}
	$(document).on("click",".btn_pagina",function(){
		p=$(this).val()-1;
		pg=p*5;

		carrega_fotos(pg);
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