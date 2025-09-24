<?php /* WEB-APP : WebMCR (С) 2013 NC22 | License : GPLv3 */

header('Content-Type: text/html; charset=UTF-8');

require_once('./system.php');
BDConnect('index');

loadTool('user.class.php');
MCRAuth::userLoad();


function GetRandomAdvice() { return ($quotes = @file(View::Get('sovet.txt')))? $quotes[rand(0, sizeof($quotes)-1)] : "Советов нет"; }
$addition_events = ''; $content_main = ''; $content_side = '';  $content_js = '';
function LoadTinyMCE() {
global $addition_events, $content_js;
 
	if ( !file_exists(MCR_ROOT.'instruments/tiny_mce/tinymce.min.js') ) return false;

	$tmce  = 'tinymce.init({';
	$tmce .= 'selector: "textarea.form-control",';
	$tmce .= 'language : "ru",';
	$tmce .= 'plugins: "code preview image link",';
	$tmce .= 'toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | link image | preview",';
	$tmce .= '});';

	$addition_events .= $tmce;
	$content_js .= '<script type="text/javascript" src="' . BASE_URL . 'instruments/tiny_mce/tinymce.min.js"></script>';
	
	return true;
}

function InitJS () {
global $addition_events;
	
	$init_js  = "var pbm; var way_style = '".DEF_STYLE_URL."'; var cur_style = '".View::GetURL()."'; var base_url  = '".BASE_URL."';" ;
	$init_js .= "window.onload = function () { mcr_init(); $('.verified_nick').tooltip(); $('.tts').tooltip(); $('.ppo').popover(); $('#datepicker').datepicker();". $addition_events ." } " ;
	return '<script type="text/javascript">' . $init_js . '</script>' ;
}

$content_advice = GetRandomAdvice();

if (!empty($user)) {

$player       = $user->name();
$player_id    = $user->id();
$player_lvl   = $user->lvl();
$player_email = $user->email(); if (empty($player_email)) $player_email = lng('NOT_SET'); 
$player_group = $user->getGroupName();
$player_econ  = $user->getEcon();
$player_money = $user->getMoney();

if ($user->group() == 4) $content_main .= View::ShowStaticPage('profile_verification.html', 'profile/', $player_email);
}

$mode = $config['s_dpage'];
if (isset($_GET['id']) and !isset($_GET['mode'])) $mode = 'news_full';
elseif (isset($_GET['mode'])) $mode = $_GET['mode'];
elseif (isset($_POST['mode'])) $mode = $_POST['mode'];
if(!($mode == 'projects' or $mode == 'project' or $mode == 'WoCAuth'))
if ($config['offline'] and (empty($user) or $user->group() != 3)) {
	$menu = new Menu();
	$menu->SetItemActive('main');
	$content_menu = $menu->Show();
	$content_js .= InitJS();
	$logoHeader = (date("md") >= 1220 or date("md") <= 113)? (date("dm") == 3112)? "cacke20hb" : "cacke20ny" : "cacke20";
	$mode = 'closed';
	$page = 'Технические работы';
	$content_main = View::ShowStaticPage('site_closed.html');
	include('./location/side.php');
	ob_start();
	include View::Get('index.html');
	$html_page = ob_get_clean();
	loadTool("template.class.php");
	$parser = new TemplateParser();
	$html_page = $parser->parse($html_page);
	echo $html_page;
	exit;
}
function accss_deny() {
	header("HTTP/1.0 403 Forbidden");
	show_error('accsess_denied', 'Доступ запрещен');
}
function show_error($html, $page) {
	global $config, $content_js, $content_advice, $content_side, $user;
	if (!empty($user)) {
		$player       = $user->name();
		$player_id    = $user->id();
		$player_lvl   = $user->lvl();
		$player_email = $user->email(); if (empty($player_email)) $player_email = lng('NOT_SET');
		$player_group = $user->getGroupName();
		$player_econ  = $user->getEcon();
		$player_money = $user->getMoney();
	}
	$menu = new Menu();
	$menu->SetItemActive('main');
	$content_menu = $menu->Show();
	$content_js .= InitJS();
	$mode = 'denied';
	$content_main = View::ShowStaticPage($html . '.html');
	include('./location/side.php');
	ob_start();
	include View::Get('index.html');
	$html_page = ob_get_clean();
	loadTool("template.class.php");
	$parser = new TemplateParser();
	$html_page = $parser->parse($html_page);
	echo $html_page;
	exit;
}
$menu = new Menu();



if ($mode == 'side') $mode = $config['s_dpage'];
if ($mode == 'users') $mode = 'user';
if ($mode == 'project') $mode = 'projects';

