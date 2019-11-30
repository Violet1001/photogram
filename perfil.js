var f=null;
$(function(){
	carrega_foto_perfil();
	function carrega_foto_perfil(){
		$.ajax({
			url:"foto_perfil.php",
			success:function(vx){
				console.log(vx);
				var foto_perfil="<img src='./fotos_perfil/"+vx+"' class='w-25'/>";
				$("#foto_perfil").append(foto_perfil);
			}
		});
	}
	$("#altera_nome").click(function(){
		f=$(this).html();
		$("#nome").removeAttr("disabled");
		$(this).html("Confirmar alteração");
		$(this).removeAttr("id");
		$(this).addClass("alterando");
	});
	$(document).on("click",".alterando",function(){
		$.ajax({
			url:"altera.php",
			type:"post",
			data:{nome:$("#nome").val()},
			success:function(g){
				console.log(f);
				console.log(g);
				$(".alterando").attr("id","altera_nome");
				$(".alterando").removeClass("alterando");
				$("#nome").attr("disabled","disabled");
				$("#altera_nome").html(f);
			}
		});
	});
});