<?php 

namespace Hcode;

class Model {

	private $values = [];

	// Identificar qual método foi chamado..
	public function __call($name, $args)
	{
		// Identificar se é método get ou set
		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		switch ($method) {
			case "get":
				return (isset($this->values[$fieldName])) ?$this->values[$fieldName] : NULL;
			break;

			case "set":
				$this->values[$fieldName] = $args[0];
			
				break;
		}
	}

	// Montar o nome da unção set dinâmicamente.
	public function setData($data = array())
	{
		foreach ($data as $key => $value){
			$this->{"set".$key}($value);
		}
	}

	public function getValues()
	{
		return $this->values;
	}

}
	?>