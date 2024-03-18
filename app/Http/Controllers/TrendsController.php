<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getOverallTrendByFiscal(Request $request)
    {
        $query = DB::select(
            "SELECT
                pc.id as purchase_category_id,
                se.series_description,
                pc.description as purchase_category,
                SUM(p.allocated_budget_php) as total_allocated_budget_php,
                SUM(p.allocated_budget_usd) as total_allocated_budget_usd,
                SUM(t.actual_php) as total_actual_php,
                SUM(t.actual_usd) as total_actual_usd,
                SUM(t.saving_php) as total_saving_php,
                SUM(t.saving_usd) as total_saving_usd
            FROM series se
                LEFT JOIN  trends t ON se.id = t.series_id
                LEFT JOIN purchases p ON t.purchase_id = p.id
                LEFT JOIN purchase_categories pc ON p.purchase_category_id = pc.id
            WHERE se.fiscal = ?
            GROUP BY 
                pc.id, se.series_description",
            [$request->fiscal]
        );

        return $query;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiscals = Series::select('fiscal', 'fiscal_description')
            ->distinct()
            ->get();

        return view('trends.index', [
            'fiscals' => $fiscals
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
