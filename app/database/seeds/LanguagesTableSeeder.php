<?php

class LanguagesTableSeeder extends Seeder {

	public function run()
	{
            DB::table('languages')->delete();
            
            $data = array(
                array('name' =>'English'),
                array('name' =>'Hindi'),
                array('name' =>'Marathi')
            );
            
            DB::table('languages')->insert($data);
	}

}
