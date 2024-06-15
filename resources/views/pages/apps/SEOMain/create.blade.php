<x-default-layout>

    @section('title')
        Create SEO
    @endsection

    @section('breadcrumbs')
                {{ Breadcrumbs::render('seo_main.create') }}
    @endsection

    <div class="d-flex flex-column flex-column-fluid">
        <div class="card shadow-sm w-75 m-auto">
            <div class="card-body">
                <h5 class="card-title mb-4">Create SEO</h5>
                <form class="d-flex flex-column align-items-start gap-4" action="{{route('seo.main.store')}}" method="post">
                  @include('pages.apps.SEOMain._form')
                </form>
            </div>
        </div>
    </div>

</x-default-layout>
