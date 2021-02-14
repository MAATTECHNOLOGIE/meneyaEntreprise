<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" 
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h3 class="mb-0 text-primary"> <i class="fas fa-grin-stars"></i> Campg. Marketing >SMS & Email</h3>
          <p class="mt-2">Ciblez efficacement vos futurs clients par SMS</p>
        </div>
      </div>
    </div>
</div>

<div class="row">
        	<div class="col-lg-12 pl-lg-2 mb-3">
              <div class="row no-gutters h-100 align-items-stretch">
                <div class="col-lg-12 mb-3">
                  <div class="card h-100">
                    <div class="card-header bg-light">
                      <h5 class="mb-0">Historique</h5>
                      <a href="#" class="deleteSMS"><span class="text-danger"><i class="fas fa-trash-alt">
                      </i> Tout supprimer</span></a>
                    </div>
                    <div class="card-body">
                     <div class="dashboard-data-table">
                    <table class="table table-sm table-dashboard fs--1 data-table border-bottom" 
                    data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":true,"pageLength":8,"columnDefs":[{"targets":[0,5],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ — <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
              <thead class="bg-200 text-900">
                <tr>
                  <th class="no-sort pr-1 align-middle data-table-row-bulk-select">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input checkbox-bulk-select" id="checkbox-bulk-purchases-select" type="checkbox" data-checkbox-body="#purchases" data-checkbox-actions="#purchases-actions" data-checkbox-replaced-element="#dashboard-actions" />
                      <label class="custom-control-label" for="checkbox-bulk-purchases-select"></label>
                    </div>
                  </th>
                  <th class="sort pr-1 align-middle">Code SMS</th>
                  <th class="sort pr-1 align-middle">SMS</th>
                  <th class="sort pr-1 align-middle">Date</th>
                  <th class="sort pr-1 align-middle text-center">Statut</th>
                  <th class="no-sort pr-1 align-middle data-table-row-action"></th>
                </tr>
              </thead>
    <tbody id="purchases">
      @foreach ($sms as $value)
       <tr class="btn-reveal-trigger">
        <td class="align-middle">
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="checkbox-0" />
            <label class="custom-control-label" for="checkbox-0"></label>
          </div>
        </td>
        <th class="align-middle"><a href="#">{{$value->codeSMS}}</a>
        </th>
        <td class="align-middle"><b>{{$value->msg}}</b></td>
        <td class="align-middle"><b>{{$value->dateSend}}</b></td>
        <td class="align-middle text-center fs-0"><span class="badge badge rounded-capsule badge-soft-success">Success<span class="ml-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
        </td>
        <td class="align-middle white-space-nowrap">
          
        </td>
       </tr>
      @endforeach
    </tbody>
  </table>
</div>
                
<script src="{{ asset('assets/js/theme.js') }}"></script> 
<script type="text/javascript">
  $('.deleteSMS').click(function(){
      ok = "1";
      $.ajax({
         url:"emptySMS",
         method:"get",
         data:{ok:ok},
         dataType:'html',
         success:function(data){
           Swal.fire('Historique vidé avec succès');
           $("#main_content").load("/CampgList");
         },
         error:function(){
           Swal.fire('erreur de connection');
         }
      });
  });

</script>   