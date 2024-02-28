<?php
namespace Modules\Space;
use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;
use Modules\Space\Models\Space;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(SitemapHelper $sitemapHelper){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        if(is_installed() and Space::isEnable()){
            $sitemapHelper->add("space",[app()->make(Space::class),'getForSitemap']);
        }
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        if(!Space::isEnable()) return [];
        return [
            'space'=>[
                "position"=>41,
                'url'        => route('space.admin.index'),
                'title'      => __('Property'),
                'icon'       => 'ion ion-md-home',
                'permission' => 'space_view',
                'children'   => [
                    'add'=>[
                        'url'        => route('space.admin.index'),
                        'title'      => __('All Properties'),
                        'permission' => 'space_view',
                    ],
                    'create'=>[
                        'url'        => route('space.admin.create'),
                        'title'      => __('Add new Property'),
                        'permission' => 'space_create',
                    ],
                    'attribute'=>[
                        'url'        => route('space.admin.attribute.index'),
                        'title'      => __('Attributes'),
                        'permission' => 'space_manage_attributes',
                    ],
                    'availability'=>[
                        'url'        => route('space.admin.availability.index'),
                        'title'      => __('Availability'),
                        'permission' => 'space_create',
                    ],
                    'recovery'=>[
                        'url'        => route('space.admin.recovery'),
                        'title'      => __('Recovery'),
                        'permission' => 'space_view',
                    ],

                ]
            ]
        ];
    }

    public static function getBookableServices()
    {
        if(!Space::isEnable()) return [];
        return [
            'space'=>Space::class
        ];
    }

    public static function getMenuBuilderTypes()
    {
        if(!Space::isEnable()) return [];
        return [
            'space'=>[
                'class' => Space::class,
                'name'  => __("Properties"),
                'items' => Space::searchForMenu(),
                'position'=>41
            ]
        ];
    }

    public static function getUserMenu()
    {
        $res = [];
        if (Space::isEnable()) {
            $res['space'] = [
                'url'        => route('space.vendor.index'),
                'title'      => __("Manage Property"),
                'icon'       => Space::getServiceIconFeatured(),
                'position'   => 32,
                'permission' => 'space_view',
                'children'   => [
                    [
                        'url'   => route('space.vendor.index'),
                        'title' => __("All Properties"),
                    ],
                    [
                        'url'        => route('space.vendor.create'),
                        'title'      => __("Add Property"),
                        'permission' => 'space_create',
                    ],
                    [
                        'url'        => route('space.vendor.availability.index'),
                        'title'      => __("Availability"),
                        'permission' => 'space_create',
                    ],
                    [
                        'url'   => route('space.vendor.recovery'),
                        'title'      => __("Recovery"),
                        'permission' => 'space_create',
                    ],
                ]
            ];
        }
        return $res;
    }

    public static function getTemplateBlocks(){
        if(!Space::isEnable()) return [];
        return [
            'form_search_space'=>"\\Modules\\Space\\Blocks\\FormSearchSpace",
            'list_space'=>"\\Modules\\Space\\Blocks\\ListSpace",
            'space_term_featured_box'=>"\\Modules\\Space\\Blocks\\SpaceTermFeaturedBox",
        ];
    }
}
