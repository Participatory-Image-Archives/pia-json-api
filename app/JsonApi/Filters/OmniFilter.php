<?php

namespace App\JsonApi\Filters;

use Illuminate\Support\Facades\DB;
use LaravelJsonApi\Core\Support\Str;
use LaravelJsonApi\Eloquent\Contracts\Filter;
use LaravelJsonApi\Eloquent\Filters\Concerns\DeserializesValue;
use LaravelJsonApi\Eloquent\Filters\Concerns\IsSingular;

class OmniFilter implements Filter
{
    use DeserializesValue;
    use IsSingular;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $column;

    /**
     * Create a new filter.
     *
     * @param string $name
     * @param string|null $column
     * @return FuzzyFilter
     */
    public static function make(string $name, string $column = null): self
    {
        return new static($name, $column);
    }

    /**
     * FuzzyFilter constructor.
     *
     * @param string $name
     * @param string|null $column
     */
    public function __construct(string $name, string $column = null)
    {
        $this->name = $name;
        $this->column = $column ?: Str::underscore($name);
    }

    /**
     * Get the key for the filter.
     *
     * @return string
     */
    public function key(): string
    {
        return $this->name;
    }

    /**
     * Apply the filter to the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply($query, $value)
    {
        $terms = explode(' ', $value);

        foreach($terms as $k => $term) {
            $query->where(
                DB::raw('lower(title)'), 'like', '%' . strtolower($term) . '%'
            );
        }

        $query->orWhere(DB::raw('lower(signature)'), 'like', '%' . strtolower($value) . '%');
        $query->orWhere(DB::raw('lower(oldnr)'), 'like', '%' . strtolower($value) . '%');
        $query->orWhere(DB::raw('lower(sequence_number)'), 'like', '%' . strtolower($value) . '%');

        return $query;
    }
}
