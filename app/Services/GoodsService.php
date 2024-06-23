<?php

namespace App\Services;

use App\Models\Incoming_good;
use App\Models\Order;

class GoodsService
{
    public function createIncomingGood($data)
    {
        return Incoming_good::create($data);
    }
    public function processIncomingGoods($goodsList, $order, $warehouseId)
    {
        $totalPrice = 0;
        $incomingGoods = [];

        foreach ($goodsList as $goodsData) {
            $goodsData['order_id'] = $order->id;
            $goodsData['warehouse_id'] = $warehouseId;
            $goodsData['status'] = $order->status;
            $goodsData['price'] = $goodsData['quantity'] * $goodsData['weight'] * $goodsData['volume'];
            $totalPrice += $goodsData['price'];
            $incomingGood = $this->createIncomingGood($goodsData);

            $incomingGoods[] = $incomingGood;
        }

        return ['totalPrice' => $totalPrice, 'incomingGoods' => $incomingGoods];
    }
    public function updateSingleGood($orderId, $goodsData, $index)
    {
        $order = Order::findOrFail($orderId);
        $good = $order->goods[$index] ?? null; // Find the good based on index or create a new one

        if ($good) {
            // Update only the fields provided
            $good->update(array_filter($goodsData, function($value) {
                return $value !== null;
            }));
        }
    }

}
