<?php

namespace App\Imports;

use App\Models\AdminKeyword;
use App\Models\Local\CrawlKeyword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

/**
 * Class KeywordsImport
 *
 * @package Modules\Admin\Imports
 */
class CrawlKeywordsImport implements ToCollection, WithChunkReading
{

    /**
     * @param \Illuminate\Support\Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key) {
                $keyword = CrawlKeyword::where('name', $row[1])->first();
                if (!$keyword) {
                    CrawlKeyword::create([
                        'name' => $row[1],
                        'status' => config('constant.crawl_keyword.status.new'),
                    ]);
                }
            }
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
