<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" 
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h3 class="mb-0 text-primary"> <i class="fas fa-grin-stars"></i> Campg. Marketing >SMS & Email</h3>
          <p class="mt-2">Relancez vos clients par SMS pro au moment opportun pour les inciter à l'achat</p>
        </div>
      </div>
    </div>
</div>

<div class="media mb-4 mt-6">
	<span class="fa-stack mr-2 ml-n1">
		<i class="fas fa-circle fa-stack-2x text-300"></i>
		<i class="fa-inverse fa-stack-1x text-primary fas fa-hand-holding-usd" 
		 data-fa-transform="shrink-2"></i>
	</span>
    <div class="media-body">
     <h5 class="mb-0 text-primary position-relative">
     	<span class="bg-200 pr-3">Quelle campagne SMS pour votre entreprise ?</span>
     	<span class="border position-absolute absolute-vertical-center w-100 z-index--1 l-0"></span>
     </h5>
     <p>
     	Envoyez maintenant des SMS MARKETING percutants pour:<br>
     	<span class="text-danger">- Vendre Plus</span><br>
     	<span class="text-danger">- Attirer des clients</span><br>
     	<span class="text-danger">- Fidéliser ses clients</span><br>
     </p>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 pl-lg-2 mb-3">
     <div class="row no-gutters h-100 align-items-stretch">
        <div class="col-lg-12 mb-3">
            <div class="card h-100">
                <div class="card-header bg-light">
                 <h5 class="mb-0">SMS marketing Groupé</h5>
                </div>
                    <div class="card-body">
                      <form class="form-validation">

                        <div class="form-group">
                        	<label for="timepicker2">Sender ID</label>
                            <select class="custom-select custom-select-lg mb-3">
                             <option value="meneya">Meneya</option>
                            </select>
                        </div>

                        <div class="form-group">
                         <label for="smsP">Messages</label>
                         <textarea class="form-control msgP" id="smsPn" rows="3"  
                          onkeyup="count_up(this);"></textarea>
                         <p class="text-danger mb-1" style="font-size:15px;">
                          Caractères: <span id="compteur">0</span> | SMS: <span id="NbSMS">0</span></p>
                         <p class="" style="font-size:12px;">NB: 1 SMS fait 160 caractères</p>
                        </div>

                        <div class="form-group form-check">
                          <input class="form-check-input" id="defaultcheckbox1" type="checkbox">
                          <label class="form-check-label" for="defaultcheckbox1">Envoyer aux e-mails
                          </label>
                        </div>

                      </form>
                      <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" id="sendSMSn">Envoyer ></button>
                      </div>
                    </div>
            </div>
        </div>
     </div>
    </div>

    <div class="col-lg-6 pl-lg-2 mb-3">
     <div class="row no-gutters h-100 align-items-stretch">
        <div class="col-lg-12 mb-3">
            <div class="card h-100">
                <div class="card-header bg-light">
                 <h5 class="mb-0">SMS marketing Unique</h5>
                </div>
                    <div class="card-body">
                      <form class="form-validation">

                        <div class="form-group">
                        	<label for="timepicker2">Sender ID</label>
                            <select class="custom-select custom-select-lg mb-3" id="senderID">
                             <option value="meneya">Meneya</option>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="phone">Pays</label>
                          <select class="selectpicker pays" id="basic-example" name="pays">
                            <option value="225" selected>Côte d'ivoire</option>
                            <option value="228">Togo</option>
                            <option value="229">Benin</option>
                            <option value="226">Burkina-Faso</option>
                            <option value="223">Mali</option>
                            <option value="224">Guinée</option>
                            <option value="233">Ghana</option>
                           </select>
                        </div>

                      <!-- Téléphone::Générer les ID en fonction du pays -->
                       <label for="phone">Téléphone</label>
                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                          <span class="input-group-text prfix">
                           225
                          </span>
                         </div>
                         <input type="hidden" name="pref" value="225" id="telPrf">
                         <input class="form-control" type="number" aria-label="Last name"name="phone" id="phone">
                       </div>

                       <label for="email">Email</label>
                       <div class="input-group mb-3">
                         <div class="input-group-prepend">
                          <span class="input-group-text">
                           email
                          </span>
                         </div>
                         <input class="form-control" type="email" aria-label="Last name"name="email" 
                          id="email">
                       </div>

                        <div class="form-group">
                         <label for="smsP">Messages</label>
                         <textarea class="form-control msgP" id="smsP" rows="3" 
                          onkeyup="count_up2(this);"></textarea>
                         <p class="text-danger mb-1" style="font-size:15px;">
                          Caractères: <span id="compteur2">0</span> | SMS: <span id="NbnSMS">0</span>
                         </p>
                         <p class="" style="font-size:12px;">NB: 1 SMS fait 160 caractères</p>
                        </div>

                      </form>
                      <div class="d-flex justify-content-end">
                        <button class="btn btn-primary sendSMSUnq">Envoyer ></button>
                      </div>
                    </div>
            </div>
        </div>
     </div>
    </div>
</div>



             
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script type="text/javascript">
    // Préfixe du numéro
     $("select.pays").change(function(){
        var prf = $(this).children("option:selected").val();
        $('.prfix').text(prf);
        $("#telPrf").val(prf);
     });

    // Fonction de comptage
     function count_up(obj){
      document.getElementById('compteur').innerHTML = obj.value.length;
      var sms = $("#compteur").text();
      var nbS = parseInt(sms)/160;
      $("#NbSMS").text(parseInt(nbS));
     }

    // Fonction de comptage 2 
     function count_up2(obj)
     {
       document.getElementById('compteur2').innerHTML = obj.value.length;
       var sms = $("#compteur2").text();
       var nbS = parseInt(sms)/160;
       $("#NbnSMS").text(parseInt(nbS));
     }
    
    // Fonction d'envoie de messages unique
     $(".sendSMSUnq").click(function(){
      var phone  = $("#phone").val();
      var msg    = $("#smsP").val();
      var email  = $("#email").val(); 
      var telPrf = $("#telPrf").val();
      //console.log('email:'+email+' phone:'+telPrf+phone+' msg:'+msg);
      if (msg!=""&phone!=""){
        $.ajax({
         url:"sendUniqSMS",
         method:"get",
         data:{email:email,msg:msg,phone:phone,telPrf:telPrf},
         dataType:'html',
         success:function(data){
           Swal.fire('SMS envoyé avec succès');
           InitForm();
         },
         error:function(){
           Swal.fire('Envoie de SMS echoué');
         }
        });
      }else{
           Swal.fire('Veuillez saisir le message et le numéro de téléphone');
      }
     });

    // Campagne marketing groupée
    $('#sendSMSn').click(function(){
      //var dateAch = $('.dateachat').val();
      var smsPn = $('#smsPn').val();
      if (smsPn!='') {
         $.ajax({
         url:"sendNSMS",
         method:"get",
         data:{smsPn:smsPn},
         dataType:'html',
         success:function(data){
           Swal.fire('Votre campagne a été envoyé avec succès aux clients');
           InitForm();
         },
         error:function(){
           Swal.fire('Envoie de SMS echoué');
         }
        });
      }else{
        Swal.fire('Veuillez saisir le message et sélectionner une date');
      }
     
      //
    });

    // Fonction d'initialisation des données
     function InitForm()
     {
       $("#phone").val("");
       $("#smsP").val("");
       $("#email").val(""); 
       $("#telPrf").val("");
     }

</script>