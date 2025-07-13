<x-app-layout>
    @section('title', 'Brand List')

    @push('css')

        <style>
/* sds */
        </style>
    @endpush

    @section('content')
         <!-- Main Wrapper -->
        <div class="main-wrapper">
            <div class="error-box">
				<div class="error-img">
                    <img src="{{ asset('assets/img/authentication/under-maintenance.png') }}" class="img-fluid" alt="Img">
                </div>
				<h3 class="h2 mb-3">We are Under Maintenance</h3>
				<p>Sorry for any inconvenience caused, we have almost done
                    Will get back soon!</p>
				<a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
			</div>
        </div>
        <br>
        <br>
        <br>

        <!-- /Main Wrapper -->
    @endsection




    @push('js')

    @endpush
</x-app-layout>
