<?php

use App\Models\Consignement;
use App\Repositories\ConsignementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsignementRepositoryTest extends TestCase
{
    use MakeConsignementTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConsignementRepository
     */
    protected $consignementRepo;

    public function setUp()
    {
        parent::setUp();
        $this->consignementRepo = App::make(ConsignementRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConsignement()
    {
        $consignement = $this->fakeConsignementData();
        $createdConsignement = $this->consignementRepo->create($consignement);
        $createdConsignement = $createdConsignement->toArray();
        $this->assertArrayHasKey('id', $createdConsignement);
        $this->assertNotNull($createdConsignement['id'], 'Created Consignement must have id specified');
        $this->assertNotNull(Consignement::find($createdConsignement['id']), 'Consignement with given id must be in DB');
        $this->assertModelData($consignement, $createdConsignement);
    }

    /**
     * @test read
     */
    public function testReadConsignement()
    {
        $consignement = $this->makeConsignement();
        $dbConsignement = $this->consignementRepo->find($consignement->id);
        $dbConsignement = $dbConsignement->toArray();
        $this->assertModelData($consignement->toArray(), $dbConsignement);
    }

    /**
     * @test update
     */
    public function testUpdateConsignement()
    {
        $consignement = $this->makeConsignement();
        $fakeConsignement = $this->fakeConsignementData();
        $updatedConsignement = $this->consignementRepo->update($fakeConsignement, $consignement->id);
        $this->assertModelData($fakeConsignement, $updatedConsignement->toArray());
        $dbConsignement = $this->consignementRepo->find($consignement->id);
        $this->assertModelData($fakeConsignement, $dbConsignement->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConsignement()
    {
        $consignement = $this->makeConsignement();
        $resp = $this->consignementRepo->delete($consignement->id);
        $this->assertTrue($resp);
        $this->assertNull(Consignement::find($consignement->id), 'Consignement should not exist in DB');
    }
}
