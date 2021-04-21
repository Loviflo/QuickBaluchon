/*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
 *et d'appliquer les styles de validation aux différents éléments de formulaire*/
(() => {
  "use strict";
  window.addEventListener(
    "load",
    function () {
      let forms = document.getElementsByClassName("needs-validation");
      Array.prototype.filter.call(forms, (form) => {
        form.addEventListener(
          "submit",
          (event) => {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
          },
          false
        );
      });
    },
    false
  );
})();
