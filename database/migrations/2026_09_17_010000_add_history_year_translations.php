<?php

use App\Support\CmsText;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $years = [
            '1977', '1980', '1981', '1987', '1989', '1993', '1994', '1997', '2002',
            '2003', '2005', '2007', '2008', '2009', '2010', '2011', '2012', '2014',
            '2015', '2017', '2018', '2019', '2020', '2021-2024', '2023', '2024', '2025',
        ];

        foreach ($years as $year) {
            DB::table('site_translations')->updateOrInsert(
                ['key' => "history.{$year}.year"],
                [
                    'group' => 'Historia',
                    'label' => "Historia: año {$year}",
                    'text_es' => $year,
                    'text_en' => $year,
                    'is_multiline' => false,
                    'updated_at' => $now,
                    'created_at' => $now,
                ]
            );
        }

        CmsText::clearCache();
    }

    public function down(): void
    {
        DB::table('site_translations')
            ->where('key', 'like', 'history.%.year')
            ->delete();

        CmsText::clearCache();
    }
};
