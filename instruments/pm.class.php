<?php

class PManager {
	public static function CheckNew() {
	global $db, $pm_count, $user;
		if(!$user) return 0 ;
		if(!isset($pm_count)) {
			$pm_count = BD("SELECT COUNT(*) FROM `pm` WHERE `reciver` = '" . $user->name() . "' AND `viewed`=0");
			$pm_count = mysql_fetch_array($pm_count);
			$pm_count = $pm_count[0];
		}
		return $pm_count;
	}
	public static function SendNotify($user, $topic, $text) {
		global $db;
		return self::SendPM(sqlConfigGet('email-name'), $user, $topic, $text);
	}
	public static function SendPM($from, User $to, $topic, $text) {
		global $user;
		if($from != sqlConfigGet('email-name') and (!$user or $user->lvl() < 8)) {
			$query = BD("SELECT * FROM `antiflood` WHERE `name`='$from' AND `hour`='" . date("YHdm") . "'");
			if (mysql_num_rows($query)) {
				$num = mysql_fetch_array($query);
				$num = $num['num'];
				if($num < 20)
					BD("UPDATE `antiflood` SET `hour`='" . date("YHdm") . "', `num`=`num`+1 WHERE `name`='" . $from . "'");
				elseif ($num >= 20 AND $num < 21) {
					BD("UPDATE `antiflood` SET `hour`='" . date("YHdm") . "', `num`=`num`+1 WHERE `name`='" . $from . "'");
					return 1;
				}
				else {
					BD("INSERT INTO `ip_banning` (`IP`, `time_start`, `ban_until`, `ban_type`, `reason`) VALUES ('" . GetRealIp() . "', NOW(), NOW() + INTERVAL 1 DAY, '2', 'Флуд в ЛС')");
					BD("UPDATE `accounts` SET  `group`=2 WHERE `login`='" . $from . "'");
					return 2;
				}
			} else BD("INSERT INTO `antiflood` (`name`,`hour`,`num`) VALUES ('$from', '" . date("YHdm") . "', " . $num = 1 . ") "
				. "ON DUPLICATE KEY UPDATE `hour`='" . date("YHdm") . "', `num`=" . $num = 1);
		}

		$query = BD("INSERT INTO `pm` (`date`, `sender`, `reciver`, `topic`, `text`) VALUES (NOW(), '" . TextBase::SQLSafe($from) . "', '" . TextBase::SQLSafe($to->name()) . "', '" . TextBase::SQLSafe($topic) . "', '" . TextBase::SQLSafe($text) . "');");
		EMail::Send($to->email(), "Получено новое ЛС", "<html><body><p>Здравствуйте, " . $to->name() . ". Вам прижло новое личное сообщение.</p><p>Прочитать его можно <a href='http://{$_SERVER['HTTP_HOST']}/go/pm/view/". mysql_insert_id() . "'>Здесь</a></p><p>С уважением,<br /><b>команда проекта WorldsOfCubes</b></p></body></html>");
		return 0;
	}
} 