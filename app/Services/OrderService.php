<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Order_detail;

class OrderService
{
    /**
     * Create a new order.
     *
     * @param  array $data
     * @return \App\Models\Order
     */
    public function createOrder($data)
    {

        $orderData = [
            'employee_id' => isset($data['employee_id']) ? $data['employee_id'] : null,
            'user_id' => isset($data['user_id']) ? $data['user_id'] : null,
            'from_office_id' => $data['from_office_id'],
            'to_office_id' => $data['to_office_id'],
            'status' => $data['status'],
            'payment_method' => $data['payment_method'],
            'payment_type' => $data['payment_type'],
            'customer_id' => $data['customer_id'] ?? null
        ];
        $order = new Order($orderData);
        $order->save();
        return $order;
    }


    /**
     * Create new order details for a specific order.
     *
     * @param  int $orderId
     * @param  array $details
     * @return \App\Models\Order_detail
     */
    public function createOrderDetails( $details)
    {
        $orderDetailsData = [
            'order_id' => $details['order_id'],
            'S_user' => $details['S_user'],
            'S_national_id' => $details['S_national_id'],
            'S_phone_number' => $details['S_phone_number'],
            'S_mother_name' => $details['S_mother_name'],
            'S_Location' => $details['S_Location'],
            'S_family_registration' => $details['S_family_registration'],
            'R_user' => $details['R_user'],
            'R_phone_number' => $details['R_phone_number'],
        ];

       // create
        $orderDetails = new Order_detail($orderDetailsData);
        $orderDetails->save();
        return $orderDetails;
    }

}

