<?php
//Check du post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  var_dump($_POST);
}
else{
  http_response_code(403);
  echo "Il y avait un problème avec la soumission du formulaire, veuillez essayer à nouveau.";
}