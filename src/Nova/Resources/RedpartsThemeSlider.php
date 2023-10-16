<?php

namespace Wjurry\RedParts\Nova\Resources;

use App\Nova\Resource;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class RedpartsThemeSlider extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Wjurry\RedParts\Models\RedpartsThemeSlider>
     */
    public static $model = \Wjurry\RedParts\Models\RedpartsThemeSlider::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    public static $displayInNavigation = false;

    public static function uriKey()
    {
        return 'redparts-theme-slider';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name', 'name')
                ->rules('required'),

            NovaTinyMCE::make('Content', 'content')
                ->options([
                    'menubar' => true,
                    'plugins' => ['lists', 'preview', 'wordcount', 'directionality', 'link'],
                    'toolbar' => 'undo redo | blockquote | link | bold italic forecolor | preview | backcolor alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                    'height' => '200'
                ])
                ->rules('required'),

            Images::make('Background', 'background')
                ->conversionOnIndexView('responsive_1350') // which conversion to use for displaying the image on the index view
                ->conversionOnDetailView('responsive_1350') // which conversion to use for displaying the image on the detail view
                ->conversionOnForm('responsive_1350') // which conversion to use for displaying the image on the form view
                ->singleMediaRules(['mimes:png,jpg,jpeg,gif']),

            Boolean::make('Is Active?', 'is_active'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
