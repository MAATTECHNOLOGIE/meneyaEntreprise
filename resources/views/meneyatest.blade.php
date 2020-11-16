<!doctype html>
<html lang="en">
<head>
    <title>Meneya - Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Goole fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700%7CMerriweather+Sans:300,400,700" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="landing/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="landing/img/icon.png" type="image/png">

    <!-- CSS -->
    <link rel="stylesheet" href="landing/css/theme.css">

    <!-- JS -->
    <script src="landing/js/jquery.slim.min.js" defer></script>
    <script src="landing/js/popper.min.js" defer></script>
    <script src="landing/js/bootstrap.min.js" defer></script>
</head>

<body>
    <header class="site-header">
        <a href="#main" class="sr-only sr-only-focusable">Skip to main content</a>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light py-3" aria-label="Main navigation">
                <a class="navbar-brand text-dark" href="/">
                    <img src="landing/img/meneya.png" alt="Meneya">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center pt-3 pt-lg-0 ml-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="navbarPages" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               visualiser
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Se connecter au logiciel</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Parcourir toutes les fonctionnalités</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <main id="main">

        <!-- Hero -->
        <section class="bg-cover d-flex align-items-center position-relative min-vh-80" 
        style="background-image: url(landing/img/conference3.jpg)">
            <div class="bg-overlay  alpha-7"></div>
            <div class="container text-white">
                <div class="row">
                    <div class="col-md-7 mb-5 mb-md-0">
                        <h1 class="display-4">Tester Meneya</h1>
                        <p class="lead">Parcourir toutes nos fonctionnalités</p>
                        <a class="btn btn-light rounded-pill" href="meneyaacheter">Acheter</a>
                    </div>
                    <div class="col-md-4 offset-md-1">
                        <div class="">
                            <dl>
                                <dt class="font-weight-light mb-1">WhatsApp</dt>
                                <dd class="h5">+225 54 83 81 70 <br> +225 88 83 30 60</dd>
                                <dt class="font-weight-light mb-1">Numéro de téléphone</dt>
                                <dd class="h5">+225 02 52 11 60</dd>
                                <dt class="font-weight-light mb-1">Ecrivez-nous pour plus de détails !</dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Intro -->
        <section class="container py-5">
            

            <div class="bg-skew bg-skew-light">
            <div class="container py-4">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-9">
                        <h2 class="h3 mb-4">Pourquoi Meneya ?</h2>
                        <p class="lead mb-0">Avec Meneya gérer et contrôler votre activité partout à tout moment.</p>
                        <form class="py-4" method="POST" action="/formTest">
                            @csrf
                            <div class="form-group">
                                <label for="nom" class="small text-uppercase">Nom <span class="text-primary">*</span></label>
                                <input type="text" id="nom"  name="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                            <label for="pays" class="small text-uppercase">Pays <span class="text-primary">*</span></label>
                              <select class="form-control" id="pays">

                                                      <option value="Afghanistan">Afghanistan</option>
                                                      <option value="Albania">Albania</option>
                                                      <option value="Algeria">Algeria</option>
                                                      <option value="American Samoa">American Samoa</option>
                                                      <option value="Andorra">Andorra</option>
                                                      <option value="Angola">Angola</option>
                                                      <option value="Anguilla">Anguilla</option>
                                                      <option value="Antarctica">Antarctica</option>
                                                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                      <option value="Argentina">Argentina</option>
                                                      <option value="Armenia">Armenia</option>
                                                      <option value="Aruba">Aruba</option>
                                                      <option value="Australia">Australia</option>
                                                      <option value="Austria">Austria</option>
                                                      <option value="Azerbaijan">Azerbaijan</option>
                                                      <option value="Bahamas">Bahamas</option>
                                                      <option value="Bahrain">Bahrain</option>
                                                      <option value="Bangladesh">Bangladesh</option>
                                                      <option value="Barbados">Barbados</option>
                                                      <option value="Belarus">Belarus</option>
                                                      <option value="Belgium">Belgium</option>
                                                      <option value="Belize">Belize</option>
                                                      <option value="Benin">Benin</option>
                                                      <option value="Bermuda">Bermuda</option>
                                                      <option value="Bhutan">Bhutan</option>
                                                      <option value="Bolivia">Bolivia</option>
                                                      <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                      <option value="Botswana">Botswana</option>
                                                      <option value="Bouvet Island">Bouvet Island</option>
                                                      <option value="Brazil">Brazil</option>
                                                      <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                      <option value="Bulgaria">Bulgaria</option>
                                                      <option value="Burkina Faso">Burkina Faso</option>
                                                      <option value="Burundi">Burundi</option>
                                                      <option value="Cambodia">Cambodia</option>
                                                      <option value="Cameroon">Cameroon</option>
                                                      <option value="Canada">Canada</option>
                                                      <option value="Cape Verde">Cape Verde</option>
                                                      <option value="Cayman Islands">Cayman Islands</option>
                                                      <option value="Central African Republic">Central African Republic</option>
                                                      <option value="Chad">Chad</option>
                                                      <option value="Chile">Chile</option>
                                                      <option value="China">China</option>
                                                      <option value="Christmas Island">Christmas Island</option>
                                                      <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                      <option value="Colombia">Colombia</option>
                                                      <option value="Comoros">Comoros</option>
                                                      <option value="Congo">Congo</option>
                                                      <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                      <option value="Cook Islands">Cook Islands</option>
                                                      <option value="Costa Rica">Costa Rica</option>
                                                      <option value="Cote d'Ivoire" selected>Cote d'Ivoire</option>
                                                      <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                      <option value="Cuba">Cuba</option>
                                                      <option value="Cyprus">Cyprus</option>
                                                      <option value="Czech Republic">Czech Republic</option>
                                                      <option value="Denmark">Denmark</option>
                                                      <option value="Djibouti">Djibouti</option>
                                                      <option value="Dominica">Dominica</option>
                                                      <option value="Dominican Republic">Dominican Republic</option>
                                                      <option value="East Timor">East Timor</option>
                                                      <option value="Ecuador">Ecuador</option>
                                                      <option value="Egypt">Egypt</option>
                                                      <option value="El Salvador">El Salvador</option>
                                                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                      <option value="Eritrea">Eritrea</option>
                                                      <option value="Estonia">Estonia</option>
                                                      <option value="Ethiopia">Ethiopia</option>
                                                      <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                      <option value="Faroe Islands">Faroe Islands</option>
                                                      <option value="Fiji">Fiji</option>
                                                      <option value="Finland">Finland</option>
                                                      <option value="France">France</option>
                                                      <option value="France Metropolitan">France Metropolitan</option>
                                                      <option value="French Guiana">French Guiana</option>
                                                      <option value="French Polynesia">French Polynesia</option>
                                                      <option value="French Southern Territories">French Southern Territories</option>
                                                      <option value="Gabon">Gabon</option>
                                                      <option value="Gambia">Gambia</option>
                                                      <option value="Georgia">Georgia</option>
                                                      <option value="Germany">Germany</option>
                                                      <option value="Ghana">Ghana</option>
                                                      <option value="Gibraltar">Gibraltar</option>
                                                      <option value="Greece">Greece</option>
                                                      <option value="Greenland">Greenland</option>
                                                      <option value="Grenada">Grenada</option>
                                                      <option value="Guadeloupe">Guadeloupe</option>
                                                      <option value="Guam">Guam</option>
                                                      <option value="Guatemala">Guatemala</option>
                                                      <option value="Guinea">Guinea</option>
                                                      <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                      <option value="Guyana">Guyana</option>
                                                      <option value="Haiti">Haiti</option>
                                                      <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                                      <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                      <option value="Honduras">Honduras</option>
                                                      <option value="Hong Kong">Hong Kong</option>
                                                      <option value="Hungary">Hungary</option>
                                                      <option value="Iceland">Iceland</option>
                                                      <option value="India">India</option>
                                                      <option value="Indonesia">Indonesia</option>
                                                      <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                      <option value="Iraq">Iraq</option>
                                                      <option value="Ireland">Ireland</option>
                                                      <option value="Israel">Israel</option>
                                                      <option value="Italy">Italy</option>
                                                      <option value="Jamaica">Jamaica</option>
                                                      <option value="Japan">Japan</option>
                                                      <option value="Jordan">Jordan</option>
                                                      <option value="Kazakhstan">Kazakhstan</option>
                                                      <option value="Kenya">Kenya</option>
                                                      <option value="Kiribati">Kiribati</option>
                                                      <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                      <option value="Korea, Republic of">Korea, Republic of</option>
                                                      <option value="Kuwait">Kuwait</option>
                                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                      <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                                                      <option value="Latvia">Latvia</option>
                                                      <option value="Lebanon">Lebanon</option>
                                                      <option value="Lesotho">Lesotho</option>
                                                      <option value="Liberia">Liberia</option>
                                                      <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                      <option value="Liechtenstein">Liechtenstein</option>
                                                      <option value="Lithuania">Lithuania</option>
                                                      <option value="Luxembourg">Luxembourg</option>
                                                      <option value="Macau">Macau</option>
                                                      <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                      <option value="Madagascar">Madagascar</option>
                                                      <option value="Malawi">Malawi</option>
                                                      <option value="Malaysia">Malaysia</option>
                                                      <option value="Maldives">Maldives</option>
                                                      <option value="Mali">Mali</option>
                                                      <option value="Malta">Malta</option>
                                                      <option value="Marshall Islands">Marshall Islands</option>
                                                      <option value="Martinique">Martinique</option>
                                                      <option value="Mauritania">Mauritania</option>
                                                      <option value="Mauritius">Mauritius</option>
                                                      <option value="Mayotte">Mayotte</option>
                                                      <option value="Mexico">Mexico</option>
                                                      <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                      <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                      <option value="Monaco">Monaco</option>
                                                      <option value="Mongolia">Mongolia</option>
                                                      <option value="Montserrat">Montserrat</option>
                                                      <option value="Morocco">Morocco</option>
                                                      <option value="Mozambique">Mozambique</option>
                                                      <option value="Myanmar">Myanmar</option>
                                                      <option value="Namibia">Namibia</option>
                                                      <option value="Nauru">Nauru</option>
                                                      <option value="Nepal">Nepal</option>
                                                      <option value="Netherlands">Netherlands</option>
                                                      <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                      <option value="New Caledonia">New Caledonia</option>
                                                      <option value="New Zealand">New Zealand</option>
                                                      <option value="Nicaragua">Nicaragua</option>
                                                      <option value="Niger">Niger</option>
                                                      <option value="Nigeria">Nigeria</option>
                                                      <option value="Niue">Niue</option>
                                                      <option value="Norfolk Island">Norfolk Island</option>
                                                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                      <option value="Norway">Norway</option>
                                                      <option value="Oman">Oman</option>
                                                      <option value="Pakistan">Pakistan</option>
                                                      <option value="Palau">Palau</option>
                                                      <option value="Panama">Panama</option>
                                                      <option value="Papua New Guinea">Papua New Guinea</option>
                                                      <option value="Paraguay">Paraguay</option>
                                                      <option value="Peru">Peru</option>
                                                      <option value="Philippines">Philippines</option>
                                                      <option value="Pitcairn">Pitcairn</option>
                                                      <option value="Poland">Poland</option>
                                                      <option value="Portugal">Portugal</option>
                                                      <option value="Puerto Rico">Puerto Rico</option>
                                                      <option value="Qatar">Qatar</option>
                                                      <option value="Reunion">Reunion</option>
                                                      <option value="Romania">Romania</option>
                                                      <option value="Russian Federation">Russian Federation</option>
                                                      <option value="Rwanda">Rwanda</option>
                                                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                      <option value="Saint Lucia">Saint Lucia</option>
                                                      <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                      <option value="Samoa">Samoa</option>
                                                      <option value="San Marino">San Marino</option>
                                                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                                      <option value="Senegal">Senegal</option>
                                                      <option value="Seychelles">Seychelles</option>
                                                      <option value="Sierra Leone">Sierra Leone</option>
                                                      <option value="Singapore">Singapore</option>
                                                      <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                                      <option value="Slovenia">Slovenia</option>
                                                      <option value="Solomon Islands">Solomon Islands</option>
                                                      <option value="Somalia">Somalia</option>
                                                      <option value="South Africa">South Africa</option>
                                                      <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                      <option value="Spain">Spain</option>
                                                      <option value="Sri Lanka">Sri Lanka</option>
                                                      <option value="St. Helena">St. Helena</option>
                                                      <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                      <option value="Sudan">Sudan</option>
                                                      <option value="Suriname">Suriname</option>
                                                      <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                      <option value="Swaziland">Swaziland</option>
                                                      <option value="Sweden">Sweden</option>
                                                      <option value="Switzerland">Switzerland</option>
                                                      <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                      <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                      <option value="Tajikistan">Tajikistan</option>
                                                      <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                      <option value="Thailand">Thailand</option>
                                                      <option value="Togo">Togo</option>
                                                      <option value="Tokelau">Tokelau</option>
                                                      <option value="Tonga">Tonga</option>
                                                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                      <option value="Tunisia">Tunisia</option>
                                                      <option value="Turkey">Turkey</option>
                                                      <option value="Turkmenistan">Turkmenistan</option>
                                                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                      <option value="Tuvalu">Tuvalu</option>
                                                      <option value="Uganda">Uganda</option>
                                                      <option value="Ukraine">Ukraine</option>
                                                      <option value="United Arab Emirates">United Arab Emirates</option>
                                                      <option value="United Kingdom">United Kingdom</option>
                                                      <option value="United States">United States</option>
                                                      <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                      <option value="Uruguay">Uruguay</option>
                                                      <option value="Uzbekistan">Uzbekistan</option>
                                                      <option value="Vanuatu">Vanuatu</option>
                                                      <option value="Venezuela">Venezuela</option>
                                                      <option value="Vietnam">Vietnam</option>
                                                      <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                      <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                      <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                      <option value="Western Sahara">Western Sahara</option>
                                                      <option value="Yemen">Yemen</option>
                                                      <option value="Yugoslavia">Yugoslavia</option>
                                                      <option value="Zambia">Zambia</option>
                                                      <option value="Zimbabwe">Zimbabwe</option>
                                                    
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="small text-uppercase">Numéro de téléphone<span class="text-primary">*</span></label>
                                <input type="number" id="tel" name="tel" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="small text-uppercase">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>



                            <div class="form-group">
                                <label for="domaine" class="small text-uppercase">Domaine d'activité</label>
                                <input type="text" id="domaine" name="domaine" class="form-control">
                            </div>

