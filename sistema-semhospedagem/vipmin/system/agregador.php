<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(); 
need_auth('team');
 
include template('manage_system_agregador');


