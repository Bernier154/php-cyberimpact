<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Collections\TemplateCollection;
use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\Template;

trait TemplateRequests
{
    /**
     * Retrieve a paginated list of the templates.
     *
     * @param  int $page The page of results to view 
     * @param  int $limit The amount of results per page (max: 10 000) 
     * @param  string $sort In which order should the results be returned
     *                      Possible values: template_asc , template_desc , language_asc , language_desc , subject_asc , subject_desc , updated_asc , updated_desc , usage_asc , usage_desc , created_asc , created_desc . 
     * @return TemplateCollection
     */
    public function retrieveTemplates(int $page = 1, int $limit = 20, string $sort = "")
    {
        $apiResponse = $this->_request('GET', "templates", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort
        ]);

        return TemplateCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a specific template based on its id.
     *
     * @param  int $id The template's numerical id
     * @return Template
     */
    public function retrieveTemplate(int $id)
    {
        try {
            $apiResponse = $this->_request('GET', "templates/$id");
            return Template::fromJSON($apiResponse);
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return null;
            }
            throw ($e);
        }
    }

    /**
     * Create a new template.
     *
     * @param  string $title The title of the template
     * @param  string $bodyHtml The html body of the template. It is required that a template has at least either a html or a text body. Having both is recommended
     * @param  string $bodyText The text body of the template. It is required that a template has at least either a html or a text body. Having both is recommended
     * @return Template
     */
    public function createTemplate(string $title, string $bodyHtml = "", string $bodyText = "")
    {
        $apiResponse = $this->_request('POST', "templates", [
            'title' => $title,
            'bodyHtml' => $bodyHtml,
            'bodyText' => $bodyText,
        ]);
        return Template::fromJSON($apiResponse);
    }

    /**
     * Modify the representation of a template so that it become completely like specified. Unspecified attributes will be resetted to their default empty values.
     *
     * @param  int $id The template's numerical Id
     * @param  string $title The title of the template
     * @param  string $bodyHtml The html body of the template. It is required that a template has at least either a html or a text body. Having both is recommended
     * @param  string $bodyText The text body of the template. It is required that a template has at least either a html or a text body. Having both is recommended
     * @return Template
     */
    public function replaceTemplate(int $id, string $title, string $bodyHtml = "", string $bodyText = "")
    {
        $apiResponse = $this->_request('PUT', "templates/$id", [
            'title' => $title,
            'bodyHtml' => $bodyHtml,
            'bodyText' => $bodyText,
        ]);
        return Template::fromJSON($apiResponse);
    }

    /**
     * Delete a specific template based on its id.
     *
     * @param  int $id The template's numerical id
     * @return object The id of the template and it's status.
     */
    public function deleteTemplate($id)
    {
        try {
            $apiResponse = $this->_request('DELETE', "templates/$id");
            return $apiResponse;
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return json_decode(json_encode([$id => 'not-found']));
            }
            throw ($e);
        }
    }
}
