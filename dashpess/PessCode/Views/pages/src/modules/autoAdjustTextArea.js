export default function initAutoAdjustTextArea() {
  const textareas = document.querySelectorAll('[data-textarea="autoGrow"]');

  function autoGrow(textarea) {
    if (textarea.scrollHeight > textarea.clientHeight) {
      textarea.style.height = textarea.scrollHeight + "px";
    }
  }

  function adjustTextArea(textarea) {
    textarea.style.height = '1px'; // Prevent height from growing when deleting lines.
    textarea.style.height = textarea.scrollHeight + 'px';
  }

  function handleKeyUp(e){
    autoGrow(e.target);
    adjustTextArea(e.target);
  }

  function handleTextarea() {
    textareas.forEach((textarea) => {
      autoGrow(textarea);
      adjustTextArea(textarea);
    });
    textareas.forEach((textarea) => textarea.addEventListener('keyup', handleKeyUp));
  }

  if (textareas) {
    handleTextarea();
  }
}