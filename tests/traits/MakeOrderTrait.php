<?php

use Faker\Factory as Faker;
use App\Models\Order;
use App\Repositories\OrderRepository;

trait MakeOrderTrait
{
    /**
     * Create fake instance of Order and save it in database
     *
     * @param array $orderFields
     * @return Order
     */
    public function makeOrder($orderFields = [])
    {
        /** @var OrderRepository $orderRepo */
        $orderRepo = App::make(OrderRepository::class);
        $theme = $this->fakeOrderData($orderFields);
        return $orderRepo->create($theme);
    }

    /**
     * Get fake instance of Order
     *
     * @param array $orderFields
     * @return Order
     */
    public function fakeOrder($orderFields = [])
    {
        return new Order($this->fakeOrderData($orderFields));
    }

    /**
     * Get fake data of Order
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrderData($orderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'date' => $fake->word,
            'services_id' => $fake->randomDigitNotNull,
            'origin' => $fake->randomDigitNotNull,
            'destination' => $fake->randomDigitNotNull,
            'distance' => $fake->randomDigitNotNull,
            'contact_name' => $fake->word,
            'contact_phone' => $fake->word,
            'takes' => $fake->word,
            'rain' => $fake->word,
            'bulk' => $fake->randomDigitNotNull,
            'priority' => $fake->word,
            'observations' => $fake->text,
            'subtotal' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'users_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $orderFields);
    }
}
