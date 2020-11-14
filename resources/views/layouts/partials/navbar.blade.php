  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


      <div class="container-fluid" data-layout="container">



        <nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" ><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="{{ route('dashboard') }}">
              <div class="d-flex align-items-center py-3">
                <img class="mr-2" src="assets/img/illustrations/falcon.png" 
                  alt="" width="40" />
                  <span class="text-sans-serif" style="color:#cc0033;">
                   {{ env('APP_NAME') }}
                  </span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar">
              <ul class="navbar-nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text"> Tableau de bord</span>
                    </div>
                  </a>
                </li>

              </ul>

              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>


               {{-- MENU PRINCIPALES --}}

              @if(Auth::user()->userRole == "admin")

              <ul class="navbar-nav flex-column">
                                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#arriv" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="arriv">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fas fa-shipping-fast"></i></span>
                      <span class="nav-link-text">Arrivage</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="arriv" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="addArriv">
                      <a class="nav-link" href="#top">Nouvelle commande</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="arrivAttn">
                      <a class="nav-link" href="#top">Commande en attente</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="arrivOk">
                      <a class="nav-link" href="#top">Commande validée</a>
                    </li>

                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="listArriv"><a class="nav-link" href="#top">Liste Arrivage</a>
                    </li>

                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" >
                      <a class="nav-link" href="{{ route('dashboard') }}">Statistique</a>
                    </li>

                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#principal" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="principal">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fas fas fa-home"></i></span>
                      <span class="nav-link-text">Principale</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="principal" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="arrivagePrincipal"><a class="nav-link" href="#top">Approvisionnement</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="listArrivage"><a class="nav-link" href="#top">Liste Approvi.</a>
                    </li>

                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"  id="produitsPrincipal">
                      <a class="nav-link" href="#top">Produits</a>
                    </li>

                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#Succursale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Succursale">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fas fa-store-alt"></i></span>
                      <span class="nav-link-text">Succursale</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="Succursale" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="creerSuccursale">
                      <a class="nav-link" href="#top">Créer Succursale</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="listeSuccursale">
                      <a class="nav-link" href="#top">Liste Succursale</a>
                    </li>
                    <li class="nav-item" id="p_LVer"
                      data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">Versement </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#e-commerce" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="e-commerce">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><i class="fas fa-money-bill-wave"></i></span><span class="nav-link-text">Gestion des Ventes</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="e-commerce" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="achatPrincipal">
                      <a class="nav-link" href="#top">Ventes</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="proformat">
                      <a class="nav-link" href="#top">Facture Proformat</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="liste_ventePrincipal" ><a class="nav-link" href="#top">Mes ventes</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="stockP" ><a class="nav-link" href="#top">Mon stock</a>
                    </li>

                  </ul>
                </li>


              </ul>
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>

              <ul class="navbar-nav flex-column">
                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#utilities" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="utilities">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text">Gestion Utilisateurs</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="utilities" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="ajouterEmploye"><a class="nav-link" href="#top">Ajouter</a>
                    </li>
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="listeEmploye"><a class="nav-link" href="#top">Liste Utilisateur</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>

              <ul class="navbar-nav flex-column">


                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#operateur" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="operateur">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="fas fa-user-tie"></i></span><span class="nav-link-text">Opérateur</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="operateur" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed" id="p_Opera"
                     data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">Nouveau </a>
                    </li>

                    <li class="nav-item collapsed" id="p_OpListe"
                     data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">Liste </a>
                    </li>

                    <li class="nav-item collapsed" id="p_OpComd"
                     data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content">Opération</a>
                    </li>

                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#fournisseur" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="fournisseur">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="fas fa-briefcase"></i>
                    </span><span class="nav-link-text">Fournisseur</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="fournisseur" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed" id="p_newF"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Nouveau
                      </a>
                    </li>
                    <li class="nav-item collapsed" id="p_listF"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" title="" href="#main_content">   
                        Liste
                      </a>
                    </li>
                    <li class="nav-item collapsed" id="p_Eche"
                      data-toggle="collapse" 
                      data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" 
                      aria-expanded="false" 
                      aria-label="Toggle Navigation">
                      <a class="nav-link" href="#main_content"> Affecter Echeance </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>

            @else

              {{-- MENU SUCCURSAES --}}

              <ul class="navbar-nav flex-column">
                <li class="nav-item">
                  <a class="nav-link dropdown-indicator" href="#Succursale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Succursale">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon"><i class="fas fa-store-alt"></i></span>
                      <span class="nav-link-text">Succursale</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="Succursale" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item  collapsed" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation" id="dashSucu">
                      <a class="nav-link" href="#top">Ma succursale</a>
                    </li>
                  </ul>
                </li>
               </ul>
            @endif


               {{-- MENU SUCCURSALES --}}
          {{-- MENU VALABLE POUR PRINCIPLAES ET SUCCURSALES --}}


              <ul class="navbar-nav flex-column">

                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#Prospects" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Prospects">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="fas fa-grin-stars"></i> </span><span class="nav-link-text">Prospects</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="Prospects" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="p_prospNew">
                      <a class="nav-link"  href="#main_content">Nouveau</a>
                    </li>
                    <li class="nav-item collapsed"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="p_prospL">
                      <a class="nav-link"  href="#main_content">Liste</a>
                    </li>
                    <li class="nav-item"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="p_prospStat">
                      <a class="nav-link" href="#main_content">Analyse</a>
                    </li>
                    <li class="nav-item" 
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="p_prospbesoin" 
                    ><a class="nav-link" href="#main_content">Besoins</a>
                    </li>
                    <li class="nav-item" 
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="p_RelSMS">
                      <a class="nav-link" href="#main_content">Relance SMS</a>
                    </li>

                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link dropdown-indicator" 
                  href="#marketing" data-toggle="collapse" role="button" 
                  aria-expanded="false" aria-controls="fournisseur">
                    <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <i class="fas fa-bullhorn"></i> </span><span class="nav-link-text">Campg. Marketing</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="marketing" data-parent="#navbarVerticalCollapse">

                    <li class="nav-item collapsed"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="CampgNew">
                      <a class="nav-link"  href="#main_content">Nouveau</a>
                    </li>
                    <li class="nav-item"
                      data-toggle="collapse" data-target="#navbarVerticalCollapse" 
                      aria-controls="navbarVerticalCollapse" aria-expanded="false" 
                      aria-label="Toggle Navigation" id="CampgList">
                      <a class="nav-link" href="#main_content">Historique</a>
                    </li>
                  </ul>
                </li>
              </ul>
          {{-- MENU VALABLE POUR PRINCIPLAES ET SUCCURSALES --}}

            </div>
          </div>
        </nav>
        <div class="content">
           <nav class="navbar navbar-light navbar-glass navbar-top sticky-kit 
               navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand mr-1 mr-sm-3" href="#">
              <div class="d-flex align-items-center"><img class="mr-2" src="assets/img/illustrations/falcon.png" alt="" width="40"/>
                <span class="text-sans-serif" style="color:#cc0033">MENEYA</span>
              </div>
            </a>
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
                <form class="form-inline search-box">
                  <input class="form-control rounded-pill search-input" type="search" placeholder="Search..." aria-label="Search" /><span class="position-absolute fas fa-search text-400 search-box-icon"></span>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
              <li class="nav-item">
                <a class="nav-link settings-popover" href="#settings-modal" data-toggle="modal"><span class="ripple"></span><span class="fa-spin position-absolute a-0 d-flex flex-center"><span class="icon-spin position-absolute a-0 d-flex flex-center">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                      </svg></span></span></a>

              </li>
              <li class="nav-item">
                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill icon-indicator" href="#"><span class="fas fa-shopping-cart fs-4" data-fa-transform="shrink-7"></span><span class="notification-indicator-number">0</span></a>
              </li>

              <li class="nav-item dropdown dropdown-on-hover">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 icon-indicator" 
                id="navbarDropdownNotification" href="#" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-bell fs-4" data-fa-transform="shrink-6" style="color: #cc0033;"></span></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none" style="max-width: 20rem">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Notifications</h6>
                        </div>
                        <div class="col-auto"><a class="card-link font-weight-normal" href="#">Rupture de stock</a></div>
                      </div>
                    </div>
                    <div class="list-group list-group-flush font-weight-normal fs--1">
                      <div class="list-group-title">Alert</div>
                      <div class="list-group-item">
                        <a class="notification notification-flush bg-200" href="#!">
                          <div class="notification-avatar">
                            <div class="avatar avatar-2xl mr-3">
                              <div class="avatar-name rounded-circle" style="background-color: #cc0033;">
                                <span><i class="fas fa-exclamation fa-2x"></i></span>
                              </div>
                            </div>
                          </div>
                          <div class="notification-body">
                            <p class="mb-1"><strong><b>Chaussure Adidas</b></strong></p>
                            <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">seuil atteint :</span>3</span>
                          </div>
                        </a>
                      </div>
                      <div class="list-group-item">
                        <a class="notification notification-flush bg-200" href="#!">
                          <div class="notification-avatar">
                            <div class="avatar avatar-2xl mr-3">
                              <div class="avatar-name rounded-circle" style="background-color: #cc0033;">
                                <span><i class="fas fa-exclamation fa-2x"></i></span>
                              </div>
                            </div>
                          </div>
                          <div class="notification-body">
                            <p class="mb-1"><strong><b>Voiles femmes</b></strong></p>
                            <span class="notification-time"><span class="mr-1" role="img" aria-label="Emoji">seuil atteint :</span>5</span>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="card-footer text-center border-top-0"><a class="card-link d-block" href="pages/notifications.html">View all</a></div>
                  </div>
                </div>

              </li>
              <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" 
                     src="assets/img/team/3-thumb.png" alt="" />
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white rounded-soft py-2">
                    <a class="dropdown-item font-weight-bold text-warning"
                     href="#!"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                      </svg>
                     <span>{{ Auth::user()->name }}</span></a>

                      <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#" id="setting">
                         Paramètres
                       </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                          Déconnexion
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" 
                        method="POST" style="display: none;">@csrf
                      </form>
                  </div>
                </div>
              </li>
            </ul>
          </nav>

