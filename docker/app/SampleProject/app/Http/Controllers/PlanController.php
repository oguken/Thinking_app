<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Http\Requests\PlanRequest;
use App\Models\Thinking;
use App\Models\Admin;
use Illuminate\Http\Request;

class PlanController extends Controller
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
    public function index($thinking_id)
    {
        $plans = Plan::where('thinking_id', $thinking_id)->get();
        return view('Plans.index', ['plans' => $plans, 'thinking_id' => $thinking_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($thinking_id)
    {
        $plan = new Plan;
        return view('Plans.new', ['plan' => $plan, 'thinking_id' => $thinking_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        $plan = new Plan;
        $thinking = Thinking::find(request('thinking_id'));

        $plan->plan = request('plan');
        $plan->result = request('result');
        $plan->thinking_id = $thinking->id;
        $plan->save();
        return redirect()->route('plan.detail', ['id' => $plan->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        return view('Plans.show', ['plan' => $plan, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($thinking_id, $id)
    {
        $plan = Plan::find($id);
        return view('Plans.edit', ['plan' => $plan,'thinking_id' => $thinking_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $id, Plan $plan)
    {
        $plan = plan::find($id);
        $plan->plan = request('plan');
        $plan->result = request('result');
        $plan->save();
        return redirect()->route('plan.detail', ['id' => $plan->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $thinking_id = $plan->thinking_id;

        $plan->delete();

        $plans = Plan::where('thinking_id', $thinking_id)->get();

        return view('Plans.index', ['plans' => $plans, 'thinking_id' => $thinking_id]);
    }
}
