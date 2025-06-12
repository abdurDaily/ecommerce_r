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

        // dd($request->all());
        $financeData = new Finance();
        $financeData->title = $request->cost_title;
        $financeData->description = $request->cost_details;
        $financeData->author_name = Auth::user()->name;
        if ($request->hasFile('attach_file')) {
            $file = $request->file('attach_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('finance', $fileName, 'public');
            $financeData->attach_file = env('APP_URL') . '/storage/' . $filePath;
        } else {
            $financeData->attach_file = null;  // explicitly set as null if no file uploaded
        }
        $financeData->amount = $request->cost_amount;
        $financeData->save();
        return response()->json([
            'success' => 'finance data inserted!'
        ], 200);
    }


    //**GET FINANCE RECORD  */
    public function getFinanceRecord()
    {
        $allFinanceRecords = Finance::latest()->simplePaginate(10);
        // dd($allFinanceRecords);
        return view('backend.finance.allRecords', compact('allFinanceRecords'));
    }


    //**DELETE DATA  */
    public function deleteFinanceItem($id)
    {
        // return(Finance::find($id));
        Finance::find($id)->delete();

        return response()->json([
            'success' => 'Finance item deleted successfully.'
        ], 200);
    }
}
