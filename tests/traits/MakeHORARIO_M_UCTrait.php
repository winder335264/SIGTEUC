<?php

use Faker\Factory as Faker;
use App\Models\HORARIO_M_UC;
use App\Repositories\HORARIO_M_UCRepository;

trait MakeHORARIO_M_UCTrait
{
    /**
     * Create fake instance of HORARIO_M_UC and save it in database
     *
     * @param array $hORARIOMUCFields
     * @return HORARIO_M_UC
     */
    public function makeHORARIO_M_UC($hORARIOMUCFields = [])
    {
        /** @var HORARIO_M_UCRepository $hORARIOMUCRepo */
        $hORARIOMUCRepo = App::make(HORARIO_M_UCRepository::class);
        $theme = $this->fakeHORARIO_M_UCData($hORARIOMUCFields);
        return $hORARIOMUCRepo->create($theme);
    }

    /**
     * Get fake instance of HORARIO_M_UC
     *
     * @param array $hORARIOMUCFields
     * @return HORARIO_M_UC
     */
    public function fakeHORARIO_M_UC($hORARIOMUCFields = [])
    {
        return new HORARIO_M_UC($this->fakeHORARIO_M_UCData($hORARIOMUCFields));
    }

    /**
     * Get fake data of HORARIO_M_UC
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHORARIO_M_UCData($hORARIOMUCFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idRuta' => $fake->randomDigitNotNull,
            'Horas' => $fake->word,
            'bus' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $hORARIOMUCFields);
    }
}
