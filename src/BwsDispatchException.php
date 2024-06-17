<?php
namespace Bws\Dispatch;
class BwsDispatchException extends \Exception
{
	public function __construct($code,$msg){
		parent::__construct($msg,$code);
	}

}