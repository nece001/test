<?php
class Sql_Statment{
	private $_command;
	private $_parts = array();


	public function select(array $table, array $columns=array()){
		$this->_command = 'select';
		$this->_parts['froms'] = $table;
		$this->_parts['columns'] = $columns;
		return $this;
	}

	public function insert($table, array $values){
		$this->_command = 'insert';
		$this->_parts['table'] = $table;
		$this->_parts['values'] = $values;
		return $this;
	}

	public function update($table, array $values){
		$this->_command = 'update';
		$this->_parts['table'] = $table;
		$this->_parts['values'] = $values;
		return $this;
	}

	public function delete($table){
		$this->_command = 'delete';
		$this->_parts['table'] = $table;
		return $this;
	}

	public function getType(){
		return $this->_command;
	}

	public function getParts(){
		return $this->_parts;
	}

	public function getPart($part){
		return isset($this->_parts[$part]) ? $this->_parts[$part] : array();
	}

	public function reset($part){
		$ret = $this->getPart($part);
		unset($this->_parts[$part]);
		return $ret;
	}

	public function union($statment){
		$this->_parts['unions'][] = $statment;
		return $this;
	}


	public function distinct(){
		$this->_parts['distinct'] = true;
		return $this;
	}

	public function forUpdate(){
		$this->_parts['for_update'] = true;
		return $this;
	}

	public function join($table, $on, $type='inner'){
		$this->_parts['joins'][] = array(
			'table'=>$table,
			'on'=>$on,
			'type'=>$type
		);
		return $this;
	}

	public function joinLeft($table, $on){
		return $this->join($table, $on, 'left');
	}

	public function joinRight($table, $on){
		return $this->join($table, $on, 'right');
	}

	public function joinInner($table, $on){
		return $this->join($table, $on, 'inner');
	}

	public function where($cond, $value=NULL){
		$this->_parts['where'][] = array('cond'=>$cond, 'value'=>$value, 'type'=>'and');
		return $this;
	}

	public function orWhere($cond, $value=NULL){
		$this->_parts['where'][] = array('cond'=>$cond, 'value'=>$value, 'type'=>'or');
		return $this;
	}

	public function group(array $group){
		$this->_parts['group'] = $group;
		return $this;
	}

	public function having($cond, $value=NULL){
		$this->_parts['having'][] = array('cond'=>$cond, 'value'=>$value, 'type'=>'and');
		return $this;
	}

	public function orHaving($cond, $value=NULL){
		$this->_parts['having'][] = array('cond'=>$cond, 'value'=>$value, 'type'=>'or');
		return $this;
	}

	public function order($name, $desc=true){
		$this->_parts['order'][] = array('name'=>$name, 'type'=>$desc);
		return $this;
	}

	public function limit($count, $offset=0){
		$this->_parts['limit'] = array('count'=>$count, 'offset'=>$offset);
		return $this;
	}
}