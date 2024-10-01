<?php

namespace Owainjones74\Puregym;

class Activity
{
    public int $totalDuration;
    public int $averageDuration;
    public int $totalVisits;
    public int $totalClasses;
    public bool $isEstimated;
    public string $lastRefreshed;

    public ?PureGymClient $client;

    public function __construct(array $data, ?PureGymClient $client = null)
    {
        $this->totalDuration = $data['totalDuration'];
        $this->averageDuration = $data['averageDuration'];
        $this->totalVisits = $data['totalVisits'];
        $this->totalClasses = $data['totalClasses'];
        $this->isEstimated = $data['isEstimated'];
        $this->lastRefreshed = $data['lastRefreshed'];

        $this->client = $client;
    }
}