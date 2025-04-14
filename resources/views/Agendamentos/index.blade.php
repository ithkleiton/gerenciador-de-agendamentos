<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos</title>
</head>
<body>
    <h1>Lista de Agendamentos</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('agendamentos.create') }}">Novo Agendamento</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->nome }}</td>
                    <td>{{ $agendamento->email }}</td>
                    <td>{{ $agendamento->data }}</td>
                    <td>{{ $agendamento->hora }}</td>
                    <td>
                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}">Editar</a> |
                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Nenhum agendamento encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
