<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraVars");
$query->setAction("delete");
$query->setPriority("");

${'module_srl19_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl19_argument'}->checkFilter('number');
${'module_srl19_argument'}->checkNotNull();
${'module_srl19_argument'}->createConditionValue();
if(!${'module_srl19_argument'}->isValid()) return ${'module_srl19_argument'}->getErrorMessage();
if(${'module_srl19_argument'} !== null) ${'module_srl19_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl20_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl20_argument'}->checkFilter('number');
${'document_srl20_argument'}->createConditionValue();
if(!${'document_srl20_argument'}->isValid()) return ${'document_srl20_argument'}->getErrorMessage();
} else
${'document_srl20_argument'} = NULL;if(${'document_srl20_argument'} !== null) ${'document_srl20_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx21_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx21_argument'}->checkFilter('number');
${'var_idx21_argument'}->createConditionValue();
if(!${'var_idx21_argument'}->isValid()) return ${'var_idx21_argument'}->getErrorMessage();
} else
${'var_idx21_argument'} = NULL;if(${'var_idx21_argument'} !== null) ${'var_idx21_argument'}->setColumnType('number');
if(isset($args->lang_code)) {
${'lang_code22_argument'} = new ConditionArgument('lang_code', $args->lang_code, 'equal');
${'lang_code22_argument'}->createConditionValue();
if(!${'lang_code22_argument'}->isValid()) return ${'lang_code22_argument'}->getErrorMessage();
} else
${'lang_code22_argument'} = NULL;if(${'lang_code22_argument'} !== null) ${'lang_code22_argument'}->setColumnType('varchar');
if(isset($args->eid)) {
${'eid23_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid23_argument'}->createConditionValue();
if(!${'eid23_argument'}->isValid()) return ${'eid23_argument'}->getErrorMessage();
} else
${'eid23_argument'} = NULL;if(${'eid23_argument'} !== null) ${'eid23_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl19_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl20_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx21_argument,"equal", 'and')
,new ConditionWithArgument('`lang_code`',$lang_code22_argument,"equal", 'and')
,new ConditionWithArgument('`eid`',$eid23_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>