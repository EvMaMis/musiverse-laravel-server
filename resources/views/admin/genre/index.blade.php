@extends('layouts.admin')

@section('main')
    <div class="h1">Жанры музыки</div>
    <a href="{{route('admin.genre.create')}}"><div class="btn btn-success">Добавить жанр</div></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="col-1">#</th>
            <th scope="col" class="col-6">Название жанра</th>
            <th scope="col" class="col-2">Количество произведений</th>
            <th scope="col" class="col-3 text-center" colspan="3">Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres as $key=>$genre)
        <tr class="align-middle">
            <th scope="row">{{$key+1}}</th>
            <td>{{$genre->title}}</td>
            <td>{{random_int(1,100)}}</td>
            <td class="col-1 text-center"><a href="{{route('admin.genre.show', $genre)}}"><i class="text-primary fas fa-eye"></i></a></td>
            <td class="col-1 text-center"><a href="{{route('admin.genre.edit', $genre)}}"><i class="text-success fas fa-pen"></i></a></td>
            <td class="col-1 text-center">
                <form action="{{route('admin.genre.destroy', $genre)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"><i class="text-danger fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
