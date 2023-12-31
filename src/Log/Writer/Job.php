<?php declare(strict_types=1);

namespace Log\Log\Writer;

use Laminas\Log\Writer\AbstractWriter;
use Log\Formatter\PsrLogSimple as PsrLogSimpleFormatter;
use Omeka\Entity\Job as JobEntity;

class Job extends AbstractWriter
{
    /**
     * @var JobEntity
     */
    protected $job;

    /**
     * @param JobEntity $job
     */
    public function __construct(JobEntity $job)
    {
        $this->job = $job;
        $this->formatter = new PsrLogSimpleFormatter;
    }

    /**
     * Log to the Job entity.
     *
     * @param array $event
     */
    protected function doWrite(array $event): void
    {
        $this->job->addLog($this->formatter->format($event));
    }
}
