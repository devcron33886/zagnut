<?php

namespace App\Http\Controllers;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $works=Work::with('employee')->get();
        $bar_total=DB::table('works')->sum('bar_amount');
        $kitchen_total=DB::table('works')->sum('kitchen_amount');
        $chamber_total=DB::table('works')->sum('chamber_amount');
        $bingalo_total=DB::table('works')->sum('bingalo_amount');
        $total=$bar_total+$kitchen_total+$chamber_total+$bingalo_total;
        $total_percentage=DB::table('works')->sum('payout');

        return view('dashboard',compact('works','bar_total','kitchen_total','chamber_total','bingalo_total','total','total_percentage'));
    }
}
