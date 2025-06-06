<?php

namespace Filament\Forms\Components\TextInput;

use Illuminate\Contracts\Support\Jsonable;

class Mask implements Jsonable
{
    protected ?int $decimalPlaces = 2;

    protected ?string $decimalSeparator = '.';

    protected array $enum = [];

    protected ?int $fromValue = null;

    protected bool $hasLazyPlaceholder = true;

    protected bool $isNumeric = false;

    protected bool $isRange = false;

    protected bool $isSigned = true;

    protected array $mapToDecimalSeparator = [','];

    protected ?int $maxLength = null;

    protected ?int $maxValue = null;

    protected ?int $minValue = null;

    protected $pattern = null;

    protected array $patternBlocks = [];

    protected array $patternDefinitions = [];

    protected string $placeholderCharacter = '_';

    protected bool $shouldAutofix = false;

    protected bool $shouldNormalizeZeros = true;

    protected bool $shouldPadFractionalZeros = false;

    protected ?string $thousandsSeparator = null;

    protected ?int $toValue = null;

    final public function __construct()
    {
    }

    public function autofix(bool $condition = true): static
    {
        $this->shouldAutofix = $condition;

        return $this;
    }

    public function decimalPlaces(?int $places): static
    {
        $this->decimalPlaces = $places;

        return $this;
    }

    public function enum(array $values): static
    {
        $this->enum = $values;

        return $this;
    }

    public function from(?int $value): static
    {
        $this->fromValue = $value;

        return $this;
    }

    public function integer(): static
    {
        $this->decimalPlaces(0);

        return $this;
    }

    public function lazyPlaceholder(bool $condition = true): static
    {
        $this->hasLazyPlaceholder = $condition;

        return $this;
    }

    public function mapToDecimalSeparator(array $characters): static
    {
        $this->mapToDecimalSeparator = $characters;

        return $this;
    }

    public function maxLength(?int $value): static
    {
        $this->maxLength = $value;

        return $this;
    }

    public function maxValue(?int $value): static
    {
        $this->maxValue = $value;

        return $this;
    }

    public function minValue(?int $value): static
    {
        $this->minValue = $value;

        return $this;
    }

    public function numeric(bool $condition = true): static
    {
        $this->isNumeric = $condition;

        return $this;
    }

    public function normalizeZeros(bool $condition = true): static
    {
        $this->shouldNormalizeZeros = $condition;

        return $this;
    }

    public function padFractionalZeros(bool $condition = true): static
    {
        $this->shouldPadFractionalZeros = $condition;

        return $this;
    }

    public function pattern($pattern): static
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function patternBlocks(array $blocks): static
    {
        $this->patternBlocks = $blocks;

        return $this;
    }

    public function patternDefinitions(array $definitions): static
    {
        $this->patternDefinitions = $definitions;

        return $this;
    }

    public function placeholderCharacter(string $character): static
    {
        $this->placeholderCharacter = $character;

        return $this;
    }

    public function positive(): static
    {
        $this->signed(false);

        return $this;
    }

    public function range(bool $condition = true): static
    {
        $this->isRange = $condition;

        return $this;
    }

    public function signed(bool $condition = true): static
    {
        $this->isSigned = $condition;

        return $this;
    }

    public function thousandsSeparator(?string $separator = ','): static
    {
        $this->thousandsSeparator = $separator;

        return $this;
    }

    public function to(?int $value): static
    {
        $this->toValue = $value;

        return $this;
    }

    protected function getArrayableConfiguration(): array
    {
        $configuration = [];

        if ($this->pattern !== null) {
            $configuration['mask'] = $this->pattern;
        } elseif ($this->enum !== []) {
            $configuration['mask'] = '{{ IMask.MaskedEnum }}';
            $configuration['enum'] = $this->enum;
        } elseif ($this->isNumeric) {
            $configuration['mask'] = '{{ Number }}';
        } elseif ($this->isRange) {
            $configuration['mask'] = '{{ IMask.MaskedRange }}';
        }

        if ($this->shouldAutofix) {
            $configuration['autofix'] = true;
        }

        if ($this->patternBlocks !== []) {
            $configuration['blocks'] = array_map(
                fn (callable $configuration): array => $configuration(new static())->getArrayableConfiguration(),
                $this->patternBlocks,
            );
        }

        if ($this->patternDefinitions !== []) {
            $configuration['definitions'] = $this->patternDefinitions;
        }

        if ($this->fromValue !== null) {
            $configuration['from'] = $this->toValue;
        }

        if (! $this->hasLazyPlaceholder) {
            $configuration['lazy'] = false;
        }

        if ($this->mapToDecimalSeparator !== ['.']) {
            $configuration['mapToRadix'] = $this->mapToDecimalSeparator;
        }

        if ($this->maxLength !== null) {
            $configuration['maxLength'] = $this->maxLength;
        }

        if ($this->maxValue !== null) {
            $configuration['max'] = $this->maxValue;
        }

        if ($this->minValue !== null) {
            $configuration['min'] = $this->minValue;
        }

        if (! $this->shouldNormalizeZeros) {
            $configuration['normalizeZeros'] = false;
        }

        if ($this->shouldPadFractionalZeros) {
            $configuration['padFractionalZeros'] = true;
        }

        if ($this->toValue !== null) {
            $configuration['to'] = $this->toValue;
        }

        if ($this->placeholderCharacter !== '_') {
            $configuration['placeholderChar'] = $this->placeholderCharacter;
        }

        if ($this->decimalSeparator !== ',') {
            $configuration['radix'] = $this->decimalSeparator;
        }

        if ($this->decimalPlaces !== 2) {
            $configuration['scale'] = $this->decimalPlaces;
        }

        if (! $this->isSigned) {
            $configuration['signed'] = false;
        }

        if ($this->thousandsSeparator !== null) {
            $configuration['thousandsSeparator'] = $this->thousandsSeparator;
        }

        return $configuration;
    }

    public function toJson($options = 0): string
    {
        $json = json_encode($this->getArrayableConfiguration(), $options);

        return str_replace(
            [
                '"{{ ',
                ' }}"',
            ],
            '',
            $json,
        );
    }
}
