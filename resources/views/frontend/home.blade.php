@extends('layouts.app')
@push('title')
{{ $CMS['home_title'] ?? '' }}
@endpush
@push('meta')
{{ $CMS['home_meta'] ?? '' }}
@endpush
@section('content_box')
<main>
    <div class="marketing">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('/storage/cms/' . $CMS['home_image']) }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/storage/cms/' . $CMS['home_image']) }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/storage/cms/' . $CMS['home_image']) }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-12 mb-5">
                <h2>Bất động sản theo loại hình</h2>
            </div>
            <div id="cat_cara" class="carousel">
              
            </div>
        </div><!-- /.row -->

        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider">
        <div class="row featurette mb-3">
            <div class="col-12">
                <h1>Newly Added</h1>
            </div>
        </div>
        <div class="row featurette">
            @forelse ($newlyAdded as $item)
            <div class="col-4 mb-4">
                <div class="card mx-auto shadow">
                    <a href="{{ route('show_pro', $item->title_slug) }}">
                        <img height="300px" class="card-img-top" src="{{ asset('/storage/property/' . $item->image) }}"
                            alt="{{ $item->title }}">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title mb-1">{{ $item->title }}</h4>
                        <p class="card-text mb-1">
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('show_purpose', $item->purpose) }}">
                                {{ ucfirst($item->purpose) }}
                            </a>
                            <a class="btn btn-sm btn-outline-secondary"
                                href="{{ route('show_category', $item->Cate->slug_name) }}">
                                {{ $item->Cate->name }}
                            </a>
                            <a class="btn btn-sm btn-outline-dark"
                                href="{{ route('show_city', $item->City->slug_city) }}">
                                {{ $item->City->city }}
                            </a>
                        </p>
                        <p class="card-text">
                            <i class="fas fa-bed"></i> {{ $item->rooms }}
                            <i class="fas fa-shower"></i> {{ $item->bathrooms }}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            {{-- <div class="card mx-auto shadow">
                        <div class="card mx-auto shadow"> --}}
            <h4>Nothing new added recently...</h4>
            {{-- </div>
                    </div> --}}
            @endforelse
        </div>
        @forelse ($catedata as $key => $cate)
        @if (sizeof($cate->Pro) > 0)
        <hr class="featurette-divider">
        <div class="row featurette mb-3">
            <div class="col-12">
                <a class="text-decoration-none text-secondary" href="">
                    <h1 class="">
                        {{ $cate->name }}
                    </h1>
                </a>
            </div>
        </div>
        <div class="row featurette">
            @foreach ($cate->Pro as $item)
            <div class="col-4 mb-4">
                <div class="card mx-auto shadow">
                    <a href="{{ route('show_pro', $item->title_slug) }}">
                        <img height="300px" class="card-img-top" src="{{ asset('/storage/property/' . $item->image) }}"
                            alt="{{ $item->title }}">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title mb-1">{{ $item->title }}</h4>
                        <p class="card-text mb-1">
                            <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('show_purpose', $item->purpose) }}">
                                {{ ucfirst($item->purpose) }}
                            </a>
                            <a class="btn btn-sm btn-outline-secondary"
                                href="{{ route('show_category', $item->Cate->slug_name) }}">
                                {{ $item->Cate->name }}
                            </a>
                            <a class="btn btn-sm btn-outline-dark"
                                href="{{ route('show_city', $item->City->slug_city) }}">
                                {{ $item->City->city }}
                            </a>
                        </p>
                        <p class="card-text">
                            <i class="fas fa-bed"></i> {{ $item->rooms }}
                            <i class="fas fa-shower"></i> {{ $item->bathrooms }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @empty
        @endforelse

        {{-- <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                            mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                        exciting prose here.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                            dy=".3em">500x500</text>
                    </svg>

                </div>
            </div> --}}

        {{-- <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                            mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                        exciting prose here.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                            dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for
                            yourself.</span></h2>
                    <p class="lead">Another featurette? Of course. More placeholder content here to give you an
                        idea of how this layout would work with some actual real-world content in place.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"https://getbootstrap.com/docs/4.0/components/badge/
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                            dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again,
                        not really intended to be actually read, simply here to give you a better view of what this would
                        look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                        height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                            dy=".3em">500x500</text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider"> --}}

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->
    </div>
    </div>
</main>
@endsection
@section('scripts')
<script>
< script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity = "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin = "anonymous" >
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
$(document).ready(function() {
const myCarousel = new Carousel(document.querySelector("#cat_cara"), {});
// $(document).('.carousal__button').addClass(' text-white shadow-lg');
});
</script>
@endsection