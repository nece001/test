<?php

class Db_Mysql_Builder extends Sql_Builder{
	public function identifier($identifier){
		return '`'.trim($identifier, '`').'`';
	}


}