{{-- donner cet ID id="loaderContent"  au <div> parent du <div> dont <table> est enfant --}}
{{-- SUIVRE LES ETAPES DE PAGINATION DEFINIT DANS LE FICHIER paginatation.txt --}}

                <div class="col-3">
                      <label>N° de page</label>
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <button class="btn btn-sm btn-outline-secondary border-300" data-field="input-quantity" data-type="minus">-</button>
                        </div>
                        <input class="form-control text-center input-quantity input-spin-none" type="number" min="0" value="0" 
                         aria-label="Amount (to the nearest dollar)" 
                         style="max-width: 50px" id="gotTo">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-outline-secondary border-300" data-field="input-quantity" data-type="plus">+</button>
                        </div>
                      </div>
                </div>

                <div class="col-2">
                  <label>Element par page</label>
                  <select class="custom-select custom-select-sm mb-3" id="perPage" 
                   name="perPage">
                   
                      <option value="25"
                       @if ($perPage == 25)
                        selected
                       @endif>25
                      </option>
                     
                      <option value="50" 
                       @if ($perPage == 50)
                        selected
                       @endif>
                       50
                      </option>

                      <option value="100"
                       @if ($perPage == 100)
                        selected
                       @endif>100
                      </option>

                  </select>
                </div>




{{-- MODAL DE LOADING --}}
<div class="modal fade" id="loadMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog loadModBody" role="document">
    <div class="modal-content">

      <div class="modal-body text-center ">

          <div>
            <div class="spinner-grow text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-success" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-info" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-warning" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-danger" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
          <div>
            <span class="text-danger "><b>Chargement en cours ...</b></span>
          </div>
      </div>
    </div>
  </div>
</div>



 <script src="{{ asset('assets/js/theme.js') }}"></script>


<script src="{{ asset('assets/lib/jquery-validation/jquery.validate.min.js') }}"></script>

<script type="text/javascript">
    $(function()
    {


      // Code pour enlever le paginate de JS
          $('.mytable .table-responsive').next().hide();

      //Action des bouton paginate de Laravel
        $('.page-item > .page-link').click(function()
        {
            event.preventDefault();
            var valeur = parseInt($(this).text());
            if(valeur>= 1)
            {
              var perPage = $('#perPage').val();
              var page = $('#lastPrd').val();
              $('#loaderContent').html($('.loadModBody').html());
            $('#main_content').load('mbo/allPrd?page='+valeur+'&idPage='+page+'&perPage='+perPage);
      
            }
        });

//Fonction permetant de valider avec la touche entré
  $('#gotTo').keydown(function(event)
  {
    if(event.keyCode == 13)
      {
        var valeur = $('#gotTo').val();
            if(valeur>= 1)
            {
              var perPage = $('#perPage').val();
              var page = $('#lastPrd').val();
               $('#loaderContent').html($('.loadModBody').html());
            $('#main_content').load('mbo/allPrd?page='+valeur+'&idPage='+page+'&perPage='+perPage);
      
            }
 

      }
  });

//Au choix du perpage  de paginate
  $('#perPage').change(function()
  {
    var perPage = $('#perPage').val();
    $('#loaderContent').html($('.loadModBody').html());
    $('#main_content').load('mbo/allPrd?perPage='+perPage);
  })






    })




    </script>