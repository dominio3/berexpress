<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MoveTaskApiTest extends TestCase
{
    use MakeMoveTaskTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMoveTask()
    {
        $moveTask = $this->fakeMoveTaskData();
        $this->json('POST', '/api/v1/moveTasks', $moveTask);

        $this->assertApiResponse($moveTask);
    }

    /**
     * @test
     */
    public function testReadMoveTask()
    {
        $moveTask = $this->makeMoveTask();
        $this->json('GET', '/api/v1/moveTasks/'.$moveTask->id);

        $this->assertApiResponse($moveTask->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMoveTask()
    {
        $moveTask = $this->makeMoveTask();
        $editedMoveTask = $this->fakeMoveTaskData();

        $this->json('PUT', '/api/v1/moveTasks/'.$moveTask->id, $editedMoveTask);

        $this->assertApiResponse($editedMoveTask);
    }

    /**
     * @test
     */
    public function testDeleteMoveTask()
    {
        $moveTask = $this->makeMoveTask();
        $this->json('DELETE', '/api/v1/moveTasks/'.$moveTask->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/moveTasks/'.$moveTask->id);

        $this->assertResponseStatus(404);
    }
}
