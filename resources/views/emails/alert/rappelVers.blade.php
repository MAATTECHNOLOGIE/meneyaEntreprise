@component('mail::message')
# Hello !!!

<p>Chers collaborateurs veuillez vous acquiter de votre 
	versement N° <span>{{ $elemnt['matVers'] }}</span> 
	de valeur <span>{{ formatPrice($elemnt['mntVers']) }}</span> 
	 demandé par votre agence Principal.
</p>

 Montant Restant : {{ formatPrice($elemnt['mntRst']) }}<br>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
