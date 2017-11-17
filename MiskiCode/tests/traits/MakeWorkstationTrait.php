<?php

use Faker\Factory as Faker;
use App\Models\Workstation;
use App\Repositories\WorkstationRepository;

trait MakeWorkstationTrait
{
    /**
     * Create fake instance of Workstation and save it in database
     *
     * @param array $workstationFields
     * @return Workstation
     */
    public function makeWorkstation($workstationFields = [])
    {
        /** @var WorkstationRepository $workstationRepo */
        $workstationRepo = App::make(WorkstationRepository::class);
        $theme = $this->fakeWorkstationData($workstationFields);
        return $workstationRepo->create($theme);
    }

    /**
     * Get fake instance of Workstation
     *
     * @param array $workstationFields
     * @return Workstation
     */
    public function fakeWorkstation($workstationFields = [])
    {
        return new Workstation($this->fakeWorkstationData($workstationFields));
    }

    /**
     * Get fake data of Workstation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWorkstationData($workstationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cod' => $fake->word,
            'descripcion' => $fake->word,
            'aperturado' => $fake->word,
            'activo' => $fake->word
        ], $workstationFields);
    }
}
