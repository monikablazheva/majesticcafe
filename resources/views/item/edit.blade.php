@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Промяна</h1>
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
                <form action="{{ route('item.update', $item) }}" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Име</label>
                            <input type="text" class="form-control" value="{{ $item->name }}" name='name'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Категория</label>
                            <select name="subcategory_id" class="form-select" aria-label="Default select example">
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                        {{ $item->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Мерна единица на количеството</label>
                            <select name="quantity_type_id" class="form-select" aria-label="Default select example">
                                @foreach ($quantity_types as $quantity_type)
                                    <option value="{{ $quantity_type->id }}"
                                        {{ $item->quantity_type_id == $quantity_type->id ? 'selected' : '' }}>
                                        {{ $quantity_type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Количество</label>
                            <input type="number" class="form-control" value="{{ $item->quantity }}" name='quantity'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Цена</label>
                            <input type="number" step="0.01" class="form-control" value="{{ $item->price }}"
                                name='price'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Описание</label>
                            <input type="text" class="form-control" value="{{ $item->description }}" name='description'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Снимка</label>
                            <input type="file" name="image" class="form-control">
                            <label class="text-warning">Маскимален размер: 300КВ</label> <br>
                            <label class="text-warning">Маскимална резолюция: 900х900 px</label>
                        </div>
                    </div>
                    <div class="col-md-6">

                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" class="img-fluid img-mj-details"
                                alt="Item image">
                            <div>
                                <input type="checkbox" name="delete_photo" id="delete_photo"><label>&nbsp;Изтриване</label>
                                <label for="delete_photo" class="text-warning">Само за изтриване на вече прикачена снимка.
                                    Да не се избира при подмяна на предишна снимка с нова.</label>
                            </div>
                        @else
                            <p>Няма прикачена снимка</p>
                        @endif
                        <br><button type="submit" class="btn btn-dark">Запази</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
