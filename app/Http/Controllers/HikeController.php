<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hike;
use Illuminate\Support\Facades\Auth;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if statement for display all
        $hikes = Hike::orderBy('id', 'desc')->paginate(15);
        return view('hikes', compact('hikes'));
    }

//    public function pagination($number)
//    {
//        $hikes = Hike::orderBy('id', 'desc')->paginate(10);
////        return view('hikes', compact('hikes'));
//        return view('hikes', compact('hikes'));
//    }

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
        $hike = Hike::create($validateData);

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
//        $input = Request->all();
//        $column = $request->input('test');
//        $hikes = Hike::orderBy('id', 'desc')
//            ->whereBetween($column, [4, 6])
//            ->get();
        if (isset($_POST['submitSearch'])) {
            $column = $request->input('dbColumns');

            switch($i)
            {
                case 0:
                    
                    break;
            }

//            $column = $request->input('dbColumns');

            $min = $request->input('searchMin');
            $max = $request->input('searchMax');

            $result = Hike::where($column, '=', $column)->whereBetween($column, [$min, $max])->get();

            return view('hikes', compact('result'));
        }
        else{
            return view('hikes');
        }
    }
}
