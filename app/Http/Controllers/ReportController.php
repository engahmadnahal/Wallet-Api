<?php

namespace App\Http\Controllers;

use App\Models\HistoryWallet;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function showPayPoint(){

    }

    public function showReportPayPoint(){

    }

    public function showUser(){
        $historyWallet = HistoryWallet::all();
        dd($historyWallet[1]->user->senderWalletUsers);
        return view('report.user.index',[
            'historyWallet' => $historyWallet
        ]);
    }

    public function showReportUser(){

    }

    public function showSubCategory(){

    }

    public function showReportSubCategory(){

    }
}
