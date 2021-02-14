<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" 
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">

          <h3 class="mb-0 text-primary"> <i class="fas fa-grin-stars"></i> Propsects >Nouveau</h3>
          <p class="mt-2">Collectes les infos et les besoins de tes prospects </p>
        </div>
      </div>
    </div>
</div>

<div class="card mb-3">
	<div class="card-body">
        <form id="prospect">
           @csrf
        	<!--Succursale|Centrale -->
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
              <input class="form-control" type="number" aria-label="Last name"
               name="phone" id="phone">
            </div>

            <!-- NOM -->
            <div class="form-group">
              <label for="nom">Nom</label>
             <input class="form-control" id="nom" type="text" 
              placeholder="" name="nom">
            </div>

            <div class="form-group">
              <label for="name">Email</label>
             <input class="form-control" id="email" type="email" 
              placeholder="" name="email">
            </div>
            <hr>

            <button class="ml-1 btn btn-outline-primary rounded-capsule mr-1 mb-1" 
             type="submit" id="OKP"><i class="fas fa-user-tag"></i>Valider</button>
            <button class="ml-1 btn btn-outline-danger rounded-capsule mr-1 mb-1" 
             type="button" id="NOP"><i class="far fa-trash-alt"></i>Annuler</button>
            <button class="ml-1 btn btn-outline-success rounded-capsule mr-1 mb-1" 
             type="button" id="LISP"><i class="fas fa-eye"></i>Listes</button>

        </form>
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

    //Ajouter un prospect
     $('#prospect').on("submit",function(event) {
       event.preventDefault();
       var data = $(this).serialize();
       console.log(data);
       $.ajax({
         url:"p_AddPros",
         method:"get",
         data:data,
         dataType:'json',
         success:function(datas)
         {
           var input = '#prospect input';
           $(input).attr('class','form-control');
           Swal.fire({
              position: 'top-end',
              icon:  'success',
              title: 'Prospects',
              text:  'Prospects enregistrés avec succès',
              showConfirmButton: true,
              timer: 5000
            }); 
           Initform();
           $('#main_content').load('/p_prospL');
         },
         error:function(datas)
         {
            $.each(datas.responseJSON,function(key,value){
              if(key == 'errors')
              {
                $.each(value, function(key1, value1){
                 var input = '#prospect input[name='+key1+']';
                 $(input).addClass('is-invalid');
                 $(input).attr('placeholder',value1);
                })
              }
            });
         }

       });
     });

    // Initialisation du formulaire
     $("#NOP").click(function(){
      Initform();
     });
     
    // Lister le prospect
    $("#LISP").click(function(){
      console.log("liste des prospects");
      $("#main_content").load("/p_prospL");
    });

    // Initiation
     function Initform(){
      $("#phone").val("");
      $("#nom").val("");
      $("#email").val("");
     }

  </script>