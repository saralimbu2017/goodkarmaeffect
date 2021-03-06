<?php
/**
 * RSS comments view
 *
 * @uses $vars['entity']        ElggEntity
 * @uses $vars['limit']         Optional limit value (default is 25)
 */

$limit = elgg_extract('limit', $vars, get_input('limit', 0));
if (!$limit) {
	$limit = elgg_trigger_plugin_hook('config', 'comments_per_page', [], 25);
}

echo elgg_list_entities([
	'type' => 'object',
	'subtype' => 'comment',
	'container_guid' => $vars['entity']->guid,
	'reverse_order_by' => true,
	'full_view' => true,
	'limit' => $limit,
	'preload_owners' => true,
	'distinct' => false,
]);
