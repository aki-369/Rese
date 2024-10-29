<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function confirm(Request $request, $shop_id)
    {
        // 結合したデータをセッションに保存
        $confirmationData = [
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'number_of_people' => $request->input('number_of_people')
        ];

        // セッションに一時的にデータを保存
        session()->flash('confirmation', $confirmationData);

        // 同じページにリダイレクト
        return redirect()->back();
    }

    public function addReservation(Request $request)
    {

        // 予約日時を結合
        $reservation_date = $request->input('date') . ' ' . $request->input('time');

        // 予約を保存
        Reservation::create([
            'user_id' => auth()->id(),
            'shop_id' => $request->shop_id,
            'reservation_date' => $reservation_date,
            'number_of_people' => $request->number_of_people,
        ]);

        // セッションを削除して完了ページにリダイレクト
        session()->forget('confirmation');

        return redirect()->route('shops.reservation.done');
    }

    public function delete($id) 
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('mypage');
    }
}
