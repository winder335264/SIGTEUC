<?php

use App\Models\HORARIO_M_UC;
use App\Repositories\HORARIO_M_UCRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HORARIO_M_UCRepositoryTest extends TestCase
{
    use MakeHORARIO_M_UCTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HORARIO_M_UCRepository
     */
    protected $hORARIOMUCRepo;

    public function setUp()
    {
        parent::setUp();
        $this->hORARIOMUCRepo = App::make(HORARIO_M_UCRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHORARIO_M_UC()
    {
        $hORARIOMUC = $this->fakeHORARIO_M_UCData();
        $createdHORARIO_M_UC = $this->hORARIOMUCRepo->create($hORARIOMUC);
        $createdHORARIO_M_UC = $createdHORARIO_M_UC->toArray();
        $this->assertArrayHasKey('id', $createdHORARIO_M_UC);
        $this->assertNotNull($createdHORARIO_M_UC['id'], 'Created HORARIO_M_UC must have id specified');
        $this->assertNotNull(HORARIO_M_UC::find($createdHORARIO_M_UC['id']), 'HORARIO_M_UC with given id must be in DB');
        $this->assertModelData($hORARIOMUC, $createdHORARIO_M_UC);
    }

    /**
     * @test read
     */
    public function testReadHORARIO_M_UC()
    {
        $hORARIOMUC = $this->makeHORARIO_M_UC();
        $dbHORARIO_M_UC = $this->hORARIOMUCRepo->find($hORARIOMUC->id);
        $dbHORARIO_M_UC = $dbHORARIO_M_UC->toArray();
        $this->assertModelData($hORARIOMUC->toArray(), $dbHORARIO_M_UC);
    }

    /**
     * @test update
     */
    public function testUpdateHORARIO_M_UC()
    {
        $hORARIOMUC = $this->makeHORARIO_M_UC();
        $fakeHORARIO_M_UC = $this->fakeHORARIO_M_UCData();
        $updatedHORARIO_M_UC = $this->hORARIOMUCRepo->update($fakeHORARIO_M_UC, $hORARIOMUC->id);
        $this->assertModelData($fakeHORARIO_M_UC, $updatedHORARIO_M_UC->toArray());
        $dbHORARIO_M_UC = $this->hORARIOMUCRepo->find($hORARIOMUC->id);
        $this->assertModelData($fakeHORARIO_M_UC, $dbHORARIO_M_UC->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHORARIO_M_UC()
    {
        $hORARIOMUC = $this->makeHORARIO_M_UC();
        $resp = $this->hORARIOMUCRepo->delete($hORARIOMUC->id);
        $this->assertTrue($resp);
        $this->assertNull(HORARIO_M_UC::find($hORARIOMUC->id), 'HORARIO_M_UC should not exist in DB');
    }
}
