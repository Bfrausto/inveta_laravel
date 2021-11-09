<?php

namespace App\Listeners;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddToSessionAfterLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $products= Product::all();

        $clients= Client::all();
        $this->dataSales =[
            'clients'=>$clients,
            'products'=>$products
        ];
        Session::put('data', $this->dataSales);
    //
    }
}
