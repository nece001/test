<?php
class Sql_Builder{
	private $_db;
	private $_columns;
	private $_values = array();
	private $_spl_parts;
	private $_hold = '{@parameter?}';

	public function __construct($db){
		$this->_db = $db;
	}

	public function Sql_Builder($db){
		$this->__construct($db);
	}

	public function quote($value){
		switch(gettype($value)){
			case 'string':$value = "'".$this->escape($value)."'";break;
		}

		return $value;
	}

	public function escape($value){
		return $this->_db->escape($value);
	}

	public function identifier($identifier){
		return $identifier;
	}

	private function _isExpression($string){
		if(false !== strpos($string, '(') || false !== strpos($string, ')')){
			return true;
		}
		return false;
	}

	public function quoteIdentifier($identifier){
		$identifier = trim($identifier);
		if($this->_isExpression($identifier)){
			return $identifier;
		}

		$parts = explode('.', $identifier);
		foreach($parts as &$item){
			$item = $this->identifier($item);
		}
		return implode('.', $parts);
	}

	public function getValues(){
		$order = array('column', 'join', 'where', 'having');
		$tmp = array();
		foreach($order as $key){
			if(isset($this->_values[$key])){
				$tmp = array_merge($tmp, $this->_values[$key]);
			}
		}
		return $tmp;
	}

	public function prepare($sql){
		$unions = $sql->getPart('unions');
		$sql = $this->_renderSql($sql);
		$sql = str_replace($this->_hold, '?', $sql);

		if($unions){
			foreach($unions as $union){
				$b = new self($this->_db);
				$sql .= ' UNION ('.$b->prepare($union).')';
			}
		}
		return $sql;
	}

	public function toString($sql){
		$hold = $this->_hold;
		$hold_len = strlen($hold);
		$unions = $sql->getPart('unions');
		$sql = $this->_renderSql($sql);
		$values = $this->getValues();
		foreach($values as $value){
			if(is_string($value)){
				$value = "'".$this->escape($value)."'";
			}elseif(is_array($value)){
				foreach($value as &$v){
					$v = $this->escape($v);
				}
				$value = "'".implode("', '", $value)."'";
			}

			if(false !== ($pos = strpos($sql, $hold))){
				$sql = substr_replace($sql, $value, $pos, $hold_len);
			}
		}

		if($unions){
			foreach($unions as $union){
				$b = new self($this->_db);
				$sql .= ' UNION ('.$b->toString($union).')';
			}
		}
		return $sql;
	}

	public function _renderSql($sql){
		switch($sql->getType()){
			case 'select':
				return $this->_renderSelect($sql);
			case 'insert':
				return $this->_renderInsert($sql);
			case 'update':
				return $this->_renderUpdate($sql);
			case 'delete':
				return $this->_renderDelete($sql);
		}
	}

	private function _renderSelect($sql){
		$this->_renderSelectParts($sql);
		$query = 'SELECT '
			.$this->_getSqlPart('distinct')
			.$this->_getSqlPart('columns')
			.$this->_getSqlPart('froms')
			.$this->_getSqlPart('joins')
			.$this->_getSqlPart('where')
			.$this->_getSqlPart('group')
			.$this->_getSqlPart('having')
			.$this->_getSqlPart('order')
			.$this->_getSqlPart('limit')
			.$this->_getSqlPart('for_update');

		return $query;
	}

	private function _renderInsert($sql){
		$table = $sql->getPart('table');
		$sets = $sql->getPart('values');
		$fields = $values = array();
		if($sets){
			foreach($sets as $key=>$value){
				$fields[] = $this->quoteIdentifier(trim($key));
				$values[] = $this->_hold;
				$this->_values['column'][] = $value;
			}
		}

		return 'INSERT INTO '.$this->quoteIdentifier(trim($table)).' ('.implode(', ', $fields).') VALUES ('.implode(', ', $values).')';
	}

