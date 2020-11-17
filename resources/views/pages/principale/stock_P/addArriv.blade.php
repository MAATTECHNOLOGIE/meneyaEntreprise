<div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
            </div>
            <!--/.bg-holder-->

            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h4 class="mb-0 text-primary"> <i class="fas fa-database"></i>  Gestion de stock <i class="fas fa-angle-right"></i> Nouveau arrivage </h4>
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
                          {{-- recuperation des valeur arrivage et date par id --}}
                          <input type="hidden" name="arrivageLibelle" id="arrivageNom" value="">
                          
                        @csrf


                <div class="form-group">
                      <label for="idClient">Produits</label>
                      <select class="selectpicker"  id="articleLib" name="article">
                        <option value="choix">--Choisir--</option>
                          <option class="text-primary" value="new" >
                           <span class="bg-warning">Nouvel article</span>
                          </option>
                        @if(!$prds->isEmpty())
                          @foreach( $prds as $prd)
                          <option class="text-900" value="{{ $prd->id}}" title="{{ $prd->produitPrixFour }}" >
                            {{ $prd->produitLibele}}
                          </option>
                          @endforeach
                        @endif  
                      </select>
                </div>



                                               
                                <div class="form-group">
                                  <label for="prix">Coût d'achat</label>
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
                      <h5 class="mb-2 mb-sm-0 text-primary" id="titreArrivage"><u>Arrivage</u></h5>

                    </div>

                  </div>



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


      {{-- modal ajout de produit --}}
              <div class="modal fade" id="addPrd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nouveau Produit</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form  id="formAddPrd" >
                          @csrf
                            
                                    <div class="form-row">
                                      <div class="col-5">
                                        <div class="form-group">
                                          <label for="libelleProd">Code</label>
                                          <input class="form-control" id="libelleProd" name="libelleProd" type="text" required>
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <div class="form-group">
                                          <label for="libelleProd">Libelle</label>
                                          <input class="form-control" id="libelleProd" name="libelleProd" type="text" required>
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="prixPrd">Cout d'achat</label>
                                          <input class="form-control " required id="prixPrd" name="prix" type="number"  >
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="prixPrd">Prix de vente</label>
                                          <input class="form-control " required id="prixPrd" name="prix" type="number"  >
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="prixPrd">Niveau d'alert</label>
                                          <input class="form-control " required id="prixPrd" name="prix" type="number"  >
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="prixPrd">Unite de mesure</label>
                                          <input class="form-control " required id="prixPrd" name="prix" type="number"  >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <select class="selectpicker" name="categorie" id="listCatg">
                                        <option value="new">-- Categorie --</option>
                                       <option class="text-primary" value="new" >

                                        <span class="bg-warning">Nouvelle categorie</span>
                                      </option>
                                        @foreach(getCatgo() as $catgo)
                                          <option class="categorie" value="{{ $catgo->id }}">
                                            {{ $catgo->libelle }}
                                          </option>
                                        @endforeach
                                      </select>
                                    </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" id="addModClose" >Fermer</button>
                      <button class="btn btn-primary btn-sm addPrdBtn" type="button">Valider</button>
                    </div>
                  </div>
                </div>
              </div>
      {{-- modal ajout de produit --}}


      {{-- modal ajout de categorie --}}
              <div class="modal fade" id="addCatg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h5 class="modal-title" id="exampleModalLabel">Nouvelle categorie</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form  id="formAddCatg" >
                          @csrf
                            
                                 
                                        <div class="form-group">
                                          <label for="libelleCatg">Libelle</label>
                                          <input class="form-control" id="libelleCatg" name="libelleCatg" type="text" required>
                                        </div>
                                 
                         <script type="text/javascript"></script>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" id="addCatgModClose" >Fermer</button>
                      <button class="btn btn-primary btn-sm addCatgBtn" type="button">Valider</button>
                    </div>
                  </div>
                </div>
              </div>
      {{-- modal ajout de categorie --}}

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
               $('#addPrd').modal('show');
            }
            else 
            {
              var selecText = $('#articleLib option:selected').attr('title');
              $("#prix").val(selecText);
              
            }
          })

      //Ajout categorie 
        $('#listCatg').change(function()
          {

            if($('#listCatg').val() == 'new')
            {
               $('#addCatg').modal('show');
            }
          })

        //Valiider form ajout produit
            $('.addPrdBtn').click(function()
            {

              if( $('#libelleProd').val() != '' )
              {
                if( $('#prixPrd').val() != '')
                  {
                    ajaxAddPrd();
                  }
              
              }
            })

        //Valider form ajout categorie
            $('.addCatgBtn').click(function()
            {

              if( $('#libelleCatg').val() != '' )
              {
                    ajaxAddCatg();
              }
            })

		//Fonction nouveau produit
  			function ajaxAddPrd()
      			{
              $.ajax({
                      url:'/addProduit',
                      method:'GET',
                      data: $('#formAddPrd').serialize(),
                      dataType:'json',
                      success:function(){
                              toastr.success("Ajout fait avec succès");

                               $("#formAddPrd").trigger("reset");

                                $('#addModClose').click();
                                
                                $("#main_content").load("/addArriv");

                               
                              },
                      error:function(){
                              toastr.error("Erreur lors de l'ajout ");
                                
                              }
                            });
      			};
      
    //Fonction nouveau produit
        function ajaxAddCatg()
            {
              $.ajax({
                      url:'/ajaxAddCatg',
                      method:'GET',
                      data: $('#formAddCatg').serialize(),
                      dataType:'json',
                      success:function(){
                              toastr.success("Ajout fait avec succès");

                               $("#formAddCatg").trigger("reset");

                                $('#addCatgModClose').click();
                                
                                $("#main_content").load("/addArriv");

                               
                              },
                      error:function(){
                              toastr.error("Erreur lors de l'ajout ");
                                
                              }
                            });
            };
      
      	//Fonction enregistrement d'n prd d'arrivage
      		function ajaxProduitSave()
		      {
		                  $.ajax({
		                  method: "POST",
		                  url: "/saveArrivPrd",
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
            }
            else
              {
                $('#arrivageName').addClass('is-invalid');
              }


          });

        
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
		                    ajaxProduitSave();

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
	              toastr.warning('Veuillez ajouter un produit');

	            }
			});

    	// Affiche liste
	     $("#listeArrivageProduit").click(function()
	       {
	          if (parseInt($('#compteur_panier').text()) >=1) 
	            {
	                   $('#main_content').load('/lArrivPrd');
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
