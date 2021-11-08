export default function initActionBtn() {
  const buttonsDelete = document.querySelectorAll('[data-actionbtn="delete"]');

  function handleClickBtnDelete(e) {
    let confirmResponse = confirm('Você tem certeza que quer excluir esse usuário?');
    if(!confirmResponse) {
      e.preventDefault();
      return false;
    }
  }

  if(buttonsDelete) {
    buttonsDelete.forEach((btnDelete) => {
      btnDelete.addEventListener('click', handleClickBtnDelete);
    });
  }
}
