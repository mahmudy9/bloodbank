<?php

use Illuminate\Database\Seeder;
use App\Governerate;

class GovernerateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dakahliya = new Governerate;
        $dakahliya->name = "Dakahliya";
        $dakahliya->save();

        $cairo = new Governerate;
        $cairo->name = "Cairo";
        $cairo->save();

        $gharbiya = new Governerate;
        $gharbiya->name = "Gharbiya";
        $gharbiya->save();
        
        $giza = new Governerate;
        $giza->name = "Giza";
        $giza->save();
    }
}
