<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetQueue;
use Illuminate\Http\Request;

class PetQueueController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queue = PetQueue::all();
        return view("petQueue.index", compact('queue'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = PetQueue::find($id);
        $pet = $item->pet;
        return view("petQueue.show", [
            'item'  => $item,
            'pet'   => $pet
        ]);
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
    public function destroy(Request $request, $id)
    {
        $queueItem = PetQueue::find($id);
        if ($queueItem->type == 'Pet registration' || $request->processed) {
            $pet = $queueItem->pet;
            $pet->processed = 1;
            $pet->save();
        }

        $queueItem->delete();
        alert()->success('The queue item has been destroyed', 'Done');
        return redirect('/pets/queue');
    }
}
