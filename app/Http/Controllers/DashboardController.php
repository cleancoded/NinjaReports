<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\User;
use App\Payment;  
use Auth; 
class DashboardController extends Controller
{
    public function home(){
        // dd(session()->all());
        return view('dashboard/home');
    }

    public function seo_audit(){
        return view('dashboard/seo_audit');
    }

    public function seo_analysis(){
        return view('dashboard/seo_analysis');
    }
    public function account(){
        $Payment=Payment::where('user_id',auth()->user()->id)->where('status',1)->first();
        if($Payment['product_id']){
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET_KEY')
            );
            $product = $stripe->products->retrieve(
                $Payment['product_id'],
                []
            );
            $status = $Payment['status'];

        }else{
            $product = 'N/A';
            $status = 'N/A';
        }
        return view('dashboard/account',compact('product','status'));
    }
    public function subscription(){
        if(!empty(auth()->user()->id)) {
        $Payment=Payment::where('user_id',auth()->user()->id)->where('status',1)->first();
        if($Payment['product_id']){
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET_KEY')
            );
            $product = $stripe->products->retrieve(
                $Payment['product_id'],
                []
            );
            $status = $Payment['status'];

        }else{
            $product = 'N/A';
            $status = 'N/A';
        }
    } else {
        $status = 0;
    }
        return view('dashboard/subscription',compact('product','status'));
    }
    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('/');
    }

    public function cancelSubscription(){
        $Payment=Payment::where('user_id',auth()->user()->id)->where('status',1)->first();
        //dd($Payment['subscription_id']);
        if($Payment){
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET_KEY')
            );
            $stripe->subscriptions->cancel(
                $Payment['subscription_id'],
                []
            );
        }
        $Payment->status = 0;
        $Payment->save();
        return redirect('/account')->with('message', 'Subscription cancelled successfully.');
    }
    public function pricing(){
        return view('dashboard/pricing');
    }
}
