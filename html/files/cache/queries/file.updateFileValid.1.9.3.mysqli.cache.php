<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateFileValid");
$query->setAction("update");
$query->setPriority("");

${'isvalid249_argument'} = new Argument('isvalid', $args->{'isvalid'});
${'isvalid249_argument'}->ensureDefaultValue('Y');
${'isvalid249_argument'}->checkNotNull();
if(!${'isvalid249_argument'}->isValid()) return ${'isvalid249_argument'}->getErrorMessage();
if(${'isvalid249_argument'} !== null) ${'isvalid249_argument'}->setColumnType('char');

${'upload_target_srl250_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl250_argument'}->checkFilter('number');
${'upload_target_srl250_argument'}->checkNotNull();
${'upload_target_srl250_argument'}->createConditionValue();
if(!${'upload_target_srl250_argument'}->isValid()) return ${'upload_target_srl250_argument'}->getErrorMessage();
if(${'upload_target_srl250_argument'} !== null) ${'upload_target_srl250_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`isvalid`', ${'isvalid249_argument'})
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl250_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>