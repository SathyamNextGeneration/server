<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Validator;
use DB;
class StateController extends Controller
{
    private $stateModel;

    public function index(Request $request)
    {
      //  dd($request);
        # code...

        $data=new State;
        if($request->has('id'))
            $data=$data->find($request->id);
        
        $pagination=$data->paginate(20);
        
        // dd($pagination);
        // 
        return view('admin.state.index',compact(['pagination']));

    }


    public function create(Request $request)
    {
        # code...

        $state=State::pluck('title','id');
        return view('admin.state.create',compact(['state']));
    }


    public function store(Request $request)
    {
        # code...

       $validator = Validator::make($request->all(), [
            'title' => 'required|unique:states|max:255',
            'population' => 'required',
            'letter' => 'required',
            'iso' => 'required',
        ]);
        
        if ($validator->fails()) {
            if($request->ajax()){
                return response()->json($validator);
               }else {
            return redirect('admin/state/create')->withErrors($validator)->withInput();
                }
        }

        $state=new State;
        $state->title=$request->title;
        $state->population=$request->population;
        $state->letter=$request->letter;
        $state->iso=$request->iso;
        $state->slug=str_replace(' ','-',$request->title);
        $state->save();

       if($request->ajax()){
        return response()->json(['message' => 'State Created Successfully','status'=>'success']);
       }else {
        return redirect('admin/state')->with('success','State Created Successfully');
       }
        
        
    }


    public function edit(Request $request,$id)
    {
        # code...
        
        $data=State::find($id);
        return view('admin.state.edit',compact(['data']));
    }



    public function update(Request $request,$id)
    {
        

        $state=State::find($id);
        $state->title=$request->title;
        $state->population=$request->population;
        $state->letter=$request->letter;
        $state->iso=$request->iso;
        $state->slug=str_replace(' ','-',$request->title);
        $state->save();

        if($request->ajax()){
            return response()->json(['message' => 'State Updated Successfully','status'=>'success']);
           }else {
            return redirect('admin/state')->with('success','State Updated Successfully');
           }
        
        
    }



    public function destroy(Request $request,$id)
    {
        # code...

        State::find($id)->delete();

        return redirect('admin/state')->with('success','state Deleted Successfully');

        
        
    }

}
