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
            'salsah_id' => $this->salsah_id,
            'oldnr' => $this->oldnr,
            'signature' => $this->signature,
            'title' => $this->title,
            'original_title' => $this->original_title,
            'base_path' => $this->base_path,
            'salsah_date' => $this->salsah_date,
            'sequence_number' => $this->sequence_number,
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
            $this->relation('keywords'),
            $this->relation('comments'),
            $this->relation('location'),
            $this->relation('people'),
            $this->relation('dates'),

            $this->relation('verso'),
            $this->relation('object_types'),
            $this->relation('model_types'),
            $this->relation('formats'),
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
                'https://pia-iiif.dhlab.unibas.ch/'.$this->base_path.'/'.$this->signature.'.jp2/'
            ),
            new Link(
                'manifest',
                'https://pia-iiif.dhlab.unibas.ch/<object>/<id>/manifest.json'
            ),
        );
    }

}
