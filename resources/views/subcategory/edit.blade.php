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
                <form action="{{ route('subcategory.update', $subcategory) }}" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Име</label>
                            <input type="text" class="form-control" value="{{ $subcategory->name }}" name='name'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Категория</label>
                            <select name="category_id" class="form-select" aria-label="Default select example">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Снимка</label>
                            <input type="file" name="image" id="photo" class="form-control">
                            <label class="text-warning">Маскимален размер: 100КВ</label> <br>
                            <label class="text-warning">Маскимална резолюция: 300х300 px</label>
                        </div>
                    </div>
                    <div class="col-md-6">

                        @if ($subcategory->image)
                            <img src="{{ asset($subcategory->image) }}" class="img-fluid img-mj-details"
                                alt="Subcategory image">
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
