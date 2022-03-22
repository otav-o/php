<?php
  echo '<p> c </p>';
  include 'd.php'; // include dá um warning, mas não quebra a execução. Require dá erro fatal.
  echo '<p> fim c </p>';

  // lembre-se que é exatamente um ctrl c / ctrl v
  // isso daria problema de redeclaração de variável e função. Para resolver, usar o include_once

  include_once 'b.php';
  require_once 'a.php';