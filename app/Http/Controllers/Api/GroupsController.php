<?php

namespace App\Http\Controllers\Api;

use App\Models\Groups;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderby('id', 'desc') -> paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Group',
            'data' => $groups
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:255',
            'description' => 'required|numeric',
        ]);

        $g = Groups::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if($groups)
        {
            return response()->json([
                'success' => true,
                'message' => 'Group Berhasil Ditambahkan',
                'data' => $groups
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Group Gagal Ditambahkan',
                'data' => $groups
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $group = Groups::where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail data Group',
            'data' => $group
        ], 200);
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
        $groups = Groups::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Group berhasil di rubah',
            'data' => $group
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Groups::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Teman Berhasil di hapus',
            'data'    => $group
        ], 200);
    }
}
