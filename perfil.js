var f=null;
$(function(){
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