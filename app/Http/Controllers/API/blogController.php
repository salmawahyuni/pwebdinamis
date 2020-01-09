<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\blog;
class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "Masuk Index Blog";
        return blog::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kategori_id' => 'required|string|max:30',
            'user_id' => 'required|string|max:30',
            'judul' => 'required|string|max:30',
            'isi' => 'required|string|max:30',
            'jumlah_baca' => 'required|string|max:30',
        ]);

        return blog::create([
            'id' =>$request['id'],
            'kategori_id' =>$request['kategori_id'],
            'user_id' =>$request['user_id'],
            'judul' =>$request['judul'],
            'isi' =>$request['isi'],
            'jumlah_baca' =>$request['jumlah_baca'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog =Blog::findOrFail($id);
        $blog->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    }
}
