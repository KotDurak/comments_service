<?php


namespace app\services\data;


class FillDatabaseService
{

    /* @var Filler[] */
    protected $fillers = [];

    public function addFiller(Filler $filler)
    {
        $this->fillers[] = $filler;

        return $this;
    }

    public function fill()
    {
        $this->clear();

        foreach ($this->fillers as $filler) {
            $filler->fill();
        }
        echo 'RUN' . PHP_EOL;
    }

    public function clear()
    {
        foreach ($this->fillers as $filler) {
            $filler->clear();
        }
    }
}