<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDollarRateRequest;
use App\Models\Dept;
use App\Models\User;
use App\Models\Action;
use App\Models\Series;
use App\Models\Status;
use App\Models\Purchase;
use App\Models\PurchaseType;
use Illuminate\Http\Request;
use App\Models\PurchaseCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Http\Requests\UpdateRateRequest;
use App\Models\DollarRate;
use App\Models\Trend;

class PurchasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPurchases(Request $request)
    {
        $purchases['data'] = getPurchases($request->series_id);
        return $purchases;
    }

    public function getRateBySeries(Request $request)
    {
        $rate = DollarRate::where('series_id', $request->series_id)->first();
        return $rate;
    }

    public function forkToSeries(Request $request)
    {
        $purchases = Purchase::with(['purchaseCategory', 'purchaseType', 'status'])
            ->where('series_id', $request->series_id)
            ->get();

        return $purchases;
    }

    public function storeDollarRate(StoreDollarRateRequest $request)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $status = getActiveStatusByCategory('purchase');

        // $purchases = Purchase::with(['purchaseCategory', 'purchaseType', 'status'])
        //     ->where('status_id', $status->id)
        //     ->get();

        $purchases = Purchase::with(['purchaseCategory', 'purchaseType', 'status'])
            ->get();

        $groups = PurchaseCategory::all();
        $types = PurchaseType::all();
        $statuses = Status::where('category', 'purchase')->get();
        $depts = Dept::all();
        $series = Series::all();

        return view('purchases.index', [
            'groups' => $groups,
            'types' => $types,
            'purchases' => $purchases,
            'statuses' => $statuses,
            'depts' => $depts,
            'series' => $series
        ]);
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
    public function store(StorePurchaseRequest $request)
    {
        $seriesDollarRate = DollarRate::where('series_id', $request->series_id)->first();

        $validated = $request->validated();
        $validated['notes'] = $request->notes;
        $validated['series_id'] = $request->series_id;
        $validated['allocated_budget_usd'] = $request->allocated_budget_php * ($seriesDollarRate ? $seriesDollarRate->rate : 0);
        DB::beginTransaction();

        $action = Action::select('id')
            ->where('description', 'add purchase')
            ->first();

        $user = User::find(auth()->user()->id);

        $trendStatus = Status::where('category', 'trend')
            ->where('description', 'draft')
            ->first();

        try {
            $purchase = Purchase::create($validated);

            Trend::create([
                'status_id' => $trendStatus->id,
                'series_id' => $validated['series_id'],
                'purchase_id' => $purchase->id,
            ]);

            createActionLog(auth()->user(), $action, 'Purchase info for id: ' . $purchase->id . ' has been added by ' . $user->name . '.');

            DB::commit();

            return [
                'response' => 'success',
                'alert' => 'Successfully created purchase information'
            ];
        } catch (Throwable $th) {
            DB::rollBack();
            return [
                'response' => 'error',
                'alert' => 'Unable to add purchase info. Please contact ISD for assistance.'
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
    public function update(UpdatePurchaseRequest $request, $id)
    {
        $purchase = Purchase::find($id);
        $series = Series::where('id', $purchase->series_id)->first();
        $seriesDollarRate = DollarRate::where('series_id', $purchase->series_id)->first();

        $validated = $request->validated();

        $validated['notes'] = $request->notes;
        $validated['purchase_category'] = $request->purchase_category;
        $validated['purchase_type'] = $request->purchase_type;
        $validated['dept'] = $request->dept;
        $validated['status'] = $request->status;
        $validated['allocated_budget_usd'] = $request->allocated_budget_php * ($seriesDollarRate ? $seriesDollarRate->rate : 0);

        DB::beginTransaction();

        $action = Action::select('id')
            ->where('description', 'update purchase')
            ->first();

        $user = User::find(auth()->user()->id);

        try {
            $purchase->update([
                'status_id' => $validated['status'],
                'notes' => $validated['notes'],
                'allocated_budget_php' => $validated['allocated_budget_php'],
                'allocated_budget_usd' => $validated['allocated_budget_usd'],
            ]);

            DB::statement('
                UPDATE purchases
                SET 
                    description = ?    
                    ,purchase_type_id = ?
                    ,purchase_category_id = ?
                    ,dept_id = ?
                WHERE 
                    series_id IN (SELECT series_id FROM series WHERE fiscal = ?) 
                    AND description = ?
            ', [
                $validated['description'],
                $validated['purchase_type'],
                $validated['purchase_category'],
                $validated['dept'],
                $series->fiscal,
                $validated['description'],
            ]);

            createActionLog(auth()->user(), $action, 'Purchase info for id: ' . $id . ' has been updated by ' . $user->name . '.');

            DB::commit();

            return [
                'response' => 'success',
                'alert' => 'Successfully updated purchase information'
            ];
        } catch (Throwable $th) {
            DB::rollBack();
            return [
                'response' => 'error',
                'alert' => 'Unable to update purchase info. Please contact ISD for assistance.'
            ];
        }
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
