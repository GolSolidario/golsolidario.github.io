jQuery(document).ready(function(){
 
  // Initialize Parse with your Parse application & javascript keys
  Parse.initialize("FgQ11UQDPuWSlLCAVhP2HehqMQHamJwAjCSA8Zcj", "LWTFB7jDjOhYoarBoSQJeH3s0RtWLjRa1vRAeppw");
 
  // Setup the form to watch for the submit event
  jQuery('#submit2').click(function(e){
    //e.preventDefault();
    // Grab the elements from the form to make up
    // an object containing name, email and message
    if(jQuery('#submit2').val() == "Enviar cadastro"){
      var data = { 
        nomeTime: document.getElementById('nomeTime').value, 
        nomeResponsavel: document.getElementById('nomeResponsavel').value,
        endereco: document.getElementById('endereco').value,
        telefone: document.getElementById('fone').value,
        email: document.getElementById('email').value
      }
      if(!data.nomeTime || !data.nomeResponsavel || !data.endereco || !data.telefone || !data.email){
        alert("Preencha todos os campos obrigatórios!");
      } else {
        jQuery('#submit2').val("Enviando...");
        // Run our Parse Cloud Code and 
        // pass our 'data' object to it
        Parse.Cloud.run("sendEmail", data, {
          success: function(object) {
            alert("Inscrição enviada com sucesso, você ira receber uma notificação em breve!");
            jQuery('#submit2').val("Enviar cadastro");
            document.getElementById('nomeTime').value = ""; 
            document.getElementById('nomeResponsavel').value = "";
            document.getElementById('endereco').value = "";
            document.getElementById('fone').value = "";
            document.getElementById('email').value = "";
          },
     
          error: function(object, error) {
            console.log(error);
            alert("Ops, houve um erro ao enviar seu formulário, tente mais tarde!");
            jQuery('#submit2').val("Enviar cadastro");
          }
        });
      }
    } else {
      alert("Aguarde... Estamos enviando!");
    }
  });
 
});