<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class articleConfiguration extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.article.article', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id); // Cari data berdasarkan ID, jika tidak ada maka 404
        $content = json_decode($article->content); // Decode JSON ke dalam objek

        return view('articles.articledetail', compact('article','content')); // Kirim data ke view
    }

    public function store(Request $request){
        $validate = $request->validate([
            // 'title' => 'required',
            'content' => 'required'
        ]);

        $articles = new Article();
        $articles->title = $request->title;
        $articles->content = json_encode($request->content);
        $articles->created_by = Auth::user()->id;
        $articles->save();

        $res = ['msg' => 'Post created successfully'];

        return redirect()->route('admin.article')->with('success', 'Article saved successfully');
    }

    public function update($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.article.update-article', ['article' => $article]);
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|array', // Ensure content is array
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = json_encode($request->content);
        $article->created_by = Auth::id();
        $article->save();

        return redirect()->route('admin.article')->with('success', 'Article saved successfully');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create-article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
            return redirect()->back()->with('success', 'Voucher Deleted Successfully');
        }

        return redirect()->back()->withErrors(['code' => 'Voucher Not Found']);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Simpan gambar ke storage/public/images/articles
            $path = $file->store('images/articles', 'public');

            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => asset('storage/' . $path), // Kembalikan URL gambar
                ]
            ]);
        }

        return response()->json(['success' => 0, 'message' => 'Upload failed']);
    }


    public function fetch(Request $request)
    {
        $url = $request->input('url');

        // Lakukan validasi atau pengambilan gambar dari URL, jika perlu

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => $url // Kembalikan URL gambar
            ]
        ]);
    }
}
