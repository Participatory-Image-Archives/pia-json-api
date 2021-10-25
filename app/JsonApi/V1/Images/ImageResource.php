<?php

namespace App\JsonApi\V1\Images;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;
use LaravelJsonApi\Core\Document\Link;
use LaravelJsonApi\Core\Document\Links;

class ImageResource extends JsonApiResource
{

    /**
     * Get the resource's attributes.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function attributes($request): iterable
    {
        return [
            'title' => $this->title,
            'signature' => $this->signature,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }

    /**
     * Get the resource's relationships.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function relationships($request): iterable
    {
        return [
            $this->relation('collections'),
            $this->relation('keywords')->showDataIfLoaded(),
            $this->relation('comments'),
            $this->relation('locations'),
        ];
    }

    /**
     * Get the resource's links.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return Links
     */
    public function links($request): Links
    {
        return new Links(
            $this->selfLink(),
            new Link(
                'related',
                'https://pia-iiif.dhlab.unibas.ch/'.$this->collections()->where('origin', 'salsah')->first()->label.'/'.$this->signature.'.jp2/info.json'
            ),
            new Link(
                'manifest',
                'https://pia-iiif.dhlab.unibas.ch/<object>/<id>/manifest.json'
            ),
        );
    }

}
