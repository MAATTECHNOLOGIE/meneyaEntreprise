<div class="no-print">

<div class="card mb-3">

  <div class="bg-holder d-none d-lg-block bg-card" 

   style="background-image:url(../assets/img/illustrations/corner-4.png);">

  </div>

  <!--/.bg-holder-->



    <div class="card-body">

      <div class="row">

        <div class="col-lg-8">

         

          

           <h3 class="mb-0 text-primary">

              <a href="#" class="operateurs"><span><i class="fas fa-briefcase"></i> 

                Opérateurs ></span></a>{{ $operateur->operateurNom }}

           </h3>

           {{-- recuperation de l'Id de l'operateur --}}

           <input type="hidden" id="idOperateur"  value="{{ $operateur->id }}">

          </a>

          <p class="mt-2">

            <span class="fas fa-blender-phone"></span>

            <b>Contact</b>: {{  $operateur->operateurContact }}

   

            <span class="fas fa-map-marker-alt ml-2"></span>

            <b>Lieu</b>: {{  $operateur->operateurLieu }}



            <span class="fas fas fa-barcode ml-2"></span>

            <b>Matricule</b>:  {{ $operateur->operateurMat }}

          </p>

          

{{--           <br>

           <button class="btn btn-falcon-danger mr-3 mb-1 btnRetour" 

            id="" type="button">

             <span class="fab fa-battle-net fa-2x "  data-fa-transform="shrink-3"></span>Retour

           </button>

            <button class="btn btn-falcon-danger mr-1 mb-1  bntSortie" 

            id="" type="button">

             <span class="fas fa-plus"  data-fa-transform="shrink-3" ></span>Ajouter sortie

           </button>



                    <button class="btn btn-falcon-default btn-sm btnNewOp" type="button">

                      <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>

                      <span class="d-none d-sm-inline-block ml-1">

                        Nouvelle opération

                      </span>

                    </button> --}}

    

        </div>

      </div>

    </div>

