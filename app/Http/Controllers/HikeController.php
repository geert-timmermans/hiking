<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hike;
use App\User;
use Illuminate\Support\Facades\Auth;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $perPage = $request->session()->get('perPage');
        if (!Auth::user()){
            $hikes = Hike::orderBy('id', 'desc')->paginate($perPage);
        }
        else{
            $user = User::find(Auth::user()->id);
            $hikes = $user->hikes;
        }
        return view('hikes', compact('hikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createHike');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $hike = new Hike;
//        $validateData = $request->validate([
//            'duration' => 'required',
//            'distance' => 'required | numeric',
//            'avg_speed' => 'required | numeric',
//            'kcal' => 'required | numeric',
//            'steps' => 'required',
//            'week' => 'required | numeric',
//            'month' => 'required | numeric',
//            'date' => 'required',
//        ]);
//        $hike->user_id = Auth::user()->id;
//        $hike = Hike::create($validateData);
        $hike = new Hike($request->all());
        $hike->user_id = Auth::user()->id;
        $hike->save();

        return redirect('/hikes')->with('success', 'Hike has been added');
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
        $hike = Hike::findOrFail($id);

        return view ('editHike', compact('hike'));
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
        $validateData = $request->validate([
            'duration' => 'required',
            'distance' => 'required | numeric',
            'avg_speed' => 'required | numeric',
            'kcal' => 'required | numeric',
            'steps' => 'required',
            'week' => 'required | numeric',
            'month' => 'required | numeric',
            'date' => 'required',
        ]);
        Hike::whereId($id)->update($validateData);

        return redirect('/hikes')->with('success', 'Hike is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hike::findOrFail($id)->delete();
        return redirect('/hikes')->with('success', 'Hike is successfully deleted');
    }

    public function search(Request $request)
    {
        $perPage = $request->session()->get('perPage');

        $min = $_POST['searchMin'];
        $max = $_POST['searchMax'];
        $column = $_POST['searchCol'];
        $message = '';

        if(empty($min) && empty($max) && empty($column)){
            $hikes = Hike::orderBy('id', 'desc')->paginate($perPage);
        }
        else {
            if ($min > $max) {
                $min = $_POST['searchMax'];
                $max = $_POST['searchMin'];
            }
//            if statement to check if a column is selected
            if ($column !== 'Choose..') {
//            if min and max are empty display error message
                if (empty($min) && empty($max)) {
                    $message = 'Fill in data to search';
                    $hikes = Hike::orderBy('id', 'desc')->paginate($perPage);
                } //            if min and max are filled in, search the correct column between min and max values
                elseif (!empty($min) && !empty($max)) {
                    $hikes = Hike::whereBetween($column, [$min, $max])
                        ->orderBy('id', 'desc')->paginate($perPage);
                } //            if min or max is empty
                elseif (empty($min) || empty($max)) {
//                if min is empty, only use max to search
                    if (empty($min)) {
                        $hikes = Hike::where($column, '=', $max)
                            ->orderBy('id', 'desc')->paginate($perPage);
                    } //                if max is empty, only use min to search
                    else {
                        $hikes = Hike::where($column, '=', $min)
                            ->orderBy('id', 'desc')->paginate($perPage)();
                    }
                }
            } //        if no column is selected
            else {
                $message = 'Make a choice in the dropdown menu';
                $hikes = Hike::orderBy('id', 'desc')->paginate($perPage);
            }
        }
        return view('hikes', compact('hikes', 'message'));
    }

    public function perPage(Request $request){

        $perPage = request()->perPage;
        $request->session()->put('perPage', $perPage);

        $hikes = Hike::orderBy('id', 'desc')->paginate($perPage);

        return view('hikes', compact('hikes'));
    }
}
