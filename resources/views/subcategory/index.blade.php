@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Подкатегории</h1>
        <div class="d-flex justify-content-end">
            <a type="button" href="{{ route('subcategory.create') }}" class="btn btn-dark">Добави подкатегория</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Име
                    </th>
                    <th>
                        Категория
                    </th>
                    <th>
                        Снимка
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td class="align-middle">
                            {{ $subcategory->name }}
                        </td>
                        <td class="align-middle">
                            {{ $subcategory->category->name }}
                        </td>
                        <td class="align-middle">
                            @if ($subcategory->image)
                                <img class="img-mj-idx" src="{{ asset($subcategory->image) }}" alt="Subcategory image">
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('subcategory.show', $subcategory) }}" class="btn btn-link text-dark"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Детайли">
                                <i class="fa-solid fa-circle-info fs-5"></i>
                            </a>
                            <a href="{{ route('subcategory.edit', $subcategory) }}" class="btn btn-link text-dark"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Промяна">
                                <i class="fa-solid fa-pen-to-square fs-5"></i>
                            </a>
                            <form action="{{ route('subcategory.destroy', $subcategory) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-dark"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Изтриване">
                                    <i class="fa-solid fa-trash fs-5"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
