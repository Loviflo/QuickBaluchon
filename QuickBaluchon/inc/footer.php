<footer class="mt-5 footer text-center text-white" style="background-color: #674232;">
  <!-- <div class="text-center p-3" style="background-color: #674232;">
    <p class="d-flex justify-content-center align-items-center">
      <span class="me-3">Contactez-nous</span>
      <button type="button" class="btn btn-outline-light btn-rounded">Contact</button>
    </p>
    © 2021 Copyright :
    <a class="text-white" href="index.php">SPS</a>
  </div> -->
  <?php if (isset($_SESSION['user'])) { ?>
  <div class="pt-3 row">
  <p class="justify-content-center align-items-center">
    <span class="me-3">Contactez-nous</span>
    <a href="#"><button type="button" class="btn btn-outline-light btn-rounded">Contact</button></a>
  </p>
  </div>
  <div class="row">
    <p class="justify-content-center align-items-center">
      © 2021 Copyright :
      <a class="text-white" href="index.php">SPS</a>
    </p>
  </div>
  <?php } else { ?>
  <div class="pt-3 row justify-content-around">
    <div class="col-lg-4">
      <p class="justify-content-center align-items-center">
        <span class="me-3">Contactez-nous</span>
        <a href="#"><button type="button" class="btn btn-outline-light btn-rounded">Contact</button></a>
      </p>
    </div>
    <div class="col-lg-4 mb-2 mb-lg-0">
      <!-- <p class="justify-content-center align-items-center">
        <span class="me-3">Connexion Staff</span>
        <a href="login_staff.php"><button type="button" class="btn btn-outline-light btn-rounded">Connexion</button></a>
      </p> -->
      <div class="dropup">
        <a aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-outline-light me-2 dropdown-toggle" href="#">Connexion staff</a>
        <div class="dropdown-menu" id="dropMenu">
        <?php if (isset($_GET['ifail'])) {
            echo "<h3 class='text-warning'>" . $_GET['ifail'] . "</h3>";
        } ?>
          <form class="px-4 py-3 needs-validation" action="actions/login_form.php" method="POST" novalidate>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" name="username" class="form-control" aria-label="e-mail address" required>
              <label class="form-label" for="form2Example1">Nom d'utilisateur</label>
              <div class="valid-feedback">Ok !</div>
              <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control" aria-label="Votre mot de passe" required>
              <label class="form-label" for="form2Example2">Mot de passe</label>
              <div class="valid-feedback">Ok !</div>
              <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <p class="justify-content-center align-items-center">
      © 2021 Copyright :
      <a class="text-white" href="index.php">SPS</a>
    </p>
  </div>
  <?php } ?>
  <!-- Copyright -->
</footer>
<script>
/*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
*et d'appliquer les styles de validation aux différents éléments de formulaire*/
(function() {
    'use strict';
    window.addEventListener('load', function() {
    let forms = document.getElementsByClassName('needs-validation');
    let dropMenu = document.getElementById('dropMenu');
    let validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            dropMenu.classList.add('show');
        } else {
          dropMenu.classList.remove('show');
        }
        form.classList.add('was-validated');
        }, false);
    });
    }, false);
})();
</script>
<script 
  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
  integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" 
  crossorigin="anonymous">
</script>
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" 
  integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" 
  crossorigin="anonymous">
</script>
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" 
  crossorigin="anonymous">
</script>