<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SujetoApiTest extends TestCase
{
    use MakeSujetoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSujeto()
    {
        $sujeto = $this->fakeSujetoData();
        $this->json('POST', '/api/v1/sujetos', $sujeto);

        $this->assertApiResponse($sujeto);
    }

    /**
     * @test
     */
    public function testReadSujeto()
    {
        $sujeto = $this->makeSujeto();
        $this->json('GET', '/api/v1/sujetos/'.$sujeto->id);

        $this->assertApiResponse($sujeto->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSujeto()
    {
        $sujeto = $this->makeSujeto();
        $editedSujeto = $this->fakeSujetoData();

        $this->json('PUT', '/api/v1/sujetos/'.$sujeto->id, $editedSujeto);

        $this->assertApiResponse($editedSujeto);
    }

    /**
     * @test
     */
    public function testDeleteSujeto()
    {
        $sujeto = $this->makeSujeto();
        $this->json('DELETE', '/api/v1/sujetos/'.$sujeto->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/sujetos/'.$sujeto->id);

        $this->assertResponseStatus(404);
    }
}
