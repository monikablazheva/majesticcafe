@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Детайли</h1>
                <div>
                    <dl class="row">
                        <dt class = "col-sm-2">
                            Име
                        </dt>
                        <dd class = "col-sm-10">
                            {{ $subcategory->name }}
                        </dd>
                        <dt class = "col-sm-2">
                            Категория
                        </dt>
                        <dd class = "col-sm-10">
                            {{ $subcategory->category->name }}
                        </dd>
                    </dl>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('subcategory.edit', $subcategory) }}" type="button" class="btn btn-dark">Промяна</a>
                    <form action="{{ route('subcategory.destroy', $subcategory) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Изтриване</button>
                    </form>
                </div>
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
