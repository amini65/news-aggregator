<?php

namespace App\Services\Aggregator\Interfaces;

interface SourceInterface
{

    public function requestToSource();

    public function runResultAdapter();

    public function save();


}
