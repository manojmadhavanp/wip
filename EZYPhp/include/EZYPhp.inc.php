<?php
session_start();

class EZYCtrlType
{
	const Append = 1;
	const Prepend = 2;
	const Update=3;
	const FormValue=4;
	const Location=5;
	const FormReset=6;
	const AddTableRow=7;
	const Display=8;
	const UpdateCache=9;
	const Error=10;
	const Sucess=11;
	const DisableAttribute=12;
	const EnableAttribute=13;
	const SetFocus=14;
	
}
class EZYUpdate
{
	var $Ctrl_Name='';
	var $Ctrl_Value='';
	var $Ctrl_Type=NULL;
	function __construct($CtrlName, $CtrlValue,$CtrlType)
	{
		$this->Ctrl_Name=$CtrlName;
		$this->Ctrl_Value=$CtrlValue;
		$this->Ctrl_Type=$CtrlType;
	}
}
class EZYReturn
{
	static $instance;
	var $UpdateCtrls;
	protected function __construct(array $UpdateCtrls = NULL)
	{
		$this->UpdateCtrls=$UpdateCtrls;
	}
	public static function Update($UpdateCtrls = NULL)
	{
		
	$UpdateCtrlsarr = self::isUpdateCtrlArray($UpdateCtrls);
				
		self::$instance = new EZYReturn($UpdateCtrlsarr);
		echo json_encode(self::$instance);
		EZYLog::Debug(json_encode(self::$instance));
	}
	public static function Success($UpdateCtrls=NULL)
	{
		$UpdateCtrlsarr = self::isUpdateCtrlArray($UpdateCtrls);
		
	}
	public static function Failed($UpdateCtrls=NULL)
	{
		$UpdateCtrlsarr = self::isUpdateCtrlArray($UpdateCtrls);
		
	}
	private static function isUpdateCtrlArray($UpdateCtrls)
	{
		if(!is_array($UpdateCtrls))
			$UpdateCtrlsarr = array($UpdateCtrls);
		else
			$UpdateCtrlsarr = $UpdateCtrls;
		
		return $UpdateCtrlsarr;
		
	}
	
};

class application
{

	function ShowView($class)
	{
		if(trim($class) != "")
		{
			$clsview = $class;
			if(class_exists($clsview))
			{
				EZYLog::Debug('SHOW VIEW : Class'.$clsview);
				$classview = new $clsview();
				$classview->Main();
			}
			else
			{
				$classview = new PageNotFound();
				$classview->Main();
			}
		}
	}

	function ProcessView($args)
	{
		$_args = explode('/', $args, 3);
		if(sizeof($_args) == 1)
			$_args = explode('-',$args,3);

		if(sizeof($_args) > 1)
		{
			//echo $_args[0];
			$Cls = $_args[0];
			if(class_exists($Cls))
			{
			EZYLog::Debug('PROCESS VIEW : Calling Class'.$Cls);
				$Obj = new $Cls;
				$fun = $_args[1];
				EZYLog::Debug('PROCESS VIEW : Calling Function'.$fun);

				switch (sizeof($_args))
				{
					case 2:
						{
							return $Obj->$fun();
							break;
						}
					case 3:
						{
							$fnargs =  explode('-',$_args[2]);
							return $Obj->$fun($fnargs);
							break;
						}
				}
			}
			else
				echo "No Controller found with $Cls";

		}
		else
			$this->ShowView($_args[0]);
	}

	function iscache($Request)
	{
		if(isset($_SESSION) && isset($_SESSION['userrole']))
			$userole = $_SESSION['userrole'];
		else
			$userole = -1;
		$chfile = md5($Request.$userole).'.html';
		$chpath = EZYCACHEPATH.'/'.$chfile;
		if(file_exists($chpath))
		{
			return $chpath;
		}
		else
			return false;
	}
	function ReCreateCache($Request,$retmsg)
	{
		$jsonobj = json_decode($retmsg,true);
		//var_dump($jsonobj);
		if($jsonobj["DoUpdate"])
		{
			$_args = explode('-', $Request, 3);
			ob_start();
			$this->ShowView($_args[0]);
			$this->CreateCache($_args[0]);
		}
	}
	function CreateCache($Request)
	{
		if(isset($_SESSION['userrole']))
			$userole = $_SESSION['userrole'];
		else
			$userole = -1;

		$chfile = md5($Request.$userole).'.html';
		$chpath = EZYCACHEPATH.'/'.$chfile;
		$fp = fopen($chpath, 'w');
		fwrite($fp, ob_get_contents());
		fclose($fp);
		ob_end_flush();
		return $chpath;
	}
	function Load($filename)
	{
		if(file_exists("$folderitem/$filename.php")){
			require_once("$folderitem/$filename.php");
		}
	}
};

if (isset($_REQUEST['request']))
{
	EZYLog::File()->StartTime();
	$request = $_REQUEST['request'];
	EZYLog::Debug('Processing Request '.$request);
	$application = new application();
	$args = explode('/', $request);
	if(sizeof($args) == 1)
		$args = explode('-',$request);
	if(EZYCACHE)
		$chret = $application->iscache($request);
		EZYLog::Debug('Processing Request '.$request.' SIZE='.sizeof($args));
		EZYLog::DebugPrint($args);
	if(sizeof($args)== 1)
	{
		if(EZYCACHE)
		{
			if(!$chret)
			{
				ob_start();
				$application->ShowView($request);
				$chret = $application->CreateCache($request);
			}
			else{include($chret);
			}
		}
		else
			$application->ShowView($request);
	}
	else
	{
		if(EZYCACHE)
		{
			if($chret)
			{
				include($chret);
			}
			else
			{
				$retmsg = $application->ProcessView($request);
				echo $retmsg;
			}
		}
		else
		{
			$retmsg = $application->ProcessView($request);
			echo $retmsg;
		}
	}

	EZYLog::File()->StopTime($request);

}
else
{
	$application = new application();
	$application->ShowView('Index');
}
/*http://heyflat.com/themes/todo/index.html*/
function __autoload($classname) {
EZYLog::Debug('Loading for class '.$classname);
	$filename = $classname;
	$folders = array(EZYPHPPATH.'/include',EZYPHPPATH.'/MVC',PATHTOCONTROLLER,PATHTOMODEL);
	foreach($folders as $folderitem)
	{
		if(file_exists("$folderitem/$filename.php")){
			require_once("$folderitem/$filename.php");
		
		}
		if(file_exists("$folderitem/$filename.inc.php")){
			require_once("$folderitem/$filename.inc.php");
		}
		
		
	}
	
}

?>