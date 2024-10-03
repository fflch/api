@extends('layouts.app')  

@section('content')  
    <h1>Lista de Pós-Doutorados</h1>  

    <table>  
        <thead>  
            <tr>  
                <th>ID</th>  
                <th>Nome do Pesquisador</th>  
                <th>Departamento</th>  
                <th>Ações</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($posDocs as $posDoc)  
                <tr>  
                    <td>{{ $posDoc->id }}</td>  
                    <td>{{ $posDoc->pesquisador->nome }}</td>  
                    <td>{{ $posDoc->departamento }}</td>  
                    <td>  
                        <a href="{{ route('posdocs.show', $posDoc->id) }}">Ver</a>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  

    {{ $posDocs->links() }} <!-- Para links de paginação -->  
@endsection