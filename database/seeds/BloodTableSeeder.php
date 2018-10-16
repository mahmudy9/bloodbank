<?php

use Illuminate\Database\Seeder;
use App\Blood;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oplus = new Blood;
        $oplus->type = "O+";
        $oplus->save();

        $ominus = new Blood;
        $ominus->type = "O-";
        $ominus->save();

        $aplus = new Blood;
        $aplus->type = "A+";
        $aplus->save();

        $aminus = new Blood;
        $aminus->type = "A-";
        $aminus->save();

        $bplus = new Blood;
        $bplus->type = "B+";
        $bplus->save();

        $bminus = new Blood;
        $bminus->type = "B-";
        $bminus->save();

        $abplus = new Blood;
        $abplus->type = "AB+";
        $abplus->save();
        
        $abminus = new Blood;
        $abminus->type = "AB-";
        $abminus->save();
    }
}
