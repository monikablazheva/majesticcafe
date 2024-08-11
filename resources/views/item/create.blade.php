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
                <h1>Нов артикул</h1>
                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Име</label>
                        <input type="text" class="form-control" name='name'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Подкатегория</label>
                        <select name="subcategory_id" class="form-select" aria-label="Default select example">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Мерна единица на количеството</label>
                        <select name="quantity_type_id" class="form-select" aria-label="Default select example">
                            @foreach ($quantity_types as $quantity_type)
                                <option value="{{ $quantity_type->id }}">{{ $quantity_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Количество</label>
                        <input type="number" class="form-control" name='quantity'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Цена</label>
                        <input type="number" step="0.01" class="form-control" name='price'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <input type="text" class="form-control" name='description'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Снимка</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark">Добави</button>
                </form>
            </div>
        </div>
    </div>
@endsection
