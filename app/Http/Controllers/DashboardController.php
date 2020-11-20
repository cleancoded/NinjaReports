<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\User;
use App\Payment;   
class DashboardController extends Controller
{
    public function home(){
        return view('dashboard/home');
    }

    public function seo_audit(){
        return view('dashboard/seo_audit');
    }

    public function seo_analysis(){
        return view('dashboard/seo_analysis');
    }
    public function account(){
        
        $Payment=Payment::where('user_id',auth()->user()->id)->first();
        if($Payment['product_id']){
            $stripe = new \Stripe\StripeClient(
                'sk_test_R5yp5YcSzHXQFP41vvKCSh9v'
            );
            $product = $stripe->products->retrieve(
                $Payment['product_id'],
                []
            );
            $status = $Payment['status'];
        }else{
            $product = '';
            $status = '';
        }
        return view('dashboard/account',compact('product','status'));
    }
    public function subscription(){
       
        return view('dashboard/subscription');
    }
    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('/');
    }

    public function cancelSubscription(){
        $Payment=Payment::where('user_id',auth()->user()->id)->first();
        //dd($Payment['subscription_id']);
        if($Payment){
            $stripe = new \Stripe\StripeClient(
                'sk_test_R5yp5YcSzHXQFP41vvKCSh9v'
            );
            $stripe->subscriptions->cancel(
                $Payment['subscription_id'],
                []
            );
        }
        $Payment->status = 0;
        $Payment->save();
        return redirect('/account')->with('message', 'Subscription Cancel  Successfully');
    }
    public function pricing(){
        return view('dashboard/pricing');
    }
}
