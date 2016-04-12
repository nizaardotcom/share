<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class Profil2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function profil()
     {
       return view('profil');
     }

    public function hasil(Request $request)
     {
       // PERTAMA KALI LAKUKAN VALIDASI
       $validasi = $this->validation($request);
       if ($validasi['status'] == 'success') {
         echo "validasi berhasil";
       } else {
         echo "validasi gagal";

         foreach ($validasi['message']->messages() as $error_key => $error_message) {
           echo "Inputan " . $error_key;
           echo "<br>";
           echo "<ul>";
           foreach ($error_message as $e_message) {
             echo "<li>";
             echo $e_message;
             echo "</li>";
           }
           echo "</ul>";
         }
        //  dd($validasi['message']);
       }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return view (HTML)
     */
    public function create()
    {
        return view('formproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation(Request $request)
    {
      $return = array();

      $rules = array(
          'nama'        => 'required',
          'jk'          => 'required',
          'kondisi'     => 'required',
          'harga'       => 'required|integer',
          'ket'         => 'required',
          '_token'      => 'required',
      );
        $messages = array(
            'required'  => 'Kolom ini harus diisi.',
            'integer'   => 'Kolom ini harus berisi angka',
        );

        $validator  = Validator::make($request->all(), $rules, $messages);

        if (!$validator->fails()){
          $return['status'] = 'success';
        } else {
          $return['status'] = 'error';
          $return['message'] = $validator->messages();
        }
        return $return;
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
      'nama' => 'required',
      'jk' => 'required|unique:posts',
      'kondisi' => 'required',
      'harga' => 'required|numeric',
      'keterangan' => 'max:450',
    ]);
    }

    public function ajax_validate(Request $request)
    {
      return $this->validation($request);
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
        //return view('hasil');
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
