<?php 
class DBConnection
{
	function openDB($host,$username,$password,$dbname)
	{
		$dbconn = mysql_connect($host,$username,$password);
		if(!(mysql_select_db($dbname,$dbconn)))
			die("Database not Connected : ".mysql_error());
		return $dbconn;
	}

	function execute($qry)
	{
		$result = mysql_query($qry);
		return mysql_insert_id();
	}

	function query($query)
	{
		$result = mysql_query($query);
		if (!$result) return false;
		return $result;
	}

	function fetchRow($result) {
		if (!$result) return false;
		return mysql_fetch_row($result);
	}

	function fetchArray($result) {
		if (!$result) return false;
		return mysql_fetch_array($result,MYSQL_BOTH);
	}

	function fetchAll($result) {
		$array = Array();
		if(!$result) return $array;
		while ($row = mysql_fetch_assoc($result)) {
		$array[] = array_change_key_case($row, CASE_LOWER);
	}
		return $array;
	}
	
	function DataSeek($result) {
		if (!$result) return false;
		return mysql_data_seek($result,0);
	}

	function FreeResult($result) {
		if (!$result) return false;
		return mysql_free_result($result);
	}

	function rsCount($result) {
		if(!$result) return false;
		return mysql_num_rows($result);
	}
	function AffectRows() {
		return mysql_affected_rows();
	}
}
?>