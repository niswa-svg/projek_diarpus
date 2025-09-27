<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Archive;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   public function __construct()
{
    $this->middleware('auth')->except(['login']);
}
        public function dashboard()
    {
        $newsCount = News::count();
        $galleryCount = Gallery::count();
        $archiveCount = Archive::count();
        
        return view('admin.dashboard', compact('newsCount', 'galleryCount', 'archiveCount'));
    }

    // News Management
    public function newsIndex()
    {
        $news = News::with('category')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function newsCreate()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function newsStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        News::create($request->all());

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function newsEdit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        $news = News::findOrFail($id);
        $news->update($request->all());

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function newsDestroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }

    // Gallery Management
    public function galleryIndex()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function galleryCreate()
    {
        return view('admin.gallery.create');
    }

    public function galleryStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title' => $request->title,
            'image_path' => $imagePath
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function galleryDestroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }

    // Archive Management
    public function archiveIndex()
    {
        $archives = Archive::latest()->paginate(10);
        return view('admin.archives.index', compact('archives'));
    }

    public function archiveCreate()
    {
        return view('admin.archives.create');
    }

    public function archiveStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120'
        ]);

        $filePath = $request->file('file')->store('archives', 'public');

        Archive::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.archives.index')->with('success', 'Arsip berhasil ditambahkan!');
    }

    public function archiveDestroy($id)
    {
        $archive = Archive::findOrFail($id);
        Storage::disk('public')->delete($archive->file_path);
        $archive->delete();

        return redirect()->route('admin.archives.index')->with('success', 'Arsip berhasil dihapus!');
    }

    // Settings Management
    public function settings()
    {
        $settings = Setting::first();
        return view('admin.settings', compact('settings'));
    }

    public function settingsUpdate(Request $request)
    {
        $settings = Setting::first();

        $data = $request->validate([
            'site_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'organization_structure' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            if ($settings->logo) {
                Storage::disk('public')->delete($settings->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        $settings->update($data);

        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}