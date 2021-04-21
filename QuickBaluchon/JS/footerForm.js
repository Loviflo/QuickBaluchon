/*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
 *et d'appliquer les styles de validation aux différents éléments de formulaire*/
let footer = document.getElementsByTagName("footer");
if (
  footer[0].children[1].children[1].children[0].children[1].children[0]
    .children[2].type == "submit"
) {
  (() => {
    window.addEventListener(
      "load",
      function () {
        let forms = document.getElementsByClassName("needs-validation");
        let dropMenu = document.getElementById("dropMenu");
        Array.prototype.filter.call(forms, function (form) {
          form.addEventListener(
            "submit",
            (event) => {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                dropMenu.classList.toggle("show");
              } else {
                dropMenu.classList.toggle("show");
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
}
