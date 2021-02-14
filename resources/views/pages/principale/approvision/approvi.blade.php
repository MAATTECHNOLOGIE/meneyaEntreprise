<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-0 text-primary"> <i class="fas fa-database"></i>  Gestion de stock <i class="fas fa-angle-right"></i> Nouvel approvisionnement </h4>
                </div>
              </div>
            </div>
          </div>
          <div style="display: flex; justify-content: space-around; ">
            <div class="card mb-2 col-lg-5 ">
              <div class="card-body bg-light overflow-hidden ">

                  <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pill-home-tab" data-toggle="tab" href="#pill-tab-home" role="tab" aria-controls="pill-tab-home" aria-selected="true"><span class="fab fa-shopify mr-2"></span> Création</a>
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
                          <label for="arrivageName">Succursales</label>
                          @if(empty($_SESSION['arrivageName']))
                              <select class="form-control" id="arrivageName" name="arrivageName" >
                                @foreach($succursales as $succursale)
                                <option value="{{ $succursale->id }}" libelle="{{ $succursale->id }}">
                                  {{ $succursale->succursaleLibelle }}
                                </option>
                                @endforeach
                              </select>
                              @else

                              <input class="form-control" id="arrivageName" type="text" value="{{ $_SESSION['arrivageName'] }}" readonly>

                          @endif
                            </div>
                          </div>
                          <div class="col-12" style="display: flex;justify-content: flex-end;">
                            <button class="btn btn-primary mr-1 mb-1" type="button" id="enregistreArrivage">
                                Suivant <i class="fas fa-angle-double-right"></i>
                            </button> 
                          </div>
                    </div>
                    <div class="tab-pane fade " id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form id="formProduit">
                          {{-- recuperation des valeur arrivage  par id --}}
                          <input type="hidden" name="arrivageNom" id="arrivageNom" value="">
                          <input type="hidden" name="arrivageLibelle" id="arrivageid" value="">

                          
                        @csrf

                          <div class="form-group">
                            <label for="basic-example">Produit</label>
                            <select class="selectpicker" id="inputVal" name="article">
                              <option value="choix">-- Article --</option>
                              @foreach($produits as $produit)
                              <option idduPrd="{{ $produit->id }}" title="{{ $produit->produitPrix }}">{{ $produit->produitLibele }}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="idArticle" id="produitId" value="">
                          </div>                              
                                <div class="input-group mb-3  col-12">
                                  <div class="input-group-prepend"><span class="input-group-text">$ </span></div>
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
                                    id="ajoutProduitArrivage">Ajouter </button> 
                                </div>
                          </form>
                                
   
                  </div>
                  </div>
              </div>
            </div>
            <div class="card mb-2 col-lg-4 pt-2">


           
                  <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto">
                      <h5 class="mb-2 mb-sm-0 text-primary" id="titreArrivage"><u>Approvisionnement</u></h5>

                    </div>

                  </div>



<div class="row align-items-center mt-4">
  <div class="col-auto">
    <div class="avatar avatar-5xl status-away">
      <a href="#titreArrivage" class="stretched-link">
      <img class="rounded-circle" src="../assets/img/team/panier.jpg" alt="" />
    </a>
    </div>
  </div>

  <div class="avatar avatar-4xl">
  <div class="avatar-name bg-primary rounded-circle " style="cursor: pointer;">
    <span id="compteur_panier">
  @if(!empty($_SESSION['arrivageP'])) 
    {{ count($_SESSION['arrivageP']) }} 
    @else {{ "00" }} 
    @endif
    </span></div>
    </div>

</div>
<div class="d-flex justify-content-center">
    <button class="btn btn-warning mr-1 mt-2" type="button" id="listeArrivageProduit">
      <span class="fas fa-eye mr-2" data-fa-transform="shrink-2" ></span>
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

        //Clic sur option select nouveau produit
          $('#inputVal').change(function()
          {

            if($('#inputVal').val() == 'choix')
            {
               toastr.error('Veuillez choisir un articles');
            }
            else
            {
              var selecText = $('#inputVal option:selected').attr('title');
              $("#prix").val(selecText);
              
            }
          })

      function ajaxProduitSave()
      {
                  $.ajax({
                  method: "POST",
                  url: "/ajaxEnregistreProduit",
                  data: $("#formProduit").serialize(),
                    dataType: "json",
                })

        .done(function(data) 
                {

                  toastr.success("Article ajouté avec succès  ");

                 })
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



      function articleformClassInit()
      {
        // $('#inputVal').val('').attr('class','form-control');
        $('#prix').val('').attr('class','form-control');
        $('#quantite').val('').attr('class','form-control');  
      };





      $(function()
      {
        $('#enregistreArrivage').click(function()
          {

            if($("#arrivageName").val() != "")
            {
              $('#arrivageNom').attr('value',$("#arrivageName").val());
              // $('#arrivageid').attr('value',$("#arrivageName").attr('Cmd'));
              var selecText = $('#arrivageName option:selected').text(); 
              $('#arrivageid').attr('value', $.trim(selecText));

              $('#arrivageName').removeClass('is-invalid').addClass('is-valid');
              $("#pill-home-tab").attr('class', 'nav-link');
              $("#pill-tab-home").attr('class', 'tab-pane fade');

              $("#pill-profile-tab").attr('class', 'nav-link active');
              $("#pill-tab-profile").attr('class', 'tab-pane fade show active');
            }
            else
              {
                $('#arrivageName').addClass('is-invalid');
              }


          });

        $('#ajoutProduitArrivage').click(function()
         {
          if($('#inputVal').val() != 'choix')
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

          }
          else
          {
            toastr.error('Produits invalide');

          }

          })






 /*---------------------------------------
 Ajax liste de produits ajouter au panier
-----------------------------------------*/
    // Affiche liste
     $("#listeArrivageProduit").click(function()
       {
          if (parseInt($('#compteur_panier').text()) >=1) 
            {
             $('#main_content').load('/listeArrivageProduit');
            }
            else
            {
              Swal.fire(
                'Oupss!',
                'Votre arrivage est encore vide!',
                'error'
                );
            }

       });
      });
    </script>

<script src="assets/lib/select2/select2.min.js"></script>

