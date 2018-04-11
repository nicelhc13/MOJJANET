<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuItemByUrl");
$query->setAction("select");
$query->setPriority("");

${'url275_argument'} = new ConditionArgument('url', $args->url, 'equal');
${'url275_argument'}->checkNotNull();
${'url275_argument'}->createConditionValue();
if(!${'url275_argument'}->isValid()) return ${'url275_argument'}->getErrorMessage();
if(${'url275_argument'} !== null) ${'url275_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut276_argument'} = new ConditionArgument('is_shortcut', $args->is_shortcut, 'equal');
${'is_shortcut276_argument'}->createConditionValue();
if(!${'is_shortcut276_argument'}->isValid()) return ${'is_shortcut276_argument'}->getErrorMessage();
} else
${'is_shortcut276_argument'} = NULL;if(${'is_shortcut276_argument'} !== null) ${'is_shortcut276_argument'}->setColumnType('char');

${'site_srl277_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl277_argument'}->checkNotNull();
${'site_srl277_argument'}->createConditionValue();
if(!${'site_srl277_argument'}->isValid()) return ${'site_srl277_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu_item`', '`MI`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`MI`.`url`',$url275_argument,"equal")
,new ConditionWithArgument('`MI`.`is_shortcut`',$is_shortcut276_argument,"equal", 'and')
,new ConditionSubquery('`MI`.`menu_srl`',new Subquery('`getSiteSrl`', array(
new SelectExpression('`menu_srl`')
), 
array(
new Table('`xe_menu`', '`M`')
),
array(
new ConditionGroup(array(
new ConditionWithArgument('`M`.`site_srl`',$site_srl277_argument,"equal")))
),
array(),
array(),
null
),"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>