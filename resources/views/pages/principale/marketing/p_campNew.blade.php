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
                 <h5 class="mb-0">Campagnes publicitaires aux clients</h5>
                </div>
                    <div class="card-body">
                      <form class="form-validation">

                        <div class="form-group">
                        	<label for="timepicker2">Sender</label>
                            <select class="custom-select custom-select-lg mb-3"
                             id="senderIDn">
                             <option value="{{$sender}}">{{$sender}}</option>
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
                 <h5 class="mb-0">SMS Promotionnel aux clients et prospects</h5>
                </div> 
                    <div class="card-body">
                      <form class="form-validation" 
                            enctype="multipart/form-data"
                            action="{{ route('smsPro') }}" 
                            method="POST">
                          @csrf

                        <div class="form-group">
                        	<label for="timepicker2">Sender</label>
                            <select class="custom-select custom-select-lg mb-3" 
                             name="sender">
                             <option value="{{getSender()}}">{{getSender()}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="name">Images du produit/service</label>
                          <input class="form-control" name="photo" 
                            type="file" placeholder="titre" required>
                        </div>

                        <div class="form-group">
                          <label for="name">Titre</label>
                          <input class="form-control" name="titre" 
                            type="text" placeholder="titre" required>
                        </div>

                        <div class="form-group">
                          <label for="name">Nouveau prix <b>({{getMyDevise()}})</b></label>
                          <input class="form-control" name="prix" 
                            type="number" placeholder="Prix" required>
                        </div>

                        <div class="form-group">
                          <label for="name">Ancien prix <b>({{getMyDevise()}})</b></label>
                          <input class="form-control" name="prixold" 
                            type="number" placeholder="Prix">
                        </div>

                        <div class="form-group">
                          <label for="name">Livraison <b>({{getMyDevise()}})</b></label>
                          <input class="form-control" name="liv" 
                            type="number" placeholder="Livraison">
                        </div>

                        <div class="form-group">
                         <label for="smsP">Description</label>
                         <textarea class="form-control descrp" name="descrp" 
                          rows="2" required></textarea>
                        </div>
                      
                        <div class="form-group">
                         <label for="smsP">Messages(SMS d'accroche)</label>
                         <textarea class="form-control msgP" id="smsP" 
                          name="smsPr" rows="2" onkeyup="count_up2(this);" required></textarea>
                         <p class="text-danger mb-1" style="font-size:15px;">
                          Caractères: <span id="compteur2">0</span> | SMS: <span id="NbnSMS">0</span>
                         </p>
                         <p class="" style="font-size:12px;">NB: 1 SMS fait 160 caractères</p>
                        </div>

                        <div class="spinner-border loading" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>

                        <div class="d-flex justify-content-end">
                         <button class="btn btn-primary sendpromo" type="submit">Envoyer >
                         </button>
                        </div>

                      </form>
                      
                    </div>
            </div>
        </div>
     </div>
    </div>
</div>



             
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script type="text/javascript">

    // contrôle du lancement de la page
    $('.loading').hide();
    $('.sendpromo').click(function(){
       $('.loading').show();
    });

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
    


    // Campagne marketing groupée
    $('#sendSMSn').click(function(){
      //var dateAch = $('.dateachat').val();
      var smsPn = $('#smsPn').val();
      var sender = $("#senderIDn").val();
      console.log("sender:"+sender+" smsPn:"+smsPn);
      if (smsPn!='') {
         $.ajax({
         url:"sendNSMS",
         method:"get",
         data:{smsPn:smsPn,sender:sender},
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
        Swal.fire('Veuillez saisir le message');
      }
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