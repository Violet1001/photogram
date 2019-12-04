var f=null;
var salva=null;
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
	//alterar nome
	$(document).on("click","#altera_nome",function(){
		f=$("#altera_nome").html();
		$("#nome").removeAttr("disabled");
		$(this).html("Confirmar alteração");
		$(this).removeAttr("id");
		$(this).addClass("alterando_nome");
	});
	$(document).on("click",".alterando_nome",function(){
		console.log(f);
		$.ajax({
			url:"altera.php",
			type:"post",
			data:
			{
				nome:$("#nome").val(),
				email:$("#email").val()
			},
			success:function(g){
				console.log(g);
				$(".alterando_nome").attr("id","altera_nome");
				$(".alterando_nome").removeClass("alterando_nome");
				$("input[name='nome']").prop("disabled",true);
				$("#altera_nome").html(f);
			},
			error:function(){
				console.log("ff");
			}
		});
	});
	//alterar sobrenome
	$(document).on("click","#altera_sobrenome",function(){
		f=$(this).html();
		$("#sobrenome").removeAttr("disabled");
		$(this).html("Confirmar alteração");
		$(this).removeAttr("id");
		$(this).addClass("alterando_sobrenome");
	});
	$(document).on("click",".alterando_sobrenome",function(){
		$.ajax({
			url:"altera.php",
			type:"post",
			data:
			{
				sobrenome:$("#sobrenome").val(),
				email:$("#email").val()
			},
			success:function(g){
				console.log(f);
				console.log(g);
				$(".alterando_sobrenome").attr("id","altera_sobrenome");
				$(".alterando_sobrenome").removeClass("alterando_sobrenome");
				$("#sobrenome").prop("disabled",true);
				$("#altera_sobrenome").html(f);
			}
		});
	});
	//alterar sexo
	$(document).on("click","#altera_sexo",function(){
		f=$(this).html();
		$("select[name='sexo']").removeAttr("disabled");
		$(this).html("Confirmar alteração");
		$(this).removeAttr("id");
		$(this).addClass("alterando_sexo");
	});
	$(document).on("click",".alterando_sexo",function(){
		$.ajax({
			url:"altera.php",
			type:"post",
			data:
			{
				sexo:$("select[name='sexo'] option:selected").val(),
				email:$("#email").val()
			},
			success:function(g){
				console.log(f);
				console.log(g);
				$(".alterando_sexo").attr("id","altera_sexo");
				$(".alterando_sexo").removeClass("alterando_sexo");
				$("select[name='sexo']").prop("disabled",true);
				$("#altera_sexo").html(f);
			}
		});
	});
	//alterar usuario
	$(document).on("click","#altera_usuario",function(){
		f=$(this).html();
		$("#usuario").removeAttr("disabled");
		$(this).html("Confirmar alteração");
		$(this).removeAttr("id");
		$(this).addClass("alterando_usuario");
	});
	$(document).on("click",".alterando_usuario",function(){
		$.ajax({
			url:"altera.php",
			type:"post",
			data:
			{
				usuario:$("#usuario").val(),
				email:$("#email").val()
			},
			success:function(g){
				console.log(f);
				console.log(g);
				$(".alterando_usuario").attr("id","altera_usuario");
				$(".alterando_usuario").removeClass("alterando_usuario");
				$("#usuario").prop("disabled",true);
				$("#altera_usuario").html(f);
			}
		});
	});
	//altera tudo
	$(document).on("click","#altera_tudo",function(){
		salva=$("#dados").html();

		$("#altera_nome").html("");
		$("#altera_sexo").html("");
		$("#altera_sobrenome").html("");
		$("#altera_usuario").html("");
		$("#nome").prop("disabled",false);
		$("select[name='sexo']").prop("disabled",false);
		$("#sobrenome").prop("disabled",false);
		$("#usuario").prop("disabled",false);
		
		$(this).html("Clique para alterar");
		
		$(this).removeAttr("id");
		$(this).addClass("alterar_tudo");
	});
	$(document).on("click",".alterar_tudo",function(){
		$.ajax({
			url:"altera.php",
			type:"get",
			data:
			{
				nome:$("#nome").val(),
				sobrenome:$("#sobrenome").val(),
				sexo:$("select[name='sexo'] option:selected").val(),
				usuario:$("#usuario").val(),
				email:$("#email").val()
			},
			success:function(vz){
				console.log(vz);
				$("#dados").html(salva);

				$("#nome").val(vz.nome);
				$("#sobrenome").val(vz.sobrenome);
				$("#usuario").val(vz.usuario);
				$("select[name='sexo'] option:selected").val(vz.sexo);
			}
		});		
	});
});