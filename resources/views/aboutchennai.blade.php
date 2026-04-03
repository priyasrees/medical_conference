@extends('layouts.web')
@section('title_bar', 'About Chennai | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>About Chennai</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>About Chennai</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="vanue-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5>About Chennai</h5>
                    <div class="space18"></div>
                    <h2>Tourist Attractions
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="img1 reveal image-anime  text-center">
                            <div class="space60"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/marina-beach.png' }}" alt="Marina Beach" />
                        </div>
                        <div class="img1 reveal image-anime  text-center">
                            <div class="space30"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/kapaleeswarar-temple.png' }}"
                                alt="Kapaleeshwarar Temple" />
                        </div>
                        <div class="img1 reveal image-anime  text-center">
                            <div class="space30"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/vivekananda-house.png' }}"
                                alt="Vivekananda House" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="img1 reveal image-anime">
                            <div class="space10"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/santhome.png' }}" alt="Santhome Basilica" />
                        </div>
                        <div class="img1 reveal image-anime">
                            <div class="space30"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/george-fort.png' }}" alt="Fort St.George" />
                        </div>
                        <div class="img1 reveal image-anime">
                            <div class="space30"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/museum.png' }}" alt="Museum" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-container">
                    <section id="timeline" class="timeline-outer">
                        <div class="container" id="content">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <ul class="timeline">
                                        <li class="event" data-aos="fade-left" data-aos-duration="500">
                                            <h3>1. Marina Beach</h3>
                                            <p>
                                                One of the longest urban beaches in the world. Ideal for walks,
                                                local food, and sunrise views.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="600">
                                            <h3>2. Kapaleeshwarar Temple</h3>
                                            <p>
                                                A historic Dravidian-style temple dedicated to Lord Shiva, located
                                                in Mylapore.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="700">
                                            <h3>3. Santhome Basilica</h3>
                                            <p>A stunning Roman Catholic basilica built over the tomb of St. Thomas,
                                                one of the 12 apostles of Jesus.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="800">
                                            <h3>4. Fort St. George</h3>
                                            <p>A 17th-century fort, now housing the Tamil Nadu Legislative Assembly
                                                and a museum showcasing British artifacts.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="900">
                                            <h3>5. Government Museum (Egmore)</h3>
                                            <p>One of the oldest museums in India, famous for its archaeological and
                                                numismatic collections.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1000">
                                            <h3>6. Vivekananda House</h3>
                                            <p>A historic landmark where Swami Vivekananda stayed after his return
                                                from the West.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1100">
                                            <h3>7. DakshinaChitra Heritage Museum</h3>
                                            <p>A cultural village that preserves and displays South Indian heritage,
                                                crafts, and architecture.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1200">
                                            <h3> 8. Cholamandal Artists' Village</h3>
                                            <p> A community of artists with exhibitions of contemporary and
                                                traditional art.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1300">
                                            <h3>9. Arignar Anna Zoological Park (Vandalur Zoo)</h3>
                                            <p>A large zoo with diverse wildlife and safari options.</p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1400">
                                            <h3>10. Elliot’s Beach (Besant Nagar Beach)</h3>
                                            <p>A less crowded beach popular for relaxation and cafes nearby.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bloginner-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5>Near by Chennai</h5>
                    <div class="space18"></div>
                    <h2>Tourist Attractions
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="main-container">
                    <section id="timeline" class="timeline-outer">
                        <div class="container" id="content">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <ul class="timeline">
                                        <li class="event" data-aos="fade-left" data-aos-duration="500">
                                            <h3>1. Mahabalipuram <span>(60 km from
                                                Chennai)</span>
                                            </h3>
                                            <p>
                                                A UNESCO World Heritage Site known for rock-cut temples, shore
                                                temples, and ancient sculptures.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="600">
                                            <h3>2. Kanchipuram <span>(75 km from Chennai)</span></h3>
                                            <p>
                                                One of the seven sacred cities in Hinduism, famous for its ancient
                                                temples and silk sarees.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="700">
                                            <h3>3. Pondicherry <span>(150 km from Chennai)</span></h3>
                                            <p>A stunning Roman Catholic basilica built over the tomb of St. Thomas,
                                                one of the 12 apostles of Jesus.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="800">
                                            <h3>4. Pulicat Lake and Bird Sanctuary <span>(60 km from Chennai)</span>
                                            </h3>
                                            <p>A serene spot known for bird-watching, especially flamingos.</p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="900">
                                            <h3>5. Vellore <span>(140 km from Chennai)</span></h3>
                                            <p>Known for Vellore Fort, Jalakandeswarar Temple, and Christian Medical
                                                College.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1000">
                                            <h3>6. Thiruvannamalai <span>(200 km from Chennai)</span></h3>
                                            <p>Famous for the Arunachaleswarar Temple and spiritual retreats.</p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1100">
                                            <h3>7. Mudaliarkuppam Boat House <span>(92 km from Chennai)</span></h3>
                                            <p>A tranquil boating destination with options for kayaking and jet
                                                skiing.
                                            </p>
                                        </li>
                                        <li class="event" data-aos="fade-left" data-aos-duration="1200">
                                            <h3> 8. Covelong <span>(40 km from Chennai)</span></h3>
                                            <p> Known for water sports and surf schools.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="img1 reveal image-anime  text-center">
                            <div class="space60"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/mahabalipuram.png' }}" alt="Mahabalipuram" />
                        </div>
                        <div class="img1 reveal image-anime  text-center">
                            <div class="space30"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/kanchipuram.png' }}" alt="Kanchipuram" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="img1 reveal image-anime">
                            <div class="space10"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/pondicherry.png' }}" alt="Pondicherry" />
                        </div>
                        <div class="img1 reveal image-anime">
                            <div class="space30"></div>
                            <img src="{{ env('APP_URL').'public/asset/img/all-images/chennai/pulicat.png' }}" alt="Pulicat Lake" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6   m-auto">
                <div class="travelinfo text-center  ">
                    <img src="{{ env('APP_URL').'public/asset/img/all-images/team/jegadeesh.png' }}" width="130">
                    <div class="space15"></div>
                    <h3>Dr.L.Jagadeesh Marthandam</h3>
                    <div class="space10"></div>
                    <p><i>Tours and Travels Chairman</i> </p>
                    <div class="space10"></div>
                    <h4>93621 26991</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
@endsection