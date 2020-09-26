<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\categories;

class productController extends Controller
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
        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $product=array(

        'image'=>$new_name,
        'p_name' =>$request->pname,
        'cat_id'=>$request->cid,
        'price'=>$request->price,
        'status'=>1,
        'desc'=>$request->desc,
    );
        products::create($product);
        return redirect('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=products::all();
        return view('viewproduct',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat= $data=categories::all();
        $data=products::find($id);
        return view('edit',compact('data','cat'));
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
       
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'pname'    =>  'required',
                'desc'     =>  'required'
            ]);
        }

        $form_data = array(
            'p_name'    =>  $request->pname,
            'price'     =>  $request->price,
            'image'    =>  $image_name,
            'desc'    =>$request->desc,
            'status'  =>1
          );

        products::whereId($id)->update($form_data);
        
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=products::find($id);
        $data->delete();
        return redirect()->back();
    }
}
