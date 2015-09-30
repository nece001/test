<?php
class Db_Mysql_Db{
	public function escape($value){
		return addslashes($value);
	}

	public function sqlToPrepare($sql){
		$builder = new Db_Mysql_Builder($this);
		return $builder->prepare($sql);
	}

	public function sqlToString($sql){
		$builder = new Db_Mysql_Builder($this);
		return $builder->toString($sql);
	}
}