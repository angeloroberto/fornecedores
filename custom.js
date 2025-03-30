
  
/*function alert(){
    
    Swal.fire('Agendamento realizado com sucesso', 'O agendamento foi realizado com sucesso.', 'success'

);
   
    confirmButtonColor: 'orangered';
   
}


alert(); */

Swal.fire({
    html: '<img src="dicasa_logo_175.png" alt="">',
    title: 'Agendamento realizado com sucesso',
    text: "Agendamento realizado com sucesso",
    icon: 'success',
   
    
    confirmButtonColor: 'orangered',
   
}).then((value)=>{
   {window.location = "agendamento.php" }
    });
  

  
  
  
  



