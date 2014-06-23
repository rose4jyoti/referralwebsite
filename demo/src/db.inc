<?PHP
class dbconn extends DBConnection {
	function dbconn($host, $username, $password, $dbname) {
		$this->openDB($host, $username, $password, $dbname);
	}

	function getdatalistfromquery($dataquery) {
		$result = $this->query($dataquery);
		$datalist =  $this->fetchAll($result);
		$this->FreeResult($result);
		return $datalist;
	}

	function getdatalist($fields, $tables, $where=NULL, $sortstr=NULL, $start=NULL, $offset=NULL) {
		$dataquery = "Select {$fields} from $tables where 1=1";
		if($where != NULL)
			$dataquery .= " and ({$where})";
		if($sortstr != NULL)
			$dataquery .= " {$sortstr}";
		if($start != NULL)
			$dataquery .= " LIMIT {$start}, {$offset}";
		$result = $this->query($dataquery);
		$datalist =  $this->fetchAll($result);
		$this->FreeResult($result);
		return $datalist;
	}

	function getlimiteddata($fields, $tables, $limitstr=NULL, $where=NULL, $sortstr=NULL) {
		$dataquery = "Select {$fields} from $tables where 1=1";
		if($where != NULL)
			$dataquery .= " and ({$where})";
		if($sortstr != NULL)
			$dataquery .= " {$sortstr}";
		if($limitstr != NULL)
			$dataquery .= " {$limitstr}";
		$result = $this->query($dataquery);
		$datalist =  $this->fetchAll($result);
		$this->FreeResult($result);
		return $datalist;
	}

	function getuniondata($fields, $tables, $where=array(), $sortstr=NULL, $limitstr=NULL) {
		if(!is_array($fields) || !is_array($tables) || count($fields)!=count($tables)) {
			return array();
		}
		$dataquery = array();
		$query = "";
		for($i=0; $i<count($fields); $i++) {
			$dataquery[$i] = "Select ".$fields[$i]." from ".$tables[$i]." where 1=1";
			if(isset($where[$i]) && $where[$i] != NULL)
				$dataquery[$i] .= " and (".$where[$i].")";
		}
		for($i=0; $i<count($dataquery); $i++) {
			$query .= "(".$dataquery[$i].")";
			$query .= ((count($dataquery)-1)!=$i)?" UNION ":" ";
		}
		if($sortstr != NULL)
			$query .= " {$sortstr}";
		if($limitstr != NULL)
			$query .= " {$limitstr}";
		$result = $this->query($query);
		$datalist =  $this->fetchAll($result);
		$this->FreeResult($result);
		return $datalist;
	}

	function save($table, $data, $where = "") {
		$dataset_a = array();
		foreach($data as $k=>$w) {
			if($w != NULL)
				$dataset_a[] = "$k = '".addslashes($w)."'";
			else
				$dataset_a[] = "$k=NULL";
		}
		
		$dataset = implode(" , " , $dataset_a);
		if ($where) {
		    // echo "UPDATE $table SET $dataset WHERE $where"; die();
			$this->query("UPDATE $table SET $dataset WHERE $where");
			$inst_id = $this->AffectRows();
		} else {
			//echo "INSERT INTO $table SET $dataset"; die;
			$inst_id = $this->execute("INSERT INTO $table SET $dataset");
		}
		return $inst_id;
	}

	function delete_rows($table, $where) {
		$delquery = "DELETE FROM ".$table." WHERE ".$where;
		$this->query($delquery);
	}
	######## Add new ##################

	######## Add new ##################
}
?>