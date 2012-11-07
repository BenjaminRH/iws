<?php

class Create_Series_Tag_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series_tag', function($table)
		{
			$table->increments('id');
			$table->integer('series_id');
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
		Schema::drop('series_tag');
	}

}