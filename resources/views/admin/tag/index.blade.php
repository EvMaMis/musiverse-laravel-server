@extends('layouts.admin')

@section('main')
    <div class="h1">Теги музыки</div>
    <a href="{{route('admin.tag.create')}}"><div class="btn btn-success">Добавить тег</div></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="col-1">#</th>
            <th scope="col" class="col-6">Название тега</th>
            <th scope="col" class="col-2">Количество произведений</th>
            <th scope="col" class="col-3 text-center" colspan="3">Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $key=>$tag)
        <tr class="align-middle">
            <th scope="row">{{$key+1}}</th>
            <td>{{$tag->title}}</td>
            <td>{{random_int(1,100)}}</td>
            <td class="col-1 text-center"><a href="{{route('admin.tag.show', $tag)}}"><i class="text-primary fas fa-eye"></i></a></td>
            <td class="col-1 text-center"><a href="{{route('admin.tag.edit', $tag)}}"><i class="text-success fas fa-pen"></i></a></td>
            <td class="col-1 text-center">
                <form action="{{route('admin.tag.destroy', $tag)}}" method="POST">
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
