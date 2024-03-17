<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Action;
use App\Models\Series;
use App\Models\DollarRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDollarRateRequest;

class DollarRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rate = DollarRate::where('series_id', $request->series_id)->first();
        return $rate;
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
    public function store(StoreDollarRateRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        $action = Action::select('id')
            ->where('description', 'add series dollar to peso rate')
            ->first();

        $user = User::find(auth()->user()->id);

        $series = Series::where('id', $request->series_id)->first();

        try {
            DollarRate::updateOrCreate(
                ['series_id' => $series->id],
                ['rate' => $validated['rate'], 'series_id' => $series->id]
            );

            DB::statement('
                UPDATE purchases
                SET allocated_budget_usd = allocated_budget_php * ?
                WHERE series_id = ?
            ', [$validated['rate'], $series->id]);

            createActionLog(auth()->user(), $action, 'Dollar to peso rate for series: ' . $series->series_description . ' has been changed by ' . $user->name . '.');

            DB::commit();

            return [
                'response' => 'success',
                'alert' => 'Successfully changed dollar to peso rate info for series ' . $series->series_description
            ];
        } catch (Throwable $th) {
            DB::rollBack();
            return [
                'response' => 'error',
                'alert' => 'Unable to change dollar to peso rate info for series ' . $series->series_description . '. Please contact ISD for assistance.'
            ];
        }
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
    public function destroy($id)
    {
        //
    }
}
