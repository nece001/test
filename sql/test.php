<?php
include('./sql/Statment.php');
include('./sql/Builder.php');
include('./db/mysql/Builder.php');
include('./db/mysql/Db.php');

// 查询
$usql = new Sql_Statment();
$usql->select(array('ua'=>'aaa'), array('a1', 'a2'))->where('a1=?', 'a')->where('b1=?', 1);

$sql = new Sql_Statment();
$sql->select(array('a'=>'tt', 'b'=>'abc(ssd)', 'c'=>'(a)'),
array('*', '  a'=>'test', 'as'=>'you and me', 'b.test', 'abs'=>'abs(a.a+a.b+2)', 'col'=>array('number+?'=>'col 1')))
->joinLeft(array('tb'=>'b'), 'b.a=a.a')
->joinLeft(array('tb2'=>'b2'), array('b2.a=?'=>'join 1'))
->where('(a=?' , 'where 1')->orWhere('b=?)', 2)->where('x="you and me?"')->where('a.c=?', 3)->where('a in(?)', array(1,2,3))->where('a.c ? between ?', array(1, 2))->where('a.o LIKE ?', '%you and me%')->where('a.o not LIKE ?', '%you and me%')->where('ISNULL(xya)')
->having('a>?', 'having1')
->group(array('a', 'b.a'))
->order('a')->order('b', false)
->limit(100)->forUpdate()
->union($usql);

// 正式测试查询
$select = new Sql_Statment();
//$select->select(array('g'=>'gss_goods'), array('*'))->where('goods_sn=?', 'YQ8902WE');
//$select->select(array('g'=>'gss_goods'), array('*'))->where('add_time >= ?', strtotime('2014-01-01'));
$select->select(array('g'=>'gss_goods'), array('goods_id', 'goods_sn', 'goods_name'))->where('add_time >= ?', strtotime('2014-01-01'));

// 插入
$insert = new Sql_Statment();
$insert->insert('abc', array('a'=>1, 'b'=>'a'));

// 更新 计算式要用() 括起来
$update = new Sql_Statment();
$update->update('abc', array('(a=a+?)'=>1, 'b\'b'=>'a+1'))->where('a>1')->where('b IN(?)', array('a', 'b\'b'));

// 删除
$delete = new Sql_Statment();
$delete->delete('abc')->where('a>1')->where('b IN(?)', array('a', 'b\'b'));


$t1 = microtime(true);
$db = new Db_Mysql_Db();
//echo $db->sqlToPrepare($delete);
echo "\r\n\r\n\r\n";
echo $db->sqlToString($select);
echo "\r\n\r\n\r\n";
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,13).'秒';
exit();

$build = new Sql_Builder($db);

$str = 'a.column, count(*) aa, "ab\\c"';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = 'concat(1, "abc"), count(*), (g+b), count(abc), (6+?), (a+(b-c*(-d)))';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = 'a.column=1';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = '1=a.column';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = 'a.tet = 2 and    1=a.column';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = 'a.tet = "123" and    1=a.column or sum(g.goods+g.credit)';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = 'ISNULL(a.test) and    1=a.column or asdf+3.46';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);

$str = 'ISNULL(a.test) and    1=a.column or ifnull( a, 232 ) and lskd=? and a like ?';
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);


$str = 'SELECT distinct, *, count(*) as a FROM abc, (SELECT * FROM B) WHERE title="abc" and a.id=1 and cat='."'abc' and concat('aa', 'bb')='aa\\\\\'bb' and id IN(1,2,3) For Update";
$ret = $build->test_pe($str);
echo "\r\n".$str."\r\n";
print_r($ret);