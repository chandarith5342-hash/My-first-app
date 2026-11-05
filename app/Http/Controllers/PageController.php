<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function landing()
    {
        $title = 'TeachNewsdex';
        $subtitle = 'The tech news that matters, in five minutes.';

        return view('pages.landing', compact('title', 'subtitle'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function newsBlog()
    {
        return view('pages.news-blog');
    }

    public function report()
    {
        return view('pages.report');
    }

    public function profile()
    {
        $firstName = 'Art';
        $lastName = 'Chandarith';
        $fullName = $firstName . ' ' . $lastName;
        $major = 'Computer Science';
        $subjects = 'Web-Framework';

        return view('pages.profile', compact('firstName', 'lastName', 'fullName', 'major', 'subjects'));
    }
}
