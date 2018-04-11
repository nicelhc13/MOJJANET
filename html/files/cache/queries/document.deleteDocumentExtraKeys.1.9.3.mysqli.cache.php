<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraKeys");
$query->setAction("delete");
$query->setPriority("");

${'module_srl16_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl16_argument'}->checkFilter('number');
${'module_srl16_argument'}->checkNotNull();
${'module_srl16_argument'}->createConditionValue();
if(!${'module_srl16_argument'}->isValid()) return ${'module_srl16_argument'}->getErrorMessage();
if(${'module_srl16_argument'} !== null) ${'module_srl16_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl17_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl17_argument'}->checkFilter('number');
${'document_srl17_argument'}->createConditionValue();
if(!${'document_srl17_argument'}->isValid()) return ${'document_srl17_argument'}->getErrorMessage();
} else
${'document_srl17_argument'} = NULL;if(isset($args->var_idx)) {
${'var_idx18_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx18_argument'}->checkFilter('number');
${'var_idx18_argument'}->createConditionValue();
if(!${'var_idx18_argument'}->isValid()) return ${'var_idx18_argument'}->getErrorMessage();
} else
${'var_idx18_argument'} = NULL;if(${'var_idx18_argument'} !== null) ${'var_idx18_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_document_extra_keys`', '`document_extra_keys`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl16_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl17_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx18_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>