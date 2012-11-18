<?php

class Create_Post_Tag_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_tag', function($table)
		{
			$table->increments('id');
			$table->integer('post_id');
			$table->integer('tag_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_tag');
	}

}