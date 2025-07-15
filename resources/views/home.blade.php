@extends('layouts.app')

@section('content')
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}

    <section id="hero" class="hero section light-background">

        <div class="container">
            <div class="row gy-4 justify-content-center p-3">
                <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Разгледайте<br>нашето меню</h1>
                    <p data-aos="fade-up" data-aos-delay="100">Перфектната комбинация от вкусни ястия и освежаващи напитки</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('menu') }}" class="btn-get-started">Меню</a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="assets/img/hero-salad.webp" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->


    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>За нас<br></h2>
            <p><span>Научете повече</span> <span class="description-title">за нас</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <img src="assets/img/majestic-about.jpg" class="img-fluid mb-4" alt="">
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Добре дошли в Majestic - BAR & Dinner, където всеки момент се превръща в удоволствие! От ранна
                            закуска до
                            късна вечеря, ние предлагаме вкусутии, което ще задоволят всеки вкус.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> <span>При нас ще се насладите на топло кафе,
                                    приготвено с любов.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Освежете се с нашите домашно приготвени
                                    лимонади, фрешове и шейкове, направени от пресни плодове, които ще ви заредят с енергия
                                    и
                                    свежест.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>За сладко изкушение, опитайте нашите пухкави
                                    гофрети, мекички палачинки или пък здравословни закуски, сервирани с разнообразие от
                                    топинги и добавки, които ще ви
                                    накарат да се усмихнете.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Не пропускайте и нашите авторски коктейли,
                                    създадени с майсторство и страст, за да ви предложат неповторимо изживяване.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Започнете и завършете деня си с неустоимите ни
                                    сцециалитети
                                    - здравословно приготвени ястия и свежи салати, идеални за спокоен обяд и весела вечер с
                                    приятели или семейство.</span></li>
                        </ul> 

                        <div class="book-a-table">
                            <h3>Запазете своята маса</h3>
                            <p>0887 909 707</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row gy-4 mt-1">

                    <div class="col-lg-7">
                        
                            <img src="assets/img/dinner.jpeg" class="img-fluid" alt="">
                        
                    </div>
                    <div class="col-lg-5">
                        
                            <img src="assets/img/cafe.jpg" class="img-fluid" alt="">
                            <p class="p-2 mt-2">
                                Ние се грижим за вашето удобство и доброто ви настроение, като ви предлагаме уютна атмосфера и
                                приятелско обслужване. Създайте си вкусни и незабравими моменти с нас!
                            </p>
                        
                    </div>
                    {{-- <div class="col-lg-4">
                        <p>
                            Ние се грижим за вашето удобство и доброто ви настроение, като ви предлагаме уютна атмосфера и
                            приятелско обслужване. Създайте си вкусни и незабравими моменти с нас!
                        </p>
                    </div> --}}
            </div>

        </div>

    </section><!-- /About Section -->

    {{-- <!-- Gallery Section -->
    <section id="gallery" class="gallery section light-background">

  
    </section><!-- /Gallery Section --> --}}

    <!-- Contact Section -->
    <section id="contact" class="pt-0 contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Контакти</h2>
            <p><span>Имате въпроси?</span> <span class="description-title">Свържете се с нас</span></p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1041.1723101680718!2d24.735063108439014!3d42.12785339542695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14acd16ed6845427%3A0x22c6afd311e24bf!2z0JzQsNC00LbQtdGB0YLQuNC6INC60LDRhNC1!5e0!3m2!1sbg!2sbg!4v1722619485855!5m2!1sbg!2sbg"
                    frameborder="0" allowfullscreen=""></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Адрес</h3>
                            <p>ул. „Одеса“ 8, Южен, Пловдив</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Телефон</h3>
                            <p>0887 909 707</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Имейл</h3>
                            <p>contact@majesticcafe.eu</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                        <i class="icon bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3>Работно време<br></h3>
                            <p><strong>пон - пет:</strong> 08:00ч. - 23:00ч. </br>
                                <strong>съб - нед:</strong> 10:00ч. - 23:00ч.
                            </p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="accordion pt-3" id="accordionEu">                
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Програма &nbsp<strong> „Конкурентоспособност и иновации в предприятията"</strong> 
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionEu">
                        <div class="accordion-body">
                           <div class="row">
                                <div class="col-4">
                                    <img src="assets/img/ssss1.jpg" class="img-fluid p-3" alt="" width="300" height="500">
                                </div>
                                <div class="col-4"></div>                              
                                <div class="col-4">
                                    <img src="assets/img/sss2.png" class="img-fluid p-1" alt="" width="300" height="400">
                                </div>
                            </div>                                                      
                            <strong>На 02.07.2025 г. Маджестик Клуб ООД стартира изпълнението на проект „Подкрепа за семейно предприятие за подобряване на
                            производствения капацитет на Маджестик Клуб ООД“, административен договор за безвъзмездна финансова помощ №
                            BG16RFPR001-1.004-0481-C01.
                            Основна цел на проекта е да насърчи инвестициите за подобряване на производствения капацитет, оптимизиране на бизнес
                            процесите и постигане на пазарна устойчивост семейното предприятие, функциониращо при условия на силно динамична
                            икономическа и конкурентна пазарна среда.
                            Проекта предвижда извършване на инвестиции в дълготрайни материални и нематериални активи - Електрически парен
                            конвектомат и система/ модул за управление на складовото стопанство, които ще увеличат предлагания асортимент на
                            заведението, ще въведе устойчиви кръгови модели и ще доведат до оптимизиране на процесите по доставката на суровини,
                            начините за приготвяне на разнообразна и здравословна храна, гарантиращи разнообразие и качество.
                            Проекта е с продължителност 12 месеца, и е финансиран по процедура BG16RFPR001-1.004 “ Подкрепа за семейните
                            предприятия, предприятията от творческите индустрии и занаятите” на Програма „Конкурентоспособност и иновации в
                            предприятията" 2021-2027.
                            
                            Този документ/публикация е създаден с финансовата подкрепа на Европейския съюз. Цялата отговорност за съдържанието на
                            документа се носи от Маджестик Клуб ООД и при никакви обстоятелства не може да се приема, че този документ отразява
                            официалното становище на Европейския съюз и Министерство на иновациите и растежа. </strong> 

                        </div>
                    </div>
                </div>                
            </div>


        </div>

    </section><!-- /Contact Section -->
@endsection
