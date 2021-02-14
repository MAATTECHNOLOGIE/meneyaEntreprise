<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\operateur;
use App\Model\commandes;
use App\Model\stock_operateur;
use App\Model\operation;
use App\Model\operation_has_operateurs;
use App\Model\produits;
use App\Model\sortie_ops;
use App\Model\sortieOp_has_produits;
use Validator;
use DB;
use Schema;


session_start();

class p_OperaController extends Controller
{
    /**
     * Create a new controller instance. 
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Opération => Mise à jour phase 1
    public function p_OperaUpd(Request $request)
    {
        // Lecture des opérateurs en fonction de l'id
         $operL = operation::where('id','=',$request->idOp)->get();
         $output = '';

           for ($i=0; $i < count($operL) ; $i++){
              $output.='
                <div class="infos">
                </div>
        
                <div class="form-group">
                 <label for="libele">Libelé</label>
                 <input class="form-control" id="libele" type="text" value="'.$operL[$i]->OperationLibele.'">
                </div>

                <div class="form-group">
                 <label for="comment">Commentaire</label>
                  <textarea class="form-control comment" 
                   rows="3" value="'.$operL[$i]->Operationcomt.'"
                  >'.$operL[$i]->Operationcomt.'</textarea>
                </div>

                <input type="hidden" id="IdOp" value="'.$operL[$i]->id.'">
              ';
           }

          return $output;
    }

    // Opération => Mise à jour phase 2
    public function p_OperaUpd2(Request $request)
    {
        operation::where('id','=',$request->IdOp)
                ->update([ 'OperationLibele'  => $request->libele,
                           'Operationcomt'    => $request->comment
                       ]);
    }

    public function p_Opera()
    {
        return view('pages.principale.Operateur.p_Opera');
    }

    public function p_OperaStock()
    {
        $opera = operateur::all()->sortByDesc('id');
        return view('pages.principale.Operateur.p_OperaStock')->with('opera',$opera);
    }

    protected function ControlData(array $data)
    {
        //Control  des données envoyées
        return Validator::make($data,['nom'=> 'required']);
    }

    public function p_AddOpera(Request $request)
    {
        // Validation
         $validation = $this->ControlData($request->all())->validate();

        // Opérateur
         $matOp    = rand(4,20).'Ap';
         $dataOp   = ['operateurMat'=>$matOp,
                      'operateurNom'=>$request->nom,
                      'operateurContact'=>$request->contact,
                      'operateurLieu'=>$request->lieu,
                      'operateurDate' =>$request->date
                    ];

        // Ajout opérateur
         operateur::create($dataOp);

        // Retour JSON
         return response()->json();

    }

    //AddOperation 

    public function p_AddOperation(Request $request)
    {
        // Validation
         $validation = $this->ControlData($request->all())->validate();

        // Opérateur
         $matOp    = rand(4,20).'A';
         $dataOp   = ['OperationLibele'  => $request->nom,
                      'Operationcomt'    => $request->comment,
                      'operationCode'    => $matOp
                    ];

        // Ajout opérateur
         operation::create($dataOp);

        // Retour JSON
         return response()->json();

    }

    public function p_OpComd()
    {
        //Lectures des opérations
        $operat = operation::all()->sortByDesc('id');
        return view('pages.principale.Operateur.p_OpComd')->with('operat',$operat);
    }

    public function p_cmdDOp(Request $request)
    {   
        // Suppression de l'opération
         operation::where('id','=',$request->idV)->delete();
    }

    public function p_DetCmd(Request $request)
    {
       
        //Lecture des détails de la commande
         $comL = DB::table('commandes')
            ->join('produits', 'commandes.produits_id', '=', 'produits.id')
            ->select('commandes.*', 'produits.produitLibele', 'produits.produitPrix')
            ->where('NmComd','=',$request->IdDet)
            ->get();
        $output = '';
        $output.= '<div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="border-0">Produits</th>
                      <th class="border-0 text-center">Quantité</th>
                      <th class="border-0 text-right">Prix unit.(fcfa)</th>
                      <th class="border-0 text-right">Prix Achat.(fcfa)</th>
                      <th class="border-0 text-right">Total(fcfa)</th>
                    </tr>
                  </thead>
                  <tbody>';
         for ($i=0; $i < count($comL) ; $i++) {
                $output.='<tr>
                      <td class="align-middle">
                        <h6 class="mb-0 text-nowrap">'.$comL[$i]->produitLibele.'</h6>
                      </td>
                      <td class="align-middle text-center">'.$comL[$i]->qte.'</td>
                      <td class="align-middle text-right">'.$comL[$i]->produitPrix.'</td>
                      <td class="align-middle text-right">'.$comL[$i]->prixAchat.'</td>
                      <td class="align-middle text-right">
                       '.$comL[$i]->qte*$comL[$i]->prixAchat.'
                      </td>
                    </tr>';
         }

        $output.='</tbody>
                </table>
              </div>';
        return $output;
    }

    public function p_stockDel(Request $request)
    {
        // Gestion des opérations des opérateurs
         return "listes des opérations";
    }

    public function p_DetStck(Request $request)
    {
       
    }

    public function p_OpListe()
    {
        //Lectures des opérations
         $opera = operateur::all()->sortByDesc('id');
         return view('pages.principale.Operateur.p_OpListe')->with('opera',$opera);
    }

    public function p_OpDele(Request $request)
    {
        // Suppression d'opération lié à l'opérateur
         operation_has_operateurs::where('operateurs_id','=',$request->idV)->delete();
         operateur::where('id','=',$request->idV)->delete();
    }

    public function p_OpUpd(Request $request)
    {

        // Lecture des opérateurs en fonction de l'id
         $operL = operateur::where('id','=',$request->idOp)->get();
         $output = '';

           for ($i=0; $i < count($operL) ; $i++){
              $output.='
                <div class="infos">
                </div>
        
                <div class="form-group">
                 <label for="name">Nom</label>
                 <input class="form-control" id="nom" type="text" value="'.$operL[$i]->operateurNom.'">
                </div>

                <div class="form-group">
                 <label for="name">Contact</label>
                 <input class="form-control" id="contact" type="text" 
                  value="'.$operL[$i]->operateurContact.'">
                </div>

                <div class="form-group">
                 <label for="name">Lieu</label>
                 <input class="form-control" id="lieu" type="text" 
                  value="'.$operL[$i]->operateurLieu.'">
                </div>

                <input type="hidden" id="IdOp" value="'.$operL[$i]->id.'">
              ';
           }

          return $output;
    }

    public function p_OpUpval(Request $request)
    {
        operateur::where('id','=',$request->IdOp)
                ->update([ 'operateurNom'     => $request->nom,
                           'operateurContact' => $request->contact,
                           'operateurLieu'    => $request->lieu 
                       ]);
    }

    public function p_OpTion(Request $request)
    {
        // Lecture des opérations-opérateurs
         $OpTion = DB::table('operateurs')
            ->join('operation_has_operateurs', 'operateurs.id', '=',
                    'operation_has_operateurs.operateurs_id')
            ->join('operations', 'operations.id', '=', 
                   'operation_has_operateurs.operations_id')
            ->select('operateurs.*', 'operation_has_operateurs.*', 'operations.*',
                'operation_has_operateurs.id as opeOperat')
            ->where('operateurs.id','=',$request->idV)
            ->get();
            /*dd($OpTion);*/
        
