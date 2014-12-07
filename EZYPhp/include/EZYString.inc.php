<?
class EZYString 
{
	private function __construct(){}
	public function __construct(string $value){$this->value = $value;}
	
	public function Sanitize(){return $this->value;}
	public function isString(){return true;}

	public function Explode(){return $this->value;}
	public function Implode(){return $this->value;}
	public function toArray(){}
	public function fromArray(){}
	
	public function Find($FindString){}
	 
}
?>