</div>













	@if($sorties->isEmpty())



  {{-- // Vérification de l'existence d'opérations-opérateurs::sorties --}}



             <div class="card">

            <div class="card-body overflow-hidden text-center pt-5">

              <div class="row justify-content-center">

                <div class="col-7 col-md-5"><img class="img-fluid" src="../assets/img/illustrations/modal-right.png" alt="" /></div>

              </div>

              <h3 class="mt-3 font-weight-normal fs-2 mt-md-4 fs-md-3">

                <b class="text-danger">Ouf!!!!!!</b>, aucune sortie pour cette opération

              </h3>

              <p class="lead">Veuillez créer une nouvelle sortie pour cette opération .

                <br class="d-none d-md-block"/>

                <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1 newOp" 

                 type="button" id="{{ $operateur->id }}">   Nouvelle sortie

                </button><br class="d-none d-md-block"/>

                <a class="retour" href="#">

                  <span class="text-danger"><i class="fas fa-angle-left"></i> Retour</span>

                </a>

              </p>

              

            </div>

            <div class="card-footer d-flex justify-content-center bg-light text-center pt-4">

              <div class="col-10">

                <p class="mb-2 fs--1">Gestion des opérations de vos opérateurs <a href="#!">en toute simplicité.</a></p>

              </div>

            </div>

          </div>



          <script type="text/javascript">

            // Nouvelle sortie

             $('.newOp').click(function(){

               //$("#main_content").load("/p_opetNew");
               var idV = $(this).attr('id');
               var token = $('input[name=_token]').val();
               $("#main_content").load("/p_OpSortie",{idV:idV,_token:token});

             });



            // Retour opérateur

             $('.retour').click(function(){

               $("#main_content").load("/p_OpListe");

             });



          </script>







	@else

          <div class="card mb-5 ">

            <div class="card-header">

              <div class="row align-items-center justify-content-between">

                <div class="col-4 col-sm-auto d-flex align-items-center pr-0">

                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Liste de vos différentes sortie <a href="" data-toggle="modal" data-target="#exampleModalRight"></a></h5>

                </div>

                <div class="col-8 col-sm-auto ml-auto text-right pl-0">



                  <div id="dashboard-actions">

                   

                    <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Filtre</span></button>

                    <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Imprimer</span></button>

                  </div>

                </div>

              </div>

            </div>

            <div class="card-body p-0">

              <div class="falcon-data-table mytable">

                <table class="table table-sm mb-0 table-striped table-dashboard fs--1 data-table border-bottom border-200" data-options='{"searching":true,"responsive":false,"info":false,"lengthChange":false,"sWrapper":"falcon-data-table-wrapper","dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive&#39;tr><&#39;row no-gutters px-1 py-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39;p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>

                  <thead class="bg-200 text-900">

                    <tr>

                      <th class="align-middle sort">N° Vente</th>

                      <th class="align-middle sort" >Qte produits</th>

                      <th class="align-middle sort text-left">Montant Total</th>

                      <th class="align-middle sort text-left">Reçus </th>

                      <th class="align-middle sort text-left">Date </th>

                    </tr>

                  </thead>

                  <tbody>

                  	@foreach($sorties as $sortie)

                    <tr>

                      <th class="align-middle sort">

                      	{{ $sortie->libelleSortie }}

                      </th>

                      <th class="align-middle sort" >

                      	{{ $sortie->quantiteS }}

                      </th>

                      <th class="align-middle sort text-left">{{ $sortie->montantS }} FCFA </th>

                      <th class="align-middle sort text-left" style="cursor: pointer;">

                      	<span class='fas fa-list-alt fa-2x  text-primary mr-2 liste' id="{{ $sortie->id }}"></span> 

                      	<span class='far fa-file-pdf fa-2x text-warning reçu' alt="{{ $sortie->created_at }}" id="{{ $sortie->id }}"></span> 

                      </th>

                      <th class="align-middle sort">

                        {{ $sortie->created_at }}

                      </th>

                    </tr>

                    @endforeach

                  </tbody>

                </table>

              </div>

            </div>

          </div>



    <script src="{{ asset('assets/js/theme.js') }}"></script>





	@endif



</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Opération > Détails</h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>

      </div>

      <div class="modal-body">

        <div class="ContentL"></div>



      </div>

      <div class="modal-footer">

        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">

          Fermer

        </button>

      </div>

    </div>

  </div>

</div>





</div>







    <!-- ===============================================-->

    <!--    Fichier Facture pour operateur-->

    <!-- ===============================================-->



      @include('pages/dash/facture/sortieOp');



    <!-- ===============================================-->

    <!--    Fin Fichier Facture pour operateur -->

    <!-- ===============================================-->









<script type="text/javascript">



$(function()

{

	    $('.liste').click(function(){

            // Id de l'opération

             var idOpVe = $(this).attr('id');



            // Envoie au controller

              ajaxRecupSortie(idOpVe);

            // console.log('operation_id:'+idOpera);

            // console.log('operateur_id:'+idOpe);

            

         });

      $('.reçu').click(function()

      {

        // alert('ok');

             var idOpVe = $(this).attr('id');

             var dateV = $(this).attr('alt');

            



        $.ajax({

               url:'p_opRecuSorti',

               method:'get',

               data:{idOpVe:idOpVe},

               dataType:'html',

               success:function(data)

               {

                 $('#recu_content').html('');

                 $('#recu_content').html(data);

                 $('.dateVente').html(dateV);

                  print();





               },

               error:function()

               {

                toastr.error('Erreur ');

               },



             });

      });



      function ajaxRecupSortie(idOpVe)

      {



             $.ajax({

               url:'p_opDet',

               method:'get',

               data:{idOpVe:idOpVe},

               dataType:'html',

               success:function(data)

               {

                 $('.ContentL').html(data);

                 $('#exampleModal').modal('show');

               },

               error:function()

               {

                toastr.error('Erreur ');

               }

             });

      }



      // $('.btnRetour').click(function()

      // {

      //   $('main_content').load('p_OpListe');

      // })



      // $('.btnNewOp').click(function(){

      //   $('main_content').load('p_opetNew');



      // })

})



  </script>





