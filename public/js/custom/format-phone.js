const phoneinputs = document.querySelectorAll('[format="phone"]');

phoneinputs.forEach(input => {
  input.addEventListener('input', (e) => {
    let value = e.target.value.replace(/[^0-9]/g, '');
    const cursorPosition = e.target.selectionStart;

    if (value.length > 4) {
      value = value.substring(0, 4) + '-' + value.substring(4);
    }
    if (value.length > 9) {
      value = value.substring(0, 9) + '-' + value.substring(9);
    }

    input.value = value;

    if (cursorPosition === 5 || cursorPosition === 10) {
      e.target.setSelectionRange(cursorPosition + 1, cursorPosition + 1);
    } else {
      e.target.setSelectionRange(cursorPosition, cursorPosition);
    }
  });
});