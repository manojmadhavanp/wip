<?
abstract class EZYController extends EZYValidate
{
	private $DynamicContent = false;
	private $viewdata;
	private $model;
	public $data = array();
	abstract protected function Main();
	function __construct()
	{
		$this->Set('title','');
		$this->Set('keyword','');
		$this->Set('description','');
	}
	protected function isDynamic()
	{
		return	$this->DynamicContent;
	}
	public function LoadDynamicContent($State)
	{
		$this->DynamicContent = $State;
	}
	function LoadModel($modelfile)
	{
		$pathtomodelfile = APPLICATIONPATH."MVC/models/".$modelfile;
		if(file_exists($pathtomodelfile))
			require_once($pathtomodelfile);
		else
			echo 'Could not load the model file path: '.$pathtomodelfile;	
	}
	function GetModel($modelname)
	{	
		//$this->LoadModel($modelname.'.php');
		$this->model =  new $modelname(); 
		return $this->model;
	}
	/*function LoadContainer($containername, $view)
	{
		$this->LoadView($view);
	}*/
	function LoadView($viewname)
	{
	
		$tempdata = NULL;
		$pathtoviewfile = APPLICATIONPATH."MVC/views/".$viewname;
		$pathtotemplatefile = APPLICATIONPATH."MVC/template/".$viewname; 
		if(file_exists($pathtoviewfile))
			$tempdata = $pathtoviewfile;
		else if(file_exists($pathtotemplatefile))
			$tempdata = $pathtotemplatefile;
		else
			return;
		
		//echo $tempdata;
		global $data;
		$data = $this->data;
		ob_start();
		include($tempdata);
		$this->viewdata .= ob_get_clean();
		
	}
	function Set($key, $value)
	{
		$this->data[$key] = $value;
	}
	function Render($return = FALSE)
	{
		$tempviewdata = $this->viewdata;
		$this->viewdata = NULL;
		if($return)
			return $tempviewdata;
		else
			print($tempviewdata);
			
			
	}
	function DelayLoad()
	{
		
	}
}
?>