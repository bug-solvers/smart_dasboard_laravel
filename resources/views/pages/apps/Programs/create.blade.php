<x-default-layout>

    @section('title')
        Create Program
    @endsection

    @section('breadcrumbs')
                {{ Breadcrumbs::render('coupon.create') }}
    @endsection

    <div class="d-flex flex-column flex-column-fluid">
        <div class="card shadow-sm w-75 m-auto">
            <div class="card-body">
                <h5 class="card-title mb-4">Create Program</h5>
                <form class="d-flex flex-column align-items-start gap-4" action="{{route('coupon.store')}}" method="post">
                  @include('pages.apps.programs._form')
                </form>
            </div>
        </div>
    </div>

</x-default-layout>
