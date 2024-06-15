<?php
namespace Byte\Dispatch;
class ByteDispatchException extends \Exception
{
	public function __construct($code,$msg){
		var_dump("code:".$code);
		var_dump("msg:".$msg);
		
	}

}