<?php

class Create_Choices_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('choices', function($table)
		{
			$table->increments('id');
			$table->string('answer');
			$table->integer('poll_id');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('choices');
	}

}