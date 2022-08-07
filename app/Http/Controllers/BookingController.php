<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingCollection;
use App\Models\Booking;
use App\Repository\BookingRepo;
use App\Repository\ProductRepo;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    private $booking, $product;

    public function __construct()
    {
        $this->booking = new BookingRepo();
        $this->product = new ProductRepo();
    }

    /**
     * Make a new booking.
     *
     * @param Request $request {client_id, product_id}
     * @return JsonResponse {booking}
     */
    public function makeBooking(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            // check if product available
            if ($this->product->isAvailable($request->product_id) == false) {
                return response()->json(['message' => 'Product not available'], 400);
            }

            # create booking
            $booking = $this->booking->store($request->all());

            $booking = new BookingCollection($booking);

            DB::commit();
            #return response
            return response()->json($booking, 201);
        } catch (Exception $e) {
            DB::rollBack();
            //return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function listBookings(Request $request)
    {
        $bookings = $this->booking->getAll();
        $bookings = BookingCollection::collection($bookings);
        return response()->json($bookings, 200);
    }
}
