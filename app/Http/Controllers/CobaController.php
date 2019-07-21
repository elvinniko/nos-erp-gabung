<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Alldata()
    {
        //$data = DB::table('users')->select('*')->get();
        //struktur QueryBuilder Laravel
        $data = User::all();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                '<a onclick="showData(' . $data->id . ')" class="btn btn-primary">Show</a>' . ' ' .
                    '<a onclick="editForm(' . $data->id . ')" class="btn btn-info">Edit</a>' . ' ' .
                    '<a onclick="deleteData(' . $data->id . ')" class="btn btn-danger">Hapus</a>';
            })
            ->make(true);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href=""javascript:void(0) data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-primary editUser">Edit</a>';
                    $btn = $btn . '<a href=""javascript:void(0) data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-primary deleteUser">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.index', compact('users'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
