<?php

use Faker\Factory as Faker;
use App\Models\MoveTask;
use App\Repositories\MoveTaskRepository;

trait MakeMoveTaskTrait
{
    /**
     * Create fake instance of MoveTask and save it in database
     *
     * @param array $moveTaskFields
     * @return MoveTask
     */
    public function makeMoveTask($moveTaskFields = [])
    {
        /** @var MoveTaskRepository $moveTaskRepo */
        $moveTaskRepo = App::make(MoveTaskRepository::class);
        $theme = $this->fakeMoveTaskData($moveTaskFields);
        return $moveTaskRepo->create($theme);
    }

    /**
     * Get fake instance of MoveTask
     *
     * @param array $moveTaskFields
     * @return MoveTask
     */
    public function fakeMoveTask($moveTaskFields = [])
    {
        return new MoveTask($this->fakeMoveTaskData($moveTaskFields));
    }

    /**
     * Get fake data of MoveTask
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMoveTaskData($moveTaskFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'consignement_id' => $fake->randomDigitNotNull,
            'users_id' => $fake->randomDigitNotNull
        ], $moveTaskFields);
    }
}
