<?php namespace App\Http\Controllers\Api;

use App\Statistic;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Property;
use App\User;

/**
 * Class StatisticController
 * Handles stats requests
 *
 * @package App\Http\Controllers\Api
 */

class StatisticController extends Controller
{
    /**
     * Returns all stat data
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Statistic::all());
    }

    /**
     * Shows the specified stat data
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $option = Statistic::find($id);
        return response()->json($option->pluck('value', 'key', 'id'));
    }

    /**
     * Creates new stat data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->input();

        $item = new Statistic($data);
        $item->save();

        return $item ? response()->json(['code' => 'ok', 'user' => $item]) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    /**
     * Updates statistic data
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        // ToDo: this function seems completely wrong

        $roomType = Statistic::find($id);

        return $roomType->update($request->input()) ? response()->json(['code' => 'ok']) : response()->json(['code' => 'error', 'message' => 'Ошибка сохранения']);
    }

    /**
     * Removes the specific data
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Statistic::find($id)->delete();

        return response()->json(['code' => 'ok']);
    }

    /**
     * Gather stat data
     * @return JsonResponse
     */
    public function conclusionToMain(): JsonResponse
    {
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
            'totalNumberObjects'            => $totalNumberObjects,
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
