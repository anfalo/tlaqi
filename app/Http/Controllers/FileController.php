<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(isset($request->add)) {
            $this->validate($request, [
                'name'      => 'required',
                'file'      => 'required|mimes:jpeg,png,pdf'
            ]);

            $file_name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->move('uploads',$file_name);

            $file = new File;
            
            $file->user_id = Auth::id();
            $file->owner_id = Auth::id();
            $file->name = $request->name;
            $file->file = $path;
                    
            $file->save();
        } elseif(isset($request->forward)) {
            foreach ($request->files1 as $file_id) {
                $file = File::findOrFail($file_id);

                $forward = new File;

                $forward->user_id = $request->user_id;
                $forward->owner_id = $file->owner_id;
                $forward->name = $file->name;
                $forward->file = $file->file;
                
                $forward->save();
            }
        }

        $files = File::where('user_id', Auth::id())->get();
        return redirect()->action('HomeController@index')->with(['files' => $files]);
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
