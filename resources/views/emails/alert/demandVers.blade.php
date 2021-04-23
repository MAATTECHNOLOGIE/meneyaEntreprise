@component('mail::message')
# Hello !!!

<p>Chers collaborateurs un paiement de <span>{{ formatPrice($elemnt['versMnt']) }}</span> pour le versement de valeur <span>{{ formatPrice($elemnt['versMnt']) }}</span> 
	a été reclamé par votre agence Principal pour l'exercice du .{{ $elemnt['dateDebut'] }} au {{ $elemnt['dateFin'] }} .
</p>
Montant Reclamé	   : {{ formatPrice($elemnt['versMnt']) }}<br>
Date 		   : {{ $elemnt['versDate'] }}<br>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
