<?php

namespace bernier154\PhpCyberimpact\Collections;

use bernier154\PhpCyberimpact\Objects\Template;

/**
 * Paginated list of groups.
 */
class TemplateCollection
{
    public $templates;
    public $totalCount;
    public $page;
    public $limit;
    public $sort;

    /**
     * Returns a paginated list of templates.
     *
     * @param  Template[] $templates Array of templates
     * @param  int $totalCount Total count of templates
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort $sort In which order should the results be returned.
     *                      Possible values: template_asc , template_desc , language_asc , language_desc , subject_asc , subject_desc , updated_asc , updated_desc , usage_asc , usage_desc , created_asc , created_desc . 
     * @return void
     */
    public function __construct(array $templates, int $totalCount, int $page, int $limit, string $sort)
    {
        $this->templates = $templates;
        $this->totalCount = $totalCount;
        $this->page = $page;
        $this->limit = $limit;
        $this->sort = $sort;
    }


    /**
     * Create a TemplateCollection from the return value of the API.
     *
     * @param  object $json
     * @return TemplateCollection
     */
    static function fromJSON(object $json)
    {
        return new self(
            array_map(Template::class . '::fromJSON', $json->templates),
            $json->totalCount,
            $json->page,
            $json->limit,
            $json->sort
        );
    }
}
