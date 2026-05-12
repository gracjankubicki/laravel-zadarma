<?php

declare(strict_types=1);

namespace GracjanKubicki\LaravelZadarma\Saloon\Data\Crm\Users;

use GracjanKubicki\LaravelZadarma\Saloon\Data\ZadarmaResponseData;

final class GetUserWorkingHoursResponseData extends ZadarmaResponseData
{
    /**
     * @return list<mixed>
     */
    public function customWorkingHours(): array
    {
        return $this->listValue('customWorkingHours');
    }

    /**
     * @return list<mixed>
     */
    public function scheduleFixes(): array
    {
        return $this->listValue('scheduleFixes');
    }

    public function schedulePeriod(): ?string
    {
        return $this->string('schedulePeriod');
    }

    /**
     * @return list<mixed>
     */
    public function scheduleWorkingHours(): array
    {
        return $this->listValue('scheduleWorkingHours');
    }
}
