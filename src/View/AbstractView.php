<?php declare(strict_types=1);

namespace Berry\Symfony\View;

use Berry\Renderable;

abstract class AbstractView implements Renderable
{
    abstract public function render(): Renderable;

    public function toString(): string
    {
        return $this->render()->toString();
    }

    public function renderInto(array &$buffer): void
    {
        $this->render()->renderInto($buffer);
    }

    public function toArray(): array
    {
        $data = $this->render()->toArray();

        // replace the class of the rendered element with ours
        return [static::class, $data[1], $data[2]];
    }
}
