<?php

namespace App\Imports;

use App\Models\Job;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class JobImport implements ToModel, WithChunkReading, WithBatchInserts, WithValidation
{
    use Importable;
    /**
     * @param array $row
     */
    public function model(array $row)
    {
        Job::create([
            'candidate_id' => $row[1],
            'job_title' => $row[2],
            'company_name' => $row[3],
            'start_date' => $row[4],
            'end_date' => $row[5],
        ]);
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        return [
            '*.1' => ['required','int', 'exists:candidates,id'],
            '*.2' => ['required'],
            '*.3' => ['required'],
            '*.4' => ['required'],
            '*.5' => ['required'],
        ];
    }
}
