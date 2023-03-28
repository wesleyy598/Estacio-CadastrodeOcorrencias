
		function valida(dado){
			if (dado.value==""){
				alert ("O campo "+changeName(dado)+" precisa ser preenchido!");
				return 0;
				}
			else{
			return 1;
			}
		}
		
		function validaNum(dado){
		var teste = /^[0-9]+$/;
			if (dado.value.match(teste)){
			return 1;
			}
			else{
				alert("O campo "+changeName(dado)+" precisa ser numérico!");
				return 0;	
			}
		}
		
		function mudaPag(dado){
			if (dado.value == "tab-done")
				document.getElementById("frame").src = "tab_done.html";
			else
				if (dado.value == "tab-wait")
					document.getElementById("frame").src = "tab_wait.html";
				else
					document.getElementById("frame").src = "tab_all.html";
		}
			
		function validaNumRequired(dado){
			var passed = 0;
			if (dado.value==""){
				alert ("O campo "+dado.name+" precisa ser preenchido!");
				return 0;
				}
			else{
				passed = validaNum(dado);
			return passed;
			}
		}

		function checkBoxes (dado) {
			dado = document.getElementById("main_check_request");
			if (dado.checked > 0)
				checkAllBoxes(dado);
			else
				uncheckAllBoxes(dado);
		}

		function checkAllBoxes (dado) {
			for(var i=0;i<100;i++){
				dado = document.getElementById("check_request");
				if (dado.id == "check_request"){
					dado.checked = 1;
					dado.id = "check_request_checked";
				}else
					break;
			}
		}

		function uncheckAllBoxes (dado) {
			for(var i=0;i<100;i++){
				dado = document.getElementById("check_request_checked");
				if (dado.id == "check_request_checked"){
					dado.checked = 0;
					dado.id = "check_request";
				}else
					break;
			}
		}
		
		function mudaChecked(dado){
			if (dado==""){
				dado = "checked-ok";
				document.getElementById("aceita-termos").value = dado;
			}
			else{
				dado = "";
				document.getElementById("aceita-termos").value = dado;
			}
		}
		
		function validaTermos2 (){
			var passed = 0;
			dado = document.getElementById("aceita-termos").value;
			passed = validaTermos(dado);
			return passed;
		}
		
		function emDesenvolvimento(){
			alert ("Em Desenvolvimento...");
		}
		
		function validaAll(){
			var cont = 0;
			var passed = 0;
			alert ("Conferindo formulário, aguarde...");
			dado = document.getElementById("setor-prox-etapa");
			cont ++;
			passed = valida(dado);
			dado = document.getElementById("campus-resp");
			cont ++;
			passed += valida(dado);
			dado = document.getElementById("matricula");
			cont ++;
			validaNum(dado);
			passed += valida(dado);
			dado = document.getElementById("nome");
			cont ++;
			passed += valida(dado);
			dado = document.getElementById("tipo-ocorrencia");
			cont ++;
			passed += valida(dado);
			dado = document.getElementById("status");
			cont ++;
			passed += valida(dado);
			dado = document.getElementById("observacao");
			cont ++;
			passed += valida(dado);
			if (cont == passed){
				var formObj = new FormData(form);
				$.ajax({
					url: 'ocorrencia.php',
					data: formObj,
					type: 'POST',
					processData: false,
					contentType: false,
					success: function(data){
						if (data == "1")
							alert ("Cadastro Efetuado!")
						else
							alert ("Cadastro Errado!")
					}
				});
				/*
				alert ("Cadastro efetuado com sucesso!");
				//Retorno de teste
				window.location.href = "controlpanel.html";*/
			}
			else{
				alert ("Não foi possivel efetuar o cadastro, por favor verifique os campos obrigatórios!");
				document.getElementById("setor-prox-etapa").focus();
			}	
		}

		function closeModal () {
			document.location.reload(true);
		}

		function changeName(dado) {
			if (dado.name == "setor-prox-etapa")
				return "Setor da Próxima Etapa";
			else{
				if (dado.name == "setor-redirec")
					return "Setor para Redirecionamento";
				else{
					if (dado.name == "campus-resp")
						return "Campus Responsável";
					else{
						if (dado.name == "matricula")
							return "Matrícula";
						else{
							if (dado.name == "nome")
								return "Nome";
							else{
								if (dado.name == "tipo-ocorrencia")
									return "Tipo de Ocorrência";
								else{
									if (dado.name == "status")
										return "Status";
									else{
										return "Observação";
									}
								}
							}
						}
									
					}
				}
			}
		}