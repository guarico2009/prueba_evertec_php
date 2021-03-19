let form = $('#form');
let data = form.serialize();

//Consultar estado de la orden cada 30 segundos
function consultaEstado(){
  Swal.fire({
    allowOutsideClick: false,
    text: 'Consultando estado...',
    icon: 'info'
  });

  Swal.showLoading();

  $.post('/orden/pago/consultarEstado', data, function(result){
    Swal.close();
    estado = result.status;
  }).fail( function(result) {
    Swal.close();
  });

  setTimeout(() => {
    if(estado == 'PENDING') {
      consultaEstado();
    }else{
      $("#status").html("<b>Estado: " + estado + "</b>");
      $("#btnPending").remove();
      return;
    }
  }, 30000)
}