switch ($mode) {
    case 'options':   include('./location/options.php');	break;
    case 'control':   include('./location/admin.php');		break;
    default:
		if (!preg_match("/^[a-zA-Z0-9_-]+$/", $mode) or !file_exists(MCR_ROOT.'/location/'.$mode.'.php')) $mode = "404"; 

		include(MCR_ROOT.'/location/'.$mode.'.php'); break;
} 

$content_menu = $menu->Show();
include('./location/side.php');
$content_js .= InitJS();
if (date("md") >= 1220 or date("md") <= 113) $content_js .= "<script type=\"text/javascript\">
 
/******************************************
* Snow Effect Script- By Altan d.o.o. (http://www.altan.hr/snow/index.html)
* Visit Dynamic Drive DHTML code library (http://www.dynamicdrive.com/) for full source code
* Last updated Nov 9th, 05' by DD. This notice must stay intact for use
******************************************/
 
  //Configure below to change URL path to the snow image
  var snowsrc=\"style/Default/img/snow.png\"
  // Configure below to change number of snow to render 
  var no = 25;
  // Configure whether snow should disappear after x seconds (0=never):
  var hidesnowtime = 0;
  // Configure how much snow should drop down before fading (\"windowheight\" or \"pageheight\")
  var snowdistance = \"pageheight\";

///////////Stop Config//////////////////////////////////
 
  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;
 
	function iecompattest(){
		return (document.compatMode && document.compatMode!=\"BackCompat\")? document.documentElement : document.body
	}
 
  var dx, xp, yp;    // coordinate and position variables
  var am, stx, sty;  // amplitude and step variables
  var i, doc_width = 800, doc_height = 600; 
 
  if (ns6up) {
	  doc_width = self.innerWidth;
	  doc_height = self.innerHeight;
  } else if (ie4up) {
	  doc_width = iecompattest().clientWidth;
	  doc_height = iecompattest().clientHeight;
  }
 
  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
  snowsrc=(snowsrc.indexOf(\"dynamicdrive.com\")!=-1)? \"snow.gif\" : snowsrc
  for (i = 0; i < no; ++ i) {
	  dx[i] = 0;                        // set coordinate variables
    xp[i] = Math.random()*(doc_width-50);  // set position variables
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;         // set amplitude variables
    stx[i] = 0.02 + Math.random()/10; // set step variables
    sty[i] = 0.7 + Math.random();     // set step variables
		if (ie4up||ns6up) {
			if (i == 0) {
				document.write(\"<div id=\\\"dot\"+ i +\"\\\" style=\\\"POSITION: absolute; Z-INDEX: \"+ i +\"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\\\"><a href=\\\"http://dynamicdrive.com\\\"><img src='\"+snowsrc+\"' border=\\\"0\\\"></a></div>\");
			} else {
				document.write(\"<div id=\\\"dot\"+ i +\"\\\" style=\\\"POSITION: absolute; Z-INDEX: \"+ i +\"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\\\"><img src='\"+snowsrc+\"' border=\\\"0\\\"><\/div>\");
			}
		}
  }
 
  function snowIE_NS6() {  // IE and NS6 main animation function
	  doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
	  doc_height=(window.innerHeight && snowdistance==\"windowheight\")? window.innerHeight : (ie4up && snowdistance==\"windowheight\")?  iecompattest().clientHeight : (ie4up && !window.opera && snowdistance==\"pageheight\")? iecompattest().scrollHeight : iecompattest().offsetHeight;
	  for (i = 0; i < no; ++ i) {  // iterate for every dot
		  yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
			  xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById(\"dot\"+i).style.top=yp[i]+\"px\";
      document.getElementById(\"dot\"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+\"px\";  
    }
	  snowtimer=setTimeout(\"snowIE_NS6()\", 10);
  }
 
	function hidesnow(){
		if (window.snowtimer) clearTimeout(snowtimer)
		for (i=0; i<no; i++) document.getElementById(\"dot\"+i).style.visibility=\"hidden\"
	}
 
 
if (ie4up||ns6up){
	snowIE_NS6();
	if (hidesnowtime>0)
		setTimeout(\"hidesnow()\", hidesnowtime*1000)
		}
 
</script>";
if(!empty($user) and $mode != 'pm') $content_side .= CheckPM();
$logoHeader = (date("md") >= 1220 or date("md") <= 113)? (date("dm") == 3112)? "cacke20hb" : "cacke20ny" : "cacke20";
ob_start();
include View::Get('index.html');
$html_page = ob_get_clean();
loadTool("template.class.php");
$parser = new TemplateParser();
$html_page = $parser->parse($html_page);
echo $html_page;