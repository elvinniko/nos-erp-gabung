<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matauang;
use Illuminate\Support\Facades\DB;

class DataMataUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matauang = DB::table('matauangs')->where('Status','=','OPN')->get();
        return view('master.dataMataUang', ['matauang' => $matauang]);

        // $matauang = matauang::all();
        // return view('master.dataMataUang', compact('matauang', $matauang));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.buatForm.buatDataMataUang');

        // return view('master.buatForm.buatDataMataUang');
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
            'KodeMataUang' => 'required',
            'NamaMataUang' => 'required',
            'Nilai' => 'required',
        ]);

        DB::table('matauangs')->insert([
            'KodeMataUang' => $request->KodeMataUang,
            'NamaMataUang' => $request->NamaMataUang,
            'Nilai' => $request->Nilai,
            'Status' => 'OPN',
            'KodeUser' => 'Admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        return redirect('/datamatauang');

        // matauang::create([
        //     'KodeMataUang' => $request->KodeMataUang,
        //     'NamaMataUang' => $request->NamaMataUang,
        //     'Nilai' => $request->Nilai
        // ]);

        // return redirect('/datamatauang');
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
        $matauang = DB::table('matauangs')->where('KodeMataUang',$id)->get();
        return view('master.editForm.editDataMataUang',['matauang' => $matauang]);

        // $matauang = matauang::find($id);
        // return view('master.editForm.editDataMataUang', ['matauang' => $matauang]);
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
        $this->validate($request, [
            'NamaMataUang' => 'required',
            'Nilai' => 'required',
        ]);

        DB::table('matauangs')->where('KodeMataUang',$request->KodeMataUang)->update([
            'NamaMataUang' => $request->NamaMataUang,
            'Nilai' => $request->Nilai,
            'updated_at' => \Carbon\Carbon::now()
        ]);
        return redirect('/datamatauang');

        // $matauang = matauang::find($id);
        // $matauang->NamaMataUang = $request->NamaMataUang;
        // $matauang->Nilai = $request->Nilai;
        // $matauang->save();
        // return redirect('/datamatauang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('matauangs')->where('KodeMataUang',$id)->delete();
        return redirect('/datamatauang');

        // $matauang = matauang::find($id);
        // $matauang->delete();
        // return redirect('/datamatauang');
    }

    public function lihat(Request $request)
    {
        $mata = DB::table('matauangs')->select('created_at')->get();
        // echo $mata;
        // hasilnya berupa array
        // {{ "created_at" 2019-06-18 }}
        $pis = explode('-', $mata);
        echo substr($pis[0], 18, 2);
        //echo $mata;
    }
}
