<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Car;    
use App\Models\Manufacturer;    
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'create';
        $manufacturers = Manufacturer::all();
        return view('cars.edit', compact('action', 'manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $name = '';
        $this->validate($request,[
            'desc' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
            'image' => 'required',
        ],[
            'desc.required' => 'Please input description',
            'model.required' => 'Please input model',
            'produced_on.required' => 'Please input produced_on',
            'produced_on.date' => 'Please input formal date on produced_on',
            'image.required' => 'Please input image',
        ]);
        if($request->hasfile('image')){
            $this->validate($request, 
                [
                    'image' => 'mimes:jpg,png,gif,jpeg|max: 2048 '
                ],
                [   
                    'image.mimes' => 'Please input file image',
                    'image.max' => 'Please choose image file has 2Mb'
                ]
            );
            $file =$request->file('image');
            $name = 'images/'. time().'_'.  $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
        };
        $description = $request->desc;
        $model = $request->model;
        $produced_on = $request->produced_on;
        $image = $name;
        $manufacturer_id = $request->manufacturer;
        Car::insert(compact('description', 'model', 'produced_on', 'image', 'manufacturer_id'));
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cars.show', ['car' => Car::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car =  Car::find($id);
        $action = 'edit';
        $manufacturers = Manufacturer::all();
        return view('cars.edit', compact('car', 'action', 'manufacturers') );
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
        $name = '';
        $this->validate($request,[
            'desc' => 'required',
            'model' => 'required',
            'produced_on' => 'required|date',
            'image' => 'required',
        ],[
            'desc.required' => 'Please input description',
            'model.required' => 'Please input model',
            'produced_on.required' => 'Please input produced_on',
            'produced_on.date' => 'Please input formal date on produced_on',
            'image.required' => 'Please input image',
        ]);
        if($request->hasfile('image')){
            $this->validate($request, 
                [
                    'image' => 'mimes:jpg,png,gif,jpeg|max: 2048 '
                ],
                [   
                    'image.mimes' => 'Please input file image',
                    'image.max' => 'Please choose image file has 2Mb'
                ]
            );
            $file = $request->file('image');
            $name = 'images/'. $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
        };
        $description = $request->desc;
        $model = $request->model;
        $produced_on = $request->produced_on;
        $image = $name;
        $manufacturer_id = $request->manufacturer;
        Car::where('id', $id)->update(compact('description', 'model', 'produced_on', 'image', 'manufacturer_id'));
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_path = public_path('images/').Car::find($id)->image;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        Car::where('id', $id)->delete();
        return redirect('/cars');
    }
}
