<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
	header("location:login.php"); // Langsung mengarah ke Home index.php
}
?>