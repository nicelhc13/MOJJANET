<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleFiles");
$query->setAction("delete");
$query->setPriority("");

${'module_srl31_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl31_argument'}->checkFilter('number');
${'module_srl31_argument'}->checkNotNull();
${'module_srl31_argument'}->createConditionValue();
if(!${'module_srl31_argument'}->isValid()) return ${'module_srl31_argument'}->getErrorMessage();
if(${'module_srl31_argument'} !== null) ${'module_srl31_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl31_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>