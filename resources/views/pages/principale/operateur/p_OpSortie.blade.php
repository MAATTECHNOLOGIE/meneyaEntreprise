<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" 
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">

          <h3 class="mb-0 text-primary">
           <a href="#" class="operateurs" id="{{ $operateur->id}}">
            <i class="fas fa-user-tie"></i>
            Opérateur > {{ $operateur->operateurNom}}
           </a>
          </h3>
          <p class="mt-2">
            <span class="fas fa-blender-phone"></span>
            <b>Contact</b>: {{ $operateur->operateurContact}}
   
            <span class="fas fa-map-marker-alt ml-2"></span>
            <b>Lieu</b>: {{ $operateur->operateurLieu}}

            <span class="fas fas fa-barcode ml-2"></span>
            <b>Matricule</b>: {{ $operateur->operateurMat}}
          </p>
          <p class="mt-2"><b>Sortie ></b>,Enregistrer les sorties de l'opération</p>
        </div>
      </div>
    </div>
</div>

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
                    <div class="tab-pane fade show active" id="pill-tab-home" role="tabpanel"       aria-labelledby="home-tab">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="sortieName">Opérations</label>
                           @if(empty($_SESSION['sortieName']))
                              <select class="form-control" id="sortieName" name="sortieName" >
                                @foreach($operations as $operation)
                                <option value="{{ $operation->id }}" libelle="{{ $operation->id }}">
                                  {{ $operation->OperationLibele }}
                                </option>
                                @endforeach
                              </select>
                            @else
                            <input class="form-control" id="sortieName" type="text" value="{{ $_SESSION['sortieName'] }}" readonly>

                          @endif
                        </div>
                      </div>
                          <div class="col-12" style="display: flex;justify-content: flex-end;">
                            <button class="btn btn-primary mr-1 mb-1" type="button" 
                             id="enregistreSortie">
                                Suivant <i class="fas fa-angle-double-right"></i>
                            </button>
                          </div>
                    </div>
                    <div class="tab-pane fade " id="pill-tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form id="formProduit">
                          
                          <input type="hidden" name="sortieNom" id="sortieNom" value="">
                          <input type="hidden" name="sortieLibelle" id="sortieid" value="">
                          <input type="hidden" name="sortieIdOp" value="{{ $operateur->id }}">
                          <input type="hidden" name="sortieNameOp" 
                           value="{{ $operateur->operateurNom }}">
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
                        <img class="rounded-circle" src="../assets/img/team/avatar.png" alt="">
                      </a>
                      </div>
                    </div>

                    <div class="avatar avatar-4xl">
                      <div class="avatar-name bg-warning rounded-circle " style="cursor: pointer;">
                        <span id="compteur_panier">
                       00 
                                                </span>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button class="btn btn-falcon-primary mr-1 mb-1" id="solde" type="button">
                      <svg class="svg-inline--fa fa-star fa-w-18" data-fa-transform="shrink-3" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" style="transform-origin: 0.5625em 0.5em;"><g transform="translate(288 256)"><g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" transform="translate(-288 -256)"></path></g></g></svg><!-- <span class="fa fa-star" data-fa-transform="shrink-3"></span> -->
                      Solde :
                    </button>
                  </div>
                  <div class="d-flex justify-content-center">
                      <button class="btn btn-warning mr-1 mt-2" type="button" id="listeSortiPrd">
                        <svg class="svg-inline--fa fa-eye fa-w-18 mr-2" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" style="transform-origin: 0.5625em 0.5em;"><g transform="translate(288 256)"><g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" transform="translate(-288 -256)"></path></g></g></svg><!-- <span class="fas fa-eye mr-2" data-fa-transform="shrink-2"></span> -->
                        Consulter listes
                      </button>
                  </div>


            </div>


          </div>


<script src="assets/lib/select2/select2.min.js"></script>
<script type="text/javascript">
  $(".operateurs").click(function(){
    loadingScreen();
    var idV = $(this).attr('id');
    var token = $('input[name=_token]').val();
    $("#main_content").load("/p_OpTion",{idV:idV,_token:token});
  });

   
           
           
           
</script>