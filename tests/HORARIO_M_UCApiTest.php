<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HORARIO_M_UCApiTest extends TestCase
{
    use MakeHORARIO_M_UCTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHORARIO_M_UC()
    {
        $hORARIOMUC = $this->fakeHORARIO_M_UCData();
        $this->json('POST', '/api/v1/hORARIOMUCS', $hORARIOMUC);

        $this->assertApiResponse($hORARIOMUC);
    }

    /**
     * @test
     */
    public function testReadHORARIO_M_UC()
    {
        $hORARIOMUC = $this->makeHORARIO_M_UC();
        $this->json('GET', '/api/v1/hORARIOMUCS/'.$hORARIOMUC->id);

        $this->assertApiResponse($hORARIOMUC->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHORARIO_M_UC()
    {
        $hORARIOMUC = $this->makeHORARIO_M_UC();
        $editedHORARIO_M_UC = $this->fakeHORARIO_M_UCData();

        $this->json('PUT', '/api/v1/hORARIOMUCS/'.$hORARIOMUC->id, $editedHORARIO_M_UC);

        $this->assertApiResponse($editedHORARIO_M_UC);
    }

    /**
     * @test
     */
    public function testDeleteHORARIO_M_UC()
    {
        $hORARIOMUC = $this->makeHORARIO_M_UC();
        $this->json('DELETE', '/api/v1/hORARIOMUCS/'.$hORARIOMUC->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/hORARIOMUCS/'.$hORARIOMUC->id);

        $this->assertResponseStatus(404);
    }
}
