          <div class="card mb-3 " id="entete">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body">
              <div class="row">
                <div class="col-lg-8 d-flex justify-content-between">
                  <h4 class="mb-0 text-primary"> <i class="fas fa-database"></i>  Gestion de stock <i class="fas fa-angle-right"></i> Nouvel arrivage </h4>
                  <button class="btn btn-warning mr-1 mb-1" type="button" 
                    id="btnActualiser">Actualiser<i class="fas fa-sync-alt"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>



          <div class="row no-gutters">
            <div class="col-xl-6 pr-xl-2">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Arivage & Article</h5>
                </div>
                <div class="card-body bg-light overflow-hidden">
                  <div class="row">
                    <div class="col-12">
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
                                    <label for="arrivageName">Libelle arrivage</label>
                                    <input class="form-control form-control-sm" id="arrivageName" name="arrivageName"  
                                    @if(!empty($_SESSION['arrivName']))
                                     {{ 'value="'.$_SESSION['arrivName'].'" readonly' }}
                                    @endif
                                    type="text" placeholder="Title" >
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
                              
                                <input type="hidden" name="arrivageLibelle" id="arrivageNom" value="">
                              
                                      @csrf
                                  <div class="form-group">
                                        <label for="idClient">Produits</label>
                                        <select class="selectpicker"  id="articleLib" name="article">
                                          <option value="choix" id="choix">--Choisir--</option>
                                            <option class="text-primary" value="new" >
                                             <span class="bg-warning">Nouvel article</span>
                                            </option>
                                          @if(!$prds->isEmpty())
                                            @foreach( $prds as $prd)
                                            <option class="text-900" value="{{ $prd->id}}" 

                                              coutAchat="{{ $prd->produitPrixFour }}" 
                                              prixVente="{{ $prd->produitPrix }}" >
                                              {{ $prd->produitLibele}}
                                            </option>
                                            @endforeach
                                          @endif  
                                        </select>
                                  </div>              
                                    <div class="form-group">
                                      <label for="prix">Coût d'achat</label>
                                            <input class="form-control" type="number" name="prix" id="prix"  aria-label="Cout d'acaht l'article" min="1">
                                    </div>
                                    <div class="form-group">
                                      <label for="prixV">Prix de vente</label>
                                            <input class="form-control" type="number" name="prixV" id="prixV" aria-label="Prix de l'article" min="1">
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
                </div>
              </div>
            </div>
            <div class="col-xl-6 pl-xl-2">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Arrivage Panier</h5>
                </div>
                <div class="card-body bg-light">
                  <div class="row">
                    <div class="col-12">
                    <div class="row align-items-center mt-4">
                            <div class="col-auto">
                              <div class="avatar avatar-5xl status-away">
                                <a href="#titreArrivage" class="stretched-link">
                                <img class="rounded-circle" src="assets/img/illustrations/falcon.png" alt="" />
                              </a>
                              </div>
                            </div>

                            <div class="avatar avatar-4xl">
                            <div class="avatar-name bg-primary rounded-circle " style="cursor: pointer;"><span id="compteur_panier">@if(!empty($_SESSION['arrivPrd'])) {{ count($_SESSION['arrivPrd']) }} @else {{ "00" }} @endif</span></div>
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
                </div>
              </div>
            </div>
          </div>


            {{-- ***** MODULE AJOUT PRODUIT & CATGORIE**** --}}
              @include('pages/principale/approvision/addPrdMod')
            {{-- ***** MODULE AJOUT PRODUIT & CATGORIE**** --}}

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->



    <script src="{{ asset('assets/js/theme.js') }}"></script>
 <script type="text/javascript">

        //Desactiver l'autocomplete 
          $('input').attr('autocomplete',"off");

        //Choix d'un produit
          $('#articleLib').change(function()
          {

            if($('#articleLib').val() == 'new')
            {
               $('#modalAddProd').modal('show');
            }
            else 
            {
              var cout = $('#articleLib option:selected').attr('coutAchat');
              var prixVn = $('#articleLib option:selected').attr('prixVente');
              $("#prix").val(cout);
              $("#prixV").val(prixVn);
              
            }
          })


      //Au clic du bouton Actualiser
        $('#btnActualiser').click(function()
          {

                $("#main_content").load("mbo/addArriv");


          });

    //Fonction enregistrement d'n prd d'arrivage
      		function ajaxProduitSave()
		      {
		                  $.ajax({
		                  method: "POST",
		                  url: "/mbo/saveArrivPrd",
		                  data: $("#formProduit").serialize(),
		                    dataType: "json",
		                })

		        .done(function(data) 
		                {

		                  toastr.success("Article ajouté avec succès  ");
		                  var compteur_panier = parseInt($('#compteur_panier').text());
		                 $('#compteur_panier').text(compteur_panier+1)

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

		//Fonction Initialisation
		      function articleformClassInit()
		      {
		        $('#prix').val('').attr('class','form-control');
            $('#quantite').val('').attr('class','form-control');  
            $('#prixV').val('').attr('class','form-control');  
		        // $('#articleLib').val('').attr('class','form-control');  
		      };



		//Au clic de suivant
			$('#enregistreArrivage').click(function()
          {

            if($("#arrivageName").val() != "")
            {
              $('#arrivageNom').attr('value',$("#arrivageName").val());
              $('#arrivageName').removeClass('is-invalid').addClass('is-valid');
              $("#pill-home-tab").attr('class', 'nav-link');
              $("#pill-tab-home").attr('class', 'tab-pane fade');

              $("#pill-profile-tab").attr('class', 'nav-link active');
              $("#pill-tab-profile").attr('class', 'tab-pane fade show active');

              // scrollContent($('#entete'));
              $('#entete').hide();

            }
            else
              {
                $('#arrivageName').addClass('is-invalid');
              }


          });

    //Scroll content
      function scrollContent(target)
       {
            var offset = target.offset().top;
            $('html, body').animate({scrollTop: offset}, 'slow');
       }
        
		//Ajout de produit au panier
	        $('#ajoutProduitArrivage').click(function()
	        {
                // $('#inputVal').attr('class', 'form-control is-valid');


	          if ($('#articleLib').val() != "" && $('#articleLib').val() != 'choix' && $('#articleLib').val() != 'new' ) 
		          {

		            if ($('#prix').val() != "") 
		            {
		                $('#prix').attr('class', 'form-control is-valid');

		                if ($('#quantite').val() != "") 
		                {
		                  $('#quantite').attr('class', 'form-control is-valid');
                      if (parseInt($('#prixV').val()) > parseInt($('#prix').val())) 
                        {

                      $('#prixV').attr('class', 'form-control is-valid');

                        ajaxProduitSave();

                       articleformClassInit();
                        }
                        else
                        {
                          toastr.error('Veuillez saisir un prix de vente supérieur ou égal au cout d\'achat');
                          $('#prixV').addClass('is-invalid');

                        }

		                 
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
	              toastr.warning('Veuillez ajouter un produit');

	            }
			});

    	// Affiche liste produit arrivage
	     $("#listeArrivageProduit").click(function()
	       {
	          if (parseInt($('#compteur_panier').text()) >=1) 
	            {
	                   $('#main_content').load('mbo/lArrivPrd');
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
	     
    </script>
