<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'categories',
                'display_name_singular' => __('voyager::seeders.data_types.category.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.category.plural'),
                'icon'                  => 'voyager-categories',
                'model_name'            => 'TCG\\Voyager\\Models\\Category',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $categoryDataType = DataType::where('slug', 'categories')->firstOrFail();
        $dataRow = $this->dataRow($categoryDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'parent_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => __('voyager::seeders.data_rows.parent'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => '',
                    'null'    => '',
                    'options' => [
                        '' => '-- None --',
                    ],
                    'relationship' => [
                        'key'   => 'id',
                        'label' => 'name',
                    ],
                ],
                'order' => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.slug'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ],
                'order' => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'icon');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => "Select Icon",
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [],
                'order' => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'homepage');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'checkbox',
                'display_name' => "Homepage Category",
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [],
                'order' => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'meta_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => __('voyager::seeders.data_rows.meta_description'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 11,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'meta_title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => "Meta Title",
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 8,
            ])->save();
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.categories'),
            'url'     => '',
            'route'   => 'voyager.categories.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 9,
            ])->save();
        }

        //Permissions
        Permission::generateFor('categories');

        //Content
        $category = Category::firstOrNew([
            'slug' => 'service',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Service',
                'icon'             => 'fas users-cog',
                'homepage'         => false,
                'meta_title'       => 'Top quality Fonts Online - Best 10 Fonts Brands Reviews & Coupons',
                'meta_description' => 'Tons of great deals on Fonts styles design softwares. Check out Top Font brands reviews such as Font Bundles, Fontspring, Best 10 fonts list free & paid.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'wordpress',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Wordpress',
                'icon'             => 'fab fa-wordpress',
                'homepage'         => true,
                'meta_title'       => 'Top Selling WordPress Themes, Templates | Best WP plugin deals, reviews',
                'meta_description' => 'Set your WordPress website at an affordable price with the best WordPress Themes, Templates coupons. Free, Paid WordPress Plugins for making WP websites faster.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'software',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Software',
                'icon'             => 'fab fa-windows',
                'homepage'         => true,
                'meta_title'       => 'Best Software Stores Online - Coupons, Brands Reviews, Best 10 Lists',
                'meta_description' => 'Have a look at the Top rated Software brands reviews & Best 10 Software stores in each category. Grab biggest coupons, deals on best selling Software tools.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'vpn',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'VPN',
                'icon'             => 'fas fa-network-wired',
                'homepage'         => true,
                'meta_title'       => 'Best Selling VPN Brands Reviews, Latest Deals & Best 10 VPNs List',
                'meta_description' => 'Compare Top rated VPN Brands reviews, ratings to get idea of best services. To save your penny on the Best 10 VPN services use latest coupons & deals.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'travel',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Travel',
                'icon'             => 'fas fa-plane-departure',
                'homepage'         => true,
                'meta_title'       => 'Must have Travel Essentials, Best Brands List, Reviews, Tips & Tricks',
                'meta_description' => 'List of Top Stores for your Travel essentials. Check out the Best brands, reviews, user ratings and safe tips for your Travelling, vacation trips.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'hosting',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Hosting',
                'icon'             => 'fas fa-server',
                'homepage'         => true,
                'meta_title'       => 'Free & Paid Web Hosting Services | Best Hosting list, Coupons, Reviews',
                'meta_description' => 'Hand curated reviews, ratings of Web hosting best companies, and Top 10 Web hosting platforms mentioned here. Grab the working coupons & deals here.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'graphic-design',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Graphic Design',
                'icon'             => 'fas fa-photo-video',
                'homepage'         => true,
                'meta_title'       => 'Free Graphic Design Softwares & Tools - Best 10 list, Reviews, & Offers',
                'meta_description' => 'Check Best lists of Graphic Designing tools for making your visual communication beautiful. See Top Graphic design software brands reviews, coupons & deals.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'games',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Games',
                'icon'             => 'fab fa-xbox',
                'homepage'         => true,
                'meta_title'       => 'Games',
                'meta_description' => 'games.'
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'fonts',
        ]);
        if (!$category->exists) {
            $category->fill([
                'name'             => 'Fonts',
                'icon'             => 'fas fa-font',
                'homepage'         => true,
                'meta_title'       => 'Top quality Fonts Online - Best 10 Fonts Brands Reviews & Coupons',
                'meta_description' => 'Tons of great deals on Fonts styles design softwares. Check out Top Font brands reviews such as Font Bundles, Fontspring, Best 10 fonts list free & paid.'
            ])->save();
        }

    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
