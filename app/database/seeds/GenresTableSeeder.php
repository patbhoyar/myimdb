<?php

class GenresTableSeeder extends Seeder {

	public function run()
	{
            DB::table('genres')->delete();
            
            $data = array(
                array('name' =>'Action'),
                array('name' =>'Adventure'),
                array('name' =>'Animation'),
                array('name' =>'Biography'),
                array('name' =>'Comedy'),
                array('name' =>'Crime'),
                array('name' =>'Documentary'),
                array('name' =>'Drama'),
                array('name' =>'Family'),
                array('name' =>'Fantasy'),
                array('name' =>'Film-Noir'),
                array('name' =>'History'),
                array('name' =>'Horror'),
                array('name' =>'Music'),
                array('name' =>'Musical'),
                array('name' =>'Mystery'),
                array('name' =>'Romance'),
                array('name' =>'Sci-Fi'),
                array('name' =>'Sport'),
                array('name' =>'Thriller'),
                array('name' =>'War'),
                array('name' =>'Western')
            );
            
            DB::table('genres')->insert($data);
	}

}