	private function _renderUpdate($sql){
		$this->_renderSelectParts($sql);
		$table = $sql->getPart('table');
		$values = $sql->getPart('values');
		$sets = array();
		if($values){
			foreach($values as $key=>$value){
				$sets[] = $this->_isExpression($key) ? $this->_formatExpression($key) : $this->quoteIdentifier(trim($key)).'='.$this->_hold;
				$this->_values['column'][] = $value;
			}
		}

		return 'UPDATE '.$this->quoteIdentifier(trim($table)).' SET '.implode(', ', $sets).$this->_getSqlPart('where');
	}

	private function _renderDelete($sql){
		$this->_renderSelectParts($sql);
		$table = $sql->getPart('table');
		return 'DELETE FROM '.$this->quoteIdentifier(trim($table)).' '.$this->_getSqlPart('where');
	}

	// format table/sql/expression
	private function _formatTable($table, $alias){
		if($this->_isExpression($table)){
			$table = $this->_formatExpression($table);
		}else{
			$table = $this->quoteIdentifier(trim($table));
		}
		if(is_string($alias)){
			$table .= ' AS '.$this->identifier(trim($alias));
		}
		return $table;
	}

	// format column/sql/expression
	private function _formatColumn($column, $alias){
		if(is_array($column)){
			$value = current($column);
			$column = '('.key($column).')';
			$this->_values['column'][] = $value;
		}

		$column = trim($column);
		if('*' == $column){
			$alias = null;
		}elseif($this->_isExpression($column)){
			$column = $this->_formatExpression($column);
		}else{
			$column = $this->quoteIdentifier($column);
		}

		if(is_string($alias)){
			$column .= ' AS '.$this->identifier(trim($alias));
		}
		return $column;
	}

	private function _getSqlPart($name){
		return isset($this->_sql_parts[$name]) ? $this->_sql_parts[$name] : '';
	}

	private function _renderSelectParts($sql){
		$parts = $sql->getParts();
		$ret = '';
		foreach($parts as $key=>$value){
			switch($key){
				case 'distinct':$ret = $this->_renderDistinct($value);break;
				case 'columns':$ret = $this->_renderColumns($value);break;
				case 'froms':$ret = $this->_renderFrom($value);break;
				case 'joins':$ret = $this->_renderJoin($value);break;
				case 'where':$ret = $this->_renderWhere($value);break;
				case 'group':$ret = $this->_renderGroup($value);break;
				case 'having':$ret = $this->_renderHaving($value);break;
				case 'order':$ret = $this->_renderOrder($value);break;
				case 'for_update':$ret = $this->_renderForUpdate($value);break;
				case 'limit':$ret = $this->_renderLimit($value);break;
			}
			$this->_sql_parts[$key] = $ret;
		}
	}

	private function _renderDistinct($value){
		return $value ? ' DISTINCT ' : '';
	}

	private function _renderColumns($columns){
		$tmp = array();
		foreach($columns as $alias=>$field){
			$tmp[] = $this->_formatColumn($field, $alias);
		}
		return implode(', ', $tmp);
	}

	private function _renderFrom(array $froms){
		$tmp = array();
		foreach($froms as $alias=>$table){
			$tmp[] = $this->_formatTable($table, $alias);
		}
		return ' FROM '.implode(', ', $tmp);
	}

	private function _renderJoin($joins){
		$tmp = array();
		foreach($joins as $join){
			$table = (array)$join['table'];
			$alias = key($table);
			$tname = current($table);
			$on = is_array($join['on']) ? key($join['on']) : $join['on'];
			$on_values = is_array($join['on']) ? current($join['on']) : NULL;
			$type = $join['type'];

			$part = '';
			switch($type){
				case 'left':$part .=' LEFT JOIN ';break;
				case 'right':$part .=' RIGHT JOIN ';break;
				default: $part .= ' INNER JOIN ';
			}

			$part .= $this->_formatTable($tname, $alias).' ON ';
			$part .= $this->_renderCond(array(array('cond'=>$on, 'value'=>$on_values, 'type'=>'')), 'join');
			$tmp[] = $part;
		}
		return implode("\r\n", $tmp);
	}

