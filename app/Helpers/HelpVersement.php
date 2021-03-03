<?php 
  use App\Model\versement;
  use App\Model\succursale;

  
  function readSurc($id)
  {
  	//Lecture de la succursale en fonction de l'id Succursale
  	 $sucurId = succursale::where('id','=',$id)->get()->first();
  	 return $sucurId;
  }


 	
?>
