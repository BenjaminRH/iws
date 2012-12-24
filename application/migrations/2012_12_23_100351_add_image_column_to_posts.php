<?php

class Add_Image_Column_To_Posts {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('posts', function($table)
		{
			$table->string('image');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('posts', function($table)
		{
			$table->drop_column('image');
		});
	}

}