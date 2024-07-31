<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use App\Http\Controllers\UserController;

class RegisterController extends Controller
{
    use RegistersUsers {
        register as protected originalRegister;
    }

    protected $redirectTo = '/ru';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact' => ['required', 'string', 'max:255'],
            'subscribe_to_blog' => ['nullable', 'boolean'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'company_name' => $data['company_name'] ?? null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contact' => $data['contact'],
            'subscribe_to_blog' => isset($data['subscribe_to_blog']) && $data['subscribe_to_blog'] ? true : false,
            'status' => 'pending',
            'is_admin' => false,
        ]);

        if (isset($data['subscribe_to_blog']) && $data['subscribe_to_blog']) {
            $token = hash('sha256', time());

            Subscriber::create([
                'email' => $data['email'],
                'token' => $token,
                'status' => 'Pending',
            ]);

            // Send email
            $subject = 'Please Confirm Subscription';
            $verification_link = route('subscriber_verify', ['locale' => app()->getLocale(), 'token' => $token, 'email' => urlencode($data['email'])]);
            $message = '
                <p>Please click on the following link to verify your subscription:</p>
                <p><a href="' . $verification_link . '">' . $verification_link . '</a></p>
                <p>If you received this email by mistake, simply delete it. You will not be subscribed if you do not click the confirmation link above.</p>
            ';

            Mail::to($data['email'])->send(new Websitemail($subject, $message));
        }

        return $user;
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect('/')->with('message', 'Спасибо за регистрацию, ожидайте, пока Вас примет модератор.');
    }
}
