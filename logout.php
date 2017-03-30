<?php
require_once "include/session.php";

unset($session->login);
header( "location: ." );
