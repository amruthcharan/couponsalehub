<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('site.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.title'),
                'value'        => config('app.name'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.description'),
                'value'        => __('voyager::seeders.settings.site.description'),
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.logo');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.logo'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 4,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 5,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.title'),
                'value'        => config('app.name'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.description'),
                'value'        => "Welcome to " . config('app.name'),
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 3,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 4,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.google_analytics_client_id');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('site.favicon');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Favicon",
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 6,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.default-image');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Default Blog Image",
                'value'        => '',
                'details'      => '',
                'type'         => 'image',
                'order'        => 7,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.categories-title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Categories Title",
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 8,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.categories-description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Categories Description",
                'value'        => '',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 9,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.contact-title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Contact Page Title",
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 10,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.contact-description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Contact Page Description",
                'value'        => '',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 11,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.guides-title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Guides Page Title",
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 12,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.guides-description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Guides Page Description",
                'value'        => '',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 13,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.search-title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Search Page Title",
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 14,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.search-description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Search Page Description",
                'value'        => '',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 15,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.reviews-title');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Reviews Page Title",
                'value'        => '',
                'details'      => '',
                'type'         => 'text',
                'order'        => 16,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.reviews-description');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => "Reviews Page Description",
                'value'        => '',
                'details'      => '',
                'type'         => 'text_area',
                'order'        => 17,
                'group'        => 'Site',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
