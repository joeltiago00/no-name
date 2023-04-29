<?php

namespace NoName\ModelHistory\DTO;

use NoName\DTO;

class HistoryDTO extends DTO
{
    public ?string $field = null;
    public ?string $oldValue = null;
    public ?string $newValue = null;
    public ?int $userUpdateId = null;
    public ?int $userDeleteId = null;

    public function __construct(
        public readonly string $model,
        public readonly int    $modelId
    )
    {
    }

    public function setField(string $value): self
    {
        $this->field = $value;

        return $this;
    }

    public function setOldValue(string $value): self
    {
        $this->oldValue = $value;

        return $this;
    }

    public function setNewValue(string $value): self
    {
        $this->newValue = $value;

        return $this;
    }

    public function setUserUpdateId(int $value): self
    {
        $this->userUpdateId = $value;

        return $this;
    }

    public function setUserDeleteId(int $value): self
    {
        $this->userDeleteId = $value;

        return $this;
    }
}
