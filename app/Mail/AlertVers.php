<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertVers extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $elemnt;
    public $myTitle;
    public function __construct($myTitle = NULL,$elemnt)
    {
        $this->myTitle = is_null($myTitle) ? "ALERT MENEYA": $myTitle;
        $this->elemnt = is_null($elemnt) ? "Aucun produit en seuil d'alerte": $elemnt;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //Rappel de paiement de versement
        if ($this->myTitle =='Rappel') 
        {
            return $this->subject('Rappel Versement')
                ->from('meneya@noreply.com')
                ->markdown('emails.alert.rappelVers');        
        }

        //Demande de versement
        if ($this->myTitle =='Demande') 
        {
            return $this->subject('Deamnde de Versement')
                ->from('meneya@noreply.com')
                ->markdown('emails.alert.demandVers');        
        }

        //Notif  payement fait
        return $this->subject($this->myTitle)
                ->from('meneya@noreply.com')
                ->markdown('emails.alert.payVers');
    }
}
