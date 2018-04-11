<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroupsExtraVars");
$query->setAction("select");
$query->setPriority("");

${'module_srl10_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl10_argument'}->checkFilter('number');
${'module_srl10_argument'}->checkNotNull();
${'module_srl10_argument'}->createConditionValue();
if(!${'module_srl10_argument'}->isValid()) return ${'module_srl10_argument'}->getErrorMessage();
if(${'module_srl10_argument'} !== null) ${'module_srl10_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx11_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'notin');
${'var_idx11_argument'}->checkFilter('number');
${'var_idx11_argument'}->createConditionValue();
if(!${'var_idx11_argument'}->isValid()) return ${'var_idx11_argument'}->getErrorMessage();
} else
${'var_idx11_argument'} = NULL;if(${'var_idx11_argument'} !== null) ${'var_idx11_argument'}->setColumnType('number');
if(isset($args->eid)) {
${'eid12_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid12_argument'}->createConditionValue();
if(!${'eid12_argument'}->isValid()) return ${'eid12_argument'}->getErrorMessage();
} else
${'eid12_argument'} = NULL;if(${'eid12_argument'} !== null) ${'eid12_argument'}->setColumnType('varchar');

${'sort_index13_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index13_argument'}->ensureDefaultValue('var_idx');
if(!${'sort_index13_argument'}->isValid()) return ${'sort_index13_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`module_srl`', '`module_srl`')
,new SelectExpression('`var_idx`', '`idx`')
,new SelectExpression('`eid`', '`eid`')
));
$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl10_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx11_argument,"notin", 'and')
,new ConditionWithArgument('`eid`',$eid12_argument,"equal", 'and')))
));
$query->setGroups(array(
'`module_srl`' ,'`var_idx`' ,'`eid`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index13_argument'}, "asc")
));
$query->setLimit();
return $query; ?>