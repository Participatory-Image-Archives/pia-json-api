<?php

namespace App\JsonApi\V1\Images;

use App\Models\Image;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\HasOne;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use App\JsonApi\Filters\OmniFilter;
use App\JsonApi\Filters\FuzzyFilter;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class ImageSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Image::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),

            HasOne::make('location'),
            HasOne::make('verso'),
            
            BelongsTo::make('object-type'),
            BelongsTo::make('model-type'),
            BelongsTo::make('format'),

            BelongsToMany::make('keywords'),
            BelongsToMany::make('collections'),
            BelongsToMany::make('comments'),
            BelongsToMany::make('dates'),

            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
            OmniFilter::make('omni'),
            FuzzyFilter::make('title'),
            FuzzyFilter::make('salsah_id'),
            FuzzyFilter::make('oldnr'),
            FuzzyFilter::make('signature'),
        ];
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

}
