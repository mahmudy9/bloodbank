<?php

use Illuminate\Database\Seeder;
use App\City;
use App\Governerate;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dakahliya = Governerate::where('name' , 'Dakahliya')->first();
        $cairo = Governerate::where('name' , 'Cairo')->first();
        $gharbiya = Governerate::where('name' , 'Gharbiya')->first();
        $giza = Governerate::where('name' , 'Giza')->first();

        $mansoura = new City;
        $mansoura->name = "Mansoura";
        $mansoura->governerate_id =  $dakahliya->id;
        $mansoura->save();

        $talkha = new City;
        $talkha->name = "Talkha";
        $talkha->governerate_id = $dakahliya->id;
        $talkha->save();

        $nasrcity = new City;
        $nasrcity->name = "Nasrcity";
        $nasrcity->governerate_id = $cairo->id;
        $nasrcity->save();

        $masrelgedida = new City;
        $masrelgedida->name = "Masrelgedida";
        $masrelgedida->governerate_id = $cairo->id;
        $masrelgedida->save();

        $mahalah = new City;
        $mahalah->name = "Mahalah";
        $mahalah->governerate_id = $gharbiya->id;
        $mahalah->save();

        $samanoud = new City;
        $samanoud->name = "Samanoud";
        $samanoud->governerate_id = $gharbiya->id;
        $samanoud->save();

        $kirdasah = new City;
        $kirdasah->name = "Kirdasah";
        $kirdasah->governerate_id = $giza->id;
        $kirdasah->save();

        $imbabah = new City;
        $imbabah->name = "Imbabah";
        $imbabah->governerate_id = $giza->id;
        $imbabah->save();

        
    }
}
