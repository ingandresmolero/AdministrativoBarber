<?php


if ($rol != 'admin') {
  echo '
  <script>

   location.href ="../views/dashboard.php";
  </script>';
}else{
};

?>