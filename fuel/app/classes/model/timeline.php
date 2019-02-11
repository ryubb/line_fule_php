<?php

class Model_Timeline extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'body',
		'title',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
			'key_from' => 'user_id',
			'key_to' => 'id',
			'cascade_delete' => false,
		)
	);

	protected static $_table_name = 'timelines';

	public static function get_timeline($per_page, $pagination, $search)
	{
		$query = DB::select()->from('timelines');
		$result = $query
						->order_by('created_at', 'desc')
						->limit($per_page)
						->offset($pagination->offset);
		
		if (ISSET($search)) {
			// $result->where('user_id', '=', $search);
		}
		$result_array = $result->execute()->as_array();
		return $result_array;
	}
}
