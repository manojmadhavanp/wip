<?
class EZYEmailType{
const EZYEMAILHTML='HTML';
const EZYEMAILTEXT='TEXT';
}

class EZYEmail{
	
	var $EmailFrom = NULL;
	var $EmailFromName = NULL;
	var $EmailReplyTo = NULL;
	var $EmailSubject = NULL;
	var $EmailMessage = NULL;
	
	function SendHTMLEmail($EmailID)
	{
			$uid = md5(date('r', time()));
			
			$header = "From: ".$this->EmailFromName." <".$this->EmailFrom.">\r\n";
            $headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$uid."\""; 
			$header .= "Reply-To: ".$this ->GetTo()."\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
			$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
			$header .= $this ->GetMessage()."\r\n\r\n";
			$header .= "--".$uid."\r\n";
		        if (mail($this ->GetTo(), $this ->GetSubject(),'', $header))
				return true;
			else							
				return false;
	}
	function Send() {
		
	}
	function SendFrom($SendName, $SendFrom){
	}
	function Subject($Subject){
	}
	function HTMLMessage($HTMLContent){
	}
	
	function PlainMessage($Content){
	}
	function ReplyTo($EmailFrom){
	}
};
?>
