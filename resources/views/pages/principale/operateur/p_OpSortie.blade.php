<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" 
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">

          <h3 class="mb-0 text-primary">
           <a href="#" class="operateurs" id="{{$operateur->id}}">
            <i class="fas fa-user-tie"></i>
            Sortie > Opérateur > {{ $operateur->operateurNom}}
           </a>
          </h3>
          <p class="mt-2"><b>Sortie >></b>Nouvelle sortie</p>
        </div>
      </div>
    </div>
</div>

<?php

  foreach ($operations as $key => $value) {
    $operationl        = $value->OperationLibele;
    $operationcode    = $value->operationCode;
    $operationcoment  = $value->Operationcomt;
    $operaOptID       = $value->operaOpt;
    $idoperateur      = $value->OperaID;
    $montantrestant   = $value->montantrestant;
    
  }
?>


          <div style="display: flex; justify-content: space-around; ">
            <div class="card mb-2 col-lg-5 ">
              <div class="card-body bg-light overflow-hidden ">

                  <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pill-home-tab" data-toggle="tab" href="#pill-tab-home" role="tab" aria-controls="pill-tab-home" aria-selected="true"><span class="fab fa-user-tie mr-2"></span> Operateur</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pill-profile-tab" data-toggle="tab" href="#" role="tab" aria-controls="pill-tab-profile" aria-selected="false">
                        <i class="fas fa-briefcase mr-2"></i>
                          Produits
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                    <div class="tab-pane fade show active" id="pill-tab-home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="col-12">
                            <div class="form-group">
                          <label for="sortieName">Opérations</label>
                          {{--  {{dd($_SESSION['sortieName'])}} --}}
                          @if(empty($_SESSION['sortieName']))
                              <select class="form-control" id="sortieName" name="sortieName" >
                                @foreach($operations as $operation)
                                <option value="{{ $operation->id }}" libelle="{{ $operation->id }}">{{ $operation->OperationLibele." (Matr: ".$operation->operaOpt."|".formatPrice($operation->montantrestant)."|".$operation->date." )" }}
                                </option>
                                @endforeach
                              </select>
                              @else

                              <input class="form-control" id="sortieName" type="text" value="{{ $_SESSION['sortieName'] }}" readonly>

                          @endif
                            </div>
                          </div>
                          <div class="col-12" style="display: flex;justify-content: flex-end;">
                            <button class="btn btn-primary mr-1 mb-1" type="button" id="enregistreSortie">
                                Suivant <i class="fas fa-angle-double-right"></i>
                            </button> 
                          </div>
                    </div>
                    <div class="tab-pane fade " id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form id="formProduit">
                          @csrf
                          {{-- recuperation des valeur arrivage  par id --}}
                          <input type="hidden" name="sortieNom" id="sortieNom" value="">
                          <input type="hidden" name="sortieLibelle" id="sortieid" value="">
                          <input type="hidden" name="sortieIdOp" value="{{ $operateur->id }}">
                          <input type="hidden" name="sortieNameOp" value="{{ $operateur->operateurNom }}">
                          
                        @csrf

                          <div class="form-group">
                            <label for="basic-example">Produit</label>
                            <select class="selectpicker" id="inputVal" name="article">
                              <option value="choix">-- Articles --</option>
                              @foreach($produits as $produit)
                              <option idduPrd="{{ $produit->id }}" title="{{ $produit->produitPrix }}" >{{ $produit->produitLibele }}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="idArticle" id="produitId" value="">
                          </div>

                                <div class="input-group mb-3  col-12">
                                  <div class="input-group-prepend"><span class="input-group-text">prix </span></div>
                                  <input class="form-control" type="number" name="prix" id="prix" aria-label="Prix de l'article">
                                </div>
                                <div class="input-group mb-3 col-12">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Qte</span>
                                  </div>
                                  <input class="form-control"  name="quantite" id="quantite" type="number" aria-label="Quantite" min="1">
                                </div>
                                <div class="col-12" style="display: flex;justify-content: flex-end;">
                                  <button class="btn btn-warning mr-1 mb-1" type="button" 
                                    id="addPrdSortie">Ajouter </button> 
                                </div>
                          </form>
                                
   
                  </div>
                  </div>
              </div>
            </div>

            <div class="card mb-2 col-lg-4 pt-2">
                  <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto">
                      <h5 class="mb-2 mb-sm-0 text-primary" id="titreSortie"><u>Sortie</u></h5>

                    </div>

                  </div>
                  <div class="row align-items-center mt-4">
                    <div class="col-auto">
                      <div class="avatar avatar-5xl status-away">
                        <a href="#titreArrivage" class="stretched-link">
                        <img class="rounded-circle" src="../assets/img/team/avatar.png" alt="" />
                      </a>
                      </div>
                    </div>

                    <div class="avatar avatar-4xl">
                      <div class="avatar-name bg-warning rounded-circle " style="cursor: pointer;">
                        <span id="compteur_panier">
                      @if(!empty($_SESSION['sortieOp'])) 
                        {{ count($_SESSION['sortieOp']) }} 
                        @else {{ "00" }} 
                        @endif
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button class="btn btn-falcon-primary mr-1 mb-1" id="solde" type="button">
                      <span class="fa fa-star"  data-fa-transform="shrink-3"></span>
                      Solde :{{$montantrestant}}
                    </button>
                  </div>

                  <div class="d-flex justify-content-center">

                      <button class ="btn btn-warning mr-1 mt-2" 
                              type ="button" 
                              id               = "listeSortiPrd"
                              operation        = "{{$operationl}}";
                              operationcode    = "{{$operationcode}}" 
                              operationcoment  = "{{$operationcoment}}"
                              operaOptID       = "{{$operaOptID}}"
                              idoperateur      = "{{$idoperateur}}">
                        <span class="fas fa-eye mr-2" 
                        data-fa-transform="shrink-2" ></span>
                        Consulter listes 
                      </button>
                     
                  </div>


            </div>


          </div>




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->



    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script type="text/javascript">

      $(".operateurs").click(function(){
         var idV = $(this).attr('id');
         var token = $('input[name=_token]').val();
         $("#main_content").load("/p_OpTion",{idV:idV,_token:token});
      });

      //Fonction d'ajout de prd au panier
        function ajaxProduitSave()
        {
                  $.ajax({
                    method: "POST",
                    url: "/savePrdSortie",
                    data: $("#formProduit").serialize(),
                    dataType: "json",
                  })

          .done(function(data) { toastr.success("Ajout validé  ");})
          .fail(function(data) 
          {
                      
            $.each(data.responseJSON, function (key, value) 
                {
                  if (key == "errors") 
                    {
                      $.each(value, function(key1,value1)
                      {
                        var input = '#formProduit input[name=' + key1 + ']';
                        $(input).attr('placeholder',value1)
                      $(input).addClass('is-invalid');
                      })


                    }
                });
          });
        }


      //Initialise le formulaire de selection de produits
        function articleformClassInit()
        {
          // $('#inputVal').val('').attr('class','form-control');
          $('#prix').val('').attr('class','form-control');
          $('#quantite').val('').attr('class','form-control');  
        };





      $(function()
      {


        // Sélection de produit
          $('#inputVal').change(function()
          {

            if($('#inputVal').val() == 'choix')
            {
               toastr.warning('Veuillez choisir un article');
            }
            else
            {
              var selecText = $('#inputVal option:selected').attr('title');
              $("#prix").val(selecText);
              
            }
          })

        //Selection de l'operation lie a la sortie
          $('#enregistreSortie').click(function()
            {

              if($("#sortieName").val() != "")
              {
                $('#sortieNom').attr('value',$("#sortieName").val());
                // $('#arrivageid').attr('value',$("#arrivageName").attr('Cmd'));
                var selecText = $('#sortieName option:selected').text();
                $('#sortieid').attr('value', $.trim(selecText));

                $('#sortieName').removeClass('is-invalid').addClass('is-valid');
                $("#pill-home-tab").attr('class', 'nav-link');
                $("#pill-tab-home").attr('class', 'tab-pane fade');

                $("#pill-profile-tab").attr('class', 'nav-link active');
                $("#pill-tab-profile").attr('class', 'tab-pane fade show active');
              }
              else
                {
                  $('#sortieName').addClass('is-invalid');
                }


            });

        //Ajouter le produits au pannier
        $('#addPrdSortie').click(function()
         {

            if ($('#prix').val() != "") 
            {
                $('#prix').attr('class', 'form-control is-valid');

                if ($('#quantite').val() != "") 
                {
                  $('#quantite').attr('class', 'form-control is-valid');

                 //selection de l'option de l'id de l'article choisit
                 var selectedId = $('#inputVal option:selected').attr('idduPrd');
                 $('#produitId').attr('value',selectedId);
                    ajaxProduitSave();
                  var compteur_panier = parseInt($('#compteur_panier').text());
                 $('#compteur_panier').text(compteur_panier+1)
                   articleformClassInit();
                 
                }
                else
                {
                  $('#quantite').addClass('is-invalid');
                }
            }
            else
              {
                $('#prix').addClass('is-invalid');

              }


          })






 /*---------------------------------------
 Ajax liste de produits ajouter au panier
-----------------------------------------*/
    // Affiche liste
     $("#listeSortiPrd").click(function()
       {

          // Récupération des données
          var operation       = $(this).attr('operation');
          var operationcode   = $(this).attr('operation');
          var operationcoment = $(this).attr('operationcoment');
          var operaOptID      = $(this).attr('operaOptID');
          var idoperateur     = $(this).attr('idoperateur');
          var token = $('input[name=_token]').val();
          
          if (parseInt($('#compteur_panier').text()) >=1) 
            {
             $('#main_content').load('/listeSortiPrd',
                {idOp : idoperateur, 
                 idOpt:operaOptID, 
                 _token :token,
                 operation:operation,
                 operationcode:operationcode,
                 operationcoment:operationcoment
                });
            }
            else
            {
              Swal.fire(
                'Oupss!',
                'Commande  encore vide!',
                'error'
                );
            }

       });
      });
    </script>

<script src="assets/lib/select2/select2.min.js"></script>

