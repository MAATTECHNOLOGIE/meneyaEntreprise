@include('layouts.partials.header')


@include('layouts.partials.navbar')

    <!-- ===============================================-->
    <!--   DEBUT DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->

		 @if(getRole() == "admin")
			{{-- VUE INCLUS POUR PRINCIPALE --}}
			<div id="main_content">
			         @include('pages.dash.index')
			</div>
		@else
			{{-- VUE INCLUS POUR SUCCURSALE --}}
			<div id="main_content">
			         @include('pages.dash.indexSuc')
			</div>
		@endif


    <!-- ===============================================-->
    <!--   FIN DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->

@include('layouts.partials.footer')
