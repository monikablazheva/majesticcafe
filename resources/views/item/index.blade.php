@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Артикули</h1>

        <form action="{{ route('items.search') }}" method="GET" class="d-flex flex-row align-items-center flex-wrap pt-3">
            <input type="text" name="search" placeholder="Търси по име" class="form-control w-25">
            <button type="submit" class="btn btn-outline-success">Търси</button>
        </form>

        <div class="d-flex justify-content-end">
            <a type="button" href="{{ route('item.create') }}" class="btn btn-dark">Добави артикул</a>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Име
                    </th>
                    <th>
                        Подкатегория
                    </th>
                    <th>
                        Количество
                    </th>
                    <th>
                        Цена
                    </th>
                    <th>
                        Описание
                    </th>
                    <th>
                        Снимка
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="align-middle" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ $item->name }}">
                            {{ Illuminate\Support\Str::limit($item->name, 20, $end = '...') }}
                        </td>
                        <td class="align-middle">
                            {{ $item->subcategory->name }}
                        </td>
                        <td class="align-middle">
                            {{ $item->quantity }}

                            @if ($item->quantity_type->name == 'грамове')
                                гр.
                            @elseif($item->quantity_type->name == 'милилитри')
                                мл.
                            @elseif($item->quantity_type->name == 'литър')
                                л.
                            @elseif($item->quantity_type->name == 'брой')
                                бр.
                            @endif
                        </td>
                        <td class="align-middle">
                            {{ number_format($item->price, 2) }} лв.
                        </td>
                        <td class="align-middle">
                            {{ $item->description }}
                        </td>
                        <td class="align-middle">
                            @if ($item->image)
                                <img class="img-mj-idx" src="{{ asset($item->image) }}" alt="Item image">
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('item.show', $item) }}" class="btn btn-link text-dark"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Детайли">
                                <i class="fa-solid fa-circle-info fs-5"></i>
                            </a>
                            <a href="{{ route('item.edit', $item) }}" class="btn btn-link text-dark"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Промяна">
                                <i class="fa-solid fa-pen-to-square fs-5"></i>
                            </a>
                            <form action="{{ route('item.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-dark" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Изтриване">
                                    <i class="fa-solid fa-trash fs-5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $items->links('pagination::bootstrap-5') }}

    </div>
@endsection
