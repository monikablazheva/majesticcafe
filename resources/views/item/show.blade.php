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
                            {{ $item->name }}
                        </dd>
                        <dt class = "col-sm-2">
                            Подкатегория
                        </dt>
                        <dd class = "col-sm-10">
                            {{ $item->subcategory->name }}
                        </dd>
                        <dt class = "col-sm-2">
                            Колечество
                        </dt>
                        <dd class = "col-sm-10">
                            {{ $item->quantity }}

                            @if($item->quantity_type->name == "грамове")
                                гр.
                            @elseif($item->quantity_type->name == "милилитри")
                                мл.
                            @elseif($item->quantity_type->name == "литър")
                                л.
                            @elseif($item->quantity_type->name == "брой")
                                бр.
                            @endif
                        </dd>
                        <dt class = "col-sm-2">
                            Цена
                        </dt>
                        <dd class = "col-sm-10">
                            {{ number_format($item->price, 2) }} лв.
                        </dd>
                        <dt class = "col-sm-2">
                            Описание
                        </dt>
                        <dd class = "col-sm-10">
                            {{ $item->description }}
                        </dd>
                    </dl>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('item.edit', $item) }}" type="button" class="btn btn-dark">Промяна</a>
                    <form action="{{ route('item.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Изтриване</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                @if ($item->image)
                    <img src="{{ asset($item->image) }}" class="img-fluid img-mj-details" alt="Item image">
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
