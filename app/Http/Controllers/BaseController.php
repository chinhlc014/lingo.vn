<?php

namespace App\Http\Controllers;

/**
 * Class BaseController
 *
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * function description
     *
     * @param $viewName
     * @param array $variable
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renderView($viewName, array $variable = [])
    {
        return view($this->getTheme() . '.' . $viewName, $variable);
    }

    /**
     * function description
     *
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public function getTheme()
    {
        return config('theme.default_theme');
    }

    /**
     * function description
     *
     * @return array
     */
    public function getMetaData(): array
    {
        return [
            'meta_description' => __('meta.pages.home.meta_description'),
            'meta_keywords' => '',
            'meta_og_image' => asset('common/images/logo.png'),
            'meta_og_url' => route('home'),
            'meta_og_title' => trans('meta.web_name'),
        ];
    }

    /**
     * function description
     *
     * @param $metaData
     * @return array
     */
    protected function getSchemaData($metaData): array
    {
        $response = [];

        $response['webSite'] = [
            'name' => $metaData['meta_og_title'],
            'alternateName' => $metaData['meta_description'],
            'url' => route('home'),
            '@context' => 'http://schema.org',
            '@type' => 'WebSite'
        ];

        return $response;
    }
}
