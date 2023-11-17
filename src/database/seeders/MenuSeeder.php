<?php

namespace seeders;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Seeder;
use Outl1ne\MenuBuilder\Models\Menu;
use Outl1ne\MenuBuilder\Models\MenuItem;

class MenuSeeder extends Seeder
{
    private $callUsMenuId;

    private $topRightMenuId;

    protected $topLeftMenuId;

    public function run(): void
    {
        $this->mainMenus();
        $this->menuItems();
    }

    public function mainMenus()
    {
        try {
            Menu::query()->where('name', 'CallUs')->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            $callUsMenu = (new Menu(['name' => 'CallUs', 'slug' => 'red-parts']));
            $callUsMenu->save();
            $this->callUsMenuId = $callUsMenu->id;
        }

        try {
            Menu::query()->where('name', 'TopRight')->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            $topRightMenu = (new Menu(['name' => 'TopRight', 'slug' => 'red-parts']));
            $topRightMenu->save();
            $this->topRightMenuId = $topRightMenu->id;
        }

        try {
            Menu::query()->where('name', 'TopLeft')->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            $topLeftMenu = (new Menu(['name' => 'TopLeft', 'slug' => 'red-parts']));
            $topLeftMenu->save();
            $this->topLeftMenuId = $topLeftMenu->id;
        }
    }

    public function menuItems()
    {
        if ($this->callUsMenuId) {
            (new MenuItem([
                "menu_id" => $this->callUsMenuId,
                "name" => "Call Us: 962-77-5040-800",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "tel:962775040800",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->callUsMenuId,
                "name" => "اتصل بنا: 962-77-5040-800",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "tel:962775040800",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();
        }

        if ($this->topRightMenuId) {
            $currencyMenuItemEn = (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "Currency (@redpartsSelectedCurrency)",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemTextType",
                "value" => null,
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]));
            $currencyMenuItemEn->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "United States Dollar",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchCurrency('USD')",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $currencyMenuItemEn->id,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "Jordanian Dinar",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchCurrency('JOD')",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $currencyMenuItemEn->id,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            $currencyMenuItemAr = (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "العملة (@redpartsSelectedCurrency)",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemTextType",
                "value" => null,
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 3,
                "enabled" => 1,
                "nestable" => 1
            ]));
            $currencyMenuItemAr->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "الدولار الأمريكي",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchCurrency('USD')",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $currencyMenuItemAr->id,
                "order" => 4,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "الدينار الأردني",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchCurrency('JOD')",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $currencyMenuItemAr->id,
                "order" => 5,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            $languageMenuItemEn = (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "Language (@redpartsSelectedLanguage)",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemTextType",
                "value" => null,
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]));
            $languageMenuItemEn->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "Arabic",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchLanguage('ar')",
                "target" => "_self",
                "data" => null,
                "parent_id" => $languageMenuItemEn->id,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "English",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchLanguage('en')",
                "target" => "_self",
                "data" => null,
                "parent_id" => $languageMenuItemEn->id,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            $languageMenuItemAr = (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "اللغة (@redpartsSelectedLanguage)",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemTextType",
                "value" => null,
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 6,
                "enabled" => 1,
                "nestable" => 1
            ]));
            $languageMenuItemAr->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "العربية",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchLanguage('ar')",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $languageMenuItemAr->id,
                "order" => 7,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topRightMenuId,
                "name" => "الإنجليزية",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "javascript:switchLanguage('en')",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $languageMenuItemAr->id,
                "order" => 8,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();
        }

        if ($this->topLeftMenuId) {
            (new MenuItem([
                "menu_id" => $this->topLeftMenuId,
                "name" => "About Us",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/about",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 15,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topLeftMenuId,
                "name" => "Contact",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/contact",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 16,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topLeftMenuId,
                "name" => "Track Order",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/track-order",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 17,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topLeftMenuId,
                "name" => "عن الشركة",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/about",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 18,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topLeftMenuId,
                "name" => "اتصل بنا",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/contact",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 19,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->topLeftMenuId,
                "name" => "تتبع الطلب",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/track-order",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 20,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();
        }
    }
}