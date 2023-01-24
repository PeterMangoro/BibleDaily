<?php 
namespace App\View\Shared;

use Illuminate\Contracts\Support\Arrayable;
use Reflection;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Support\Str;

abstract class BaseView implements Arrayable
{
    public function toArray(): array
    {
        return collect((new ReflectionClass($this))->getMethods())
            ->reject(fn (ReflectionMethod $method) =>
                in_array($method->getName(), ['__construct', '__invoke', 'toArray'])
            )
            ->filter(fn (ReflectionMethod $method) =>
                in_array('public', Reflection::getModifierNames($method->getModifiers()))
            )
            ->mapWithKeys(fn (ReflectionMethod $method) => [
                Str::snake($method->getName()) => $this->{$method->getName()}()
            ])
            ->toArray();
    }
}