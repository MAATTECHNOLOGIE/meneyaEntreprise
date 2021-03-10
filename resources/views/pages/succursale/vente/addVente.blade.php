
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" 
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-0 text-primary"><i class="fas fa-money-bill-wave"></i> Gestion des ventes > Nouvelle vente</h4>
        </div>
      </div>
    </div>
</div>


<div class="container">
    <div class="row">
     <!-- Infos clients+Produits -->
     <div class="col-lg-6">
        <div class="card mb-3">
         <div class="card-body">
          <div class="fancy-tab">

            <div class="nav-bar nav-bar-center">
              <div class="nav-bar-item px-3 px-sm-4 active" id="navIdentificationClient"><span class="far fa-address-card"></span>
                <div class="mt-1">Client</div>
              </div>

            </div>

            <form class="tab-contents" id="formulaire">
              <!-- Infos clients -->
               
              <div class="tab-content active" id="identificationClient">
                <div class="form-validation" id="formClientIdentite">

                 <div class="form-group">
                    @if(empty($_SESSION["clientId"]))
                      <label for="idClient">Liste client</label>
                      <select class="selectpicker"  id="idClient" name="clientId">
                        <option value="choix">--Choisir--</option>
                          <option class="text-primary" value="new" >
                           <span class="bg-warning">Nouveau Client</span>
                          </option>
                        @if(!$Clt->isEmpty())
                          @foreach( $Clt as $clt)
                          <option class="text-900" value="{{ $clt->clientId}}" >
                            {{ $clt->nom}}
                          </option>
                          @endforeach
                        @endif  
                      </select>
                    @else
                      <div class="form-group">
                        <label for="readonly">Clients</label>
                        <input class="form-control" id="readonly" type="text"  
                        value="{{ getClient($_SESSION["clientId"])->nom }}" readonly="">
                      </div>
                    @endif
                </div>

                 <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 nav-bar-item px-3" id='validClientIdentite' type="button">
                  Suivant <i class="fas fa-angle-right"></i>
                 </button>
                </div>
              </div>

              <!-- Infos Produits -->
              <div class="tab-content" id="selectionProduit">
                <div id="#">
                  @csrf

                <div class="form-group">
                  <label for="basic-example">Produit</label>
                  <select class="selectpicker" id="article" name="article">
                    <option value="choix">Recherche en cours ...</option>

                  </select>

                </div>
                <div class="form-row justify-content-around">
                 <div class="form-group col-6">
                   <label for="prix">Prix ( min: <span class="badge badge rounded-capsule badge-soft-secondary text-danger" id="formatPrixFour"> </span> )
                   </label>
                   <input class="form-control" id="prix" name="prix" type="number" placeholder="" autocomplete="off">
                 </div>
                <div class="form-group col-4">
                   <label for="quantite">Quantité</label>
                   <input class="form-control" id="quantite" name="quantite" type="number" placeholder="">
                 </div>
                </div>

                <div class="d-flex justify-content-end">
                  
                 <button class="btn btn-outline-primary rounded-capsule" 
                 id="ajouterPanier" type="button">
                  Ajouter <i class="fas fa-plus"></i>
                 </button>
                </div>
                </div>
              </div>
            </form>

          </div>
         </div>
        </div>
     </div>
     
     <!-- Facture  -->
     <div class="col-lg-6">
      
<div class="card mb-3">
                <div class="card-header bg-light btn-reveal-trigger d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Panier <span id="titrePanier"></span></h5>
                  <span class="fas fa-shopping-cart"></span>

                </div>
                <div class="card-body d-flex justify-content-center">
                  <div class="row align-items-center mt-4">
                    <div class="col-auto">
                      <div class="avatar avatar-5xl status-online">
                        <a href="#" class="stretched-link">
                        <img class="rounded-circle" src="../assets/img/team/avatar.png" alt="">
                      </a>
                      </div>
                    </div>

                    <div class="avatar avatar-4xl">
                    <div class="avatar-name bg-primary rounded-circle "><span id="compteur_panier">@if(!empty($_SESSION['achatP'])) {{ count($_SESSION['achatP']) }} @else {{ "00" }} @endif</span></div>
                  </div>

                  </div>
                </div>

                <button class="btn btn-success mr-3 ml-3 mb-1" type="button" id="lPrdAchat">
                  <i class="far fa-eye"></i>
                 Consulter la liste 
              </button>
              
              </div>


     </div>

    </div>

