<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocIdentidadApiTest extends TestCase
{
    use MakeDocIdentidadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDocIdentidad()
    {
        $docIdentidad = $this->fakeDocIdentidadData();
        $this->json('POST', '/api/v1/docIdentidads', $docIdentidad);

        $this->assertApiResponse($docIdentidad);
    }

    /**
     * @test
     */
    public function testReadDocIdentidad()
    {
        $docIdentidad = $this->makeDocIdentidad();
        $this->json('GET', '/api/v1/docIdentidads/'.$docIdentidad->id);

        $this->assertApiResponse($docIdentidad->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDocIdentidad()
    {
        $docIdentidad = $this->makeDocIdentidad();
        $editedDocIdentidad = $this->fakeDocIdentidadData();

        $this->json('PUT', '/api/v1/docIdentidads/'.$docIdentidad->id, $editedDocIdentidad);

        $this->assertApiResponse($editedDocIdentidad);
    }

    /**
     * @test
     */
    public function testDeleteDocIdentidad()
    {
        $docIdentidad = $this->makeDocIdentidad();
        $this->json('DELETE', '/api/v1/docIdentidads/'.$docIdentidad->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/docIdentidads/'.$docIdentidad->id);

        $this->assertResponseStatus(404);
    }
}
