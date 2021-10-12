<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Exception;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();

        try {
            if (!$albums) {
                throw new Exception();
            }
            return response()->json([
                'success' => true,
                'response' => 200,
                'message' => 'berhasil memanggil data',
                'data' => $albums
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 404,
                'message' => 'data tidak ditemukan'
            ]);
        }
        // return response()->json([
        //     'success' => true,
        //     'response' => 200,
        //     'message' => 'berhasil memanggil data',
        //     'data' => $albums
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = new Album;
        try {
            $album->nama = $request->nama;
            $album->save();
            return response()->json([
                'success' => true,
                'response' => 201,
                'message' => 'berhasil menambahkan data',
                'data' => [
                    'id' => $album->id,
                    'nama' => $album->nama
                ]
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 400,
                'message' => 'bad request'
            ]);
        }
        // if ($result) {
        //     return response()->json([
        //         'success' => true,
        //         'response' => 201,
        //         'message' => 'berhasil menambahkan album',
        //         'data' => [
        //             'id' => $album->id,
        //             'nama' => $album->nama
        //         ]
        //     ]);
        // }
        // return ['Result' => "gagal"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        try {
            if (!$album) {
                throw new Exception();
            }
            return response()->json([
                'success' => true,
                'response' => 200,
                'message' => 'berhasil memanggil data',
                'data' => $album
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 404,
                'message' => 'data tidak ditemukan',
                'id' => $id
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        // $album = Album::find($id);
        // $album->nama = $request->input("nama");
        // $result = $album->save();
        // if ($result) {
        //     return response()->json([
        //         'success' => true,
        //         'response' => 200,
        //         'message' => 'berhasil mengubah data',
        //         'data' => $album
        //     ]);
        // }
        // return ["result" => "album gagal diupdate"];
        try {
            $album = Album::find($id);
            $album->nama = $request->input("nama");
            $album->save();
            return response()->json([
                'success' => true,
                'response' => 200,
                'message' => 'berhasil mengubah data',
                'data' => $album
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 400,
                'message' => 'bad request'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        try {
            if (!$album) {
                throw new Exception();
            } else {
                $album->delete();
                return response()->json([
                    'success' => true,
                    'response' => 200,
                    'message' => 'berhasil menghapus data',
                    'data' => $album
                ]);
            }
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 404,
                'message' => 'album not found',
                'id' => $id
            ]);
        }
        // if ($result) {
        //     return ["result" => 'Album id ' . $id . " telah dihapus"];
        // }
        // return ["result" => 'Album id ' . $id . " gagal dihapus"];
    }
}