</div>


      {{-- modal ajout de client --}}
              <div class="modal fade" id="modAddClt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nouveau Client</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form  id="formAddClt" >
                          <input type="hidden" id="myIdEch" name="idEch" value="">
                          @csrf
                            
                                    <div class="form-row">
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label for="name">Nom & Prénoms</label>
                                          <input class="form-control" id="name" name="name" type="text" required>
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="form-group">
                                          <label for="montant">Contact</label>
                                          <input class="form-control " required id="contact" name="contact" type="number" >
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="date">Date </label>
                                          <input class="form-control datetimepicker" id="date" name="date" type="text" data-options='{"dateFormat":"d/m/Y"}' value="{{ date('d/m/Y') }}">
                                        </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                          <label for="lieu">Lieu </label>
                                          <input class="form-control " id="lieu" name="lieu" type="text"  value="">
                                        </div>
                                      </div>
                                    </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" id="payeModClose" >Fermer</button>
                      <button class="btn btn-primary btn-sm addClt" type="button">Valider</button>
                    </div>
                  </div>
                </div>
              </div>
      {{-- modal ajout de client --}}
<script src="{{ asset('assets/js/theme.js') }}"></script>


<script type="text/javascript">

$(function()
{


        //Fonction permetant de valider avec la touche entré
            $('#quantite').keydown(function(event)
            {
              if(event.keyCode == 13)
                {
                  if ($.isNumeric($('#quantite').val())) 
                  {

                  verifInput();

                  }
                  else
                  {
                    toastr.error('Quantité invalide');
                  }
                }
            });


        // Passer a la quantite au clic de Entrer 
            $('#prix').keydown(function(event)
            {
              if(event.keyCode == 13)
                {
                  $('#quantite').focus();
                }
            });


        //Fonction de verification des entrées 
          function verifInput()
          {

            if($('#article').val() != "choix") 
            {
              if($("#quantite").val() != "")
                {
                  //selection de l'option de l'id de l'article choisit
                    var qte = parseInt($('#quantite').val());
                  //recup la qte en stock l'article choisit
                    var selectedPrdQte = $('#article option:selected').attr('qteInStck');

                    var prdPrixFour = $('#article option:selected').attr('prixFour');
                    var prixSaisi = parseInt($('#prix').val());


                    if(prixSaisi>=parseInt(prdPrixFour))
                    {
                    $('#prix').attr('class','form-control');
                    if (qte <= parseInt(selectedPrdQte)) 
                      {
                        toastr.options.positionClass = "toast-top-right";
                        ajaxSaveProduit();
                      }
                      else
                      {
                        toastr.options.positionClass = "toast-top-center";
                        var sms = "Produit insufisant dans votre stock! Qte dispo : "+selectedPrdQte;
                        toastr.error(sms);

                      }

                    }
                    else
                    {
                  $('#prix').attr('class','form-control is-invalid');
                  toastr.warning('Le prix de vente ne peut être en dessous du prix fournisseur');

                    }
                }
              else
                {
                  $('#quantite').attr('class','form-control is-invalid');
                }
            }
            else
            {
              toastr.warning('Produits Invalide');
            }
          }

        //Clic sur option select nouveau produit
          $('#article').change(function()
          {
              
              if($('#article').val() == 'choix')
              {
                 toastr.warning('Veuillez choisir un article');
                $("#formatPrixFour").text('00');             


              }
              else
              {
                var prixPrd = $('#article option:selected').attr('prixPrd');
                var prixFourFormat = $('#article option:selected').attr('prixFourFormat');
                $("#prix").val(prixPrd);
                $("#formatPrixFour").text(prixFourFormat);             
              }
          })

        //Clic sur option select nouveau
          $('#idClient').change(function()
          {

            if($('#idClient').val() == 'new')
            {
               $('#modAddClt').modal('show');
            }
          })

        //Valider form ajout client
            $('.addClt').click(function()
            {

              if( $('#name').val() != '')
              {
                if( $('#contact').val() != '')
                  {
                    ajaxCltAdd();
                  }
              
              }
            })



        //Validation  duu nom du client
          $('#validClientIdentite').click(function()
          {

            if($("#idClient").val() != "choix")
              {
                        //Liste des produits
                          ajaxRecupPrdP();

                          $('#idClient').attr('class','form-control is-valid');
                          $("#navIdentificationClient").removeClass('active');
                          $("#identificationClient").removeClass('active');
                          $("#navSelectionProduit").addClass('active');
                          $("#selectionProduit").addClass('active');

                          //Nommage du panier 
                          var selecText = $('#idClient option:selected').text();
                          $('#titrePanier').text('de '+selecText);
              }
            else
              {
                toastr.warning('Veuillez choisir un client');
              }


          });



          //Clic sur le bouton ajouter au panier
            $('#ajouterPanier').click(function()
            {
              verifInput();

            });

      //Ajax  Client Add
        function ajaxCltAdd()
          {
            //envoie de la commande dans une requete ajax 
  
                  $.ajax(
                  {
                      method: "POST",
                      url: "mbo/AddClt",
                      data: $('#formAddClt').serialize(),
                      dataType: "json",
                  })

              .done(function(data) 
                      {

                          toastr.success("Client ajouté avec succès");
                          $("#formAddClt").trigger("reset");
                          $('#modAddClt').modal('hide');
                          $('#sucCont').load('/Addvente');




                       })
              .fail(function(data) 
                        {
                          toastr.error("Erreur d'ajout du client.");
                        });
          }

      function ajaxSaveProduit()
          {
            //envoie de la commande dans une requete ajax 
            //enregistrement de la commande en session
            //notification du succes d'envoie
            //initialisation du formulaire

                $.ajax(
                  {
                       method: "POST",
                      // url: "/ajaxEnregistreProduitAchat",
                      url: "savePrdAchatSuc",
                      data: $('#formulaire').serialize(),
                        dataType: "json",
                  })

              .done(function(data) 
                      {

                        toastr.success("Article ajouté avec succès  ");
                        var compteur_panier = $('#compteur_panier').text();
                        compteur_panier = parseInt(compteur_panier)+1;

                        if (compteur_panier < 10) 
                            {$('#compteur_panier').text('0'+compteur_panier);}
                        else{$('#compteur_panier').text(compteur_panier);}
                        articleformClassInit();


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
                          toastr.error("Erreur , problème de connexion internet ");

                          })


                        }
                    });
              });
          }

      function ajaxRecupPrdP()
          {
            //envoie de la commande dans une requete ajax 
            //enregistrement de la commande en session
            //notification du succes d'envoie
            //initialisation du formulaire

                $.ajax(
                  {
                       method: "GET",
                      url: "ajaxRecupPrdSuc",
                      data: {idSuc : 'ND'},
                        dataType: "html",
                  })

              .done(function(data) 
                      {
                        $('#article').html('');

                        $('#article').html(data);
                        $('#nameSuccu').attr('disabled');

                       })
              .fail(function(data) 
              {
                toastr.error('Veuilez choisir un client');

              });
          }


        function articleformClassInit()
        {
          $('#formatPrixFour').text('00');
          $('#prix').val('').attr('class','form-control');
          $('#quantite').val('').attr('class','form-control');  
        };


        //Liste des produits de la commande
        $('#lPrdAchat').click(function()
          {
            var panier = $('#compteur_panier').text();
            if (parseInt(panier) != 0) 
            {
            $('#sucCont').load('/lPrdAchat');

            }
            else
            {
              toastr.error('Aucun produit dans le panier');
            }
          })

});

</script>

<script src="assets/lib/select2/select2.min.js"></script>
