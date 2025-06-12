import Swal from 'sweetalert2';

document.querySelectorAll('.btn-excluir').forEach(button => {
  button.addEventListener('click', function() {
    const form = this.closest('form');
    const nome = this.getAttribute('data-nome');

    Swal.fire({
      title: `Tem certeza que deseja excluir "${nome}"?`,
      text: "Você não poderá reverter isso!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sim, excluir!"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Excluído!',
          `"${nome}" foi excluído com sucesso.`,
          'success'
        ).then(() => {
          form.submit();
        });
      }
    });
  });
});

function toggleFields(value) {
  const riscoNomeadoFields = document.querySelectorAll('.risco-nomeado-fields');
  const multirriscoFields = document.querySelectorAll('.multirrisco-fields');
  const descricaoField = document.querySelectorAll('.descricao-field');

  // Esconde todos os campos específicos
  riscoNomeadoFields.forEach(field => field.style.display = 'none');
  multirriscoFields.forEach(field => field.style.display = 'none');
  descricaoField.forEach(field => field.style.display = 'none');

  // Mostra os campos conforme o valor
  if (value === 'Risco Nomeado') {
    riscoNomeadoFields.forEach(field => field.style.display = 'block');
    descricaoField.forEach(field => field.style.display = 'block');
  } else if (value === 'Multirrisco') {
    multirriscoFields.forEach(field => field.style.display = 'block');
    descricaoField.forEach(field => field.style.display = 'block');
  }
}

window.toggleFields = toggleFields;
window.onload = function() {
  const select = document.getElementById('prd_tipos_cobertos');
  if (select) toggleFields(select.value);
};