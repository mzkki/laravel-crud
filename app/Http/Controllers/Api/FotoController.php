<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;
use Exception;
use PhpParser\Node\Expr\Throw_;
use Throwable;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Foto::with('album')->get();
        try {
            if (!$fotos) {
                throw new Exception();
            } else {
                return response()->json([
                    'success' => true,
                    'response' => 200,
                    'message' => 'fotos found',
                    'data' => $fotos
                ]);
            }
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 404,
                'message' => 'fotos not found'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = new Foto;
        try {
            $foto->nama = $request->nama;
            $foto->url = $request->url;
            $foto->album_id = $request->album_id;
            $foto->save();
            return response()->json([
                'success' => true,
                'response' => 201,
                'message' => 'foto created',
                'data' => $foto
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 400,
                'message' => 'bad request'
            ]);
        }
        // $foto->nama = $request->nama;
        // $foto->url = $request->url;
        // $foto->album_id = $request->album_id;
        // $result = $foto->save();
        // if ($result) {
        //     return ["result" => "berhasil menambahkan foto " . $request->nama];
        // }
        // return ["result" => "gagal menambahkan foto " . $request->nama];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = Foto::find($id);
        try {
            if (!$foto) {
                throw new Exception();
            }
            return response()->json([
                'success' => true,
                'response' => 200,
                'message' => 'berhasil memanggil data',
                'data' => $foto
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 404,
                'message' => 'data tidak ditemukan'
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
        $foto = Foto::find($id);

        try {
            $foto->nama = $request->nama;
            $foto->url = $request->url;
            $foto->album_id = $request->album_id;
            $foto->save();
            return response()->json([
                'success' => true,
                'response' => 200,
                'message' => 'foto berhasil diubah',
                'data' => $foto
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 400,
                'message' => 'bad request'
            ]);
        }

        // $foto->nama = $request->nama;
        // $foto->url = $request->url;
        // $foto->album_id = $request->album_id;
        // $result = $foto->save();
        // if ($result) {
        //     return ['berhasil' => 'berhasil mengubah data ' . $request->nama];
        // }
        // return ['gagal' => 'gagal mengubah data ' . $request->nama];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::find($id);

        try {
            if (!$foto) {
                throw new Exception();
            } else {
                $foto->delete();
                return response()->json([
                    'success' => true,
                    'response' => 200,
                    'message' => 'foto berhasil dihapus',
                    'data' => $foto
                ]);
            }
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'response' => 404,
                'message' => 'foto not found',
                'id' => $id
            ]);
        }

        // $result = $foto->delete();
        // if ($result) {
        //     return ['berhasil' => 'berhasil menghapus foto ' . $foto->nama];
        // }
        // return ['gagal' => 'berhasil menghapus foto '];
    }
}
