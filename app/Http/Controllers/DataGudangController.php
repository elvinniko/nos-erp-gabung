<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DataGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $lokasi = DB::table('lokasis')->get();
        // return view('master.dataGudang', ['lokasi' => $lokasi]);
        $lokasi = lokasi::where('Status','OPN')->get();
        return view('master.dataGudang',['lokasi' => $lokasi]);
        //return view('master.dataGudang');

        // $lokasi = lokasi::all();
        // return view('master.dataGudang', compact('lokasi', $lokasi));
    }

    function getdata(){
        // $lokasi = DB::table('lokasis')->select('KodeLokasi','NamaLokasi','Tipe');
        $lokasi = lokasi::select('KodeGudang','NamaGudang','Tipe');
        return DataTables::of($lokasi)
        // ->addColumn('action', function($lokasi){
        //     return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$lokasi->KodeGudang.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        //     <a href="#" class="btn btn-xs btn-danger delete" id="'.$lokasi->KodeGudang.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
        // })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_id = DB::select('SELECT * FROM lokasis ORDER BY KodeLokasi DESC LIMIT 1');

        //Auto generate ID
        if($last_id == null) {
            $newID = "GUD-001";
        }
        else {
            $string = $last_id[0]->KodeLokasi;
            $id = substr($string, -3, 3);
            $new = $id+1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "GUD-".$new;
        }

        return view('master.buatForm.buatDataGudang', ['newID' => $newID]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'KodeLokasi' => 'required',
            'NamaLokasi' => 'required',
            'Tipe' => 'required'
        ]);

        DB::table('lokasis')->insert([
            'KodeLokasi' => $request->KodeLokasi,
            'NamaLokasi' => $request->NamaLokasi,
            'Tipe' => $request->Tipe,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        return redirect('/datagudang');

        // lokasi::create([
        //     'KodeLokasi' => $request->KodeLokasi,
        //     'NamaLokasi' => $request->NamaLokasi,
        //     'Tipe' => $request->Tipe
        // ]);

        // return redirect('/datagudang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lokasi = DB::table('lokasis')->get()->where('KodeLokasi',$id);
        return view('master.lihatForm.lihatDataGudang', ['lokasi' => $lokasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $lokasi = DB::table('lokasis')->get()->where('KodeLokasi',$id);
        return view('master.editForm.editDataGudang',['lokasi' => $lokasi]);

        // $lokasi = lokasi::find($id);
        // return view('master.editForm.editDataGudang', ['lokasi' => $lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'NamaLokasi' => 'required',
            'Tipe' => 'required',
        ]);

        DB::table('lokasis')->where('KodeLokasi',$request->KodeLokasi)->update([
            'NamaLokasi' => $request->NamaLokasi,
            'Tipe' => $request->Tipe,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            'updated_at' => \Carbon\Carbon::now()
        ]);
        return redirect('/datagudang');

        // $lokasi = lokasi::find($id);
        // $lokasi->NamaLokasi = $request->NamaLokasi;
        // $lokasi->Tipe = $request->Tipe;
        // $lokasi->save();
        // return redirect('/datagudang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('lokasis')->where('KodeLokasi',$id)->delete();
        // return redirect('/datagudang');
        $lokasi = lokasi::find($id);
        $lokasi->Status = 'DEL';
        $lokasi->save();
        return redirect('/datagudang');
        // $lokasi = lokasi::find($id);
        // $lokasi->delete();
        // return redirect('/datagudang');
    }

    public function filter()
    { }
}
