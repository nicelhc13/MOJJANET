<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateModule");
$query->setAction("update");
$query->setPriority("");

${'module254_argument'} = new Argument('module', $args->{'module'});
${'module254_argument'}->checkNotNull();
if(!${'module254_argument'}->isValid()) return ${'module254_argument'}->getErrorMessage();
if(${'module254_argument'} !== null) ${'module254_argument'}->setColumnType('varchar');
if(isset($args->module_category_srl)) {
${'module_category_srl255_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
if(!${'module_category_srl255_argument'}->isValid()) return ${'module_category_srl255_argument'}->getErrorMessage();
} else
${'module_category_srl255_argument'} = NULL;if(${'module_category_srl255_argument'} !== null) ${'module_category_srl255_argument'}->setColumnType('number');
if(isset($args->layout_srl)) {
${'layout_srl256_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl256_argument'}->isValid()) return ${'layout_srl256_argument'}->getErrorMessage();
} else
${'layout_srl256_argument'} = NULL;if(${'layout_srl256_argument'} !== null) ${'layout_srl256_argument'}->setColumnType('number');
if(isset($args->skin)) {
${'skin257_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin257_argument'}->isValid()) return ${'skin257_argument'}->getErrorMessage();
} else
${'skin257_argument'} = NULL;if(${'skin257_argument'} !== null) ${'skin257_argument'}->setColumnType('varchar');

${'is_skin_fix258_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix258_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix258_argument'}->isValid()) return ${'is_skin_fix258_argument'}->getErrorMessage();
if(${'is_skin_fix258_argument'} !== null) ${'is_skin_fix258_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin259_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin259_argument'}->isValid()) return ${'mskin259_argument'}->getErrorMessage();
} else
${'mskin259_argument'} = NULL;if(${'mskin259_argument'} !== null) ${'mskin259_argument'}->setColumnType('varchar');

${'is_mskin_fix260_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix260_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix260_argument'}->isValid()) return ${'is_mskin_fix260_argument'}->getErrorMessage();
if(${'is_mskin_fix260_argument'} !== null) ${'is_mskin_fix260_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl261_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl261_argument'}->checkFilter('number');
if(!${'menu_srl261_argument'}->isValid()) return ${'menu_srl261_argument'}->getErrorMessage();
} else
${'menu_srl261_argument'} = NULL;if(${'menu_srl261_argument'} !== null) ${'menu_srl261_argument'}->setColumnType('number');

${'mid262_argument'} = new Argument('mid', $args->{'mid'});
${'mid262_argument'}->checkNotNull();
if(!${'mid262_argument'}->isValid()) return ${'mid262_argument'}->getErrorMessage();
if(${'mid262_argument'} !== null) ${'mid262_argument'}->setColumnType('varchar');

${'browser_title263_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title263_argument'}->checkNotNull();
if(!${'browser_title263_argument'}->isValid()) return ${'browser_title263_argument'}->getErrorMessage();
if(${'browser_title263_argument'} !== null) ${'browser_title263_argument'}->setColumnType('varchar');

${'description264_argument'} = new Argument('description', $args->{'description'});
${'description264_argument'}->ensureDefaultValue('');
if(!${'description264_argument'}->isValid()) return ${'description264_argument'}->getErrorMessage();
if(${'description264_argument'} !== null) ${'description264_argument'}->setColumnType('text');

${'is_default265_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default265_argument'}->ensureDefaultValue('N');
${'is_default265_argument'}->checkNotNull();
if(!${'is_default265_argument'}->isValid()) return ${'is_default265_argument'}->getErrorMessage();
if(${'is_default265_argument'} !== null) ${'is_default265_argument'}->setColumnType('char');
if(isset($args->content)) {
${'content266_argument'} = new Argument('content', $args->{'content'});
if(!${'content266_argument'}->isValid()) return ${'content266_argument'}->getErrorMessage();
} else
${'content266_argument'} = NULL;if(${'content266_argument'} !== null) ${'content266_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent267_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent267_argument'}->isValid()) return ${'mcontent267_argument'}->getErrorMessage();
} else
${'mcontent267_argument'} = NULL;if(${'mcontent267_argument'} !== null) ${'mcontent267_argument'}->setColumnType('bigtext');

