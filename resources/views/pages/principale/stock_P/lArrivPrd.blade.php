

          <div class="card">
            <div class="card-header">
              <div class="row justify-content-between">
                <div class="col-md-auto">
                  <h5 class="mb-3 mb-md-0">(@if (!empty($_SESSION['arrivPrd'])) {{$_SESSION["arrivName"] }} &nbsp; <i class='fas fa-angle-double-right'></i> &nbsp;{{ count($_SESSION['arrivPrd'])  }} @endif articles)</h5>
                </div>
                                  <div class="form-group">

                    <input class="form-control datetimepicker" id="dateV" name="dateV" type="text" data-options='{"dateFormat":"d/m/Y"}'>
                  </div>
                <div class="col-md-auto">
                  <button class="btn btn-sm btn-outline-secondary border-300 mr-2" id="retourArrivage" > 
                    <span class="fas fa-chevron-left mr-1"  data-fa-transform="shrink-4"></span>
                      Retour à l'ajout
                    </button>
                  <button class="btn btn-sm btn-primary" id="deleteArrivage">Supprimer</button>
                </div>
              </div>
            </div>

              <div class="card-body p-0">
                <div class="falcon-data-table">
                  <table class="table table-sm mb-0 table-striped table-dashboard fs--1 data-table border-bottom border-200" data-options='{"searching":false,"responsive":false,"pageLength":12,"info":false,"lengthChange":false,"sWrapper":"falcon-data-table-wrapper","dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive&#39;tr><&#39;row no-gutters px-1 py-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39;p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>
                    <thead class="bg-200 text-900">
                      <tr>
                        <th class="align-middle sort">Id</th>
                        <th class="align-middle sort">Produits</th>
                        <th class="align-middle sort">Qte</th>
                        <th class="align-middle sort">Prix Vente/Unit</th>
                        <th class="align-middle sort">Cout d'achat/Unit</th>
                        <th class="align-middle no-sort">Prix Net</th>
                        <th class="no-sort pr-1 align-middle data-table-row-action">Action</th>

                      </tr>
                    </thead>
                    <tbody id="customers">
                      <?php if (!empty($_SESSION['arrivPrd'])){
                        $i=0;
                          foreach ($_SESSION['arrivPrd'] as $key => $value)
                           {$i +=1; ?>  
                      <tr>
                        <th class="align-middle sort">{{ $i }}</th>
                        <th class="align-middle sort">
                          {{ getPrd($value['article'])->produitLibele  }}</th>
                        <th class="align-middle sort">{{ $value['qte']  }}</th>
                        <th class="align-middle sort">{{ $value['prixV']  }}</th>
                        <th class="align-middle sort">{{ $value['prix']  }}</th>
                        <th class="align-middle no-sort">{{ $value['prix']* $value['qte'] }}</th>
                        <td class="align-middle text-center fs-0 deleteBtn" id="{{ $key }}" style="cursor: pointer;" ><input type="hidden" id="key" value="">
                          <span class="badge badge rounded-capsule badge-soft-danger"> &nbsp;<span class="mr-2 fas fa-trash ml-1" data-fa-transform="shrink-2"></span> &nbsp;</span>
                        </td>
                      </tr>
                       <?php } }else{
                         echo "<div class='alert alert-warning'>Aucun produit</div>";
                       }?>
                    </tbody>
                  </table>
                </div>
              </div>


            <div class="card-footer bg-light d-flex justify-content-end">
                  <button class="btn btn-sm btn-primary" id="enregistreArrivage">Enregistrer</button>
            </div>
          </div>
          <div id="mytoken">
            @csrf
          </div>


    <script src="{{ asset('assets/js/theme.js') }}"></script>


    <script type="text/javascript">

      $('#retourArrivage').click(function()
        {
          $('#main_content').load('/addArriv');
          // alert('cliquer');
        });


      $('#enregistreArrivage').click(function()
        {
          if($('#dateV').val() != "")
          {
            Swal.fire({
              title: 'Nouvel Arrivage',
              text: "Voulez vous enregistrer ce arrivage de produits ?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Annuler',
              confirmButtonText: 'oui , valider!'
            }).then((result) => {
                if (result.value) {
                  $.ajax({
                    url:'/mbo/saveArriv',
                    method:'GET',
                    data:{action:'enregistrer','dateV':$('#dateV').val()},
                    dataType:'json',
                    success:function(){
                      Swal.fire(
                       'Valider!',
                       'Stock mis à jours avec succès',
                       'success'
                      );
                        var idSuc= $('#idSuc').val();
                        var input = '#mytoken input[name=_token]';
                        var token = $(input).attr('value');
                    $('#main_content').load('/mbo/arrivAttn');

                    },
                    error:function(){
                      Swal.fire('Problème de connection internet');
                    }
                  });
                }
            })
           }
          else
          {
            toastr.error('Veiullez saisir une date valide');
          }
        });



        $('.deleteBtn').click(function()
        {
          ajaxDeleteVente($(this).attr('id'));
        })

        $('#deleteArrivage').click(function()
        {

          ajaxDeleteArriv();
        })


        function ajaxDeleteVente(idProduit)
        {


                Swal.fire({
                  title: 'Suppresion vente',
                  text: "Voulez vous supprimer cet article de l'arrivage ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'Annuler',
                  confirmButtonText: 'oui , Supprimer!'
                }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url:'/deleteArrivPrd',
                        method:'GET',
                        data:{NumArt:idProduit},
                        dataType:'json',
                        success:function(){
                          Swal.fire(
                           'Supression!',
                           'Produits suipprimé avec succès',
                           'success'
                          );
                          $("#main_content").load("/lArrivPrd");
                        },
                        error:function(){
                          Swal.fire('La suppression de produits est impossible');
                        }
                      });
                    }
                })
        
        }

        function ajaxDeleteArriv()
        {


                Swal.fire({
                  title: 'Suppresion arrivage',
                  text: "Voulez vous supprimer cet arrivage ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  cancelButtonText: 'Annuler',
                  confirmButtonText: 'oui , Supprimer!',
                   backdrop: `rgba(240,15,83,0.4)`
                }).then((result) => {
                    if (result.value) {
                      $.ajax({
                        url:'/mbo/deleteArriv',
                        method:'GET',
                        data:{NumArt:1},
                        dataType:'json',
                        success:function(){
                          Swal.fire(
                           'Supression!',
                           'Arrivage suipprimé avec succès',
                           'success'
                          );
                          $("#main_content").load("/addArriv");
                        },
                        error:function(){
                          Swal.fire('Problème de connexion internet');
                        }
                      });
                    }
                })
        
        }




    </script>
