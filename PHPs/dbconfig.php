<?php
$db = new mysqli('mysql.hostinger.kr','u209793501_skins','dudgus347@','u209793501_db');

	if ($db->connect_error) {
		die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');
	}

date_default_timezone_set('Asia/Seoul');
$db->set_charset('utf8');
if(!$db->set_charset('utf8mb4'))exit;
$db->query('SET time_zone=\'+9:00\'');

?>