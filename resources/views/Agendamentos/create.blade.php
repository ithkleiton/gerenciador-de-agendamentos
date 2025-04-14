<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Agendamento</title>
</head>
<body>
    <h1>Novo Agendamento</h1>

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('agendamentos.store') }}" method="POST">
        @csrf
        <label>Nome: <input type="text" name="nome" value="{{ old('nome') }}"></label><br><br>
        <label>Email: <input type="email" name="email" value="{{ old('email') }}"></label><br><br>
        <label>Data: <input type="date" name="data" value="{{ old('data') }}"></label><br><br>
        <label>Hora: <input type="time" name="hora" value="{{ old('hora') }}"></label><br><br>

        <button type="submit">Salvar</button>
    </form>

    <br><a href="{{ route('agendamentos.index') }}">Voltar</a>
</body>
</html>
