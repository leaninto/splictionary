<?php
class classOne{
	public function call(){
		echo get_called_class();
	}
}
class classTwo extends classOne{
	public function callTwo(){
		$this->call();
	}
}
$something = new classTwo();

$something->callTwo();
?>