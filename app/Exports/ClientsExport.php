<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ClientsExport implements FromQuery
{
    use Exportable;

    public function view()
    {
        return view('exports.clients', [
            'clients' => Client::get()
        ]);
    }

    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        return Client::with('cityy');
    }
}
