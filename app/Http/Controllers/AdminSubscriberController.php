<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\Vacancy;
use App\Models\Project;
use App\Models\Blog;



class AdminSubscriberController extends Controller
{
    public function show_all()
    {
        $subscribers = Subscriber::where('status', 'Active')->get();
        return view('subscriber_all', compact('subscribers'));
    }

    public function send_email()
    {
        return view('subscriber_send_email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->message;

        $subscribers = Subscriber::where('status', 'Active')->get();
        foreach ($subscribers as $row) {
            Mail::to($row->email)->send(new Websitemail($subject, $message));
        }

        return redirect()->back()->with('success', 'Email is Sent Successfully.');
    }

    public function sendVacancyNewsletter($locale, $id)
    {
        $vacancy = Vacancy::find($id);

        if (!$vacancy) {
            return response()->json(['success' => false, 'message' => 'Vacancy not found']);
        }

        $subject = 'New Vacancy: ' . $vacancy->title_ru;
        $message = '
        <h1>' . $vacancy->title_ru . '</h1>
        <p>' . $vacancy->description_ru . '</p>
        <a href="' . route('vacancies.show', ['locale' => app()->getLocale(), 'id' => $vacancy->id]) . '">Read more</a>
    ';

        $subscribers = Subscriber::where('status', 'Active')->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Websitemail($subject, $message));
        }

        return response()->json(['success' => true, 'message' => 'Newsletter sent successfully']);
    }

    public function sendProjectNewsletter($locale, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['success' => false, 'message' => 'Project not found']);
        }

        $subject = 'New Project: ' . $project->title_ru;
        $message = '
        <h1>' . $project->title_ru . '</h1>
        <p>' . $project->description_ru . '</p>
        <a href="' . route('projects.show', ['locale' => app()->getLocale(), 'id' => $project->id]) . '">Read more</a>
    ';

        $subscribers = Subscriber::where('status', 'Active')->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Websitemail($subject, $message));
        }

        return response()->json(['success' => true, 'message' => 'Newsletter sent successfully']);
    }


    public function sendBlogNewsletter($locale, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['success' => false, 'message' => 'Blog not found']);
        }

        $subject = 'New Blog Post: ' . $blog->title_ru;
        $message = '
        <h1>' . $blog->title_ru . '</h1>
        <p>' . $blog->description_ru . '</p>
        <a href="' . route('blogs.show', ['locale' => app()->getLocale(), 'id' => $blog->id]) . '">Read more</a>
    ';

        $subscribers = Subscriber::where('status', 'Active')->get();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new Websitemail($subject, $message));
        }

        return response()->json(['success' => true, 'message' => 'Newsletter sent successfully']);
    }
}
