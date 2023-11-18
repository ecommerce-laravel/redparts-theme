<?php

namespace Wjurry\RedParts\database\seeders;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Seeder;
use Outl1ne\MenuBuilder\Models\Menu;
use Outl1ne\MenuBuilder\Models\MenuItem;

class MenuSeeder extends Seeder
{
    private int $callUsMenuId;

    private int $topRightMenuId;

    private int $topLeftMenuId;

    private int $mainMenuId;

    public function run(): void
    {
        $this->mainMenus();
        $this->menuItems();
    }

    public function mainMenus()
    {
        try {
            $callUsMenu = Menu::query()->where('name', 'CallUs')->firstOrFail();
            $this->callUsMenuId = $callUsMenu->id;
        } catch (ModelNotFoundException $exception) {
            $callUsMenu = (new Menu(['name' => 'CallUs', 'slug' => 'red-parts']));
            $callUsMenu->save();
            $this->callUsMenuId = $callUsMenu->id;
        }

        try {
            $topRightMenu = Menu::query()->where('name', 'TopRight')->firstOrFail();
            $this->topRightMenuId = $topRightMenu->id;
        } catch (ModelNotFoundException $exception) {
            $topRightMenu = (new Menu(['name' => 'TopRight', 'slug' => 'red-parts']));
            $topRightMenu->save();
            $this->topRightMenuId = $topRightMenu->id;
        }

        try {
            $topLeftMenu = Menu::query()->where('name', 'TopLeft')->firstOrFail();
            $this->topLeftMenuId = $topLeftMenu->id;
        } catch (ModelNotFoundException $exception) {
            $topLeftMenu = (new Menu(['name' => 'TopLeft', 'slug' => 'red-parts']));
            $topLeftMenu->save();
            $this->topLeftMenuId = $topLeftMenu->id;
        }

        try {
            $mainMenu = Menu::query()->where('name', 'MainMenu')->firstOrFail();
            $this->mainMenuId = $mainMenu->id;
        } catch (ModelNotFoundException $exception) {
            $mainMenu = (new Menu( ["name" => 'MainMenu', 'slug' => 'red-parts']));
            $mainMenu->save();
            $this->mainMenuId = $mainMenu->id;
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

        if ($this->mainMenuId) {
            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Home",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]));

            $shopMenuItemEn = new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Shop",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/shop",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]);
            $shopMenuItemEn->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Cart",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/cart",
                "target" => "_self",
                "data" => null,
                "parent_id" => $shopMenuItemEn->id,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Checkout",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/checkout",
                "target" => "_self",
                "data" => null,
                "parent_id" => $shopMenuItemEn->id,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Track Order",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/track-order",
                "target" => "_self",
                "data" => null,
                "parent_id" => $shopMenuItemEn->id,
                "order" => 3,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            $accountMenuEn = new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Account",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/account",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 3,
                "enabled" => 1,
                "nestable" => 1
            ]);
            $accountMenuEn->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Garage",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/garage",
                "target" => "_self",
                "data" => null,
                "parent_id" => $accountMenuEn->id,
                "order" => 1,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Orders",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/my-orders",
                "target" => "_self",
                "data" => null,
                "parent_id" => $accountMenuEn->id,
                "order" => 2,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Addresses",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/addresses",
                "target" => "_self",
                "data" => null,
                "parent_id" => $accountMenuEn->id,
                "order" => 3,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Account Details",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/account",
                "target" => "_self",
                "data" => null,
                "parent_id" => $accountMenuEn->id,
                "order" => 4,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "Could not find your part?",
                "locale" => "en",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/contact",
                "target" => "_self",
                "data" => null,
                "parent_id" => null,
                "order" => 31,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "الرئيسية",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 32,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            $shopMenuItemAr = new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "المتجر",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/shop",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 33,
                "enabled" => 1,
                "nestable" => 1
            ]);
            $shopMenuItemAr->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "سلة الشراء",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/cart",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $shopMenuItemAr->id,
                "order" => 34,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "صفحة الدفع",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/checkout",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $shopMenuItemAr->id,
                "order" => 35,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "تتبع الطلب",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/track-order",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $shopMenuItemAr->id,
                "order" => 36,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            $accountMenuAr = new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "حسابي",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/account",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 37,
                "enabled" => 1,
                "nestable" => 1
            ]);
            $accountMenuAr->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "كراج السيارات",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/garage",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $accountMenuAr->id,
                "order" => 38,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "طلباتي",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/my-orders",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $accountMenuAr->id,
                "order" => 39,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "عناوين التوصيل",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/addresses",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $accountMenuAr->id,
                "order" => 40,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "معلومات الحساب",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/account",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => $accountMenuAr->id,
                "order" => 41,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();

            (new MenuItem([
                "menu_id" => $this->mainMenuId,
                "name" => "لم تعثر على ما تبحث عنه؟",
                "locale" => "ar",
                "class" => "Outl1ne\MenuBuilder\MenuItemTypes\MenuItemStaticURLType",
                "value" => "/contact",
                "target" => "_self",
                "data" => [
                ],
                "parent_id" => null,
                "order" => 42,
                "enabled" => 1,
                "nestable" => 1
            ]))->save();
        }
    }
}