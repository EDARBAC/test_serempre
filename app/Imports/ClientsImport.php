<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ClientsImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name' => $row['name'],
            'city' => $row['city']
        ]);
    }

    public function chunkSize()
    {
        return 1000;
    }
}
