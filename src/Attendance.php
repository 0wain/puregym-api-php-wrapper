<?php

namespace Owainjones74\Puregym;

class Attendance
{
    public string $description;
    public int $totalPeopleInGym;
    public int $totalPeopleInClasses;
    public string $totalPeopleSuffix;
    public bool $isApproximate;
    public string $attendanceTime;
    public string $lastRefreshed;
    public string $lastRefreshedPeopleInClasses;
    public int $maximumCapacity;

    public ?PureGymClient $client;

    public function __construct(array $data, ?PureGymClient $client = null)
    {
        $this->description = $data['description'];
        $this->totalPeopleInGym = $data['totalPeopleInGym'];
        $this->totalPeopleInClasses = $data['totalPeopleInClasses'];
        $this->totalPeopleSuffix = $data['totalPeopleSuffix'];
        $this->isApproximate = $data['isApproximate'];
        $this->attendanceTime = $data['attendanceTime'];
        $this->lastRefreshed = $data['lastRefreshed'];
        $this->lastRefreshedPeopleInClasses = $data['lastRefreshedPeopleInClasses'];
        $this->maximumCapacity = $data['maximumCapacity'];

        $this->client = $client;
    }
}