{{--                             <div class="form-group form-check">
                                <input type="checkbox" id="terms" class="form-check-input">
                                <label class="form-check-label small" for="terms"><a href="#">Rester informer</a></label>
                            </div> --}}
                            <button type="submit" class="btn btn-primary rounded-pill" style="background-color:#bd003b;">
                              Commencer le test
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>


    </main>


    <footer class="site-footer mt-5">
        <div class="container">
            <div class="row justify-content-md-between">
                <div class="col-sm-12 col-md-4 mb-4">
                    <h2 class="h5 mb-3">Meneya</h2>
                    <p>Meneya, LA SOLUTION DIGITALE POUR OPTIMISER SON BUSINESS ET AUGMENTER RAPIDEMENT SON
                      CHIFFRE D’AFFAIRE
                    </p>
                </div>
                <div class="col-4 col-md-2 mb-4">
                    <h2 class="h5 mb-3">Contacts</h2>
                    <ul class="nav flex-column">
                        <li class="mb-1">
                            <a href="#" class="text-secondary">
                                +225 02 20 52 11
                                +225 54 83 81 70
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 col-md-2 mb-4">
                    <h2 class="h5 mb-3">Adresse</h2>
                    <ul class="nav flex-column">
                        <li class="mb-1"><a href="#" class="text-secondary">
                            Côte d'ivoire, Abidjan Rivera 2
                        </a></li>
                    </ul>
                </div>
                
            </div>

            <hr role="presentation">

            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center">
                <div class="text-muted mb-3">&copy; Un produit de <b style="color:red;">Maat-Tech</b> -
                   maattechnologie@gmail.com - info@meneya.com
                </div>
                <!--<ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="icon icon-sm icon-secondary" href="#"><i class="icon-inner fab fa-twitter" aria-hidden="true"></i><span class="sr-only">Twitter</span></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="icon icon-sm icon-secondary" href="#"><i class="icon-inner fab fa-facebook-f" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="icon icon-sm icon-secondary" href="#"><i class="icon-inner fab fa-linkedin-in" aria-hidden="true"></i><span class="sr-only">Linkedin</span></a>
                    </li>
                </ul>-->
            </div>
        </div>
    </footer>
    <script src="//code.tidio.co/m0mroofgx5hzwwq5mvefpxl9canpgy4y.js" async></script>

</body>
</html>