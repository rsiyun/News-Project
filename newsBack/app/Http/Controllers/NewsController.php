<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('news')->join('categories', 'categories.categoryId', '=', 'news.categoryId')->select('news.*', 'categories.category')->get();
        return response()->json(["message" => "Data berhasil di ambil", "data" => $data], 200);
    }

    public function showByCategory($categoryId){
        $data = DB::table('news')->join('categories', 'categories.categoryId', '=', 'news.categoryId')->select('news.*', 'categories.category')->where('news.categoryId', '=', $categoryId)->get();
        return response()->json(["message" => "Data berhasil di ambil", "data" => $data], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('headLineImage')) {
            $this->validate($request, [
                'categoryId' => 'required|numeric',
                'slug' => 'required|unique:news',
                'headLineImage' => 'required',
                'title' => 'required',
                'newsContent' => 'required'
            ]);
            $img = $request->file('headLineImage')->getClientOriginalName();
            $request->file('headLineImage')->move('img/news', $img);
            $data = [
                'categoryId' => $request->input('categoryId'),
                'slug' => $request->input('slug'),
                'headLineImage' => url('img/news/' . $img),
                'title' => $request->input('title'),
                'newsContent' => $request->input('newsContent')
            ];
            $news = News::create($data);
            if ($news) {
                return response()->json([
                    'pesan' => 'Data Sudah ditambahkan'
                ]);
            }
        } else {
            return response()->json('gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = DB::table('news')->join('categories', 'categories.categoryId', '=', 'news.categoryId')->select('news.*', 'categories.category')->where('news.slug', '=', $slug)->get();
        return response()->json(["message" => "Data berhasil di ambil", "data" => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'categoryId' => 'required|numeric',
            'slug' => 'required|unique:news',
            'title' => 'required',
            'newsContent' => 'required'
        ]);
        if ($request->hasFile('headLineImage')) {

            $img = $request->file('headLineImage')->getClientOriginalName();
            $request->file('headLineImage')->move('upload', $img);
            $data = [
                'categoryId' => $request->input('categoryId'),
                'slug' => $request->input('slug'),
                'headLineImage' => url('img/news/' . $img),
                'title' => $request->input('title'),
                'newsContent' => $request->input('newsContent')
            ];
        } else {
            $data = [
                'categoryId' => $request->input('categoryId'),
                'slug' => $request->input('slug'),
                // 'headLineImage' => url('img/news/' . $img),
                'title' => $request->input('title'),
                'newsContent' => $request->input('newsContent')
            ];
        }
        // return response()->json($data);
        $news = News::where('newsId', $id)->update($data);
        if ($news) {
            return response()->json([
                'pesan' => 'Data Sudah diupdate'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::where('newsId', $id)->delete();
        if ($news) {
            return response()->json([
                'pesan' => 'Data Sudah dihapuskan'
            ]);
        }
    }
}
