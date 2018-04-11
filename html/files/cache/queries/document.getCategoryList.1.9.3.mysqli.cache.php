<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCategoryList");
$query->setAction("select");
$query->setPriority("");

${'module_srl7_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl7_argument'}->checkFilter('number');
${'module_srl7_argument'}->checkNotNull();
${'module_srl7_argument'}->createConditionValue();
if(!${'module_srl7_argument'}->isValid()) return ${'module_srl7_argument'}->getErrorMessage();
if(${'module_srl7_argument'} !== null) ${'module_srl7_argument'}->setColumnType('number');

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_document_categories`', '`document_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl7_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, "asc")
));
$query->setLimit();
return $query; ?>