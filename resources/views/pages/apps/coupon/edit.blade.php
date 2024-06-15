<x-default-layout>

    @section('title')
        Create coupon
    @endsection

    @section('breadcrumbs')
{{--        {{ Breadcrumbs::render('coupon.edit') }}--}}
    @endsection
    <div class="d-flex flex-column flex-column-fluid">
        <div class="card shadow-sm w-50 m-auto">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit Coupon</h5>
                <form class="d-flex flex-column align-items-start gap-4" action="{{route('coupon.update',$coupon)}}" method="post">
                    @method('PUT')
                    @include('pages.apps.coupon._form')
                </form>
            </div>
        </div>
    </div>
</x-default-layout>
