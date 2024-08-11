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
            <div class="col-md-6">
                <form action="{{ route('subcategory.update', $subcategory)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Име</label>
                        <input type="text" class="form-control" value="{{$subcategory->name}}" name='name'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Категория</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Снимка</label>
                        <input type="file" name="image" class="form-control">
                        <label class="text-warning">Маскимален размер: 100КВ</label> <br>
                        <label class="text-warning">Маскимална резолюция: 300х300 px</label>
                    </div>
                    <button type="submit" class="btn btn-dark">Запази</button>
                </form>
            </div>
            <div class="col-md-6">
                @if ($subcategory->image)
                    <img src="{{ asset($subcategory->image) }}" class="img-fluid img-mj-details" alt="Subcategory image">
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
