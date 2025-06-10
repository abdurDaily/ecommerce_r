<?php

namespace App\Http\Controllers\backend\finance;

use App\Http\Controllers\Controller;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    //**INDEX FILE  */
    public function financeIndex()
    {
        return view('backend.finance.financeIndex');
    }


    //**FINANCE STORE  */
    public function financeStore(Request $request)
    {

        $request->validate([
            'cost_title' => 'required',
            'cost_amount' => 'required',

        ]);

        if ($request->hasFile('attach_file')) {
            $file = $request->file('attach_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('finance', $fileName, 'public');
        }
        // dd($request->all());
        $financeData = new Finance();
        $financeData->title = $request->cost_title;
        $financeData->description = $request->cost_details;
        $financeData->author_name = Auth::user()->name;
        $financeData->amount = $request->cost_amount;
        $financeData->attach_file = env('APP_URL') . '/storage/' . $filePath;
        $financeData->save();

        return response()->json([
            'success' => 'finance data inserted!',
            'test' => $filePath
        ], 200);
    }
}
