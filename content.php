<?php
  $page = "home";
  if(isset($_GET['page']))
  {
    if(empty($_GET['page']) == FALSE)
    {
      $page = $_GET['page'];   
    }
  }

  if ($page == "home") {
    	include "home.php";
  	}elseif ($page == "about") {
    	include "about.php";
  	}elseif ($page == "kontak") {
    	include "kontak.php";
	}elseif ($page == "produk") {
    	include "produk.php";
	}elseif ($page == "detail_produk") {
    	include "detail_produk.php";
  	}

  else {
    include "home.php";
  }

?>
