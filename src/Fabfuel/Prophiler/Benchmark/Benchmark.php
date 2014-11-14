<?php
/**
 * @author @fabfuel <fabian@fabfuel.de>
 * @created 13.11.14, 08:11 
 */
namespace Fabfuel\Prophiler\Benchmark;

/**
 * Class Benchmark
 * @package Fabfuel\Prophiler\Benchmark
 */
class Benchmark implements BenchmarkInterface
{
    /**
     * @var string Unique identifier
     */
    protected $name;

    /**
     * @var double Starting time
     */
    protected $startTime = 0.0;

    /**
     * @var double Starting memory usage
     */
    protected $startMemory = 0.0;

    /**
     * @var double Ending time
     */
    protected $endTime = 0.0;

    /**
     * @var double Ending memory usage
     */
    protected $endMemory = 0.0;

    /**
     * @var array Custom metadata regarding this benchmark
     */
    protected $metadata = [];

    /**
     * @var string
     */
    protected $component;

    /**
     * @param string $name Unique identifier like e.g. Class::Method (\Foobar\MyClass::doSomething)
     * @param array $metadata Additional metadata
     * @param string $component Name of the component which triggered the benchmark, e.g. "App", "Database"
     */
    public function __construct($name, array $metadata = [], $component = null)
    {
        $this->setName($name);
        $this->setMetadata($metadata);
        $this->setComponent($component);
    }

    /**
     * Start the benchmark
     *
     * @return void
     */
    public function start()
    {
        $this->startTime = (double) microtime(true);
        $this->startMemory = (double) memory_get_usage();
    }

    /**
     * Stop the benchmark
     *
     * @return void
     */
    public function stop()
    {
        $this->endTime = (double) microtime(true);
        $this->endMemory = (double) memory_get_usage();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return double Timestamp in microtime
     */
    public function getDuration()
    {
        return $this->endTime - $this->startTime;
    }

    /**
     * Memory usage (difference between start and end memory usage)
     *
     * @return double
     */
    public function getMemoryUsage()
    {
        return $this->endMemory - $this->startMemory;
    }

    /**
     * Memory usage (difference between start and end memory usage)
     *
     * @return double
     */
    public function getMemoryUsageStart()
    {
        return $this->startMemory;
    }

    /**
     * Memory usage (difference between start and end memory usage)
     *
     * @return double
     */
    public function getMemoryUsageEnd()
    {
        return $this->endMemory;
    }

    /**
     * @return double Timestamp in microtime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @return double Timestamp in microtime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return string
     */
    public function getComponent()
    {
        return $this->component;
    }

    /**
     * @param string $component
     */
    public function setComponent($component)
    {
        $this->component = $component;
    }
}
