@extends('layouts.app')


@section('content')
    <!-- Menu Section -->
    <section id="menu" class="menu section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Меню</h2>
            <p><span>Разгледайте нашето</span> <span class="description-title">Меню</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <ul class="nav nav-tabs d-flex justify-content-center" role="tablist">
                @foreach ($categoriesWithSubcat as $k => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $k === 0 ? 'active' : 'false' }}" id="{{ $category->id }}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{ $category->id }}" type="button" role="tab"
                            aria-controls="{{ $category->id }}" aria-selected="{{ $k === 0 ? 'true' : 'false' }}"
                            style="font-size: 1.2rem; ">{{ $category->name }}</button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($categoriesWithSubcat as $k => $category)
                    <div class="tab-pane fade {{ $k === 0 ? 'show active' : '' }}" id="{{ $category->id }}" role="tabpanel"
                        aria-labelledby="{{ $category->id }}-tab">
                        <div class="tab-header">
                        </div>
                        <div class="accordion accordion-flush" id="accordionExample">
                            @foreach ($category->subcategories as $k => $subcategory)
                                <div class="card menu-group subcategory-item" style="background-color: #f6ecdb;">
                                    <div class="card-header"
                                        style="padding: 0%; border-width: 0px;"
                                        id="heading{{ $k }}">

                                        <button class="accordion-button {{ $k !== 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $k }}"
                                            aria-expanded="{{ $k === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $k }}"
                                            style="font-size: 1.5rem; padding: 0.5rem; background-color: #f6ecdb;">
                                            @if ($subcategory->image)
                                                <img class="avatar avatar-64 rounded-circle shadowed-image"
                                                    src="{{ asset($subcategory->image) }}" style="margin-right: 15px;">
                                            @endif
                                            <h2 style="margin-bottom: 0%">{{ $subcategory->name }}</h2>

                                        </button>
                                    </div>
                                    <div id="collapse{{ $k }}"
                                        class="accordion-collapse collapse {{ $k === 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $k }}" {{-- data-bs-parent="#accordionExample" --}}>
                                        <div class="card-body">
                                            @foreach ($subcategory->items as $item)
                                                @if ($item->image)
                                                    <div class="menu-item"
                                                        style="border-radius: 0px; background-color: #f6ecdb;">
                                                        <img src="{{ asset($item->image) }}" width="150px" height="150px"
                                                            alt="Item Image">
                                                        <div class="menu-item-content">
                                                            <div class="menu-item-text">
                                                                <h5>{{ $item->name }}</h5>
                                                                <p style="margin-block-end:0%">
                                                                    @if ($item->description)
                                                                        {{ $item->description }}<br>
                                                                    @endif

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
                                                                </p>
                                                            </div>
                                                            <div class="menu-item-price">
                                                                {{ number_format($item->price, 2) }} лв.</div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="menu-item no-image"
                                                        style="border-radius: 0px; background-color: #f6ecdb;">
                                                        <div class="menu-item-content">
                                                            <div class="menu-item-text">
                                                                <h5>{{ $item->name }}</h5>
                                                                <p style="margin-block-end:0%">
                                                                    @if ($item->description)
                                                                        {{ $item->description }}
                                                                        <br>
                                                                    @endif
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
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <div class="menu-item-price">
                                                                    {{ number_format($item->price, 2) }} лв.
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section><!-- /Menu Section -->
@endsection

@push('scripts')
    @vite(['resources/js/custom.js'])
@endpush
