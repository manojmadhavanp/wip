<?php
define("LOGPATH", EZYLOGPATH."/".date('m-d-Y').".log");
class EZYLogType{
const EZYERROR='ERROR';
const EZYWARNING='WARNING';
const EZYDEBUG='DEBUG';
const EZYINFO='INFO';
const EZYTIME='TIME';
const EZYDUMP='DUMP';
}
class EZYLog
{
	static $instance = null;
	var $Logfile = null;
	static $Filelog=null;
	var $starttime = null;
	private function __construct()
	{
		if(EZYDEBUG or EZYLOG)
		{
		$this->Logfile = fopen(LOGPATH,'a');
		self::$Filelog = $this->Logfile;
		//$this->starttime = array();
		}
	}
	function __destructor()
	{
		fclose(self::$Logfile);
	}
	public static function File()
	{
		
		if(self::$instance === null)
			{
				self::$instance = new EZYLog();
			}
		return self::$instance;	
	}
	public function StartTime()
	{
	$this->starttime = microtime(true);
		//array_push($this->starttime,microtime(true));

	}
	public function StopTime($Msg)
	{
		if(EZYLOG)
		{
		
		$starttime = $this->starttime;
		$timetaken = number_format((microtime(true) - $starttime),4);
		$this->starttime=null;
		fwrite($this->Logfile, date('d-m-Y h:m:s').' '. EZYLogType::EZYTIME.':'.$timetaken.' Process:'.$Msg.PHP_EOL);
		}
	}
	public static function DebugPrint($variable)
	{
			if(self::$instance === null)
			{
				self::$instance = new EZYLog();
			}
			if(EZYDEBUG){
				$values = print_r($variable,true);
			fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.EZYLogType::EZYDUMP.' '.$values.PHP_EOL);}
	}
	public static function Debug($logmsg)
	{
		if(self::$instance === null)
		{
			self::$instance = new EZYLog();
		}
			if(EZYDEBUG)
			fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.EZYLogType::EZYDEBUG.' '.$logmsg.PHP_EOL);
	}
	public static function Write($logtype, $logmsg)
	{
		if(self::$instance === null)
		{
			self::$instance = new EZYLog();
		}
		if(EZYLOG)
		{
			if(EZYDEBUG)
				fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.$logtype.' '.$logmsg.PHP_EOL);
			else
			{
				if($logtype != EZYLogType::EZYDEBUG)
					fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.$logtype.' '.$logmsg.PHP_EOL);
			}
		}
		else if(EZYDEBUG)
		{
			if($logtype == EZYLogType::EZYDEBUG)
			{
			fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.$logtype.' '.$logmsg.PHP_EOL);
			}
		}
	}
	public static function Log($logtype, $logmsg)
	{
		if(self::$instance === null)
		{
			self::$instance = new EZYLog();
		}
		if(EZYLOG)
		{
			if(EZYDEBUG)
				fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.$logtype.' '.$logmsg.PHP_EOL);
			else
			{
				if($logtype != EZYLogType::EZYDEBUG)
					fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.$logtype.' '.$logmsg.PHP_EOL);
			}
		}
		else if(EZYDEBUG)
		{
			if($logtype == EZYLogType::EZYDEBUG)
			{
			fwrite(self::$Filelog, date('d-m-Y h:m:s').' '.$logtype.' '.$logmsg.PHP_EOL);
			}
		}
	}
}
?>