${'open_rss268_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss268_argument'}->ensureDefaultValue('Y');
${'open_rss268_argument'}->checkNotNull();
if(!${'open_rss268_argument'}->isValid()) return ${'open_rss268_argument'}->getErrorMessage();
if(${'open_rss268_argument'} !== null) ${'open_rss268_argument'}->setColumnType('char');

${'header_text269_argument'} = new Argument('header_text', $args->{'header_text'});
${'header_text269_argument'}->ensureDefaultValue('');
if(!${'header_text269_argument'}->isValid()) return ${'header_text269_argument'}->getErrorMessage();
if(${'header_text269_argument'} !== null) ${'header_text269_argument'}->setColumnType('text');

${'footer_text270_argument'} = new Argument('footer_text', $args->{'footer_text'});
${'footer_text270_argument'}->ensureDefaultValue('');
if(!${'footer_text270_argument'}->isValid()) return ${'footer_text270_argument'}->getErrorMessage();
if(${'footer_text270_argument'} !== null) ${'footer_text270_argument'}->setColumnType('text');
if(isset($args->mlayout_srl)) {
${'mlayout_srl271_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl271_argument'}->isValid()) return ${'mlayout_srl271_argument'}->getErrorMessage();
} else
${'mlayout_srl271_argument'} = NULL;if(${'mlayout_srl271_argument'} !== null) ${'mlayout_srl271_argument'}->setColumnType('number');

${'use_mobile272_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile272_argument'}->ensureDefaultValue('N');
if(!${'use_mobile272_argument'}->isValid()) return ${'use_mobile272_argument'}->getErrorMessage();
if(${'use_mobile272_argument'} !== null) ${'use_mobile272_argument'}->setColumnType('char');

${'site_srl273_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl273_argument'}->checkFilter('number');
${'site_srl273_argument'}->ensureDefaultValue('0');
${'site_srl273_argument'}->checkNotNull();
${'site_srl273_argument'}->createConditionValue();
if(!${'site_srl273_argument'}->isValid()) return ${'site_srl273_argument'}->getErrorMessage();
if(${'site_srl273_argument'} !== null) ${'site_srl273_argument'}->setColumnType('number');

${'module_srl274_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl274_argument'}->checkFilter('number');
${'module_srl274_argument'}->checkNotNull();
${'module_srl274_argument'}->createConditionValue();
if(!${'module_srl274_argument'}->isValid()) return ${'module_srl274_argument'}->getErrorMessage();
if(${'module_srl274_argument'} !== null) ${'module_srl274_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`module`', ${'module254_argument'})
,new UpdateExpression('`module_category_srl`', ${'module_category_srl255_argument'})
,new UpdateExpression('`layout_srl`', ${'layout_srl256_argument'})
,new UpdateExpression('`skin`', ${'skin257_argument'})
,new UpdateExpression('`is_skin_fix`', ${'is_skin_fix258_argument'})
,new UpdateExpression('`mskin`', ${'mskin259_argument'})
,new UpdateExpression('`is_mskin_fix`', ${'is_mskin_fix260_argument'})
,new UpdateExpression('`menu_srl`', ${'menu_srl261_argument'})
,new UpdateExpression('`mid`', ${'mid262_argument'})
,new UpdateExpression('`browser_title`', ${'browser_title263_argument'})
,new UpdateExpression('`description`', ${'description264_argument'})
,new UpdateExpression('`is_default`', ${'is_default265_argument'})
,new UpdateExpression('`content`', ${'content266_argument'})
,new UpdateExpression('`mcontent`', ${'mcontent267_argument'})
,new UpdateExpression('`open_rss`', ${'open_rss268_argument'})
,new UpdateExpression('`header_text`', ${'header_text269_argument'})
,new UpdateExpression('`footer_text`', ${'footer_text270_argument'})
,new UpdateExpression('`mlayout_srl`', ${'mlayout_srl271_argument'})
,new UpdateExpression('`use_mobile`', ${'use_mobile272_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl273_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl274_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>