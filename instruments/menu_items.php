<?php if (!defined('MCR')) exit;
$menu_items = array (
  0 => 
  array (
	'main' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-home"></i> Главная',
	  'url' => '',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'admin' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-wrench"></i> Админка',
	  'url' => '',
	  'parent_id' => -1,
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	  'network_edit' =>
		  array (
			  'name' => 'Версии',
			  'url' => 'control/network/',
			  'parent_id' => 'admin',
			  'lvl' => 15,
			  'permission' => -1,
			  'active' => false,
			  'inner_html' => '',
		  ),
	'category_news' =>
	array (
	  'name' => 'Категории новостей',
	  'url' => 'control/category/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'file_edit' =>
	array (
	  'name' => 'Файлы',
	  'url' => 'control/filelist/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'control' =>
	array (
	  'name' => 'Аккаунты',
	  'url' => 'control/user/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'reg_edit' =>
	array (
	  'name' => 'Регистрация',
	  'url' => 'control/ipbans/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'group_edit' =>
	array (
	  'name' => 'Группы пользователей',
	  'url' => 'control/group/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'site_edit' =>
	array (
	  'name' => 'Настройки сайта',
	  'url' => 'control/constants/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'rcon' =>
	array (
	  'name' => 'RCON',
	  'url' => 'control/rcon/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'game_edit' =>
	array (
	  'name' => 'Настройки лончера',
	  'url' => 'control/update/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'sp_admin' =>
		array (
			'name' => 'Галерея скинов',
			'url' => '?mode=skingallary&do=admin',
			'parent_id' => 'admin',
			'lvl' => -1,
			'permission' => -1,
			'config' => -1,
			'active' => false,
			'inner_html' => '',
		),
	'info' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-info-sign"></i> Инфо',
	  'url' => 'go/guide/',
	  'parent_id' => -1,
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'faq' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-question-sign"></i> FAQ',
	  'url' => 'go/faq/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'webmcrex' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-info-sign"></i> webMCRex',
	  'url' => 'go/webmcrex/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'rules' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-exclamation-sign"></i> Правила проекта',
	  'url' => 'go/rules/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'about' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-ok-sign"></i> О проекте',
	  'url' => 'go/about/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'forum' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-comment"></i> Форум',
	  'url' => 'https://forum.webmcrex.com/',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
  ),
  1 => 
  array (
	'git' =>
	array (
	  'name' => '<i class="fa fa-git"></i> Репозитории',
	  'url' => 'https://git.worldsofcubes.net/',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'github' =>
	array (
	  'name' => '<i class="fa fa-github-square"></i> GitHub',
	  'url' => 'https://github.com/WorldsOfCubes/webMCRex',
	  'parent_id' => 'git',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'bitbucket' =>
	array (
	  'name' => '<i class="fa fa-bitbucket-square"></i> Bitbucket',
	  'url' => 'https://bitbucket.org/WorldsOfCubes/webmcrex',
	  'parent_id' => 'git',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'github3' =>
	array (
	  'name' => '<i class="fa fa-github"></i> GitHub (v3)',
	  'url' => 'https://github.com/WorldsOfCubes/webMCRex3',
	  'parent_id' => 'git',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'bitbucket3' =>
	array (
	  'name' => '<i class="fa fa-bitbucket"></i> Bitbucket (v3)',
	  'url' => 'https://bitbucket.org/WorldsOfCubes/webmcrex3',
	  'parent_id' => 'git',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'settings' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-cog"></i> Опции',
	  'url' => 'go/options/',
	  'parent_id' => -1,
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'options' =>
	array (
	  'name' => 'Настройки персонажа',
	  'url' => 'go/options/',
	  'parent_id' => 'settings',
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'exit' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-log-out"></i> Выход',
	  'url' => 'login.php?out=1',
	  'parent_id' => -1,
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
  ),
);
