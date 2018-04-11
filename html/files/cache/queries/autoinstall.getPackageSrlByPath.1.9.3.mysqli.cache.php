<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getPackageSqlByPath");
$query->setAction("select");
$query->setPriority("");

${'path2_argument'} = new ConditionArgument('path', $args->path, 'equal');
${'path2_argument'}->checkNotNull();
${'path2_argument'}->createConditionValue();
if(!${'path2_argument'}->isValid()) return ${'path2_argument'}->getErrorMessage();
if(${'path2_argument'} !== null) ${'path2_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`package_srl`')
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`path`',$path2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>