<?php

class Order extends Model {
    public const STATUS_PROCESSING = 1;

    public $id;

    public $total_price;

    public $currency;

    public $status;
}

class OrderService {

    private MerchantService $merchantService;

    public function __construct(MerchantService $merchantService)
    {
        $this->merchantService = $merchantService;
    }

    public function createOrder(User $user, $currency, $cartId)
    {
        $transaction = new Transaction();

        $transaction->begin();

        try {
            $totalPrice = 0;

            $items = CartQuery::getItemsFromCart($cartId);
            foreach ($items as $item) {
                $totalPrice += $item['price'];
            }
            $order = new Order();
            $order->total_price = $totalPrice;
            $order->currency = $currency;
            $order->status = Order::STATUS_PROCESSING;
            $order->created_dt = date('Y-m-d H:i:s');
            $order->save();

            $this->merchantService->process($order->getPrimaryKey(), $order->total_price);

            $this->flushCart($cartId);
        } catch (Throwable $e) {
            $logService = new LogDB();
            $logService->log($e->getMessage(), $e->getCode(), $e->getTrace());
            $transaction->rollback();
        }

        $transaction->commit();

        return $order;
    }

    public function cancelOrder($id)
    {
        $order = Order::findOne($id);
        $order->status = Order
    }

    public function getOrders(): array
    {
        $query = new Query();
        return $this->query->select('id, total_price, currency')->from('order')->all();
    }

    protected function flushCart($id): void
    {
        CartQuery::removeAllItems($id);
    }
}
