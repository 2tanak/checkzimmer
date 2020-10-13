<?php namespace App\Http\Controllers\Api;

use App\Statistic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;
use App\User;

class StatisticController extends Controller
{
    function index() {
        return response()->json( Statistic::all() );
    }
    
    function show($id) {
        $option = Statistic::find($id);
        
        return response()->json( $option->pluck('value', 'key', 'id') );
    }
    
    function store(Request $request) {
        $data = $request->input();

        $item = new Statistic($data);
        $item->save();
        
        return $item ? response()->json(['code' => 'ok','user' => $item]) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
    
    function update(Request $request, $id) {
        $roomType = Statistic::find($id);
        
        return $roomType->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error','message' => 'Ошибка сохранения']);
    }
    
    function destroy($id) {
        Statistic::find($id)->delete();
        
        return response()->json(['code' => 'ok']);
    }
    
    function conclusionToMain() {
        $totalNumberObjects             = Property::getTotalNumberObjects(true);
        $totalAffiliateObjects          = Property::getTotalNumberObjects(false);  
        $totalUsersVerifiedProfiles     = User::getTotalUsersVerifiedProfiles(true);
        $totalUsersNotVerifiedProfiles  = User::getTotalUsersVerifiedProfiles(false);
        $numberObjectViewsLastMonth     = (int) Property::getNumberObjectViewsLastMonth();
        $numberClicksAffiliate          = (int) Statistic::getNumberClicksAffiliate();
        $numberClicksAffiliateMonth     = (int) Statistic::getNumberClicksAffiliateMonth();
        $topObjectsReferrals            = Property::getTopObjectsReferrals();
        $topObjectsViews                = Statistic::getTopObjectsViews();

        return response()->json([
            'totalNumberObjects'            => $totalNumberObject,
            'totalAffiliateObjects'         => $totalAffiliateObjects,
            'totalUsersVerifiedProfiles'    => $totalUsersVerifiedProfiles,
            'totalUsersNotVerifiedProfiles' => $totalUsersNotVerifiedProfiles,
            'numberObjectViewsLastMonth'    => $numberObjectViewsLastMonth,
            'numberClicksAffiliate'         => $numberClicksAffiliate,
            'numberClicksAffiliateMonth'    => $numberClicksAffiliateMonth,
            'topObjectsReferrals'           => $topObjectsReferrals,
            'topObjectsViews'               => $topObjectsViews,
            'topReferralsAndViews'          => [$topObjectsReferrals, $topObjectsViews]
        ]);
    }
    
}