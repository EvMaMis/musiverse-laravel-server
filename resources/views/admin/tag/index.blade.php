@extends('layouts.admin')

@section('main')
    <div class="h1">Теги музыки</div>
    @canany(['Add', 'Suggest'])
        <a href="{{route('admin.tag.create')}}">
            <div class="btn btn-success">Добавить тег</div>
        </a>
    @endcanany
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
                <td>{{$tag->songs_count}}</td>
                <td class="col-1 text-center"><a href="{{route('admin.tag.show', $tag)}}"><i
                            class="text-primary fas fa-eye"></i></a></td>
                @can('Edit')
                    <td class="col-1 text-center"><a href="{{route('admin.tag.edit', $tag)}}"><i
                                class="text-success fas fa-pen"></i></a></td>
                @endcan
                @can('Delete')
                    <td class="col-1 text-center">
                        <form action="{{route('admin.tag.destroy', $tag)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="text-danger fas fa-trash"></i></button>
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
