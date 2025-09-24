<?php
	if(!defined('INCLUDE_CHECK')) die("You don't have permissions to run this");
	/* ����� ����������� ������ ��� ���������� � ���������� ���������/�������/cms/��������
	'hash_md5' 			- md5 �����������
	'hash_authme'   	- ���������� � �������� AuthMe
	'hash_cauth' 		- ���������� � �������� Cauth
	'hash_xauth' 		- ���������� � �������� xAuth
	'hash_joomla' 		- ���������� � Joomla (v1.6- v1.7)
	'hash_ipb' 			- ���������� � IPB
	'hash_xenforo' 		- ���������� � XenForo
	'hash_wordpress' 	- ���������� � WordPress
	'hash_vbulletin' 	- ���������� � vBulletin
	'hash_dle' 			- ���������� � DLE
	'hash_drupal'     	- ���������� � Drupal (v.7)
	'hash_launcher'		- ���������� � ��������� sashok724 (����������� ����� �������)
	*/
	require('../system.php');
	BDConnect('auth');
	$crypt 				= 'hash_md5';
	
	$db_host			=  $config['db_host']; // Ip-����� MySQL
	$db_port			= $config['db_port']; // ���� ���� ������
	$db_user			= $config['db_login']; // ������������ ���� ������
	$db_pass			= $config['db_passw']; // ������ ���� ������
	$db_database		= $config['db_name']; //���� ������
	
	$db_table       	= $bd_names['users']; //������� � ��������������
	$db_group           = $bd_users['group']; //��� webmcr (��������)
	$db_columnId  		= $bd_users['id']; //������� � ID �������������
	$db_columnUser  	= $bd_users['login']; //������� � ������� �������������
	$db_columnPass  	= $bd_users['password']; //������� � �������� �������������
	$db_tableOther 		= 'xf_user_authenticate'; //�������������� ������� ��� XenForo, �� ��������
	$db_columnSesId	 	= $bd_users['session']; //������� � �������� �������������, �� ��������
	$db_columnServer	= $bd_users['server']; //������� � ��������� �������������, �� �������e
	$db_columnSalt  	= 'members_pass_salt'; //������������� ��� IPB � vBulletin: , IPB - members_pass_salt, vBulletin - salt
    $db_columnIp  		= $bd_users['ip']; //������� � IP �������������
	
	$db_columnDatareg   = $bd_users['ctime']; // ������� ���� �����������
	$db_columnMail      = $bd_users['email']; // ������� mail
	
	$masterversion  	= sqlConfigGet('launcher-version'); //������-������ ��������
	$protectionKey		= sqlConfigGet('protection-key'); //���� ������ ������. ������ ��� �� ��������.

	$usecheck			=  true; //����� �� ������������ ����������� � ��������
?>
