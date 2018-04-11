<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMemberPassword");
$query->setAction("update");
$query->setPriority("");

${'password1_argument'} = new Argument('password', $args->{'password'});
${'password1_argument'}->checkNotNull();
if(!${'password1_argument'}->isValid()) return ${'password1_argument'}->getErrorMessage();
if(${'password1_argument'} !== null) ${'password1_argument'}->setColumnType('varchar');
if(isset($args->denied)) {
${'denied2_argument'} = new Argument('denied', $args->{'denied'});
if(!${'denied2_argument'}->isValid()) return ${'denied2_argument'}->getErrorMessage();
} else
${'denied2_argument'} = NULL;if(${'denied2_argument'} !== null) ${'denied2_argument'}->setColumnType('char');

${'member_srl3_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl3_argument'}->checkFilter('number');
${'member_srl3_argument'}->checkNotNull();
${'member_srl3_argument'}->createConditionValue();
if(!${'member_srl3_argument'}->isValid()) return ${'member_srl3_argument'}->getErrorMessage();
if(${'member_srl3_argument'} !== null) ${'member_srl3_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`password`', ${'password1_argument'})
,new UpdateExpression('`denied`', ${'denied2_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl3_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>