<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Agendamento</title>
</head>
<body>
    <h1>Editar Agendamento</h1>

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome: <input type="text" name="nome" value="{{ $agendamento->nome }}"></label><br><br>
        <label>Email: <input type="email" name="email" value="{{ $agendamento->email }}"></label><br><br>
        <label>Data: <input type="date" name="data" value="{{ $agendamento->data }}"></label><br><br>
        <label>Hora: <input type="time" name="hora" value="{{ $agendamento->hora }}"></label><br><br>

        <button type="submit">Atualizar</button>
    </form>

    <br><a href="{{ route('agendamentos.index') }}">Voltar</a>
</body>
</html>
