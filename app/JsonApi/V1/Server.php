<?php

namespace App\JsonApi\V1;

use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/v1';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            Collections\CollectionSchema::class,
            Albums\AlbumSchema::class,
            Images\ImageSchema::class,
            Documents\DocumentSchema::class,
            Notes\NoteSchema::class,

            Calls\CallSchema::class,
            CallEntries\CallEntrySchema::class,

            Keywords\KeywordSchema::class,
            Comments\CommentSchema::class,
            AltLabels\AltLabelSchema::class,
            
            Places\PlaceSchema::class,
            Agents\AgentSchema::class,
            Jobs\JobSchema::class,
            Literatures\LiteratureSchema::class,

            Dates\DateSchema::class,
            Formats\FormatSchema::class,
            ModelTypes\ModelTypeSchema::class,
            ObjectTypes\ObjectTypeSchema::class,

            Maps\MapSchema::class,
            MapLayers\MapLayerSchema::class,
            MapEntries\MapEntrySchema::class,
            MapKeys\MapKeySchema::class,
        ];
    }

    /**
     * Determine if the server is authorizable.
     *
     * @return bool
     */
    public function authorizable(): bool
    {
        return false;
    }
}
