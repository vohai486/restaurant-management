<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    function index()
    {
        if (!session()->has('delivery_fee') || !session()->has('address')) {
            throw ValidationException::withMessages(['Something went wrong']);
        }

        $subtotal = cartTotal();
        $delivery = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $grandTotal = grandCartTotal($delivery);
        return view(
            'frontend.pages.payment',
            compact(
                'subtotal',
                'delivery',
                'discount',
                'grandTotal'
            )
        );
    }
    function makePayment(OrderService $orderService)
    {
        // Create Order
        try {
            $orderService->createOrder();
            return 1;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
