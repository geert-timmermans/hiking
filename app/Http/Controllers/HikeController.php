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
        $hikes = Hike::orderBy('id', 'desc')->paginate(15);
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

    public function search()
    {
        $min = $_GET['searchMin'];
        $max = $_GET['searchMax'];
        $column = $_GET['searchCol'];
        $message = '';

        if($min > $max){
            $min = $_GET['searchMax'];
            $max = $_GET['searchMin'];
        }

        if($column !== 'Choose..') {
            if (empty($min) && empty($max)){
                $message = 'Fill in data to search';
                $hikes = Hike::orderBy('id', 'desc')->paginate(15);
            }
            elseif (!empty($min) && !empty($max)) {
                $hikes = Hike::whereBetween($column, [$min, $max])
                    ->orderBy('id', 'desc')->get();
            } elseif (empty($min) || empty($max)) {
                if (empty($min)) {
                    $min = $max;
                    $hikes = Hike::where($column, '=', $min)
                        ->orderBy('id', 'desc')->get();
                } else {
                    $max = $min;
                    $hikes = Hike::where($column, '=', $max)
                        ->orderBy('id', 'desc')->get();
                }
            }
        }
        else{
            $message = 'Make a choice in the dropdown menu';
            $hikes = Hike::orderBy('id', 'desc')->paginate(15);
        }

        return view('search', compact('hikes', 'message'));
    }
}
