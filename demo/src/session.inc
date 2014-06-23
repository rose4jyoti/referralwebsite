<?PHP
class SESSION_MANAGEMENT
{
	var $datas = array();
	function SESSION_MANAGEMENT()
	{
		if(!headers_sent()){
			session_start();
			$this->datas=&$_SESSION['SESSION'];	
		}
	}

	function isassign($data)
	{
		return isset($this->datas[$data]);
	}

	function assign($data, $value=NULL) 
	{
		if(is_array($data)){
			foreach($data as $key=>$value) { 
				$this->datas[$key]=$value;
			}
		} else {
			$this->datas[$data]=$value;
		}
	}

	function unassign($data=NULL)
	{
		if(is_array($data)) {
			foreach($data as $k=>$v) unset($this->datas[$k]);
		} elseif ($data!=NULL) {
			unset($this->datas[$data]);
		} else {
			$this->datas = array();
		}
	}

	function get($data,$def=NULL)
	{
		if(isset($this->datas[$data])) {
			return $this->datas[$data];
		} else {
			return $def;
		}
	}

}
?>