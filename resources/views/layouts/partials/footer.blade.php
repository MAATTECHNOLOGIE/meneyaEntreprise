          <footer class="no-print">
            <div class="row no-gutters justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">{{ env("APP_NAME") }} | Tous droits réservés <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> {{ date("Y") }} &copy; <a href="mailto:maattechnologie@gmail.com">By Maat Technologie</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.1.0</p>
              </div>
            </div>
          </footer>
        </div>

        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 text-white position-relative modal-shape-header">
                <div class="position-relative z-index-1">
                  <div>
                    <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                    <p class="fs--1 mb-0">Please create your free Falcon account</p>
                  </div>
                </div>
                <button class="close text-white position-absolute t-0 r-0 mt-1 mr-1" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body py-4 px-5">
                <form>
                  <div class="form-group">
                    <label for="modal-auth-name">Name</label>
                    <input class="form-control" type="text" id="modal-auth-name" />
                  </div>
                  <div class="form-group">
                    <label for="modal-auth-email">Email address</label>
                    <input class="form-control" type="email" id="modal-auth-email" />
                  </div>
                  <div class="form-row">
                    <div class="form-group col-6">
                      <label for="modal-auth-password">Password</label>
                      <input class="form-control" type="password" id="modal-auth-password" />
                    </div>
                    <div class="form-group col-6">
                      <label for="modal-auth-confirm-password">Confirm Password</label>
                      <input class="form-control" type="password" id="modal-auth-confirm-password" />
                    </div>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="modal-auth-register-checkbox" />
                    <label class="custom-control-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Register</button>
                  </div>
                </form>
                <div class="w-100 position-relative mt-5">
                  <hr class="text-300" />
                  <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or register with</div>
                </div>
                <div class="form-group mb-0">
                  <div class="row no-gutters">
                    <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                    <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="toast bg-white notice" id="cookie-notice" role="alert" data-options='{"autoShow":false,"autoShowDelay":3000,"showOnce":true,"cookieExpireTime":7200000}' data-autohide="false" aria-live="assertive" aria-atomic="true">
          <div class="toast-body d-flex justify-content-center px-5">
            <div class="d-lg-flex align-items-center text-center">
              <button class="close text-shadow-none position-absolute t-0 r-0 p-2 mr-2 mt-2" type="button" data-dismiss="toast" aria-label="Close"><span class="font-weight-medium" aria-hidden="true">×</span></button><img class="mr-2" src="../assets/img/icons/cookie.png" width="20" alt="" />
              <p class="mb-2 mb-lg-0">
                Our site uses cookies. By continuing to use our site, you agree to our <a class="text-underline" href="../components/cookie-notice.html">Cookie Policy</a>.</p>
              <button class="btn btn-primary btn-sm ml-3" type="button" data-dismiss="toast" aria-label="Close">Ok, I Understand</button>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    SPINNER DE CHARGEMENT  -->

<div class="animation text-center invisible mt-5" id="animationDiv">

  <div>
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
  <div class="spinner-grow text-light" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-dark" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/lib/@fortawesome/all.min.js"></script>
    <script src="assets/lib/stickyfilljs/stickyfill.min.js"></script>
    <script src="assets/lib/sticky-kit/sticky-kit.min.js"></script>
    <script src="assets/lib/is_js/is.min.js"></script>
    <script src="assets/lib/lodash/lodash.min.js"></script>
    <script src="assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <script src="assets/lib/prismjs/prism.js"></script>
    <script src="assets/lib/chart.js/Chart.min.js"></script>
    <script src="assets/lib/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables-bs4/dataTables.bootstrap4.min.js"></script>
    <script src="assets/lib/datatables.net-responsive/dataTables.responsive.js"></script>
    <script src="assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
    <script src="assets/lib/leaflet/leaflet.js"></script>
    <script src="assets/lib/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="assets/lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="assets/lib/echarts/echarts.min.js"></script>
    <script src="assets/lib/progressbar.js/progressbar.min.js"></script>
    <script src="assets/lib/owl.carousel/owl.carousel.js"></script>
    <script src="assets/lib/dropzone/dropzone.min.js"></script>
    <script src="assets/lib/tinymce/tinymce.min.js"></script>
    <script src="assets/lib/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/lib/flatpickr/flatpickr.min.js"></script>
    <script src="assets/lib/plyr/plyr.polyfilled.min.js"></script>
    <script src="assets/lib/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/lib/select2/select2.min.js"></script>
    

<script src="assets/lib/toastr/toastr.min.js"></script>



    <!-- ===============================================-->
    <!--    MES PROPRES SCRIPTS-->
    <!-- ===============================================-->
    <script type="text/javascript">
      // Fonction de scrollage
       function scrollContent()
       {
            var offset = $('#infoSucc').offset().top;
            $('html, body').animate({scrollTop: offset}, 'slow');
       }

      // Fonction de chargement
      function loadingScreen()
      {
        $('#main_content').html($('#animationDiv').attr('class', 'animation text-center'));
        
      }
    </script>
    
    <script src="{{ asset('assets/js/js_route.js') }}"></script>



  </body>

</html>