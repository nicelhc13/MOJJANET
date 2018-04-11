<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateMenuItem");
$query->setAction("update");
$query->setPriority("");
if(isset($args->menu_srl)) {
${'menu_srl278_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
if(!${'menu_srl278_argument'}->isValid()) return ${'menu_srl278_argument'}->getErrorMessage();
} else
${'menu_srl278_argument'} = NULL;if(${'menu_srl278_argument'} !== null) ${'menu_srl278_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl279_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
if(!${'parent_srl279_argument'}->isValid()) return ${'parent_srl279_argument'}->getErrorMessage();
} else
${'parent_srl279_argument'} = NULL;if(${'parent_srl279_argument'} !== null) ${'parent_srl279_argument'}->setColumnType('number');
if(isset($args->name)) {
${'name280_argument'} = new Argument('name', $args->{'name'});
if(!${'name280_argument'}->isValid()) return ${'name280_argument'}->getErrorMessage();
} else
${'name280_argument'} = NULL;if(${'name280_argument'} !== null) ${'name280_argument'}->setColumnType('text');
if(isset($args->desc)) {
${'desc281_argument'} = new Argument('desc', $args->{'desc'});
if(!${'desc281_argument'}->isValid()) return ${'desc281_argument'}->getErrorMessage();
} else
${'desc281_argument'} = NULL;if(${'desc281_argument'} !== null) ${'desc281_argument'}->setColumnType('varchar');
if(isset($args->url)) {
${'url282_argument'} = new Argument('url', $args->{'url'});
if(!${'url282_argument'}->isValid()) return ${'url282_argument'}->getErrorMessage();
} else
${'url282_argument'} = NULL;if(${'url282_argument'} !== null) ${'url282_argument'}->setColumnType('varchar');
if(isset($args->is_shortcut)) {
${'is_shortcut283_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
if(!${'is_shortcut283_argument'}->isValid()) return ${'is_shortcut283_argument'}->getErrorMessage();
} else
${'is_shortcut283_argument'} = NULL;if(${'is_shortcut283_argument'} !== null) ${'is_shortcut283_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window284_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window284_argument'}->isValid()) return ${'open_window284_argument'}->getErrorMessage();
} else
${'open_window284_argument'} = NULL;if(${'open_window284_argument'} !== null) ${'open_window284_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand285_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand285_argument'}->isValid()) return ${'expand285_argument'}->getErrorMessage();
} else
${'expand285_argument'} = NULL;if(${'expand285_argument'} !== null) ${'expand285_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn286_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn286_argument'}->isValid()) return ${'normal_btn286_argument'}->getErrorMessage();
} else
${'normal_btn286_argument'} = NULL;if(${'normal_btn286_argument'} !== null) ${'normal_btn286_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn287_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn287_argument'}->isValid()) return ${'hover_btn287_argument'}->getErrorMessage();
} else
${'hover_btn287_argument'} = NULL;if(${'hover_btn287_argument'} !== null) ${'hover_btn287_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn288_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn288_argument'}->isValid()) return ${'active_btn288_argument'}->getErrorMessage();
} else
${'active_btn288_argument'} = NULL;if(${'active_btn288_argument'} !== null) ${'active_btn288_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls289_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls289_argument'}->isValid()) return ${'group_srls289_argument'}->getErrorMessage();
} else
${'group_srls289_argument'} = NULL;if(${'group_srls289_argument'} !== null) ${'group_srls289_argument'}->setColumnType('text');

${'menu_item_srl290_argument'} = new ConditionArgument('menu_item_srl', $args->menu_item_srl, 'equal');
${'menu_item_srl290_argument'}->checkFilter('number');
${'menu_item_srl290_argument'}->checkNotNull();
${'menu_item_srl290_argument'}->createConditionValue();
if(!${'menu_item_srl290_argument'}->isValid()) return ${'menu_item_srl290_argument'}->getErrorMessage();
if(${'menu_item_srl290_argument'} !== null) ${'menu_item_srl290_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`menu_srl`', ${'menu_srl278_argument'})
,new UpdateExpression('`parent_srl`', ${'parent_srl279_argument'})
,new UpdateExpression('`name`', ${'name280_argument'})
,new UpdateExpression('`desc`', ${'desc281_argument'})
,new UpdateExpression('`url`', ${'url282_argument'})
,new UpdateExpression('`is_shortcut`', ${'is_shortcut283_argument'})
,new UpdateExpression('`open_window`', ${'open_window284_argument'})
,new UpdateExpression('`expand`', ${'expand285_argument'})
,new UpdateExpression('`normal_btn`', ${'normal_btn286_argument'})
,new UpdateExpression('`hover_btn`', ${'hover_btn287_argument'})
,new UpdateExpression('`active_btn`', ${'active_btn288_argument'})
,new UpdateExpression('`group_srls`', ${'group_srls289_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_item_srl`',$menu_item_srl290_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>