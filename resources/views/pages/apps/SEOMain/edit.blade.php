<x-default-layout>

    @section('title')
        Edit SEO
    @endsection

    <div class="d-flex flex-column flex-column-fluid">
        <div class="card shadow-sm w-50 m-auto">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit SEO</h5>
                <form class="d-flex flex-column align-items-start gap-4" action="{{route('seo.main.store')}}" method="post">
                    @method('PUT')
                    @include('pages.apps.SEOMain._form')
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
