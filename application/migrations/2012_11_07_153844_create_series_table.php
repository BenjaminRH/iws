<?php

class Create_Series_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->string('description');
			$table->string('channel');
			$table->string('website');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('series');
	}

}