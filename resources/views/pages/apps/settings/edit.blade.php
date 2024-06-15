<x-default-layout>

    @section('title')
        Settings
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('coupon.index') }}
    @endsection
    <div class="d-flex flex-column flex-column-fluid">
        <div class="card shadow-sm w-75 m-auto">
            <div class="card-body">
                <h5 class="card-title mb-4">{{__('admin.Edit Setting')}}</h5>
                <form class="d-flex flex-column align-items-start gap-4" method="post"
                enctype="multipart/form-data">
                    @method('PUT')
                </form>
            </div>
        </div>
    </div>
</x-default-layout>>
