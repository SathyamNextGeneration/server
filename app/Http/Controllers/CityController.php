<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\City;
use Validator;
class CityController extends Controller
{
    private $stateModel;

    public function __construct(State $state)
    {
        $this->stateModel = $state;
    }

    public function getCities($stateId)
    {
        $state = $this->stateModel->find($stateId);
        $cities = $state->cities()->getQuery()->get(['id', 'title']);
        return response()->json($cities);
    }




    public function index(Request $request)
    {
      //  dd($request);
        # code...

        $data=new City;
        if($request->has('state_id'))
            $data=$data->find($request->state_id);
        
        $pagination=$data->get();
        
        //dd($data);
        return view('admin.city.index',compact(['pagination']));

    }


    public function create(Request $request)
    {
        # code...

        $state=State::pluck('title','id');
        return view('admin.city.create',compact(['state']));
    }


    public function store(Request $request)
    {
        # code...

       $validator = Validator::make($request->all(), [
            'title' => 'required|unique:cities|max:255',
            'state_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        
        if ($validator->fails()) {
         
            return redirect('admin/city/create')->withErrors($validator)->withInput();
        }
        
        $city=new City;
        $city->title=$request->title;
        $city->state_id=$request->state_id;
        $city->lat=$request->latitude;
        $city->longi=$request->longitude;
        $city->slug=str_replace(' ','-',$request->title);
        $city->status=$request->status;
        $city->save();
       
        return redirect('admin/city')->with('success','City Created Successfully');

        
        
    }


    public function edit(Request $request,$id)
    {
        # code...
        $data=City::find($id)->first();
        $state=State::pluck('title','id');
        return view('admin.city.edit',compact(['state','data']));
    }



    public function update(Request $request,$id)
    {
        # code...

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:cities|max:255',
            'state_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        
        if ($validator->fails()) {
         //   dd($validator);
            return redirect('admin/city/create')->withErrors($validator)->withInput();
        }

        $city=City::find($id);
        $city->title=$request->title;
        $city->state_id=$request->state_id;
        $city->lat=$request->latitude;
        $city->longi=$request->longitude;
        $city->slug=str_replace(' ','-',$request->title);
        $city->status=$request->status;
        $city->save();



        return redirect('admin/city')->with('success','City Updated Successfully');

        
        
    }



    public function delete(Request $request,$id)
    {
        # code...

        City::where('id',$id)->delete();

        return redirect('admin/city')->with('success','City Deleted Successfully');

        
        
    }
    public function getcity(Request $request)
    {
        //dd('test');
        $cities= City::pluck("title","id");
        //where("state_id",$request->id)->
        return response()->json($cities);
    }

}
