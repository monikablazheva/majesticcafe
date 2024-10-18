@extends('layouts.app')


@section('content')
    {{-- <div  id="popupOverlay">

    <div  id="popup">

        <span  id="closePopup">&times;</span>

        <div class="ad-container">
            <div class="ad-content">
              <h1 class="ad-heading">Visit Our Special Events</h1>
              <p class="ad-text">Join us for unforgettable dining experiences with live music, seasonal menus, and more.</p>
              <a href="#events" class="ad-button">Explore Events</a>
            </div>
          </div>

    </div>

</div> --}}

    {{-- <div id="popupOverlay">
        <div id="popup">
            <span id="closePopup">&times;</span>

            <div class="popup-image-container">
                <img src="assets/img/events-2.webp" alt="Restaurant Event" class="popup-image">
            </div>

            <div class="ad-container">
                <div class="ad-content">
                    <h1 class="ad-heading">Куиз вечери и турнири</h1>
                    <p class="ad-text">Разгледайте събитията ни на нашата Facebook страница</p>
                    <a id="submitButton" href="https://www.facebook.com/majesticcafe2018/events" target="_blank"
                        rel="noopener noreferrer" class="ad-button">Събития</a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Menu Section -->
    <section id="menu" class="p-0 menu section "{{--  style="background-image:url('assets/img/cool-background.png')" --}}>
        <!-- Section Title -->

        <div class="container section-title" data-aos="fade-up">
            <h2>Меню</h2>
            <h1><span>Разгледайте нашето</span> <span class="description-title">меню</span></h1>
        </div><!-- End Section Title -->

        <div class="container">

            {{-- <ul class="nav nav-tabs d-flex justify-content-center sticky-tabs" role="tablist"> --}}
            <ul class="nav nav-tabs d-flex justify-content-center pb-2" role="tablist">
                @foreach ($categoriesWithSubcat as $k => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $k === 0 ? 'active' : 'false' }}" id="{{ $category->id }}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{ $category->id }}" type="button" role="tab"
                            aria-controls="{{ $category->id }}" aria-selected="{{ $k === 0 ? 'true' : 'false' }}"
                            style="font-weight: 550;">
                            <div class="cat-icon-container">
                                @if ($k == 0)
                                    <i class="fa-solid fa-stroopwafel"></i>
                                @elseif($k == 1)
                                    <i class="fas fa-mug-hot"></i>
                                @elseif($k == 2)
                                    <i class="fas fa-cocktail"></i>
                                @elseif($k == 3)
                                    <i class="fa-solid fa-utensils"></i>
                                @endif
                                <div class="pt-1" style="font-size: 16px; font-family: Sofia Sans Condensed, sans-serif;">
                                    {{ $category->name }}</div>
                            </div>
                        </button>
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
                                    <div class="card-header" style="padding: 0%; border-width: 0px;"
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
