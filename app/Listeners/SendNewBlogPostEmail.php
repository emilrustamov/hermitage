<?php

namespace App\Listeners;

use App\Events\NewBlogPost;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SendNewBlogPostEmail
{
    public function handle(NewBlogPost $event)
    {
        $subscribers = Subscriber::where('status', 'Active')->get();
        $link = url('/blogs/' . $event->blog->id);

        foreach ($subscribers as $subscriber) {
            $subject = 'New Blog Post: ' . $event->blog->title_ru;
            $body = 'We have published a new blog post: <strong>' . $event->blog->title_ru . '</strong><br><br>';
            
            Mail::to($subscriber->email)->send(new Websitemail($subject, $body));
        }
    }
}
