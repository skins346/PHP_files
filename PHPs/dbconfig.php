<?php
$db = new mysqli('mysql.hostinger.kr','u209793501_skins','dudgus347@','u209793501_db');

	if ($db->connect_error) {
		die('�����ͺ��̽� ���ῡ ������ �ֽ��ϴ�.\n�����ڿ��� ���� �ٶ��ϴ�.');
	}

date_default_timezone_set('Asia/Seoul');
$db->set_charset('utf8');
if(!$db->set_charset('utf8mb4'))exit;
$db->query('SET time_zone=\'+9:00\'');

?>