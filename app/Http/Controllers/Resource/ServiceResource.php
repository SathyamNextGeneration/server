<?php

namespace App\Http\Controllers\Resource;

use App\Fleet;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Setting;
use Exception;
use App\Helpers\Helper;

use App\ServiceType;
use App\ProviderService;
use App\PeakHour;
use App\ServicePeakHour;
use App\Time;
use App\GeoFencing;
use App\TimePrice;
use App\ServiceRentalHourPackage;
use App\ServiceTypeGeoFencings;
use DB;
use validate;
class ServiceResource extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('demo', ['only' => [ 'store', 'update', 'destroy']]);
        $this->middleware('permission:service-types-list', ['only' => ['index']]);
        $this->middleware('permission:service-types-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-types-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-types-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //DB::select("ALTER TABLE `service_types_geo_fencings`  ADD `city_limits` VARCHAR(255) NULL DEFAULT NULL  AFTER `service_type_id`;");
        
        $services = ServiceType::all();

        $geofencing = GeoFencing::all(); 
        if($request->ajax()) {
            return response()->json(['services' => $services,'geofencing' => $geofencing]);

        } else {
            return view('admin.service.index', compact('services','geofencing'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $geofencing = GeoFencing::all(); 
        $Peakhour =  PeakHour::get();
        
        return view('admin.service.create', compact('geofencing','Peakhour'));
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
            'name' => 'required|max:255',
            'provider_name' => 'required|max:255',
            // 'capacity' => 'required|numeric',
            'fixed' => 'required|numeric',
            // 'price' => 'required|numeric',
            // 'minute' => 'required|numeric',
            'outstation_driver' => 'required|numeric',
            'rental_fare' => 'required|numeric',
            'outstation_km' => 'required|numeric',
            'roundtrip_km' => 'required|numeric',
            'waiting_free_mins' => 'required|numeric',
            'waiting_min_charge' => 'required|numeric',

            // 'distance' => 'required|numeric',
            'calculator' => 'required|in:MIN,HOUR,DISTANCE,DISTANCEMIN,DISTANCEHOUR',
            'image' => 'mimes:ico,png,jpg'
        ]);

        try {
            $service = $request->all();

            if($request->hasFile('image')) {
                $service['image'] = Helper::upload_picture($request->image);
            }
            $service['price'] = 0;
            $service['minute'] = 0;
            $service['distance'] = 0;
            $service = ServiceType::create($service);
//dd($request->all());
            if($request->peak_price){

                foreach ($request->peak_price as $key => $value) {

                    if($request->peak_price[$key]>0){
                        $service_map = ServicePeakHour::create(['service_type_id'=>$service->id,'peak_hours_id'=>$key,'min_price'=>$request->peak_price[$key]]);
                    }

                }

            }

            if($service)
            {
                
                foreach ($request->geo_fencing as $key => $value)
                {   
                        $insert = new ServiceTypeGeoFencings();
                        $insert->geo_fencing_id=$key;
                        $insert->service_type_id=$service->id;
                        $insert->distance= $value['distance'];
                        $insert->price=$value['price'];
                        $insert->non_geo_price=0;
                        $insert->minute=$value['minute'];
                        $insert->hour=0;
                        $insert->city_limits=$value['city_limits'];
                        $insert->fixed=$request->fixed;
                        $insert->old_ranges_price=0;
                        $insert->save();

                }
                
            }

            return redirect('admin/service')->with('flash_success','Service Type Saved Successfully');
        } catch (Exception $e) {
   
            return back()->with('flash_error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return ServiceType::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      
        try {
            $service = ServiceType::with('service_geo_fencing','service_geo_fencing.geo_fencing')->findOrFail($id);

            $geofencing = GeoFencing::all(); 
            $ids=[];
            
$Peakhour=PeakHour::with(['servicetimes' => function ($query) use ($id) {
    $query->where('service_type_id', $id);
}])->get();


            $packages = ServiceRentalHourPackage::all();

         //   dd($service_fencing);
            return view('admin.service.edit',compact('service','geofencing','service_fencing','Peakhour','packages'));
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', 'Service Type Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'provider_name' => 'required|max:255',
            'fixed' => 'required|numeric',
            // 'price' => 'required|numeric',
            'image' => 'mimes:ico,png'
        ]);
        //dd('tee');

        try {
           
            $service = ServiceType::with('service_geo_fencing')->findOrFail($id);

            if($request->hasFile('image')) {
                if($service->image) {
                    Helper::delete_picture($service->image);
                }
                $service->image = Helper::upload_picture($request->image);
            }

            $service->name = $request->name;
            $service->provider_name = $request->provider_name;
            $service->fixed = $request->fixed;
            $service->price = 0; 
            $service->minute = 0;
            $service->hour = 0;
            $service->night_fare = $request->night_fare;
            $service->distance = 0; 
            $service->calculator = $request->calculator;
            $service->capacity = $request->capacity;
            if(!empty($request->waiting_free_mins))
                $service['waiting_free_mins'] = $request->waiting_free_mins;
            else
                $service['waiting_min_charge'] = 0;

            if(!empty($request->waiting_min_charge))
                $service['waiting_min_charge'] = $request->waiting_min_charge;
            else
                $service['waiting_min_charge'] = 0;
            $service->rental_fare = $request->rental_fare;
            $service->rental_km_price = $request->rental_km_price;
            $service->rental_hour_price = $request->rental_hour_price;
            $service->outstation_driver = $request->outstation_driver; 
            $service->outstation_km = $request->outstation_km;
            $service->roundtrip_km = $request->roundtrip_km;
             $service->save();

            //update peakhours
            if ($request->peak_price) {
                foreach ($request->peak_price as $key => $value) {
                    if ($value['status'] == 1) {
                        //update price
                        if ($value['id']) {
                            $service_map = ServicePeakHour::where('service_type_id', $id)->where('peak_hours_id', $key)->update(['min_price'=>$value['id']]);
                        } else {
                            //delete peakhours
                            ServicePeakHour::where('service_type_id', $id)->where('peak_hours_id', $key)->delete();
                        }
                    } else {
                        if ($value['id']) {
                            //insert price
                            $service_map = ServicePeakHour::create(['service_type_id'=>$id, 'peak_hours_id'=>$key, 'min_price'=>$value['id']]);
                        }
                    }
                }
            }


 
            //dd($request->geo_fencing);
                foreach ($request->geo_fencing as $key => $value)
                {

                    if($value['id'])
                    {

                        $update = ServiceTypeGeoFencings::findOrFail($value['id']); 
                        $update->distance=$value['distance'];
                        $update->price=$value['price'];
                        $update->non_geo_price=0;
                        $update->city_limits=$value['city_limits'];
                        $update->minute=$value['minute'];
                        $update->hour=0;
                        $update->old_ranges_price=0;
              
                        $update->save(); 
                    }
                    else
                    {
                    
                        $insert = new ServiceTypeGeoFencings();
                        $insert->geo_fencing_id=$key;
                        $insert->service_type_id=$service->id;
                        $insert->distance= $value['distance'];
                        $insert->non_geo_price=0;
                        $insert->city_limits=$value['city_limits'];
                        $insert->price=$value['price'];
                        $insert->minute=$value['minute'];
                        $insert->hour=0;
                        $insert->old_ranges_price=0;
                        $insert->save();
                    }

                }

            
            return redirect()->route('admin.service.index')->with('flash_success', 'Service Type Updated Successfully');    
        } 

        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', 'Service Type Not Found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try {
            $provider_service=ProviderService::where('service_type_id',$id)->count();
            if($provider_service>0){
                return back()->with('flash_error', trans('admin.service_type_msgs.service_type_using'));
            }
                
            ServiceType::where('id',$id)->delete();
            ServicePeakHour::where('service_type_id',$id)->delete();

            return back()->with('flash_success', trans('admin.service_type_msgs.service_type_delete'));
        } catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.service_type_msgs.service_type_not_found'));
        }
    }
}
