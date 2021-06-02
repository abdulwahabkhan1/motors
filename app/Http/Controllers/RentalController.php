<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalCheckinRequest;
use App\Http\Requests\RentalCheckoutRequest;
use App\Repositories\Interfaces\RentalRepositoryInterface;

class RentalController extends Controller
{
    /**
     * @var rentalRepository
     */
    protected $rentalRepository;

    /**
     * RentalController constructor.
     *
     * @param  $rentalRepository
     */
    public function __construct(RentalRepositoryInterface $rentalRepository)
    {
        $this->rentalRepository = $rentalRepository;
    }

    /**
     * Checkout for vehicle Rental.
     *
     * @param RentalCheckoutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(RentalCheckoutRequest $request)
    {
        try {
            $this->rentalRepository->create($request->only([
                "customer_id","vehicle_id", "vehicle_checkout",
                "vehicle_initial_condition", "rental_status"
            ]));

            return response()->json(['status'   =>  'success']);
        } catch (\Exception $exception) {
            return response([
                'status'   =>  'failed',
                'message' =>  $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Checkoin for vehicle Rental.
     *
     * @param int $id
     * @param RentalCheckinRequest $request
     * @return \Illuminate\Http\Response
     */
    public function checkin($id, RentalCheckinRequest $request)
    {
        try {
            $this->rentalRepository->update($id, $request->only([
                "vehicle_checkin", "vehicle_returned_condition", "rental_status"
            ]));

            return response()->json(['status'   =>  'success']);
        } catch (\Exception $exception) {
            return response([
                'status'   =>  'failed',
                'message' =>  $exception->getMessage()
            ], 500);
        }
    }
}
