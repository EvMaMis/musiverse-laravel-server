@extends('layouts.admin')

@section('main')
    <form action="{{route('admin.tag.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-4">
                <label for="title" class="form-check-label mb-2">Введите название тега</label>
                <input id="title" type="text" placeholder="Название тега" class="form-control mb-3" name="title" value="{{old('title')}}">
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="Добавить тег">
    </form>
@endsection
