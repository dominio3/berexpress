<?php

use Faker\Factory as Faker;
use App\Models\Consignement;
use App\Repositories\ConsignementRepository;

trait MakeConsignementTrait
{
    /**
     * Create fake instance of Consignement and save it in database
     *
     * @param array $consignementFields
     * @return Consignement
     */
    public function makeConsignement($consignementFields = [])
    {
        /** @var ConsignementRepository $consignementRepo */
        $consignementRepo = App::make(ConsignementRepository::class);
        $theme = $this->fakeConsignementData($consignementFields);
        return $consignementRepo->create($theme);
    }

    /**
     * Get fake instance of Consignement
     *
     * @param array $consignementFields
     * @return Consignement
     */
    public function fakeConsignement($consignementFields = [])
    {
        return new Consignement($this->fakeConsignementData($consignementFields));
    }

    /**
     * Get fake data of Consignement
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConsignementData($consignementFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'document' => $fake->word,
            'line01' => $fake->randomDigitNotNull,
            'line02' => $fake->randomDigitNotNull,
            'line03' => $fake->randomDigitNotNull,
            'line04' => $fake->randomDigitNotNull,
            'line05' => $fake->randomDigitNotNull,
            'total_price' => $fake->randomDigitNotNull,
            'status' => $fake->word,
            'users_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $consignementFields);
    }
}
