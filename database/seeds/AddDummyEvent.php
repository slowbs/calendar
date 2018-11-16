<?php

use Illuminate\Database\Seeder;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title'=>'Finacial forum','name'=>'Paperlove','describe'=>'fuck','start_date'=>'2017-10-12', 'end_date'=>'2017-09-15'],
            ['title'=>'Devtalk','name'=>'Callout Myname','describe'=>'eieiei', 'start_date'=>'2017-10-13', 'end_date'=>'2017-09-25'],
            ['title'=>'Super Event','name'=>'Oh I cry','describe'=>'My', 'start_date'=>'2017-09-23', 'end_date'=>'2017-09-24'],
            ['title'=>'wtf event','name'=>'Suicide Sheep','describe'=>'life', 'start_date'=>'2017-09-19', 'end_date'=>'2017-09-27'],
           ];
           \DB::table('events')->insert($data);
    }
}
