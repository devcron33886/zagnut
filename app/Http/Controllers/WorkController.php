<?php

namespace App\Http\Controllers;

use AfricasTalking\SDK\AfricasTalking;
use App\Http\Requests\StoreWorkRequest;
use App\Models\Employee;
use App\Models\Work;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with(['employee'])->get();

        return view('manager.works.index', ['works' => $works]);
    }

    public function create()
    {
        $works = Employee::all();
        return view('manager.works.create', ['employees' => $works]);
    }

    public function store(StoreWorkRequest $request)
    {

        $data = array_merge($request->validated(), ['user_id' => auth()->user()->id]);
        $work = Work::create($data);
        $username = 'zagnut';
        $apiKey = '1ec71d253627b01ea8580d94e572a9e947733bd165351db3321d6e08c1512977';
        $AT = new AfricasTalking($username, $apiKey);
        // Get one of the services
        $sms = $AT->sms();
        // Use the service
        $result = $sms->send([
            'to' => $work->employee->phone_number,
            'message' => 'Turabasuhuje '. $work->employee->names.'!'.' Uno munsi tariki '. $work->created_at .' Mwakoreye amafaranga '. $work->formatedPayout() .'Tubashimiye ubwitange mugaragaza mukazi.'.'Ubuyobozi bwa ZAGNUT CLUB.',
        ]);
        return to_route('works.index');
    }

    public function edit(Work $work)
    {

    }

    public function update(Request $request, Work $work)
    {
        //
    }
}
