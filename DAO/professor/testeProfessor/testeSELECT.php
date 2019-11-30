<?php
 
  require_once '../../conexao.php';
   
  $sql_img = " select foto
  from PROFESSOR
 where email = 'd@gmail.com'";
 //sc_lookup(ds_img, $sql_img);
 if (isset(ds_img[0][0]))
 {
     if (!empty(ds_img[0][0]))
     {
         $varImg = base64_encode(ds_img[0][0]);
         echo "<img border=0 height='63px' src='data:image/png;base64,$varImg'>";
     }
     else
     {
        echo "Imagem não disponível";
     }
 }
 echo 'erro';
 
  ?>
  