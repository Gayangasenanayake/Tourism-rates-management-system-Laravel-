<?php

namespace Modules\Rates\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Rates\Http\Requests\HotelRateRequest;
use Modules\Rates\Http\Requests\HotelRateUpdateRequest;
use Modules\Rates\Models\HotelRate;
use Spatie\QueryBuilder\QueryBuilder;

class HotelRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HotelRate::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRateRequest $request): JsonResponse
    {
        $dates = [];
        $rate=null;
        $data=$request->validated();
        $start = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $end = Carbon::createFromFormat('Y-m-d', $request->end_date);

        // Loop from start date to end date
        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        foreach ($dates as $date) {
            $data['date'] = $date;
            $rate = HotelRate::create($data);
        }
        return response()->json($rate);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $rate= QueryBuilder::for(HotelRate::class)
            ->where('hotel_id',$id)
            ->with(['roomType','boardType','roomCategory','currency'])
            ->allowedFilters(['agent_id'])
            ->get();

        $categorizedRates = $rate->groupBy('roomCategory.title')
            ->map(function ($categoryItems) {
                // Group each category's items by roomType
                return $categoryItems->groupBy('roomType.title')
                    ->map(function ($roomTypeItems) {
                        // Group by boardType.code inside each roomType
                        $groupedBoardTypes = $roomTypeItems->groupBy('boardType.code')
                            ->map(function ($boardTypeItems) {
                                // For each boardType group, list out all entries
                                return $boardTypeItems->map(function ($item) {
                                    return [
                                        'id' => $item->id,
                                        'code' => $item->boardType->code,
                                        'title' => $item->boardType->title,
                                        'value' => $item->value,
                                        'date' => $item->date,
                                        'currency' => $item->currency->iso_code,
                                        'category_id' => $item->roomCategory->id
                                    ];
                                }); // Use unique if you want to eliminate duplicate board types within the same group
                            });
                        // Only return the first item for room type details since all are the same in this group
                        $firstItem = $roomTypeItems->first();
                        return [
                            'room_type' => [
                                'id' => $firstItem->roomType->id,
                                'title' => $firstItem->roomType->title,
                            ],
                            'board_types' => $groupedBoardTypes
                        ];
                    });
            });
        return response()->json($categorizedRates);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRateUpdateRequest $request, $id)
    {
        $rate = HotelRate::find($id);
        $supplement=$request->supplement_name;
//        if($supplement){
//
//        }
        $rate->update($request->validated());
        return $rate;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
