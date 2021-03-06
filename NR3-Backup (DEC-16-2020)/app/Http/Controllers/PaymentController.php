<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Payment;   
class PaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment($id)
    {
        $id = $id;
        return view('dashboard/payment',compact('id'));
    }
  
    public function stripePost(Request $request,$id)
    {
        $Payment=Payment::where('user_id',auth()->user()->id)->where('status',1)->first();
        
        $stripe = new \Stripe\StripeClient(
            'sk_test_R5yp5YcSzHXQFP41vvKCSh9v'
          );

        if(!empty($Payment->subscription_id) && $Payment->status == 1){
            
            if($id == 1){
                if($Payment->plan_id ==1){
                    return redirect('/account')->with('message', 'You already subscribe this plan.');
                }else{
                    $plan_id = '1';
                    $no_allowed_site = '300';
                    $no_allowed_audits = '25';
                    $retrive= $stripe->subscriptions->retrieve(
                        $Payment->subscription_id,
                        []
                    );
                    
                        $charge = $stripe->subscriptions->update(
                        $Payment->subscription_id,
                        [
                
                            'items' => [
                                [
                                'id' => $retrive->items->data[0]->id,
                                'price' => 'Enter Webmaster product price ID.',
                                ],
                            ],
                        ]);
                        $subscribe = array(
                            'user_id'           => auth()->user()->id,
                            'subscription_id'   => $charge->id,
                            'plan_id'           => $plan_id,
                            'no_allowed_analysis'   => $no_allowed_site,
                            'no_allowed_audits'   => $no_allowed_audits,
                            'currency'          => $charge->plan->currency,
                            'amount'            => $charge->plan->amount,
                            'interval'          => $charge->plan->interval,
                            'product_id'        => $charge->plan->product,
                            'trial_start'       => $charge->trial_start,
                            'trial_end'         => $charge->trial_end,
                            'current_period_start'  => $charge->current_period_start,
                            'current_period_end'    => $charge->current_period_end,
                            'status'  => 1
                        );
                        Payment::where('user_id',auth()->user()->id)->where('status',1)->update($subscribe);
                        return redirect('/account')->with('message', 'Subscription Updated successfully.');    
                }   
            }else if($id == 2){
                if($Payment->plan_id ==2){
                    return redirect('/account')->with('message', 'You already subscribe this plan.');
                }else{
                    $plan_id = '2';
                    $no_allowed_site = '500';
                    $no_allowed_audits = '100';
                    $retrive= $stripe->subscriptions->retrieve(
                        $Payment->subscription_id,
                        []
                    );
                    //dd($retrive);
                    $charge = $stripe->subscriptions->update(
                        $Payment->subscription_id,
                        [
                            'items' => [
                                [
                                'id' => $retrive->items->data[0]->id,
                                'price' => 'Enter Business product price ID.',
                                ],
                            ],
                        ]);
                        $subscribe = array(
                            'user_id'           => auth()->user()->id,
                            'subscription_id'   => $charge->id,
                            'plan_id'           => $plan_id,
                            'no_allowed_analysis'   => $no_allowed_site,
                            'no_allowed_audits'   => $no_allowed_audits,
                            'currency'          => $charge->plan->currency,
                            'amount'            => $charge->plan->amount,
                            'interval'          => $charge->plan->interval,
                            'product_id'        => $charge->plan->product,
                            'trial_start'       => $charge->trial_start,
                            'trial_end'         => $charge->trial_end,
                            'current_period_start'  => $charge->current_period_start,
                            'current_period_end'    => $charge->current_period_end,
                            'status'  => 1
                        );
                        Payment::where('user_id',auth()->user()->id)->where('status',1)->update($subscribe);
                        return redirect('/account')->with('message', 'Subscription Updated successfully.');  
                }  
            }else if($id == 3){
                if($Payment->plan_id == 3){
                    return redirect('/account')->with('message', 'You already subscribe this plan.');
                }else{
                    $plan_id = '3';
                    $no_allowed_site = '500';
                    $no_allowed_audits = '250';
                    $retrive= $stripe->subscriptions->retrieve(
                        $Payment->subscription_id,
                        []
                    );

                    $charge = $stripe->subscriptions->update(
                        $Payment->subscription_id,
                        [
                
                            'items' => [
                                [
                                'id' => $retrive->items->data[0]->id,
                                'price' => 'Enter Agency product price ID.',
                                ],
                            ],
                        ]);
                        $subscribe = array(
                            'user_id'           => auth()->user()->id,
                            'subscription_id'   => $charge->id,
                            'plan_id'           => $plan_id,
                            'no_allowed_analysis'   => $no_allowed_site,
                            'no_allowed_audits'     => $no_allowed_audits,
                            'currency'          => $charge->plan->currency,
                            'amount'            => $charge->plan->amount,
                            'interval'          => $charge->plan->interval,
                            'product_id'        => $charge->plan->product,
                            'trial_start'       => $charge->trial_start,
                            'trial_end'         => $charge->trial_end,
                            'current_period_start'  => $charge->current_period_start,
                            'current_period_end'    => $charge->current_period_end,
                            'status'  => 1
                        );
                        Payment::where('user_id',auth()->user()->id)->where('status',1)->update($subscribe);
                        return redirect('/account')->with('message', 'Subscription Updated successfully.'); 
                }       
            }
           
           
        }else{
            if($id == 1){
                $customer = $stripe->customers->create([
                    "email"       => auth()->user()->email,
                    "name"        => auth()->user()->name,
                    "source" => $request->stripeToken
                ]);

                $charge = $stripe->subscriptions->create([
                        "customer" => $customer->id,
                        "trial_period_days" => 7,
                        'items' => [
                            ['price' => 'Enter Webmaster product price ID.'],
                        ],
                    
                ]);
                $plan_id = '1';
                $no_allowed_site = '300';
                $no_allowed_audits = '25';
            }else if($id == 2){
                $customer = $stripe->customers->create([
                    "email"       => auth()->user()->email,
                    "name"        => auth()->user()->name,
                    "source" => $request->stripeToken
                ]);

                $charge = $stripe->subscriptions->create([
                        "customer" => $customer->id,
                        "trial_period_days" => 7,
                        'items' => [
                            ['price' => 'Enter Business product price ID.'],
                        ],
                    
                ]);
                $plan_id = '2';
                $no_allowed_site = '500';
                $no_allowed_audits = '100';
            }else if($id == 3){
                $customer = $stripe->customers->create([
                    "email"       => auth()->user()->email,
                    "name"        => auth()->user()->name,
                    "source" => $request->stripeToken
                ]);

                $charge = $stripe->subscriptions->create([
                        "customer" => $customer->id,
                        "trial_period_days" => 7,
                        'items' => [
                            ['price' => 'Enter Agency product price ID.'],
                        ],
                    
                ]);
                $plan_id = '3';
                $no_allowed_site = '500';
                $no_allowed_audits = '250';
            }
            $create_user = new Payment;
            $create_user->user_id = auth()->user()->id;
            $create_user->subscription_id = $charge->id;
            $create_user->plan_id = $plan_id;
            $create_user->no_allowed_analysis = $no_allowed_site;
            $create_user->no_allowed_audits = $no_allowed_audits;
            $create_user->currency = $charge->plan->currency;
            $create_user->amount = $charge->plan->amount;
            $create_user->interval = $charge->plan->interval;
            $create_user->product_id = $charge->plan->product;
            $create_user->trial_start = $charge->trial_start;
            $create_user->trial_end = $charge->trial_end;
            $create_user->current_period_start = $charge->current_period_start;
            $create_user->current_period_end = $charge->current_period_end;
            $create_user->status = '1';
            $create_user->save();
        }
        return redirect('/account')->with('message', 'Payment Success');
        // dd($charge);
    }
    
}