/* ===================================== */
/* AJAX MODAL EDITAR/EXCLUÍR (USUÁRIOS) */
/* =================================== */
function editarUsuario(id) {
	
	$.ajax({
		url: "../editar/edit_usuarios.php",
		type:'POST',
		data:{id:id},
		beforeSend:function(){
			$('#ModalEditUsuario').find('.modal-body').html('<center><img src="../assets/images/unnamed.gif"></center>');
			$('#ModalEditUsuario').modal('show');
		},
		success:function(html){
			$('#ModalEditUsuario').find('.modal-body').html(html);
			$('#ModalEditUsuario').find('.modal-body').find('form').on('submit', salvarUsuario);

			$('#ModalEditUsuario').modal('show');
		}
	});
}

function salvarUsuario(e){
	e.preventDefault();

	var nome = $(this).find(':input[name=nome]').val();
	var email = $(this).find(':input[name=email]').val();
	var usuario = $(this).find(':input[name=usuario]').val();
	var id = $(this).find(':input[name=id]').val();

	$.ajax({
		url:'../processa/proc_salva_usuarios.php',
		type:'POST',
		data:{nome:nome, email:email, usuario:usuario, id:id},
		success:function(){
			alert("Dados alterados com suceso!");
			window.location.href = window.location.href;
			$('#ModalUsuario').modal('hide');
		}
	});
}

function excluirUsuario(id) {

	$('#ModalEditUsuario').find('.modal-body').html('<center>Tem certeza que deseja excluir este usuário?<br><br><button type="button" onclick="fecharUsuario()" class="btn btn-outline-dark btn-sm"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Não</button> <button type="button" onclick="excluirUsuarioDel('+id+')" class="btn btn-outline-danger btn-sm"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Sim</button></center>');

	$('#ModalEditUsuario').modal('show');
}

function fecharUsuario(){
	$('#ModalEditUsuario').modal('hide');
}

function excluirUsuarioDel(id){
	$.ajax({
		url:'../processa/proc_exclui_usuario.php',
		type:'POST',
		data:{id:id},
		success:function(){
			alert("Dados excluidos com suceso!");
			window.location.href = window.location.href;
			$('#ModalEditUsuario').modal('hide');
		}
	});
}