<?php

namespace App\Services\Aggregator\GuardianFake;

use App\Services\Aggregator\Interfaces\AdapterInterface;

class GuardianFakeResultAdapter implements AdapterInterface
{


    public function prepareResult($result)
    {

        return $result;

    }

}