        // Lecture des ingres_fetch_array(result)os opérateurs
         $oper = operateur::where('operateurs.id','=',$request->idV)->get();
         /*dd($OpTion);*/
        // Valeur retournée
         return view('pages.principale.Operateur.p_OpTion')
                ->with('OpTion',$OpTion)
                ->with('oper',$oper);

    }

    public function p_opDet(Request $request)
    {
        // Lecture des sorties-opérations-opérateurs
         $OpTion = DB::table('sortie_op_has_produits')
            ->join('produits','produits.id','=','sortie_op_has_produits.produits_id')
            ->select('produits.*', 'sortie_op_has_produits.*')
            ->where('sortie_op_has_produits.sortieOp_id','=',$request->idOpVe)
            ->get();
         // dd($OpTion);
        // Déttails de l'opération des opérateurs

            $total= 0;
         $output ='';
         $output.='
            <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="border-0">Article</th>
                      <th class="border-0 text-center">Prix </th>
                      <th class="border-0 text-center">Prix de vente </th>
                      <th class="border-0 text-center">Qté</th>
                      <th class="border-0 text-right">Prix Net(Fcfa)</th>
                    </tr>
                  </thead>
                  <tbody>';
                for ($i=0; $i < count($OpTion) ; $i++){
                 $output.='
                    <tr>
                      <td class="align-middle">'.$OpTion[$i]->produitLibele.'</td>
                      <td class="text-center">'.$OpTion[$i]->produitPrix.'</td>
                      <td class="text-center">'.$OpTion[$i]->montant.'</td>
                      <td class="text-center">'.$OpTion[$i]->qte.'</td>
                      <td class=" text-right">'.$OpTion[$i]->montant * $OpTion[$i]->qte .'</td>
                    </tr>';
                    $total += $OpTion[$i]->montant * $OpTion[$i]->qte; 
                 }
            $output.='
                  </tbody>
                </table>
              </div>
              <div class="row no-gutters justify-content-end">
                <div class="col-auto">
                  <table class="table table-sm table-borderless fs--1 text-right">';
                // $total = 0;  
                // for ($i=0; $i < count($OpTion) ; $i++){  
                //     $total = $total+$OpTion[$i]->montant;
                //  }
                $output.='
                    <tr class="text-danger">
                      <th class="text-900 text-danger">Total(Fcfa):</th>
                      <td class="font-weight-semi-bold">'.$total.'</td>
                    </tr>';
                $output.='    
                  </table>
                </div>
              </div>
         ';
         return $output;
    }

    public function p_OptnDel(Request $request)
    {
        // Suppression de l'opération-opérateurs
        Schema::disableForeignKeyConstraints();

         $sortie = sortieOp::where('option_opteur_id', '=', $request->idV);
         // sortieOp_has_produits::where('sortieOp_id','=',$sortie->id)->delete();
         operation_has_operateur::where('id','=',$request->idV)->delete();

        Schema::enableForeignKeyConstraints();
    }

    public function p_opetNew(Request $request)
    {
        $operateurs = operateur::all();
        $operations = operation::all();
        return view('pages.principale.Operateur.p_OpNew')->withOperateurs($operateurs)->withOperations($operations);
    }

    protected function ControlOpOpera(array $data)
    {
        // Control New operations-operateurs
        return Validator::make($data,[
                                 'opera'   => 'required',
                                 'operat'  =>  'required',
                                 'montant' => 'required'
                                ]);
    }


    public function p_opeOpNew(Request $request)
    {
      
       /* Ajout de nouvelle operation-operateur*/

        // Controle des données
         $validation = $this->ControlOpOpera($request->all())->validate();
         $dataOp   = ['operateurs_id'=>$request->operat,
                      'operations_id'=>$request->opera,
                      'montant'=>$request->montant,
                      'montantrestant'=>$request->montant,
                      'date'=> $request->date,
                    ];


        // Ajout
         operation_has_operateurs::create($dataOp);

        // Retour JSON
         return response()->json();
    }

    public function  p_OpSortie(Request $request)
    {

        if(!empty($_SESSION['sortieIdOp']) )
        {
            if ($_SESSION['sortieIdOp'] != $request->idV) 
            {
                unset($_SESSION['sortieOp']); // vidage de session panier
                unset($_SESSION['sortieName']); // vidage de session panier
                unset($_SESSION['sortieid']); // vidage de session panier
                unset($_SESSION["sortieNameOp"]); //vidage du nom de l'operateur
                unset($_SESSION["sortieIdOp"]); // vidage de l'Id de la sortie
            }

        }
        $operateur = operateur::where('id','=',$request->idV)->first();
        // Lecture des opérations de l'opérateurs
         $operations = DB::table('operation_has_operateurs')
            ->join('operateurs', 'operation_has_operateurs.operateurs_id', '=', 'operateurs.id')
            ->join('operations', 'operation_has_operateurs.operations_id', '=', 'operations.id')
            ->select('operations.*', 'operation_has_operateurs.*')
            ->where('operateurs.id','=',$request->idV)
            ->get();
         $produits = produits::all();
         //dd($operations);

        //Ajout de nouvelle sortie  pour un operateur 
         return view('pages.principale.Operateur.p_OpSortie')
               ->withOperateur($operateur)
               ->withOperations($operations)
               ->withProduits($produits);
    }


    public function savePrdSortie(Request $request)
        {
            // Ajax validation et retour
            $validator = $this->validator($request->all())->validate();

            //Generation de clé unique
            $idProduit = $request->article.rand(0,10000);
            
            //Création des panier 
            if (isset($_SESSION['sortieOp'])) 
                 {
                    $count = count($_SESSION["sortieOp"]);
                    $item_array = array(
                     'qte'      => $request->quantite,
                     'prix'     => $request->prix,
                     'article'     => $request->article,
                     'idArticle'     => $request->idArticle,

                     );
                    $_SESSION["sortieOp"][$count] = $item_array;
                  }
            else{

                $item_array = array(
                 'qte'      => $request->quantite,
                 'prix'     => $request->prix,
                 'article'  => $request->article,
                'idArticle' => $request->idArticle,

                 );

                //Création de session
                 $_SESSION["sortieOp"][0] = $item_array;
              }
                    if (empty($_SESSION["sortieName"])) 
                    {

                       $_SESSION["sortieName"] = $request->sortieLibelle;
                       $_SESSION["sortieid"] = $request->sortieNom;
                       $_SESSION["sortieIdOp"] = $request->sortieIdOp;
                       $_SESSION["sortieNameOp"] = $request->sortieNameOp;
                    }
                //Exemple de donnée recu via le formulaire

                        // sortieNom: 11
                        // sortieLibelle: Test Operation
                        // sortieIdOp: 12
                        // sortieNameOp: MARCUS GARVEY


            return response()->json();
        }


    protected function validator(array $data)
        {
            return Validator::make($data, [
                'quantite' => 'required|min:1',
                'article' => 'required',
                'prix' => 'required|min:1',
            ]);
        }
        

    public function listPrdSortie()
    {
        // liste des produits de la sortie;
      $option_opteur = operation_has_operateur::find($_SESSION['sortieid']);
      // dd($option_opteur);
        return view('pages/principale/Operateur/listPrdSortie')->with('option_opteur', $option_opteur);
    }

    public function saveSortie(Request $request)
    {
        // Enregistrement de la sortie

                if (!empty($_SESSION['sortieOp']))
                    {
                        //Generation du matricule de la sortie
                        $matricule = "SRT#".date("d/m/y")."#".rand(0,1000); 
                        // dd($matricule);


                        $sortie = sortieOp::create([
                        'matSortie'=> $matricule,
                        "libelleSortie" => 'Sortie_'.$_SESSION['sortieName'],
                        "option_opteur_id" =>(int)$_SESSION["sortieid"],
                        "dateSortie"        => $request->dateSortie
                                    // 'produits_id' => $value['idArticle']
                                    ]);
                                $prixTotal = 0;
                                $qteTotal = 0;
                        foreach ($_SESSION['sortieOp'] as $key => $value)
                            {
                               $arrayPrdArriv = [
                                        "montant" => $value['prix'],
                                        "qte" => $value['qte'],
                                        "sortieOp_id"  => $sortie->id,
                                        "produits_id"  =>$value['idArticle']
                                                ];
                                    $prixTotal += $value['prix']*$value['qte'];
                                    $qteTotal += $value['qte'];
                                sortieOp_has_produits::create($arrayPrdArriv);

                            }
                                $sortie->quantiteS = $qteTotal;
                                $sortie->montantS= $prixTotal;
                                $sortie->save();
                                $opt_has_ope = operation_has_operateur::where('id','=',(int)$_SESSION["sortieid"])->get()->first();
                                // dd($opt_has_ope->montant);
                                $opt_has_ope->montant_restant = $opt_has_ope->montant_restant - $prixTotal;
                                $opt_has_ope->save();
                            }


                        return $this->suprSortie();

    }

    public function suprPrdSortie(Request $request)
    {
        //Supression d'un produits de la sortie

            $nbr =(int)$request->NumArt; //conversion en entier
            unset($_SESSION['sortieOp'][$nbr]);
            return response()->json();
    }
    public function suprSortie()
    {

                unset($_SESSION['sortieOp']); // vidage de session panier
                unset($_SESSION['sortieName']); // vidage de session panier
                unset($_SESSION['sortieid']); // vidage de session panier
                unset($_SESSION["sortieNameOp"]); //vidage du nom de l'operateur
                unset($_SESSION["sortieIdOp"]); // vidage de l'Id de la sortie
            return response()->json();

    }

    public function p_listeSortie(Request $request)
    {
        $sorties = sortie_ops::where('operationsOperateurs_id','=',$request->idOpt)->paginate(10);
        // dd($sorties);
        $operateur = operateur::find($request->idOp);

        return view('pages/principale/Operateur/p_listeSortie')
               ->withSorties($sorties)
               ->withOperateur($operateur);


    }

    public function p_opRecuSorti(Request $request)

    {
         $OpTion = DB::table('sortie_op_has_produits')
            ->join('produits','produits.id','=','sortie_op_has_produits.produits_id')
            ->select('produits.*', 'sortie_op_has_produits.*')
            ->where('sortie_op_has_produits.sortieOp_id','=',$request->idOpVe)
            ->get();

            //Variable contenant la somme total investir
            $somTotal = 0;


      $output ='<div class="d-flex justify-content-center">
                <h5 class="text-900">Reçu d\' opération de sortie</h5>
              </div>
              <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="bg-200 text-900">
                    <tr>
                      <th class="border-0">Produit</th>
                      <th class="border-0 text-center">Prix</th>
                      <th class="border-0 text-center">Prix Achat</th>
                      <th class="border-0 text-right">Qte</th>
                      <th class="border-0 text-right">Montant</th>
                    </tr>
                  </thead>
                  <tbody >';

                for ($i=0; $i < count($OpTion) ; $i++){
         $output .='<tr>
                      <td class="align-middle">
                        <h6 class="mb-0 text-nowrap"> '.$OpTion[$i]->produitLibele.' </h6>
                      </td>
                      <td class="align-middle text-center">'.$OpTion[$i]->produitPrix.'</td>
                      <td class="align-middle text-center">'.$OpTion[$i]->montant.'</td>
                      <td class="align-middle text-right">'.$OpTion[$i]->qte.'</td>
                      <td class="align-middle text-right">'.$OpTion[$i]->montant * $OpTion[$i]->qte.'</td>
                    </tr>';
            $somTotal += $OpTion[$i]->montant * $OpTion[$i]->qte;
                  }
        $output .='</tbody>
                </table>
              </div>
              <div class="row no-gutters justify-content-end">
                <div class="col-auto">
                  <table class="table table-sm table-borderless fs--1 text-right">
                    <tr>
                      <th class="text-900">Subtotal:</th>
                      <td class="font-weight-semi-bold"> '.$somTotal.' </td>
                    </tr>
                    <tr>
                      <th class="text-900">Tax 0%:</th>
                      <td class="font-weight-semi-bold"> '.$somTotal.' </td>
                    </tr>
                    <tr class="border-top">
                      <th class="text-900">Total:</th>
                      <td class="font-weight-semi-bold text-danger"> '.$somTotal.' </td>
                    </tr>
                  </table>
                </div>
              </div>';

              return $output;
    }





}

