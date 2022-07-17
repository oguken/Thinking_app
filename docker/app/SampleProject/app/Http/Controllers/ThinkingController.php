<?php

namespace App\Http\Controllers;

use App\Models\Thinking;
use App\Http\Requests\ThinkingRequest;
use App\Models\Status;
use App\Models\Admin;
use Illuminate\Http\Request;

class ThinkingController extends Controller
{
    // ログインしてない時だけ実行される処理の部分
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thinkings = Thinking::all();
        return view('Thinkings.index', ['thinkings' => $thinkings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thinking = new Thinking;
        $statuses = Status::all()->pluck('status_name', 'id');
        return view('Thinkings.new', ['thinking' => $thinking, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThinkingRequest $request)
    {
        $thinking = new Thinking;
        $user =\Auth::user();
        $admin =Admin::find(1);

        $thinking->thinking = request('thinking');
        $thinking->status_id = request('status_id');
        $thinking->user_id = $user->id;
        $thinking->admin_id = $admin->id;
        $thinking->save();
        return redirect()->route('thinking.detail', ['id' => $thinking->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thinking  $thinking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thinking = Thinking::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        return view('Thinkings.show', ['thinking' => $thinking, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thinking  $thinking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thinking = Thinking::find($id);
        $statuses = Status::all()->pluck('status_name', 'id');
        return view('Thinkings.edit', ['thinking' => $thinking, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thinking  $thinking
     * @return \Illuminate\Http\Response
     */
    public function update(ThinkingRequest $request, $id, Thinking $thinking)
    {
        $thinking = Thinking::find($id);
        $thinking->thinking = request('thinking');
        $thinking->status_id = request('status_id');
        $thinking->save();
        return redirect()->route('thinking.detail', ['id' => $thinking->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thinking  $thinking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thinking = Thinking::find($id);
        $thinking->delete();
        return redirect('/thinkings');
    }
}
