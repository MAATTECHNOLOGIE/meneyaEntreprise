    <main class="main mt-4 recu_html" id="top">


      <div class="container" data-layout="container">

        <div class="content">
          <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);opacity: 0.7;">
            </div>
            <!--/.bg-holder-->

            <div class="card-body">
              <div class="d-flex justify-content-between">
            
                <h5> {{ env('APP_LIBELLE') }}<br><span class="fas fa-map-marker-alt"></span> {{ env('APP_LOCATION') }} <span class="fas fa-phone-square-alt"></span> {{ env('APP_CONTACT') }} 
                </h5>
                <img src="{{ asset('assets/img/team/logodimad.jpg') }}" alt="..." class="img-thumbnail">
              </div>

            <hr>
              <div  class="d-flex justify-content-between ">
                <div class="badge badge-pill badge-soft-secondary fs--2">
                  <strong class="mr-2 h6">Client: <span id="clientNom"></span></strong>
                </div>
                <div class="badge badge-pill badge-soft-secondary fs--2" >
                  <strong class="mr-2 h6">Contact: <span id="clientContact"></span> </strong>
                </div>
                <div class="badge badge-pill badge-soft-secondary fs--2">
                  <strong class="mr-2 h6">Date: <span id="dateVente"></span> </strong>
                </div>
            </div>
            <hr>
            </div>
          </div>
          <div class="card mb-3">
            <div class="d-flex justify-content-center">
                      <u class="text-900 h5"><i class="fas fa-shipping-fast"></i> Reçu d'approvisionnement </u>
                    </div>
            <div class="card-body" id="recu_content">

            </div>
          </div>
          <footer>
            <div class="row no-gutters justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">{{ env('APP_NAME').'---'.env('APP_SOCIETE') }} Reçu d'achat <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> {{ date('Y') }} &copy; <a href="meneya.com">Copyright</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.0</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </main>



            <style type="text/css">

                  .recu_html
                  {
                    display: none;
                  }
                  @media print {

                      body {
                            width: auto!important;
                            margin: auto!important;
                            margin-top: 100px;
                            background-color: #fff;
                            
                          }
                          #top {

                            width: auto!important;
                            margin: auto!important;
                            margin-top: 100px;
                            background-color: #edf2f9;

                          }
                        .no-print
                        {
                            display: none;
                        }
                        .recu_html
                        {
                          display: block;
                        }
                    
                                }
            </style>
