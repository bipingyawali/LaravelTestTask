<?php

namespace App\Imports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class CandidateImport implements ToModel, WithChunkReading, WithBatchInserts, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;
    /**
     * @param array $rows
     */
    public function model(array $rows)
    {
        Candidate::create([
            'first_name' => $rows[1],
            'last_name' => $rows[2],
            'email' => $rows[3],
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
            '*.1' => ['required'],
            '*.2' => ['required'],
            '*.3' => ['required'],
        ];
    }
}
