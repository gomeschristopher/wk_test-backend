<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class SaveOrderService
{
    public function saveOrder(Order $order, $orderData)
    {
        $client = Client::findOrFail($orderData['client']['id']);
        $order->client()->associate($client);
        
        $order->fill($orderData);
        $order->save();

        foreach($orderData['items'] as $itemData) {
            $orderItem = new OrderItem($itemData);
            $orderItem->order()->associate($order);

            $product = Product::findOrFail($itemData['product']['id']);
            $orderItem->product()->associate($product);
            $orderItem->save();
        }
    }
}