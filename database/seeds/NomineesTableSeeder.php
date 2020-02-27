<?php

use App\Models\Nominee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NomineesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared('SET FOREIGN_KEY_CHECKS=0');
        Nominee::query()->truncate();
        Nominee::query()->insert([
            ['name'=>'EDITH ANIMAH AMANKWAA', 'category_id'=>10],
            ['name'=>'BELINDA AFFUL', 'category_id'=>10],
            ['name'=>'DONKOR GLORIA ATTA', 'category_id'=>10],

            ['name'=>'AMOSAH ENOCK KAKU', 'category_id'=>9],
            ['name'=>'ASAFO ADJEI BENJAMIN APPIAH', 'category_id'=>9],
            ['name'=>'KOOMSON DAVID', 'category_id'=>9],

            ['name'=>'CUDJOE FELIX JEREMIAH (CJ)', 'category_id'=>19],
            ['name'=>'OKYERE AMPONSAH AKWASI', 'category_id'=>19],
            ['name'=>'SAMUEL TETTEH', 'category_id'=>19],

            ['name'=>'EYISON COSBY ', 'category_id'=>3],
            ['name'=>'CHIKWERE CHUKWUBUKA BENNETT', 'category_id'=>3],
            ['name'=>'AFFAM ASAMOAH ERNEST', 'category_id'=>3],

            ['name'=>'RAYMOND KOJO KYEI', 'category_id'=>13],
            ['name'=>'BAAFI EUGENE NKRUMAH', 'category_id'=>13],
            ['name'=>'ADU JERONE', 'category_id'=>13],

            ['name'=>'SUBAN RHODALINE ', 'category_id'=>14],
            ['name'=>'INNES EWURAKUA ANDREA', 'category_id'=>14],
            ['name'=>'MAAME ABA KWEGYIR ABAIDOO', 'category_id'=>14],

            ['name'=>'KUNKAH EUNICE & OCRAN REXFORD EKOW', 'category_id'=>16],
            ['name'=>'MENSAH CHRISTINA AMA & MENSAH EMMANUEL KOJO', 'category_id'=>16],

            ['name'=>'JOSHUA WHAJAH & JOSIAH WHAJAH', 'category_id'=>11],
            ['name'=>'AYI - ANNUM  & ABAKAH MENSAH', 'category_id'=>11],
            ['name'=>'ASANTE AMOS  & FREDRICK SAGRAZA', 'category_id'=>11],

            ['name'=>'ANDOH TAWIAH EMMANUEL', 'category_id'=>12],
            ['name'=>'ABROWAH EMMANUEL ', 'category_id'=>12],
            ['name'=>'ENNIN KERON', 'category_id'=>12],

            ['name'=>'RICHMOND KO-JO', 'category_id'=>2],
            ['name'=>'YAW ISAAC ANGAH', 'category_id'=>2],
            ['name'=>'TANO OLIVE DESIRE', 'category_id'=>2],

            ['name'=>'DENE AHMADE ', 'category_id'=>15],
            ['name'=>'VERA KORKOR DADZIE', 'category_id'=>15],
            ['name'=>'JUDITH ADOMA MARFO', 'category_id'=>15],

            ['name'=>'ALFRED YEBOAH', 'category_id'=>7],
            ['name'=>'ARCHER CHARLSE', 'category_id'=>7],
            ['name'=>'CUDJOE FELIX JEREMIAH ( CJ )', 'category_id'=>7],

            ['name'=>'TANO OLIVE DESIRE ', 'category_id'=>8],
            ['name'=>'CHIKWERE CHUKWUEBUKA BENNETT', 'category_id'=>8],
            ['name'=>'IYKE OGINAH GOLDEN', 'category_id'=>8],

            ['name'=>'BENEDICT ERNEST DONKOR', 'category_id'=>1],
            ['name'=>'LOUIS SMITH NANABA ACHEAMPONG', 'category_id'=>1],
            ['name'=>'JOSSIAH WHAJAH', 'category_id'=>1],

            ['name'=>'YEBOAH ALFRED ', 'category_id'=>6],
            ['name'=>'NAWSON ALFRED', 'category_id'=>6],
            ['name'=>'MENSAH ANNAN MICHAEL', 'category_id'=>6],

            ['name'=>'ANANE AGYEI NICHOLINA', 'category_id'=>5],
            ['name'=>'FRANCILIAN BUCKEREL QUIST', 'category_id'=>5],
            ['name'=>'ANNA WILMA BREW', 'category_id'=>5],

            ['name'=>'NICHOLSON EBENEZER ', 'category_id'=>4],
            ['name'=>'FRIMPONG AKWASI ANTWI', 'category_id'=>4],
            ['name'=>'DANIEL ADDI YIRENKYI', 'category_id'=>4],

            ['name'=>'ASANTE NANA ADWOA KONADU', 'category_id'=>18],
            ['name'=>'FORSON RICHLOVE', 'category_id'=>18],
            ['name'=>'MABEL OSEI KUFFOUR ( MISS V )', 'category_id'=>18],

            ['name'=>'ARCHER CHARLSE', 'category_id'=>17],
            ['name'=>'ISAAC YAW ANGAH', 'category_id'=>17],
            ['name'=>'DOMINIC KALEFE', 'category_id'=>18],
        ]);
        DB::unprepared('SET FOREIGN_KEY_CHECKS=1');
    }
}
