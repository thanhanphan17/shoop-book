<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\danhmuc;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header1',function($view){
            $loai_sach=danhmuc::all();
           
            $view->with('loai_sach',$loai_sach);

        });
        view()->composer(['header1','page.dathang'],function($view)
            {
                 if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                 $view->with(['cart'=>Session::get('cart'),'sp_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
                    }
            });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
