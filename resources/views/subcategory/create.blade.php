@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-6">
                <h1>Нова подкатегория</h1>
                <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Име</label>
                        <input type="text" class="form-control" name='name'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Категория</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Снимка</label>
                        <input type="file" name="image" class="form-control">
                        <label class="text-warning">Маскимален размер: 100КВ</label> <br>
                        <label class="text-warning">Маскимална резолюция: 300х300 px</label>
                    </div>
                    <button type="submit" class="btn btn-dark">Добави</button>
                </form>
            </div>
        </div>
    </div>
@endsection
