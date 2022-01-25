<?php

namespace QT\OrderStatusApi\Api\Data;

interface OrderStatusInterface
{
    /**
     * String constants for property names
     */
    const STATUS = "status";
    const LABEL = "label";

    /**
     * Getter for Status.
     *
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * Setter for Status.
     *
     * @param string|null $status
     *
     * @return void
     */
    public function setStatus(?string $status): void;

    /**
     * Getter for Label.
     *
     * @return string|null
     */
    public function getLabel(): ?string;

    /**
     * Setter for Label.
     *
     * @param string|null $label
     *
     * @return void
     */
    public function setLabel(?string $label): void;
}
