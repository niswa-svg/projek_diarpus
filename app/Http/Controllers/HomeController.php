<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Archive;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::with('category')->latest()->take(3)->get();
        $settings = Setting::first();
        
        return view('home', compact('latestNews', 'settings'));
    }

    public function news()
    {
        $news = News::with('category')->latest()->paginate(6);
        $settings = Setting::first();
        
        return view('news', compact('news', 'settings'));
    }

    public function newsDetail($id)
    {
        $news = News::with('category')->findOrFail($id);
        $settings = Setting::first();
        
        return view('news-detail', compact('news', 'settings'));
    }

    public function profile()
    {
        $settings = Setting::first();
        return view('profile', compact('settings'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(9);
        $settings = Setting::first();
        
        return view('gallery', compact('galleries', 'settings'));
    }

    public function archives()
    {
        $archives = Archive::latest()->paginate(10);
        $settings = Setting::first();
        
        return view('archives', compact('archives', 'settings'));
    }

    public function contact()
    {
        $settings = Setting::first();
        return view('contact', compact('settings'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Simpan pesan ke database atau kirim email
        // Untuk sementara, kita hanya redirect dengan pesan sukses
        
        return redirect()->route('contact')->with('success', 'Pesan berhasil dikirim!');
    }
}