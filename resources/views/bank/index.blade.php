@extends('templates.app')

@section('css')
    <style type="text/css">
        .ativo {
            color: #060;
            font-weight: bold;
        }

        .inativo {
            color: #F00;
            font-weight: bold;
        }
    </style>
@stop

@section('content')
    <h1 class="text-center">Meus Clientes</h1>
    <hr/>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Banco</th>
                <th class="text-center">Nome</th>
                <th class="text-center">ID Conta</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Status</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse($clients as $client)
                <tr>
                    <td class="text-center">{{ $client->id }}</td>
                    <td class="text-center">{{ $client->bank->name }}</td>
                    <td class="text-center">{{ $client->name }}</td>
                    <td class="text-center">{{ $client->account->id }}</td>
                    <td class="text-center">{{ $client->account->type }}</td>
                    <td class="text-center">
                        @if($client->account->type)
                            <span class="ativo">Ativo</span>
                        @else
                            <span class="inativo">Inativo</span>
                        @endif
                    </td>
                    <td class="text-center {{ ($client->account->balance >= 0?'ativo':'inativo') }}">R$ {{ number_format($client->account->balance, 2, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger btn-sm btn-del" data-id="{{ $client->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Não Há Dados</td>
                </tr>
            @endforelse
        </tbody>

        <tfoot>
        <tr>
            <td colspan="8">{{ $clients->links() }}</td>
        </tr>
        </tfoot>
    </table>

    <a href="{{ route('bank.export') }}" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o"></i> Export</a>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $('.btn-del').on('click', function (e) {
        e.preventDefault();
        if (confirm('Deseja deletar?')) {
            $.ajax({
                contentType: 'application/x-www-form-urlencoded',
                method: 'DELETE',
                url: '/bank/delete/' + $(this).data('id'),
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                timeout: 0,
                success: function (response) {
                    location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    });
</script>
@stop
