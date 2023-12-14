<div class="rs-breadcrumbs">
    <div class="breadcrumbs-wrap">
        <img src="{{ asset('temp/assets/images/breadcrumbs/inner11.jpg') }}" alt="Breadcrumbs Image">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="breadcrumbs-text">
                    <h1 class="breadcrumbs-title mb-17">{{ $current_page }}</h1>
                    <div class="categories">
                        <ul>
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="active">{{ $current_page }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>