	private function _renderCond($wheres, $part){
		$tmp = array();
		foreach($wheres as $key=>$row){
			$cond = $this->_formatExpression(trim($row['cond']));
			$value = $row['value'];
			$type = $row['type'];

			if($key > 0 && $type){
				$tmp[] = $type=='and' ? ' AND ':' OR ';
			}

			$tmp[] = $cond;
			if(NULL !== $value){
				if(is_array($value)){
					if(false !== strpos($cond, 'BETWEEN')){
						$this->_values[$part][] = $value[0];
						$this->_values[$part][] = $value[1];
					}else{
						$this->_values[$part][] = $value;
					}
				}else{
					$this->_values[$part][] = $value;
				}
			}
		}
		return implode(' ', $tmp);
	}

	private function _renderWhere($wheres){
		$where = $this->_renderCond($wheres, 'where');
		return $where ? ' WHERE '.$where : '';
	}

	private function _renderGroup($group){
		foreach($group as &$item){
			$item = $this->quoteIdentifier($item);
		}
		return $group ? ' GROUP BY '.implode(', ', $group) : '';
	}

	private function _renderHaving($wheres){
		$having = $this->_renderCond($wheres, 'having');
		return $having ? ' HAVING '.$having : '';
	}

	private function _renderOrder($orders){
		$tmp = array();
		foreach($orders as $row){
			$name = $row['name'];
			$desc = $row['type'];
			$tmp[] = $this->quoteIdentifier($name).' '.($desc ? 'DESC':'ASC');
		}
		return $tmp ? ' ORDER BY '.implode(', ', $tmp) : '';
	}

	private function _renderForUpdate($value){
		return $value ? ' FOR UPDATE ' : '';
	}

	private function _renderLimit($limit){
		$offset = $limit['offset'];
		$count = $limit['count'];

		return $limit ? ' LIMIT '.$offset.', '.$count : '';
	}



	public function test_pe($expr){
		return $this->_formatExpression($expr);
	}

	private function _formatExpression($expr){
		$parts = $this->_paserExpression($expr);
		foreach($parts as &$node){
			if(is_array($node)){
				$node = $this->quoteIdentifier($node[0]);
			}
		}
		return implode(' ', $parts);
	}

	private function _paserExpression($expr){
		$expr = trim($expr);
		$buffer = '';
		$nodes = array();
		$length = strlen($expr);
		for($i=0;$i<$length;$i++){
			$char = $expr[$i];

			if('(' == $char){
				if('' != $buffer){
					$nodes[] = strtoupper($buffer);
					$buffer = '';
				}
				$nodes[] = $char;
				continue;
			}elseif(')' == $char){
				if('' != $buffer){
					$nodes[] = is_numeric($buffer) ? $buffer : array($buffer);;
					$buffer = '';
				}
				$nodes[] = $char;
				continue;
			}elseif(in_array($char, array("'", '"')) && '' == $buffer){
				$b = $char;
				for($i++;$i<$length;$i++){
					$char = $expr[$i];
					if($b == $char){
						$nodes[] = $char.$buffer.$char; // 文本处理
						$buffer = '';
						break;
					}
					$buffer .= $char;
					if("\\" == $char){
						$i++;
						$buffer .= $expr[$i];
					}
				}
				continue;
			}elseif(in_array($char, array('+', '-', '*', '/', '=', '<', '>', '!', ',', '?'))){
				if('' != $buffer){
					$nodes[] = is_numeric($buffer) ? $buffer : array($buffer);
					$buffer = '';
				}

				if(isset($expr[$i+1])){
					$next = $expr[$i+1];
					if(in_array($next, array('=', '<', '>'))){
						$char .= $expr[++$i];
					}
				}

				$nodes[] = $char=='?' ? $this->_hold : $char;
				continue;
			}elseif(in_array($char, array(' ', "\r", "\n"))){
				if('' != $buffer){
					$nodes[] = is_numeric($buffer) ? $buffer : array($buffer);;
					$buffer = '';
				}
				continue;
			}elseif(in_array(strtolower($buffer.$char), array('and', 'or', 'not', 'like', 'between'))){
				if('' != $buffer){
					$nodes[] = strtoupper($buffer.$char);
					$buffer = '';
				}
				continue;
			}

			$buffer .= $char;
		}

		if($buffer){
			$nodes[] = is_numeric($buffer) ? $buffer : array($buffer);
		}

		return $nodes;
	}
}