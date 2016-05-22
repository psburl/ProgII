$(document).ready(function(){

	$("#btnReminder").click(function(){

		if(document.getElementById("btnReminder").value == "Lembrete"){
			$("#TypeTaskArea").hide("fast");
			$("#TypefulTextArea").show("slow");
			document.getElementById("btnReminder").value = "Ocultar";
			document.getElementById("btnTask").value = "Tarefa";
		}
		else{
		
			$("#TypefulTextArea").hide("slow");
			document.getElementById("btnReminder").value = "Lembrete";
		}

	});

	$("#btnTask").click(function(){
		
		if(document.getElementById("btnTask").value == "Tarefa"){
			$("#TypefulTextArea").hide("fast");
			$("#TypeTaskArea").show("slow");
			document.getElementById("btnTask").value = "Ocultar";
			document.getElementById("btnReminder").value = "Lembrete";
		}
		else{
			
			$("#TypeTaskArea").hide("slow");
			document.getElementById("btnTask").value = "Tarefa";
		}


	});


});	