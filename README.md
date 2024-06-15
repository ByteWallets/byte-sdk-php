# Bws-sdk-php
Bws-sdk-php

## 安装
### 方式1：命令安装
```php
	composer require Bwscloud/Bws-wallet-sdk
```

### 方式2：composer 配置安装
1,在composer.json添加如下配置
```php
{
	"require":{
		"Bwscloud/Bws-wallet-sdk": "^1.0"
	}
}
```

2,执行命令
```
	composer install
```

## 使用

1,新建BwsController.php 
```
	use Bws\Dispatch\BwsDispatch;

	class BwsController{
		protected $BwsDispatch ;
		public function __construct()
	    {
	       	// 控制器初始化
	       	$this->initialize();
	    }
	    protected function initialize(){
	    	$this->BwsDispatch = new BwsDispatch([
	            'merchant_no' => 30000, //商户号
	            'api_key' => 'c789xxxxxxxxxxxxxxxxx388ecxxx',//apikey
	            'gateway_address'=>'https://sig11.Bws.io', //节点
	            'callUrl'=>'https://localhost/callUrl', //回调地址
	            'debug' => false  //调试模式
	        ]);
	    }
	}
```
2,在需要使用到接口的类继承 BwsController

```
	##使用示例
	namespace xxxx;
	class Index extends BwsController{
		//查询支持的交易对
		public function supportCoins()
	    {
	    	$result =  $this->BwsDispatch->supportCoins(true);
	        return json($result);
	    }


	    //创建地址
		public function createAddress()
	    {
	    	$result =  $this->BwsDispatch->createAddress('195');
	        return json($result);
	    }

	    //验证地址合法性
		public function checkAddress()
	    {
	    	$result =  $this->BwsDispatch->checkAddress('195','TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF');
	        return json($result);
	    }

	    //查询地址是否存在
		public function existAddress()
	    {
	    	$result =  $this->BwsDispatch->existAddress('195','TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF');
	        return json($result);
	    }

	    //申请提币
		public function withdraw()
	    {
	    	$result =  $this->BwsDispatch->withdraw('sn00001','195','195','TEpK1aWkjDue6j8reeeMqG7hdJ5tRytyAF',10);
	        return json($result);
	    }

	    //交易回调
		public function callback()
	    {
	    	$result =  $this->BwsDispatch->callback();
	        return json($result);
	    } 

	}
```


## 其他

```
##curl: (35) OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection to raw.githubusercontent.com:443
如果提示以上错误需要添加ca证书
##php.ini  打开ssl
extension=php_openssl.dll;
##证书路径
openssl.cafile=D:\cacert.pem
```
