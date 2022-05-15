<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function updateRewardTime(Request $request, $id) {
        Membership::where(
            [
                'PK_FK_userID' => $id
            ]
        )->update(
            [
                'next_reward_time' => $request->time
            ]
        );
    }
}
