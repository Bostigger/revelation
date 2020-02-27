<?php

use App\Models\KtResident;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KtResidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $kt_residents = KtResident::all('id')->all();
        try {
            DB::beginTransaction();
            foreach ($kt_residents as $kt_resident) {
                $findResident = KtResident::findOrFail($kt_resident['id']);
                $findResident->code = strtoupper(Str::random(6));
                $findResident->save();
            }
            DB::commit();
        }
        catch (Exception $e) {
            DB::rollBack();
        }

    }
}
