<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION["username"])) {
	include_once("include/login.php");
} else {
    include('include/nav_left_account.php');
	include_once("include/logout.php");
}