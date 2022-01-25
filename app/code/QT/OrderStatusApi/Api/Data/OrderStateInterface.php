<?php

namespace QT\OrderStatusApi\Api\Data;

interface OrderStateInterface
{
    /**
     * String constants for property names
     */
    const STATUS = "status";
    const STATE = "state";
    const IS_DEFAULT = "is_default";
    const VISIBLE_ON_FRONT = "visible_on_front";

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
     * Getter for State.
     *
     * @return string|null
     */
    public function getState(): ?string;

    /**
     * Setter for State.
     *
     * @param string|null $state
     *
     * @return void
     */
    public function setState(?string $state): void;

    /**
     * Getter for IsDefault.
     *
     * @return int|null
     */
    public function getIsDefault(): ?int;

    /**
     * Setter for IsDefault.
     *
     * @param int|null $isDefault
     *
     * @return void
     */
    public function setIsDefault(?int $isDefault): void;

    /**
     * Getter for VisibleOnFront.
     *
     * @return int|null
     */
    public function getVisibleOnFront(): ?int;

    /**
     * Setter for VisibleOnFront.
     *
     * @param int|null $visibleOnFront
     *
     * @return void
     */
    public function setVisibleOnFront(?int $visibleOnFront): void;
}
