export default function initChangePasswordVisibility() {
  const input = document.querySelector('[data-password]');
  const boxTogleEye = document.querySelector('.box-toggle-pass');
  const eyeButtonClose = document.querySelector('.show-pass');
  const eyeButtonOpen = document.querySelector('.hide-pass');
  let isHide = true;

  function showPass() {
    isHide = false;
    eyeButtonClose.style.display = 'none';
    eyeButtonOpen.style.display = 'block';
    input.type = "text";
  }

  function hidePass() {
    isHide = true;
    eyeButtonClose.style.display = 'block';
    eyeButtonOpen.style.display = 'none';
    input.type = "password";
  }

  function handleClick() {
    (isHide) ? showPass() : hidePass();
  }

  if (boxTogleEye, input, eyeButtonClose, eyeButtonOpen) {
    boxTogleEye.addEventListener('click', handleClick);
  }
}
