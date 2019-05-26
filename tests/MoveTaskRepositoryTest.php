<?php

use App\Models\MoveTask;
use App\Repositories\MoveTaskRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MoveTaskRepositoryTest extends TestCase
{
    use MakeMoveTaskTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MoveTaskRepository
     */
    protected $moveTaskRepo;

    public function setUp()
    {
        parent::setUp();
        $this->moveTaskRepo = App::make(MoveTaskRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMoveTask()
    {
        $moveTask = $this->fakeMoveTaskData();
        $createdMoveTask = $this->moveTaskRepo->create($moveTask);
        $createdMoveTask = $createdMoveTask->toArray();
        $this->assertArrayHasKey('id', $createdMoveTask);
        $this->assertNotNull($createdMoveTask['id'], 'Created MoveTask must have id specified');
        $this->assertNotNull(MoveTask::find($createdMoveTask['id']), 'MoveTask with given id must be in DB');
        $this->assertModelData($moveTask, $createdMoveTask);
    }

    /**
     * @test read
     */
    public function testReadMoveTask()
    {
        $moveTask = $this->makeMoveTask();
        $dbMoveTask = $this->moveTaskRepo->find($moveTask->id);
        $dbMoveTask = $dbMoveTask->toArray();
        $this->assertModelData($moveTask->toArray(), $dbMoveTask);
    }

    /**
     * @test update
     */
    public function testUpdateMoveTask()
    {
        $moveTask = $this->makeMoveTask();
        $fakeMoveTask = $this->fakeMoveTaskData();
        $updatedMoveTask = $this->moveTaskRepo->update($fakeMoveTask, $moveTask->id);
        $this->assertModelData($fakeMoveTask, $updatedMoveTask->toArray());
        $dbMoveTask = $this->moveTaskRepo->find($moveTask->id);
        $this->assertModelData($fakeMoveTask, $dbMoveTask->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMoveTask()
    {
        $moveTask = $this->makeMoveTask();
        $resp = $this->moveTaskRepo->delete($moveTask->id);
        $this->assertTrue($resp);
        $this->assertNull(MoveTask::find($moveTask->id), 'MoveTask should not exist in DB');
    }
}
