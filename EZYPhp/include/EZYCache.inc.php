<?
define("CACHEPATH", EZYCACHEPATH."/");

class EZYCache
{
	
	public function __construct()
	{
		ob_start();
	}
	public function Create($Request, $bytype)
	{
		$chfile = md5($Request.$bytype);
		$chpath = CACHEPATH.$chfile;
		$fp = fopen($chpath, 'w');
		fwrite($fp, ob_get_contents());
		fclose($fp);
		ob_end_flush();
		return $chpath;
	}
	public function ReCreate($Request, $bytype, $retmsg)
	{
		$jsonobj = json_decode($retmsg,true);
		if($jsonobj["DoUpdate"])
		{
			$_args = explode('-', $Request, 3);
			ob_start();
			$this->ShowView($_args[0]);
			$this->CreateCache($_args[0],$bytype);
		}
	}
	public function isAvailable($Request, $bytype)
	{
		$chfile = md5($Request.$bytype);
		$chpath = CACHEPATH.$chfile;
		if(file_exists($chpath))
		{
			return $chpath;
		}
		else
			return false;
	}
}
?>