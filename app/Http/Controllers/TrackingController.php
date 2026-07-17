<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampaignMail;

class TrackingController extends Controller
{
    public function openings(CampaignMail $mail)
    {
        
        if($mail->campaign->track_open){
            $mail->openings ++;
            $mail->save();
        }

        return redirect()->away(
            request()->get('f')
        );

       
    }


    public function clicks(CampaignMail $mail)
    {
        $mail->clicks ++;
        $mail->save();

        return redirect()->away(
            request()->get('f')
        );
    }
}
