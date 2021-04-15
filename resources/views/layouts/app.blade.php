@include('layouts.partials.header')


@include('layouts.partials.navbar')

    <!-- ===============================================-->
    <!--   DEBUT DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->

			{{-- VUE INCLUS POUR PRINCIPALE --}}
			<div id="main_content">
			         @include('pages.dash.index')
			</div>



    <!-- ===============================================-->
    <!--   FIN DU CONTAINER A RECHARGER -->
    <!-- ===============================================-->

@include('layouts.partials.footer')
<script type="text/javascript">
  $(function()
  {
    $(".bestVnt").parent().next().hide();
  })
</script>
