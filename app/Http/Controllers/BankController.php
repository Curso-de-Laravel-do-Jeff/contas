<?php

namespace App\Http\Controllers;

use App\Client;
use App\Exports\ClientsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class BankController extends Controller
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $clients = $this->client->with(['bank', 'account'])->paginate();

        return view('bank.index', with([
            'clients' => $clients
        ]));
    }

    public function delete($id)
    {
        $this->client->destroy($id);
    }

    public function export()
    {
        return \Excel::download(new ClientsExport(), 'clients.xlsx');
    }
}
