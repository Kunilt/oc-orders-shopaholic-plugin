<?php namespace Lovata\OrdersShopaholic\Controllers;

use Event;
use BackendMenu;
use Backend\Classes\Controller;

/**
 * Class Statuses
 * @package Lovata\OrdersShopaholic\Controllers
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Statuses extends Controller
{
    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ReorderController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    /**
     * Statuses constructor.
     */
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Lovata.OrdersShopaholic', 'orders-shopaholic-menu', 'orders-shopaholic-menu-statuses');
    }

    /**
     * Ajax handler onReorder event
     */
    public function onReorder()
    {
        $obResult =  parent::onReorder();
        Event::fire('shopaholic.order_status.update.sorting');

        return $obResult;
    }
}