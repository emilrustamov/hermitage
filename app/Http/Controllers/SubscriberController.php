<?php

namespace App\Http\Controllers;

use App\Helper\Helpers;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function subscriber_form()
    {
        return view('subscribe_form');
    }

    public function index(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|unique:subscribers|max:255',
    ]);

    $token = hash('sha256', time());
    $subscriber = new Subscriber();
    $subscriber->email = $request->email;
    $subscriber->token = $token;
    $subscriber->status = 'Pending';
    $subscriber->save();

    // Send email
    $subject = 'Please Confirm Subscription';
    $verification_link = route('subscriber_verify',  ['locale' => app()->getLocale(), 'token' => $token, 'email' => urlencode($request->email)]);
    $message = '
        <p>Please click on the following link to verify your subscription:</p>
        <p><a href="' . $verification_link . '">' . $verification_link . '</a></p>
        <p>If you received this email by mistake, simply delete it. You will not be subscribed if you do not click the confirmation link above.</p>
    ';

    Mail::to($request->email)->send(new Websitemail($subject, $message));

    return redirect()->back()->with('success', 'Thanks, please check your inbox to confirm subscription');
}

    

public function verify($locale, $token, $email)
{
    $subscriber_data = Subscriber::where('token', $token)->where('email', urldecode($email))->first();

    if ($subscriber_data) {
        $subscriber_data->token = '';
        $subscriber_data->status = 'Active';
        $subscriber_data->update();

        return redirect()->back()->with('success', 'You are successfully verified as a subscriber to this system');
    } else {
        return redirect()->route('partners.index', ['locale' => $locale])->with('error', 'Verification failed, please try again.');
    }
}


}
